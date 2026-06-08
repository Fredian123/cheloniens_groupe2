<?php
// Secure database connection with PDO

$host = 'localhost';
$dbname = 'cheloniens';
$user = 'root';
$password = 'root';

// $pdo = new PDO('mariadb:host=root;dbname=cheloniens', 'root', 'root');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Using prepared statements to prevent SQL injection
    $stmt = $pdo->prepare("INSERT INTO cheloniensmartinique (localisation, date_observation, meteo, nombre_tortues, profondeur, photos, commentaires) VALUES (:localisation, :date_observation, :meteo, :nombre_tortues, :profondeur, :photos, :commentaires)");
    $stmt->execute([
        ':localisation' => $_POST['localisation'], 
        ':date_observation' => $_POST['date_observation'],
        ':meteo' => $_POST['meteo'],
        ':nombre_tortues' => $_POST['nombre_tortues'],
        ':profondeur' => $_POST['profondeur'],
        ':photos' => $_POST['photos'],
        ':commentaires' => $_POST['commentaires']
    ]);
    
    echo "Données enregistrées avec succès";
}
?>   




