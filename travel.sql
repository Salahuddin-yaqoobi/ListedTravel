-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 08:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'Politics', -3),
(31, 'Entertainment', -3),
(34, 'Sports', -2),
(33, 'Buisness', -1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(4, 'arslan khan', 'arslankhan9183@gmail.com', 'sadfsad', 'fwefwe', '2025-05-09 18:28:36'),
(5, 'arslan khan', 'arslankhan9183@gmail.com', 'dsaasdas', 'dasdasd', '2025-05-09 18:29:50'),
(6, 'arslan khan', 'arslankhan9183@gmail.com', 'dasd', 'asdsadsadsad', '2025-05-09 18:29:55'),
(7, 'dasdsadsa', 'arslankhan9183@gmail.com', 'dsadasdsad', 'dsadsa', '2025-05-09 18:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `price` int(255) NOT NULL,
  `duration` varchar(10000) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `price`, `duration`, `post_img`) VALUES
(109, 'Bobcat S130', 'Skid-steer loaders are typically four-wheeled or tracked vehicles with the front and back wheels on each side mechanically\r\n linked together to turn at the same speed, and where the left-side drive wheels can be driven independently of the right-side \r\ndrive wheels.', 'For Rent', '08 May, 2025', 50000, 'per_month', 'uploads/Bobcat S130.png'),
(110, 'Caterpillar 12H', ' As graders work at all speeds in all seasons and in different applications,these are most versatile general construction\r\n equipment used mainly for wide range of grading application with precision and ease of operation. Grader is preferred\r\n for grading due to the fact that these are road worthy and thus can be mobilized to work site more easily and effectively.\r\n We provide the equipment which is most fuel efficient, highly productive, very reliable with state of the art technologies\r\n and most importantly optimized for the needs of the developing world.', 'For Sale', '08 May, 2025', 50000, '', 'uploads/Caterpillar 12H.png'),
(111, 'JCB 4cx', ' Backhoe Loader \r\nBackhoe Loaders are material handling equipment that are equipped with the advanced features and protection\r\n required in demanding material handling applications. Due to its relatively small size and versatility, backhoe loaders\r\n are very common in urban engineering and small construction projects such as building a small house, fixing urban\r\n roads, irrigation etc. Backhoe loaders are very common and can be used for a wide variety of tasks: construction,\r\n small demolitions, light transportation of building materials, powering building equipment, digging holes/excavation,\r\n landscaping, breaking asphalt, and paving roads. We offer slew of attachments that can be replaced with standard\r\n buckets such as abreaker, grapple, auger, or a stump grinder. Our backhoes have fast cycle times for high production\r\n with ease.', 'For Sale', '08 May, 2025', 150000, '', 'uploads/JCB 4cx.png'),
(112, 'Caterpillar 966H', 'Wheel Loader is also quite a versatile material handling equipment that is equipped with the latest features\r\n with robust protection required. They are also used for loading materials into trucks, laying pipe, clearing rubble,\r\n and digging. They also include fast cycle times for high production with ease. ', 'For Sale', '08 May, 2025', 30000, '', 'uploads/Caterpillar 966H.png'),
(113, 'Kamatsu 234', ' Hydraulic Excavators are one of the prominent construction equipment used for excavation, demolition and\r\n material handling. Excavators have a distinctive image of technological innovation providing exceptional value.\r\n These are designed with high productivity, safety and environmental considerations in mind. Highly reliable\r\n engine that is matched to maximum hydraulics with improvement of easy operation and is for used on serviceability.\r\n These excavators provide the highest performance, superior operator comfort and maximum productivity. We provide\r\n hydraulic excavators with wide range of capacities according to your need.', 'For Sale', '09 May, 2025', 900000, 'per day', 'uploads/Kamatsu Pc400.png'),
(114, ' Kamatsu GD 122', ' As graders work at all speeds in all seasons and in different applications,these are most versatile general construction\r\n equipment used mainly for wide range of grading application with precision and ease of operation. Grader is preferred\r\n for grading due to the fact that these are road worthy and thus can be mobilized to work site more easily and effectively.\r\n We provide the equipment whichis most fuel efficient, highly productive, very reliable with state of the art technologies\r\n and most importantly optimized for the needs of the developing world.', 'For Rent', '09 May, 2025', 300000, 'per day', 'uploads/kamatsu GD655.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`, `email`, `phone`, `address`) VALUES
(35, 'Asif', 'Raza', 'Tasnim', '111111', 1, 'muhammadatasnim@gmail.com', '0300111111111', 'i-94 islamabad street 21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
