-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 09:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispatch`
--
CREATE DATABASE IF NOT EXISTS `dispatch` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dispatch`;
--
-- Database: `miniproject`
--
CREATE DATABASE IF NOT EXISTS `miniproject` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `miniproject`;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `Username` varchar(8) NOT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DOB` varchar(10) DEFAULT NULL,
  `Contact` varchar(10) DEFAULT NULL,
  `LastDeliveryAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`Username`, `Password`, `Name`, `Email`, `DOB`, `Contact`, `LastDeliveryAddress`) VALUES
('aadharsh', 'Admin1234', 'S.Aadharsh', 'sudu@gmail.com', '2004-11-12', '9363640752', 'utu'),
('aadhira8', '987456', 'niyathiBestie', 'monkey@gm.vom', '1000-02-05', '9695981234', ','),
('bharad12', '123456', 'bharathwaj', 'f@sf.km', '2023-08-31', '9632587410', 'nri hostel'),
('cheli007', '143978', 'CHELIAN N G', 'chelian0452@gmail.com', '2004-08-27', '9787192942', 'MIT ANNEXURE, CHENNAI - 44'),
('hema2135', '147852', 'Hemalatha', 'f@sf.km', '2004-12-01', '5455454554', 'Lake street,lok rioag.'),
('huggieee', '12345', 'Gowtham', 'sudu@gmail.com', '2005-12-01', '8445133156', 'Jukong,Kelambakkam,Tirusulam steet,tambaram-600235.'),
('hunkjunk', '7852315151', 'loll', 'f@sf.km', '1999-05-12', '1202154879', 'Last address does not exist'),
('huuuuuuu', 'hihello', 'oni chan', 'gowtham.raja211224@gmail.com', '1971-03-09', '1452036789', 'er'),
('ilisilis', 'buddha', 'tharunigha', 'uhu@dghj.nji', '2004-05-14', '1236547890', 'vmj'),
('janesh75', 'janesh', 'Jakie chan', 'd@fgy.m', '2005-03-07', '9994160273', 'nri hostel'),
('joeymama', 'suthusuthu', 'joe mama', 'sudu@gmail.com', '2001-09-09', '5999898989', 'Last address does not exist'),
('lkkhunki', '686847684684', 'lpllpl', 'd@fgy.m', '0006-06-06', '6846846878', 'Last address does not exist'),
('lolpllll', '5286354', 'ash', 'ash@2gmail.com', '1978-11-25', '8567451542', 'Last address does not exist'),
('mary1253', '123456', 'Deepa', 'kkk@gs.com', '2004-12-01', '9632145201', 'munytfrtde'),
('mimichan', 'qwerty', 'Babu', 'junk@hotmail.bom', '1985-06-09', '8956327410', 'Last address does not exist'),
('ojokookl', 'ijijjijii', 'sample', 'f@sf.km', '1220-02-12', '8445133156', 'Last address does not exist'),
('puthuuuu', 'majorp', 'major p ', 'sudu@gmail.com', '1969-02-25', '7855487884', 'hostel'),
('qwertyui', '1234567', 'giyhgu', 'd@fgy.m', '2023-10-04', '1234567890', 'uiytw54');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `Drug` varchar(50) DEFAULT NULL,
  `Code` int(4) UNSIGNED ZEROFILL NOT NULL,
  `MRP` decimal(10,2) DEFAULT NULL,
  `OurRate` decimal(10,2) DEFAULT NULL,
  `Availability` varchar(12) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`Drug`, `Code`, `MRP`, `OurRate`, `Availability`) VALUES
('paracep-250mg', 0001, 23.00, 12.69, 'Available'),
('sepotum-500', 0002, 26.50, 15.23, 'Unavailable'),
('avil-250', 0003, 6.00, 4.00, 'Available'),
('aspirin-300', 0004, 10.00, 10.00, 'Available'),
('zirtec-250', 0005, 36.00, 25.99, 'Available'),
('thermometer', 0006, 50.00, 25.00, 'Unavailable'),
('dolo-650', 0007, 10.00, 6.99, 'Available'),
('Moods-Vannilla', 0008, 20.00, 15.00, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `q` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD UNIQUE KEY `Code` (`Code`);
--
-- Database: `order`
--
CREATE DATABASE IF NOT EXISTS `order` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `order`;

-- --------------------------------------------------------

--
-- Table structure for table `mary1253`
--

CREATE TABLE `mary1253` (
  `code` int(4) UNSIGNED ZEROFILL NOT NULL,
  `drug` varchar(50) DEFAULT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amt` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mary1253`
--

INSERT INTO `mary1253` (`code`, `drug`, `mrp`, `rate`, `quantity`, `amt`) VALUES
(0001, 'paracep-250mg', 23.00, 12.69, 4, 50.76),
(0003, 'avil-250', 6.00, 4.00, 8, 32.00),
(0004, 'aspirin-300', 10.00, 10.00, 0, 0.00),
(0005, 'zirtec-250', 36.00, 25.99, 69, 1793.31),
(0006, 'thermometer', 50.00, 25.00, 0, 0.00),
(0007, 'dolo-650', 10.00, 6.99, 45, 314.55),
(0009, 'citrizin', 20.00, 19.99, 0, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mary1253`
--
ALTER TABLE `mary1253`
  ADD UNIQUE KEY `code` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
