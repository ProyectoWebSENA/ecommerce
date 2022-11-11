-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 10:42 PM
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
-- Database: `ecommerce`
--
DROP DATABASE IF EXISTS ecommerce;
CREATE DATABASE ecommerce;
USE ecommerce;
-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `total_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user1`, `total_price`) VALUES
(5, 6, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_code` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_code`, `name`) VALUES
(1, 'Vestimenta'),
(2, 'Juguetes'),
(3, 'Electrodomesticos');

-- --------------------------------------------------------

--
-- Table structure for table `cat_prod`
--

CREATE TABLE `cat_prod` (
  `id` int(11) NOT NULL,
  `cat_code1` int(11) NOT NULL,
  `prod_code1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat_prod`
--

INSERT INTO `cat_prod` (`id`, `cat_code1`, `prod_code1`) VALUES
(5, 1, 1),
(6, 3, 2),
(7, 3, 3),
(8, 3, 4),
(9, 2, 10),
(10, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_code` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` mediumtext NOT NULL,
  `stock` int(11) NOT NULL,
  `prod_pic_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_code`, `name`, `price`, `description`, `stock`, `prod_pic_url`) VALUES
(1, 'Gorra LA Roja', 60000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A diam sollicitudin tempor id eu. Arcu dui vivamus arcu felis bibendum ut tristique et. Eu consequat ac felis donec et odio pellentesque. Amet dictum sit amet justo donec enim diam vulputate. Cursus metus aliquam eleifend mi in. Pellentesque habitant morbi tristique senectus et netus et. Venenatis lectus magna fringilla urna. Ut tellus elementum sagittis vitae et. Lacus viverra vitae congue eu consequat ac felis donec et. Quisque non tellus orci ac auctor augue mauris augue. Non arcu risus quis varius. Sapien et ligula ullamcorper malesuada proin. Mauris a diam maecenas sed.', 1, 'gorra1.jpg'),
(2, 'Microhondas', 400000, 'Viverra vitae congue eu consequat ac felis donec et odio. Eu tincidunt tortor aliquam nulla facilisi cras. Et magnis dis parturient montes nascetur ridiculus mus. Elementum sagittis vitae et leo duis ut diam quam nulla. Ultrices tincidunt arcu non sodales neque sodales. Nulla facilisi cras fermentum odio eu feugiat. ', 30, 'microondas.jpeg'),
(3, 'Licuadora', 150000, 'Porta non pulvinar neque laoreet suspendisse. Etiam sit amet nisl purus in. In iaculis nunc sed augue. Placerat in egestas erat imperdiet sed euismod. Magna sit amet purus gravida. ', 100, 'licuadora.jpg'),
(4, 'Lavadora', 1500000, 'Cursus eget nunc scelerisque viverra mauris in aliquam. Massa eget egestas purus viverra accumsan in. Nunc sed augue lacus viverra vitae. Turpis egestas integer eget aliquet nibh praesent.', 4, 'lavadora.jpg'),
(10, 'Max Steel', 200000, 'Volutpat odio facilisis mauris sit amet massa vitae. Sed sed risus pretium quam vulputate dignissim suspendisse in est. Nulla pellentesque dignissim enim sit amet venenatis urna cursus.', 2, 'juguete4.jpg'),
(12, 'Gorra LA Negra', 60000, 'Elit sed vulputate mi sit. Platea dictumst quisque sagittis purus. At ultrices mi tempus imperdiet. Ut tellus elementum sagittis vitae et leo duis ut diam. Purus in mollis nunc sed id. Leo duis ut diam quam nulla porttitor massa id. Porta non pulvinar neque laoreet suspendisse.', 2, 'ropa1.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `prod_code1` int(11) NOT NULL,
  `stars` tinyint(1) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cellphone` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cellphone`, `address`, `password`, `role`) VALUES
(6, 'Juan', 'usuario@gmail.com', 1, 'Direccion', '$argon2i$v=19$m=65536,t=4,p=1$dGRBUjhmckVNNjdRTG1uRg$MhvGajFuADr/9HGdI7YVPKofSdqxoS0Jw/1X9f24GRM', 'user'),
(7, 'Juan', 'admin@gmail.com', 1, 'Direccion', '$argon2i$v=19$m=65536,t=4,p=1$S3lDNy4xbjZNRjgyVmh1Qw$aPplfO3boK6k6It/k0/sCNqhmV/dFzNoNr9Z/CfyTXk', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `id_cart1` int(11) NOT NULL,
  `prod_code1` int(11) NOT NULL,
  `prod_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `id_cart1`, `prod_code1`, `prod_quantity`) VALUES
(27, 5, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user1`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_code`);

--
-- Indexes for table `cat_prod`
--
ALTER TABLE `cat_prod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_code1` (`cat_code1`),
  ADD KEY `prod_code1` (`prod_code1`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_code`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user1` (`id_user1`),
  ADD KEY `prod_code1` (`prod_code1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cart1` (`id_cart1`),
  ADD KEY `prod_code1` (`prod_code1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cat_prod`
--
ALTER TABLE `cat_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user1`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cat_prod`
--
ALTER TABLE `cat_prod`
  ADD CONSTRAINT `cat_prod_ibfk_1` FOREIGN KEY (`cat_code1`) REFERENCES `categories` (`cat_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_prod_ibfk_2` FOREIGN KEY (`prod_code1`) REFERENCES `products` (`prod_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_user1`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`prod_code1`) REFERENCES `products` (`prod_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`id_cart1`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_cart_ibfk_2` FOREIGN KEY (`prod_code1`) REFERENCES `products` (`prod_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
