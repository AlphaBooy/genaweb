<?php

function CompteExiste($mail, $pdo) {
    $sql = "SELECT mail FROM user WHERE mail = :mail";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$mail]);
    $result = $rqt->fetch(PDO::FETCH_ASSOC);
    if (isset($result['mail'])) {
        return true;
    }
    return false;
}

function newUser($mail,$pass,$pdo) {
    $userCree = insertUser($mail, $pass, $pdo);
    if ($userCree !== -1) {
        return true;
    }else return false;
}

/**
 * Créer un compte utilisateur .
 * @param $mail string adresse mail de l'utilisateur
 * @param $pass string mot de passe de l'utilisateur
 * @param $pdo PDO objet de connexion à la base de données
 * @return int L'ID de l'utilisateur' créé ou -1 en cas d'echec
 */

function insertUser($mail,$pass,$pdo) {
    $sql = "INSERT INTO genaweb.user VALUES (:ID, :mail, :mdp, :grade)";
    $rqt = $pdo->prepare($sql);
    if ($rqt->execute([NULL, $mail, $pass, 'VISITEUR'])) {
        $sqlReturn = "SELECT ID FROM genaweb.user ORDER BY ID DESC LIMIT 1";
        $rqtReturn = $pdo->prepare($sqlReturn);
        $rqtReturn->execute([]);
        return $rqtReturn->fetch();
    }
    return -1;
}