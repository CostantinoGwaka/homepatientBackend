-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 06:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remote_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `phonenumber`, `email`, `password`, `level`, `status`, `full_name`) VALUES
(1, '0689583281', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1', 0, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image_name` text NOT NULL,
  `post_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `image_name`, `post_date`) VALUES
(4, 'AFYA YA MWILI NA AKILI', 'tunakula matunza haahhha tunakula matunza haahhha tunakula matunza haahhha tunakula matunza haahhha tunakula matunza haahhha tunakula matunza haahhha tunakula matunza haahhha ', 'Lightbox Text Effect.jpg', '2021-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `callback`
--

CREATE TABLE `callback` (
  `id` int(11) NOT NULL,
  `doctor_phone` text NOT NULL,
  `call_date` text NOT NULL,
  `patient_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `callback`
--

INSERT INTO `callback` (`id`, `doctor_phone`, `call_date`, `patient_id`) VALUES
(2, '0659515042', '2021-06-20 - 11:41', '0659515042'),
(3, '0659515042', '2021-06-20 - 11:51', '0659515042');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `location` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `fname`, `location`, `phone`, `password`) VALUES
(1, 'Costantino', 'Dodoma', '0659515042', '123456789'),
(4, 'Gwaka', 'Moro', '0659515041', '123456789'),
(6, 'Jame Tupatupa', 'DODOMA', '0659515040', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `from` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `location` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `doctor_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fname`, `location`, `phone`, `password`, `doctor_id`) VALUES
(43, 'JUMA BAKARI', 'Dodoma', '0659515042', '123456789', '1');

-- --------------------------------------------------------

--
-- Table structure for table `track_history`
--

CREATE TABLE `track_history` (
  `id` int(11) NOT NULL,
  `bpm` text NOT NULL,
  `dates` text NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track_history`
--

INSERT INTO `track_history` (`id`, `bpm`, `dates`, `user_id`) VALUES
(3, '71', '2021-06-19', '0659515042'),
(4, '66', '2021-06-19', '0659515042'),
(5, '69', '2021-06-19', '0659515042'),
(6, '117', '2021-06-19 - 23:06', '0659515042'),
(7, '131', '2021-06-19 - 23:12', '0659515042');

-- --------------------------------------------------------

--
-- Table structure for table `wilaya`
--

CREATE TABLE `wilaya` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilaya`
--

INSERT INTO `wilaya` (`id`, `name`) VALUES
(1, 'DODOMA CBD'),
(2, 'DODOMA'),
(3, 'BAHI'),
(4, 'CHAMWINO'),
(5, 'KONGWA '),
(6, 'MPWAPWA'),
(7, 'KONDOA'),
(8, 'CHEMBA');

-- --------------------------------------------------------

--
-- Table structure for table `wilaya_kata`
--

CREATE TABLE `wilaya_kata` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `wliaya_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilaya_kata`
--

INSERT INTO `wilaya_kata` (`id`, `name`, `wliaya_id`) VALUES
(1, 'Uhuru', '1'),
(2, 'Viwandani', '1'),
(3, 'Madukani', '1'),
(4, 'Tambukareli', '1'),
(5, 'Makole', '1'),
(6, 'Majengo', '1'),
(7, 'Makutopora', '2'),
(8, 'Ipala', '2'),
(9, 'Chihanga', '2'),
(10, 'Hombolo Bwawani', '2'),
(11, 'Msalato ', '2'),
(12, 'Kikombo ', '2'),
(13, 'Mtumba', '2'),
(14, 'Bahi', '3'),
(15, 'Ibihwa', '3'),
(16, 'Ilindi', '3'),
(17, 'Kigwe', '3'),
(18, 'Mpamamtwa', '3'),
(19, 'Chali', '3'),
(20, 'Chikola', '3'),
(21, 'Chilonwa', '4'),
(22, 'Buigiri', '4'),
(23, 'Majeleko', '4'),
(24, 'Manchali', '4'),
(25, 'Msanga', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callback`
--
ALTER TABLE `callback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_history`
--
ALTER TABLE `track_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilaya`
--
ALTER TABLE `wilaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilaya_kata`
--
ALTER TABLE `wilaya_kata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `callback`
--
ALTER TABLE `callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `track_history`
--
ALTER TABLE `track_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wilaya`
--
ALTER TABLE `wilaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wilaya_kata`
--
ALTER TABLE `wilaya_kata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
