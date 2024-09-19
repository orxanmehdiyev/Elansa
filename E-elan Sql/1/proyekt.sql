-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:07
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
-- Tablo için tablo yapısı `proyekt`
--

CREATE TABLE `proyekt` (
  `proyekt_id` int(11) UNSIGNED NOT NULL,
  `proyekt_ad` varchar(50) NOT NULL,
  `menziller_ucun_proyekt_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `proyekt`
--

INSERT INTO `proyekt` (`proyekt_id`, `proyekt_ad`, `menziller_ucun_proyekt_durum`) VALUES
(1, 'Xruşovka', '1'),
(2, 'Stalinka', '1'),
(3, 'Kiyev', '1'),
(4, 'Leninqrad', '1'),
(5, 'Minsk', '1'),
(6, 'İtalyanka', '1'),
(7, 'Arxitekturni', '1'),
(8, 'Eksperimental', '1'),
(9, 'Amerikanka', '1'),
(10, 'Fransız', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `proyekt`
--
ALTER TABLE `proyekt`
  ADD PRIMARY KEY (`proyekt_id`),
  ADD UNIQUE KEY `proyekt_id` (`proyekt_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `proyekt`
--
ALTER TABLE `proyekt`
  MODIFY `proyekt_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
