-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2025 at 08:10 AM
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
  `dog_type_status` varchar(60) DEFAULT NULL,
  `dog_registered_status` int(11) NOT NULL COMMENT '0=not registered,1=registered,2=archived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`dog_id`, `dog_code`, `dog_name`, `dog_owner_name`, `dog_breeder_name`, `dog_date_registration`, `dog_image`, `dog_country`, `dog_color`, `dog_height`, `dog_date_of_birth`, `dog_contact_number`, `dog_facebook_name`, `dog_ig_name`, `dog_type_status`, `dog_registered_status`) VALUES
(13, '99000004791297', 'husky', 'april jane', 'juan dela cruz', '2025-07-31 07:20:54', 'dog_688b19568fceb0.96194899.png', 'philippines', 'white', '3ft', '2025-03-25', '09454454744', 'HUBBY', 'HUBBY', 'regular', 1),
(14, '99000007215398', 'alpha', 'joshua padilla', 'juan dela cruz', '2025-07-31 17:52:31', 'dog_688b9003634a94.68791231.jpg', 'philippines', 'white', '5ft', '2025-03-25', '09454454744', 'booby', 'booby', 'exclusive', 1),
(17, '99000003939935', 'mark', NULL, NULL, '2025-07-31 15:16:06', 'dog_688b88b6d6ac99.27833191.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, '99000001784755', 'fdefsefse', NULL, NULL, '2025-07-31 15:35:47', 'dog_688b8d535bb9f9.03702900.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, '99000007402568', 'patty', NULL, NULL, '2025-07-31 16:04:33', 'dog_688b9411105315.87173173.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, '99000002157671', 'master', NULL, NULL, '2025-07-31 16:15:27', 'dog_688b969f650a01.66399990.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, '99000001510201', 'Bella', 'bella padilla', 'justin bieber', '2025-07-31 16:16:27', 'dog_688b96db600411.97613913.avif', 'USA', 'gray', '15 cm', '2025-08-01', '09454454744', 'bella', 'bella', 'regular', 1),
(22, '99000003820257', 'batman', 'robin padilla', 'justin bieber', '2025-07-31 17:52:21', 'dog_688b988a0fafa4.22209273.avif', 'philippines', 'black and white', '4 fit', '2025-08-01', '09454454744', 'BATMAN', 'BATMAN', 'exclusive', 1),
(23, '99000000110469', 'koko', NULL, NULL, '2025-07-31 16:24:09', 'dog_688b98a9897801.96242836.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, '99000006610296', 'mac mac', NULL, NULL, '2025-07-31 16:24:29', 'dog_688b98bdc0d2d5.07642578.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, '99000004426855', 'tan tan', NULL, NULL, '2025-07-31 16:24:44', 'dog_688b98ccaf70a2.97428477.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, '99000005246561', 'kiko', NULL, NULL, '2025-07-31 16:25:02', 'dog_688b98de6bcbc5.58173858.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(27, '99000008218255', 'chubby', 'juan dela cruz', 'joshua padilla', '2025-07-31 17:29:03', 'dog_688ba14702f6b2.11945236.avif', 'philippines', 'brown', '4ft', '2025-08-01', '09454454744', 'chubby', 'chubby', 'exclusive', 1),
(28, '99000009133247', 'alucard', NULL, NULL, '2025-07-31 17:01:18', 'dog_688ba15e961a01.25065870.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(29, '99000007531350', 'lebron', NULL, NULL, '2025-07-31 17:02:02', 'dog_688ba18a830450.52300802.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, '99000003461104', 'chuchay', 'april jane', 'joshua padilla', '2025-08-02 01:06:38', 'dog_688ba8ca1123b8.27562269.jpg', 'philippines', 'brown', '15cm', '2025-08-01', '09454454744', 'chuchay', 'chuchay', 'exclusive', 2),
(31, '99000001989421', 'awdaw', 'DWAD', 'GREG', '2025-07-31 17:34:05', 'dog_688ba90d6fdb41.19073794.jpg', 'TRH', 'R5H', 'TJ7', '2025-08-20', 'AWAW', '2AD', 'AWAWDWAD', 'regular', 1),
(33, '99000003223376', 'bobby', 'bobby', 'bobby', '2025-07-31 17:39:12', 'dog_688baa409f2a58.66027668.webp', 'bobby', 'bobby', 'bobby', '2025-08-01', '09454454744', 'awdawd', 'awdwa', 'exclusive', 1),
(34, '99000004859503', 'paemla', NULL, NULL, '2025-07-31 18:40:47', 'dog_688bb8af0e4f45.83773736.avif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(35, '99000003571079', 'kokey', NULL, NULL, '2025-07-31 18:41:05', 'dog_688bb8c155cd86.35200608.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(36, '99000001553573', 'jun jun', NULL, NULL, '2025-07-31 18:41:24', 'dog_688bb8d43d7206.87002647.avif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, '99000006248874', 'test', NULL, NULL, '2025-07-31 18:41:38', 'dog_688bb8e228ac89.54008414.avif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(38, '99000008582419', 'kong kong', NULL, NULL, '2025-08-02 03:52:15', 'dog_688d8b6fc67123.47070007.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
(3, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 20),
(4, 14, NULL, NULL, NULL, 38, 27, NULL, 19, NULL, NULL, NULL, NULL, NULL, 13, 18),
(8, 21, 22, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 22, 21, 23, 24, 35, 26, 34, 31, 30, 13, 27, 36, 33, 37, 14),
(10, 27, 28, 13, 21, 22, 29, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pageant`
--

CREATE TABLE `pageant` (
  `pag_id` int(11) NOT NULL,
  `pag_name` text NOT NULL,
  `pag_description` text DEFAULT NULL,
  `pag_date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pageant`
--

INSERT INTO `pageant` (`pag_id`, `pag_name`, `pag_description`, `pag_date_added`) VALUES
(1, 'test', 'descr', '2025-08-01 08:09:54'),
(2, 'new', 'awdaw', '2025-08-01 08:11:06'),
(3, 'jjjjjjjjjjjj', 'dddddddd', '2025-08-01 08:12:24'),
(4, 'dog show 2025', 'awdaw', '2025-08-01 08:38:53'),
(5, 'dog show 22222', 'awdwad', '2025-08-01 08:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `pageant_category`
--

CREATE TABLE `pageant_category` (
  `pc_id` int(11) NOT NULL,
  `pc_pageant_id` int(11) NOT NULL,
  `pc_category_name` text NOT NULL,
  `pc_contestant` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'list all the id of contestant here in array format'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pageant_category`
--

INSERT INTO `pageant_category` (`pc_id`, `pc_pageant_id`, `pc_category_name`, `pc_contestant`) VALUES
(20, 5, 'talent', '[{\"id\":\"27\",\"points\":\"60\"},{\"id\":\"22\",\"points\":\"40\"},{\"id\":\"14\",\"points\":\"2\"}]');

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
  ADD KEY `mother_dog_id` (`mother_dog_id`),
  ADD KEY `father_dog_id` (`father_dog_id`);

--
-- Indexes for table `pageant`
--
ALTER TABLE `pageant`
  ADD PRIMARY KEY (`pag_id`);

--
-- Indexes for table `pageant_category`
--
ALTER TABLE `pageant_category`
  ADD PRIMARY KEY (`pc_id`);

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
  MODIFY `dog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `generation`
--
ALTER TABLE `generation`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pageant`
--
ALTER TABLE `pageant`
  MODIFY `pag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pageant_category`
--
ALTER TABLE `pageant_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
