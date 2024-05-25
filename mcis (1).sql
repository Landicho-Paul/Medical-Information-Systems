-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 01:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcis`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `contact` int(50) NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullName`, `email`, `contact`, `type`) VALUES
(1, 'pred', 'fred@gmail.com', 956568459, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(225) NOT NULL,
  `medicine_name` varchar(500) NOT NULL,
  `price` varchar(225) NOT NULL,
  `stock` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_name`, `price`, `stock`) VALUES
(1, 'Paracetamol', '5.00', 331),
(2, 'solmux', '192.00', 3),
(5, 'neozep', '7.00', 6),
(6, 'neozep', '7.00', 6),
(7, 'robitussin', '151.00', 7),
(8, 'alaxzan', '21.00', 3),
(9, 'gaviscon', '34.00', 23),
(13, 'nafarin', '8.50', 16),
(14, 'nafarin', '8.50', 16),
(15, 'decolgen', '8.00', 14),
(16, 'medicol', '12.25', 13),
(17, 'medicoladvance', '9.00', 23),
(18, 'bioflu', '9.00', 5),
(19, 'salonpas10', '62.50', 14),
(20, 'salonpas20', '108.50', 4),
(21, 'tempra', '154.00', 5),
(22, 'vicks', '78.00', 8),
(23, 'salonpasorange', '74.00', 5),
(24, 'salonpascool', '74.00', 4),
(25, 'salonpassugarfree', '74.00', 3),
(26, 'salonpasoriginale', '74.00', 5),
(27, 'strepsilshoneylemon', '74.00', 10),
(28, 'strepsilswarm', '74.00', 4),
(29, 'stresstabs', '74.00', 5),
(30, 'babyflo108', '20.50', 3),
(31, 'babyflo72', '14.10', 4),
(32, 'cottonbuds200', '40.00', 4),
(33, 'cottonballs', '18.00', 5),
(34, 'cottonballs25', '14.00', 2),
(35, 'cottonballs', '29.00', 4),
(36, 'babywipes', '109.00', 0),
(37, 'babywipes10', '95.00', 2),
(38, 'off', '212.70', 6),
(39, 'offkids', '193.00', 5),
(40, 'offkids50', '192.75', 1),
(41, 'colgate', '183.00', 3),
(42, 'sensodyne', '114.00', 4),
(43, 'toothbrush', '52.00', 6),
(44, 'toothbrush1', '38.00', 4),
(45, 'safeguard', '58.00', 10),
(46, 'safeguard60', '29.00', 4),
(47, 'safegaurdlemonfresh', '58.00', 5),
(48, 'safeguardfreshgreen', '52.00', 4),
(49, 'dove', '87.00', 5),
(50, 'nivea', '91.00', 8),
(51, 'doverollon', '91.00', 6),
(52, 'pampers', '517.00', 1),
(53, 'thermometer', '298.00', 3),
(54, '3dmask', '55.00', 5),
(55, 'bloodpressure', '2780.00', 1),
(56, 'pregnancytest', '72.00', 7),
(57, 'nebulizer', '2980.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `date`) VALUES
(5, 52360, 'pred', 'admin', '2024-03-20 14:56:57'),
(6, 63481, 'pred@admin', '1234', '2024-03-21 04:08:17'),
(8, 6300, 'Ivan', 'admin', '2024-05-02 07:59:02'),
(9, 8357, 'Russel', 'admin', '2024-05-02 07:59:18'),
(10, 53234, 'Ives', 'admin', '2024-05-02 07:59:25'),
(13, 527, 'Ivan', 'admin', '2024-05-02 08:19:06'),
(15, 4672, 'pred@customer', '1234', '2024-05-11 18:17:19'),
(16, 45175, 'pred@admin', 'asdf', '2024-05-11 18:18:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
