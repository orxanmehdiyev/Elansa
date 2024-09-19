-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:32:25
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eelan`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `avtomobilmuherrikhecmi`
--

CREATE TABLE `avtomobilmuherrikhecmi` (
  `avtomobilmuherrikhecmi_id` int(11) UNSIGNED NOT NULL,
  `avtomobilmuherrikhecmi_ad` int(6) UNSIGNED NOT NULL,
  `avtomobilmuherrikhecmi_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `avtomobilmuherrikhecmi`
--

INSERT INTO `avtomobilmuherrikhecmi` (`avtomobilmuherrikhecmi_id`, `avtomobilmuherrikhecmi_ad`, `avtomobilmuherrikhecmi_durum`) VALUES
(1, 50, '1'),
(2, 100, '1'),
(3, 150, '1'),
(4, 200, '1'),
(5, 250, '1'),
(7, 300, '1'),
(8, 350, '1'),
(9, 400, '1'),
(10, 450, '1'),
(11, 500, '1'),
(12, 600, '1'),
(13, 700, '1'),
(14, 800, '1'),
(15, 900, '1'),
(16, 1000, '1'),
(17, 1100, '1'),
(18, 1200, '1'),
(19, 1300, '1'),
(20, 1400, '1'),
(21, 1500, '1'),
(22, 1600, '1'),
(23, 1700, '1'),
(24, 1800, '1'),
(25, 1900, '1'),
(26, 2000, '1'),
(27, 2100, '1'),
(28, 2200, '1'),
(29, 2300, '1'),
(30, 2400, '1'),
(31, 2500, '1'),
(32, 2600, '1'),
(33, 2700, '1'),
(34, 2800, '1'),
(35, 2900, '1'),
(36, 3000, '1'),
(37, 3100, '1'),
(38, 3200, '1'),
(39, 3300, '1'),
(40, 3400, '1'),
(41, 3500, '1'),
(42, 3600, '1'),
(43, 3700, '1'),
(44, 3800, '1'),
(45, 3900, '1'),
(46, 4000, '1'),
(47, 4100, '1'),
(48, 4200, '1'),
(49, 4300, '1'),
(50, 4400, '1'),
(51, 4500, '1'),
(52, 4600, '1'),
(53, 4700, '1'),
(54, 4800, '1'),
(55, 4900, '1'),
(56, 5000, '1'),
(57, 5100, '1'),
(58, 5200, '1'),
(59, 5300, '1'),
(60, 5400, '1'),
(61, 5500, '1'),
(62, 5600, '1'),
(63, 5700, '1'),
(64, 5800, '1'),
(65, 5900, '1'),
(66, 6000, '1'),
(67, 6100, '1'),
(68, 6200, '1'),
(69, 6300, '1'),
(70, 6400, '1'),
(71, 6500, '1'),
(72, 7000, '1'),
(73, 8000, '1'),
(74, 9000, '1'),
(75, 10000, '1'),
(76, 11000, '1'),
(77, 12000, '1'),
(78, 13000, '1'),
(79, 14000, '1'),
(80, 15000, '1'),
(81, 16000, '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `avtomobilmuherrikhecmi`
--
ALTER TABLE `avtomobilmuherrikhecmi`
  ADD PRIMARY KEY (`avtomobilmuherrikhecmi_id`),
  ADD UNIQUE KEY `avtomobilmuherrikhecmi_id` (`avtomobilmuherrikhecmi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `avtomobilmuherrikhecmi`
--
ALTER TABLE `avtomobilmuherrikhecmi`
  MODIFY `avtomobilmuherrikhecmi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
