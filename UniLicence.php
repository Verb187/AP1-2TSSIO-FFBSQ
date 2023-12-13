<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit();
}

require_once './config/config.php';
require_once './assets/header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations personnelles</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Informations personnelles</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Login</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date d'inscription</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Position</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Nationalité</th>
                    <th scope="col">Classification</th>
                    <th scope="col">Fin du contrat</th>
                    <th scope="col">Date de naissance</th>
                </tr>
            </thead>
            
            <tbody>
            <a href="licences_visualisation.php" class="btn btn-primary">retour</a>
                <?php
                // Connectez-vous à votre base de données et exécutez la requête pour récupérer les utilisateurs
                require_once './config/config.php';
                $sql = "SELECT * FROM utilisateur";
                $result = $mysqli->query($sql);

                // Parcourez les résultats et affichez chaque utilisateur dans une ligne du tableau
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['UtilNom'] . '</td>';
                    echo '<td>' . $row['UtilPrenom'] . '</td>';
                    echo '<td>' . $row['UtilLogin'] . '</td>';
                    echo '<td>' . $row['UtilEmail'] . '</td>';
                    echo '<td>' . $row['UtilDateInscription'] . '</td>';
                    echo '<td>' . $row['UtilAdmin'] . '</td>';
                    echo '<td>' . $row['UtilSexe'] . '</td>';
                    echo '<td>' . $row['UtilCategorie'] . '</td>';
                    echo '<td>' . $row['UtilPosition'] . '</td>';
                    echo '<td>' . $row['UtilAdresse'] . '</td>';
                    echo '<td>' . $row['UtilTelephone'] . '</td>';
                    echo '<td>' . $row['UtilNationalite'] . '</td>';
                    echo '<td>' . $row['UtilClassification'] . '</td>';
                    echo '<td>' . $row['UtilFinValidContrat'] . '</td>';
                    echo '<td>' . $row['UtilDateNaissance'] . '</td>';
                    echo '</tr>';
                }

                // Fermez la connexion à la base de données
                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Inclure Bootstrap JS (facultatif, mais nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

