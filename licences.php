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
    <h1> création d'un nouveau licencié </h1>

    <form action="traitement_licence.php" method="post">

        <label class="form-label" for="numNewLicence">Création avec un numéro de licence :</label>
        <input  class="form-control" type="number" id="numNewLicence" name="numNewLicence" required>
        <br>

        <h1> Mutation inter comité </h1>

        <label class="form-label" for="numlicenceCom">N° licence :</label>
        <input  class="form-control" type="number" id="numlicenceCom" name="numlicenceCom" required>

        <label class="form-label" for="nom">Nom :</label>
        <input  class="form-control" type="text" id="nom" name="nom" required>
        <br>

        <input type="submit" class="btn btn-primary" value="Envoyer">
        <button onclick="window.location.href='page_suivante.html'" >Aller à la page suivante</button>
       
    </form>
 
</body>
</html>