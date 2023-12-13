-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for voedselbankmaaskantje
CREATE DATABASE IF NOT EXISTS `voedselbankmaaskantje` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `voedselbankmaaskantje`;

-- Dumping structure for table voedselbankmaaskantje.address
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Land` varchar(45) NOT NULL,
  `Provincie` varchar(45) NOT NULL,
  `Stad` varchar(45) NOT NULL,
  `Postcode` varchar(45) NOT NULL,
  `Straat` varchar(45) NOT NULL,
  `Huisnummer` varchar(45) NOT NULL,
  `User_bsn` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Address_User_idx` (`User_bsn`),
  CONSTRAINT `fk_Address_User` FOREIGN KEY (`User_bsn`) REFERENCES `user` (`bsn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.address: ~0 rows (approximately)
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(11) NOT NULL,
  `categorie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.categorie: ~0 rows (approximately)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.categorie_has_producten
CREATE TABLE IF NOT EXISTS `categorie_has_producten` (
  `categorie_idcategorie` int(11) NOT NULL,
  `Producten_Streepjescode` int(11) NOT NULL,
  PRIMARY KEY (`categorie_idcategorie`,`Producten_Streepjescode`),
  KEY `fk_categorie_has_Producten_Producten1_idx` (`Producten_Streepjescode`),
  KEY `fk_categorie_has_Producten_categorie1_idx` (`categorie_idcategorie`),
  CONSTRAINT `fk_categorie_has_Producten_Producten1` FOREIGN KEY (`Producten_Streepjescode`) REFERENCES `producten` (`EAN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categorie_has_Producten_categorie1` FOREIGN KEY (`categorie_idcategorie`) REFERENCES `categorie` (`idcategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.categorie_has_producten: ~0 rows (approximately)
/*!40000 ALTER TABLE `categorie_has_producten` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie_has_producten` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.gezinsopstelling
CREATE TABLE IF NOT EXISTS `gezinsopstelling` (
  `idGezinsopstelling` int(11) NOT NULL,
  `Volwassen` varchar(45) DEFAULT NULL,
  `Kinderen` varchar(45) DEFAULT NULL,
  `Baby's` varchar(45) DEFAULT NULL,
  `User_bsn` int(11) NOT NULL,
  PRIMARY KEY (`idGezinsopstelling`),
  KEY `fk_Gezinsopstelling_User1_idx` (`User_bsn`),
  CONSTRAINT `fk_Gezinsopstelling_User1` FOREIGN KEY (`User_bsn`) REFERENCES `user` (`bsn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.gezinsopstelling: ~0 rows (approximately)
/*!40000 ALTER TABLE `gezinsopstelling` DISABLE KEYS */;
/*!40000 ALTER TABLE `gezinsopstelling` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.leveranciers
CREATE TABLE IF NOT EXISTS `leveranciers` (
  `idLeveranciers` int(11) NOT NULL,
  `Bedrijfnaam` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Telefoonnummer` varchar(45) NOT NULL,
  `Rollen_idRollen` int(11) NOT NULL,
  PRIMARY KEY (`idLeveranciers`),
  KEY `fk_Leveranciers_Rollen1_idx` (`Rollen_idRollen`),
  CONSTRAINT `fk_Leveranciers_Rollen1` FOREIGN KEY (`Rollen_idRollen`) REFERENCES `rollen` (`idRollen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.leveranciers: ~0 rows (approximately)
/*!40000 ALTER TABLE `leveranciers` DISABLE KEYS */;
INSERT INTO `leveranciers` (`idLeveranciers`, `Bedrijfnaam`, `Email`, `Telefoonnummer`, `Rollen_idRollen`) VALUES
	(1, 'kasa', '', '', 12345);
/*!40000 ALTER TABLE `leveranciers` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.levering
CREATE TABLE IF NOT EXISTS `levering` (
  `idLeverencie` int(11) NOT NULL,
  `DatumLevering` date NOT NULL,
  `TijdLevering` time NOT NULL,
  `Leveranciers_idLeveranciers` int(11) NOT NULL,
  PRIMARY KEY (`idLeverencie`),
  KEY `fk_Levering_Leveranciers1_idx` (`Leveranciers_idLeveranciers`),
  CONSTRAINT `fk_Levering_Leveranciers1` FOREIGN KEY (`Leveranciers_idLeveranciers`) REFERENCES `leveranciers` (`idLeveranciers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.levering: ~0 rows (approximately)
/*!40000 ALTER TABLE `levering` DISABLE KEYS */;
/*!40000 ALTER TABLE `levering` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.login
CREATE TABLE IF NOT EXISTS `login` (
  `MedewerkerId` int(11) NOT NULL,
  `Gebruikersnaam` varchar(45) NOT NULL,
  `Wachtwoord` varchar(45) NOT NULL,
  `User_bsn` int(11) NOT NULL,
  PRIMARY KEY (`MedewerkerId`),
  KEY `fk_Login_User1_idx` (`User_bsn`),
  CONSTRAINT `fk_Login_User1` FOREIGN KEY (`User_bsn`) REFERENCES `user` (`bsn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.login: ~0 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.producten
CREATE TABLE IF NOT EXISTS `producten` (
  `EAN` int(11) NOT NULL,
  `ProductNaam` varchar(45) NOT NULL,
  `Houdbaarheidsdatum` date NOT NULL,
  `Aantal` varchar(45) NOT NULL,
  `Levering_idLeverencie` int(11) NOT NULL,
  PRIMARY KEY (`EAN`),
  KEY `fk_Producten_Levering1_idx` (`Levering_idLeverencie`),
  CONSTRAINT `fk_Producten_Levering1` FOREIGN KEY (`Levering_idLeverencie`) REFERENCES `levering` (`idLeverencie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.producten: ~0 rows (approximately)
/*!40000 ALTER TABLE `producten` DISABLE KEYS */;
/*!40000 ALTER TABLE `producten` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.rollen
CREATE TABLE IF NOT EXISTS `rollen` (
  `idRollen` int(11) NOT NULL,
  `Rollen` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRollen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.rollen: ~0 rows (approximately)
/*!40000 ALTER TABLE `rollen` DISABLE KEYS */;
INSERT INTO `rollen` (`idRollen`, `Rollen`) VALUES
	(12345, 'Leveranciers');
/*!40000 ALTER TABLE `rollen` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.user
CREATE TABLE IF NOT EXISTS `user` (
  `bsn` int(11) NOT NULL,
  `Voornaam` varchar(45) NOT NULL,
  `Tussenvoegsel` varchar(45) DEFAULT NULL,
  `Achternaam` varchar(45) NOT NULL,
  `Geboortendatum` date NOT NULL,
  `Telefoonnummer` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`bsn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`bsn`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geboortendatum`, `Telefoonnummer`, `Email`) VALUES
	(38287, 'test', 'test', 'test', '2000-03-03', 2413, 'Tewew@gege');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.user_has_rollen
CREATE TABLE IF NOT EXISTS `user_has_rollen` (
  `User_bsn` int(11) NOT NULL,
  `Rollen_idRollen` int(11) NOT NULL,
  PRIMARY KEY (`User_bsn`,`Rollen_idRollen`),
  KEY `fk_User_has_Rollen_Rollen1_idx` (`Rollen_idRollen`),
  KEY `fk_User_has_Rollen_User1_idx` (`User_bsn`),
  CONSTRAINT `fk_User_has_Rollen_Rollen1` FOREIGN KEY (`Rollen_idRollen`) REFERENCES `rollen` (`idRollen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Rollen_User1` FOREIGN KEY (`User_bsn`) REFERENCES `user` (`bsn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.user_has_rollen: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_has_rollen` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_rollen` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.voedselpakketen
CREATE TABLE IF NOT EXISTS `voedselpakketen` (
  `idVoedselpakketen` int(11) NOT NULL AUTO_INCREMENT,
  `DatumSamenstelling` date NOT NULL,
  `DatumUitgifte` date NOT NULL,
  `User_bsn` int(11) NOT NULL,
  PRIMARY KEY (`idVoedselpakketen`),
  KEY `fk_Voedselpakketen_User1_idx` (`User_bsn`),
  CONSTRAINT `fk_Voedselpakketen_User1` FOREIGN KEY (`User_bsn`) REFERENCES `user` (`bsn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.voedselpakketen: ~0 rows (approximately)
/*!40000 ALTER TABLE `voedselpakketen` DISABLE KEYS */;
/*!40000 ALTER TABLE `voedselpakketen` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.voedselpakketen_has_producten
CREATE TABLE IF NOT EXISTS `voedselpakketen_has_producten` (
  `Voedselpakketen_idVoedselpakketen` int(11) NOT NULL,
  `Producten_EAN` int(11) NOT NULL,
  PRIMARY KEY (`Voedselpakketen_idVoedselpakketen`,`Producten_EAN`),
  KEY `fk_Voedselpakketen_has_Producten_Producten1_idx` (`Producten_EAN`),
  KEY `fk_Voedselpakketen_has_Producten_Voedselpakketen1_idx` (`Voedselpakketen_idVoedselpakketen`),
  CONSTRAINT `fk_Voedselpakketen_has_Producten_Producten1` FOREIGN KEY (`Producten_EAN`) REFERENCES `producten` (`EAN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Voedselpakketen_has_Producten_Voedselpakketen1` FOREIGN KEY (`Voedselpakketen_idVoedselpakketen`) REFERENCES `voedselpakketen` (`idVoedselpakketen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.voedselpakketen_has_producten: ~0 rows (approximately)
/*!40000 ALTER TABLE `voedselpakketen_has_producten` DISABLE KEYS */;
/*!40000 ALTER TABLE `voedselpakketen_has_producten` ENABLE KEYS */;

-- Dumping structure for table voedselbankmaaskantje.voorkeuren
CREATE TABLE IF NOT EXISTS `voorkeuren` (
  `idWensen` int(11) NOT NULL,
  `Voorkeuren` varchar(45) DEFAULT NULL,
  `User_bsn` int(11) NOT NULL,
  PRIMARY KEY (`idWensen`),
  KEY `fk_Voorkeuren_User1_idx` (`User_bsn`),
  CONSTRAINT `fk_Voorkeuren_User1` FOREIGN KEY (`User_bsn`) REFERENCES `user` (`bsn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table voedselbankmaaskantje.voorkeuren: ~0 rows (approximately)
/*!40000 ALTER TABLE `voorkeuren` DISABLE KEYS */;
/*!40000 ALTER TABLE `voorkeuren` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
`user`voedselbankmaaskantjevoedselbankmaaskantjevoedselbankmaaskantje