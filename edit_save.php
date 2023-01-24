<?php
require_once "core/init.php";
$connexion = new PDO("mysql: host=localhost; port=3306; dbname=wmskate; charset=utf8", "root", "");


if(isset($_SESSION['user-id']) && isset($_SESSION['user'])){

    $user_data = $user_obj->findByiD($_SESSION['user-id']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }

        if (isset($_POST['prenom']) and !empty($_POST['prenom'])) {
            $nom = $user_data->prenom;
            var_dump($nom);
            $id = $_SESSION['user-id'];
            $firstName = htmlspecialchars($_POST['prenom']);

            if ($firstName <= 60) {
                $reqFirstname = $connexion->prepare("SELECT * FROM utilisateurs WHERE prenom = ? AND id != ?");

                $reqFirstname->execute(array($nom, $id));
                $firstNameexist = $reqFirstname->rowCount();
        
                $insertFirstname = $connexion->prepare('UPDATE utilisateurs SET prenom = ? WHERE id = ?');
                    $insertFirstname->execute(array($firstName, $id));
                    header('Location: profile.php?id=' . $id);
            } else {
                $msg = "Votre prénom ne peut pas dépasser 200 caractères.";
            }
        }

        
        if (isset($_POST['nom']) and !empty($_POST['nom'])) {
            $prenom = $user_data->nom;
            $id = $_SESSION['user-id'];
            $lastName = htmlspecialchars($_POST['nom']);

            if ($lastName <= 60) {
                $reqLastname = $connexion->prepare("SELECT * FROM utilisateurs WHERE nom = ? AND id != ?");
                // $reqpseudo->execute(array($pseudo));
                $reqLastname->execute(array($prenom, $id));
                $LastNameExist = $reqLastname->rowCount();

                $insertLastname = $connexion->prepare('UPDATE utilisateurs SET nom = ? WHERE id = ?');
                    $insertLastname->execute(array($lastName, $id));
                    header('Location: profile.php?id=' . $id);
            } else {
                $msg = "Votre nom ne peut pas dépasser 200 caractères.";
            }
        }

        if (isset($_POST['adresse']) and !empty($_POST['adresse'])) {
            $adresse = $user_data->adresse;
            $id = $_SESSION['user-id'];
            $newAdresse = htmlspecialchars($_POST['adresse']);

            if ($newAdresse <= 127) {
                $reqAdresse = $connexion->prepare("SELECT * FROM utilisateurs WHERE adresse = ? AND id != ?");
                // $reqpseudo->execute(array($pseudo));
                $reqAdresse->execute(array($adresse, $id));
                $AdresseExist = $reqAdresse->rowCount();

                $insertAdresse = $connexion->prepare('UPDATE utilisateurs SET adresse = ? WHERE id = ?');
                    $insertAdresse->execute(array($newAdresse, $id));
                    header('Location: profile.php?id=' . $id);
            } else {
                $msg = "Votre nom ne peut pas dépasser 200 caractères.";
            }
        }


        if (isset($_POST['ville']) and !empty($_POST['ville'])) {
            $ville = $user_data->ville;
            $id = $_SESSION['user-id'];
            $newVille = htmlspecialchars($_POST['ville']);

            if ($newVille <= 60) {
                $reqVille = $connexion->prepare("SELECT * FROM utilisateurs WHERE ville = ? AND id != ?");
                // $reqpseudo->execute(array($pseudo));
                $reqVille->execute(array($ville, $id));
                $villeExist = $reqVille->rowCount();

                $insertVille = $connexion->prepare('UPDATE utilisateurs SET ville = ? WHERE id = ?');
                    $insertVille->execute(array($newVille, $id));
                    header('Location: profile.php?id=' . $id);
            } else {
                $msg = "Votre nom ne peut pas dépasser 200 caractères.";
            }
        }

        if (isset($_POST['code_postal']) and !empty($_POST['code_postal'])) {
            $code_postal = $user_data->code_postal;
            $id = $_SESSION['user-id'];
            $newCodePostal = htmlspecialchars($_POST['code_postal']);

            if ($newCodePostal != 0) { /* ???????????   */
                $reqCodePostal = $connexion->prepare("SELECT * FROM utilisateurs WHERE code_postal = ? AND id != ?");
                // $reqpseudo->execute(array($pseudo));
                $reqCodePostal->execute(array($code_postal, $id));
                $codeExist = $reqCodePostal->rowCount();

                $insertCode = $connexion->prepare('UPDATE utilisateurs SET code_postal = ? WHERE id = ?');
                    $insertCode->execute(array($newCodePostal, $id));
                    header('Location: profile.php?id=' . $id);
            } else {
                $msg = "Votre nom ne peut pas dépasser 200 caractères.";
            }
        }
}