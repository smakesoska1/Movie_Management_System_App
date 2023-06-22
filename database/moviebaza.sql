-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 22, 2023 at 01:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviebaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL,
  `nr_tickets` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `movies_id`, `nr_tickets`, `date`, `time`) VALUES
(1, 1, 2, 3, '2023-05-30', '18:00'),
(2, 2, 1, 2, '2023-05-31', '20:00'),
(3, 3, 3, 5, '2023-06-14', '17:00'),
(4, 3, 3, 4, '2023-06-13', '12:00'),
(5, 3, 3, 0, '', '12:00'),
(6, 3, 3, 3, '2023-06-29', '17:00'),
(7, 3, 3, 3, '2023-06-21', '15:00'),
(8, 4, 4, 4, '2023-06-27', '12:00'),
(9, 3, 3, 5, '2023-06-20', '12:00'),
(10, 5, 5, 2, '2023-06-29', '17:00'),
(11, 5, 5, 5, '2023-06-14', '12:00'),
(12, 5, 5, 1, '2023-06-21', '22:00'),
(13, 3, 3, 2, '2023-06-28', '19:00'),
(14, 3, 3, 2, '2023-06-28', '19:00'),
(15, 3, 3, 1, '2023-06-01', '15:00'),
(16, 3, 3, 5, '2023-06-06', '12:00'),
(17, 3, 3, 5, '2023-06-13', '12:00'),
(18, 3, 6, 4, '2023-06-21', '12:00'),
(19, 2, 6, 5, '2023-06-12', '19:00');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `movie_name` varchar(30) NOT NULL,
  `movie_desc` varchar(40) NOT NULL,
  `movie_quality` varchar(30) NOT NULL,
  `movie_rating` int(11) NOT NULL,
  `movie_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_name`, `movie_desc`, `movie_quality`, `movie_rating`, `movie_image`) VALUES
(1, 'Batman', 'Super heroj koji je izgubio roditelje sa', '5D', 8, 'batman.png'),
(2, 'spiderman', 'Pirati se bore za opstanak', '2D', 8, 'spiderman.png'),
(4, 'Venom', 'ne znam', '2D', 10, 'venom.png'),
(5, 'Joker', 'smile face', '4D', 10, 'joker.jpg'),
(6, 'Marley and Me', 'Puppy improving life', '2D', 7, 'marley.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `confirm_password` varchar(30) NOT NULL,
  `is_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `confirm_password`, `is_admin`) VALUES
(2, 'harun', 'harun123', 'harun@gmail.com', 'harun12', 'harun12', 'false'),
(3, 'ena', 'enci', 'enci@hotmail.com', 'sunny123', 'sunny123', 'true'),
(4, 'Sara', 'Saric', 'dfgdgdgd@email.com', '$2y$10$cGdUqlkFgGOWS82lMLEUZub', '$2y$10$NkkQD67T457POwJCkFNID.u', 'false'),
(5, 'User', 'user', 'user@outlook.com', '$2y$10$SzOkRLvvMdU8usdteDsKcu.', '$2y$10$oerG/rKv4woLN67gRXb7KuA', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
