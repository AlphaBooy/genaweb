<?php
require_once "../util/db.php";
$pdo = getPDO();

require_once "../model/modelInscription.php";
if (isset($_POST["mail"]) && isset($_POST["pass"]) && !isset($_SESSION['id'])) {
    if (!CompteExiste($_POST["mail"],$pdo)) {
        if(newUser($_POST["mail"], $_POST["pass"], $pdo)) {
            session_start();
            $_SESSION['id'] = session_id();
            $_SESSION['mail'] = $_POST["mail"];
        }
    }
}
if (isset($_SESSION['id'])) {
    session_start();
    header("Location: accueil.php?message=connexionOk");
}

//Partie "head" du document HTML
require_once "../util/header.php";

//Partie "navbar" (ou barre de navigation) du document HTML
require_once "../util/navbar.php";

//Partie "vue" du document (éléments visuels propre au document en cours)
require_once "../view/inscriptionView.php";

//Partie "foot" du document HTML
require_once "../util/footer.php";