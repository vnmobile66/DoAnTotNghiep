-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 17, 2023 lúc 06:16 AM
-- Phiên bản máy phục vụ: 10.5.20-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id21438285_hoangphat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_tbl`
--

CREATE TABLE `banner_tbl` (
  `banner_id` int(11) NOT NULL,
  `banner_images` varchar(255) NOT NULL,
  `banner_show` tinyint(4) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner_tbl`
--

INSERT INTO `banner_tbl` (`banner_id`, `banner_images`, `banner_show`, `create_at`) VALUES
(1, 'banner1.jpg', 1, '2023-11-10 08:14:27'),
(2, 'banner2.jpg', 1, '2023-11-10 08:14:37'),
(3, 'banner3.jpg', 1, '2023-11-10 08:14:48'),
(4, 'banner4.jpg', 1, '2023-11-10 08:14:58'),
(6, 'IMG_1657180376537_1657180678799.jpg', 1, '2023-11-17 06:30:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brand_id` int(11) NOT NULL,
  `brand_name` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand_tbl`
--

INSERT INTO `brand_tbl` (`brand_id`, `brand_name`, `category_id`, `brand_image`, `create_at`) VALUES
(1, 'Apple', 22, 'apple_logo.png', '2023-11-02 08:31:31'),
(2, 'SamSung', 22, 'samsung.png', '2023-11-02 08:33:48'),
(3, 'Oppo', 22, 'oppo.jpg', '2023-11-02 08:34:37'),
(4, 'Acer', 21, 'acer.png', '2023-11-02 09:39:53'),
(5, 'Dell', 21, 'dell.png', '2023-11-02 09:40:56'),
(6, 'MSI', 21, 'msi.png', '2023-11-02 09:41:56'),
(10, 'LOGITECH', 23, 'LOGITECH.png', '2023-11-08 13:02:54'),
(11, 'RAPOO', 23, 'RAPOO.png', '2023-11-08 13:07:00'),
(12, 'TPLINK', 23, 'TPLINK.png', '2023-11-08 13:20:49'),
(13, 'EZVIZ', 23, 'EZVIZ.png', '2023-11-08 13:41:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `carts_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`carts_id`, `users_id`, `products_id`, `products_qty`) VALUES
(50, 16, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`, `create_at`) VALUES
(21, 'Laptop', 'laptop-icon.png', '2023-11-01 14:14:33'),
(22, 'Điện thoại', 'dienthoai.png', '2023-11-01 14:19:13'),
(23, 'Camera', 'camera.png', '2023-11-01 14:25:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_name` text NOT NULL,
  `users_phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orders_id`, `tracking_no`, `users_id`, `users_name`, `users_phone`, `address`, `total_price`, `payment_mode`, `create_at`) VALUES
