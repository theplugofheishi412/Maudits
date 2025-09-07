  // Script pour le menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Compte à rebours
        function updateCountdown() {
            // Date cible : 7 jours à partir de maintenant
            const targetDate = new Date();
            targetDate.setDate(targetDate.getDate() + 7);
            
            const now = new Date();
            const difference = targetDate - now;
            
            if (difference <= 0) {
                document.getElementById('days').textContent = '00';
                document.getElementById('hours').textContent = '00';
                document.getElementById('minutes').textContent = '00';
                document.getElementById('seconds').textContent = '00';
                return;
            }
            
            const days = Math.floor(difference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);
            
            document.getElementById('days').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }
        
        // Mettre à jour le compte à rebours toutes les secondes
        setInterval(updateCountdown, 1000);
        updateCountdown(); // Initialisation
        
        // Filtrage des produits
        const tabs = document.querySelectorAll('.tab');
        const products = document.querySelectorAll('.product-card');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Retirer la classe active de tous les onglets
                tabs.forEach(t => t.classList.remove('active'));
                // Ajouter la classe active à l'onglet cliqué
                tab.classList.add('active');
                
                const filter = tab.getAttribute('data-filter');
                
                // Filtrer les produits
                products.forEach(product => {
                    if (filter === 'all') {
                        product.style.display = 'block';
                    } else {
                        if (product.getAttribute('data-category') === filter) {
                            product.style.display = 'block';
                        } else {
                            product.style.display = 'none';
                        }
                    }
                });
            });
        });
        
        // Fonction pour ajouter au panier
        function addToCart(productId) {
            alert('Produit ' + productId + ' ajouté au panier!');
            // En réalité, ici vous mettriez à jour le panier
        }