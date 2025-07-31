-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 06:05 PM
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

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`dog_id`, `dog_code`, `dog_name`, `dog_owner_name`, `dog_breeder_name`, `dog_date_registration`, `dog_image`, `dog_country`, `dog_color`, `dog_height`, `dog_date_of_birth`, `dog_contact_number`, `dog_facebook_name`, `dog_ig_name`, `dog_type_status`, `dog_registered_status`) VALUES
(13, '99000004791297', 'husky', 'april jane', 'juan dela cruz', '2025-07-31 07:20:54', 'dog_688b19568fceb0.96194899.png', 'philippines', 'white', '3ft', '2025-03-25', '09454454744', 'HUBBY', 'HUBBY', 'regular', 1),
(14, '99000007215398', 'bobbies', 'joshua padilla', 'juan dela cruz', '2025-07-31 15:47:15', 'dog_688b9003634a94.68791231.jpg', 'philippines', 'white', '5ft', '2025-03-25', '09454454744', 'booby', 'booby', 'regular', 1),
(17, '99000003939935', 'mark', NULL, NULL, '2025-07-31 15:16:06', 'dog_688b88b6d6ac99.27833191.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, '99000001784755', 'fdefsefse', NULL, NULL, '2025-07-31 15:35:47', 'dog_688b8d535bb9f9.03702900.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, '99000007402568', 'patty', NULL, NULL, '2025-07-31 16:04:33', 'dog_688b9411105315.87173173.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
-- Dumping data for table `generation`
--

INSERT INTO `generation` (`gen_id`, `gen_dog_id`, `father_dog_id`, `mother_dog_id`, `grandfather1_dog_id`, `grandmother1_dog_id`, `grandfather2_dog_id`, `grandmother2_dog_id`, `ggfather1_dog_id`, `ggmother1_dog_id`, `ggfather2_dog_id`, `ggmother2_dog_id`, `ggfather3_dog_id`, `ggmother3_dog_id`, `ggfather4_dog_id`, `ggmother4_dog_id`) VALUES
(3, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, NULL),
(4, 14, NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, NULL, NULL, NULL, NULL, 13, 18);

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
  ADD KEY `gen_dog_id` (`gen_dog_id`),
  ADD KEY `ggfather1_dog_id` (`ggfather1_dog_id`),
  ADD KEY `ggfather2_dog_id` (`ggfather2_dog_id`),
  ADD KEY `ggfather3_dog_id` (`ggfather3_dog_id`),
  ADD KEY `ggfather4_dog_id` (`ggfather4_dog_id`),
  ADD KEY `ggmother1_dog_id` (`ggmother1_dog_id`),
  ADD KEY `ggmother2_dog_id` (`ggmother2_dog_id`),
  ADD KEY `ggmother3_dog_id` (`ggmother3_dog_id`),
  ADD KEY `ggmother4_dog_id` (`ggmother4_dog_id`),
  ADD KEY `grandfather1_dog_id` (`grandfather1_dog_id`),
  ADD KEY `grandfather2_dog_id` (`grandfather2_dog_id`),
  ADD KEY `grandmother1_dog_id` (`grandmother1_dog_id`),
  ADD KEY `grandmother2_dog_id` (`grandmother2_dog_id`),
  ADD KEY `mother_dog_id` (`mother_dog_id`);

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
  MODIFY `dog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `generation`
--
ALTER TABLE `generation`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `generation`
--
ALTER TABLE `generation`
  ADD CONSTRAINT `generation_ibfk_1` FOREIGN KEY (`gen_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_10` FOREIGN KEY (`grandfather1_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_11` FOREIGN KEY (`grandfather2_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_12` FOREIGN KEY (`grandmother1_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_13` FOREIGN KEY (`grandmother2_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_14` FOREIGN KEY (`mother_dog_id`) REFERENCES `dogs` (`dog_id`),
  ADD CONSTRAINT `generation_ibfk_2` FOREIGN KEY (`ggfather1_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_3` FOREIGN KEY (`ggfather2_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_4` FOREIGN KEY (`ggfather3_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_5` FOREIGN KEY (`ggfather4_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_6` FOREIGN KEY (`ggmother1_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_7` FOREIGN KEY (`ggmother2_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_8` FOREIGN KEY (`ggmother3_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_9` FOREIGN KEY (`ggmother4_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
