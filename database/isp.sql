-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 04:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bf_balance`
--

CREATE TABLE `bf_balance` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `expences_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bf_client`
--

CREATE TABLE `bf_client` (
  `id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `blood_group` varchar(45) NOT NULL,
  `national_id` varchar(45) NOT NULL,
  `occupation` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `connection_date` date NOT NULL,
  `package_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_client`
--

INSERT INTO `bf_client` (`id`, `name`, `gender`, `contact`, `email`, `blood_group`, `national_id`, `occupation`, `address`, `ip_address`, `connection_date`, `package_id`, `status`) VALUES
(1, 'rabiul', 'Male', '01723054948', 'sayedme120@gmail.com', 'AB (+ve)', '1984747646744', 'student', '152/2-M Green Road(Panthopath signal),Dhaka', '152/2-M Green Road(Panthopath signal),Dhaka', '2017-04-13', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `bf_designation`
--

CREATE TABLE `bf_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_designation`
--

INSERT INTO `bf_designation` (`id`, `name`, `salary`) VALUES
(1, 'assistant manager', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `bf_employee`
--

CREATE TABLE `bf_employee` (
  `id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `p_address` varchar(45) NOT NULL,
  `per_address` varchar(45) NOT NULL,
  `image` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `join_date` date NOT NULL,
  `designation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_employee`
--

INSERT INTO `bf_employee` (`id`, `name`, `email`, `mobile`, `p_address`, `per_address`, `image`, `gender`, `status`, `join_date`, `designation_id`) VALUES
(1, 'hasan', 'sayedme120@gmail.com', '01723054948', '152/2-M Green Road(Panthopath signal),Dhaka', '152/2-M Green Road(Panthopath signal),Dhaka', 'images/8aa67d103f.jpg', 'Male', 'Active', '2017-04-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bf_expense`
--

CREATE TABLE `bf_expense` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `due_amount` double NOT NULL,
  `exp_date` date NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_expense`
--

INSERT INTO `bf_expense` (`id`, `employee_id`, `source_id`, `amount`, `due_amount`, `exp_date`, `status`) VALUES
(1, 1, 1, 40000, 0, '2017-04-17', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `bf_income`
--

CREATE TABLE `bf_income` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `due_amount` double NOT NULL,
  `income_date` date NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_income`
--

INSERT INTO `bf_income` (`id`, `customer_id`, `source_id`, `amount`, `due_amount`, `income_date`, `status`) VALUES
(1, 1, 1, 500, 0, '2017-04-13', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `bf_month`
--

CREATE TABLE `bf_month` (
  `id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_month`
--

INSERT INTO `bf_month` (`id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'Octobar'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `bf_package`
--

CREATE TABLE `bf_package` (
  `id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `package_speed` varchar(45) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_package`
--

INSERT INTO `bf_package` (`id`, `name`, `package_speed`, `amount`) VALUES
(1, 'Students', '1 Mbps', 500);

-- --------------------------------------------------------

--
-- Table structure for table `bf_role`
--

CREATE TABLE `bf_role` (
  `id` int(10) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_role`
--

INSERT INTO `bf_role` (`id`, `name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Entry Operator'),
(4, 'Editor'),
(5, 'Super User'),
(6, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `bf_source`
--

CREATE TABLE `bf_source` (
  `id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_source`
--

INSERT INTO `bf_source` (`id`, `name`, `create_date`) VALUES
(1, 'Monthly fee', '2017-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `bf_users`
--

CREATE TABLE `bf_users` (
  `id` int(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `image` varchar(45) NOT NULL,
  `office_location` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `role_id` int(10) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bf_users`
--

INSERT INTO `bf_users` (`id`, `username`, `password`, `email`, `mobile`, `address`, `image`, `office_location`, `status`, `gender`, `role_id`, `join_date`) VALUES
(1, 'suadmin', '42f8fa6a60345251252ea93cb1d71f05', 'suadmin@gmail.com', '01723054948', 'Dhaka', 'img/suadmin.jpg', 'Head Office', 'Active', 'Male', 1, '2008-12-05'),
(2, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '01723054945', 'Dhaka', 'img/admin.jpg', 'Head Office', 'Active', 'Male', 2, '2008-11-15'),
(3, 'Entry Operator', '59ecd52e606785a98b5995ef480543d5', 'eoperator@gmail.com', '01723054944', 'Dhaka', 'img/eoperator.png', 'Head Office', 'Active', 'Male', 3, '2009-12-05'),
(4, 'Editor', '5aee9dbd2a188839105073571bee1b1f', 'editor@gmail.com', '01723054148', 'Dhaka', 'img/editor.png', 'Brance Office', 'Active', 'Male', 4, '2010-12-05'),
(5, 'Super User', '1b67232198d01ef5f8d1b92fa9152d13', 'suuser@gmail.com', '01723054348', 'Dhaka', 'img/suuser.jpg', 'Head Office', 'InActive', 'Male', 5, '2011-12-05'),
(6, 'User', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', '01723154942', 'Dhaka', 'img/user.png', 'Head Office', 'InActive', 'Male', 6, '2012-12-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bf_balance`
--
ALTER TABLE `bf_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_client`
--
ALTER TABLE `bf_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_designation`
--
ALTER TABLE `bf_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_employee`
--
ALTER TABLE `bf_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_expense`
--
ALTER TABLE `bf_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_income`
--
ALTER TABLE `bf_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_month`
--
ALTER TABLE `bf_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_package`
--
ALTER TABLE `bf_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_role`
--
ALTER TABLE `bf_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_source`
--
ALTER TABLE `bf_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bf_users`
--
ALTER TABLE `bf_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bf_balance`
--
ALTER TABLE `bf_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bf_client`
--
ALTER TABLE `bf_client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bf_designation`
--
ALTER TABLE `bf_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bf_employee`
--
ALTER TABLE `bf_employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bf_expense`
--
ALTER TABLE `bf_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bf_income`
--
ALTER TABLE `bf_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bf_month`
--
ALTER TABLE `bf_month`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `bf_package`
--
ALTER TABLE `bf_package`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bf_role`
--
ALTER TABLE `bf_role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bf_source`
--
ALTER TABLE `bf_source`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bf_users`
--
ALTER TABLE `bf_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
