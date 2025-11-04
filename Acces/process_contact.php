
<?php
// ==================== Acces/process_contact.php ====================
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Validation
    if(empty($name) || empty($email) || empty($subject) || empty($message)) {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs";
        header('Location: ../contact.php');
        exit();
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Adresse email invalide";
        header('Location: ../contact.php');
        exit();
    }
    
    // Connexion à la base de données
    require_once 'DataBase/database.php';
    
    $sql = "INSERT INTO contact_messages (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    
    if($stmt->execute([$name, $email, $subject, $message])) {
        $_SESSION['success_message'] = "Votre message a été envoyé avec succès! Nous vous répondrons dans les plus brefs délais.";
        header('Location: ../contact.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Une erreur est survenue lors de l'envoi du message";
        header('Location: ../contact.php');
        exit();
    }
}

