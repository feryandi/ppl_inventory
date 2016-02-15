-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 11:42 AM
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
-- Table structure for table `peminjam`
--

CREATE TABLE IF NOT EXISTS `peminjam` (
`id` int(10) unsigned NOT NULL,
  `nim/nip` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pekerjaan` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=236 ;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id`, `nim/nip`, `nama`, `telepon`, `pekerjaan`) VALUES
(1, '13513042', 'Feryandi Nurdiantoro', '', ''),
(2, '13513004', 'Afrizal Fikri', '', ''),
(3, '13513006', 'Rahman Adianto', '', ''),
(4, '13513008', 'Muhammad Ridwan', '', ''),
(5, '13513010', 'Zulva Fachrina', '', ''),
(6, '13513012', 'Muhammad Azam Iszuhri', '', ''),
(7, '13513016', 'Raka Nurul Fikri', '', ''),
(8, '13513018', 'Steven Andianto', '', ''),
(9, '13513020', 'Ahmad Aidin', '', ''),
(10, '13513022', 'Husni Munaya', '', ''),
(11, '13513024', 'Luqman Arifin Siswanto', '', ''),
(12, '13513026', 'William Sentosa', '', ''),
(13, '13513028', 'Heri Fauzan', '', ''),
(14, '13513030', 'Yoga Adrian Saputra', '', ''),
(15, '13513032', 'Angela Lynn', '', ''),
(16, '13513034', 'Satria Priambada', '', ''),
(17, '13513036', 'Kevin Yauris', '', ''),
(18, '13513038', 'Tjan Marco Orlando', '', ''),
(19, '13513040', 'Edwin Wijaya', '', ''),
(20, '13513044', 'Cliff Jonathan', '', ''),
(21, '13513046', 'Bayu Rasyadi Putrautama', '', ''),
(22, '13513048', 'Ben Lemuel Tanasale', '', ''),
(23, '13513050', 'Fikri Aulia', '', ''),
(24, '13513052', 'Levanji Prahyudy', '', ''),
(25, '13513054', 'Chairuni Aulia Nusapati', '', ''),
(26, '13513056', 'Octavianus Marcel Harjono', '', ''),
(27, '13513058', 'Adin Baskoro Pratomo', '', ''),
(28, '13513062', 'Muhammad Fauzan Naufan', '', ''),
(29, '13513064', 'Raihannur Reztaputra', '', ''),
(30, '13513066', 'Dininta Annisa', '', ''),
(31, '13513068', 'Muhtar Hartopo', '', ''),
(32, '13513070', 'Natan', '', ''),
(33, '13513072', 'Nitho Alif Ibadurrahman', '', ''),
(34, '13513074', 'Ryan Yonata', '', ''),
(35, '13513076', 'Lie Albert Tri Adrian', '', ''),
(36, '13513078', 'Gazandi Cahyadarma', '', ''),
(37, '13513080', 'Luminto', '', ''),
(38, '13513082', 'Elvan Owen', '', ''),
(40, '13513086', 'Jessica Andjani', '', ''),
(41, '13513088', 'Devina Ekawati', '', ''),
(42, '13513090', 'Ibrohim Kholilul Islam', '', ''),
(43, '13513092', 'Vicko Novianto', '', ''),
(44, '13513094', 'Faisal Prabowo', '', ''),
(45, '13513096', 'Ahmad Darmawan', '', ''),
(46, '13514602', 'Fiqie Ulya S', '', ''),
(49, '13513084', 'Julio Savigny', '', ''),
(50, '13512501', 'Muhammad Nizami', '', ''),
(51, '13513001', 'Pratama Nugraha Damanik', '', ''),
(52, '13513003', 'Jonathan Benedict', '', ''),
(53, '13513005', 'Vincent Theophilus Ciputra', '', ''),
(54, '13513009', 'Muhamad Fikri Alhawarizmi', '', ''),
(55, '13513011', 'Gerry Kastogi', '', ''),
(56, '13513013', 'Juan Anton', '', ''),
(57, '13513015', 'Aufar Gilbran', '', ''),
(58, '13513017', 'Miftahul Mahfuzh', '', ''),
(59, '13513019', 'David', '', ''),
(60, '13513021', 'Erick Chandra', '', ''),
(61, '13513023', 'Alexander Sukono', '', ''),
(62, '13513025', 'Venny Larasati Ayudiani', '', ''),
(63, '13513027', 'Ahmad Rizdaputra', '', ''),
(64, '13513029', 'Wisnu', '', ''),
(65, '13513031', 'Candy Olivia Mawalim', '', ''),
(66, '13513035', 'Vanya Deasy Safrina', '', ''),
(67, '13513037', 'Muhamad Visat Sutarno', '', ''),
(68, '13513039', 'Ivan Andrianto', '', ''),
(69, '13513041', 'Moch Ginanjar Busiri', '', ''),
(70, '13513043', 'Agung Baptiso Sorlawan', '', ''),
(71, '13513047', 'Hans Christian', '', ''),
(72, '13513049', 'Ahmad Naufal Farhan', '', ''),
(73, '13513051', 'Ignatius Alriana Haryadi Moel', '', ''),
(74, '13513055', 'Tifani Warnita', '', ''),
(75, '13513057', 'Vincent Sebastian The', '', ''),
(76, '13513061', 'Lucky Cahyadi Kurniawan', '', ''),
(77, '13513063', 'Muhammad Aodyra Khaidir', '', ''),
(78, '13513067', 'Mochamad Try Yulyanto', '', ''),
(79, '13513069', 'Jessica Handayani', '', ''),
(80, '13513071', 'Wilhelmus Andrian T', '', ''),
(81, '13513073', 'Wiwit Rifa''i', '', ''),
(82, '13513075', 'Bimo Aryo Tyasono', '', ''),
(83, '13513077', 'Calvin Aditya Jonathan', '', ''),
(84, '13513079', 'Asanilta Fahda', '', ''),
(85, '13513081', 'Fauzan Muhammad Rifqy', '', ''),
(86, '13513083', 'Dimpos Arie Ginarta Sitorus', '', ''),
(87, '13513087', 'Randi Chilyon Alfianto', '', ''),
(88, '13513089', 'Pipin Kurnia Wati', '', ''),
(89, '13513091', 'Mahesa Gandakusuma', '', ''),
(90, '13513093', 'Khalil Ambiya', '', ''),
(91, '13513095', 'Fitra Rahmamuliani', '', ''),
(92, '13514601', 'M. Azwar Adli', '', ''),
(93, 'nim/nip', 'nama', 'telepon', 'pekerjaan'),
(94, '18212028', 'Astarina Natyasari', '', ''),
(95, '18213001', 'Fikriansyah Adzaka', '', ''),
(96, '18213002', 'Nurizka Fitrianingrum', '', ''),
(97, '18213003', 'Jenika Sutojo', '', ''),
(98, '18213004', 'Andra Wahyu Purnomo', '', ''),
(99, '18213005', 'Hanifa Qurratuaini', '', ''),
(100, '18213006', 'Mohammad Nurfariza Ilahude', '', ''),
(101, '18213007', 'Monika Tarsisia Nangoi', '', ''),
(102, '18213008', 'Nicholas Posma Nasution', '', ''),
(103, '18213009', 'Harits Adhi Pradhana', '', ''),
(104, '18213011', 'Rana Nugramahesa', '', ''),
(105, '18213012', 'Hidayat', '', ''),
(106, '18213014', 'Adinda Budi Kusuma Putra', '', ''),
(107, '18213016', 'Yuni Citrawati', '', ''),
(108, '18213017', 'Uswatun Hasanah', '', ''),
(109, '18213019', 'Alicia Lizbeth', '', ''),
(110, '18213020', 'Eliezer Christanto', '', ''),
(111, '18213021', 'Eveline Purnomo', '', ''),
(112, '18213022', 'Hana Alaydrus', '', ''),
(113, '18213023', 'Alrido Martha Devano', '', ''),
(114, '18213025', 'Rohcahyo Adi Wicaksono', '', ''),
(115, '18213026', 'Adinda Juwita Ningtyas', '', ''),
(116, '18213028', 'Airen Rizky Fauziandini', '', ''),
(117, '18213030', 'Muhammad Irfan', '', ''),
(118, '18213031', 'Yusuf Luthfi Ramdhani', '', ''),
(119, '18213032', 'Lenny Putri Yulianti', '', ''),
(120, '18213033', 'Neyssa Nathania', '', ''),
(121, '18213034', 'Muhammad Irfan Permadi', '', ''),
(122, '18213035', 'Ifan Ramadhan Zaki', '', ''),
(123, '18213036', 'Safara Cathasa', '', ''),
(124, '18213038', 'Jessica Nathania', '', ''),
(125, '18213039', 'Dewi Nurbuaty', '', ''),
(126, '18213041', 'Indra Nicolosi Waskita', '', ''),
(127, '18213042', 'Novita Geraldine Togatorop', '', ''),
(128, '18213043', 'Alfian Wira Nugraha', '', ''),
(129, '18213044', 'Andika Fikrisyah Yasin', '', ''),
(130, '18213045', 'Victorio Khomas', '', ''),
(131, '18213046', 'Hammam Muhammad Irfantoro', '', ''),
(132, '19591018 198811 1 001', 'Achmad Fuad', '', 'Dosen'),
(133, '19730809 200604 1 001', 'Achmad Imam Kistijantoro', '', 'Dosen'),
(134, '19710930 200812 1 002', 'Achmad Munir', '', 'Dosen'),
(135, '19541005 198211 2 001', 'Aciek Ida Wuryandari', '', 'Dosen'),
(136, '19481103 197710 1 001', 'Adang Suwandi Ahmad', '', 'Dosen'),
(137, '19631126 198803 1 002', 'Adi Mulyanto', '', 'Dosen'),
(138, '19611125 199001 1 001', 'Adit Kurniawan', '', 'Dosen'),
(139, '19620912 198811 1 001', 'Afwarman', '', 'Dosen'),
(140, '19690914 199702 1 001', 'Agung Harsoyo', '', 'Dosen'),
(141, '19570822 198703 1 003', 'Agus Purwadi', '', 'Dosen'),
(142, '19650902 199102 1 001', 'Albarda', '', 'Dosen'),
(143, '19710826 199802 1 001', 'Aldo Agusdian', '', 'Dosen'),
(144, '19660705 199603 1 002', 'Andriyan Bayu Suksmono.', '', 'Dosen'),
(145, '19670510 199203 1 003', 'Arief Syaichu Rohman', '', 'Dosen'),
(146, '19761025 200604 1 001', 'Arif Sasongko .', '', 'Dosen'),
(147, '19620817 199003 1 002', 'Armein Z.R. Langi .', '', 'Dosen'),
(148, '19650414 199102 1 001', 'Arry Akhmad Arman', '', 'Dosen'),
(149, '19720827 199702 1 003', 'Ary Setijadi Prihatmanto', '', 'Dosen'),
(150, '19770127 200801 2 011', 'Ayu Purwarianti', '', 'Dosen'),
(151, '19610406 198703 1 001', 'Bambang Pharmasetiawan .', '', 'Dosen'),
(152, '19621115 198703 1 004', 'Bambang Riyanto Trilaksono', '', 'Dosen'),
(153, '19561206 198403 1 001', 'Basuki Rahmatul Alam', '', 'Dosen'),
(154, '19540716 198011 1 001', 'Benhard Sitohang', '', 'Dosen'),
(155, '19631209 199001 1 001', 'Budiman Dabarsyah', '', 'Dosen'),
(156, '19540118 198103 1 003', 'Carmadi Machbub', '', 'Dosen'),
(157, '19770216 200801 2 017', 'Chairunnisa', '', 'Dosen'),
(158, '19510822 197803 2 001', 'Christine Suryadi', '', 'Dosen'),
(159, '19750614 200801 1 008', 'Deny Hamdani', '', 'Dosen'),
(160, '19750503 200801 1 013', 'Devi Putra', '', 'Dosen'),
(161, '19680809 199102 1 001', 'Dimitri Mahayana', '', 'Dosen'),
(162, '19510710 197710 1 001', 'Djoko Darwanto', '', 'Dosen'),
(163, '19681207 199402 1 001', 'Dwi Hendratmo W. .', '', 'Dosen'),
(164, '19720321 199702 2 002', 'Effrina Yanti Hamid', '', 'Dosen'),
(165, '19670707 200604 1 016', 'Emir Mauludi Husni', '', 'Dosen'),
(166, '19580219 198503 1 004', 'Eniman Yunus Syamsudin', '', 'Dosen'),
(167, '19741218 200801 1 009', 'Eueung Mulyana', '', 'Dosen'),
(168, '19770210 200912 2 001', 'Fazat Nur Azizah', '', 'Dosen'),
(169, '19480629 197412 1 001', 'Gibson Hilman Sianipar', '', 'Dosen'),
(170, '19650924 199501 2 001', 'Gusti Ayu Putri Saptawati', '', 'Dosen'),
(171, '19750809 199903 1 002', 'Hamonangan Situmorang', '', 'Dosen'),
(172, '19570828 198802 1 001', 'Hardi Nusantara', '', 'Dosen'),
(173, '19571123 198403 2 001', 'Harlili S.', '', 'Dosen'),
(174, '19590728 198503 1 001', 'Harry Santoso', '', 'Dosen'),
(175, '19600705 198702 1 002', 'Hendrawan', '', 'Dosen'),
(176, '19710326 199803 2 001', 'Henny Yusnita Zubir', '', 'Dosen'),
(177, '19610705 198703 1 001', 'Hilwadi Hindersah', '', 'Dosen'),
(178, '19520109 198503 2 001', 'Hira Laksmiwati Soemitro', '', 'Dosen'),
(179, '19471024 197802 1 001', 'Husni Setiawan Sastramihardja.', '', 'Dosen'),
(180, '19681106 199403 1 003', 'Ian Joseph Matheus Edward', '', 'Dosen'),
(181, '19520613 197903 1 004', 'Iping Supriana Suwardi', '', 'Dosen'),
(182, '19660129 199103 1 002', 'Irman Idris', '', 'Dosen'),
(183, '19710227 199702 1 002', 'Iskandar', '', 'Dosen'),
(184, '19580913 198403 1 002', 'Isnuwardianto', '', 'Dosen'),
(185, '19531129 197903 1 001', 'Iyas Munawar', '', 'Dosen'),
(186, '19660228 199102 1 001', 'Jaka Sembiring', '', 'Dosen'),
(187, '19711010 199702 1 001', 'Joko Suryana', '', 'Dosen'),
(188, '19630204 198903 1 002', 'Judhi Santoso', '', 'Dosen'),
(189, '19530604 198003 1 004', 'Kastam Astami', '', 'Dosen'),
(190, '19640812 199102 1 001', 'Kridanto Surendro.', '', 'Dosen'),
(191, '19711118 199702 1 001', 'Kusprasapta Mutijarsa', '', 'Dosen'),
(192, '19500102 197603 1 002', 'Kuspriyanto', '', 'Dosen'),
(193, '19530505 198103 1 006', 'M.Sukrisno Mardiyanto', '', 'Dosen'),
(194, '19510707 197803 1 002', 'Mary Handoko Wijoyo', '', 'Dosen'),
(195, '19760429 200812 2 001', 'Masayu Leylia Khodra', '', 'Dosen'),
(196, '19650518 199003 1 002', 'Mervin Tangguar Hutabarat', '', 'Dosen'),
(197, '19631201 199104 1 001', 'Mohammad Ridwan Effendi', '', 'Dosen'),
(198, '19540222 198003 1 003', 'Muhammad Nurdin', '', 'Dosen'),
(199, '19491110 197903 1 009', 'Mukmin Widyanto A.', '', 'Dosen'),
(200, '19521001 197803 1 002', 'Munawar Ahmad ZA.', '', 'Dosen'),
(201, '19590221 198503 1 003', 'Nana Rachmana Syambas', '', 'Dosen'),
(202, '19500530 197404 1 001', 'Ngapuli Irmea Sinisuka', '', 'Dosen'),
(203, '19760309 200801 2 010', 'Nur Ulfa Maulidevi', '', 'Dosen'),
(204, '19460819 197207 1 001', 'Oerip Setiono Iman Slamet', '', 'Dosen'),
(205, '19620408 198703 1 004', 'Pekik Argo Dahono', '', 'Dosen'),
(206, '19720614 199802 1 001', 'Pranoto H. Rusmin', '', 'Dosen'),
(207, '19680304 199603 1 001', 'Redy Mardiana', '', 'Dosen'),
(208, '19500930 197903 1 001', 'Reynaldo Zoro', '', 'Dosen'),
(209, '19680803 199302 1 001', 'Rila Mandala', '', 'Dosen'),
(210, '19700609 199512 1 002', 'Riza Satria Perdana', '', 'Dosen'),
(211, '19740509 199803 1 002', 'Saiful Akbar', '', 'Dosen'),
(212, '19591014 198503 1 003', 'Sarwono Sutikno', '', 'Dosen'),
(213, '19590513 198403 1 002', 'Sigit Haryadi', '', 'Dosen'),
(214, '19500309 197603 1 004', 'Soehartono Tjondronegoro', '', 'Dosen'),
(215, '19490602 197603 1 002', 'Sugihartono', '', 'Dosen'),
(216, '19631211 199001 1 002', 'Suhardi', '', 'Dosen'),
(217, '19621203 198811 1 001', 'Suhono Harso Supangkat', '', 'Dosen'),
(218, '19651110 199001 1 001', 'Suwarno', '', 'Dosen'),
(219, '19620829 199001 1 001', 'Syarif Hidayat', '', 'Dosen'),
(220, '19531004 197802 2 001', 'Tati Latifah R. Mengko', '', 'Dosen'),
(221, '19751214 200812 1 001', 'Tri Desmana Rachmildha', '', 'Dosen'),
(222, '19710907 199702 2 001', 'Tricya Esterina Widagdo', '', 'Dosen'),
(223, '19700824 199702 1 001', 'Trio Adiono', '', 'Dosen'),
(224, '19690212 199702 1 001', 'Tutun Juhana', '', 'Dosen'),
(225, '19750908 200801 1 006', 'Umar Khayam', '', 'Dosen'),
(226, '19720403 199803 1 003', 'Waskita', '', 'Dosen'),
(227, '19740927 200912 1 001', 'Widyawardhana Adiprawita', '', 'Dosen'),
(228, '19640430 198903 1 005', 'Windy Gambetta', '', 'Dosen'),
(229, '19770112 200912 1 001', 'Yoanes Bandung', '', 'Dosen'),
(230, '19700107 199702 2 001', 'Yani Widyani', '', 'Dosen'),
(231, '19520101 197802 1 004', 'Yanuarsyah Haroen', '', 'Dosen'),
(232, '19530818 197810 1 001', 'Yoga Priyana', '', 'Dosen'),
(233, '19660604 199001 1 001', 'Yudi Satria Gondokaryono', '', 'Dosen'),
(234, '19711129 199702 1 001', 'Yusep Rosmansyah', '', 'Dosen'),
(235, '19511121 197803 1 001', 'Yusra Sabri SD.', '', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=236;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
