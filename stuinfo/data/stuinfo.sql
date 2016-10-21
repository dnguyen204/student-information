-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 12:35 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `MaLop` varchar(20) DEFAULT NULL,
  `MaChiDoan` int(11) NOT NULL,
  `MaDoi` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `MaLopCu` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_danhsachlopdoansinh`
--

INSERT INTO `tbl_danhsachlopdoansinh` (`ID`, `MaLop`, `MaChiDoan`, `MaDoi`, `MaDoanSinh`, `MaNamHoc`, `MaLopCu`) VALUES
(13, 'ChienCon2016', 2, 1, '160001', 2, NULL),
(15, 'ChienCon2016', 2, 2, '160003', 2, NULL),
(18, 'ChienCon2016', 2, 1, '160002', 2, NULL),
(19, 'ChienCon2016', 2, 3, '160004', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diemhk1`
--

CREATE TABLE `tbl_diemhk1` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(20) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `MiengHK1` float DEFAULT NULL,
  `KT15PhutHK1` float DEFAULT NULL,
  `KT1TietHK1` float DEFAULT NULL,
  `KTHK1` float DEFAULT NULL,
  `TBHK1` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_diemhk1`
--

INSERT INTO `tbl_diemhk1` (`ID`, `MaDoanSinh`, `MaLop`, `MaNamHoc`, `MiengHK1`, `KT15PhutHK1`, `KT1TietHK1`, `KTHK1`, `TBHK1`) VALUES
(3, '160001', 'ChienCon2016', 2, 8, 8, 5, 6, 6.3),
(4, '160002', 'ChienCon2016', 2, 6, 5, 5.5, 8, 6.6),
(5, '160003', 'ChienCon2016', 2, 9, 9, 0, 9, 6.4),
(6, '160004', 'ChienCon2016', 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diemhk2`
--

