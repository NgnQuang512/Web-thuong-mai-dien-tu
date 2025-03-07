-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2025 at 04:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `create_at`, `bill_status`, `payment_type`, `user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `total`) VALUES
(37, '2025-03-07 15:39:45', '3', '1', 18, 'Nguyen Van A', 'nguyenvana@gmail.com', 'Dia chi C', '0000022222', 24000000),
(38, '2025-03-07 15:40:37', '1', '1', 18, 'Nguyen Van A', 'nguyenvana@gmail.com', 'Dia chi C', '0000022222', 169000000);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int NOT NULL,
  `bill_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_price` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `variant_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_id`, `product_price`, `product_name`, `product_img`, `variant_id`, `quantity`) VALUES
(45, 37, 5, 12000000, 'iPhone 14 128GB  | Chính hãng VN/A', 'img/1731641547-iphone-15-pro-max_3.webp', 45, 2),
(46, 38, 29, 19000000, 'Iphone 14 Pro Max', 'img/1732503940-anh1.png', 5, 5),
(47, 38, 30, 14800000, 'iPhone 12 Pro Max 128GB - Cũ Đẹp', 'img/1732507098-iPhone 12 Pro Max.jpg', 27, 5);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `category_id`) VALUES
(1, 'Iphone', '2024-11-13 03:03:33', 1),
(2, 'Samsung', '2024-11-13 03:03:33', 1),
(3, 'Xiaomi', '2024-11-13 03:03:33', 1),
(4, 'OPPO', '2024-11-13 03:03:33', 1),
(5, 'Vivo', '2024-11-13 03:03:33', 1),
(6, 'Realme', '2024-11-13 03:03:33', 1),
(7, 'ASUS', '2024-11-13 03:03:33', 1),
(8, 'TECHNO', '2024-11-13 03:03:33', 1),
(9, 'Nokia', '2024-11-13 03:03:33', 1),
(10, 'Infinix', '2024-11-13 03:03:33', 1),
(11, 'Oneplus', '2024-11-13 03:03:33', 1),
(12, 'Xem tất cả', '2024-11-13 03:03:33', 1),
(13, 'Macbook', '2024-11-13 03:03:33', 2),
(14, 'Asus', '2024-11-13 03:03:33', 2),
(15, 'MSI', '2024-11-13 03:03:33', 2),
(16, 'Lenovo', '2024-11-13 03:03:33', 2),
(17, 'HP', '2024-11-13 03:03:33', 2),
(18, 'Acer', '2024-11-13 03:03:33', 2),
(19, 'Dell', '2024-11-13 03:03:33', 2),
(20, 'Huawei', '2024-11-13 03:03:33', 2),
(21, 'Gigabyte', '2024-11-13 03:03:33', 2),
(22, 'Surface', '2024-11-13 03:03:33', 2),
(23, 'Xem tất cả', '2024-11-13 03:03:33', 2),
(24, 'iPad 10.2 2021', '2024-11-13 03:03:33', 3),
(25, 'Tab S9', '2024-11-13 03:03:33', 3),
(26, 'iPad Air', '2024-11-13 03:03:33', 3),
(27, 'iPad Pro', '2024-11-13 03:03:33', 3),
(28, 'Samsung', '2024-11-13 03:03:33', 3),
(29, 'TCL', '2024-11-13 03:03:33', 3),
(30, 'Lenovo', '2024-11-13 03:03:33', 3),
(31, 'Xiaomi', '2024-11-13 03:03:33', 3),
(32, 'Xem tất cả', '2024-11-13 03:03:33', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `variant_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `variant_id`) VALUES
(94, 14, 5, 1, 45),
(95, 14, 31, 1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon_name`) VALUES
(1, 'Điện thoại  ', 'fa-mobile'),
(2, 'Laptop', 'fa-laptop'),
(3, 'Tablet', 'fa-tablet'),
(4, 'Đồng hồ,camera', 'fa-camera'),
(5, 'Gia dụng, Smarthome', 'fa-house-signal'),
(6, 'Âm thanh', 'fa-headphones'),
(7, 'PC, Màn hình, Máy in', 'fa-desktop'),
(8, 'Tivi', 'fa-tv'),
(9, 'Thu cũ đổi mới', 'fa-comments-dollar'),
(10, 'Tin tức công nghệ', 'fa-newspaper');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `color_value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_value`) VALUES
(1, 'Đỏ'),
(3, 'Xanh'),
(4, 'vàng'),
(5, 'Hồng'),
(6, 'Xám'),
(7, 'Trắng');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand_id` int NOT NULL,
  `price` int NOT NULL,
  `discount` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `view_count` int NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sale_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `brand_id`, `price`, `discount`, `image`, `view_count`, `description`, `content`, `created_at`, `updated_at`, `sale_price`) VALUES
