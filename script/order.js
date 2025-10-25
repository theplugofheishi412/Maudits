  // Script pour le menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Fonction pour mettre à jour la quantité
        function updateQuantity(itemId, change) {
            const quantityInput = document.getElementById(`quantity-${itemId}`);
            let quantity = parseInt(quantityInput.value);
            quantity += change;
            
            if (quantity < 1) quantity = 1;
            
            quantityInput.value = quantity;
            updateCartTotal();
        }
        
        // Fonction pour supprimer un article
        function removeItem(itemId) {
            const item = document.querySelector(`#quantity-${itemId}`).closest('.cart-item');
            item.style.opacity = '0';
            item.style.transform = 'translateX(50px)';
            
            setTimeout(() => {
                item.remove();
                updateCartTotal();
                
                // Si le panier est vide, afficher le message
                if (document.querySelectorAll('.cart-item').length === 0) {
                    showEmptyCart();
                }
            }, 300);
        }
        
        // Fonction pour mettre à jour le total du panier
        function updateCartTotal() {
            // Cette fonction mettrait à jour le total en fonction des quantités
            // Pour l'instant, c'est une implémentation simplifiée
            console.log("Mise à jour du total du panier...");
        }
        
        // Fonction pour afficher le panier vide
        function showEmptyCart() {
            const cartContainer = document.querySelector('.lg:w-2/3');
            cartContainer.innerHTML = `
                <div class="bg-white rounded-lg shadow-md p-6 empty-cart fade-in">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">VOTRE PANIER EST VIDE</h3>
                    <p class="text-gray-600 mb-6">Découvrez nos nouvelles collections et trouvez votre style MAUDITS.</p>
                    <a href="index.html" class="checkout-btn inline-block w-auto px-8">DÉCOUVRIR LES COLLECTIONS</a>
                </div> `;
        }