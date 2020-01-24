<?php

/**
 * Récupère tous les abres d'un utilisateur triés par rôle
 * (ex: "Arbres sur lesquelles l'utilisateur possède un droit d'administrateur => [...])
 * @param $idUser int - L'identifiant de l'utilisateur dont on veut récupérer les fiches
 * @param $pdo PDO    - Objet de connexion à la base de données
 * @return array      - Un tableau représentant chaque référence d'arbre pour un utilisateur.
 */
function getAllArbresByUser($idUser, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT * FROM arbresAutorisations WHERE idUser = :idUser";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idUser]);
    $result = $rqt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Récupère les information d'un arbre sous forme de tableau
 *
 * @param $id       - Identifiant de l'arbre dont on veut récupérer les informations
 * @param null $pdo -
 * @return array    -
 */
function getArbreByID($id, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT * FROM arbre WHERE ID = :ID";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$id]);
    $result = $rqt->fetch();
    return $result;
}


/**
 * @param $arbre
 * @param null $pdo
 * @return mixed
 */
function getMaxSosa($arbre, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT MAX('IDSOSA') FROM SOSA WHERE IDARBRE = :IDARBRE";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$arbre]);
    $result = $rqt->fetch();
    return $result;
}