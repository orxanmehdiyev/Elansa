-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:33
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
-- Tablo için tablo yapısı `sifremiunutdumkodtelebi`
--

CREATE TABLE `sifremiunutdumkodtelebi` (
  `sifremiunutdumkodtelebi_id` bigint(20) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Zaman_Damgasi` bigint(20) NOT NULL,
  `Tarix_Saat` varchar(20) NOT NULL,
  `user_sifreyenilekod` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `sifremiunutdumkodtelebi`
--
ALTER TABLE `sifremiunutdumkodtelebi`
  ADD PRIMARY KEY (`sifremiunutdumkodtelebi_id`),
  ADD UNIQUE KEY `sifremiunutdumkodtelebi_id` (`sifremiunutdumkodtelebi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sifremiunutdumkodtelebi`
--
ALTER TABLE `sifremiunutdumkodtelebi`
  MODIFY `sifremiunutdumkodtelebi_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
