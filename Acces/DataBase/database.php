
<?php
// ==================== database/database.php ====================
// Configuration de la  base de donnees 


$host = 'localhost';
$dbname = 'maudits_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Connexion .";
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}


