<?php 
require_once './config/config.php';

session_start();

$result = false; // Initialiser $result

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'creation') {
            // Traitement pour le formulaire 1
            $NumLicence = $_POST['NumLicence'];
            $nom = $_POST['nom']; // Ajout de cette ligne pour définir $nom
            $sql = "INSERT INTO licences (NumLicence, nom) VALUES ('$NumLicence', '$nom')";
            $result = $mysqli->query($sql);
        } elseif ($_POST['action'] === 'mutation') {
            // Traitement pour le formulaire 2
            $NumLicence = $_POST['NumLicence'];
            $nom = $_POST['nom'];
            $stmt = $mysqli->prepare("UPDATE licences SET nom = ? WHERE NumLicence = ?");
            $stmt->bind_param("ss", $nom, $NumLicence);
            $stmt->execute();
            $stmt->close();
            header("Location: licences.php");
            exit();
        }
    } else {
        // Aucun formulaire soumis
        echo "Aucun formulaire soumis.";
    }

    if ($result) {
        // Redirection vers licences.php
        header("Location: licences.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    }
}
