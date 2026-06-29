<?php 
// Set page-specific assets
$page_css = 'assets/css/index.css';
$page_js = 'assets/js/index.js';
include 'includes/header.php'; 
?>

<!-- ===== HERO CAROUSEL ===== -->
<section class="hero-carousel">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="hero-slide" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/hero-bg1.jpg');">
                    <div class="container h-100 d-flex align-items-center">
                        <div class="hero-content text-white">
                            <h1 class="display-3 fw-bold">Dream · Create · Deliver</h1>
                            <p class="lead">Your trusted partner for sourcing and exporting cars &amp; automotive parts from China to Kenya.</p>
                            <a href="catalogue.php" class="btn btn-warning btn-lg me-2">View Catalogue</a>
                            <a href="contact.php" class="btn btn-outline-light btn-lg">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-slide" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/hero-bg2.jpg');">
                    <div class="container h-100 d-flex align-items-center">
                        <div class="hero-content text-white">
                            <h2 class="display-4 fw-bold">Quality Cars, Genuine Parts</h2>
                            <p class="lead">We source only from certified factories with rigorous quality control.</p>
                            <a href="services.php" class="btn btn-warning btn-lg">Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-slide" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/hero-bg3.jpg');">
                    <div class="container h-100 d-flex align-items-center">
                        <div class="hero-content text-white">
                            <h2 class="display-4 fw-bold">Fast Shipping to Kenya</h2>
                            <p class="lead">Door‑to‑door delivery via Mombasa port – hassle‑free customs clearance.</p>
                            <a href="contact.php" class="btn btn-warning btn-lg">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- ===== STATS BAR ===== -->
<section class="stats-bar py-4 bg-warning text-dark">
    <div class="container">
        <div class="row text-center">
            <div class="col-6 col-md-3">
                <h3 class="fw-bold count" data-target="500">0</h3>
                <p>Cars Exported</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold count" data-target="120">0</h3>
                <p>Parts Shipped</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold count" data-target="50">0</h3>
                <p>Trusted Partners</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold count" data-target="98">0</h3>
                <p>% Satisfaction Rate</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== SERVICES PREVIEW (already have, keep as is) ===== -->
<section class="services-preview py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Core Services</h2>
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100 shadow-sm">
                    <i class="fas fa-car service-icon"></i>
                    <h4>Factory Sourcing</h4>
                    <p>Direct access to top Chinese manufacturers – best prices, guaranteed quality.</p>
                    <a href="services.php" class="btn btn-outline-warning mt-3">Learn More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100 shadow-sm">
                    <i class="fas fa-box service-icon"></i>
                    <h4>Logistics & Export</h4>
                    <p>Full shipping, customs clearance, and door‑to‑door delivery to Kenya.</p>
                    <a href="services.php" class="btn btn-outline-warning mt-3">Learn More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100 shadow-sm">
                    <i class="fas fa-wrench service-icon"></i>
                    <h4>After‑Sales Support</h4>
                    <p>Technical advice, spare parts sourcing, and warranty management.</p>
                    <a href="services.php" class="btn btn-outline-warning mt-3">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== GALLERY SECTION ===== -->
<section class="gallery-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Our Products Gallery</h2>
        <p class="text-center text-muted mb-4">Browse our recent shipments – click any image to view larger.</p>

        <div class="row g-3" id="galleryGrid">
            <!-- Each item: image or video -->
            <div class="col-6 col-md-4 col-lg-3 gallery-item" data-type="image">
                <a href="#" class="gallery-link" data-src="assets/images/product1.jpg" data-title="Toyota Land Cruiser V8">
                    <img src="assets/images/product1.jpg" class="img-fluid rounded" alt="Toyota Land Cruiser">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3 gallery-item" data-type="image">
                <a href="#" class="gallery-link" data-src="assets/images/product2.jpg" data-title="Mitsubishi Fuso Truck">
                    <img src="assets/images/product2.jpg" class="img-fluid rounded" alt="Mitsubishi Truck">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3 gallery-item" data-type="image">
                <a href="#" class="gallery-link" data-src="assets/images/product3.jpg" data-title="Brake Pads">
                    <img src="assets/images/product3.jpg" class="img-fluid rounded" alt="Brake Pads">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3 gallery-item" data-type="video">
                <a href="#" class="gallery-link" data-src="https://www.youtube.com/embed/dQw4w9WgXcQ" data-title="Shipping Process Video">
                    <img src="assets/images/video-thumb.jpg" class="img-fluid rounded" alt="Video thumbnail">
                    <div class="gallery-overlay"><i class="fas fa-play-circle"></i></div>
                </a>
            </div>
            <!-- Add more items as needed -->
        </div>
    </div>
</section>

<!-- ===== LIGHTBOX MODAL (for gallery) ===== -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="galleryModalTitle">Title</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div id="galleryModalContent">
                    <!-- Content will be inserted by JS -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>