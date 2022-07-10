-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 01, 2021 lúc 11:16 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `date_order` date NOT NULL,
  `total` double(10,0) NOT NULL,
  `payment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(4, 'Nguyễn Minh Đức', 'nam', '17december520@gmail.com', '307 Nguyễn Bình, xã Phú Xuân, huyện Nhà Bè, tp.HCM', '0123456789', 'dit memayf', '2021-02-01 03:18:06', '2021-02-01 03:18:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_10_093734_create_new_tables', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(10,0) NOT NULL,
  `promotion_price` double(10,0) NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `unit`, `new`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Loa đứng Nanomax RF – 611', 1, 'tôi là đức', 4900000, 4500000, 'cái', 1, 'loa1.jpg', NULL, NULL),
(2, 'Loa đứng PARAMAX F-1000 ', 1, 'tôi là đức', 3000000, 2800000, 'cái', 1, 'loa2.jpg', NULL, NULL),
(3, 'Loa Đứng DH959S – Loatrinty', 1, 'tôi là đức', 3250000, 0, 'cái', 0, 'loa3.jpg', NULL, NULL),
(4, 'Loa đứng Klipsch', 1, 'tôi là đức', 2345000, 0, 'cái', 0, 'loa4.jpg', NULL, NULL),
(5, 'Loa bookshelf Pioneer ', 2, 'đức là tôi', 1000000, 999999, 'cái', 1, 'loa5.jfif', NULL, NULL),
(6, 'Loa Bookshelf Q Acoustics 3010i', 2, 'đức là tôi', 6000000, 5999000, 'cái', 1, 'loa6.jpg', NULL, NULL),
(7, 'Loa Bookshelf Dynaudio Contour 20', 2, 'đức là tôi', 1000000, 0, 'cái', 0, 'loa7.jpg', NULL, NULL),
(8, 'Loa bookshelf Jamo C803', 2, 'đức là tôi', 4000000, 0, 'cái', 0, 'loa8.jpg', NULL, NULL),
(9, 'Loa Bluetooth LG PK3', 3, 'đức nè', 3250000, 1000000, 'cái', 1, 'loa9.jpg', NULL, NULL),
(10, 'Loa Bluetooth Fllp 3 plus', 3, 'đức nè', 2600000, 2500000, 'cái', 1, 'loa10.jpg', NULL, NULL),
(11, 'Loa Bluetooth Soundlink Mini S2026', 3, 'đức nè', 1500000, 0, 'cái', 0, 'loa11.jpg', NULL, NULL),
(12, 'Loa Bluetooth JBL Boombox chính hãng chống nước IP', 3, 'đức nè', 1500000, 0, 'cái', 0, 'loa12.jpg', NULL, NULL),
(13, 'Loa treo tường APlus A-675HF chính hãng 100% - Apl', 4, 'hihi', 1000000, 0, 'cái', 0, 'loa13.jpg', NULL, NULL),
(14, 'Loa treo tường APlus A-676HF chính hãng, chất lượn', 4, 'hihi', 1700000, 1500000, 'cái', 1, 'loa14.jpg', NULL, NULL),
(15, 'Loa treo tường JBL CSS 1S/T ', 4, 'hihi', 2300000, 0, 'cái', 0, 'loa15.jpg', NULL, NULL),
(16, 'Loa treo tường APlus A-919 - ÂM THANH HỘI TRƯỜNG', 4, 'hihi', 2000000, 1700000, 'cái', 1, 'loa15.jpg', NULL, NULL),
(17, 'LOA ÂM TƯỜNG - ÂM TRẦN | SAIGON HD', 5, 'Không có mô tả', 3000000, 0, 'cái', 0, 'loa18.jpg', NULL, NULL),
(18, 'Loa Âm Tường Klipsch R-5650-S (200W)', 5, 'Thiết kế âm tường hiện đại. Loa Âm Tường Klipsch R-5650-S II IN-WALL là  loa đứng thiết kế âm tường thuộc dòng Reference II cho khả năng chơi nhạc...', 1500000, 1400000, 'cái', 1, 'loa19.jpg', NULL, NULL),
(19, 'Loa Âm Tường Dynaudio S4-W65', 5, 'Có thể nói ngay rằng, với những tiến bộ của công nghệ làm loa ngày nay,  việc chế tác các mẫu loa âm tường không còn thua kém bao nhiêu so về chất...', 2500000, 2450000, 'cái', 1, 'loa16.jpg', NULL, NULL),
(20, 'Loa âm tường B&W CWM 664 ', 5, 'Không có mô tả', 2000000, 0, 'cái', 0, 'loa17.jpg', NULL, NULL),
(21, 'Loa kéo JBZ NE108', 6, 'Công suất loa 60W, Tặng kèm micro không dây, Kết nối bluetooth không dây  tiện lợi, Bảo hành 3 tháng, Miễn phí giao hàng toàn quốc, 0902 055 884', 4990000, 0, 'cái', 0, 'loa20.jpg', NULL, NULL),
(22, 'Loa kéo JBA A09', 6, 'Không có mô tả', 4500000, 4000000, 'cái', 1, 'loa21.jpg', NULL, NULL),
(23, 'Loa kéo cao cấp Bose 15A', 6, 'Không có mô tả', 3000, 0, 'cái', 0, 'loa22.jpg', NULL, NULL),
(24, 'Loa kéo mini RONAMAX V8', 6, 'Model: RONAMAX V-8, -Chất liệu: nhựa, -Kết nối bluetooth, -Cổng nghe nhạc  từ USB ( max 16G) / TF Card, -Nghe radio FM, -Cổng 6.5mm : cắm micro, ...', 5250000, 5100000, 'cái', 1, 'loa23.jpg', NULL, NULL),
(25, 'Loa vi tính 2.1 Enkor S2880 Đen', 7, 'Loa nghe nhạc Loa vi tính 2.1 Enkor S2880 Đen giá rẻ, chính hãng, âm thanh  chất lượng cao. Bảo hành 1 đổi 1 trong vòng 1 năm nếu lỗi, giao hàng tận ...', 1500000, 1400000, 'cái', 1, 'loa24.jpg', NULL, NULL),
(26, 'Loa vi tính Enkor 2.1 R228', 7, 'Loa Vi Tính Enkor 2.1 R228 chính hãng. Giao hàng nhanh chóng toàn quốc  trong 1 giờ. 1 đổi 1 tháng đầu tiên với sản phẩm lỗi.', 1300000, 0, 'cái', 0, 'loa25.jpg', NULL, NULL),
(27, 'Loa Vi Tính 5.1 SOUNDMAX B60', 7, 'không có mô tả', 4990000, 5450000, 'cái', 1, 'loa26.jpg', NULL, NULL),
(28, 'LOA VI TÍNH MICROLAB FC-570BT', 7, 'Thiết kế hợp thời trang, thích hợp nhiều không gian Hệ thống loa 2.1 cho âm  thanh sống động chân thật Hỗ trợ jack cắm 3,5 mm kết nối nhanh chóng Tương  ...', 3500000, 0, 'cái', 0, 'loa27.jpg', NULL, NULL),
(29, 'Loa Đứng Paramax F 1000 ', 1, 'không có mô tả', 2000000, 1500000, 'cái', 1, 'loa28.jpg', NULL, NULL),
(30, 'LOA ĐỨNG KARAOKE POWER AUDIO PA-5300 (800W)', 1, 'đây là loa', 6000000, 0, 'cái', 0, 'loa29.jpg', NULL, NULL),
(31, 'Loa Đứng Karaoke Dkars D-600', 1, 'loa này nghe hay nè', 3500000, 0, 'cái', 0, 'loa30.jpg', NULL, NULL),
(32, 'Loa Đứng Karaoke Dkars D-600', 1, 'đây là loa nè', 4990000, 2450000, 'cái', 1, 'loa28', NULL, NULL),
(33, 'Loa đứng JBL KP1200 ', 1, 'loa này nghe hay', 2000000, 0, 'cái', 0, 'l', NULL, NULL),
(34, 'Loa Đứng Karaoke Dkars D-600', 1, 'ĐÂY là loa nè', 4990000, 2450000, 'cái', 1, 'loa28.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `images` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `images`, `created_at`, `updated_at`) VALUES
(1, 'banner1.jpg', NULL, NULL),
(2, 'banner2.jpg', NULL, NULL),
(3, 'banner3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `mota`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Loa Đứng', 'Loa đứng hay còn gọi là loa cột vì có hình dáng cao, nhọn, thường có thiết kế hình trụ và được đặt trực tiếp trên sàn nhà khi mở nhạc. Không giống với loa Bookshelf, có thể đặt đứng hoặc đặt nằm. Các cặp loa đứng thường có chiều cao phù hợp với các ngưỡng nghe bình thường (tai người có thể nghe tương đương chiều cao của loa tweeter) nên người sử dụng không cần phải kê hoặc đặt lên kệ để tăng chiều cao của sản phẩm. ', 'loailoa1.jpg', NULL, NULL),
(2, 'Loa Bookshelf', 'Loa Bookshelf (Loa kệ sách) có tên gọi xuất phát từ những cặp loa thùng kín và có kích thước nhỏ. Lần đầu tiên xuất hiện tại thị trường âm thanh Âu Mỹ như Alec Lansing, JBL, Leak, Acoustics Research, Clestion,... Ở thời điểm đó, những cặp loa này thường được thính giả đặt trên các mặt tủ hoặc trên các giá sách bởi kích thước và hình dáng nhỏ gọn. Tên gọi loa giá sách hay loa kệ sách đã ra đời từ đó, thường để chỉ những chiếc loa nhỏ, khi sử dụng phải kê hoặc đặt lên trên một mặt phẳng để tăng chiều cao so với sàn nhà và đồng thời cũng tính thẩm mỹ cho căn phòng.', 'loailoa2.jpg', NULL, NULL),
(3, ' Loa Bluetooth', 'Loa Bluetooth là những chiếc loa không dây, có thể di chuyển dễ dàng và chơi nhạc thông qua việc kết nối giữa bluetooth và điện thoại hoặc máy tính bảng. Loa bluetooth thường có kích cỡ từ mini cho tới lớn và chúng có thể thuận tiện mang theo khi đi ra ngoài hoặc đi du lịch, dã ngoại. Các dòng loa Bluetooth di động này tùy theo nhà sản xuất mà sẽ sở hữu những tính năng riêng. Ví dụ: Khả năng chống nước tiêu chuẩn, điều khiển bằng giọng nói, có micro đàm thoại, tích hợp đài FM hay tích hợp dãy đèn LED đổi màu theo điệu nhạc. ', 'loailoa3.jpg', NULL, NULL),
(4, 'Loa Treo Tường', 'Đặc điểm chung của dòng loa này là nhỏ, nhẹ, gọn và mỏng. Loa này thường được dùng để treo lên tường nhằm tăng độ tán xạ âm thanh hoặc để tạo hiệu ứng âm thanh vòm trong phòng.', 'loailoa4.jpeg', NULL, NULL),
(5, 'Loa Âm Tường', 'Loa âm tường là loại loa được đặt sâu trong tường sao cho mặt loa song song với mặt tường. Thường thì người nghe có nhu cầu sử dụng loa âm tường cho những hệ thống âm thanh xem phim đòi hỏi tính thẩm mỹ cao trong các không gian nội thất hiện đại.', 'loailoa5.jpg', NULL, NULL),
(6, ' Loa kéo', 'Đây là loại loa thích hợp cho những ai yêu thích hát karaoke và có thể linh hoạt di chuyển. Loa kéo thường được trang bị bốn bánh xe, tay cầm và tay kéo để người sử dụng có thể kéo đi, cùng với micro đi kèm để hát karaoke ở nhiều nơi.\r\nHiện nay các loại loa kéo được hỗ trợ kết nối Bluetooth với điện thoại để điều khiển tiện lợi hơn.', '', NULL, NULL),
(7, 'Loa vi tính', 'Loa vi tính là loại loa đồng hành với người dùng khá là lâu rồi. Bằng việc kết nối dây với máy tính giúp cho bạn tận hưởng âm thanh rõ ràng và sôi động hơn cũng như đáp ứng vừa đủ nhu cầu học tập hay giải trí thường ngày.\r\n\r\n', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_id_customer_foreign` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_id_bill_foreign` (`id_bill`),
  ADD KEY `bill_detail_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
