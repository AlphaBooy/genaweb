-- Création des tables de la base de données (mettre à jour à chaque update et delete en prod) --

CREATE TABLE `genaweb`.`PERSONNE` (
    `ID` BIGINT(21) NOT NULL,
    `prenom` VARCHAR(25) NOT NULL,
    `nom` VARCHAR(25) NOT NULL,
    `nomnaiss` VARCHAR(25) NOT NULL,
    `prenom2` VARCHAR(25) NOT NULL,
    `prenom3` VARCHAR(25) NOT NULL,
    `sexe` ENUM('h','f') NOT NULL,
    `datenaiss` DATE NOT NULL,
    `lieunaiss` VARCHAR(25) NOT NULL,
    `datedeces` DATE NOT NULL,
    `lieudeces` VARCHAR(25) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;

CREATE TABLE `genaweb`.`USER` (
    `ID` BIGINT(21) NOT NULL,
    `mail` VARCHAR(50) NOT NULL,
    `mdp` VARCHAR(25) NOT NULL,
    `sexe` ENUM('SUPER-ADMIN','ADMIN') NOT NULL,
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
    `ID` NUMERIC(11) NOT NULL,
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
    `nom` VARCHAR(25) NOT NULL,
    `nature` varchar(25) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;