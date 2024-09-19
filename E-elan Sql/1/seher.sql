-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:35:29
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
-- Tablo için tablo yapısı `seher`
--

CREATE TABLE `seher` (
  `seher_id` bigint(20) UNSIGNED NOT NULL,
  `dovlet_id` bigint(20) UNSIGNED NOT NULL,
  `seher_ad` varchar(150) NOT NULL,
  `seher_durum` enum('0','1') NOT NULL DEFAULT '0',
  `seher_beynelxalq_adi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `seher`
--

INSERT INTO `seher` (`seher_id`, `dovlet_id`, `seher_ad`, `seher_durum`, `seher_beynelxalq_adi`) VALUES
(3, 12, 'Astara', '1', 'Astara'),
(4, 12, 'Ağcabədi', '1', 'Ağcabədi'),
(5, 12, 'Ağdam', '1', 'Ağdam'),
(6, 12, 'Ağdaş', '1', 'Ağdaş'),
(7, 12, 'Ağdərə', '1', 'Ağdərə'),
(8, 12, 'Ağstafa', '1', 'Ağstafa'),
(9, 12, 'Ağsu', '1', 'Ağsu'),
(10, 12, 'Bakı', '1', 'Bakı'),
(11, 12, 'Balakən', '1', 'Balakən'),
(12, 12, 'Beyləqan', '1', 'Beyləqan'),
(13, 12, 'Bərdə', '1', 'Bərdə'),
(14, 12, 'Biləsuvar', '1', 'Biləsuvar'),
(15, 12, 'Cəbrayıl', '1', 'Cəbrayıl'),
(16, 12, 'Cəlilabad', '1', 'Cəlilabad'),
(18, 12, 'Daşkəsən', '1', 'Daşkəsən'),
(19, 12, 'Dəliməmmədli', '1', 'Dəliməmmədli'),
(20, 12, 'Əsgəran', '1', 'Əsgəran'),
(21, 12, 'Füzuli', '1', 'Füzuli'),
(22, 12, 'Gədəbəy', '1', 'Gədəbəy'),
(23, 12, 'Gəncə', '1', 'Gəncə'),
(24, 12, 'Goranboy', '1', 'Goranboy'),
(25, 12, 'Göyçay', '1', 'Göyçay'),
(26, 12, 'Göygöl', '1', 'Göygöl'),
(27, 12, 'Göytəpə', '1', 'Göytəpə'),
(28, 12, 'Hacıqabul', '1', 'Hacıqabul'),
(29, 12, 'Horadiz', '1', 'Horadiz'),
(30, 12, 'Xaçmaz', '1', 'Xaçmaz'),
(31, 12, 'Xankəndi', '1', 'Xankəndi'),
(32, 12, 'Xocalı', '1', 'Xocalı'),
(33, 12, 'Xocavənd', '1', 'Xocavənd'),
(34, 12, 'Xırdalan', '1', 'Xırdalan'),
(35, 12, 'Xızı', '1', 'Xızı'),
(36, 12, 'Xudat', '1', 'Xudat'),
(37, 12, 'İmişli', '1', 'İmişli'),
(38, 12, 'İsmayıllı', '1', 'İsmayıllı'),
(39, 12, 'Kəlbəcər', '1', 'Kəlbəcər'),
(40, 12, 'Kürdəmir', '1', 'Kürdəmir'),
(41, 12, 'Qax', '1', 'Qax'),
(42, 12, 'Qazax', '1', 'Qazax'),
(43, 12, 'Qəbələ', '1', 'Qəbələ'),
(44, 12, 'Qobustan', '1', 'Qobustan'),
(45, 12, 'Qovlar', '1', 'Qovlar'),
(46, 12, 'Quba', '1', 'Quba'),
(47, 12, 'Qubadlı', '1', 'Qubadlı'),
(48, 12, 'Qusar', '1', 'Qusar'),
(49, 12, 'Laçın', '1', 'Laçın'),
(50, 12, 'Lerik', '1', 'Lerik'),
(51, 12, 'Lənkəran', '1', 'Lənkəran'),
(52, 12, 'Liman', '1', 'Liman'),
(53, 12, 'Masallı', '1', 'Masallı'),
(54, 12, 'Mingəçevir', '1', 'Mingəçevir'),
(55, 12, 'Naftalan', '1', 'Naftalan'),
(56, 12, 'Naftalan', '1', 'Naftalan'),
(57, 12, 'Neftçala', '1', 'Neftçala'),
(58, 12, 'Oğuz', '1', 'Oğuz'),
(60, 12, 'Saatlı', '1', 'Saatlı'),
(61, 12, 'Sabirabad', '1', 'Sabirabad'),
(62, 12, 'Salyan', '1', 'Salyan'),
(63, 12, 'Samux', '1', 'Samux'),
(64, 12, 'Siyəzən', '1', 'Siyəzən'),
(65, 12, 'Sumqayıt', '1', 'Sumqayıt'),
(66, 12, 'Şabran', '1', 'Şabran'),
(68, 12, 'Şamaxı', '1', 'Şamaxı'),
(69, 12, 'Şəki', '1', 'Şəki'),
(70, 12, 'Şəmkir', '1', 'Şəmkir'),
(72, 12, 'Şirvan', '1', 'Şirvan'),
(74, 12, 'Tərtər', '1', 'Tərtər'),
(75, 12, 'Tovuz', '1', 'Tovuz'),
(76, 12, 'Tovuz', '1', 'Tovuz'),
(77, 12, 'Yardımlı', '1', 'Yardımlı'),
(78, 12, 'Yevlax', '1', 'Yevlax'),
(79, 12, 'Zaqatala', '1', 'Zaqatala'),
(80, 12, 'Zəngilan', '1', 'Zəngilan'),
(81, 12, 'Zərdab', '1', 'Zərdab'),
(86, 12, 'Naxçıvan', '1', 'Nakhchivan AR'),
(87, 13, 'İstanbul', '1', 'Istanbul'),
(88, 13, 'İzmir', '1', 'Izmir'),
(89, 13, 'Antalya', '1', 'Antalya'),
(90, 12, 'Ordubad', '1', 'Ordubad'),
(91, 12, 'Şahbuz', '1', 'Shakhbuz'),
(92, 12, 'Babək', '1', 'Babek'),
(93, 12, 'Culfa', '1', 'Julfa'),
(94, 12, 'Şərur', '1', 'Sherur'),
(95, 12, 'Kəngərli', '1', 'Kengerli'),
(96, 12, 'Sədərək', '1', 'Sederek');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `seher`
--
ALTER TABLE `seher`
  ADD PRIMARY KEY (`seher_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `seher`
--
ALTER TABLE `seher`
  MODIFY `seher_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
