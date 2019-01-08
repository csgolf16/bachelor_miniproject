-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 05:38 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_tb`
--

CREATE TABLE `applicant_tb` (
  `applicant` varchar(250) NOT NULL,
  `applicant_department` varchar(250) NOT NULL,
  `applicant_tel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicant_tb`
--

INSERT INTO `applicant_tb` (`applicant`, `applicant_department`, `applicant_tel`) VALUES
('NN', 'ER', '097XXXXXXX'),
('PP', 'ICU', '095XXXXXXX'),
('QQ', 'ER', '094XXXXXXX'),
('RR', 'ICU', '099XXXXXXX'),
('UU', 'IPD', '096XXXXXXX'),
('WW', 'OR', '098XXXXXXX'),
('XX', 'ICU', '093XXXXXXX'),
('YY', 'ER', '092XXXXXXX'),
('ZZ', 'OR', '091XXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `dispenser_tb`
--

CREATE TABLE `dispenser_tb` (
  `dispenser` varchar(250) NOT NULL,
  `dispenser_department` varchar(250) NOT NULL,
  `dispenser_tel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dispenser_tb`
--

INSERT INTO `dispenser_tb` (`dispenser`, `dispenser_department`, `dispenser_tel`) VALUES
('AA', 'Pharmacy\r\n', '081xxxxxxx'),
('BB', 'Pharmacy\r\n', '082xxxxxxx'),
('CC', 'Pharmacy\r\n', '083xxxxxxx'),
('DD', 'Pharmacy\r\n', '084xxxxxxx'),
('EE', 'Pharmacy\r\n', '085xxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `drug_tb`
--

CREATE TABLE `drug_tb` (
  `drug_id` varchar(250) NOT NULL,
  `drug_name` varchar(250) NOT NULL,
  `drug_unit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drug_tb`
--

INSERT INTO `drug_tb` (`drug_id`, `drug_name`, `drug_unit`) VALUES
('D1', 'Paracetamol', 'Tablet'),
('D2', 'CPM', 'Tablet'),
('D3', 'Sodamint', 'Tablet'),
('D4', 'Pattadium', 'Tablet'),
('D5', 'Mefanamic', 'Tablet'),
('D6', 'Dimenhydrinate', 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `list_tb`
--

CREATE TABLE `list_tb` (
  `order_id` varchar(250) NOT NULL,
  `drug_id` varchar(250) NOT NULL,
  `drug_amount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_tb`
--

INSERT INTO `list_tb` (`order_id`, `drug_id`, `drug_amount`) VALUES
('5bf2d3cca9302', 'D1', '80'),
('5bf2d3cca9302', 'D2', '100'),
('5bf2d3e400b45', 'D3', '130'),
('5bf2d411f18d9', 'D1', '80'),
('5bf2d411f18d9', 'D4', '50'),
('5bf2d411f18d9', 'D5', '50'),
('5bf2d4374b5ef', 'D6', '100'),
('5bf2d6d34b6b8', 'D2', '100'),
('5bf2d70939003', 'D1', '60'),
('5bf2d70939003', 'D2', '100'),
('5bf2d70939003', 'D4', '80'),
('5bf2d72935b62', 'D1', '80'),
('5bf2d74f606c8', 'D2', '20'),
('5bf2d79fad2cf', 'D3', '90'),
('5bf2d7c90932f', 'D6', '100'),
('5bf2d7c90932f', 'D4', '5'),
('5bf2d80b68539', 'D5', '20'),
('5bf2d80b68539', 'D4', '50'),
('5bf2d87059235', 'D3', '130'),
('5bf2d89604ef1', 'D1', '80'),
('5bf2d8c32222c', 'D3', '130'),
('5bf2d8c32222c', 'D5', '90'),
('5bf2d8c32222c', 'D4', '50'),
('5bf2d8e1069a0', 'D6', '90'),
('5bf2d903a1286', 'D3', '5'),
('5bf2d92e8f85d', 'D2', '100'),
('5bf2d92e8f85d', 'D3', '60'),
('5bf2d92e8f85d', 'D5', '50'),
('5bf2d95c66734', 'D1', '80'),
('5bf2d9772f724', 'D6', '100');

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `order_id` varchar(250) NOT NULL,
  `applicant_date` date NOT NULL,
  `applicant` varchar(250) NOT NULL,
  `dispenser_date` date NOT NULL,
  `dispenser` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_tb`
--

INSERT INTO `order_tb` (`order_id`, `applicant_date`, `applicant`, `dispenser_date`, `dispenser`) VALUES
('5bf2d3cca9302', '2018-10-30', 'ZZ', '2018-10-31', 'AA'),
('5bf2d3e400b45', '2018-10-30', 'YY', '2018-10-31', 'BB'),
('5bf2d411f18d9', '2018-10-30', 'XX', '2018-10-31', 'CC'),
('5bf2d4374b5ef', '2018-10-30', 'QQ', '2018-10-31', 'DD'),
('5bf2d6d34b6b8', '2018-10-30', 'PP', '2018-10-31', 'EE'),
('5bf2d70939003', '2018-10-30', 'UU', '2018-10-31', 'CC'),
('5bf2d72935b62', '2018-10-30', 'NN', '2018-10-31', 'AA'),
('5bf2d74f606c8', '2018-10-30', 'PP', '2018-10-31', 'EE'),
('5bf2d79fad2cf', '2018-10-30', 'YY', '2018-10-31', 'DD'),
('5bf2d7c90932f', '2018-10-30', 'WW', '2018-10-31', 'EE'),
('5bf2d80b68539', '2018-11-02', 'XX', '2018-11-02', 'BB'),
('5bf2d87059235', '2018-11-02', 'WW', '2018-11-02', 'EE'),
('5bf2d89604ef1', '2018-11-03', 'UU', '2018-11-03', 'AA'),
('5bf2d8c32222c', '2018-11-03', 'RR', '2018-11-03', 'CC'),
('5bf2d8e1069a0', '2018-11-03', 'UU', '2018-11-03', 'BB'),
('5bf2d903a1286', '2018-11-04', 'ZZ', '2018-11-04', 'BB'),
('5bf2d92e8f85d', '2018-11-04', 'NN', '2018-11-04', 'DD'),
('5bf2d95c66734', '2018-11-04', 'RR', '2018-11-04', 'CC'),
('5bf2d9772f724', '2018-11-05', 'UU', '2018-11-05', 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`user_username`, `user_password`) VALUES
('root', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_tb`
--
ALTER TABLE `applicant_tb`
  ADD PRIMARY KEY (`applicant`);

--
-- Indexes for table `dispenser_tb`
--
ALTER TABLE `dispenser_tb`
  ADD PRIMARY KEY (`dispenser`);

--
-- Indexes for table `drug_tb`
--
ALTER TABLE `drug_tb`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
