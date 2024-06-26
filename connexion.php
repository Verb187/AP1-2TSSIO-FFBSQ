<?php
require_once './config/config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $mot_de_passe = $_POST['password'];

    $sql = "SELECT id, mot_de_passe FROM utilisateurs WHERE login = '$login'";
    $result = $mysqli->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['mot_de_passe'];

        if (password_verify($mot_de_passe, $hashed_password)) {
            $_SESSION['utilisateur_id'] = $row['id'];
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
