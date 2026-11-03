-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 07:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naqab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_name`, `product_price`, `created_at`) VALUES
(1, 2, 8, 'stylish pins', 40.00, '2025-01-24 14:28:03'),
(5, 1, 14, 'single', 2345.00, '2025-01-24 15:29:10'),
(6, 1, 8, 'stylish pins', 40.00, '2025-01-24 15:29:45'),
(7, 1, 4, 'dubai naqab', 120.00, '2025-01-24 17:03:50'),
(8, 2, 2, 'simple abaya', 1200.00, '2025-01-29 09:29:23'),
(10, 4, 6, 'Long Saudi Naqab', 280.00, '2025-01-31 10:27:11'),
(11, 5, 18, 'Soft Hijab', 400.00, '2025-02-04 06:17:32'),
(12, 4, 1, 'Black Grey Abaya', 1680.00, '2025-02-04 10:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `product_name`, `quantity`, `total_amount`, `address`, `pincode`, `state`, `order_date`) VALUES
(2, 14, 1, 'single', 3, 7035.00, 'solapur', '413003', 'Maharashtra', '2025-01-24 16:22:26'),
(3, 1, 2, 'party wear', 1, 1680.00, 'Solapur', '413005', 'Maharashtra', '2025-01-29 09:19:11'),
(4, 1, 2, 'party wear', 1, 1680.00, '8,shukrawar peth,kontam chowk solapur', '413005', 'Maharashtra', '2025-01-29 09:32:51'),
(5, 5, 4, 'Red Hijab', 1, 350.00, '8,shukrawar peth,kontam chowk Solapur', '413005', 'Maharashtra', '2025-01-31 06:31:26'),
(6, 18, 5, 'Soft Hijab', 1, 400.00, 'At Post , Karamba', '413222', 'Maharashtra', '2025-02-04 06:18:59'),
(7, 1, 4, 'Black Grey Abaya', 1, 1680.00, '8,shukrawar peth,kontam chowk Solapur', '413005', 'Maharashtra', '2025-02-04 10:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `quantity`, `category`, `description`) VALUES
(1, 'Black Grey Abaya', 1680, '[\"317.jpg\",\"318.jpg\"]', 9, 'abaya', 'Simple black abaya with simple grey border and grey color hijab'),
(2, 'Designer Black Abaya', 1200, '[\"301.jpg\",\"302.jpg\"]', 0, 'abaya', 'Designer work black color abaya burkha'),
(3, 'Purple Color Abaya', 2340, '[\"311.jpg\",\"312.jpg\"]', 5, 'abaya', 'Purple Color Abaya with designer work and pair it with the elegant black hijab'),
(4, 'Dubai Naqab', 199, '[\"1.jpg\",\"9.jpg\"]', 45, 'naqab', 'Dubai Style Naqab Light Weight and Easy to wear'),
(5, 'Red Hijab', 350, '[\"20.jpg\"]', 9, 'Hijab', 'Beautifull Red Color Soft Hijab With Floral Design'),
(6, 'Long Saudi Naqab', 280, '[\"8.jpg\"]', 34, 'naqab', 'Long Simple Naqab which Gives Full Coverage'),
(7, 'hijab pins', 199, '[\"42.jpg\"]', 60, 'accessories', 'Simple Color Full Daily Wear HIjab Pins Pack of 10'),
(8, 'Stylish Stone Pins ', 280, '[\"40.jpg\"]', 100, 'accessories', 'Stylish Stone Pins Set Of 8'),
(9, 'Party Wear Hijab Set', 1700, '[\"11.jpg\"]', 30, 'hijab', 'Party Waer Colorful Hijab Set of 6'),
(10, 'Magnetic Pins ', 399, '[\"37.jpg\",\"38.jpg\"]', 50, 'accessories', 'Trendy Magnetic Hijab Pins Set Of 5'),
(11, 'Irani Hijab Pins', 280, '[\"43.jpg\",\"1737473700_44.jpg\"]', 50, 'accessories', 'Trendy Irani Hijab Pins With Set Of 5'),
(12, 'Stylish Simple Abaya', 1600, '[\"319.jpg\",\"320.jpg\"]', 20, 'Abaya', 'Stylish Abaya With White Work'),
(14, 'Dubai Naqab ', 200, '[\"2.jpg\"]', 7, 'naqab', 'Stylish Dubai Naqab Set of 1 Which Gives Full Coverage '),
(15, 'Flairy Stylish Abaya', 2500, '[\"313.jpg\",\"314.jpg\"]', 8, 'Abaya', 'Stylish Full Coverage Black Abaya with Hijab'),
(16, 'Arabian Naqab', 250, '[\"4.jpg\",\"5.jpg\"]', 20, 'Naqab', 'Arabian Front Back Full Coverage Naqab '),
(17, 'V Shape Naqab', 350, '[\"52.jpg\",\"53.jpg\"]', 40, 'Naqab', 'Trendy V Shape Pearl Work Naqab'),
(18, 'Soft Hijab', 400, '[\"18.jpg\"]', 19, 'Hijab', 'Soft Daily Wear Hijab With Trendy Pattern'),
(19, 'Blue Hijab', 450, '[\"17.jpg\"]', 20, 'Hijab', 'Soft Blue Daily Wear Stylish Hijab with Design'),
(20, 'Soft Pink Hijab', 350, '[\"23.jpg\"]', 20, 'Hijab', 'Soft Daily Wear Hijab in Pink Color'),
(21, 'Hijab Cap', 199, '[\"34.jpg\"]', 30, 'accessories', 'Hijab Inner Cap In Black Color '),
(22, 'Hijab Cap with Strap', 199, '[\"35.jpg\"]', 30, 'accessories', 'Hijab inner cap with adjustable Straps '),
(23, 'Hand Gloves Black', 250, '[\"321.jpg\",\"322.jpg\"]', 50, 'accessories', 'Black Color Hand Gloves Easy to Wear');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobno` varchar(10) NOT NULL,
  `query` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `name`, `email`, `mobno`, `query`) VALUES
(2, 'Tuba Tolan Bagwan', 'tubabagwan1@gmail.com', '9623624252', 'I like your abayas and hijab.');

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `uid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobno` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `rpass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`uid`, `fname`, `mname`, `lname`, `email`, `mobno`, `pass`, `rpass`) VALUES
(1, 'Javeriya', 'Masood', 'Mujawar', 'javeriyamujawar57@gmail.com', '7666391900', 'Javeriya57', 'Javeriya57'),
(2, 'javeriya', '', 'mujawar', 'javeriya@gmail.com', '9876543210', '123456', '123456'),
(3, 'tuba', '', 'aaa', 'tuba@gmail.com', '9876543211', '1234567', '1234567'),
(4, 'Tuba', 'Tolan', 'Bagwan', 'tubabagwan1@gmail.com', '9623624252', '123456', '123456'),
(5, 'Suhana', 'Liyaqat', 'Mulla', 'shamshadmulla48@gmail.com', '9370138691', 'Suhana123', 'Suhana123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userreg`
--
ALTER TABLE `userreg`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `userreg` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
