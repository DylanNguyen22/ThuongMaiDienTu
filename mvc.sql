-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2023 lúc 08:40 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `Maloai` int(3) NOT NULL,
  `Tenloai` varchar(64) NOT NULL,
  `dmnoibat` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`Maloai`, `Tenloai`, `dmnoibat`) VALUES
(1, 'Điện thoại thông minh', 1),
(2, 'Laptop', 1),
(3, 'Tablet', 1),
(5, 'Tai nghe', 1),
(6, 'Cáp sạc', 0),
(7, 'Sạc dự phòng', 0),
(8, 'Đồng hồ thông minh', 0),
(12, 'Dây sạc', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `madh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`madh`, `masp`, `soluong`, `dongia`) VALUES
(1641114728, 36, 2, 4090000),
(1641114728, 42, 1, 30110000),
(1641114907, 49, 1, 1990000),
(1641114907, 28, 1, 13490000),
(1641114907, 37, 1, 8190000),
(1641121310, 50, 1, 1990000),
(1641121310, 51, 1, 1490000),
(1641471752, 35, 1, 8290000),
(1641471752, 28, 2, 13490000),
(1641471752, 30, 1, 13990000),
(1641477950, 36, 1, 4090000),
(1641477950, 33, 1, 15990000),
(1641477950, 24, 1, 24490000),
(1641486864, 50, 1, 1990000),
(1641487112, 24, 2, 24490000),
(1641623592, 28, 1, 13490000),
(1641623592, 49, 1, 1990000),
(1641623592, 53, 1, 590000),
(1642752738, 33, 2, 15990000),
(1642752738, 28, 1, 13490000),
(1642752738, 45, 1, 41000000),
(1642753246, 46, 1, 24490000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `giatridh` float NOT NULL,
  `ngayxuatdh` date NOT NULL,
  `diachinhanhang` varchar(256) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `trangthaidh` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madh`, `makh`, `giatridh`, `ngayxuatdh`, `diachinhanhang`, `sdt`, `trangthaidh`) VALUES
(1641114728, 47, 38290000, '2022-01-02', '321 Nguyen Van Cu', '0125195322', 1),
(1641114907, 47, 23670000, '2022-01-02', '321 Nguyen Van Cu', '0125195322', 2),
(1641121310, 47, 3480000, '2022-01-02', '321 Nguyen Van Cu', '0125195322', 1),
(1641471752, 50, 49260000, '2022-01-06', 'Hẻm 311, Đường Nguyễn Văn Cừ, An Hòa', '0122174566', 2),
(1641477950, 47, 44570000, '2022-01-06', '321 Nguyen Van Cu', '0125195322', 2),
(1641486864, 46, 1990000, '2022-01-06', '123 đường ABC', '0941123123', 1),
(1641487112, 46, 48980000, '2022-01-06', '123 đường ABC', '0941123123', 2),
(1641623592, 47, 16070000, '2022-01-08', '321 Nguyen Van Cu', '0125195322', 1),
(1642752738, 47, 86470000, '2022-01-21', '123 Nguyen Van Cu', '0125643544', 1),
(1642753246, 47, 24490000, '2022-01-21', '321 Nguyen Van Cu', '0125195322', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `maloaitk` int(11) NOT NULL,
  `tenloaitk` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`maloaitk`, `tenloaitk`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(8) NOT NULL,
  `tensp` varchar(512) NOT NULL,
  `giaban` int(11) NOT NULL,
  `chitiet` varchar(4096) NOT NULL,
  `hinhanh` varchar(128) NOT NULL,
  `soluong` int(11) NOT NULL,
  `maloai` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `trangthaisp` tinyint(1) NOT NULL DEFAULT 1,
  `noibat` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `giaban`, `chitiet`, `hinhanh`, `soluong`, `maloai`, `math`, `trangthaisp`, `noibat`) VALUES
