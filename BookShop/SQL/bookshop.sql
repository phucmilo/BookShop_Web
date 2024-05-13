-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2024 lúc 03:20 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id` int(11) NOT NULL,
  `mahoadon` int(11) DEFAULT NULL,
  `masach` int(11) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id`, `mahoadon`, `masach`, `soluong`, `dongia`) VALUES
(1, 1, 2, 1, 190000.00),
(2, 1, 4, 1, 39000.00),
(3, 2, 2, 1, 190000.00),
(4, 2, 4, 2, 39000.00),
(5, 3, 1, 1, 49000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahoadon` int(11) NOT NULL,
  `id_taikhoan` int(11) DEFAULT NULL,
  `ngaymua` date DEFAULT NULL,
  `tongtien` decimal(10,2) NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahoadon`, `id_taikhoan`, `ngaymua`, `tongtien`, `trangthai`) VALUES
(1, 2, '2024-05-12', 229000.00, 'Chưa xử lý'),
(2, 1, '2024-05-12', 268000.00, 'Chưa xử lý'),
(3, 3, '2024-05-12', 49000.00, 'Chưa xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `masach` int(11) NOT NULL,
  `tensach` varchar(255) NOT NULL,
  `giaban` decimal(10,2) NOT NULL,
  `giathitruong` decimal(10,2) NOT NULL,
  `anh1` varchar(255) DEFAULT NULL,
  `anh2` varchar(255) DEFAULT NULL,
  `anh3` varchar(255) DEFAULT NULL,
  `anh4` varchar(255) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `giaban`, `giathitruong`, `anh1`, `anh2`, `anh3`, `anh4`, `soluong`, `trangthai`) VALUES
(1, 'Sách ABC', 49000.00, 80000.00, 'images/AnhSanPham1109060251335.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 100, '1'),
(2, 'Sách XYZ', 190000.00, 250000.00, 'images/AnhSanPham12676691594b8f18a789858.495x717.w.b.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 50, '1'),
(3, 'Sách LMN', 49000.00, 70000.00, 'images/AnhSanPham506406240158.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 80, '1'),
(4, 'Sách PQR', 39000.00, 60000.00, 'images/AnhSanPham240073.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 120, '1'),
(5, 'Sách Học Tập', 190000.00, 20000.00, 'images/AnhSanPham1105010122052.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 50, '2'),
(6, 'Sách ABC', 19000.00, 20000.00, 'images/AnhSanPham1109060251335.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 100, '2'),
(7, 'Sách ABC', 29000.00, 30000.00, 'images/AnhSanPham1115010237281.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 80, '2'),
(8, 'Sách CDE', 190000.00, 20000.00, 'images/AnhSanPham240073.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 120, '2'),
(9, 'Sách ABC', 190000.00, 20000.00, 'images/AnhSanPham12676721734b8f246db1ef4.500x735.w.b.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 60, '2'),
(10, 'Sách Làm Việc', 88000.00, 100000.00, 'images/AnhSanPham506406240158.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 90, '2'),
(11, 'Sách NBG', 45000.00, 50000.00, 'images/anhVoNguyenGiap.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 70, '2'),
(12, 'Sách CEF', 36000.00, 50000.00, 'images/AnhSanPham1115010237281.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 110, '2'),
(13, 'Sách DEF', 48000.00, 50000.00, 'images/anh1_3.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 85, '2'),
(14, 'Sách ABC', 39000.00, 50000.00, 'images/anh1.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 75, '2'),
(15, 'Sách ABC', 39000.00, 50000.00, 'images/anh1.jpg', 'images/AnhSanPham1109060251335.jpg', 'images/anh1_3.jpg', 'images/anh1_2.jpg', 75, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `hoten`, `diachi`, `sodienthoai`) VALUES
(1, 'Sơnbg', '123456', 'Dương Ngọc Sơn', 'Bắc Giang', '0348521001'),
(2, 'Sơnbg1', '123456', 'Dương Ngọc Sơn1', 'bắgsgsgs', '06945451'),
(3, 'Phúc', '123456', 'Bảo phúc', 'TPHCM', '06945451');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahoadon` (`mahoadon`),
  ADD KEY `masach` (`masach`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahoadon`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `masach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`mahoadon`) REFERENCES `hoadon` (`mahoadon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
