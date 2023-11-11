-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2023 lúc 07:12 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `geartech`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bestseller`
--

CREATE TABLE `bestseller` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bestseller`
--

INSERT INTO `bestseller` (`id`, `image`, `name`, `price`) VALUES
(1, 'loa-vi-tinh-fenda-f670x.jpg', 'Loa vi tính Fenda F670x', 1390000),
(2, 'asus-tuf-gaming-fx517ze-i5.jpg', 'ASUS-TUF-Gaming FX517ze-i5', 18990000),
(3, 'msi-gaming-gf63-thin-11sc-i5.jpg', 'MSI-Gaming GF63-Thin-11SC-i5', 15040000),
(4, 'camera-ip-360-do-1080p.jpg', 'Camera-ip-360-do-1080p', 590000),
(5, 'viewsonic-gaming-vx2728j-27-inch-fullhd.jpg', 'Viewsonic-Gaming VX2728j 27inch FullHD', 4800000),
(6, 'apple-watch-se-2023.jpg', 'Apple Watch SE 2023', 6100000),
(7, 'honor-pad-x9.jpg', 'HonorPad X9', 3890000),
(8, 'iphone-15-pro-max.jpg', 'Iphone 15 pro max', 34190000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Loa vi tính Fenda F670x', 1390000, 'loa-vi-tinh-fenda-f670x.jpg'),
(2, 'ASUS-TUF-Gaming FX517ze-i5', 18990000, 'asus-tuf-gaming-fx517ze-i5.jpg'),
(3, 'MSI-Gaming GF63-Thin-11SC-i5', 15040000, 'msi-gaming-gf63-thin-11sc-i5.jpg'),
(4, 'Camera-ip-360-do-1080p', 590000, 'camera-ip-360-do-1080p.jpg'),
(5, 'Viewsonic-Gaming VX2728j 27inch FullHD', 4800000, 'viewsonic-gaming-vx2728j-27-inch-fullhd.jpg'),
(6, 'Apple Watch SE 2023', 6100000, 'apple-watch-se-2023.jpg'),
(7, 'HonorPad X9', 3890000, 'honor-pad-x9.jpg'),
(8, 'Iphon 15 pro max', 34190000, 'iphone-15-pro-max.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `src` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`ID`, `src`, `active`) VALUES
(1, 'img1.png', 1),
(2, 'img2.png', 1),
(3, 'img3.png', 1),
(4, 'img4.png', 1),
(5, 'img5.png', 1),
(6, 'img6.png', 1),
(1, 'img1.png', 1),
(2, 'img2.png', 1),
(3, 'img3.png', 1),
(4, 'img4.png', 1),
(5, 'img5.png', 1),
(6, 'img6.png', 1),
(1, 'img1.png', 1),
(2, 'img2.png', 1),
(3, 'img3.png', 1),
(4, 'img4.png', 1),
(5, 'img5.png', 1),
(6, 'img6.png', 1),
(1, 'img1.png', 1),
(2, 'img2.png', 1),
(3, 'img3.png', 1),
(4, 'img4.png', 1),
(5, 'img5.png', 1),
(6, 'img6.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bestseller`
--
ALTER TABLE `bestseller`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
