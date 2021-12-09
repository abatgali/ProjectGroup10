-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 07:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
CREATE DATABASE IF NOT EXISTS `entrees_louies` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `entrees_louies`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_id` varchar(3) NOT NULL,
  `Food_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `Food_type`) VALUES
('a', 'appetizers'),
('ent', 'Entrees'),
('s', 'soups');

-- --------------------------------------------------------

--
-- Table structure for table `fortunes`
--

CREATE TABLE `fortunes` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fortunes`
--

INSERT INTO `fortunes` (`id`, `quote`) VALUES
(1, 'A beautiful, smart, and loving person will be coming into your life.'),
(2, 'A dubious friend may be an enemy in camouflage.'),
(3, 'A faithful friend is a strong defense.'),
(4, 'A feather in the hand is better than a bird in the air.'),
(5, 'A fresh start will put you on your way.'),
(6, 'A friend asks only for your time not your money.'),
(7, 'A friend is a present you give yourself.'),
(8, 'A gambler not only will lose what he has, but also will lose what he doesn’t have.'),
(9, 'A golden egg of opportunity falls into your lap this month.'),
(10, 'A good friendship is often more important than a passionate romance.'),
(11, 'A good time to finish up old tasks.'),
(12, 'A hunch is creativity trying to tell you something.'),
(13, 'A lifetime friend shall soon be made.'),
(14, 'A lifetime of happiness lies ahead of you.'),
(15, 'A light heart carries you through all the hard times.'),
(16, 'A new perspective will come with the new year.'),
(17, 'A person of words and not deeds is like a garden full of weeds.'),
(18, 'A pleasant surprise is waiting for you.'),
(19, 'A short pencil is usually better than a long memory any day.'),
(20, 'A small donation is call for. It’s the right thing to do.'),
(21, 'A smile is your personal welcome mat.'),
(22, 'A smooth long journey! Great expectations.'),
(23, 'A soft voice may be awfully persuasive.'),
(24, 'A truly rich life contains love and art in abundance.'),
(25, 'Accept something that you cannot change, and you will feel better.'),
(26, 'Adventure can be real happiness.'),
(27, 'Advice, when most needed, is least heeded.'),
(28, 'All the effort you are making will ultimately pay off.'),
(29, 'All the troubles you have will pass away very quickly.'),
(30, 'All will go well with your new project.'),
(31, 'All your hard work will soon pay off.'),
(32, 'Allow compassion to guide your decisions.'),
(33, 'An acquaintance of the past will affect you in the near future.'),
(34, 'An agreeable romance might begin to take on the appearance.'),
(35, 'An important person will offer you support.'),
(36, 'An inch of time is an inch of gold.'),
(37, 'Any decision you have to make tomorrow is a good decision.'),
(38, 'At the touch of love, everyone becomes a poet.'),
(39, 'Do not be intimidated by the eloquence of others.'),
(40, 'Don’t just spend time. Invest it.'),
(41, 'Education is the ability to meet life’s situations.'),
(42, 'Everyday in your life is a special occasion.'),
(43, 'Failure is the path of lease persistence.'),
(44, 'How you look depends on where you go.'),
(45, 'It takes courage to admit fault.'),
(46, 'New ideas could be profitable.'),
(47, 'People find it difficult to resist your persuasive manner.'),
(48, 'Pick battles big enough to matter, small enough to win.'),
(49, 'Soon life will become more interesting.'),
(50, 'Those who care will make the effort.');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `Item_id` int(11) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Category_id` varchar(3) NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`Item_id`, `Product_name`, `Category_id`, `Price`, `Description`) VALUES
(1, 'Egg Roll', '', 3.11, 'Meat and shredded vegetables wrapped in a dough made with egg and deep-fried.'),
(2, 'Vegetable Egg Roll', 'a', 3.15, 'Shredded cabbage, chopped pork, thickly-wrapped wheat flour skin, which is fried in hot oil. The dish is served warm, and is usually eaten with the fingers, dipped in duck sauce, soy sauce, plum sauce or hot mustard, often from a cellophane packet. '),
(3, 'Wonton Soup', 's', 4.25, 'Soup with won ton dumplings. Liquid food especially of meat or fish or vegetable stock often containing pieces of solid food. '),
(4, 'Chicken Noodle Soup', 's', 4.25, 'Soup made with chicken broth, chicken, and noodles and often with chopped vegetables. '),
(5, 'Vegetable Chow Mein', 'ent', 9.85, 'Noodles and cabbage, bamboo shoots, pea pods, green peppers, and carrots. In the New Delhi area, chow mein can sometimes include paneer with the mixture of noodles and vegetables.'),
(6, 'Chicken Chow Mein', 'ent', 10.85, 'Egg noodles and stir-fried veggies. Protein based and different meat or tofu. This dish is pan-fried so the noodles get a nice crisp to them and then tossed in a yummy sauce. '),
(7, 'Beef Chow Mein', 'ent', 11.75, 'Beef bicarbonate soda, sauce is made form garlic, rice wine, light stock, MSG, salt and corn flour. '),
(8, 'Fried Shrimp', '', 7.75, 'Fried Shrimp'),
(9, 'Fried Chicken Wings', 'a', 7.75, 'Wings of a chicken that are fried.'),
(10, 'BBQ Pork', 'a', 7.75, 'Pork of a BBQ'),
(11, 'BBQ Ribs', 'a', 8.25, 'Tired of Pork? Try our Ribs'),
(12, 'Crab Rangoon', 'a', 6.95, 'This is a crab rangoon '),
(13, 'Pot Stickers', 'a', 6.95, 'Stickers that pop!'),
(14, 'Egg Drop Soup', 's', 3.25, 'Soup that has egg drops in it.'),
(15, 'Chicken Rice Soup', 's', 3.25, 'Its like our chicken noodle soup, but instead of noodles its rice :)'),
(16, 'Shrimp Noodle Soup', 's', 7.75, 'Its like our chicken noodle soup, but instead of chicken its shrimp'),
(17, 'Vegetable Soup', 's', 3.25, 'Vegan soup'),
(18, 'Hot & Sour Soup', 's', 3.55, 'Its like our other soups, but hot and sour.'),
(19, 'Tofu Seafood Soup', 's', 8.35, 'I don\'t know what this soup is ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `username`, `role`) VALUES
(1, 'Alex ', 'Weber', 'aw118@iu.edu', 'password', '', 0),
(2, 'John', 'Doe', 'johndoe@gmail.com', 'password', '', 0),
(3, 'John', 'Doe', 'Johndoe@gmail.com', 'password\r\n', '', 1),
(4, 'a', 'a', 'a@a.com', '', 'a', 2),
(5, 'a', 'a', 'a@aaaaa.com', 'password', '', 2),
(6, 'Louie', 'Zhu', 'louieZHuu@gmail.com', 'louie', '', 1),
(7, 'a', 'a', 'a@a.com', 'aaaa', '', 2),
(8, 'isaac', 'Lowe', 'isaaclowe4@gmail.com', 'phpuser', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `fortunes`
--
ALTER TABLE `fortunes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fortunes`
--
ALTER TABLE `fortunes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `Item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
