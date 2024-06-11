-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 06:43 PM
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
-- Database: `student_management_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldiemhp`
--

CREATE TABLE `tbldiemhp` (
  `MaSV` char(10) NOT NULL,
  `MaHP` char(10) NOT NULL,
  `DiemHP` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldiemhp`
--

INSERT INTO `tbldiemhp` (`MaSV`, `MaHP`, `DiemHP`) VALUES
('SV01', 'HP01', 10),
('SV01', 'HP02', 7.5),
('SV02', 'HP03', 9),
('SV03', 'HP01', 8),
('SV03', 'HP03', 5),
('SV09', 'HP03', 3),
('SV99', 'HP01', 2),
('SV99', 'HP02', 3),
('SV99', 'HP03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblhocphan`
--

CREATE TABLE `tblhocphan` (
  `MaHP` char(10) NOT NULL,
  `TenHP` varchar(100) NOT NULL,
  `SoDVHT` int(11) NOT NULL,
  `MaNganh` char(10) NOT NULL,
  `HocKy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblhocphan`
--

INSERT INTO `tblhocphan` (`MaHP`, `TenHP`, `SoDVHT`, `MaNganh`, `HocKy`) VALUES
('HP01', 'Cơ sở dữ liệu', 3, 'N01', 1),
('HP02', 'Lập trình web', 3, 'N01', 2),
('HP03', 'Công nghệ phần mềm\r\n', 4, 'N02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblkhoa`
--

CREATE TABLE `tblkhoa` (
  `MaKhoa` char(10) NOT NULL,
  `TenKhoa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblkhoa`
--

INSERT INTO `tblkhoa` (`MaKhoa`, `TenKhoa`) VALUES
('K01', 'Công nghệ thông tin'),
('K02', 'Điện tử viễn thông'),
('K03', 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `tbllop`
--

CREATE TABLE `tbllop` (
  `MaLop` char(10) NOT NULL,
  `TenLop` varchar(100) NOT NULL,
  `MaNganh` char(10) NOT NULL,
  `KhoaHoc` varchar(20) NOT NULL,
  `HeDT` varchar(20) NOT NULL,
  `NamNhapHoc` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllop`
--

INSERT INTO `tbllop` (`MaLop`, `TenLop`, `MaNganh`, `KhoaHoc`, `HeDT`, `NamNhapHoc`) VALUES
('L01', 'D21CQCN06-B', 'N01', '2020-2024', 'Chính quy', '2020'),
('L02', 'E21CQCN03', 'N02', '2020-2024', 'Chính quy', '2020'),
('L03', 'D21CQCN05-B', 'N03', '2020-2024', 'Chính quy', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `tblnganh`
--

CREATE TABLE `tblnganh` (
  `MaNganh` char(10) NOT NULL,
  `TenNganh` varchar(100) NOT NULL,
  `MaKhoa` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnganh`
--

INSERT INTO `tblnganh` (`MaNganh`, `TenNganh`, `MaKhoa`) VALUES
('N01', 'Công nghệ phần mềm', 'K01'),
('N02', 'Hệ thống thông tin', 'K01'),
('N03', 'Trí tuệ nhân tạo', 'K02');

-- --------------------------------------------------------

--
-- Table structure for table `tblsinhvien`
--

CREATE TABLE `tblsinhvien` (
  `MaSV` char(10) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `MaLop` char(10) NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsinhvien`
--

INSERT INTO `tblsinhvien` (`MaSV`, `HoTen`, `MaLop`, `GioiTinh`, `NgaySinh`, `DiaChi`) VALUES
('SV01', 'Nguyễn Văn A', 'L01', 'Nam', '2000-01-01', 'Văn Phú, Hà Đông'),
('SV02', 'Đỗ Phương Nam', 'L02', 'Nam', '2000-02-01', 'Cầu Giấy, Hà Nội'),
('SV03', 'Trần Thị Tú Anh', 'L03', 'Nữ', '2000-03-01', 'Hai Bà Trưng, Hà Nội'),
('SV04', 'Nguyễn Hoàng Phúc', 'L01', 'Nam', '2024-05-22', 'Yên Xá, Hà Nội'),
('SV05', 'Phan Thu Phương', 'L01', 'Nữ', '2024-05-01', 'Thạch Thất, Hà Nội'),
('SV06', 'Trần Văn Tuấn', 'L02', 'Nam', '2024-05-08', 'Hai Bà Trưng, Hà Nội'),
('SV09', 'Test9', 'L03', 'Nam', '2024-05-24', 'Test9'),
('SV99', 'Admin', 'L03', 'Nữ', '2003-01-17', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `idUser` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passWord` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`idUser`, `email`, `passWord`, `fullName`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldiemhp`
--
ALTER TABLE `tbldiemhp`
  ADD PRIMARY KEY (`MaSV`,`MaHP`),
  ADD KEY `MaHP` (`MaHP`);

--
-- Indexes for table `tblhocphan`
--
ALTER TABLE `tblhocphan`
  ADD PRIMARY KEY (`MaHP`),
  ADD KEY `MaNganh` (`MaNganh`);

--
-- Indexes for table `tblkhoa`
--
ALTER TABLE `tblkhoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Indexes for table `tbllop`
--
ALTER TABLE `tbllop`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `MaNganh` (`MaNganh`);

--
-- Indexes for table `tblnganh`
--
ALTER TABLE `tblnganh`
  ADD PRIMARY KEY (`MaNganh`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Indexes for table `tblsinhvien`
--
ALTER TABLE `tblsinhvien`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `MaLop` (`MaLop`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldiemhp`
--
ALTER TABLE `tbldiemhp`
  ADD CONSTRAINT `tbldiemhp_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `tblsinhvien` (`MaSV`),
  ADD CONSTRAINT `tbldiemhp_ibfk_2` FOREIGN KEY (`MaHP`) REFERENCES `tblhocphan` (`MaHP`);

--
-- Constraints for table `tblhocphan`
--
ALTER TABLE `tblhocphan`
  ADD CONSTRAINT `tblhocphan_ibfk_1` FOREIGN KEY (`MaNganh`) REFERENCES `tblnganh` (`MaNganh`);

--
-- Constraints for table `tbllop`
--
ALTER TABLE `tbllop`
  ADD CONSTRAINT `tbllop_ibfk_1` FOREIGN KEY (`MaNganh`) REFERENCES `tblnganh` (`MaNganh`);

--
-- Constraints for table `tblnganh`
--
ALTER TABLE `tblnganh`
  ADD CONSTRAINT `tblnganh_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `tblkhoa` (`MaKhoa`);

--
-- Constraints for table `tblsinhvien`
--
ALTER TABLE `tblsinhvien`
  ADD CONSTRAINT `tblsinhvien_ibfk_1` FOREIGN KEY (`MaLop`) REFERENCES `tbllop` (`MaLop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
