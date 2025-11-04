<?php
// session_start();

// Si l'utilisateur est déjà connecté, redirection vers l'accueil
if(isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$pageTitle = "Connexion - MAUDITS";
$currentPage = "login";
$customCSS = "css/connexion.css";
$customJS = "script/login.js";
include 'includes/header.php';
include 'Acces/process_login.php';
?>

    <!-- Section de connexion -->
    <section class="py-12 md:py-16 bg-gray-50 flex-grow">
        <div class="container mx-auto px-4 max-w-md">
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-10 fade-in">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold mb-2">CONNEXION</h2>
                    <p class="text-gray-600">Accédez à votre compte MAUDITS</p>
                </div>
                
                <?php
                // Affichage des messages d'erreur ou de succès
                if(isset($_SESSION['error_message'])):
                ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <?php 
                        echo $_SESSION['error_message']; 
                        unset($_SESSION['error_message']);
                        ?>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['success_message'])): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <?php 
                        echo $_SESSION['success_message']; 
                        unset($_SESSION['success_message']);
                        ?>
                    </div>
                <?php endif; ?>
                
                <form id="login-form" method="POST" action="process_login.php" class="space-y-6">
                    <div>
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="exemple@email.com" required>
                    </div>
                    
                    <div class="password-container">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-input pr-12" placeholder="Votre mot de passe" required>
                        <span class="password-toggle" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <label class="checkbox-container">Se souvenir de moi
                            <input type="checkbox" id="remember" name="remember">
                            <span class="checkmark"></span>
                        </label>
                        
                        <a href="forgot_password.php" class="text-sm text-black font-medium hover:underline">Mot de passe oublié?</a>
                    </div>
                    
                    <button type="submit" class="btn-primary mt-2">
                        SE CONNECTER
                    </button>
                </form>
                
                <div class="divider my-8">Ou</div>
                
                <div class="grid grid-cols-1 gap-3">
                    <button class="social-btn">
                        <i class="fab fa-google text-red-500 mr-3"></i>
                        Se connecter avec Google
                    </button>
                    <button class="social-btn">
                        <i class="fab fa-facebook-f text-blue-600 mr-3"></i>
                        Se connecter avec Facebook
                    </button>
                </div>
                
                <div class="mt-8 text-center">
                    <p class="text-gray-600">Vous n'avez pas de compte? <a href="register.php" class="text-black font-medium hover:underline">Créer un compte</a></p>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>