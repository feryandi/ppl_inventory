-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 12:28 PM
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
-- Table structure for table `penyimpanan`
--

CREATE TABLE IF NOT EXISTS `penyimpanan` (
`id` int(10) unsigned NOT NULL,
  `id_alat` int(10) unsigned NOT NULL,
  `id_lokasi` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=319 ;

--
-- Dumping data for table `penyimpanan`
--

INSERT INTO `penyimpanan` (`id`, `id_alat`, `id_lokasi`) VALUES
(160, 2, 6),
(161, 3, 8),
(162, 4, 13),
(163, 5, 15),
(164, 6, 18),
(165, 7, 13),
(166, 8, 3),
(167, 9, 24),
(168, 10, 10),
(169, 11, 20),
(170, 12, 21),
(171, 13, 19),
(172, 14, 21),
(173, 15, 4),
(174, 16, 19),
(175, 17, 20),
(176, 18, 15),
(177, 19, 20),
(178, 20, 8),
(179, 21, 5),
(180, 22, 17),
(181, 23, 16),
(182, 24, 19),
(183, 25, 8),
(184, 26, 5),
(185, 27, 9),
(186, 28, 19),
(187, 29, 16),
(188, 30, 12),
(189, 31, 15),
(190, 32, 8),
(191, 33, 18),
(192, 34, 14),
(193, 35, 16),
(194, 36, 19),
(195, 37, 7),
(196, 38, 2),
(197, 39, 10),
(198, 40, 9),
(199, 41, 11),
(200, 42, 23),
(201, 43, 10),
(202, 44, 20),
(203, 45, 17),
(204, 46, 5),
(205, 47, 15),
(206, 48, 2),
(207, 49, 18),
(208, 50, 7),
(209, 51, 6),
(210, 52, 21),
(211, 53, 18),
(212, 54, 22),
(213, 55, 14),
(214, 56, 16),
(215, 57, 12),
(216, 58, 15),
(217, 59, 18),
(218, 60, 19),
(219, 61, 16),
(220, 62, 24),
(221, 63, 17),
(222, 64, 23),
(223, 65, 10),
(224, 66, 4),
(225, 67, 7),
(226, 68, 4),
(227, 69, 6),
(228, 70, 12),
(229, 71, 14),
(230, 72, 21),
(231, 73, 24),
(232, 74, 11),
(233, 75, 11),
(234, 76, 23),
(235, 77, 3),
(236, 78, 7),
(237, 79, 9),
(238, 80, 18),
(239, 81, 16),
(240, 82, 2),
(241, 83, 13),
(242, 84, 8),
(243, 85, 20),
(244, 86, 24),
(245, 87, 12),
(246, 88, 18),
(247, 89, 13),
(248, 90, 13),
(249, 91, 6),
(250, 92, 11),
(251, 93, 20),
(252, 94, 23),
(253, 95, 17),
(254, 96, 12),
(255, 97, 2),
(256, 98, 4),
(257, 99, 4),
(258, 100, 17),
(259, 101, 24),
(260, 102, 10),
(261, 103, 22),
(262, 104, 17),
(263, 105, 23),
(264, 106, 17),
(265, 107, 13),
(266, 108, 7),
(267, 109, 8),
(268, 110, 12),
(269, 111, 7),
(270, 112, 6),
(271, 113, 22),
(272, 114, 5),
(273, 115, 24),
(274, 116, 23),
(275, 117, 21),
(276, 118, 24),
(277, 119, 24),
(278, 120, 19),
(279, 121, 18),
(280, 122, 6),
(281, 123, 11),
(282, 124, 12),
(283, 125, 21),
(284, 126, 19),
(285, 127, 5),
(286, 128, 20),
(287, 129, 18),
(288, 130, 7),
(289, 131, 3),
(290, 132, 18),
(291, 133, 4),
(292, 134, 12),
(293, 135, 18),
(294, 136, 16),
(295, 137, 17),
(296, 138, 6),
(297, 139, 19),
(298, 140, 4),
(299, 141, 7),
(300, 142, 14),
(301, 143, 18),
(302, 144, 19),
(303, 145, 11),
(304, 146, 8),
(305, 147, 10),
(306, 148, 6),
(307, 149, 7),
(308, 150, 2),
(309, 151, 10),
(310, 152, 21),
(311, 153, 2),
(312, 154, 20),
(313, 155, 3),
(314, 156, 16),
(315, 157, 2),
(316, 158, 4),
(317, 159, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
 ADD PRIMARY KEY (`id`), ADD KEY `penyimpanan_id_alat_foreign` (`id_alat`), ADD KEY `penyimpanan_id_lokasi_foreign` (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=319;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
ADD CONSTRAINT `penyimpanan_id_alat_foreign` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id`),
ADD CONSTRAINT `penyimpanan_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
