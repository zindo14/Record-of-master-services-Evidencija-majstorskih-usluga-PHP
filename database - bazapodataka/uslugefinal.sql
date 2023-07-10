-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 02:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uslugefinal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DodajEvidencijuUsluge` (IN `IDEvidencijeParametar` INT(10), IN `ImePrezimeKlijentaParametar` VARCHAR(30), IN `VrstaPoslaParametar` VARCHAR(50), IN `DatumEvidencijeParametar` DATE, IN `DatumPocetkaRealizacijeParametar` DATE, `DatumZavrsetkaPoslaParametar` DATE, `MestoParametar` INT(11), `CenaParametar` INT(10))   BEGIN
INSERT INTO `evidencijausluge` (`IDEvidencije`, `ImePrezimeKlijenta`, `VrstaPosla`, `DatumEvidencije`, `DatumPocetkaRealizacije`,`DatumZavrsetkaPosla`,`Mesto`,`Cena`) VALUES (IDEvidencijeParametar, ImePrezimeKlijentaParametar, VrstaPoslaParametar, DatumEvidencijeParametar, DatumPocetkaRealizacijeParametar, DatumZavrsetkaPoslaParametar, MestoParametar,CenaParametar);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `evidencijausluge`
--

CREATE TABLE `evidencijausluge` (
  `IDEvidencije` int(10) NOT NULL,
  `ImePrezimeKlijenta` varchar(30) NOT NULL,
  `VrstaPosla` varchar(50) NOT NULL,
  `DatumEvidencije` date NOT NULL,
  `DatumPocetkaRealizacije` date NOT NULL,
  `DatumZavrsetkaPosla` date NOT NULL,
  `Mesto` int(11) NOT NULL,
  `Cena` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evidencijausluge`
--

INSERT INTO `evidencijausluge` (`IDEvidencije`, `ImePrezimeKlijenta`, `VrstaPosla`, `DatumEvidencije`, `DatumPocetkaRealizacije`, `DatumZavrsetkaPosla`, `Mesto`, `Cena`) VALUES
(1, 'Nikola Zindovic', 'Izgradnja kuce', '2023-01-10', '2023-01-12', '2023-01-15', 11000, 35000),
(2, 'Predrag Novokmet', 'Krecenje kuce', '2023-01-15', '2023-01-19', '2023-01-25', 21220, 22500),
(3, 'Tamara Cebzan', 'Gletovanje kuce', '2023-01-13', '2023-01-19', '2023-01-25', 21220, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `IDKORISNIKA` int(11) NOT NULL,
  `PREZIME` varchar(50) NOT NULL,
  `IME` varchar(40) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `KORISNICKOIME` varchar(30) NOT NULL,
  `SIFRA` varchar(30) NOT NULL,
  `URLSLike` varchar(250) DEFAULT NULL,
  `statusucesca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`IDKORISNIKA`, `PREZIME`, `IME`, `EMAIL`, `KORISNICKOIME`, `SIFRA`, `URLSLike`, `statusucesca`) VALUES
(1, 'Zindovic', 'Nikola', 'nikolazindo@gmail.com', 'zindo', '123', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `mesto`
--

CREATE TABLE `mesto` (
  `PTT` int(10) NOT NULL,
  `NazivMesta` varchar(30) NOT NULL,
  `Kilometraza` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mesto`
--

INSERT INTO `mesto` (`PTT`, `NazivMesta`, `Kilometraza`) VALUES
(11000, 'Beograd', 80),
(21105, 'Novi Sad', 51),
(21220, 'Becej', 49);

-- --------------------------------------------------------

--
-- Stand-in structure for view `svipodacioevidencijama`
-- (See below for the actual view)
--
CREATE TABLE `svipodacioevidencijama` (
`IDEvidencije` int(10)
,`ImePrezimeKlijenta` varchar(30)
,`VrstaPosla` varchar(50)
,`NazivMesta` varchar(30)
,`Cena` int(10)
);

-- --------------------------------------------------------

--
-- Structure for view `svipodacioevidencijama`
--
DROP TABLE IF EXISTS `svipodacioevidencijama`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `svipodacioevidencijama`  AS SELECT `evidencijausluge`.`IDEvidencije` AS `IDEvidencije`, `evidencijausluge`.`ImePrezimeKlijenta` AS `ImePrezimeKlijenta`, `evidencijausluge`.`VrstaPosla` AS `VrstaPosla`, `mesto`.`NazivMesta` AS `NazivMesta`, `evidencijausluge`.`Cena` AS `Cena` FROM (`evidencijausluge` join `mesto` on(`evidencijausluge`.`Mesto` = `mesto`.`PTT`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evidencijausluge`
--
ALTER TABLE `evidencijausluge`
  ADD PRIMARY KEY (`IDEvidencije`),
  ADD KEY `Mesto` (`Mesto`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`IDKORISNIKA`);

--
-- Indexes for table `mesto`
--
ALTER TABLE `mesto`
  ADD PRIMARY KEY (`PTT`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evidencijausluge`
--
ALTER TABLE `evidencijausluge`
  ADD CONSTRAINT `evidencijausluge_ibfk_1` FOREIGN KEY (`Mesto`) REFERENCES `mesto` (`PTT`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
