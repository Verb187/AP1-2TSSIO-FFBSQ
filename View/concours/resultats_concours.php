<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat d'un concours - FFBSQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>Résultat d'une compétition</h2>
<form action="traitement.php" method="post">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nom">Nom de la compétition :</label>
            <select id="club_organisateur" name="club_organisateur" class="form-select" required>
                <option value="">Sélectionner un concours</option>
                <?php
                require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));
                $controller = new ConcoursController();
                $result = $controller->getConcours();
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['club_organisateur'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <!-- Champ caché pour transmettre l'ID du concours sélectionné -->
    <input type="hidden" name="id_concours" id="id_concours">
    <button class="btn btn-primary" type="submit">Voir les résultats</button>
</form>

<script>
    // Récupérer l'élément select
    var selectElement = document.getElementById('club_organisateur');
    // Récupérer l'élément champ caché
    var idConcoursInput = document.getElementById('id_concours');

    // Ajouter un écouteur d'événements sur le changement de sélection
    selectElement.addEventListener('change', function() {
        // Récupérer la valeur sélectionnée
        var selectedValue = selectElement.value;
        // Mettre à jour la valeur de l'ID du concours dans le champ caché
        idConcoursInput.value = selectedValue;
    });
</script>
