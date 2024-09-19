-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:33:23
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
-- Tablo için tablo yapısı `elan`
--

CREATE TABLE `elan` (
  `elan_id` bigint(20) UNSIGNED NOT NULL,
  `elan_id_kod` varchar(255) NOT NULL,
  `karoqoriya_id` int(11) UNSIGNED NOT NULL,
  `yeni` enum('0','1') NOT NULL DEFAULT '0',
  `bolme_id` int(11) UNSIGNED NOT NULL,
  `elan_novu` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_seo_url` varchar(255) NOT NULL,
  `ad` varchar(15) NOT NULL,
  `soyad` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `emlakin_veziyyeti` int(2) NOT NULL,
  `elan_adi` varchar(50) NOT NULL,
  `dovlet_ad` int(11) NOT NULL,
  `seher_id` int(11) UNSIGNED NOT NULL,
  `seher` varchar(30) NOT NULL,
  `elan_zaman_damgasi` int(11) UNSIGNED NOT NULL,
  `elan_zaman` varchar(20) NOT NULL,
  `elan_yenilenme_zaman_damgasi` bigint(20) UNSIGNED NOT NULL,
  `elan_yenilenme_zamani` varchar(20) NOT NULL,
  `rayon_id` int(11) UNSIGNED NOT NULL,
  `metro_id` int(11) UNSIGNED NOT NULL,
  `nisangah_id` int(11) UNSIGNED NOT NULL,
  `qiymet` float NOT NULL,
  `pul_novu` enum('AZN','USD','EUR') NOT NULL,
  `mezmun` text NOT NULL,
  `qaz` enum('on','off') NOT NULL DEFAULT 'off',
  `internet` enum('on','off') DEFAULT 'off',
  `telefon` enum('on','off') NOT NULL DEFAULT 'off',
  `hovuz` enum('on','off') NOT NULL DEFAULT 'off',
  `kombisistemi` enum('on','off') NOT NULL DEFAULT 'off',
  `su` enum('on','off') NOT NULL DEFAULT 'off',
  `isiq` enum('on','off') NOT NULL DEFAULT 'off',
  `lift` enum('on','off') NOT NULL DEFAULT 'off',
  `kamera` enum('on','off') NOT NULL DEFAULT 'off',
  `avtodayanacaq` enum('on','off') NOT NULL DEFAULT 'off',
  `balkon` enum('on','off') NOT NULL DEFAULT 'off',
  `zirzemi` enum('on','off') NOT NULL DEFAULT 'off',
  `esyali` enum('on','off') NOT NULL DEFAULT 'off',
  `artirma` enum('on','off') NOT NULL DEFAULT 'off',
  `kondisoner` enum('on','off') NOT NULL DEFAULT 'off',
  `marka_id` int(11) NOT NULL,
  `marka_ad` varchar(30) NOT NULL,
  `model_id` int(11) NOT NULL,
  `model_ad` varchar(30) NOT NULL,
  `avto_marka` int(11) UNSIGNED NOT NULL,
  `avto_model` int(11) UNSIGNED NOT NULL,
  `avto_ban_novu` int(11) NOT NULL,
  `avto_yurus_km` int(7) UNSIGNED NOT NULL,
  `reng` int(11) UNSIGNED NOT NULL,
  `yanacaq_novu` int(11) NOT NULL,
  `avto_otrucu` int(11) NOT NULL,
  `avto_suret_qutusu` int(11) NOT NULL,
  `muherrikin_at_gucu` int(5) UNSIGNED NOT NULL,
  `kredit_var` enum('on','off') NOT NULL DEFAULT 'off',
  `barter_var` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_yungul_lehimli_diskler` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_merkezi_qapanma` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_deri_salon` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_otracaqlarin_isidilmesi` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_abs` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_park_radari` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_ksenon_lampa` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_luk` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_arxa_goruntu_kamerasi` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_on_goruntu_kamerasi` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_on_radar` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_yagis` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_isiq_sensoru` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_yan_perde` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_arxa_perde` enum('on','off') NOT NULL DEFAULT 'off',
  `avto_muherrikin_hecmi` int(7) UNSIGNED NOT NULL,
  `avto_ban_nomresi` varchar(100) NOT NULL,
  `buraxilis_ili` int(4) UNSIGNED NOT NULL,
  `binatipi_id` int(11) UNSIGNED NOT NULL,
  `umumi_sahesi` int(7) UNSIGNED NOT NULL,
  `emlak_senedi_id` int(11) UNSIGNED NOT NULL,
  `proyekt_id` int(11) UNSIGNED NOT NULL,
  `yasayis_sahesi` int(7) UNSIGNED NOT NULL,
  `otaq_sayi` int(3) NOT NULL,
  `yerlesdiyi_mertebe` int(3) UNSIGNED NOT NULL,
  `binaninmertebesayi` int(4) UNSIGNED NOT NULL,
  `yerlesdiyiblok` varchar(30) NOT NULL,
  `menzil_veziyyeti` varchar(30) NOT NULL,
  `unvan` varchar(255) NOT NULL,
  `elan_veren` int(11) UNSIGNED NOT NULL,
  `emlakin_novu` varchar(9) NOT NULL,
  `torpaqsahesi` int(6) UNSIGNED NOT NULL,
  `malin_novu` int(5) UNSIGNED NOT NULL,
  `fealiyyet_novu` int(6) UNSIGNED NOT NULL,
  `cins` enum('0','1') NOT NULL,
  `xidmet_novu` int(1) UNSIGNED NOT NULL,
  `geyim_tipi` int(1) UNSIGNED NOT NULL,
  `geyim_novu` int(1) UNSIGNED NOT NULL,
  `malın_tipi` int(1) UNSIGNED NOT NULL,
  `operator` int(1) UNSIGNED NOT NULL,
  `telefon_bir` varchar(20) NOT NULL,
  `telefon_iki` varchar(20) NOT NULL,
  `qaydalarioxudum` varchar(2) NOT NULL,
  `prosessor_id` int(11) UNSIGNED NOT NULL,
  `yaddas` int(11) UNSIGNED NOT NULL,
  `disk_adi` int(1) UNSIGNED NOT NULL,
  `operativyaddas_id` int(11) UNSIGNED NOT NULL,
  `display_duyum_id` int(11) UNSIGNED NOT NULL,
  `video_kart_id` int(11) UNSIGNED NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL,
  `foto4` varchar(100) NOT NULL,
  `foto5` varchar(100) NOT NULL,
  `foto6` varchar(100) NOT NULL,
  `foto7` varchar(100) NOT NULL,
  `foto8` varchar(100) NOT NULL,
  `foto9` varchar(100) NOT NULL,
  `foto10` varchar(100) NOT NULL,
  `foto11` varchar(100) NOT NULL,
  `foto12` varchar(100) NOT NULL,
  `foto13` varchar(100) NOT NULL,
  `foto14` varchar(100) NOT NULL,
  `foto15` varchar(100) NOT NULL,
  `foto16` varchar(100) NOT NULL,
  `foto17` varchar(100) NOT NULL,
  `foto18` varchar(100) NOT NULL,
  `foto19` varchar(100) NOT NULL,
  `foto20` varchar(100) NOT NULL,
  `elan_bakildi_durum` enum('0','1') NOT NULL DEFAULT '0',
  `elan_durum` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `elan_slider_durum` enum('0','1') NOT NULL DEFAULT '0',
  `user_slider_qoyan_id` int(11) NOT NULL,
  `elan_vip_durum` enum('0','1') NOT NULL DEFAULT '0',
  `islemedenadmin` int(11) NOT NULL,
  `elanyeyimsilsebeb` text NOT NULL,
  `elayayaimsilzamandamgasi` int(11) NOT NULL,
  `elanyayimsilzaman` varchar(20) NOT NULL,
  `yayimsiladmin` int(11) NOT NULL,
  `elan_tiklanma_sayi` bigint(20) UNSIGNED NOT NULL,
  `elan_pin_kode` varchar(6) NOT NULL,
  `elan_baxis_sayi` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `elan`
--

INSERT INTO `elan` (`elan_id`, `elan_id_kod`, `karoqoriya_id`, `yeni`, `bolme_id`, `elan_novu`, `user_id`, `user_seo_url`, `ad`, `soyad`, `email`, `emlakin_veziyyeti`, `elan_adi`, `dovlet_ad`, `seher_id`, `seher`, `elan_zaman_damgasi`, `elan_zaman`, `elan_yenilenme_zaman_damgasi`, `elan_yenilenme_zamani`, `rayon_id`, `metro_id`, `nisangah_id`, `qiymet`, `pul_novu`, `mezmun`, `qaz`, `internet`, `telefon`, `hovuz`, `kombisistemi`, `su`, `isiq`, `lift`, `kamera`, `avtodayanacaq`, `balkon`, `zirzemi`, `esyali`, `artirma`, `kondisoner`, `marka_id`, `marka_ad`, `model_id`, `model_ad`, `avto_marka`, `avto_model`, `avto_ban_novu`, `avto_yurus_km`, `reng`, `yanacaq_novu`, `avto_otrucu`, `avto_suret_qutusu`, `muherrikin_at_gucu`, `kredit_var`, `barter_var`, `avto_yungul_lehimli_diskler`, `avto_merkezi_qapanma`, `avto_deri_salon`, `avto_otracaqlarin_isidilmesi`, `avto_abs`, `avto_park_radari`, `avto_ksenon_lampa`, `avto_luk`, `avto_arxa_goruntu_kamerasi`, `avto_on_goruntu_kamerasi`, `avto_on_radar`, `avto_yagis`, `avto_isiq_sensoru`, `avto_yan_perde`, `avto_arxa_perde`, `avto_muherrikin_hecmi`, `avto_ban_nomresi`, `buraxilis_ili`, `binatipi_id`, `umumi_sahesi`, `emlak_senedi_id`, `proyekt_id`, `yasayis_sahesi`, `otaq_sayi`, `yerlesdiyi_mertebe`, `binaninmertebesayi`, `yerlesdiyiblok`, `menzil_veziyyeti`, `unvan`, `elan_veren`, `emlakin_novu`, `torpaqsahesi`, `malin_novu`, `fealiyyet_novu`, `cins`, `xidmet_novu`, `geyim_tipi`, `geyim_novu`, `malın_tipi`, `operator`, `telefon_bir`, `telefon_iki`, `qaydalarioxudum`, `prosessor_id`, `yaddas`, `disk_adi`, `operativyaddas_id`, `display_duyum_id`, `video_kart_id`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `foto10`, `foto11`, `foto12`, `foto13`, `foto14`, `foto15`, `foto16`, `foto17`, `foto18`, `foto19`, `foto20`, `elan_bakildi_durum`, `elan_durum`, `elan_slider_durum`, `user_slider_qoyan_id`, `elan_vip_durum`, `islemedenadmin`, `elanyeyimsilsebeb`, `elayayaimsilzamandamgasi`, `elanyayimsilzaman`, `yayimsiladmin`, `elan_tiklanma_sayi`, `elan_pin_kode`, `elan_baxis_sayi`) VALUES
(471, 'changan-freedom-m707cb8a99c3b3244ab83b54afd6e2b9fff', 1, '0', 1, 1, 0, 'heseneynalov11111111', 'Hesen', 'Eynalov', 'admin@example.com', 0, 'Changan Freedom M70', 12, 86, '', 1592301203, '16.06.2020 13:53:23', 0, '', 0, 0, 0, 11111, 'AZN', '&lt;p&gt;&amp;uuml;&amp;uuml;&amp;uuml;&amp;uuml;&amp;uuml;&amp;uuml;&amp;uuml;&amp;uuml;&amp;uuml;&amp;uuml;&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'on', 0, '', 0, '', 14, 437, 4, 1111, 15, 2, 1, 3, 111, '', '', '', '', '', '', 'on', '', 'on', '', '', '', 'on', 'on', '', '', 'on', 20, '', 2004, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '11111111', '1111111', '', 0, 0, 0, 0, 0, 0, 'img/avtomobil/2fd30ccd6f70223f6ac4c6176fbc85482a33b11cfa5f7f31c4e15111964e161e.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 57, '', 0, '', 0, 0, '628943', 91),
(481, 'katera3d6aa4bd7bd32926baa672e711fdace', 2, '0', 1, 1, 0, 'orxanmehdiyev0502723383', 'Orxan', 'Mehdiyev', 'orxanmehdiyev1987@gmail.com', 0, 'Kater', 12, 10, ' ', 1592314833, '16.06.2020 17:40:33', 0, '', 4, 0, 0, 123123, 'USD', '&lt;p&gt;asfdfasdfsa&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, '', 0, 0, 0, 12, 0, 1, 0, 0, 0, 'on', 'on', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 2019, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '0502723383', '', '', 0, 0, 0, 0, 0, 0, 'img/suneqliyyati/41d49b5c0965e1835bb86fc87828d1875b1808830e32f80260b345d4.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 62, '', 0, '', 0, 0, '123456', 77),
(483, 'ksenon-lampa-vaz2107ac4d012fca8dbb8845d96e6fbb8e193c', 3, '0', 1, 1, 0, 'fezlimammadov0702515252', 'Fezli', 'Mammadov', 'mqalib@gmail.com', 0, 'Ksenon lampa VAZ22107', 12, 86, ' ', 1592596834, '20.06.2020 00:00:34', 1592678761, '20.06.2020 22:46:01', 21, 0, 0, 2222, 'USD', '&lt;p&gt;Check from Google and see if you can find it for you and I can get it to you. dasdasd&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '0702515252', '0702515252', '', 0, 0, 0, 0, 0, 0, 'img/avtomobil/70427af44aff17340121c6c9d6d045521500_n9cXIOKxJe6fjFPBzJB1_Q.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 62, 'sdad', 1592662257, '20.06.2020 18:10:57', 62, 0, '123456', 100),
(484, 'yaxta7bb357ab0a12108871550efa4e374a39', 2, '0', 1, 1, 0, 'filankesfilankesov0702515253', 'Filankəs', 'Filankəsov', 'mqalib@gmail.com', 0, 'Yaxta', 12, 10, ' ', 1592596983, '20.06.2020 00:03:03', 0, '', 5, 0, 0, 170000, 'AZN', '&lt;p&gt;Gfhhgvhh g g g h hbnff xarhkfy moyg xdh&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, '', 0, 0, 0, 50000, 0, 2, 0, 0, 0, 'on', 'on', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 2015, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 3, 0, '0', 0, 0, 0, 0, 0, '0702515253', '0702515253', '', 0, 0, 0, 0, 0, 0, 'img/suneqliyyati/85d7c781737e3c96fc9feb928e0737f5IMG_20200610_124327_002.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 57, '', 0, '', 0, 0, '420851', 100),
(485, 'villac20040ba4e70230a35c515d7b82b54cb', 5, '0', 2, 2, 0, 'vusalmemmedov585555', 'Vusal', 'Məmmədov', 'mqalib@gmail.com', 1, 'Villa', 12, 8, '', 1592597424, '20.06.2020 00:10:24', 0, '', 0, 0, 0, 200, 'AZN', '&lt;ul&gt;&lt;li&gt;İlk şəkil axtarışlarda g&amp;ouml;r&amp;uuml;nəcək.&lt;/li&gt;&lt;li&gt;Şəkillər yaxşı keyfiyyətdə olmalıdır.&lt;/li&gt;&lt;li&gt;Şəkillərin &amp;uuml;zərində loqotip və digər yazılar olmamalıdır.&lt;/li&gt;&lt;li&gt;Minimum 1 şəkil,Maksimum &amp;ndash; 20 şəkil&lt;/li&gt;&lt;/ul&gt;&lt;ul&gt;&lt;li&gt;Skrinşotlar qəbul olunmur.&lt;/li&gt;&lt;li&gt;Şəxsi sahibi tərəfindən satılanlar reklam xarakteri daşımamalıdır.&lt;/li&gt;&lt;li&gt;Şəklin formatı jpg, jpeg, gif, png olmalıdır&lt;/li&gt;&lt;/ul&gt;', 'on', '', 'on', 'on', '', 'on', '', '', 'on', 'on', '', 'on', '', 'on', 'on', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, 5, 320, 1, 0, 0, 6, 0, 2, '', '', 'Naxcivan dhsbshs hsbsb', 4, '', 6000, 0, 0, '0', 0, 0, 0, 0, 0, '585555', '55555555', '', 0, 0, 0, 0, 0, 0, 'img/villar/fedf2600fa44c0e6883b7f491b2e11cd21562_DU5eTbfqhoZpTbuZOCo7EA.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 57, '', 0, '', 0, 0, '528330', 83),
(492, 'samsung-125576be32ad28152c7f154db739c8115b3', 26, '0', 5, 1, 62, 'orxanmiigoucs', 'Orxan', 'Mehdiyev', 'orxanmehdiyev1987@gmail.com', 0, 'Samsung 125', 14, 0, 'ssssssssssss', 1592989376, '24.06.2020 13:02:56', 0, '', 0, 0, 0, 125, 'EUR', '&lt;p&gt;asdsda&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 3, '', 0, '125', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'on', 'on', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '0502723383', '', '', 0, 0, 0, 0, 0, 0, 'img/elektronika/ce3950989376892a8745f2af4de63375telefon.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '0', 0, '0', 0, '', 0, '', 0, 0, '031417', 0),
(507, 'masaustu-komputer879b6dc9c054e84c99643c1d1952d11b', 29, '0', 5, 1, 62, 'orxanmiigoucs', 'Orxan', 'Mehdiyev', 'orxanmehdiyev1987@gmail.com', 0, 'Masaüstü Komputer', 12, 21, ' ', 1595439002, '22.07.2020 21:30:02', 0, '', 0, 0, 0, 234, 'USD', '&lt;p&gt;fsdfsdf&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 2, '', 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 0, 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '0502723383', '', '1', 3, 234, 3, 4, 4, 1, 'img/elektronika/47dda2684b2b1dd1611508f6d20dee06sss.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 62, '', 0, '', 0, 0, '630620', 66),
(508, '050-272-33-83e034bc0515ed0cc01e24809852771a6d', 28, '1', 5, 1, 62, 'orxanmiigoucs', 'Orxan', 'Mehdiyev', 'orxanmehdiyev1987@gmail.com', 0, '(050) 272 33 83', 12, 24, ' ', 1595440382, '22.07.2020 21:53:02', 0, '', 0, 0, 0, 2323, 'AZN', '&lt;p&gt;sd&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '0502723383', '', '1', 0, 0, 0, 0, 0, 0, 'img/elektronika/74049c8a126bd9346289042a64c93fbdsss.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 62, '', 0, '', 0, 0, '320568', 65),
(509, 'sdsd-planset113327b36ef09786bed57949bf9c1157', 31, '0', 5, 1, 62, 'orxanmiigoucs', 'Orxan', 'Mehdiyev', 'orxanmehdiyev1987@gmail.com', 0, 'sdsd Planşet', 12, 5, ' ', 1595440853, '22.07.2020 22:00:53', 1595441315, '22.07.2020 22:08:35', 0, 0, 0, 252, 'EUR', '&lt;p&gt;123123&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 2, '', 0, '', 0, 0, 0, 0, 16, 0, 0, 0, 0, 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '0502723383', '', '1', 3, 123, 3, 4, 4, 1, 'img/elektronika/f2c76d3932f0b8fe0f631b80bf8c6300sss.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 62, '', 0, '', 0, 0, '424274', 73),
(511, 'sdsd-noutbook1ce91451fdce43c0068e1b5a38e9467c', 30, '0', 5, 1, 62, 'orxanmiigoucs', 'Orxan', 'Mehdiyev', 'orxanmehdiyev1987@gmail.com', 0, 'sdsd Noutbook', 12, 5, ' ', 1595441776, '22.07.2020 22:16:16', 1595442363, '22.07.2020 22:26:03', 0, 0, 0, 22222, 'AZN', '&lt;p&gt;sssssss&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 2, '', 0, '', 0, 0, 0, 0, 17, 0, 0, 0, 0, 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '0502723383', '', '1', 3, 3424324, 3, 4, 4, 1, 'img/elektronika/941a27e70c13d79c33aa7cfce266d62fsss.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 62, '', 0, '', 0, 0, '326773', 70),
(512, 'sdsd-netbook9d524d0b2ba679af5c0b4868c8354082', 91, '0', 5, 1, 62, 'orxanmiigoucs', 'Orxan', 'Mehdiyev', 'orxanmehdiyev1987@gmail.com', 0, 'sdsd Netbook', 12, 5, ' ', 1595749498, '26.07.2020 11:44:58', 1595750127, '26.07.2020 11:55:27', 0, 0, 0, 34234, 'EUR', '&lt;p&gt;fsdfddddddd&lt;/p&gt;', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 2, '', 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 0, 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 'off', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 4, '', 0, 0, 0, '0', 0, 0, 0, 0, 0, '0502723383', '', '1', 3, 213, 3, 4, 4, 1, 'img/elektronika/89d7b973abb9c33b04263098134a0100sss.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', 0, '0', 62, '', 0, '', 0, 0, '123655', 67);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `elan`
--
ALTER TABLE `elan`
  ADD PRIMARY KEY (`elan_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `elan`
--
ALTER TABLE `elan`
  MODIFY `elan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
