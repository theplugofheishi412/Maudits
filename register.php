<?php
session_start();

// Si l'utilisateur est déjà connecté, redirection vers l'accueil
if(isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$pageTitle = "Inscription - MAUDITS";
$currentPage = "register";
$customCSS = "css/connexion.css";
$customJS = "script/login.js";
include 'includes/header.php';

?>

    <!-- Section d'inscription -->
    <section class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Formulaire -->
                <div class="bg-white rounded-xl shadow-lg p-8 md:p-10 fade-in">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold mb-2">CRÉER UN COMPTE</h2>
                        <p class="text-gray-600">Rejoignez la communauté MAUDITS et bénéficiez d'avantages exclusifs</p>
                    </div>

                    <?php if(isset($_SESSION['error_message'])): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <?php 
                            echo $_SESSION['error_message']; 
                            unset($_SESSION['error_message']);
                            ?>
                        </div>
                    <?php endif; ?>

                    <form id="register-form" method="POST" action="Acces/process_register.php" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" id="prenom" name="prenom" class="form-input" placeholder="Votre prénom" required>
                            </div>
                            <div>
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" id="nom" name="nom" class="form-input" placeholder="Votre nom" required>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="exemple@email.com" required>
                        </div>

                        <div class="password-container">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-input pr-12" placeholder="Créez un mot de passe" required>
                            <span class="password-toggle" id="togglePassword">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>

                        <div class="password-container">
                            <label for="confirm-password" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" id="confirm-password" name="confirm_password" class="form-input pr-12" placeholder="Confirmez votre mot de passe" required>
                            <span class="password-toggle" id="toggleConfirmPassword">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>

                        <div class="flex items-start space-x-3 pt-2">
                            <input type="checkbox" id="terms" name="terms" class="form-checkbox mt-1" required>
                            <label for="terms" class="text-gray-700 text-sm">J'accepte les <a href="#" class="text-black font-medium hover:underline">conditions générales</a> et la <a href="#" class="text-black font-medium hover:underline">politique de confidentialité</a></label>
                        </div>

                        <div class="flex items-start space-x-3 pt-2">
                            <input type="checkbox" id="newsletter" name="newsletter" class="form-checkbox mt-1">
                            <label for="newsletter" class="text-gray-700 text-sm">Je souhaite m'abonner à la newsletter pour recevoir des offres exclusives</label>
                        </div>

                        <button type="submit" class="btn-primary mt-2">
                            CRÉER MON COMPTE
                        </button>
                    </form>

                    <div class="divider my-8">Ou</div>

                    <div class="grid grid-cols-1 gap-3">
                        <button class="social-btn">
                            <i class="fab fa-google text-red-500 mr-3"></i>
                            S'inscrire avec Google
                        </button>
                        <button class="social-btn">
                            <i class="fab fa-facebook-f text-blue-600 mr-3"></i>
                            S'inscrire avec Facebook
                        </button>
                    </div>

                    <div class="mt-8 text-center">
                        <p class="text-gray-600">Vous avez déjà un compte? <a href="login.php" class="text-black font-medium hover:underline">Connectez-vous</a></p>
                    </div>
                </div>

                <!-- Avantages -->
                <div class="fade-in">
                    <div class="bg-black text-white rounded-xl p-8 md:p-10 mb-8">
                        <h3 class="text-2xl font-bold mb-6">POURQUOI NOUS REJOINDRE ?</h3>
                        <div class="space-y-6">
                            <?php
                            $avantages = [
                                [
                                    'icon' => 'fa-history',
                                    'titre' => 'Historique de commandes',
                                    'description' => 'Accédez à tout votre historique d\'achats en un clic'
                                ],
                                [
                                    'icon' => 'fa-gift',
                                    'titre' => 'Offres exclusives',
                                    'description' => 'Bénéficiez d\'avantages réservés aux membres'
                                ],
                                [
                                    'icon' => 'fa-heart',
                                    'titre' => 'Wishlist personnelle',
                                    'description' => 'Enregistrez vos articles préférés pour plus tard'
                                ],
                                [
                                    'icon' => 'fa-bolt',
                                    'titre' => 'Checkout rapide',
                                    'description' => 'Finalisez vos achats plus rapidement'
                                ]
                            ];
                            
                            foreach($avantages as $avantage): ?>
                                <div class="feature-card flex items-start">
                                    <div class="bg-white bg-opacity-20 rounded-full w-10 h-10 flex items-center justify-center mr-4 flex-shrink-0">
                                        <i class="fas <?php echo $avantage['icon']; ?>"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-1"><?php echo $avantage['titre']; ?></h4>
                                        <p class="text-gray-300 text-sm"><?php echo $avantage['description']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="bg-gray-100 rounded-xl p-6">
                        <h4 class="font-bold text-lg mb-4">DÉJÀ PLUS DE 50 000 MEMBRES</h4>
                        <div class="flex items-center">
                            <div class="flex -space-x-3 mr-4">
                                <div class="w-10 h-10 rounded-full bg-gray-300 border-2 border-white"></div>
                                <div class="w-10 h-10 rounded-full bg-gray-400 border-2 border-white"></div>
                                <div class="w-10 h-10 rounded-full bg-gray-500 border-2 border-white"></div>
                                <div class="w-10 h-10 rounded-full bg-gray-600 border-2 border-white text-white flex items-center justify-center text-xs">+50k</div>
                            </div>
                            <p class="text-gray-600 text-sm">Rejoignez notre communauté de passionnés de mode audacieuse</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>