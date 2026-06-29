<!-- includes/footer.php -->
    </main>

    <!-- Footer -->
    <footer class="footer bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>J&J Logistics</h5>
                    <p>Dream · Create · Deliver</p>
                    <p class="small">Sourcing & exporting cars & parts from China to Kenya.</p>
                </div>
                <div class="col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled small">
                        <li><a href="index.php" class="text-light text-decoration-none">Home</a></li>
                        <li><a href="about.php" class="text-light text-decoration-none">About</a></li>
                        <li><a href="catalogue.php" class="text-light text-decoration-none">Catalogue</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6>Social Media</h6>
                    <ul class="list-unstyled small">

                        <li><a href="https://www.facebook.com/jandjlogisticsChinaSourcing/" class="text-light text-decoration-none" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a></li>

                        <!--<li><a href="https://twitter.com/JandJchina" class="text-light text-decoration-none" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>-->

                        <!-- <li><a href="https://www.linkedin.com/company/jandjchina" class="text-light text-decoration-none" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li> -->

                        <li><a href="https://www.instagram.com/jandj_logistics_chinasourcing/" class="text-light text-decoration-none" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>

                        <li><a href="https://wa.me/8613433994571" class="text-light text-decoration-none" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>  
                        
                        <li><a href="https://www.tiktok.com/@jandjlogistics" class="text-light text-decoration-none" target="_blank"><i class="fab fa-tiktok"></i> TikTok</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Contact</h6>
                    <ul class="list-unstyled small">
                        <li><i class="fas fa-envelope"></i> info@jandjlogistics.com</li>
                        <li><i class="fas fa-phone"></i> +86 123 4567 890</li>
                        <li><i class="fas fa-map-marker-alt"></i> Guangzhou, China</li>
                    </ul>
                </div>
            </div>
            <hr class="bg-secondary">
            <p class="text-center small mb-0">&copy; <?= date('Y') ?> J&J Logistics. All rights reserved.</p>
        </div>
    </footer>

    <!-- Footer specific CSS -->
    <link rel="stylesheet" href="assets/css/footer.css">

    <!-- Bootstrap JS (for toggles, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>

    <!-- Internal JS for header/footer enhancements -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Auto-close mobile navbar after a link click (better UX)
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const navbarCollapse = document.getElementById('navbarNav');
            if (navbarCollapse) {
                navLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    });
                });
            }

            // 2. Add subtle scroll effect: change navbar opacity/background
            const navbar = document.querySelector('.navbar');
            let lastScroll = 0;
            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
                if (currentScroll > 80) {
                    navbar.style.backgroundColor = 'rgba(15, 15, 26, 0.95)';
                    navbar.style.backdropFilter = 'blur(6px)';
                } else {
                    navbar.style.backgroundColor = '#0f0f1a';
                    navbar.style.backdropFilter = 'none';
                }
                lastScroll = currentScroll;
            });

            // 3. Footer: smooth hover effect on social icons already handled by CSS
            // Additional: animate year in copyright (just a fun touch)
            const yearSpan = document.querySelector('.footer .text-center small');
            if (yearSpan) {
                const year = new Date().getFullYear();
                // if you want to display dynamic year, it's already done via PHP <?= date('Y') ?>
            }
        });
    </script>
</body>
</html>