-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2022 at 04:22 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2022_lanhuonglip`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-05-07-075348', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1620724574, 1),
(2, '2021-05-10-065929', 'App\\Database\\Migrations\\TblRole', 'default', 'App', 1620724574, 1),
(3, '2021-05-10-074111', 'App\\Database\\Migrations\\TblPhoto', 'default', 'App', 1620724574, 1),
(4, '2021-05-12-023327', 'App\\Database\\Migrations\\TblSystem', 'default', 'App', 1620786977, 2),
(5, '2021-05-12-072348', 'App\\Database\\Migrations\\TblCity', 'default', 'App', 1620804383, 3),
(6, '2021-05-12-083334', 'App\\Database\\Migrations\\TblDistrict', 'default', 'App', 1620808584, 4),
(7, '2021-05-12-094342', 'App\\Database\\Migrations\\TblWard', 'default', 'App', 1620813446, 5),
(8, '2021-05-13-010451', 'App\\Database\\Migrations\\TblStreet', 'default', 'App', 1620868039, 6),
(9, '2021-05-13-031451', 'App\\Database\\Migrations\\TblAcreage', 'default', 'App', 1620875859, 7),
(10, '2021-05-13-042323', 'App\\Database\\Migrations\\TblPrice', 'default', 'App', 1620880564, 8),
(11, '2021-05-13-071736', 'App\\Database\\Migrations\\TblModule', 'default', 'App', 1620890854, 9),
(12, '2021-05-13-114302', 'App\\Database\\Migrations\\TblNews', 'default', 'App', 1620906462, 10),
(13, '2021-05-13-125030', 'App\\Database\\Migrations\\TblAlias', 'default', 'App', 1620910362, 11),
(15, '2021-05-18-010234', 'App\\Database\\Migrations\\TblUser', 'default', 'App', 1621300108, 12),
(16, '2021-05-18-032812', 'App\\Database\\Migrations\\TblCategory', 'default', 'App', 1621308904, 13),
(17, '2021-05-18-084007', 'App\\Database\\Migrations\\TblNewsLand', 'default', 'App', 1621328617, 14),
(18, '2021-05-20-010426', 'App\\Database\\Migrations\\TblNewslandPhoto', 'default', 'App', 1621473116, 15),
(19, '2021-05-20-011252', 'App\\Database\\Migrations\\TblNewslandMenu', 'default', 'App', 1621473244, 16),
(20, '2021-05-25-092404', 'App\\Database\\Migrations\\Direction', 'default', 'App', 1621935210, 17),
(21, '2021-05-26-014724', 'App\\Database\\Migrations\\TblNeeds', 'default', 'App', 1621993713, 18),
(22, '2021-05-26-070747', 'App\\Database\\Migrations\\TblPhaply', 'default', 'App', 1622013386, 19),
(23, '2021-05-26-094400', 'App\\Database\\Migrations\\TblTags', 'default', 'App', 1622022348, 20),
(24, '2021-05-26-094649', 'App\\Database\\Migrations\\TblTagsDetail', 'default', 'App', 1622022506, 21),
(25, '2021-05-26-072117', 'App\\Database\\Migrations\\TestTable', 'default', 'App', 1622025101, 22),
(26, '2021-05-26-102444', 'App\\Database\\Migrations\\TblNewslandContact', 'default', 'App', 1622025101, 22),
(27, '2021-05-31-033325', 'App\\Database\\Migrations\\PageLink', 'default', 'App', 1622432135, 23),
(28, '2021-05-31-041302', 'App\\Database\\Migrations\\TblMenu', 'default', 'App', 1622436791, 24),
(29, '2021-06-01-095727', 'App\\Database\\Migrations\\PriceList', 'default', 'App', 1622542031, 25),
(30, '2021-06-02-073535', 'App\\Database\\Migrations\\Quangcao', 'default', 'App', 1622620163, 26),
(31, '2021-06-04-024830', 'App\\Database\\Migrations\\TblProductLike', 'default', 'App', 1622774985, 27),
(32, '2021-06-10-064628', 'App\\Database\\Migrations\\TblTutorial', 'default', 'App', 1623307936, 28),
(34, '2022-11-15-013911', 'App\\Database\\Migrations\\TblCandidate', 'default', 'App', 1668477138, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int NOT NULL,
  `id_role` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `text_pass` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `id_role`, `username`, `fullname`, `email`, `phone`, `image`, `thumb`, `month`, `year`, `password`, `salt`, `text_pass`, `active`, `created_at`, `updated_at`) VALUES
(16, 0, 'admin', 'Quản trị viên', 'hieu.optech@gmail.com', '0934084426', '2021/05/admin.jpg', '2021/05/thumb/admin.jpg', '05', '2021', 'c889e1833d4a6269f7d9f94e0492cc4754a286fc', 'G5RSpgKD', '123', 1, '2021-05-14 17:11:05', '2021-10-06 15:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advise`
--

CREATE TABLE `tbl_advise` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_advise`
--

INSERT INTO `tbl_advise` (`id`, `name`, `phone`, `note`, `created_at`) VALUES
(2, 'Võ Khánh Duy', '0982824398', 'ădsasd', '2022-02-13 09:45:25'),
(4, 'Võ Khánh Duy 2', '0982824391', 'ădsasd', '2022-02-13 09:47:10'),
(5, 'Minh Hiếu', '0934084426', 'dsdsdsdsd', '2022-02-13 15:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advise_phone`
--

CREATE TABLE `tbl_advise_phone` (
  `id` int UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `id` int NOT NULL,
  `name` varchar(1000) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `thumb` varchar(1000) NOT NULL,
  `webps` varchar(1000) NOT NULL,
  `webps_thumb` varchar(1000) NOT NULL,
  `publish` int NOT NULL,
  `sort` int NOT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `des` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`id`, `name`, `link`, `image`, `thumb`, `webps`, `webps_thumb`, `publish`, `sort`, `month`, `year`, `des`, `created_at`, `updated_at`) VALUES
