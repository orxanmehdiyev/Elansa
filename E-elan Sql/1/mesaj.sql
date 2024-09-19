-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:34:44
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
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `mesaj_id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `mesaj_id_kod` varchar(255) NOT NULL,
  `mesaj_tel` varchar(20) NOT NULL,
  `mesaj_email` varchar(150) NOT NULL,
  `mesaj_ad` varchar(30) NOT NULL,
  `mesaj_soyad` varchar(30) NOT NULL,
  `mesaj_icerik` text NOT NULL,
  `mesaj_durum` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `mesaj_ulduz_durum` enum('1','2') NOT NULL DEFAULT '1',
  `mesaj_onemli_durum` enum('1','2') NOT NULL DEFAULT '1',
  `mesaj_okundu_durum` enum('0','1') NOT NULL DEFAULT '0',
  `mesaj_sil_durum` enum('0','1') NOT NULL DEFAULT '0',
  `mesaj_tarix` varchar(50) NOT NULL,
  `mesaj_zaman_damgasi` bigint(20) NOT NULL,
  `mesaj_seo` varchar(255) NOT NULL,
  `mesaj_gelen_ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`mesaj_id`, `mesaj_id_kod`, `mesaj_tel`, `mesaj_email`, `mesaj_ad`, `mesaj_soyad`, `mesaj_icerik`, `mesaj_durum`, `mesaj_ulduz_durum`, `mesaj_onemli_durum`, `mesaj_okundu_durum`, `mesaj_sil_durum`, `mesaj_tarix`, `mesaj_zaman_damgasi`, `mesaj_seo`, `mesaj_gelen_ip`) VALUES
(00000000000000000051, '$2y$10$tNogoAAnbvKvGaQhjpMQd.jikR3kEYZotRFnIfwf.Cmzsaph9H6La', '2344234', 'orxanmehdiyev1987@gmail.com', 'Sdfsdf', 'Mehdiyev', 'üerüer', '0', '2', '2', '1', '1', '31.01.2020 17:12:04', 1580476324, '6d244ce412cabee103cc3165aa15948d', '::1'),
(00000000000000000052, '$2y$10$m294DGBJ73iey.PFUOkOa.RbO7cLpdZV4.e2Gcowe0NoplCyzoHrO', '6546546546', 'orxanmehdiyev1987@gmail.com', 'Orxan', 'Sdfsf', 'jhgkjkhgkjh', '0', '2', '2', '1', '1', '05.02.2020 12:34:52', 1580891692, '9dc04ab6795dc06c17193372749a3140', '::1'),
(00000000000000000053, '$2y$10$hdD0ZsKP8jFlFE2M4SiaR.KVMrWdhReI6BeNMeXOzGiWxIBzlU5mK', '564565', 'orxanmehdiyev1987@gmail.com', 'Orxan', 'Mehdiyev', 'hjkjhgjkhg', '0', '1', '1', '1', '1', '05.02.2020 12:39:18', 1580891958, 'e9a2fa710d2a1ddf6244582121204826', '::1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `mesaj_id` bigint(20) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
