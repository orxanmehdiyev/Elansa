-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:33:41
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
-- Tablo için tablo yapısı `elan_suretli_satma_serti`
--

CREATE TABLE `elan_suretli_satma_serti` (
  `elan_suretli_satma_serti_id` int(11) UNSIGNED NOT NULL,
  `elan_suretli_satma_serti_adi` varchar(255) NOT NULL,
  `elan_suretli_satma_serti_durum` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `elan_suretli_satma_serti`
--

INSERT INTO `elan_suretli_satma_serti` (`elan_suretli_satma_serti_id`, `elan_suretli_satma_serti_adi`, `elan_suretli_satma_serti_durum`) VALUES
(12, 'Eyni elansı bir neçə dəfə təqdim etməyin.', '2'),
(13, 'Təsvir və ya şəkillərdə telefon, email və ya sayt ünvanı göstərməyin.', '2'),
(14, 'Ad yerində qiymət yazmayın - bunun üçün ayrıca yer var.', '2'),
(15, 'Qadağan olunmuş məhsulları satmayın.', '2');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `elan_suretli_satma_serti`
--
ALTER TABLE `elan_suretli_satma_serti`
  ADD PRIMARY KEY (`elan_suretli_satma_serti_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `elan_suretli_satma_serti`
--
ALTER TABLE `elan_suretli_satma_serti`
  MODIFY `elan_suretli_satma_serti_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
