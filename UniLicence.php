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
    <title>Licences </title>
</head>
<body>
<?php

$sql = "SELECT * FROM licences";
$result = $mysqli->query($sql);


if ($result->num_rows > 0){

echo "<table>";
echo "<tr><th>N° Licence</th></tr>";

while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $row["NumLicence"] . "</td>";
    echo "</tr>";
}

echo "</table>";
}
$sql = "SELECT * FROM utilisateur";
$result = $mysqli->query($sql);

if ($result->num_rows > 0){

    echo "<table>";
    echo "<tr><th>Nom</th><th>Prenom</th><th>Date de Naissance</th></tr>";

while($row = $result->fetch_assoc()){
   

    echo "<td>" . $row["UtilNom"] . "</td>";
    echo "<td>" . $row["UtilPrenom"] . "</td>";
    echo "<td>" . $row["UtilDateNaissance"] . "</td>";
    echo "<td>" . $row["UtilSexe"] . "</td>";
    echo "<td>" . $row["UtilCategorie"] . "</td>";
    echo "<td>" . $row["UtilPosition"] . "</td>";

    echo "<td>" . $row["UtilAdresse"] . "</td>";
    echo "<td>" . $row["UtilTelephone"] . "</td>";
    echo "<td>" . $row["UtilEmail"] . "</td>";
    echo "<td>" . $row["UtilNationalite"] . "</td>";
    echo "<td>" . $row["UtilClassification"] . "</td>";
    echo "<td>" . $row["UtilFinValidContrat"] . "</td><br>";
}
} else {
echo "aucun résultats trouvé";
}


$mysqli->close();

?>

<a href="licences_visualisation.php" class="btn btn-primary">Licences</a>
</body>
</html>