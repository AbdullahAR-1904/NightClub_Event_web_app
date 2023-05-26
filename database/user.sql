-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: May 08, 2023 at 05:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `serial` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `born in` varchar(25) NOT NULL,
  `username` varchar(40) NOT NULL,
  `recoveryemail` varchar(40) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`serial`, `email`, `password`, `dateofbirth`, `born in`, `username`, `recoveryemail`, `status`) VALUES
(1, 'abc@gmaill.com', '', '2023-02-02 00:00:00', 'ISB', 'root', 'aa@gmail.com', 0),
(3, 'admin@gmail.com', '123', '2020-12-31 00:00:00', 'A', 'root', 'abc@gmail.com', 1),
(4, 'xyz@gmail.com', '', '0001-02-01 00:00:00', 'qq', 'hello', 'xyz@gmail.com', 0),
(5, 'abbasibro.ab@gmail.com', '123', '0001-01-01 00:00:00', 'a', 'a', 'abbasibro.ab@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `id` int(11) NOT NULL,
  `referal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referal`
--

INSERT INTO `referal` (`id`, `referal`) VALUES
(1, '123123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `serial` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `born in` varchar(25) NOT NULL,
  `username` varchar(40) NOT NULL,
  `recoveryemail` varchar(40) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`serial`, `email`, `password`, `dateofbirth`, `born in`, `username`, `recoveryemail`, `status`) VALUES
(55, 'abx@gmail.com', '123', '2023-04-10 04:31:09', 'Islamabad', 'abdullah', '', 1),
(56, 'user@gmail.com', '123', '2023-04-10 04:32:08', 'Pindi', 'Abdullah_1904', '', 1),
(57, 'abbasibro.ab@gmail.com', '123', '2023-04-10 04:33:02', '', 'Abdullah_1904', '', 1),
(58, 'a@gmail.com', '123', '2023-04-10 04:35:10', '', 'Abdullah_1904', '', 1),
(59, 'nt@gmail.com', '1', '2023-04-17 11:11:00', '', 'nt', '', 0),
(60, 'abd@cds.com', '123', '2023-04-25 20:14:41', '', 'abd', 'ab@gmail.com', 0),
(61, 'ajay@gmail.com', '123', '2023-04-26 00:00:00', '', 'ajay', 'ajay@gmail.com', 1),
(63, 'Huawei_laptop@gmaill.com', '123', '2023-04-02 00:00:00', 'Islamabad', 'Huawei_laptop', 'Huawei_laptop@gmaill.com', 1),
(64, 'ab19@gmail.com', 'ab19@gmail.com', '2023-04-27 00:00:00', 'ab19@gmail.com', 'ab19@gmail.com', 'ab19@gmail.com', 1),
(65, 'ab.ab@gmail.com', '123', '2023-05-08 00:00:00', 'khi', 'ab', 'ab.ab@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `referal`
--
ALTER TABLE `referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
