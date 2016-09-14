-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2016 at 12:09 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stuinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chidoan`
--

CREATE TABLE `tbl_chidoan` (
  `MaChiDoan` int(11) NOT NULL,
  `TenChiDoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doansinh`
--

CREATE TABLE `tbl_doansinh` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `TenThanh` varchar(50) DEFAULT NULL,
  `HovaDem` varchar(150) DEFAULT NULL,
  `Ten` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `NgayRuaToi` date DEFAULT NULL,
  `GXRuaToi` varchar(100) DEFAULT NULL,
  `NgayRuocLe` date DEFAULT NULL,
  `GXRuocLe` varchar(100) DEFAULT NULL,
  `NgayThemSuc` date DEFAULT NULL,
  `GXThemSuc` varchar(100) DEFAULT NULL,
  `TenThanhCha` varchar(50) DEFAULT NULL,
  `HoTenCha` varchar(150) DEFAULT NULL,
  `SDTCha` varchar(11) DEFAULT NULL,
  `TenThanhMe` varchar(50) DEFAULT NULL,
  `HoTenMe` varchar(150) DEFAULT NULL,
  `SDTMe` varchar(11) DEFAULT NULL,
  `DiaChi` varchar(150) DEFAULT NULL,
  `GhiChu` int(150) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doi`
--

CREATE TABLE `tbl_doi` (
  `MaDoi` int(11) NOT NULL,
  `TenDoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_huynhtruong`
--

CREATE TABLE `tbl_huynhtruong` (
  `ID` int(11) NOT NULL,
  `TenThanh` varchar(50) DEFAULT NULL,
  `MaHuynhTruong` varchar(6) DEFAULT NULL,
  `HovaDem` varchar(150) DEFAULT NULL,
  `Ten` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `NgayBonMang` date DEFAULT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `DienThoai` varchar(11) DEFAULT NULL,
  `DiaChi` varchar(150) DEFAULT NULL,
  `GhiChu` varchar(150) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_namhoc`
--

CREATE TABLE `tbl_namhoc` (
  `ID` int(11) NOT NULL,
  `NamBatDau` int(11) NOT NULL,
  `NameKetThuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nganh`
--

CREATE TABLE `tbl_nganh` (
  `MaNganh` int(11) NOT NULL,
  `TenNganh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phandoan`
--

CREATE TABLE `tbl_phandoan` (
  `MaPhanDoan` int(11) NOT NULL,
  `TenPhanDoan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `ID` int(11) NOT NULL,
  `RoleType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tenthanh`
--

CREATE TABLE `tbl_tenthanh` (
  `MaTenThanh` int(11) NOT NULL,
  `TenThanh` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tenthanh`
--

INSERT INTO `tbl_tenthanh` (`MaTenThanh`, `TenThanh`) VALUES
(1, 'Giuse'),
(2, 'Maria'),
(3, 'Anna'),
(4, 'Gioan'),
(5, 'Giacobe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trangthai`
--

CREATE TABLE `tbl_trangthai` (
  `ID` int(11) NOT NULL,
  `TrangThai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `MaHuynhTruong` varchar(6) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chidoan`
--
ALTER TABLE `tbl_chidoan`
  ADD PRIMARY KEY (`MaChiDoan`);

--
-- Indexes for table `tbl_doansinh`
--
ALTER TABLE `tbl_doansinh`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_doi`
--
ALTER TABLE `tbl_doi`
  ADD PRIMARY KEY (`MaDoi`);

--
-- Indexes for table `tbl_huynhtruong`
--
ALTER TABLE `tbl_huynhtruong`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_namhoc`
--
ALTER TABLE `tbl_namhoc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_nganh`
--
ALTER TABLE `tbl_nganh`
  ADD PRIMARY KEY (`MaNganh`);

--
-- Indexes for table `tbl_phandoan`
--
ALTER TABLE `tbl_phandoan`
  ADD PRIMARY KEY (`MaPhanDoan`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tenthanh`
--
ALTER TABLE `tbl_tenthanh`
  ADD PRIMARY KEY (`MaTenThanh`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chidoan`
--
ALTER TABLE `tbl_chidoan`
  MODIFY `MaChiDoan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_doansinh`
--
ALTER TABLE `tbl_doansinh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_doi`
--
ALTER TABLE `tbl_doi`
  MODIFY `MaDoi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_huynhtruong`
--
ALTER TABLE `tbl_huynhtruong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_namhoc`
--
ALTER TABLE `tbl_namhoc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_nganh`
--
ALTER TABLE `tbl_nganh`
  MODIFY `MaNganh` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_phandoan`
--
ALTER TABLE `tbl_phandoan`
  MODIFY `MaPhanDoan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tenthanh`
--
ALTER TABLE `tbl_tenthanh`
  MODIFY `MaTenThanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
