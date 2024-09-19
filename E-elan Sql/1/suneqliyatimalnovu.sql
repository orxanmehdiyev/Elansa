-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:43
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
-- Tablo için tablo yapısı `suneqliyatimalnovu`
--

CREATE TABLE `suneqliyatimalnovu` (
  `suneqliyatimalnovu_id` int(11) UNSIGNED NOT NULL,
  `suneqliyatimalnovu_ad` varchar(50) NOT NULL,
  `suneqliyatimalnovu_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `suneqliyatimalnovu`
--

INSERT INTO `suneqliyatimalnovu` (`suneqliyatimalnovu_id`, `suneqliyatimalnovu_ad`, `suneqliyatimalnovu_durum`) VALUES
(1, 'Hidrosikl', '1'),
(2, 'Kater', '1'),
(3, 'Yaxta', '1'),
(4, 'Mühərrikli Qayıq', '1'),
(5, 'Hava Qayıqı', '1'),
(6, 'Digər Su Nəqliyyatı Vasitələri', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `suneqliyatimalnovu`
--
ALTER TABLE `suneqliyatimalnovu`
  ADD PRIMARY KEY (`suneqliyatimalnovu_id`),
  ADD UNIQUE KEY `suneqliyatimalnovu_id` (`suneqliyatimalnovu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `suneqliyatimalnovu`
--
ALTER TABLE `suneqliyatimalnovu`
  MODIFY `suneqliyatimalnovu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
