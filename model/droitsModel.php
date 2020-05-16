<?php

/**
 * Permet d'ajouter une autorisation sur un objet de base de donnée (fiche et/ou arbre)
 * @param $idUser int identifiant de l'utilisateur
 * @param $idObjet int identifiant de l'objet auquel on veut ajouter des droits
 * @param $type string le type de l'objet (doit être fiche ou arbre)
 * @param $niveau string Niveau d'autorisation (visiteur, modificateur, administrateur, super-administrateur)
 * @param null $pdo PDO objet de connexion à la BD
 * @return boolean true ssi l'insertion des droits s'est bien déroullée
 */
function addAutorisations($idUser, $idObjet, $type, $niveau, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sqlautorisation = "INSERT INTO autorisations VALUES (:IDUSER, :idObjet, :typeObjet, :niveau)";
    $rqtautorisation = $pdo->prepare($sqlautorisation);
    return $rqtautorisation->execute([$idUser, $idObjet, $type, $niveau]);
}

/**
 * Determine si un objet existe ou non
 * @param $idObjet int Identifiant de l'objet présumé
 * @param $type string Type de l'objet (fiche ou arbre)
 * @param null $pdo PDO Objet de connexion à la BD
 * @return bool true ssi l'objet existe
 */
function objetExist($idObjet, $type, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    if ($type === "fiche") {
        $sql = "SELECT * FROM fiche WHERE ID = :IDObjet";
    } else if ($type === "arbre") {
        $sql = "SELECT * FROM arbre WHERE ID = :IDObjet";
    }
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idObjet]);
    return $rqt->fetch() ? true : false;
}