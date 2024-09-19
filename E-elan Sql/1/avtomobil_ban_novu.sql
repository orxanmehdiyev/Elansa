-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:32:36
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
-- Tablo için tablo yapısı `avtomobil_ban_novu`
--

CREATE TABLE `avtomobil_ban_novu` (
  `avtomobil_ban_novu_id` int(11) UNSIGNED NOT NULL,
  `avtomobil_ban_novu_ad` varchar(55) NOT NULL,
  `avtomobil_ban_novu_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `avtomobil_ban_novu`
--

INSERT INTO `avtomobil_ban_novu` (`avtomobil_ban_novu_id`, `avtomobil_ban_novu_ad`, `avtomobil_ban_novu_durum`) VALUES
(1, 'Avtobus', '1'),
(2, 'Dartqı', '1'),
(3, 'Furqon', '1'),
(4, 'Hetçbek / Liftbek', '1'),
(5, 'Kabrio', '1'),
(6, 'Kupe', '1'),
(7, 'Mikroavtobus', '1'),
(8, 'Minivan', '1'),
(9, 'Motosiklet', '1'),
(10, 'Offroader / SUV', '1'),
(11, 'Pikap', '1'),
(12, 'Qolfkar', '1'),
(13, 'Rodster', '1'),
(14, 'Sedan', '1'),
(15, 'Universal', '1'),
(16, 'Van', '1'),
(17, 'Yük maşını', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `avtomobil_ban_novu`
--
ALTER TABLE `avtomobil_ban_novu`
  ADD PRIMARY KEY (`avtomobil_ban_novu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `avtomobil_ban_novu`
--
ALTER TABLE `avtomobil_ban_novu`
  MODIFY `avtomobil_ban_novu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
