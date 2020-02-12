-- Création des tables de la base de données (mettre à jour à chaque update et delete en prod) --

CREATE TABLE `genaweb`.`PERSONNE` (
    `ID` BIGINT(21) NOT NULL,
    `prenom` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `nom` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `nomnaiss` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `prenom2` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `prenom3` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `sexe` ENUM('h','f') CHARACTER SET utf8 NOT NULL,
    `datenaiss` DATE NOT NULL,
    `lieunaiss` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `datedeces` DATE NOT NULL,
    `lieudeces` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`USER` (
    `ID` BIGINT(21) NOT NULL,
    `mail` VARCHAR(50) CHARACTER SET utf8 NOT NULL,
    `mdp` VARCHAR(25) CHARACTER SET utf8 NOT NULL,
    `role` ENUM('SUPER-ADMIN','ADMIN') NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`FICHE` (
    `ID` BIGINT(21) NOT NULL,
    `idPersonne` BIGINT(21) NOT NULL,
    `dateCrea` DATE NOT NULL,
    `userCrea` BIGINT(21) NOT NULL,
    `dateDerniereModif` DATE NOT NULL,
    `userDerniereModif` BIGINT(21) NOT NULL,
    PRIMARY KEY (`ID`), FOREIGN KEY(`idPersonne`) REFERENCES personne(`ID`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`ARBRE` (
    `ID` INT(11) NOT NULL,
    `admin` BIGINT(21) NOT NULL,
    `dateCrea` DATE NOT NULL,
    `userCrea` BIGINT(21) NOT NULL,
    `dateDerniereModif` DATE NOT NULL,
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
    `ID` BIGINT(21) NOT NULL,
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