(2, 2, 'Apple Macbook Air M2 2022 8GB 256GB I Chính hãng Apple Việt Nam', 13, 20000000, 10, 'img/macbook_air_m2_1_1.webp', 0, '<p>iPhone 15 Plus được đ&aacute;nh gi&aacute; cao bởi m&agrave;n h&igrave;nh Dynamic Island 6.7 inch với mặt k&iacute;nh lưng pha m&agrave;u ấn tượng, chip A16 Bionic mạnh mẽ c&ugrave;ng cổng sạc USB-C cho khả năng sạc đầy nhanh ch&oacute;ng. Ngo&agrave;i ra, phi&ecirc;n bản Plus thuộc series iPhone 15 c&ograve;n sở hữu 5 phi&ecirc;n bản m&agrave;u pastel thanh lịch ph&ugrave; hợp với nhiều đối tượng kh&aacute;ch h&agrave;ng: hồng, v&agrave;ng, xanh l&aacute;, xanh dương, đen. Xem th&ecirc;m c&aacute;c th&ocirc;ng tin hữu &iacute;ch kh&aacute;c về điện thoại iPhone 15 Plus sau đ&acirc;y!</p>', '<p>Trải nghiệm đỉnh cao với hiệu năng mạnh mẽ từ vi xử l&yacute; t&acirc;n tiến, kết hợp c&ugrave;ng RAM 12GB cho khả năng đa nhiệm mượt m&agrave;. Lưu trữ thoải m&aacute;i mọi ứng dụng, h&igrave;nh ảnh v&agrave; video với bộ nhớ trong 256GB. N&acirc;ng tầm nhiếp ảnh di động với hệ thống camera ti&ecirc;n tiến, cho ra đời những bức ảnh v&agrave; video chất lượng chuy&ecirc;n nghiệp.</p>', '2024-11-14 08:55:06', '2024-11-25 03:40:46', 18000000),
(3, 3, 'iPad Gen 10 10.9 inch 2022 Wifi 64GB I Chính hãng Apple Việt Nam', 26, 1500000, 17, 'img/ipad-10-9-inch-2022.webp', 0, 'iPhone 15 Plus được đánh giá cao bởi màn hình Dynamic Island 6.7 inch với mặt kính lưng pha màu  ấn tượng, chip A16 Bionic  mạnh mẽ cùng cổng sạc USB-C  cho khả năng sạc đầy nhanh chóng. Ngoài ra, phiên bản Plus thuộc series iPhone 15 còn sở hữu 5 phiên bản màu pastel  thanh lịch phù hợp với nhiều đối tượng khách hàng: hồng, vàng, xanh lá, xanh dương, đen. Xem thêm các thông tin hữu ích khác về điện thoại iPhone 15 Plus sau đây!', 'Trải nghiệm đỉnh cao với hiệu năng mạnh mẽ từ vi xử lý tân tiến, kết hợp cùng RAM 12GB cho khả năng đa nhiệm mượt mà.\r\nLưu trữ thoải mái mọi ứng dụng, hình ảnh và video với bộ nhớ trong 256GB.\r\nNâng tầm nhiếp ảnh di động với hệ thống camera tiên tiến, cho ra đời những bức ảnh và video chất lượng chuyên nghiệp.', '2024-11-14 08:55:06', '2024-11-14 08:55:06', 13000000),
(5, 1, 'iPhone 14 128GB  | Chính hãng VN/A', 1, 15000000, 20, 'img/1731641547-iphone-15-pro-max_3.webp', 0, '<p>kncnciqncqwc</p>', '<p>cjwcjwqbcwjqicnqw</p>', '2024-11-15 03:32:27', '2024-11-25 19:14:10', 12000000),
(29, 1, 'Iphone 14 Pro Max', 1, 22000000, 13, 'img/1732503940-anh1.png', 0, '<p>Sản Phẩm Iphone 14 Promax</p>', '<p>Giới Thiệu Sản Phẩm Iphone 14 Promax</p>', '2024-11-25 03:05:40', '2024-11-26 04:31:16', 19000000),
(30, 1, 'iPhone 12 Pro Max 128GB - Cũ Đẹp', 1, 17000000, 12, 'img/1732507098-iPhone 12 Pro Max.jpg', 0, '<p>SP được thu lại từ kh&aacute;ch b&aacute;n lại - thu cũ, ngoại h&igrave;nh đẹp như m&aacute;y mới. M&aacute;y c&oacute; thể đ&atilde; qua bảo h&agrave;nh h&atilde;ng hoặc sửa chữa thay thế linh kiện để đảm bảo sự ổn định khi d&ugrave;ng.<br>C&oacute; nguồn gốc r&otilde; r&agrave;ng, xuất b&aacute;n đầy đủ ho&aacute; đơn eVAT.</p>', '<p><strong>iPhone 12 Pro Max 128GB Cũ Đẹp</strong>&nbsp;l&agrave; sự lựa chọn l&yacute; tưởng cho những ai muốn trải nghiệm d&ograve;ng sản phẩm cao cấp từ Apple với mức gi&aacute; hợp l&yacute; hơn. M&aacute;y c&oacute; thiết kế tinh tế, sang trọng v&agrave; hiệu năng mạnh mẽ, đ&aacute;p ứng tốt nhu cầu sử dụng h&agrave;ng ng&agrave;y. Với t&igrave;nh trạng cũ đẹp, chiếc&nbsp;<a title=\"iPhone cũ\" href=\"https://cellphones.com.vn/hang-cu/iphone.html\" target=\"_blank\" rel=\"noopener\"><strong>iPhone cũ</strong></a> n&agrave;y vẫn đảm bảo sự ổn định v&agrave; trải nghiệm chất lượng gần như mới. Đ&acirc;y l&agrave; giải ph&aacute;p ho&agrave;n hảo cho những người y&ecirc;u th&iacute;ch c&ocirc;ng nghệ nhưng kh&ocirc;ng muốn đầu tư qu&aacute; nhiều.</p>', '2024-11-25 03:58:18', '2024-11-26 04:31:27', 14800000),
(31, 1, 'iPhone 13 Pro Max 128GB | Chính hãng VN/A', 1, 28990000, 20, 'img/1732630095-iphone-13-pro-max.webp', 0, '<ul>\r\n<li>Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao</li>\r\n<li>Kh&ocirc;ng gian hiển thị sống động - M&agrave;n h&igrave;nh 6.7\" Super Retina XDR độ s&aacute;ng cao, sắc n&eacute;t</li>\r\n<li>Trải nghiệm điện ảnh đỉnh cao - Cụm 3 camera k&eacute;p 12MP, hỗ trợ ổn định h&igrave;nh ảnh quang học</li>\r\n<li>Tối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 ph&uacute;t</li>\r\n</ul>', '<p><strong>iPhone 13&nbsp;Pro Max</strong> chắc chắn sẽ l&agrave; chiếc smartphone cao cấp được quan t&acirc;m nhiều nhất trong năm 2021. D&ograve;ng iPhone 13 series&nbsp;được ra mắt vào ng&agrave;y 14 th&aacute;ng 9 năm 2021 tại sự kiện \"California Streaming\" diễn ra trực tuyến tương tự năm ngo&aacute;i c&ugrave;ng với 3 phi&ecirc;n bản kh&aacute;c l&agrave; iPhone 13, 13 mini v&agrave; 13 Pro. Vậy điện thoại 13 Pro Max gi&aacute; bao nhi&ecirc;u? C&oacute; g&igrave; nổi bật? C&ugrave;ng t&igrave;m hiểu ngay nh&eacute;!</p>', '2024-11-26 14:08:15', '2024-11-25 19:11:25', 22990000),
(32, 1, 'iPhone 14 Plus | Chính hãng VN/A', 1, 22000000, 16, 'img/1732631133-iphone-14-plus_1_.webp', 0, '<ul>\r\n<li>Trải nghiệm thị gi&aacute;c ấn tượng - M&agrave;n h&igrave;nh lớn 6.7\" sắc n&eacute;t với c&ocirc;ng nghệ Super Retina XDR</li>\r\n<li>Sử dụng l&acirc;u d&agrave;i với vi&ecirc;n pin lớn gi&uacute;p ph&aacute;t video li&ecirc;n tục l&ecirc;n tới 26 giờ</li>\r\n<li>Tuyệt đỉnh thiết kế, tỉ mỉ từng đường n&eacute;t - N&acirc;ng cấp to&agrave;n diện với kiểu d&aacute;ng mới, nhiều lựa chọn m&agrave;u sắc trẻ trung</li>\r\n<li>Hiệu năng h&agrave;ng đầu thế giới - Apple A15 Bionic 6 nh&acirc;n xử l&iacute; nhanh, ổn định</li>\r\n</ul>', '<p><a title=\"iPhone 14 Plus 512GB\" href=\"https://cellphones.com.vn/iphone-14-plus.html\" target=\"_blank\" rel=\"noopener\"><strong>iPhone 14 Plus</strong></a>&nbsp;sở hữu m&agrave;n h&igrave;nh&nbsp;<strong>Super Retina XDR OLED</strong>&nbsp;thiết kế tai thỏ, k&iacute;ch thước&nbsp;<strong>6.7 inch</strong>, kết hợp c&ocirc;ng nghệ&nbsp;<strong>True Tone, HDR, Haptic Touch</strong>, Kh&ocirc;ng chỉ vậy, sản phẩm c&ograve;n trang bị chip&nbsp;<strong>A15 Bionic</strong>&nbsp;mạnh mẽ,&nbsp;<strong>RAM 6GB</strong>, bộ nhớ trong&nbsp;<strong>128GB</strong>&nbsp;v&agrave; chạy tr&ecirc;n hệ điều h&agrave;nh&nbsp;<strong>iOS 16</strong>. Camera k&eacute;p 12MP cải thiện khả năng chụp thiếu s&aacute;ng, camera trước&nbsp;<strong>True Depth 12MP</strong> tự động lấy n&eacute;t. Xem th&ecirc;m chi tiết với th&ocirc;ng tin sau đ&acirc;y!</p>', '2024-11-26 14:25:33', '2024-11-26 14:25:33', 19000000);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `rating` int DEFAULT NULL COMMENT '1 đến 5',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'client'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int NOT NULL,
  `size_value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_value`) VALUES
