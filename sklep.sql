-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 07:56 PM
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
(6, 'Jan', 'Jan', 'Kowalski', 'HasloTo123@example.com', '$2y$10$h2f8Yr2bAhVkF.bN.C2QmOhG6ZdxHIcIJWHkaOG9j2LSKFfdED6lm', '2023-05-30'),
(7, 'Adam', 'Adam', 'Nowak', 'HasloTo456@example.com', '$2y$10$ndmbaqL8Kxq2WJ.6yZWkIOkL.fxVw2Riobp8bZ6Obf4iP92bDfKUC', '2023-05-30'),
(9, 'Beata', 'Beata', 'Krawczyk', 'HasloTo456@example.com', '$2y$10$owwgSIcl7ekCuQA0.mhujufKZZ0bLvd3BeLYY3IQ2c/ySlh6TZKgy', '2023-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `towary`
--

CREATE TABLE `towary` (
  `towarID` int(11) NOT NULL,
  `towarNazwa` text NOT NULL,
  `towarJM` text NOT NULL,
  `towarCena` decimal(10,0) NOT NULL,
  `towarIloscNaStanie` int(11) NOT NULL,
  `MailProducenta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `towary`
--

INSERT INTO `towary` (`towarID`, `towarNazwa`, `towarJM`, `towarCena`, `towarIloscNaStanie`, `MailProducenta`) VALUES
(4, 'Cegły', 'Sztuka', 2, 54, 'ProducentCegiel@example.com'),
(5, 'Cement', 'Kilo', 1, 33, 'ProducentCementu@example.com'),
(8, 'Panele podlogowe', 'Metr kwadratowy', 70, 299, 'ProducentPaneli@example.com'),
(9, 'Fotel', 'Sztuka', 200, 0, 'ProducentFoteli@example.com');

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
(5, 6, 4, 25),
(6, 6, 8, 50),
(7, 7, 5, 50),
(8, 7, 4, 50),
(13, 9, 9, 1),
(14, 9, 4, 36),
(15, 9, 5, 64);

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
  MODIFY `klientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `towary`
--
ALTER TABLE `towary`
  MODIFY `towarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zamowienieklienta`
--
ALTER TABLE `zamowienieklienta`
  MODIFY `zamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zamowienieklienta`
--
ALTER TABLE `zamowienieklienta`
  ADD CONSTRAINT `zamowienieklienta_ibfk_1` FOREIGN KEY (`zamKlientID`) REFERENCES `klient` (`klientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zamowienieklienta_ibfk_2` FOREIGN KEY (`zamTowarID`) REFERENCES `towary` (`towarID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
