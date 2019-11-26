<?php
session_start();
session_destroy();
$_SESSION = null;
header("Location: accueil.php?message=deconnexionOk");
