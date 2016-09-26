-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2016 at 12:52 PM
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
  `TenChiDoan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chidoan`
--

INSERT INTO `tbl_chidoan` (`MaChiDoan`, `TenChiDoan`) VALUES
(1, 'Chi đoàn 1'),
(2, 'Chi đoàn 2'),
(3, 'Chi đoàn 3'),
(4, 'Chi đoàn 4'),
(5, 'Chi đoàn 5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhsachlopdoansinh`
--

CREATE TABLE `tbl_danhsachlopdoansinh` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(20) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `MaLopCu` varchar(6) DEFAULT NULL,
  `MaDoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_danhsachlopdoansinh`
--

INSERT INTO `tbl_danhsachlopdoansinh` (`ID`, `MaDoanSinh`, `MaLop`, `MaNamHoc`, `MaLopCu`, `MaDoi`) VALUES
(1, '160001', 'Chien161', 1, NULL, 1),
(2, '160002', 'Chien161', 1, NULL, 1),
(3, '160001', 'KT171', 2, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diemhk1`
--

CREATE TABLE `tbl_diemhk1` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(20) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `MiengHKI` float DEFAULT NULL,
  `KT15PhutHKI` float DEFAULT NULL,
  `KT1TietHKI` float DEFAULT NULL,
  `KTHK1` float DEFAULT NULL,
  `TBHK1` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diemhk1`
--

INSERT INTO `tbl_diemhk1` (`ID`, `MaDoanSinh`, `MaLop`, `MaNamHoc`, `MiengHKI`, `KT15PhutHKI`, `KT1TietHKI`, `KTHK1`, `TBHK1`) VALUES
(1, '160001', 'Chien161', 1, 8, 8.5, 9, 9, 9.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diemhk2`
--

CREATE TABLE `tbl_diemhk2` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(20) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `MiengHKII` float DEFAULT NULL,
  `KT15PhutHKII` float DEFAULT NULL,
  `KT1TietHKII` float DEFAULT NULL,
  `KTHK2` float DEFAULT NULL,
  `TBHK2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diemhk2`
--

INSERT INTO `tbl_diemhk2` (`ID`, `MaDoanSinh`, `MaLop`, `MaNamHoc`, `MiengHKII`, `KT15PhutHKII`, `KT1TietHKII`, `KTHK2`, `TBHK2`) VALUES
(1, '160001', 'Chien161', 1, 8, 8, 8, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doansinh`
--

CREATE TABLE `tbl_doansinh` (
  `ID` int(11) NOT NULL,
  `HinhDoanSinh` varchar(200) DEFAULT NULL,
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

--
-- Dumping data for table `tbl_doansinh`
--

INSERT INTO `tbl_doansinh` (`ID`, `HinhDoanSinh`, `MaDoanSinh`, `TenThanh`, `HovaDem`, `Ten`, `NgaySinh`, `GioiTinh`, `NgayRuaToi`, `GXRuaToi`, `NgayRuocLe`, `GXRuocLe`, `NgayThemSuc`, `GXThemSuc`, `TenThanhCha`, `HoTenCha`, `SDTCha`, `TenThanhMe`, `HoTenMe`, `SDTMe`, `DiaChi`, `GhiChu`, `TrangThai`) VALUES
(1, NULL, '160001', 'Giuse', 'Nguyễn Hùng', 'Dũng', '2016-09-01', 1, '2016-09-02', 'Thạch Đà', '2016-09-02', '', '2016-09-20', '', 'Giuse', 'Nguyễn Hùng Bắc', '01229004101', 'Maria', '', '', 'update 6', 123444, 1),
(2, NULL, '160002', 'Maria', 'Nguyễn Thị Hồng', 'Thảo', '2016-09-21', 0, '2016-09-16', 'TD', '2016-09-16', 'TD', '2016-10-01', 'TD', 'Maria', 't', '1111', 'Gioan', 'sdfsdfsdf', 'sdfdsfds', 'sdfsdf', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doi`
--

CREATE TABLE `tbl_doi` (
  `MaDoi` int(11) NOT NULL,
  `TenDoi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doi`
--

INSERT INTO `tbl_doi` (`MaDoi`, `TenDoi`) VALUES
(1, 'Đội 1'),
(2, 'Đội 2'),
(3, 'Đội 3'),
(4, 'Đội 4'),
(5, 'Đội 5');

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
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(150) DEFAULT NULL,
  `GhiChu` varchar(150) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_huynhtruong`
--

INSERT INTO `tbl_huynhtruong` (`ID`, `TenThanh`, `MaHuynhTruong`, `HovaDem`, `Ten`, `NgaySinh`, `NgayBonMang`, `GioiTinh`, `DienThoai`, `Email`, `DiaChi`, `GhiChu`, `TrangThai`, `Username`) VALUES
(1, 'Giuse', '160001', 'Nguyễn Hùng', 'Dũng', '2016-09-01', '2016-09-15', 1, '01229004101', NULL, NULL, NULL, NULL, NULL),
(2, 'Maria', '160002', 'Nguyễn Thị Hồng', 'Thảo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lop`
--

CREATE TABLE `tbl_lop` (
  `ID` int(11) NOT NULL,
  `MaLop` varchar(20) NOT NULL,
  `MaNganh` int(11) NOT NULL,
  `MaPhanDoan` int(11) NOT NULL,
  `MaChiDoan` int(11) NOT NULL,
  `MaNamHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lop`
--

INSERT INTO `tbl_lop` (`ID`, `MaLop`, `MaNganh`, `MaPhanDoan`, `MaChiDoan`, `MaNamHoc`) VALUES
(1, 'Chien161', 1, 1, 1, 1),
(2, 'KT171', 2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_namhoc`
--

CREATE TABLE `tbl_namhoc` (
  `MaNamHoc` int(11) NOT NULL,
  `NamBatDau` int(11) NOT NULL,
  `NamKetThuc` int(11) NOT NULL,
  `GhiChu` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_namhoc`
--

INSERT INTO `tbl_namhoc` (`MaNamHoc`, `NamBatDau`, `NamKetThuc`, `GhiChu`) VALUES
(1, 2015, 2016, 'Năm học 2015 - 2016'),
(2, 2016, 2017, 'Năm học 2016 - 2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nganh`
--

CREATE TABLE `tbl_nganh` (
  `MaNganh` int(11) NOT NULL,
  `TenNganh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nganh`
--

INSERT INTO `tbl_nganh` (`MaNganh`, `TenNganh`) VALUES
(1, 'Chiên Con'),
(2, 'Ấu'),
(3, 'Thiếu'),
(4, 'Nghĩa'),
(5, 'Hiệp Sĩ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phancong`
--

CREATE TABLE `tbl_phancong` (
  `ID` int(11) NOT NULL,
  `MaLop` varchar(20) NOT NULL,
  `MaHuynhTruong` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phancong`
--

INSERT INTO `tbl_phancong` (`ID`, `MaLop`, `MaHuynhTruong`) VALUES
(1, 'Chien161', '160001'),
(2, 'Chien161', '160002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phandoan`
--

CREATE TABLE `tbl_phandoan` (
  `MaPhanDoan` int(11) NOT NULL,
  `TenPhanDoan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phandoan`
--

INSERT INTO `tbl_phandoan` (`MaPhanDoan`, `TenPhanDoan`) VALUES
(1, 'Chiên Con'),
(2, 'Khai Tâm'),
(3, 'Rước lễ 1'),
(4, 'Rước lễ 2'),
(5, 'Thêm sức 1'),
(6, 'Thêm sức 2'),
(7, 'Thêm sức 3'),
(8, 'Bao đồng 1'),
(9, 'Bao đồng 2'),
(10, 'Bao đồng 3'),
(11, 'Bao đồng 4'),
(12, 'Vào đời 1'),
(13, 'Vào đời 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `ID` int(11) NOT NULL,
  `RoleID` int(50) DEFAULT NULL,
  `Permision` varchar(255) DEFAULT NULL,
  `fnThemDoanSinh` tinyint(1) DEFAULT NULL,
  `fnNhapDiem` tinyint(1) DEFAULT NULL,
  `fnNhapCSDL` tinyint(1) DEFAULT NULL,
  `fnTimKiemDS` tinyint(1) DEFAULT NULL,
  `fnTimKiemGLV` tinyint(1) DEFAULT NULL,
  `fnDSXuatSac` tinyint(1) DEFAULT NULL,
  `fnDSGioi` tinyint(1) DEFAULT NULL,
  `fnGiayKhen` tinyint(1) DEFAULT NULL,
  `fnThuBao` tinyint(1) DEFAULT NULL,
  `fnThuMoi` tinyint(1) DEFAULT NULL
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
(5, 'Giacobe'),
(10, 'Martino'),
(11, 'Gioan Baotixita'),
(13, 'Phêrô');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tonghopdiemtb`
--

CREATE TABLE `tbl_tonghopdiemtb` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(6) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `MaHocKy` int(11) DEFAULT NULL,
  `DiemTB` float DEFAULT NULL,
  `HocLuc` varchar(10) DEFAULT NULL,
  `HanhKiem` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tongketcanam`
--

CREATE TABLE `tbl_tongketcanam` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(20) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `TBCN` float DEFAULT NULL,
  `TruocTBCN` float DEFAULT NULL,
  `HLCN` varchar(10) DEFAULT NULL,
  `TruocHLCN` varchar(10) DEFAULT NULL,
  `HKCN` varchar(10) DEFAULT NULL,
  `XepHang` int(11) DEFAULT NULL,
  `XepHangCN` int(11) DEFAULT NULL,
  `CotPhu` int(11) DEFAULT NULL,
  `XetLop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tongketcanam`
--

INSERT INTO `tbl_tongketcanam` (`ID`, `MaDoanSinh`, `MaLop`, `MaNamHoc`, `TBCN`, `TruocTBCN`, `HLCN`, `TruocHLCN`, `HKCN`, `XepHang`, `XepHangCN`, `CotPhu`, `XetLop`) VALUES
(1, '160001', 'Chien161', 1, 8.5, NULL, 'Giỏi', NULL, 'Tốt', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tongkethk1`
--

CREATE TABLE `tbl_tongkethk1` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(6) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `TBHK1` float DEFAULT NULL,
  `HLHK1` varchar(10) DEFAULT NULL,
  `HKHK1` varchar(10) DEFAULT NULL,
  `XepHang` int(11) DEFAULT NULL,
  `XepHangHK1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tongkethk2`
--

CREATE TABLE `tbl_tongkethk2` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(6) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `TBHK2` float DEFAULT NULL,
  `HLHK2` varchar(10) DEFAULT NULL,
  `HKHK2` varchar(10) DEFAULT NULL,
  `XepHang` int(11) DEFAULT NULL,
  `XepHangHK2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trangthai`
--

CREATE TABLE `tbl_trangthai` (
  `ID` int(11) NOT NULL,
  `TrangThai` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_trangthai`
--

INSERT INTO `tbl_trangthai` (`ID`, `TrangThai`) VALUES
(1, 'Đoàn sinh mới'),
(2, 'Đang học'),
(3, 'Nghỉ học'),
(4, 'Chuyễn xứ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
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
-- Indexes for table `tbl_danhsachlopdoansinh`
--
ALTER TABLE `tbl_danhsachlopdoansinh`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_diemhk1`
--
ALTER TABLE `tbl_diemhk1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_diemhk2`
--
ALTER TABLE `tbl_diemhk2`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `tbl_lop`
--
ALTER TABLE `tbl_lop`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_namhoc`
--
ALTER TABLE `tbl_namhoc`
  ADD PRIMARY KEY (`MaNamHoc`);

--
-- Indexes for table `tbl_nganh`
--
ALTER TABLE `tbl_nganh`
  ADD PRIMARY KEY (`MaNganh`);

--
-- Indexes for table `tbl_phancong`
--
ALTER TABLE `tbl_phancong`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `tbl_tonghopdiemtb`
--
ALTER TABLE `tbl_tonghopdiemtb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tongketcanam`
--
ALTER TABLE `tbl_tongketcanam`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tongkethk1`
--
ALTER TABLE `tbl_tongkethk1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tongkethk2`
--
ALTER TABLE `tbl_tongkethk2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `MaChiDoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_danhsachlopdoansinh`
--
ALTER TABLE `tbl_danhsachlopdoansinh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_diemhk1`
--
ALTER TABLE `tbl_diemhk1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_diemhk2`
--
ALTER TABLE `tbl_diemhk2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_doansinh`
--
ALTER TABLE `tbl_doansinh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_doi`
--
ALTER TABLE `tbl_doi`
  MODIFY `MaDoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_huynhtruong`
--
ALTER TABLE `tbl_huynhtruong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_lop`
--
ALTER TABLE `tbl_lop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_namhoc`
--
ALTER TABLE `tbl_namhoc`
  MODIFY `MaNamHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_nganh`
--
ALTER TABLE `tbl_nganh`
  MODIFY `MaNganh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_phancong`
--
ALTER TABLE `tbl_phancong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_phandoan`
--
ALTER TABLE `tbl_phandoan`
  MODIFY `MaPhanDoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tenthanh`
--
ALTER TABLE `tbl_tenthanh`
  MODIFY `MaTenThanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_tonghopdiemtb`
--
ALTER TABLE `tbl_tonghopdiemtb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tongketcanam`
--
ALTER TABLE `tbl_tongketcanam`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_tongkethk1`
--
ALTER TABLE `tbl_tongkethk1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tongkethk2`
--
ALTER TABLE `tbl_tongkethk2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
