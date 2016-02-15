-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 12:27 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppl_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE IF NOT EXISTS `alat` (
`id` int(10) unsigned NOT NULL,
  `kode` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=161 ;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id`, `kode`, `nama`, `deskripsi`, `deleted_at`) VALUES
(2, '01.PY.10.2010', 'Proyektor', '', NULL),
(3, '02.PY.11.2010', 'Proyektor', '', NULL),
(4, '03.PY.11.2010', 'Proyektor', '', NULL),
(5, '04.PY.11.2010', 'Proyektor', '', NULL),
(6, '05.PY.01.2012', 'Proyektor', '', NULL),
(7, '06.PY.01.2012', 'Proyektor', '', NULL),
(8, '07.PY.09.2013', 'Proyektor', '', NULL),
(9, '01.KO.10.2012', 'Komputer', '', NULL),
(10, '02.KO.11.2012', 'Komputer', '', NULL),
(11, '03.KO.11.2012', 'Komputer', '', NULL),
(12, '04.KO.11.2012', 'Komputer', '', NULL),
(13, '05.KO.01.2013', 'Komputer', '', NULL),
(14, '06.KO.01.2013', 'Komputer', '', NULL),
(15, '07.KO.09.2013', 'Komputer', '', NULL),
(16, '08.KO.09.2013', 'Komputer', '', NULL),
(17, '01.SP.10.2012', 'Speaker', '', NULL),
(18, '02.SP.11.2012', 'Speaker', '', NULL),
(19, '03.SP.11.2012', 'Speaker', '', NULL),
(20, '04.SP.11.2012', 'Speaker', '', NULL),
(21, '05.SP.01.2013', 'Speaker', '', NULL),
(22, '06.SP.01.2013', 'Speaker', '', NULL),
(23, '07.SP.09.2013', 'Speaker', '', NULL),
(24, '08.SP.09.2013', 'Speaker', '', NULL),
(25, '09.SP.01.2013', 'Speaker', '', NULL),
(26, '10.SP.09.2013', 'Speaker', '', NULL),
(27, '11.SP.09.2013', 'Speaker', '', NULL),
(28, '01.LP.10.2012', 'Laptop', '', NULL),
(29, '02.LP.11.2012', 'Laptop', '', NULL),
(30, '03.LP.11.2012', 'Laptop', '', NULL),
(31, '04.LP.11.2012', 'Laptop', '', NULL),
(32, '05.LP.01.2013', 'Laptop', '', NULL),
(33, '06.LP.01.2013', 'Laptop', '', NULL),
(34, '07.LP.09.2013', 'Laptop', '', NULL),
(35, '08.LP.09.2013', 'Laptop', '', NULL),
(36, '09.LP.01.2013', 'Laptop', '', NULL),
(37, '10.LP.09.2013', 'Laptop', '', NULL),
(38, '11.LP.10.2012', 'Laptop', '', NULL),
(39, '12.LP.11.2012', 'Laptop', '', NULL),
(40, '13.LP.11.2012', 'Laptop', '', NULL),
(41, '14.LP.11.2012', 'Laptop', '', NULL),
(42, '15.LP.01.2015', 'Laptop', '', NULL),
(43, '16.LP.01.2015', 'Laptop', '', NULL),
(44, '17.LP.09.2015', 'Laptop', '', NULL),
(45, '18.LP.09.2015', 'Laptop', '', NULL),
(46, '01.RT.10.2012', 'Router', '', NULL),
(47, '02.RT.11.2013', 'Router', '', NULL),
(48, '03.RT.11.2013', 'Router', '', NULL),
(49, '04.RT.11.2013', 'Router', '', NULL),
(50, '05.RT.01.2014', 'Router', '', NULL),
(51, '06.RT.01.2014', 'Router', '', NULL),
(52, '07.RT.09.2014', 'Router', '', NULL),
(53, '01.KY.10.2012', 'Keyboard', '', NULL),
(54, '02.KY.11.2013', 'Keyboard', '', NULL),
(55, '03.KY.11.2013', 'Keyboard', '', NULL),
(56, '04.KY.11.2013', 'Keyboard', '', NULL),
(57, '05.KY.01.2014', 'Keyboard', '', NULL),
(58, '06.KY.01.2014', 'Keyboard', '', NULL),
(59, '07.KY.09.2014', 'Keyboard', '', NULL),
(60, '08.KY.09.2013', 'Keyboard', '', NULL),
(61, '09.KY.01.2013', 'Keyboard', '', NULL),
(62, '10.KY.09.2013', 'Keyboard', '', NULL),
(63, '01.MO.10.2012', 'Mouse', '', NULL),
(64, '02.MO.11.2013', 'Mouse', '', NULL),
(65, '03.MO.11.2013', 'Mouse', '', NULL),
(66, '04.MO.11.2013', 'Mouse', '', NULL),
(67, '05.MO.01.2014', 'Mouse', '', NULL),
(68, '06.MO.01.2014', 'Mouse', '', NULL),
(69, '07.MO.09.2014', 'Mouse', '', NULL),
(70, '08.MO.09.2013', 'Mouse', '', NULL),
(71, '01.PM.10.2012', 'Portable Microphone', '', NULL),
(72, '02.PM.11.2012', 'Portable Microphone', '', NULL),
(73, '03.PM.11.2012', 'Portable Microphone', '', NULL),
(74, '04.PM.11.2012', 'Portable Microphone', '', NULL),
(75, '05.PM.01.2013', 'Portable Microphone', '', NULL),
(76, '06.PM.01.2013', 'Portable Microphone', '', NULL),
(77, '07.PM.09.2013', 'Portable Microphone', '', NULL),
(78, '08.PM.09.2013', 'Portable Microphone', '', NULL),
(79, '09.PM.01.2013', 'Portable Microphone', '', NULL),
(80, '10.PM.09.2013', 'Portable Microphone', '', NULL),
(81, '11.PM.10.2012', 'Portable Microphone', '', NULL),
(82, '12.PM.11.2012', 'Portable Microphone', '', NULL),
(83, '13.PM.11.2012', 'Portable Microphone', '', NULL),
(84, '14.PM.11.2012', 'Portable Microphone', '', NULL),
(85, '15.PM.01.2015', 'Portable Microphone', '', NULL),
(86, '16.PM.01.2015', 'Portable Microphone', '', NULL),
(87, '17.PM.09.2015', 'Portable Microphone', '', NULL),
(88, '18.PM.09.2015', 'Portable Microphone', '', NULL),
(89, '19.PM.09.2015', 'Portable Microphone', '', NULL),
(90, '01.TR.10.2012', 'Tripod', '', NULL),
(91, '02.TR.11.2013', 'Tripod', '', NULL),
(92, '03.TR.11.2013', 'Tripod', '', NULL),
(93, '04.TR.11.2013', 'Tripod', '', NULL),
(94, '05.TR.01.2014', 'Tripod', '', NULL),
(95, '06.TR.01.2014', 'Tripod', '', NULL),
(96, '01.RK.10.2012', 'Rol Kabel', '', NULL),
(97, '02.RK.11.2012', 'Rol Kabel', '', NULL),
(98, '03.RK.11.2012', 'Rol Kabel', '', NULL),
(99, '04.RK.11.2012', 'Rol Kabel', '', NULL),
(100, '05.RK.01.2013', 'Rol Kabel', '', NULL),
(101, '06.RK.01.2013', 'Rol Kabel', '', NULL),
(102, '07.RK.09.2013', 'Rol Kabel', '', NULL),
(103, '08.RK.09.2013', 'Rol Kabel', '', NULL),
(104, '09.RK.01.2013', 'Rol Kabel', '', NULL),
(105, '10.RK.09.2013', 'Rol Kabel', '', NULL),
(106, '11.RK.10.2012', 'Rol Kabel', '', NULL),
(107, '12.RK.11.2012', 'Rol Kabel', '', NULL),
(108, '13.RK.11.2012', 'Rol Kabel', '', NULL),
(109, '01.KV.10.2012', 'Kabel VGA', '', NULL),
(110, '02.KV.11.2012', 'Kabel VGA', '', NULL),
(111, '03.KV.11.2012', 'Kabel VGA', '', NULL),
(112, '04.KV.11.2012', 'Kabel VGA', '', NULL),
(113, '05.KV.01.2013', 'Kabel VGA', '', NULL),
(114, '06.KV.01.2013', 'Kabel VGA', '', NULL),
(115, '07.KV.09.2013', 'Kabel VGA', '', NULL),
(116, '08.KV.09.2013', 'Kabel VGA', '', NULL),
(117, '09.KV.01.2013', 'Kabel VGA', '', NULL),
(118, '10.KV.09.2013', 'Kabel VGA', '', NULL),
(119, '11.KV.10.2012', 'Kabel VGA', '', NULL),
(120, '12.KV.11.2012', 'Kabel VGA', '', NULL),
(121, '08.PY.10.2015', 'Proyektor', '', NULL),
(122, '09.PY.11.2015', 'Proyektor', '', NULL),
(123, '10.PY.11.2015', 'Proyektor', '', NULL),
(124, '11.PY.11.2015', 'Proyektor', '', NULL),
(125, '12.PY.01.2016', 'Proyektor', '', NULL),
(126, '01.KU.10.2012', 'Kursi', '', NULL),
(127, '02.KU.11.2012', 'Kursi', '', NULL),
(128, '03.KU.11.2012', 'Kursi', '', NULL),
(129, '04.KU.11.2012', 'Kursi', '', NULL),
(130, '05.KU.01.2013', 'Kursi', '', NULL),
(131, '06.KU.01.2013', 'Kursi', '', NULL),
(132, '07.KU.09.2013', 'Kursi', '', NULL),
(133, '08.KU.09.2013', 'Kursi', '', NULL),
(134, '09.KU.01.2013', 'Kursi', '', NULL),
(135, '10.KU.09.2013', 'Kursi', '', NULL),
(136, '11.KU.10.2012', 'Kursi', '', NULL),
(137, '12.KU.11.2012', 'Kursi', '', NULL),
(138, '13.KU.11.2012', 'Kursi', '', NULL),
(139, '14.KU.11.2012', 'Kursi', '', NULL),
(140, '15.KU.01.2015', 'Kursi', '', NULL),
(141, '16.KU.01.2015', 'Kursi', '', NULL),
(142, '17.KU.09.2015', 'Kursi', '', NULL),
(143, '18.KU.09.2015', 'Kursi', '', NULL),
(144, '19.KU.09.2015', 'Kursi', '', NULL),
(145, '20.KU.10.2012', 'Kursi', '', NULL),
(146, '21.KU.10.2012', 'Kursi', '', NULL),
(147, '22.KU.11.2012', 'Kursi', '', NULL),
(148, '23.KU.11.2012', 'Kursi', '', NULL),
(149, '24.KU.11.2012', 'Kursi', '', NULL),
(150, '25.KU.01.2013', 'Kursi', '', NULL),
(151, '26.KU.01.2013', 'Kursi', '', NULL),
(152, '27.KU.09.2013', 'Kursi', '', NULL),
(153, '28.KU.09.2013', 'Kursi', '', NULL),
(154, '29.KU.01.2013', 'Kursi', '', NULL),
(155, '30.KU.09.2013', 'Kursi', '', NULL),
(156, '31.KU.10.2012', 'Kursi', '', NULL),
(157, '32.KU.11.2012', 'Kursi', '', NULL),
(158, '33.KU.11.2012', 'Kursi', '', NULL),
(159, '34.KU.11.2012', 'Kursi', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=161;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
