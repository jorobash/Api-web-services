-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 окт 2017 в 02:00
-- Версия на сървъра: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restfullapi`
--

-- --------------------------------------------------------

--
-- Структура на таблица `login_tokens`
--
-- Създаване: 13 окт 2017 в 12:34
--

CREATE TABLE `login_tokens` (
  `token` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `login_tokens`:
--

--
-- Схема на данните от таблица `login_tokens`
--

INSERT INTO `login_tokens` (`token`, `user_id`) VALUES
('a63073544121caca7b2734f3c821dbdad10271dc', 1),
('214db2ec7f4eb8a27bbd3559aaf0b3db0a04cf88', 1),
('9f799f983ab2352dde01f25ad87aa344147be5d9', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `visitrors`
--
-- Създаване: 12 окт 2017 в 20:54
--

CREATE TABLE `visitrors` (
  `id` int(11) NOT NULL,
  `numbers` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `visitrors`:
--

--
-- Схема на данните от таблица `visitrors`
--

INSERT INTO `visitrors` (`id`, `numbers`, `name`) VALUES
(1, '50', 'user'),
(2, '70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitrors`
--
ALTER TABLE `visitrors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitrors`
--
ALTER TABLE `visitrors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
