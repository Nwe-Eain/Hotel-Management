-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 09:14 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluestar`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `actid` int(10) NOT NULL,
  `actname` varchar(50) DEFAULT NULL,
  `actdesc` text,
  `actimg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`actid`, `actname`, `actdesc`, `actimg`) VALUES
(1, 'GG', '              troll ', '23.jpg'),
(2, 'ww', 'eeee ', '18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admid` int(10) NOT NULL,
  `admn` varchar(50) DEFAULT NULL,
  `admem` varchar(50) DEFAULT NULL,
  `adpsw` varchar(50) DEFAULT NULL,
  `stid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admid`, `admn`, `admem`, `adpsw`, `stid`) VALUES
(1, 'Admin', 'admin@gmail.com', '123', 12);

-- --------------------------------------------------------

--
-- Table structure for table `bookigdetail`
--

CREATE TABLE `bookigdetail` (
  `bdid` int(10) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `nrc` varchar(50) NOT NULL,
  `checkindate` date DEFAULT NULL,
  `checkoutdate` date DEFAULT NULL,
  `checkintime` time DEFAULT NULL,
  `checkouttime` time DEFAULT NULL,
  `bcid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookigdetail`
--

INSERT INTO `bookigdetail` (`bdid`, `custname`, `nrc`, `checkindate`, `checkoutdate`, `checkintime`, `checkouttime`, `bcid`) VALUES
(1, 'Angel', '1/yanana(N)930233', '2020-05-16', '2020-05-18', '10:02:00', '12:01:00', 4),
(2, 'Array', '4/Yakana(N)31532', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 5),
(3, 'Lucas', '1/lana(n)93232', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(10) NOT NULL,
  `custId` int(11) DEFAULT NULL,
  `lengthofstay` int(100) DEFAULT NULL,
  `extrabed` int(5) DEFAULT NULL,
  `nop` int(11) NOT NULL,
  `arrivaldate` date DEFAULT NULL,
  `bprice` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `custId`, `lengthofstay`, `extrabed`, `nop`, `arrivaldate`, `bprice`) VALUES
(4, 1, 2, 1, 4, '2020-05-16', 20100),
(5, 2, 4, 0, 2, '2020-05-14', 40000),
(6, 3, 3, 0, 3, '2020-05-16', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `bookingcabin`
--

CREATE TABLE `bookingcabin` (
  `bcid` int(10) NOT NULL,
  `bid` int(10) DEFAULT NULL,
  `cid` int(11) NOT NULL,
  `bookingdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingcabin`
--

INSERT INTO `bookingcabin` (`bcid`, `bid`, `cid`, `bookingdate`) VALUES
(4, 4, 12, '2020-05-03'),
(5, 5, 12, '2020-05-04'),
(6, 6, 12, '2020-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `cabin`
--

CREATE TABLE `cabin` (
  `cid` int(10) NOT NULL,
  `cprice` int(10) DEFAULT NULL,
  `cimg` varchar(50) DEFAULT NULL,
  `cno` int(100) DEFAULT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `ctid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabin`
--

INSERT INTO `cabin` (`cid`, `cprice`, `cimg`, `cno`, `cname`, `ctid`) VALUES
(10, 120, '18.jpg', 3, 'Flaw', 9),
(12, 10000, 'kk.jpg', 101, 'Oak Cabin2', 7),
(13, 12000, 'oak2.jpg', 202, 'Hollen Cabin1', 7),
(14, 15000, 'yanan.jpg', 100, 'Oak Cabin', 8);

-- --------------------------------------------------------

--
-- Table structure for table `cabinfacilities`
--

CREATE TABLE `cabinfacilities` (
  `cfid` int(10) NOT NULL,
  `cbid` int(10) DEFAULT NULL,
  `facid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabinfacilities`
--

INSERT INTO `cabinfacilities` (`cfid`, `cbid`, `facid`) VALUES
(1, 12, 1),
(2, 12, 2),
(3, 12, 3),
(4, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cabintype`
--

CREATE TABLE `cabintype` (
  `ctid` int(10) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `ctimg` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabintype`
--

INSERT INTO `cabintype` (`ctid`, `type`, `ctimg`) VALUES
(7, 'Hollen1', '11.jpg'),
(8, 'Oak', 'oak.jpg'),
(9, 'Oak2', 'oak2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custId` int(10) NOT NULL,
  `custn` varchar(50) DEFAULT NULL,
  `custemail` varchar(30) DEFAULT NULL,
  `custph` varchar(15) DEFAULT NULL,
  `custpsw` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custId`, `custn`, `custemail`, `custph`, `custpsw`) VALUES
(1, 'Thiha', 'Thiha@gmail.com', '09451199161', '123'),
(2, 'ShineMiAung', 'Shine@gmail.com', '0389023122', NULL),
(3, 'Lucas', 'lucas@gmail.com', '0978688123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eveid` int(10) NOT NULL,
  `evename` varchar(50) DEFAULT NULL,
  `evedesc` text,
  `eveimg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eveid`, `evename`, `evedesc`, `eveimg`) VALUES
(1, 'aaa', '          aaaa    ', '17.jpg'),
(2, 'rrrrr', 'rrrrr', '13.jpg'),
(3, 'aaa', '          aaaa    ', '17.jpg'),
(5, 'gg', '              gg', '1.jpg'),
(6, 'YYY', '        GGG      ', '24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facid` int(10) NOT NULL,
  `desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facid`, `desc`) VALUES
(1, 'BathRoom'),
(2, 'Kitchen'),
(3, 'BedRoom'),
(4, 'Rest Room');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgid` int(10) NOT NULL,
  `imgname` varchar(150) NOT NULL,
  `img` varchar(150) DEFAULT NULL,
  `facid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgid`, `imgname`, `img`, `facid`) VALUES
(1, 'Bath Room1', 'oak-cabin-2-H2u0.jpg', 1),
(2, 'Bath Room 2', 'oak-cabin-2-Mb6o.jpg', 1),
(3, 'Kitchen1', 'oak-cabin-2-FIpk.jpg', 2),
(4, 'Kitchen2', 'oak-cabin-2-uuCa.jpg', 2),
(5, 'Bed Room1', 'oak-cabin-2-6HJx.jpg', 3),
(6, 'Bed Room2', 'oak-cabin-2-5M3g.jpg', 3),
(7, 'Rest Room1', 'oak-cabin-2-eiCa.jpg', 4),
(8, 'Rest Room2', 'oak-cabin-2-9.jpg', 4),
(9, 'test', 'bored.jpg', 5),
(10, 'test', 'custom.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `mpsw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `mname`, `mpsw`) VALUES
(0, 'Angel', '123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pmid` int(10) NOT NULL,
  `pimg` varchar(50) DEFAULT NULL,
  `pmdate` date DEFAULT NULL,
  `pmtime` time DEFAULT NULL,
  `bid` int(10) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pmid`, `pimg`, `pmdate`, `pmtime`, `bid`, `status`) VALUES
(1, 'deed.jpg', '2020-05-04', '06:29:13', 4, 'Confirm'),
(2, 'w2.jpg', '2020-05-14', '08:09:55', 6, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `paymentconfirmation`
--

CREATE TABLE `paymentconfirmation` (
  `pcid` int(10) NOT NULL,
  `confd` date DEFAULT NULL,
  `pmid` int(10) DEFAULT NULL,
  `admid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resortfacilities`
--

CREATE TABLE `resortfacilities` (
  `rsfacid` int(10) NOT NULL,
  `rsname` varchar(50) DEFAULT NULL,
  `rsdesc` text,
  `rsimg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resortfacilities`
--

INSERT INTO `resortfacilities` (`rsfacid`, `rsname`, `rsdesc`, `rsimg`) VALUES
(5, 'ff', 'HFHF    ', '1.jpg'),
(8, 'Thiha', 'Hello   ', '24.jpg'),
(9, 'Thuta', 'Hello   Customer', '23.jpg'),
(10, 'lol', 'Putainamore', '19.jpg'),
(11, 'Dota', 'OK ', '17.jpg'),
(13, 'Play Ground', 'Hope you enjoy!          ', '8.jpg'),
(14, 'Swimming Pool', 'Free for Everyone..', '13.jpg'),
(15, 'bot', 'Insane  ', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wlid` int(10) NOT NULL,
  `cfid` int(10) DEFAULT NULL,
  `mbid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`actid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admid`);

--
-- Indexes for table `bookigdetail`
--
ALTER TABLE `bookigdetail`
  ADD PRIMARY KEY (`bdid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `bookingcabin`
--
ALTER TABLE `bookingcabin`
  ADD PRIMARY KEY (`bcid`);

--
-- Indexes for table `cabin`
--
ALTER TABLE `cabin`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cabinfacilities`
--
ALTER TABLE `cabinfacilities`
  ADD PRIMARY KEY (`cfid`);

--
-- Indexes for table `cabintype`
--
ALTER TABLE `cabintype`
  ADD PRIMARY KEY (`ctid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eveid`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pmid`);

--
-- Indexes for table `paymentconfirmation`
--
ALTER TABLE `paymentconfirmation`
  ADD PRIMARY KEY (`pcid`);

--
-- Indexes for table `resortfacilities`
--
ALTER TABLE `resortfacilities`
  ADD PRIMARY KEY (`rsfacid`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wlid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `actid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookigdetail`
--
ALTER TABLE `bookigdetail`
  MODIFY `bdid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookingcabin`
--
ALTER TABLE `bookingcabin`
  MODIFY `bcid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cabin`
--
ALTER TABLE `cabin`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cabinfacilities`
--
ALTER TABLE `cabinfacilities`
  MODIFY `cfid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cabintype`
--
ALTER TABLE `cabintype`
  MODIFY `ctid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `custId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eveid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pmid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymentconfirmation`
--
ALTER TABLE `paymentconfirmation`
  MODIFY `pcid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resortfacilities`
--
ALTER TABLE `resortfacilities`
  MODIFY `rsfacid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wlid` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
