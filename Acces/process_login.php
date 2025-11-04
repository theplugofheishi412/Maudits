<?php
// ==================== process_login.php ====================
// Ce fichier traite la connexion des utilisateurs

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    
    // Validation
    if(empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs";
        header('Location: login.php');
        exit();
    }
    
    // TODO: Connexion à la base de données et vérification des identifiants
    // Exemple simplifié (à remplacer par une vraie connexion DB)
    
    
   require_once 'DataBase/database.php';
    
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['prenom'] . ' ' . $user['nom'];
        $_SESSION['user_email'] = $user['email'];
        
        if($remember) {
            setcookie('remember_token', $user['remember_token'], time() + (86400 * 30), "/");
        }
        
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Email ou mot de passe incorrect";
        header('Location: login.php');
        exit();
    }
    
    
    // Simulation pour l'exemple
    $_SESSION['error_message'] = "Fonctionnalité en développement - Connexion à la base de données requise";
    header('Location: login.php');
    exit();
}

