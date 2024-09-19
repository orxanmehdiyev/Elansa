-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:34:48
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
-- Tablo için tablo yapısı `metro`
--

CREATE TABLE `metro` (
  `metro_id` bigint(20) UNSIGNED NOT NULL,
  `dovlet_id` bigint(20) UNSIGNED NOT NULL,
  `seher_id` bigint(20) UNSIGNED NOT NULL,
  `metro_ad` varchar(50) NOT NULL,
  `metro_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `metro`
--

INSERT INTO `metro` (`metro_id`, `dovlet_id`, `seher_id`, `metro_ad`, `metro_durum`) VALUES
(2, 12, 10, 'Həzi Aslanov', '1'),
(3, 12, 10, 'Əhmədli', '1'),
(4, 12, 10, 'Xalqlar Dostluğu', '1'),
(5, 12, 10, 'Neftçilər', '1'),
(6, 12, 10, 'Qara Qarayev', '1'),
(7, 12, 10, 'Koroğlu', '1'),
(8, 12, 10, 'Ulduz', '1'),
(9, 12, 10, 'Nəriman Nərimanov', '1'),
(10, 12, 10, 'Gənclik', '1'),
(11, 12, 10, '28 May', '1'),
(12, 12, 10, 'Nizami', '1'),
(13, 12, 10, 'Elmlər Akademiyası', '1'),
(14, 12, 10, 'İnşaatçılar', '1'),
(15, 12, 10, '20 Yanvar', '1'),
(16, 12, 10, 'Memar Əcəmi', '1'),
(17, 12, 10, 'Nəsimi', '1'),
(18, 12, 10, 'Azadlıq Prospekti', '1'),
(19, 12, 10, 'Cəfər Cabbarlı', '1'),
(20, 12, 10, 'Xətai', '1'),
(21, 12, 10, 'Sahil', '1'),
(22, 12, 10, 'İçəri Şəhər', '1'),
(23, 12, 10, 'Bakmil', '1'),
(24, 12, 10, 'Dərnəgül', '1'),
(25, 12, 10, 'Avtovağzal', '1'),
(26, 12, 10, 'Memar Əcəmi - 2', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `metro`
--
ALTER TABLE `metro`
  ADD PRIMARY KEY (`metro_id`),
  ADD UNIQUE KEY `metro_id` (`metro_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `metro`
--
ALTER TABLE `metro`
  MODIFY `metro_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
