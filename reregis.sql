-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 04:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reregis`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `berkas_id` varchar(50) NOT NULL,
  `nama_berkas` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`berkas_id`, `nama_berkas`, `created_at`, `updated_at`, `is_active`) VALUES
('437a53a4-0a76-11ea-83ab-d8cb8a1ebdc6', 'Ijazah SMA', '2019-11-19 09:42:44', '2019-11-19 09:42:44', 1),
('46a0641b-0a76-11ea-83ab-d8cb8a1ebdc6', 'SKHUN SMA', '2019-11-19 09:42:49', '2019-11-19 09:42:49', 1),
('68f5c031-0a6c-11ea-83ab-d8cb8a1ebdc6', 'Kartu Tanda Penduduk', '2019-11-19 08:32:59', '2019-11-19 08:32:59', 1),
('8fb8ef4a-0a6a-11ea-83ab-d8cb8a1ebdc6', 'Foto Terbaru', '2019-11-19 08:32:17', '2019-11-19 08:32:59', 1);

--
-- Triggers `berkas`
--
DELIMITER $$
CREATE TRIGGER `id_berkas` BEFORE INSERT ON `berkas` FOR EACH ROW BEGIN
	SET new.berkas_id = UUID();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(50) NOT NULL,
  `student_no_daftar` varchar(10) NOT NULL,
  `student_password` varchar(60) NOT NULL,
  `student_nama` varchar(30) NOT NULL,
  `student_tmpt_lhr` varchar(20) NOT NULL,
  `student_tgl_lhr` date NOT NULL,
  `student_alamat` text NOT NULL,
  `agama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_no_daftar`, `student_password`, `student_nama`, `student_tmpt_lhr`, `student_tgl_lhr`, `student_alamat`, `agama`, `jenis_kelamin`, `asal_sekolah`, `is_active`) VALUES
('0537f1b1-0a6f-11ea-83ab-d8cb8a1ebdc6', '08011998', '$2y$10$qxZmoK7jtxD/MYpzo.hFbe8FPfB4sdWZU8veshTTbCSu.I3s.bRBS', 'Arina Hasbana', ' Semarang', '1998-01-08', 'Jl. Nglaren Sari no.111 RT 3 RW 24, Condongcatur, Depok, Sleman (Ponpes Salafiyah Al-Muhsin)', 'Islam', 'Perempuan', 'SMA Muhammadiyah 1 Semarang', 1),
('6570bd0a-0a0a-11ea-a357-d8cb8a1ebdc6', '25011998', '$2y$10$bGxDussN0oaBt04m5tS/3.OeMXVk4AWWXAW39IELLQDpjZSqy6aKG', 'Tata Adi Nugroho', 'Bantul', '1998-01-25', 'Kasihan, Tamantirto, Kasihan, Bantul', 'Islam', 'Laki - Laki', 'SMAN 1 Sewon', 1);

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `student_id` BEFORE INSERT ON `student` FOR EACH ROW BEGIN
	SET new.student_id = UUID();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_berkas`
--

CREATE TABLE `student_berkas` (
  `student_berkas_id` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `berkas_id` varchar(50) NOT NULL,
  `url_berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_berkas`
--

INSERT INTO `student_berkas` (`student_berkas_id`, `student_id`, `berkas_id`, `url_berkas`) VALUES
('203a2048-0a74-11ea-83ab-d8cb8a1ebdc6', '6570bd0a-0a0a-11ea-a357-d8cb8a1ebdc6', '8fb8ef4a-0a6a-11ea-83ab-d8cb8a1ebdc6', '6570bd0a-0a0a-11ea-a357-d8cb8a1ebdc6/8fb8ef4a-0a6a-11ea-83ab-d8cb8a1ebdc6.jpg'),
('4f6f88d1-0a7e-11ea-9500-d8cb8a1ebdc6', '0537f1b1-0a6f-11ea-83ab-d8cb8a1ebdc6', '8fb8ef4a-0a6a-11ea-83ab-d8cb8a1ebdc6', '0537f1b1-0a6f-11ea-83ab-d8cb8a1ebdc6/8fb8ef4a-0a6a-11ea-83ab-d8cb8a1ebdc6.jpg'),
('7c5aab91-0a79-11ea-9500-d8cb8a1ebdc6', '6570bd0a-0a0a-11ea-a357-d8cb8a1ebdc6', '437a53a4-0a76-11ea-83ab-d8cb8a1ebdc6', '6570bd0a-0a0a-11ea-a357-d8cb8a1ebdc6/437a53a4-0a76-11ea-83ab-d8cb8a1ebdc6.jpg'),
('e032ce2a-0a74-11ea-83ab-d8cb8a1ebdc6', '6570bd0a-0a0a-11ea-a357-d8cb8a1ebdc6', '68f5c031-0a6c-11ea-83ab-d8cb8a1ebdc6', '6570bd0a-0a0a-11ea-a357-d8cb8a1ebdc6/68f5c031-0a6c-11ea-83ab-d8cb8a1ebdc6.jpg');

--
-- Triggers `student_berkas`
--
DELIMITER $$
CREATE TRIGGER `student_berkas_id` BEFORE INSERT ON `student_berkas` FOR EACH ROW BEGIN
	SET new.student_berkas_id = UUID();
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`berkas_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_berkas`
--
ALTER TABLE `student_berkas`
  ADD PRIMARY KEY (`student_berkas_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
