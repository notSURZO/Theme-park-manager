-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 11:49 AM
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
-- Database: `theme park manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'surzo', 'surzo@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(2, 'tarunno', 'tarunno@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 'admin'),
(3, 'azmain', 'azmain@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `park_id` int(11) NOT NULL,
  `job_description` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `park_id` int(8) NOT NULL,
  `a_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rides_admin`
--

CREATE TABLE `rides_admin` (
  `ride_id` int(11) NOT NULL,
  `ride_name` varchar(100) NOT NULL,
  `maintenance_cost` int(11) NOT NULL,
  `age_limit` text NOT NULL,
  `park_name` varchar(100) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rides_admin`
--

INSERT INTO `rides_admin` (`ride_id`, `ride_name`, `maintenance_cost`, `age_limit`, `park_name`, `ticket_price`, `image_url`, `admin_id`) VALUES
(145, 'Fun Swing', 500000, 'At least 12', 'Fantasy Kingdom', 200, 'https://plus.unsplash.com/premium_photo-1695802468726-eb6a92720904?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 1),
(299, 'Water swing', 435656, 'At least 12', 'Heritage Wonder Park', 700, 'https://plus.unsplash.com/premium_photo-1701769120039-02b1fedc38bc?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ride_tickets_visitors_book`
--

CREATE TABLE `ride_tickets_visitors_book` (
  `ticket_id` int(11) NOT NULL,
  `ride_id` int(11) NOT NULL,
  `card` varchar(10) NOT NULL,
  `cash` varchar(11) NOT NULL,
  `bkash` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ride_tickets_visitors_book`
--

INSERT INTO `ride_tickets_visitors_book` (`ticket_id`, `ride_id`, `card`, `cash`, `bkash`, `date`, `quantity`, `visitor_id`) VALUES
(7, 299, 'NO', 'YES', 'NO', '2024-04-24', 4, 1),
(8, 299, 'NO', 'YES', 'NO', '2024-04-22', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_admin`
--

CREATE TABLE `shop_admin` (
  `shop_id` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `shop_type` varchar(30) NOT NULL,
  `park_name` varchar(100) NOT NULL,
  `shop_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop_admin`
--

INSERT INTO `shop_admin` (`shop_id`, `rent`, `shop_type`, `park_name`, `shop_url`) VALUES
(456, 345675, 'foodstall', 'SKY City', 'https://images.unsplash.com/photo-1588155664232-8aa20befe9e7?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

-- --------------------------------------------------------

--
-- Table structure for table `theme_parks`
--

CREATE TABLE `theme_parks` (
  `park_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `park_name` varchar(100) NOT NULL,
  `image_url` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme_parks`
--

INSERT INTO `theme_parks` (`park_id`, `location`, `park_name`, `image_url`) VALUES
(1990, 'Uttara', 'Swanan park', 'https://plus.unsplash.com/premium_photo-1695802467626-e7e781c8a6bb?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(12333, 'Dhaka', 'Sky city', 'https://images.unsplash.com/photo-1545580492-8859ba8323f0?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(32443, 'azimpur', 'Prity eco park', 'https://images.unsplash.com/photo-1597466599360-3b9775841aec?w=300&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjZ8fHRoZW1lJTIwcGFya3xlbnwwfHwwfHx8MA%3D%3D'),
(221054, 'Kolkata', 'ECO park', 'https://images.unsplash.com/photo-1612276036430-e7240b151bd0?q=80&w=1031&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(22101349, 'arambag', 'Surzo park', 'https://images.unsplash.com/photo-1578955018143-f9f33c2cceee?q=80&w=987&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitor_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitor_id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'Surzo', 'abu.tarabin.surzo@g.bracu.ac.bd', 'c4ca4238a0b923820dcc509a6f75849b', 'visitor'),
(2, 'swanan', 'swanan@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'visitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD PRIMARY KEY (`park_id`,`a_id`);

--
-- Indexes for table `rides_admin`
--
ALTER TABLE `rides_admin`
  ADD PRIMARY KEY (`ride_id`);

--
-- Indexes for table `ride_tickets_visitors_book`
--
ALTER TABLE `ride_tickets_visitors_book`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `shop_admin`
--
ALTER TABLE `shop_admin`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `theme_parks`
--
ALTER TABLE `theme_parks`
  ADD PRIMARY KEY (`park_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rides_admin`
--
ALTER TABLE `rides_admin`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `ride_tickets_visitors_book`
--
ALTER TABLE `ride_tickets_visitors_book`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shop_admin`
--
ALTER TABLE `shop_admin`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3435;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitor_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
