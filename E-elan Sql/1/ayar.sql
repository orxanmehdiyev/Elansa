-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:32:59
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
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) UNSIGNED NOT NULL,
  `ayar_fav_iconu` varchar(50) NOT NULL,
  `ayar_tittle` varchar(250) NOT NULL,
  `ayar_site_adi` varchar(100) NOT NULL,
  `ayar_site_url` varchar(50) NOT NULL,
  `ayar_logo_img` varchar(250) NOT NULL,
  `ayar_logo_alt` varchar(255) NOT NULL,
  `ayar_logo_metni` varchar(255) NOT NULL,
  `ayar_description` varchar(250) NOT NULL,
  `ayar_keywords` varchar(50) NOT NULL,
  `ayar_author` varchar(50) NOT NULL,
  `ayar_tel` varchar(50) NOT NULL,
  `ayar_gsm` varchar(50) NOT NULL,
  `ayar_mail` varchar(50) NOT NULL,
  `ayar_mail_sifresi` varchar(100) NOT NULL,
  `ayar_POP3SunucuBaglantiTuru` varchar(3) NOT NULL,
  `ayar_POP3SunucuAdresi` varchar(100) NOT NULL,
  `ayar_POP3SunucusuSSLPortu` smallint(3) UNSIGNED NOT NULL,
  `ayar_POP3SunucusuTLSPortu` smallint(3) UNSIGNED NOT NULL,
  `ayar_SMTPSunucuBaglantiTuru` varchar(3) NOT NULL,
  `ayar_SMTPSunucuAdresi` varchar(100) NOT NULL,
  `ayar_SMTPSunucusuSSLPortu` smallint(3) UNSIGNED NOT NULL,
  `ayar_SMTPSunucusuTLSPortu` smallint(3) UNSIGNED NOT NULL,
  `ayar_IslemBasinaGonderilecekMailSayisi` smallint(3) UNSIGNED NOT NULL,
  `ayar_dovlet` int(11) UNSIGNED NOT NULL,
  `ayar_seher` varchar(50) NOT NULL,
  `ayar_post_indeksi` varchar(20) NOT NULL,
  `ayar_unvan` varchar(255) NOT NULL,
  `ayar_maps` varchar(250) NOT NULL,
  `ayar_analystic` varchar(50) NOT NULL,
  `ayar_zopim` varchar(250) NOT NULL,
  `ayar_facebook` varchar(50) NOT NULL,
  `ayar_twitter` varchar(50) NOT NULL,
  `ayar_google` varchar(50) NOT NULL,
  `ayar_youtube` varchar(50) NOT NULL,
  `ayar_elaqe_gorunus_metni` varchar(255) NOT NULL,
  `ayar_indi_zeng_et_metni` varchar(255) NOT NULL,
  `ayar_footer_metni` varchar(255) NOT NULL,
  `ayar_bakim` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_fav_iconu`, `ayar_tittle`, `ayar_site_adi`, `ayar_site_url`, `ayar_logo_img`, `ayar_logo_alt`, `ayar_logo_metni`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_mail`, `ayar_mail_sifresi`, `ayar_POP3SunucuBaglantiTuru`, `ayar_POP3SunucuAdresi`, `ayar_POP3SunucusuSSLPortu`, `ayar_POP3SunucusuTLSPortu`, `ayar_SMTPSunucuBaglantiTuru`, `ayar_SMTPSunucuAdresi`, `ayar_SMTPSunucusuSSLPortu`, `ayar_SMTPSunucusuTLSPortu`, `ayar_IslemBasinaGonderilecekMailSayisi`, `ayar_dovlet`, `ayar_seher`, `ayar_post_indeksi`, `ayar_unvan`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_google`, `ayar_youtube`, `ayar_elaqe_gorunus_metni`, `ayar_indi_zeng_et_metni`, `ayar_footer_metni`, `ayar_bakim`) VALUES
(0, 'img/fav/5fb7c880c053fb882dca84ecef65e29a.jpg', 'ƏMLAK ALQI-SATQISI', 'e-elan.com', 'http://www.e-elan.com', 'img/logo/orxanbfcc70d3242bfaea735d547c48f85001.PNG', 'orxan', 'e-elan.com', 'Əmalk Alqı Satqısı', 'e-elan...', 'e-elan....', '0502723383', '0602723383', 'info@e-elan.com', '13041987', 'SSl', 'pop.yandex.com.tr', 995, 110, 'SSL', 'smtp.yandex.com.tr', 465, 587, 1, 12, '12', 'Naxcivan Şəhəri', 'Naxcivan Şəhəri', 'ayar_maps_api', 'ayar_analystic', 'https://v2.zopim.com/?5DyUgwL2c2nc43kG0j9udM8FLxy9XfWX', 'www.facebook.com', 'www.twitter.com', 'www.google.com', 'www.youtube.com', '<p>Hər hansı bir sualınız, şərh və ya narahatlığınız varsa, Zəhmət olmasa, Qeyd edilmiş N&ouml;mrələrdən Reklam ş&ouml;bəsinə zəng edin</p>', 'İndi Zəng Edin:', '© 2020 || e-elan.com  ||  © || Bütün hüquqlar qorunur!', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
