-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 16, 2020 at 07:27 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ebay ECE`
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
  `Bank_Info` varchar(255) NOT NULL,
  `Amount` float NOT NULL,
  `Photo_path` varchar(255) NOT NULL,
  `Background_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CONTAIN`
--

CREATE TABLE `CONTAIN` (
  `Id_Item` int(11) NOT NULL,
  `ID_Panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `Image_Path` varchar(255) NOT NULL,
  `Id_Item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(23, 'Test', 1, 1, 0, '', '', NULL, NULL, NULL, NULL, '1', NULL),
(24, 'test video', 1, 1, 0, 'databaseVideos/testVideo.mp4', '', NULL, NULL, NULL, NULL, '1', NULL),
(25, 'test photos', 1, 1, 0, '', '', NULL, NULL, NULL, NULL, '1', NULL),
(27, 'test photo nom deja existant', 1, 100, 0, '', '', '0005-05-05 05:05:00', '0006-06-06 06:06:00', 5, NULL, '1', NULL),
(33, 'test img', 1, 1, 0, '', '', NULL, NULL, NULL, NULL, '1', NULL),
(41, 'test img', 1, 1, 0, '', '', NULL, NULL, NULL, NULL, '1', NULL),
(45, 'test', 1, 100, 0, '', '', '0005-05-05 05:05:00', '0005-05-05 05:05:00', 5, NULL, '1', NULL),
(53, 'imiom', 1, 1, 0, '', '', NULL, NULL, NULL, NULL, '1', NULL),
(54, 'ykkuykuy', 1, 1, 0, 'databaseVideos/TESTvideo.mp4', '', NULL, NULL, NULL, NULL, '1', NULL),
(56, 'rt', 1, 1, 0, 'databaseVideos/TTTTTT2.mp4', '', NULL, NULL, NULL, NULL, '1', NULL);

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
-- Table structure for table `PANIER`
--

CREATE TABLE `PANIER` (
  `ID_Panier` int(11) NOT NULL,
  `ID_Buyer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SELLER`
--

CREATE TABLE `SELLER` (
  `ID_Seller` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Photo_path` varchar(255) NOT NULL,
  `Backgroung_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SELLER`
--

INSERT INTO `SELLER` (`ID_Seller`, `Name`, `Firstname`, `Password`, `Photo_path`, `Backgroung_path`) VALUES
('1', 'Binks', 'Benzinho', 'mdp', '', '');

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
-- Indexes for table `CONTAIN`
--
ALTER TABLE `CONTAIN`
  ADD PRIMARY KEY (`Id_Item`,`ID_Panier`),
  ADD KEY `CONTAIN_PANIER0_FK` (`ID_Panier`);

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
-- Indexes for table `PANIER`
--
ALTER TABLE `PANIER`
  ADD PRIMARY KEY (`ID_Panier`),
  ADD UNIQUE KEY `PANIER_BUYER_AK` (`ID_Buyer`);

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
  MODIFY `Id_Item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `PANIER`
--
ALTER TABLE `PANIER`
  MODIFY `ID_Panier` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `CONTAIN`
--
ALTER TABLE `CONTAIN`
  ADD CONSTRAINT `CONTAIN_Item_FK` FOREIGN KEY (`Id_Item`) REFERENCES `Item` (`Id_Item`),
  ADD CONSTRAINT `CONTAIN_PANIER0_FK` FOREIGN KEY (`ID_Panier`) REFERENCES `PANIER` (`ID_Panier`);

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

--
-- Constraints for table `PANIER`
--
ALTER TABLE `PANIER`
  ADD CONSTRAINT `PANIER_BUYER_FK` FOREIGN KEY (`ID_Buyer`) REFERENCES `BUYER` (`ID_Buyer`);