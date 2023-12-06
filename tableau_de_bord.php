<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit();
}

require_once './config/config.php';
require_once './assets/header.php';


$utilisateur_id = $_SESSION['utilisateur_id'];

$sql = "SELECT nom, prenom FROM utilisateurs WHERE id = $utilisateur_id";
$result = $mysqli->query($sql);

if ($result === false || $result->num_rows !== 1) {
    echo "Erreur : Utilisateur introuvable.";
    exit();
}

$row = $result->fetch_assoc();
$nom = $row['nom'];
$prenom = $row['prenom'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenue, <?php echo $prenom . ' ' . $nom; ?>, sur votre tableau de bord</h1>
        <p>Ceci est votre espace personnel où vous pouvez gérer vos données, etc.</p>
        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
    </div>

    <!-- Inclure Bootstrap JS (facultatif, mais nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
