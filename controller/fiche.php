<?php
session_start();

if (!isset($_GET["id"])) {header("Location:accueil.php");}

//Partie connexion à la BDD
require_once "../util/db.php";
require_once "../util/dateUtil.php";
require_once "../model/userModel.php";

//Partie "head" du document HTML
require_once "../util/header.php";

require_once "../model/fichesModel.php";

/* Partie remplissage des données existantes */
$datas = getPersonneFromFiche($_GET['id']);

/* Partie gestion et détection des erreurs */
$err = [];
if (isset($_GET['prenom']) & isset($_GET['nom']) & isset($_GET['nomnaiss']) & isset($_GET['sexe']) & isset($_GET['lieunaiss']) & isset($_GET['datenaiss']) && $err === []) {
    //Gestion des erreurs et formatage des données non-obligatoires
    if (sizeof($_GET['prenom']) < 1 || sizeof($_GET['prenom']) > 25) {
        $err["prenom"] = "Format incorrect, le prénom doit avoir une taille valide (limitée à 25 charactères) !";
    }
    if (sizeof($_GET['prenom2']) < 1 || sizeof($_GET['prenom2']) > 25) {$prenom2 = null;}
    if (sizeof($_GET['prenom3']) < 1 || sizeof($_GET['prenom3']) > 25) {$prenom3 = null;}
    if (sizeof($_GET['nom']) < 1 || sizeof($_GET['nom']) > 25) {
        $err["nom"] = "Format incorrect, le nom doit avoir une taille valide (limitée à 25 charactères) !";
    }
    if (sizeof($_GET['nomnaiss']) < 1 || sizeof($_GET['nomnaiss']) > 25) {
        $err["nomnaiss"] = "Format incorrect, le nom de naissance doit avoir une taille valide (limitée à 25 charactères) !";
    }
    if (sizeof($_GET['lieunaiss']) < 1 || sizeof($_GET['lieunaiss']) > 25) {
        $err["lieunaiss"] = "Format incorrect, le lieu de naissance doit avoir une taille valide (limitée à 25 charactères) !";
    }
    if (date_create_from_format('d/m/Y',$_GET['datenaiss']) !== false) {
        if (sizeof(date_format(date_create_from_format('d/m/Y', $_GET['datenaiss']), 'Y-m-d')) !== 10) {
            $err["datenaiss"] = "Format incorrect, veuillez renseigner une date sous forme : JJ/MM/AAAA !";
        }
        $_GET["datenaiss"] = date_create_from_format('d/m/Y',$_GET['datenaiss'])->format('Y-m-d');
    }
    if (isset($_GET['lieudeces']) && $_GET['lieudeces'] !== '') {
        if (sizeof($_GET['lieudeces']) < 1 || sizeof($_GET['lieudeces']) > 25) {
            $err["lieudeces"] = "Format incorrect, le lieu de decès doit avoir une taille valide (limitée à 25 charactères) !";
        }
    }
    if (isset($_GET['datedeces']) && $_GET['datedeces'] !== '') {
        if (sizeof(date_format(date_create_from_format('d/m/Y',$_GET['datedeces']),'Y-m-d')) !== 10) {
            $err["datedeces"] = "Format incorrect, veuillez renseigner une date sous forme : JJ/MM/AAAA !";
        }
        $_GET["datedeces"] = date_create_from_format('d/m/Y',$_GET['datedeces'])->format('Y-m-d');
    }
    // Initialisation à null des valeurs qui ne sont pas initialisées
    if ($_GET['prenom2'] === '') $_GET['prenom2'] = NULL;
    if ($_GET['prenom3'] === '') $_GET['prenom3'] = NULL;
    if ($_GET['datedeces'] === '') $_GET['datedeces'] = NULL;
    if ($_GET['lieudeces'] === '') $_GET['lieudeces'] = NULL;
    $fiche = modifFiche($_GET['prenom'], $_GET['prenom2'], $_GET['prenom3'], $_GET['nom'], $_GET['nomnaiss'], $_GET['sexe'], $_GET['metier'], $_GET['rue'], $_GET['cp'], $_GET['ville'], $_GET['lieunaiss'], $_GET['datenaiss'], $_GET['lieudeces'], $_GET['datedeces'], $datas["ID"], $datas["idPersonne"]);
    header("Location: fiches.php?id=" . $fiche);
}

require_once '../util/importPhoto.php';

//Partie "navbar" (ou barre de navigation) du document HTML
require_once "../util/navbar.php";

//Partie "vue" du document (éléments visuels propre au document en cours)
require_once "../view/FicheView.php";

//Partie footer visible (liens utiles...)
require_once "../util/footbar.php";

//Partie "foot" du document HTML
require_once "../util/footer.php";