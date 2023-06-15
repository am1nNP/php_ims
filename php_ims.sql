-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 12:26 PM
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
-- Database: `php_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_name`
--

CREATE TABLE `company_name` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `company_name`
--

INSERT INTO `company_name` (`id`, `company_name`) VALUES
(1, 'سامسونگ'),
(3, 'سونی'),
(5, 'اپل');

-- --------------------------------------------------------

--
-- Table structure for table `party_info`
--

CREATE TABLE `party_info` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `businessname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `party_info`
--

INSERT INTO `party_info` (`id`, `firstname`, `lastname`, `businessname`, `contact`, `address`, `city`) VALUES
(2, 'amin', 'a', 'dawd', 'awd', 'awdaw', 'daw'),
(3, 'امین', 'نادی', 'موبایل', '01934516', 'یشیشص', 'دزفول');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `packing_size` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_name`, `product_name`, `unit`, `packing_size`) VALUES
(1, 'سامسونگ', 'awd', 'کیلوگرم', 'awd'),
(8, 'سونی', 'a1', 'کیلوگرم', 'a2'),
(10, 'سامسونگ', '3aa', 'liter', 'a2'),
(11, 'سامسونگ', '21a', 'کیلوگرم', 'a'),
(12, 'اپل', 'iphone X', 'کیلوگرم', '3'),
(13, 'اپل', 'iphone XI', 'کیلوگرم', '5');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `packing_size` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `quantity` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `party_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `purchase_type` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`id`, `company_name`, `product_name`, `unit`, `packing_size`, `quantity`, `price`, `party_name`, `purchase_type`, `expiry_date`) VALUES
(6, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '5000', 'موبایل', 'cash', '2021-05-25'),
(7, 'سونی', 'a1', 'کیلوگرم', 'a2', '2', '10000', 'موبایل', 'cash', '2023-05-31'),
(8, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '2000', 'موبایل', 'credit-card', '2023-05-31'),
(9, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '2000', 'موبایل', 'credit-card', '2023-05-31'),
(10, 'اپل', 'iphone X', 'کیلوگرم', '3', '15', '2000', 'موبایل', 'credit-card', '2023-05-31'),
(11, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '15', 'موبایل', 'credit-card', '2023-05-31'),
(12, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '20', 'موبایل', 'credit-card', '2023-05-31'),
(13, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '10', 'موبایل', 'credit-card', '2023-05-17'),
(14, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '30', 'موبایل', 'credit-card', '2023-05-17'),
(15, 'سامسونگ', '3aa', 'liter', 'a2', '5', '6', 'موبایل', 'cash', '2023-05-24'),
(16, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '5', 'موبایل', 'cash', '2023-05-17'),
(17, 'سامسونگ', '3aa', 'liter', 'a2', '5', '6', 'موبایل', 'cash', '2023-05-22'),
(18, 'سامسونگ', '3aa', 'liter', 'a2', '5', '10', 'موبایل', '', '2023-05-17'),
(19, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '10', 'موبایل', 'cash', '2023-05-25'),
(20, 'اپل', 'iphone X', 'کیلوگرم', '3', '5', '10', 'موبایل', 'cash', '2023-05-17'),
(21, 'اپل', 'iphone X', 'کیلوگرم', '3', '30', '200', 'موبایل', 'cash', '2023-06-28'),
(22, 'اپل', 'iphone XI', 'کیلوگرم', '5', '20', '300', 'موبایل', 'cash', '2023-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `stock_master`
--

CREATE TABLE `stock_master` (
  `id` int(5) NOT NULL,
  `product_company` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `product_unit` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `packing_size` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `product_qty` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `product_selling_price` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `stock_master`
--

INSERT INTO `stock_master` (`id`, `product_company`, `product_name`, `product_unit`, `packing_size`, `product_qty`, `product_selling_price`) VALUES
(3, 'سامسونگ', '3aa', 'liter', 'a2', '5', '100'),
(4, 'اپل', 'iphone X', 'کیلوگرم', '3', '35', '50'),
(5, 'اپل', 'iphone XI', 'کیلوگرم', '5', '20', '500');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(5) NOT NULL,
  `unit` varchar(100) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`) VALUES
(1, 'کیلوگرم'),
(4, 'liter');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`) VALUES
(1, 'amin', 'nadi', 'nestor', 'amin123', 'user', 'active'),
(3, 'admin', 'admin', 'admin', 'admin', 'admin', 'active'),
(9, 'nestor', 'nestori', 'nestor3', '123', 'user', 'active'),
(11, 'امین', 'محمدی', 'شی', '1234', 'کاربر', 'راکد');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_name`
--
ALTER TABLE `company_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_info`
--
ALTER TABLE `party_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_master`
--
ALTER TABLE `stock_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_name`
--
ALTER TABLE `company_name`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `party_info`
--
ALTER TABLE `party_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stock_master`
--
ALTER TABLE `stock_master`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
