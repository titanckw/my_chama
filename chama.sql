-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 02:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `creationdate`, `updationdate`) VALUES
(1, 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2019-11-14 17:36:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `mid` int(12) NOT NULL,
  `amount` float NOT NULL,
  `balance` float NOT NULL,
  `refno` varchar(50) NOT NULL,
  `source` varchar(30) NOT NULL,
  `credit_date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`id`, `mid`, `amount`, `balance`, `refno`, `source`, `credit_date`, `status`) VALUES
(1, 11, 1600, 100, 'erff', 'total savings', '2022-06-17', 1),
(4, 12, 666, 222, 'ess', 'payments', '2022-06-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `refno` varchar(40) NOT NULL,
  `source` varchar(40) NOT NULL,
  `debit_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debit`
--

INSERT INTO `debit` (`id`, `mid`, `amount`, `refno`, `source`, `debit_date`, `status`) VALUES
(1, 4, 1111, 'daada', 'payments', '2022-06-17 11:22:01', 1),
(3, 6, 300, 'dfs', 'total savings', '2022-06-19 10:50:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `loan_plan` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `refno`, `userid`, `amount`, `loan_plan`, `status`, `created_date`) VALUES
(18, 'nhgfd', 10, 400, 3, 2, '2022-06-20 16:49:16'),
(19, 'mzgkjgjgyjf', 20, 400, 3, 2, '2022-06-20 16:55:02'),
(20, 'dfsddd', 20, 430, 2, 2, '2022-06-20 17:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `pay_date` date NOT NULL,
  `balance` float NOT NULL,
  `pay_type` varchar(30) NOT NULL,
  `refno` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `userid`, `amount`, `pay_date`, `balance`, `pay_type`, `refno`, `status`) VALUES
(2, 10, 1000, '2022-06-20', 100, 'Shares', '2222ddf', 0),
(3, 11, 1000, '2022-06-20', 0, 'Savings', 'aghvvsvs', 0),
(4, 6, 1000, '2022-06-20', 200, 'Savings', 'dhugg', 0),
(5, 6, 9900, '2022-06-20', 600, 'Savings', 'ddfff', 0),
(6, 6, 1000, '2022-06-20', 300, 'Savings', 'fgsggg', 0),
(7, 20, 200, '2022-06-20', 230, 'Loans', 'dfsdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `months` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `penalty_rate` int(11) NOT NULL,
  `creationdate` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `months`, `rate`, `penalty_rate`, `creationdate`, `status`) VALUES
(1, 2, 2, 1, '2022-06-17', 1),
(3, 2, 2, 2, '2022-06-18', 1),
(4, 4, 4, 1, '2022-06-20', 1),
(5, 4, 2, 1, '2022-06-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `balance` float NOT NULL DEFAULT 0,
  `pay_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `userid`, `username`, `refno`, `amount`, `balance`, `pay_date`, `status`, `created_date`) VALUES
(63, 20, 'felo felo', 'fsds', 200, 0, '2022-06-20 17:25:16', 0, '2022-06-20'),
(64, 10, 'Derick Derick', 'ffgffg', 200, 0, '2022-06-20 18:03:22', 0, '2022-06-20'),
(65, 10, '', 'dffgg', 200, 0, '2022-06-20 18:05:03', 0, '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `username`, `password`, `contact`, `status`, `creationdate`, `updationdate`) VALUES
(10, 'Derick', 'Derick', 'derick@gmail.com', 'derick', '25d55ad283aa400af464c76d713c07ad', '786266262', 1, '2022-06-16 09:04:39', NULL),
(20, 'felo', 'felo', 'felo@gmail.com', 'felox', '25d55ad283aa400af464c76d713c07ad', '11111111', 1, '2022-06-20 13:53:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `debit`
--
ALTER TABLE `debit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
