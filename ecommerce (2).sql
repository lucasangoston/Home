-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 02:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `idAddress` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`idAddress`, `address`, `zipCode`, `city`, `country`) VALUES
(4, '3 HAMEAU DU BOIS D\'AMOUR', 77176, 'Savigny-le-Temple', 'France'),
(11, '3 HAMEAU DU BOIS D\'AMO', 77176, 'Savigny-le-temple', 'France');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `sex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`idArticle`, `name`, `description`, `price`, `stock`, `idCategory`, `picture_url`, `active`, `sex`) VALUES
(1, 'SAC SEAU NÉONOÉ', '                Confectionné en toile Damier Ébène, ce sac seau NéoNoé est rehaussé d\'un cordon coloré et d\'une doublure contrecollée assortie. Doté d\'une bandoulière de sac ajustable, ce modèle léger et confortable offre un porté à l\'épaule ou croisé court ou long. La poche intérieure dotée d\'une fermeture à glissière protège vos objets de valeur.            ', 1180, 0, 1, 'view/img/sacFemme.jpg', 1, 'femme'),
(3, 'VESTE EN DENIM MATELASSÉE', 'Cette veste en denim délavé offre une version décontractée du modèle classique de la collection. Son haut matelassé, ses manches trois-quarts, sa taille froncée et ses épaules tombantes figurent parmi les détails phares de la saison. Ce modèle est signé de deux badges Home Midnight sur les pointes du col et de boutons Louis Vuitton.', 1900, 1, 3, 'view/img/vesteFemme.jpg', 1, 'femme'),
(4, 'VESTE MONOGRAM EN DENIM DOUX', 'Cette veste Monogram en denim doux interprète dans un style décontracté le motif emblématique de la Maison, ici décliné en jacquard tissé. La veste a été délavée pour adoucir le tissu. Cette pièce ajustée comporte une fermeture à glissière et des finitions métalliques ton sur ton sophistiquées.', 1800, 0, 3, 'view/img/vesteHomme.jpg', 1, 'homme'),
(5, 'TEE-SHIRT MONOGRAM À POCHE 3D', '                Ce tee-shirt Monogram à poche 3D allie la toile emblématique de la Maison à la poche à gousset arrondie de la saison située sur la poitrine. Confectionné en piqué de coton, ce modèle à la coupe légèrement ample présente un motif Monogram continu. Sur le côté se trouve une agrafe gravée Home.            ', 490, 0, 1, 'view/img/pullHomme.jpg', 1, 'homme'),
(6, 'PORTE-DOCUMENTS VOYAGE PM', 'Habillé de toile Damier Graphite masculine, le Porte-Documents Voyage PM affiche un style élégant et naturel. Doté de garnitures en cuir lisse et d’un intérieur spacieux, il conjugue luxe et fonctionnalité.', 990, 0, 1, 'view/img/sacHomme.jpg', 1, 'homme');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `idBasket` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`idBasket`, `idUser`, `idArticle`) VALUES
(5, 11, 5),
(7, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `name`) VALUES
(1, 'sac'),
(2, 'Chemise'),
(3, 'Veste'),
(4, 'Tee-shirt');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `idParcel` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `idAddress` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`idParcel`, `idUser`, `date`, `idAddress`, `status`) VALUES
(1, 1, '2020-02-25 19:23:35', 4, 'validé'),
(2, 1, '2020-02-25 23:18:40', 4, 'validé'),
(3, 1, '2020-02-25 23:18:50', 4, 'validé'),
(4, 1, '2020-02-25 23:19:05', 4, 'validé'),
(5, 1, '2020-02-25 23:19:26', 4, 'validé'),
(6, 1, '2020-10-25 23:20:01', 4, 'validé'),
(7, 21, '2021-03-20 13:39:39', 4, 'validé');

-- --------------------------------------------------------

--
-- Table structure for table `parceldetail`
--

CREATE TABLE `parceldetail` (
  `idParcelDetail` int(11) NOT NULL,
  `idParcel` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `amount` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parceldetail`
--

INSERT INTO `parceldetail` (`idParcelDetail`, `idParcel`, `idArticle`, `amount`, `total`) VALUES
(3, 1, 5, 1, 490),
(4, 1, 4, 1, 1800),
(5, 2, 1, 1, 1180),
(6, 2, 3, 1, 1900),
(7, 6, 6, 1, 990),
(8, 7, 5, 1, 490);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `idAddress` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `inscriptionDate` datetime NOT NULL,
  `role` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `firstName`, `lastName`, `date`, `idAddress`, `mail`, `password`, `number`, `inscriptionDate`, `role`, `active`) VALUES
(1, 'lucas', 'angoston', '1998-01-19', 4, 'lucas_angoston@yahoo.fr', 'lulu', 646373883, '2020-02-17 15:42:13', 'Admin', 1),
(11, 'karine', 'angoston', '2020-02-17', 4, 'karinechauvel1@yahoo.fr', 'lulu', 2147483647, '2020-02-18 21:14:15', 'User', 1),
(18, 'karine', 'chauvel', '2020-02-13', 11, 'karuvel1@yahoo.fr', 'luluu', 614110296, '2020-02-24 23:03:55', 'User', 1),
(19, 'lucas', 'angoston', '2020-02-11', 11, 'lucaro@gmail.com', 'lulu', 646373883, '2020-02-24 23:05:05', 'User', 1),
(21, 'lucas', 'angoston', '2021-03-10', 4, 'lucas_angoston@free.fr', 'bastien1', 2147483647, '2021-03-20 13:38:50', 'User', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`idAddress`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `fbk_category` (`idCategory`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`idBasket`),
  ADD KEY `fbk_user` (`idUser`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`idParcel`),
  ADD KEY `fbk_address` (`idAddress`),
  ADD KEY `fbk_user` (`idUser`) USING BTREE;

--
-- Indexes for table `parceldetail`
--
ALTER TABLE `parceldetail`
  ADD PRIMARY KEY (`idParcelDetail`),
  ADD KEY `idArticle` (`idArticle`),
  ADD KEY `if` (`idParcel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fbk_address` (`idAddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `idAddress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `idBasket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `idParcel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parceldetail`
--
ALTER TABLE `parceldetail`
  MODIFY `idParcelDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fbk_category` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `fbk_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `parcel`
--
ALTER TABLE `parcel`
  ADD CONSTRAINT `fbk_address` FOREIGN KEY (`idAddress`) REFERENCES `address` (`idAddress`),
  ADD CONSTRAINT `parcel_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `parceldetail`
--
ALTER TABLE `parceldetail`
  ADD CONSTRAINT `parceldetail_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `parceldetail_ibfk_3` FOREIGN KEY (`idParcel`) REFERENCES `parcel` (`idParcel`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idAddress`) REFERENCES `address` (`idAddress`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
