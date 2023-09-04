-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Sep 04, 2023 at 08:25 AM
-- Server version: 11.0.3-MariaDB-1:11.0.3+maria~ubu2204
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ansid` int(10) NOT NULL,
  `qid` int(10) NOT NULL,
  `ansna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ansid`, `qid`, `ansna`) VALUES
(1, 1, 'Q1Ans1'),
(2, 1, 'Q1Ans2'),
(3, 1, 'Q1Ans3'),
(4, 1, 'Q1Ans4'),
(5, 2, 'Q2Ans1'),
(6, 2, 'Q2Ans2'),
(7, 2, 'Q2Ans3'),
(8, 2, 'Q2Ans4'),
(9, 3, 'Q3Ans1'),
(10, 3, 'Q3Ans2'),
(11, 3, 'Q3Ans3'),
(12, 3, 'Q3Ans4'),
(13, 4, 'Q4Ans1'),
(14, 4, 'Q4Ans2'),
(15, 4, 'Q4Ans3'),
(16, 4, 'Q4Ans4'),
(17, 5, 'Q5Ans1'),
(18, 5, 'Q5Ans2'),
(19, 5, 'Q5Ans3'),
(20, 5, 'Q5Ans4'),
(21, 6, 'Q6Ans1'),
(22, 6, 'Q6Ans2'),
(23, 6, 'Q6Ans3'),
(24, 6, 'Q6Ans4'),
(25, 7, 'Q7Ans1'),
(26, 7, 'Q7Ans2'),
(27, 7, 'Q7Ans3'),
(28, 7, 'Q7Ans4'),
(29, 8, 'Q8Ans1'),
(30, 8, 'Q8Ans2'),
(31, 8, 'Q8Ans3'),
(32, 8, 'Q8Ans4'),
(33, 9, 'Q9Ans1'),
(34, 9, 'Q9Ans2'),
(35, 9, 'Q9Ans3'),
(36, 9, 'Q9Ans4'),
(37, 10, 'Q10Ans1'),
(38, 10, 'Q10Ans2'),
(39, 10, 'Q10Ans3'),
(40, 10, 'Q10Ans4');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examid` int(11) NOT NULL,
  `examref` varchar(50) NOT NULL,
  `examdate` varchar(50) NOT NULL,
  `examstudent` varchar(50) NOT NULL,
  `examstudmail` varchar(50) NOT NULL,
  `examquelist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examid`, `examref`, `examdate`, `examstudent`, `examstudmail`, `examquelist`) VALUES
(1, '230904080321', '23-09-04', 'test', 's', '8,6,4,9,5,1,7,'),
(2, '230904080718', '23-09-04', 'test', 's', '3,9,8,4,2,10,6,'),
(3, '230904081106', '23-09-04', 'test', 's', '5,7,6,1,2,10,4,'),
(4, '230904081551', '23-09-04', 'test', 's', '10,8,7,2,3,5,1,');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `qna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `qna`) VALUES
(1, 'Q1'),
(2, 'Q2'),
(3, 'Q3'),
(4, 'Q4'),
(5, 'Q5'),
(6, 'Q6'),
(7, 'Q7'),
(8, 'Q8'),
(9, 'Q9'),
(10, 'Q10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `una` varchar(20) NOT NULL,
  `upass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `una`, `upass`) VALUES
(1, 'test', 'test'),
(2, 'suga', 'suga'),
(3, 'user', 'user'),
(4, 'laxe', 'laxe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ansid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ansid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
