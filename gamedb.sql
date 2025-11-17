-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 06:49 PM
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
-- Database: `gamedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `game_name` varchar(255) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `game_name`, `game_id`, `user_id`, `quantity`, `price`) VALUES
(1, 'FIFA 24', NULL, NULL, 1, 120.00),
(2, 'FIFA 24', NULL, NULL, 1, 120.00),
(3, 'Sea of Thieves', NULL, NULL, 1, 460.00),
(4, 'Sea of Thieves', NULL, NULL, 1, 460.00),
(5, 'Forza Horizon 5', NULL, NULL, 1, 150.00),
(6, 'Sea of Thieves', NULL, NULL, 1, 460.00);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `game_name`, `genre_id`, `image`, `description`, `publisher`, `price`) VALUES
(1, 'Sea of Thieves', 1, 'pro_674e760e04be1.jpeg', 'Sea of Thieves offers the essential pirate experience, from sailing and fighting to exploring and looting.', 'Xbox Game Studios', 460.00),
(3, 'FIFA 24', 7, 'pro_674e77dca2ffa.jpeg', 'FIFA 24 offers the latest football teams and features, including a more immersive career mode.', 'EA Sports', 120.00),
(4, 'The Witcher 3: Wild Hunt', 6, 'pro_674e785c8d501.jpeg', 'An open-world RPG set in a dark fantasy universe, featuring monster hunting and deep storytelling.', 'CD Project Red', 200.00),
(5, 'Forza Horizon 5', 5, 'pro_674e78ab06410.jpeg', 'A racing game with open-world gameplay, featuring fast cars and beautiful landscapes in Mexico.', 'Xbox Game Studios', 150.00),
(6, 'Minecraft', 1, 'pro_674e78dae88f6.jpeg', 'A sandbox game where players build and explore procedurally generated worlds.', 'Mojang Studios', 180.00),
(7, 'Dead by Daylight', 1, 'pro_674e791d930c8.jpeg', 'A multiplayer horror game where one player is the killer and the others are survivors trying to escape.', 'Behaviour Interactive Inc.', 330.00),
(8, 'The Elder Scrolls V: Skyrim', 6, 'pro_674e7955dd0d9.jpeg', 'An open-world RPG that lets players explore the province of Skyrim while fighting dragons and completing quests.', 'Bethesda Softworks', 250.00);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Casual'),
(4, 'Indie'),
(5, 'Racing'),
(6, 'Simulation'),
(7, 'Sports'),
(8, 'Strategy');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `payment_status` enum('Pending','Confirmed','Rejected') DEFAULT 'Pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `game_id`, `total_price`, `payment_proof`, `payment_status`, `payment_date`) VALUES
(5, 6, 3, 120.00, '', 'Rejected', '2024-12-03 13:21:12'),
(6, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:23:19'),
(7, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:23:39'),
(8, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:24:37'),
(9, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:24:51'),
(10, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:25:49'),
(11, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:26:00'),
(12, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:27:05'),
(13, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:30:09'),
(14, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:30:45'),
(15, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:33:31'),
(16, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:34:55'),
(17, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:35:04'),
(18, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:35:04'),
(19, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:35:40'),
(20, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:36:53'),
(21, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:38:06'),
(22, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:42:54'),
(23, 6, 3, 120.00, '', 'Pending', '2024-12-03 13:43:32'),
(24, 6, 3, 120.00, '', 'Confirmed', '2024-12-03 13:44:10'),
(25, 6, 3, 120.00, '', 'Rejected', '2024-12-03 13:48:46'),
(26, 6, 3, 120.00, '', 'Rejected', '2024-12-03 13:48:53'),
(27, 6, 3, 120.00, '', 'Rejected', '2024-12-03 13:59:51'),
(28, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:01:03'),
(29, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:01:07'),
(30, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:01:46'),
(31, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:02:23'),
(32, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:03:29'),
(33, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:04:19'),
(34, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:05:07'),
(35, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:06:39'),
(36, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:07:51'),
(37, 6, 1, 460.00, '', 'Rejected', '2024-12-03 14:49:00'),
(38, 6, 1, 460.00, '', 'Confirmed', '2024-12-03 14:49:14'),
(39, 6, 1, 460.00, '', 'Rejected', '2024-12-03 14:51:10'),
(40, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:55:23'),
(41, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:55:32'),
(42, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:55:35'),
(43, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:55:49'),
(44, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:56:06'),
(45, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:56:08'),
(46, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:56:14'),
(47, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:56:49'),
(48, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:56:53'),
(49, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:57:36'),
(50, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:57:41'),
(51, 6, 3, 120.00, '', 'Rejected', '2024-12-03 14:57:55'),
(52, 6, 3, 120.00, '', 'Rejected', '2024-12-03 15:15:15'),
(53, 6, 3, 120.00, '', 'Rejected', '2024-12-03 15:17:27'),
(54, 6, 5, 150.00, '', 'Rejected', '2024-12-03 16:08:14'),
(55, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:18:06'),
(56, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:24:45'),
(65, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:37:36'),
(66, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:38:37'),
(67, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:39:08'),
(71, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:43:58'),
(72, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:49:23'),
(73, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:49:35'),
(74, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:53:24'),
(75, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:53:27'),
(76, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:55:29'),
(77, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:56:14'),
(78, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:56:35'),
(79, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:56:55'),
(80, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:57:13'),
(81, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:57:52'),
(82, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:58:11'),
(83, 6, 3, 120.00, '', 'Pending', '2024-12-03 16:59:27'),
(95, 6, 3, 120.00, '', 'Pending', '2024-12-03 17:06:25'),
(96, 6, 3, 120.00, '', 'Pending', '2024-12-03 17:06:42'),
(97, 6, 3, 0.00, '', 'Pending', '2024-12-03 17:09:28'),
(98, 6, 3, 0.00, '', 'Pending', '2024-12-03 17:10:27'),
(99, 6, 3, 0.00, '', 'Pending', '2024-12-03 17:10:29'),
(100, 6, 3, 0.00, '', 'Pending', '2024-12-03 17:10:30'),
(101, 6, 3, 0.00, '', 'Pending', '2024-12-03 17:10:33'),
(103, 6, 3, 0.00, '', 'Pending', '2024-12-03 17:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
(4, 'admin@gmail.com', 'admin', '$2y$10$DyVEGYyc92kDpv5/5J.aeec8NeB0XXP2G.mjigGOdeIlgTM/0mGrO', 'admin'),
(6, 'saya@gmail.com', 'saya', '$2y$10$vFO4tEWoQuC/H22lnW6aA.kUkQHfXUFSZaNC4ipX5g8Iu7qqLqlJC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
