<?php
require_once (realpath(dirname(__FILE__) . '/../Modele/modeleConcours.php'));

class ConcoursController {
    public function ajouterConcours() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new ConcoursModel();

            $result = $model->ajouterConcours(
                $_POST['date'],
                $_POST['club'],
                $_POST['commentaire'],
                $_POST['grille_points'],
                $_POST['nature'],
                $_POST['niveau'],
                $_POST['categorie']
            );

            if ($result) {
                header("Location: ../view/page_success.php");
                exit();
            } else {
                echo "Erreur lors de l'insertion : " . $model->db->error;
            }
        }
    }

    public function getConcours() {
        $model = new ConcoursModel();
        return $model->getConcours();
    }

    public function getConcoursById($id) {
        $model = new ConcoursModel();
        $result = $model->getConcoursById($id);

        return $result;
    }

    public function modifierConcours() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new ConcoursModel();

            $result = $model->modifierConcours(
                $_POST['id'],
                $_POST['date'],
                $_POST['club'],
                $_POST['commentaire'],
                $_POST['grille_points'],
                $_POST['nature'],
                $_POST['niveau'],
                $_POST['categorie']
            );

            if ($result) {
                header("Location: ../view/page_success.php");
                exit();
            } else {
                echo "Erreur lors de la modification : " . $model->db->error;
            }
        }
    }

    public function resultatConcours() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST["nom"];
            $date = $_POST["date"];
            $equipes = intval($_POST["equipes"]);
            $categorie = $_POST["categorie"];

            $gagnant = 0;
            $finaliste = 0;

            if ($equipes > 64) {
                if ($categorie == "B") {
                    $gagnant = 8;
                    $finaliste = 6;
                } else {
                    $gagnant = 5;
                    $finaliste = 4;
                }
            } elseif ($equipes > 32) {
                if ($categorie == "B") {
                    $gagnant = 6;
                    $finaliste = 4;
                } else {
                    $gagnant = 4;
                    $finaliste = 3;
                }
            } elseif ($equipes > 16) {
                if ($categorie == "B") {
                    $gagnant = 4;
                    $finaliste = 3;
                } else {
                    $gagnant = 3;
                    $finaliste = 2;
                }
            } else {
                $gagnant = 2;
                $finaliste = 1;
            }

            echo "Résultats de la compétition '$nom' le $date :<br>";
            echo "Gagnant: $gagnant points<br>";
            echo "Finaliste: $finaliste points<br>";
        }
    }

    public function supprimerConcours($id) {
        session_start();

        $model = new ConcoursModel();

        $result = $model->supprimerConcours($id);

        if ($result) {
            header("Location: ../view/page_success.php");
            exit();
        } else {
            echo "Erreur lors de la suppression : " . $model->db->error;
        }
    }

    public function getConcoursByDate($date) {
        $model = new ConcoursModel();
        return $model->getConcoursByDate($date);
    }

    public function getConcoursByClub($club) {
        $model = new ConcoursModel();
        return $model->getConcoursByClub($club);
    }

    public function getClubs() {
        $model = new ConcoursModel();
        $result = $model->getClubs();

        return $result;
    }
    
}
?>