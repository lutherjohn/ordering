-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 12:23 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderingapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbeverages`
--

CREATE TABLE `tblbeverages` (
  `beveragesId` int(11) NOT NULL,
  `beveragesDescription` varchar(150) NOT NULL,
  `beveragesPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbeverages`
--

INSERT INTO `tblbeverages` (`beveragesId`, `beveragesDescription`, `beveragesPrice`) VALUES
(1, 'Coke', 25),
(2, 'Sprite', 25),
(3, 'Coke Zero', 27),
(4, 'Juice', 32),
(5, 'Coffee', 15),
(6, 'Tap water', 10),
(7, 'Mango Shake', 22),
(8, 'Avocado Shake', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblburgers`
--

CREATE TABLE `tblburgers` (
  `burgerId` int(11) NOT NULL,
  `burgerDescription` varchar(150) NOT NULL,
  `burgerPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblburgers`
--

INSERT INTO `tblburgers` (`burgerId`, `burgerDescription`, `burgerPrice`) VALUES
(1, 'Hotdog', 12),
(2, 'ChesseBurger', 18),
(3, 'Fries', 15),
(4, 'Double Sided Burger', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tblcombomeals`
--

CREATE TABLE `tblcombomeals` (
  `combomealsId` int(11) NOT NULL,
  `comboMeals` varchar(255) NOT NULL,
  `comboPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcombomeals`
--

INSERT INTO `tblcombomeals` (`combomealsId`, `comboMeals`, `comboPrice`) VALUES
(1, 'Chicken Combo Meals', 105),
(2, 'Fish Combo Meals', 110),
(3, 'Pork Combo', 115),
(4, 'Eat All You can', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `orderId` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `burgerId` varchar(255) NOT NULL,
  `beveragesId` varchar(255) NOT NULL,
  `comboMealsId` varchar(255) NOT NULL,
  `couponCode` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`orderId`, `customer`, `burgerId`, `beveragesId`, `comboMealsId`, `couponCode`) VALUES
(1, 'Cust1984327114', '1,2', '2', '3', 'GO2018'),
(2, 'Cust995732576', '4', '2', '3', ''),
(3, 'Cust1752994756', '1,2', '1,4', '4', ''),
(4, 'Cust1840420715', '2,3', '3', '4', 'GO2018'),
(5, 'Cust871700307', '4', '4', '1', ''),
(6, 'Cust710457031', '2,3,4', '2,3', '2,3,4', 'GO2018'),
(7, 'Cust867387540', '1,2,3,4', '1,2,3,4,5', '2,3', 'GO2018'),
(8, 'Cust1849389539', '4', '4', '4', ''),
(9, 'Cust684983966', '1', '2', '4', ''),
(10, 'Cust874495143', '2', '3', '1', ''),
(11, 'Cust135271224', '1,3', '3', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbeverages`
--
ALTER TABLE `tblbeverages`
  ADD PRIMARY KEY (`beveragesId`);

--
-- Indexes for table `tblburgers`
--
ALTER TABLE `tblburgers`
  ADD PRIMARY KEY (`burgerId`);

--
-- Indexes for table `tblcombomeals`
--
ALTER TABLE `tblcombomeals`
  ADD PRIMARY KEY (`combomealsId`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`orderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbeverages`
--
ALTER TABLE `tblbeverages`
  MODIFY `beveragesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblburgers`
--
ALTER TABLE `tblburgers`
  MODIFY `burgerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcombomeals`
--
ALTER TABLE `tblcombomeals`
  MODIFY `combomealsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
