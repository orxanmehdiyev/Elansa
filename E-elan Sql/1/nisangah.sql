-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:53:01
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
-- Tablo için tablo yapısı `nisangah`
--

CREATE TABLE `nisangah` (
  `nisangah_id` int(11) UNSIGNED NOT NULL,
  `dovlet_id` int(11) UNSIGNED NOT NULL,
  `seher_id` bigint(20) UNSIGNED NOT NULL,
  `rayon_id` bigint(20) NOT NULL,
  `nisangah_ad` varchar(50) NOT NULL,
  `menziller_ucun_nisangah_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `nisangah`
--

INSERT INTO `nisangah` (`nisangah_id`, `dovlet_id`, `seher_id`, `rayon_id`, `nisangah_ad`, `menziller_ucun_nisangah_durum`) VALUES
(1, 12, 86, 21, '1-ci Mikrorayon', '1'),
(2, 12, 86, 21, '2-ci Mikrorayon', '1'),
(3, 12, 86, 21, '3-cü Mikrorayon', '1'),
(4, 12, 86, 21, 'Elit 57', '1'),
(5, 12, 86, 21, 'Cahan Gənclər Şəhərçiyi', '1'),
(6, 12, 86, 21, 'İpək Yolu Restoranı', '1'),
(7, 12, 86, 21, 'Sovedabad', '1'),
(8, 12, 86, 21, '4 Yol - 9 Mərtəbə', '1'),
(9, 12, 86, 21, 'Xıncov Məhəlləsi', '1'),
(10, 12, 86, 21, 'Çuxur Məhəlləsi', '1'),
(11, 12, 86, 21, 'Qurtlar Məhəlləsi', '1'),
(12, 12, 86, 21, 'Avtovağzal', '1'),
(13, 12, 86, 21, 'Rayon Merkezi', '1'),
(14, 12, 86, 21, 'Yeni Naxçıvan', '1'),
(15, 12, 86, 21, 'Cahan AVM', '1'),
(16, 12, 86, 21, 'Saat Meydanı', '1'),
(17, 12, 86, 21, 'Xanım Qızlar Məktəbi', '1'),
(18, 12, 86, 21, 'Kapital Bank', '1'),
(19, 12, 86, 21, 'Uşaq Şəhərciyi', '1'),
(20, 12, 86, 21, 'Respublika Xəstəxanası', '1'),
(21, 12, 86, 21, 'Üzgüçülük Mərkəzi', '1'),
(22, 12, 86, 21, 'Naxçıvan Dövlət Universiteti', '1'),
(23, 12, 86, 21, 'Naxçıvan Universiteti', '1'),
(24, 12, 86, 21, 'Böyük Bağ', '1'),
(25, 12, 86, 21, 'Gəlinqaya Restoranı', '1'),
(26, 12, 86, 21, 'Reyhan Restoranı', '1'),
(27, 12, 86, 21, 'Naxışnərgiz Restoranı', '1'),
(28, 12, 86, 21, 'Azərbaycan Məhəlləsi', '1'),
(29, 12, 86, 21, 'Təbriz Oteli', '1'),
(30, 12, 86, 21, 'Əliabad Qəsəbəsi', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `nisangah`
--
ALTER TABLE `nisangah`
  ADD PRIMARY KEY (`nisangah_id`),
  ADD UNIQUE KEY `nisangah_id` (`nisangah_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `nisangah`
--
ALTER TABLE `nisangah`
  MODIFY `nisangah_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
