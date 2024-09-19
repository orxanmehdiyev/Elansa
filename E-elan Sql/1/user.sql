-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:52
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
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `User_ID` bigint(20) NOT NULL,
  `user_seo_url` varchar(255) NOT NULL,
  `user_pasword` varchar(255) NOT NULL,
  `User_Ad` varchar(50) NOT NULL,
  `User_Soyad` varchar(50) NOT NULL,
  `User_TelefonBir` varchar(20) NOT NULL,
  `User_Telefon_Bir_Tesdiq` varchar(10) NOT NULL,
  `User_TelefonIki` varchar(20) NOT NULL,
  `User_Telefon_Iki_Tesdiq_Kod` varchar(10) NOT NULL,
  `User_Email` varchar(150) NOT NULL,
  `UserEmailTesdiqDurumu` enum('0','1') NOT NULL DEFAULT '0',
  `User_Email_Tesdiq_Kod` varchar(10) NOT NULL,
  `User_Ataadi` varchar(50) NOT NULL,
  `dogum_tarixi` varchar(10) NOT NULL,
  `user_cinsiyyet` enum('Kişi','Qadın') NOT NULL,
  `user_qaydalar_tesdiq` enum('on','off') NOT NULL,
  `User_Admin_Status` enum('0','1') NOT NULL DEFAULT '0',
  `User_Statusu` enum('0','1') NOT NULL DEFAULT '0',
  `User_Balans` float NOT NULL DEFAULT '0',
  `User_Qeydiyyat_Tarixi` varchar(19) NOT NULL,
  `User_Son_Giris_Tarixi` varchar(19) NOT NULL,
  `User_Son_Giris_IP` varchar(20) NOT NULL,
  `User_Istifadeci_Seo` varchar(255) NOT NULL,
  `User_Dovlet` bigint(20) UNSIGNED NOT NULL,
  `User_Seher` bigint(20) UNSIGNED NOT NULL,
  `User_Unvan` varchar(255) NOT NULL,
  `User_Post_Indeksi` varchar(10) NOT NULL,
  `User_Kimlik_Serya` varchar(10) NOT NULL,
  `User_Kimlik_Nomir` int(10) UNSIGNED NOT NULL,
  `User_Kimlik_Fin` varchar(10) NOT NULL,
  `User_yetgi` enum('0','1') NOT NULL DEFAULT '0',
  `admin_giriszamandamgasi` varchar(255) NOT NULL,
  `admi_giris_zaman` varchar(19) NOT NULL,
  `admin_giris_ip` varchar(15) NOT NULL,
  `user_qeydiyyat_meksedi` enum('Fiziki','Hüquqi','Fiziki Kommersiya') NOT NULL DEFAULT 'Fiziki',
  `user_sifreyenilezamandamgasi` varchar(11) NOT NULL,
  `user_sifreYenilezaman` varchar(20) NOT NULL,
  `user_sifreyenilekod` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`User_ID`, `user_seo_url`, `user_pasword`, `User_Ad`, `User_Soyad`, `User_TelefonBir`, `User_Telefon_Bir_Tesdiq`, `User_TelefonIki`, `User_Telefon_Iki_Tesdiq_Kod`, `User_Email`, `UserEmailTesdiqDurumu`, `User_Email_Tesdiq_Kod`, `User_Ataadi`, `dogum_tarixi`, `user_cinsiyyet`, `user_qaydalar_tesdiq`, `User_Admin_Status`, `User_Statusu`, `User_Balans`, `User_Qeydiyyat_Tarixi`, `User_Son_Giris_Tarixi`, `User_Son_Giris_IP`, `User_Istifadeci_Seo`, `User_Dovlet`, `User_Seher`, `User_Unvan`, `User_Post_Indeksi`, `User_Kimlik_Serya`, `User_Kimlik_Nomir`, `User_Kimlik_Fin`, `User_yetgi`, `admin_giriszamandamgasi`, `admi_giris_zaman`, `admin_giris_ip`, `user_qeydiyyat_meksedi`, `user_sifreyenilezamandamgasi`, `user_sifreYenilezaman`, `user_sifreyenilekod`) VALUES
(63, 'orxanmehdiyev', '2ccf4dfd7c9fc8ff00c054f1819b27a9', 'Orxan', 'Mehdiyev', '0502723383', '', '', '', 'orxanmehdiyev1987@gmail.com', '1', '', '', '', 'Kişi', 'on', '1', '0', 0, '11.01.2021 23:47:52', '', '', '$2y$10$V6YZcIE2vwwXfQV6cbdM6Oem/AU7JLmQz.BGqH4VZSTeyy.MEoEyC', 0, 0, '', '', '', 0, '', '0', '', '', '', 'Fiziki', '', '', ''),
(64, 'orxanmehdiyev', '2ccf4dfd7c9fc8ff00c054f1819b27a9', 'Orxan', 'Mehdiyev', '0502223232', '', '', '', 'elans@orayhus.com', '0', '620263', '', '', 'Kişi', 'on', '0', '0', 0, '23.01.2021 16:00:42', '', '', '$2y$10$.tELGgELw66056UMg8Du9OElwsmq0j3YsOrXZ/HYl5.zIWI8Kq8pe', 0, 0, '', '', '', 0, '', '0', '', '', '', 'Fiziki', '', '', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
