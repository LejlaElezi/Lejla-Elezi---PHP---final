-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 03:52 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `borrow_duration` int(21) NOT NULL,
  `reservation_date` date NOT NULL,
  `comments` varchar(255) NOT NULL,
  `is_approved` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `book_id`, `borrow_duration`, `reservation_date`, `comments`, `is_approved`) VALUES
(5, 1, 6, 7, '2025-04-16', 'i want to borrow this book', 'true'),
(9, 1, 6, 14, '2025-04-24', '', 'true'),
(10, 6, 8, 21, '2025-04-29', 'i\'d like to borrow this book', 'false'),
(12, 6, 13, 14, '2025-04-21', '', ''),
(13, 6, 14, 7, '2025-04-22', '', ''),
(14, 1, 8, 7, '2025-04-22', '', 'false'),
(15, 11, 8, 14, '2025-04-22', '', ''),
(17, 6, 8, 14, '2025-04-23', 'i want to borrow this book.', 'true'),
(18, 1, 15, 13, '2025-04-16', '', 'false'),
(20, 15, 6, 14, '2025-04-25', '', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `tittle`, `author`, `description`, `image`) VALUES
(6, 'Ace Of Spades', 'Faridah Àbíké-Íyímídé', 'At a prestigious boarding school, a new girl discovers dark secrets and coverups after her roommate disappears.', 'ace.jpg'),
(8, 'The Wolf In The Whale', 'Jordanna Max Brodsky ', 'A sweeping tale of forbidden love and warring gods, where a young Inuit shaman and a Viking warrior become unwilling allies in a war that will determine the fate of the new world.', 'wolf.jpg'),
(9, 'Missing in Flight', 'Audrey J. Cole ', 'From USA Today bestselling author Audrey J. Cole comes a harrowing thriller about a woman faced with the unthinkable, when her infant goes missing aboard a plane to New York. ', 'flight.jpg'),
(10, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 'Harry Potter and the Order of the Phoenix is a fantasy novel written by British author J. K. Rowling. It is the fifth and longest novel in the Harry Potter series. It follows Harry Potter\'s struggles through his fifth year at Hogwarts School of Witchcraft', 'harry.jpg'),
(12, 'The Heaven & Earth Grocery Store ', 'James McBride', 'The novel is a unique blend of literary fiction, historical fiction, and mystery. The tale weaves around a Jewish couple\'s struggle and the Black community who unite to help them.', 'store.jpg'),
(13, 'Pale Blue Dot', 'Carl Sagan', 'It is the sequel to Sagan\'s 1980 book Cosmos and was inspired by the famous 1990 Pale Blue Dot photograph, for which Sagan provides a poignant description. In the book, Sagan mixes philosophy about the human place in the universe.', 'blue.jpg'),
(14, 'Heart Of Flames', 'Nicki Pau Preto', 'A legacy. An empire in ruin. As tensions reach a boiling point, the characters all find themselves drawn together into a fight that will shape the course of the empire—and determine the future of the Phoenix Riders.', 'heart.jpg'),
(15, 'The Lord Of The Rings', 'John Ronald Reuel Tolkien', 'The Lord of the Rings is an epic high fantasy novel written by English author and scholar J. R. R. Tolkien. Set in Middle-earth, the story began as a sequel to Tolkien\'s 1937 children\'s book The Hobbit but eventually developed into a much larger work', 'rings.jpg'),
(18, 'The Name Of The Wind', 'Nicki Pau Preto', 'The intimate narrative of his childhood in a troupe of traveling players, his years spent as a near-feral orphan in a crime-ridden city, his daringly brazen yet successful bid to enter a legendary school of magic.', 'wind.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'lejla', 'lejla@gmail.com', '$2y$10$VP6AMyRTlkswNP1eUANZKO.nEfKSNgmEV5OwzO4louaMCcbMDRn6G', 1),
(6, 'lea', 'lea@gmail.com', '$2y$10$tYgLonXAA8GtNbAyjYcqmesQsYJMJuEWhcd8UoBo/KLhUEUatx6gu', 0),
(7, 'test', 'test@gmail.com', '$2y$10$x9T3/Ecv0G8S6uzpWEmm1eBqGaY5UM.ECIiaaPvEMfaRhBtlIcVMa', 0),
(10, 'test1', 'test1@gmail.com', '$2y$10$w4lrq21gFoyAfeLMmJaWOO9cMk8636V5lA.4sXCYlfCh/BAWM/tYe', 0),
(11, 'test5', 'test5@gmail.com', '$2y$10$mRiARem5YHEQzzJymeAvred94koj92cHa4L3b6duCcgO8O7FBQp.u', 0),
(13, 'test2', 'test2@gmail.com', '$2y$10$lyNkfu78pX.mjEVaR1OQ4.PofVRDBw8q1xKmX6kRean8dNP76nOLG', 0),
(15, 'test6', 'test6@gmail.com', '$2y$10$QWhh3thbOqwFV7Vc9VXbv.0RQpzDJoz.kyx7croVqn3kQsfqhiz0i', 0),
(16, 'test7', 'test7@gmail.com', '$2y$10$rDwHidfb6AdkM4LYaQ8uWOt7s4FLI6RrVJJdNKDePPbFYwN45DTP6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `bookings_ibfk_1` (`user_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
