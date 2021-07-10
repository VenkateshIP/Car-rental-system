-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 10:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin1', 'admin1'),
('admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `vehicle_reg` varchar(10) NOT NULL,
  `type` varchar(8) NOT NULL,
  `req_date` date NOT NULL,
  `req_time` time NOT NULL,
  `ret_date` date NOT NULL,
  `ret_time` time NOT NULL,
  `pickup` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `confirmation` int(1) NOT NULL DEFAULT 0,
  `finished` int(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `name`, `username`, `email`, `mobile`, `driver_id`, `vehicle_reg`, `type`, `req_date`, `req_time`, `ret_date`, `ret_time`, `pickup`, `destination`, `confirmation`, `finished`, `paid`) VALUES
(14, 'venky', 'venkyip', 'venky@gmail.com', 756342, 1, 'LA04KA542', 'car', '2020-12-23', '09:00:00', '2020-12-24', '10:00:00', 'bengaluru', 'mysore', 1, 1, 1),
(15, 'venky', 'venkyip', 'venky@gmail.com', 756342, 0, '0', 'car', '2020-12-23', '09:00:00', '2020-12-24', '10:00:00', 'bengaluru', 'mysore', 0, 0, 0),
(16, 'zaha', 'venkyip', 'venky@gmail.com', 756342, 0, '0', 'car', '2021-01-01', '10:00:00', '2021-01-02', '03:00:00', 'bengaluru', 'mysore', 0, 0, 0),
(17, 'zaha', 'venkyip', 'venky@gmail.com', 756342, 1, 'LA04KA542', 'car', '2021-01-01', '10:00:00', '2021-01-02', '03:00:00', 'bengaluru', 'mysore', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(30) NOT NULL,
  `license_no` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(60) NOT NULL,
  `status` int(1) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `license_no`, `contact`, `address`, `status`, `image`) VALUES
(1, 'Amar Jha', 'ka342657', 925146812, 'A-14, Shyam nagar', 1, '..\\drivers\\amar_jha.jpg'),
(2, 'Anil Sidda', 'ka564772', 978656458, 'j-27, Malleswaram', 1, '..\\drivers\\anil_sidda.jpg'),
(6, 'Karan Sharma', 'ka225469', 988456432, '  No 3, K R road', 1, '../drivers/karan_sharma.jpeg'),
(7, 'Rohan Kumar', 'ka337898', 9945362, '  No 7, CK road', 1, '../drivers/rohan_kumar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tripcost`
--

CREATE TABLE `tripcost` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `total_km` varchar(11) NOT NULL,
  `oil_cost` varchar(11) NOT NULL,
  `extra_cost` varchar(11) NOT NULL,
  `total_cost` varchar(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tripcost`
--

INSERT INTO `tripcost` (`id`, `booking_id`, `username`, `total_km`, `oil_cost`, `extra_cost`, `total_cost`, `paid`) VALUES
(2, '14', 'venkyip', '150', '1000', '1000', '3000', 1),
(3, '17', 'venkyip', '150', '1000', '1000', '2000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(1, 'user1_f', 'user1_l', 'user1@test.com', 'user1_username', 'user1_password'),
(2, 'user2_f', 'user2_l', 'user2@test.com', 'user2_username', 'user2_password'),
(3, 'venky', 'ip', 'venky@gmail.com', 'venkyip', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_reg` varchar(10) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `vehicle_reg`, `brand`, `model`, `type`, `color`, `no_of_seats`, `description`, `status`, `image`) VALUES
(8, 'LA04KA542', 'Maruti suzuki', 'swift zxi', 'sedan', 'red', 5, '  red swift 2019 model hatchback', 1, '../cars/swift.jfif'),
(9, 'KA21SA569', 'Maruti suzuki', 'swift dzire', 'sedan', 'blue', 5, '  oxford blue swift dzire 2019 model', 1, '../cars/swift dzire.jpg'),
(10, 'AS21SA320', 'Mahindra', 'verito', 'sedan', 'white', 5, '  white sedan mahindra verito', 1, '../cars/verito.jpg'),
(11, 'UA01SE784', 'Toyota', 'etios', 'sedan', 'silver', 5, '  silver toyota etios', 1, '../cars/etios.jpg'),
(12, 'RJ14SK751', 'Toyota', 'innova', 'suv', 'white', 7, '  white toyota innova 2019', 1, '../cars/innova.jpg'),
(13, 'DA34GR867', 'Maruti suzuki', 'ertiga', 'suv', 'silver', 7, '  Ertiga silver SUV 2019 model', 1, '../cars/ertiga.jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tripcost`
--
ALTER TABLE `tripcost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tripcost`
--
ALTER TABLE `tripcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
