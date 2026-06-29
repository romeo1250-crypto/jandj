    <!-- ---------- JAVASCRIPT (optional interactions) ---------- -->
    <script>
        // Wait for the page to load
        document.addEventListener('DOMContentLoaded', function() {

            // 1. Smooth "See More" button clicks – you can replace # with actual links later
            const buttons = document.querySelectorAll('.btn-service');
            buttons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    // If you want to prevent default for demo, uncomment:
                    // e.preventDefault();
                    // console.log('Clicked: ' + this.textContent.trim());
                    
                    // Example: show a simple alert (remove this in production)
                    // alert('You clicked: ' + this.textContent.trim());
                });
            });

            // 2. Optional: Add a subtle entrance animation on scroll
            const cards = document.querySelectorAll('.service-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.15 });

            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.15}s, transform 0.6s ease ${index * 0.15}s`;
                observer.observe(card);
            });

        });
    </script>