<?php

session_start();

//Partie connexion à la BDD
require_once "../util/db.php";
//Partie SQL du document (récupération de données, ajout en base...)
require_once "../model/arbresModel.php";

$allfiches = getAllArbresByUser(1, getPDO());

//Partie "head" du document HTML
require_once "../util/header.php";

//Partie "navbar" (ou barre de navigation) du document HTML
require_once "../util/navbar.php";

//Partie "vue" du document (éléments visuels propre au document en cours)
require_once "../view/fichesView.php";

//Partie footer visible (liens utiles...)
require_once "../util/footbar.php";

//Partie "foot" du document HTML
require_once "../util/footer.php";
