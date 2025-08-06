-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2025 at 06:07 AM
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
(1, 'Xclusiveexoticbullycluba', 'admin@gmail.com', '$2y$10$SvNa4CqhogtDHqFep2WJauXS8gfjO4gAfLO6COUlfmDg70R8BhToO');

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `dog_id` int(11) NOT NULL,
  `dog_code` varchar(255) NOT NULL,
  `dog_name` varchar(60) NOT NULL,
  `dog_date_registration` date DEFAULT NULL,
  `dog_gender` enum('male','female','','') DEFAULT NULL,
  `dog_owner_name` varchar(60) DEFAULT NULL,
  `dog_breeder_name` varchar(60) DEFAULT NULL,
  `dog_image` varchar(255) NOT NULL,
  `dog_banner` varchar(255) DEFAULT NULL,
  `dog_country` varchar(60) DEFAULT NULL,
  `dog_color` varchar(60) DEFAULT NULL,
  `dog_height` varchar(60) DEFAULT NULL,
  `dog_date_of_birth` date DEFAULT NULL,
  `dog_contact_number` varchar(25) DEFAULT NULL,
  `dog_facebook_name` varchar(60) DEFAULT NULL,
  `dog_facebook_link` varchar(255) DEFAULT NULL,
  `dog_ig_name` varchar(60) DEFAULT NULL,
  `dog_ig_link` varchar(255) DEFAULT NULL,
  `dog_type_status` varchar(60) DEFAULT NULL,
  `dog_registered_status` int(11) NOT NULL COMMENT '0=not registered,1=registered,2=archived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`dog_id`, `dog_code`, `dog_name`, `dog_date_registration`, `dog_gender`, `dog_owner_name`, `dog_breeder_name`, `dog_image`, `dog_banner`, `dog_country`, `dog_color`, `dog_height`, `dog_date_of_birth`, `dog_contact_number`, `dog_facebook_name`, `dog_facebook_link`, `dog_ig_name`, `dog_ig_link`, `dog_type_status`, `dog_registered_status`) VALUES
