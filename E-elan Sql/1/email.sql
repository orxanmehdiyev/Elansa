-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:34:03
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
-- Tablo için tablo yapısı `email`
--

CREATE TABLE `email` (
  `email_id` bigint(20) NOT NULL,
  `email_ad` varchar(50) NOT NULL,
  `email_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `email`
--

INSERT INTO `email` (`email_id`, `email_ad`, `email_durum`) VALUES
(1, 'orxanmehdiyevs1987@gmail.com', '0'),
(2, 'orayhus@gmail.com', '0'),
(3, 'orayhuss@gmail.com', '0'),
(5, 'makler@gmail.com', '0'),
(6, 'mqalib@gmail.com', '0'),
(7, 'orxan@bsox.az', '0'),
(8, 'orxanmehdiyev1987@gmail.com', '0'),
(9, 'natrokontrolnatro@gmail.com', '0'),
(10, 'mgosgaror@gmail.com', '0'),
(11, 'abbasovhuseyn670@gmail.com', '0'),
(12, 'qalibmammad@gmail.com', '0'),
(13, 'elans@orayhus.com', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `email`
--
ALTER TABLE `email`
  MODIFY `email_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
