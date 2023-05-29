-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 01:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Table structure for table `klient`
--

CREATE TABLE `klient` (
  `klientID` int(11) NOT NULL,
  `klientNick` text NOT NULL,
  `klientImie` text NOT NULL,
  `klientNazwisko` text NOT NULL,
  `klientMail` text NOT NULL,
  `klientHaslo` text NOT NULL,
  `klientaData` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`klientID`, `klientNick`, `klientImie`, `klientNazwisko`, `klientMail`, `klientHaslo`, `klientaData`) VALUES
(1, '123', 'jan', 'kowalski', 'jan@jan.jan', '$2y$10$K9Exc4yUefiEuzySqpmUOO4kr5PqS7FMqxVREqsIbLNSmCmVwUcki', '0000-00-00'),
(5, 'test', 'test', 'test', 'test@test.com', '$2y$10$wjfA/bNYW7cFcKEYKM2X4uQ2kjs1YOLRzSlNmZ2vfEqbmS5i3oHVm', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `towary`
--

CREATE TABLE `towary` (
  `towarID` int(11) NOT NULL,
  `towarNazwa` text NOT NULL,
  `towarJM` text NOT NULL,
  `towarCena` decimal(10,0) NOT NULL,
  `MailProducenta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `towary`
--

INSERT INTO `towary` (`towarID`, `towarNazwa`, `towarJM`, `towarCena`, `MailProducenta`) VALUES
(1, 'Cegły', '12', 2, ''),
(2, 'test', 'test', 0, 'test@test.com'),
(3, 'asd', 'kilo', 10, 'q@q.com');

-- --------------------------------------------------------

--
-- Table structure for table `zamowienieklienta`
--

CREATE TABLE `zamowienieklienta` (
  `zamID` int(11) NOT NULL,
  `zamKlientID` int(11) NOT NULL,
  `zamTowarID` int(11) NOT NULL,
  `zamIlosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zamowienieklienta`
--

INSERT INTO `zamowienieklienta` (`zamID`, `zamKlientID`, `zamTowarID`, `zamIlosc`) VALUES
(1, 1, 1, 123),
(2, 1, 2, 10),
(3, 5, 2, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`klientID`);

--
-- Indexes for table `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`towarID`);

--
-- Indexes for table `zamowienieklienta`
--
ALTER TABLE `zamowienieklienta`
  ADD PRIMARY KEY (`zamID`),
  ADD KEY `zamTowarID` (`zamTowarID`),
  ADD KEY `zamKlientID` (`zamKlientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `klientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `towary`
--
ALTER TABLE `towary`
  MODIFY `towarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zamowienieklienta`
--
ALTER TABLE `zamowienieklienta`
  MODIFY `zamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zamowienieklienta`
--
ALTER TABLE `zamowienieklienta`
  ADD CONSTRAINT `zamowienieklienta_ibfk_1` FOREIGN KEY (`zamKlientID`) REFERENCES `klient` (`klientID`),
  ADD CONSTRAINT `zamowienieklienta_ibfk_2` FOREIGN KEY (`zamTowarID`) REFERENCES `towary` (`towarID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
