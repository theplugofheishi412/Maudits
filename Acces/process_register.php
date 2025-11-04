
<?php
// ==================== Acces/process_register.php ====================
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $terms = isset($_POST['terms']);
    $newsletter = isset($_POST['newsletter']);
    
    // Validation
    if(empty($prenom) || empty($nom) || empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs obligatoires";
        header('Location: ../register.php');
        exit();
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Adresse email invalide";
        header('Location: ../register.php');
        exit();
    }
    
    if($password !== $confirm_password) {
        $_SESSION['error_message'] = "Les mots de passe ne correspondent pas";
        header('Location: ../register.php');
        exit();
    }
    
    if(strlen($password) < 8) {
        $_SESSION['error_message'] = "Le mot de passe doit contenir au moins 8 caractères";
        header('Location: ../register.php');
        exit();
    }
    
    if(!$terms) {
        $_SESSION['error_message'] = "Vous devez accepter les conditions générales";
        header('Location: ../register.php');
        exit();
    }
    
    // Connexion à la base de données
    require_once 'DataBase/database.php';
    
    // Vérifier si l'email existe déjà
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    
    if($stmt->fetch()) {
        $_SESSION['error_message'] = "Cette adresse email est déjà utilisée";
        header('Location: ../register.php');
        exit();
    }
    
    // Créer le compte
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (prenom, nom, email, password, newsletter, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    
    if($stmt->execute([$prenom, $nom, $email, $hashed_password, $newsletter ? 1 : 0])) {
        $_SESSION['success_message'] = "Votre compte a été créé avec succès! Vous pouvez maintenant vous connecter.";
        header('Location: ../login.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Une erreur est survenue lors de la création du compte";
        header('Location: ../register.php');
        exit();
    }
}

