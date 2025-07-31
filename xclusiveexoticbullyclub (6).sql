-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 09:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xclusiveexoticbullyclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(60) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_email`, `admin_password`) VALUES
(1, 'Xclusiveexoticbullyclub', 'andersonandy046@gmail.com', '$2a$12$yN0Q7Y3V3ACPIjLgVFNRnus/Kp58LjvbLo98IVZ/23YjQ.bXgW1UW');

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `dog_id` int(11) NOT NULL,
  `dog_code` varchar(60) NOT NULL,
  `dog_name` varchar(60) NOT NULL,
  `dog_owner_name` varchar(60) DEFAULT NULL,
  `dog_breeder_name` varchar(60) DEFAULT NULL,
  `dog_date_registration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dog_image` varchar(255) NOT NULL,
  `dog_country` varchar(60) DEFAULT NULL,
  `dog_color` varchar(60) DEFAULT NULL,
  `dog_height` varchar(60) DEFAULT NULL,
  `dog_date_of_birth` date DEFAULT NULL,
  `dog_contact_number` varchar(25) DEFAULT NULL,
  `dog_facebook_name` varchar(60) DEFAULT NULL,
  `dog_ig_name` varchar(60) DEFAULT NULL,
  `dog_type_status` enum('regular','exclusive') DEFAULT NULL,
  `dog_registered_status` int(11) NOT NULL COMMENT '0=not registered,1=registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generation`
--

CREATE TABLE `generation` (
  `gen_id` int(11) NOT NULL,
  `gen_dog_id` int(11) NOT NULL,
  `father_dog_id` int(11) DEFAULT NULL,
  `mother_dog_id` int(11) DEFAULT NULL,
  `grandfather1_dog_id` int(11) DEFAULT NULL,
  `grandmother1_dog_id` int(11) DEFAULT NULL,
  `grandfather2_dog_id` int(11) DEFAULT NULL,
  `grandmother2_dog_id` int(11) DEFAULT NULL,
  `ggfather1_dog_id` int(11) DEFAULT NULL,
  `ggmother1_dog_id` int(11) DEFAULT NULL,
  `ggfather2_dog_id` int(11) DEFAULT NULL,
  `ggmother2_dog_id` int(11) DEFAULT NULL,
  `ggfather3_dog_id` int(11) DEFAULT NULL,
  `ggmother3_dog_id` int(11) DEFAULT NULL,
  `ggfather4_dog_id` int(11) DEFAULT NULL,
  `ggmother4_dog_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`dog_id`);

--
-- Indexes for table `generation`
--
ALTER TABLE `generation`
  ADD PRIMARY KEY (`gen_id`),
  ADD KEY `gen_dog_id` (`gen_dog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `dog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `generation`
--
ALTER TABLE `generation`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `generation`
--
ALTER TABLE `generation`
  ADD CONSTRAINT `generation_ibfk_1` FOREIGN KEY (`gen_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
