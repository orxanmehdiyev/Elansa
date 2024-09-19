-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:34:09
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
-- Tablo için tablo yapısı `emlakin_veziyyeti`
--

CREATE TABLE `emlakin_veziyyeti` (
  `emlakin_veziyyeti_id` int(11) NOT NULL,
  `emlakin_veziyyeti_ad` varchar(50) NOT NULL,
  `menzil_elanlari_ucun_durum` enum('0','1') NOT NULL,
  `qaraj_elanlari_ucun_durum` enum('0','1') NOT NULL DEFAULT '0',
  `avtomobil_elanlari_ucun_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `emlakin_veziyyeti`
--

INSERT INTO `emlakin_veziyyeti` (`emlakin_veziyyeti_id`, `emlakin_veziyyeti_ad`, `menzil_elanlari_ucun_durum`, `qaraj_elanlari_ucun_durum`, `avtomobil_elanlari_ucun_durum`) VALUES
(1, 'Tam təmirli', '1', '1', '0'),
(2, 'Orta təmirli', '0', '1', '0'),
(4, 'Təmirsiz', '1', '1', '0'),
(5, 'Yeni', '0', '0', '1'),
(6, 'İstifadə Olunmuş', '0', '0', '1'),
(7, 'Natamam təmirli', '0', '0', '0'),
(8, 'Zəif təmirli', '1', '0', '0'),
(9, 'Yaxşı təmirli', '0', '0', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `emlakin_veziyyeti`
--
ALTER TABLE `emlakin_veziyyeti`
  ADD PRIMARY KEY (`emlakin_veziyyeti_id`),
  ADD UNIQUE KEY `veziyyetitikilinin_id` (`emlakin_veziyyeti_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `emlakin_veziyyeti`
--
ALTER TABLE `emlakin_veziyyeti`
  MODIFY `emlakin_veziyyeti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
