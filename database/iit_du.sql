-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2020 at 03:41 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iit_du`
--

-- --------------------------------------------------------

--
-- Table structure for table `classTest`
--

CREATE TABLE `classTest` (
  `roll` int NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL,
  `f1` float NOT NULL,
  `f2` float NOT NULL,
  `f3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `classTest`
--

INSERT INTO `classTest` (`roll`, `c1`, `c2`, `c3`, `f1`, `f2`, `f3`) VALUES
(213, 21, 1, 1, 1, 1, 1),
(354, 34, 34, 34, 50, 45, 40),
(642, 23, 32, 12, 30, 40, 50),
(1234, 12, 32, 12, 30, 50, 55),
(2421, 12, 32, 12, 58, 23, 58);

-- --------------------------------------------------------

--
-- Table structure for table `finalMarks`
--

CREATE TABLE `finalMarks` (
  `roll` varchar(100) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL,
  `f1` float NOT NULL,
  `f2` float NOT NULL,
  `f3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `finalMarks`
--

INSERT INTO `finalMarks` (`roll`, `c1`, `c2`, `c3`, `f1`, `f2`, `f3`) VALUES
('1234', 25, 25, 40, 34, 54, 33),
('213', 21, 32, 32, 43, 32, 21),
('2421', 32, 25, 25, 32, 32, 32),
('354', 25, 39, 35, 31, 45, 60),
('642', 40, 32, 25, 23, 43, 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `full_name`) VALUES
('saeed', '99a0c02b28d4df6250f38facbf72319d6dba2cc54e04929a4438cebbc4fa2f6beb372a50d8383bb6b5c71234e2dd78047e72cd47f576575d161f06d6ce0980bc', 'saeed siddik'),
('teacher1', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'teacher 1'),
('teacher2', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'teacher 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classTest`
--
ALTER TABLE `classTest`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `finalMarks`
--
ALTER TABLE `finalMarks`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
