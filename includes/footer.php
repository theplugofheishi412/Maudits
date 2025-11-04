<!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold mb-4">MAUDITS</h3>
                    <p class="mb-4">Marque de mode audacieuse pour ceux qui osent se démarquer.</p>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/people/Authentique-Club/61567378367105/" target="_blank" class="hover:text-gray-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/maudit.orn/" target="_blank" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@maudit.orn" target="_blank" class="hover:text-gray-300"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                
                <!-- Liens -->
                <div>
                    <h3 class="text-xl font-bold mb-4">LIENS RAPIDES</h3>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="hover:text-gray-300 transition">Accueil</a></li>
                        <li><a href="boutique.php" class="hover:text-gray-300 transition">Boutique</a></li>
                        <li><a href="nouveaute.php" class="hover:text-gray-300 transition">Nouveautés</a></li>
                        <li><a href="collections.php" class="hover:text-gray-300 transition">Collections</a></li>
                        <li><a href="contact.php" class="hover:text-gray-300 transition">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Service -->
                <div>
                    <h3 class="text-xl font-bold mb-4">SERVICE CLIENT</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-300 transition">Mon compte</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">Suivi de commande</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">Livraison & Retours</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">Politique de confidentialité</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h3 class="text-xl font-bold mb-4">CONTACT</h3>
                    <address class="not-italic">
                        <p class="mb-2">123 Rue de la Mode</p>
                        <p class="mb-2">75000 Libreville,Gabon</p>
                        <p class="mb-2">Email: contact@maudits.com</p>
                        <p>Tél: +241 (0) 77 00 00 00</p>
                    </address>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> MAUDITS. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <?php if(isset($customJS)): ?>
        <script src="<?php echo $customJS; ?>"></script>
    <?php endif; ?>
</body>
</html>