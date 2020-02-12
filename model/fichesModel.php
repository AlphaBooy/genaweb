<?php

/**
 * Récupère toutes les fiches d'un utilisateur triés par rôle
 * (ex: "Fiches sur lesquelles l'utilisateur possède un droit d'administrateur => [...])
 * @param $idUser int L'identifiant de l'utilisateur dont on veut récupérer les fiches
 * @param $pdo PDO Objet de connexion à la base de données
 * @return array
 */

function getAllFichesByUser($idUser, $pdo) {
    $sql = "SELECT * FROM fichesAutorisations WHERE idUser = :idUser";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idUser]);
    $result = $rqt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Récupère les information d'une fiche sous forme de tableau
 *
 * @param $id       - Identifiant de la fiche dont on veut récupérer les informations
 * @param PDO $pdo  - Objet de connexion à la base de données
 * @return array    - Toutes les informations relatives à une fiche rangées dans un tableau ordonné
 */
function getFicheByID($id, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT * FROM fiche WHERE ID = :ID";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$id]);
    $result = $rqt->fetch();
    return $result;
}