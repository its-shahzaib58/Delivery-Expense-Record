-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 01:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driverexpense`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense_table`
--

CREATE TABLE `expense_table` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `sector_name` varchar(255) NOT NULL,
  `veh_no` varchar(255) NOT NULL,
  `toll_tax` int(11) NOT NULL,
  `food_exp` int(11) NOT NULL,
  `tyre_puncture` int(11) NOT NULL,
  `traffice_challan` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `total_exp` int(11) NOT NULL,
  `given_amount` int(11) NOT NULL,
  `recevieable_amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense_table`
--

INSERT INTO `expense_table` (`id`, `date`, `driver_name`, `sector_name`, `veh_no`, `toll_tax`, `food_exp`, `tyre_puncture`, `traffice_challan`, `misc`, `total_exp`, `given_amount`, `recevieable_amount`, `created_at`) VALUES
(21, '2023-07-01', 'Asif', 'Okara', 'CAD-7951', 450, 300, 0, 0, 0, 750, 2000, 1250, '2023-06-15 11:43:07'),
(33, '2023-06-01', 'Asif', 'Sargodha', 'CAD-573', 450, 300, 0, 0, 0, 750, 1500, 750, '2023-06-16 11:11:54'),
(34, '2023-06-16', 'Ejaz', 'Okara', 'CAD-7951', 330, 300, 0, 0, 0, 630, 1000, 370, '2023-06-16 11:15:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense_table`
--
ALTER TABLE `expense_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense_table`
--
ALTER TABLE `expense_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
