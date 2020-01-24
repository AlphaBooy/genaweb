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