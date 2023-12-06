<?php
require_once './config/config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['UtilLogin'];
    $mot_de_passe = $_POST['UtilPassword'];

    $sql = "SELECT UtilID, UtilPassword FROM utilisateur WHERE UtilLogin = '$login'";
    $result = $mysqli->query($sql);
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['UtilPassword'];

        if (password_verify($mot_de_passe, $hashed_password)) {
            $_SESSION['utilisateur_id'] = $row['UtilID'];
            header("Location: tableau_de_bord.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Login incorrect.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
