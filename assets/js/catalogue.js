// ===== CATALOGUE PAGE JS =====

document.addEventListener('DOMContentLoaded', function() {

    // 1. Search & Filter
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const resetBtn = document.getElementById('resetFilters');
    const productCards = document.querySelectorAll('.product-card');

    function filterProducts() {
        const query = searchInput.value.toLowerCase().trim();
        const category = categoryFilter.value;

        productCards.forEach(card => {
            const name = card.dataset.name || '';
            const cat = card.dataset.category || '';

            let matchesSearch = name.includes(query);
            let matchesCategory = (category === 'all' || cat === category);

            if (matchesSearch && matchesCategory) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);

    resetBtn.addEventListener('click', function() {
        searchInput.value = '';
        categoryFilter.value = 'all';
        filterProducts();
    });

    // 2. Quick View Modal
    const quickViewButtons = document.querySelectorAll('.quick-view');
    const modal = document.getElementById('quickViewModal');

    quickViewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const name = this.dataset.name;
            const desc = this.dataset.desc;
            const price = this.dataset.price;
            const category = this.dataset.category;
            const image = this.dataset.image;

            document.getElementById('quickViewName').textContent = name;
            document.getElementById('quickViewDesc').textContent = desc;
            document.getElementById('quickViewCategory').textContent = category;
            document.getElementById('quickViewPrice').textContent = '$' + parseFloat(price).toFixed(2);
            document.getElementById('quickViewImage').src = image;
            document.getElementById('quickViewImage').alt = name;

            // Update inquiry link (optional)
            const inquireBtn = document.querySelector('#quickViewModal .btn-warning');
            if (inquireBtn) {
                inquireBtn.href = 'contact.php?product=' + encodeURIComponent(name);
            }

            const bsModal = new bootstrap.Modal(modal);
            bsModal.show();
        });
    });

    // 3. Optional: Auto-trigger filter on page load if URL params exist
    // (not implemented here but you can extend)
});