(15, 'HP60654197350', 5, 'Trương Ngọc Phúc', '0354197350', 'Cao Lanh', 60000000, 'COD', '2023-12-14 07:22:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `products_id`, `qty`, `price`, `orders_id`, `create_at`) VALUES
(16, 23, 1, 60000000, 15, '2023-12-14 07:22:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_tbl`
--

CREATE TABLE `products_tbl` (
  `products_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `products_name` text NOT NULL,
  `products_image` varchar(255) NOT NULL,
  `products_price_sales` float NOT NULL,
  `products_price` float NOT NULL,
  `products_qty` int(11) NOT NULL,
  `products_parameter` mediumtext NOT NULL,
  `products_describe` longtext NOT NULL,
  `deal` tinyint(4) NOT NULL DEFAULT 0,
  `active_homepage` tinyint(4) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products_tbl`
--

INSERT INTO `products_tbl` (`products_id`, `category_id`, `brand_id`, `products_name`, `products_image`, `products_price_sales`, `products_price`, `products_qty`, `products_parameter`, `products_describe`, `deal`, `active_homepage`, `create_at`) VALUES
(6, 21, 4, 'Acer Predator Helios 18', 'acer1.jpg', 120000000, 120000000, 50, '<p>Vi xử lý: Intel Core i9-13900HX.<br>Card màn hình: NVIDIA GeForce RTX 4080.<br>RAM: 32 GB (16 GB x2), DDR5, 5.600 MHz.<br>Ổ cứng: 2 TB (1 TB x 2) PCle NVMe SED SSD RAID.<br>Màn hình: Kích thước 18 inch, độ phân giải WQXGA (2.560 x 1.600 pixel), tần số quét 240 Hz.<br>Hệ điều hành: Windows 11.</p>', 'Đánh giá chi tiết laptop gaming ACER Predator Helios 18 PH18 71 94SJ\r\nLaptop ACER Predator Helios 18 PH18 71 94SJ là một trong những dòng laptop gaming mới nhất có trên thị trường, được trang bị cấu hình mạnh mẽ, thiết kế hầm hố, hiệu năng ấn tượng,...Nếu bạn đang tìm cho riêng mình dòng laptop gaming chất lượng cân được mọi tựa game thì ACER Predator Helios 18 sẽ là sự lựa chọn bạn không nên bỏ qua.\r\n', 0, 1, '2023-11-03 06:51:31'),
(7, 21, 4, 'Acer Nitro 16 Phoenix', 'acer2.webp', 26000000, 30000000, 41, '<p>- CPU: AMD Ryzen 5 7535HS<br>- Màn hình: 16\" IPS (1920 x 1200),165Hz<br>- RAM: 1 x 8GB DDR5 4800MHz<br>- Đồ họa: RTX 4050 6GB GDDR6 / AMD Radeon 660M<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home SL<br>- Pin: 4 cell 90 Wh Pin liền<br>- Khối lượng: 2.6kg<br>- Chuẩn AMD</p>', 'Đánh giá chi tiết laptop gaming Acer Nitro 16 Phoenix AN16-41-R5M4\r\nThương hiệu laptop đến từ Đài Loan không chỉ ghi dấu ấn trong những model laptop văn phòng mà còn hiển nhiên chiếm trọn niềm tin yêu của giới game thủ với dòng series laptop gaming tầm trung ăn khách Acer Nitro 5. Trở lại đường đua với model Acer Nitro 16 Phoenix AN16-41-R5M4, mang vẻ ngoài hầm hố đặc trưng của dòng laptop chơi game cùng sức mạnh nội tại siêu khủng hứa hẹn gây bão trong thời gian sắp tới.', 1, 1, '2023-11-03 07:05:37'),
(8, 21, 5, 'Dell Inspiron 16 5630', 'DellInspiron165630.webp', 28700000, 31000000, 45, '<p>- CPU: Intel Core i7-1360P<br>- Màn hình: 16\" WVA (1920 x 1200)<br>- RAM: 2 x 8GB Onbard DDR5 4800MHz<br>- Đồ họa: RTX 2050 4GB GDDR6 / Intel Iris Xe Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home SL + Office Home &amp; Student 2021<br>- Pin: 4 cell 54 Wh Pin liền<br>- Khối lượng: 1.9kg</p>', 'Laptop Dell Inspiron 16 5630 i5 1335U (71020244) sở hữu ngoại hình sang trọng có thể nói là \"điểm sáng\" trong những chiếc Ultrabook vào năm 2023 này, đi kèm với đó là hiệu năng mạnh mẽ từ con chip Intel thế hệ 13 hoàn toàn mới. Mẫu laptop học tập - văn phòng đến từ thương hiệu Dell này chắc chắn sẽ cho bạn những trải nghiệm thú vị nhất.', 1, 1, '2023-11-07 06:12:27'),
(9, 21, 6, 'MSI Modern 15 B7M-231VN', 'MSIModern15.webp', 19500000, 19500000, 50, '<p>- CPU: AMD Ryzen 5 7530U<br>- Màn hình: 15.6\" IPS (1920 x 1080)<br>- RAM: 1 x 16GB DDR4 3200MHz<br>- Đồ họa: Onboard AMD Radeon Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home<br>- Pin: 3 cell 40 Wh Pin liền<br>- Khối lượng: 1.7kg<br>- Chuẩn AMD</p>', 'Laptop MSI Modern 15 B7M R5 7530U (231VN) không chỉ sở hữu cấu hình mạnh mẽ mà còn có lối thiết kế mỏng nhẹ và thời trang, một lựa chọn phù hợp cho cả dân văn phòng lẫn các bạn học sinh hay sinh viên, cần một thiết bị để thực hiện các tác vụ thường ngày một cách trơn tru.', 0, 1, '2023-11-07 06:58:57'),
(10, 21, 6, 'MSI Stealth 16 Mercedes-AMG Motorsport A13VG', 'MSIStealth16Mercedes.webp', 78000000, 81000000, 49, '<p>- CPU: Intel Core i9-13900H<br>- Màn hình: 16\" OLED (3840 x 2400)<br>- RAM: 2 x 16GB DDR5 5200MHz<br>- Đồ họa: RTX 4070 8GB GDDR6 / Intel Iris Xe Graphics<br>- Lưu trữ: 2TB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home<br>- Pin: 4 cell 99 Wh Pin liền<br>- Khối lượng: 1.9kg<br>- Chuẩn Non-EVO</p>', 'Đánh giá chi tiết laptop gaming MSI Stealth 16 Mercedes AMG A13VG 289VN\r\nTại sự kiện Computex 2023 vừa qua, MSI vừa có màn comeback chấn động khi thông báo hợp tác với thương hiệu siêu xe hàng đầu Thế giới Mercedes. Màn bắt tay giữa hai gã khổng lồ thuộc hai ngành hàng khác nhau đương nhiên đã chiếm trọn spotlight trong sự kiện công nghệ lớn nhất hành tinh.', 1, 1, '2023-11-07 07:01:36'),
(11, 22, 1, 'iPhone 15 Pro Max', 'iPhone15ProMax.webp', 46000000, 51000000, 50, '', '<p>- Màu sắc: Titan Natural Natural Titanium</p><p>- Chính hãng, Mới 100%, Nguyên seal<br>- Màn hình: OLED Super Retina XDR<br>- Camera sau: 48MP, 12MP<br>- Camera trước: 12MP<br>- CPU: Apple A17 Bionic<br>- Bộ nhớ: 1TB<br>- Hệ điều hành: iOS</p>', 1, 1, '2023-11-07 07:08:08'),
(12, 22, 2, 'Galaxy Z Fold 5', 'GalaxyZFold5.webp', 40800000, 45000000, 40, '', '<p>- Chính hãng, Mới 100%, Nguyên seal<br>- Màn hình: - Chính 7.6\" & Phụ 6.2\"<br>- Dynamic AMOLED 2X<br>- Camera sau: 50MP, 12MP, 10MP<br>- Camera trước: 10MP, 4MP<br>- CPU: Snapdragon 8 Gen 2<br>- Bộ nhớ: 512GB<br>- RAM: 12GB<br>- Hệ điều hành: Android</p>', 1, 1, '2023-11-07 07:11:00'),
(13, 22, 2, 'Samsung Galaxy A05', 'GalaxyA05.webp', 3000000, 3100000, 49, '', '<p>- Chính hãng, Mới 100%, Nguyên seal<br>- Màn hình: 6.7\" PLS LCD<br>- Camera sau: 50MP, 2MP<br>- Camera trước: 13MP<br>- CPU: MediaTek Helio G85<br>- Bộ nhớ: 128GB<br>- RAM: 4GB<br>- Hệ điều hành: Android</p>', 1, 1, '2023-11-07 07:13:40'),
(14, 22, 3, 'OPPO Reno8 T', 'OPPOReno8T.jpg', 7500000, 8500000, 50, '', '<ul><li>Màn hình: AMOLED6.4\"Full HD+</li><li>Hệ điều hành: Android 13</li><li>Camera sau: Chính 100 MP &amp; Phụ 2 MP, 2 MP</li><li>Camera trước: 32 MP</li><li>Chip: MediaTek Helio G99</li><li>RAM: 8 GB</li><li>Dung lượng lưu trữ: 256 GB</li><li>SIM: 2 Nano SIMHỗ trợ 4G</li><li>Pin, Sạc: 5000 mAh 33 W</li></ul>', 1, 1, '2023-11-07 07:19:00'),
(15, 22, 1, 'iPhone 14 Pro Max', 'iPhone14ProMax.webp', 30000000, 39000000, 49, '', '<p>- Màu sắc: Tím Deep Purple</p><p>- Chính hãng, Mới 100%, Nguyên seal<br>- Màn hình: LTPO Super Retina XDR OLED - 120Hz<br>- Camera sau: 48MP, 2x 12MP<br>- Camera trước: 12MP<br>- CPU: A16 Bionic<br>- Bộ nhớ: 256GB<br>- RAM: 6GB<br>- Hệ điều hành: IOS</p>', 1, 1, '2023-11-07 07:22:40'),
(16, 23, 10, 'Webcam Logitech HD BRIO 100', 'LOGITECH-pink.webp', 700000, 1000000, 50, '', '<p>- Thiết kế bắt mắt với màu sắc tinh tế<br>- Độ phân giải Full HD 1080p đem đến cho bạn độ rõ ràng, cho cuộc gọi tốt hơn<br>- RightLight tăng độ sáng lên tới 50%, giảm bóng tối<br>- Được thiết kế cẩn thận cho cuộc sống làm việc tại nhà của bạn, màn che bảo mật tích hợp đem đến cho bạn sự riêng tư đáng tin cậy.<br>- Micrô tích hợp thuận tiện đảm bảo rằng bạn được nghe thấy rõ ràng trong cuộc gọi video</p>', 1, 1, '2023-11-08 13:05:11'),
(17, 23, 11, 'Webcam Rapoo XW170', 'rapoo-black.webp', 350000, 500000, 38, '', '<ul><li>Thiết kế nhỏ gọn, sang trọng - Tích hợp micro kép khử tiếng ồn sẽ đem lại cho người dùng những trải nghiệm tuyệt vời.</li><li>Trang bị ống kính có độ phân giải cao là 720P - hình ảnh vô cùng rõ ràng và chân thật.</li><li>Tích hợp một chiếc micrô kép khử tiếng ồn, có khả năng khử tiếng ồn tốt</li><li>Tốc độ khung hình lên đến 30fps và thiết bị có thể tự động lấy nét để có những hình ảnh chất lượng nhất.</li></ul>', 1, 1, '2023-11-08 13:10:50'),
(18, 23, 12, 'Camera TP-Link Tapo C200', 'tplink.webp', 500000, 600000, 50, '', '<p><br>- Video Độ Nét Cao: Độ phân giải 1080p rõ nét<br>- Chế Độ Quan Sát Ban Đêm Nâng Cao, khoảng cách lên đến 9 mét.<br>- Phát Hiện và Thông Báo Chuyển Động: Nhận thông báo nếu phát hiện điều gì đó đáng ngờ<br>- Báo Động Âm Thanh và Ánh Sáng<br>- Âm Thanh Hai Chiều: Giao tiếp với người khác bằng micrô và loa tích hợp<br>- Lưu Trữ An Toàn: Hỗ trợ khe thẻ nhớ MicroSD (tối đa 512GB)</p>', 1, 1, '2023-11-08 13:37:20'),
(19, 23, 13, 'EZVIZ CS-CB2', 'ezviz-camera.webp', 1500000, 2400000, 50, '', '<ul><li>Độ phân giải 1080p</li><li>Tầm nhìn hồng ngoại ban đêm (Lên đến 5 m / 16 ft)</li><li>Phát hiện chuyển động của con người</li><li>Trò chuyện hai chiều</li><li>Thời lượng pin lên đến 50 ngày¹ (pin sạc 2.000 mAh)</li><li>Camera nhỏ gọn vừa lòng bàn tay</li><li>Lắp đặt với đế nam châm</li><li>Hỗ trợ thẻ nhớ MicroSD (Tối đa 256 GB)</li></ul>', 1, 1, '2023-11-08 13:43:46'),
(20, 23, 10, 'Webcam Logitech BRIO 300', 'brio300.webp', 1550000, 1600000, 50, '', '<ul><li>Độ phân giải lên đến Full HD 1080p 30fps</li><li>Khả năng thu phóng 1x</li><li>Tầm nhìn chéo 70 độ</li><li>Mic đơn khử tiếng ồn&nbsp;</li><li>Kết nối USB-C Plug and Play</li><li>Có hỗ trợ phần mềm</li></ul>', 1, 1, '2023-11-08 13:48:18'),
(21, 21, 4, 'Laptop ACER Aspire 5 A514-55-5954', 'ACERAspire5.webp', 15000000, 20000000, 50, '<p>- CPU: Intel Core i5-1235U<br>- Màn hình: 14\" IPS (1920 x 1080)<br>- RAM: 8GB (4GB + 4GB Onboard) DDR4 2666MHz<br>- Đồ họa: Onboard Intel Iris Xe Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home<br>- Pin: 3 cell 50 Wh Pin liền<br>- Khối lượng: 1.4kg<br>- Chuẩn Non-EVO</p>', 'Laptop Acer Aspire 5 A514-55-5954 NX.K5BSV.001 là một trong những lựa chọn hàng đầu dành cho sinh viên cũng như nhân viên văn phòng. Với thiết kế tối giản nhưng vẫn vô cùng tinh tế cùng với hiệu năng mạnh mẽ nhờ CPU Intel Core i5 sẽ là trợ thủ đắc lực cho bạn trong công việc, học tập cũng như giải trí.', 1, 0, '2023-11-26 13:21:09'),
(22, 21, 4, 'ACER Nitro 5 Eagle', 'acernitro5.webp', 19000000, 26000000, 50, '<p>- CPU: Intel Core i5-11400H<br>- Màn hình: 15.6\" IPS (1920 x 1080),144Hz<br>- RAM: 1 x 8GB DDR4 3200MHz<br>- Đồ họa: RTX 3050 4GB GDDR6 / Intel UHD Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11<br>- Pin: 4 cell 57 Wh Pin liền<br>- Khối lượng: 2.2kg<br>- Chuẩn Non-EVO</p>', 'Là dòng laptop gaming của thương hiệu Acer, laptop Acer Nitro 5 Eagle AN515-57-54MV được trang bị chip i5 mạnh mẽ, card đồ họa NVIDIA GeForce RTX 3050, ram 8Gb cùng dung lượng lớn. Kết hợp với thiết kế đẹp và mạnh mẽ, đây sẽ là sự lựa chọn dành cho các game thủ trẻ và người làm công việc liên quan đến đồ họa.', 1, 0, '2023-11-26 13:23:36'),
(23, 21, 5, 'Dell XPS 13 Plus 9320', 'dellxps.webp', 60000000, 60000000, 49, '<p>- CPU: Intel Core i7-1360P<br>- Màn hình: 13.4\" WVA (3456 x 2160)<br>- RAM: 16GB Onboard LPDDR5 6400MHz<br>- Đồ họa: Onboard Intel Iris Xe Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home SL + Office Home &amp; Student 2021<br>- Pin: 3 cell 55 Wh Pin liền<br>- Khối lượng: 1.3kg<br>- Chuẩn Intel EVO</p>', 'Đang cập nhật', 0, 0, '2023-11-26 13:26:39'),
(24, 21, 6, 'MSI GF63 12UCX-841VN', 'gf63.webp', 17000000, 18000000, 50, '<p>- CPU: Intel Core i5-12450H<br>- Màn hình: 15.6\" IPS (1920 x 1080),144Hz<br>- RAM: 1 x 8GB DDR4 3200MHz<br>- Đồ họa: RTX 2050 4GB GDDR6 / Intel Iris Xe Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home<br>- Pin: 3 cell 53 Wh Pin liền<br>- Khối lượng: 1.8kg<br>- Chuẩn Non-EVO</p>', 'Đang cập nhật', 0, 0, '2023-11-26 13:32:40'),
(25, 22, 1, 'iPhone 16 Pro Max', 'tải xuống.webp', 0, 0, 50, '<p>Apple A18 Bionic</p>', 'Apple A18 Bionic', 0, 0, '2023-12-06 03:02:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` text NOT NULL,
  `users_phone` varchar(10) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_conscious` text NOT NULL,
  `users_city` text NOT NULL,
  `users_wards` text NOT NULL,
  `users_avt` varchar(255) DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_phone`, `users_password`, `users_conscious`, `users_city`, `users_wards`, `users_avt`, `role_as`, `create_at`, `update_at`) VALUES
(5, 'Trương Ngọc Phúc', '0354197350', '$2y$10$kc9B5OfSWvk7jRHnxlOdcOj6RstyzxsbAS5ZlJTEuZCMVWxnTjch.', 'Đồng Tháp', 'TP Cao Lãnh', 'Phường Hòa Thuận', 'IMG_20211205_220724.jpg', 1, '2023-11-06 12:24:29', '2023-11-06 12:24:29'),
(16, 'Trương Ngọc Phúc', '0354197355', '$2y$10$RVb0ZVi5qnCZElrYnCtG..K6MSKgMT.7QHegc.QQqDCKrRt47uVlu', '87', '866', '29892', '', 0, '2023-12-07 14:46:33', '2023-12-07 14:46:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner_tbl`
--
ALTER TABLE `banner_tbl`
  ADD PRIMARY KEY (`banner_id`);

--
-- Chỉ mục cho bảng `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `brand_categories` (`category_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`carts_id`),
  ADD KEY `carts_products` (`products_id`),
  ADD KEY `carts_users` (`users_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `users_orders` (`users_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `prod_orders` (`products_id`),
  ADD KEY `orders` (`orders_id`);

--
-- Chỉ mục cho bảng `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `category_products` (`category_id`),
  ADD KEY `brand_products` (`brand_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner_tbl`
--
ALTER TABLE `banner_tbl`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `carts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD CONSTRAINT `brand_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_products` FOREIGN KEY (`products_id`) REFERENCES `products_tbl` (`products_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `users_orders` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `orders` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_orders` FOREIGN KEY (`products_id`) REFERENCES `products_tbl` (`products_id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD CONSTRAINT `brand_products` FOREIGN KEY (`brand_id`) REFERENCES `brand_tbl` (`brand_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_products` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
