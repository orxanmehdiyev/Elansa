-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:48
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
-- Tablo için tablo yapısı `telefon_markasi`
--

CREATE TABLE `telefon_markasi` (
  `telefon_markasi_id` int(11) UNSIGNED NOT NULL,
  `telefon_markasi_ad` varchar(50) NOT NULL,
  `telefon_markasi_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `telefon_markasi`
--

INSERT INTO `telefon_markasi` (`telefon_markasi_id`, `telefon_markasi_ad`, `telefon_markasi_durum`) VALUES
(3, 'Samsung', '1'),
(4, 'Apple', '1'),
(5, 'Acer', '1'),
(6, 'Alcatel', '1'),
(9, 'Amoi', '1'),
(10, 'Asus', '1'),
(11, 'BenQ-Siemens', '1'),
(12, 'BlackBerry', '1'),
(13, 'Casio', '1'),
(14, 'Dell', '1'),
(15, 'Ericson', '1'),
(16, 'Google', '1'),
(17, 'Honor', '1'),
(18, 'Huawei', '1'),
(19, 'Lenovo', '1'),
(20, 'Microsoft', '1'),
(21, 'Nokia', '1'),
(22, 'OnePlus', '1'),
(23, 'Oppo', '1'),
(24, 'Panasonic', '1'),
(25, 'Philips', '1'),
(26, 'Sony', '1'),
(27, 'Vertu', '1'),
(28, 'Xiaomi', '1'),
(29, 'ZTE', '1'),
(30, 'Tecno', '1'),
(31, 'uleFone', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `telefon_markasi`
--
ALTER TABLE `telefon_markasi`
  ADD PRIMARY KEY (`telefon_markasi_id`),
  ADD UNIQUE KEY `telefon_id` (`telefon_markasi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `telefon_markasi`
--
ALTER TABLE `telefon_markasi`
  MODIFY `telefon_markasi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