CREATE TABLE `tbl_diemhk2` (
  `ID` int(11) NOT NULL,
  `MaDoanSinh` varchar(6) DEFAULT NULL,
  `MaLop` varchar(20) DEFAULT NULL,
  `MaNamHoc` int(11) DEFAULT NULL,
  `MiengHK2` float DEFAULT NULL,
  `KT15PhutHK2` float DEFAULT NULL,
  `KT1TietHK2` float DEFAULT NULL,
  `KTHK2` float DEFAULT NULL,
  `TBHK2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_diemhk2`
--

INSERT INTO `tbl_diemhk2` (`ID`, `MaDoanSinh`, `MaLop`, `MaNamHoc`, `MiengHK2`, `KT15PhutHK2`, `KT1TietHK2`, `KTHK2`, `TBHK2`) VALUES
(3, '160001', 'ChienCon2016', 2, NULL, NULL, NULL, NULL, NULL),
(4, '160002', 'ChienCon2016', 2, NULL, NULL, NULL, NULL, NULL),
(5, '160003', 'ChienCon2016', 2, NULL, NULL, NULL, NULL, NULL),
(6, '160004', 'ChienCon2016', 2, NULL, NULL, NULL, NULL, NULL);

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
  `GhiChu` varchar(150) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doansinh`
--

INSERT INTO `tbl_doansinh` (`ID`, `HinhDoanSinh`, `MaDoanSinh`, `TenThanh`, `HovaDem`, `Ten`, `NgaySinh`, `GioiTinh`, `NgayRuaToi`, `GXRuaToi`, `NgayRuocLe`, `GXRuocLe`, `NgayThemSuc`, `GXThemSuc`, `TenThanhCha`, `HoTenCha`, `SDTCha`, `TenThanhMe`, `HoTenMe`, `SDTMe`, `DiaChi`, `GhiChu`, `TrangThai`) VALUES
(1, '/stuinfo/upload/images/4x6.png', '160001', 'Giuse', 'Nguyễn Hùng', 'Dũng', '2016-09-01', 1, '2016-09-02', 'Thạch Đà', '2016-09-02', '', '2016-09-20', '', 'Giuse', 'Nguyễn Hùng Bắc', '01229004101', 'Maria', '', '', 'update 6', '123444555', 2),
(2, NULL, '160002', 'Maria', 'Nguyễn Thị Hồng', 'Thảo', '2016-09-21', 1, '2016-09-16', 'TD', '2016-09-16', 'TD', '2016-10-01', 'TD', 'Maria', 't', '1111', 'Gioan', 'sdfsdfsdf', 'sdfdsfds', 'Update', '', 2),
(3, NULL, '160003', 'Giuse', 'Trần Thiện', 'Nhân', '2016-10-01', 1, '1970-01-01', '', '1970-01-01', '', '1970-01-01', '', '', '', '', '', '', '', '', '', 2),
(4, NULL, '160004', 'Gioan Baotixita', 'Lê Trần Thiên', 'Lộc', '2016-10-02', 1, '1970-01-01', '', '1970-01-01', '', '1970-01-01', '', '', '', '', '', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doi`
--

CREATE TABLE `tbl_doi` (
  `MaDoi` int(11) NOT NULL,
  `TenDoi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `HinhHuynhTruong` varchar(200) NOT NULL,
  `TenThanh` varchar(50) DEFAULT NULL,
  `MaHuynhTruong` varchar(6) DEFAULT NULL,
  `HovaDem` varchar(150) DEFAULT NULL,
  `Ten` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `NgayBonMang` varchar(10) DEFAULT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `DienThoai` varchar(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(150) DEFAULT NULL,
  `GhiChu` varchar(150) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL,
  `MaQuyen` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_huynhtruong`
--

INSERT INTO `tbl_huynhtruong` (`ID`, `HinhHuynhTruong`, `TenThanh`, `MaHuynhTruong`, `HovaDem`, `Ten`, `NgaySinh`, `NgayBonMang`, `GioiTinh`, `DienThoai`, `Email`, `DiaChi`, `GhiChu`, `TrangThai`, `MaQuyen`, `Username`) VALUES
(1, '', NULL, NULL, NULL, 'Administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'admin'),
(12, '', 'Gioan', '160002', 'Nguyễn Hùng', 'Dũng', '0000-00-00', '01-05', NULL, '01229004101', 'dung.nh1705@gmail.com', '310/60 Phạm Văn Chiêu, phường 9, Gò Vấp', '', 7, 3, 'dung.nh1705'),
(14, '', 'Maria', '160003', 'Nguyễn Thị Hồng', 'Thảo', '1993-01-19', '', 0, '01227237184', '', '', '', 7, 4, 'thao.nth1901'),
(15, '', 'Gioan Baotixita', '160004', 'Nguyễn Viết', 'Chiến', '2016-07-01', '', 1, '01229004101', '', '', '', 5, 4, 'chien.nv0107');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lop`
--

CREATE TABLE `tbl_lop` (
  `ID` int(11) NOT NULL,
  `MaLop` varchar(20) NOT NULL,
  `MaNganh` int(11) NOT NULL,
  `MaPhanDoan` int(11) NOT NULL,
  `MaNamHoc` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lop`
--

INSERT INTO `tbl_lop` (`ID`, `MaLop`, `MaNganh`, `MaPhanDoan`, `MaNamHoc`, `Username`) VALUES
(25, 'ChienCon2016', 1, 1, 2, 'dung.nh1705');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_namhoc`
--

CREATE TABLE `tbl_namhoc` (
  `MaNamHoc` int(11) NOT NULL,
  `NamBatDau` int(11) NOT NULL,
  `NamKetThuc` int(11) NOT NULL,
  `GhiChu` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `tbl_permision`
--

CREATE TABLE `tbl_permision` (
  `ID` int(11) NOT NULL,
  `MaQuyen` int(50) DEFAULT NULL,
  `Permision` varchar(255) DEFAULT NULL,
  `Message` varchar(255) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permision`
--

INSERT INTO `tbl_permision` (`ID`, `MaQuyen`, `Permision`, `Message`, `fnThemDoanSinh`, `fnNhapDiem`, `fnNhapCSDL`, `fnTimKiemDS`, `fnTimKiemGLV`, `fnDSXuatSac`, `fnDSGioi`, `fnGiayKhen`, `fnThuBao`, `fnThuMoi`) VALUES
(1, 1, 'admin/newStudent', 'admin', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'admin/typeSroce', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 'admin/newDatabase', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 'admin/newClass', '', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 'admin/search?id=đoàn%20sinh', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 4, 'admin/search?id=đoàn%20sinh', 'Huynh Trưởng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 5, 'admin/search?id=đoàn%20sinh', 'Dự trưởng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 'admin/search?id=GLV', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 'admin/newGLV', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 'admin/division', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 'admin/addClassStudent', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 3, 'admin/addClassStudent', 'Phân đoàn trưởng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 3, 'admin/division', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phancong`
--

CREATE TABLE `tbl_phancong` (
  `ID` int(11) NOT NULL,
  `MaLop` varchar(20) NOT NULL,
  `MaNamHoc` int(11) NOT NULL,
  `MaChiDoan` int(11) NOT NULL,
  `MaHuynhTruong` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_phancong`
--

INSERT INTO `tbl_phancong` (`ID`, `MaLop`, `MaNamHoc`, `MaChiDoan`, `MaHuynhTruong`) VALUES
(171, 'ChienCon2016', 2, 2, '160004'),
(172, 'ChienCon2016', 2, 2, '160003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phandoan`
--

CREATE TABLE `tbl_phandoan` (
  `MaPhanDoan` int(11) NOT NULL,
  `TenPhanDoan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`MaQuyen`, `TenQuyen`) VALUES
(1, 'Admin'),
(2, 'Ban Quản Trị'),
(3, 'Phân Đoàn Trưởng'),
(4, 'Huynh Trưởng'),
(5, 'Dự Trưởng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tenthanh`
--

CREATE TABLE `tbl_tenthanh` (
  `MaTenThanh` int(11) NOT NULL,
  `TenThanh` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tenthanh`
--

INSERT INTO `tbl_tenthanh` (`MaTenThanh`, `TenThanh`) VALUES
(1, 'Giuse'),
(2, 'Maria'),
(3, 'Anna'),
(4, 'Gioan'),
(5, 'Giacôbê'),
(10, 'Martinô'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trangthai`
--

CREATE TABLE `tbl_trangthai` (
  `ID` int(11) NOT NULL,
  `TrangThai` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_trangthai`
--

INSERT INTO `tbl_trangthai` (`ID`, `TrangThai`) VALUES
(1, 'Đoàn sinh mới'),
(2, 'Đang học'),
(3, 'Nghỉ học luôn'),
(4, 'Chuyển xứ'),
(5, 'Huynh trưởng mới'),
(6, 'Dự trưởng mới'),
(7, 'Đang dạy'),
(8, 'Nghỉ dạy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `MaQuyen` int(11) NOT NULL,
  `Created` date NOT NULL,
  `LastModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `Username`, `Password`, `MaQuyen`, `Created`, `LastModified`) VALUES
(1, 'admin', '94b669fad0be68cdcab9e62628a68e58', 1, '0000-00-00', '2016-10-11'),
(8, 'dung.nh1705', 'e10adc3949ba59abbe56e057f20f883e', 3, '0000-00-00', '2016-10-21'),
(10, 'thao.nth1901', '507cf8a5ead5cdf0c857e9a4e69d9ce3', 4, '2016-10-07', '2016-10-19'),
(11, 'chien.nv0107', 'a5d76a61e149a6fbd071f82ff76dd6cf', 4, '2016-10-11', '2016-10-13');

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
-- Indexes for table `tbl_permision`
--
ALTER TABLE `tbl_permision`
  ADD PRIMARY KEY (`ID`);

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
  ADD PRIMARY KEY (`MaQuyen`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_diemhk1`
--
ALTER TABLE `tbl_diemhk1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_diemhk2`
--
ALTER TABLE `tbl_diemhk2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_doansinh`
--
ALTER TABLE `tbl_doansinh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_doi`
--
ALTER TABLE `tbl_doi`
  MODIFY `MaDoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_huynhtruong`
--
ALTER TABLE `tbl_huynhtruong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_lop`
--
ALTER TABLE `tbl_lop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
-- AUTO_INCREMENT for table `tbl_permision`
--
ALTER TABLE `tbl_permision`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_phancong`
--
ALTER TABLE `tbl_phancong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `tbl_phandoan`
--
ALTER TABLE `tbl_phandoan`
  MODIFY `MaPhanDoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `MaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
