<?php
require_once (realpath(dirname(__FILE__) . '/../assets/header.php'));

require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerLicences.php'));

$controller = new LicencesController();

$licences = $controller->getLicencie();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualiser les licenciés - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-12 text-center">
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Liste des licenciés</h2>
    <?php
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $licences = $controller->searchLicencie($search);
    } else {
        $licences = $controller->getLicencie();
    }
    ?>

    <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Rechercher un licencié" name="search">
            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
        </div>
    </form>





        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numéro licence</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Club</th>
                    <th scope="col">Année de reprise</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($licences as $licence) : ?>
                    <tr>
                        <td><?php echo $licence['numlicencie']; ?></td>
                        <td><?php echo $licence['nomlicencie']; ?></td>
                        <td><?php echo $licence['prenomlicencie']; ?></td>
                        <td><?php echo $licence['numeroaffiliation']; ?></td>
                        <td><?php echo $licence['annee_reprise']; ?></td>
                        <td>
                            <button onclick="loadContent('uniLicencie.php?id=<?php echo $licence['numlicencie']; ?>')" class="btn btn-primary">Modifier</button> 
                            <button onclick="loadContent('qrCode.php?id=<?php echo $licence['numlicencie']; ?>')" class="btn btn-primary">QR Code</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="content" class="mt-5">
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function loadContent(url) {
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content').innerHTML = data;
                })
                .catch(error => console.log('Erreur :', error));
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
