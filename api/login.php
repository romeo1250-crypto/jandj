<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        // Validate inputs
        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');
        
        if (empty($username) || empty($password)) {
            sendError('Username and password are required', 400);
        }
        
        // Prevent brute force: Rate limiting check
        $clientIp = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
        $cacheKey = "login_attempts_$clientIp";
        
        // Simple rate limiting (you can improve this with Redis)
        if (!isset($_SESSION)) {
            session_start();
        }
        
        $_SESSION[$cacheKey] = ($_SESSION[$cacheKey] ?? 0) + 1;
        
        if ($_SESSION[$cacheKey] > 5) {
            error_log("Brute force attempt detected from IP: $clientIp");
            sendError('Too many login attempts. Please try again later.', 429);
        }
        
        // Validate username format
        if (!preg_match('/^[a-zA-Z0-9_]{3,50}$/', $username)) {
            sendError('Invalid username format', 400);
        }
        
        // Query user
        $stmt = $pdo->prepare("SELECT id, username, password_hash FROM users WHERE username = ? LIMIT 1");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        
        // Verify password
        if (!$user || !password_verify($password, $user['password_hash'])) {
            // Don't reveal if user exists
            error_log("Failed login attempt for username: $username from IP: $clientIp");
            sendError('Invalid credentials', 401);
        }
        
        // Reset rate limiting on successful login
        unset($_SESSION[$cacheKey]);
        
        // Create session token
        $token = bin2hex(random_bytes(32));
        $tokenHash = hash('sha256', $token);
        $expiryTime = date('Y-m-d H:i:s', time() + 3600); // 1 hour
        
        // Store token in database (optional - for multi-device support)
        $tokenStmt = $pdo->prepare(
            "INSERT INTO login_tokens (user_id, token_hash, expires_at) VALUES (?, ?, ?)"
        );
        $tokenStmt->execute([$user['id'], $tokenHash, $expiryTime]);
        
        // Log successful login
        error_log("Successful login for user: $username from IP: $clientIp");
        
        sendResponse([
            'success' => true,
            'message' => 'Login successful',
            'user_id' => $user['id'],
            'username' => $user['username'],
            'token' => $token // Send to client (should be sent via secure HTTP-only cookie in production)
        ], 200);
        
    } catch (Exception $e) {
        error_log('Login API error: ' . $e->getMessage());
        sendError('An error occurred during login', 500);
    }
} else {
    sendError('Method not allowed', 405);
}
?>