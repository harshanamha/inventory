-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 05:19 PM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Mirigama'),
(2, 'Giriulla'),
(3, 'Gampaha'),
(4, 'Alawwa'),
(5, 'Kurunegala'),
(6, 'Warakapola'),
(7, 'Pasyala'),
(8, 'Anuradhapura');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tp1` varchar(20) NOT NULL,
  `tp2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `date`, `name`, `designation`, `address`, `tp1`, `tp2`) VALUES
(1, '2022-12-23', 'Lalith Darshana', 'Driver', 'no11, maiwaththa rd', '0123654789', '7845632198'),
(2, '2022-12-24', 'Ghepl', 'Helper', '76,hjj colombo', '0123654789', '7845632198');

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `number` varchar(20) NOT NULL,
  `deliverynote` varchar(50) NOT NULL,
  `drivername` varchar(50) NOT NULL,
  `qty` float NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `date`, `number`, `deliverynote`, `drivername`, `qty`, `cost`) VALUES
(1, '2023-01-12', 'LN - 2534', '00000000', 'Lalith Darshana', 50, 15000),
(2, '2023-01-06', 'LN - 2534', '11111', 'Ghepl', 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` int(11) NOT NULL,
  `contact` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`id`, `name`, `address`, `city`, `contact`) VALUES
(2, 'indra', 'no11, maiwaththa rd', 2, 1234567890),
(3, 'abc', 'dfg, kkk, lll', 2, 12234567),
(4, 'test', 'no45, hhkh', 4, 2147483647),
(5, 'Test2', '76,hjj colombo', 1, 88776),
(6, 'yui', 'nmb', 2, 0),
(7, 'oooooo', 'nmb', 1, 0),
(8, 'DRT', 'no11, maiwaththa rd', 5, 2345678),
(9, 'QQQ', 'no11, maiwaththa rd', 4, 1234567890),
(10, 'Test2', 'no45, hhkh, hjg', 7, 21234567);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `dnote_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `method` varchar(20) NOT NULL,
  `chequeno` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `helper` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `dnote_id`, `date`, `invoice`, `method`, `chequeno`, `amount`, `helper`) VALUES
(1, 1, '2022-05-05', '12345678', 'Cheque', '212ljh56', 40000, 'Lalith Darshana'),
(2, 2, '2022-12-02', 'g3333', 'Cheque', '25893', 10000, 'Rq'),
(3, 1, '2022-12-21', '5555555', 'Cash', '', 10000, 'Rq'),
(5, 1, '2023-03-01', '56776', 'Cheque', 'hf546', 10000, 'Lalith Darshana');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `discription` varchar(200) NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`id`, `date`, `discription`, `cost`) VALUES
(1, '2023-03-01', 'tea', 500);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `number` varchar(20) NOT NULL,
  `discription` varchar(50) NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id`, `date`, `number`, `discription`, `cost`) VALUES
(1, '2023-01-03', 'LN - 2534', 'tire', 20000),
(2, '2023-01-21', 'LN - 2534', 'tire', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `delivery_Note` varchar(50) NOT NULL,
  `drivername` varchar(50) NOT NULL,
  `driversalary` double NOT NULL,
  `helper1name` varchar(50) NOT NULL,
  `helper1salary` double NOT NULL,
  `helper2name` varchar(50) NOT NULL,
  `helper2salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `date`, `delivery_Note`, `drivername`, `driversalary`, `helper1name`, `helper1salary`, `helper2name`, `helper2salary`) VALUES
