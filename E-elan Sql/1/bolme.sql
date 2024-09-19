-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:31:14
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
-- Tablo için tablo yapısı `bolme`
--

CREATE TABLE `bolme` (
  `bolme_id` int(11) NOT NULL,
  `bolme_id_kod` varchar(255) NOT NULL,
  `bolme_seo_url` varchar(70) NOT NULL,
  `bolme_ad` varchar(50) NOT NULL,
  `bolme_durum` enum('0','1') NOT NULL DEFAULT '0',
  `bolme_sil_durum` enum('0','1') NOT NULL DEFAULT '0',
  `bolme_silinme_zaman_damgasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `bolme`
--

INSERT INTO `bolme` (`bolme_id`, `bolme_id_kod`, `bolme_seo_url`, `bolme_ad`, `bolme_durum`, `bolme_sil_durum`, `bolme_silinme_zaman_damgasi`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', '2y-10-z0x-7rctpd9pj0pakx8-lul-7zxmim9mjisrephtk6ro6ggqpy75c', 'Nəqliyyat', '1', '0', 0),
(2, 'c81e728d9d4c2f636f067f89cc14862c', '2y-10-f7q6hdjwx8xaajzhdusqy-0qwsgh7wsm-x9r2sk96w1ugbo33rgdo', 'Əmlak', '1', '0', 0),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2y-10-rkneyi3-jqkio7jfx5biiudx2jil69hj-j40mcxszx-ejgbtbljwa', 'Uşaq Dünyası', '0', '0', 0),
(4, 'a87ff679a2f3e71d9181a67b7542122c', '2y-10-g-zi-rvfhfhbcogqqnhq0-ew6ee8qipmqsnrxicpsxsvjs5audx6a', 'Moda, Geyim', '0', '0', 0),
(5, 'e4da3b7fbbce2345d7772b0674a318d5', '2y-10-rszwkvosxr0c6nlxxurkaon-57vpfgkwipjotkcp9hi4hhl8mp88e', 'Elektronika', '1', '0', 0),
(6, '1679091c5a880faf6fb5e6087eb1b2dc', '2y-10-vser-ip3qsgn6q9xpoilauz7q4nmzg-opcvreyju5zjhtou09zuxc', 'Ev Və Məişət Avadanlığı', '0', '0', 0),
(7, '8f14e45fceea167a5a36dedd4bea2543', '2y-10-bxjtke8iiymhppsa3diweop6f-m2aqqbepgvtx1itllqbhxagpvsq', 'İdman Hobi', '0', '0', 0),
(8, 'c9f0f895fb98ab9159f51fd0297e236d', '2y-10-uaf0dpboq9s2oup-bzxuvobdil-pycbiclsd8yld34xo8doprz7re', 'Canı Təbiiət', '0', '0', 0),
(9, '45c48cce2e2d7fbdea1afc51c7c6ad26', '2y-10-pots7t2dbf83kl6nagz0beih-lw6xviag2ngthkxhqfu4jurfk6hw', 'Xidmət Sifersaı', '0', '0', 0),
(10, 'd3d9446802a44259755d38e6d163e820', '2y-10-ywk75wk-n1zbtkpnpaffpuxtctmeqcobum-hkgs3ud34vffbo00-o', 'Ofis Avadanlığı', '0', '0', 0),
(11, '6512bd43d9caa6e02c990b0a82652dca', '2y-10-k3pz-0iue3yoncgcwd2aecvzktpgedtm4xjdxbl0mix0otqri4cs', 'Super Market', '0', '0', 0),
(12, 'c20ad4d76fe97759aa27a0c99bff6710', '2y-10-b8c0msdpksd-d1j-dv7wpocd3qp0drxrcyay2kprmve1yxtzy6vai', 'Digər', '0', '0', 1582723355);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bolme`
--
ALTER TABLE `bolme`
  ADD PRIMARY KEY (`bolme_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bolme`
--
ALTER TABLE `bolme`
  MODIFY `bolme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
