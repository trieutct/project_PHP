-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 24, 2022 lúc 12:09 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlysinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(20) NOT NULL,
  `MaSanPham` varchar(20) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `Images` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `MoTa` varchar(2000) NOT NULL,
  `DaTe` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `MaSanPham`, `TenSanPham`, `Images`, `Price`, `MoTa`, `DaTe`) VALUES
(2, 'MA1', 'sdsd', 'macity.jpg', 1000, 'sd', '2022-06-21 23:34:30'),
(3, 'AO1', 'Áo phông cổ tròn', 'ao.png', 148000, 'Đặc biệt, những mẫu thiết kế này còn áp dụng để may áo phông nam cho người da đen, các anh chàng có da “bánh mật”. Hiệu quả của những chiếc áo phông này chủ yếu che đi khuyết điểm trên cơ thể, đồng th', '2022-06-22 16:42:18'),
(4, 'AO2', 'Áo phông cổ trụ', 'pasted image 0.png', 200000, 'Với thiết kế cổ trụ quen thuộc, những chiếc áo phông mang đến một luồng gió mới cho các chàng trai của Coolmate. Lợi ích của những chiếc cổ trụ là mang đến sự gọn gàng, không gây gò bó cho người mặc, ', '2022-06-22 16:42:49'),
(5, 'AO3', ' Áo phông tay lỡ form rộng', 'aop.png', 150000, 'Đối với mẫu áo này, người mặc có thể sử dụng ở mùa đông hay mùa hè, bởi thiết kế tay lỡ dễ sử dụng. Thậm chí các mẫu áo phông tay lỡ còn không giới hạn vóc dáng của bạn, bạn là chàng trai có ngoại hìn', '2022-06-22 16:43:49'),
(6, 'AO4', 'Áo phông Ulzzang', 'aw.png', 250000, 'Đa phần kiểu áo này có nhiều hoạt tiết trên mặt áo phía trước hoặc sau, màu sắc sử dụng thường là trắng - đen hoặc màu sắc theo sự yêu thích của người dùng. Form áo sẽ rộng hơn so với các áo phông thông thường, các chàng trai có thể kết hợp với quần short hoặc quần bò, các bạn nữ có thể mặc thành style “giấu quần”. ', '2022-06-22 16:44:42'),
(7, 'AO5', 'Áo phông Unisex', 's.png', 100000, 'Unisex hay còn được hiểu là dòng áo phông sử dụng cho cả nam và nữ, Free size cho tất cả mọi người. Do đó mà hiện nay các shop bán hàng Unisex phát triển khá nhiều bởi sự đa dạng này, thậm chí những chiếc áo này còn phù hợp hết với tất cả dáng người từ thấp, cao, béo, gầy. Hơn nữa, những mẫu áo này thường rất đa năng, chúng có thể được sử dụng để mặc khi đi làm, đi chơi, đi học đều khá hợp lý. ', '2022-06-22 16:45:07'),
(8, 'AO6', 'Áo phông Hàn Quốc', 'd.png', 139000, 'Tuy nhiên lại không lựa chọn áo phông nam cho người da đen, bởi chúng có thể khiến bạn trở nên tối màu hơn, tốt hơn hết là các “ông” có làn da sáng hãy bon chen nhé. ', '2022-06-22 16:46:04'),
(11, 'dsadsd', 'sdsđ', 'tc.jpg', 10000, '', '2022-06-23 21:23:58'),
(12, 'Q1', 'Quần kaki nam ống suông', 'quankaki.jpg', 200000, 'Nam giới thường xuyên lựa chọn item này bởi sự thoải mái mà chiếc quần nam này mang lại. Không cầu kỳ như nữ giới, nam giới luôn hướng tới sự đơn giản và phải tạo cảm giác thoải mái nhất cho họ. Một chiếc quần nam kaki ống suông sẽ đáp ứng được những tiêu chí bền - rẻ- đẹp cho các chàng trai. Với kiểu dáng với đơn giản không kén chọn người mặc, gam màu trung tính giúp bạn có thể kết hợp với những mẫu áo khác nhau như áo thun nam trơn, áo polo nam hay áo cá sấu nam lacoste ... Khi kết hợp quần kaki nam ống suông với áo thun nam bạn đừng quên mix cùng một đôi giày sneaker thời trang nhé! Set đồ có thể diện đi làm, đi chơi hay đi leo núi đều rất fashion.', '2022-06-23 22:29:18'),
(13, 'Q2', 'Quần kaki nam công sở', 'q2.jpg', 150000, 'Những chiếc quần kaki nam công sở mang xu hướng màu sắc trẻ trung khi kết hợp với áo thun nam, áo thun có cổ ... Quần kaki tối màu sẽ dễ dàng kết hợp với áo sơ mi sáng màu hoặc áo polo nam xanh rêu, cam trẻ trung.', '2022-06-23 22:30:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` int(20) NOT NULL,
  `TaiKhoan` varchar(20) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `Permission` int(10) DEFAULT NULL,
  `DaTe` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `TaiKhoan`, `MatKhau`, `SoDienThoai`, `DiaChi`, `Permission`, `DaTe`) VALUES
(7, 'trieu', '517697eb0e931c8a84682d125b213709', '0914590356', 'xã Thụy Trình - huyện Thái Thụy - tỉnh Thái Binh ', 1, '2022-06-15 22:30:11'),
(10, 'admin', '517697eb0e931c8a84682d125b213709', '', '', 3, '2022-06-15 22:39:13'),
(11, 'trieu123', '517697eb0e931c8a84682d125b213709', '0941590356', 'Thái Bình', 2, '2022-06-15 22:52:20'),
(17, 'lananh', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 1, '2022-06-17 11:00:00'),
(34, 'a', '0cc175b9c0f1b6a831c399e269772661', '', '', 0, '2022-06-17 21:51:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `TaiKhoan` (`TaiKhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
