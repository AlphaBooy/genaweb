<?php

/*
 * ACCES A LA BASE DE DONNEES DU LOGICIEL
 */
//Partie connexion à la BDD
require_once "../util/db.php";
//Partie SQL du document (récupération de données, ajout en base...)
require_once "../model/fichesModel.php";
//Parties AJAX du document (appels aux datatables...)
require_once "../model/fichesModelAjax.php";

/*
 * MISES EN PLACE DES ELEMENTS VISUELS DU SITE
 */
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

/*
 * PARTIE JAVASCRIPT DU SITE
 */
//Appels aux DataTables
require_once "../util/javascript/datatables/dataTablesFiches.js";