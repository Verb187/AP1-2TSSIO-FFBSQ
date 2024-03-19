<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit();
}

require_once './Controller/DAOConnect.php';

$utilisateur_id = $_SESSION['utilisateur_id'];

// Récupérer la date et l'heure de la dernière connexion de l'utilisateur depuis la base de données
$sql_last_login = "SELECT derniere_connexion FROM utilisateurs WHERE id = $utilisateur_id";
$result_last_login = $mysqli->query($sql_last_login);

if ($result_last_login === false || $result_last_login->num_rows !== 1) {
    echo "Erreur : Impossible de récupérer la dernière connexion de l'utilisateur.";
    exit();
}

$row_last_login = $result_last_login->fetch_assoc();
$derniere_connexion = $row_last_login['derniere_connexion'];

// Stocker la date et l'heure de la dernière connexion dans la session
$_SESSION['derniere_connexion'] = $derniere_connexion;

// Récupérer le nom et le prénom de l'utilisateur depuis la base de données
$sql_user_info = "SELECT nom, prenom FROM utilisateurs WHERE id = $utilisateur_id";
$result_user_info = $mysqli->query($sql_user_info);

if ($result_user_info === false || $result_user_info->num_rows !== 1) {
    echo "Erreur : Utilisateur introuvable.";
    exit();
}

$row_user_info = $result_user_info->fetch_assoc();
$nom = $row_user_info['nom'];
$prenom = $row_user_info['prenom'];

// Stocker le nom et le prénom de l'utilisateur dans la session
$_SESSION['nom_utilisateur'] = $nom;
$_SESSION['prenom_utilisateur'] = $prenom;

// Inclure l'en-tête
require_once './assets/header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenue, <?php echo $prenom . ' ' . $nom; ?>, sur votre tableau de bord</h1>
        <p>Ceci est votre espace personnel où vous pouvez gérer vos données, etc.</p>
        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dernières actualités</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget felis nec metus aliquet placerat.
                        </p>
                        <a href="#" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Événements à venir</h5>
                        <p class="card-text">
                            Ut in nulla enim. Sed et risus quis nibh bibendum tristique.
                        </p>
                        <a href="#" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclure Bootstrap JS (facultatif, mais nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
