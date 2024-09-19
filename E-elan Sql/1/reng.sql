-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:20
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
-- Tablo için tablo yapısı `reng`
--

CREATE TABLE `reng` (
  `reng_id` int(11) NOT NULL,
  `reng_id_kod` varchar(255) NOT NULL,
  `reng_ad` varchar(50) NOT NULL,
  `reng_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reng`
--

INSERT INTO `reng` (`reng_id`, `reng_id_kod`, `reng_ad`, `reng_durum`) VALUES
(1, 'ag28dc714018f36f93c69acc66c8c64eb1', 'Ağ', '1'),
(2, 'bejf883195551ee44fe4760e680b3b63734', 'Bej', '1'),
(3, 'bənovsəyi66127cd3f0a84b0395ff06ab1f8e2308', 'Bənövşəyi', '1'),
(4, 'boz0bb1d603657b626f5334866bf8fed224', 'Boz', '1'),
(5, 'cəhrayi658d48f3f20ccf720cd8d8f6b3a0e6f1', 'Çəhrayı', '1'),
(6, 'goycbc4c9ab88fcfe188ff9281b6a843f86', 'Göy', '1'),
(7, 'gumusu77bed82863ec8315329b6e3235c3b9cf', 'Gümüşü', '1'),
(8, 'mavi89f1e108684fe6748b6f01ce5c369c0e', 'Mavi', '1'),
(9, 'narinci75176052160172f5d61ae67a8a0eb2aa', 'Narıncı', '1'),
(10, 'qara27de9fed9c88a5da5ff1a3c7d7ab694a', 'Qara', '1'),
(11, 'qəhvəyic948b51ce8e1d763098843ab6d25f44c', 'Qəhvəyi', '1'),
(12, 'qirmizi939abaeb83c35e71824955d3c298c31c', 'Qırmızı', '1'),
(13, 'qizili3d7b5f204ad0f619c64f1fd0c56e591f', 'Qızılı', '1'),
(14, 'saria75d2d5a8c36f14225768a0a906197bd', 'Sarı', '1'),
(15, 'tund-qirmizidc876b5828f4767e8294f6ee60e1d7cb', 'Tünd Qırmızı', '1'),
(16, 'yas-asfalt550cc8c16fbe1908ab57916e0ef7da1f', 'Yaş Asfalt', '1'),
(17, 'yasil2ea49ae506b49105ad02c258cc9b8944', 'Yaşıl', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `reng`
--
ALTER TABLE `reng`
  ADD PRIMARY KEY (`reng_id`),
  ADD UNIQUE KEY `reng_id` (`reng_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `reng`
--
ALTER TABLE `reng`
  MODIFY `reng_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
