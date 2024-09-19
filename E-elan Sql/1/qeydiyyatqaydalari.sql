-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:11
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
-- Tablo için tablo yapısı `qeydiyyatqaydalari`
--

CREATE TABLE `qeydiyyatqaydalari` (
  `qeydiyyatqaydalari_id` int(11) NOT NULL,
  `qeydiyyatqaydalari_ad` text NOT NULL,
  `qeydiyyatqaydalari_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `qeydiyyatqaydalari`
--
ALTER TABLE `qeydiyyatqaydalari`
  ADD PRIMARY KEY (`qeydiyyatqaydalari_id`),
  ADD UNIQUE KEY `qeydiyyatqaydalari_id` (`qeydiyyatqaydalari_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `qeydiyyatqaydalari`
--
ALTER TABLE `qeydiyyatqaydalari`
  MODIFY `qeydiyyatqaydalari_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
