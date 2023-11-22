<?php
require_once './config/config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numNewLicence = $_POST['numNewLicence'];
    $numlicenceCom = $_POST['numlicenceCom'];
    $nom = $_POST['nom'];

    $sql = "INSERT INTO licences (numNewLicence, numlicenceCom, nom) VALUES ('$numNewLicence', '$numlicenceCom', '$nom')";
    $result = $mysqli->query($sql);

    if ($result) {
        // Redirection vers licences.php
        header("Location: licences.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    }
}

