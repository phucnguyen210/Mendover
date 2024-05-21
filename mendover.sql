-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2023 lúc 03:49 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mendover`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `status`) VALUES
(1, 'admin', '123', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(6, '::1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_title`) VALUES
(1, 'Nhà ở'),
(2, 'Căn hộ'),
(3, 'Chung cư'),
(4, 'Văn phòng'),
(5, 'Nhà ở dự án'),
(6, 'Loại khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`) VALUES
(1, 'Bất động sản'),
(2, 'Tin nổi bật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news_products`
--

CREATE TABLE `tbl_news_products` (
  `news_product_id` int(11) NOT NULL,
  `news_product_title` varchar(255) NOT NULL,
  `news_product_description` varchar(1000) NOT NULL,
  `news_id` int(11) NOT NULL,
  `news_product_image` varchar(255) NOT NULL,
  `news_product_people` varchar(100) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_news_products`
--

INSERT INTO `tbl_news_products` (`news_product_id`, `news_product_title`, `news_product_description`, `news_id`, `news_product_image`, `news_product_people`, `date`, `status`) VALUES
(3, 'Căn hộ chung cư đẹp với phong cách Scandinavian', 'Căn hộ chung cư đẹp này là một không gian sống sang trọng được thiết kế theo phong cách Scandinavian trang nhã với tông màu trắng sáng chủ đạo bao trùm toàn bộ không gian...', 2, 'a2.webp', 'Nguyễn Huy Hoàng Phúc\r\n', '2023-11-24 14:18:05', 24),
(5, 'Mẫu căn hộ cao cấp với nội thất gỗ ấm cúng', 'Sang trọng, ấm cúng và tươi sáng là những cảm giác mà căn hộ cao cấp này mang lại với thiết kế nội thất hiện đại tinh tế. Một sự phối hợp hoàn hảo giữa các tông màu vàng nâu của gỗ, trắng và một vài điểm nhấn màu đen...', 2, 'a4.webp', 'Lê Mai Chi', '2023-11-24 14:46:41', 2),
(9, 'Ấn tượng căn hộ với khu vui chơi trong nhà', 'Căn hộ chung cư là tổ ấm của một cặp vợ chồng trẻ có một không gian chung khá rộng lớn được tích hợp một số tính năng như 1 khu vui chơi nhỏ với cầu tuột, xích đu... để họ có thể vui đùa cùng cô con gái nhỏ hàng ngày.', 2, 'product4.png', 'Lê Mai Chi', '2023-11-08 14:54:32', 24),
(14, 'Nội thất căn hộ với những màu sắc tương phản', 'Xu hướng phát triển những ngôi nhà nhỏ đẹp đang ngày càng phổ biến bởi vì nó có một mức giá hợp lý với một diện tích phù hợp nhu cầu của thế hệ trẻ có một cuộc sống năng động.   ', 1, 'product6.png', 'Lê Mai Chi', '2023-11-26 14:39:31', 2),
(15, 'Thiết kế ấm cúng và sáng sủa cho nhà nhỏ đẹp 29m2', 'Căn hộ chung cư này có diện tích khá nhỏ, nên các kiến trúc sư đã lựa chọn kết hợp màu đen với màu vàng của gỗ để tạo nên một sự tương phản nổi bật làm cho căn hộ ấn tượng cũng như ấm áp hơn. ', 1, 'product2.png', 'Lê Mai Chi', '2023-11-26 14:39:35', 2),
(16, 'Nhà nhỏ đẹp với nội thất không gian mở thông minh', 'Không gian nội thất nhà bếp được thiết kế một cách tinh tế và ta có thể thấy việc tận dụng không gian một cách triệt để qua thiết kế của chiếc bàn ăn nhỏ độc đáo, giúp tiết kiệm không ít không gian của ngôi nhà.', 1, 'a5.webp', 'Lê Mai Chi', '2023-11-24 14:42:06', 2023),
(17, 'Thiết kế nội thất tinh tế cho căn hộ nhỏ đẹp', 'Để không gian nhà bếp và phòng khách không quá đơn điệu, các nhà thiết kế đã thêm một mảng tường xanh vừa tạo được điểm nhấn vừa giúp ngôi nhà đẹp có thêm sức sống.', 1, '2.webp', 'Lê Mai Chi', '2023-11-24 14:46:03', 2023);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders_pending`
--

CREATE TABLE `tbl_orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders_pending`
--

INSERT INTO `tbl_orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(3, 3, 124712576, 6, 1, 'pending'),
(4, 3, 1316398178, 2, 1, 'pending'),
(5, 3, 804117365, 3, 1, 'pending'),
(6, 3, 773669601, 4, 1, 'pending'),
(7, 3, 1514143241, 1, 1, 'pending'),
(8, 3, 1798405684, 5, 1, 'pending'),
(9, 3, 975981827, 2, 1, 'pending'),
(10, 3, 1751772986, 3, 1, 'pending'),
(11, 3, 994387546, 8, 2, 'pending'),
(12, 3, 1917237265, 5, 2, 'pending'),
(13, 3, 59573666, 6, 1, 'pending'),
(14, 3, 1325235640, 5, 2, 'pending'),
(15, 3, 1087829681, 6, 3, 'pending'),
(16, 3, 1999759624, 4, 3, 'pending'),
(17, 3, 1305126828, 6, 3, 'pending'),
(18, 3, 2033663978, 3, 1, 'pending'),
(19, 3, 267614272, 5, 1, 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_price_new` bigint(255) NOT NULL,
  `product_price_old` bigint(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_title`, `product_description`, `product_price_new`, `product_price_old`, `category_id`, `product_image1`, `product_image2`, `date`, `status`) VALUES
(1, 'Căn hộ 2PN tại Pearl Plaza', 'Căn hộ 2PN Pearl Plaza mang đến một không gian sống hoàn hảo với sự đầu tư vượt trội về tiện ích, sự đột phá trong thiết kế và tiện nghi phục vụ tối đa nhu cầu của cư dân, mang lại một không gian sống thư giãn yên bình và ngập tràn hạnh phúc.', 3500000000, 0, 4, 'product1.png', '2.webp', '2023-11-06 09:24:00', 0),
(2, 'Căn hộ 3PN ở Pearl Plaza', 'Căn hộ 3PN Pearl Plaza mang đến một không gian sống hoàn hảo với sự đầu tư vượt trội về tiện ích, sự đột phá trong thiết kế và tiện nghi phục vụ tối đa nhu cầu của cư dân, mang lại một không gian sống thư giãn yên bình và ngập tràn hạnh phúc.', 15000000000, 16000000000, 1, 'product2.png', '2.webp', '2023-11-06 09:24:08', 0),
(3, 'Bán căn hộ SSG Tower 3PN', 'Cần bán lại căn hộ 3 phòng ngủ tại Khu phức hợp cao cấp Pearl Plaza, căn hộ có góc nhìn được 02 mặt tiền đường và sông Sai Gòn. Được hưởng tất cả các tiện ích của khu phức hợp như: Trung tâm mua sắm Pearl Plaza, rạp chiếu phim Megastar, hồ bơi, siêu thị dưới tầng hầm, gần trạm Metro số 4 tầm 200m .  ', 3200000000, 0, 6, 'product3.png', '2.webp', '2023-11-06 09:24:12', 0),
(4, 'Bán căn hộ SSG Tower 2 PN', 'Cần bán lại căn hộ 2 phòng ngủ tại Khu phức hợp cao cấp Pearl Plaza, căn hộ có góc nhìn được 02 mặt tiền đường và sông Sai Gòn. Được hưởng tất cả các tiện ích của khu phức hợp như: Trung tâm mua sắm Pearl Plaza, rạp chiếu phim Megastar, hồ bơi, siêu thị dưới tầng hầm, gần trạm Metro số 4 tầm 200m .  ', 40000000000, 0, 6, 'product4.png', '2.webp', '2023-11-06 09:24:17', 0),
(5, 'Nhà phố đẹp 3 tầng khắc phục nắng hướng tây', 'Điểm bất lợi của ngôi nhà phố đẹp 3 tầng này là có mặt tiền hướng tây, thường làm cho ngôi nhà của bạn có cảm giác như đang bị nung nóng bởi một bếp lò khổng lồ của những tia nắng mặt trời chiếu rọi.', 2100000000, 0, 6, 'product5.png', '2.webp', '2023-11-06 09:24:22', 0),
(6, 'Nhà đẹp 2 tầng với thiết kế gần gũi thiên nhiên', 'Ngôi nhà đẹp 2 tầng là một không gian sống rộng rãi với thiết kế không gian mở hiện đại tạo nên một bầu không khí thoáng mát và gần gũi với thiên nhiên cho toàn bộ ngôi nhà.', 6200000000, 6500000000, 6, 'product6.png', '2.webp', '2023-11-06 09:24:27', 0),
(8, 'Căn hộ 2PN tại Pearl Plaza', 'Căn hộ 2PN Pearl Plaza mang đến một không gian sống hoàn hảo với sự đầu tư vượt trội về tiện ích, sự đột phá trong thiết kế và tiện nghi phục vụ tối đa nhu cầu của cư dân, mang lại một không gian sống thư giãn yên bình và ngập tràn hạnh phúc.', 250000, 0, 3, '2.webp', 'a1.webp', '2023-11-17 06:45:49', 0),
(9, 'Bán căn hộ Pent House tầng 18', 'Cần bán căn penthouse,tầng 12, nhà CT1 khu đô thị Trung Văn (thuộc Cty cổ phần đầu tư XD Hà Nội, HANCIC -USC) nằm trên trục đường Tố Hữu (Lê Văn Lương kéo dài cũ)', 2200000000, 0, 2, 'product11.webp', 'product6.png', '2023-11-21 14:11:44', 0),
(10, 'Nhà phố đẹp 4 tầng hiện đại', 'Ngôi nhà phố đẹp 4 tầng tọa lạc tại một khu đất hẹp tại quận 7, Tp HCM. Ngôi nhà được các kiến trúc sư thiết kế theo phong cách hiện đại trẻ trung đồng thời tạo ra các không gian linh hoạt thông thoáng xen kẻ giữa những khu vườn nhỏ mang lại bầu không khí tươi mát cho ngôi nhà.', 5000000000, 0, 1, 'product18.webp', 'product16.webp', '2023-11-21 14:15:45', 0),
(11, 'Căn hộ Pent House Tầng 16', 'Cần bán căn penthouse,tầng 10, nhà CT1 khu đô thị Trung Văn (thuộc Cty cổ phần đầu tư XD Hà Nội, HANCIC -USC) nằm trên trục đường Tố Hữu (Lê Văn Lương kéo dài cũ)', 32000000000, 0, 3, 'product17.webp', 'product16.webp', '2023-11-21 14:16:17', 0),
(12, 'Mẫu thiết kế nhà phố đẹp 2 tầng hiện đại', 'Ngôi nhà phố đẹp 4 tầng tọa lạc tại một khu đất hẹp tại quận 7, Tp HCM. Ngôi nhà được các kiến trúc sư thiết kế theo phong cách hiện đại trẻ trung đồng thời tạo ra các không gian linh hoạt thông thoáng xen kẻ giữa những khu vườn nhỏ mang lại bầu không khí tươi mát cho ngôi nhà.', 500000000, 0, 5, 'product16.webp', 'product16.webp', '2023-11-21 14:16:54', 0),
(13, 'Mẫu thiết kế nhà phố đẹp 2 tầng hiện đại đơn giản', 'Ngôi nhà phố đẹp 4 tầng tọa lạc tại một khu đất hẹp tại quận 7, Tp HCM. Ngôi nhà được các kiến trúc sư thiết kế theo phong cách hiện đại trẻ trung đồng thời tạo ra các không gian linh hoạt thông thoáng xen kẻ giữa những khu vườn nhỏ mang lại bầu không khí tươi mát cho ngôi nhà.', 5100000000, 0, 1, 'product15.webp', 'product16.webp', '2023-11-21 14:17:29', 0),
(14, 'Mẫu thiết kế nhà phố đẹp 3 tầng hiện đại', 'Ngôi nhà phố đẹp 4 tầng tọa lạc tại một khu đất hẹp tại quận 7, Tp HCM. Ngôi nhà được các kiến trúc sư thiết kế theo phong cách hiện đại trẻ trung đồng thời tạo ra các không gian linh hoạt thông thoáng xen kẻ giữa những khu vườn nhỏ mang lại bầu không khí tươi mát cho ngôi nhà.', 5000000000, 5200000000, 5, 'product14.webp', 'product16.webp', '2023-11-21 14:18:48', 0),
(15, 'Bán căn hộ Pent House tầng 18', 'Cần bán căn penthouse,tầng 12, nhà CT1 khu đô thị Trung Văn (thuộc Cty cổ phần đầu tư XD Hà Nội, HANCIC -USC) nằm trên trục đường Tố Hữu (Lê Văn Lương kéo dài cũ)', 5000000000, 0, 4, 'product11.webp', 'product8.png', '2023-11-21 14:26:15', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_phone_number` varchar(100) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone_number`, `user_ip`, `user_address`) VALUES
(3, 'hoangphuc', 'phuc@gmail.com', '$2y$10$/BlYdGNyRxrU0M1JPRCtfu0y9DnbznjbRdyHz3JM.WwrsCmKEmTUK', '0123456789', '::1', ''),
(7, 'hoangphuc03', 'hoangphuc04@gmail.com', '$2y$10$FLj2bERAIhNfvANIP7O2cOGXg2q91s9rCNVJYN9x9RfVYTf2KlRwu', '12345678', '::1', 'ktx khu b đại học mỏ địa chất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user_orders`
--

CREATE TABLE `tbl_user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user_orders`
--

INSERT INTO `tbl_user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(17, 3, 2, 267614272, 1, '2023-11-26 21:12:51', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `tbl_news_products`
--
ALTER TABLE `tbl_news_products`
  ADD PRIMARY KEY (`news_product_id`);

--
-- Chỉ mục cho bảng `tbl_orders_pending`
--
ALTER TABLE `tbl_orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `tbl_user_orders`
--
ALTER TABLE `tbl_user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_news_products`
--
ALTER TABLE `tbl_news_products`
  MODIFY `news_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_orders_pending`
--
ALTER TABLE `tbl_orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_user_orders`
--
ALTER TABLE `tbl_user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
