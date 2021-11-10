-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 09:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entrees_louies`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoriess`
--

CREATE TABLE `categoriess` (
  `category_ID` varchar(3) NOT NULL,
  `Food_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoriess`
--

INSERT INTO `categoriess` (`category_ID`, `Food_Type`) VALUES
('a', 'appetizers'),
('ent', 'Entrees'),
('s', 'soups');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `Item_ID` int(11) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `category_id` varchar(3) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`Item_ID`, `Product_name`, `category_id`, `Price`) VALUES
(1, 'Egg Roll', 'a', 3.15),
(2, 'Vegetable Egg Roll', 'a', 3.15),
(3, 'Wonton Soup', 's', 4.25),
(4, 'Chicken Noodle Soup', 's', 4.25),
(5, 'Vegetable Chow Mein', 'ent', 9.85),
(6, 'Chicken Chow Mein', 'ent', 10.85),
(7, 'Beef Chow Mein', 'ent', 11.75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoriess`
--
ALTER TABLE `categoriess`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`Item_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
