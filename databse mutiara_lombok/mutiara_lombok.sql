-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 01:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mutiara_lombok`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categori`
--

CREATE TABLE `categori` (
  `id_categori` varchar(10) NOT NULL,
  `nm_categori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categori`
--

INSERT INTO `categori` (`id_categori`, `nm_categori`) VALUES
('1', 'Mutiara Air Laut'),
('2', 'Mutiara Air Tawar');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenisproduk` varchar(10) NOT NULL,
  `nm_jenisproduk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenisproduk`, `nm_jenisproduk`) VALUES
('1', 'Cincin'),
('2', 'Gelang'),
('3', 'Kalung'),
('4', 'Anting'),
('5', 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `id_categori` varchar(10) NOT NULL,
  `id_jenisproduk` varchar(25) NOT NULL,
  `harga` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `poto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_categori`, `id_jenisproduk`, `harga`, `deskripsi`, `poto`) VALUES
(1, '1', '5', 20000, 'sdlkfjsdlf', '-'),
(2, '2', '3', 25000, 'sdlkfjsdlf', '-'),
(3, '1', '1', 25000, 'fsdfsdfadsfasdf', '-'),
(4, '1', '5', 500000, 'jenis mutiara ini di ambil di dasar laut. sangat s', '-'),
(5, '1', '3', 1000000, 'ega mauliat', '-'),
(6, '1', '2', 500000, 'gghhh', '-'),
(7, '1', '2', 900000, 'fdadfhajkfhdjksdhfkjasdhfjkasdf', 'Modif%20tiger%20bms-11.jpg'),
(8, '1', '2', 90000, 'tes', 'Joko.jpg'),
(9, '1', '4', 800000, 'mutiara ini adalah ', 'Gambar Ucapan Ulang Tahun.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Niagahoster Tutorial', 'nhtutorial@gmail.com', '0139a3c5cf42394be982e766c93f5ed0'),
(2, 'husain', 'husain@stmikbumigora.ac.id', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Husain', 'ochy22@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`id_categori`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenisproduk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`,`id_categori`,`id_jenisproduk`),
  ADD KEY `id_jenisproduk` (`id_jenisproduk`),
  ADD KEY `id_categori` (`id_categori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_jenisproduk`) REFERENCES `jenis_produk` (`id_jenisproduk`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_categori`) REFERENCES `categori` (`id_categori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
