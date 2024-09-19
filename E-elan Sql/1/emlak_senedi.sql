-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:34:18
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
-- Tablo için tablo yapısı `emlak_senedi`
--

CREATE TABLE `emlak_senedi` (
  `emlak_senedi_id` int(11) UNSIGNED NOT NULL,
  `emlak_senedi_ad` varchar(50) NOT NULL,
  `menziller_ucun_emlak_senedi_durum` enum('0','1') NOT NULL DEFAULT '0',
  `avtomobiller_ucun_emlak_senedi_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `emlak_senedi`
--

INSERT INTO `emlak_senedi` (`emlak_senedi_id`, `emlak_senedi_ad`, `menziller_ucun_emlak_senedi_durum`, `avtomobiller_ucun_emlak_senedi_durum`) VALUES
(1, 'Çıxarış (Kupça)', '1', '0'),
(2, 'Müqavilə', '1', '0'),
(3, 'Bələdiyyə Sənədi', '1', '0'),
(4, 'Sərəncam', '1', '0'),
(5, 'Etibarnamə', '1', '0'),
(8, 'Order', '1', '0'),
(9, 'Qeydiyyat Vərəqəsi', '1', '0'),
(10, 'Şəhadətnamə', '1', '0'),
(11, 'Sənədlər Qaydasında', '1', '0'),
(12, 'Yoxdur', '1', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `emlak_senedi`
--
ALTER TABLE `emlak_senedi`
  ADD PRIMARY KEY (`emlak_senedi_id`),
  ADD UNIQUE KEY `emlak_senedi_id` (`emlak_senedi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `emlak_senedi`
--
ALTER TABLE `emlak_senedi`
  MODIFY `emlak_senedi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