(1, '2022-07-12', '11111', 'Lalith Darshana', 4000, 'Ghepl', 3000, 'Lalith Darshana', 2500),
(2, '2022-05-05', '00000000', 'Lalith Darshana', 4000, 'Ghepl', 2500, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hardware` int(11) NOT NULL,
  `delivery_Note` varchar(100) NOT NULL,
  `invno` varchar(50) NOT NULL,
  `sqty` int(11) NOT NULL,
  `freeqty` int(11) NOT NULL,
  `unit` double NOT NULL,
  `discount` double(20,2) NOT NULL,
  `total` double(20,2) NOT NULL,
  `restamount` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `hardware`, `delivery_Note`, `invno`, `sqty`, `freeqty`, `unit`, `discount`, `total`, `restamount`, `status`) VALUES
(1, '2022-05-05', 4, '00000000', '11111', 150, 2, 1000, 0.00, 100000.00, 41950, 'NOT DONE'),
(2, '2022-05-06', 3, '5555555555', '3333', 70, 0, 2800, 200.78, 181799.22, 171799.22, 'NOT DONE'),
(3, '2022-05-10', 9, '00000000', '4444', 90, 6, 3000, 1000.00, 269000.00, 0, 'NOT DONE'),
(4, '2022-05-12', 9, '5555555555', '5555', 100, 2, 3000, 1990.00, 298010.00, 0, 'NOT DONE'),
(5, '2022-06-03', 3, '00000000', '6666', 78, 8, 3000, 100.50, 233899.50, 0, 'NOT DONE'),
(7, '2022-06-09', 3, '11111', '7777', 100, 5, 3000, 1000.55, 298999.45, 0, 'NOT DONE'),
(8, '2022-05-01', 3, '11111', '', 1000, 2, 3000, 1000.00, 2999000.00, 0, 'NOT DONE'),
(9, '2022-11-02', 4, '11111', '', 10, 0, 3000, 0.00, 30000.00, 20000, 'NOT DONE'),
(10, '2022-11-17', 5, '11111', '', 15, 0, 2700, 0.00, 40500.00, 0, 'DONE'),
(11, '2022-12-03', 4, '5655345', '', 65, 2, 3000, 0.00, 195000.00, 195000, 'NOT DONE'),
(13, '2023-03-01', 4, '11111', '2222', 50, 1, 2000, 10.00, 99990.00, 99990, 'NOT DONE'),
(14, '2022-05-05', 4, '00000000', '11111', 100, 2, 1000, 0.00, 100000.00, 41950, 'NOT DONE'),
(15, '2022-05-10', 9, '00000000', '4444', 90, 6, 3000, 1000.00, 269000.00, 0, 'NOT DONE'),
(16, '2022-06-03', 3, '00000000', '6666', 78, 8, 3000, 100.50, 233899.50, 0, 'NOT DONE'),
(17, '2022-06-09', 3, '11111', '7777', 100, 5, 3000, 1000.55, 298999.45, 0, 'NOT DONE'),
(18, '2022-05-01', 3, '11111', '', 1000, 2, 3000, 1000.00, 2999000.00, 0, 'NOT DONE'),
(19, '2022-11-02', 4, '11111', '', 10, 0, 3000, 0.00, 30000.00, 20000, 'NOT DONE'),
(20, '2022-11-02', 4, '11111', '', 10, 0, 3000, 0.00, 30000.00, 20000, 'NOT DONE'),
(21, '2023-03-01', 4, '333333', '258963', 100, 2, 2000, 1000.00, 199000.00, 199000, 'NOT DONE'),
(22, '2023-03-01', 3, '4444444', '369852', 165, 14, 2000, 2000.00, 328000.00, 328000, 'NOT DONE');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `delivery_note` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `sale_type` varchar(30) NOT NULL,
  `bulk_bag` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `soNo` varchar(50) NOT NULL,
  `poNo` varchar(50) NOT NULL,
  `dis` varchar(10) NOT NULL,
  `draft` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `diverName` varchar(30) NOT NULL,
  `vehicleNo` varchar(20) NOT NULL,
  `restqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `delivery_note`, `date`, `type`, `sale_type`, `bulk_bag`, `qty`, `soNo`, `poNo`, `dis`, `draft`, `amount`, `diverName`, `vehicleNo`, `restqty`) VALUES
(1, '00000000', '2022-06-01', 'Ultratec', 'Cash Sale', 'Bulk', 65, '8876599', '80', 'Y', '1234', 150000, 'test', '12-0987            ', 41950),
(2, '5555555555', '2022-06-17', 'Holcim', 'Cheque Sale', 'Bag', 65, '88765', '5', 'Y', '1234', 300000, 'test', '12-0987            ', 171799),
(3, '88888888888', '2022-04-01', 'Holcim', 'Cheque Sale', 'Bag', 89, '88765', '5', 'Y', '1234', 400000, 'test', '12-0987', 0),
(4, '11111', '2022-05-13', 'Holcim', 'Cash Sale', 'Bag', 68, '3456', 'ewew', 'Y', 'erty', 2000.87, 'test', '12-0987', 0),
(5, '567546', '2022-03-01', 'Ultratec', 'Cheque Sale', 'Bulk', 776, '23456', '3456', 'Y', '77665432', 453.8967, 'test2', '12-0987', 0),
(6, '5655345', '2022-11-15', 'Ultratec', 'Cheque Sale', 'Bulk', 50, '8876599', '5', 'N', 'erty', 10000, 'df', '12-0987', 0),
(7, '333333', '2023-03-16', 'Ultratec', 'Cheque Sale', 'Bag', 150, '8876599', '80', 'Y', '1234', 200000, 'Lalith Darshana', 'LN - 2534', 48),
(8, '4444444', '2023-03-01', 'Ultratec', 'Cheque Sale', 'Bag', 180, '8876599', '80', 'Y', '1234', 500000, 'Lalith Darshana', 'LN - 2534', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Ultratec'),
(2, 'Holcim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `FirstName`, `LastName`, `UserName`, `Password`) VALUES
(1, 'Madushan', 'Amarathunga', 'amar', '1234'),
(2, 'shani', 'ayesha', 'sha', '12345'),
(3, 'eee', 'ggg', 'aaa', '123'),
(4, 'ghf', 'fty', 'jj', '123'),
(5, 'Nethma', 'Pathirana', 'nethma', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `number`, `type`) VALUES
(1, 'LN - 2534', 'Lorry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `city_2` (`city`),
  ADD KEY `city_3` (`city`),
  ADD KEY `city_4` (`city`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dnote_id` (`dnote_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hardware` (`hardware`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`city`) REFERENCES `city` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`dnote_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`hardware`) REFERENCES `hardware` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