(24, 'Điện thoại Iphone 13 128GB', 24490000, 'Màn hình:\r\n\r\nOLED6.1\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 15\r\nCamera sau:\r\n\r\n2 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A15 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n3240 mAh20 W', '1639987057.jpg', 15, 1, 2, 1, 0),
(28, 'Điện thoại Samsung Galaxy S20 FE (8GB/256GB)', 13490000, 'Màn hình:\r\n\r\nSuper AMOLED6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 12 MP & Phụ 12 MP, 8 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 865\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4500 mAh25 W', '1640347135.jpg', 20, 1, 1, 1, 1),
(30, 'Máy tính bảng Samsung Galaxy Tab S7 FE 4G ', 13990000, 'Màn hình:\r\n\r\n12.4\"TFT LCD\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nChip:\r\n\r\nSnapdragon 750G\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n64 GB\r\nKết nối:\r\n\r\nHỗ trợ 4GCó nghe gọi\r\nSIM:\r\n\r\n1 Nano SIM\r\nCamera sau:\r\n\r\n8 MP\r\nCamera trước:\r\n\r\n5 MP\r\nPin, Sạc:\r\n\r\n10090 mAh45 W\r\nHãng\r\n\r\nSamsung.', '1640348482.jpg', 20, 3, 1, 1, 0),
(31, 'Máy tính bảng iPad Air 4 Wifi 256GB (2020)', 22990000, 'Màn hình:\r\n\r\n10.9\"Liquid Retina\r\nHệ điều hành:\r\n\r\niPadOS 15\r\nChip:\r\n\r\nApple A14 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nKết nối:\r\n\r\nNghe gọi qua FaceTime\r\nCamera sau:\r\n\r\n12 MP\r\nCamera trước:\r\n\r\n7 MP\r\nPin, Sạc:\r\n\r\n28.65 Wh (~ 7600 mAh)20 W', '1640348600.jpg', 20, 3, 2, 1, 0),
(32, 'Laptop Asus ROG Zephyrus G14 Alan Walker GA401QEC R9', 44990000, 'CPU:\r\n\r\nRyzen 95900HS3GHz\r\nRAM:\r\n\r\n16 GBDDR4 2 khe (8GB onboard+ 1 khe 8GB)3200 MHz\r\nỔ cứng:\r\n\r\n1 TB SSD M.2 PCIe 3.0 (Có thể tháo ra, lắp thanh khác dung lượng không giới hạn)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe 3.0 mở rộng (nâng cấp dung lượng không giới hạn)\r\nMàn hình:\r\n\r\n14\"QHD (2560 x 1440)120Hz\r\nCard màn hình:\r\n\r\nCard rờiRTX 3050Ti 4GB\r\nCổng kết nối:\r\n\r\n1x USB 3.2 Gen 2 Type-C support DisplayPort / power delivery / G-SYNC2 x USB 3.2HDMIJack tai nghe 3.5 mmUSB Type-C\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nWindows 10 Home SL\r\nThiết kế:\r\n\r\nVỏ nhựa - nắp lưng bằng kim loại\r\nKích thước, trọng lượng:\r\n\r\nDài 324 mm - Rộng 220 mm - Dày 19.9 mm - Nặng 1.7 kg\r\nThời điểm ra mắt:\r\n\r\n2021', '1640348833.jpg', 10, 2, 2, 1, 0),
(33, 'Điện thoại iPhone 11 64GB ', 15990000, 'Màn hình:\r\n\r\nIPS LCD6.1\"Liquid Retina\r\nHệ điều hành:\r\n\r\niOS 15\r\nCamera sau:\r\n\r\n2 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A13 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n64 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n3110 mAh18 W', '1640435539.jpg', 20, 1, 2, 1, 0),
(34, 'Điện thoại Xiaomi 11T 5G 128GB ', 10390000, 'Màn hình:\r\n\r\nAMOLED6.67\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 8 MP, 5 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nMediaTek Dimensity 1200\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n5000 mAh67 W\r\nHãng\r\n\r\nXiaomi. ', '1640435603.jpg', 20, 1, 6, 1, 0),
(35, 'Điện thoại Samsung Galaxy A52 128GB ', 8290000, 'Màn hình:\r\n\r\nSuper AMOLED6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 12 MP, 5 MP, 5 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 720G\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4500 mAh25 W', '1640435680.jpg', 20, 1, 1, 1, 1),
(36, 'Điện thoại Realme C21Y 4GB', 4090000, 'Màn hình:\r\n\r\nIPS LCD6.5\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nSpreadtrum T610 8 nhân\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh10 W', '1640435752.jpg', 20, 1, 8, 1, 1),
(37, 'Điện thoại Vivo V23e ', 8190000, 'Màn hình:\r\n\r\nAMOLED6.44\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n50 MP\r\nChip:\r\n\r\nMediaTek Helio G96 8 nhân\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4050 mAh44 W', '1640435815.jpg', 20, 1, 5, 1, 0),
(38, 'Điện thoại OPPO A95', 6990000, 'Màn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 662\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', '1640435890.jpg', 20, 1, 3, 1, 0),
(40, 'Laptop Acer Nitro 5 Gaming AN515 57 727J i7', 21990000, 'CPU:\r\n\r\ni711800H2.30 GHz\r\nRAM:\r\n\r\n8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz\r\nỔ cứng:\r\n\r\n512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2TB)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng\r\nMàn hình:\r\n\r\n15.6\"Full HD (1920 x 1080)144Hz\r\nCard màn hình:\r\n\r\nCard rờiRTX 3050Ti 4GB\r\nCổng kết nối:\r\n\r\n3 x USB 3.2HDMIJack tai nghe 3.5 mmLAN (RJ45)USB Type-C\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nWindows 10 Home SL\r\nThiết kế:\r\n\r\nVỏ nhựa\r\nKích thước, trọng lượng:\r\n\r\nDài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg\r\nThời điểm ra mắt:\r\n\r\n2021', '1640436160.jpg', 10, 2, 11, 1, 0),
(41, 'Laptop Lenovo Yoga Slim 7 14ITL05 i5', 21990000, 'CPU:\r\n\r\ni51135G72.4GHz\r\nRAM:\r\n\r\n8 GBDDR4 (On board)3200 MHz\r\nỔ cứng:\r\n\r\n512 GB SSD NVMe PCIe\r\nMàn hình:\r\n\r\n14\"Full HD (1920 x 1080)\r\nCard màn hình:\r\n\r\nCard tích hợpIntel Iris Xe\r\nCổng kết nối:\r\n\r\n1 x USB 3.21 x USB 3.2 (Always on)2 x Thunderbolt 4 USB-CHDMIJack tai nghe 3.5 mm\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nWindows 10 Home SL\r\nThiết kế:\r\n\r\nVỏ kim loại\r\nKích thước, trọng lượng:\r\n\r\nDài 320.6 mm - Rộng 208.18 mm - Dày 14.9 mm - Nặng 1.36 kg\r\nThời điểm ra mắt:\r\n\r\n2021', '1640436227.jpg', 10, 2, 10, 1, 0),
(42, 'Laptop Dell Gaming G15 5515 R7', 30110000, 'CPU:\r\n\r\nRyzen 75800H3.2GHz\r\nRAM:\r\n\r\n8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz\r\nỔ cứng:\r\n\r\n512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB (2280) / 1TB (2230))Không hỗ trợ khe cắm HDDKhông hỗ trợ khe cắm SSD M2 mở rộng thêm\r\nMàn hình:\r\n\r\n15.6\"Full HD (1920 x 1080)120Hz\r\nCard màn hình:\r\n\r\nCard rờiRTX 3050 4GB\r\nCổng kết nối:\r\n\r\n1 x USB 3.22 x USB 2.0HDMIJack tai nghe 3.5 mmLAN (RJ45)USB Type-C\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nWindows 10 Home SL + Office H&S 2019 vĩnh viễn\r\nThiết kế:\r\n\r\nVỏ nhựa\r\nKích thước, trọng lượng:\r\n\r\nDài 357.2 mm - Rộng 272.1 mm - Dày 26.9 mm - Nặng 2.81 kg\r\nThời điểm ra mắt:\r\n\r\n2021', '1640436338.jpg', 10, 2, 12, 1, 0),
(43, 'Laptop Apple MacBook Air M1 2020', 33900000, 'CPU:\r\n\r\nApple M1\r\nRAM:\r\n\r\n16 GB\r\nỔ cứng:\r\n\r\n256 GB SSD\r\nMàn hình:\r\n\r\n13.3\"Retina (2560 x 1600)\r\nCard màn hình:\r\n\r\nCard tích hợp7 nhân GPU\r\nCổng kết nối:\r\n\r\n2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nMac OS\r\nThiết kế:\r\n\r\nVỏ kim loại nguyên khối\r\nKích thước, trọng lượng:\r\n\r\nDài 304.1 mm - Rộng 212.4 mm - Dày 4.1 mm đến 16.1 mm - Nặng 1.29 kg\r\nThời điểm ra mắt:\r\n\r\n2020', '1640436412.jpg', 10, 2, 2, 1, 0),
(44, 'Laptop Apple MacBook Air M1 2020', 35510000, 'CPU:\r\n\r\nApple M1\r\nRAM:\r\n\r\n16 GB\r\nỔ cứng:\r\n\r\n512 GB SSD\r\nMàn hình:\r\n\r\n13.3\"Retina (2560 x 1600)\r\nCard màn hình:\r\n\r\nCard tích hợp7 nhân GPU\r\nCổng kết nối:\r\n\r\n2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nMac OS\r\nThiết kế:\r\n\r\nVỏ kim loại nguyên khối\r\nKích thước, trọng lượng:\r\n\r\nDài 304.1 mm - Rộng 212.4 mm - Dày 4.1 đến 16.1 mm - Nặng 1.29 kg\r\nThời điểm ra mắt:\r\n\r\n2020', '1640436480.jpg', 0, 2, 2, 1, 0),
(45, 'Máy tính bảng iPad Pro M1 12.9 inch WiFi Cellular 512GB (2021)', 41000000, 'Màn hình:\r\n\r\n12.9\"Liquid Retina XDR mini-LED LCD\r\nHệ điều hành:\r\n\r\niPadOS 15\r\nChip:\r\n\r\nApple M1 8 nhân\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n512 GB\r\nKết nối:\r\n\r\n5GNghe gọi qua FaceTime\r\nSIM:\r\n\r\n1 Nano SIM hoặc 1 eSIM\r\nCamera sau:\r\n\r\nChính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước:\r\n\r\n12 MP\r\nPin, Sạc:\r\n\r\n40.88 Wh (~ 10.835 mAh)20 W', '1640436546.jpg', 20, 3, 2, 1, 0),
(46, 'Máy tính bảng iPad mini 6 WiFi Cellular 256GB ', 24490000, 'Màn hình:\r\n\r\n8.3\"LED-backlit IPS LCD\r\nHệ điều hành:\r\n\r\niPadOS 15\r\nChip:\r\n\r\nApple A15 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nKết nối:\r\n\r\n5GNghe gọi qua FaceTime\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIM\r\nCamera sau:\r\n\r\n12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nPin, Sạc:\r\n\r\n19.3 Wh20 W', '1640436615.jpg', 20, 3, 2, 1, 0),
(47, 'Máy tính bảng Xiaomi Pad 5 256GB', 10490000, 'Màn hình:\r\n\r\n11\"IPS LCD\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nChip:\r\n\r\nSnapdragon 860 8 nhân\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nCamera sau:\r\n\r\n13 MP\r\nCamera trước:\r\n\r\n8 MP\r\nPin, Sạc:\r\n\r\n8720 mAh33 W\r\nHãng\r\n\r\nXiaomi.', '1640436696.jpg', 10, 3, 6, 1, 0),
(48, 'Tai nghe Bluetooth AirPods Pro MagSafe Charge Apple', 5490000, 'Pin:\r\n\r\nDùng 4.5 giờ - Sạc 2 giờ\r\nCổng sạc:\r\n\r\nLightningSạc MagSafe\r\nCông nghệ âm thanh:\r\n\r\nActive Noise CancellationAdaptive EQTransparency Mode\r\nTương thích:\r\n\r\nAndroidiOS (iPhone)iPadOS (iPad)MacOS (Macbook, iMac)\r\nỨng dụng kết nối:\r\n\r\nBluetooth TWS\r\nTiện ích:\r\n\r\nChống nước IPX4\r\nHỗ trợ kết nối:\r\n\r\nBluetooth 5.0\r\nĐiều khiển bằng:\r\n\r\nCảm ứng chạm\r\nHãng\r\n\r\nApple.', '1640436772.jpg', 10, 5, 2, 1, 0),
(49, 'Tai nghe Bluetooth True Wireless LG TONE-FP5', 1990000, 'Thời gian tai nghe:\r\n\r\nDùng 8 giờ - Sạc 1 giờ\r\nThời gian hộp sạc:\r\n\r\nDùng 22 giờ - Sạc 2 giờ\r\nCổng sạc:\r\n\r\nType-C\r\nCông nghệ âm thanh:\r\n\r\nActive Noise CancellationMeridian\r\nTương thích:\r\n\r\nAndroid, iOS (iPhone, iPad), Windows\r\nỨng dụng kết nối:\r\n\r\nTONE Free\r\nTiện ích:\r\n\r\nChống nước IPX4Chống ồnSạc nhanh\r\nHỗ trợ kết nối:\r\n\r\nBluetooth 5.2\r\nĐiều khiển bằng:\r\n\r\nCảm ứng chạm\r\nHãng\r\n\r\nLG.', '1640436865.jpeg', 10, 5, 14, 1, 0),
(50, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds Live R180', 1990000, 'Thời gian tai nghe:\r\n\r\nDùng 6 giờ - Sạc 1 giờ\r\nThời gian hộp sạc:\r\n\r\nDùng 21 giờ - Sạc 1 giờ\r\nCổng sạc:\r\n\r\nType-C\r\nCông nghệ âm thanh:\r\n\r\nActive Noise Cancellation\r\nTương thích:\r\n\r\nAndroid, iOS (iPhone, iPad), Windows\r\nỨng dụng kết nối:\r\n\r\nBluetooth TWS\r\nTiện ích:\r\n\r\nCó mic thoạiSử dụng độc lập 1 bên tai nghe\r\nHỗ trợ kết nối:\r\n\r\nBluetooth 5.0\r\nĐiều khiển bằng:\r\n\r\nCảm ứng chạm\r\nHãng\r\n\r\nSamsung.', '1640436957.jpg', 20, 5, 1, 1, 1),
(51, 'Tai nghe Bluetooth True Wireless OPPO ENCO Air', 1490000, 'Thời gian tai nghe:\r\n\r\nDùng 4 giờ - Sạc 1.5 giờ\r\nThời gian hộp sạc:\r\n\r\nDùng 24 giờ - Sạc 1.5 giờ\r\nCổng sạc:\r\n\r\nType-C\r\nCông nghệ âm thanh:\r\n\r\ncodecAAC\r\nTương thích:\r\n\r\nAndroidiOS (iPhone)\r\nTiện ích:\r\n\r\nChống nước IPX4Kết nối 1 chạm Fast PairSử dụng độc lập 1 bên tai ngheTrợ lý ảo google\r\nHỗ trợ kết nối:\r\n\r\nBluetooth 5.2\r\nĐiều khiển bằng:\r\n\r\nCảm ứng chạm\r\nHãng\r\n\r\nOPPO.', '1640437041.jpeg', 20, 5, 3, 1, 0),
(52, 'Cáp Type C - Lightning 2m Apple MQGH2', 990000, 'Chức năng\r\n\r\nSạcTruyền dữ liệu\r\nĐầu vào\r\n\r\nUSB Type-C\r\nĐầu ra\r\n\r\nLightning\r\nĐộ dài dây\r\n\r\n2 m\r\nCông suất tối đa\r\n\r\n87 W\r\nSản xuất tại\r\n\r\nTrung Quốc\r\nThương hiệu của\r\n\r\nMỹ\r\nHãng\r\n\r\nApple.', '1640437134.jpeg', 20, 6, 2, 1, 0),
(53, 'Cáp Type C - Lightning 1m Apple MM0A3 ', 590000, 'Cáp Type C - Lightning 1m Apple MM0A3 ', '1640437175.jpeg', 20, 6, 2, 1, 0),
(54, 'Cáp Type C SuperVOOC 1m OPPO DL129', 190000, 'Công nghệ/Tiện ích\r\n\r\nSạc nhanh VOOC\r\nChức năng\r\n\r\nSạcTruyền dữ liệu\r\nĐầu vào\r\n\r\nUSB Type-A\r\nĐầu ra\r\n\r\nType C: 10V - 6.5A\r\nĐộ dài dây\r\n\r\n1 m\r\nCông suất tối đa\r\n\r\n65 W\r\nSản xuất tại\r\n\r\nTrung Quốc\r\nThương hiệu của\r\n\r\nTrung Quốc', '1640437242.jpg', 20, 6, 3, 1, 0),
(55, 'Cáp 3 đầu 3 Micro 1 Type-C 1.3 m Samsung MN930G', 400000, 'Chức năng\r\n\r\nSạcTruyền dữ liệu\r\nĐầu vào\r\n\r\nUSB Type-A\r\nĐầu ra\r\n\r\n3 cổng: 2A\r\nĐộ dài dây\r\n\r\n1.3 m\r\nSản xuất tại\r\n\r\nViệt Nam\r\nThương hiệu của\r\n\r\nHàn Quốc', '1640437316.jpg', 20, 6, 1, 1, 0),
(56, 'sạc dự phòng Polymer 10.000 mAh Type C PD QC3.0 OPPO PBT02 ', 686000, 'Hiệu suất sạc:\r\n\r\n65%\r\nDung lượng pin:\r\n\r\n10.000 mAh\r\nThời gian sạc đầy pin:\r\n\r\n10 - 11 giờ (dùng Adapter 1A)5 - 6 giờ (dùng Adapter 2A)\r\nNguồn vào:\r\n\r\nType C: 5V - 3A, 9V - 2A\r\nNguồn ra:\r\n\r\nType-C PD: 5V - 3A, 9V - 2A, 12V - 1.5AUSB QC: 5V - 2.4A, 9V - 2A, 12V - 1.5A\r\nLõi pin:\r\n\r\nPolymer\r\nCông nghệ/Tiện ích:\r\n\r\nĐèn LED báo hiệuPower DeliveryQualcomm Quick Charge\r\nKích thước:\r\n\r\nDài 15 cm - Rộng 7.2 cm - Dày 1.5 cm\r\nTrọng lượng:\r\n\r\n273 g\r\nThương hiệu của:\r\n\r\nTrung Quốc\r\nSản xuất tại:\r\n\r\nTrung Quốc\r\nHãng\r\n\r\nOPPO. ', '1640437411.jpg', 20, 7, 3, 1, 1),
(57, 'Xiaomi Band 5', 590000, 'Màn hình:\r\n\r\nAMOLED1.1 inch\r\nThời lượng pin:\r\n\r\nKhoảng 14 ngày\r\nKết nối với hệ điều hành:\r\n\r\nAndroid 5.0 trở lêniOS 10 trở lên\r\nMặt:\r\n\r\nKính cường lực46.95 mm\r\nDây:\r\n\r\n22.6 cm\r\nTính năng cho sức khỏe:\r\n\r\nChế độ luyện tậpTheo dõi giấc ngủTính quãng đường chạyĐo nhịp timĐếm số bước chân\r\nTiện ích:\r\n\r\nBáo thứcDự báo thời tiếtRung thông báoThay mặt đồng hồTừ chối cuộc gọiĐiều khiển chụp ảnhĐồng hồ bấm giờ\r\nHãng\r\n\r\nXiaomi. ', '1640437502.jpg', 20, 8, 6, 1, 0),
(58, 'Điện thoại Samsung Galaxy A02', 2500000, 'Màn hình:\r\n    PLS TFT LCD 6.5\" HD+\r\n\r\n    Hệ điều hành:\r\n    Android 10\r\n\r\n    Camera sau:\r\n    Chính 13 MP & Phụ 2 MP\r\n\r\n    Camera trước:\r\n    5 MP\r\n\r\n    Chip:\r\n    MediaTek MT6739W\r\n\r\n    RAM:\r\n    3 GB\r\n\r\n    Bộ nhớ trong:\r\n    32 GB\r\n\r\n    SIM:\r\n    2 Nano SIM Hỗ trợ 4G\r\n\r\n    Pin, Sạc:\r\n    5000 mAh 7.8 W', '1642752895.jpg', 10, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `matk` int(11) NOT NULL,
  `tentk` varchar(32) NOT NULL,
  `matkhau` varchar(512) NOT NULL,
  `ho` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  `sodt` varchar(10) NOT NULL,
  `gioitinh` varchar(8) NOT NULL,
  `diachi` varchar(256) NOT NULL,
  `loaitaikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`matk`, `tentk`, `matkhau`, `ho`, `ten`, `sodt`, `gioitinh`, `diachi`, `loaitaikhoan`) VALUES
(46, 'admin', '4297f44b13955235245b2497399d7a93', 'Trần Quốc', 'Cường', '0941123123', 'Nam', '123 đường ABC', 1),
(47, 'cuong', '4297f44b13955235245b2497399d7a93', 'Trần Quốc', 'Cường', '0125195322', 'Nam', '321 Nguyen Van Cu', 2),
(50, 'customer', '4297f44b13955235245b2497399d7a93', '', 'customer', '0122174566', 'Nam', 'Hẻm 311, Đường Nguyễn Văn Cừ, An Hòa', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `matt` int(11) NOT NULL,
  `madh` int(11) NOT NULL,
  `sotien` float NOT NULL,
  `thoigian` int(11) NOT NULL,
  `phuongthuctt` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaTH` int(3) NOT NULL,
  `TenTH` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaTH`, `TenTH`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Oppo'),
(4, 'Asus'),
(5, 'Vivo'),
(6, 'Xiaomi'),
(7, 'Nokia'),
(8, 'Realmi'),
(9, 'HP'),
(10, 'Lenovo'),
(11, 'Acer'),
(12, 'DELL'),
(13, 'MSI'),
(14, 'LG'),
(15, 'MSI');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`Maloai`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD KEY `madh` (`madh`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`maloaitk`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `maloai` (`maloai`),
  ADD KEY `math` (`math`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`matk`),
  ADD KEY `loaitaikhoan` (`loaitaikhoan`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`matt`),
  ADD KEY `madh` (`madh`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaTH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `Maloai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `maloaitk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `matt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MaTH` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `taikhoan` (`matk`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `danhmucsanpham` (`Maloai`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`math`) REFERENCES `thuonghieu` (`MaTH`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`loaitaikhoan`) REFERENCES `loaitaikhoan` (`maloaitk`);

--
-- Các ràng buộc cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `thanhtoan_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
