<?php 
$page_css = 'assets/css/catalogue.css';
$page_js = 'assets/js/catalogue.js';
include 'includes/header.php';

require_once 'api/config.php';

// Fetch all products initially
$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll();
?>

<div class="container py-5">
    <h2 class="mb-4">Our Catalogue</h2>

    <!-- Search & Filter Bar -->
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Search products...">
        </div>
        <div class="col-md-3">
            <select id="categoryFilter" class="form-select">
                <option value="all">All Categories</option>
                <option value="car">Cars</option>
                <option value="part">Parts</option>
            </select>
        </div>
        <div class="col-md-3">
            <button id="resetFilters" class="btn btn-outline-secondary w-100">Reset</button>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="row g-4" id="productGrid">
        <?php if (empty($products)): ?>
            <div class="col"><p class="text-center">No products available at the moment.</p></div>
        <?php else: ?>
            <?php foreach ($products as $p): ?>
                <div class="col-md-4 product-card" data-category="<?= htmlspecialchars($p['category']) ?>" data-name="<?= htmlspecialchars(strtolower($p['name'])) ?>">
                    <div class="card h-100 shadow-sm product-item">
                        <img src="<?= htmlspecialchars($p['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>" onerror="this.src='assets/images/placeholder.jpg'">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($p['name']) ?></h5>
                            <p class="card-text text-muted"><?= htmlspecialchars($p['description']) ?></p>
                            <span class="badge bg-warning text-dark"><?= htmlspecialchars($p['category']) ?></span>
                            <h5 class="mt-2 text-success">$<?= number_format($p['price'], 2) ?></h5>
                            <button class="btn btn-outline-primary btn-sm mt-2 quick-view" 
                                    data-id="<?= $p['id'] ?>"
                                    data-name="<?= htmlspecialchars($p['name']) ?>"
                                    data-desc="<?= htmlspecialchars($p['description']) ?>"
                                    data-price="<?= $p['price'] ?>"
                                    data-category="<?= htmlspecialchars($p['category']) ?>"
                                    data-image="<?= htmlspecialchars($p['image_url']) ?>">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quickViewTitle">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="quickViewImage" src="" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <h4 id="quickViewName"></h4>
                        <p id="quickViewDesc"></p>
                        <p><strong>Category:</strong> <span id="quickViewCategory"></span></p>
                        <h4 class="text-success" id="quickViewPrice"></h4>
                        <a href="contact.php?product=..." class="btn btn-warning mt-3">Inquire Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>