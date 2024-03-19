<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajoutez d'autres liens CSS ou balises meta au besoin -->
</head>
<body>
<<<<<<< Updated upstream
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">FFBSQ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Ajoutez des liens de navigation ici, par exemple : -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tableau de bord</a>
                    </li> 
                    <!-- deconnexion.php a droite -->
                    <li class="nav-item">
                        <a class="nav-link" href="./deconnexion.php">Se déconnecter</a>
                    </li>
                    <!-- Vous pouvez ajouter d'autres liens de navigation selon vos besoins -->
                </ul>
=======

<div class="container-fluid bg-dark text-white py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Compte connecté -->
                <span>Compte connecté: <strong><?php echo $_SESSION['prenom_utilisateur'] . ' ' . $_SESSION['nom_utilisateur']; ?></strong></span>
            </div>
            <div class="col-md-6 text-end">
                <!-- Date et heure de connexion -->
                <span>Date et heure de connexion: <strong><?php echo isset($_SESSION['derniere_connexion']) ? $_SESSION['derniere_connexion'] : 'N/A'; ?></strong></span>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>
</div>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light flex-column">
    <div class="container">
        <a class="navbar-brand" href="#">FFBSQ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Ajoutez des liens de navigation ici, par exemple : -->
                <li class="nav-item">
                    <a class="nav-link" href="tableau_de_bord.php">Tableau de bord</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="licences.php">Licences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="concours.php">Concours</a>
                </li>
                <!-- deconnexion.php à droite -->
                <li class="nav-item mt-auto"> <!-- Utilisez mt-auto pour aligner le lien de déconnexion en bas -->
                    <a class="nav-link" href="./deconnexion.php">Se déconnecter</a>
                </li>
                <!-- Vous pouvez ajouter d'autres liens de navigation selon vos besoins -->
            </ul>
        </div>
    </div>
</nav>

<!-- Contenu principal commence ici -->
<div class="container mt-5">
<!-- Insérez votre contenu principal ici -->
</div>

<!-- Ajouter des scripts JavaScript pour le menu dynamique -->
<script>
    // Code JavaScript pour le menu dynamique
    // Par exemple, détecter la fenêtre active et mettre en surbrillance le lien correspondant dans le menu
</script>
</body>
</html>
