-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:33:59
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
-- Tablo için tablo yapısı `elektronika_mal_novu`
--

CREATE TABLE `elektronika_mal_novu` (
  `elektronika_mal_novu_id` int(11) UNSIGNED NOT NULL,
  `elektronika_mal_novu_ad` varchar(50) NOT NULL,
  `audio_video_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `elektronika_mal_novu`
--

INSERT INTO `elektronika_mal_novu` (`elektronika_mal_novu_id`, `elektronika_mal_novu_ad`, `audio_video_durum`) VALUES
(1, 'Dinamik', '0'),
(2, 'Dinamik', '0'),
(3, 'aaaaa', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `elektronika_mal_novu`
--
ALTER TABLE `elektronika_mal_novu`
  ADD PRIMARY KEY (`elektronika_mal_novu_id`),
  ADD UNIQUE KEY `elektronika_mal_novu_id` (`elektronika_mal_novu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `elektronika_mal_novu`
--
ALTER TABLE `elektronika_mal_novu`
  MODIFY `elektronika_mal_novu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
