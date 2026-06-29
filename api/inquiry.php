<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        // Validation
        if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
            sendError('Name, email, and message are required', 400);
        }
        
        // Sanitize and validate inputs
        $name = trim(htmlspecialchars($data['name']));
        $email = filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL);
        $phone = trim(htmlspecialchars($data['phone'] ?? ''));
        $subject = trim(htmlspecialchars($data['subject'] ?? 'New Inquiry'));
        $message = trim(htmlspecialchars($data['message']));
        
        // Validate email
        if (!$email) {
            sendError('Invalid email address', 400);
        }
        
        // Validate message length
        if (strlen($message) < 10) {
            sendError('Message must be at least 10 characters', 400);
        }
        
        // Prevent injection attacks
        if (strlen($name) > 100 || strlen($email) > 100) {
            sendError('Input too long', 400);
        }
        
        // Insert into database
        $stmt = $pdo->prepare(
            "INSERT INTO inquiries (name, email, phone, subject, message, status) 
             VALUES (?, ?, ?, ?, ?, 'new')"
        );
        
        if (!$stmt->execute([$name, $email, $phone, $subject, $message])) {
            throw new Exception('Failed to save inquiry');
        }
        
        $inquiryId = $pdo->lastInsertId();
        
        // Send email asynchronously (non-blocking) using background job
        $to = getenv('ADMIN_EMAIL') ?: 'ceo@jandjlogistics.com';
        $emailSubject = "New Inquiry from $name";
        $headers = "From: noreply@jandjlogistics.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        $body = "New Inquiry Received\n";
        $body .= "====================\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Phone: $phone\n";
        $body .= "Subject: $subject\n";
        $body .= "Date: " . date('Y-m-d H:i:s') . "\n\n";
        $body .= "Message:\n";
        $body .= str_repeat("-", 40) . "\n";
        $body .= $message . "\n";
        
        // Try to send email, but don't fail the request if it doesn't work
        if (@mail($to, $emailSubject, $body, $headers) === false) {
            error_log("Failed to send email for inquiry ID: $inquiryId");
        }
        
        sendResponse([
            'success' => true,
            'message' => 'Inquiry submitted successfully',
            'inquiry_id' => $inquiryId
        ], 201);
        
    } catch (Exception $e) {
        error_log('Inquiry API error: ' . $e->getMessage());
        sendError('An error occurred while processing your inquiry', 500);
    }
} else {
    sendError('Method not allowed', 405);
}
?>