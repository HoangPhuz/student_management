-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 05:14 PM
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
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `type`, `author`, `publisher`, `quantity`, `price`) VALUES
('S00001', 'JAVA', 'Phát triển Phần mềm', 'JAVA', 'JAVA', 5, 10000),
('S00002', 'python', 'Công nghệ Blockchain', 'python', 'python', 0, 20000),
('S00003', 'oop', 'Phát triển Phần mềm', 'oop', 'oop', 3, 0),
('S00004', 'css', 'Phát triển Web', 'css', 'css', 2, 40000),
('S00005', 'html', 'Phát triển Web', 'html', 'html', 0, 50000),
('S00006', 'golang', 'Phát triển Phần mềm', 'golang', 'golang', 2, 60000),
('S00007', 'nodejs', 'Công nghệ Blockchain', 'nodejs', 'nodejs', 3, 10000),
('S00008', 'php', 'Phát triển Web', 'php', 'php', 7, 12000),
('S00009', 'C#', 'Phát triển Phần mềm', 'C#', 'C#', 3, 20000),
('S00010', 'reactjs', 'Phát triển Web', 'reactjs', 'reactjs', 9, 250000),
('S00011', 'javascript', 'Triết học', 'javascript', 'javascript', 11, 30000),
('S00012', 'Ruby', 'Mạng và Bảo mật Mạng', 'Ruby', 'Ruby', 12, 22000),
('S00013', 'docker', 'Công nghệ Blockchain', 'docker', 'docker', 5, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `issue_id` int(11) NOT NULL,
  `reader_id` varchar(10) DEFAULT NULL,
  `issue_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`issue_id`, `reader_id`, `issue_date`) VALUES
(3, 'DG00004', '2024-03-24'),
(5, 'DG00012', '2024-03-25'),
(6, 'DG00011', '2024-03-25'),
(7, 'DG00012', '2024-04-03'),
(8, 'DG00012', '2024-04-05'),
(9, 'DG00012', '2024-04-06'),
(10, 'DG00002', '2024-04-09'),
(11, 'DG00014', '2024-05-17'),
(12, 'DG00013', '2024-05-18'),
(13, 'DG00003', '2024-05-21'),
(14, 'DG00005', '2024-05-22'),
(15, 'DG00014', '2024-05-23'),
(16, 'DG00015', '2024-05-22'),
(17, 'DG00003', '2024-05-29'),
(18, 'DG00016', '2024-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book_detail`
--

CREATE TABLE `issue_book_detail` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `book_id` varchar(10) DEFAULT NULL,
  `return_date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issue_book_detail`
--

INSERT INTO `issue_book_detail` (`id`, `issue_id`, `book_id`, `return_date`, `status`) VALUES
(1, 3, 'S00012', '2024-03-31', 'Đã trả'),
(2, 3, 'S00011', '2024-03-31', 'Đã trả'),
(3, 3, 'S00010', '2024-03-31', 'Chưa trả'),
(4, 3, 'S00009', '2024-03-31', 'Chưa trả'),
(5, 3, 'S00008', '2024-03-31', 'Đã trả'),
(6, 5, 'S00001', '2024-03-31', 'Đã trả'),
(7, 6, 'S00001', '2024-03-31', 'Chưa trả'),
(8, 6, 'S00003', '2024-03-31', 'Chưa trả'),
(9, 6, 'S00004', '2024-03-31', 'Chưa trả'),
(10, 6, 'S00005', '2024-03-31', 'Chưa trả'),
(11, 6, 'S00006', '2024-03-31', 'Chưa trả'),
(12, 7, 'S00009', '2024-04-13', 'Đã trả'),
(13, 8, 'S00007', '2024-04-15', 'Chưa trả'),
(14, 8, 'S00006', '2024-04-15', 'Chưa trả'),
(15, 9, 'S00005', '2024-04-16', 'Chưa trả'),
(16, 10, 'S00001', '2024-04-19', 'Chưa trả'),
(17, 10, 'S00004', '2024-04-19', 'Chưa trả'),
(18, 10, 'S00005', '2024-04-19', 'Chưa trả'),
(19, 11, 'S00001', '2024-05-31', 'Chưa trả'),
(20, 12, 'S00003', '2024-05-31', 'Đã trả'),
(21, 13, 'S00012', '2024-05-31', 'Đã trả'),
(22, 13, 'S00010', '2024-05-31', 'Đã trả'),
(23, 13, 'S00011', '2024-05-31', 'Đã trả'),
(24, 13, 'S00009', '2024-05-31', 'Đã trả'),
(25, 13, 'S00008', '2024-05-31', 'Đã trả'),
(26, 14, 'S00012', '2024-05-30', 'Chưa trả'),
(27, 14, 'S00011', '2024-05-30', 'Đã trả'),
(28, 14, 'S00010', '2024-05-30', 'Đã trả'),
(29, 14, 'S00009', '2024-05-30', 'Đã trả'),
(30, 15, 'S00011', '2024-05-31', 'Chưa trả'),
(31, 15, 'S00010', '2024-05-31', 'Đã trả'),
(32, 15, 'S00009', '2024-05-31', 'Đã trả'),
(33, 15, 'S00008', '2024-05-31', 'Đã trả'),
(34, 16, 'S00013', '2024-05-31', 'Đã trả'),
(35, 16, 'S00011', '2024-05-31', 'Đã trả'),
(36, 16, 'S00012', '2024-05-31', 'Đã trả'),
(37, 16, 'S00009', '2024-05-31', 'Đã trả'),
(38, 16, 'S00006', '2024-05-31', 'Đã trả'),
(39, 17, 'S00009', '2024-05-31', 'Chưa trả'),
(40, 18, 'S00001', '2024-05-31', 'Chưa trả'),
(41, 18, 'S00004', '2024-05-31', 'Chưa trả'),
(42, 18, 'S00006', '2024-05-31', 'Chưa trả'),
(43, 18, 'S00007', '2024-05-31', 'Chưa trả'),
(44, 18, 'S00008', '2024-05-31', 'Chưa trả');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `create_date` date NOT NULL,
  `out_of_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`id`, `name`, `birth_date`, `gender`, `address`, `email`, `phone`, `create_date`, `out_of_date`) VALUES
('DG00002', 'vanh', '2003-06-22', 'Nữ', 'yên xá', 'vanh@gmail.com', '1234567890', '2024-06-01', '2024-09-01'),
('DG00003', 'Nguyễn Hoàng Phúc', '2003-01-17', 'Nam', 'yên xá', 'hoangphuc@gmail.com', '0828142936', '2024-01-09', '2024-04-09'),
('DG00004', 'Phan Vân Anh', '2003-01-17', 'Nữ', 'yên xá', 'vananh@gmail.com', '1234567890', '2024-01-01', '2024-04-01'),
('DG00005', 'dương quốc hoàng', '2024-01-03', 'Nam', 'hồ chí minh', 'dqh11@gmail.com', '1231231234', '2024-01-26', '2024-04-26'),
('DG00006', 'test1', '2003-01-17', 'Nam', 'test1', 'test1@gmail.com', '1234567098', '2024-01-01', '2024-04-01'),
('DG00007', 'test2', '2003-01-17', 'Nam', 'test2', 'test2@gmail.com', '9876543120', '2024-01-01', '2024-04-01'),
('DG00008', 'test3', '2003-01-17', 'Nam', 'test3', 'test3@gmail.com', '1234596870', '2024-01-01', '2024-04-01'),
('DG00009', 'test4', '2003-01-17', 'Nam', 'test4', 'test4@gmail.com', '0293847651', '2024-01-01', '2024-04-01'),
('DG00010', 'test5', '2003-01-17', 'Nam', 'test5', 'test5@gmail.com', '43211567890', '2024-01-01', '2024-04-01'),
('DG00011', 'test6', '2003-01-17', 'Nam', 'test6', 'test6@gmail.com', '1234567889', '2024-01-01', '2024-04-01'),
('DG00012', 'test7', '2003-01-17', 'Nam', 'test7', 'test7@gmail.com', '1234567890', '2024-01-01', '2024-04-01'),
('DG00013', 'test8', '2004-03-02', 'Nam', 'test8', 'test8@gmail.com', '1213241547', '2024-03-10', '2024-06-10'),
('DG00014', 'test10', '2003-01-17', 'Nam', 'test10', 'test10@gmail.com', '0989765412', '2024-01-01', '2024-04-01'),
('DG00015', 'test11', '2024-05-01', 'Nam', 'test11', 'test11@gmail.com', '0968756485', '2024-05-23', '2024-08-23'),
('DG00016', 'nva', '2003-07-03', 'Nam', 'dsfdfg', 'hjghgg@gmail.com', '0165436598', '2024-05-05', '2024-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `pass`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(5, '123', '123', '123@gmail.com'),
(6, 'test', 'test', 'test@gmail.com'),
(8, 'admin3', 'admin3', 'admin3@gmail.com'),
(9, 'admin4', 'admin4', 'admin4@gmail.com'),
(10, 'admin5', 'admin5', 'admin5@gmail.com'),
(11, 'admin1', 'admin1', 'admin1@gmail.com'),
(12, 'admin10', 'admin10', 'admin10@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `violate`
--

CREATE TABLE `violate` (
  `id` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `punish_money` int(11) DEFAULT NULL,
  `actual_return_date` date DEFAULT NULL,
  `issue_book_detail_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `violate`
--

INSERT INTO `violate` (`id`, `reason`, `punish_money`, `actual_return_date`, `issue_book_detail_id`) VALUES
(1, 'Thành công', 0, '2024-03-10', 12),
(2, 'trả quá hạn', 20000, '2024-07-10', 6),
(3, 'hỏng 1 trang', 20000, '2024-07-10', 6),
(4, 'trả quá hạn', 22000, '2024-08-08', 1),
(5, 'rách 1 trang', 22000, '2024-08-08', 1),
(8, 'Trả quá hạn', 6000, '2024-09-10', 2),
(9, 'rách', 11000, '2024-09-10', 2),
(10, 'Trả quá hạn', 2400, '2024-09-11', 5),
(11, 'rachs', 11000, '2024-09-11', 5),
(12, 'Thành công', 0, '2024-05-30', 20),
(13, 'Thành công', 0, '2024-05-31', 21),
(14, 'Thành công', 0, '2024-05-31', 25),
(15, 'rách', 22000, '2024-05-31', 23),
(16, 'mất', 33000, '2024-05-23', 24),
(17, 'làm bẩn', 10000, '2024-05-23', 22),
(18, 'rách', 20000, '2024-05-23', 29),
(19, 'mất', 20000, '2024-05-23', 28),
(20, 'mất', 30000, '2024-05-23', 27),
(21, 'mất', 10000, '2024-05-24', 33),
(22, 'rách', 20000, '2024-05-24', 31),
(23, 'rách', 30000, '2024-05-24', 32),
(24, 'Thành công', 0, '2024-05-24', 34),
(25, 'mất', 33000, '2024-05-24', 36),
(26, 'làm bẩn', 40000, '2024-05-24', 35),
(27, 'mất', 20000, '2024-05-24', 37),
(28, 'Thành công', 0, '2024-05-24', 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `reader_id` (`reader_id`);

--
-- Indexes for table `issue_book_detail`
--
ALTER TABLE `issue_book_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_id` (`issue_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `violate`
--
ALTER TABLE `violate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_book_detail_id` (`issue_book_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `issue_book_detail`
--
ALTER TABLE `issue_book_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `violate`
--
ALTER TABLE `violate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD CONSTRAINT `issue_book_ibfk_1` FOREIGN KEY (`reader_id`) REFERENCES `reader` (`id`);

--
-- Constraints for table `issue_book_detail`
--
ALTER TABLE `issue_book_detail`
  ADD CONSTRAINT `issue_book_detail_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issue_book` (`issue_id`),
  ADD CONSTRAINT `issue_book_detail_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Constraints for table `violate`
--
ALTER TABLE `violate`
  ADD CONSTRAINT `violate_ibfk_1` FOREIGN KEY (`issue_book_detail_id`) REFERENCES `issue_book_detail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
