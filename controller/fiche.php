<?php
session_start();

//Partie connexion à la BDD
require_once "../util/db.php";
require_once "../util/dateUtil.php";
//Partie SQL du document (récupération de données, ajout en base...)
require_once "../model/fichesModel.php";
require_once "../model/userModel.php";

if (!isset($_GET["id"])) {
    header("Location: accueil.php?message=aucuneFiche");
} else {
    $arbre = getArbreByID($_GET["id"], getPDO());
    var_dump($arbre);
}