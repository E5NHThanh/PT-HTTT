-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2023 lúc 04:04 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `camera`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendongmay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendongmay`) VALUES
(1, 'Sony'),
(2, 'Canon'),
(3, 'Fujifilm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `macdinh` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi_id` int(11) NOT NULL,
  `ngay` datetime NOT NULL,
  `tongtien` float NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
--

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmathang` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `giagoc` float NOT NULL,
  `giaban` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL,
  `luotmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`id`, `tenmathang`, `mota`, `giagoc`, `giaban`, `soluongton`, `hinhanh`, `danhmuc_id`, `luotxem`, `luotmua`) VALUES
(1, 'Sony a7C Mirrorless Camera ', 'Số mẫu: ILCE-7C\r\nCảm biến: 24,2MP full frame Exmor R CMOS BSI\r\nBộ xử lý hình ảnh: BIONZ X\r\nĐiểm AF: AF theo pha 623 điểm, AF tương phản 425 điểm\r\nPhạm vi ISO: 100-51.200 (exp . 50-204.800)\r\nChế độ đo sáng: Nhiều phân đoạn, Cân bằng trung tâm, Điểm, Trung bình, Đánh dấu\r\nVideo : 4K UHD lên tới 30p\r\nKính ngắm: EVF, 2.359k điểm\r\nBộ nhớ thẻ: 1x SD/SDHC/SDXC, UHS-II\r\nLCD: Màn hình cảm ứng đa góc 3 inch, 921k dấu chấm\r\nSố lần chụp tối đa: 10 khung hình/giây, 115 ảnh thô, 223 ảnh JPEG\r\nKhả năng kết nối: Wi -Fi\r\nKích thước: 124,0 x 71,1 x 59,7mm\r\nTrọng lượng: 503g ( chỉ phần thân)\r\n', 65000000, 65000000, 100, 'a7c.jpg', 1, 0, 0),
(2, 'Máy ảnh A7s', 'Cảm biến Full Frame 35mm Exmor™ CMOS 12.2MP\r\nDải nhạy sáng ISO rộng (ISO 50 - 409,600*2) và phạm vi hoạt động ấn tượng\r\nCảm biến Full Frame đầu tiên trên thế giới có khả năng xuất điểm ảnh đầy đủ mà không cần quá trình ghép điểm ảnh cho quay phim và đầu ra Video Full HD/4K *3 *4\r\nHỗ trợ các chức năng quay phim chuyên nghiệp như Picture Profile, S-Log2 gamma, mã định thời gian & nhiều hơn nữa\r\nBộ xử lý hình ảnh BIONZ X™\r\nKính ngắm XGA OLED Tru-Finder độ phân giải cao với tương phản vượt trội\r\n', 75000000, 75000000, 20, 'a7s.jpg', 1, 0, 0),
(3, 'Máy ảnh A7 Mark II', '- Cảm biến: Full-Frame\r\n- Dải ISO: 100 - 51200 (mở rộng 50 - 204800)\r\n- Độ phân giải: 24.2MP\r\n- Kết nối không dây: WiFi, bluetooth\r\n- Màn hình LCD cảm ứng 3.0\r\n- Quay video: 4k/30p\r\n- Tốc độ chụp liên tiếp: 10 fps/s\r\n- Trọng lượng: 650g (Body)\r\n\r\n', 45000000, 45000000, 20, 'sonya72.jpg', 1, 0, 0),
(4, 'Sony Alpha a9 Mirrorless Camera Body \r\n\r\n', 'Sony A9 là chiếc máy ảnh sở hữu những công nghệ tối tân và đỉnh cao nhất của Sony ở thời điểm ra mắt. Máy có tốc độ chụp liên tiếp lên tới 20 khung hình/giây, thể hiện rõ tham vọng của Sony trong việc lấn sân vào mảng máy ảnh chuyên chụp thể thao để ', 82990000, 80000000, 3, 'sonya9.jpg', 1, 0, 0),
(5, 'Sony a7 III Mirrorless Camera', 'Sony vừa giới thiệu máy ảnh Sony A7 Mark III, kế thừa thành công từ người tiền nhiệm A7 Mark II với những cải tiến đáng kể cho chất lượng hình ảnh cũng như khả năng quay video. Khả năng xử lý ảnh được cải thiện đáng kể và đáng tin cậy hơn. Hệ thống lấy nét Hybrid AF nhanh hơn với 693 điểm lấy nét theo pha trong đó có có 425 điểm lấy nét tương phản, nhanh chóng bắt nét đối tượng trong điều kiện ánh sáng khác nhau và phức tạp cũng khả năng lấy nét theo đối tượng hiệu quả hơn.', 46990000, 46990000, 22, 'sonya73.jpg', 1, 0, 0),
(6, 'Sony A6000', 'Dòng máy ảnh gọn nhẹ Alpha A6000 đến từ Sony được trang bị bộ xử lý BIONZ X mới nhất với công nghệ 4D FOCUS lấy nét tự động cực nhanh, cho ra đời những bức hình sắc nét, chân thực, độ nhiễu tối thiểu.', 20000000, 15000000, 11, 'sonya6000.jpg', 1, 0, 0),
(7, 'Canon EOS 5D Mark III ', 'Canon EOS 5D Mark III là máy ảnh DSLR có hiệu suất hoạt động cao với cảm biến Full-Frame 22.3MP. Kết hợp với bộ xử lý hình ảnh DIGIC 5+ tạo ra ảnh có độ phân giải cao và video Full HD 1080p có tốc độ 30fps. Bên cạnh đó, Canon EOS 5D Mark III còn có màn hình LCD 3.2 inch, tự động lấy nét nhanh và hệ thống lấy nét tự động lên đến 61 điểm', 15000000, 15000000, 30, '5d3.jpg', 2, 0, 0),
(8, 'Canon EOS 6D ', 'Canon EOS 6D kèm ống kính Canon EF 50mm STM được trang bị bộ cảm biến CMOS 20.2 megapixel với chíp xử lý hình ảnh Digic 5+ mạnh mẽ, giúp cho khả năng chụp hình ảnh sống động với độ nhạy sáng mở rộng lên đến ISO 102400. Với hệ thống lấy nét tự động 11 điểm chính xác và được tăng cường với vùng lấy nét chữ thập trung tâm, giúp cho việc lấy nét trong điều kiện ánh sáng thấp chính xác hơn. Ngoài ra, máy còn được trang bị thêm Wi-Fi tích hợp và hỗ trợ GPS. Với cảm biến CMOS full-frame 20.2 megapixel, Canon EOS 6D sẽ giúp cho bạn chụp ảnh với chất lượng vượt trội và hình ảnh cực kì chi tiết. Các lớp microlens không có khoảng cách, Cấu trúc đi-ốt quang điện hoàn toàn mới và bộ cảm biến CMOS được gắn chíp mạch giảm nhiễu giúp cho các chi tiết hình ảnh luôn sạch và rõ nét, thậm chí ngay cả khi cài đặt với chế độ ISO cao và phơi sáng lâu.', 14000000, 14000000, 5, '6d.jpg', 2, 0, 0),
(9, 'Máy ảnh Canon 6D Mark II', 'Máy ảnh Canon 6D Mark II . Là dòng máy ảnh Fullframe của Canon, được ưa chuộng nhất hiện nay, màn hình cảm ứng lật xoay, có wifi, quay Full HD 60 fps. Hướng về các bạn chơi ảnh chuyên nghiệp hoặc làm dịch vụ - Thương hiệu: Canon ( Made In Japan ) - Chức năng: hoàn hảo - Hình thức: mới 98% - Phụ kiện: thân máy 6d mark II + pin + sạc + dây đeo + Nắp body + tặng thẻ nhớ 16gb', 20000000, 20000000, 4, '6d2.jpg', 2, 0, 0),
(10, 'Máy ảnh canon 750D', 'Máy ảnh canon 750D kèm kit 18-55STM - Máy ảnh Canon ống kính rời mới nhất thế hệ 2015 - Cảm biến thế hệ mới Hybrid CMOS APS-C 24.2MPs - Bộ xử lý DIGIC VI 14 bit, hệ thống AF 19 điểm - ISO tới 12.800, tốc độ chụp liên tiếp 5 hình/s - Hệ thống đo sáng thế hệ mới iFCL 63 vùng ảnh - Quay phim Full HD với khả năng lấy nét liên tục - Kết nối Wifi, NFC với các thiết di động thông minh', 1200000, 12000000, 12, '750d.png', 2, 0, 0),
(11, 'Máy ảnh Canon EOS 850D\r\n', 'Canon EOS 850D trang bị các tính năng cao cấp phù hợp với dòng máy ảnh chất lượng cao. Đây là mẫu máy hoàn hảo cho những nhiếp ảnh gia chuyên nghiệp. Theo đó, máy ảnh DSLR này kết hợp cảm biến CMOS APS-C 24,1MP với chế độ quay 4K chuyên nghiệp. Trên kính ngắm có tất cả 45 điểm lấy nét, màn hình live view sử dụng Dual Pixel CMOS AF. Ngoài ra, máy ảnh còn có khả năng kết nối Wifi cùng giao diện thân thiện với người dùng. Canon EOS 850D với khóa tiêu điểm chính xác, nhanh chóng Khi chụp ở chế độ live view, Dual Pixel CMOS AF sẽ giúp bạn lấy nét tự động nhanh và chính xác hơn. Chế độ Eye Recogn AF tập trung va theo dõi mắt chủ thể trên màn hình Live View.', 15800000, 15800000, 6, '850d.jpg', 2, 0, 0),
(12, 'Máy ảnh Canon 4000D', 'Máy ảnh Canon 4000D + kit 18-55mm. Máy nhỏ gọn, cực dễ xài, thích hợp cho các bạn mới tập chơi hoặc đi du lịch. Máy có tính năng Wifi. chụp xong bắn qua điện thoại ngay. - Thương hiệu: Canon - Chức năng: hoàn hảo - Hình thức: mới 98% - Phụ kiện: máy + lens 18-55mm + pin + sạc + dây đeo + thẻ nhớ 8gb', 6650000, 6650000, 16, '4000d.jpg', 2, 0, 0),
(13, 'Máy ảnh Canon EOS R', 'Máy Ảnh Canon EOS R + Ống Kính Canon RF 24-105mm F4 L IS USM - Cảm biến CMOS full-frame 30,3MP - Bộ xử lý hình ảnh DIGIC 8 - Video 4KHD UHD; C-Log & 10-bit HDMI Out - Dual Pixel CMOS AF, 5655 điểm AF - Kính ngắm điện tử OLED 3.69m-Dot - Màn hình cảm ứng LCD xoay 3.15 \"2.1m-Dot - ISO 50-102400 - Wi-Fi và Bluetooth, Khe cắm thẻ SD UHS-II - Phụ kiện đi kèm: Dây đeo cổ, Bộ sạc pin LC-E6E, Pin LP-E6N, Cáp AC, Cáp giao diện IFC-100U, Hướng dẫn sử dụng, Phiếu bảo hành', 88000000, 88000000, 20, 'canon_r.jpg', 2, 1, 0),
(14, 'Máy Ảnh Canon EOS R6', 'Cảm biến CMOS 20MP full frame - Chip xử lý hình ảnh DIGIC X - Quay video 4K60p và FHD 120p 10bit trong máy - Ổn định hình ảnh sensor-shift 5 trục - Chụp liên tiếp 12 fps (màn trập cơ) hoặc 20 fps (màn trập điện tử, không gây ồn) - Màn hình LCD 3.15 inch, 2.1 triệu điểm - EVF OLED 5.76 triệu điểm, phóng đại 0.76x - Kết nối Wi-Fi 5Ghz và 2.4Ghz, Bluetooth, có tùy chọn Bộ phát WFT-R10 - 2 khay thẻ nhớ: 1x CFExpress, 1x SD UHS-II - Pin LP-E6NH; sạc USB qua bộ sạc PD-E1', 75000000, 75000000, 10, 'eos_r6.jpg', 2, 0, 0),
(15, 'Máy ảnh Fujifilm X-A20\r\n\r\n', 'Máy ảnh Fujifilm X-A20 có thiết kế nhỏ gọn, di động giúp máy ảnh trở thành sự lựa chọn của nhiều người dùng yêu thích du lịch. Máy ảnh được trang bị loạt tính năng hấp dẫn cùng ống kính OX PZ XC15-45mm F3.5-5.6 đi kèm hứa hẹn sẽ mang đến cho bạn những trải nghiệm thú vị.', 9000000, 9000000, 30, 'xa20.jpg', 3, 0, 0),
(16, 'Máy ảnh Fujifilm X-E3', 'Cảm biến: 24M X-Trans CMOS III\r\n- Chip xử lý: X-Processor Pro\r\n- Tốc độ chụp ảnh: 8fps/14fps Burst Shooting\r\n- Màn hình: 3inch cảm ứng đa điểm\r\n- ISO 100 -51200\r\n- Quay phim: 4K 30p 100Mbps\r\n- Ống ngắm EVF 2.36 triệu điểm\r\n- Kết nối: 802.11b/g/n + Bluetooth LE\r\n- Cổng USB, HDMI\r\n- Trọng lượng 337g\r\n\r\n', 12990000, 16900000, 5, 'xe3.jpg', 3, 0, 0),
(17, 'Máy ảnh Fujifilm Xh1', '•	Cảm biến: APS-C\r\n•	Dải ISO: 200 to 12800 (Mở rộng lên 100 - 51200)\r\n•	Độ phân giải: 24.3MP\r\n•	Kết nối không dây:WiFi, bluetooth\r\n•	Màn hình LCD cảm ứng xoay lật 3\r\n•	Quay video: 4K/24p có chống rung 5 trục\r\n•	Tốc độ chụp liên tiếp: 40fps /s\r\n•	Trọng lượng: 673 g (Body+pin+thẻ nhớ)\r\n\r\n', 21200000, 21200000, 9, 'xh1.jpg', 3, 0, 0),
(18, 'Máy ảnh Fujifilm Xt3', '•	8K 30p, 4K 60p, FHD 240p 10-bit Video\r\n•	Cảm biến BSI 40MP APS-C X-Trans5\r\n•	Chụp đa điểm Pixel Shift 160MP\r\n•	Khe cắm thẻ CFexpress Loại B & SD UHS-II\r\n\r\n', 31990000, 29990000, 4, 'xt3.jpg', 3, 0, 0),
(19, 'Máy ảnh Fujifilm Xt20', 'Chiếc máy ảnh không gương lật Fujifilm X-T20 thuộc dòng X Series của Fujifilm và là phiên bản với thiết kế kiểu dáng đẹp cho khả năng chụp hình ấn tượng. Đây là phiên bản được kế thừa rất nhiều tính năng từ chiếc flagship X-T2, tích hợp cảm biến APS-C có độ phân giải 14MP X-Trans CMOS III, bộ xử lý hình ảnh X-Processor Pro cùng hệ thống lấy nét tự động tiên tiến giúp ghi lại hình ảnh có độ sắc nét nổi bật và ấn tượng. Sự kết hợp hoàn hảo giữa cảm biến và bộ xử lý hình ảnh cho phép mở rộng độ nhạy sáng lên đến ISO 51200, tốc độ chụp ảnh liên tiếp lên đến 14fps. Máy ảnh Fujifilm X-T20 còn có khả năng quay video UHD 4 K 30fps với thời lượng lên đến 10 phút mỗi clip. Đặc biệt khi chụp đối tượng chuyển động, hiệu suất tự động lấy nét liên tục cho độ chính xác cao cùng với chế độ Advanced SR Auto cho khả năng chụp tự động với khả năng nhận dạng đối tượng thông minh.', 13900000, 10900000, 2, 'xt20.jpeg', 3, 0, 0),
(20, 'Máy Ảnh Fujifilm X-T30', 'Cảm biến X-Trans CMOS 4 26.1MP\r\n- Bộ xử lý X với CPU Quad\r\n- Hệ thống lấy nét tự động theo pha 2.16m\r\n- Chụp liên tiếp 8 fps với màn trập cơ\r\n- Quay video 4K 30fps, F-log DCI 4K 10bit\r\n- Màn hình cảm ứng tinh thể lỏng 3.0\" 1.04M điểm ảnh\r\n- 16 loại hiệu ứng giả lập phim\r\n- Chế độ SR Auto nâng cao\r\n- Kết nối Wi-Fi, Bluetooth tích hợp\r\n- Kích thước: 118.4 x 82.8 x 46.8 mm\r\n- Trọng lượng: 383 g\r\n\r\n', 21990000, 20600000, 5, 'xt30.jpg', 3, 0, 0),
(21, 'Máy ảnh Fujifilm Xt100', ' Cảm biến CMOS APS-C 24,2MP\r\n- 2.36 m-Dot 0.62x OLED EVF\r\n- Màn hình cảm ứng LCD 3,0 inch\r\n- Video UHD 4K / 15p và Full HD 1080 / 60p\r\n- Bluetooth và Wi-Fi\r\n- Hệ thống lấy nét tự động lấy nét 91 điểm\r\n- Mở rộng ISO 100-51200\r\n- Chế độ tự động và chế độ mô phỏng phim SR +\r\n', 13490000, 11990000, 10, 'xt100.jpg', 3, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sđt` varchar(10) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `loai` tinyint(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sđt`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`) VALUES
(2, 'nhthanh@gmail', '0379111556', '0a91bb60e81c66a8799f3699925d41d2', 'Nguyễn Hoài Thanh', 1, 1, 'avatar.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`),
  ADD KEY `diachi_id` (`diachi_id`);

--
-- Chỉ mục cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `mathang` (`id`),
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`id`) REFERENCES `donhang` (`id`);

--
-- Các ràng buộc cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mathang_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
