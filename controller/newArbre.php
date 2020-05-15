<?php
/* Ne charge pas de vue, créer juste une arbre et redirige l'utilisateur avec un message qui l'informe si
 l'arbre est bien créé ou non */

session_start();

require_once "../util/db.php";
require_once "../model/userModel.php";
require_once "../model/arbresModel.php";
if (createArbre(getIDFromMail($_SESSION["mail"]))) {
    header("Location: arbres.php?new=ok");
} else {
    header("Location: arbres.php?new=nok");
}