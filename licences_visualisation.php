<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: index.php");
    exit();
}

require_once './Controller/DAOConnect.php';
require_once './assets/header.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HELLO</h1>
</body>
</html>
