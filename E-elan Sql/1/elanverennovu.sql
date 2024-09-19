-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:33:32
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
-- Tablo için tablo yapısı `elanverennovu`
--

CREATE TABLE `elanverennovu` (
  `elanverennovu_id` int(11) UNSIGNED NOT NULL,
  `elanverennovu_ad` varchar(55) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `menzillerucun_elanverennovu_durum` enum('0','1') CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `elanverennovu`
--

INSERT INTO `elanverennovu` (`elanverennovu_id`, `elanverennovu_ad`, `menzillerucun_elanverennovu_durum`) VALUES
(4, 'Əmlak Sahibi', '1'),
(9, 'Vasitəçi/Rieltor', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `elanverennovu`
--
ALTER TABLE `elanverennovu`
  ADD PRIMARY KEY (`elanverennovu_id`),
  ADD UNIQUE KEY `elanverennovu` (`elanverennovu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `elanverennovu`
--
ALTER TABLE `elanverennovu`
  MODIFY `elanverennovu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
