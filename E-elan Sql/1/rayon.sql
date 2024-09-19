-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:16
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
-- Tablo için tablo yapısı `rayon`
--

CREATE TABLE `rayon` (
  `rayon_id` bigint(20) UNSIGNED NOT NULL,
  `dovlet_id` bigint(20) UNSIGNED NOT NULL,
  `seher_id` varchar(20) NOT NULL,
  `rayon_ad` varchar(50) NOT NULL,
  `rayon_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `rayon`
--

INSERT INTO `rayon` (`rayon_id`, `dovlet_id`, `seher_id`, `rayon_ad`, `rayon_durum`) VALUES
(1, 12, '10', 'Binəqədi', '1'),
(2, 12, '10', 'Qaradağ', '1'),
(3, 12, '10', 'Xəzər', '1'),
(4, 12, '10', 'Xətai', '1'),
(5, 12, '10', 'Nərimanov', '1'),
(6, 12, '10', 'Nəsimi', '1'),
(7, 12, '10', 'Nizami', '1'),
(8, 12, '10', 'Sabunçu', '1'),
(9, 12, '10', 'Səbail', '1'),
(10, 12, '10', 'Suraxanı', '1'),
(11, 12, '10', 'Yasamal', '1'),
(20, 12, '10', 'Abşeron', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`rayon_id`),
  ADD UNIQUE KEY `rayon_id` (`rayon_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `rayon`
--
ALTER TABLE `rayon`
  MODIFY `rayon_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
