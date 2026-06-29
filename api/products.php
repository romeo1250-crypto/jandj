<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        // Pagination parameters
        $page = max(1, intval($_GET['page'] ?? 1));
        $limit = min(50, intval($_GET['limit'] ?? 20)); // Max 50 items per page
        $offset = ($page - 1) * $limit;
        
        // Search/filter parameters
        $search = $_GET['search'] ?? '';
        $category = $_GET['category'] ?? '';
        
        // Build query with filters
        $where = "WHERE 1=1";
        $params = [];
        
        if (!empty($search)) {
            $where .= " AND (name LIKE ? OR description LIKE ?)";
            $searchTerm = "%$search%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }
        
        if (!empty($category)) {
            $where .= " AND category = ?";
            $params[] = $category;
        }
        
        // Get total count for pagination metadata
        $countStmt = $pdo->prepare("SELECT COUNT(*) as total FROM products $where");
        $countStmt->execute($params);
        $total = $countStmt->fetch()['total'];
        
        // Fetch products with sorting
        $query = "SELECT id, name, category, description, price, image_url, created_at 
                  FROM products 
                  $where 
                  ORDER BY id DESC 
                  LIMIT ? OFFSET ?";
        
        $params[] = $limit;
        $params[] = $offset;
        
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        $products = $stmt->fetchAll();
        
        // Return paginated response
        sendResponse([
            'success' => true,
            'data' => $products,
            'pagination' => [
                'current_page' => $page,
                'limit' => $limit,
                'total' => $total,
                'total_pages' => ceil($total / $limit)
            ]
        ]);
    } catch (Exception $e) {
        error_log('Products API error: ' . $e->getMessage());
        sendError('Failed to fetch products', 500);
    }
} else {
    sendError('Method not allowed', 405);
}
?>