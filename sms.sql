-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 03:45 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@admin.com', 'admin125');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `schoolname` char(255) NOT NULL,
  `Pemail` varchar(255) NOT NULL,
  `Coordinator` varchar(255) NOT NULL,
  `SectorSpecialist` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `schoolname`, `Pemail`, `Coordinator`, `SectorSpecialist`, `pass`) VALUES
(10, 'test school', 'test@test.com', 'testco@test.com', 'testsector@test.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `school` bigint(20) NOT NULL,
  `S_type` varchar(20) NOT NULL,
  `sis` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `S_n` varchar(255) NOT NULL,
  `M_n` varchar(255) NOT NULL,
  `F_n` varchar(255) NOT NULL,
  `Nlsh` varchar(255) NOT NULL,
  `C_s` varchar(255) NOT NULL,
  `P_name` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_no` varchar(255) NOT NULL,
  `eng` varchar(255) NOT NULL,
  `maths` varchar(255) NOT NULL,
  `Nvr` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `comm` varchar(255) NOT NULL,
  `res` varchar(4) NOT NULL,
  `date` date NOT NULL,
  `batchno` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school`, `S_type`, `sis`, `fname`, `dob`, `S_n`, `M_n`, `F_n`, `Nlsh`, `C_s`, `P_name`, `p_email`, `p_no`, `eng`, `maths`, `Nvr`, `total`, `comm`, `res`, `date`, `batchno`, `status`) VALUES
(10, 10, 'public', '123', 'salman', '2017-10-01', 'United Arab Emirates', 'United Arab Emirates', 'United Arab Emirates', 'abc', 'aaa', 'aa', 'aa@abc', 'aa', '10', '10', 'a', '20', 'abc', 'Reco', '2017-10-13', 'Batch 1', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
