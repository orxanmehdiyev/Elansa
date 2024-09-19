-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:33:28
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
-- Tablo için tablo yapısı `elansikayet`
--

CREATE TABLE `elansikayet` (
  `elansikayet_id` bigint(20) NOT NULL,
  `elan_id` bigint(20) NOT NULL,
  `User_ID` int(20) NOT NULL,
  `IP_adresi` varchar(20) NOT NULL,
  `elansikayet_email` varchar(100) NOT NULL,
  `elansikayet_sebebi` varchar(255) NOT NULL,
  `ZamanDamgasi` int(20) NOT NULL,
  `TarixSaat` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `elansikayet`
--

INSERT INTO `elansikayet` (`elansikayet_id`, `elan_id`, `User_ID`, `IP_adresi`, `elansikayet_email`, `elansikayet_sebebi`, `ZamanDamgasi`, `TarixSaat`) VALUES
(1, 330, 0, '::1', 'asdas@sad.sadsa', 'adasd', 1587498548, '21.04.2020 23:49:08'),
(2, 330, 0, '::1', 'asdas@sad.sadsa', 'ZxZX', 1587498574, '21.04.2020 23:49:34'),
(3, 359, 57, '185.47.7.10', 'mqalib@gmail.com', 'Bu erroru verir', 1588105639, '29.04.2020 00:27:19');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `elansikayet`
--
ALTER TABLE `elansikayet`
  ADD PRIMARY KEY (`elansikayet_id`),
  ADD UNIQUE KEY `elansikayet_id` (`elansikayet_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `elansikayet`
--
ALTER TABLE `elansikayet`
  MODIFY `elansikayet_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
