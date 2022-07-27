-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2022 lúc 12:10 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php0721e_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `type` tinyint(3) DEFAULT 0 COMMENT 'Loại danh mục: 0 - Product, 1 - News',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Acer', 0, '1651638219-frog.jpg', '123', 1, '2022-02-28 13:42:13', '2022-05-06 15:09:13'),
(3, 'Dell', 0, '1651638226-frog_suicide.jpg', 'dell 123', 0, '2022-04-02 02:27:25', '2022-05-05 08:45:55'),
(11, 'HP', 0, '1653101306-281000825_392233326195095_357535634025417125_n.png', '', 0, '2022-05-21 02:48:26', '2022-05-21 09:55:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `name` varchar(255) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `category_id`, `name`, `summary`, `avatar`, `content`, `created_at`, `updated_at`) VALUES
(27, 1, 'Bảng giá laptop đang khuyến mãi tại \"tuần vàng khai trương\" của laptop Trần Phát', 'Laptop Trần Phát vừa khai trương cửa hàng mới trong chuỗi cửa hàng của hãng, mừng khai trương Laptop Trần Phát tung ra chương trình khuyến mãi “Tuần Vàng Khai Trương” để tri ân khách hàng.', '1653103302-news-avatar1652955937478-1652955938213244001325.png', '<p>&nbsp;</p>\r\n\r\n<h2>Laptop Trần Ph&aacute;t vừa khai trương cửa h&agrave;ng mới trong chuỗi cửa h&agrave;ng của h&atilde;ng, mừng khai trương Laptop Trần Ph&aacute;t tung ra chương tr&igrave;nh khuyến m&atilde;i &ldquo;Tuần V&agrave;ng Khai Trương&rdquo; để tri &acirc;n kh&aacute;ch h&agrave;ng.</h2>\r\n\r\n<p>Laptop Trần Ph&aacute;t l&agrave; cửa h&agrave;ng cung cấp v&agrave; ph&acirc;n phối c&aacute;c mẫu laptop nhập khẩu từ Mỹ đến từ c&aacute;c thương hiệu như Dell, ThinkPad, HP. Họ đ&atilde; c&oacute; hơn 5 năm hoạt động tr&ecirc;n thị trường</p>\r\n\r\n<p>Chương tr&igrave;nh cụ thể gồm:</p>\r\n\r\n<p>● Giảm ngay 500.000đ tr&ecirc;n một sản phẩm laptop bất kỳ tại cửa h&agrave;ng</p>\r\n\r\n<p>● Chương tr&igrave;nh hội vi&ecirc;n t&iacute;ch điểm giảm từ 5% - 15% cho th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng trước đ&oacute; đ&atilde; mua sắm sản phẩm tại Laptop Trần Ph&aacute;t.</p>\r\n\r\n<p>● Tổng 2 chương tr&igrave;nh mức giảm l&ecirc;n đến 3.000.000đ</p>\r\n\r\n<p>● H&agrave;ng trăm phần qu&agrave; tặng hấp dẫn như chuột, balo, b&agrave;n ph&iacute;m, đế tản nhiệt,...</p>\r\n\r\n<p>Laptop Trần Ph&aacute;t cung cấp kh&aacute; nhiều sản phẩm kh&aacute;c nhau, để dễ nắm bắt gi&aacute; th&agrave;nh v&agrave; c&acirc;n nhắc nhu cầu. Genk gửi đến bạn bảng gi&aacute; c&aacute;c sản phẩm đang được khuyến m&atilde;i tại Laptop Trần Ph&aacute;t để bạn tham khảo:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Bảng giá laptop đang khuyến mãi tại tuần vàng khai trương của laptop Trần Phát - Ảnh 1.\" src=\"https://genk.mediacdn.vn/139269124445442048/2022/5/19/photo-1-16529531055171197187641-1652955938186-16529559384121051898447.jpg\" /></p>\r\n\r\n<p>Ngo&agrave;i c&aacute;c mẫu laptop ph&acirc;n kh&uacute;c học tập, l&agrave;m việc. Laptop Trần Ph&aacute;t khi bắt đầu chuỗi cửa h&agrave;ng tại Thủ Đức cũng bắt đầu hướng đến c&aacute;c d&ograve;ng laptop Gaming để hỗ trợ nh&oacute;m kh&aacute;ch h&agrave;ng ph&acirc;n kh&uacute;c n&agrave;y. C&aacute;c mẫu laptop Gaming tại cửa h&agrave;ng đang ph&acirc;n phối c&oacute; thể kể đến như Dell Gaming, Dell Alienware, HP Omen,...</p>\r\n\r\n<p>Nếu bạn chưa c&oacute; kinh nghiệm lẫn kiến thức trong việc chọn laptop, đừng lo lắng h&atilde;y đến cửa h&agrave;ng hoặc tr&ograve; chuyện c&ugrave;ng Laptop Trần Ph&aacute;t để được đội ngũ nh&acirc;n vi&ecirc;n hỗ trợ nhanh nhất.</p>\r\n\r\n<p>Điểm mạnh của Laptop Trần Ph&aacute;t kh&ocirc;ng nằm ở gi&aacute; b&aacute;n cạnh tranh m&agrave; ch&iacute;nh l&agrave; chất lượng phục vụ lẫn chăm s&oacute;c sau b&aacute;n h&agrave;ng. C&aacute;c sản phẩm c&ocirc;ng nghệ như Laptop việc chăm s&oacute;c v&agrave; bảo h&agrave;nh sau b&aacute;n h&agrave;ng l&agrave; điều rất đ&aacute;ng để c&acirc;n nhắc, bạn c&oacute; thể chọn cho m&igrave;nh chiếc laptop gi&aacute; th&agrave;nh cao hơn nhưng đổi lại được sự y&ecirc;n t&acirc;m trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p>Chế độ bảo h&agrave;nh v&agrave; hỗ trợ kh&aacute;ch h&agrave;ng tại Laptop Trần Ph&aacute;t:</p>\r\n\r\n<p>● 7 ng&agrave;y d&ugrave;ng thử đổi trả v&igrave; bất kỳ l&yacute; do g&igrave;. Đổi trả hư hỏng 30 ng&agrave;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>● Bảo h&agrave;nh m&aacute;y nhanh 3H. Bảo h&agrave;nh phần cứng 12 Th&aacute;ng</p>\r\n\r\n<p>● Bảo h&agrave;nh nhanh 3H - Kh&ocirc;ng kịp mượn m&aacute;y mang về</p>\r\n\r\n<p>● Free Ship Hồ Ch&iacute; Minh. Hỗ trợ COD c&aacute;c tỉnh th&agrave;nh tr&ecirc;n khắp cả nước.</p>\r\n\r\n<p>Th&ocirc;ng tin li&ecirc;n hệ:</p>\r\n\r\n<p>● Cửa h&agrave;ng T&acirc;n B&igrave;nh: 103/16 Nguyễn Hồng Đ&agrave;o, P.14, Q.T&acirc;n B&igrave;nh, Tp.HCM</p>\r\n\r\n<p>● Cửa h&agrave;ng Thủ Đức: 96 Hữu Nghị, Phường B&igrave;nh Thọ, TP.Thủ Đức</p>\r\n\r\n<p>● Hotline: 0833.88.77.33</p>\r\n\r\n<p>● Website:&nbsp;<a href=\"https://laptops.vn\" target=\"_blank\">https://laptops.vn</a></p>\r\n', '2022-05-21 03:21:42', NULL),
(28, 1, 'Gợi ý combo đồ công nghệ “must have” hè 2022 cho người mới đi làm', 'Muốn biến 8 tiếng làm việc tại văn phòng trở nên thoải mái, thuận tiện đồng thời tăng hiệu quả công việc hơn, bạn đừng bỏ qua những món đồ công nghệ hữu ích này.', '1653103564-news-laptop-16524125535101879651983.png', '<h2>Muốn biến 8 tiếng l&agrave;m việc tại văn ph&ograve;ng trở n&ecirc;n thoải m&aacute;i, thuận tiện đồng thời tăng hiệu quả c&ocirc;ng việc hơn, bạn đừng bỏ qua những m&oacute;n đồ c&ocirc;ng nghệ hữu &iacute;ch n&agrave;y.</h2>\r\n\r\n<h3>Laptop&nbsp;</h3>\r\n\r\n<p>Mới đi l&agrave;m n&ecirc;n chọn laptop phục vụ c&ocirc;ng việc sao cho chất lượng m&agrave; mức gi&aacute; kh&ocirc;ng qu&aacute; tầm với ? Gợi &yacute; bạn h&atilde;y chọn c&aacute;c d&ograve;ng sử dụng chip AMD thay v&igrave; Intel v&igrave; gi&aacute; b&aacute;n sẽ dễ chịu hơn đ&aacute;ng kể. Ti&ecirc;u biểu như 1 số d&ograve;ng Asus Zenbook, Dell Gaming hay gần đ&acirc;y nhất c&oacute; thể kể đến phi&ecirc;n bản vi xử l&yacute; AMD Ryzen 5000 của m&aacute;y t&iacute;nh x&aacute;ch tay cao cấp HUAWEI MateBook 14.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Gợi ý combo đồ công nghệ “must have” hè 2022 cho người mới đi làm - Ảnh 1.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/5/13/laptop-16524125535101879651983.jpg\" /></p>\r\n\r\n<p>Phi&ecirc;n bản mới n&agrave;y kết hợp m&agrave;n h&igrave;nh FullView, tỉ lệ khung h&igrave;nh 3:2 cho ph&eacute;p hiển thị nhiều nội dung hơn. Sản phẩm c&oacute; t&iacute;nh di động tuyệt vời, thiết kế thời trang v&agrave; hiệu suất mạnh mẽ (AMD Ryzen &trade; 5000 Series 7nm, RAM 16GB, SSD PCIe 512GB).</p>\r\n\r\n<p>HUAWEI MateBook 14 c&ograve;n đạt Chứng nhận &aacute;nh s&aacute;ng xanh thấp T&Uuml;V Rheinland v&agrave; Chứng nhận kh&ocirc;ng nhấp nh&aacute;y, gi&uacute;p mắt thoải m&aacute;i hơn, cộng th&ecirc;m khả năng l&agrave;m m&aacute;t hiệu quả v&agrave; y&ecirc;n tĩnh, đặc biệt ph&ugrave; hợp với d&acirc;n văn ph&ograve;ng.&nbsp;</p>\r\n\r\n<p>Gợi &yacute; 1 số d&ograve;ng laptop sử dụng chip AMD m&agrave; bạn c&oacute; thể tham khảo:&nbsp;</p>\r\n\r\n<p>[Box th&ocirc;ng tin shop] - Genk - combo moi di lam - laptop</p>\r\n\r\n<h3>Chuột kh&ocirc;ng d&acirc;y</h3>\r\n\r\n<p>Đ&atilde; c&oacute; laptop th&igrave; bạn sắm th&ecirc;m chuột kh&ocirc;ng d&acirc;y cho đủ bộ đi. Với m&oacute;n đồ c&ocirc;ng nghệ n&agrave;y, bạn n&ecirc;n c&acirc;n nhắc một số yếu tố trước khi mua như thiết kế trống trơn trượt, lượt click chuột cao, ph&ugrave; hợp với nhiều hệ điều h&agrave;nh v&agrave; tốt nhất l&agrave; kh&ocirc;ng g&acirc;y ồn khi bấm để kh&ocirc;ng &ldquo;g&acirc;y sự ch&uacute; &yacute;&rdquo; tại văn ph&ograve;ng trong những ng&agrave;y đầu đi l&agrave;m.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Gợi ý combo đồ công nghệ “must have” hè 2022 cho người mới đi làm - Ảnh 3.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/5/13/chuot-1652412553383452985232.jpg\" /></p>\r\n\r\n<p>Gợi &yacute; 1 số d&ograve;ng chuột kh&ocirc;ng d&acirc;y m&agrave; bạn c&oacute; thể tham khảo:&nbsp;</p>\r\n\r\n<p>[Box th&ocirc;ng tin shop] - Genk - combo moi di lam - chuot</p>\r\n\r\n<h3>Sạc dự ph&ograve;ng</h3>\r\n\r\n<p>Kh&ocirc;ng muốn bị bỏ lỡ c&aacute;c tin nhắn Tele, e-mail hay những cuộc gọi feedback từ kh&aacute;ch h&agrave;ng, lời khuy&ecirc;n d&agrave;nh cho c&aacute;c l&iacute;nh mới l&agrave; h&atilde;y chuẩn bị sẵn sạc dự ph&ograve;ng để điện thoại lu&ocirc;n trong t&igrave;nh trạng &ldquo;c&ograve;n pin&rdquo;. Dịp h&egrave; n&agrave;y, nhiều loại sạc dự ph&ograve;ng đang được sale với gi&aacute; rất rẻ, bạn bỏ từ 200K đ&atilde; sắm được đủ loại với dung lượng pin từ 10.000mAh.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Gợi ý combo đồ công nghệ “must have” hè 2022 cho người mới đi làm - Ảnh 5.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/5/13/sac-16524125535541157931438.jpg\" /></p>\r\n\r\n<p>Gợi &yacute; 1 số mẫu sạc dự ph&ograve;ng gi&aacute; tốt m&agrave; bạn c&oacute; thể tham khảo:</p>\r\n\r\n<p>[Box th&ocirc;ng tin shop] - Genk - combo moi di lam - sac</p>\r\n\r\n<h3>Tai nghe chống ồn</h3>\r\n\r\n<p>M&ocirc;i trường c&ocirc;ng sở thường gắn liền với tiếng g&otilde; ph&iacute;m ồn &agrave;o, tiếng loa từ b&agrave;n b&ecirc;n cạnh hay chỉ đơn giản l&agrave; tiếng tr&ograve; chuyện của v&agrave;i đồng nghiệp cũng đủ g&acirc;y ảnh hưởng tới sự tập trung của bạn. V&igrave; vậy, hội mới đi l&agrave;m nhất định phải sắm sửa sẵn 1 chiếc tai nghe chống ồn hiệu quả. T&ugrave;y dạng n&uacute;t tai hay chụp tai m&agrave; mức gi&aacute; sẽ dao động từ hơn 1 triệu đến v&agrave;i triệu đồng.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Gợi ý combo đồ công nghệ “must have” hè 2022 cho người mới đi làm - Ảnh 7.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/5/13/tai-nghe-16524125536292071833859.jpg\" /></p>\r\n', '2022-05-21 03:26:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text DEFAULT NULL COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`, `created_at`, `updated_at`) VALUES
(12, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '12312312321', 96500123, 1, '2022-05-17 08:19:15', NULL),
(13, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 96500123, 0, '2022-05-17 08:19:22', NULL),
(14, NULL, 'Nam', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 10000000, 0, '2022-05-17 08:20:19', NULL),
(15, NULL, 'Nam', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 10000000, 0, '2022-05-17 08:21:08', NULL),
(16, NULL, 'Nam', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 10000000, 0, '2022-05-17 08:21:18', NULL),
(17, NULL, 'Nam', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 10000000, 0, '2022-05-17 08:21:41', NULL),
(18, NULL, 'Nam', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 10000000, 0, '2022-05-17 08:22:18', NULL),
(19, NULL, 'Nam', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 10000000, 0, '2022-05-17 08:29:01', NULL),
(20, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 35000000, 0, '2022-05-18 07:29:05', NULL),
(21, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 35000000, 0, '2022-05-18 07:31:32', NULL),
(22, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 35000000, 0, '2022-05-18 07:33:39', NULL),
(23, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 35000000, 0, '2022-05-18 07:34:08', NULL),
(24, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 35000000, 0, '2022-05-18 07:39:33', NULL),
(25, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123', 35000000, 0, '2022-05-18 07:40:58', NULL),
(26, NULL, 'Tuấn Thành', 'HANOI', 977010686, 'thanhtnt4000@gmail.com', '123123123', 16000000, 0, '2022-05-18 08:16:50', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_name` varchar(150) DEFAULT NULL COMMENT 'Tên sp tại thời điểm đặt hàng',
  `product_price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm tương ứng tại thời điểm đặt hàng',
  `quantity` int(11) DEFAULT NULL COMMENT 'Số lượng sản phẩm tương ứng tại thời điểm đặt hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_name`, `product_price`, `quantity`) VALUES
(12, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 6),
(12, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 2),
(12, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 5000000, 1),
(12, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 13500000, 1),
(12, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 123, 1),
(12, 'acer', 0, 1),
(12, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(13, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 6),
(13, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 2),
(13, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 5000000, 1),
(13, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 13500000, 1),
(13, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 123, 1),
(13, 'acer', 0, 1),
(13, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(14, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(15, NULL, NULL, 1),
(16, NULL, NULL, 1),
(17, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(18, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(19, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(20, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 2),
(20, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 1),
(20, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(21, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 2),
(21, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 1),
(21, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(22, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 2),
(22, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 1),
(22, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(23, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 2),
(23, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 1),
(23, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(24, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 2),
(24, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 1),
(24, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(25, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 2),
(25, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 1),
(25, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 10000000, 1),
(26, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 7000000, 1),
(26, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', 9000000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm',
  `amount` int(11) DEFAULT NULL COMMENT 'Số lượng sản phẩm trong kho',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho sản phẩm',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `avatar`, `price`, `amount`, `summary`, `content`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 'Dell Gaming G15 5510 {Core i5-10500H, RAM 8G, SSD 256G, VGA Nvidia GTX 1650- 4G, màn 15.6 inch Full HD IPS, 120Hz}', '1651829148-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 10000000, 10, '{Core i5-10500H, RAM 8G, SSD 256G, VGA Nvidia GTX 1650- 4G, màn 15.6 inch Full HD IPS, 120Hz}', '<h2><strong>Tại sao bạn n&ecirc;n chọn Dell Gaming G15 5510?</strong></h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1963-792244fb-7579-4702-957b-70f635255c63.jpg?v=1627636733280\" /></p>\r\n\r\n<p>Dell đ&atilde; ch&iacute;nh thức l&agrave;m mới d&ograve;ng Gaming G-Series của m&igrave;nh với thiết kế v&agrave; t&ecirc;n ho&agrave;n to&agrave;n mới</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1905-92311b31-9364-4150-ad76-037bf7ef2248.jpg?v=1627636716713\" /></p>\r\n\r\n<h2>Thi&ecirc;́t k&ecirc;́</h2>\r\n\r\n<h2><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1913-031b1557-4b1b-4324-8183-42f086cb6aa6.jpg?v=1627636717840\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1938-7fc6fd11-19f8-4d7d-8b37-8fcf4bf8d5b5.jpg?v=1627636721153\" /></h2>\r\n\r\n<p>Dell đ&atilde; đ&ocirc;̉i t&ecirc;n gọi của d&ograve;ng laptop gaming mới của m&igrave;nh l&agrave; Dell Gaming G15.</p>\r\n\r\n<p>Dòng Gaming G15 2021 mới của Dell có thiết kế hơi hướng dòng Gaming cao c&acirc;́p Alienware.</p>\r\n\r\n<p>Lớp sơn ho&agrave;n thiện mới cứng c&aacute;p dễ chăm s&oacute;c v&agrave; c&oacute; sẵn ba m&agrave;u Dark Shadow Grey, Specter Green &nbsp;và Phantom Grey</p>\r\n\r\n<h2>Màn hình</h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1959-9aca3d18-41cd-41d3-92de-c76daf6fe4ed.jpg?v=1627636730250\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1961-655c6da9-21ae-49ac-8c8a-753a8f4229f8.jpg?v=1627636731227\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1962-8e66a2ee-5e85-43dd-942a-096bed6af9fb.jpg?v=1627636732450\" /></p>\r\n\r\n<p>Dell G15 5510 cũng sẽ c&oacute; m&agrave;n h&igrave;nh ti&ecirc;u chuẩn 15.6&rdquo; Full HD 120Hz với độ s&aacute;ng 250 nits. Kết Hợp với vi&ecirc;̀n mỏng Narrow Border đem đến cho người d&ugrave;ng cảm gi&aacute;c sang trọng, thanh lịch nhưng kh&ocirc;ng k&eacute;m phần gai g&oacute;c của một chiếc Dell Gaming.</p>\r\n\r\n<h2>C&acirc;́u hình</h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/files/img-1917.jpg?v=1627637167865\" /></p>\r\n\r\n<p>G15 Intel, tuy nhi&ecirc;n lại vẫn tiếp tục sử dụng vi xử l&yacute; Comet Lake H th&ecirc;́ h&ecirc;̣ 10 là Intel Core i5-10500H.</p>\r\n\r\n<p>Đ&aacute;ng tiếc l&agrave; phần cứng thế hệ 11 hiệu năng cao l&agrave; (Tiger Lake-H45) vẫn chưa được đem l&ecirc;n Dell G15 năm nay.</p>\r\n\r\n<p>G15 5510 sử dụng RAM DDR4 và c&oacute; bus 2,933MH.</p>\r\n\r\n<p>Phi&ecirc;n bản G15 5510 sẽ c&oacute; card đồ hoạ rời l&agrave; Nvidia Geforce GTX 1650 4GB GDDR6 hoặc RTX 3060 6GB biến thể 115W cao c&acirc;́p hơn.</p>\r\n\r\n<h2>Tản nhi&ecirc;̣t</h2>\r\n\r\n<p>Thiết kế tản nhiệt lấy cảm hứng từ Alienware kết hợp hệ thống h&uacute;t gi&oacute; k&eacute;p từ ph&iacute;a tr&ecirc;n b&agrave;n ph&iacute;m v&agrave; ph&iacute;a dưới của G15. Sau đ&oacute;, kh&ocirc;ng kh&iacute; n&agrave;y được tho&aacute;t ra ngo&agrave;i qua bốn lỗ th&ocirc;ng hơi nằm ở hai b&ecirc;n v&agrave; ph&iacute;a sau để tối đa h&oacute;a luồng kh&ocirc;ng kh&iacute; qua c&aacute;c ống đồng để l&agrave;m m&aacute;t v&agrave; tản nhiệt tối ưu.</p>\r\n\r\n<p>Những tiến bộ mới nhất về thiết kế tản nhiệt mang lại cho Dell G15 giúp máy m&aacute;t hơn v&agrave; lu&ocirc;n giữ được tốc độ xung nhịp cao khi chơi game cũng như chạy các ứng dụng nặng nh&acirc;́t.</p>\r\n\r\n<p>C&ocirc;ng nghệ Game Shift: Tăng cường sức mạnh cho bạn khi việc chơi game trở n&ecirc;n quan trọng chỉ bằng một thao t&aacute;c nhấn n&uacute;t đơn giản. Game Shift được k&iacute;ch hoạt bằng c&aacute;ch nhấn FN + ph&iacute;m Game Shift v&agrave; k&iacute;ch hoạt chế độ hiệu suất động trong Alienware Command Center bằng c&aacute;ch tối đa h&oacute;a tốc độ của quạt để giữ cho hệ thống của bạn lu&ocirc;n m&aacute;t mẻ trong khi bộ xử l&yacute; hoạt động mạnh hơn.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1944-7e2b662d-a761-4154-b0f2-c0d74ac9561c.jpg?v=1627636724167\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1953-f150edd5-232a-489c-9f1f-474d06689301.jpg?v=1627636727473\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1943-6d9bfad5-2289-4d16-b17c-450d9829c859.jpg?v=1627636723387\" /></p>\r\n\r\n<h2>&Acirc;m thanh</h2>\r\n\r\n<p>G15 Gaming 5510 được trang bị loa k&eacute;p với c&ocirc;ng ngh&ecirc;̣ 3D cho ph&eacute;p anh em nghe r&otilde; mọi &acirc;m thanh trong Game hoàn hảo.</p>\r\n\r\n<p>Đèn n&ecirc;̀n RBG: b&agrave;n ph&iacute;m c&oacute; đ&egrave;n nền RBG 4 v&ugrave;ng t&ugrave;y chọn với WASD được điều khiển bởi Trung t&acirc;m chỉ huy Alienware.</p>\r\n\r\n<h2>Dung lượng Pin</h2>\r\n\r\n<p>Dell Gaming G15 5510 sẽ c&oacute; phi&ecirc;n bản dung lượng 56Wh v&agrave; 86Wh kèm c&ocirc;ng ngh&ecirc;̣ sạc nhanh.</p>\r\n\r\n<h2>C&ocirc;̉ng k&ecirc;́t n&ocirc;́i</h2>\r\n\r\n<p>Máy có nhi&ecirc;̀u c&ocirc;̉ng k&ecirc;́t n&ocirc;́i cơ bản nh&acirc;́t cho anh em ti&ecirc;̣n sử dụng. Đi&ecirc;̀u đáng ti&ecirc;́c là tr&ecirc;n phi&ecirc;n bản chạy GPU GTX 1650 lại bị lược bỏ c&ocirc;̉ng Type C có khả năng xu&acirc;́t hình.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1949-60e9cd69-2edc-4238-89d1-e3fe33260a10.jpg?v=1627636725347\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1926-f64022ee-85ee-4e67-b3a6-fb478729884f.jpg?v=1627636720360\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1942-97c044df-1aa1-4636-a888-43e3f737896c.jpg?v=1627636722687\" /></p>\r\n', 1, '2022-03-07 12:02:22', '2022-05-21 16:44:52'),
(5, 1, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '1649318577-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 9000000, 10, '( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '<h2><strong>Tại sao bạn n&ecirc;n chọn Dell Gaming G15 5510?</strong></h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1963-792244fb-7579-4702-957b-70f635255c63.jpg?v=1627636733280\" /></p>\r\n\r\n<p>Dell đ&atilde; ch&iacute;nh thức l&agrave;m mới d&ograve;ng Gaming G-Series của m&igrave;nh với thiết kế v&agrave; t&ecirc;n ho&agrave;n to&agrave;n mới</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1905-92311b31-9364-4150-ad76-037bf7ef2248.jpg?v=1627636716713\" /></p>\r\n\r\n<h2>Thi&ecirc;́t k&ecirc;́</h2>\r\n\r\n<h2><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1913-031b1557-4b1b-4324-8183-42f086cb6aa6.jpg?v=1627636717840\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1938-7fc6fd11-19f8-4d7d-8b37-8fcf4bf8d5b5.jpg?v=1627636721153\" /></h2>\r\n\r\n<p>Dell đ&atilde; đ&ocirc;̉i t&ecirc;n gọi của d&ograve;ng laptop gaming mới của m&igrave;nh l&agrave; Dell Gaming G15.</p>\r\n\r\n<p>Dòng Gaming G15 2021 mới của Dell có thiết kế hơi hướng dòng Gaming cao c&acirc;́p Alienware.</p>\r\n\r\n<p>Lớp sơn ho&agrave;n thiện mới cứng c&aacute;p dễ chăm s&oacute;c v&agrave; c&oacute; sẵn ba m&agrave;u Dark Shadow Grey, Specter Green &nbsp;và Phantom Grey</p>\r\n\r\n<h2>Màn hình</h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1959-9aca3d18-41cd-41d3-92de-c76daf6fe4ed.jpg?v=1627636730250\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1961-655c6da9-21ae-49ac-8c8a-753a8f4229f8.jpg?v=1627636731227\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1962-8e66a2ee-5e85-43dd-942a-096bed6af9fb.jpg?v=1627636732450\" /></p>\r\n\r\n<p>Dell G15 5510 cũng sẽ c&oacute; m&agrave;n h&igrave;nh ti&ecirc;u chuẩn 15.6&rdquo; Full HD 120Hz với độ s&aacute;ng 250 nits. Kết Hợp với vi&ecirc;̀n mỏng Narrow Border đem đến cho người d&ugrave;ng cảm gi&aacute;c sang trọng, thanh lịch nhưng kh&ocirc;ng k&eacute;m phần gai g&oacute;c của một chiếc Dell Gaming.</p>\r\n\r\n<h2>C&acirc;́u hình</h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/files/img-1917.jpg?v=1627637167865\" /></p>\r\n\r\n<p>G15 Intel, tuy nhi&ecirc;n lại vẫn tiếp tục sử dụng vi xử l&yacute; Comet Lake H th&ecirc;́ h&ecirc;̣ 10 là Intel Core i5-10500H.</p>\r\n\r\n<p>Đ&aacute;ng tiếc l&agrave; phần cứng thế hệ 11 hiệu năng cao l&agrave; (Tiger Lake-H45) vẫn chưa được đem l&ecirc;n Dell G15 năm nay.</p>\r\n\r\n<p>G15 5510 sử dụng RAM DDR4 và c&oacute; bus 2,933MH.</p>\r\n\r\n<p>Phi&ecirc;n bản G15 5510 sẽ c&oacute; card đồ hoạ rời l&agrave; Nvidia Geforce GTX 1650 4GB GDDR6 hoặc RTX 3060 6GB biến thể 115W cao c&acirc;́p hơn.</p>\r\n\r\n<h2>Tản nhi&ecirc;̣t</h2>\r\n\r\n<p>Thiết kế tản nhiệt lấy cảm hứng từ Alienware kết hợp hệ thống h&uacute;t gi&oacute; k&eacute;p từ ph&iacute;a tr&ecirc;n b&agrave;n ph&iacute;m v&agrave; ph&iacute;a dưới của G15. Sau đ&oacute;, kh&ocirc;ng kh&iacute; n&agrave;y được tho&aacute;t ra ngo&agrave;i qua bốn lỗ th&ocirc;ng hơi nằm ở hai b&ecirc;n v&agrave; ph&iacute;a sau để tối đa h&oacute;a luồng kh&ocirc;ng kh&iacute; qua c&aacute;c ống đồng để l&agrave;m m&aacute;t v&agrave; tản nhiệt tối ưu.</p>\r\n\r\n<p>Những tiến bộ mới nhất về thiết kế tản nhiệt mang lại cho Dell G15 giúp máy m&aacute;t hơn v&agrave; lu&ocirc;n giữ được tốc độ xung nhịp cao khi chơi game cũng như chạy các ứng dụng nặng nh&acirc;́t.</p>\r\n\r\n<p>C&ocirc;ng nghệ Game Shift: Tăng cường sức mạnh cho bạn khi việc chơi game trở n&ecirc;n quan trọng chỉ bằng một thao t&aacute;c nhấn n&uacute;t đơn giản. Game Shift được k&iacute;ch hoạt bằng c&aacute;ch nhấn FN + ph&iacute;m Game Shift v&agrave; k&iacute;ch hoạt chế độ hiệu suất động trong Alienware Command Center bằng c&aacute;ch tối đa h&oacute;a tốc độ của quạt để giữ cho hệ thống của bạn lu&ocirc;n m&aacute;t mẻ trong khi bộ xử l&yacute; hoạt động mạnh hơn.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1944-7e2b662d-a761-4154-b0f2-c0d74ac9561c.jpg?v=1627636724167\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1953-f150edd5-232a-489c-9f1f-474d06689301.jpg?v=1627636727473\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1943-6d9bfad5-2289-4d16-b17c-450d9829c859.jpg?v=1627636723387\" /></p>\r\n\r\n<h2>&Acirc;m thanh</h2>\r\n\r\n<p>G15 Gaming 5510 được trang bị loa k&eacute;p với c&ocirc;ng ngh&ecirc;̣ 3D cho ph&eacute;p anh em nghe r&otilde; mọi &acirc;m thanh trong Game hoàn hảo.</p>\r\n\r\n<p>Đèn n&ecirc;̀n RBG: b&agrave;n ph&iacute;m c&oacute; đ&egrave;n nền RBG 4 v&ugrave;ng t&ugrave;y chọn với WASD được điều khiển bởi Trung t&acirc;m chỉ huy Alienware.</p>\r\n\r\n<h2>Dung lượng Pin</h2>\r\n\r\n<p>Dell Gaming G15 5510 sẽ c&oacute; phi&ecirc;n bản dung lượng 56Wh v&agrave; 86Wh kèm c&ocirc;ng ngh&ecirc;̣ sạc nhanh.</p>\r\n\r\n<h2>C&ocirc;̉ng k&ecirc;́t n&ocirc;́i</h2>\r\n\r\n<p>Máy có nhi&ecirc;̀u c&ocirc;̉ng k&ecirc;́t n&ocirc;́i cơ bản nh&acirc;́t cho anh em ti&ecirc;̣n sử dụng. Đi&ecirc;̀u đáng ti&ecirc;́c là tr&ecirc;n phi&ecirc;n bản chạy GPU GTX 1650 lại bị lược bỏ c&ocirc;̉ng Type C có khả năng xu&acirc;́t hình.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1949-60e9cd69-2edc-4238-89d1-e3fe33260a10.jpg?v=1627636725347\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1926-f64022ee-85ee-4e67-b3a6-fb478729884f.jpg?v=1627636720360\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1942-97c044df-1aa1-4636-a888-43e3f737896c.jpg?v=1627636722687\" /></p>\r\n', 1, '2022-03-07 12:02:39', '2022-05-21 10:30:20'),
(7, 1, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '1649318585-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 7000000, 0, '321', '<p>321123</p>\r\n', 1, '2022-03-28 13:43:14', '2022-05-05 09:36:25'),
(8, 1, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '1649318592-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 6000000, 123, '123', '123', 1, '2022-03-28 13:55:39', '2022-04-07 15:03:12'),
(11, 1, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '1649318598-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 5000000, 123, '123', '123', NULL, '2022-04-02 02:05:13', '2022-04-07 15:03:18'),
(12, 1, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '1649318604-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 13500000, 5, '123', '123', NULL, '2022-04-02 02:28:08', '2022-04-07 15:03:24'),
(15, 1, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '1651830742-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 123, 123, '123', '<p>123</p>\r\n', NULL, '2022-05-06 09:52:22', NULL),
(16, 1, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '1651830757-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 5000000, 123, '123', '<p>123</p>\r\n', NULL, '2022-05-06 09:52:37', NULL),
(25, 3, 'Dell Gaming G15 5510 {Core i5-10500H, RAM 8G, SSD 256G, VGA Nvidia GTX 1650- 4G, màn 15.6 inch Full HD IPS, 120Hz}', '1653104005-product-laptop-16524125535101879651983.png', 22000000, 10, '{Core i5-10500H, RAM 8G, SSD 256G, VGA Nvidia GTX 1650- 4G, màn 15.6 inch Full HD IPS, 120Hz}', '<h2><strong>Tại sao bạn n&ecirc;n chọn Dell Gaming G15 5510?</strong></h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1963-792244fb-7579-4702-957b-70f635255c63.jpg?v=1627636733280\" /></p>\r\n\r\n<p>Dell đ&atilde; ch&iacute;nh thức l&agrave;m mới d&ograve;ng Gaming G-Series của m&igrave;nh với thiết kế v&agrave; t&ecirc;n ho&agrave;n to&agrave;n mới</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1905-92311b31-9364-4150-ad76-037bf7ef2248.jpg?v=1627636716713\" /></p>\r\n\r\n<h2>Thi&ecirc;́t k&ecirc;́</h2>\r\n\r\n<h2><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1913-031b1557-4b1b-4324-8183-42f086cb6aa6.jpg?v=1627636717840\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1938-7fc6fd11-19f8-4d7d-8b37-8fcf4bf8d5b5.jpg?v=1627636721153\" /></h2>\r\n\r\n<p>Dell đ&atilde; đ&ocirc;̉i t&ecirc;n gọi của d&ograve;ng laptop gaming mới của m&igrave;nh l&agrave; Dell Gaming G15.</p>\r\n\r\n<p>Dòng Gaming G15 2021 mới của Dell có thiết kế hơi hướng dòng Gaming cao c&acirc;́p Alienware.</p>\r\n\r\n<p>Lớp sơn ho&agrave;n thiện mới cứng c&aacute;p dễ chăm s&oacute;c v&agrave; c&oacute; sẵn ba m&agrave;u Dark Shadow Grey, Specter Green &nbsp;và Phantom Grey</p>\r\n\r\n<h2>Màn hình</h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1959-9aca3d18-41cd-41d3-92de-c76daf6fe4ed.jpg?v=1627636730250\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1961-655c6da9-21ae-49ac-8c8a-753a8f4229f8.jpg?v=1627636731227\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1962-8e66a2ee-5e85-43dd-942a-096bed6af9fb.jpg?v=1627636732450\" /></p>\r\n\r\n<p>Dell G15 5510 cũng sẽ c&oacute; m&agrave;n h&igrave;nh ti&ecirc;u chuẩn 15.6&rdquo; Full HD 120Hz với độ s&aacute;ng 250 nits. Kết Hợp với vi&ecirc;̀n mỏng Narrow Border đem đến cho người d&ugrave;ng cảm gi&aacute;c sang trọng, thanh lịch nhưng kh&ocirc;ng k&eacute;m phần gai g&oacute;c của một chiếc Dell Gaming.</p>\r\n\r\n<h2>C&acirc;́u hình</h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/files/img-1917.jpg?v=1627637167865\" /></p>\r\n\r\n<p>G15 Intel, tuy nhi&ecirc;n lại vẫn tiếp tục sử dụng vi xử l&yacute; Comet Lake H th&ecirc;́ h&ecirc;̣ 10 là Intel Core i5-10500H.</p>\r\n\r\n<p>Đ&aacute;ng tiếc l&agrave; phần cứng thế hệ 11 hiệu năng cao l&agrave; (Tiger Lake-H45) vẫn chưa được đem l&ecirc;n Dell G15 năm nay.</p>\r\n\r\n<p>G15 5510 sử dụng RAM DDR4 và c&oacute; bus 2,933MH.</p>\r\n\r\n<p>Phi&ecirc;n bản G15 5510 sẽ c&oacute; card đồ hoạ rời l&agrave; Nvidia Geforce GTX 1650 4GB GDDR6 hoặc RTX 3060 6GB biến thể 115W cao c&acirc;́p hơn.</p>\r\n\r\n<h2>Tản nhi&ecirc;̣t</h2>\r\n\r\n<p>Thiết kế tản nhiệt lấy cảm hứng từ Alienware kết hợp hệ thống h&uacute;t gi&oacute; k&eacute;p từ ph&iacute;a tr&ecirc;n b&agrave;n ph&iacute;m v&agrave; ph&iacute;a dưới của G15. Sau đ&oacute;, kh&ocirc;ng kh&iacute; n&agrave;y được tho&aacute;t ra ngo&agrave;i qua bốn lỗ th&ocirc;ng hơi nằm ở hai b&ecirc;n v&agrave; ph&iacute;a sau để tối đa h&oacute;a luồng kh&ocirc;ng kh&iacute; qua c&aacute;c ống đồng để l&agrave;m m&aacute;t v&agrave; tản nhiệt tối ưu.</p>\r\n\r\n<p>Những tiến bộ mới nhất về thiết kế tản nhiệt mang lại cho Dell G15 giúp máy m&aacute;t hơn v&agrave; lu&ocirc;n giữ được tốc độ xung nhịp cao khi chơi game cũng như chạy các ứng dụng nặng nh&acirc;́t.</p>\r\n\r\n<p>C&ocirc;ng nghệ Game Shift: Tăng cường sức mạnh cho bạn khi việc chơi game trở n&ecirc;n quan trọng chỉ bằng một thao t&aacute;c nhấn n&uacute;t đơn giản. Game Shift được k&iacute;ch hoạt bằng c&aacute;ch nhấn FN + ph&iacute;m Game Shift v&agrave; k&iacute;ch hoạt chế độ hiệu suất động trong Alienware Command Center bằng c&aacute;ch tối đa h&oacute;a tốc độ của quạt để giữ cho hệ thống của bạn lu&ocirc;n m&aacute;t mẻ trong khi bộ xử l&yacute; hoạt động mạnh hơn.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1944-7e2b662d-a761-4154-b0f2-c0d74ac9561c.jpg?v=1627636724167\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1953-f150edd5-232a-489c-9f1f-474d06689301.jpg?v=1627636727473\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1943-6d9bfad5-2289-4d16-b17c-450d9829c859.jpg?v=1627636723387\" /></p>\r\n\r\n<h2>&Acirc;m thanh</h2>\r\n\r\n<p>G15 Gaming 5510 được trang bị loa k&eacute;p với c&ocirc;ng ngh&ecirc;̣ 3D cho ph&eacute;p anh em nghe r&otilde; mọi &acirc;m thanh trong Game hoàn hảo.</p>\r\n\r\n<p>Đèn n&ecirc;̀n RBG: b&agrave;n ph&iacute;m c&oacute; đ&egrave;n nền RBG 4 v&ugrave;ng t&ugrave;y chọn với WASD được điều khiển bởi Trung t&acirc;m chỉ huy Alienware.</p>\r\n\r\n<h2>Dung lượng Pin</h2>\r\n\r\n<p>Dell Gaming G15 5510 sẽ c&oacute; phi&ecirc;n bản dung lượng 56Wh v&agrave; 86Wh kèm c&ocirc;ng ngh&ecirc;̣ sạc nhanh.</p>\r\n\r\n<h2>C&ocirc;̉ng k&ecirc;́t n&ocirc;́i</h2>\r\n\r\n<p>Máy có nhi&ecirc;̀u c&ocirc;̉ng k&ecirc;́t n&ocirc;́i cơ bản nh&acirc;́t cho anh em ti&ecirc;̣n sử dụng. Đi&ecirc;̀u đáng ti&ecirc;́c là tr&ecirc;n phi&ecirc;n bản chạy GPU GTX 1650 lại bị lược bỏ c&ocirc;̉ng Type C có khả năng xu&acirc;́t hình.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1949-60e9cd69-2edc-4238-89d1-e3fe33260a10.jpg?v=1627636725347\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1926-f64022ee-85ee-4e67-b3a6-fb478729884f.jpg?v=1627636720360\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1942-97c044df-1aa1-4636-a888-43e3f737896c.jpg?v=1627636722687\" /></p>\r\n', NULL, '2022-05-21 03:33:25', '2022-05-21 16:45:09'),
(26, 1, 'Dell inspiron 7566 ( i5-6300HQ, RAM 8G, HDD 500G + SSD 128G, VGA NVIDIA GTX 960M- 4G, màn 15.6 Full HD)', '1653104045-product-img-1913-576613ef-d4cc-4899-8a0f-76174a08e049.png', 1000000, 1, '{Core i5-10500H, RAM 8G, SSD 256G, VGA Nvidia GTX 1650- 4G, màn 15.6 inch Full HD IPS, 120Hz}', '<h2><strong>Tại sao bạn n&ecirc;n chọn Dell Gaming G15 5510?</strong></h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1963-792244fb-7579-4702-957b-70f635255c63.jpg?v=1627636733280\" /></p>\r\n\r\n<p>Dell đ&atilde; ch&iacute;nh thức l&agrave;m mới d&ograve;ng Gaming G-Series của m&igrave;nh với thiết kế v&agrave; t&ecirc;n ho&agrave;n to&agrave;n mới</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1905-92311b31-9364-4150-ad76-037bf7ef2248.jpg?v=1627636716713\" /></p>\r\n\r\n<h2>Thi&ecirc;́t k&ecirc;́</h2>\r\n\r\n<h2><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1913-031b1557-4b1b-4324-8183-42f086cb6aa6.jpg?v=1627636717840\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1938-7fc6fd11-19f8-4d7d-8b37-8fcf4bf8d5b5.jpg?v=1627636721153\" /></h2>\r\n\r\n<p>Dell đ&atilde; đ&ocirc;̉i t&ecirc;n gọi của d&ograve;ng laptop gaming mới của m&igrave;nh l&agrave; Dell Gaming G15.</p>\r\n\r\n<p>Dòng Gaming G15 2021 mới của Dell có thiết kế hơi hướng dòng Gaming cao c&acirc;́p Alienware.</p>\r\n\r\n<p>Lớp sơn ho&agrave;n thiện mới cứng c&aacute;p dễ chăm s&oacute;c v&agrave; c&oacute; sẵn ba m&agrave;u Dark Shadow Grey, Specter Green &nbsp;và Phantom Grey</p>\r\n\r\n<h2>Màn hình</h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1959-9aca3d18-41cd-41d3-92de-c76daf6fe4ed.jpg?v=1627636730250\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1961-655c6da9-21ae-49ac-8c8a-753a8f4229f8.jpg?v=1627636731227\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1962-8e66a2ee-5e85-43dd-942a-096bed6af9fb.jpg?v=1627636732450\" /></p>\r\n\r\n<p>Dell G15 5510 cũng sẽ c&oacute; m&agrave;n h&igrave;nh ti&ecirc;u chuẩn 15.6&rdquo; Full HD 120Hz với độ s&aacute;ng 250 nits. Kết Hợp với vi&ecirc;̀n mỏng Narrow Border đem đến cho người d&ugrave;ng cảm gi&aacute;c sang trọng, thanh lịch nhưng kh&ocirc;ng k&eacute;m phần gai g&oacute;c của một chiếc Dell Gaming.</p>\r\n\r\n<h2>C&acirc;́u hình</h2>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/files/img-1917.jpg?v=1627637167865\" /></p>\r\n\r\n<p>G15 Intel, tuy nhi&ecirc;n lại vẫn tiếp tục sử dụng vi xử l&yacute; Comet Lake H th&ecirc;́ h&ecirc;̣ 10 là Intel Core i5-10500H.</p>\r\n\r\n<p>Đ&aacute;ng tiếc l&agrave; phần cứng thế hệ 11 hiệu năng cao l&agrave; (Tiger Lake-H45) vẫn chưa được đem l&ecirc;n Dell G15 năm nay.</p>\r\n\r\n<p>G15 5510 sử dụng RAM DDR4 và c&oacute; bus 2,933MH.</p>\r\n\r\n<p>Phi&ecirc;n bản G15 5510 sẽ c&oacute; card đồ hoạ rời l&agrave; Nvidia Geforce GTX 1650 4GB GDDR6 hoặc RTX 3060 6GB biến thể 115W cao c&acirc;́p hơn.</p>\r\n\r\n<h2>Tản nhi&ecirc;̣t</h2>\r\n\r\n<p>Thiết kế tản nhiệt lấy cảm hứng từ Alienware kết hợp hệ thống h&uacute;t gi&oacute; k&eacute;p từ ph&iacute;a tr&ecirc;n b&agrave;n ph&iacute;m v&agrave; ph&iacute;a dưới của G15. Sau đ&oacute;, kh&ocirc;ng kh&iacute; n&agrave;y được tho&aacute;t ra ngo&agrave;i qua bốn lỗ th&ocirc;ng hơi nằm ở hai b&ecirc;n v&agrave; ph&iacute;a sau để tối đa h&oacute;a luồng kh&ocirc;ng kh&iacute; qua c&aacute;c ống đồng để l&agrave;m m&aacute;t v&agrave; tản nhiệt tối ưu.</p>\r\n\r\n<p>Những tiến bộ mới nhất về thiết kế tản nhiệt mang lại cho Dell G15 giúp máy m&aacute;t hơn v&agrave; lu&ocirc;n giữ được tốc độ xung nhịp cao khi chơi game cũng như chạy các ứng dụng nặng nh&acirc;́t.</p>\r\n\r\n<p>C&ocirc;ng nghệ Game Shift: Tăng cường sức mạnh cho bạn khi việc chơi game trở n&ecirc;n quan trọng chỉ bằng một thao t&aacute;c nhấn n&uacute;t đơn giản. Game Shift được k&iacute;ch hoạt bằng c&aacute;ch nhấn FN + ph&iacute;m Game Shift v&agrave; k&iacute;ch hoạt chế độ hiệu suất động trong Alienware Command Center bằng c&aacute;ch tối đa h&oacute;a tốc độ của quạt để giữ cho hệ thống của bạn lu&ocirc;n m&aacute;t mẻ trong khi bộ xử l&yacute; hoạt động mạnh hơn.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1944-7e2b662d-a761-4154-b0f2-c0d74ac9561c.jpg?v=1627636724167\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1953-f150edd5-232a-489c-9f1f-474d06689301.jpg?v=1627636727473\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1943-6d9bfad5-2289-4d16-b17c-450d9829c859.jpg?v=1627636723387\" /></p>\r\n\r\n<h2>&Acirc;m thanh</h2>\r\n\r\n<p>G15 Gaming 5510 được trang bị loa k&eacute;p với c&ocirc;ng ngh&ecirc;̣ 3D cho ph&eacute;p anh em nghe r&otilde; mọi &acirc;m thanh trong Game hoàn hảo.</p>\r\n\r\n<p>Đèn n&ecirc;̀n RBG: b&agrave;n ph&iacute;m c&oacute; đ&egrave;n nền RBG 4 v&ugrave;ng t&ugrave;y chọn với WASD được điều khiển bởi Trung t&acirc;m chỉ huy Alienware.</p>\r\n\r\n<h2>Dung lượng Pin</h2>\r\n\r\n<p>Dell Gaming G15 5510 sẽ c&oacute; phi&ecirc;n bản dung lượng 56Wh v&agrave; 86Wh kèm c&ocirc;ng ngh&ecirc;̣ sạc nhanh.</p>\r\n\r\n<h2>C&ocirc;̉ng k&ecirc;́t n&ocirc;́i</h2>\r\n\r\n<p>Máy có nhi&ecirc;̀u c&ocirc;̉ng k&ecirc;́t n&ocirc;́i cơ bản nh&acirc;́t cho anh em ti&ecirc;̣n sử dụng. Đi&ecirc;̀u đáng ti&ecirc;́c là tr&ecirc;n phi&ecirc;n bản chạy GPU GTX 1650 lại bị lược bỏ c&ocirc;̉ng Type C có khả năng xu&acirc;́t hình.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1949-60e9cd69-2edc-4238-89d1-e3fe33260a10.jpg?v=1627636725347\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1926-f64022ee-85ee-4e67-b3a6-fb478729884f.jpg?v=1627636720360\" /><img src=\"https://bizweb.dktcdn.net/100/362/834/products/img-1942-97c044df-1aa1-4636-a888-43e3f737896c.jpg?v=1627636722687\" /></p>\r\n', NULL, '2022-05-21 03:33:39', '2022-05-21 16:44:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) DEFAULT NULL COMMENT 'Mật khẩu đăng nhập',
  `reset_password_token` varchar(100) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(255) DEFAULT NULL COMMENT 'Last name',
  `phone` varchar(11) DEFAULT NULL COMMENT 'SĐT user',
  `jobs` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `reset_password_token`, `first_name`, `last_name`, `phone`, `jobs`, `facebook`, `address`, `email`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'xumakha', '$2y$10$nijH8XGwgjtDpPMFaLvn4.129PnAm28Y4wGAYvWQYJPLB8TOVKJF6', '65f6fb93a75202ee457ba64fff1ab0e3', 'Tuấn', 'Thành', '0977010686', 'blalba', 'https://www.facebook.com/pDorzi/', 'HANOI', 'thanhtnt4000@gmail.com', '1651829133-product-z3268361740659_ae4a19e8a760360fe1d171e007b3721b.jpg', 0, '2022-03-04 12:47:04', NULL),
(16, '1', '$2y$10$HmIfqtN7QuYQZv.ZUEcKROpP748gH3yUtVCLi3XUW/fyxvSK5uMMy', '', '', '', '', NULL, NULL, '', 'thanhtnt3000@gmail.com', '1652751153-product-277585615_1497756753975067_3736858192616408208_n.jpg', 0, '2022-05-06 04:01:03', NULL),
(23, 'xumakha1', '$2y$10$pK/YZ2kGyWF/QfcTewf51ee2UmBwJScnpk8hG1psFpXoW/6uF5qia', '', '', '', '', NULL, NULL, '', 'thanhtnt5000@gmail.com', '1651889109-product-272410688_620333422570530_2583856317007285480_n.jpg', 0, '2022-05-07 01:49:47', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
