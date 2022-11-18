-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 07:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `st_form`
--

CREATE TABLE `st_form` (
  `id` int(50) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `roll_no` int(50) NOT NULL,
  `st_class` varchar(50) NOT NULL,
  `st_section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `st_form`
--

INSERT INTO `st_form` (`id`, `st_name`, `roll_no`, `st_class`, `st_section`) VALUES
(15, 'Sabreen', 16, 'BSc', 'B'),
(16, 'Teena', 17, 'MCS', 'C'),
(17, 'Asad', 18, 'MCS', 'C'),
(18, 'Asad', 18, 'MCS', 'C'),
(19, 'Teena', 19, 'BSc', 'A'),
(20, 'Sabreen', 20, 'BSc', 'B'),
(21, 'Sabreen', 20, 'BSc', 'B'),
(22, 'Zarmeen', 22, 'fsc', 'A'),
(23, 'Zarmeen', 22, 'fsc', 'A'),
(61, 'Emaan', 23, 'BSc', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `st_sbject`
--

CREATE TABLE `st_sbject` (
  `id` int(50) NOT NULL,
  `st_id` int(100) NOT NULL,
  `sbj_code` varchar(50) NOT NULL,
  `sbj_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `st_sbject`
--

INSERT INTO `st_sbject` (`id`, `st_id`, `sbj_code`, `sbj_name`) VALUES
(13, 15, '003', 'Computer'),
(14, 15, '005', 'PHP'),
(15, 16, '003', 'Computer'),
(16, 16, '005', 'PHP'),
(17, 17, '003', 'Computer'),
(18, 18, '003', 'Computer'),
(19, 19, '003', 'Computer'),
(20, 20, '005', 'PHP'),
(21, 21, '005', 'PHP'),
(22, 22, '004', 'OOP'),
(23, 23, '004', 'OOP'),
(63, 61, '005', 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(5, 'test', 'entry', 'example@gmail.com', '67895'),
(6, 'new', 'entry', 'amber.sialvi18555@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(8, 'Ikram', 'Khan', 'ikram@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `st_form`
--
ALTER TABLE `st_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_sbject`
--
ALTER TABLE `st_sbject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `st_sbject_ibfk_1` (`st_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `st_form`
--
ALTER TABLE `st_form`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `st_sbject`
--
ALTER TABLE `st_sbject`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `st_sbject`
--
ALTER TABLE `st_sbject`
  ADD CONSTRAINT `st_sbject_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `st_form` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
