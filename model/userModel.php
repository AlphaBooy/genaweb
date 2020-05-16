<?php

/**
 * Récupère le mail de l'utilisateur lorsque l'on fournis l'identifiant de BD
 * @param $id int Identifiant de base de données stocké
 * @param $pdo PDO Objet de connexion à la base de données
 * @return string Adresse email de l'utilisateur (stocké en base et pas en session)
 */
function getUserByID($id, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT * FROM user WHERE ID = :ID";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$id]);
    $result = $rqt->fetch();
    return $result;
}

/**
 * Permet de récupérer un identifiant de base de données depuis le mail de connexion
 * stocké, par exemple, dans la variable de session
 * @param $mail string email d'authentification stocké en session
 * @param $pdo PDO objet de connexion à la base de données
 * @return int L'ID de base de données récupérée depuis le mail
 */
function getIDFromMail($mail, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT ID FROM user WHERE mail = :mail";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$mail]);
    $result = $rqt->fetch();
    return $result;
}