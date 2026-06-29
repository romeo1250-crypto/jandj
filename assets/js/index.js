// ===== INDEX PAGE JS =====

document.addEventListener('DOMContentLoaded', function() {

    // 1. Count-up animation for stats
    const counters = document.querySelectorAll('.count');
    const speed = 80; // lower = faster

    const animateCounter = (el) => {
        const target = parseInt(el.getAttribute('data-target'));
        let current = 0;
        const increment = Math.ceil(target / 30); // step size
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                el.textContent = target;
                clearInterval(timer);
            } else {
                el.textContent = current;
            }
        }, speed);
    };

    // Intersection Observer to trigger counters when visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                // if not already counted
                if (!el.dataset.counted) {
                    el.dataset.counted = 'true';
                    animateCounter(el);
                }
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));

    // 2. Gallery lightbox
    const galleryLinks = document.querySelectorAll('.gallery-link');
    const modal = document.getElementById('galleryModal');
    const modalTitle = document.getElementById('galleryModalTitle');
    const modalContent = document.getElementById('galleryModalContent');

    galleryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const src = this.dataset.src;
            const title = this.dataset.title || 'Product';
            const isVideo = src.includes('youtube') || src.includes('vimeo') || src.endsWith('.mp4');

            // Set title
            modalTitle.textContent = title;

            // Set content
            let contentHtml = '';
            if (isVideo) {
                // If it's a YouTube embed link, wrap as iframe
                if (src.includes('youtube.com/embed')) {
                    contentHtml = `<iframe src="${src}" allowfullscreen></iframe>`;
                } else {
                    // For direct video file
                    contentHtml = `<video controls autoplay><source src="${src}" type="video/mp4"></video>`;
                }
            } else {
                contentHtml = `<img src="${src}" alt="${title}" class="img-fluid">`;
            }
            modalContent.innerHTML = contentHtml;

            // Show modal via Bootstrap
            const bsModal = new bootstrap.Modal(modal);
            bsModal.show();
        });
    });

    // Clean up modal content on close (optional)
    modal.addEventListener('hidden.bs.modal', function () {
        modalContent.innerHTML = '';
    });
});