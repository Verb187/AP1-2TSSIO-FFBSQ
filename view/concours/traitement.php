<?php
require_once '../assets/header.php';
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

$id_concours = $_GET['id_concours'];

$controller = new ConcoursController();
$concours = $controller->getConcoursById($id_concours);

// Déterminez le nombre de finalistes et de vainqueurs en fonction du type de concours
$nb_finalistes = 2; // Par défaut
$nb_vainqueurs = 2; // Par défaut

if ($concours['nature'] === 'doublette') {
    $nb_finalistes = 2;
    $nb_vainqueurs = 2;
    $nb_demis_finalistes = 2;
} elseif ($concours['nature'] === 'triplette') {
    $nb_finalistes = 3;
    $nb_vainqueurs = 3;
    $nb_demis_finalistes = 3;
} elseif ($concours['nature'] === 'individuel') {
    $nb_finalistes = 1;
    $nb_vainqueurs = 1;
    $nb_demis_finalistes = 1;
}

// Déterminez les points en fonction de la grille de points B ou C
$grille_points = $concours['grille_points'];
$points_gagnant = 0;
$points_finaliste = 0;
$points_demi_finaliste = 0;

if ($grille_points === 'B') {
    if ($concours['nombre_equipes'] > 64) {
        $points_gagnant = 8;
        $points_finaliste = 6;
        $points_demi_finaliste = 4;
    } elseif ($concours['nombre_equipes'] > 32) {
        $points_gagnant = 6;
        $points_finaliste = 4;
        $points_demi_finaliste = 2;
    } elseif ($concours['nombre_equipes'] > 16) {
        $points_gagnant = 4;
        $points_finaliste = 3;
    } else {
        $points_gagnant = 2;
        $points_finaliste = 1;
    }
} elseif ($grille_points === 'C') {
    if ($concours['nombre_equipes'] > 64) {
        $points_gagnant = 5;
        $points_finaliste = 4;
        $points_demi_finaliste = 3;
    } elseif ($concours['nombre_equipes'] > 32) {
        $points_gagnant = 4;
        $points_finaliste = 3;
        $points_demi_finaliste = 2;
    } elseif ($concours['nombre_equipes'] > 16) {
        $points_gagnant = 3;
        $points_finaliste = 2;
    } else {
        $points_gagnant = 2;
        $points_finaliste = 1;
    }
}

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données saisies
    $vainqueurs = $_POST['vainqueurs'];
    $finalistes = $_POST['finalistes'];
    $demi_finalistes = $_POST['demi_finalistes'];

    // Enregistrement des résultats (vous devez implémenter cette fonction dans votre contrôleur)
    $controller->enregistrerResultats($id_concours, $vainqueurs, $finalistes, $demi_finalistes);

    // Redirection vers une page de confirmation ou autre
    header("Location: page_confirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des résultats</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Saisie des résultats du concours n°<?php echo $id_concours; ?></h1>
            <form action="" method="POST">
                <h2>Vainqueurs</h2>
                <?php for ($i = 1; $i <= $nb_vainqueurs; $i++): ?>
                    <div>
                        <label for="vainqueur_<?php echo $i; ?>">Vainqueur <?php echo $i; ?> :</label>
                        <input type="text" name="vainqueurs[]" id="vainqueur_<?php echo $i; ?>" required>
                        <label for="points_vainqueur_<?php echo $i; ?>">Points :</label>
                        <input type="number" name="points_vainqueurs[]" id="points_vainqueur_<?php echo $i; ?>" value="<?php echo $points_gagnant; ?>" readonly>
                    </div>
                <?php endfor; ?>

                <h2>Finalistes</h2>
                <?php for ($i = 1; $i <= $nb_finalistes; $i++): ?>
                    <div>
                        <label for="finaliste_<?php echo $i; ?>">Finaliste <?php echo $i; ?> :</label>
                        <input type="text" name="finalistes[]" id="finaliste_<?php echo $i; ?>" required>
                        <label for="points_finaliste_<?php echo $i; ?>">Points :</label>
                        <input type="number" name="points_finalistes[]" id="points_finaliste_<?php echo $i; ?>" value="<?php echo $points_finaliste; ?>" readonly>
                    </div>
                <?php endfor; ?>

                <?php if ($concours['nombre_equipes'] > 32): ?>
                    <h2>Demi-finalistes</h2>
                    <?php for ($i = 1; $i <= $nb_demis_finalistes; $i++): ?>
                        <div>
                            <label for="demi_finaliste_<?php echo $i; ?>">Demi-finaliste <?php echo $i; ?> :</label>
                            <input type="text" name="demi_finalistes[]" id="demi_finaliste_<?php echo $i; ?>" required>
                            <label for="points_demi_finaliste_<?php echo $i; ?>">Points :</label>
                            <input type="number" name="points_demi_finalistes[]" id="points_demi_finaliste_<?php echo $i; ?>" value="<?php echo $points_demi_finaliste; ?>" readonly>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>

                <button type="submit">Enregistrer les résultats</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
