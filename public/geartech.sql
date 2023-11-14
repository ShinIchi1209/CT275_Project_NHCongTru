-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2023 lúc 06:40 PM
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
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bestseller`
--

INSERT INTO `bestseller` (`id`, `image`, `name`, `price`, `description`) VALUES
(1, 'loa-vi-tinh-fenda-f670x.jpg', 'Loa vi tính Fenda F670x', 1390000, ''),
(2, 'asus-tuf-gaming-fx517ze-i5.jpg', 'ASUS-TUF-Gaming FX517ze-i5', 18990000, ''),
(3, 'msi-gaming-gf63-thin-11sc-i5.jpg', 'MSI-Gaming GF63-Thin-11SC-i5', 15040000, ''),
(4, 'camera-ip-360-do-1080p.jpg', 'Camera-ip-360-do-1080p', 590000, ''),
(5, 'viewsonic-gaming-vx2728j-27-inch-fullhd.jpg', 'Viewsonic-Gaming VX2728j 27inch FullHD', 4800000, ''),
(6, 'apple-watch-se-2023.jpg', 'Apple Watch SE 2023', 6100000, ''),
(7, 'honor-pad-x9.jpg', 'HonorPad X9', 3890000, ''),
(8, 'iphone-15-pro-max.jpg', 'Iphone 15 pro max', 34190000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'Loa vi tính Fenda F670x', 1390000, 'loa-vi-tinh-fenda-f670x.jpg', ''),
(2, 'ASUS-TUF-Gaming FX517ze-i5', 18990000, 'asus-tuf-gaming-fx517ze-i5.jpg', ''),
(3, 'MSI-Gaming GF63-Thin-11SC-i5', 15040000, 'msi-gaming-gf63-thin-11sc-i5.jpg', ''),
(4, 'Camera-ip-360-do-1080p', 590000, 'camera-ip-360-do-1080p.jpg', ''),
(5, 'Viewsonic-Gaming VX2728j 27inch FullHD', 4800000, 'viewsonic-gaming-vx2728j-27-inch-fullhd.jpg', ''),
(6, 'Apple Watch SE 2023', 6100000, 'apple-watch-se-2023.jpg', ''),
(7, 'HonorPad X9', 3890000, 'honor-pad-x9.jpg', ''),
(8, 'Iphon 15 pro max', 34190000, 'iphone-15-pro-max.jpg', ''),
(9, 'Iphone 14 Pro Max 256G', 29790000, 'iphone-14-pro.jpg', '[value-5]'),
(10, 'OPPO Reno10 5G 256GB', 10490000, 'oppo-reno10.jpg', '[value-5]'),
(11, 'Vivo Y02T', 2990000, 'vivo-y02t.jpg', '[value-5]'),
(12, 'IPhone 13 128GB', 16390000, 'iphone-13.jpg', '[value-5]'),
(13, 'Laptop HP 15s fq2716TU i3', 10390000, 'hp-15s-fq2716tu-i3.jpg', '[value-5]'),
(14, 'Laptop Lenovo Ideapad 3 15IAU7 i3', 8690000, 'lenovo-ideapad-3.jpg', '[value-5]'),
(15, 'Laptop Acer Aspire 5 Gaming A515 58GM 51LB i5', 16990000, 'acer-aspire-5.jpg', '[value-5]'),
(16, 'Laptop Asus TUF Gaming F15 FX506HF i5', 16990000, 'asus-tuf-gaming.jpg', '[value-5]'),
(17, 'Camera IP 360 ?? 1536P TP-Link Tapo C210', 690000, 'camera-ip-360.jpg', '[value-5]'),
(18, 'Pin s?c d? phòng Polymer 10000mAh 12W AVA+ DS609A', 250000, 'pin-sac-du-phong-polymer.jpg', '[value-5]'),
(19, 'Tai nghe Bluetooth True Wireless Mozard TS13', 110000, 'tai-nghe-bluetooth-true-wireless.jpg', '[value-5]'),
(20, '??ng h? thông minh Samsung Galaxy Watch5', 3990000, 'samsung-galaxy-watch.jpg', '[value-5]'),
(21, '??ng h? thông minh Xiaomi Redmi Watch 3', 2290000, 'redmi-watch-3.jpg', '[value-5]'),
(22, '??ng h? thông minh BeFit Watch Ultra S', 890000, 'befit-watch-ultra-s.jpg', '[value-5]');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MA_TK` int(10) UNSIGNED NOT NULL,
  `TEN_DANG_NHAP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MAT_KHAU` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT 1,
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MA_TK`, `TEN_DANG_NHAP`, `MAT_KHAU`, `STATUS`, `EMAIL`) VALUES
(1, 'admin', 'admin', 1, ''),
(6, 'congtru', 'ebf59acde7bad4e55c2bb717f778a417', 1, 'congtru1209@gmail.com'),
(7, 'root', 'ebf59acde7bad4e55c2bb717f778a417', 1, 'abc@gmail.com');

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

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MA_TK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MA_TK` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