(5, '64GB'),
(6, '128GB'),
(7, '256GB'),
(10, '512GB'),
(11, '1TB');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `img_slider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `product_id`, `img_slider`, `content`, `status`, `created_at`) VALUES
(1, 3, 'sliders/1733045224-tecno-camon-30s-banner-home.webp', 'tecno camon', 1, '2024-12-01 02:27:04'),
(2, 32, 'sliders/1732847445-home-huawei-watch-d2-01-11.webp', 'huawei watch', 1, '2024-11-28 19:30:45'),
(3, 31, 'sliders/1732847454-dknt-oppo-find-x8-home.webp', 'oppo ', 1, '2024-11-28 19:30:54'),
(4, 32, 'sliders/1732847460-tecno-camon-30s-banner-home.webp', 'Tecno camon 30s', 1, '2024-11-28 19:31:00'),
(5, 29, 'sliders/1732847466-sliding-home-iphone-16-pro-km-moi.webp', 'Iphone 16', 0, '2024-11-28 19:31:06'),
(10, 2, 'sliders/1733280423-asus-home-ai-12-11.webp', 'Apple Macbook Air M2 2022', 1, '2024-12-04 02:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `thumbnail`
--

CREATE TABLE `thumbnail` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `image_url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_id` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role_id`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(12, 'Nguyễn Quốc Hoàn', 'hoan1@gmail.com', '$2y$10$he1E3NkzgkULHGjPit0WSOMta0ho9kdlPDTCkml7FlF/ADpoIwSkm', 'users/1741361331-avatar-trang-4.jpg', 2, 'Dia chi A', '0344487493', '2024-11-20 02:54:24', '2025-03-06 20:28:51'),
(14, 'Nguyễn Văn Quảng', 'quang@gmail.com', '$2y$10$jFgJBPbg8mQAnXVfYvNW.evIo70EKkEnXeD04pnXwXzd7QwP3/76W', 'users/1741361320-avatar-trang-4.jpg', 2, 'Dia chi B', '0123456789', '2024-11-30 08:25:17', '2025-03-06 20:28:40'),
(17, 'Nguyen Van B', 'nguyenvanb@gmail.com', '$2y$10$mnPWHvhtouG7aDX7ZqkdL.mWI1jXOjxGpcqRgoLVq8tJbMHNDVXw.', 'users/1741361379-avatar-trang-4.jpg', 1, 'Dia chi D', '0000011111', '2025-03-07 15:29:39', '2025-03-07 15:29:39'),
(18, 'Nguyen Van A', 'nguyenvana@gmail.com', '$2y$10$Ewv9BAgNU1kvZvaBpTI3ouIo3Ua7W6CB5MtWRelgPh2LSgJIUcoS2', NULL, 2, 'Dia chi C', '0000022222', '2025-03-07 15:33:55', '2025-03-07 15:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `color_id` int NOT NULL,
  `size_id` int NOT NULL,
  `variant_price` int NOT NULL,
  `variant_price_sale` int NOT NULL,
  `variant_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`id`, `product_id`, `color_id`, `size_id`, `variant_price`, `variant_price_sale`, `variant_quantity`) VALUES
(5, 29, 6, 6, 22000000, 19000000, 5),
(27, 30, 5, 10, 17000000, 14800000, 1),
(32, 30, 4, 7, 17000000, 14800000, 12),
(34, 2, 5, 6, 20000000, 18000000, 14),
(41, 31, 3, 6, 28990000, 22990000, 0),
(42, 31, 6, 7, 28990000, 22990000, 17),
(43, 31, 3, 10, 28990000, 22990000, 17),
(44, 31, 7, 10, 28990000, 22990000, 17),
(45, 5, 6, 7, 15000000, 12000000, 11),
(46, 5, 5, 6, 15000000, 12000000, 13),
(47, 5, 7, 10, 15000000, 12000000, 13),
(48, 32, 5, 7, 22000000, 19000000, 15),
(49, 32, 3, 6, 22000000, 19000000, 15),
(50, 32, 6, 10, 22000000, 19000000, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_brands_categories` (`category_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `FK_brands_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`variant_id`) REFERENCES `variant` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD CONSTRAINT `thumbnail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `variant_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `variant_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `variant_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
