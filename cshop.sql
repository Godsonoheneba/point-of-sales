-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 09:54 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `backuptb`
--

CREATE TABLE `backuptb` (
  `id` int(11) NOT NULL,
  `backup_code` varchar(20) NOT NULL,
  `LastBackupDate` date NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daily_sales`
--

CREATE TABLE `daily_sales` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `itemid` varchar(20) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itemprice` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `total` varchar(100) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `theDate` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pickup` varchar(3) NOT NULL DEFAULT 'yes',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `staff` varchar(100) NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_sales`
--

INSERT INTO `daily_sales` (`id`, `customer_id`, `itemid`, `itemname`, `itemprice`, `quantity`, `total`, `receipt_no`, `theDate`, `status`, `pickup`, `date_added`, `staff`, `active`) VALUES
(1, '110', '1355', 'Cement (Ghacem)', '40', '2', '80', '0000001', '2021-04-26', 'Cash Sales', 'yes', '2021-04-26 05:38:16', '1', 'yes'),
(2, '110', '1355', 'Plywood (4 mm)', '5', '4', '20', '0000001', '2021-04-26', 'Cash Sales', 'yes', '2021-04-26 05:38:16', '1', 'yes'),
(3, '110', '7250', 'Plywood (4 mm)', '5', '2', '10', '0000003', '2021-04-26', 'Cash Sales', 'yes', '2021-04-26 05:39:59', '1', 'yes'),
(4, '110', '2729', 'Nail (1 inc)', '3', '2', '6', '0000004', '2021-04-26', 'Cash Sales', 'yes', '2021-04-26 06:16:48', '1', 'yes'),
(5, '110', '7852', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000005', '2021-04-30', 'Cash Sales', 'yes', '2021-04-30 13:32:20', '1', 'yes'),
(6, '110', '7852', 'Iron Rod (5.5 mm)', '100', '2', '200', '0000005', '2021-04-30', 'Cash Sales', 'yes', '2021-04-30 13:32:20', '1', 'yes'),
(7, '110', '1697', 'Cement (Ghacem)', '40', '10', '400', '0000007', '2021-04-30', 'Cash Sales', 'yes', '2021-04-30 17:17:17', '1', 'yes'),
(8, '110', '1697', 'Door (Single)', '300', '10', '3000', '0000007', '2021-04-30', 'Cash Sales', 'yes', '2021-04-30 17:17:17', '1', 'yes'),
(9, '110', '1697', 'Iron Rod (5.5 mm)', '100', '10', '1000', '0000007', '2021-04-30', 'Cash Sales', 'yes', '2021-04-30 17:17:17', '2', 'yes'),
(10, '110', '5886', 'Plywood (4 mm)', '5', '1', '5', '0000010', '2021-05-07', 'Cash Sales', 'yes', '2021-05-07 05:58:54', '1', 'yes'),
(11, '110', '5886', 'Cement (Ghacem)', '40', '20', '800', '0000010', '2021-05-07', 'Cash Sales', 'yes', '2021-05-07 05:58:54', '1', 'yes'),
(12, '110', '5886', 'Door (Single)', '300', '10', '3000', '0000010', '2021-05-07', 'Cash Sales', 'yes', '2021-05-07 05:58:54', '1', 'yes'),
(13, '112231', '8329', 'Binding Wire (Binding Wire)', '20', '10', '200', '0000013', '2021-05-07', 'Credit Sales', 'yes', '2021-05-07 06:00:21', '1', 'yes'),
(14, '112231', '8329', 'Door (Single)', '300', '10', '3000', '0000013', '2021-05-07', 'Credit Sales', 'yes', '2021-05-07 06:00:21', '1', 'yes'),
(15, '112231', '8329', 'Binding Wire (Binding Wire)', '20', '10', '200', '0000015', '2021-05-07', 'Credit Sales', 'yes', '2021-05-07 06:01:37', '1', 'yes'),
(16, '112231', '8329', 'Door (Single)', '300', '10', '3000', '0000015', '2021-05-07', 'Credit Sales', 'yes', '2021-05-07 06:01:37', '1', 'yes'),
(17, '110', '6050', 'Cement (Ghacem)', '40', '10', '400', '0000017', '2021-05-17', 'Cash Sales', 'yes', '2021-05-17 01:52:53', '1', 'yes'),
(18, '110', '6050', 'Binding Wire (Binding Wire)', '20', '5', '100', '0000017', '2021-05-17', 'Cash Sales', 'yes', '2021-05-17 01:52:53', '1', 'yes'),
(19, '110', '6050', 'Door (Single)', '300', '1', '300', '0000017', '2021-05-17', 'Cash Sales', 'yes', '2021-05-17 01:52:53', '1', 'yes'),
(20, '112231', '4324', 'Binding Wire (Binding Wire)', '20', '10', '200', '0000020', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 10:45:16', '1', 'yes'),
(21, '112231', '4324', 'Cement (Ghacem)', '40', '10', '400', '0000020', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 10:45:16', '1', 'yes'),
(22, '112231', '7702', 'Door (Single)', '300', '10', '3000', '0000022', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 10:53:19', '1', 'yes'),
(23, '112231', '7702', 'Cement (Ghacem)', '40', '5', '200', '0000022', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 10:53:19', '1', 'yes'),
(24, '112231', '7702', 'Binding Wire (Binding Wire)', '20', '2', '40', '0000022', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 10:53:19', '1', 'yes'),
(25, '112231', '4072', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000025', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 10:54:54', '1', 'yes'),
(26, '112231', '4072', 'Cement (Ghacem)', '40', '2', '80', '0000025', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 10:54:54', '1', 'yes'),
(27, '112231', '4072', 'Door (Single)', '300', '1', '300', '0000025', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 10:54:54', '1', 'yes'),
(28, '112231', '8806', 'Binding Wire (Binding Wire)', '20', '2', '40', '0000028', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:12:43', '1', 'yes'),
(29, '112231', '8806', 'Cement (Ghacem)', '40', '3', '120', '0000028', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:12:43', '1', 'yes'),
(30, '112231', '8806', 'Door (Single)', '300', '4', '1200', '0000028', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:12:43', '1', 'yes'),
(31, '112231', '8193', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000031', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:19:40', '1', 'yes'),
(32, '112231', '8193', 'Cement (Ghacem)', '40', '2', '80', '0000031', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:19:40', '1', 'yes'),
(33, '112231', '8193', 'Door (Single)', '300', '3', '900', '0000031', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:19:40', '1', 'yes'),
(34, '112231', '8193', 'Iron Rod (5.5 mm)', '100', '4', '400', '0000031', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:19:40', '1', 'yes'),
(35, '112231', '7179', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000035', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:26:40', '1', 'yes'),
(36, '112231', '7179', 'Cement (Ghacem)', '40', '3', '120', '0000035', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:26:40', '1', 'yes'),
(37, '112231', '7179', 'Door (Single)', '300', '3', '900', '0000035', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:26:40', '1', 'yes'),
(38, '112231', '5406', 'Cement (Ghacem)', '40', '3', '120', '0000038', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:29:16', '1', 'yes'),
(39, '112231', '5406', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000038', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:29:16', '1', 'yes'),
(40, '112231', '5406', 'Door (Single)', '300', '3', '900', '0000038', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:29:16', '1', 'yes'),
(41, '112231', '3283', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000041', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:31:43', '1', 'yes'),
(42, '112231', '3283', 'Cement (Ghacem)', '40', '3', '120', '0000041', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:31:43', '1', 'yes'),
(43, '112231', '3283', 'Door (Single)', '300', '3', '900', '0000041', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:31:43', '1', 'yes'),
(44, '112231', '5397', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000044', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:33:54', '1', 'yes'),
(45, '112231', '5397', 'Door (Single)', '300', '3', '900', '0000044', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:33:54', '1', 'yes'),
(46, '112231', '5397', 'Door (Single)', '300', '3', '900', '0000044', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:33:54', '1', 'yes'),
(47, '112231', '3878', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000047', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:37:02', '1', 'yes'),
(48, '112231', '3878', 'Cement (Ghacem)', '40', '3', '120', '0000047', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:37:02', '1', 'yes'),
(49, '112231', '3878', 'Door (Single)', '300', '3', '900', '0000047', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:37:02', '1', 'yes'),
(50, '112231', '3496', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000050', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:40:28', '1', 'yes'),
(51, '112231', '3496', 'Door (Single)', '300', '3', '900', '0000050', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 11:40:28', '1', 'yes'),
(52, '112231', '3309', 'Cement (Ghacem)', '40', '1', '40', '0000052', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 12:26:16', '1', 'yes'),
(53, '112231', '3309', 'Iron Rod (5.5 mm)', '100', '1', '100', '0000052', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 12:26:16', '1', 'yes'),
(54, '112231', '5590', 'Cement (Ghacem)', '40', '1', '40', '0000054', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 12:53:16', '1', 'yes'),
(55, '112231', '5590', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000054', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 12:53:16', '1', 'yes'),
(56, '112231', '4463', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000056', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 12:58:18', '1', 'yes'),
(57, '112231', '4463', 'Cement (Ghacem)', '40', '3', '120', '0000056', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 12:58:18', '1', 'yes'),
(58, '112231', '4852', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000058', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:07:17', '1', 'yes'),
(59, '112231', '4852', 'Cement (Ghacem)', '40', '3', '120', '0000058', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:07:17', '1', 'yes'),
(60, '112231', '6760', 'Door (Single)', '300', '1', '300', '0000060', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:09:20', '1', 'yes'),
(61, '112231', '6760', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000060', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:09:20', '1', 'yes'),
(62, '112231', '5497', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000062', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:17:31', '1', 'yes'),
(63, '112231', '5497', 'Cement (Ghacem)', '40', '1', '40', '0000062', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:17:31', '1', 'yes'),
(64, '112231', '4261', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000064', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:18:29', '1', 'yes'),
(65, '112231', '4261', 'Door (Single)', '300', '2', '600', '0000064', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:18:29', '1', 'yes'),
(66, '112231', '8173', 'Cement (Ghacem)', '40', '1', '40', '0000066', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:19:55', '1', 'yes'),
(67, '112231', '8173', 'Door (Single)', '300', '1', '300', '0000066', '2021-05-30', 'Credit Sales', 'yes', '2021-05-30 13:19:55', '1', 'yes'),
(68, '112231', '7228', 'Binding Wire (Binding Wire)', '20', '2', '40', '0000068', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:13:51', '1', 'yes'),
(69, '112231', '7228', 'Door (Single)', '300', '2', '600', '0000068', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:13:51', '1', 'yes'),
(70, '112231', '9704', 'Cement (Ghacem)', '40', '2', '80', '0000070', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:19:53', '1', 'yes'),
(71, '112231', '3241', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000071', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:34:39', '1', 'yes'),
(72, '112231', '3241', 'Cement (Ghacem)', '40', '2', '80', '0000071', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:34:39', '1', 'yes'),
(73, '112231', '3241', 'Door (Single)', '300', '3', '900', '0000071', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:34:39', '1', 'yes'),
(74, '112231', '6776', 'Cement (Ghacem)', '40', '1', '40', '0000074', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:36:20', '1', 'yes'),
(75, '112231', '6776', 'Binding Wire (Binding Wire)', '20', '2', '40', '0000074', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:36:20', '1', 'yes'),
(76, '112231', '6776', 'Door (Single)', '300', '3', '900', '0000074', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:36:20', '1', 'yes'),
(77, '112231', '7488', 'Binding Wire (Binding Wire)', '20', '10', '200', '0000077', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:37:56', '1', 'yes'),
(78, '112231', '7488', 'Cement (Ghacem)', '40', '2', '80', '0000077', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:37:56', '1', 'yes'),
(79, '112231', '7488', 'Door (Single)', '300', '3', '900', '0000077', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:37:56', '1', 'yes'),
(80, '112231', '3729', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000080', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:39:02', '1', 'yes'),
(81, '112231', '3729', 'Cement (Ghacem)', '40', '2', '80', '0000080', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:39:02', '1', 'yes'),
(82, '112231', '3116', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000082', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:41:01', '1', 'yes'),
(83, '112231', '3116', 'Cement (Ghacem)', '40', '2', '80', '0000082', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:41:01', '1', 'yes'),
(84, '112231', '3116', 'Iron Rod (5.5 mm)', '100', '3', '300', '0000082', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:41:01', '1', 'yes'),
(85, '112231', '5821', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000085', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:42:40', '1', 'yes'),
(86, '112231', '5821', 'Door (Single)', '300', '2', '600', '0000085', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:42:40', '1', 'yes'),
(87, '112231', '8930', 'Binding Wire (Binding Wire)', '20', '3', '60', '0000087', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:44:10', '1', 'yes'),
(88, '112231', '8930', 'Door (Single)', '300', '1', '300', '0000087', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:44:10', '1', 'yes'),
(89, '112231', '7351', 'Cement (Ghacem)', '40', '1', '40', '0000089', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:46:45', '1', 'yes'),
(90, '112231', '7351', 'Door (Single)', '300', '2', '600', '0000089', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:46:45', '1', 'yes'),
(91, '112231', '1693', 'Binding Wire (Binding Wire)', '20', '2', '40', '0000091', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:47:52', '1', 'yes'),
(92, '112231', '1693', 'Door (Single)', '300', '3', '900', '0000091', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 13:47:52', '1', 'yes'),
(93, '112231', '6131', 'Binding Wire (Binding Wire)', '20', '4', '80', '0000093', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 14:06:10', '1', 'yes'),
(94, '112231', '6131', 'Door (Single)', '300', '4', '1200', '0000093', '2021-06-03', 'Credit Sales', 'yes', '2021-06-03 14:06:10', '1', 'yes'),
(95, '110', '9965', 'Cement (Ghacem)', '40', '2', '80', '0000095', '2021-06-03', 'Cash Sales', 'yes', '2021-06-03 14:10:01', '1', 'yes'),
(96, '110', '9965', 'Door (Single)', '300', '3', '900', '0000095', '2021-06-03', 'Cash Sales', 'yes', '2021-06-03 14:10:01', '1', 'yes'),
(97, '110', '2991', 'Plywood (4 mm)', '5', '1', '5', '0000097', '2021-06-03', 'Cash Sales', 'yes', '2021-06-03 14:13:34', '1', 'yes'),
(98, '110', '2991', 'Iron Rod (5.5 mm)', '100', '2', '200', '0000097', '2021-06-03', 'Cash Sales', 'yes', '2021-06-03 14:13:34', '1', 'yes'),
(99, '112231', '5249', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000099', '2021-06-03', 'Credit Sales', 'yes', '2021-06-05 11:00:15', '1', 'yes'),
(100, '112231', '5249', 'Door (Single)', '300', '10', '3000', '0000099', '2021-06-05', 'Credit Sales', 'yes', '2021-06-05 11:00:15', '1', 'yes'),
(101, '112231', '4069', 'Binding Wire (Binding Wire)', '20', '2', '40', '0000101', '2021-06-05', 'Credit Sales', 'yes', '2021-06-05 12:46:37', '1', 'yes'),
(102, '112231', '4069', 'Iron Rod (5.5 mm)', '100', '3', '300', '0000101', '2021-06-05', 'Credit Sales', 'yes', '2021-06-05 12:46:37', '1', 'yes'),
(103, '110', '2177', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000103', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 18:32:36', '1', 'yes'),
(104, '110', '9510', 'Cement (Ghacem)', '40', '3', '120', '0000104', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 18:34:02', '1', 'yes'),
(105, '110', '9510', 'Door (Single)', '300', '1', '300', '0000104', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 18:34:02', '1', 'yes'),
(106, '110', '4703', 'Iron Rod (5.5 mm)', '100', '1', '100', '0000106', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 18:35:30', '1', 'yes'),
(107, '110', '7082', 'Binding Wire (Binding Wire)', '20', '2', '40', '0000107', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 18:40:10', '1', 'yes'),
(108, '110', '7082', 'Door (Single)', '300', '2', '600', '0000107', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 18:40:10', '1', 'yes'),
(109, 'GO1055', '5961', 'Door (Single)', '300', '1', '300', '0000109', '2021-06-06', 'Credit Sales', 'yes', '2021-06-06 18:48:26', '1', 'yes'),
(110, 'GO1055', '6346', 'Iron Rod (5.5 mm)', '100', '1', '100', '0000110', '2021-06-06', 'Credit Sales', 'yes', '2021-06-06 18:51:03', '1', 'yes'),
(111, '110', '2097', 'Binding Wire (Binding Wire)', '20', '10', '200', '0000111', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:13:53', '1', 'yes'),
(112, '110', '2097', 'Cement (Ghacem)', '40', '1', '40', '0000111', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:13:53', '1', 'yes'),
(113, '110', '2097', 'Door (Single)', '300', '1', '300', '0000111', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:13:53', '1', 'yes'),
(114, '110', '3062', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000114', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:16:56', '1', 'yes'),
(115, '110', '3062', 'Cement (Ghacem)', '40', '2', '80', '0000114', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:16:56', '1', 'yes'),
(116, '110', '3062', 'Door (Single)', '300', '1', '300', '0000114', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:16:56', '1', 'yes'),
(117, '110', '6297', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000117', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:19:30', '1', 'yes'),
(118, '110', '6297', 'Door (Single)', '300', '2', '600', '0000117', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:19:30', '1', 'yes'),
(119, '110', '6297', 'Cement (Ghacem)', '40', '10', '400', '0000117', '2021-06-06', 'Cash Sales', 'yes', '2021-06-06 19:19:30', '1', 'yes'),
(120, '112231', '7553', 'Binding Wire (Binding Wire)', '20', '1', '20', '0000120', '2021-06-06', 'Credit Sales', 'no', '2021-06-06 19:22:44', '1', 'yes'),
(121, '112231', '7553', 'Cement (Ghacem)', '40', '2', '80', '0000120', '2021-06-06', 'Credit Sales', 'no', '2021-06-06 19:22:44', '1', 'yes'),
(122, '112231', '7553', 'Door (Single)', '300', '3', '900', '0000120', '2021-06-06', 'Credit Sales', 'no', '2021-06-06 19:22:44', '1', 'yes'),
(123, '112231', '7553', 'Iron Rod (5.5 mm)', '100', '4', '400', '0000120', '2021-06-06', 'Credit Sales', 'no', '2021-06-06 19:22:44', '1', 'yes'),
(124, '112231', '7553', 'Plywood (4 mm)', '5', '5', '25', '0000120', '2021-06-06', 'Credit Sales', 'no', '2021-06-06 19:22:44', '1', 'yes'),
(125, '112231', '7553', 'Plywood (4 mm)', '5', '6', '30', '0000120', '2021-06-06', 'Credit Sales', 'no', '2021-06-06 19:22:44', '1', 'yes'),
(126, '112231', '7553', 'Plywood (12 mm)', '5', '1', '5', '0000120', '2021-06-06', 'Credit Sales', 'no', '2021-06-06 19:22:44', '1', 'yes'),
(127, 'GO1055', '7207', 'Iron Rod (10 mm)', '500', '1', '500', '0000127', '2021-06-06', 'Credit Sales', 'yes', '2021-06-06 19:41:59', '1', 'yes'),
(128, '110', '3936', 'Cement (Type 1)', '40', '39', '1560', '0000128', '2021-06-09', 'Cash Sales', 'yes', '2021-06-09 14:52:40', '1', 'yes'),
(129, '110', '2905', 'Binding Wire (Binding Wire)', '100', '2', '200', '0000129', '2021-06-15', 'Cash Sales', 'yes', '2021-06-15 16:54:05', '1', 'yes'),
(130, '110', '2905', 'Door (Single)', '300', '2', '600', '0000129', '2021-06-15', 'Cash Sales', 'yes', '2021-06-15 16:54:05', '1', 'yes'),
(131, '110', '7458', 'Iron Rod (5.5 mm)', '100', '10', '1000', '0000131', '2021-06-16', 'Cash Sales', 'yes', '2021-06-16 13:50:38', '1', 'yes'),
(132, '112231', '5763', 'Binding Wire (Binding Wire)', '100', '10', '1000', '0000132', '2021-06-19', 'Credit Sales', 'yes', '2021-06-19 05:34:50', '1', 'yes'),
(133, '112231', '5763', 'Cement (Type 1)', '55', '20', '1100', '0000132', '2021-06-19', 'Credit Sales', 'yes', '2021-06-19 05:34:50', '1', 'yes'),
(134, '112231', '5763', 'Door (Single)', '300', '10', '3000', '0000132', '2021-06-19', 'Credit Sales', 'yes', '2021-06-19 05:34:50', '1', 'yes'),
(135, '110', '4324', 'Iron Rod (5.5 mm)', '100', '10', '1000', '0000135', '2021-06-19', 'Cash Sales', 'yes', '2021-06-19 05:54:52', '1', 'yes'),
(136, '112231', '6695', 'Roofing Sheet (Circular)', '100', '3', '300', '0000136', '2021-06-19', 'Credit Sales', 'yes', '2021-06-19 05:55:28', '1', 'yes'),
(137, '112231', '7501', 'Plywood (4 mm)', '5', '10', '50', '0000137', '2021-06-19', 'Credit Sales', 'yes', '2021-06-19 05:57:42', '1', 'yes'),
(138, '112231', '4295', 'Binding Wire (Binding Wire)', '100', '3', '300', '0000138', '2021-06-19', 'Credit Sales', 'yes', '2021-06-19 05:59:27', '1', 'yes'),
(139, '110', '1009', 'Binding Wire (Binding Wire)', '100', '20', '2000', '0000139', '2021-06-19', 'Cash Sales', 'yes', '2021-06-19 06:01:19', '1', 'yes'),
(140, '110', '3905', 'Cement (Type 1)', '55', '80', '4400', '0000140', '2021-06-21', 'Cash Sales', 'yes', '2021-06-21 16:43:16', '1', 'yes'),
(141, '110', '6549', 'Cement (Type 1)', '55', '50', '2750', '0000141', '2021-06-22', 'Cash Sales', 'yes', '2021-06-22 06:56:54', '1', 'yes'),
(142, '110', '9227', 'Cement (Type 1)', '55', '100', '5500', '0000142', '2021-06-22', 'Cash Sales', 'yes', '2021-06-22 09:08:05', '1', 'yes'),
(143, '110', '2468', 'Cement (Type 1)', '55.5', '10', '555', '0000143', '2021-07-06', 'Cash Sales', 'yes', '2021-07-06 20:46:20', '1', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `debtors_list`
--

CREATE TABLE `debtors_list` (
  `id` int(11) NOT NULL,
  `customerID` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL,
  `amount_owing` float NOT NULL,
  `amount_paid` float NOT NULL,
  `balance` double NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debtors_list`
--

INSERT INTO `debtors_list` (`id`, `customerID`, `name`, `mobile`, `location`, `amount_owing`, `amount_paid`, `balance`, `active`) VALUES
(1, '112231', 'Nana Addo', '0334343434', 'Accra', 42690, 23390, 19300, 'yes'),
(9, 'GO1055', 'GODSON OHENEBA', '05487875657', 'Kumasi', 1220, 241, 979, 'yes'),
(10, 'ER7808', 'ERNEST FRIMPONG', '0548898989', 'Asuofua', 360, 50, 310, 'yes'),
(11, 'EN1957', 'ENOCH ADINKRA', '0245454545', 'Kumasi', 60, 55, 5, 'yes'),
(12, 'DO8954', 'DOE BOY', '054546464', 'Amanfrom', 360, 360, 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `debtors_list_history`
--

CREATE TABLE `debtors_list_history` (
  `id` int(11) NOT NULL,
  `customerID` varchar(30) NOT NULL,
  `itemID` varchar(30) NOT NULL,
  `initial_amount` varchar(30) NOT NULL,
  `theDate` varchar(50) NOT NULL,
  `staff` varchar(30) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debtors_list_history`
--

INSERT INTO `debtors_list_history` (`id`, `customerID`, `itemID`, `initial_amount`, `theDate`, `staff`, `date_added`, `active`) VALUES
(1, 'GO1055', '5497', '10', '', '1', '2021-04-22 17:36:57', 'yes'),
(2, 'ER7808', '5497', '50', '', '1', '2021-04-22 17:38:08', 'yes'),
(3, 'EN1957', '3694', '10', '', '1', '2021-04-22 17:41:54', 'yes'),
(4, 'DO8954', '1500', '60', '', '1', '2021-04-22 17:43:40', 'yes'),
(5, 'GO1055', '5300', '10', '', '1', '2021-04-23 10:07:00', 'yes'),
(6, '112231', '8329', '1000', '', '1', '2021-05-07 06:00:21', 'yes'),
(7, '112231', '8329', '1000', '', '1', '2021-05-07 06:01:37', 'yes'),
(8, '112231', '4324', '100', '', '1', '2021-05-30 10:45:16', 'yes'),
(9, '112231', '7702', '50', '', '1', '2021-05-30 10:53:19', 'yes'),
(10, '112231', '4072', '50', '', '1', '2021-05-30 10:54:54', 'yes'),
(11, '112231', '8806', '30', '', '1', '2021-05-30 11:12:43', 'yes'),
(12, '112231', '8193', '100', '', '1', '2021-05-30 11:19:40', 'yes'),
(13, '112231', '7179', '10', '', '1', '2021-05-30 11:26:40', 'yes'),
(14, '112231', '5406', '10', '', '1', '2021-05-30 11:29:16', 'yes'),
(15, '112231', '3283', '10', '', '1', '2021-05-30 11:31:43', 'yes'),
(16, '112231', '5397', '10', '', '1', '2021-05-30 11:33:54', 'yes'),
(17, '112231', '3878', '10', '', '1', '2021-05-30 11:37:02', 'yes'),
(18, '112231', '3496', '10', '', '1', '2021-05-30 11:40:28', 'yes'),
(19, '112231', '3309', '10', '', '1', '2021-05-30 12:26:16', 'yes'),
(20, '112231', '5590', '10', '', '1', '2021-05-30 12:53:16', 'yes'),
(21, '112231', '4463', '0', '', '1', '2021-05-30 12:58:18', 'yes'),
(22, '112231', '4852', '10', '', '1', '2021-05-30 13:07:17', 'yes'),
(23, '112231', '6760', '10', '', '1', '2021-05-30 13:09:20', 'yes'),
(24, '112231', '5497', '10', '', '1', '2021-05-30 13:17:31', 'yes'),
(25, '112231', '4261', '1', '', '1', '2021-05-30 13:18:29', 'yes'),
(26, '112231', '8173', '10', '', '1', '2021-05-30 13:19:55', 'yes'),
(27, '112231', '7228', '0', '', '1', '2021-06-03 13:13:51', 'yes'),
(28, '112231', '9704', '0', '', '1', '2021-06-03 13:19:53', 'yes'),
(29, '112231', '3241', '100', '', '1', '2021-06-03 13:34:39', 'yes'),
(30, '112231', '6776', '80', '', '1', '2021-06-03 13:36:20', 'yes'),
(31, '112231', '7488', '180', '', '1', '2021-06-03 13:37:56', 'yes'),
(32, '112231', '3729', '20', '', '1', '2021-06-03 13:39:02', 'yes'),
(33, '112231', '3729', '20', '', '1', '2021-06-03 13:39:17', 'yes'),
(34, '112231', '3116', '100', '', '1', '2021-06-03 13:41:01', 'yes'),
(35, '112231', '5821', '600', '', '1', '2021-06-03 13:42:40', 'yes'),
(36, '112231', '8930', '60', '', '1', '2021-06-03 13:44:10', 'yes'),
(37, '112231', '7351', '40', '', '1', '2021-06-03 13:46:45', 'yes'),
(38, '112231', '1693', '40', '', '1', '2021-06-03 13:47:52', 'yes'),
(39, '112231', '6131', '280', '2021-06-03', '1', '2021-06-03 14:06:10', 'yes'),
(40, '112231', '5249', '20', '2021-06-05', '1', '2021-06-05 11:00:15', 'yes'),
(41, '112231', '4069', '40', '2021-06-05', '1', '2021-06-05 12:46:37', 'yes'),
(42, 'GO1055', '5961', '10', '2021-06-06', '1', '2021-06-06 18:48:26', 'yes'),
(43, 'GO1055', '6346', '1', '2021-06-06', '1', '2021-06-06 18:51:03', 'yes'),
(44, '112231', '7553', '100', '2021-06-15', '1', '2021-06-06 19:22:44', 'yes'),
(45, 'GO1055', '7207', '0', '2021-06-15', '1', '2021-06-06 19:41:59', 'yes'),
(46, '112231', '5763', '100', '2021-06-19', '1', '2021-06-19 05:34:50', 'yes'),
(47, '112231', '6695', '50', '2021-06-19', '1', '2021-06-19 05:55:28', 'yes'),
(48, '112231', '7501', '0', '2021-06-19', '1', '2021-06-19 05:57:42', 'yes'),
(49, '112231', '4295', '0', '2021-06-19', '1', '2021-06-19 05:59:27', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `get_items_to_cart`
--

CREATE TABLE `get_items_to_cart` (
  `id` int(11) NOT NULL,
  `itemid` varchar(30) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `itemname` varchar(200) NOT NULL,
  `itemprice` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `notbuy` varchar(3) NOT NULL DEFAULT 'no',
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `get_items_to_cart`
--

INSERT INTO `get_items_to_cart` (`id`, `itemid`, `item_code`, `itemname`, `itemprice`, `quantity`, `total`, `notbuy`, `active`) VALUES
(102, '3181', 'BW10001', 'Binding Wire (Binding Wire)', '20', '1', 20, 'no', 'yes'),
(104, '3872', 'D10001', 'Door (Single)', '300', '1', 300, 'no', 'yes'),
(105, '7246', 'C10001', 'Cement (Ghacem)', '40', '3', 120, 'no', 'yes'),
(112, '1708', 'D10001', 'Door (Single)', '300', '1', 300, 'no', 'yes'),
(113, '9268', 'D10001', 'Door (Single)', '300', '1', 300, 'no', 'yes'),
(133, '7962', 'IR10003', 'Iron Rod (10 mm)', '500', '1', 500, 'no', 'yes'),
(135, '6055', 'RS10001', 'Roofing Sheet (Circular)', '100', '1', 100, 'no', 'yes'),
(136, '6055', 'RS10001', 'Roofing Sheet (Circular)', '100', '5', 500, 'no', 'yes'),
(137, '5361', 'BW10001', 'Binding Wire (Binding Wire)', '20', '3', 60, 'no', 'yes'),
(138, '3349', 'BW10001', 'Binding Wire (Binding Wire)', '100', '2', 200, 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `category_id` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `category_id`, `name`, `active`) VALUES
(1, 'BW_0001', 'Binding Wire', 'yes'),
(2, 'C_0002', 'Cement', 'yes'),
(3, 'D_0003', 'Door', 'yes'),
(4, 'IR_0004', 'Iron Rod', 'yes'),
(5, 'N_0005', 'Nail', 'yes'),
(6, 'P_0006', 'Plywood', 'yes'),
(7, 'RS_0007', 'Roofing Sheet', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `item_sub_category`
--

CREATE TABLE `item_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` varchar(11) NOT NULL,
  `sub_category_id` varchar(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_sub_category`
--

INSERT INTO `item_sub_category` (`id`, `category_id`, `sub_category_id`, `sname`, `active`) VALUES
(1, 'BW_0001', 'BW10001', 'Binding Wire', 'yes'),
(2, 'C_0002', 'C10001', 'Type 1', 'yes'),
(3, 'C_0002', 'C10002', 'Type 2', 'yes'),
(4, 'D_0003', 'D10001', 'Single', 'yes'),
(5, 'D_0003', 'D10002', 'Double', 'yes'),
(6, 'D_0003', 'D10003', 'Bathroom', 'yes'),
(7, 'D_0003', 'D10004', 'One and Half', 'yes'),
(8, 'IR_0004', 'IR10001', '5.5 mm', 'yes'),
(9, 'IR_0004', 'IR10002', '7.5 mm', 'yes'),
(10, 'IR_0004', 'IR10003', '10 mm', 'yes'),
(11, 'IR_0004', 'IR10004', '11.5 mm', 'yes'),
(12, 'IR_0004', 'IR10005', '12 mm', 'yes'),
(13, 'IR_0004', 'IR10006', '14 mm', 'yes'),
(14, 'IR_0004', 'IR10007', '16 mm', 'yes'),
(15, 'N_0005', 'N10001', '1 inc', 'yes'),
(16, 'N_0005', 'N10002', '1.5 inc', 'yes'),
(17, 'N_0005', 'N10003', '2 inc', 'yes'),
(18, 'N_0005', 'N10004', '3 inc', 'yes'),
(19, 'N_0005', 'N10005', '4 inc', 'yes'),
(20, 'P_0006', 'P10001', '4 mm', 'yes'),
(21, 'P_0006', 'P10002', '12 mm', 'yes'),
(22, 'P_0006', 'P10003', '18 mm', 'yes'),
(23, 'RS_0007', 'RS10001', 'Circular', 'yes'),
(24, 'RS_0007', 'RS10002', 'Aluzinc (A)', 'yes'),
(25, 'RS_0007', 'RS10003', 'Aluzinc (B)', 'yes'),
(26, 'RS_0007', 'RS10004', 'Roofing Caps', 'yes'),
(27, 'RS_0007', 'RS10005', 'Roofing Nails', 'yes'),
(28, 'RS_0007', 'RS10006', 'Holders', 'yes'),
(29, 'RS_0007', 'RS10007', 'Holes', 'yes'),
(30, 'C_0003', 'C10003', 'Type 3', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pay_debt`
--

CREATE TABLE `pay_debt` (
  `id` int(11) NOT NULL,
  `debt_id` varchar(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `amount_paying` int(11) NOT NULL,
  `dbalance` int(11) NOT NULL,
  `date_paid` varchar(50) NOT NULL,
  `receipt_no` varchar(20) NOT NULL,
  `staff` varchar(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_debt`
--

INSERT INTO `pay_debt` (`id`, `debt_id`, `customer_id`, `amount_paying`, `dbalance`, `date_paid`, `receipt_no`, `staff`, `date_added`, `active`) VALUES
(1, '11', 'EN1957', 10, 40, '26th April, 2021', '0000001', '2', '2021-04-30 16:23:37', 'yes'),
(2, '12', 'DO8954', 100, 200, '26th April, 2021', '0000002', '1', '2021-04-30 16:23:37', 'yes'),
(3, '12', 'DO8954', 10, 190, '26th April, 2021', '0000003', '1', '2021-04-30 16:23:37', 'yes'),
(4, '11', 'EN1957', 10, 30, '26th April, 2021', '0000004', '1', '2021-04-30 16:23:37', 'yes'),
(5, '12', 'DO8954', 90, 100, '2021-04-30', '0000005', '1', '2021-04-30 16:26:37', 'yes'),
(6, '11', 'EN1957', 20, 10, '2021-04-30', '0000006', '1', '2021-04-30 16:46:53', 'yes'),
(7, '9', 'GO1055', 200, 90, '2021-04-30', '0000007', '1', '2021-04-30 17:04:47', 'yes'),
(8, '12', 'DO8954', 50, 50, '2021-05-10', '0000008', '1', '2021-05-10 15:12:43', 'yes'),
(9, '11', 'EN1957', 5, 5, '2021-05-10', '0000009', '1', '2021-05-10 15:32:37', 'yes'),
(10, '1', '112231', 1000, 30429, '2021-06-05', '0000010', '1', '2021-06-05 12:50:32', 'yes'),
(11, '1', '112231', 1000, 30879, '2021-06-06', '0000011', '1', '2021-06-06 19:46:48', 'yes'),
(12, '12', 'DO8954', 30, 20, '2021-06-15', '0000012', '1', '2021-06-15 16:44:57', 'yes'),
(13, '1', '112231', 10000, 20879, '2021-06-16', '0000013', '1', '2021-06-16 13:58:44', 'yes'),
(14, '1', '112231', 1000, 19879, '2021-06-16', '0000014', '1', '2021-06-16 16:19:44', 'yes'),
(15, '1', '112231', 1000, 18879, '2021-06-16', '0000015', '1', '2021-06-16 16:20:26', 'yes'),
(16, '1', '112231', 100, 18779, '2021-06-16', '0000016', '1', '2021-06-16 16:26:30', 'yes'),
(17, '1', '112231', 100, 18679, '2021-06-16', '0000017', '1', '2021-06-16 16:28:13', 'yes'),
(18, '1', '112231', 500, 18179, '2021-06-16', '0000018', '1', '2021-06-16 16:30:00', 'yes'),
(19, '1', '112231', 300, 17879, '2021-06-16', '0000019', '1', '2021-06-16 16:32:41', 'yes'),
(20, '1', '112231', 900, 16979, '2021-06-16', '0000020', '1', '2021-06-16 16:33:34', 'yes'),
(21, '1', '112231', 60, 16919, '2021-06-16', '0000021', '1', '2021-06-16 16:34:01', 'yes'),
(22, '1', '112231', 60, 16859, '2021-06-16', '0000022', '1', '2021-06-16 16:34:36', 'yes'),
(23, '1', '112231', 60, 16799, '2021-06-16', '0000023', '1', '2021-06-16 16:37:43', 'yes'),
(24, '1', '112231', 60, 16739, '2021-06-16', '0000024', '1', '2021-06-16 16:38:47', 'yes'),
(25, '1', '112231', 600, 16139, '2021-06-16', '0000025', '1', '2021-06-16 16:41:06', 'yes'),
(26, '1', '112231', 60, 16079, '2021-06-16', '0000026', '1', '2021-06-16 16:45:40', 'yes'),
(27, '1', '112231', 79, 16000, '2021-06-16', '0000027', '1', '2021-06-16 16:47:15', 'yes'),
(28, '1', '112231', 300, 15700, '2021-06-16', '0000028', '1', '2021-06-16 16:47:53', 'yes'),
(29, '1', '112231', 2000, 18700, '2021-06-19', '0000029', '1', '2021-06-19 05:42:17', 'yes'),
(30, '12', 'DO8954', 20, 0, '2021-06-21', '0000030', '1', '2021-06-21 03:35:02', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pickups`
--

CREATE TABLE `pickups` (
  `id` int(11) NOT NULL,
  `receipt_no` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `done_by` varchar(10) NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pickups`
--

INSERT INTO `pickups` (`id`, `receipt_no`, `status`, `date`, `done_by`, `active`) VALUES
(1, '0000001', 'Keeping', '2021-04-30 13:24:34', '1', 'yes'),
(2, '0000005', 'Keeping', '2021-04-30 13:33:22', '1', 'yes'),
(3, '0000005', 'Pick Up', '2021-04-30 13:47:50', '1', 'yes'),
(4, '0000120', 'Keeping', '2021-06-06 19:48:03', '1', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staffID` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `real_password` varchar(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `sdate_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` varchar(100) NOT NULL,
  `sstatus` varchar(50) NOT NULL,
  `confirm` varchar(3) NOT NULL DEFAULT 'no',
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staffID`, `username`, `password`, `real_password`, `fullname`, `role`, `mobile`, `sdate_added`, `last_login`, `sstatus`, `confirm`, `active`) VALUES
(1, 'AGY4722', 'shopadmin', '202cb962ac59075b964b07152d234b70', '123', 'Agyei Dacosta Kwabena', '1', '0548787810', '2021-04-07 05:47:08', '2021-07-06 20:46:04', 'online', 'yes', 'yes'),
(2, 'NAN5417', 'precise', 'd13f6bb08e4138e4cb5fe099b36bc69b', 'precise', 'Nana Addo', '2', '0548787810', '2021-04-07 05:03:11', '', '', 'yes', 'yes'),
(3, 'AKW9497', 'shop', '202cb962ac59075b964b07152d234b70', '123', 'Akwasi Addo', '2', '0548787870', '2021-04-07 05:17:20', '2021-05-14 18:18:22', 'online', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `stock_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subcategories` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `stock_id`, `category`, `subcategories`, `quantity`, `price`, `active`) VALUES
(1, '2021_04_1115', 'P_0006', 'P10003', '2000', '3', 'yes'),
(2, '2021_04_7525', 'P_0006', 'P10002', '1999', '5', 'yes'),
(3, '2021_04_8912', 'P_0006', 'P10001', '1978', '5', 'yes'),
(4, '2021_04_2826', 'C_0002', 'C10001', '1640', '55.5', 'yes'),
(5, '2021_04_8952', 'N_0005', 'N10001', '2000', '3', 'yes'),
(6, '2021_04_4580', 'D_0003', 'D10001', '1908', '300', 'yes'),
(7, '2021_04_3202', 'BW_0001', 'BW10001', '2087', '100', 'yes'),
(8, '2021_04_8540', 'IR_0004', 'IR10001', '1961', '100', 'yes'),
(9, '2021_04_2312', 'IR_0004', 'IR10002', '2000', '70', 'yes'),
(10, '2021_06_4620', 'IR_0004', 'IR10003', '0', '500', 'yes'),
(11, '2021_06_9841', 'RS_0007', 'RS10001', '997', '100', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `stocks_history`
--

CREATE TABLE `stocks_history` (
  `id` int(11) NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `subcategories_id` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(50) NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks_history`
--

INSERT INTO `stocks_history` (`id`, `category_id`, `subcategories_id`, `quantity`, `price`, `status`, `date_added`, `added_by`, `active`) VALUES
(1, 'C_0002', 'C10001', '60', '40', 'New Stock', '2021-04-16 15:14:36', '1', 'yes'),
(2, 'N_0005', 'N10001', '100', '3', 'New Stock', '2021-04-16 15:39:15', '1', 'yes'),
(3, 'N_0005', 'N10001', '100', '3', 'Top Up Stock', '2021-04-16 15:40:44', '1', 'yes'),
(4, 'N_0005', 'N10001', '100', '3', 'Top Up Stock', '2021-04-16 15:48:42', '1', 'yes'),
(5, 'D_0003', 'D10001', '20', '300', 'New Stock', '2021-04-16 15:49:04', '1', 'yes'),
(6, 'D_0003', 'D10001', '80', '300', 'Top Up Stock', '2021-04-16 15:49:23', '1', 'yes'),
(7, 'BW_0001', 'BW10001', '20', '3', 'New Stock', '2021-04-16 16:00:50', '1', 'yes'),
(8, 'BW_0001', 'BW10001', '1', '', 'Top Up Stock', '2021-04-16 16:45:31', '2', 'yes'),
(9, 'IR_0004', 'IR10001', '200', '100', 'New Stock', '2021-04-26 05:37:15', '1', 'yes'),
(10, 'IR_0004', 'IR10002', '300', '70', 'New Stock', '2021-04-26 05:37:32', '1', 'yes'),
(11, 'IR_0004', 'IR10003', '1', '500', 'New Stock', '2021-06-06 19:37:15', '1', 'yes'),
(12, 'RS_0007', 'RS10001', '1000', '100', 'New Stock', '2021-06-06 19:45:09', '1', 'yes'),
(13, 'BW_0001', 'BW10001', '200', '100', 'Top Up Stock', '2021-06-08 20:56:11', '1', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backuptb`
--
ALTER TABLE `backuptb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_sales`
--
ALTER TABLE `daily_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtors_list`
--
ALTER TABLE `debtors_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtors_list_history`
--
ALTER TABLE `debtors_list_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_items_to_cart`
--
ALTER TABLE `get_items_to_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_sub_category`
--
ALTER TABLE `item_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_debt`
--
ALTER TABLE `pay_debt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickups`
--
ALTER TABLE `pickups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks_history`
--
ALTER TABLE `stocks_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backuptb`
--
ALTER TABLE `backuptb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_sales`
--
ALTER TABLE `daily_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `debtors_list`
--
ALTER TABLE `debtors_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `debtors_list_history`
--
ALTER TABLE `debtors_list_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `get_items_to_cart`
--
ALTER TABLE `get_items_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_sub_category`
--
ALTER TABLE `item_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pay_debt`
--
ALTER TABLE `pay_debt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pickups`
--
ALTER TABLE `pickups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stocks_history`
--
ALTER TABLE `stocks_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
