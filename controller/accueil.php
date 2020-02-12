<?php
session_start();

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case "connexionOk":
            require_once "../view/messages/connexionOk.php";
            break;
        case "deconnexionOk":
            require_once "../view/messages/deconnexionOk.php";
            break;
        case "aucunArbre":
            require_once "../view/messages/aucunArbre.php";
    }
}

//Partie "head" du document HTML
require_once "../util/header.php";

//Partie "navbar" (ou barre de navigation) du document HTML
require_once "../util/navbar.php";

//Partie "vue" du document (éléments visuels propre au document en cours)
require_once "../view/accueilView.php";

//Partie "foot" du document HTML
require_once "../util/footer.php";