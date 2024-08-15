-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 09:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_paket`, `nama_paket`) VALUES
('PW001', 'Paket A: Liburan Hemat'),
('PW002', 'Paket B: Sport Holiday'),
('PW003', 'Paket C: Playful Holiday');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `id_paket` varchar(10) DEFAULT NULL,
  `harga` varchar(50) NOT NULL,
  `destinasi` varchar(50) NOT NULL,
  `lama_perjalanan` varchar(50) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `confirmCheckbox` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `id_paket`, `harga`, `destinasi`, `lama_perjalanan`, `tanggal_input`, `deskripsi`, `foto`, `confirmCheckbox`) VALUES
(7, 'PW003', '11170000', 'Northern Light, Norwegia', '4', '2024-06-28 07:22:17', 'Include Guidetour', '66545af89136b.jpg', '1'),
(9, 'PW002', '6250000', 'Seoul, South Korea', '3', '2024-06-28 07:22:30', 'Include Guidetour and Hotel', '66540537105d1.png', '1'),
(11, 'PW001', '4500000', 'Lake Kawaguci, Japan', '2', '2024-06-28 07:22:38', 'Akomodasi Hotel', '665458772f4ac.jpg', '1'),
(12, 'PW002', '7540000', 'Bali, Indonesia', '4', '2024-06-28 07:22:47', 'Akomodasi Hotel dan tiket kapal', '66545c55759c4.jpg', '1'),
(17, 'PW002', '5000080', 'Holywood, USA', '2', '2024-06-28 07:22:57', 'Include Transportasi Lokal', '6662a7be0bd34.jpg', '1'),
(18, 'PW001', '14900000', 'Essaouira, Maroko', '7', '2024-06-28 07:22:05', 'tidak ada', '6678a54c04dfb.jpg', '1'),
(19, 'PW001', '11900000', 'Seoul, South Korea', '3', '2024-06-28 07:21:39', 'yaa', '667e62766fb51.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fullname` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fullname`, `username`, `email`, `password`) VALUES
('imm', 'im', 'mungalimah.th7@gmail', '$2y$10$oY91PcVW9l/zP6sBXYH7JesIKjS4HWIxLwYmXO/S2bZ5fjIfUIdoq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indexjenis` (`id_paket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `jenis_paket` FOREIGN KEY (`id_paket`) REFERENCES `jenis` (`id_paket`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
