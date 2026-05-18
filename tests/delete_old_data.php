<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formatech";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour supprimer les données de plus d'un an
$sql = "DELETE FROM `utilisateur` WHERE `date_creation` < NOW() - INTERVAL 1 YEAR";

// NOW donne la date actuelle

if ($conn->query($sql) === TRUE) {
    echo "Données supprimées avec succès";
} else {
    echo "Erreur lors de la suppression des données: " . $conn->error;
}
$conn->close();
?>