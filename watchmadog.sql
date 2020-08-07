-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 20, 2020 at 04:49 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watchmadog`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dogsitters`
--

CREATE TABLE `Dogsitters` (
  `dogsitter_id` int(10) NOT NULL,
  `price` int(11) NOT NULL,
  `calendar` varchar(100) NOT NULL,
  `pic_name` varchar(15) NOT NULL,
  `pet_wanted` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Dogsitters`
--

INSERT INTO `Dogsitters` (`dogsitter_id`, `price`, `calendar`, `pic_name`, `pet_wanted`) VALUES
(2, 'Marco', 7, '', 'p1.png', 'dog'),
(3, 'Maria', 28, '', 'p2.png', 'dog;cat'),
(4, 'Joan', 5, '', 'p3.png', 'dog;cat'),
(5, 'Caterina', 15, '', 'p4.png', 'cat'),
(6, 'Alex', 5, '', 'p5.png', 'cat'),
(7, 'Thomas', 5, '', 'p6.png', 'dog'),
(8, 'Max', 5, '', 'p7.png', 'dog'),
(9, 'Bea', 18, '', 'p8.png', 'dog;cat'),
(10, 'Marta', 22, '', 'p9.jpg', 'cat');

-- --------------------------------------------------------

--
-- Table structure for table `Pets`
--

CREATE TABLE `Pets` (
  `pet_id` int(10) NOT NULL,
  `pet` varchar(15) NOT NULL,
  `pic_name` varchar(15) DEFAULT NULL,
  `size` varchar(10) NOT NULL,
  `calendar` varchar(100) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `max_price` int(11) NOT NULL,
  `owner_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Pets`
--

INSERT INTO `Pets` (`pet_id`, `pet`, `pic_name`, `size`, `calendar`, `name`, `max_price`, `owner_id`) VALUES
(10, 'cat', 'cat2.jpg', 'medium', 'we', 'Gigi', 23, 12),
(11, 'dog', 'dog4.jpg', 'small', 'we', 'BOBO', 23, 12),
(19, 'dog', 'dog5.jpg', 'small', 'we', 'Edd', 7, 12),
(21, 'cat', 'cat3.jpg', 'large', '', 'hoho', 21, 23),
(22, 'dog', 'dog2.jpg', 'medium', '2', '3', 4, 5),
(23, 'cat', 'cat4.jpg', 'large', '', 'hoho', 21, 23),
(29, 'cat', 'cat2.jpg', 'small', '', 'hehe', 21, 23),
(30, 'dog', 'dog1.jpg', 'small', 'e', '1', 2, 3),
(31, 'dog', 'dog3.jpg', 'large', 's', 'hehe', 21, 23);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL,
  `birthyear` varchar(5) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `surname`, `region`, `birthyear`, `phone`, `email`, `pass`) VALUES
(1, 'Paola', 'Gestrozza', 'Veneto', '1987', '329877111', 'paolagestrozza@gmail.com', 'lolito'),
(2, 'Michele', 'Gemini', 'Veneto', '1977', '123456789', '', ''),
(3, 'Mauro', 'Gemini', 'Veneto', '1967', '123456789', '', ''),
(4, 'Marzia', 'Gemini', 'Veneto', '1977', '123456789', '', ''),
(5, 'Curmio', 'Gemini', 'Veneto', '1977', '123456789', '', ''),
(6, 'Molio', 'Gemini', 'Veneto', '1977', '123456789', '', ''),
(7, 'Gnazza', 'Gemini', 'Veneto', '1999', '123456789', '', ''),
(8, 'Pelmia', 'Gemini', 'Veneto', '1977', '123456789', '', ''),
(11, 'Michele', 'Gemini', 'Veneto', '1988', '123456789', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dogsitters`
--
ALTER TABLE `Dogsitters`
  ADD PRIMARY KEY (`dogsitter_id`);

--
-- Indexes for table `Pets`
--
ALTER TABLE `Pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Pets`
--
ALTER TABLE `Pets`
  MODIFY `pet_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