(41, '888000001', 'TBC MIAGI', '2025-08-03', 'male', 'JORGE SOTO', 'JORGE SOTO', 'dog_688dc85bb80d92.63592581.jpg', 'banner_688dc8888f9891.70421033.jpg', 'USA', 'blue', NULL, '2011-01-18', NULL, 'JORGE LUIS SOTO', 'https://www.facebook.com/jorge.luis.soto.59319?mibextid=wwXIfr&rdid=P1FmWcJE1YdwOeIj&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F19KcYmyrS3%2F%3Fmibextid%3DwwXIfr#', 'thebullycampline', 'https://www.instagram.com/thebullycampline/', 'exclusive', 1),
(42, '888000002', 'MARCELLO', NULL, 'male', NULL, NULL, 'dog_688dd2abcb7f57.44365027.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(43, '888000003', 'LA...', NULL, 'male', NULL, NULL, 'dog_688dd2fada3ab0.66121932.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(44, '888000004', 'goliath ii cali', NULL, 'male', NULL, NULL, 'dog_688dd32d407ef5.33220834.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(45, '888000005', 'black cali', NULL, 'male', NULL, NULL, 'dog_688dd359e373a8.70783033.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(46, '888000006', 'goliath ii cali', NULL, 'male', NULL, NULL, 'dog_688dd37f891c26.53429986.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(47, '888000007', 'fuska', NULL, 'male', NULL, NULL, 'dog_688dd39c54dbf3.38282957.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(49, '888000008', 'TESLA', '2025-08-03', 'female', 'Lucy Ethan', '范宏林', 'dog_688ee227a60065.24187610.jpg', 'dog_banner_688ee227a60265.44875305.webp', 'Philippines', 'Brown', '4ft', '2025-08-03', '09270828243', 'Lucy Ethan', 'Ethan Glen P.Sala', 'Ethan Glen P.Sala', 'bjjj', 'regular', 1),
(50, '888000009', 'sungit', NULL, NULL, NULL, NULL, 'dog_6891c2f7a38302.12879359.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(51, '888000010', 'sungittttttttttttttttttttttttttttttttttttttttttttttttttsssss', NULL, NULL, NULL, NULL, 'dog_6891c30f395533.60308568.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(60) NOT NULL,
  `event_description` text DEFAULT NULL,
  `event_banner` varchar(255) DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Dumping data for table `generation`
--

INSERT INTO `generation` (`gen_id`, `gen_dog_id`, `father_dog_id`, `mother_dog_id`, `grandfather1_dog_id`, `grandmother1_dog_id`, `grandfather2_dog_id`, `grandmother2_dog_id`, `ggfather1_dog_id`, `ggmother1_dog_id`, `ggfather2_dog_id`, `ggmother2_dog_id`, `ggfather3_dog_id`, `ggmother3_dog_id`, `ggfather4_dog_id`, `ggmother4_dog_id`) VALUES
(17, 41, 42, 43, 44, 45, 46, 47, NULL, NULL, 49, NULL, NULL, 49, 49, NULL),
(19, 49, 41, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gettable`
--

CREATE TABLE `gettable` (
  `gt_id` int(11) NOT NULL,
  `gt_name` varchar(60) NOT NULL,
  `gt_description` text NOT NULL,
  `gt_image` varchar(255) NOT NULL,
  `gt_link` varchar(255) NOT NULL,
  `gt_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=deleted,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gettable`
--

INSERT INTO `gettable` (`gt_id`, `gt_name`, `gt_description`, `gt_image`, `gt_link`, `gt_status`) VALUES
(3, 'name ng dog', 'description niya', 'gettable_68916794284203.33676171.jpg', 'https://www.facebook.com/ethanpascualstevenson', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pageant`
--

CREATE TABLE `pageant` (
  `pag_id` int(11) NOT NULL,
  `pag_name` text NOT NULL,
  `pag_description` text DEFAULT NULL,
  `pag_date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pad_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=deleted,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pageant`
--

INSERT INTO `pageant` (`pag_id`, `pag_name`, `pag_description`, `pag_date_added`, `pad_status`) VALUES
(6, 'XEBC Points chart', 'Breed points are calculated by how many dogs were beaten when winning Best of Breed.', '2025-08-04 23:59:05', 1),
(10, 'new show', 'sfesf', '2025-08-05 00:43:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pageant_category`
--

CREATE TABLE `pageant_category` (
  `pc_id` int(11) NOT NULL,
  `pc_pageant_id` int(11) NOT NULL,
  `pc_category_name` text NOT NULL,
  `pc_contestant` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'list all the id of contestant here in array format',
  `pc_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=deleted,1=active',
  `pc_date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pageant_category`
--

INSERT INTO `pageant_category` (`pc_id`, `pc_pageant_id`, `pc_category_name`, `pc_contestant`, `pc_status`, `pc_date_added`) VALUES
(29, 6, 'sef', '[{\"id\":\"49\",\"points\":\"1\"}]', 0, '2025-08-05 03:43:19');

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

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
  ADD KEY `mother_dog_id` (`mother_dog_id`),
  ADD KEY `father_dog_id` (`father_dog_id`);

--
-- Indexes for table `gettable`
--
ALTER TABLE `gettable`
  ADD PRIMARY KEY (`gt_id`);

--
-- Indexes for table `pageant`
--
ALTER TABLE `pageant`
  ADD PRIMARY KEY (`pag_id`);

--
-- Indexes for table `pageant_category`
--
ALTER TABLE `pageant_category`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `pc_pageant_id` (`pc_pageant_id`);

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
  MODIFY `dog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `generation`
--
ALTER TABLE `generation`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gettable`
--
ALTER TABLE `gettable`
  MODIFY `gt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pageant`
--
ALTER TABLE `pageant`
  MODIFY `pag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pageant_category`
--
ALTER TABLE `pageant_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  ADD CONSTRAINT `generation_ibfk_15` FOREIGN KEY (`father_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_2` FOREIGN KEY (`ggfather1_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_3` FOREIGN KEY (`ggfather2_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_4` FOREIGN KEY (`ggfather3_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_5` FOREIGN KEY (`ggfather4_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_6` FOREIGN KEY (`ggmother1_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_7` FOREIGN KEY (`ggmother2_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_8` FOREIGN KEY (`ggmother3_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generation_ibfk_9` FOREIGN KEY (`ggmother4_dog_id`) REFERENCES `dogs` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pageant_category`
--
ALTER TABLE `pageant_category`
  ADD CONSTRAINT `pageant_category_ibfk_1` FOREIGN KEY (`pc_pageant_id`) REFERENCES `pageant` (`pag_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
