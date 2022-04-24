-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr, 2022 at 04:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daho`
--

-- --------------------------------------------------------
--
-- Table structure for 'contact form'
--
CREATE TABLE `tblcontact` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL
)
--
-- Table structure for table `kids`
--

CREATE TABLE `kids` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `madein` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`id`, `name`, `code`, `image`, `price`, `madein`) VALUES
(1, 'T-shirt', 'T-shirt', 'kidtshirt.jpg', 80.00, 'Spain'),
(2, 'T-shirt', 'T-shirt', 'spacex.jpg', 50.00, 'USA'),
(3, 'Jacket', 'Jacket', 'jacket.jpg', 150, 'France'),
(4, 'Shoes', 'Shoes', 'kidshoes.jpg' 90, 'Turkey');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `profile`) VALUES
(1, 'admin', 'muhamet@gmail.com', 'admin', '.jpg');

-- --------------------------------------------------------


-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mem_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `firstname`, `lastname`, `username`, `email`, `password`, `profile`, `product`) VALUES
(14, 'Muhamet', 'Hoxha', 'Meti', 'muhamet@gmail.com', 'meti', 'default.jpg', ''),
(16, 'Yllka', 'Dallku', 'Yllka', 'yllka@gmail.com', 'yllka', '1620441477.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

CREATE TABLE `women` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `madein` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`id`, `name`, `code`, `image`, `price`, `madein`) VALUES
(1, 'Bag', 'Hand Bag', '1532613061.png', 400.00, 'USA'),
(2, 'Wallet', 'Wallet', '1532613493.png', 300.00, 'China'),
(3, 'Sweatshirt', 'Sweatshirt', '1532613523.png', 500.00, 'Italy'),
(4, 'Sweatshirt', 'Sweatshirt', '1532613559.png', 450.00, 'Italy'),
(5, 'Eyewear', 'Sunglasses', 'sunglasses.jpg', 80.00, 'France'),
(6, 'Shoes', 'Shoes', 'shoes.jpg', 300.00, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `men`
--

CREATE TABLE `men` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `madein` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `men`
--

INSERT INTO `men` (`id`, `name`, `code`, `image`, `price`, `madein`) VALUES
(18, 'Men`s jacket', 'Jacket', '1532612103.jpg', 200.00, 'South Korea'),
(19, 'Men`s hoodie', 'Hoodie', '1532613837.png', 400.00, 'Japan'),
(20, 'Eyewear', 'Sunglasses', '1532614029.png', 80.00, 'Italy'),
(21, 'Bag', 'Men`s bag', '1532614597.png', 1000.00, 'Colombia'),
(22, 'Men`s shoes', 'Shoes', '1532614680.png', 400.00, 'Taiwan');

-- --------------------------------------------------------

--
-- Table structure for table `userproduct`
--

CREATE TABLE `userproduct` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `madein` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userproduct`
--

INSERT INTO `userproduct` (`id`, `username`, `name`, `code`, `image`, `price`, `madein`) VALUES
(1, 'username', 'sweatshirt', 'tshirt', '1532603828.png', 200.00, 'China');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--

-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `women`
--
ALTER TABLE `women`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `men`
--
ALTER TABLE `men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userproduct`
--
ALTER TABLE `userproduct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `women`
--
ALTER TABLE `women`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `men`
--
ALTER TABLE `men`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `userproduct`
--
ALTER TABLE `userproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
