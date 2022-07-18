-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2022 at 01:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `email`, `name`, `password`, `status`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'sandunchanaka@gmail.com', 'Ishara', 'Abc@123', 1, '2022-07-16 00:16:50', 1, '2022-07-16 00:16:50', 1),
(2, 'sameerahe2022@gmail.com', 'sameera', 'Abc@123', 1, '2022-07-16 00:16:50', 1, '2022-07-16 00:16:50', 1),
(3, 'jagathwiki736@gmail.com', 'jagath', 'Jagath@2022', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(4, 'mayonudayanga88@gmail.com', 'Mayon', 'Mayon@2022', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(5, 'ishankadinushi@gmail.com', 'Ishanka', 'Ishanka@2022', 1, '2022-07-16 11:39:55', 1, '2022-07-16 11:39:55', 1),
(6, 'kumara123@gmail.com', 'Kumara', 'Kumara@2022', 1, '2022-07-16 11:39:55', 1, '2022-07-16 11:39:55', 1),
(7, 'nilanka@gmail.com', 'Nilanka', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(8, 'sumithatapathtu@gmail.com', 'Sumith', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(9, 'chamith@gmail.com', 'Chamith', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(10, 'nilanthan@gmail.com', 'NIlantha', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(11, 'kumudu@gmail.com', 'Kumudu', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(12, 'nadeekae@gmail.com', 'Nadeeka', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(13, 'danjayaweera@gmail.com', 'dan', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(14, 'spradeep@gmail.com', 'Pradeep', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(15, 'anojonline@gmail.com', 'ANoj', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(16, 'harshaperera@gmail.com', 'Harsha', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(17, 'cawsrathnayaka@gmail.com', 'Rathnayaka', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(18, 'sanjeewam@gmail.com', 'sanjeewa', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(19, 'prabashkarunarathnaa@gmail.com', 'Parabash', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(20, 'shahika@gmail.com', 'shashika', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(21, 'nethum@gmail.com', 'Nethum', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(22, 'ransara@gmail.com', 'Ransara', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(23, 'hirunn@gmail.com', 'hirun', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(24, 'onith@gmail.com', 'onith', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(25, 'jitulaa@gmail.com', 'jitula', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(26, 'warshana@gmail.com', 'Warshana', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(27, 'vishawa@gmail.com', 'Vishawa', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(28, 'yonal@gmail.com', 'Yonal', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(29, 'thasitha@gmail.com', 'Tasith', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(30, 'Mahima@gmail.com', 'Mahima', 'Abc@123', 1, '2022-07-16 10:56:11', 1, '2022-07-16 10:56:11', 1),
(31, 'priyanthaw@yahoo.com', 'Priyantha', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(32, 'wajirashan@gmail.com', 'Wajira', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(33, 'kanishka@yahoo.com', 'Kanishka', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(34, 'mahasen@gmail.com', 'Mahasen', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(35, 'waruna@yahoo.com', 'waruna', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(36, 'ajith@gmail.com', 'Ajith', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(37, 'paboda@yahoo.com', 'Pabodha', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(38, 'gunathilake@gmail.com', 'Gunathilaka', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(39, 'indrajith@yahoo.com', 'indrajith', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(40, 'kelum@gmail.com', 'kelum', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(41, 'suren@yahoo.com', 'Suren', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(42, 'tikshana@gmail.com', 'Thikshana', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(43, 'lalith@yahoo.com', 'Lalith', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(44, 'udayanga@gmail.com', 'Udayanga', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(45, 'lakmal@yahoo.com', 'Lakmal', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(46, 'lakruwansn@gmail.com', 'Lakruwan', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(47, 'gihani@yahoo.com', 'Gihani', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(48, 'andrown@gmail.com', 'ANdrown', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(49, 'peetasan@yahoo.com', 'Peetason', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1),
(50, 'subash@gmail.com', 'subash', 'Abc@123', 1, '2022-07-18 06:36:59', 1, '2022-07-18 06:36:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_assign_roles`
--

CREATE TABLE `tbl_user_assign_roles` (
  `user_assign_role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_assign_role_status` int(11) NOT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_assign_roles`
--

INSERT INTO `tbl_user_assign_roles` (`user_assign_role_id`, `user_id`, `user_role_id`, `user_assign_role_status`, `create_user`, `create_date`, `update_user`, `update_date`) VALUES
(5, 1, 4, 1, 4, '2022-07-17 15:19:43', NULL, NULL),
(6, 1, 2, 1, 4, '2022-07-17 15:19:43', NULL, NULL),
(7, 1, 1, 1, 4, '2022-07-17 15:19:43', NULL, NULL),
(14, 3, 2, 1, 1, '2022-07-17 16:51:55', NULL, NULL),
(18, 4, 3, 1, 1, '2022-07-17 17:38:20', NULL, NULL),
(19, 2, 3, 1, 1, '2022-07-17 17:39:42', NULL, NULL),
(20, 15, 4, 1, 1, '2022-07-18 04:09:09', NULL, NULL),
(21, 15, 2, 1, 1, '2022-07-18 04:09:09', NULL, NULL),
(22, 5, 2, 1, 1, '2022-07-18 04:17:48', NULL, NULL),
(25, 3, 1, 1, 1, '2022-07-18 10:34:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_roles`
--

CREATE TABLE `tbl_user_roles` (
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(100) NOT NULL,
  `user_role_status` int(11) NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_roles`
--

INSERT INTO `tbl_user_roles` (`user_role_id`, `user_role_name`, `user_role_status`, `create_user`, `create_date`, `update_user`, `update_date`) VALUES
(1, 'Admin', 1, 1, '2022-07-16 17:52:36', 1, '2022-07-16 17:52:36'),
(2, 'Manager', 1, 1, '2022-07-16 17:52:36', 1, '2022-07-16 17:52:36'),
(3, 'Accountant', 1, 1, '2022-07-16 17:52:36', 1, '2022-07-16 17:52:36'),
(4, 'Standed User', 1, 1, '2022-07-16 17:52:36', 1, '2022-07-16 17:52:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_assign_roles`
--
ALTER TABLE `tbl_user_assign_roles`
  ADD PRIMARY KEY (`user_assign_role_id`);

--
-- Indexes for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_user_assign_roles`
--
ALTER TABLE `tbl_user_assign_roles`
  MODIFY `user_assign_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
