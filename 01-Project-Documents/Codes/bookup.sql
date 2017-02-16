-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2017 at 01:30 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.25

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
(2, 'A Game Of Thrones', 'George R. R. Martin', 1996, 'Bantam Spectra (US), Voyager Books (UK)', 'political strategy, epic fantasy', '');

-- --------------------------------------------------------

--
-- Table structure for table `traderequests`
--

CREATE TABLE `traderequests` (
  `requestID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