(1, 'Album ảnh SON HANDMADE', '', '2022/08/album-01.png.png', '2022/08/thumb/album-01.png.png', 'uploads/webps/album/2022/08/album-01.webp', 'uploads/webps/album/2022/08/thumb/album-01.webp', 1, 1, 8, 2022, '', '2022-08-11 19:39:15', '0000-00-00 00:00:00'),
(2, 'Album ảnh SON HANDMADE', '', '2022/08/album-02.png.png', '2022/08/thumb/album-02.png.png', 'uploads/webps/album/2022/08/album-02.webp', 'uploads/webps/album/2022/08/thumb/album-02.webp', 1, 2, 8, 2022, '', '2022-08-11 19:39:50', '0000-00-00 00:00:00'),
(3, 'Album ảnh SON HANDMADE', '', '2022/08/album-03.png.png', '2022/08/thumb/album-03.png.png', 'uploads/webps/album/2022/08/album-03.webp', 'uploads/webps/album/2022/08/thumb/album-03.webp', 1, 3, 8, 2022, '', '2022-08-11 19:39:58', '0000-00-00 00:00:00'),
(4, 'Album ảnh SON HANDMADE', '', '2022/08/album-04.png.png', '2022/08/thumb/album-04.png.png', 'uploads/webps/album/2022/08/album-04.webp', 'uploads/webps/album/2022/08/thumb/album-04.webp', 1, 4, 8, 2022, '', '2022-08-11 19:40:05', '0000-00-00 00:00:00'),
(5, 'Album ảnh SON HANDMADE', '', '2022/08/album-05.png.png', '2022/08/thumb/album-05.png.png', 'uploads/webps/album/2022/08/album-05.webp', 'uploads/webps/album/2022/08/thumb/album-05.webp', 1, 5, 8, 2022, '', '2022-08-11 19:40:12', '0000-00-00 00:00:00'),
(6, 'Album ảnh SON HANDMADE', '', '2022/08/album-06.png.png', '2022/08/thumb/album-06.png.png', 'uploads/webps/album/2022/08/album-06.webp', 'uploads/webps/album/2022/08/thumb/album-06.webp', 1, 6, 8, 2022, '', '2022-08-11 19:40:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alias`
--

CREATE TABLE `tbl_alias` (
  `id` int NOT NULL,
  `type` int NOT NULL,
  `alias` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_alias`
--

INSERT INTO `tbl_alias` (`id`, `type`, `alias`, `created_at`, `updated_at`) VALUES
(48231, 3, 'san-pham-1', '2021-11-25 17:19:43', NULL),
(48243, 1, 'khuyen-mai', '2021-12-02 11:41:27', NULL),
(48251, 3, 'ba-chi-nuong', '2021-12-03 16:59:35', NULL),
(48252, 3, 'lau-chua-cay', '2021-12-03 17:03:25', NULL),
(48253, 3, 'bo-nuong', '2021-12-03 17:07:18', NULL),
(48254, 3, 'lau-hai-san', '2021-12-03 17:09:32', NULL),
(48255, 3, 'lau-cua-dong', '2021-12-03 17:10:35', NULL),
(48269, 4, 'admin-cap-nhat-noi-dung', '2022-04-25 10:59:48', NULL),
(48270, 4, 'admin-cap-nhat-noi-dung-bai-viet', '2022-04-25 11:01:39', NULL),
(48280, 3, 'be-ngu', '2022-05-04 16:22:06', NULL),
(48291, 1, 'gioi-thieu', '2022-05-06 15:16:53', NULL),
(48310, 5, 'dam-rut-day-chu-de-thuong-cho-be-gai-dgb292342', '2022-05-06 16:48:34', NULL),
(48322, 3, 'chan-goi-cho-be', '2022-05-19 21:05:47', NULL),
(48323, 3, 'giuong-cui-phu-kien', '2022-05-19 21:06:34', NULL),
(48324, 3, 'ghe-rung-cho-be', '2022-05-19 21:07:11', NULL),
(48325, 3, 'noi-em-be', '2022-05-19 21:07:35', NULL),
(48336, 1, 'tin-tuc', '2022-05-28 16:24:46', NULL),
(48351, 4, 'con-bi-ban-hoc-danh-khong-cho-ai-choi-cung-nu-doanh-nhan-o-tphcm-co-cach-xu-ly-cuc-kheo', '2022-06-06 10:56:03', NULL),
(48353, 4, 'me-va-be-cung-‘xay-hang-rao-mien-dich-de-con-khoe-manh-tu-trong-bung-me', '2022-06-06 14:00:42', NULL),
(48376, 4, 'meo-lua-chon-quan-ao-cho-tre-so-sinh-ma-ban-can-biet', '2022-07-15 14:56:38', NULL),
(48377, 4, 'test', '2022-07-15 15:04:46', NULL),
(48379, 4, 'test-438', '2022-07-15 15:37:11', NULL),
(48380, 4, 'ttt', '2022-07-15 15:37:49', NULL),
(48387, 4, 'top-5-nhom-thiet-bi-cho-spa-khong-the-thieu', '2022-08-11 08:03:22', NULL),
(48388, 4, 'chu-spa-phai-biet-top-5-may-cham-soc-da-da-nang-duoc-mua-nhieu-nhat-hien-nay', '2022-08-11 08:04:00', NULL),
(48389, 4, 'cong-nghe-triet-long-opt-shr-va-ipl-shr-su-giong-va-khac-nhau', '2022-08-11 08:04:45', NULL),
(48390, 4, 'du-bao-chien-luoc-kinh-doanh-cac-dich-vu-spa-hot-nam-2021', '2022-08-11 08:06:00', NULL),
(48391, 3, 'son-moi-viet-nam', '2022-08-12 15:21:34', NULL),
(48392, 3, 'son-moi-nhap-khau', '2022-08-12 15:21:52', NULL),
(48393, 3, 'son-duong-moi', '2022-08-12 15:22:20', NULL),
(48394, 3, 'son-mau-khong-chi', '2022-08-12 15:22:40', NULL),
(48395, 3, 'tay-da-chet-moi', '2022-08-12 15:22:54', NULL),
(48396, 3, 'son-li', '2022-08-12 15:23:02', NULL),
(48397, 5, 'organic-mint-lip-balm', '2022-08-13 07:28:09', NULL),
(48398, 5, 'organic-mint-lip-balm-176', '2022-08-13 07:29:06', NULL),
(48399, 5, 'cherry-lip-balm', '2022-08-13 07:31:28', NULL),
(48400, 5, 'fruit-pigmented-lip-glaze', '2022-08-13 07:33:02', NULL),
(48401, 5, 'fruit-pigmented-pomegranate-oil-antiaging-lipstick', '2022-08-13 07:34:34', NULL),
(48402, 5, 'fruit-pigmented-lip-gloss', '2022-08-13 07:35:17', NULL),
(48403, 5, 'lysine-herbs-lip-balm', '2022-08-13 07:38:54', NULL),
(48404, 5, 'lip-caramel', '2022-08-13 07:39:54', NULL),
(48405, 5, 'fruit-pigmented-lip-cheek-tint', '2022-08-13 07:40:37', NULL),
(48406, 5, 'fruit-pigmented-cherry-lip-cheek-stain', '2022-08-13 07:41:27', NULL),
(48407, 3, 'skin-care', '2022-08-13 07:42:23', NULL),
(48408, 5, 'vitamin-c-serum', '2022-08-13 07:46:41', NULL),
(48409, 5, 'multivitamin---antioxidants-potent-pm-serum', '2022-08-13 07:47:20', NULL),
(48410, 5, 'dark-spot-remover', '2022-08-13 07:48:06', NULL),
(48411, 5, 'green-tea-spf-30', '2022-08-13 07:48:45', NULL),
(48412, 5, 'charcoal-clay-cleanser', '2022-08-13 07:50:18', NULL),
(48413, 5, 'fruit-pigmented-pretty-naked-palette', '2022-08-13 07:54:33', NULL),
(48414, 5, 'creamy-long-last-liner', '2022-08-13 07:55:16', NULL),
(48415, 5, 'fruit-pigmented-better-naked-palette', '2022-08-13 07:55:51', NULL),
(48416, 5, 'maracuja-mascara', '2022-08-13 07:56:34', NULL),
(48417, 5, 'long-last-brows', '2022-08-13 07:57:12', NULL),
(48418, 5, 'cruelty-free-eye-liner-brush-6', '2022-08-13 07:58:01', NULL),
(48419, 1, 'ingredients', '2022-08-17 15:33:22', NULL),
(48420, 1, 'makeup', '2022-08-17 15:33:33', NULL),
(48421, 1, 'skincare', '2022-08-17 15:33:47', NULL),
(48422, 1, 'wellness', '2022-08-17 15:34:24', NULL),
(48423, 1, 'hair-body', '2022-08-17 15:34:37', NULL),
(48424, 4, 'double-cleansing-for-summer', '2022-08-17 15:39:58', NULL),
(48425, 4, 'double-cleansing-for-summer-351', '2022-08-17 15:41:58', NULL),
(48426, 4, 'a-basic-breakdown-of-eye-cream-benefits', '2022-08-17 15:44:34', NULL),
(48427, 4, 'a-basic-breakdown-of-eye-cream-benefits-790', '2022-08-17 15:45:53', NULL),
(48428, 4, 'facial-sunscreen-love-or-leave', '2022-08-17 15:48:11', NULL),
(48429, 4, 'exfoliation-101', '2022-08-17 15:48:47', NULL),
(48430, 4, '5-reasons-why-you-need-to-add-a-makeup-blender-to-your-beauty-arsenal', '2022-08-17 15:49:44', NULL),
(48431, 4, 'clean-girl-makeup-101', '2022-08-17 15:55:05', NULL),
(48432, 4, 'how-to-highlight-glow', '2022-08-17 15:55:37', NULL),
(48433, 4, 'how-to-achieve-budgeproof-makeup-all-day', '2022-08-17 15:56:02', NULL),
(48434, 4, 'meet-our-award-winners', '2022-08-17 15:56:32', NULL),
(48435, 4, 'chest-care-101', '2022-08-17 15:57:01', NULL),
(48436, 4, 'double-cleansing-worth-it-or-double-trouble', '2022-08-17 15:57:28', NULL),
(48437, 4, 'a-foolproof-guide-to-figuring-out-your-skin-undertone', '2022-08-17 16:17:25', NULL),
(48438, 4, 'what-does-your-scented-candle-say-about-you', '2022-08-17 16:17:57', NULL),
(48439, 4, 'why-you-should-be-using-soy-wax-candles', '2022-08-17 16:18:34', NULL),
(48440, 4, 'the-benefits-of-yoga', '2022-08-17 16:18:57', NULL),
(48441, 4, 'developing-healthy-habits', '2022-08-17 16:19:27', NULL),
(48442, 4, 'what-is-bioaccumulation', '2022-08-17 16:24:21', NULL),
(48443, 4, '5-licorice-root-benefits-for-skin', '2022-08-17 16:24:53', NULL),
(48444, 4, 'benefits-of-using-rose-water-for-hair', '2022-08-17 16:25:17', NULL),
(48445, 4, 'harsh-vs-natural-soap-surfactants', '2022-08-17 16:25:42', NULL),
(48446, 4, '6-reasons-to-use-lavender-oil-for-skin', '2022-08-17 16:26:18', NULL),
(48447, 4, 'caring-for-dry-cracked-hands', '2022-08-17 16:29:05', NULL),
(48448, 4, 'a-quick-reminder-on-why-everyone-loves-vitamin-c', '2022-08-17 16:29:33', NULL),
(48449, 4, 'eucalyptus-benefits-for-skin-hair-and-more', '2022-08-17 16:29:57', NULL),
(48455, 3, 'son-duong-moi-2', '2022-09-06 06:35:57', NULL),
(48456, 5, 'sdsdsd', '2022-09-08 17:19:25', NULL),
(48457, 5, 'sdsdsdsds', '2022-09-08 17:20:04', NULL),
(48459, 5, 'sdsdsdsd', '2022-09-08 17:22:53', NULL),
(48460, 5, 'dfdfdfddfdfdf', '2022-09-08 17:23:13', NULL),
(48464, 5, 'shu-uemura', '2022-09-09 09:05:29', NULL),
(48465, 5, '3ce', '2022-09-09 09:07:12', NULL),
(48466, 5, 'son-moi-3ce', '2022-09-09 09:09:04', NULL),
(48467, 5, 'son-lot-duong-day-moi-lemonade-45g', '2022-09-09 09:16:41', NULL),
(48468, 5, 'silkygirl', '2022-09-09 09:17:49', NULL),
(48469, 5, 'laneige', '2022-09-09 09:18:36', NULL),
(48470, 5, 'son-duong-bom-mau-do-tu-nhien', '2022-09-09 09:19:39', NULL),
(48471, 5, 'son-duong-moi-co-mau-baresoul-10g', '2022-09-09 09:20:33', NULL),
(48472, 5, 'son-duong-moi-khong-mau-baresoul-10g', '2022-09-09 09:21:17', NULL),
(48475, 4, 'tieu-de-bai-viet', '2022-09-16 13:11:14', NULL),
(48476, 3, 'vo-son-moi', '2022-10-09 00:26:00', NULL),
(48477, 3, 'may-moc', '2022-10-09 01:58:43', NULL),
(48478, 5, 'may-khuay-my-pham-tu-dong-gia-re', '2022-10-09 02:02:03', NULL),
(48479, 3, 'may-moc-883', '2022-10-09 02:05:21', NULL),
(48480, 3, 'vo-son-kem', '2022-10-13 11:47:48', NULL),
(48481, 3, 'vo-son-duong', '2022-10-14 13:47:55', NULL),
(48482, 5, 'vo-son-duong-010', '2022-10-14 13:49:09', NULL),
(48484, 3, 'son-moi-kimochi', '2022-10-14 14:13:25', NULL),
(48486, 5, 'vo-son-kem-hinh-bowling-s001', '2022-10-14 17:54:06', NULL),
(48487, 3, 'vo-son-thoi', '2022-10-14 18:21:12', NULL),
(48488, 3, 'chai-lo', '2022-10-14 18:21:41', NULL),
(48489, 3, 'bo-san-pham', '2022-10-14 19:01:36', NULL),
(48490, 5, 'bo-san-pham-thuy-tinh-trong-suot-b1', '2022-10-14 19:04:45', NULL),
(48491, 5, 'o-san-pham-thuy-tinh-cao-cap-b2', '2022-10-14 19:10:59', NULL),
(48492, 3, 'chai-serum', '2022-10-14 22:29:45', NULL),
(48493, 5, 'chai-serum-30ml', '2022-10-14 22:37:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_baogia`
--

CREATE TABLE `tbl_baogia` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `price_sale` int NOT NULL,
  `content` longtext NOT NULL,
  `link` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_baogia`
--

INSERT INTO `tbl_baogia` (`id`, `name`, `price`, `price_sale`, `content`, `link`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'GÓI PHỔ BIẾN', 2500000, 2300, '[{\"name\":\"30 M\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"0\"},{\"name\":\"30 M\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"1\"},{\"name\":\"30 M\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"2\"},{\"name\":\"T\\u1eb7ng th\\u00eam 2 m\\u00f3n qu\\u00e0 cho b\\u00e9\",\"number\":\"3\"}]', '', 2, 1, '2022-04-05 21:30:29', '2022-04-22 22:09:34'),
(2, 'GÓI CAO CẤP', 3800000, 3500, '[{\"name\":\"40 M\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"0\"},{\"name\":\"40 M\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"1\"},{\"name\":\"40 M\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"2\"},{\"name\":\"T\\u1eb7ng th\\u00eam 3 m\\u00f3n qu\\u00e0 cho b\\u00e9\",\"number\":\"3\"}]', '#', 3, 1, '2022-04-05 21:46:25', '2022-04-25 21:02:04'),
(3, 'GÓI TIẾT KIỆM', 1800000, 1600, '[{\"name\":\"20 m\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"0\"},{\"name\":\"20 m\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"1\"},{\"name\":\"20 m\\u00f3n \\u0111\\u1ed3 d\\u00f9ng cho m\\u1eb9 v\\u00e0 b\\u00e9\",\"number\":\"2\"},{\"name\":\"T\\u1eb7ng th\\u00eam 1 m\\u00f3n qu\\u00e0 cho b\\u00e9\",\"number\":\"3\"}]', 'https://www.google.com/', 1, 1, '2022-04-05 21:46:49', '2022-04-25 21:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `birthDay` date NOT NULL,
  `address` text NOT NULL,
  `dateGo` varchar(255) NOT NULL COMMENT 'ngày bay',
  `club` varchar(255) NOT NULL COMMENT 'thuộc câu lạc bộ',
  `goWith` int NOT NULL COMMENT 'đi với ai, 1 mình:1, nhóm: 2',
  `numPerson` varchar(255) NOT NULL COMMENT 'số người đi',
  `gender` int NOT NULL COMMENT '1:nam,2 nữ',
  `countryID` int NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `name`, `email`, `phone`, `birthDay`, `address`, `dateGo`, `club`, `goWith`, `numPerson`, `gender`, `countryID`, `created_at`) VALUES
(26, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1991-04-25', '78 Đặng Văn Bi, Bình Thọ, Thủ Đức, HCM', '2022-01-15', '', 1, '', 1, 4, '2022-01-15 10:52:34'),
(27, 'Minh Hiếu', 'lmhieu2104@gmail.com', '0934163286', '1990-04-22', 'QUẬN TÂN BÌNH, TP. HCM', '2022-01-16', 'CLB ABS', 2, '3', 1, 5, '2022-01-15 11:03:31'),
(28, 'Đỗ Văn Tiệp', 'tiepdv7@gmail.com', '0853956789', '1988-06-12', '26 Phạm Văn đồng, Vĩnh Hải, Nha Trang, Khánh Hoà', '2022-01-21', '', 1, '', 1, 4, '2022-01-18 17:08:29'),
(29, 'Võ Khánh Duy', 'vkduy240398@gmail.com', '0982824398', '1998-03-24', 'Đình Phú Lạc,  phường Bình Lợi,  quận Bình Chánh,  thành phố Hồ Chí Minh', '15/01/2022 - 19/02/2022', '', 1, '', 1, 4, '2022-01-26 20:35:04'),
(30, 'Võ Khánh Duy', 'vkduy240398@gmail.com', '0982824398', '1998-03-24', 'Đình Phú Lạc,  phường Bình Lợi,  quận Bình Chánh,  thành phố Hồ Chí Minh', '20/01/2022 - 26/02/2022', '', 1, '', 1, 4, '2022-01-26 20:48:56'),
(32, 'Võ Khánh Duy', 'vkduy240398@gmail.com', '0982824398', '1998-03-24', 'Đình Phú Lạc,  phường Bình Lợi,  quận Bình Chánh,  thành phố Hồ Chí Minh', '21/01/2022 - 28/02/2022', '', 1, '', 1, 5, '2022-01-26 20:57:58'),
(33, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1990-04-21', '78 đặng văn bi', '25/01/2022 - 27/01/2022', 'CLB ABS', 1, '', 1, 5, '2022-01-26 21:26:07'),
(34, 'Minh Hiếu 2', 'hieu.optech@gmail.com', '0899068368', '1989-04-22', '78 đặng văn bi 3333', '26/01/2022 - 27/01/2022', 'CLB ABS 444', 1, '', 1, 5, '2022-01-26 21:30:05'),
(35, 'Minh Hiếu 555', 'doc.abc@gmail.com', '0939888147', '1998-09-21', 'QUẬN TÂN BÌNH, TP. HCM', '26/01/2022 - 29/01/2022', 'CLB ABS 4555', 1, '', 1, 4, '2022-01-27 08:53:52'),
(36, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1990-05-21', '78 đặng văn bi', '27/01/2022 - 27/01/2022', 'CLB ABS', 1, '', 1, 5, '2022-01-27 10:20:52'),
(37, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1998-06-21', 'QUẬN TÂN BÌNH, TP. HCM', '27/01/2022 - 27/01/2022', 'CLB ABS', 1, '', 1, 5, '2022-01-27 10:25:09'),
(38, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1990-06-21', '78 Đặng Văn Bi, Bình Thọ, Thủ Đức, HCM', '26/01/2022 - 28/01/2022', 'CLB ABS 888', 1, '', 1, 5, '2022-01-27 10:36:20'),
(39, 'Trần Anh', 'chuan164475@gmail.com', '0939888140', '1985-05-21', 'Phạm Văn Đồng', '26/01/2022 - 28/01/2022', 'CLB ABS 999', 1, '', 1, 6, '2022-01-27 10:40:55'),
(40, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1998-05-21', 'QUẬN TÂN BÌNH, TP. HCM', '27/01/2022 - 27/01/2022', 'CLB ABS 444', 1, '', 1, 7, '2022-01-27 10:42:14'),
(41, 'Lê Thảo', 'hieu.optech@gmail.com', '0899068368', '1996-05-21', '78 đặng văn bi', '27/01/2022 - 27/01/2022', '', 1, '', 1, 7, '2022-01-27 10:46:18'),
(42, 'Thu Minh', 'lmhieu2104@gmail.com', '0934084426', '1998-05-21', '78 đặng văn bi', '26/01/2022 - 28/01/2022', '', 1, '', 1, 8, '2022-01-27 10:48:26'),
(43, 'Minh Uyên', 'hieu.optech@gmail.com', '0899068368', '1998-05-21', '78 đặng văn bi', '26/01/2022 - 28/01/2022', '', 1, '', 1, 8, '2022-01-27 11:02:37'),
(44, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1998-07-21', 'QUẬN TÂN BÌNH, TP. HCM', '27/01/2022 - 27/01/2022', 'CLB ABS', 1, '', 1, 5, '2022-01-27 11:04:23'),
(45, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1998-05-21', 'QUẬN TÂN BÌNH, TP. HCM', '26/01/2022 - 28/01/2022', 'CLB ABS 4555', 1, '', 1, 4, '2022-01-27 11:05:32'),
(46, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1998-07-21', 'QUẬN TÂN BÌNH, TP. HCM', '26/01/2022 - 29/01/2022', 'CLB ABS', 1, '', 1, 7, '2022-01-27 11:08:35'),
(47, 'Đỗ văn tiệp', 'Tiepdv7@gmail.com', '0853956789', '1988-06-12', '26 phạm văn đồng, Vĩnh Hải, nha trang', '28/01/2022 - 31/01/2022', '', 1, '', 1, 4, '2022-01-27 11:41:22'),
(48, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1998-04-21', '78 đặng văn bi', '26/01/2022 - 28/01/2022', '', 0, '', 1, 4, '2022-01-27 18:45:23'),
(49, 'Minh Hiếu', 'hieu.optech@gmail.com', '0899068368', '1998-06-21', 'QUẬN TÂN BÌNH, TP. HCM', '26/01/2022 - 28/01/2022', '', 0, '', 1, 5, '2022-01-27 18:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timework` varchar(50) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `name`, `address`, `phone`, `email`, `timework`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(10, 'Trụ sở chính', '169 Nguyễn Ngọc Vũ, Trung Hòa, Cầu Giấy, Hà Nội ', '081679.6789', 'info@phoxanhgroup.vn', '8h00 - 18h00 hàng ngày ', 3, 1, '2021-08-11 16:54:35', '2021-09-20 21:50:10'),
(13, 'Chi nhánh', 'Hải Phòng - Tầng 2 , Số 53 Lạch Tray , Ngô Quyền , Hải Phòng', '0988656561', 'info@phoxanhgroup.vn', '8h00 - 18h00 hàng ngày', 4, 1, '2021-08-11 16:59:46', '2021-09-20 21:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate`
--

CREATE TABLE `tbl_candidate` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `yearofbirth` int NOT NULL,
  `cv_name` varchar(1000) NOT NULL,
  `cv_path` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_candidate`
--

INSERT INTO `tbl_candidate` (`id`, `fullname`, `phone`, `email`, `address`, `yearofbirth`, `cv_name`, `cv_path`, `created_at`, `updated_at`) VALUES
(38, 'kZ1O 1LHYO', 8142757605, '49cxk43YfK2EuTtX@gmail.com', 'paP, 2TVuc', 1984, 'CV_kZ1O1LHYO_15112022230329.pdf', 'uploads/files/pdf/2022/11/CV_kZ1O1LHYO_15112022230329.pdf', '2022-11-15 15:09:20', '2022-11-15 23:03:29'),
(39, 'n7Nq 0V2', 8152231857, 'I4V7QmnPeUAIF0tC@gmail.com', '3lI, kBRU', 1973, 'CV_n7Nq0V2_15112022230324.pdf', 'uploads/files/pdf/2022/11/CV_n7Nq0V2_15112022230324.pdf', '2022-11-15 15:09:20', '2022-11-15 23:03:24'),
(40, 'QFU Lv8C0Fe', 8192141167, 'iaBnAnKjnopRZ30p@gmail.com', 'y3V, KBc7', 1976, 'CV_QFULv8C0Fe_15112022230318.pdf', 'uploads/files/pdf/2022/11/CV_QFULv8C0Fe_15112022230318.pdf', '2022-11-15 15:09:20', '2022-11-15 23:03:18'),
(41, 'Hyu TSnxNoL', 8177128122, 'BuABFhAoMnSGnZtz@gmail.com', '9Xx0, xJx2w', 1999, 'CV_HyuTSnxNoL_15112022230312.pdf', 'uploads/files/pdf/2022/11/CV_HyuTSnxNoL_15112022230312.pdf', '2022-11-15 15:09:20', '2022-11-15 23:03:12'),
(46, 'Lai Nguyen Thien Bao	', 333847391, '21231212@gmail.com', 'wewqewqe, 2t387211', 2003, 'CV_LaiNguyenThienBao_15112022230303.pdf', 'uploads/files/pdf/2022/11/CV_LaiNguyenThienBao_15112022230303.pdf', '2022-11-15 16:24:19', '2022-11-15 23:03:04'),
(48, 'Nguyen Thanh Phat', 2266337749, '232112@gmail.com', '24ihxdf87wh, 329yer1278qh', 2003, 'CV_NguyenThanhPhat_15112022230657.pdf', 'uploads/files/pdf/2022/11/CV_NguyenThanhPhat_15112022230657.pdf', '2022-11-15 23:00:40', '2022-11-15 23:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

CREATE TABLE `tbl_career` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `publish` int NOT NULL COMMENT '0: hiển thị, 1: ẩn đi',
  `sort` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_career`
--

INSERT INTO `tbl_career` (`id`, `name`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
(15, 'Công nghệ thông tin', 1, 1, '2021-07-16 08:12:46', '0000-00-00 00:00:00'),
(16, 'Du lịch', 1, 2, '2021-07-16 08:12:54', '0000-00-00 00:00:00'),
(17, 'Kế toán - kiểm toán', 1, 3, '2021-07-16 08:13:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type_payment` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `bankID` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `name`, `phone`, `email`, `type_payment`, `bankID`, `address`, `content`, `created_at`) VALUES
(65, 'Minh Hiếu', '0899068368', '', 'ck', 0, '78 đặng văn bi', 'test', '2022-05-07 21:25:17'),
(66, 'Minh Hiếu', '0899068368', '', 'ck', 0, '78 đặng văn bi', 'dfdfdf', '2022-05-07 23:04:45'),
(67, 'Minh Hiếu', '0899068368', '', 'ck', 0, '78 đặng văn bi', 'sssss', '2022-05-08 08:41:11'),
(68, 'test', '0963879962', '', 'ck', 0, 'test', 'test', '2022-05-09 14:52:13'),
(69, 'Social Ads', '0918648345', '', '', 0, 'D20/28H Võ Văn Vân, Vĩnh Lộc B, Bình Chánh, TPHCM', 'giao nhanh', '2022-05-18 09:54:19'),
(70, 'test', '0963879962', '', '', 0, 'TP. Buôn Ma Thuột, Daklak.', 'test', '2022-06-26 12:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `id` int UNSIGNED NOT NULL,
  `cartID` int NOT NULL,
  `productID` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`id`, `cartID`, `productID`, `qty`) VALUES
(22, 0, 92, 1),
(23, 0, 84, 1),
(24, 0, 123, 1),
(25, 0, 123, 1),
(26, 0, 127, 1),
(27, 0, 59, 1),
(28, 0, 55, 1),
(29, 0, 132, 1),
(30, 0, 95, 1),
(31, 0, 96, 1),
(32, 0, 132, 1),
(33, 0, 126, 1),
(34, 0, 128, 1),
(91, 65, 1, 1),
(92, 65, 14, 1),
(93, 66, 15, 2),
(94, 67, 15, 1),
(95, 68, 5, 1),
(96, 69, 15, 1),
(97, 70, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `parentid` int NOT NULL,
  `need_id` int NOT NULL DEFAULT '0',
  `publish` tinyint(1) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `left` tinyint(1) NOT NULL,
  `right` tinyint(1) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `footer` tinyint(1) NOT NULL,
  `main` tinyint(1) NOT NULL,
  `type` int NOT NULL,
  `sort` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `webps` varchar(255) DEFAULT NULL,
  `webps_thumb` varchar(255) DEFAULT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_descriptions` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `content` longtext NOT NULL,
  `content_bottom` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `des`, `parentid`, `need_id`, `publish`, `home`, `left`, `right`, `hot`, `footer`, `main`, `type`, `sort`, `link`, `alias`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `title`, `meta_descriptions`, `meta_keywords`, `content`, `content_bottom`, `created_at`, `updated_at`) VALUES
(201, 'Tin tức', 'Your source for natural beauty trends, guides, and education', 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 83, '', 'tin-tuc', NULL, NULL, NULL, NULL, '08', '2022', 'Tin tức', '', '', '', '', '2022-05-28 16:24:46', '2022-08-12 10:52:55'),
(214, 'Son Môi Việt Nam ', '', 0, 0, 1, 1, 0, 0, 0, 0, 0, 3, 1, '', 'son-moi-viet-nam', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-08-12 15:21:34', '2022-10-13 11:07:45'),
(215, 'Son Môi Nhập Khẩu ', '', 0, 0, 1, 1, 0, 0, 0, 0, 0, 3, 3, '', 'son-moi-nhap-khau', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-12 15:21:52', NULL),
(216, 'Son dưỡng môi', '', 214, 0, 1, 1, 0, 0, 0, 0, 0, 3, 96, '', 'son-duong-moi', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-12 15:22:20', NULL),
(217, 'Son màu không chì', '', 214, 0, 1, 0, 0, 0, 0, 0, 0, 3, 97, '', 'son-mau-khong-chi', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-12 15:22:40', NULL),
(218, 'Tảy da chết môi', '', 214, 0, 1, 0, 0, 0, 0, 0, 0, 3, 98, '', 'tay-da-chet-moi', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-12 15:22:54', NULL),
(219, 'Son lì', '', 214, 0, 1, 0, 0, 0, 0, 0, 0, 3, 99, '', 'son-li', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-12 15:23:02', NULL),
(220, 'Skin care', '', 0, 0, 1, 1, 0, 0, 0, 0, 0, 3, 5, '', 'skin-care', '2022/09/skin-care.png', '2022/09/thumb/skin-care.png', 'uploads/webps/menuProduct/2022/09/skin-care.webp', 'uploads/webps/menuProduct/2022/09/thumb/skin-care.webp', '09', '2022', '', '', '', '', '', '2022-08-13 07:42:23', '2022-09-09 09:46:24'),
(221, 'Ingredients', 'Your source for natural beauty trends, guides, and education', 201, 0, 1, 0, 0, 0, 0, 0, 0, 1, 101, '', 'ingredients', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-17 15:33:22', NULL),
(222, 'Makeup', 'Your source for natural beauty trends, guides, and education', 201, 0, 1, 0, 0, 0, 0, 0, 0, 1, 102, '', 'makeup', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-17 15:33:33', NULL),
(223, 'Skincare', 'Your source for natural beauty trends, guides, and education', 201, 0, 1, 0, 0, 0, 0, 0, 0, 1, 103, '', 'skincare', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-17 15:33:47', NULL),
(224, 'Wellness', 'Your source for natural beauty trends, guides, and education', 201, 0, 1, 0, 0, 0, 0, 0, 0, 1, 104, '', 'wellness', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-17 15:34:24', NULL),
(225, 'Hair & Body', 'Your source for natural beauty trends, guides, and education', 201, 0, 1, 0, 0, 0, 0, 0, 0, 1, 105, '', 'hair-body', NULL, NULL, NULL, NULL, '08', '2022', '', '', '', '', '', '2022-08-17 15:34:37', NULL),
(226, 'Son dưỡng môi 2 ', '', 216, 0, 1, 0, 0, 0, 0, 0, 0, 3, 106, '', 'son-duong-moi-2', NULL, NULL, NULL, NULL, '09', '2022', '', '', '', '', '', '2022-09-06 06:35:57', NULL),
(229, 'Vỏ Son Môi', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 3, 2, '', 'vo-son-moi', '2022/10/vo-son-moi.png', '2022/10/thumb/vo-son-moi.png', 'uploads/webps/menuProduct/2022/10/vo-son-moi.webp', 'uploads/webps/menuProduct/2022/10/thumb/vo-son-moi.webp', '10', '2022', '', '', '', '', '', '2022-10-09 00:26:00', '2022-10-14 18:07:22'),
(230, 'Máy Móc', '', 230, 0, 1, 1, 0, 0, 0, 0, 0, 3, 110, '', 'may-moc', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-10-09 01:58:43', '2022-10-09 02:03:21'),
(231, 'Máy móc', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 3, 4, '', 'may-moc-883', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-10-09 02:05:21', NULL),
(232, 'Vỏ Son Kem', '', 229, 0, 1, 0, 0, 0, 0, 0, 0, 3, 1, '', 'vo-son-kem', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-10-13 11:47:48', NULL),
(233, 'Vỏ Son Dưỡng', '', 229, 0, 1, 0, 0, 0, 0, 0, 0, 3, 6, '', 'vo-son-duong', '2022/10/vo-son-duong.png', '2022/10/thumb/vo-son-duong.png', 'uploads/webps/menuProduct/2022/10/vo-son-duong.webp', 'uploads/webps/menuProduct/2022/10/thumb/vo-son-duong.webp', '10', '2022', '', '', '', '', '', '2022-10-14 13:47:55', '2022-10-14 14:26:21'),
(234, 'Son môi Kimochi', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 3, 8, '', 'son-moi-kimochi', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-10-14 14:13:25', NULL),
(235, 'Vỏ Son Thỏi', '', 229, 0, 1, 0, 0, 0, 0, 0, 0, 3, 111, '', 'vo-son-thoi', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-10-14 18:21:12', NULL),
(236, 'Chai Lọ', '', 0, 0, 1, 1, 0, 0, 0, 0, 0, 3, 112, '', 'chai-lo', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-10-14 18:21:41', NULL),
(237, 'Bộ Sản Phẩm ', '', 236, 0, 1, 0, 0, 0, 0, 0, 0, 3, 113, '', 'bo-san-pham', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-10-14 19:01:36', NULL),
(238, 'Chai Serum', '', 236, 0, 1, 0, 0, 0, 0, 0, 0, 3, 114, '', 'chai-serum', NULL, NULL, NULL, NULL, '10', '2022', '', '', '', '', '', '2022-10-14 22:29:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_community`
--

CREATE TABLE `tbl_community` (
  `id` int NOT NULL,
  `productID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_community`
--

INSERT INTO `tbl_community` (`id`, `productID`, `name`, `image`, `thumb`, `link`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 49, 'Community 01', '2022/09/63191f3c63548-community-01.jpg', '2022/09/thumb/63191f3c63548-community-01.jpg', '#', 1, 1, '2022-09-08 05:46:20', '0000-00-00 00:00:00'),
(2, 49, 'Community 02', '2022/09/63191f4c5db66-community-02.jpg', '2022/09/thumb/63191f4c5db66-community-02.jpg', '#', 2, 1, '2022-09-08 05:46:36', '0000-00-00 00:00:00'),
(3, 49, 'Community 03', '2022/09/63191f5a3ee12-community-03.jpg', '2022/09/thumb/63191f5a3ee12-community-03.jpg', '#', 3, 1, '2022-09-08 05:46:50', '0000-00-00 00:00:00'),
(4, 49, 'Community 04', '2022/09/63191f64b64f5-community-04.jpg', '2022/09/thumb/63191f64b64f5-community-04.jpg', '#', 4, 1, '2022-09-08 05:47:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_constants`
--

CREATE TABLE `tbl_constants` (
  `id` int NOT NULL,
  `key_constants` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_constants`
--

INSERT INTO `tbl_constants` (`id`, `key_constants`, `name`, `name_en`, `publish`, `created_at`) VALUES
(253, 'bookingFrom_labelName', 'Họ & tên', 'First and last name', 1, '2022-01-12 20:29:39'),
(254, 'bookingFrom_labelPhone', 'Số điện thoại', 'Phone number', 1, '2022-01-12 20:30:25'),
(255, 'bookingFrom_labelBirth', 'Ngày sinh', 'Date of birth', 1, '2022-01-12 20:31:06'),
(256, 'bookingFrom_labelNational', 'Quốc tịch', 'Nationality', 1, '2022-01-12 20:31:43'),
(257, 'bookingFrom_labelAddress', 'Địa chỉ liên hệ', 'Address', 1, '2022-01-12 20:32:22'),
(258, 'bookingFrom_labelArdate', 'Ngày đến', 'Arrival date', 1, '2022-01-12 20:33:55'),
(259, 'bookingFrom_labelDaygo', 'Chọn lịch trình bay', 'Choose flight schedule', 1, '2022-01-12 20:34:21'),
(260, 'bookingFrom_labelClub', 'Bạn đến từ câu lạc bộ nào?', 'Which club are you from?', 1, '2022-01-12 20:34:51'),
(261, 'bookingFrom_labelGowith', 'Bạn đi một mình/ đi với nhóm', 'You go alone / go with a group', 1, '2022-01-12 20:35:36'),
(262, 'bookingFrom_labelPeople', 'Bạn đi bao nhiêu người?', 'How many people do you go?', 1, '2022-01-12 20:36:05'),
(263, 'bookingFrom_labelGender', 'Giới tính', 'Sex', 1, '2022-01-12 20:40:27'),
(264, 'bookingFrom_placeholderName', 'Nhập họ & tên...', 'Enter your first and last name...', 1, '2022-01-12 20:41:32'),
(265, 'bookingFrom_placeholderPhone', 'Nhập số điện thoại...', 'Enter your phone number...', 1, '2022-01-12 20:42:04'),
(266, 'bookingFrom_placeholderEmail', 'Nhập email...', 'Enter email...', 1, '2022-01-12 21:07:54'),
(267, 'bookingFrom_placeholderBirth', 'Nhập ngày sinh...', 'Enter your date of birth...', 1, '2022-01-12 21:08:35'),
(268, 'bookingFrom_placeholderAddress', 'Nhập địa chỉ liên hệ...', 'Enter your contact...', 1, '2022-01-12 21:09:01'),
(269, 'bookingFrom_placeholderClub', 'Nhập tên câu lạc bộ...', 'Enter club name...', 1, '2022-01-12 21:09:45'),
(270, 'bookingFrom_labelAlone', 'Tôi đi một mình', 'I walk alone', 1, '2022-01-12 21:10:19'),
(271, 'bookingFrom_labelGroup', 'Tôi đi với nhóm', 'I go with the group', 1, '2022-01-12 21:10:44'),
(272, 'bookingFrom_placeholderPeople', 'Nhập số lượng thành viên của nhóm...', 'Enter the number of members of the group...', 1, '2022-01-12 21:11:26'),
(273, 'bookingFrom_SelectNational', 'Chọn quốc tịch', 'Choose your nationality', 1, '2022-01-12 21:12:09'),
(274, 'bookingFrom_ButtonBooking', 'Đặt lịch ngay', 'Book an appointment now', 1, '2022-01-12 21:16:52'),
(275, 'bookingFrom_Title', 'Xin vui lòng điền đầy đủ thông tin bên dưới', 'Please fill out the information below', 1, '2022-01-12 21:17:39'),
(276, 'bookingFrom_IsRequired', 'Vui lòng nhập đầy đủ', 'Please enter in full', 1, '2022-01-12 21:18:37'),
(277, 'bookingFrom_IsNumFormat', 'Không đúng định dạng số điện thoại', 'Incorrect phone number format', 1, '2022-01-12 21:19:55'),
(278, 'bookingFrom_FormatEmail', 'Không đúng định dạng Email', 'Incorrect email format', 1, '2022-01-12 21:20:33'),
(279, 'bookingFrom_LessDateNow', 'Không được nhỏ hơn ngày hiện tại', 'Can\'t be less than current date', 1, '2022-01-12 21:21:32'),
(280, 'bookingFrom_LessArrivalDate', 'Không được nhỏ hơn ngày đến', 'Not less than arrival date', 1, '2022-01-12 21:22:23'),
(281, 'bookingFrom_labelMale', 'Nam', 'Male', 1, '2022-01-12 21:24:48'),
(282, 'bookingFrom_labelFemale', 'Nữ', 'Female', 1, '2022-01-12 21:26:23'),
(283, 'bookingNotify_Title', 'Đặt chổ trước thành công!', 'Reservation successful!', 1, '2022-01-12 21:32:00'),
(284, 'bookingNotify_Messenger', 'Chúc mừng bạn đã gửi thông tin Booking thành công. Nhân viên của chúng tôi sẽ liên hệ với bạn sớm nhất. Xin cảm ơn.', 'Congratulations, you have successfully submitted your Booking information. Our staff will contact you as soon as possible. Thank you.', 1, '2022-01-12 21:32:54'),
(285, 'label_hotLineSp', 'HOTLINE HỖ TRỢ', 'Hotline support', 1, '2022-01-13 20:01:33'),
(286, 'SendMailBooking_time', 'Lịch trình bay', 'Flight schedule', 1, '2022-01-14 22:17:04'),
(287, 'SendMailBooking_club', 'Đến từ câu lạc bộ', 'Coming from the club', 1, '2022-01-14 22:18:00'),
(288, 'SendMailBooking_numPeople', 'Số lượng người', 'Number of people', 1, '2022-01-14 22:19:04'),
(289, 'SendMailBooking_Contact', 'Mọi thắc mắc xin vui lòng liên hệ với', 'Any questions please contact', 1, '2022-01-14 22:19:48'),
(290, 'SendMailBooking_Title', 'Cảm ơn Anh/Chị đã tin tưởng và ủng hộ Fly Nha Trang. Nhân viên của chúng tôi sẽ liện hệ với bạn trong 24h tới.', 'Thank you for trusting and supporting Fly Nha Trang. Our staff will contact you within the next 24 hours.', 1, '2022-01-14 22:24:04'),
(291, 'SendMailBooking_SendSuccess', 'Gửi booking thành công!', 'Successful booking submission!', 1, '2022-01-14 22:24:59'),
(292, 'SendMailBooking_Info', 'Thông tin booking', 'Booking information', 1, '2022-01-14 22:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents`
--

CREATE TABLE `tbl_contents` (
  `id` int NOT NULL,
  `key` varchar(500) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_contents`
--

INSERT INTO `tbl_contents` (`id`, `key`, `content`) VALUES
(1, 'about', '{\"name\":\"Lan Huong Lip\",\"link\":\"07tjEiGq8v0\",\"content\":\"<p><span style=\\\"font-size:12px\\\">T&ecirc;n t&ocirc;i l&agrave; Lan H\\u01b0\\u01a1ng Lip v&agrave; t&ocirc;i r\\u1ea5t vui v&igrave; b\\u1ea1n \\u0111&atilde; \\u1edf \\u0111&acirc;y!<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:12px\\\">T&ocirc;i l&agrave; m\\u1ed9t nh&agrave; nghi&ecirc;n c\\u1ee9u v&agrave; ph&aacute;t tri\\u1ec3n c&ocirc;ng th\\u1ee9c son m&ocirc;i t\\u1eeb n\\u0103m 2013. V\\u1edbi kinh nghi\\u1ec7m g\\u1ea7n 10 n\\u0103m cho vi\\u1ec7c nghi&ecirc;n c\\u1ee9u m&agrave;u son, nghi&ecirc;n c\\u1ee9u tr\\u1ea3i nghi\\u1ec7m ch\\u1ea5t son v&agrave; v\\u1edbi g\\u1ea7n 5 n\\u0103m l&agrave;m&nbsp;vi\\u1ec7c tr\\u1ef1c ti\\u1ebfp v\\u1edbi x\\u01b0\\u1edfng s\\u1ea3n xu\\u1ea5t v\\u1ecf son m&ocirc;i ch\\u1ea5t l\\u01b0\\u1ee3ng&nbsp;t&ocirc;i mong r\\u1eb1ng&nbsp;ng\\u01b0\\u1eddi Vi\\u1ec7t Nam c&oacute; th\\u1ec3 t\\u1ea1o ra nhi\\u1ec1u ch\\u1ea5t son v&agrave; m&agrave;u son \\u0110\\u1eb8P-AN TO&Agrave;N-MADE IN VIETNAM.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:12px\\\">\\u1ede \\u0111&acirc;y, ch&uacute;ng ta s\\u1ebd kh&ocirc;ng tr\\u1ea3i nghi\\u1ec7m ch\\u1ea5t son \\u0111\\u1eb9p nh\\u1ea5t, m&agrave;u son tuy\\u1ec7t v\\u1eddi nh\\u1ea5t m&agrave; l&agrave; \\u0111i t&igrave;m cho Th\\u01b0\\u01a1ng Hi\\u1ec7u M\\u1ef9 Ph\\u1ea9m Vi\\u1ec7t Nam s\\u1ef1 ph&ugrave; h\\u1ee3p v\\u1ec1 m&agrave;u&nbsp;son, ph&ugrave; h\\u1ee3p v\\u1ec1 bao b&igrave; c\\u1ee7a m\\u1ed7i ch\\u1ea5t son. Hy v\\u1ecdng H\\u01b0\\u01a1ng s\\u1ebd \\u0111i c&ugrave;ng \\u0111\\u1ecbnh h\\u01b0\\u1edbng cho b\\u1ea1n \\u0111\\u01b0\\u1ee3c nh\\u1eefng g&igrave; b\\u1ea1n c\\u1ea7n cho th\\u1ecfi son xinh \\u0111\\u1eb9p c\\u0169ng&nbsp;nh\\u01b0 s\\u1ebd l\\u1ef1a ch\\u1ecdn cho SON M&Ocirc;I b\\u1ed9 trang ph\\u1ee5c ph&ugrave; h\\u1ee3p v\\u1edbi m\\u1ed7i chi\\u1ebfn d\\u1ecbch kinh doanh c\\u1ee7a b\\u1ea1n.&nbsp;<\\/span><\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\",\"image\":\"2022\\/09\\/about.png\",\"thumb\":\"2022\\/09\\/thumb\\/about.png\",\"month\":\"10\",\"year\":\"2022\",\"show_video\":0}'),
(3, 'banner', '{\"title1\":\"Combo tr\\u1ecdn g\\u00f3i \\u0111i sinh\",\"title2\":\"Ch\\u1ec9 v\\u1edbi 1.500.000\\u0111\",\"array_properties\":[{\"content\":\"Ti\\u1ebft ki\\u1ec7m chi ph\\u00ed \",\"sort\":\"1\"},{\"content\":\"Ti\\u1ebft ki\\u1ec7m th\\u1eddi gian\",\"sort\":\"2\"},{\"content\":\"Combo \\u0111\\u1ea7y \\u0111\\u1ee7 m\\u1eb9 v\\u00e0 b\\u00e9\",\"sort\":\"3\"},{\"content\":\"Giao h\\u00e0ng t\\u1eadn nh\\u00e0 \\u0111\\u00fang h\\u1eb9n\",\"sort\":\"4\"},{\"content\":\"Ngu\\u1ed3n g\\u1ed1c s\\u1ea3n ph\\u1ea9m r\\u1ecf r\\u00e0ng\",\"sort\":\"5\"}],\"image\":\"2022\\/04\\/62661942e9726h\\u00e8 s\\u00f4i \\u0111\\u1ed9ng.png.png\",\"thumb\":\"2022\\/04\\/thumb\\/62661942e9726h\\u00e8 s\\u00f4i \\u0111\\u1ed9ng.png.png\",\"webps\":\"uploads\\/webps\\/banner\\/2022\\/04\\/62661942e9726h\\u00e8 s\\u00f4i \\u0111\\u1ed9ng.webp\",\"webps_thumb\":\"uploads\\/webps\\/banner\\/2022\\/04\\/thumb\\/62661942e9726h\\u00e8 s\\u00f4i \\u0111\\u1ed9ng.webp\"}'),
(5, 'difficult', '{\"name\":\"NH\\u1eeeNG KH\\u00d3 KH\\u0102N\",\"des\":\"m\\u00e0 c\\u00e1c m\\u1eb9 B\\u1ec9m \\u0111ang g\\u1eb7p ph\\u1ea3i l\\u00e0 g\\u00ec ?\\r\\n\"}'),
(6, 'whychoose', '{\"name\":\"Nh\\u1eefng g\\u00ec i-KIDs mang \\u0111\\u1ebfn cho c\\u00e1c gia \\u0111\\u00ecnh ? \",\"image\":\"2022\\/04\\/6262c4a2a8205.jpg\",\"thumb\":\"2022\\/04\\/thumb\\/6262c4a2a8205.jpg\"}'),
(7, 'project', '{\"name\":\"Kh\\u00e1ch h\\u00e0ng ph\\u1ea3n h\\u1ed3i v\\u1ec1 i-KIDs nh\\u01b0 th\\u1ebf n\\u00e0o ? \",\"des\":\"<p>N\\u01a1i ch&uacute;ng t&ocirc;i g\\u1eedi g\\u1eafm t&acirc;m huy\\u1ebft v&agrave; n\\u1ed7 l\\u1ef1c<\\/p>\\r\\n\\r\\n<p>v&igrave; ni\\u1ec1m vui&nbsp;c\\u1ee7a kh&aacute;ch h&agrave;ng<\\/p>\\r\\n\",\"content\":\"V\\u1edbi h\\u01a1n 12 n\\u0103m kinh nghi\\u1ec7m trong l\\u0129nh v\\u1ef1c cung c\\u1ea5p \\u0111\\u1ed3 d\\u00f9ng m\\u1eb9 v\\u00e0 b\\u00e9 t\\u1ea1i TPHCM. Ban \\u0111\\u1ea7u l\\u00e0 \\u0111\\u01a1n v\\u1ecb cung c\\u1ea5p gi\\u00e1 s\\u1ec9 \\u0111\\u1ed3 d\\u00f9ng s\\u01a1 sinh cho c\\u00e1c Shop \\u1edf TPHCM v\\u00e0 ti\\u1ec3u th\\u01b0\\u01a1ng ch\\u1ee3 c\\u00e1c t\\u1ec9nh Mi\\u1ec1n T\\u00e2y. Trong qu\\u00e1 tr\\u00ecnh ph\\u00e1t tri\\u1ec3n, ch\\u00fang t\\u00f4i cho ra \\u0111\\u1eddi th\\u01b0\\u01a1ng hi\\u1ec7u tr\\u1ef1c tuy\\u1ebfn i-KIDs l\\u00e0 n\\u01a1i m\\u00e0 c\\u00e1c m\\u1eb9 B\\u1ec9m c\\u00f3 th\\u1ec3 mua combo tr\\u1ecdn g\\u00f3i \\u0111i sinh ti\\u1ebft ki\\u1ec7m chi ph\\u00ed, th\\u1eddi gian v\\u00e0 an t\\u00e2m nh\\u1ea5t. \\r\\n\",\"image\":null,\"thumb\":null}'),
(8, 'procedure', '{\"name\":\"Quy tr\\u00ecnh h\\u1ee3p t\\u00e1c\",\"des\":\"\"}'),
(9, 'faq', '{\"name\":\"C\\u00e2u h\\u1ecfi th\\u01b0\\u1eddng g\\u1eb7p\",\"image\":\"2022\\/02\\/ezgif.com-gif-maker.png.png\",\"thumb\":\"2022\\/02\\/thumb\\/ezgif.com-gif-maker.png.png\"}'),
(10, 'number', '{\"title1\":\"H\\u1ea1nh Ph\\u00fac C\\u1ee7a Kh\\u00e1ch H\\u00e0ng\",\"title2\":\" L\\u00e0 th\\u00e0nh C\\u00f4ng C\\u1ee7a i-KIDs\",\"des\":\"Trong su\\u1ed1t qu\\u00e1 tr\\u00ecnh h\\u00ecnh th\\u00e0nh v\\u00e0 ph\\u00e1t tri\\u1ec3n, i-KIDs lu\\u00f4n \\u0111\\u01b0\\u1ee3c s\\u1ef1 \\u1ee7ng h\\u1ed9 c\\u1ee7a Kh\\u00e1ch h\\u00e0ng, c\\u00f9ng v\\u1edbi \\u0111\\u00f3 l\\u00e0 nh\\u1eefng k\\u1ebft qu\\u1ea3 \\u1ea5n t\\u01b0\\u1ee3ng!\"}'),
(11, 'baogia', '{\"name\":\"B\\u1ea3ng gi\\u00e1\",\"des\":\"COMBO TR\\u1eccN G\\u00d3I \\u0110I SINH\"}'),
(12, 'banner2', '{\"name\":\"NATURAL LIPS\",\"text_link\":\"Xem th\\u00eam\",\"link\":\"#\",\"publish\":1,\"des\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.\",\"image\":\"2022\\/08\\/banner2.png\",\"thumb\":\"2022\\/08\\/thumb\\/banner2.png\",\"month\":\"08\",\"year\":\"2022\"}'),
(13, 'banner3', '{\"name\":\"Natural Cosmetics\",\"name2\":\"For your precious skin\",\"publish\":1,\"des\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.\",\"image\":\"2022\\/08\\/banner3.png\",\"thumb\":\"2022\\/08\\/thumb\\/banner3.png\",\"month\":\"08\",\"year\":\"2022\"}'),
(14, 'ingredient_content', '{\"title\":\"EVERY INGREDIENT WE USE IS BENEFICIAL, HERE ARE A FEW:\",\"title2\":\"COMPLETE LIST OF INGREDIENTS:\",\"content\":\"<p>Persea Gratissima (Avocado) Butter, Theobroma Cacao (Cocoa) Seed Butter, Contains All or Some of The Following Extracts of Prunus Cerasus (Cherry) Fruit, Prunus Domestica (Plum) Fruit, Vitis Vinifera (Cabernet Grape) Fruit, Rubus Idaeus (Raspberry) Fruit, Vaccinium Angustifolium (Blueberry) Fruit, Rubus Fruticosus (Blackberry) Fruit, Prunus Persica (Peach) Fruit, Prunus Armeniaca (Apricot) Fruit, Solanum Lycopersicum (Tomato) Fruit\\/Leaf\\/Stem, Punica Granatum (Pomegranate), Theobroma Cacao (Cocoa), Rosa Damascena (Rose Petal) Flower Powder, Lavandula Angustifolia (Lavender) Flower\\/Leaf\\/Stem and Cinnamomum Zeylanicum (Cinnamon) Bark, Butyrospermum Parkii (Shea Butter), Rosa Canina (Rosehip Oil) Seed Oil, Mangifera Indica (Mango) Seed Butter, Tocopherol (Vitamin E ), Sodium Ascorbate (Vitamin C), Oryza Sativa (Rice) Starch, Mica<\\/p>\\r\\n\\r\\n<p>Ingredient Glossary<\\/p>\\r\\n\\r\\n<p>Natural ingredients may vary in color and consistency<\\/p>\\r\\n\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `sort` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `name`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
(4, 'Việt Nam', 1, 1, '2022-01-11 21:24:51', '0000-00-00 00:00:00'),
(5, 'Anh', 1, 2, '2022-01-11 21:25:07', '0000-00-00 00:00:00'),
(6, 'Mỹ', 1, 3, '2022-01-11 21:25:18', '0000-00-00 00:00:00'),
(7, 'Hàn quốc', 1, 4, '2022-01-13 13:59:31', '0000-00-00 00:00:00'),
(8, 'Nhật Bản', 1, 5, '2022-01-13 13:59:50', '2022-01-13 14:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` int NOT NULL,
  `birthday` date NOT NULL,
  `countryID` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `phone`, `email`, `sex`, `birthday`, `countryID`, `address`, `code`, `created_at`) VALUES
(5, 'Võ Khánh Duy', '0982224398', 'vkduy@gmail.com', 1, '1998-03-24', 4, 'Đình Phú Lạc,  phường Bình Lợi,  quận Bình Chánh,  thành phố Hồ Chí Minh', 'KH902332', '2022-01-25 23:08:16'),
(10, 'Võ Khánh Duy', '0982824398', 'vkduy240398@gmail.com', 1, '1998-03-24', 4, 'Đình Phú Lạc,  phường Bình Lợi,  quận Bình Chánh,  thành phố Hồ Chí Minh', 'KH124430', '2022-01-26 20:52:28'),
(11, 'Võ Khánh Duy', '0982824399', 'vkduy1@gmail.com', 2, '1999-03-24', 4, 'TPCT', 'KH359268', '2022-01-26 21:05:27'),
(12, 'Võ Khánh Duy', '0982824402', 'vkduy2403982@gmail.com', 1, '1998-03-24', 4, 'TPCT', 'KH864447', '2022-01-26 21:05:28'),
(13, 'Minh Hiếu', '0899068368', 'hieu.optech@gmail.com', 1, '1990-04-21', 5, '78 đặng văn bi', 'KH433113', '2022-01-26 21:26:07'),
(14, 'Minh Hiếu 555', '0939888147', 'doc.abc@gmail.com', 1, '1998-09-21', 4, 'QUẬN TÂN BÌNH, TP. HCM', 'KH600732', '2022-01-27 08:53:52'),
(15, 'Trần Anh', '0939888140', 'chuan164475@gmail.com', 1, '1985-05-21', 6, 'Phạm Văn Đồng', 'KH562117', '2022-01-27 10:40:55'),
(16, 'Thu Minh', '0934084426', 'lmhieu2104@gmail.com', 1, '1998-05-21', 8, '78 đặng văn bi', 'KH391543', '2022-01-27 10:48:26'),
(17, 'Đỗ văn tiệp', '0853956789', 'Tiepdv7@gmail.com', 1, '1988-06-12', 4, '26 phạm văn đồng, Vĩnh Hải, nha trang', 'KH777894', '2022-01-27 11:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_difficult`
--

CREATE TABLE `tbl_difficult` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_difficult`
--

INSERT INTO `tbl_difficult` (`id`, `name`, `des`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Thời gian', 'Website đang trong quá trình xây dựng. i-KIDs đang cập nhật nội dung. Xin quý khách hàng thông cảm.\r\n', 1, 1, '2022-02-12 22:38:43', '2022-04-22 22:21:40'),
(2, 'Kinh nghiệm', 'Website đang trong quá trình xây dựng. i-KIDs đang cập nhật nội dung. Xin quý khách hàng thông cảm.\r\n', 2, 1, '2022-02-12 22:49:10', '2022-04-22 22:22:14'),
(3, 'Sản phẩm', 'Website đang trong quá trình xây dựng. i-KIDs đang cập nhật nội dung. Xin quý khách hàng thông cảm.\r\n', 3, 1, '2022-02-12 22:49:27', '2022-04-22 22:22:29'),
(4, 'Chi phí', 'Website đang trong quá trình xây dựng. i-KIDs đang cập nhật nội dung. Xin quý khách hàng thông cảm.\r\n', 4, 1, '2022-02-12 22:49:41', '2022-04-22 22:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dvt`
--

CREATE TABLE `tbl_dvt` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_dvt`
--

INSERT INTO `tbl_dvt` (`id`, `name`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Con', 1, 1, '2021-12-06 15:41:26', '0000-00-00 00:00:00'),
(2, 'Nửa con', 2, 1, '2021-12-06 15:41:45', '0000-00-00 00:00:00'),
(3, 'Kg', 3, 1, '2021-12-06 15:41:55', '0000-00-00 00:00:00'),
(4, 'Cái', 4, 1, '2021-12-06 16:00:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs`
--

CREATE TABLE `tbl_faqs` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_faqs`
--

INSERT INTO `tbl_faqs` (`id`, `name`, `des`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Tôi ở Hà Nội thì mua sản phẩm i-KIDs như thế nào ?', '\r\n                        ', 1, 1, '2022-02-13 08:41:27', '2022-04-22 22:20:20'),
(2, 'Chính sách giao hàng của i-KIDs như thế nào ?', '', 2, 1, '2022-02-13 08:42:11', '2022-04-22 22:20:15'),
(3, 'Mua combo xong có được đổi trả sản phẩm hay không ?', '', 3, 1, '2022-02-13 08:42:48', '2022-04-22 22:20:08'),
(4, 'Đã mua combo trọn gói thì có cần phải chuẩn bị gì thêm ? ', '', 4, 1, '2022-02-13 08:43:35', '2022-04-22 22:19:58'),
(5, 'Nên mua combo trọn gói trước khi sinh khoảng bao lâu?           ', '', 5, 1, '2022-02-13 08:44:05', '2022-04-22 22:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_idea`
--

CREATE TABLE `tbl_idea` (
  `id` int NOT NULL,
  `name` varchar(1000) NOT NULL,
  `job` varchar(200) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `thumb` varchar(1000) NOT NULL,
  `webps` varchar(1000) NOT NULL,
  `webps_thumb` varchar(1000) NOT NULL,
  `publish` tinyint NOT NULL,
  `sort` int NOT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `des` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_idea`
--

INSERT INTO `tbl_idea` (`id`, `name`, `job`, `image`, `thumb`, `webps`, `webps_thumb`, `publish`, `sort`, `month`, `year`, `des`, `created_at`, `updated_at`) VALUES
(27, 'Dr. Nidhen Johen', 'SEO', '2022/04/customer-3.jpg.jpg', '2022/04/thumb/customer-3.jpg.jpg', 'uploads/webps/idea/2022/04/customer-3.webp', 'uploads/webps/idea/2022/04/thumb/customer-3.webp', 1, 16, 4, 2022, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus odit sequi quas soluta excepturi&nbsp;illo?</p>\r\n', '2021-08-12 16:28:44', '2022-04-27 13:43:59'),
(28, 'Dr. Nidhen Johen', 'CEO Marketing', '2022/04/customer-2.jpg.jpg', '2022/04/thumb/customer-2.jpg.jpg', 'uploads/webps/idea/2022/04/customer-2.webp', 'uploads/webps/idea/2022/04/thumb/customer-2.webp', 1, 15, 4, 2022, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus odit sequi quas soluta excepturi&nbsp;illo?</p>\r\n', '2021-08-12 16:28:44', '2022-04-27 13:43:36'),
(29, 'Dr. Nidhen Johen', 'CEO', '2022/04/customer-1.jpg.jpg', '2022/04/thumb/customer-1.jpg.jpg', 'uploads/webps/idea/2022/04/customer-1.webp', 'uploads/webps/idea/2022/04/thumb/customer-1.webp', 1, 14, 4, 2022, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus odit sequi quas soluta excepturi illo?</p>\r\n', '2021-08-12 16:28:44', '2022-04-27 13:42:58'),
(30, 'Đình Phúc', 'Nhân viên kỹ thuật', '2022/06/00f14d6b004ac014995b.jpg.jpg', '2022/06/thumb/00f14d6b004ac014995b.jpg.jpg', 'uploads/webps/idea/2022/06/00f14d6b004ac014995b.webp', 'uploads/webps/idea/2022/06/thumb/00f14d6b004ac014995b.webp', 1, 17, 6, 2022, '<p>Sản phẩm m&aacute;t, bền, g&oacute;i h&agrave;ng cẩn thận</p>', '2022-06-15 20:37:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instagram`
--

CREATE TABLE `tbl_instagram` (
  `id` int NOT NULL,
  `name` varchar(1000) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `thumb` varchar(1000) NOT NULL,
  `webps` varchar(1000) NOT NULL,
  `webps_thumb` varchar(1000) NOT NULL,
  `publish` int NOT NULL,
  `sort` int NOT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `des` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_instagram`
--

INSERT INTO `tbl_instagram` (`id`, `name`, `link`, `image`, `thumb`, `webps`, `webps_thumb`, `publish`, `sort`, `month`, `year`, `des`, `created_at`, `updated_at`) VALUES
(1, 'Instagram 1', '#', '2022/08/inta-01.png.png', '2022/08/thumb/inta-01.png.png', 'uploads/webps/instagram/2022/08/inta-01.webp', 'uploads/webps/instagram/2022/08/thumb/inta-01.webp', 1, 1, 8, 2022, '', '2022-08-11 18:04:35', '2022-08-11 18:06:03'),
(2, 'Instagram 2', '', '2022/08/inta-02.png.png', '2022/08/thumb/inta-02.png.png', 'uploads/webps/instagram/2022/08/inta-02.webp', 'uploads/webps/instagram/2022/08/thumb/inta-02.webp', 1, 2, 8, 2022, '', '2022-08-11 18:04:52', '2022-08-11 18:05:54'),
(3, 'Instagram 3', '', '2022/08/inta-03.png.png', '2022/08/thumb/inta-03.png.png', 'uploads/webps/instagram/2022/08/inta-03.webp', 'uploads/webps/instagram/2022/08/thumb/inta-03.webp', 1, 3, 8, 2022, '', '2022-08-11 18:06:18', '0000-00-00 00:00:00'),
(4, 'Instagram 4', '', '2022/08/inta-04.png.png', '2022/08/thumb/inta-04.png.png', 'uploads/webps/instagram/2022/08/inta-04.webp', 'uploads/webps/instagram/2022/08/thumb/inta-04.webp', 1, 4, 8, 2022, '', '2022-08-11 18:06:25', '0000-00-00 00:00:00'),
(5, 'Instagram 5', '', '2022/08/inta-05.png.png', '2022/08/thumb/inta-05.png.png', 'uploads/webps/instagram/2022/08/inta-05.webp', 'uploads/webps/instagram/2022/08/thumb/inta-05.webp', 1, 5, 8, 2022, '', '2022-08-11 18:06:36', '0000-00-00 00:00:00'),
(6, 'Instagram 6', '', '2022/08/inta-06.png.png', '2022/08/thumb/inta-06.png.png', 'uploads/webps/instagram/2022/08/inta-06.webp', 'uploads/webps/instagram/2022/08/thumb/inta-06.webp', 1, 6, 8, 2022, '', '2022-08-11 18:06:44', '0000-00-00 00:00:00'),
(7, 'Instagram 7', '', '2022/08/inta-07.png.png', '2022/08/thumb/inta-07.png.png', 'uploads/webps/instagram/2022/08/inta-07.webp', 'uploads/webps/instagram/2022/08/thumb/inta-07.webp', 1, 7, 8, 2022, '', '2022-08-11 18:06:53', '0000-00-00 00:00:00'),
(8, 'Instagram 8', '', '2022/08/inta-03.png.png', '2022/08/thumb/inta-03.png.png', 'uploads/webps/instagram/2022/08/inta-03.webp', 'uploads/webps/instagram/2022/08/thumb/inta-03.webp', 1, 8, 8, 2022, '', '2022-08-11 18:07:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mails`
--

CREATE TABLE `tbl_mails` (
  `id` int UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_mails`
--

INSERT INTO `tbl_mails` (`id`, `fullname`, `phone`, `email`, `created_at`) VALUES
(181, '', '', 'sdsds', '2022-09-08 15:19:26'),
(182, '', '', 'hieu.optech@gmail.com', '2022-09-16 10:22:13'),
(183, '', '', 'hieu.optech', '2022-09-16 12:51:41'),
(184, '', '', 'hieu.optech2@gmail.com', '2022-09-16 12:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `parentid` int NOT NULL,
  `categoryid` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `hot` tinyint(1) NOT NULL COMMENT 'Right',
  `top` tinyint(1) NOT NULL,
  `footer` tinyint(1) NOT NULL,
  `main` tinyint(1) NOT NULL COMMENT 'Left',
  `bottom` tinyint(1) NOT NULL,
  `type` int NOT NULL,
  `sort` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `name_en`, `parentid`, `categoryid`, `publish`, `hot`, `top`, `footer`, `main`, `bottom`, `type`, `sort`, `link`, `created_at`, `updated_at`) VALUES
(215, 'Sữa bột các loại', '', 205, 169, 1, 0, 0, 0, 0, 0, 3, 49, '/', '2022-05-07 15:28:55', NULL),
(216, 'Bình sữa', '', 205, 170, 1, 0, 0, 0, 0, 0, 3, 50, '/', '2022-05-07 15:29:05', NULL),
(217, 'Dụng cụ trữ sữa  hâm sữa', '', 205, 171, 1, 0, 0, 0, 0, 0, 3, 51, '/', '2022-05-07 15:29:14', NULL),
(218, 'Vệ sinh bình sữa', '', 205, 172, 1, 0, 0, 0, 0, 0, 3, 52, '/', '2022-05-07 15:29:25', NULL),
(259, 'Trang chủ', '', 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, '/', '2022-08-11 06:24:21', NULL),
(260, 'Danh mục sản phẩm', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 54, '/', '2022-08-11 06:24:40', NULL),
(261, 'Sản phẩm son môi', '', 0, 215, 1, 0, 0, 0, 1, 0, 0, 2, '/', '2022-08-11 06:24:51', '2022-10-13 11:33:28'),
(263, 'Blog', '', 0, 201, 1, 0, 0, 0, 1, 0, 1, 57, '/', '2022-08-11 06:25:16', NULL),
(264, 'Giới Thiệu', '', 0, 0, 1, 0, 0, 1, 0, 0, 0, 58, '/', '2022-08-11 07:47:50', NULL),
(265, 'Vinh danh báo chí', '', 264, 0, 1, 0, 0, 0, 0, 0, 0, 59, '/', '2022-08-11 07:48:00', NULL),
(266, 'Quy định sản xuất hàng hóa', '', 264, 0, 1, 0, 0, 0, 0, 0, 0, 60, '/', '2022-08-11 07:48:09', NULL),
(267, 'Chính sách giao nhận', '', 264, 0, 1, 0, 0, 0, 0, 0, 0, 61, '/', '2022-08-11 07:48:18', NULL),
(268, 'Hướng dẫn mua hàng', '', 264, 0, 1, 0, 0, 0, 0, 0, 0, 62, '/', '2022-08-11 07:48:28', NULL),
(269, 'Sản phẩm', '', 0, 0, 1, 0, 0, 1, 0, 0, 0, 63, '/', '2022-08-11 07:48:45', NULL),
(270, 'Chăm sóc da', '', 269, 0, 1, 0, 0, 0, 0, 0, 0, 64, '/', '2022-08-11 07:48:55', NULL),
(271, 'Giảm cân', '', 269, 0, 1, 0, 0, 0, 0, 0, 0, 65, '/', '2022-08-11 07:49:04', NULL),
(272, 'Thuốc mọc tóc', '', 269, 0, 1, 0, 0, 0, 0, 0, 0, 66, '/', '2022-08-11 07:49:13', NULL),
(273, 'Mặt nạ đắp mặt', '', 269, 0, 1, 0, 0, 0, 0, 0, 0, 67, '/', '2022-08-11 07:49:21', NULL),
(274, 'Son Môi Việt Nam', '', 261, 215, 1, 0, 0, 0, 0, 0, 3, 68, '/', '2022-09-08 15:06:25', '2022-10-13 11:10:10'),
(275, 'Son Môi Nhập Khẩu', '', 260, 215, 1, 0, 0, 0, 0, 0, 3, 69, '/', '2022-09-08 15:06:40', NULL),
(276, 'Skin care', '', 260, 220, 1, 0, 0, 0, 0, 0, 3, 70, '/', '2022-09-08 15:06:51', '2022-10-14 18:15:36'),
(277, 'Son dưỡng môi', '', 261, 215, 1, 0, 0, 0, 0, 0, 3, 71, '/', '2022-09-08 15:07:07', '2022-10-13 11:09:44'),
(280, 'Gia Công Son Môi', '', 0, 0, 1, 0, 0, 0, 1, 0, 0, 3, '/', '2022-10-13 11:05:40', NULL),
(281, 'Máy Móc', '', 0, 201, 1, 0, 0, 0, 1, 0, 0, 5, '/', '2022-10-13 11:16:11', '2022-10-15 16:54:08'),
(282, 'Dịch Vụ Order', '', 0, 201, 1, 0, 0, 0, 1, 0, 0, 6, '/', '2022-10-13 11:18:08', '2022-10-13 12:33:33'),
(283, 'Vỏ Son Môi', '', 262, 201, 1, 0, 0, 0, 0, 0, 0, 70, '/', '2022-10-13 11:30:26', '2022-10-13 11:40:48'),
(288, 'Vỏ Son Kem', '', 283, 232, 1, 0, 0, 0, 0, 0, 3, 77, '/', '2022-10-13 11:43:57', '2022-10-14 18:16:03'),
(289, 'Vỏ Son Thỏi', '', 283, 0, 1, 0, 0, 0, 0, 0, 0, 78, '/', '2022-10-13 11:44:28', NULL),
(290, 'Vỏ Son Mini', '', 283, 0, 1, 0, 0, 0, 0, 0, 0, 79, '/', '2022-10-13 11:45:02', NULL),
(292, 'Vỏ Son Dưỡng', '', 283, 0, 1, 0, 0, 0, 0, 0, 0, 80, '/', '2022-10-14 13:56:40', NULL),
(293, 'Son Kimochi', '', 261, 0, 1, 0, 0, 0, 0, 0, 0, 81, '/', '2022-10-14 14:12:34', NULL),
(295, 'Mẫu Chai Lọ', '', 0, 0, 1, 0, 0, 0, 1, 0, 0, 4, '/', '2022-10-15 16:48:14', NULL),
(296, 'Vỏ Son Môi', '', 295, 229, 1, 0, 0, 0, 0, 0, 3, 82, '/', '2022-10-15 16:55:27', NULL),
(297, 'Son Kimochi 01', '', 293, 201, 1, 0, 0, 0, 0, 0, 1, 83, '/', '2022-10-20 17:04:37', '2022-10-20 17:14:44'),
(298, 'Son Kimochi 02', '', 293, 229, 1, 0, 0, 0, 0, 0, 3, 84, '/', '2022-10-20 17:12:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_method_pay`
--

CREATE TABLE `tbl_method_pay` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_method_pay`
--

INSERT INTO `tbl_method_pay` (`id`, `name`, `image`, `thumb`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(3, 'Visa', '2021/12/61aaeb890eb1c-Untitled-1.png.png', '2021/12/thumb/61aaeb890eb1c-Untitled-1.png.png', 1, 0, '2021-11-26 13:33:48', '2021-12-04 11:16:09'),
(4, 'Master card', '2021/12/61aaea7f8f244-2560px-MasterCard_Logo.svg.png.png', '2021/12/thumb/61aaea7f8f244-2560px-MasterCard_Logo.svg.png.png', 2, 0, '2021-11-26 13:34:06', '2021-12-04 11:11:43'),
(8, 'COD', '2021/12/61ab4158a1d68-cod.png.png', '2021/12/thumb/61ab4158a1d68-cod.png.png', 3, 1, '2021-12-04 17:21:00', '2021-12-04 17:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `id` int NOT NULL,
  `parentid` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ctr` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `sort` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`id`, `parentid`, `name`, `link`, `ctr`, `icon`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
(3, 0, 'Thông tin Trang chủ', '', '', 'icon-home', 1, 2, '2021-05-13 14:57:57', '2021-12-02 14:49:43'),
(4, 0, 'Cấu hình chung', 'system/index', 'system', ' icon-settings', 1, 3, '2021-05-13 14:59:15', '2021-07-13 16:47:28'),
(11, 0, 'Dành cho quản trị', '', '', ' fas fa-user-friends', 0, 100, '2021-05-13 16:47:35', NULL),
(15, 11, 'Quản lý nhóm quyền', 'role/index', 'role', ' icon-settings', 1, 9, '2021-05-13 16:52:16', '2021-07-16 09:57:15'),
(16, 11, 'Thành viên quản trị', 'admin/index', 'admin', 'fas fa-user-circle', 1, 10, '2021-05-13 16:52:47', '2021-07-13 14:18:12'),
(17, 11, 'Quản lý module', 'module/index', 'module', ' icon-settings', 1, 11, '2021-05-13 18:27:46', '2021-07-13 11:46:34'),
(18, 0, 'Bài viết -  Nội dung', '', '', 'icon-note', 1, 12, '2021-05-13 19:01:18', '2021-12-02 14:43:12'),
(19, 18, 'Quản lý bài viết', 'news/index', 'news', 'icon-arrow-right', 1, 2, '2021-05-13 19:01:51', '2021-12-02 14:44:16'),
(20, 3, 'Quản lý logo', 'logo/index', 'logo', 'icon-picture', 1, 1, '2021-05-13 19:44:55', '2021-12-02 14:40:14'),
(21, 0, 'Danh sách thành viên', 'users/index', 'users', 'icon-user', 0, 15, '2021-05-24 09:32:37', '2021-07-13 15:12:13'),
(28, 3, 'Menu', 'menu/index', 'menu', 'icon-grid', 1, 2, '2021-05-31 13:45:39', '2021-12-02 14:41:02'),
(30, 30, 'Danh mục bài biết', 'menuNews/index', 'menuNews', ' fas fa-user-friends', 1, 20, '2021-06-01 09:27:20', '2021-06-01 09:28:47'),
(31, 18, 'Danh mục bài viết', 'menuNews/index', 'menuNews', 'icon-arrow-right', 1, 1, '2021-06-01 09:30:51', '2021-12-02 14:44:03'),
(34, 3, 'Qlý banner quảng cáo', 'quangCao/index', 'quangCao', 'icon-arrow-right-circle', 0, 24, '2021-06-02 14:52:16', '2022-05-04 15:32:34'),
(61, 3, 'Quản lý slide', 'slide/index', 'slide', 'icon-picture', 1, 3, '2021-07-19 02:41:29', '2021-12-02 14:40:21'),
(68, 3, 'Ý kiến khách hàng', 'idea/index', 'idea', 'far fa-lightbulb', 0, 35, '2021-07-23 13:47:41', '2021-07-27 08:50:58'),
(69, 3, 'Slogan', 'slogan/index', 'slogan', 'fas fa-quote-left', 1, 36, '2021-07-23 13:49:26', '2021-07-27 08:44:47'),
(75, 0, 'Đăng ký nhận KM', 'advisephone/index', 'advisephone', 'icon-envelope-open', 1, 42, '2021-08-11 16:35:51', '2022-08-12 10:48:09'),
(76, 0, 'Chi nhánh', 'branch/index', 'branch', 'fas fa-map-marker-alt', 0, 43, '2021-08-11 16:44:24', NULL),
(77, 0, 'Yêu cầu liên hệ', 'contact/index', 'contact', 'fas fa-envelope', 0, 44, '2021-08-18 15:14:36', '2021-12-02 14:46:00'),
(78, 83, 'Danh sách sản phẩm', 'product/index', 'product', 'icon-bag', 1, 3, '2021-11-25 17:01:03', '2021-12-06 15:38:43'),
(79, 3, 'Logo PT Thanh Toán', 'methodpay/index', 'methodpay', 'icon-credit-card', 0, 6, '2021-11-26 09:43:32', '2021-12-02 14:48:31'),
(80, 3, 'Qlý Logo đối tác', 'partner/index', 'partner', 'icon-arrow-right-circle', 0, 47, '2021-11-26 11:14:57', '2022-04-27 10:42:37'),
(81, 3, 'Danh sách video', 'video/index', 'video', 'icon-social-youtube', 1, 5, '2021-11-26 11:54:02', '2022-08-11 18:37:49'),
(82, 0, 'Đơn hàng', 'order/index', 'order', 'icon-handbag', 0, 101, '2021-12-03 19:48:57', '2021-12-04 10:02:24'),
(83, 0, 'Sản phẩm', '', '', 'icon-bag', 0, 3, '2021-12-06 15:38:18', NULL),
(84, 83, 'Quản lý đơn vị tính', 'dvt/index', 'dvt', 'icon-arrow-right-circle', 1, 102, '2021-12-06 15:39:57', NULL),
(85, 0, 'Danh sách quốc tịch', 'country/index', 'country', 'icon-location-pin', 0, 103, '2022-01-11 21:13:37', '2022-01-26 21:31:38'),
(86, 3, 'Từ Khóa', 'constants/index', 'constants', 'icon-notebook', 0, 104, '2022-01-12 20:26:56', '2022-01-15 10:36:45'),
(87, 0, 'Danh sách booking', 'booking/index', 'booking', 'icon-paper-plane', 0, 1, '2022-01-13 20:22:08', '2022-01-26 21:32:29'),
(89, 0, 'Quản lý khách hàng', 'customers/index', 'customers', 'fas fa-user-shield', 0, 2, '2022-01-25 21:03:34', NULL),
(90, 3, 'Nội dung banner', 'banner/index', 'banner', 'icon-arrow-right-circle', 0, 2, '2022-02-12 22:12:46', '2022-02-13 16:00:45'),
(91, 3, 'Quản lý khó khăn', 'difficult/index', 'difficult', 'icon-arrow-right-circle', 0, 3, '2022-02-12 22:32:02', '2022-02-13 16:04:01'),
(92, 3, 'Giới thiệu', 'about/index', 'about', 'icon-arrow-right-circle', 1, 4, '2022-02-12 23:02:59', '2022-08-11 19:05:38'),
(95, 3, 'Câu hỏi thường gặp', 'faq/index', 'faq', 'icon-arrow-right-circle', 0, 7, '2022-02-13 08:33:46', '2022-02-13 16:13:34'),
(96, 3, 'Quản lý dịch vụ', 'service/index', 'service', 'icon-arrow-right-circle', 0, 9, '2022-02-13 08:55:09', '2022-02-13 16:13:41'),
(97, 3, 'Quản lý số liệu', 'number/index', 'number', 'icon-arrow-right-circle', 0, 8, '2022-02-13 09:07:04', '2022-02-13 16:13:45'),
(98, 0, 'Quản lý tư vấn', 'advise/index', 'advise', 'icon-paper-plane', 0, 113, '2022-02-13 09:44:13', '2022-02-13 16:14:30'),
(99, 0, 'Sản phẩm', '', '', 'icon-drawar', 1, 4, '2022-04-03 04:41:09', NULL),
(100, 99, 'Danh mục sản phẩm', 'menuProduct/index', 'menuProduct', 'icon-arrow-right-circle', 1, 115, '2022-04-03 04:42:18', '2022-04-03 07:42:59'),
(101, 99, 'Danh sách sản phẩm', 'product/index', 'product', 'icon-arrow-right-circle', 1, 116, '2022-04-03 04:43:05', NULL),
(103, 3, 'Qlý quảng cáo', 'ads/index', 'ads', 'icon-arrow-right-circle', 0, 117, '2022-05-04 15:31:59', '2022-05-04 15:32:31'),
(104, 0, 'Đơn đặt hàng', 'cart/index', 'cart', 'icon-handbag', 1, 118, '2022-05-08 08:36:44', NULL),
(105, 3, 'Liên kết Instagram', 'instagram/index', 'instagram', 'icon-social-instagram', 1, 119, '2022-08-11 17:56:54', NULL),
(106, 3, 'Album ảnh', 'album/index', 'album', 'icon-picture', 1, 6, '2022-08-11 19:35:24', NULL),
(107, 0, 'Đăng ký khóa học', 'regisstudy/index', 'regisstudy', 'icon-paper-plane', 1, 121, '2022-08-11 22:34:55', NULL),
(108, 3, 'Danh sách banner', 'banner2/index', 'banner2', 'icon-picture', 1, 122, '2022-08-12 09:38:51', NULL),
(109, 99, 'Thông tin sản phẩm', 'productinfo/index', 'productinfo', 'icon-arrow-right-circle', 1, 123, '2022-09-08 06:30:07', '2022-09-08 06:30:31'),
(110, 0, 'Quản lí ứng viên', 'candidate/index', 'candidate', 'bi bi-person-rolodex', 1, 130, '2021-08-11 16:44:24', '2021-08-11 16:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules_detail`
--

CREATE TABLE `tbl_modules_detail` (
  `id` int UNSIGNED NOT NULL,
  `moduleID` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ctr` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `action` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sort` int NOT NULL,
  `roleID` int NOT NULL COMMENT 'id trong tbl_role',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_modules_detail`
--

INSERT INTO `tbl_modules_detail` (`id`, `moduleID`, `name`, `ctr`, `action`, `sort`, `roleID`, `created_at`, `updated_at`) VALUES
(21, 0, 'Xem', '', 'index', 1, 0, '2021-07-12 09:37:58', '0000-00-00 00:00:00'),
(98, 57, 'Xem', 'childtest', 'index', 1, 0, '2021-07-13 11:34:09', '0000-00-00 00:00:00'),
(99, 57, 'Thêm', 'childtest', 'add', 2, 0, '2021-07-13 11:34:09', '0000-00-00 00:00:00'),
(100, 57, 'Xóa', 'childtest', 'delete', 3, 0, '2021-07-13 11:34:09', '0000-00-00 00:00:00'),
(101, 57, 'Sửa', 'childtest', 'edit', 4, 0, '2021-07-13 11:34:09', '0000-00-00 00:00:00'),
(102, 58, 'Xem', 'childtest2', 'index', 1, 0, '2021-07-13 11:35:04', '0000-00-00 00:00:00'),
(103, 58, 'Sửa', 'childtest2', 'edit', 4, 0, '2021-07-13 11:35:04', '0000-00-00 00:00:00'),
(104, 58, 'Xoá', 'childtest2', 'delete', 3, 0, '2021-07-13 11:35:04', '0000-00-00 00:00:00'),
(105, 58, 'Hiển thị', 'childtest2', 'checkglobals', 4, 0, '2021-07-13 11:35:04', '0000-00-00 00:00:00'),
(117, 17, 'Xem', 'module', 'index', 1, 0, '2021-07-13 11:46:35', '0000-00-00 00:00:00'),
(118, 17, 'Thêm', 'module', 'add', 2, 0, '2021-07-13 11:46:35', '0000-00-00 00:00:00'),
(119, 17, 'Xoá', 'module', 'delete', 3, 0, '2021-07-13 11:46:35', '0000-00-00 00:00:00'),
(120, 17, 'Sửa', 'module', 'edit', 4, 0, '2021-07-13 11:46:35', '0000-00-00 00:00:00'),
(121, 17, 'Hiển thị', 'module', 'checkglobals', 5, 0, '2021-07-13 11:46:35', '0000-00-00 00:00:00'),
(122, 17, 'Sắp xếp', 'module', 'sort', 6, 0, '2021-07-13 11:46:35', '0000-00-00 00:00:00'),
(123, 17, 'Xoá tất cả', 'module', 'deleteAll', 7, 0, '2021-07-13 11:46:35', '0000-00-00 00:00:00'),
(128, 59, 'Xem', 'test01', 'index', 1, 3, '2021-07-13 11:49:19', '0000-00-00 00:00:00'),
(129, 59, 'Thêm', 'test01', 'add', 2, 3, '2021-07-13 11:49:19', '0000-00-00 00:00:00'),
(130, 59, 'Xóa', 'test01', 'delete', 3, 3, '2021-07-13 11:49:19', '0000-00-00 00:00:00'),
(131, 59, 'Sửa', 'test01', 'edit', 4, 3, '2021-07-13 11:49:19', '0000-00-00 00:00:00'),
(179, 16, 'Xem', 'admin', 'index', 1, 0, '2021-07-13 14:18:12', '0000-00-00 00:00:00'),
(180, 16, 'Thêm', 'admin', 'add', 2, 0, '2021-07-13 14:18:12', '0000-00-00 00:00:00'),
(181, 16, 'Xoá', 'admin', 'delete', 3, 0, '2021-07-13 14:18:12', '0000-00-00 00:00:00'),
(182, 16, 'Sửa', 'admin', 'edit', 4, 0, '2021-07-13 14:18:12', '0000-00-00 00:00:00'),
(183, 16, 'Hiển thị', 'admin', 'checkglobals', 5, 0, '2021-07-13 14:18:12', '0000-00-00 00:00:00'),
(184, 16, 'Đổi mật khẩu', 'admin', 'change_pasword', 6, 0, '2021-07-13 14:18:12', '0000-00-00 00:00:00'),
(185, 16, 'Xem form đổi mật khẩu', 'admin', 'view_change', 7, 0, '2021-07-13 14:18:12', '0000-00-00 00:00:00'),
(186, 16, 'Xoá tất cả', 'admin', 'deleteAll', 8, 0, '2021-07-13 14:18:12', '0000-00-00 00:00:00'),
(220, 56, 'Xem', 'test', 'index', 1, 0, '2021-07-13 14:50:34', '0000-00-00 00:00:00'),
(221, 56, 'Thêm', 'test', 'add', 2, 0, '2021-07-13 14:50:34', '0000-00-00 00:00:00'),
(222, 56, 'Xóa', 'test', 'delete', 3, 0, '2021-07-13 14:50:34', '0000-00-00 00:00:00'),
(223, 56, 'Sửa', 'test', 'edit', 4, 0, '2021-07-13 14:50:34', '0000-00-00 00:00:00'),
(224, 56, 'Hiển thị', 'test', 'checkglobals', 5, 0, '2021-07-13 14:50:34', '0000-00-00 00:00:00'),
(230, 21, 'Xem', 'users', 'index', 1, 0, '2021-07-13 15:12:13', '0000-00-00 00:00:00'),
(231, 21, 'Thêm', 'users', 'add', 2, 0, '2021-07-13 15:12:13', '0000-00-00 00:00:00'),
(232, 21, 'Xoá', 'users', 'delete', 3, 0, '2021-07-13 15:12:13', '0000-00-00 00:00:00'),
(233, 21, 'Hiển thị', 'users', 'checkglobals', 5, 0, '2021-07-13 15:12:13', '0000-00-00 00:00:00'),
(234, 21, 'Xoá tất cả', 'users', 'deleteAll', 6, 0, '2021-07-13 15:12:13', '0000-00-00 00:00:00'),
(235, 21, 'Xuất file excel', 'users', 'export', 7, 0, '2021-07-13 15:12:13', '0000-00-00 00:00:00'),
(236, 4, 'Xem', 'system', 'index', 1, 0, '2021-07-13 16:47:28', '0000-00-00 00:00:00'),
(237, 4, 'Cập nhật liên hệ', 'system', 'contact', 2, 0, '2021-07-13 16:47:28', '0000-00-00 00:00:00'),
(238, 4, 'Cập nhật google', 'system', 'google', 3, 0, '2021-07-13 16:47:28', '0000-00-00 00:00:00'),
(239, 4, 'Cập nhật nội dung trang chủ', 'system', 'contentHome', 4, 0, '2021-07-13 16:47:28', '0000-00-00 00:00:00'),
(240, 4, 'Cập nhật footer', 'system', 'footer', 5, 0, '2021-07-13 16:47:28', '0000-00-00 00:00:00'),
(241, 4, 'Xoá ảnh Favicon', 'system', 'del_image', 6, 0, '2021-07-13 16:47:28', '0000-00-00 00:00:00'),
(242, 4, 'Xoá ảnh social', 'system', 'del_social', 7, 0, '2021-07-13 16:47:28', '0000-00-00 00:00:00'),
(288, 15, 'Xem', 'role', 'index', 1, 0, '2021-07-16 09:57:15', '0000-00-00 00:00:00'),
(289, 15, 'Thêm', 'role', 'add', 2, 0, '2021-07-16 09:57:15', '0000-00-00 00:00:00'),
(290, 15, 'Xoá', 'role', 'delete', 3, 0, '2021-07-16 09:57:15', '0000-00-00 00:00:00'),
(291, 15, 'Sửa', 'role', 'edit', 4, 0, '2021-07-16 09:57:15', '0000-00-00 00:00:00'),
(292, 15, 'Hiển thị', 'role', 'checkglobals', 5, 0, '2021-07-16 09:57:16', '0000-00-00 00:00:00'),
(293, 15, 'Xoá tất cả', 'role', 'deleteAll', 6, 0, '2021-07-16 09:57:16', '0000-00-00 00:00:00'),
(294, 15, 'Phân quyền', 'role', 'setPermission', 7, 0, '2021-07-16 09:57:16', '0000-00-00 00:00:00'),
(295, 15, 'Chỉnh sửa phân quyền', 'role', 'updatePermission', 8, 0, '2021-07-16 09:57:16', '0000-00-00 00:00:00'),
(322, 76, 'Xem', 'branch', 'index', 1, 0, '2021-08-11 16:44:24', '0000-00-00 00:00:00'),
(323, 76, 'Thêm', 'branch', 'add', 2, 0, '2021-08-11 16:44:24', '0000-00-00 00:00:00'),
(324, 76, 'Sửa', 'branch', 'edit', 4, 0, '2021-08-11 16:44:24', '0000-00-00 00:00:00'),
(325, 76, 'Xóa', 'branch', 'delete', 3, 0, '2021-08-11 16:44:24', '0000-00-00 00:00:00'),
(354, 20, 'Xem', 'logo', 'index', 1, 0, '2021-12-02 14:40:14', '0000-00-00 00:00:00'),
(355, 20, 'Xoá ảnh', 'logo', 'del_image', 2, 0, '2021-12-02 14:40:14', '0000-00-00 00:00:00'),
(356, 61, 'Xem', 'slide', 'index', 1, 0, '2021-12-02 14:40:21', '0000-00-00 00:00:00'),
(357, 61, 'Thêm', 'slide', 'add', 2, 0, '2021-12-02 14:40:21', '0000-00-00 00:00:00'),
(358, 61, 'Xóa', 'slide', 'delete', 3, 0, '2021-12-02 14:40:21', '0000-00-00 00:00:00'),
(359, 61, 'Sửa', 'slide', 'edit', 4, 0, '2021-12-02 14:40:21', '0000-00-00 00:00:00'),
(360, 28, 'Xem', 'menu', 'index', 1, 0, '2021-12-02 14:41:02', '0000-00-00 00:00:00'),
(361, 28, 'Thêm', 'menu', 'add', 2, 0, '2021-12-02 14:41:02', '0000-00-00 00:00:00'),
(362, 28, 'Xoá', 'menu', 'delete', 3, 0, '2021-12-02 14:41:02', '0000-00-00 00:00:00'),
(363, 28, 'Sửa', 'menu', 'edit', 4, 0, '2021-12-02 14:41:02', '0000-00-00 00:00:00'),
(364, 28, 'Hiển thị', 'menu', 'checkglobals', 5, 0, '2021-12-02 14:41:02', '0000-00-00 00:00:00'),
(365, 28, 'Xoá tất cả', 'menu', 'deleteAll', 6, 0, '2021-12-02 14:41:02', '0000-00-00 00:00:00'),
(366, 31, 'Xem', 'menuNews', 'index', 1, 0, '2021-12-02 14:44:03', '0000-00-00 00:00:00'),
(367, 31, 'Thêm', 'menuNews', 'add', 2, 0, '2021-12-02 14:44:03', '0000-00-00 00:00:00'),
(368, 31, 'Sửa', 'menuNews', 'edit', 3, 0, '2021-12-02 14:44:03', '0000-00-00 00:00:00'),
(369, 31, 'Xoá', 'menuNews', 'delete', 4, 0, '2021-12-02 14:44:03', '0000-00-00 00:00:00'),
(370, 31, 'Xoá tất cả', 'menuNews', 'deleteAll', 5, 0, '2021-12-02 14:44:03', '0000-00-00 00:00:00'),
(371, 31, 'Hiển thị', 'menuNews', 'checkglobals', 6, 0, '2021-12-02 14:44:03', '0000-00-00 00:00:00'),
(372, 31, 'Sắp xếp', 'menuNews', 'sort', 7, 0, '2021-12-02 14:44:03', '0000-00-00 00:00:00'),
(373, 19, 'Xem', 'news', 'index', 1, 0, '2021-12-02 14:44:16', '0000-00-00 00:00:00'),
(374, 19, 'Thêm', 'news', 'add', 2, 0, '2021-12-02 14:44:16', '0000-00-00 00:00:00'),
(375, 19, 'Xoá', 'news', 'delete', 3, 0, '2021-12-02 14:44:16', '0000-00-00 00:00:00'),
(376, 19, 'Sửa', 'news', 'edit', 4, 0, '2021-12-02 14:44:16', '0000-00-00 00:00:00'),
(377, 19, 'Hiển thị', 'news', 'checkglobals', 5, 0, '2021-12-02 14:44:16', '0000-00-00 00:00:00'),
(378, 19, 'Xoá tất cả', 'news', 'deleteAll', 6, 0, '2021-12-02 14:44:16', '0000-00-00 00:00:00'),
(379, 19, 'Sắp xếp', 'news', 'sort', 7, 0, '2021-12-02 14:44:16', '0000-00-00 00:00:00'),
(384, 77, 'Xem', 'contact', 'index', 1, 0, '2021-12-02 14:46:00', '0000-00-00 00:00:00'),
(385, 77, 'Thêm', 'contact', 'add', 2, 0, '2021-12-02 14:46:00', '0000-00-00 00:00:00'),
(386, 77, 'Xóa', 'contact', 'delete', 3, 0, '2021-12-02 14:46:00', '0000-00-00 00:00:00'),
(387, 77, 'Sửa', 'contact', 'edit', 4, 0, '2021-12-02 14:46:00', '0000-00-00 00:00:00'),
(392, 79, 'Xem', 'methodpay', 'index', 1, 0, '2021-12-02 14:48:31', '0000-00-00 00:00:00'),
(393, 79, 'Thêm', 'methodpay', 'add', 2, 0, '2021-12-02 14:48:31', '0000-00-00 00:00:00'),
(394, 79, 'Xóa', 'methodpay', 'delete', 3, 0, '2021-12-02 14:48:31', '0000-00-00 00:00:00'),
(395, 79, 'Sửa', 'methodpay', 'edit', 4, 0, '2021-12-02 14:48:31', '0000-00-00 00:00:00'),
(400, 82, 'Xem', 'order', 'index', 1, 0, '2021-12-04 10:02:24', '0000-00-00 00:00:00'),
(401, 82, 'Thêm', 'order', 'add', 2, 0, '2021-12-04 10:02:24', '0000-00-00 00:00:00'),
(402, 82, 'Xóa', 'order', 'delete', 3, 0, '2021-12-04 10:02:24', '0000-00-00 00:00:00'),
(403, 82, 'Sửa', 'order', 'edit', 4, 0, '2021-12-04 10:02:24', '0000-00-00 00:00:00'),
(408, 78, 'Xem', 'product', 'index', 1, 0, '2021-12-06 15:38:43', '0000-00-00 00:00:00'),
(409, 78, 'Thêm', 'product', 'add', 2, 0, '2021-12-06 15:38:43', '0000-00-00 00:00:00'),
(410, 78, 'Xóa', 'product', 'delete', 3, 0, '2021-12-06 15:38:43', '0000-00-00 00:00:00'),
(411, 78, 'Sửa', 'product', 'edit', 4, 0, '2021-12-06 15:38:43', '0000-00-00 00:00:00'),
(412, 84, 'Xem', 'dvt', 'index', 1, 0, '2021-12-06 15:39:57', '0000-00-00 00:00:00'),
(413, 84, 'Thêm', 'dvt', 'add', 2, 0, '2021-12-06 15:39:57', '0000-00-00 00:00:00'),
(414, 84, 'Sửa', 'dvt', 'edit', 4, 0, '2021-12-06 15:39:57', '0000-00-00 00:00:00'),
(415, 84, 'Xóa', 'dvt', 'delete', 3, 0, '2021-12-06 15:39:57', '0000-00-00 00:00:00'),
(452, 86, 'Xem', 'constants', 'index', 1, 0, '2022-01-15 10:36:45', '0000-00-00 00:00:00'),
(453, 86, 'Thêm', 'constants', 'add', 2, 0, '2022-01-15 10:36:45', '0000-00-00 00:00:00'),
(454, 86, 'Xóa', 'constants', 'delete', 3, 0, '2022-01-15 10:36:45', '0000-00-00 00:00:00'),
(455, 86, 'Sửa', 'constants', 'edit', 4, 0, '2022-01-15 10:36:45', '0000-00-00 00:00:00'),
(460, 89, 'Xem', 'customers', 'index', 1, 0, '2022-01-25 21:03:34', '0000-00-00 00:00:00'),
(461, 89, 'Thêm', 'customers', 'add', 2, 0, '2022-01-25 21:03:34', '0000-00-00 00:00:00'),
(462, 89, 'Sửa', 'customers', 'edit', 4, 0, '2022-01-25 21:03:34', '0000-00-00 00:00:00'),
(463, 89, 'Xóa', 'customers', 'delete', 3, 0, '2022-01-25 21:03:34', '0000-00-00 00:00:00'),
(464, 85, 'Xem', 'country', 'index', 1, 0, '2022-01-26 21:31:38', '0000-00-00 00:00:00'),
(465, 85, 'Thêm', 'country', 'add', 2, 0, '2022-01-26 21:31:38', '0000-00-00 00:00:00'),
(466, 85, 'Xóa', 'country', 'delete', 3, 0, '2022-01-26 21:31:38', '0000-00-00 00:00:00'),
(467, 85, 'Sửa', 'country', 'edit', 4, 0, '2022-01-26 21:31:38', '0000-00-00 00:00:00'),
(472, 87, 'Xem', 'booking', 'index', 1, 0, '2022-01-26 21:32:29', '0000-00-00 00:00:00'),
(473, 87, 'Thêm', 'booking', 'add', 2, 0, '2022-01-26 21:32:29', '0000-00-00 00:00:00'),
(474, 87, 'Xóa', 'booking', 'delete', 3, 0, '2022-01-26 21:32:29', '0000-00-00 00:00:00'),
(475, 87, 'Sửa', 'booking', 'edit', 4, 0, '2022-01-26 21:32:29', '0000-00-00 00:00:00'),
(528, 90, 'Xem', 'banner', 'index', 1, 0, '2022-02-13 16:00:46', '0000-00-00 00:00:00'),
(529, 90, 'Thêm', 'banner', 'add', 2, 0, '2022-02-13 16:00:46', '0000-00-00 00:00:00'),
(530, 90, 'Xóa', 'banner', 'delete', 3, 0, '2022-02-13 16:00:46', '0000-00-00 00:00:00'),
(531, 90, 'Sửa', 'banner', 'edit', 4, 0, '2022-02-13 16:00:46', '0000-00-00 00:00:00'),
(532, 91, 'Xem', 'difficult', 'index', 1, 0, '2022-02-13 16:04:01', '0000-00-00 00:00:00'),
(533, 91, 'Thêm', 'difficult', 'add', 2, 0, '2022-02-13 16:04:01', '0000-00-00 00:00:00'),
(534, 91, 'Xóa', 'difficult', 'delete', 3, 0, '2022-02-13 16:04:01', '0000-00-00 00:00:00'),
(535, 91, 'Sửa', 'difficult', 'edit', 4, 0, '2022-02-13 16:04:01', '0000-00-00 00:00:00'),
(560, 95, 'Xem', 'faq', 'index', 1, 0, '2022-02-13 16:13:34', '0000-00-00 00:00:00'),
(561, 95, 'Thêm', 'faq', 'add', 2, 0, '2022-02-13 16:13:34', '0000-00-00 00:00:00'),
(562, 95, 'Xóa', 'faq', 'delete', 3, 0, '2022-02-13 16:13:35', '0000-00-00 00:00:00'),
(563, 95, 'Sửa', 'faq', 'edit', 4, 0, '2022-02-13 16:13:35', '0000-00-00 00:00:00'),
(564, 96, 'Xem', 'service', 'index', 1, 0, '2022-02-13 16:13:41', '0000-00-00 00:00:00'),
(565, 96, 'Thêm', 'service', 'add', 2, 0, '2022-02-13 16:13:41', '0000-00-00 00:00:00'),
(566, 96, 'Xóa', 'service', 'delete', 3, 0, '2022-02-13 16:13:41', '0000-00-00 00:00:00'),
(567, 96, 'Sửa', 'service', 'edit', 4, 0, '2022-02-13 16:13:41', '0000-00-00 00:00:00'),
(568, 97, 'Xem', 'number', 'index', 1, 0, '2022-02-13 16:13:46', '0000-00-00 00:00:00'),
(569, 97, 'Thêm', 'number', 'add', 2, 0, '2022-02-13 16:13:46', '0000-00-00 00:00:00'),
(570, 97, 'Xóa', 'number', 'delete', 3, 0, '2022-02-13 16:13:46', '0000-00-00 00:00:00'),
(571, 97, 'Sửa', 'number', 'edit', 4, 0, '2022-02-13 16:13:46', '0000-00-00 00:00:00'),
(572, 98, 'Xem', 'advise', 'index', 1, 0, '2022-02-13 16:14:30', '0000-00-00 00:00:00'),
(573, 98, 'Thêm', 'advise', 'add', 2, 0, '2022-02-13 16:14:30', '0000-00-00 00:00:00'),
(574, 98, 'Xóa', 'advise', 'delete', 3, 0, '2022-02-13 16:14:30', '0000-00-00 00:00:00'),
(575, 98, 'Sửa', 'advise', 'edit', 4, 0, '2022-02-13 16:14:30', '0000-00-00 00:00:00'),
(580, 101, 'Xem', 'product', 'index', 1, 0, '2022-04-03 04:43:05', '0000-00-00 00:00:00'),
(581, 101, 'Thêm', 'product', 'add', 2, 0, '2022-04-03 04:43:05', '0000-00-00 00:00:00'),
(582, 101, 'Sửa', 'product', 'edit', 4, 0, '2022-04-03 04:43:05', '0000-00-00 00:00:00'),
(583, 101, 'Xóa', 'product', 'delete', 3, 0, '2022-04-03 04:43:05', '0000-00-00 00:00:00'),
(584, 100, 'Xem', 'menuProduct', 'index', 1, 0, '2022-04-03 07:42:59', '0000-00-00 00:00:00'),
(585, 100, 'Thêm', 'menuProduct', 'add', 2, 0, '2022-04-03 07:42:59', '0000-00-00 00:00:00'),
(586, 100, 'Xóa', 'menuProduct', 'delete', 3, 0, '2022-04-03 07:42:59', '0000-00-00 00:00:00'),
(587, 100, 'Sửa', 'menuProduct', 'edit', 4, 0, '2022-04-03 07:42:59', '0000-00-00 00:00:00'),
(596, 80, 'Xem', 'partner', 'index', 1, 0, '2022-04-27 10:42:37', '0000-00-00 00:00:00'),
(597, 80, 'Thêm', 'partner', 'add', 2, 0, '2022-04-27 10:42:37', '0000-00-00 00:00:00'),
(598, 80, 'Xóa', 'partner', 'delete', 3, 0, '2022-04-27 10:42:37', '0000-00-00 00:00:00'),
(599, 80, 'Sửa', 'partner', 'edit', 4, 0, '2022-04-27 10:42:37', '0000-00-00 00:00:00'),
(611, 103, 'Xem', 'ads', 'index', 1, 0, '2022-05-04 15:32:31', '0000-00-00 00:00:00'),
(612, 103, 'Thêm', 'ads', 'add', 2, 0, '2022-05-04 15:32:31', '0000-00-00 00:00:00'),
(613, 103, 'Xóa', 'ads', 'delete', 3, 0, '2022-05-04 15:32:31', '0000-00-00 00:00:00'),
(614, 103, 'Sửa', 'ads', 'edit', 4, 0, '2022-05-04 15:32:31', '0000-00-00 00:00:00'),
(615, 34, 'Xem', 'quangCao', 'index', 1, 0, '2022-05-04 15:32:34', '0000-00-00 00:00:00'),
(616, 34, 'Thêm', 'quangCao', 'add', 2, 0, '2022-05-04 15:32:34', '0000-00-00 00:00:00'),
(617, 34, 'Xóa ', 'quangCao', 'delete', 3, 0, '2022-05-04 15:32:34', '0000-00-00 00:00:00'),
(618, 34, 'Sửa', 'quangCao', 'edit', 4, 0, '2022-05-04 15:32:34', '0000-00-00 00:00:00'),
(619, 34, 'Hiển thị', 'quangCao', 'checkglobals', 5, 0, '2022-05-04 15:32:34', '0000-00-00 00:00:00'),
(620, 34, 'Xoá tất cả', 'quangCao', 'deleteAll', 6, 0, '2022-05-04 15:32:34', '0000-00-00 00:00:00'),
(621, 34, 'Sắp xếp', 'quangCao', 'sort', 7, 0, '2022-05-04 15:32:34', '0000-00-00 00:00:00'),
(622, 104, 'Xem', 'cart', 'index', 1, 0, '2022-05-08 08:36:44', '0000-00-00 00:00:00'),
(623, 104, 'Thêm', 'cart', 'add', 2, 0, '2022-05-08 08:36:44', '0000-00-00 00:00:00'),
(624, 104, 'Sửa', 'cart', 'edit', 4, 0, '2022-05-08 08:36:44', '0000-00-00 00:00:00'),
(625, 104, 'Xóa', 'cart', 'delete', 3, 0, '2022-05-08 08:36:44', '0000-00-00 00:00:00'),
(628, 105, 'Xem', 'instagram', 'index', 1, 0, '2022-08-11 17:56:54', '0000-00-00 00:00:00'),
(629, 105, 'Thêm', 'instagram', 'add', 2, 0, '2022-08-11 17:56:54', '0000-00-00 00:00:00'),
(630, 105, 'Sửa', 'instagram', 'edit', 4, 0, '2022-08-11 17:56:54', '0000-00-00 00:00:00'),
(631, 105, 'Xóa', 'instagram', 'delete', 3, 0, '2022-08-11 17:56:54', '0000-00-00 00:00:00'),
(636, 81, 'Xem', 'video', 'index', 1, 0, '2022-08-11 18:37:49', '0000-00-00 00:00:00'),
(637, 81, 'Thêm', 'video', 'add', 2, 0, '2022-08-11 18:37:49', '0000-00-00 00:00:00'),
(638, 81, 'Xóa', 'video', 'delete', 3, 0, '2022-08-11 18:37:49', '0000-00-00 00:00:00'),
(639, 81, 'Sửa', 'video', 'edit', 4, 0, '2022-08-11 18:37:49', '0000-00-00 00:00:00'),
(640, 92, 'Sửa', 'about', 'edit', 4, 0, '2022-08-11 19:05:38', '0000-00-00 00:00:00'),
(641, 106, 'Xem', 'album', 'index', 1, 0, '2022-08-11 19:35:24', '0000-00-00 00:00:00'),
(642, 106, 'Thêm', 'album', 'add', 2, 0, '2022-08-11 19:35:24', '0000-00-00 00:00:00'),
(643, 106, 'Sửa', 'album', 'edit', 4, 0, '2022-08-11 19:35:24', '0000-00-00 00:00:00'),
(644, 106, 'Xóa', 'album', 'delete', 3, 0, '2022-08-11 19:35:24', '0000-00-00 00:00:00'),
(645, 107, 'Xem', 'regisstudy', 'index', 1, 0, '2022-08-11 22:34:55', '0000-00-00 00:00:00'),
(646, 107, 'Xóa', 'regisstudy', 'delete', 3, 0, '2022-08-11 22:34:55', '0000-00-00 00:00:00'),
(647, 108, 'Xem', 'banner2', 'index', 1, 0, '2022-08-12 09:38:51', '0000-00-00 00:00:00'),
(648, 108, 'Xóa', 'banner2', 'delete', 3, 0, '2022-08-12 09:38:51', '0000-00-00 00:00:00'),
(649, 75, 'Xem', 'advisephone', 'index', 1, 0, '2022-08-12 10:48:09', '0000-00-00 00:00:00'),
(650, 75, 'Xoá', 'advisephone', 'delete', 2, 0, '2022-08-12 10:48:09', '0000-00-00 00:00:00'),
(655, 109, 'Xem', 'productinfo', 'index', 1, 0, '2022-09-08 06:30:31', '0000-00-00 00:00:00'),
(656, 109, 'Thêm', 'productinfo', 'add', 2, 0, '2022-09-08 06:30:31', '0000-00-00 00:00:00'),
(657, 109, 'Xóa', 'productinfo', 'delete', 3, 0, '2022-09-08 06:30:31', '0000-00-00 00:00:00'),
(658, 109, 'Sửa', 'productinfo', 'edit', 4, 0, '2022-09-08 06:30:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int NOT NULL,
  `cateid` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `webps` varchar(255) DEFAULT NULL,
  `webps_thumb` varchar(255) DEFAULT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `des` text NOT NULL,
  `content` longtext NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `prominent` int NOT NULL,
  `sort` int NOT NULL,
  `home` tinyint NOT NULL DEFAULT '0',
  `meta_keywords` text NOT NULL,
  `meta_descriptions` text NOT NULL,
  `tags` text NOT NULL,
  `is_view` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `cateid`, `title`, `name`, `alias`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `des`, `content`, `publish`, `prominent`, `sort`, `home`, `meta_keywords`, `meta_descriptions`, `tags`, `is_view`, `created_at`, `updated_at`) VALUES
(14, 201, 'Top 5 nhóm thiết bị cho spa không thể thiếu', 'Top 5 nhóm thiết bị cho spa không thể thiếu', 'top-5-nhom-thiet-bi-cho-spa-khong-the-thieu', '2022/08/top-5-nhom-thiet-bi-cho-spa-khong-the-thieu.png', '2022/08/thumb/top-5-nhom-thiet-bi-cho-spa-khong-the-thieu.png', 'uploads/webps/news/2022/08/top-5-nhom-thiet-bi-cho-spa-khong-the-thieu.webp', 'uploads/webps/news/2022/08/thumb/top-5-nhom-thiet-bi-cho-spa-khong-the-thieu.webp', '08', '2022', '<p>Like every year, this new year also brought in a lot of resolutions that we...</p>\r\n', '<p style=\"text-align:center\"><strong>Son thi&ecirc;n nhi&ecirc;n AN TO&Agrave;N - HỮU DỤNG</strong></p>\r\n\r\n<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n', 1, 0, 1, 1, 'Top 5 nhóm thiết bị cho spa không thể thiếu', 'Top 5 nhóm thiết bị cho spa không thể thiếu', '', 2, '2022-08-11 08:03:22', '2022-08-21 12:21:22'),
(15, 201, 'CHỦ SPA PHẢI BIẾT: TOP 5 MÁY CHĂM SÓC DA ĐA NĂNG ĐƯỢC MUA NHIỀU NHẤT HIỆN NAY', 'CHỦ SPA PHẢI BIẾT: TOP 5 MÁY CHĂM SÓC DA ĐA NĂNG ĐƯỢC MUA NHIỀU NHẤT HIỆN NAY', 'chu-spa-phai-biet-top-5-may-cham-soc-da-da-nang-duoc-mua-nhieu-nhat-hien-nay', '2022/08/chu-spa-phai-biet-top-5-may-cham-soc-da-da-nang-duoc-mua-nhieu-nhat-hien-nay.png', '2022/08/thumb/chu-spa-phai-biet-top-5-may-cham-soc-da-da-nang-duoc-mua-nhieu-nhat-hien-nay.png', 'uploads/webps/news/2022/08/chu-spa-phai-biet-top-5-may-cham-soc-da-da-nang-duoc-mua-nhieu-nhat-hien-nay.webp', 'uploads/webps/news/2022/08/thumb/chu-spa-phai-biet-top-5-may-cham-soc-da-da-nang-duoc-mua-nhieu-nhat-hien-nay.webp', '08', '2022', '<p>Like every year, this new year also brought in a lot of resolutions that we...</p>\r\n', '<p><strong>Son thi&ecirc;n nhi&ecirc;n AN TO&Agrave;N - HỮU DỤNG</strong></p>\r\n\r\n<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n', 1, 0, 2, 1, 'CHỦ SPA PHẢI BIẾT: TOP 5 MÁY CHĂM SÓC DA ĐA NĂNG ĐƯỢC MUA NHIỀU NHẤT HIỆN NAY', 'CHỦ SPA PHẢI BIẾT: TOP 5 MÁY CHĂM SÓC DA ĐA NĂNG ĐƯỢC MUA NHIỀU NHẤT HIỆN NAY', '', 2, '2022-08-11 08:04:00', '2022-08-21 12:21:27'),
(16, 201, 'CÔNG NGHỆ TRIỆT LÔNG OPT SHR VÀ IPL SHR, SỰ GIỐNG VÀ KHÁC NHAU', 'CÔNG NGHỆ TRIỆT LÔNG OPT SHR VÀ IPL SHR, SỰ GIỐNG VÀ KHÁC NHAU', 'cong-nghe-triet-long-opt-shr-va-ipl-shr-su-giong-va-khac-nhau', '2022/08/cong-nghe-triet-long-opt-shr-va-ipl-shr-su-giong-va-khac-nhau.png', '2022/08/thumb/cong-nghe-triet-long-opt-shr-va-ipl-shr-su-giong-va-khac-nhau.png', 'uploads/webps/news/2022/08/cong-nghe-triet-long-opt-shr-va-ipl-shr-su-giong-va-khac-nhau.webp', 'uploads/webps/news/2022/08/thumb/cong-nghe-triet-long-opt-shr-va-ipl-shr-su-giong-va-khac-nhau.webp', '08', '2022', '<p>Like every year, this new year also brought in a lot of resolutions that we</p>\r\n', '<p><strong>Son thi&ecirc;n nhi&ecirc;n AN TO&Agrave;N - HỮU DỤNG</strong></p>\r\n\r\n<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n', 1, 0, 3, 1, 'CÔNG NGHỆ TRIỆT LÔNG OPT SHR VÀ IPL SHR, SỰ GIỐNG VÀ KHÁC NHAU', 'CÔNG NGHỆ TRIỆT LÔNG OPT SHR VÀ IPL SHR, SỰ GIỐNG VÀ KHÁC NHAU', '', 4, '2022-08-11 08:04:45', '2022-08-21 12:21:33'),
(17, 201, 'DỰ BÁO CHIẾN LƯỢC KINH DOANH CÁC DỊCH VỤ SPA HOT NĂM 2021', 'DỰ BÁO CHIẾN LƯỢC KINH DOANH CÁC DỊCH VỤ SPA HOT NĂM 2021', 'du-bao-chien-luoc-kinh-doanh-cac-dich-vu-spa-hot-nam-2021', '2022/08/du-bao-chien-luoc-kinh-doanh-cac-dich-vu-spa-hot-nam-2021.jpg', '2022/08/thumb/du-bao-chien-luoc-kinh-doanh-cac-dich-vu-spa-hot-nam-2021.jpg', 'uploads/webps/news/2022/08/du-bao-chien-luoc-kinh-doanh-cac-dich-vu-spa-hot-nam-2021.webp', 'uploads/webps/news/2022/08/thumb/du-bao-chien-luoc-kinh-doanh-cac-dich-vu-spa-hot-nam-2021.webp', '08', '2022', '<p>Like every year, this new year also brought in a lot of resolutions that we...</p>\r\n', '<p><strong>Son thi&ecirc;n nhi&ecirc;n AN TO&Agrave;N - HỮU DỤNG</strong></p>\r\n\r\n<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n', 1, 0, 4, 1, 'DỰ BÁO CHIẾN LƯỢC KINH DOANH CÁC DỊCH VỤ SPA HOT NĂM 2021', 'DỰ BÁO CHIẾN LƯỢC KINH DOANH CÁC DỊCH VỤ SPA HOT NĂM 2021', '', 10, '2022-08-11 08:06:01', '2022-08-21 12:21:38'),
(18, 221, 'Double Cleansing for Summer', 'Double Cleansing for Summer', 'double-cleansing-for-summer-351', '2022/08/double-cleansing-for-summer-351.png', '2022/08/thumb/double-cleansing-for-summer-351.png', 'uploads/webps/news/2022/08/double-cleansing-for-summer-351.webp', 'uploads/webps/news/2022/08/thumb/double-cleansing-for-summer-351.webp', '08', '2022', '<p>Say goodbye to bacteria by adding double cleansing to your summertime skincare routine.</p>\r\n', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:10:56'),
(19, 221, 'Double Cleansing for Summer', 'A Basic Breakdown of Eye Cream Benefits', 'a-basic-breakdown-of-eye-cream-benefits-790', '2022/08/a-basic-breakdown-of-eye-cream-benefits-790.png', '2022/08/thumb/a-basic-breakdown-of-eye-cream-benefits-790.png', 'uploads/webps/news/2022/08/a-basic-breakdown-of-eye-cream-benefits-790.webp', 'uploads/webps/news/2022/08/thumb/a-basic-breakdown-of-eye-cream-benefits-790.webp', '08', '2022', 'The benefits of eye cream, how to find the best natural eye cream for you, and more!', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:11:00'),
(20, 221, 'Double Cleansing for Summer', 'Facial Sunscreen - Love or Leave?', 'facial-sunscreen-love-or-leave', '2022/08/facial-sunscreen-love-or-leave.png', '2022/08/thumb/facial-sunscreen-love-or-leave.png', 'uploads/webps/news/2022/08/facial-sunscreen-love-or-leave.webp', 'uploads/webps/news/2022/08/thumb/facial-sunscreen-love-or-leave.webp', '08', '2022', 'We breakdown just why you need a facial sunscreen and our top picks for you.', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:11:06');
INSERT INTO `tbl_news` (`id`, `cateid`, `title`, `name`, `alias`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `des`, `content`, `publish`, `prominent`, `sort`, `home`, `meta_keywords`, `meta_descriptions`, `tags`, `is_view`, `created_at`, `updated_at`) VALUES
(21, 221, 'Double Cleansing for Summer', 'Exfoliation 101', 'exfoliation-101', '2022/08/exfoliation-101.png', '2022/08/thumb/exfoliation-101.png', 'uploads/webps/news/2022/08/exfoliation-101.webp', 'uploads/webps/news/2022/08/thumb/exfoliation-101.webp', '08', '2022', 'Everything you need to know on exfoliating, do’s and don’ts, and the different types of exfoliation your skin craves', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 4, '2022-08-17 15:42:01', '2022-08-19 12:11:10'),
(22, 222, 'Double Cleansing for Summer', '5 Reasons Why You Need to Add a Makeup Blender to Your Beauty Arsenal', '5-reasons-why-you-need-to-add-a-makeup-blender-to-your-beauty-arsenal', '2022/08/5-reasons-why-you-need-to-add-a-makeup-blender-to-your-beauty-arsenal.png', '2022/08/thumb/5-reasons-why-you-need-to-add-a-makeup-blender-to-your-beauty-arsenal.png', 'uploads/webps/news/2022/08/5-reasons-why-you-need-to-add-a-makeup-blender-to-your-beauty-arsenal.webp', 'uploads/webps/news/2022/08/thumb/5-reasons-why-you-need-to-add-a-makeup-blender-to-your-beauty-arsenal.webp', '08', '2022', 'Everything you need to know about how to use a Makeup Blender for all its worth.', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:12:04'),
(23, 222, 'Double Cleansing for Summer', 'Clean Girl Makeup 101', 'clean-girl-makeup-101', '2022/08/clean-girl-makeup-101.png', '2022/08/thumb/clean-girl-makeup-101.png', 'uploads/webps/news/2022/08/clean-girl-makeup-101.webp', 'uploads/webps/news/2022/08/thumb/clean-girl-makeup-101.webp', '08', '2022', 'The “Clean Girl Look” has taken the internet by storm. Find out how you can achieve it!', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:12:08'),
(24, 222, 'Double Cleansing for Summer', 'How to: Highlight & Glow', 'how-to-highlight-glow', '2022/08/how-to-highlight-glow.jpg', '2022/08/thumb/how-to-highlight-glow.jpg', 'uploads/webps/news/2022/08/how-to-highlight-glow.webp', 'uploads/webps/news/2022/08/thumb/how-to-highlight-glow.webp', '08', '2022', 'Learn how to achieve a flawless glow with your makeup routine', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:12:13'),
(25, 222, 'Double Cleansing for Summer', 'How to Achieve Budge-Proof Makeup All Day', 'how-to-achieve-budgeproof-makeup-all-day', '2022/08/how-to-achieve-budgeproof-makeup-all-day.png', '2022/08/thumb/how-to-achieve-budgeproof-makeup-all-day.png', 'uploads/webps/news/2022/08/how-to-achieve-budgeproof-makeup-all-day.webp', 'uploads/webps/news/2022/08/thumb/how-to-achieve-budgeproof-makeup-all-day.webp', '08', '2022', 'The tips and tricks for long lasting makeup from day to night!', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:12:17'),
(26, 223, 'Double Cleansing for Summer', 'Meet Our Award Winners!', 'meet-our-award-winners', '2022/08/meet-our-award-winners.png', '2022/08/thumb/meet-our-award-winners.png', 'uploads/webps/news/2022/08/meet-our-award-winners.webp', 'uploads/webps/news/2022/08/thumb/meet-our-award-winners.webp', '08', '2022', 'Take a deep dive into our 2020-2022 beauty and skin care award winners', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:12:49');
INSERT INTO `tbl_news` (`id`, `cateid`, `title`, `name`, `alias`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `des`, `content`, `publish`, `prominent`, `sort`, `home`, `meta_keywords`, `meta_descriptions`, `tags`, `is_view`, `created_at`, `updated_at`) VALUES
(27, 223, 'Double Cleansing for Summer', 'Chest Care 101', 'chest-care-101', '2022/08/chest-care-101.png', '2022/08/thumb/chest-care-101.png', 'uploads/webps/news/2022/08/chest-care-101.webp', 'uploads/webps/news/2022/08/thumb/chest-care-101.webp', '08', '2022', 'Perfect your chest care routine to maintain supple and balanced skin!', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:12:54'),
(28, 223, 'Double Cleansing for Summer', 'Double Cleansing: Worth It or Double Trouble?', 'double-cleansing-worth-it-or-double-trouble', '2022/08/double-cleansing-worth-it-or-double-trouble.png', '2022/08/thumb/double-cleansing-worth-it-or-double-trouble.png', 'uploads/webps/news/2022/08/double-cleansing-worth-it-or-double-trouble.webp', 'uploads/webps/news/2022/08/thumb/double-cleansing-worth-it-or-double-trouble.webp', '08', '2022', 'Covering the basics of double cleansing and why your skin will love – not loathe - the extra step for happy, healthy skin!', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:12:59'),
(29, 223, 'Double Cleansing for Summer', 'A Foolproof Guide to Figuring Out Your Skin Undertone', 'a-foolproof-guide-to-figuring-out-your-skin-undertone', '2022/08/a-foolproof-guide-to-figuring-out-your-skin-undertone.png', '2022/08/thumb/a-foolproof-guide-to-figuring-out-your-skin-undertone.png', 'uploads/webps/news/2022/08/a-foolproof-guide-to-figuring-out-your-skin-undertone.webp', 'uploads/webps/news/2022/08/thumb/a-foolproof-guide-to-figuring-out-your-skin-undertone.webp', '08', '2022', 'How to Identify Your Undertone and Find Your Best Color Palette', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:13:04'),
(30, 224, 'Double Cleansing for Summer', 'What Does Your Scented Candle Say About You?', 'what-does-your-scented-candle-say-about-you', '2022/08/what-does-your-scented-candle-say-about-you.png', '2022/08/thumb/what-does-your-scented-candle-say-about-you.png', 'uploads/webps/news/2022/08/what-does-your-scented-candle-say-about-you.webp', 'uploads/webps/news/2022/08/thumb/what-does-your-scented-candle-say-about-you.webp', '08', '2022', 'Your favorite candle scent may tell a lot more about you than you think!', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:14:23'),
(31, 224, 'Double Cleansing for Summer', 'Why You Should Be Using Soy Wax Candles', 'why-you-should-be-using-soy-wax-candles', '2022/08/why-you-should-be-using-soy-wax-candles.png', '2022/08/thumb/why-you-should-be-using-soy-wax-candles.png', 'uploads/webps/news/2022/08/why-you-should-be-using-soy-wax-candles.webp', 'uploads/webps/news/2022/08/thumb/why-you-should-be-using-soy-wax-candles.webp', '08', '2022', 'The benefits of soy wax versus paraffin wax candles for a clean-burning calmer home space', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:14:30'),
(32, 224, 'Double Cleansing for Summer', 'The Benefits of Yoga', 'the-benefits-of-yoga', '2022/08/the-benefits-of-yoga.png', '2022/08/thumb/the-benefits-of-yoga.png', 'uploads/webps/news/2022/08/the-benefits-of-yoga.webp', 'uploads/webps/news/2022/08/thumb/the-benefits-of-yoga.webp', '08', '2022', 'How you can improve your health and center your life through yoga', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:14:57');
INSERT INTO `tbl_news` (`id`, `cateid`, `title`, `name`, `alias`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `des`, `content`, `publish`, `prominent`, `sort`, `home`, `meta_keywords`, `meta_descriptions`, `tags`, `is_view`, `created_at`, `updated_at`) VALUES
(33, 224, 'Double Cleansing for Summer', 'Developing Healthy Habits', 'developing-healthy-habits', '2022/08/developing-healthy-habits.png', '2022/08/thumb/developing-healthy-habits.png', 'uploads/webps/news/2022/08/developing-healthy-habits.webp', 'uploads/webps/news/2022/08/thumb/developing-healthy-habits.webp', '08', '2022', 'Ideas for healthy daily and nightly activities to keep becoming our best selves', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:15:03'),
(34, 225, 'Double Cleansing for Summer', 'What Is Bioaccumulation?', 'what-is-bioaccumulation', '2022/08/what-is-bioaccumulation.png', '2022/08/thumb/what-is-bioaccumulation.png', 'uploads/webps/news/2022/08/what-is-bioaccumulation.webp', 'uploads/webps/news/2022/08/thumb/what-is-bioaccumulation.webp', '08', '2022', 'How it relates to personal care products, the environment, and your health', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:15:07'),
(35, 225, 'Double Cleansing for Summer', '5 Licorice Root Benefits for Skin', '5-licorice-root-benefits-for-skin', '2022/08/5-licorice-root-benefits-for-skin.jpg', '2022/08/thumb/5-licorice-root-benefits-for-skin.jpg', 'uploads/webps/news/2022/08/5-licorice-root-benefits-for-skin.webp', 'uploads/webps/news/2022/08/thumb/5-licorice-root-benefits-for-skin.webp', '08', '2022', 'How licorice root goes beyond the candy aisle to serve gentle brightening benefits to skin', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:15:12'),
(36, 225, 'Double Cleansing for Summer', 'Benefits of Using Rose Water for Hair', 'benefits-of-using-rose-water-for-hair', '2022/08/benefits-of-using-rose-water-for-hair.png', '2022/08/thumb/benefits-of-using-rose-water-for-hair.png', 'uploads/webps/news/2022/08/benefits-of-using-rose-water-for-hair.webp', 'uploads/webps/news/2022/08/thumb/benefits-of-using-rose-water-for-hair.webp', '08', '2022', 'How rose water for hair benefits a healthier scalp and shinier tresses', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:15:18'),
(37, 225, 'Double Cleansing for Summer', 'Harsh Vs. Natural Soap Surfactants', 'harsh-vs-natural-soap-surfactants', '2022/08/harsh-vs-natural-soap-surfactants.png', '2022/08/thumb/harsh-vs-natural-soap-surfactants.png', 'uploads/webps/news/2022/08/harsh-vs-natural-soap-surfactants.webp', 'uploads/webps/news/2022/08/thumb/harsh-vs-natural-soap-surfactants.webp', '08', '2022', 'The ingredients in your daily soap products could be far from beneficial for your skin', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:15:23'),
(38, 225, 'Double Cleansing for Summer', '6 Reasons to Use Lavender Oil for Skin', '6-reasons-to-use-lavender-oil-for-skin', '2022/08/6-reasons-to-use-lavender-oil-for-skin.png', '2022/08/thumb/6-reasons-to-use-lavender-oil-for-skin.png', 'uploads/webps/news/2022/08/6-reasons-to-use-lavender-oil-for-skin.webp', 'uploads/webps/news/2022/08/thumb/6-reasons-to-use-lavender-oil-for-skin.webp', '08', '2022', 'How it’s made, how it benefits your skin, and how to start using it in your routine', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:15:27');
INSERT INTO `tbl_news` (`id`, `cateid`, `title`, `name`, `alias`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `des`, `content`, `publish`, `prominent`, `sort`, `home`, `meta_keywords`, `meta_descriptions`, `tags`, `is_view`, `created_at`, `updated_at`) VALUES
(39, 225, 'Double Cleansing for Summer', 'Caring for Dry, Cracked Hands', 'caring-for-dry-cracked-hands', '2022/08/caring-for-dry-cracked-hands.jpg', '2022/08/thumb/caring-for-dry-cracked-hands.jpg', 'uploads/webps/news/2022/08/caring-for-dry-cracked-hands.webp', 'uploads/webps/news/2022/08/thumb/caring-for-dry-cracked-hands.webp', '08', '2022', 'Finding balance between clean hands and soft skin', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:15:31'),
(40, 225, 'Double Cleansing for Summer', 'A Quick Reminder on Why Everyone Loves Vitamin C', 'a-quick-reminder-on-why-everyone-loves-vitamin-c', '2022/08/a-quick-reminder-on-why-everyone-loves-vitamin-c.jpg', '2022/08/thumb/a-quick-reminder-on-why-everyone-loves-vitamin-c.jpg', 'uploads/webps/news/2022/08/a-quick-reminder-on-why-everyone-loves-vitamin-c.webp', 'uploads/webps/news/2022/08/thumb/a-quick-reminder-on-why-everyone-loves-vitamin-c.webp', '08', '2022', 'Celebrating this citrus celeb for National Vitamin C Day', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 2, '2022-08-17 15:42:01', '2022-08-19 12:15:36'),
(41, 225, 'Double Cleansing for Summer', 'Eucalyptus Benefits for Skin, Hair, and More', 'eucalyptus-benefits-for-skin-hair-and-more', '2022/08/eucalyptus-benefits-for-skin-hair-and-more.png', '2022/08/thumb/eucalyptus-benefits-for-skin-hair-and-more.png', 'uploads/webps/news/2022/08/eucalyptus-benefits-for-skin-hair-and-more.webp', 'uploads/webps/news/2022/08/thumb/eucalyptus-benefits-for-skin-hair-and-more.webp', '08', '2022', 'How to use this refreshing botanical in your daily beauty routine', '<p>Back in the day, there was once a time when we all thought swiping a makeup wipe across the face was enough to cleanse our skin. In fact, for some of us, this might have been our entire skincare routine.</p>\r\n\r\n<p>Not to worry, though&ndash;this is a safe place for skincare lovers everywhere, and we&rsquo;re all here to improve our self-care routines as we learn to take better care of ourselves.</p>\r\n\r\n<p>And in that spirit, we thought that today would be a great day to go over double cleansing. While double cleansing has been popularized for quite some time at this point, not all of us have tried it just yet.</p>\r\n\r\n<p>But for those who have, there are plenty of individuals who will go as far to call it a&nbsp;<em>life-changing</em>&nbsp;step.</p>\r\n\r\n<p>So without further ado, let&rsquo;s break down double cleansing, and why it&rsquo;s perfect for your summertime skincare routine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>What is Double Cleansing? Is it Effective?</strong></p>\r\n\r\n<p>So, what exactly is double cleansing? And does it really work?</p>\r\n\r\n<p>As you might have guessed already, double cleansing is a method of cleansing that involves two steps: an oil-based cleanser, such as a cleansing oil or cleansing balm, and a water-based cleanser, whether it&rsquo;s a foam, gel, etc. If you&rsquo;ve never double cleansed before, there&rsquo;s a good chance that this cleanser can be the one you&rsquo;re already using.</p>\r\n\r\n<p>Double cleansing works by effectively eliminating the grime, and here&rsquo;s why: the first cleansing step, which is oil-based, is going to draw out those impurities that are&nbsp;<em>also</em>&nbsp;oil-based, which includes residual sunscreen, sebum, and pollutants from your environment. Then, that second cleansing step helps eliminate everything else, including dirt and sweat.</p>\r\n\r\n<p>Think about it: when we don&rsquo;t properly cleanse on a regular basis, grime from our world can deposit into your skin, not to mention the sunscreen, makeup, and sweat. This buildup can become trapped in the pores, leading to clogging and enlarged pores, while the complexion might become noticeably dull.</p>\r\n\r\n<p>But when we double cleanse, we&rsquo;re drawing impurities out of the skin like a magnet, and it can do wonders for our skin in the long run.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"/uploads/images/pexels-anna-shvets-5069485-min.png\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>Reasons to Double Cleanse This Summer</strong></p>\r\n\r\n<p>Now, you may be wondering:&nbsp;<em>why should I do more for my skincare? Aren&rsquo;t makeup wipes enough?</em></p>\r\n\r\n<p>While double cleansing may mean a few more steps in your skincare routine, it&rsquo;s absolutely worth it. Makeup wipes, on the other hand, not only create waste, but they&rsquo;re actually not very effective for removing makeup.</p>\r\n\r\n<p>As a matter of fact, makeup wipes may be doing your skin more harm than good. Not only are makeup wipes made with solutions you&rsquo;re not so familiar with, but when you apply one to your skin, makeup, sunscreen and dirt is dragged all over your skin.</p>\r\n\r\n<p>While these wipes may lift&nbsp;<em>some</em>&nbsp;impurities from your skin, it&rsquo;s ultimately going to do more harm than good.</p>\r\n\r\n<p>On top of that, makeup wipes are single-use items, and we&rsquo;re trying to get as much use out of our skincare these days as possible.</p>\r\n\r\n<p>And with summer in full swing, you need a solid cleansing step that&rsquo;s going to eliminate all of the sweat, sunscreen and grime that accumulates on our skin during some fun in the sun.</p>\r\n\r\n<p>Because it&rsquo;s so thorough for removing both water and oil-based residue on the skin, double cleansing can help combat the pollutants you&rsquo;re exposed to throughout the day&ndash;especially for those of us that live in urban areas, where car exhaust, soot, and car exhaust contributes to pollution for our skin even more.</p>\r\n\r\n<p>And not only will double cleansing keep your skin clean, but it will also help soothe and relax it. And thanks to the use of cleansing oils, double cleansing is a fantastic way to remove makeup and sunscreen without stripping the acid mantle or disrupting the skin barrier. And depending on the type of cleanser you use to follow up on your oil cleanser, you can make your double cleanse even more gentle.</p>\r\n\r\n<p>That being said, you might have those nights when you need a quick makeup remover fix before bed&ndash;maybe you got back from a music festival, or maybe you had one too many summer cocktails. An effective, more sustainable solution is some reusable cotton pads and a micellar water; it won&rsquo;t be as thorough as double cleansing, but in a pinch, it&rsquo;s a wonderful alternative to makeup wipes.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"ron-lach\" src=\"https://cdn.shopify.com/s/files/1/0648/1955/files/pexels-ron-lach-9246307-min.jpg?v=1652878206\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><strong>Steps to Double Cleanse</strong></p>\r\n\r\n<p>If you choose to incorporate double cleansing as part of your skincare routine, we recommend that you opt for an extra gentle oil-based cleanser, like our&nbsp;Blood Orange Cleansing Balm. Cleansing balms melt slowly, and gently massaging a cleansing balm into your skin will feel like a soothing, luxurious experience at the end of the day, especially during the summer months.</p>\r\n\r\n<p>As for your second-step cleanser, we recommend any type of water-based formula, and whether you choose a foam like our&nbsp;Green Tea Cloud Foam Cleanser, or something gently exfoliating like our&nbsp;Pore Detox Herbal Cleanser, it&rsquo;s ultimately up to you.</p>\r\n\r\n<p>We recommend that you keep your double cleansing step in the evening, and to simply splash your face with water in the morning, or use one gentle, water-based cleanser.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To begin, dispense your cleansing oil or scoop out about a teaspoon of your cleansing balm, depending on which type you have. Without wetting the skin, massage the cleanser into your skin in gentle circular motions for about 30 seconds to a minute, avoiding the mouth. When oil cleansing, there is no need for an additional makeup remover, so go ahead and massage (very gently) over the eyes to free up any mascara or eyeshadow. With a cloth, wipe away any residual cleanser, if necessary.</p>\r\n	</li>\r\n	<li>\r\n	<p>Next, take your second-step cleanser and apply it to damp skin. Similar to the oil cleanser, gently massage in circular motions, but avoid the eyes this time.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rinse your skin and pat dry with a towel. Follow up with your skincare routine as normal.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>It&rsquo;s important to know that it&rsquo;ll probably take a few days of double cleansing before you start to notice the difference in your skin, whether you&rsquo;re looking to clarify, brighten, or tighten.</p>\r\n', 1, 0, 5, 0, 'Double Cleansing for Summer', 'Double Cleansing for Summer', '', 46, '2022-08-17 15:42:01', '2022-08-21 12:21:03'),
(45, 0, 'Tiêu đề bài viết', 'Tiêu đề bài viết', 'tieu-de-bai-viet', '2022/09/tieu-de-bai-viet.png', '2022/09/thumb/tieu-de-bai-viet.png', 'uploads/webps/news/2022/09/tieu-de-bai-viet.webp', 'uploads/webps/news/2022/09/thumb/tieu-de-bai-viet.webp', '09', '2022', 'Đây là đoạn mô tả', '<p>Đ&acirc;y l&agrave; nội dung. Ch&egrave;n <a href=\"https://optech.vn/\">link</a></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"nội dung của thẻ alt\" src=\"/uploads/images/Logo%20Optech-01.png\" style=\"height:600px; width:600px\" /></p>\r\n', 1, 0, 6, 1, 'Tiêu đề bài viết', 'Tiêu đề bài viết', '', 0, '2022-09-16 13:11:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category`
--

CREATE TABLE `tbl_news_category` (
  `id` int NOT NULL,
  `newsID` int NOT NULL,
  `cateID` int NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_news_category`
--

INSERT INTO `tbl_news_category` (`id`, `newsID`, `cateID`, `created_at`) VALUES
(14, 18, 222, '2022-08-19 12:10:56'),
(15, 19, 222, '2022-08-19 12:11:00'),
(16, 20, 222, '2022-08-19 12:11:06'),
(17, 21, 222, '2022-08-19 12:11:10'),
(18, 22, 223, '2022-08-19 12:12:04'),
(19, 23, 223, '2022-08-19 12:12:08'),
(20, 24, 223, '2022-08-19 12:12:13'),
(21, 25, 223, '2022-08-19 12:12:17'),
(22, 26, 224, '2022-08-19 12:12:49'),
(23, 27, 224, '2022-08-19 12:12:54'),
(24, 28, 224, '2022-08-19 12:12:59'),
(25, 29, 224, '2022-08-19 12:13:04'),
(26, 30, 225, '2022-08-19 12:14:23'),
(27, 31, 225, '2022-08-19 12:14:30'),
(28, 32, 225, '2022-08-19 12:14:57'),
(29, 33, 225, '2022-08-19 12:15:03'),
(30, 34, 225, '2022-08-19 12:15:07'),
(31, 35, 225, '2022-08-19 12:15:12'),
(32, 36, 225, '2022-08-19 12:15:18'),
(33, 37, 225, '2022-08-19 12:15:23'),
(34, 38, 225, '2022-08-19 12:15:27'),
(35, 39, 225, '2022-08-19 12:15:31'),
(36, 40, 225, '2022-08-19 12:15:36'),
(37, 41, 221, '2022-08-21 12:21:03'),
(38, 41, 222, '2022-08-21 12:21:03'),
(39, 41, 225, '2022-08-21 12:21:03'),
(40, 14, 221, '2022-08-21 12:21:22'),
(41, 14, 225, '2022-08-21 12:21:22'),
(42, 15, 221, '2022-08-21 12:21:27'),
(43, 15, 225, '2022-08-21 12:21:27'),
(44, 16, 221, '2022-08-21 12:21:33'),
(45, 16, 225, '2022-08-21 12:21:33'),
(46, 17, 221, '2022-08-21 12:21:38'),
(47, 17, 225, '2022-08-21 12:21:38'),
(48, 45, 223, '2022-09-16 13:11:15'),
(49, 45, 228, '2022-09-16 13:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_number`
--

CREATE TABLE `tbl_number` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_number`
--

INSERT INTO `tbl_number` (`id`, `name`, `value`, `image`, `thumb`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Năm hoạt động', '05', '2022/02/6208690501616.png', '2022/02/thumb/6208690501616.png', 1, 1, '2022-02-13 09:12:21', '2022-04-25 11:14:58'),
(2, 'Khách hàng hài lòng', '100%', '2022/02/6208695520ec5.png', '2022/02/thumb/6208695520ec5.png', 2, 1, '2022-02-13 09:12:43', '2022-04-25 11:13:59'),
(3, 'Combo thành công', '6500', '2022/02/62086934da321.png', '2022/02/thumb/62086934da321.png', 3, 1, '2022-02-13 09:13:08', '2022-04-25 11:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int NOT NULL,
  `code` varchar(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `status` tinyint NOT NULL,
  `pay_method` tinyint NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `code`, `fullname`, `phone`, `address`, `email`, `note`, `status`, `pay_method`, `created_at`, `updated_at`) VALUES
(1, '674276', 'Le Minh Hieu', '0899068368', 'QUẬN TÂN BÌNH, TP. HCM', 'hieu.optech@gmail.com', 'Test', 1, 2, '2022-09-05 11:09:11', '0000-00-00 00:00:00'),
(2, '434635', 'Le Minh Hieu', '0899068368', '78 đặng văn bid', 'doc.optech@gmail.com', 'dsdsdsd', 0, 1, '2022-09-06 09:40:20', '0000-00-00 00:00:00'),
(3, '396018', 'Trần Văn A', '0934123999', 'Nguyễn Trãi, Bến Nghé, Quận 1,  Hồ Chí Minh', 'doc.optech@gmail.com', 'Lời nhắn', 0, 1, '2022-09-06 10:09:01', '0000-00-00 00:00:00'),
(4, '460211', 'Nguyễn Văn Chuẩn', '0939888140', 'QUẬN TÂN BÌNH, TP. HCM', 'doc.optech@gmail.com', 'Test 2', 0, 2, '2022-09-06 10:30:01', '0000-00-00 00:00:00'),
(5, '414019', 'Nguyễn Xuân Kiên', '0911886263', 'Võ Chí Công, Thạnh Mỹ Lợi, Quận 2,  Hồ Chí Minh', 'doc.optech@gmail.com', 'test 3', 0, 1, '2022-09-06 10:31:40', '0000-00-00 00:00:00'),
(6, '820709', 'Nguyễn Văn Chuẩn', '0939888140', 'QUẬN TÂN BÌNH, TP. HCM', 'chuan164475@gmail.com', 'test 5', 0, 1, '2022-09-06 10:33:36', '0000-00-00 00:00:00'),
(7, '549005', 'Nguyễn Xuân Kiên', '0911886263', 'QUẬN TÂN BÌNH, TP. HCM', 'nguyenkie66666@gmail.com', 'sdsdsds', 0, 1, '2022-09-06 10:36:20', '0000-00-00 00:00:00'),
(8, '498697', 'Nguyễn Văn Chuẩn', '0939888140', 'QUẬN TÂN BÌNH, TP. HCM', 'chuaddd@gmail.com', 'ssdsd', 0, 1, '2022-09-06 10:38:10', '0000-00-00 00:00:00'),
(9, '855233', 'Nguyễn Văn Chuẩn', '0939888140', 'QUẬN TÂN BÌNH, TP. HCM', 'chuasdssf@gmail.com', 'sdssf', 0, 1, '2022-09-06 10:40:25', '0000-00-00 00:00:00'),
(10, '835981', 'Nguyễn Văn Chuẩn', '0939888140', 'QUẬN TÂN BÌNH, TP. HCM', 'chuan1644555555@gmail.com', 'sdsfsfsf', 0, 1, '2022-09-06 10:41:46', '0000-00-00 00:00:00'),
(11, '522604', 'Nguyễn Văn Chuẩn', '0939888140', 'QUẬN TÂN BÌNH, TP. HCM', 'chuan1655555@gmail.com', 'ssfsf', 0, 1, '2022-09-06 10:44:53', '0000-00-00 00:00:00'),
(12, '752477', 'Nguyễn Văn Chuẩn', '0939888140', 'QUẬN TÂN BÌNH, TP. HCM', 'chuan16448888@gmail.com', 'dsdsdsd', 0, 1, '2022-09-06 10:49:59', '0000-00-00 00:00:00'),
(15, '260744', 'Le Minh Hieu', '0899068368', '78 Đặng văn Bi, Bình Thọ , Thủ Đức , Hồ Chí Minh', 'hieu.optech@gmail.com', 'Giao hàng giờ hành chính', 4, 2, '2022-09-16 14:07:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int NOT NULL,
  `orderID` int NOT NULL,
  `productID` int NOT NULL,
  `colorID` int NOT NULL,
  `qty` int NOT NULL,
  `price` double NOT NULL,
  `price_sale` double NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_alias` varchar(255) NOT NULL,
  `product_thumb` varchar(255) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `orderID`, `productID`, `colorID`, `qty`, `price`, `price_sale`, `product_name`, `product_alias`, `product_thumb`, `color_name`, `color_thumb`) VALUES
(1, 1, 50, 0, 1, 500000, 420000, 'Fruit Pigmented Lip & Cheek Tint', 'fruit-pigmented-lip-cheek-tint', '2022/08/thumb/fruit-pigmented-lip-cheek-tint.png', '', ''),
(2, 1, 49, 6, 2, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(3, 1, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(4, 2, 49, 6, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(5, 2, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(6, 3, 49, 6, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(7, 3, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(8, 3, 49, 8, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'TRUFFLE ', '2022/08/thumb/truffle.png'),
(9, 4, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(10, 4, 49, 6, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(11, 5, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(12, 5, 49, 8, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'TRUFFLE ', '2022/08/thumb/truffle.png'),
(13, 5, 49, 6, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(14, 6, 49, 6, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(15, 6, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(16, 6, 49, 8, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'TRUFFLE ', '2022/08/thumb/truffle.png'),
(17, 7, 49, 6, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(18, 7, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(19, 8, 49, 6, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(20, 8, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(21, 9, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(22, 9, 49, 8, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'TRUFFLE ', '2022/08/thumb/truffle.png'),
(23, 10, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(24, 10, 49, 8, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'TRUFFLE ', '2022/08/thumb/truffle.png'),
(25, 11, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(26, 11, 49, 8, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'TRUFFLE ', '2022/08/thumb/truffle.png'),
(27, 12, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(28, 12, 49, 8, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'TRUFFLE ', '2022/08/thumb/truffle.png'),
(35, 15, 49, 6, 2, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'RUM NOUGAT', '2022/08/thumb/rum-nougat.png'),
(36, 15, 49, 7, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'CHERRY CORDIAL', '2022/08/thumb/cherry-cordial.png'),
(37, 15, 49, 8, 1, 350000, 299000, 'Lip Caramel', 'lip-caramel', '2022/08/thumb/lip-caramel.png', 'TRUFFLE ', '2022/08/thumb/truffle.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner`
--

CREATE TABLE `tbl_partner` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_partner`
--

INSERT INTO `tbl_partner` (`id`, `name`, `image`, `thumb`, `sort`, `link`, `publish`, `created_at`, `updated_at`) VALUES
(4, 'Đối tác 1', '2022/04/6268bbda40b99-brand-1.png.png', '2022/04/thumb/6268bbda40b99-brand-1.png.png', 1, '#', 1, '2021-11-26 14:47:01', '2022-04-27 10:43:22'),
(5, 'Đối tác 2', '2022/04/6268bbe8afda7-brand-2.png.png', '2022/04/thumb/6268bbe8afda7-brand-2.png.png', 2, '#', 1, '2021-11-26 14:47:26', '2022-04-27 10:43:36'),
(6, 'Đối tác 3', '2022/04/6268bbf3c4654-brand-3.png.png', '2022/04/thumb/6268bbf3c4654-brand-3.png.png', 3, '#', 1, '2021-12-04 16:02:01', '2022-04-27 10:43:47'),
(8, 'Đối tác 4', '2022/04/6268bbfd61f65-doi-tac-4.png', '2022/04/thumb/6268bbfd61f65-doi-tac-4.png', 4, '', 1, '2022-04-27 10:43:57', '0000-00-00 00:00:00'),
(9, 'Đối tác 5', '2022/04/6268bc053507b-doi-tac-5.png', '2022/04/thumb/6268bc053507b-doi-tac-5.png', 5, '', 1, '2022-04-27 10:44:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `id` int NOT NULL,
  `roleID` int NOT NULL COMMENT 'id trong bảng tbl_role',
  `module_id` int NOT NULL COMMENT 'id trong bảng tbl_module',
  `controller` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `action` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`id`, `roleID`, `module_id`, `controller`, `action`) VALUES
(5, 6, 96, 'quangCao', 'index'),
(6, 6, 82, 'logo', 'index'),
(7, 6, 86, 'permission', 'edit'),
(8, 7, 82, 'logo', 'index'),
(9, 7, 96, 'quangCao', 'index'),
(10, 7, 81, 'menuNews', 'index'),
(11, 7, 86, 'permission', 'edit'),
(12, 3, 96, 'quangCao', 'index'),
(16, 3, 97, 'module', 'index'),
(29, 3, 137, 'logo', 'index'),
(31, 3, 144, 'menu', 'index'),
(37, 3, 166, 'admin', 'index'),
(38, 3, 160, 'role', 'index'),
(39, 3, 83, 'permission', 'index'),
(47, 3, 196, 'menuNews', 'index'),
(48, 3, 203, 'news', 'index'),
(52, 3, 209, 'users', 'index'),
(57, 8, 215, 'career', 'index'),
(75, 8, 193, 'permission', 'index'),
(78, 8, 196, 'menuNews', 'index'),
(79, 8, 117, 'module', 'index'),
(109, 10, 196, 'menuNews', 'index'),
(110, 10, 203, 'news', 'index'),
(134, 10, 281, 'role', 'index'),
(139, 10, 294, 'role', 'setPermission'),
(143, 10, 260, 'quangCao', 'index');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name2` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `text_link` varchar(255) NOT NULL,
  `text_des` varchar(255) NOT NULL,
  `text_des_en` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `webps` varchar(255) NOT NULL,
  `webps_thumb` varchar(255) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `type` varchar(50) NOT NULL,
  `des` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`id`, `name`, `name_en`, `name2`, `link`, `text_link`, `text_des`, `text_des_en`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `sort`, `publish`, `type`, `des`, `created_at`, `updated_at`) VALUES
(1, 'Lan Hương Lip', '', '', '/', 'sadsadsad', 'sadsa', '', '2022/09/Bản sao của Lip.vn (250 × 40 px) (250 × 50 px) (250 × 60 px) (300 × 50 px) (Bài đăng Facebook) (500 × 100 px).png.png', '2022/09/thumb/Bản sao của Lip.vn (250 × 40 px) (250 × 50 px) (250 × 60 px) (300 × 50 px) (Bài đăng Facebook) (500 × 100 px).png.png', 'uploads/webps/logo/2022/09/Bản sao của Lip.webp', 'uploads/webps/logo/2022/09/thumb/Bản sao của Lip.webp', '09', '2022', 0, 1, 'logo', '', '2021-05-11 12:07:08', '2021-05-11 12:07:08'),
(5, 'slide 2', '', '', '#', '', '', '', '2021/07/slide-2.jpg', '2021/07/thumb/slide-2.jpg', 'uploads/webps/slide/2021/07/slide-2.webp', 'uploads/webps/slide/2021/07/thumb/slide-2.webp', '07', '2021', 1, 1, 'quote', '', '2021-07-19 03:09:21', NULL),
(12, 'Lips Makeup', 'Learn To Face Difficulty en', 'Vịt nướng Thảo Mộc', '#', 'Xem thêm', 'I AM A LIP ARTIST', 'Learn To Face Difficulty en', '2022/10/6342dc68d9014-lips-makeup.png', '2022/10/thumb/6342dc68d9014-lips-makeup.png', 'uploads/webps/slide/2022/10/6342dc68d9014-lips-makeup.webp', 'uploads/webps/slide/2022/10/thumb/6342dc68d9014-lips-makeup.webp', '10', '2022', 1, 1, 'slide', '', '2021-11-26 08:23:38', '2022-10-09 21:36:26'),
(15, 'Combo đi sinh', '', '', 'https://sieuthibeyeu.vn/combo-di-sinh', 'Xem ngay', 'Đón bé chào đời', '', '2022/05/62723ab730d0b-dsdsds.jpg', '2022/05/thumb/62723ab730d0b-dsdsds.jpg', 'uploads/webps/ads/2022/05/62723ab730d0b-dsdsds.webp', 'uploads/webps/ads/2022/05/thumb/62723ab730d0b-dsdsds.webp', '05', '2022', 1, 1, 'ads', '', '2022-05-04 15:35:03', '2022-05-28 17:00:28'),
(16, 'Combo quà tặng', '', '', '#', 'Xem ngay ', 'Quà cho bé yêu', '', '2022/05/62723afcba019-for-fancy-toy.jpg', '2022/05/thumb/62723afcba019-for-fancy-toy.jpg', 'uploads/webps/ads/2022/05/62723afcba019-for-fancy-toy.webp', 'uploads/webps/ads/2022/05/thumb/62723afcba019-for-fancy-toy.webp', '05', '2022', 2, 1, 'ads', '', '2022-05-04 15:36:13', '2022-05-28 16:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo_product`
--

CREATE TABLE `tbl_photo_product` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `webps` varchar(255) NOT NULL,
  `webps_thumb` varchar(255) NOT NULL,
  `ProductID` int NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_photo_product`
--

INSERT INTO `tbl_photo_product` (`id`, `image`, `thumb`, `webps`, `webps_thumb`, `ProductID`, `created_at`) VALUES
(95, '2022/08/2022-29-08-16-40-4301CLC_Lip_Caramel_ArmSwatch.png.png', '2022/08/thumb/2022-29-08-16-40-4301CLC_Lip_Caramel_ArmSwatch.png.png', 'uploads/webps/product/detail/2022/08/2022-29-08-16-40-4301CLC_Lip_Caramel_ArmSwatch.webp', 'uploads/webps/product/detail/2022/08/thumb/2022-29-08-16-40-4301CLC_Lip_Caramel_ArmSwatch.webp', 49, '2022-08-29 16:40:44'),
(96, '2022/09/2022-08-09-17-19-2601.png.png', '2022/09/thumb/2022-08-09-17-19-2601.png.png', 'uploads/webps/product/detail/2022/09/2022-08-09-17-19-2601.webp', 'uploads/webps/product/detail/2022/09/thumb/2022-08-09-17-19-2601.webp', 48456, '2022-09-08 17:19:26'),
(97, '2022/09/2022-08-09-17-19-2612.png.png', '2022/09/thumb/2022-08-09-17-19-2612.png.png', 'uploads/webps/product/detail/2022/09/2022-08-09-17-19-2612.webp', 'uploads/webps/product/detail/2022/09/thumb/2022-08-09-17-19-2612.webp', 48456, '2022-09-08 17:19:27'),
(98, '2022/09/2022-08-09-17-19-2623.png.png', '2022/09/thumb/2022-08-09-17-19-2623.png.png', 'uploads/webps/product/detail/2022/09/2022-08-09-17-19-2623.webp', 'uploads/webps/product/detail/2022/09/thumb/2022-08-09-17-19-2623.webp', 48456, '2022-09-08 17:19:28'),
(104, '2022/10/2022-14-10-17-54-070A001 (2).png.png', '2022/10/thumb/2022-14-10-17-54-070A001 (2).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-17-54-070A001 (2).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-17-54-070A001 (2).webp', 75, '2022-10-14 17:54:08'),
(105, '2022/10/2022-14-10-17-54-071A001 (3).png.png', '2022/10/thumb/2022-14-10-17-54-071A001 (3).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-17-54-071A001 (3).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-17-54-071A001 (3).webp', 75, '2022-10-14 17:54:08'),
(106, '2022/10/2022-14-10-17-54-072A001 (4).png.png', '2022/10/thumb/2022-14-10-17-54-072A001 (4).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-17-54-072A001 (4).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-17-54-072A001 (4).webp', 75, '2022-10-14 17:54:09'),
(107, '2022/10/2022-14-10-17-54-073A001.png.png', '2022/10/thumb/2022-14-10-17-54-073A001.png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-17-54-073A001.webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-17-54-073A001.webp', 75, '2022-10-14 17:54:10'),
(108, '2022/10/2022-14-10-19-04-460A001 (2).png.png', '2022/10/thumb/2022-14-10-19-04-460A001 (2).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-04-460A001 (2).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-04-460A001 (2).webp', 76, '2022-10-14 19:04:47'),
(109, '2022/10/2022-14-10-19-04-461A001 (3).png.png', '2022/10/thumb/2022-14-10-19-04-461A001 (3).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-04-461A001 (3).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-04-461A001 (3).webp', 76, '2022-10-14 19:04:47'),
(110, '2022/10/2022-14-10-19-04-462A001 (4).png.png', '2022/10/thumb/2022-14-10-19-04-462A001 (4).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-04-462A001 (4).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-04-462A001 (4).webp', 76, '2022-10-14 19:04:48'),
(111, '2022/10/2022-14-10-19-04-463A001 (5).png.png', '2022/10/thumb/2022-14-10-19-04-463A001 (5).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-04-463A001 (5).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-04-463A001 (5).webp', 76, '2022-10-14 19:04:49'),
(112, '2022/10/2022-14-10-19-04-464A001 (6).png.png', '2022/10/thumb/2022-14-10-19-04-464A001 (6).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-04-464A001 (6).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-04-464A001 (6).webp', 76, '2022-10-14 19:04:49'),
(113, '2022/10/2022-14-10-19-04-465A001 (7).png.png', '2022/10/thumb/2022-14-10-19-04-465A001 (7).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-04-465A001 (7).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-04-465A001 (7).webp', 76, '2022-10-14 19:04:50'),
(114, '2022/10/2022-14-10-19-04-466A001 (8).png.png', '2022/10/thumb/2022-14-10-19-04-466A001 (8).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-04-466A001 (8).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-04-466A001 (8).webp', 76, '2022-10-14 19:04:51'),
(115, '2022/10/2022-14-10-19-04-467A001.png.png', '2022/10/thumb/2022-14-10-19-04-467A001.png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-04-467A001.webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-04-467A001.webp', 76, '2022-10-14 19:04:51'),
(116, '2022/10/2022-14-10-19-10-590A001 (2).png.png', '2022/10/thumb/2022-14-10-19-10-590A001 (2).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-10-590A001 (2).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-10-590A001 (2).webp', 77, '2022-10-14 19:11:00'),
(117, '2022/10/2022-14-10-19-10-591A001 (3).png.png', '2022/10/thumb/2022-14-10-19-10-591A001 (3).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-10-591A001 (3).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-10-591A001 (3).webp', 77, '2022-10-14 19:11:01'),
(118, '2022/10/2022-14-10-19-10-592A001 (4).png.png', '2022/10/thumb/2022-14-10-19-10-592A001 (4).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-10-592A001 (4).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-10-592A001 (4).webp', 77, '2022-10-14 19:11:01'),
(119, '2022/10/2022-14-10-19-10-593A001.png.png', '2022/10/thumb/2022-14-10-19-10-593A001.png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-10-593A001.webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-10-593A001.webp', 77, '2022-10-14 19:11:02'),
(120, '2022/10/2022-14-10-19-10-594A001 (5).png.png', '2022/10/thumb/2022-14-10-19-10-594A001 (5).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-19-10-594A001 (5).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-19-10-594A001 (5).webp', 77, '2022-10-14 19:11:02'),
(121, '2022/10/2022-14-10-22-37-580A001 (2).png.png', '2022/10/thumb/2022-14-10-22-37-580A001 (2).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-22-37-580A001 (2).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-22-37-580A001 (2).webp', 78, '2022-10-14 22:37:58'),
(122, '2022/10/2022-14-10-22-37-581A001 (3).png.png', '2022/10/thumb/2022-14-10-22-37-581A001 (3).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-22-37-581A001 (3).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-22-37-581A001 (3).webp', 78, '2022-10-14 22:37:59'),
(123, '2022/10/2022-14-10-22-37-582A001 (4).png.png', '2022/10/thumb/2022-14-10-22-37-582A001 (4).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-22-37-582A001 (4).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-22-37-582A001 (4).webp', 78, '2022-10-14 22:38:00'),
(124, '2022/10/2022-14-10-22-37-583A001 (5).png.png', '2022/10/thumb/2022-14-10-22-37-583A001 (5).png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-22-37-583A001 (5).webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-22-37-583A001 (5).webp', 78, '2022-10-14 22:38:00'),
(125, '2022/10/2022-14-10-22-37-584A001.png.png', '2022/10/thumb/2022-14-10-22-37-584A001.png.png', 'uploads/webps/product/detail/2022/10/2022-14-10-22-37-584A001.webp', 'uploads/webps/product/detail/2022/10/thumb/2022-14-10-22-37-584A001.webp', 78, '2022-10-14 22:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_procedure`
--

CREATE TABLE `tbl_procedure` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `sort` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_procedure`
--

INSERT INTO `tbl_procedure` (`id`, `name`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Thấu hiểu khách hàng', 1, 1, '2022-02-13 08:24:11', '0000-00-00 00:00:00'),
(2, 'Lập kế hoạch marketing', 1, 2, '2022-02-13 08:24:19', '0000-00-00 00:00:00'),
(3, 'Ký kết hợp đồng', 1, 3, '2022-02-13 08:24:27', '0000-00-00 00:00:00'),
(4, 'Triển khai kế hoạch', 1, 4, '2022-02-13 08:24:35', '0000-00-00 00:00:00'),
(5, 'Báo cáo và đánh giá', 1, 5, '2022-02-13 08:24:48', '2022-02-13 08:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int NOT NULL,
  `cateid` int NOT NULL,
  `brandID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `webps` varchar(255) NOT NULL,
  `webps_thumb` varchar(255) NOT NULL,
  `month` varchar(4) NOT NULL,
  `year` varchar(4) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `price_sale` double NOT NULL,
  `des` text NOT NULL,
  `content` longtext NOT NULL,
  `content2` longtext NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject2` varchar(255) NOT NULL,
  `subject3` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_descriptions` text NOT NULL,
  `hot` int NOT NULL,
  `new` int NOT NULL,
  `home` tinyint(1) NOT NULL,
  `sort` int NOT NULL,
  `properties` longtext NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `orther` varchar(255) NOT NULL DEFAULT '',
  `orther2` varchar(255) NOT NULL DEFAULT '',
  `info_orther` text NOT NULL,
  `orther_img` varchar(255) NOT NULL,
  `orther2_img` varchar(255) NOT NULL,
  `orther_thumb` varchar(255) NOT NULL,
  `orther2_thumb` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `cateid`, `brandID`, `name`, `alias`, `status`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `code`, `price`, `price_sale`, `des`, `content`, `content2`, `subject`, `subject2`, `subject3`, `title`, `meta_keywords`, `meta_descriptions`, `hot`, `new`, `home`, `sort`, `properties`, `publish`, `orther`, `orther2`, `info_orther`, `orther_img`, `orther2_img`, `orther_thumb`, `orther2_thumb`, `created_at`, `updated_at`) VALUES
(43, 214, 0, 'Organic Mint Lip Balm', 'organic-mint-lip-balm-176', 0, '2022/08/organic-mint-lip-balm-176.png', '2022/08/thumb/organic-mint-lip-balm-176.png', 'uploads/webps/product/2022/08/organic-mint-lip-balm-176.webp', 'uploads/webps/product/2022/08/thumb/organic-mint-lip-balm-176.webp', '08', '2022', 'Sp001', 120000, 110000, '<p>Soothing lip balm made with refreshing peppermint and eucalyptus oils. Featuring sunflower and coconut oils to moisturize and soften, plus reparative vitamin E.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" style=\"height:284px; width:640px\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" style=\"height:400px; width:700px\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Organic Mint Lip Balm', 'Organic Mint Lip Balm', 'Organic Mint Lip Balm', 0, 0, 0, 1, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:29:07', '2022-08-13 07:29:46'),
(44, 214, 0, 'Cherry Lip Balm', 'cherry-lip-balm', 0, '2022/08/cherry-lip-balm.png', '2022/08/thumb/cherry-lip-balm.png', 'uploads/webps/product/2022/08/cherry-lip-balm.webp', 'uploads/webps/product/2022/08/thumb/cherry-lip-balm.webp', '08', '2022', 'SP0002', 120000, 110000, '<p>Luxuriously lip softening cherry lip balm made with moisturizing organic sunflower and coconut oils, reparative vitamin E, and calming calendula.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Cherry Lip Balm', 'Cherry Lip Balm', 'Cherry Lip Balm', 0, 0, 0, 2, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:31:29', '0000-00-00 00:00:00'),
(45, 216, 0, 'Fruit Pigmented Lip Glaze', 'fruit-pigmented-lip-glaze', 0, '2022/08/fruit-pigmented-lip-glaze.png', '2022/08/thumb/fruit-pigmented-lip-glaze.png', 'uploads/webps/product/2022/08/fruit-pigmented-lip-glaze.webp', 'uploads/webps/product/2022/08/thumb/fruit-pigmented-lip-glaze.webp', '08', '2022', '', 150000, 129000, '<p>Our moisturizing Lip Glaze collection is made with real fruit pigments, plus avocado and cocoa butters to give lips a light, nourishing wash of natural color.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Fruit Pigmented Lip Glaze', 'Fruit Pigmented Lip Glaze', 'Fruit Pigmented Lip Glaze', 0, 0, 0, 3, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:33:02', '2022-08-15 10:16:11'),
(46, 216, 0, 'Fruit Pigmented Pomegranate Oil Anti-Aging Lipstick', 'fruit-pigmented-pomegranate-oil-antiaging-lipstick', 0, '2022/08/fruit-pigmented-pomegranate-oil-antiaging-lipstick.jpg', '2022/08/thumb/fruit-pigmented-pomegranate-oil-antiaging-lipstick.jpg', 'uploads/webps/product/2022/08/fruit-pigmented-pomegranate-oil-antiaging-lipstick.webp', 'uploads/webps/product/2022/08/thumb/fruit-pigmented-pomegranate-oil-antiaging-lipstick.webp', '08', '2022', '', 200000, 159000, '<p>Anti-aging, super moisturizing lipstick made with pomegranate oil and shea butter to keep lips soft and supple. Colored with antioxidant-rich fruit pigments.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Fruit Pigmented Pomegranate Oil Anti-Aging Lipstick', 'Fruit Pigmented Pomegranate Oil Anti-Aging Lipstick', 'Fruit Pigmented Pomegranate Oil Anti-Aging Lipstick', 0, 0, 0, 4, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:34:34', '0000-00-00 00:00:00'),
(47, 226, 0, 'Fruit Pigmented Lip Gloss', 'fruit-pigmented-lip-gloss', 0, '2022/08/fruit-pigmented-lip-gloss.png', '2022/08/thumb/fruit-pigmented-lip-gloss.png', 'uploads/webps/product/2022/08/fruit-pigmented-lip-gloss.webp', 'uploads/webps/product/2022/08/thumb/fruit-pigmented-lip-gloss.webp', '09', '2022', '', 300000, 199000, '<p>Ultra shiny lip gloss made with restorative vitamin E and real fruit pigments. Softens and moisturizes lips while delivering silky smooth, semi-sheer coverage.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Fruit Pigmented Lip Gloss', 'Fruit Pigmented Lip Gloss', 'Fruit Pigmented Lip Gloss', 0, 0, 0, 5, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:35:17', '2022-09-06 06:36:07'),
(48, 216, 0, 'Lysine + Herbs Lip Balm', 'lysine-herbs-lip-balm', 0, '2022/08/lysine-herbs-lip-balm.jpg', '2022/08/thumb/lysine-herbs-lip-balm.jpg', 'uploads/webps/product/2022/08/lysine-herbs-lip-balm.webp', 'uploads/webps/product/2022/08/thumb/lysine-herbs-lip-balm.webp', '08', '2022', '', 250000, 220000, '<p>Lip treatment made with hydrating coconut and soothing lysine: an amino acid that alleviates burning, itching, and irritation associated with cold sores.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Lysine + Herbs Lip Balm', 'Lysine + Herbs Lip Balm', 'Lysine + Herbs Lip Balm', 0, 0, 0, 6, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:38:54', '0000-00-00 00:00:00'),
(49, 216, 0, 'Lip Caramel', 'lip-caramel', 0, '2022/08/lip-caramel.png', '2022/08/thumb/lip-caramel.png', 'uploads/webps/product/2022/08/lip-caramel.webp', 'uploads/webps/product/2022/08/thumb/lip-caramel.webp', '09', '2022', '', 350000, 299000, '<p>Luscious, silky smooth liquid lipsticks with intense color from fruit and achiote seeds, in a base of lip softening pomegranate oil and cocoa butter.</p>\r\n', '<p>Lightweight, stabilized vitamin C serum made in a base of hydrating and soothing aloe gel. This vegan and natural Vitamin C serum also helps to firm and brighten skin tone, while promoting collagen production. Includes radiance-boosting green apple and grape, plus alpha lipoic acid (ALA) for fighting oxidative damage that can prematurely age or darken the skin.</p>\r\n', '<p style=\"text-align:center\">Directions</p>\r\n\r\n<p style=\"text-align:center\">Apply a dime sized amount after cleansing and before moisturizing. Gently press into damp skin of face and neck. Most effective when used in PM. Always layer under an all natural SPF when applying during the day.</p>\r\n\r\n<p style=\"text-align:center\">Size</p>\r\n\r\n<p style=\"text-align:center\">1 fl oz / 30 ml</p>\r\n\r\n<p style=\"text-align:center\">Source</p>\r\n\r\n<p style=\"text-align:center\">Made in USA</p>\r\n', 'For All Skin Types', 'Sheer Coverage', 'Gloss Finish', 'Lip Caramel', 'Lip Caramel', 'Lip Caramel', 0, 0, 0, 7, 'null', 1, ' COVERAGE', ' FINISH', '[\"1\",\"2\",\"3\",\"4\"]', '2022/09/lip-caramel_1.png', '2022/09/lip-caramel_2.png', '2022/09/thumb/lip-caramel_1.png', '2022/09/thumb/lip-caramel_2.png', '2022-08-13 07:39:55', '2022-09-16 13:35:19'),
(50, 216, 0, 'Fruit Pigmented Lip & Cheek Tint', 'fruit-pigmented-lip-cheek-tint', 0, '2022/08/fruit-pigmented-lip-cheek-tint.png', '2022/08/thumb/fruit-pigmented-lip-cheek-tint.png', 'uploads/webps/product/2022/08/fruit-pigmented-lip-cheek-tint.webp', 'uploads/webps/product/2022/08/thumb/fruit-pigmented-lip-cheek-tint.webp', '08', '2022', '', 500000, 420000, '<p>Designed for double duty as both a cream blush and lip tint. Made with vibrant fruit pigments, plus shea and cocoa butters for intense skin and lip-softening.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Fruit Pigmented Lip & Cheek Tint', 'Fruit Pigmented Lip & Cheek Tint', 'Fruit Pigmented Lip & Cheek Tint', 0, 0, 0, 8, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:40:38', '2022-08-14 16:31:56');
INSERT INTO `tbl_product` (`id`, `cateid`, `brandID`, `name`, `alias`, `status`, `image`, `thumb`, `webps`, `webps_thumb`, `month`, `year`, `code`, `price`, `price_sale`, `des`, `content`, `content2`, `subject`, `subject2`, `subject3`, `title`, `meta_keywords`, `meta_descriptions`, `hot`, `new`, `home`, `sort`, `properties`, `publish`, `orther`, `orther2`, `info_orther`, `orther_img`, `orther2_img`, `orther_thumb`, `orther2_thumb`, `created_at`, `updated_at`) VALUES
(51, 216, 0, 'Fruit Pigmented Cherry Lip & Cheek Stain', 'fruit-pigmented-cherry-lip-cheek-stain', 0, '2022/08/fruit-pigmented-cherry-lip-cheek-stain.png', '2022/08/thumb/fruit-pigmented-cherry-lip-cheek-stain.png', 'uploads/webps/product/2022/08/fruit-pigmented-cherry-lip-cheek-stain.webp', 'uploads/webps/product/2022/08/thumb/fruit-pigmented-cherry-lip-cheek-stain.webp', '08', '2022', '', 399000, 0, '<p>Multitasking semi-sheer stain gives a beautiful flush to lips and cheeks with long lasting, buildable pigments from beet, blueberry, and pomegranate.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Fruit Pigmented Cherry Lip & Cheek Stain', 'Fruit Pigmented Cherry Lip & Cheek Stain', 'Fruit Pigmented Cherry Lip & Cheek Stain', 0, 0, 0, 9, 'null', 0, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:41:28', '2022-08-13 09:33:25'),
(52, 220, 0, 'Vitamin C Serum', 'vitamin-c-serum', 0, '2022/08/vitamin-c-serum.png', '2022/08/thumb/vitamin-c-serum.png', 'uploads/webps/product/2022/08/vitamin-c-serum.webp', 'uploads/webps/product/2022/08/thumb/vitamin-c-serum.webp', '10', '2022', '', 300000, 199000, '<p>Lightweight, stabilized vitamin C serum helps firm and brighten skin tone while promoting collagen production, and deeply hydrating skin with soothing aloe.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Vitamin C Serum', 'Vitamin C Serum', 'Vitamin C Serum', 0, 0, 0, 10, 'null', 1, ' ', ' ', 'null', '0', '0', '', '', '2022-08-13 07:46:42', '2022-10-14 18:04:15'),
(53, 220, 0, 'Multi-Vitamin + Antioxidants Potent PM Serum', 'multivitamin---antioxidants-potent-pm-serum', 0, '2022/08/multivitamin---antioxidants-potent-pm-serum.png', '2022/08/thumb/multivitamin---antioxidants-potent-pm-serum.png', 'uploads/webps/product/2022/08/multivitamin---antioxidants-potent-pm-serum.webp', 'uploads/webps/product/2022/08/thumb/multivitamin---antioxidants-potent-pm-serum.webp', '08', '2022', '', 299000, 0, '<p>Potent, stabilized vitamins in this PM serum work synergistically to reduce lines and wrinkles, increase firmness and elasticity, brighten and even skin tone.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Multi-Vitamin + Antioxidants Potent PM Serum', 'Multi-Vitamin + Antioxidants Potent PM Serum', 'Multi-Vitamin + Antioxidants Potent PM Serum', 0, 0, 0, 11, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:47:20', '0000-00-00 00:00:00'),
(54, 220, 0, 'Dark Spot Remover', 'dark-spot-remover', 0, '2022/08/dark-spot-remover.png', '2022/08/thumb/dark-spot-remover.png', 'uploads/webps/product/2022/08/dark-spot-remover.webp', 'uploads/webps/product/2022/08/thumb/dark-spot-remover.webp', '08', '2022', '', 350000, 0, '<p>An all natural dark spot remover serum that visibly reduces hyperpigmentation, scars, and dark spots.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Dark Spot Remover', 'Dark Spot Remover', 'Dark Spot Remover', 0, 0, 0, 12, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:48:07', '0000-00-00 00:00:00'),
(55, 220, 0, 'Green Tea SPF 30', 'green-tea-spf-30', 0, '2022/08/green-tea-spf-30.png', '2022/08/thumb/green-tea-spf-30.png', 'uploads/webps/product/2022/08/green-tea-spf-30.webp', 'uploads/webps/product/2022/08/thumb/green-tea-spf-30.webp', '08', '2022', '', 278000, 0, '<p>Moisturizing sunscreen lotion defends against harmful UV rays with SPF 30 protection, while nourishing and rehydrating thirsty skin with green tea and aloe.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Green Tea SPF 30', 'Green Tea SPF 30', 'Green Tea SPF 30', 0, 0, 0, 13, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:48:46', '0000-00-00 00:00:00'),
(56, 220, 0, 'Charcoal Clay Cleanser', 'charcoal-clay-cleanser', 0, '2022/08/charcoal-clay-cleanser.png', '2022/08/thumb/charcoal-clay-cleanser.png', 'uploads/webps/product/2022/08/charcoal-clay-cleanser.webp', 'uploads/webps/product/2022/08/thumb/charcoal-clay-cleanser.webp', '08', '2022', '', 240000, 0, '<p>Deeply purifying facial cleanser minimizes oil and refreshes skin with detoxifying bamboo charcoal, pore minimizing activated charcoal, and skin purging clay.</p>\r\n', '<p>Mua 1 thỏi son rất dễ, nhưng chọn được 1 thỏi son m&ocirc;i<strong>&nbsp;AN TO&Agrave;N v&agrave; HỮU DỤNG</strong>&nbsp;th&igrave; rất kh&oacute;. Bởi thị trường son m&ocirc;i v&ocirc; v&agrave;n m&agrave;u sắc nhưng cũng bạt ng&agrave;n sản phẩm k&eacute;m chất lượng ảnh hưởng đến sức khỏe người d&ugrave;ng. Chưa kể đến những thỏi son m&ocirc;i đẹp nhưng kh&ocirc;ng HỮU DỤNG như: nhanh tr&ocirc;i, lem son, lỳ qu&aacute; g&acirc;y kh&ocirc; m&ocirc;i hay b&oacute;ng qu&aacute; lại kh&ocirc;ng đẹp.</p>\r\n\r\n<p><strong>Dưới g&oacute;c độ một dược sĩ chuy&ecirc;n ng&agrave;nh, chia sẻ 4 ti&ecirc;u ch&iacute; chọn son m&ocirc;i tốt:</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Th&agrave;nh phần dưỡng ẩm</em></strong>: kh&ocirc;ng n&ecirc;n d&ugrave;ng son chứa c&aacute;c chất từ dầu mỏ như Vaseline, Petrolatum (g&acirc;y cảm gi&aacute;c b&iacute; m&ocirc;i, nặng m&ocirc;i) m&agrave; n&ecirc;n lựa chọn th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n, l&agrave;nh t&iacute;nh như c&aacute;c loại dầu, s&aacute;p thực vật: s&aacute;p ong, dầu hạnh nh&acirc;n, bơ hạt mỡ...</li>\r\n	<li><strong><em>Kim loại:</em></strong>&nbsp;Ch&igrave; v&agrave; c&aacute;c Kim loại nặng kh&aacute;c như Thuỷ ng&acirc;n, Asen... l&agrave; mối nguy hiểm cho sức khỏe n&ecirc;n tuyệt đối kh&ocirc;ng d&ugrave;ng những chế phẩm chưa được kiểm nghiệm hoặc c&oacute; chứa d&ugrave; l&agrave; tỷ lệ nhỏ c&aacute;c chất n&agrave;y.</li>\r\n	<li><strong><em>KH&Ocirc;NG</em></strong><em>&nbsp;</em>chứa chất bảo quản, hương liệu ho&aacute; học v&agrave; m&agrave;u tổng hợp kh&ocirc;ng an to&agrave;n.</li>\r\n	<li>Đặc biệt, một c&acirc;y son tốt c&ograve;n cần chứa độ dưỡng ẩm cũng như khả năng b&aacute;m m&agrave;u hợp l&yacute; để đ&ocirc;i m&ocirc;i lu&ocirc;n mềm mại tươi tắn, kh&ocirc;ng b&oacute;ng m&agrave; cũng kh&ocirc;ng kh&ocirc;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/615dc377bc406afb911f18b3(1).jpg\" /></p>\r\n\r\n<p><strong>Ở đ&acirc;y c&oacute; những thỏi son đạt 4 ti&ecirc;u ch&iacute; tr&ecirc;n gi&uacute;p ch&uacute;ng ta lu&ocirc;n xinh đẹp v&agrave; an t&acirc;m nh&eacute;!</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa sử dụng c&aacute;c loại dầu dưỡng v&agrave; s&aacute;p ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n như dầu hạnh nh&acirc;n, dầu quả bơ, dầu c&aacute;m gạo, s&aacute;p đậu n&agrave;nh, bơ hạt mỡ... mềm mại v&agrave; l&agrave;nh t&iacute;nh với đ&ocirc;i m&ocirc;i</li>\r\n	<li>Son Lụa KH&Ocirc;NG CH&Igrave; kiểm nghiệm tại Viện Kiểm nghiệm Thuốc Trung Ương</li>\r\n	<li>Th&agrave;nh phần thi&ecirc;n nhi&ecirc;n, m&agrave;u kho&aacute;ng đạt ti&ecirc;u chuẩn FDA Mỹ, mềm mịn, l&acirc;u tr&ocirc;i.&nbsp;Kh&ocirc;ng chất bảo quản. Kh&ocirc;ng hương liệu. Sản xuất trong ph&ograve;ng th&iacute; nghiệm n&ecirc;n an to&agrave;n cho mẹ bầu, m&ocirc;i nhạy cảm.</li>\r\n	<li>Kh&ocirc;ng d&agrave;y như son lỳ, kh&ocirc;ng b&oacute;ng như son b&oacute;ng, kh&ocirc;ng lỏng như son nước, kh&ocirc;ng sệt như son kem, 3 từ để mi&ecirc;u tả cảm gi&aacute;c khi d&ugrave;ng Son Lụa ch&iacute;nh l&agrave;: mỏng, mềm, mịn.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/637692729981717879-cach-danh-son-long-moi-dep.jpg\" /></p>\r\n\r\n<p>Đặc biệt, bảng m&agrave;u Son Lụa c&oacute; 8 m&agrave;u từ dịu d&agrave;ng đến rực rỡ, dễ lựa chọn v&agrave; sử dụng trong nhiều dịp</p>\r\n\r\n<p><strong>Bảng m&agrave;u (Lựa chọn theo tone da):</strong></p>\r\n\r\n<ul>\r\n	<li>01 - M&agrave;u Đỏ rượu vang (Lụa đỏ), hợp da s&aacute;ng</li>\r\n	<li>02 - M&agrave;u Hồng sữa (Tường Vy), hợp da s&aacute;ng</li>\r\n	<li>03 - M&agrave;u Cam tươi (Lụa cam), hợp da s&aacute;ng</li>\r\n	<li>04 - M&agrave;u Hồng cam (Lụa đ&agrave;o), hợp mọi tone da</li>\r\n	<li>05 - M&agrave;u Cam sữa (Lay ơn), hợp da s&aacute;ng</li>\r\n	<li>06 - M&agrave;u Đỏ cam (Lộc vừng), hợp mọi tone da</li>\r\n	<li>07 - M&agrave;u Hồng đỏ (Mộc lan), hợp mọi tone da</li>\r\n	<li>08 - M&agrave;u Hồng c&aacute;nh sen (Lụa sen), hợp da s&aacute;ng</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981717879-red-lipstick-1574793828.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong>&nbsp;dầu Hạnh nh&acirc;n (Prunus dulcis oil), dầu Quả bơ (Persea gratissima oil), dầu C&aacute;m gạo (Oryza sativa bran oil), dầu Thầu dầu (Ricinus communis oil), s&aacute;p Đậu n&agrave;nh (Hydrogenated soybean oil), s&aacute;p Carnauba (Copernicia cerifera wax), bơ Hạt mỡ (Butyrospermum parkii butter), s&aacute;p Ong (Bees wax), s&aacute;p Candelilla (Euphorbia cerifera (candelilla) wax), M&agrave;u kho&aacute;ng thi&ecirc;n nhi&ecirc;n,&nbsp;Vitamin E (Tocopherol), tinh dầu Cam ngọt (Citrus sinensis essential oil).</p>\r\n\r\n<p><strong>Th&iacute;ch hợp:</strong>&nbsp;cho mọi phụ nữ sử dụng, đặc biệt an to&agrave;n cho cả b&agrave; bầu v&agrave; những đ&ocirc;i m&ocirc;i nhạy cảm</p>\r\n\r\n<p><img alt=\"\" src=\"https://lanhuonglip.vn/Uploads/816/images/637692729981874130-son-3ce-mau-212-Moon.jpg\" /></p>\r\n\r\n<p><strong>Lưu &yacute; khi sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Son Lụa chứa th&agrave;nh phần 100% thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng c&oacute; chất bảo quản, chất ổn định, v&igrave; thế sau khi mở son n&ecirc;n d&ugrave;ng li&ecirc;n tục cho tới hết hoặc tới hạn sử dụng</li>\r\n	<li>Để son bền m&agrave;u hơn, bạn n&ecirc;n thoa trước 1 lớp rồi d&ugrave;ng giấy ăn bặm m&ocirc;i, sau đ&oacute; thoa th&ecirc;m 1 lớp nữa th&igrave; son sẽ giữ m&agrave;u tốt hơn</li>\r\n	<li>Tr&aacute;nh vặn son qu&aacute; cao&nbsp;v&igrave; son của Cỏ kh&ocirc;ng c&oacute; chất l&agrave;m cứng, n&ecirc;n nếu vặn qu&aacute; cao c&oacute; thể l&agrave;m g&atilde;y son</li>\r\n</ul>\r\n', '', '', '', '', 'Charcoal Clay Cleanser', 'Charcoal Clay Cleanser', 'Charcoal Clay Cleanser', 0, 0, 0, 14, 'null', 1, ' ', ' ', '', '0', '0', '', '', '2022-08-13 07:50:19', '0000-00-00 00:00:00'),
(63, 214, 0, 'SHU UEMURA', 'shu-uemura', 0, '2022/09/shu-uemura.jpg', '2022/09/thumb/shu-uemura.jpg', 'uploads/webps/product/2022/09/shu-uemura.webp', 'uploads/webps/product/2022/09/thumb/shu-uemura.webp', '09', '2022', '', 350000, 0, '', '', '', '', '', '', 'SHU UEMURA', 'SHU UEMURA', 'SHU UEMURA', 0, 0, 0, 15, 'null', 1, '', '', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '', '', '', '', '2022-09-09 09:05:30', '0000-00-00 00:00:00'),
(64, 214, 0, '3CE', '3ce', 0, '2022/09/3ce.jpg', '2022/09/thumb/3ce.jpg', 'uploads/webps/product/2022/09/3ce.webp', 'uploads/webps/product/2022/09/thumb/3ce.webp', '09', '2022', '', 240000, 0, '', '', '', '', '', '', '3CE', '3CE', '3CE', 0, 0, 0, 16, 'null', 1, '', '', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '', '', '', '', '2022-09-09 09:07:12', '2022-09-09 09:07:39'),
(65, 214, 0, 'Son môi 3CE', 'son-moi-3ce', 0, '2022/09/son-moi-3ce.jpg', '2022/09/thumb/son-moi-3ce.jpg', 'uploads/webps/product/2022/09/son-moi-3ce.webp', 'uploads/webps/product/2022/09/thumb/son-moi-3ce.webp', '09', '2022', '', 340000, 299000, '', '', '', '', '', '', 'Son môi 3CE', 'Son môi 3CE', 'Son môi 3CE', 0, 0, 0, 17, 'null', 1, '', '', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '', '', '', '', '2022-09-09 09:09:04', '0000-00-00 00:00:00'),
(66, 216, 0, 'Son Lót Dưỡng Đầy Môi LEMONADE 4.5g', 'son-lot-duong-day-moi-lemonade-45g', 0, '2022/09/son-lot-duong-day-moi-lemonade-45g.jpg', '2022/09/thumb/son-lot-duong-day-moi-lemonade-45g.jpg', 'uploads/webps/product/2022/09/son-lot-duong-day-moi-lemonade-45g.webp', 'uploads/webps/product/2022/09/thumb/son-lot-duong-day-moi-lemonade-45g.webp', '09', '2022', '', 370000, 0, '', '', '', '', '', '', 'Son Lót Dưỡng Đầy Môi LEMONADE 4.5g', 'Son Lót Dưỡng Đầy Môi LEMONADE 4.5g', 'Son Lót Dưỡng Đầy Môi LEMONADE 4.5g', 0, 0, 0, 18, 'null', 1, '', '', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '', '', '', '', '2022-09-09 09:16:41', '2022-09-09 09:16:51'),
(67, 216, 0, 'SILKYGIRL', 'silkygirl', 0, '2022/09/silkygirl.jpg', '2022/09/thumb/silkygirl.jpg', 'uploads/webps/product/2022/09/silkygirl.webp', 'uploads/webps/product/2022/09/thumb/silkygirl.webp', '09', '2022', '', 499000, 0, '', '', '', '', '', '', 'SILKYGIRL', 'SILKYGIRL', 'SILKYGIRL', 0, 0, 0, 19, 'null', 1, '', '', '[\"1\",\"2\"]', '', '', '', '', '2022-09-09 09:17:49', '0000-00-00 00:00:00'),
(68, 216, 0, 'LANEIGE', 'laneige', 0, '2022/09/laneige.jpg', '2022/09/thumb/laneige.jpg', 'uploads/webps/product/2022/09/laneige.webp', 'uploads/webps/product/2022/09/thumb/laneige.webp', '09', '2022', '', 278000, 199000, '', '', '', '', '', '', 'LANEIGE', 'LANEIGE', 'LANEIGE', 0, 0, 0, 20, 'null', 1, '', '', '[\"1\",\"2\",\"4\"]', '', '', '', '', '2022-09-09 09:18:36', '0000-00-00 00:00:00'),
(69, 216, 0, 'Son Dưỡng B.O.M Màu Đỏ Tự Nhiên ', 'son-duong-bom-mau-do-tu-nhien', 0, '2022/09/son-duong-bom-mau-do-tu-nhien.jpg', '2022/09/thumb/son-duong-bom-mau-do-tu-nhien.jpg', 'uploads/webps/product/2022/09/son-duong-bom-mau-do-tu-nhien.webp', 'uploads/webps/product/2022/09/thumb/son-duong-bom-mau-do-tu-nhien.webp', '09', '2022', '', 450000, 0, '', '', '', '', '', '', 'Son Dưỡng B.O.M Màu Đỏ Tự Nhiên ', 'Son Dưỡng B.O.M Màu Đỏ Tự Nhiên ', 'Son Dưỡng B.O.M Màu Đỏ Tự Nhiên ', 0, 0, 0, 21, 'null', 1, '', '', '[\"1\",\"2\",\"3\"]', '', '', '', '', '2022-09-09 09:19:39', '0000-00-00 00:00:00'),
(70, 216, 0, 'Son Dưỡng Môi Có Màu BareSoul 10g', 'son-duong-moi-co-mau-baresoul-10g', 0, '2022/09/son-duong-moi-co-mau-baresoul-10g.jpg', '2022/09/thumb/son-duong-moi-co-mau-baresoul-10g.jpg', 'uploads/webps/product/2022/09/son-duong-moi-co-mau-baresoul-10g.webp', 'uploads/webps/product/2022/09/thumb/son-duong-moi-co-mau-baresoul-10g.webp', '09', '2022', '', 199000, 0, '', '', '', '', '', '', 'Son Dưỡng Môi Có Màu BareSoul 10g', 'Son Dưỡng Môi Có Màu BareSoul 10g', 'Son Dưỡng Môi Có Màu BareSoul 10g', 0, 0, 0, 22, 'null', 1, '', '', '[\"1\",\"2\",\"3\"]', '', '', '', '', '2022-09-09 09:20:33', '0000-00-00 00:00:00'),
(71, 216, 0, 'Son Dưỡng Môi Không Màu BareSoul 10g', 'son-duong-moi-khong-mau-baresoul-10g', 0, '2022/09/son-duong-moi-khong-mau-baresoul-10g.jpg', '2022/09/thumb/son-duong-moi-khong-mau-baresoul-10g.jpg', 'uploads/webps/product/2022/09/son-duong-moi-khong-mau-baresoul-10g.webp', 'uploads/webps/product/2022/09/thumb/son-duong-moi-khong-mau-baresoul-10g.webp', '09', '2022', '', 168000, 0, '', '', '', '', '', '', 'Son Dưỡng Môi Không Màu BareSoul 10g', 'Son Dưỡng Môi Không Màu BareSoul 10g', 'Son Dưỡng Môi Không Màu BareSoul 10g', 0, 0, 0, 23, 'null', 1, '', '', '[\"1\",\"2\",\"3\"]', '', '', '', '', '2022-09-09 09:21:18', '0000-00-00 00:00:00'),
(72, 232, 0, 'Vỏ Son Dưỡng 010', 'vo-son-duong-010', 0, '2022/10/vo-son-duong-010.png', '2022/10/thumb/vo-son-duong-010.png', 'uploads/webps/product/2022/10/vo-son-duong-010.webp', 'uploads/webps/product/2022/10/thumb/vo-son-duong-010.webp', '10', '2022', 'VSD001', 0, 0, '', '', '', '', '', '', 'Vỏ Son Dưỡng 010', 'Vỏ Son Dưỡng 010', 'Vỏ Son Dưỡng 010', 0, 0, 0, 24, 'null', 1, '', '', 'null', '2022/10/vo-son-duong-010_1.png', '2022/10/vo-son-duong-010_2.png', '2022/10/thumb/vo-son-duong-010_1.png', '2022/10/thumb/vo-son-duong-010_2.png', '2022-10-14 13:49:10', '2022-10-14 13:50:38'),
(75, 232, 0, 'Vỏ Son Kem hình Bowling S001', 'vo-son-kem-hinh-bowling-s001', 0, '2022/10/vo-son-kem-hinh-bowling-s001.png', '2022/10/thumb/vo-son-kem-hinh-bowling-s001.png', 'uploads/webps/product/2022/10/vo-son-kem-hinh-bowling-s001.webp', 'uploads/webps/product/2022/10/thumb/vo-son-kem-hinh-bowling-s001.webp', '10', '2022', 'S001', 0, 0, '', '', '', '', '', '', 'Vỏ Son Kem hình Bowling S001', 'Vỏ Son Kem hình Bowling S001', 'Vỏ Son Kem hình Bowling S001', 0, 0, 0, 27, 'null', 1, '', '', 'null', '2022/10/vo-son-kem-hinh-bowling-s001_1.png', '2022/10/vo-son-kem-hinh-bowling-s001_2.png', '2022/10/thumb/vo-son-kem-hinh-bowling-s001_1.png', '2022/10/thumb/vo-son-kem-hinh-bowling-s001_2.png', '2022-10-14 17:54:07', '2022-10-14 18:20:52'),
(76, 237, 0, 'Bộ sản phẩm thuỷ tinh trong suốt B1', 'bo-san-pham-thuy-tinh-trong-suot-b1', 0, '2022/10/bo-san-pham-thuy-tinh-trong-suot-b1.png', '2022/10/thumb/bo-san-pham-thuy-tinh-trong-suot-b1.png', 'uploads/webps/product/2022/10/bo-san-pham-thuy-tinh-trong-suot-b1.webp', 'uploads/webps/product/2022/10/thumb/bo-san-pham-thuy-tinh-trong-suot-b1.webp', '10', '2022', '', 0, 0, '<p>B&aacute;o gi&aacute; theo số lượng đặt h&agrave;ng</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', '', '', 'Bộ sản phẩm thuỷ tinh trong suốt', 'Bộ sản phẩm thuỷ tinh trong suốt', 'Bộ sản phẩm thuỷ tinh trong suốt B1', 0, 0, 0, 28, 'null', 1, '', '', 'null', '2022/10/bo-san-pham-thuy-tinh-trong-suot-b1_1.png', '2022/10/bo-san-pham-thuy-tinh-trong-suot-b1_2.png', '2022/10/thumb/bo-san-pham-thuy-tinh-trong-suot-b1_1.png', '2022/10/thumb/bo-san-pham-thuy-tinh-trong-suot-b1_2.png', '2022-10-14 19:04:46', '0000-00-00 00:00:00'),
(77, 237, 0, 'ộ sản phẩm thuỷ tinh Cao Cấp B2', 'o-san-pham-thuy-tinh-cao-cap-b2', 0, '2022/10/o-san-pham-thuy-tinh-cao-cap-b2.png', '2022/10/thumb/o-san-pham-thuy-tinh-cao-cap-b2.png', 'uploads/webps/product/2022/10/o-san-pham-thuy-tinh-cao-cap-b2.webp', 'uploads/webps/product/2022/10/thumb/o-san-pham-thuy-tinh-cao-cap-b2.webp', '10', '2022', 'B2', 0, 0, '', '', '', '', '', '', 'ộ sản phẩm thuỷ tinh Cao Cấp B2', 'ộ sản phẩm thuỷ tinh Cao Cấp B2', 'ộ sản phẩm thuỷ tinh Cao Cấp B2', 0, 0, 0, 29, 'null', 1, '', '', 'null', '', '', '', '', '2022-10-14 19:10:59', '0000-00-00 00:00:00'),
(78, 238, 0, 'Chai Serum 30ml', 'chai-serum-30ml', 0, '2022/10/chai-serum-30ml.png', '2022/10/thumb/chai-serum-30ml.png', 'uploads/webps/product/2022/10/chai-serum-30ml.webp', 'uploads/webps/product/2022/10/thumb/chai-serum-30ml.webp', '10', '2022', '', 0, 0, '', '', '', '', '', '', 'Chai Serum 30ml', 'Chai Serum 30ml', 'Chai Serum 30ml', 0, 0, 0, 30, 'null', 1, '', '', 'null', '', '', '', '', '2022-10-14 22:37:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_color`
--

CREATE TABLE `tbl_product_color` (
  `id` int NOT NULL,
  `productID` int NOT NULL,
  `color_code` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `des` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image_1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `thumb_1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image_2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `thumb_2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image_3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `thumb_3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `publish` int NOT NULL,
  `sort` int NOT NULL,
  `month` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `year` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_product_color`
--

INSERT INTO `tbl_product_color` (`id`, `productID`, `color_code`, `name`, `des`, `image`, `thumb`, `image_1`, `thumb_1`, `image_2`, `thumb_2`, `image_3`, `thumb_3`, `publish`, `sort`, `month`, `year`, `created_at`, `updated_at`) VALUES
(6, 49, '#DA7F7F', 'RUM NOUGAT', 'A nude, dusty rose with peach undertones.', '2022/08/rum-nougat.png', '2022/08/thumb/rum-nougat.png', '2022/08/rum-nougat_1.png', '2022/08/thumb/rum-nougat_1.png', '2022/08/rum-nougat_2.png', '2022/08/thumb/rum-nougat_2.png', '2022/08/rum-nougat_3.png', '2022/08/thumb/rum-nougat_3.png', 1, 1, '08', '2022', '2022-08-29 16:11:22', '0000-00-00 00:00:00'),
(7, 49, '#B61F3F', 'CHERRY CORDIAL', 'A bright, berry red.', '2022/08/cherry-cordial.png', '2022/08/thumb/cherry-cordial.png', '2022/08/cherry-cordial_1.png', '2022/08/thumb/cherry-cordial_1.png', '2022/08/cherry-cordial_2.png', '2022/08/thumb/cherry-cordial_2.png', '2022/08/cherry-cordial_3.png', '2022/08/thumb/cherry-cordial_3.png', 1, 2, '08', '2022', '2022-08-29 16:14:22', '0000-00-00 00:00:00'),
(8, 49, '#8B494B', 'TRUFFLE ', 'A deep, mauvey brown.', '2022/08/truffle.png', '2022/08/thumb/truffle.png', '2022/08/truffle_1.png', '2022/08/thumb/truffle_1.png', '2022/08/truffle_2.png', '2022/08/thumb/truffle_2.png', '2022/08/truffle_3.png', '2022/08/thumb/truffle_3.png', 1, 3, '08', '2022', '2022-08-29 16:20:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_info`
--

CREATE TABLE `tbl_product_info` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_product_info`
--

INSERT INTO `tbl_product_info` (`id`, `name`, `image`, `thumb`, `sort`, `link`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Natural', '2022/09/63192a23e7ede-natural.png', '2022/09/thumb/63192a23e7ede-natural.png', 1, '', 1, '2022-09-08 06:32:52', '0000-00-00 00:00:00'),
(2, 'Vegan', '2022/09/63192a84eb525-vegan.png', '2022/09/thumb/63192a84eb525-vegan.png', 2, '', 1, '2022-09-08 06:34:28', '0000-00-00 00:00:00'),
(3, 'Cruelty Free', '2022/09/63192a9eb0d53-cruelty-free.png', '2022/09/thumb/63192a9eb0d53-cruelty-free.png', 3, '', 1, '2022-09-08 06:34:54', '0000-00-00 00:00:00'),
(4, 'Gluten Free', '2022/09/63192ab547ceb-gluten-free.png', '2022/09/thumb/63192ab547ceb-gluten-free.png', 4, '', 1, '2022-09-08 06:35:17', '0000-00-00 00:00:00'),
(5, 'Made in USA', '2022/09/63192ac252f97-made-in-usa.png', '2022/09/thumb/63192ac252f97-made-in-usa.png', 5, '', 1, '2022-09-08 06:35:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_ingre`
--

CREATE TABLE `tbl_product_ingre` (
  `id` int NOT NULL,
  `productID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `des` text NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_product_ingre`
--

INSERT INTO `tbl_product_ingre` (`id`, `productID`, `name`, `image`, `thumb`, `link`, `des`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 49, 'TURMERIC EXTRACT', '2022/08/630dfa01bd364-turmeric-extract.png', '2022/08/thumb/630dfa01bd364-turmeric-extract.png', '', 'Turmeric Extract fights inflammation and brightens skin.', 1, 1, '2022-08-30 18:52:34', '0000-00-00 00:00:00'),
(2, 49, 'BILBERRY', '2022/08/630dfa9825010-bilberry.jpg', '2022/08/thumb/630dfa9825010-bilberry.jpg', '', 'Bilberry conditions skin and protects against free radical damage.', 2, 1, '2022-08-30 18:55:04', '0000-00-00 00:00:00'),
(3, 49, 'BLACKBERRY', '2022/08/630dfaa7eb26f-blackberry.jpg', '2022/08/thumb/630dfaa7eb26f-blackberry.jpg', '', 'Blackberry lessens wrinkles and protects from sun damage.', 3, 1, '2022-08-30 18:55:20', '0000-00-00 00:00:00'),
(4, 49, 'POMEGRANATE', '2022/08/630dfabd6c3b7-pomegranate.png', '2022/08/thumb/630dfabd6c3b7-pomegranate.png', '', 'Pomegranate reduces wrinkles and brightens.', 4, 1, '2022-08-30 18:55:41', '0000-00-00 00:00:00'),
(5, 49, 'RED WINE', '2022/08/630dfaced3317-red-wine.png', '2022/08/thumb/630dfaced3317-red-wine.png', '', 'Red Wine protects against signs of aging.', 5, 1, '2022-08-30 18:55:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_video`
--

CREATE TABLE `tbl_product_video` (
  `id` int NOT NULL,
  `productID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `top` tinyint NOT NULL,
  `bottom` tinyint NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_product_video`
--

INSERT INTO `tbl_product_video` (`id`, `productID`, `name`, `image`, `thumb`, `link`, `sort`, `publish`, `top`, `bottom`, `created_at`, `updated_at`) VALUES
(1, 49, 'Tiêu đề của video', '2022/08/630dee0a01a9f-video-03.png.png', '2022/08/thumb/630dee0a01a9f-video-03.png.png', 'Gtxi__ER0jU', 2, 1, 1, 1, '2022-08-30 18:00:11', '2022-08-30 18:01:37'),
(2, 56, 'Tiêu đề của video', '2022/08/630dee893934a-tieu-de-cua-video.png', '2022/08/thumb/630dee893934a-tieu-de-cua-video.png', 'Gtxi__ER0jU', 3, 1, 1, 0, '2022-08-30 18:03:37', '0000-00-00 00:00:00'),
(3, 49, 'Tiêu đề của video 2', '2022/08/630deeec79720-tieu-de-cua-video-2.png', '2022/08/thumb/630deeec79720-tieu-de-cua-video-2.png', 'EUrBSV16ZG8', 4, 1, 1, 1, '2022-08-30 18:05:16', '0000-00-00 00:00:00'),
(4, 49, 'Tiêu đề của video 3', '2022/08/630def0f81008-tieu-de-cua-video-3.png', '2022/08/thumb/630def0f81008-tieu-de-cua-video-3.png', '7Uj7S82t0bg', 5, 1, 0, 1, '2022-08-30 18:05:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `name`, `link`, `image`, `thumb`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'PATO - Kênh thông tin và đặt bàn nhà hàng', '', '2022/02/62085945d576b.png', '2022/02/thumb/62085945d576b.png', 1, 1, '2022-02-13 08:05:09', '0000-00-00 00:00:00'),
(2, 'Thuexetoanquoc.vn - Cho thuê xe tự lái, có lái toàn quốc', '', '2022/02/62085961529a4.png', '2022/02/thumb/62085961529a4.png', 2, 1, '2022-02-13 08:05:37', '0000-00-00 00:00:00'),
(3, 'Laixeho.vn - Dịch vụ lái xe hộ theo giờ, theo ngày', '#', '2022/04/626747e6be07c.jpg', '2022/04/thumb/626747e6be07c.jpg', 3, 1, '2022-02-13 08:05:53', '2022-04-26 08:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quang_cao`
--

CREATE TABLE `tbl_quang_cao` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `webps` varchar(255) NOT NULL,
  `webps_thumb` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `sort` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_quang_cao`
--

INSERT INTO `tbl_quang_cao` (`id`, `name`, `link`, `image`, `thumb`, `webps`, `webps_thumb`, `publish`, `month`, `year`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Quảng cáo 1222', '', '2022/05/quang-cao-1222.png', '2022/05/thumb/quang-cao-1222.png', 'uploads/webps/quangcao/2022/05/quang-cao-1222.webp', 'uploads/webps/quangcao/2022/05/thumb/quang-cao-1222.webp', 1, '05', '2022', 2, '2021-06-02 15:08:04', '2022-05-30 17:27:07'),
(4, 'Bé vui, uống khoẻ', 'https://sieuthibeyeu.vn/be-uong', '2022/05/quang-cao-3.jpg', '2022/05/thumb/quang-cao-3.jpg', 'uploads/webps/quangcao/2022/05/quang-cao-3.webp', 'uploads/webps/quangcao/2022/05/thumb/quang-cao-3.webp', 1, '05', '2022', 1, '2021-06-10 10:32:04', '2022-05-28 16:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quote`
--

CREATE TABLE `tbl_quote` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `des` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `webps` varchar(255) NOT NULL,
  `webps_thumb` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `sort` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_quote`
--

INSERT INTO `tbl_quote` (`id`, `name`, `link`, `des`, `image`, `thumb`, `webps`, `webps_thumb`, `publish`, `month`, `year`, `sort`, `created_at`, `updated_at`) VALUES
(16, 'Xây dựng phần thô', 'bao-gia-xay-dung-phan-tho', '<p>Phần th&ocirc; l&agrave; phần quan trọng nhất, n&oacute; quyết định sự ổn định về kết cấu cũng như độ bền của ng&ocirc;i nh&agrave; của m&igrave;nh.</p>\r\n', '2021/08/xay-dung-phan-tho.png', '2021/08/thumb/xay-dung-phan-tho.png', 'uploads/webps/quote/2021/08/xay-dung-phan-tho.webp', 'uploads/webps/quote/2021/08/thumb/xay-dung-phan-tho.webp', 1, '09', '2021', 2, '2021-08-06 17:30:47', '2021-09-03 10:42:17'),
(17, 'Xây nhà trọn gói', 'bao-gia-xay-tron-goi', '<p>B&aacute;o gi&aacute; x&acirc;y nh&agrave; trọn g&oacute;i chi tiết v&agrave; c&aacute;c hạng mục trong thi c&ocirc;ng. Phố Xanh tự h&agrave;o l&agrave; c&ocirc;ng ty tư vấn, thi c&ocirc;ng trọn g&oacute;i uy t&iacute;n v&agrave; đảm bảo.</p>\r\n', '2021/08/xay-nha-tron-goi.png', '2021/08/thumb/xay-nha-tron-goi.png', 'uploads/webps/quote/2021/08/xay-nha-tron-goi.webp', 'uploads/webps/quote/2021/08/thumb/xay-nha-tron-goi.webp', 1, '09', '2021', 1, '2021-08-07 11:39:23', '2021-09-03 10:40:50'),
(18, 'Thiết kế kiến trúc', 'bao-gia-thiet-ke', '<p>Bản vẽ thiết kế c&oacute; vai tr&ograve; quan trọng v&agrave; gi&uacute;p qu&aacute; tr&igrave;nh ho&agrave;n thiện trở n&ecirc;n đơn giản v&agrave; tiết kiệm thời gian cũng như chi ph&iacute; thi c&ocirc;ng.</p>\r\n', '2021/08/thiet-ke-kien-truc.png', '2021/08/thumb/thiet-ke-kien-truc.png', 'uploads/webps/quote/2021/08/thiet-ke-kien-truc.webp', 'uploads/webps/quote/2021/08/thumb/thiet-ke-kien-truc.webp', 1, '09', '2021', 3, '2021-08-07 11:43:52', '2021-09-03 10:41:23'),
(19, 'Sửa chữa nhà trọn gói', 'bao-gia-sua-chua-nha', '<p>Sửa chữa cải tạo trọn g&oacute;i c&ocirc;ng tr&igrave;nh sẽ gi&uacute;p gia chủ tiết kiệm thời gian v&agrave; chi ph&iacute; để c&oacute; kh&ocirc;ng gian sống ho&agrave;n to&agrave;n h&agrave;i l&ograve;ng.</p>\r\n', '2021/08/sua-chua-nha-tron-goi.png', '2021/08/thumb/sua-chua-nha-tron-goi.png', 'uploads/webps/quote/2021/08/sua-chua-nha-tron-goi.webp', 'uploads/webps/quote/2021/08/thumb/sua-chua-nha-tron-goi.webp', 1, '09', '2021', 4, '2021-08-07 11:44:12', '2021-09-03 10:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regis_study`
--

CREATE TABLE `tbl_regis_study` (
  `id` int UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_regis_study`
--

INSERT INTO `tbl_regis_study` (`id`, `fullname`, `phone`, `email`, `content`, `created_at`) VALUES
(1, 'Lê Minh Hiếu', '0899068368', '', 'sdsdsd', '2022-08-11 22:29:52'),
(2, 'Lê Minh Hiếu', '0899068368', '', 'test', '2022-08-11 22:56:33'),
(3, 'Nguyễn Văn Chuẩn', '0939888140', 'chuan164475@gmail.com', 'dsdsd', '2022-09-08 15:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `publish`, `created_at`, `updated_at`) VALUES
(3, 'Quản lý 2', 1, '2021-05-13 11:14:54', '2021-07-12 09:20:37'),
(6, 'Trưởng phòng', 1, '2021-07-06 15:08:34', NULL),
(10, 'Nhóm quyền 1', 1, '2021-07-15 15:17:30', '2021-07-15 15:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roof`
--

CREATE TABLE `tbl_roof` (
  `id` int NOT NULL,
  `name` varchar(1000) NOT NULL,
  `coefficient` int NOT NULL,
  `publish` int NOT NULL,
  `sort` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_roof`
--

INSERT INTO `tbl_roof` (`id`, `name`, `coefficient`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
(5, 'Mái ngói chéo', 130, 1, 3, '2021-07-27 16:09:16', '2021-09-06 16:44:12'),
(6, 'Mái ngói có lito, dán ngói', 100, 1, 4, '2021-07-27 16:09:16', '2021-09-06 16:44:51'),
(7, 'Mái bê tông cốt thép', 50, 1, 1, '2021-07-27 16:09:16', '2021-07-27 16:09:37'),
(8, 'Mái Tole', 30, 1, 2, '2021-07-27 16:09:16', '2021-07-27 16:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `name`, `link`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(5, 'Săn Sales', '#', 5, 1, '2022-02-13 08:58:43', '2022-04-22 22:36:15'),
(6, 'Follow Tiktok', '#', 6, 1, '2022-02-13 08:58:55', '2022-04-22 22:34:19'),
(7, 'Gian hàng Lazada', '#', 7, 1, '2022-02-13 08:59:17', '2022-04-22 22:34:02'),
(8, 'Gian hàng Shopee', '#', 8, 1, '2022-02-13 08:59:31', '2022-04-22 22:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slogan`
--

CREATE TABLE `tbl_slogan` (
  `id` int NOT NULL,
  `name` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `thumb` varchar(1000) NOT NULL,
  `webps` varchar(1000) NOT NULL,
  `webps_thumb` varchar(1000) NOT NULL,
  `publish` int NOT NULL,
  `sort` int NOT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `des` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_slogan`
--

INSERT INTO `tbl_slogan` (`id`, `name`, `image`, `thumb`, `webps`, `webps_thumb`, `publish`, `sort`, `month`, `year`, `des`, `created_at`, `updated_at`) VALUES
(14, 'Free Shipping', '2022/08/slogan-01.png.png', '2022/08/thumb/slogan-01.png.png', 'uploads/webps/slogan/2022/08/slogan-01.webp', 'uploads/webps/slogan/2022/08/thumb/slogan-01.webp', 1, 1, 8, 2022, 'Miễn phí vận chuyển', '2022-08-11 07:58:46', '0000-00-00 00:00:00'),
(15, 'Quà tặng', '2022/08/slogan-02.png.png', '2022/08/thumb/slogan-02.png.png', 'uploads/webps/slogan/2022/08/slogan-02.webp', 'uploads/webps/slogan/2022/08/thumb/slogan-02.webp', 1, 2, 8, 2022, 'Vô vàn quà tặng hấp dẫn', '2022-08-11 07:59:18', '0000-00-00 00:00:00'),
(16, 'Hỗ trợ 24/7', '2022/08/slogan-03.png.png', '2022/08/thumb/slogan-03.png.png', 'uploads/webps/slogan/2022/08/slogan-03.webp', 'uploads/webps/slogan/2022/08/thumb/slogan-03.webp', 1, 3, 8, 2022, 'Nhân viên hỗ trợ 24/7', '2022-08-11 07:59:35', '0000-00-00 00:00:00'),
(17, 'Khuyến mãi', '2022/08/slogan-04.png.png', '2022/08/thumb/slogan-04.png.png', 'uploads/webps/slogan/2022/08/slogan-04.webp', 'uploads/webps/slogan/2022/08/thumb/slogan-04.webp', 1, 4, 8, 2022, 'Khuyến mãi ngập tràn', '2022-08-11 07:59:47', '2022-08-11 07:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statusproduct`
--

CREATE TABLE `tbl_statusproduct` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `sort` int UNSIGNED NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_statusproduct`
--

INSERT INTO `tbl_statusproduct` (`id`, `name`, `color`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(4, 'Hết Hàng', '#BF1E2E', 1, 0, '2021-08-27 10:19:23', '2021-08-27 10:21:43'),
(5, 'Liên Hệ Đặt Hàng', '#747C87', 2, 0, '2021-08-27 10:19:47', '0000-00-00 00:00:00'),
(6, 'Sẵn Hàng', '#005C47', 3, 0, '2021-08-27 10:22:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu_news`
--

CREATE TABLE `tbl_submenu_news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `IDnews` int NOT NULL,
  `parentid` int NOT NULL,
  `number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_submenu_news`
--

INSERT INTO `tbl_submenu_news` (`id`, `title`, `keywords`, `IDnews`, `parentid`, `number`) VALUES
(618, '', '', 18, 0, 1),
(619, '', '', 14, 0, 1),
(620, '', '', 15, 0, 1),
(621, '', '', 16, 0, 1),
(622, '', '', 17, 0, 1),
(623, '', '', 45, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_system`
--

CREATE TABLE `tbl_system` (
  `id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `contents` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_system`
--

INSERT INTO `tbl_system` (`id`, `type`, `contents`) VALUES
(1, 'system', '{\"title\":\"LAN H\\u01af\\u01a0NG LIP\",\"meta_keyword\":\"LAN H\\u01af\\u01a0NG LIP\",\"meta_description\":\"LAN H\\u01af\\u01a0NG LIP\",\"info_ck\":\"<p><strong>Ng&acirc;n h&agrave;ng Techcombank<\\/strong><\\/p>\\r\\n\\r\\n<p><strong>Ch\\u1ee7 Tk:<\\/strong>&nbsp;Lan H\\u01b0\\u01a1ng Lip<\\/p>\\r\\n\\r\\n<p><strong>S\\u1ed1 Tk:<\\/strong>&nbsp;0981260286<\\/p>\\r\\n\\r\\n<p><strong>Chi nh&aacute;nh:<\\/strong>&nbsp;Th\\u1ee7 \\u0111\\u1ee9c, HCM<\\/p>\\r\\n\",\"schema\":\"Schema.org\",\"email_take\":\"hieu.optech@gmail.com\",\"copyright\":\"B\\u1ea3n quy\\u1ec1n thu\\u1ed9c v\\u1ec1 Lan Huong Lip | Copyright @ 2021 | Thi\\u1ebft k\\u1ebf b\\u1edfi Optech.vn\",\"image\":\"2022\\/09\\/favicon.png\",\"thumb\":\"2022\\/09\\/thumb\\/favicon.png\",\"image_social\":\"2022\\/08\\/social.png\",\"thumb_social\":\"2022\\/08\\/thumb\\/social.png\",\"month\":\"10\",\"year\":\"2022\"}'),
(2, 'contact', '{\"company\":\"LAN H\\u01af\\u01a0NG LIP\",\"address\":\"18A ng\\u00e1ch 2 ng\\u00f5 850 \\u0111\\u01b0\\u1eddng L\\u00e1ng, \\u0110\\u1ed1ng \\u0110a, H\\u00e0 N\\u1ed9i.\",\"phone\":\"0981260286\",\"zalo\":\"0981260286\",\"messenger\":\"\",\"google_map\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3918.5890687194383!2d106.76106745088207!3d10.842726392238665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527a5b5629e85%3A0xb48bdfcc6327d9f8!2zNzggxJDhurduZyBWxINuIEJpLCBCw6xuaCBUaOG7jSwgVGjhu6cgxJDhu6ljLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1660278250310!5m2!1sen!2s\\\" width=\\\"100%\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"><\\/iframe>\",\"email\":\"Lanhuonglip@gmail.com\",\"time_work\":\"8.00 am - 11.00 pm\",\"chatbox\":\"\",\"turn_off_chatbox\":0}'),
(3, 'google', '{\"analytics\":\"UA-115803731-22\",\"webmasters\":\"Webmasters tools update\",\"sitemaps\":\"sitemap.xml\"}'),
(4, 'home', '{\"title_home\":\"VCCI\",\"des_home\":\"VCCI\",\"content_home\":\"\"}'),
(5, 'footer', '{\"title_footer\":\"C\\u00d4NG TY C\\u1ed4 PH\\u1ea6N \\u0110\\u1ea6U T\\u01af V\\u00c0 X\\u00c2Y D\\u1ef0NG PH\\u1ed0 XANH\",\"link_footer\":\"#\",\"des_footer\":\"<p>Ph\\u1ed1 Xanh - Chuy&ecirc;n x&acirc;y nh&agrave; tr\\u1ecdn g&oacute;i , t\\u01b0 v\\u1ea5n thi\\u1ebft k\\u1ebf ,&nbsp; thi c\\u1ed9ng n\\u1ed9i th\\u1ea5t ch\\u1ea5t l\\u01b0\\u1ee3ng h&agrave;ng \\u0111\\u1ea7u Vi\\u1ec7t Nam&nbsp;<\\/p>\\r\\n\",\"image_footer\":\"2021\\/08\\/image_footer.png\",\"thumb_footer\":\"2021\\/08\\/thumb\\/image_footer.png\"}'),
(6, 'quote', '{\"title\":\"Test cau hinh bao gia\",\"description\":\"<p>Test noi dung cau hinh bao gia<\\/p>\",\"image\":\"2021\\/08\\/quote.png\",\"thumb\":\"2021\\/08\\/thumb\\/quote.png\",\"webps\":\"uploads\\/webps\\/quote\\/2021\\/08\\/quote.webp\",\"webps_thumb\":\"uploads\\/webps\\/quote\\/2021\\/08\\/thumb\\/quote.webp\",\"month\":\"08\",\"year\":\"2021\"}'),
(7, 'capacity', '{\"name\":\"H\\u1ed3 s\\u01a1 n\\u0103ng l\\u1ef1c\",\"des_capacity\":\"<p>Qu&yacute; kh&aacute;ch h&agrave;ng v&agrave; ch\\u1ee7 \\u0111\\u1ea7u t\\u01b0 vui l&ograve;ng xem th&ocirc;ng tin <strong>H\\u1ed3 S\\u01a1 N\\u0103ng L\\u1ef1c Ph\\u1ed1 Xanh<\\/strong>&nbsp;&nbsp;t\\u1ea1i \\u0111&acirc;y.<\\/p>\\r\\n\",\"pathFile\":\"uploads\\/files\\/capacity\\/dummy.pdf\",\"publish\":0}'),
(8, 'social', '{\"facebook\":\"1\",\"youtube\":\"2\",\"tiktok\":\"3\",\"twitter\":\"4\",\"pinterest\":\"5\",\"instagram\":\"6\",\"fanpage\":\"<iframe src=\\\"https:\\/\\/www.facebook.com\\/plugins\\/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsieuthibeyeuvietnam%2F&tabs=timeline&width=292&height=180&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId\\\" width=\\\"292\\\" height=\\\"180\\\" style=\\\"border:none;overflow:hidden\\\" scrolling=\\\"no\\\" frameborder=\\\"0\\\" allowfullscreen=\\\"true\\\" allow=\\\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\\\"><\\/iframe>\"}'),
(9, 'info', '{\"title\":\"V\\u1ecaT N\\u01af\\u1edaNG TH\\u1ea2O M\\u1ed8C\",\"des\":\"58 B\\u00f9i H\\u1eefu Ngh\\u0129a P2 B\\u00ecnh Th\\u1ea1nh\",\"text_btn\":\"B\\u1ea3n \\u0111\\u1ed3\",\"link\":\"https:\\/\\/goo.gl\\/maps\\/YNWoEF6Vsb3brbnY9\",\"title_between\":\"\\u0110\\u1eb6T M\\u00d3N TR\\u1ef0C TUY\\u1ebeN\",\"des_between\":\"Ch\\u00fang t\\u00f4i nh\\u1eadn \\u0111\\u1eb7t m\\u00f3n t\\u1eeb 9h00 \\u0111\\u1ebfn 21h00\",\"title_right\":\"GIAO H\\u00c0NG T\\u1eacN N\\u01a0I\",\"phone\":\"0961525887\",\"website\":\"\",\"image_bg\":\"2021\\/11\\/61a5ca761e5de.4825.jpg\",\"image_thumb_bg\":\"2021\\/11\\/thumb\\/61a5ca761e5de.4825.jpg\",\"image_left\":\"2021\\/11\\/61a5ca5576ef5.1573.png\",\"image_thumb_left\":\"2021\\/11\\/thumb\\/61a5ca5576ef5.1573.png\",\"image_right\":\"2021\\/11\\/61a5ca557d369.5785.png\",\"image_thumb_right\":\"2021\\/11\\/thumb\\/61a5ca557d369.5785.png\"}'),
(10, 'bannerfooter', '{\"title\":\"HomeFood\",\"text_btn\":\"Xem t\\u1ea5t c\\u1ea3 c\\u00e1c \\u0111\\u1ecba \\u0111i\\u1ec3m\",\"link\":\"https:\\/\\/goo.gl\\/maps\\/YNWoEF6Vsb3brbnY9\",\"image_bg_footer\":\"2021\\/11\\/61a5d7ae6a345.6225.jpg\",\"image_thumb_bg_footer\":\"2021\\/11\\/thumb\\/61a5d7ae6a345.6225.jpg\",\"image_text\":\"2021\\/12\\/61a9f43695ebc.121.png\",\"image_thumb_text_footer\":\"2021\\/12\\/thumb\\/61a9f43695ebc.121.png\"}'),
(11, 'flashsale', '{\"title\":\"\\u0110\\u0102NG K\\u00dd <br\\/> T\\u01af V\\u1ea4N GIA C\\u00d4NG SON M\\u00d4I\",\"images\":\"2021\\/12\\/61a9e8a3d1128.6112.png\",\"thumb\":\"2021\\/12\\/thumb\\/61a9e8a3d1128.6112.png\",\"price\":\"\",\"datetime\":\"\",\"price_sale\":\"\"}'),
(12, 'slogan', '{\"slogan_header_1\":\"Giao h\\u00e0ng mi\\u1ec5n ph\\u00ed\",\"link_slogan_header_1\":\"https:\\/\\/sieuthibeyeu.vn\\/mua-va-giao-hang-online\",\"slogan_header_2\":\"Ch\\u01b0\\u01a1ng tr\\u00ecnh khuy\\u1ebfn m\\u00e3i\",\"link_slogan_header_2\":\"https:\\/\\/sieuthibeyeu.vn\\/chuong-trinh-khuyen-mai\",\"slogan_1\":\"Free Ship cho ho\\u00e1 \\u0111\\u01a1n t\\u1eeb 500k\",\"slogan_2\":\"H\\u1ed7 tr\\u1ee3 nhanh ch\\u00f3ng\",\"slogan_3\":\"Thanh to\\u00e1n khi nh\\u1eadn h\\u00e0ng\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `fullname` varchar(1000) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `text_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `balance` varchar(1000) NOT NULL,
  `company` varchar(255) NOT NULL,
  `tax_code` varchar(255) NOT NULL,
  `representative` varchar(255) NOT NULL,
  `careerID` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `token` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `password`, `salt`, `text_password`, `email`, `phone`, `address`, `balance`, `company`, `tax_code`, `representative`, `careerID`, `position`, `active`, `token`, `created_at`, `updated_at`) VALUES
(187, '', '$2a$10$o/PJT6V/rPAhuJb0L2K9FuPD663073TYzIQzESlbtHZVs.2rkPHSy', '$2a$10$o/PJT6V/rPAhuJb0L2K9Fu', '12345678', 'doc.optech@gmail.com', '0934084427', '78 Đặng văn bi, Bình Thọ, Thủ Đức, HCM', '', 'ABC company', '312123456', 'Lê Minh Hiếu', '17', 'Giám đốc', 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTg3LCJpYXQiOjE2MjY3NDA5NzcsImV4cCI6MTYyNzAwMDE3N30.3xa5kYPE-ReBlQB5iA_quTy4POGL6BOC5x0GnraZeEk', '2021-07-19 10:07:09', NULL),
(188, '', '$2a$10$DnD8zfKFgn3F6I8L/c0H8egfPKGrEhNefrZsKdOuLjGaHc82q7tb.', '$2a$10$hjLycVqYi314yYSX6bjvje', '0k7m8tmk', 'vkduy240398@gmail.com', '0934084426', '78 Đặng văn bi, Bình Thọ, Thủ Đức, HCM', '', 'ABC company', '312123456', 'Lê Minh Hiếu', '17', 'Giám đốc', 1, '', '2021-07-19 10:07:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `name`, `image`, `thumb`, `link`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(4, '6 kiểu phối màu son cho bộ sưu tập son thương hiệu Việt Nam', '2022/08/62f4ea33564c4-video-01.png.png', '2022/08/thumb/62f4ea33564c4-video-01.png.png', '07tjEiGq8v0', 1, 1, '2022-08-11 18:38:13', '2022-08-11 18:38:27'),
(5, 'Top 15 màu son cho mùa Thu Đông', '2022/08/62f4ea6825597-top-15-mau-son-cho-mua-thu-dong.png', '2022/08/thumb/62f4ea6825597-top-15-mau-son-cho-mua-thu-dong.png', '7Uj7S82t0bg', 2, 1, '2022-08-11 18:39:20', '0000-00-00 00:00:00'),
(6, 'Hướng dẫn Mix màu son Cam Nude', '2022/08/62f4ea7aa3645-huong-dan-mix-mau-son-cam-nude.png', '2022/08/thumb/62f4ea7aa3645-huong-dan-mix-mau-son-cam-nude.png', '7Uj7S82t0bg', 3, 1, '2022-08-11 18:39:38', '0000-00-00 00:00:00'),
(7, 'DỰ ĐOÁN TONE MÀU SON LÀM NÊN HOT TREND 2020', '2022/08/62f4ea87f051b-du-doan-tone-mau-son-lam-nen-hot-trend-2020.png', '2022/08/thumb/62f4ea87f051b-du-doan-tone-mau-son-lam-nen-hot-trend-2020.png', '7Uj7S82t0bg', 4, 1, '2022-08-11 18:39:52', '0000-00-00 00:00:00'),
(8, 'Tự làm son dưỡng Thảo Mộc', '2022/08/62f4eb7e29384-sfdsfs.png', '2022/08/thumb/62f4eb7e29384-sfdsfs.png', 'EUrBSV16ZG8', 5, 1, '2022-08-11 18:43:58', '2022-08-11 18:45:30'),
(9, 'LIỆU TRÌNH PHUN OXY JET TRỊ MỤN TẠM BIỆT MỤN, TRẺ HÓA DA', '2022/08/62f4ebefe1e78-lieu-trinh-phun-oxy-jet-tri-mun-tam-biet-mun-tre-hoa-da.png', '2022/08/thumb/62f4ebefe1e78-lieu-trinh-phun-oxy-jet-tri-mun-tam-biet-mun-tre-hoa-da.png', 'EUrBSV16ZG8', 6, 1, '2022-08-11 18:45:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_whychoose`
--

CREATE TABLE `tbl_whychoose` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_whychoose`
--

INSERT INTO `tbl_whychoose` (`id`, `name`, `des`, `image`, `thumb`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(5, 'Tiết kiệm chi phí', 'Website đang trong quá trình xây dựng. i-KIDs đang cập nhật nội dung.\r\n', '2022/02/6207def26ab1d.png', '2022/02/thumb/6207def26ab1d.png', 1, 1, '2022-02-12 23:13:43', '2022-04-22 22:25:00'),
(6, 'Kinh nghiệm đa dạng', 'Website đang trong quá trình xây dựng. i-KIDs đang cập nhật nội dung. \r\n', '2022/02/6207df0e3d5e1.png', '2022/02/thumb/6207df0e3d5e1.png', 2, 1, '2022-02-12 23:23:42', '2022-04-22 22:24:54'),
(7, 'Tư vấn 24/7', 'Website đang trong quá trình xây dựng. i-KIDs đang cập nhật nội dung. \r\n\r\n', '2022/02/6207df2278136.png', '2022/02/thumb/6207df2278136.png', 3, 1, '2022-02-12 23:24:02', '2022-04-22 22:24:46'),
(8, 'Freeship', 'Website đang trong quá trình xây dựng. i-KIDs đang cập nhật nội dung.', '2022/02/6207df3355afc.png', '2022/02/thumb/6207df3355afc.png', 4, 1, '2022-02-12 23:24:19', '2022-04-22 22:24:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advise`
--
ALTER TABLE `tbl_advise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advise_phone`
--
ALTER TABLE `tbl_advise_phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alias`
--
ALTER TABLE `tbl_alias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_baogia`
--
ALTER TABLE `tbl_baogia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_career`
--
ALTER TABLE `tbl_career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_community`
--
ALTER TABLE `tbl_community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_constants`
--
ALTER TABLE `tbl_constants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents`
--
ALTER TABLE `tbl_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_difficult`
--
ALTER TABLE `tbl_difficult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dvt`
--
ALTER TABLE `tbl_dvt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_idea`
--
ALTER TABLE `tbl_idea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_instagram`
--
ALTER TABLE `tbl_instagram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mails`
--
ALTER TABLE `tbl_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_method_pay`
--
ALTER TABLE `tbl_method_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_modules_detail`
--
ALTER TABLE `tbl_modules_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_number`
--
ALTER TABLE `tbl_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_photo_product`
--
ALTER TABLE `tbl_photo_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_procedure`
--
ALTER TABLE `tbl_procedure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_info`
--
ALTER TABLE `tbl_product_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_ingre`
--
ALTER TABLE `tbl_product_ingre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_video`
--
ALTER TABLE `tbl_product_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quang_cao`
--
ALTER TABLE `tbl_quang_cao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quote`
--
ALTER TABLE `tbl_quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_regis_study`
--
ALTER TABLE `tbl_regis_study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roof`
--
ALTER TABLE `tbl_roof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_statusproduct`
--
ALTER TABLE `tbl_statusproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_submenu_news`
--
ALTER TABLE `tbl_submenu_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_system`
--
ALTER TABLE `tbl_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_whychoose`
--
ALTER TABLE `tbl_whychoose`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_advise`
--
ALTER TABLE `tbl_advise`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_advise_phone`
--
ALTER TABLE `tbl_advise_phone`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_alias`
--
ALTER TABLE `tbl_alias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48494;

--
-- AUTO_INCREMENT for table `tbl_baogia`
--
ALTER TABLE `tbl_baogia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_career`
--
ALTER TABLE `tbl_career`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `tbl_community`
--
ALTER TABLE `tbl_community`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_constants`
--
ALTER TABLE `tbl_constants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents`
--
ALTER TABLE `tbl_contents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_difficult`
--
ALTER TABLE `tbl_difficult`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dvt`
--
ALTER TABLE `tbl_dvt`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_idea`
--
ALTER TABLE `tbl_idea`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_instagram`
--
ALTER TABLE `tbl_instagram`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_mails`
--
ALTER TABLE `tbl_mails`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `tbl_method_pay`
--
ALTER TABLE `tbl_method_pay`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_module`
--
ALTER TABLE `tbl_module`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_modules_detail`
--
ALTER TABLE `tbl_modules_detail`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=659;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_number`
--
ALTER TABLE `tbl_number`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_photo_product`
--
ALTER TABLE `tbl_photo_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_procedure`
--
ALTER TABLE `tbl_procedure`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product_info`
--
ALTER TABLE `tbl_product_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product_ingre`
--
ALTER TABLE `tbl_product_ingre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product_video`
--
ALTER TABLE `tbl_product_video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_quang_cao`
--
ALTER TABLE `tbl_quang_cao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_quote`
--
ALTER TABLE `tbl_quote`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_regis_study`
--
ALTER TABLE `tbl_regis_study`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_roof`
--
ALTER TABLE `tbl_roof`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_statusproduct`
--
ALTER TABLE `tbl_statusproduct`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_submenu_news`
--
ALTER TABLE `tbl_submenu_news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=624;

--
-- AUTO_INCREMENT for table `tbl_system`
--
ALTER TABLE `tbl_system`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_whychoose`
--
ALTER TABLE `tbl_whychoose`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
