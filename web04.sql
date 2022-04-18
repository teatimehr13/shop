-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-18 11:40:20
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `web04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `web04_admin`
--

CREATE TABLE `web04_admin` (
  `id` int(10) NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pr` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `web04_admin`
--

INSERT INTO `web04_admin` (`id`, `acc`, `pw`, `pr`) VALUES
(2, 'admin', '1234', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `web04_bottom`
--

CREATE TABLE `web04_bottom` (
  `id` int(10) NOT NULL,
  `bottom` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `web04_bottom`
--

INSERT INTO `web04_bottom` (`id`, `bottom`) VALUES
(1, 'COPY RIGHT BY 2022 ');

-- --------------------------------------------------------

--
-- 資料表結構 `web04_goods`
--

CREATE TABLE `web04_goods` (
  `id` int(10) NOT NULL,
  `no` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` int(5) NOT NULL,
  `stock` int(5) NOT NULL,
  `spec` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `big` int(5) NOT NULL,
  `mid` int(5) NOT NULL,
  `sh` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `web04_goods`
--

INSERT INTO `web04_goods` (`id`, `no`, `name`, `price`, `stock`, `spec`, `intro`, `img`, `big`, `mid`, `sh`) VALUES
(1, '339485', '平價款愛馬事', 79900, 77, '拉鍊微開', '可以裝的下筆電的萬用包', '0403.jpg', 1, 2, 1),
(2, '842440', '小零錢包', 59100, 55, '15*15*15cm', '防的愛馬事，但不能賣太便宜。', '0404.jpg', 1, 2, 1),
(3, '793945', '灰姑娘的小白鞋', 79200, 2, '5cm', '穿上去，合腳就帶走!', '0406.jpg', 5, 7, 1),
(4, '375218', '卡帝耳', 499999, 1, '真鑽', '賣的是一種夢想', '0408.jpg', 11, 12, 1),
(5, '103674', '微涼涼鞋', 390, 5, '假皮', '去海邊玩可以穿', '0407.jpg', 5, 13, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `web04_member`
--

CREATE TABLE `web04_member` (
  `id` int(10) NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `web04_member`
--

INSERT INTO `web04_member` (`id`, `acc`, `name`, `pw`, `tel`, `addr`, `email`, `regdate`, `total`) VALUES
(1, 'stayc1994', '小明', 'stayc1994', '0922-333-994', '新北市', 'afffff@gmail.com', '2022-04-18 09:22:06', 0),
(2, 'asap32543', '小華', 'asap32543', '0955-123-321', '台北市', 'dsgsgs@gmail.com', '2022-04-18 09:22:06', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `web04_ord`
--

CREATE TABLE `web04_ord` (
  `id` int(10) NOT NULL,
  `no` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `total` int(10) NOT NULL,
  `goods` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `orddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `web04_ord`
--

INSERT INTO `web04_ord` (`id`, `no`, `acc`, `name`, `email`, `addr`, `tel`, `total`, `goods`, `orddate`, `status`) VALUES
(1, '20220418155410', 'stayc1994', '小美', 'afdifdij@gmail', '三民街', '0912-244-444', 517000, 'a:3:{i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"1\";}', '2022-04-18 09:39:21', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `web04_type`
--

CREATE TABLE `web04_type` (
  `id` int(10) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `web04_type`
--

INSERT INTO `web04_type` (`id`, `name`, `parent`) VALUES
(1, '背包', 0),
(2, '手拿', 1),
(3, '後背', 1),
(4, '斜背', 1),
(5, '鞋子', 0),
(7, '平底鞋', 5),
(10, '高跟鞋', 5),
(11, '珠寶', 0),
(12, '閃亮系列', 11),
(13, '涼鞋', 5);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `web04_admin`
--
ALTER TABLE `web04_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `web04_bottom`
--
ALTER TABLE `web04_bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `web04_goods`
--
ALTER TABLE `web04_goods`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `web04_member`
--
ALTER TABLE `web04_member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `web04_ord`
--
ALTER TABLE `web04_ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `web04_type`
--
ALTER TABLE `web04_type`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `web04_admin`
--
ALTER TABLE `web04_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `web04_bottom`
--
ALTER TABLE `web04_bottom`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `web04_goods`
--
ALTER TABLE `web04_goods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `web04_member`
--
ALTER TABLE `web04_member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `web04_ord`
--
ALTER TABLE `web04_ord`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `web04_type`
--
ALTER TABLE `web04_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
