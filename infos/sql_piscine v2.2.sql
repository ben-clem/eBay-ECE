-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2020 at 08:53 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `eBay ECE`
--

-- --------------------------------------------------------

--
-- Table structure for table `BID`
--

CREATE TABLE `BID` (
  `Id_Item` int(11) NOT NULL,
  `ID_Buyer` varchar(255) NOT NULL,
  `Price_Max` float NOT NULL,
  `Bid_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `BID_SALE`
--

CREATE TABLE `BID_SALE` (
  `ID_Buyer` varchar(255) NOT NULL,
  `Id_Item` int(11) NOT NULL,
  `Final_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `BUYER`
--

CREATE TABLE `BUYER` (
  `ID_Buyer` varchar(255) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Titulaire` varchar(255) NOT NULL,
  `Numero` bigint(20) NOT NULL,
  `Expiration` varchar(255) NOT NULL,
  `CVV` int(255) NOT NULL,
  `Photo_path` varchar(255) DEFAULT NULL,
  `Background_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BUYER`
--

INSERT INTO `BUYER` (`ID_Buyer`, `Password`, `Name`, `Firstname`, `Address`, `Titulaire`, `Numero`, `Expiration`, `CVV`, `Photo_path`, `Background_path`) VALUES
('ben@acheteur.com', 'mdp', 'Acheteur', 'New', '146 Rue du Chemin Vert, 75011 Paris, France', 'M BENOIT CLEMENCEAU', 4561237896541236, '12/2022', 123, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `Image_Path` varchar(255) NOT NULL,
  `Id_Item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Images`
--

INSERT INTO `Images` (`Image_Path`, `Id_Item`) VALUES
('databaseImages/tableau-tableaux-tableau-contemporain-tableaux-contemporains-art-moderne-peintre-peintres-peintre-contemporain-peintres-contemporains1.jpg', 69),
('databaseImages/93857440_904345760008189_1393137779931611136_n.jpg', 71),
('databaseImages/92467999_157283908934486_2919853565369384960_n.jpg', 72),
('databaseImages/93783918_2608673239404230_3876810723170451456_n3.jpg', 73),
('databaseImages/93707348_238207380859540_5300624856042176512_n.jpg', 74),
('databaseImages/88991856_219083565881034_6623165721658523648_n1.jpg', 75);

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `Id_Item` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category` tinyint(50) NOT NULL,
  `Sale_Type` tinyint(50) NOT NULL,
  `Sold` tinyint(1) NOT NULL DEFAULT '0',
  `Video_Path` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Begin_Date` datetime DEFAULT NULL,
  `End_Date` datetime DEFAULT NULL,
  `Price_Min` float DEFAULT NULL,
  `Price_Now` float DEFAULT NULL,
  `ID_Seller` varchar(255) NOT NULL,
  `ID_Buyer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`Id_Item`, `Name`, `Category`, `Sale_Type`, `Sold`, `Video_Path`, `Description`, `Begin_Date`, `End_Date`, `Price_Min`, `Price_Now`, `ID_Seller`, `ID_Buyer`) VALUES
(69, 'Peinture Aquarelle', 2, 110, 1, 'databaseVideos/1.', 'Peinture Magnifique pour votre salon', NULL, '2020-05-20 15:12:00', 125, 500, 'benoit.clemenceau@edu.ece.fr', 'ben@acheteur.com'),
(71, 'Champagne Dom Pérignon', 1, 100, 0, 'databaseVideos/TestVideo11.mp4', 'Bouteille Vintage Collector de 2006.', NULL, '2020-06-01 12:00:00', 500, NULL, 'benoit.clemenceau@edu.ece.fr', NULL),
(72, 'Machine à écrire Vintage', 1, 11, 0, 'databaseVideos/1.', 'Datée de 1965 et restaurée en 2016.', NULL, NULL, NULL, 200, 'benoit.clemenceau@edu.ece.fr', NULL),
(73, 'Malle Napoléon III', 3, 10, 0, 'databaseVideos/TestVideo16.mp4', 'Ayant servi à enfermer des enfants.', NULL, NULL, NULL, 600, 'benoit.clemenceau@edu.ece.fr', NULL),
(74, 'Appareil Photo Nikon', 3, 110, 1, 'databaseVideos/1.', 'Appareil ayant appartenu à Joe Bassin.', NULL, '2022-12-15 12:27:00', 500, 1000, 'mich.mich@mail.dz', 'ben@acheteur.com'),
(75, 'Bague Or', 3, 11, 0, 'databaseVideos/1.', '256 carats', NULL, NULL, NULL, 750, 'mich.mich@mail.dz', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `NEGOCIATION`
--

CREATE TABLE `NEGOCIATION` (
  `ID_Buyer` varchar(255) NOT NULL,
  `Id_Item` int(11) NOT NULL,
  `Price_Nego` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SELLER`
--

CREATE TABLE `SELLER` (
  `ID_Seller` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `Firstname` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Photo_path` varchar(255) DEFAULT NULL,
  `Backgroung_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SELLER`
--

INSERT INTO `SELLER` (`ID_Seller`, `Password`, `Admin`, `Firstname`, `Name`, `Photo_path`, `Backgroung_path`) VALUES
('benoit.clemenceau@edu.ece.fr', 'mdp', 1, 'Benoît', 'Clemenceau', '', ''),
('kim.zaatar@gmail.com', 'mdp', 1, 'Kim', 'Zaatar', '', ''),
('mich.mich@mail.dz', 'mdp', 0, 'Michel', 'Dumaire', 'Array', 'Array'),
('miriam.benallou@edu.ece.fr', 'mdp', 1, 'Miriam', 'Benallou', '', ''),
('test.test@test.com', '75011', 1, 'test', 'test', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BID`
--
ALTER TABLE `BID`
  ADD PRIMARY KEY (`Id_Item`,`ID_Buyer`),
  ADD KEY `BID_BUYER0_FK` (`ID_Buyer`);

--
-- Indexes for table `BID_SALE`
--
ALTER TABLE `BID_SALE`
  ADD PRIMARY KEY (`ID_Buyer`,`Id_Item`),
  ADD KEY `BID_SALE_Item0_FK` (`Id_Item`);

--
-- Indexes for table `BUYER`
--
ALTER TABLE `BUYER`
  ADD PRIMARY KEY (`ID_Buyer`);

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`Image_Path`),
  ADD KEY `Images_Item_FK` (`Id_Item`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`Id_Item`),
  ADD KEY `Item_SELLER_FK` (`ID_Seller`),
  ADD KEY `Item_BUYER0_FK` (`ID_Buyer`);

--
-- Indexes for table `NEGOCIATION`
--
ALTER TABLE `NEGOCIATION`
  ADD PRIMARY KEY (`ID_Buyer`,`Id_Item`),
  ADD KEY `NEGOCIATION_Item0_FK` (`Id_Item`);

--
-- Indexes for table `SELLER`
--
ALTER TABLE `SELLER`
  ADD PRIMARY KEY (`ID_Seller`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `Id_Item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BID`
--
ALTER TABLE `BID`
  ADD CONSTRAINT `BID_BUYER0_FK` FOREIGN KEY (`ID_Buyer`) REFERENCES `BUYER` (`ID_Buyer`),
  ADD CONSTRAINT `BID_Item_FK` FOREIGN KEY (`Id_Item`) REFERENCES `Item` (`Id_Item`);

--
-- Constraints for table `BID_SALE`
--
ALTER TABLE `BID_SALE`
  ADD CONSTRAINT `BID_SALE_BUYER_FK` FOREIGN KEY (`ID_Buyer`) REFERENCES `BUYER` (`ID_Buyer`),
  ADD CONSTRAINT `BID_SALE_Item0_FK` FOREIGN KEY (`Id_Item`) REFERENCES `Item` (`Id_Item`);

--
-- Constraints for table `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `Images_Item_FK` FOREIGN KEY (`Id_Item`) REFERENCES `Item` (`Id_Item`);

--
-- Constraints for table `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `Item_BUYER0_FK` FOREIGN KEY (`ID_Buyer`) REFERENCES `BUYER` (`ID_Buyer`),
  ADD CONSTRAINT `Item_SELLER_FK` FOREIGN KEY (`ID_Seller`) REFERENCES `SELLER` (`ID_Seller`);

--
-- Constraints for table `NEGOCIATION`
--
ALTER TABLE `NEGOCIATION`
  ADD CONSTRAINT `NEGOCIATION_BUYER_FK` FOREIGN KEY (`ID_Buyer`) REFERENCES `BUYER` (`ID_Buyer`),
  ADD CONSTRAINT `NEGOCIATION_Item0_FK` FOREIGN KEY (`Id_Item`) REFERENCES `Item` (`Id_Item`);