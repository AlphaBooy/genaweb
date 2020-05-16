<?php
session_start();

//Partie connexion à la BDD
require_once "../util/db.php";
//Partie SQL du document (récupération de données, ajout en base...)
require_once "../model/userModel.php";
require_once "../model/droitsModel.php";

$err = [];

if (isset($_GET['type']) && isset($_GET['id_objet']) && isset($_GET['niveau']) && isset($_GET['id_user'])) {
    $_GET['id_user'] = intval($_GET['id_user']);
    $_GET['id_objet'] = intval($_GET['id_objet']);
    if ($_GET['type'] !== 'fiche' && $_GET['type'] !== 'arbre') {
        $err["type"] = "Le type saisi est incorrect. L'objet ne peut être qu'une fiche ou un arbre !";
    }
    if ($_GET['niveau'] !== "visiteur" && $_GET['niveau'] !== "modificateur"
        && $_GET['niveau'] !== "administrateur" && $_GET['niveau'] !== "super-administrateur") {
        $err['niveau'] = "Le niveau saisi est incorrect, vous devez octroyer un des niveaux proposés par le site";
    }
    if (!is_int($_GET["id_objet"]) || $_GET["id_objet"] < 0) {
        $err['id_objet'] = "L'identifiant de l'objet concerné doit être un nombre !";
    }
    if (!objetExist($_GET["id_objet"], $_GET['type'])) {
        $err['id_objet'] = "L'objet n'existe pas. Vérifiez l'identifiant entré !";
    }
    if (!is_int($_GET["id_user"]) || $_GET["id_user"] < 0) {
        $err['id_user'] = "L'identifiant de l'utilisateur concerné doit être un nombre !";
    }
    if (!getUserByID($_GET["id_user"])) {
        $err['id_user'] = "L'objet n'existe pas. Vérifiez l'identifiant entré !";
    }
    if ($err === []) {
        addAutorisations($_GET["id_user"],$_GET["id_objet"],$_GET['type'],$_GET['niveau']);
        $location = $_GET['type'] === 'fiche' ? "Location: fiches.php" : "Location: arbres.php";
        header($location);
    }
}

var_dump($err);

//Partie "head" du document HTML
require_once "../util/header.php";

//Partie "navbar" (ou barre de navigation) du document HTML
require_once "../util/navbar.php";

require_once "../view/viewDroits.php";

//Partie footer visible (liens utiles...)
require_once "../util/footbar.php";

//Partie "foot" du document HTML
require_once "../util/footer.php";
?>