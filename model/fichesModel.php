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
 * Créer une fiche associée à une personne et à un créateur.
 * La date par défaut et la date courante. On se sert donc de cette propriété pour
 * définir la date de création de la fiche.
 * Par défaut, la date et l'utilisateur de création sont les même que la dernière modification
 * @param $idPersonne int Identifiant unique de la personne dont on créer la fiche (clé primaire personne)
 * @param $idCreateur int Identifiant de connexion du créateur de la fiche
 * @param $pdo PDO Objet de connexion à la base de données
 * @return boolean true ssi l'insertion s'est bien passée
 */

function insertNewFiche($idPersonne, $idCreateur, $pdo) {
    $sql = "INSERT INTO fiche VALUES(:ID, :idPersonne, :dateCrea, :userCrea, :dateDerniereModif, :userDerniereModif)";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([NULL,$idPersonne,NULL,$idCreateur,NULL,$idCreateur]);
    return $rqt->fetch();
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
    //TODO gérer les professions et adresses
    $sql = "INSERT INTO personne VALUES (NULL," . strval($prenom1) . "," . $nom ."," . $nomnaiss ."," . $prenom2 ."," . $prenom3 ."," . $sexe ."," . $lieunaiss ."," . $datenaiss ."," . $datedeces ."," . $lieudeces . ")";
    $rqt = $pdo->prepare($sql);
    $pdo->exec($sql);
    $personneCreee = $pdo->lastInsertId();
    if ($personneCreee >= 1) {
        insertNewFiche($personneCreee, getIDFromMail($_SESSION['mail'],getPDO()),getPDO());
        return 1;
    } else {
        return -1;
    }
}