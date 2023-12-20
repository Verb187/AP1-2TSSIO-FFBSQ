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
    <title>Licences</title>
</head>
<body>
    <h1>Récapitulation des licences :</h1>

    <?php
    $sql = "SELECT * FROM licences";
    $result = $mysqli->query($sql);
    

    if ($result->num_rows > 0){

   
    echo "<table>";
    echo "<tr><th>N° Licence</th><th> </th><th>Nom</th></tr>";

    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row["NumLicence"] . "</td>";
        echo "<td><td><a href='UniLicence.php?NumLicence=" . $row["NumLicence"] . "'>" . $row["LicenceNom"] . "</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "aucun résultats trouvé ";
    echo "<br>";
}

$mysqli->close();
    ?>
    <a href="licences.php" class="btn btn-primary">retour</a>
</body>
</html>
