-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2019 at 08:31 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--
Create Database organo2;

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` varchar(30) DEFAULT NULL,
  `user_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `login_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`login_id`, `username`, `password`) VALUES
(1, 'adithya_s', '8ee7fd06abe4cb3fe2834b5db72933d3'),
(2, 'adithya_b', '8ee7fd06abe4cb3fe2834b5db72933d3'),
(3, 'PranavN', '1453310ea4e47a73b7a8704dfc7ca9e2');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_weight` int(11) DEFAULT NULL,
  `order_amount` int(11) DEFAULT NULL,
  `seller_id` varchar(30) DEFAULT NULL,
  `buyer_id` varchar(30) DEFAULT NULL,
  `buyer_address` varchar(100) DEFAULT NULL,
  `seller_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`order_id`, `product_id`, `order_weight`, `order_amount`, `seller_id`, `buyer_id`, `buyer_address`, `seller_address`) VALUES
(1, 1, 12, 144, 'adithya_s', 'adithya_b', '23,2112,Alirajpur,Madhya Pradesh', '12,add,Ahmednagar,Maharashtra'),
(4, 1, 21, 252, 'adithya_s', 'adithya_b', '23,2112,Alirajpur,Madhya Pradesh', '12,add,Ahmednagar,Maharashtra'),
(5, 1, 67, 804, 'adithya_s', 'adithya_b', '23,2112,Alirajpur,Madhya Pradesh', '12,add,Ahmednagar,Maharashtra'),
(6, 2, 5, 0, 'adithya_s', 'adithya_b', '23,2112,Alirajpur,Madhya Pradesh', '12,add,Ahmednagar,Maharashtra'),
(7, 3, 7, 861, 'adithya_s', 'PranavN', 'Gorbandhar road Thane,Thana,Maharashtra', '12,add,Ahmednagar,Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_type` varchar(15) DEFAULT NULL,
  `product_user` varchar(100) DEFAULT NULL,
  `product_weight` int(11) DEFAULT NULL,
  `product_pricePkg` int(11) DEFAULT NULL,
  `purchased_weight` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_type`, `product_user`, `product_weight`, `product_pricePkg`, `purchased_weight`) VALUES
(1, 'guava', 'adithya_s', 0, 12, 100),
(2, 'cabbage', 'adithya_s', 1, 0, 5),
(3, 'apple', 'adithya_s', 4, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_type` char(1) NOT NULL,
  `login_id` varchar(30) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_age` int(3) NOT NULL,
  `user_street` varchar(100) DEFAULT NULL,
  `user_state` varchar(50) NOT NULL,
  `user_district` varchar(50) NOT NULL,
  `wallet_amount` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_type`, `login_id`, `user_name`, `user_email`, `user_age`, `user_street`, `user_state`, `user_district`, `wallet_amount`) VALUES
(1, 'S', 'adithya_s', 'ad', 'adithy@gmail.com', 21, '12,add', 'Maharashtra', 'Ahmednagar', 861),
(2, 'B', 'adithya_b', 'adithya', 'adithya_12@gma.c', 12, '23,2112', 'Madhya Pradesh', 'Alirajpur', 0),
(3, 'B', 'PranavN', 'Pranav', 'pokeflyrhino@gmaill.com', 19, 'Gorbandhar road Thane', 'Maharashtra', 'Thana', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id_2` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `product_user` (`product_user`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_user`) REFERENCES `login_table` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `user_table`
--
/*ALTER TABLE `user_table`
  ADD CONSTRAINT `user_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login_table` (`login_id`) ON DELETE CASCADE;*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
