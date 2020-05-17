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
    $sql = "SELECT * FROM arbresAutorisations WHERE admin = :idUser";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idUser]);
    $result = $rqt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Récupère les information d'un arbre sous forme de tableau
 *
 * @param $id       - Identifiant de l'arbre dont on veut récupérer les informations
 * @param PDO $pdo - Objet de connexion à la base de données
 * @return array    - Toutes les informations relatives à un arbre rangées dans un tableay ordonné
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
 * @param $idarbre
 * @param null $pdo
 * @return mixed
 */
function getMaxSosa($idarbre, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT MAX(IDSOSA) FROM SOSA WHERE IDARBRE = :IDARBRE";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idarbre]);
    $result = $rqt->fetch();
    return $result;
}

/**
 * Récupère toutes les personnes positionnées sur une branche de l'arbre
 * @param $arbre
 * @param null $pdo
 * @return array
 */
function getAllPersonnesFromArbre($idarbre, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT * FROM SOSA WHERE IDARBRE = :IDARBRE";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idarbre]);
    $result = $rqt->fetchAll();
    return $result;
}

/**
 * Retourne le numéro SOSA d'une personne depuis son identifiant
 * @param $idPersonne int Identifiant d'une personne dont on veut le SOSA
 * @param null $pdo PDO Objet de connexion à la BD
 * @return int L'ID SOSA associé à la personne dont on fournit l'identifiant
 */
function getSOSAFromID($idPersonne, $idArbre, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT IDSOSA FROM SOSA WHERE IDPERSONNE = :IDPERSONNE AND IDARBRE = :IDARBRE";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idPersonne, $idArbre]);
    return $rqt->fetch();
}

function getAllDatas($idarbre, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $tab = getAllPersonnesFromArbre($idarbre);
    $result =[];
    foreach ($tab as $personne) {
        $sql = "SELECT * FROM PERSONNE WHERE ID = :IDPERSONNE";
        $rqt = $pdo->prepare($sql);
        $rqt->execute([$personne['IDPERSONNE']]);
        $sosa = getSOSAFromID($personne['IDPERSONNE'],$idarbre);
        $preresult = $rqt->fetch();
        $result[intval($sosa['IDSOSA'])] = $preresult;
    }
    return $result;
}

function createArbre($idUser, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "INSERT INTO arbre VALUES(:id,:admin,:dateCrea,:userCrea,:dateDerniereModif,:userDerniereModif)";
    $rqt = $pdo->prepare($sql);
     if ($rqt->execute([NULL, $idUser["ID"], NULL, $idUser["ID"], NULL, $idUser["ID"]])) {
         $sqlResult = "SELECT ID FROM arbre ORDER BY ID DESC LIMIT 1";
         $rqtResult = $pdo->prepare($sqlResult);
         $rqtResult->execute([]);
         return addAutorisations($idUser,$rqtResult->fetch(),$pdo);
     }
}

/**
 * Permet de définir une autorisation pour un arbre donné
 * @OverWrite addAutorisations() -> droitsModel.php
 * @param $idUser int identifiant de l'utilisateur
 * @param $idFiche int identifiant de l'arbre
 * @param $pdo PDO objet de connexion à la base de données
 * @return boolean true ssi l'ajout des droits s'est bien effectué
 */
function addAutorisations($idUser, $idArbre, $pdo) {
    $sqlautorisation = "INSERT INTO autorisations VALUES (:IDUSER, :idObjet, :typeObjet, :niveau)";
    $rqtautorisation = $pdo->prepare($sqlautorisation);
    return $rqtautorisation->execute([$idUser['ID'],$idArbre['ID'],"arbre","super-administrateur"]);
}

/**
 * Détermine si une fiche existe avec un numéro SOSA donné
 * @param $idSOSA int Emplacement SOSA dont on veut vérifier l'existance
 * @param null $pdo PDO Objet de connexion à la BD
 * @return bool true ssi une fiche existe au SOSA donné
 */
function ficheExistAtSOSA($idSOSA, $idArbre, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT * FROM SOSA WHERE IDSOSA = :IDSOSA AND IDARBRE = :IDARBRE";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idSOSA, $idArbre]);
    return $rqt->fetch() ? true : false;
}

/**
 * Détecte si un numéro SOSA est un nouveau niveau (étage) de l'arbre ou non
 * (Se base sur le fait que les nouveaux étages commencent tous sur une puissance de 2)
 * @param $n int Identifiant SOSA auquel on veut tester l'appartenance à un nouvel étage
 * @return bool true ssi c'est un nouvel étage
 */
function newNiveau($n) {
    return ceil(log10($n) / log10(2)) == floor(log10($n) / log10(2));
}