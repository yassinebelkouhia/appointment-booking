-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 03:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyerBooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `rendez-v`
--

CREATE TABLE `rendez-v` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `time` time NOT NULL,
  `reference_id` varchar(11) NOT NULL,
  `typeDeConsultaion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rendez-v`
--

INSERT INTO `rendez-v` (`id`, `Date`, `time`, `reference_id`, `typeDeConsultaion`) VALUES
(25, '2021-06-08', '14:00:00', '4C1940F', 'bkjbkjbkjb'),
(59, '2021-06-30', '14:00:00', '4C1940F', 'asfasfasfasfasfasfasf'),
(67, '2021-06-30', '09:00:00', '5E69AFF', 'gggf'),
(68, '2021-06-30', '12:00:00', '5E69AFF', 'ddd'),
(69, '2021-06-30', '15:00:00', '5E69AFF', 'vvvv'),
(70, '2021-06-30', '17:00:00', '5E69AFF', 'cccc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Reference` varchar(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Age` int(11) NOT NULL,
  `Email` text NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Reference`, `FirstName`, `LastName`, `Age`, `Email`, `tel`) VALUES
('038B194', 'azeddinezer0', 'youcode ', 11, 'elhanouniazeddine00@gmail.com', 766417716),
('2DFFB30', 'azeddine', 'elhanouni', 23, 'ryozaki@gmail.com', 2123304490),
('4C1940F', 'azeddine', 'elhanouni', 29, 'a@gmail.com', 2147483647),
('5704ECF', 'margaret hamilton', 'youcode', 33, 'elhanouniazeddine00@gmail.com', 766417716),
('5ACC0B6', 'azeddinezer0', 'youcode', 23, 'elhanouniazeddine00@gmail.com', 766417716),
('5C67020', 'azeddinezer0', 'alan', 22, 'elhanouniazeddine00@gmail.com', 766417716),
('5E69AFF', 'margaret hamilton', 'alan', 33, 'elhanouniazeddine00@gmail.com', 766417716),
('70F4289', 'margaret hamilton', 'youcode Juin ', 123, 'elhanouniazeddine00@gmail.com', 766417716),
('73090D1', 'azeddinezer0', 'alan', 333, 'elhanouniazeddine00@gmail.com', 766417716),
('91AE549', 'othman', 'asfasf', 3, 'asas@gmail.com', 766417716),
('9BA9A5A', 'azeddinezer0', 'alan', 333, 'elhanouniazeddine00@gmail.com', 766417716),
('9F74258', 'azeddinezer0', 'margaret hamilton', 222, 'elhanouniazeddine00@gmail.com', 766417716),
('A4C110D', 'azeddinezer0', 'alan', 22, 'elhanouniazeddine00@gmail.com', 766417716),
('EB9C4CC', 'kira', 'ryozaki', 23, 'zero@gmail.com', 2147483647),
('FF26E89', 'moncef', 'azeddinezer0', 22, 'elhanouniazeddine00@gmail.com', 766417716);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rendez-v`
--
ALTER TABLE `rendez-v`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_id` (`reference_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Reference`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rendez-v`
--
ALTER TABLE `rendez-v`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rendez-v`
--
ALTER TABLE `rendez-v`
  ADD CONSTRAINT `ref_id` FOREIGN KEY (`reference_id`) REFERENCES `user` (`Reference`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
