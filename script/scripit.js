// Mobile menu 
document.getElementById('mobile-menu-button').addEventListener('click', function () {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
});

// Simple cart functionality
document.querySelectorAll('.product-card button').forEach(button => {
    button.addEventListener('click', function () {
        const productName = this.closest('.product-card').querySelector('h3').textContent;
        alert(`${productName} a été ajouté à votre panier.`);

        // Update cart count (simplified)
        const cartCount = document.querySelector('.fa-shopping-bag + span');
        if (cartCount) {
            let count = parseInt(cartCount.textContent);
            cartCount.textContent = count + 1;
        }
    });
});
// barre de recherche
const searchToggle = document.getElementById('search-toggle');
const searchForm = document.getElementById('search-form');
searchToggle.addEventListener('click', function (e) {
    e.preventDefault();
    searchForm.classList.toggle('hidden');
});
document.addEventListener('click', function (e) {
    if (!searchForm.contains(e.target) && e.target !== searchToggle) {
        searchForm.classList.add('hidden');
    }
});

// 
