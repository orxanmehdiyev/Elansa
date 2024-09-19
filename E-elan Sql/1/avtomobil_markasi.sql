-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:32:41
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
-- Tablo için tablo yapısı `avtomobil_markasi`
--

CREATE TABLE `avtomobil_markasi` (
  `avtomobil_markasi_id` bigint(20) NOT NULL,
  `avtomobil_markasi_code` varchar(55) NOT NULL DEFAULT '',
  `avtomobil_markasi_ad` varchar(55) NOT NULL DEFAULT '',
  `avtomobil_markasi_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `avtomobil_markasi`
--

INSERT INTO `avtomobil_markasi` (`avtomobil_markasi_id`, `avtomobil_markasi_code`, `avtomobil_markasi_ad`, `avtomobil_markasi_durum`) VALUES
(1, '1', 'Alfa Romeo', '1'),
(2, '2', 'Aston Martin', '1'),
(3, '3', 'Audi', '1'),
(4, '4', 'Avia', '1'),
(5, '5', 'Baic', '1'),
(6, '6', 'Bajaj', '1'),
(7, '7', 'Bentley', '1'),
(8, '8', 'BMC', '1'),
(9, '9', 'BMW', '1'),
(10, '10', 'Brilliance', '1'),
(11, '11', 'Buick', '1'),
(12, '12', 'BYD', '1'),
(13, '13', 'Cadillac', '1'),
(14, '14', 'Changan', '1'),
(15, '15', 'Chery', '1'),
(16, '16', 'Chevrolet', '1'),
(17, '17', 'Chrysler', '1'),
(18, '18', 'Citroen', '1'),
(19, '19', 'Dacia', '1'),
(20, '20', 'Daewoo', '1'),
(21, '21', 'DAF', '1'),
(22, '22', 'Daihatsu', '1'),
(23, '23', 'Dayun', '1'),
(24, '24', 'Dnepr', '1'),
(25, '25', 'Dodge', '1'),
(26, '26', 'DongFeng', '1'),
(27, '27', 'Ducati', '1'),
(28, '28', 'FAW', '1'),
(29, '29', 'Fiat', '1'),
(30, '30', 'Ford', '1'),
(31, '31', 'Foton', '1'),
(32, '32', 'GAC', '1'),
(33, '33', 'GAZ', '1'),
(34, '34', 'Geely', '1'),
(35, '35', 'GMC', '1'),
(36, '36', 'Great Wall', '1'),
(37, '37', 'Haojue', '1'),
(38, '38', 'Harley-Davidson', '1'),
(39, '39', 'Haval', '1'),
(40, '40', 'Honda', '1'),
(41, '41', 'HOWO', '1'),
(42, '42', 'Hummer', '1'),
(43, 'Hyundai', 'Hyundai', '1'),
(44, '44', 'IJ', '1'),
(45, '45', 'Ikarus', '1'),
(46, '46', 'Infiniti', '1'),
(47, '47', 'Iran Khodro', '1'),
(48, '48', 'Isuzu', '1'),
(49, '49', 'Iveco', '1'),
(50, '50', 'Ivanovec', '1'),
(51, '51', 'JAC', '1'),
(52, '52', 'Jaguar', '1'),
(53, '53', 'Jeep', '1'),
(54, '54', 'JMC', '1'),
(55, '55', 'Jonway', '1'),
(56, '56', 'KamAz', '1'),
(57, '57', 'Kawasaki', '1'),
(58, '58', 'Khazar', '1'),
(59, '59', 'Kia', '1'),
(60, '60', 'Kuba', '1'),
(61, '61', 'LADA (VAZ)', '1'),
(62, '62', 'Lamborghini', '1'),
(63, '63', 'Land Rover', '1'),
(64, '64', 'Lexus', '1'),
(65, '65', 'Lifan', '1'),
(66, '66', 'Lincoln', '1'),
(67, '67', 'LuAz', '1'),
(68, '68', 'MAN', '1'),
(69, '69', 'Maserati', '1'),
(70, '70', 'MAZ', '1'),
(71, '71', 'Mazda', '1'),
(72, '72', 'McLaren', '1'),
(73, '73', 'Megelli', '1'),
(74, '74', 'Mercedes-Benz', '1'),
(75, '75', 'MG', '1'),
(76, '76', 'Mini', '1'),
(77, '77', 'Mitsubishi', '1'),
(78, '78', 'Mondial', '1'),
(79, '79', 'Moskvich', '1'),
(80, '80', 'Muravey', '1'),
(81, '81', 'MV Agusta', '1'),
(82, '82', 'Nama', '1'),
(83, '83', 'Nissan', '1'),
(84, '84', 'Opel', '1'),
(85, '85', 'PAZ', '1'),
(86, '86', 'Peugeot', '1'),
(87, '87', 'Porsche', '1'),
(88, '88', 'RAF', '1'),
(89, '89', 'Ravon', '1'),
(90, '90', 'Renault', '1'),
(91, '91', 'Rolls-Royce', '1'),
(92, '92', 'Saipa', '1'),
(93, '93', 'Scania', '1'),
(94, '94', 'SEAT', '1'),
(95, '95', 'Setra', '1'),
(96, '96', 'Shacman', '1'),
(97, '97', 'Skoda', '1'),
(98, '98', 'Smart', '1'),
(99, '99', 'Ssang Yong', '1'),
(100, '100', 'Subaru', '1'),
(101, '101', 'Suzuki', '1'),
(102, '102', 'Tesla', '1'),
(103, '103', 'Tofaş', '1'),
(104, '104', 'Toyota', '1'),
(105, '105', 'UAZ', '1'),
(106, '106', 'Ural', '1'),
(107, '107', 'Vespa', '1'),
(108, '108', 'Volkswagen', '1'),
(109, '109', 'Volvo', '1'),
(110, '110', 'Wanfeng', '1'),
(111, '111', 'Yamaha', '1'),
(112, '112', 'ZAZ', '1'),
(113, '113', 'ZIL', '1'),
(114, '114', 'Zontes', '1'),
(115, '115', 'Digər marka', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `avtomobil_markasi`
--
ALTER TABLE `avtomobil_markasi`
  ADD PRIMARY KEY (`avtomobil_markasi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `avtomobil_markasi`
--
ALTER TABLE `avtomobil_markasi`
  MODIFY `avtomobil_markasi_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
