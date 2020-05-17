-- Création des tables de la base de données (mettre à jour à chaque update et delete en prod) --

CREATE TABLE `genaweb`.`PERSONNE` (
    `ID` BIGINT(21) NOT NULL AUTO_INCREMENT,
    `prenom` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `nom` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `nomnaiss` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `prenom2` VARCHAR(25) CHARACTER SET utf8,
    `prenom3` VARCHAR(25) CHARACTER SET utf8,
    `sexe` ENUM('h','f') CHARACTER SET utf8 NOT NULL,
    `metier` VARCHAR(25) CHARACTER SET utf8,
    `ligne` VARCHAR(50) CHARACTER SET utf8,
    `cp` INT(5),
    `ville` VARCHAR(25) CHARACTER SET utf8,
    `datenaiss` DATE NOT NULL,
    `lieunaiss` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `datedeces` DATE,
    `lieudeces` VARCHAR(25) CHARACTER SET utf8,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`USER` (
    `ID` BIGINT(21) NOT NULL AUTO_INCREMENT,
    `mail` VARCHAR(50) CHARACTER SET utf8 NOT NULL,
    `mdp` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `grade` ENUM('SUPER-ADMIN','ADMIN') NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`FICHE` (
    `ID` BIGINT(21) NOT NULL AUTO_INCREMENT,
    `idPersonne` BIGINT(21) NOT NULL,
    `dateCrea` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `userCrea` BIGINT(21) NOT NULL,
    `dateDerniereModif` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `userDerniereModif` BIGINT(21) NOT NULL,
    PRIMARY KEY (`ID`), FOREIGN KEY(`idPersonne`) REFERENCES personne(`ID`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`ARBRE` (
    `ID` INT(11) NOT NULL AUTO_INCREMENT,
    `admin` BIGINT(21) NOT NULL,
    `dateCrea` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `userCrea` BIGINT(21) NOT NULL,
    `dateDerniereModif` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `userDerniereModif` BIGINT(21) NOT NULL,
    PRIMARY KEY (`ID`), FOREIGN KEY(`admin`) REFERENCES user(`ID`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`SOSA` (
    `IDPERSONNE` BIGINT(21) NOT NULL,
    `IDARBRE` NUMERIC(11) NOT NULL,
    `IDSOSA` NUMERIC(11) NOT NULL,
    PRIMARY KEY (`IDPERSONNE`,`IDARBRE`,`IDSOSA`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`DOCUMENT` (
    `ID` BIGINT(21) NOT NULL AUTO_INCREMENT,
    `IdFiche` BIGINT(21) NOT NULL,
    `nom` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `nature` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;

CREATE TABLE `autorisations` (
     `idUser` bigint(21) NOT NULL,
     `idObjet` bigint(21) NOT NULL,
     `typeObjet` ENUM('fiche','arbre') NOT NULL,
     `niveau` enum('visiteur','modificateur','administrateur','super-administrateur') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB;

/* Vues */

CREATE VIEW `fichesAutorisations` AS SELECT * FROM `genaweb`.FICHE JOIN `autorisations` ON `ID` = `idObjet` AND `typeObjet` = 'fiche';

CREATE VIEW `arbresAutorisations` AS SELECT * FROM `genaweb`.ARBRE JOIN `autorisations` ON `ID` = `idObjet` AND `typeObjet` = 'arbre';