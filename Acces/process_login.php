<?php
// ==================== Acces/process_login.php ====================
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    
    // Validation
    if(empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs";
        header('Location: ../login.php');
        exit();
    }
    
    // Connexion à la base de données
    require_once 'DataBase/database.php';
    
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if($user && password_verify($password, $user['password'])) {
        // Régénérer l'ID de session pour la sécurité
        session_regenerate_id(true);
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['prenom'] . ' ' . $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_email'] = $user['email'];
        
        if($remember) {
            $token = bin2hex(random_bytes(32));
            setcookie('remember_token', $token, time() + (86400 * 30), "/");
        }
        
        header('Location: ../index.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Email ou mot de passe incorrect";
        header('Location: ../login.php');
        exit();
    }
}
