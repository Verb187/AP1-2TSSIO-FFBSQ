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
    <title>Tableau de bord - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Création d'un nouveau licencié</h1>

    <form action="traitement_licence.php" method="post" id="creation">

        <label class="form-label" for="NumLicenceCreation">Création avec un numéro de licence :</label>
        <input class="form-control" type="number" id="NumLicenceCreation" name="NumLicence">
        <input type="hidden" name="action" value="creation"> <!-- Champ caché pour l'action -->
        <br>
        <input type="submit" class="btn btn-primary" value="Envoyer">
    </form>

    <form action="traitement_licence.php" method="post" id="mutation">
        <h1>Mutation inter comité</h1>

        <label class="form-label" for="NumLicenceMutation">N° licence :</label>
        <input class="form-control" type="number" id="NumLicenceMutation" name="NumLicence">

        <label class="form-label" for="nom">Nom :</label>
        <input class="form-control" type="text" id="nom" name="nom">
        <input type="hidden" name="action" value="mutation"> <!-- Champ caché pour l'action -->
        <br>

        <input type="submit" class="btn btn-primary" value="Envoyer">
        <button onclick="window.location.href='licences_visualisation.php'" class="btn btn-primary">Licences</button>
    </form>
 
</body>
</html>
