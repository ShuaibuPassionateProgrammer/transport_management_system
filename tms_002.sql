-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 06:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms_002`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `user`, `password`, `confirmpassword`, `status`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'ADMIN'),
(2, 'jude', 'suarez', 'jude@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '202cb962ac59075b964b07152d234b70', 'CLIENT');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `bus_name` varchar(100) NOT NULL,
  `bus_type` varchar(100) NOT NULL,
  `route_start` varchar(100) NOT NULL,
  `route_finish` varchar(100) NOT NULL,
  `fair` float NOT NULL,
  `arrival` timestamp NOT NULL DEFAULT current_timestamp(),
  `departure` datetime NOT NULL,
  `location` varchar(100) NOT NULL,
  `paymentstatus` varchar(100) NOT NULL,
  `bookingstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `full_name`, `email`, `phone`, `bus_name`, `bus_type`, `route_start`, `route_finish`, `fair`, `arrival`, `departure`, `location`, `paymentstatus`, `bookingstatus`) VALUES
(1, 'sss', 'sss@gmail.com', '98897878', 'Honda', 'Toyota', 'Jalingo', 'Adamawa', 2500, '2023-07-16 08:25:00', '2023-07-17 13:25:00', 'Adamawa', 'pending', 'pending'),
(7, 'Isaac John', 'isaac@gmail.com', '08199832938', 'Buggati', 'Sport Car', 'Jalingo', 'Maiduguri', 2800, '2023-07-16 08:25:00', '2023-07-17 13:25:00', 'Yobe', 'paid', 'pending'),
(8, 'ak', 'ak@gmail.com', '2832893289238', 'Vectra', 'Mini Bus', '', '', 2500, '2023-07-16 08:25:00', '2023-07-17 02:00:00', 'Yobe', 'paid', 'pending'),
(9, 'Rye', 'rye@gmail.com', '9823828878', 'Suzuki', 'Toyota', '', '', 900, '2023-07-16 08:25:00', '2023-07-17 13:25:00', 'Adamawa', 'paid', 'pending'),
(10, 'ty', 'ty@gmail.com', '83228892282', 'Honda', 'Toyota', '', '', 2500, '2023-07-18 21:40:00', '2023-07-17 13:25:00', 'Yobe', 'paid', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `BUS_ID` int(11) NOT NULL,
  `BUS_NAME` varchar(40) NOT NULL,
  `BUS_TYPE` varchar(40) NOT NULL,
  `DRIVER_ID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`BUS_ID`, `BUS_NAME`, `BUS_TYPE`, `DRIVER_ID`) VALUES
(7, 'Honda', 'Toyota', 3),
(8, 'Vectra', 'Toyota', 3),
(9, 'Suzuki', 'Mini Bus', 3),
(11, 'Buggati', 'Sport Car', 6);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `DRIVER_ID` int(11) NOT NULL,
  `DRIVER_NAME` varchar(50) NOT NULL,
  `DRIVER_EMAIL` varchar(50) NOT NULL,
  `DRIVER_PHONE` varchar(50) NOT NULL,
  `EMPLOY_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`DRIVER_ID`, `DRIVER_NAME`, `DRIVER_EMAIL`, `DRIVER_PHONE`, `EMPLOY_DATE`) VALUES
(3, 'John', 'john@gmail.com', '02033449725', '2023-07-15 18:23:03'),
(4, 'Musa', 'musa@gmail.com', '01081283928392', '2023-07-16 03:00:29'),
(6, 'Pius', 'pius@gmail.com', '08137924314', '2023-07-17 02:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `replymessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `booking_id`, `fullname`, `email`, `phone`, `subject`, `message`, `replymessage`) VALUES
(1, 6, 'Shuaibu', 'Ibrahim@gmail.com', 'Shuaibu', 'Shuaibu', 'all...', 'That\'s great');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `ROUTE_ID` int(11) NOT NULL,
  `FAIR` float NOT NULL,
  `START` varchar(50) NOT NULL,
  `FINISH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`ROUTE_ID`, `FAIR`, `START`, `FINISH`) VALUES
(1, 2500, 'Jalingo', 'Adamawa'),
(3, 900, 'Taraba', 'Yobe'),
(4, 7000, 'Taraba', 'Abuja'),
(5, 2800, 'Taraba', 'Maiduguri');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `SCHEDULE_ID` int(11) NOT NULL,
  `ARRIVAL` datetime NOT NULL,
  `DEPARTURE` datetime NOT NULL,
  `BUS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`SCHEDULE_ID`, `ARRIVAL`, `DEPARTURE`, `BUS_ID`) VALUES
(4449, '2023-07-16 01:25:00', '2023-07-17 13:25:00', 8),
(4450, '2023-07-18 14:40:00', '2023-07-17 02:00:00', 11);

-- --------------------------------------------------------

--
-- Table structure for table `stop`
--

CREATE TABLE `stop` (
  `LOCATION_ID` int(11) NOT NULL,
  `LOCATION_NAME` varchar(40) NOT NULL,
  `ROUTE_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stop`
--

INSERT INTO `stop` (`LOCATION_ID`, `LOCATION_NAME`, `ROUTE_ID`) VALUES
(5, 'Adamawa', 0),
(6, 'Yobe', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`BUS_ID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`DRIVER_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`ROUTE_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`SCHEDULE_ID`);

--
-- Indexes for table `stop`
--
ALTER TABLE `stop`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `BUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `DRIVER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `ROUTE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `SCHEDULE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4451;

--
-- AUTO_INCREMENT for table `stop`
--
ALTER TABLE `stop`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;