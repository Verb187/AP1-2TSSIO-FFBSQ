<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['utilisateur_id'])) {
    // Rediriger vers le tableau de bord si l'utilisateur est déjà connecté
    header("Location: tableau_de_bord.php");
    exit();
}

require_once './config/config.php';

// Vérifier si le formulaire d'inscription a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $email = $_POST['email'];

    // Vérifier si l'utilisateur existe déjà
    $sql = "SELECT id FROM utilisateurs WHERE login = '$login' OR email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        echo "L'utilisateur avec le même nom d'utilisateur ou la même adresse e-mail existe déjà.";
    } else {
        // Hasher le mot de passe (assurez-vous d'utiliser des méthodes de hachage sécurisées en production)
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $insert_sql = "INSERT INTO utilisateurs (nom, prenom, login, mot_de_passe, email) 
                       VALUES ('$nom', '$prenom', '$login', '$hashed_password', '$email')";

        if ($mysqli->query($insert_sql)) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription : " . $mysqli->error;
        }
    }

    // Fermer la connexion à la base de données
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion/inscription - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Onglets de navigation pour la connexion et l'inscription -->
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="connexion-tab" data-bs-toggle="tab" href="#connexion" role="tab" aria-controls="connexion" aria-selected="true">Connexion</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="inscription-tab" data-bs-toggle="tab" href="#inscription" role="tab" aria-controls="inscription" aria-selected="false">Inscription</a>
                    </li>
                </ul>

                <!-- Contenu des onglets -->
                <div class="tab-content mt-3" id="myTabsContent">
                    <!-- Onglet Connexion -->
                    <div class="tab-pane fade show active" id="connexion" role="tabpanel" aria-labelledby="connexion-tab">
                        <form action="connexion.php" method="post">
                            <h2 class="mb-3">Connexion</h2>
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" class="form-control" name="login" id="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </form>
                    </div>

                    <!-- Onglet Inscription -->
                    <div class="tab-pane fade" id="inscription" role="tabpanel" aria-labelledby="inscription-tab">
                        <form action="" method="post">
                            <h2 class="mb-3">Inscription</h2>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" required>
                            </div>
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" class="form-control" name="login" id="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclure Bootstrap JS (facultatif, mais nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
