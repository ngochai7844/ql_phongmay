-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 24, 2022 lúc 05:07 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_phong_may`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qldangkyphong`
--

CREATE TABLE `qldangkyphong` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `tenphong` varchar(11) NOT NULL,
  `ngaydangky` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `qldangkyphong`
--

INSERT INTO `qldangkyphong` (`id`, `fullname`, `image`, `tenphong`, `ngaydangky`) VALUES
(21, 'Minh Anh', 'https://scr.vn/wp-content/uploads/2020/07/H%C3%ACnh-c%E1%BA%B7p-%C4%91%C3%B4i-Anime-%C4%91%C3%A1ng-y%C3%AAu.jpg', 'B102', '2022-09-29'),
(22, 'Minh Anh', 'https://i.pinimg.com/564x/fd/c9/26/fdc926e20f2ff29653258b5a18132965.jpg', 'B101', '2022-10-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlmay`
--

CREATE TABLE `qlmay` (
  `maMay` int(11) NOT NULL,
  `tenMay` varchar(255) NOT NULL,
  `tinhTrang` varchar(100) NOT NULL,
  `tenPhong` varchar(100) NOT NULL,
  `idPhong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `qlmay`
--

INSERT INTO `qlmay` (`maMay`, `tenMay`, `tinhTrang`, `tenPhong`, `idPhong`) VALUES
(1, 'Máy 1', 'Tốt', 'B101', 1),
(2, 'Máy 2', 'Tốt', 'B101', 1),
(3, 'Máy 3', 'Tốt', 'B101', 1),
(4, 'Máy 1', 'Tốt', 'B102', 2),
(5, 'Máy 2', 'Tốt', 'B102', 2),
(6, 'Máy 3', 'Hỏng', 'B102', 2),
(7, 'Máy 4', 'Tốt', 'B101', 1),
(8, 'Máy 5', 'Hỏng', 'B101', 1),
(9, 'Máy 6', 'Tốt', 'B101', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlphong`
--

CREATE TABLE `qlphong` (
  `idPhong` int(11) NOT NULL,
  `tenPhong` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `qlphong`
--

INSERT INTO `qlphong` (`idPhong`, `tenPhong`) VALUES
(1, 'B101'),
(2, 'B102'),
(3, 'B103'),
(4, 'B104'),
(5, 'B105'),
(6, 'B106');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qltk_user`
--

CREATE TABLE `qltk_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `qltk_user`
--

INSERT INTO `qltk_user` (`id`, `fullname`, `email`, `pass`) VALUES
(1, 'Minh Anh', 'minhanh@gmail.com', '123'),
(2, 'phúc phan', 'phuc@gmail.com', '112');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `qldangkyphong`
--
ALTER TABLE `qldangkyphong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `qlmay`
--
ALTER TABLE `qlmay`
  ADD PRIMARY KEY (`maMay`),
  ADD KEY `Fk_idPhong` (`idPhong`);

--
-- Chỉ mục cho bảng `qlphong`
--
ALTER TABLE `qlphong`
  ADD PRIMARY KEY (`idPhong`);

--
-- Chỉ mục cho bảng `qltk_user`
--
ALTER TABLE `qltk_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `qldangkyphong`
--
ALTER TABLE `qldangkyphong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `qlmay`
--
ALTER TABLE `qlmay`
  MODIFY `maMay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `qlphong`
--
ALTER TABLE `qlphong`
  MODIFY `idPhong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `qltk_user`
--
ALTER TABLE `qltk_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `qlmay`
--
ALTER TABLE `qlmay`
  ADD CONSTRAINT `Fk_idPhong` FOREIGN KEY (`idPhong`) REFERENCES `qlphong` (`idPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
