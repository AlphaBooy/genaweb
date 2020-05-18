<?php
session_start();

//Partie connexion à la BDD
require_once "../util/db.php";
require_once "../model/userModel.php";

//Partie "head" du document HTML
require_once "../util/header.php";

require_once "../model/fichesModel.php";

/* Partie gestion et détection des erreurs */
$err = [];

if (isset($_GET['prenom']) & isset($_GET['nom']) & isset($_GET['nomnaiss']) & isset($_GET['sexe']) & isset($_GET['lieunaiss']) & isset($_GET['datenaiss']) && $err === []) {
    //Gestion des erreurs et formatage des données non-obligatoires
    if (strlen($_GET['prenom']) < 1 || strlen($_GET['prenom']) > 25) {
        $err["prenom"] = "Format incorrect, le prénom doit avoir une taille valide (limitée à 25 charactères) !";
    }
    if (strlen($_GET['prenom2']) < 1 || strlen($_GET['prenom2']) > 25) {$prenom2 = null;}
    if (strlen($_GET['prenom3']) < 1 || strlen($_GET['prenom3']) > 25) {$prenom3 = null;}
    if (strlen($_GET['nom']) < 1 || strlen($_GET['nom']) > 25) {
        $err["nom"] = "Format incorrect, le nom doit avoir une taille valide (limitée à 25 charactères) !";
    }
    if (strlen($_GET['nomnaiss']) < 1 || strlen($_GET['nomnaiss']) > 25) {
        $err["nomnaiss"] = "Format incorrect, le nom de naissance doit avoir une taille valide (limitée à 25 charactères) !";
    }
    if (strlen($_GET['lieunaiss']) < 1 || strlen($_GET['lieunaiss']) > 25) {
        $err["lieunaiss"] = "Format incorrect, le lieu de naissance doit avoir une taille valide (limitée à 25 charactères) !";
    }

    if (date_create_from_format('d/m/Y',$_GET['datenaiss']) !== false) {
        if (strlen(date_format(date_create_from_format('d/m/Y', $_GET['datenaiss']), 'Y-m-d')) !== 10) {
            $err["datenaiss"] = "Format incorrect, veuillez renseigner une date sous forme : JJ/MM/AAAA !";
        }
    }else {
         $err["datenaiss"] = "Format incorrect, veuillez renseigner une date sous forme : JJ/MM/AAAA !";
    }

    if (isset($_GET['lieudeces']) && $_GET['lieudeces'] !== '') {
        if (strlen($_GET['lieudeces']) < 1 || strlen($_GET['lieudeces']) > 25) {
            $err["lieudeces"] = "Format incorrect, le lieu de decès doit avoir une taille valide (limitée à 25 charactères) !";
        }
    }
    if (date_create_from_format('d/m/Y',$_GET['datedeces']) !== false) {
        if (strlen(date_format(date_create_from_format('d/m/Y',$_GET['datedeces']),'Y-m-d')) !== 10) {
            $err["datedeces"] = "Format incorrect, veuillez renseigner une date sous forme : JJ/MM/AAAA !";
        }
    }else {
         $err["datedeces"] = "Format incorrect, veuillez renseigner une date sous forme : JJ/MM/AAAA !";
    }
    // Initialisation à null des valeurs qui ne sont pas initialisées
    if ($_GET['prenom2'] === '') $_GET['prenom2'] = NULL;
    if ($_GET['prenom3'] === '') $_GET['prenom3'] = NULL;
    if ($_GET['datedeces'] === '') $_GET['datedeces'] = NULL;
    if ($_GET['lieudeces'] === '') $_GET['lieudeces'] = NULL;
    if ($_GET['cp'] === '') $_GET['cp'] = NULL;

    if ($err === []){
        $_GET["datenaiss"] = date_create_from_format('d/m/Y',$_GET['datenaiss'])->format('Y-m-d');
        $_GET["datedeces"] = date_create_from_format('d/m/Y',$_GET['datedeces'])->format('Y-m-d');
        $fiche = newFiche($_GET['prenom'], $_GET['prenom2'], $_GET['prenom3'], $_GET['nom'], $_GET['nomnaiss'], $_GET['sexe'], $_GET['metier'], $_GET['rue'], $_GET['cp'], $_GET['ville'], $_GET['lieunaiss'], $_GET['datenaiss'], $_GET['lieudeces'], $_GET['datedeces'], getPDO());
        header("Location: fiches.php?id=" . $fiche);
    }
}

//Partie "navbar" (ou barre de navigation) du document HTML
require_once "../util/navbar.php";

//Partie "vue" du document (éléments visuels propre au document en cours)
require_once "../view/newFicheView.php";

//Partie footer visible (liens utiles...)
require_once "../util/footbar.php";

//Partie "foot" du document HTML
require_once "../util/footer.php";