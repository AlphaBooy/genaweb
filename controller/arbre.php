<?php
session_start();

//Partie connexion à la BDD
require_once "../util/db.php";
require_once "../util/dateUtil.php";
//Partie SQL du document (récupération de données, ajout en base...)
require_once "../model/arbresModel.php";
require_once "../model/userModel.php";

if (!isset($_GET["id"]) | getArbreByID($_GET["id"]) === null | getArbreByID($_GET["id"]) === false) {
    header("Location: accueil.php?message=aucunArbre");
} else {
    $datas = getAllDatas($_GET["id"]);
}

//Partie "head" du document HTML
require_once "../util/header.php";

//Partie "navbar" (ou barre de navigation) du document HTML
require_once "../util/navbar.php";

require_once "../view/viewArbre.php";

//Partie footer visible (liens utiles...)
require_once "../util/footbar.php";

//Partie "foot" du document HTML
require_once "../util/footer.php";
?>