
        // Script pour le menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Fonction pour afficher/masquer les filtres en mode mobile
        function toggleFilters() {
            const sidebar = document.querySelector('.filter-sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Fonction  filtres
        function applyFilters() {
            alert('Filtres appliques!');
            //  vous filtreriez les produits en fonction des sélections
            toggleFilters(); // Fermer le sidebar sur mobile
        }
        
        // Fonction filtres
        function resetFilters() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
            
            const priceRange = document.getElementById('priceRange');
            priceRange.value = 50000;
            
            alert('Filtres réinitialisés!');
        }
        
        // Fonction pour trier les produits
        function sortProducts(value) {
            alert('Tri appliqué: ' + value);
            // En réalité, ici vous trieriez les produits en fonction de la valeur
        }
        
        // Fonction pour ajouter au panier
        function addToCart(productId) {
            alert('Produit ' + productId + ' ajouté au panier!');
            // En réalité, ici vous mettriez à jour le panier
        }
