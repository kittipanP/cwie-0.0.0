-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 10:50 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urr_dbv`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `s_id` int(11) NOT NULL,
  `s_fname` varchar(20) NOT NULL,
  `s_lname` varchar(20) NOT NULL,
  `thai_fname` varchar(20) DEFAULT NULL,
  `thai_lname` varchar(20) DEFAULT NULL,
  `s_dob` date DEFAULT NULL,
  `remark` text,
  `origin_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `title_title_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`s_id`, `s_fname`, `s_lname`, `thai_fname`, `thai_lname`, `s_dob`, `remark`, `origin_id`, `type_id`, `status_id`, `ref_id`, `national_id`, `title_title_id`) VALUES
(1, 'KITTIPAN', 'PRASERTSANG', 'กิตติพันธ์', 'ประเสริฐสังข์', NULL, NULL, NULL, NULL, 4, NULL, NULL, 1),
(2, 'SUTTIPONG', 'NAWONG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(3, 'RAFIK', 'RASOON', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(4, 'SUKUMAL', 'BUNPAN', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(5, 'AUMAPHORN', 'SAETEAW', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 2),
(7, 'DANIYAL', 'QURESHI', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(8, 'CHANCHAI', 'CHAICHAN', 'ชาญชัย', 'ชัยชาญ', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(10, 'PATARA', 'KUKUMSAI', 'ภัทร', 'กุคำใส', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(11, 'KOTARO', 'HIROSE', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(12, 'SUPHASUTA', 'JITWISUTH', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(13, 'SARUL', 'SAKULTHONG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(14, 'METHARAK', 'JOKPUTSA', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(15, 'SAMANGI', 'FERNANDO', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 2),
(16, 'FURKAN', 'AÇIKGÖZ', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(17, 'KRISTIAN', 'LLESHAJ', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 2),
(18, 'AAAAA', 'aaaa', 'ฟฟฟฟฟฟ', 'หหหหหห', NULL, 'asdfadgshfjhglhjkERTSERHDRTH', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'AAAA', 'BBBB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'aaaaaaa', 'aaaaaaa', 'aaaaa', 'AAaaa', NULL, 'AAAa', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'AAA', 'AAA', 'AAA', 'AAA', NULL, 'AAAA', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Test_with_Otherclass', 'Test_with_Otherclass', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'with_Otherclass3', 'with_Otherclass3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'test1111111', 'test111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'withTitle2', 'withTitle2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'withTile3', 'withTile3', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(28, 'withDiv', 'withDiv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(29, 'inDiv', 'inDiv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(30, 'testWithStatusw', 'testWithStatus', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(34, 'TestreccordWithAF', 'TestreccordWithAF', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(36, 'test test', 'test test', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(37, 'withoutF', 'withoutF', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(38, 'SpritDiv', 'SpritDiv', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(41, 'TestFeb2', 'TestFeb2', 'TestFeb2', 'TestFeb2', NULL, 'TestFeb2', NULL, NULL, 1, NULL, NULL, 1),
(42, 'TestFeb2-2', 'TestFeb2-2', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(43, 'TestSplitpage', 'TestSplitpage', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(44, 'TestSplitpage', 'TestSplitpage', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(45, 'TestWithCon', 'TestWithCon', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(47, 'testWithEd', 'testWithEd', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(48, 'testWithEdii', 'testWithEdii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(52, 'makesurewithEd', 'makesurewithEd', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(54, 'testConEdbysid', 'testConEdbysid', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(55, 'testConEdByHideSid', 'testConEdByHideSid1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(56, 'testWithDivTag', 'VVVVVVVVVVVVVVVVVV', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(57, 'test', 'conWithIns', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(58, 'test', 'conwithCol', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(59, 'test', 'withUni', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(60, 'test', 'withColl', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(61, 'test11with', 'degree', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(62, 'test12', 'withDegreeii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(63, 'test1111111', 'withDegree&&Major', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(64, 'test13', 'withDegree&&Majorii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(65, 'test14', 'withDegree&&Major&&i', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(66, 'testconall', 'testconall', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(67, 'testConAllii', 'testConAllii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(68, 'testConAlliii', 'testConAlliii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(70, 'testconwithscon', 'testconwithscon', 'testconwithscon', 'testconwithscon', NULL, 'comment...', NULL, NULL, 2, NULL, NULL, 1),
(71, '111111111111111111', '11111111111111111', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(72, 'testconwithcon', 'testconwithcon', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(73, 'testconwithconii', 'testconwithconii', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(74, 'testconwithconiii', 'testconwithconiii', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(75, 'testconwithconiv', 'testconwithconiv', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(76, 'testforcheckall', 'testforcheckall', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(77, 'testforcheckallii', 'testforcheckallii', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1),
(78, 'testAllvv', 'testAllvv', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1),
(79, 'testAllvi', 'testAllvi', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1),
(80, 'testAllvii', 'testAllvii', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1),
(81, 'testEMCwithAc2', 'testEMCwithAc2', NULL, NULL, NULL, 'testEMCwithAc2', NULL, NULL, 3, NULL, NULL, 1),
(82, 'testallwithac1', 'testallwithac1', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1),
(83, 'testallwithac1ii', 'testallwithac1ii', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1),
(84, 'testwithAc1iii', 'testwithAc1iii', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1),
(85, 'testwithAc1iiii', 'testwithAc1iiii', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1),
(86, 'testwithAc1iiiv', 'testwithAc1iiiv', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(87, 'testwithAc1iiiv', 'testwithAc1iiiv', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(88, 'testAllwithA1&card', 'testAllwithA1&card', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(89, 'AAAA', 'BBBB', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(90, 'test ed BG', 'test ed BG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(91, 'test ed BGii', 'test ed BGii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(92, 'test adress', 'test adress', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(93, 'test adressii', 'test adressii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(94, 'testwhencloseacc', 'testwhencloseacc', NULL, NULL, NULL, 'testwhencloseacc', NULL, NULL, 1, NULL, NULL, 1),
(95, 'testwhencloseaccii', 'testwhencloseaccii', NULL, NULL, NULL, 'testwhencloseaccii', NULL, NULL, 1, NULL, NULL, 1),
(96, 'test ad when ch 2 hi', 'test ad when ch 2 hi', NULL, NULL, NULL, 'test ad when ch 2 hid', NULL, NULL, 1, NULL, NULL, 1),
(97, 'test rlt', 'test rlt', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(98, 'test rltii', 'test rltii', 'test rltii', 'test rltii', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(99, 'test rltii', 'test rltii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(100, 'test rltiii', 'test rltiii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(101, 'test rltiv', 'test rltiv', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(102, 'test rltiv', 'test rltiv', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(103, 'test rltv', 'test rltv', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(104, 'test rltvi', 'test rltvi', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(105, 'test rltvii', 'test rltvii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(106, 'aaaaaa', 'aaaaaa', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(107, 'testCalendar', 'testCalendar', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(108, 'testCalendarii', 'testCalendarii', NULL, NULL, NULL, 'testCalendarii', NULL, NULL, 1, NULL, NULL, 1),
(109, 'testCalendariii', 'testCalendariii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(110, 'testconall', 'testconall', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(111, 'testconCA', 'testconCA', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(112, 'testconCA', 'testconCA', 'testconCA', 'testconCA', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(113, 'testconCAii', 'testconCAii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(114, 'testconCAii', 'testconCAii', NULL, NULL, NULL, 'testconCAii', NULL, NULL, 1, NULL, NULL, 1),
(115, 'testconCAv', 'testconCAv', NULL, NULL, NULL, 'testconCAv', NULL, NULL, 1, NULL, NULL, 1),
(116, 'testconCAvi', 'testconCAvi', NULL, NULL, NULL, 'testconCAvi', NULL, NULL, 1, NULL, NULL, 1),
(117, 'testdependonmoveq?', 'testdependonmoveq?', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(118, 'testReccordset', 'testReccordset', NULL, NULL, NULL, 'testReccordset', NULL, NULL, 1, NULL, NULL, 1),
(119, 'testReccordsetii', 'testReccordsetii', NULL, NULL, NULL, 'testReccordsetii', NULL, NULL, 1, NULL, NULL, 1),
(120, 'testReccordsetiii', 'testReccordsetiii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(121, 'testReccordsetiiii', 'testReccordsetiiii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(122, 'changeVtest', 'changeVtest', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(123, 'conapplication_id', 'conapplication_id', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(124, 'testafterchangeV', 'testafterchangeV', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(125, 'aaaaa', 'dddddd', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(126, 'TestSplit', 'TestSplit', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(127, 'testinsertvdo', 'testinsertvdo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(128, 'testinsertvdo', 'testinsertvdo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(129, 'testinsertvdoii', 'testinsertvdoii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(130, 'testinsertvdoiii', 'testinsertvdoiii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(131, 'testvdoii', 'testvdoii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(132, '_stu', '_stu', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(133, '_sctii', '_sctii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(134, 'testEdinStu', 'testEdinStu', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(135, 'testEdinStuiii', 'testEdinStuiii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(136, 'testEdinStuv', 'testEdinStuv', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(137, 'testEdinStuvi', 'testEdinStuvi', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(138, 'hidden', 'hidden', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(139, '$Result1_eb', '$Result1_eb', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(140, '$Result1_ebii', '$Result1_ebii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(141, '$Result1_ebii', '$Result1_ebii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(142, '$Result1_ebii', '$Result1_ebii', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(143, 'vvvvddo', 'vvvvddo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(144, 'WTFvdo', 'WTFvdo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(145, 'WTFvdo', 'WTFvdo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(146, 'vdoaaaa', 'vdoaaaa', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(147, 'add''', 'add''', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(148, '<?php function dwUpl', '<?php function dwUpl', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(149, 'dddddddddd', 'dddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(150, 'EEDD', 'EEDD', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(151, 'EEDD', 'EEDD', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(152, 'EEDD', 'EEDD', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1),
(153, 'confirmEdokvdo', 'confirmEdokvdo', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1),
(154, 'dwUploadv', 'dwUploadv', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1),
(155, 'dwUploadv', 'dwUploadv', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1),
(156, 'plzzzz', 'plzzzz', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 1),
(157, 'StupidityofBon', 'StupidityofBon', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1),
(158, 'StupidityofBon', 'StupidityofBon', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(159, 'StupidityTestofBon', 'StupidityTestofBon', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 1),
(160, 'resume-source', 'resume-source', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 1),
(161, 'saveall', 'saveall', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 1),
(162, 'testaftersplitp', 'testaftersplitp', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 1),
(163, 'aa', 'aa', 'Aa', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(164, 'KORNRAWIT ', 'SRIWATTANAPITIKUL', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(165, 'PAIROT ', 'WONGJAMPA', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(166, 'WITTAYA ', 'PIWPONG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(167, 'PAWARUT ', 'ANGTHONG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(168, 'PHITCHAYA ', 'THONGCHUM', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(169, 'WORAWICH ', 'WERAPATSAKULCHAI', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(170, 'PICHET ', 'MEEPHOSOM', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(171, 'PATTANAPOL ', 'JANTARAMEKIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(172, 'BONGKODCHAKORN ', 'SAENSONG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(173, 'PORNCHANIT ', 'MAKSUK', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(174, 'KITTIAN', 'PRASERTSANG', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1),
(175, 'KK', 'BB', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1),
(176, 'SOMSEE', 'DEEJAI', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1),
(177, 'CHARTHAI', 'HOMGROON', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_status_id_idx` (`status_id`),
  ADD KEY `s_type_id_idx` (`type_id`),
  ADD KEY `s_origin_id_idx` (`origin_id`),
  ADD KEY `s_ref_id_idx` (`ref_id`),
  ADD KEY `fk_student_info_student_national_id1_idx` (`national_id`),
  ADD KEY `fk_student_info_title1_idx` (`title_title_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `fk_student_info_student_national_id1` FOREIGN KEY (`national_id`) REFERENCES `student_national_id` (`national_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkstu_origin_id` FOREIGN KEY (`origin_id`) REFERENCES `student_origin` (`origin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkstu_ref_id` FOREIGN KEY (`ref_id`) REFERENCES `student_reference_info` (`ref_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkstu_status_id` FOREIGN KEY (`status_id`) REFERENCES `student_status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkstu_title` FOREIGN KEY (`title_title_id`) REFERENCES `title` (`title_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkstu_type_id` FOREIGN KEY (`type_id`) REFERENCES `student_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
