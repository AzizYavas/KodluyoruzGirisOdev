-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 15 Tem 2021, 00:52:44
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `depo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alarm`
--

CREATE TABLE `alarm` (
  `id` int(11) NOT NULL,
  `ad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `sinir` int(50) NOT NULL,
  `alarmkat` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `alarm`
--

INSERT INTO `alarm` (`id`, `ad`, `sinir`, `alarmkat`) VALUES
(27, 'yeşil fasulye', 40, ''),
(28, 'nohut', 22, ''),
(29, 'armut', 45, ''),
(30, 'patates', 12, ''),
(31, 'karpuz', 50, ''),
(32, 'Kavun', 20, ''),
(33, 'patates', 4, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kasa`
--

CREATE TABLE `kasa` (
  `id` int(11) NOT NULL,
  `anapara` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kasa`
--

INSERT INTO `kasa` (`id`, `anapara`) VALUES
(1, 100248);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategoriad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `idkategori` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategoriad`, `idkategori`) VALUES
(4, 'Baklagiller', 1),
(5, 'Yaş Ürünler', 2),
(6, 'meyveler', 3),
(7, 'sebzeler', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kulad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `sifre2` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(40) NOT NULL,
  `mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifirlama_kodu` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kulad`, `sifre`, `sifre2`, `yetki`, `mail`, `sifirlama_kodu`) VALUES
(7, 'merve', '44209a6a592dea91bcf7d4dd53e47a5a\r\n\r\n', '44209a6a592dea91bcf7d4dd53e47a5a\r\n', 2, 'uazizyavas@gmail.com', ''),
(8, 'ali', '44209a6a592dea91bcf7d4dd53e47a5a\r\n', '44209a6a592dea91bcf7d4dd53e47a5a\r\n', 2, 'sallakanka@gmail.com', ''),
(9, 'üsame', '44209a6a592dea91bcf7d4dd53e47a5a\r\n', '44209a6a592dea91bcf7d4dd53e47a5a\r\n', 1, 'azizkankam@gmail.com', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rapor`
--

CREATE TABLE `rapor` (
  `id` int(11) NOT NULL,
  `urun` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kate` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `cikis` int(30) NOT NULL,
  `giris` int(30) NOT NULL,
  `zaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rapor`
--

INSERT INTO `rapor` (`id`, `urun`, `kate`, `cikis`, `giris`, `zaman`) VALUES
(65, 'patates', 'sebzeler', 0, 100, '2021-01-02'),
(66, 'patates', 'sebzeler', 1, 0, '2021-01-02'),
(67, 'patates', 'meyveler', 0, 1, '2021-01-02'),
(68, 'patates', 'meyveler', 12, 0, '2021-01-02'),
(69, 'yeşil fasulye', 'Yaş Ürünler', 0, 10, '2021-01-07'),
(70, 'yeşil fasulye', 'Yaş Ürünler', 0, 10, '2021-01-07'),
(71, 'yeşil fasulye', 'Yaş Ürünler', 0, 5, '2021-01-07'),
(72, 'yeşil fasulye', 'Yaş Ürünler', 0, 2, '2021-01-07'),
(73, 'yeşil fasulye', 'Yaş Ürünler', 0, 1, '2021-01-07'),
(74, 'yeşil fasulye', 'Yaş Ürünler', 0, 1, '2021-01-07'),
(75, 'yeşil fasulye', 'Yaş Ürünler', 0, 5, '2021-01-07'),
(76, 'yeşil fasulye', 'Yaş Ürünler', 0, 3, '2021-01-07'),
(77, 'yeşil fasulye', 'Yaş Ürünler', 0, 1, '2021-01-07'),
(78, 'yeşil fasulye', 'Yaş Ürünler', 0, 4, '2021-01-07'),
(79, 'yeşil fasulye', 'Yaş Ürünler', 0, 3, '2021-01-07'),
(80, 'yeşil fasulye', 'Yaş Ürünler', 0, 4, '2021-01-07'),
(81, 'yeşil fasulye', 'Yaş Ürünler', 0, 1, '2021-01-07'),
(82, 'yeşil fasulye', 'Yaş Ürünler', 0, 10, '2021-01-07'),
(83, 'yeşil fasulye', 'Yaş Ürünler', 0, 2, '2021-01-07'),
(84, 'yeşil fasulye', 'Yaş Ürünler', 0, 10, '2021-01-07'),
(85, 'yeşil fasulye', 'Yaş Ürünler', 10, 0, '2021-01-07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_kullanici`
--

CREATE TABLE `site_kullanici` (
  `id` int(11) NOT NULL,
  `kulad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifre2` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_kullanici`
--

INSERT INTO `site_kullanici` (`id`, `kulad`, `sifre`, `sifre2`, `mail`) VALUES
(9, 'ahmet', '75b831e9ee13eadb6c0bb0d4d168e0f3', '75b831e9ee13eadb6c0bb0d4d168e0f3', 'deneme@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `urunadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `azaltma` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `artirma` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stok`
--

INSERT INTO `stok` (`id`, `urunadi`, `azaltma`, `artirma`, `tarih`) VALUES
(3, '', '0', '1', ''),
(4, '', '0', '1', '2020-12-19 11:09:14'),
(5, '', '0', '50', '2020-12-19 11:10:32'),
(6, 'yeşil fasulye', '0', '20', '2020-12-19 11:12:12'),
(7, 'yeşil fasulye', '100', '0', '2020-12-19 11:14:36'),
(8, 'nohut', '0', '100', '2020-12-19 11:15:04'),
(9, 'armut', '4', '0', '2020-12-19 19:38:51'),
(10, 'nohut', '0', '45', '2020-12-20 19:11:12'),
(11, 'armut', '0', '11', '2020-12-20 19:11:20'),
(12, 'yeşil fasulye', '0', '5', '2020-12-23 11:46:36'),
(13, 'yeşil fasulye', '0', '4', '2020-12-23 14:44:31'),
(14, 'yeşil fasulye', '3', '0', '2020-12-23 14:46:29'),
(15, 'yeşil fasulye', '0', '34', '2020-12-23 14:46:36'),
(16, 'nohut', '0', '1', '2020-12-23 14:47:00'),
(17, 'nohut', '4', '0', '2020-12-23 14:47:07'),
(18, 'armut', '0', '3', '2020-12-23 14:47:14'),
(19, 'armut', '1', '0', '2020-12-23 14:47:19'),
(20, 'patates', '20', '0', '2020-12-30 19:52:28'),
(21, 'patates', '50', '0', '2020-12-30 19:52:39'),
(22, 'patates', '11', '0', '2020-12-30 19:53:21'),
(23, 'patates', '0', '50', '2020-12-30 19:54:34'),
(24, 'patates', '45', '0', '2020-12-30 19:57:46'),
(25, 'patates', '0', '1', '2020-12-30 20:01:36'),
(26, 'patates', '5', '0', '2020-12-30 20:02:25'),
(27, 'patates', '0', '1', '2020-12-30 20:02:47'),
(28, 'patates', '2', '0', '2020-12-30 20:03:29'),
(29, 'patates', '0', '6', '2020-12-30 20:03:43'),
(30, 'patates', '10', '0', '2020-12-30 20:04:27'),
(31, 'patates', '0', '20', '2020-12-30 20:25:54'),
(32, 'patates', '0', '5', '2020-12-30 20:27:36'),
(33, 'patates', '25', '0', '2020-12-30 20:28:37'),
(34, 'patates', '0', '50', '2020-12-30 20:35:39'),
(35, 'patates', '50', '0', '2020-12-30 20:37:34'),
(36, 'patates', '0', '50', '2020-12-30 20:38:10'),
(37, 'patates', '50', '0', '2020-12-30 20:39:01'),
(38, 'patates', '1', '0', '2020-12-30 20:44:29'),
(39, 'patates', '0', '50', '2020-12-30 20:44:45'),
(40, 'patates', '50', '0', '2020-12-30 20:45:06'),
(41, 'patates', '1', '0', '2020-12-30 20:48:24'),
(42, 'patates', '0', '50', '2020-12-30 20:48:41'),
(43, 'patates', '49', '0', '2020-12-30 20:49:24'),
(44, 'patates', '0', '9', '2020-12-30 20:49:42'),
(45, 'patates', '1', '0', '2020-12-30 20:49:58'),
(46, 'patates', '0', '40', '2020-12-30 20:50:15'),
(47, 'patates', '45', '0', '2020-12-30 20:51:05'),
(48, 'patates', '0', '6', '2020-12-30 20:53:14'),
(49, 'patates', '6', '0', '2020-12-30 20:53:27'),
(50, 'patates', '0', '8', '2020-12-30 20:54:41'),
(51, 'patates', '9', '0', '2020-12-30 20:58:08'),
(52, 'patates', '0', '11', '2020-12-30 20:58:33'),
(53, 'patates', '7', '0', '2020-12-30 20:59:32'),
(54, 'patates', '0', '11', '2020-12-30 20:59:44'),
(55, 'karpuz', '45', '0', '2020-12-30 21:01:05'),
(56, 'karpuz', '0', '50', '2020-12-30 21:01:21'),
(57, 'nohut', '40', '0', '2020-12-30 23:33:45'),
(58, 'nohut', '0', '100', '2020-12-30 23:34:05'),
(59, 'Kavun', '40', '0', '2020-12-31 14:33:30'),
(60, 'Kavun', '0', '60', '2020-12-31 14:33:54'),
(61, 'yeşil fasulye', '0', '5', '2021-01-02 23:01:37'),
(62, 'yeşil fasulye', '15', '0', '2021-01-02 23:02:10'),
(63, 'yeşil fasulye', '0', '23', '2021-01-02 23:04:24'),
(64, 'yeşil fasulye', '0', '1', '2021-01-02 23:07:18'),
(65, 'yeşil fasulye', '0', '4', '2021-01-02 23:11:14'),
(66, 'armut', '1', '0', '2021-01-02 23:23:21'),
(67, 'armut', '5', '0', '2021-01-02 23:23:43'),
(68, 'karpuz', '0', '4', '2021-01-02 23:24:47'),
(69, 'nohut', '0', '5', '2021-01-02 23:41:23'),
(70, 'patates', '0', '45', '2021-01-02 23:46:05'),
(71, 'patates', '4', '0', '2021-01-02 23:46:12'),
(72, 'patates', '0', '34', '2021-01-02 23:46:20'),
(73, 'patates', '56', '0', '2021-01-02 23:46:27'),
(74, 'patates', '0', '100', '2021-01-02 23:47:32'),
(75, 'patates', '1', '0', '2021-01-02 23:47:45'),
(76, 'patates', '1', '0', '2021-01-02 23:49:17'),
(77, 'patates', '1', '0', '2021-01-02 23:50:19'),
(78, 'patates', '0', '1', '2021-01-02 23:50:30'),
(79, 'patates', '12', '0', '2021-01-02 23:50:39'),
(80, 'yeşil fasulye', '0', '10', '2021-01-07 11:15:41'),
(81, 'yeşil fasulye', '0', '10', '2021-01-07 11:18:57'),
(82, 'yeşil fasulye', '0', '5', '2021-01-07 11:20:42'),
(83, 'yeşil fasulye', '0', '2', '2021-01-07 11:22:07'),
(84, 'yeşil fasulye', '0', '1', '2021-01-07 11:23:02'),
(85, 'yeşil fasulye', '0', '1', '2021-01-07 11:24:13'),
(86, 'yeşil fasulye', '0', '5', '2021-01-07 11:25:53'),
(87, 'yeşil fasulye', '0', '3', '2021-01-07 11:27:30'),
(88, 'yeşil fasulye', '0', '1', '2021-01-07 11:30:21'),
(89, 'yeşil fasulye', '0', '4', '2021-01-07 11:32:20'),
(90, 'yeşil fasulye', '0', '3', '2021-01-07 11:33:17'),
(91, 'yeşil fasulye', '0', '4', '2021-01-07 11:36:12'),
(92, 'yeşil fasulye', '0', '1', '2021-01-07 11:55:46'),
(93, 'yeşil fasulye', '0', '10', '2021-01-07 11:56:46'),
(94, 'yeşil fasulye', '0', '2', '2021-01-07 11:58:16'),
(95, 'yeşil fasulye', '0', '10', '2021-01-07 11:58:47'),
(96, 'yeşil fasulye', '10', '0', '2021-01-07 12:01:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `turu` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `stok` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `cizgi` int(50) NOT NULL,
  `bildirim` int(40) NOT NULL,
  `fiyat` int(30) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `onecikar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `adi`, `turu`, `stok`, `cizgi`, `bildirim`, `fiyat`, `idkategori`, `onecikar`) VALUES
(4, 'yeşil fasulye', 'Yaş Ürünler', '125', 40, 1, 19, 1, 1),
(5, 'nohut', 'meyveler', '98', 22, 1, 23, 1, 0),
(6, 'armut', 'Baklagiller', '7', 45, 0, 66, 1, 1),
(8, 'karpuz', 'meyveler', '99', 50, 0, 23, 2, 0),
(9, 'Kavun', 'meyveler', '70', 20, 1, 3, 3, 1),
(10, 'patates', 'meyveler', '41', 4, 1, 34, 3, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `alarm`
--
ALTER TABLE `alarm`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kasa`
--
ALTER TABLE `kasa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `site_kullanici`
--
ALTER TABLE `site_kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `alarm`
--
ALTER TABLE `alarm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `kasa`
--
ALTER TABLE `kasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Tablo için AUTO_INCREMENT değeri `site_kullanici`
--
ALTER TABLE `site_kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
