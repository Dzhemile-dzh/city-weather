-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2022 at 10:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orbis_weather`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_weather`
--

CREATE TABLE `city_weather` (
  `id` int(5) NOT NULL,
  `city_name` varchar(120) NOT NULL,
  `weather_description` varchar(120) NOT NULL,
  `temperature` float NOT NULL,
  `wind_speed` float NOT NULL,
  `curr_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_weather`
--

INSERT INTO `city_weather` (`id`, `city_name`, `weather_description`, `temperature`, `wind_speed`, `curr_date`) VALUES
(2, 'Varna', 'clear sky', 12, 3.6, '2022-10-09 19:46:08'),
(3, 'Varna', 'cloudy', 14, 6.4, '2022-10-09 19:46:51'),
(4, 'Sofia', 'clear sky', 25, 4.6, '2022-10-09 19:47:24'),
(5, 'Haskovo', 'few clouds', 21, 3.2, '2022-10-09 19:48:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_weather`
--
ALTER TABLE `city_weather`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_weather`
--
ALTER TABLE `city_weather`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
