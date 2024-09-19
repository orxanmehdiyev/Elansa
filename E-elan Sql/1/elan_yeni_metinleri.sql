-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:33:54
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
-- Tablo için tablo yapısı `elan_yeni_metinleri`
--

CREATE TABLE `elan_yeni_metinleri` (
  `elan_yeni_id` int(1) UNSIGNED NOT NULL,
  `elan_yeni_basliq_metni` varchar(255) NOT NULL,
  `elan_yeni_sag_reklam_basligi` varchar(255) NOT NULL,
  `elan_yeni_sag_reklam_metni` varchar(255) NOT NULL,
  `elan_yeni_reklam_one_cixarma_metni` varchar(255) NOT NULL,
  `elan_yeni__satici_bilgileri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `elan_yeni_metinleri`
--

INSERT INTO `elan_yeni_metinleri` (`elan_yeni_id`, `elan_yeni_basliq_metni`, `elan_yeni_sag_reklam_basligi`, `elan_yeni_sag_reklam_metni`, `elan_yeni_reklam_one_cixarma_metni`, `elan_yeni__satici_bilgileri`) VALUES
(1, 'pulsuz elan yerləşdirin', 'pulsuz elan göndər', 'pulsuz, onlin, elanlarınızı bizimlə paylaşın ki! istəyinizə tez catasınız', 'Neçə sürətli satmalı?', 'Sizin Məlumatlarınız');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `elan_yeni_metinleri`
--
ALTER TABLE `elan_yeni_metinleri`
  ADD PRIMARY KEY (`elan_yeni_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `elan_yeni_metinleri`
--
ALTER TABLE `elan_yeni_metinleri`
  MODIFY `elan_yeni_id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
