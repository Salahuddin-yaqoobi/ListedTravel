-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 03:52 PM
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
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `price`, `duration`, `post_img`) VALUES
(109, 'Bobcat S130', 'Skid-steer loaders are typically four-wheeled or tracked vehicles with the front and back wheels on each side mechanically\r\n linked together to turn at the same speed, and where the left-side drive wheels can be driven independently of the right-side \r\ndrive wheels.', 'For Rent', '08 May, 2025', 50000, 'per_month', 'uploads/Bobcat S130.png'),
(110, 'Caterpillar 12H', ' As graders work at all speeds in all seasons and in different applications,these are most versatile general construction\r\n equipment used mainly for wide range of grading application with precision and ease of operation. Grader is preferred\r\n for grading due to the fact that these are road worthy and thus can be mobilized to work site more easily and effectively.\r\n We provide the equipment which is most fuel efficient, highly productive, very reliable with state of the art technologies\r\n and most importantly optimized for the needs of the developing world.', 'For Sale', '08 May, 2025', 50000, '', 'uploads/Caterpillar 12H.png'),
(111, 'JCB 4cx', ' Backhoe Loader \r\nBackhoe Loaders are material handling equipment that are equipped with the advanced features and protection\r\n required in demanding material handling applications. Due to its relatively small size and versatility, backhoe loaders\r\n are very common in urban engineering and small construction projects such as building a small house, fixing urban\r\n roads, irrigation etc. Backhoe loaders are very common and can be used for a wide variety of tasks: construction,\r\n small demolitions, light transportation of building materials, powering building equipment, digging holes/excavation,\r\n landscaping, breaking asphalt, and paving roads. We offer slew of attachments that can be replaced with standard\r\n buckets such as abreaker, grapple, auger, or a stump grinder. Our backhoes have fast cycle times for high production\r\n with ease.', 'For Sale', '08 May, 2025', 150000, '', 'uploads/JCB 4cx.png'),
(112, 'Caterpillar 966H', 'Wheel Loader is also quite a versatile material handling equipment that is equipped with the latest features\r\n with robust protection required. They are also used for loading materials into trucks, laying pipe, clearing rubble,\r\n and digging. They also include fast cycle times for high production with ease. ', 'For Sale', '08 May, 2025', 30000, '', 'uploads/Caterpillar 966H.png'),
(113, 'Kamatsu Pc400', ' Hydraulic Excavators are one of the prominent construction equipment used for excavation, demolition and\r\n material handling. Excavators have a distinctive image of technological innovation providing exceptional value.\r\n These are designed with high productivity, safety and environmental considerations in mind. Highly reliable\r\n engine that is matched to maximum hydraulics with improvement of easy operation and is for used on serviceability.\r\n These excavators provide the highest performance, superior operator comfort and maximum productivity. We provide\r\n hydraulic excavators with wide range of capacities according to your need.', 'For Sale', '08 May, 2025', 900000, '', 'uploads/Kamatsu Pc400.png'),
(114, ' Kamatsu GD 655', ' As graders work at all speeds in all seasons and in different applications,these are most versatile general construction\r\n equipment used mainly for wide range of grading application with precision and ease of operation. Grader is preferred\r\n for grading due to the fact that these are road worthy and thus can be mobilized to work site more easily and effectively.\r\n We provide the equipment whichis most fuel efficient, highly productive, very reliable with state of the art technologies\r\n and most importantly optimized for the needs of the developing world.', 'For Sale', '08 May, 2025', 300000, '', 'uploads/kamatsu GD655.png');

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
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'Salah ud din', 'yaqoobi', 'Salah developer', '3f9fb1d04104bea49ff9bdecb7a8cb59', 1),
(26, 'Talal', 'Gopang', 'Talal', '7c2410c8be77b896e8a5b26d1a994a23', 0),
(27, 'saad', ' sa', 'saad cs', 'eb6facc8259bc8eb2827e246fd3737e2', 0),
(28, 'muneeb', 'rajpoot', 'muneeb', 'd48dadc8ca443e497c13276c152fa16f', 0),
(29, 'ikrama', 'ikr', 'ikrama', '11037e6cef90d5fdf6c811475be4b253', 1),
(30, 'hamza', 'ha', 'hamza', '11037e6cef90d5fdf6c811475be4b253', 0),
(31, 'saad', 'cs m', 'saad morning', 'b3ddbc502e307665f346cbd6e52cc10d', 0),
(32, 'abdullah', 'bhai', 'abdullah', 'e5ff308f2e54d1712c355570aa745838', 0),
(33, 'salah', 'salah', 'salah', '428b44ba6b09a8a12d781c5aaa7e3c3c', 1),
(34, 'salahuddin', 'salah', 'saluu', '908a4905bb10535cb96c6a17ee267529', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

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
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
