<?php

session_start();

//Partie connexion à la BDD
require_once "../util/db.php";
require_once "../util/dateUtil.php";
//Partie SQL du document (récupération de données, ajout en base...)
require_once "../model/fichesModel.php";
require_once "../model/userModel.php";

$allfiches = getAllFichesByUser(1, getPDO());

//Partie "head" du document HTML
require_once "../util/header.php";

//Partie "navbar" (ou barre de navigation) du document HTML
require_once "../util/navbar.php";

if (isset($_GET['sosa']) && isset($_GET['arbre'])) {
    //Partie "vue" du document (éléments visuels propre au document en cours)
    require_once "../view/fichesView.php";
}
if (isset($_GET['sosa']) && isset($_GET['arbre']) && isset($_GET['fiche'])) {
    if (isFicheOnArbre($_GET['fiche'], $_GET['arbre'])) {
        ?><script> location.replace("accueil.php?id=" + <?=$_GET['arbre'];?>); </script><?php
    }
    if (linkFicheToArbre(getPersonneFromFiche($_GET['fiche'])['idPersonne'], $_GET['arbre'], $_GET['sosa'])) {
        //header("Location: arbre.php?id=" . $_GET['arbre']);
        ?><script> location.replace("arbre.php?id=" + <?=$_GET['arbre'];?>); </script><?php
    }
}

//Partie footer visible (liens utiles...)
require_once "../util/footbar.php";

//Partie "foot" du document HTML
require_once "../util/footer.php";