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

function newFiche($prenom1, $prenom2, $prenom3, $nom, $nomnaiss, $sexe, $professions,
                  $ligne, $cp, $ville, $datenaiss, $lieunaiss, $datedeces, $lieudeces, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $personneCree = insertNewPersonne($prenom1, $prenom2, $prenom3, $nom, $nomnaiss, $sexe, $professions,
                                        $ligne, $cp, $ville, $datenaiss, $lieunaiss, $datedeces, $lieudeces, $pdo);
    if ($personneCree !== -1) {
        $ficheCree = insertNewFiche($personneCree, getIDFromMail($_SESSION["mail"], $pdo), $pdo);
        if ($ficheCree !== -1) {
            addAutorisations(getIDFromMail($_SESSION["mail"], $pdo), $ficheCree, $pdo);
            return $ficheCree["ID"];
        }
    }
}

/**
 * Créer une fiche associée à une personne et à un créateur.
 * La date par défaut et la date courante. On se sert donc de cette propriété pour
 * définir la date de création de la fiche.
 * Par défaut, la date et l'utilisateur de création sont les même que la dernière modification
 * @param $idPersonne int Identifiant unique de la personne dont on créer la fiche (clé primaire personne)
 * @param $idCreateur int Identifiant de connexion du créateur de la fiche
 * @param $pdo PDO Objet de connexion à la base de données
 * @return int L'ID de la fiche créée aou -1 en cas d'echec
 */

function insertNewFiche($idPersonne, $idCreateur, $pdo) {
    $sql = "INSERT INTO fiche VALUES(:ID, :idPersonne, :dateCrea, :userCrea, :dateDerniereModif, :userDerniereModif)";
    $rqt = $pdo->prepare($sql);
    if ($rqt->execute([NULL,$idPersonne['ID'],NULL,$idCreateur['ID'],NULL,$idCreateur['ID']])) {
        $sqlReturn = "SELECT ID FROM fiche ORDER BY ID DESC LIMIT 1";
        $rqtReturn = $pdo->prepare($sqlReturn);
        $rqtReturn->execute([]);
        return $rqtReturn->fetch();
    }
    return -1;
}

/**
 * Permet de créer une personne ainsi que sa fiche assossiée.
 * Ce programme est donc appelé après le remplissage du formulaire de création
 * de fiche sur la page : "newfiche.php"
 *
 * @param $prenom1 string Premier prénom de l'individu pour lequel la fiche est créée
 * @param $prenom2 string Deuxième prénom de l'individu pour lequel la fiche est créée
 * @param $prenom3 string Troisième prénom de l'individu pour lequel la fiche est créée
 * @param $nom string Nom de l'individu pour lequel la fiche est créée
 * @param $nomnaiss string Nom de naissance de l'individu pour lequel la fiche est créée
 * @param $sexe string "h" si c'est un homme et "f" si c'est une femme
 * @param $professions array Essemble de professions réalisée par la personne au cours de sa vie
 * @param $ligne  string Numéro et nom de voie de l'individu (5 rue du chêne par exemple)
 * @param $cp string Code postal de l'individu
 * @param $ville string Ville de résidence de l'individu
 * @param $datenaiss string Date de naissance de l'individu
 * @param $lieunaiss string Lieu de naissance de l'individu
 * @param $datedeces string Date de décès de l'individu (null si encore en vie)
 * @param $lieudeces string Lieu de décès de l'individu (null si encore en vie)
 * @param $pdo PDO objet de connexion à la base de données
 * @return int l'id de la fiche créée
 */

function insertNewPersonne($prenom1, $prenom2, $prenom3, $nom, $nomnaiss, $sexe, $professions,
    $ligne, $cp, $ville, $datenaiss, $lieunaiss, $datedeces, $lieudeces, $pdo) {
    $sql = "INSERT INTO personne VALUES (:ID, :prenom, :nom, :nomnaiss, :prenom2, :prenom3,
                                :sexe, :datenaiss, :lieunaiss, :lieudeces, :datedeces)";
    $rqt = $pdo->prepare($sql);
    if ($rqt->execute([NULL,$prenom1, $nom, $nomnaiss, $prenom2, $prenom3, $sexe, $lieunaiss, $datenaiss, $lieudeces, $datedeces])) {
        $sqlResult = "SELECT ID FROM personne ORDER BY ID DESC LIMIT 1";
        $rqtResult = $pdo->prepare($sqlResult);
        $rqtResult->execute([]);
        return $rqtResult->fetch();
    }
    return -1;
}

/**
 * Permet de définir une autorisation pour une fiche donnée
 * @OverWrite addAutorisations() -> droitsModel.php
 * @param $idUser int identifiant de l'utilisateur
 * @param $idFiche int identifiant de la fiche
 * @param $pdo PDO objet de connexion à la base de données
 * @return boolean true ssi l'ajout des droits s'est bien effectué
 */
function addAutorisations($idUser, $idFiche, $pdo) {
    $sqlautorisation = "INSERT INTO autorisations VALUES (:IDUSER, :idObjet, :typeObjet, :niveau)";
    $rqtautorisation = $pdo->prepare($sqlautorisation);
    return $rqtautorisation->execute([$idUser['ID'],$idFiche['ID'],"fiche","super-administrateur"]);
}

/**
 * Récupère toutes les données de la personne avec sa fiche
 * @param $idFiche int Identifiant de la fiche dont on veut les données
 * @param $pdo PDO Objet de connexion à la BD
 * @return array Ensemble des valeurs de la fiche et de la personne liées
 */
function getPersonneFromFiche($idFiche, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "SELECT * FROM PERSONNE P JOIN FICHE F ON P.ID = F.IDPERSONNE WHERE F.ID = :ID";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$idFiche]);
    return $rqt->fetch();
}

/**
 * Associe une personne à un emplacement d'un arbre donné
 * @param $idPersonne int Identifiant de la personne à insérer dans l'arbre
 * @param $idArbre int Identifiant de l'arbre dans lequel on veut insérer la personne
 * @param $idSosa int Identifiant unique d'un arbre représentant l'emplacement d'une personne
 * @param $pdo PDO Objet de connexion à la BD
 * @return bool true ssi l'insertion s'est bien déroullée
 */
function linkFicheToArbre($idPersonne, $idArbre, $idSosa, $pdo = null) {
    $pdo = isset($pdo) ? $pdo : getPDO();
    $sql = "INSERT INTO SOSA VALUES(:IDPERSONNE,:IDARBRE,:IDSOSA)";
    $rqt = $pdo->prepare($sql);
    return $rqt->execute([$idPersonne, $idArbre, $idSosa]);
}