-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 03:10 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookup`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `name`, `email`, `mobile`) VALUES
('hello', 'hello', 'hello', 'hello', 123),
('karen', 'karen', 'karen', 'karen', 123),
('karen1', 'sad', 'karen', 'karen', 123),
('test', 'test', 'test', 'test', 914343);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `title`, `author`, `year`, `publisher`, `genre`, `subject`) VALUES
(1, 'To Kill A Mockingbird', 'Harper Lee', 1960, 'Harper Lee', 'southern gothic, coming-of-age story, bildungsroman', ''),
(2, 'Eleanor & Park', 'Rainbow Rowell', 2013, 'St. Martin''s Press', 'romance', ''),
(3, 'Thirteen Reasons Why', 'Jay Asher', 2007, 'Penguin Books', 'young adult', ''),
(4, 'The Maze Runner', 'James Dashner', 2009, 'Delacorte Press', 'young adult, science fiction, post-apocalyptic', ''),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 1925, 'Charles Scribner''s Sons', 'novel', ''),
(6, 'The Fault In Our Stars', 'John Green', 2012, 'Dutton Books', 'young adult novel, realistic fiction', ''),
(7, 'The Hobbit', 'J. R. R. Tolkien', 1937, 'George Allen & Unwin', 'high fantasy, juvenile fantasy', ''),
(8, 'The Da Vinci Code', 'Dan Brown', 2003, 'Doubleday (US), Transworld & Bantam Books (UK)', 'mystery, detective fiction, conspiracy fiction, thriller', ''),
(9, 'The Girl With The Dragon Tattoo', 'Stieg Larsson', 2005, 'Norstedts Forlag (Swedish)', 'crime, mystery, thriller, Scandinavian noir', ''),
(10, 'Ender''s Game', 'Orson Scott Card', 1985, 'Tor Books', 'science fiction', ''),
(11, 'A Game Of Thrones', 'George R. R. Martin', 1996, 'Bantam Spectra (US), Voyager Books (UK)', 'political strategy, epic fantasy', ''),
(12, 'Winnie The Pooh', 'A. A. Milne', 1926, 'Methuen & Co. Ltd. (London)', 'short story collection, childern''s literature', '');

-- --------------------------------------------------------

--
-- Table structure for table `mybooks`
--

CREATE TABLE `mybooks` (
  `ownID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mybooks`
--

INSERT INTO `mybooks` (`ownID`, `user`, `bookID`) VALUES
(8, 'test', 4),
(9, 'test', 10),
(10, 'karen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tradematches`
--

CREATE TABLE `tradematches` (
  `user1` varchar(255) NOT NULL,
  `book1` int(11) NOT NULL,
  `user2` varchar(255) NOT NULL,
  `book2` int(11) NOT NULL,
  `confirm1` int(1) NOT NULL,
  `confirm2` int(1) NOT NULL,
  `matchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tradematches`
--

INSERT INTO `tradematches` (`user1`, `book1`, `user2`, `book2`, `confirm1`, `confirm2`, `matchID`) VALUES
('test', 1, 'karen', 10, 1, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `traderequests`
--

CREATE TABLE `traderequests` (
  `requestID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `tradeIn` int(11) NOT NULL,
  `tradeOut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `mybooks`
--
ALTER TABLE `mybooks`
  ADD PRIMARY KEY (`ownID`);

--
-- Indexes for table `tradematches`
--
ALTER TABLE `tradematches`
  ADD PRIMARY KEY (`matchID`);

--
-- Indexes for table `traderequests`
--
ALTER TABLE `traderequests`
  ADD PRIMARY KEY (`requestID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mybooks`
--
ALTER TABLE `mybooks`
  MODIFY `ownID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tradematches`
--
ALTER TABLE `tradematches`
  MODIFY `matchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `traderequests`
--
ALTER TABLE `traderequests`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
