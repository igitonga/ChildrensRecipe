-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 12:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `childrens_recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Joan', 'Wangari', 'joanwangari@gmail.com', 'wangari001');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `recipe_title` varchar(255) NOT NULL,
  `small description` varchar(2000) NOT NULL,
  `ingredients` varchar(2000) NOT NULL,
  `instructions` varchar(2500) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `image`, `recipe_title`, `small description`, `ingredients`, `instructions`, `admin_id`, `timestamp`) VALUES
(7, '604602a3a70338.35514797.jpg', 'Food', 'gdhdjbjdjdkkdd', 'dkkdkdkkd', 'kdkdkdkd', 1, '2021-03-08 10:55:31'),
(8, '604606d6f37753.99665614.jpg', 'Baked Feta Pasta', 'This is the story about another viral TikTok trend ', 'This is the story about another viral TikTok trend ', 'This is the story about another viral TikTok trend ', 1, '2021-03-08 11:13:26'),
(9, '6046092cd72b03.30766056.jpg', 'Beer-Battered Fish', 'Fish is a great source of proteins, omega 3, and amino acids. ', '2 fish fillet\r\ncooking cream 250 ml\r\ncoriander \r\nsalt\r\nOnions\r\ncooking oil\r\n', 'Dice the onions\r\nadd the cooking oil\r\nFry till brown\r\nAdd the Fish.\r\nLet it cook for 5 minutes.\r\nAdd the cooking cream. Let it simmer.\r\nServe while hot', 1, '2021-03-08 11:23:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
