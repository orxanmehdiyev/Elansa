-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Şub 2021, 14:34:27
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
-- Tablo için tablo yapısı `karoqoriya`
--

CREATE TABLE `karoqoriya` (
  `karoqoriya_id` int(11) UNSIGNED NOT NULL,
  `karoqoriya_id_kodla` varchar(255) NOT NULL,
  `karoqoriya_seo_url` varchar(61) NOT NULL,
  `bolme_id` int(11) UNSIGNED NOT NULL,
  `karoqoriya_ad` varchar(50) NOT NULL,
  `karoqoriya_durum` enum('0','1') NOT NULL DEFAULT '0',
  `karoqoriya_sil_durum` enum('0','1') NOT NULL DEFAULT '0',
  `karoqoriya_silinmiszamanDamgasi` int(11) NOT NULL,
  `karoqoriya_sira` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `karoqoriya`
--

INSERT INTO `karoqoriya` (`karoqoriya_id`, `karoqoriya_id_kodla`, `karoqoriya_seo_url`, `bolme_id`, `karoqoriya_ad`, `karoqoriya_durum`, `karoqoriya_sil_durum`, `karoqoriya_silinmiszamanDamgasi`, `karoqoriya_sira`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', '2y-10-hnbuyajzo1ue9qnynbquju0x0f-bzbyal9cfyemagvjopyr3rl35m', 1, 'Avtomobil', '1', '0', 0, 1),
(2, 'c81e728d9d4c2f636f067f89cc14862c', '2y-10-skbaaknge-u-mxwpesn8aop9qgxnhpk-cw8oruyugs9zuei81cezc', 1, 'Su Nəqliyyatı', '1', '0', 0, 3),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2y-10-bc6wrgvctxfqrmb4ifsr3o5hqeouevqllwpanextiauvx-30b-sd2', 1, 'Ehtiyat Hissələri', '1', '0', 0, 3),
(4, 'a87ff679a2f3e71d9181a67b7542122c', '2y-10-ltbaayv29mxsyuz-dipwoeloqxdwuqir32eu4odl4coih-uucsjg', 2, 'Mənzillər', '1', '0', 0, 1),
(5, 'e4da3b7fbbce2345d7772b0674a318d5', '2y-10-mpqwlscivrizd2leycfsyuhpv5udpobgcyimetj5mnkscmeqeqppm', 2, 'Villalar', '1', '0', 0, 2),
(6, '1679091c5a880faf6fb5e6087eb1b2dc', '2y-10-rvsqgo6nigh7m5sbt-uikurjx1df75xckwmazelvgte6a8b-kjnzw', 2, 'Qarajlar', '1', '0', 0, 5),
(7, '8f14e45fceea167a5a36dedd4bea2543', '2y-10-pjqqlrerint2vuezrogwzuo8syw7-5p1sd7cbff-nqxlywiymckbk', 2, 'Obyektlər', '1', '0', 0, 6),
(8, 'c9f0f895fb98ab9159f51fd0297e236d', '2y-10-fg3jmeckzg96mfsl9itsneg5dvuch8v5tgytzvrn0c2pguy9g7zwg', 2, 'Torpaq Sahəsi', '1', '0', 0, 8),
(9, '45c48cce2e2d7fbdea1afc51c7c6ad26', '2y-10-mdoozvrdotxu1bwko9n98usvy5h-mn0ugud6x9a4yoqxot3djskls', 3, 'Uşaq Otracaqları', '1', '0', 0, 0),
(10, 'd3d9446802a44259755d38e6d163e820', '2y-10-1atbv6mn1lipppmtzmn5zujbol8rhb68p5qwwq5abwb1rsbq2ngxs', 3, 'Uşaq Oyuncaqlar', '0', '0', 0, 0),
(11, '6512bd43d9caa6e02c990b0a82652dca', '2y-10-zvzys-wz-rdjfkyx50d5s-zeflbe9-xwut8fme-vx04ug0o4if0gy', 3, 'Uşaq Arabaları', '0', '0', 0, 0),
(12, 'c20ad4d76fe97759aa27a0c99bff6710', '2y-10-ydevnnbium4p-qwlzs6wd-5moqqsz9cl70-m0ctxqgwbf8ty9y3d', 3, 'Uşaq Carpayıları', '0', '0', 0, 0),
(13, 'c51ce410c124a10e0db5e4b97fc2af39', '2y-10-e6tdcrtncuwurxhz9gvbpos24pv1fnfqismwpo17loh5e6uosohtq', 3, 'Uşaq Daşıyıcıları', '0', '0', 0, 0),
(14, 'aab3238922bcc25a6f606eb525ffdc56', '2y-10-k7zdaxqrbkpsbq50ema-zofglw8dcch1ix1cmglwklaw9dum9awrq', 3, 'Uşaq Sağlamlıq Və Gigyenik', '0', '0', 0, 0),
(15, '9bf31c7ff062936a96d3c8bd1f8f2ff3', '2y-10-iglh-zvscdt6-feeneincuvulcmupxs5pfmgrcv7bzvesrgrrefco', 3, 'Digər', '0', '0', 0, 0),
(16, 'c74d97b01eae257e44aa9d5bade97baf', '2y-10-cslsymw4zt4-zo-cmd5ebo8oczruazkka3pmwktowcqoxp8kqyzls', 3, 'Uşaq Mebeli', '0', '0', 0, 0),
(17, '70efdf2ec9b086079795c442636b55fb', '2y-10-j6qxokeikivxbzodzsv0yusjea9yuxh0w0jeuy3zc0jqf0td0ag-o', 3, 'Uşaq Qidası', '0', '0', 0, 0),
(18, '6f4922f45568161a8cdf4ad2299f6d23', '2y-10-btdhaqoeonmkhdlijjoxcudxz39tnwui-amfee4st-rw1ftel-ofw', 3, 'Məktəblilər üçün', '0', '0', 0, 0),
(19, '1f0e3dad99908345f7439f8ffabdffc4', '2y-10-3jukjvw-k9srfs643i7p8-8u6zc8vhhkrr3rj45zz-3aw0fzwelbw', 3, 'Uşaq Oyun Kompleksi', '0', '0', 0, 0),
(20, '98f13708210194c475687be6106a3b84', '2y-10-wbirgppnhfiqwpxjx6n8sepvx8wsqqifven0qzoxwy1ejm1vw3m5i', 4, 'Sağlamlıq Və Gözəllik', '0', '0', 0, 0),
(21, '3c59dc048e8850243be8079a5c74d079', '2y-10-whsnn7rgjwqbbvfbfrelyor1jzbkevof62hidscpqiizwo5oqczje', 4, 'Uşaq Və Gənc Geyimləri', '0', '0', 0, 0),
(22, 'b6d767d2f8ed5d21a44b0e5886680cb9', '2y-10-ohskivc9oy-ygumcyo8keoks9dscvy0fhf4r-dmz9b0xk98ea9f-m', 4, 'Kişi Geyimləri', '0', '0', 0, 0),
(23, '37693cfc748049e45d87b8c7d8b9aacd', '2y-10-ztbfmhklp2zgadbja4xtro-2h2d30sdu7k8oumd2vyj3a922exlks', 4, 'Aksesuarlar', '0', '0', 0, 0),
(24, '1ff1de774005f8da13f42943881c655f', '2y-10-w0vi-stbdaheixr0ibiui-dcnt-amz-hl9-ucxrvkzfaolziy08jq', 4, 'Qadın Geyimləri', '0', '0', 0, 0),
(25, '8e296a067a37563370ded05f5a3bf3ec', '2y-10-w0xtdpdxog3zvucrhqkt5efc5r-sdte3kbkecg2o7b-wtmxps3un6', 4, 'Digər', '0', '0', 0, 0),
(26, '4e732ced3463d06de0ca9a15b6153677', '2y-10-gwmfairpc3dekz0rxmx5o-clzydsmutgqkxohfwuk7wm50z0yluus', 5, 'Telefonlar', '1', '0', 0, 1),
(27, '02e74f10e0327ad868d138f2b4fdd6f0', '2y-10-ugaupjicp8q-ayulxnutvenbuvevldiwjf6vk-nk-e0lxigc1eokg', 5, 'Telefon  Aksesuarları', '1', '0', 0, 2),
(28, '33e75ff09dd601bbe69f351039152189', '2y-10-b4yezqxqkm6v2go1bwhbj-bin3eheajofnjcixtdhhbjaai-qaaue', 5, 'Nömrələr Və Sim Kartlar', '1', '0', 0, 3),
(29, '6ea9ab1baa0efb9e19094440c317e21b', '2y-10-1prtw9dr3nqjsrgqkq8juuzr-ue8-v5bhltazh6e-ioamzq6i7l6y', 5, 'Masaüstü Komputerlər', '1', '0', 0, 5),
(30, '34173cb38f07f89ddbebc2ac9128303f', '2y-10-wthwggr78vl2av19g3bspuf4jyibmvpjoadpzmnkysn-ai4-qbize', 5, 'Noutbuklar', '1', '0', 0, 6),
(31, 'c16a5320fa475530d9583c34fd356ef5', '2y-10-kfo0cdatnn2wxjqvslx17ex64iqux3apbx6qrvg3nzojbworedwpm', 5, 'Planşet', '1', '0', 0, 4),
(32, '6364d3f0f495b6ab9dcf8d3b5c6e0b01', '2y-10-pjxkcpx1l7xw5mm-0utevus546xgiww-nced4duiuxyioz3ambhrc', 5, 'Elektronika Aksesuarları', '1', '0', 0, 13),
(33, '182be0c5cdcd5072bb1864cdee4d3d6e', '2y-10-mavzewro8zojgcoly4xzx-exetx6qnsncdauioqhgznhfvgogfs', 5, 'Audio Və Video', '1', '0', 0, 8),
(34, 'e369853df766fa44e1ed0ff613f563bd', '2y-10-fixgxdl7ez8p3jhnh56ene1f7a6xuvrq5jb2uq2ea3k8yigrbsln6', 5, 'Oyunlar', '1', '0', 0, 11),
(35, '1c383cd30b7c298ab50293adfecb7b18', '2y-10-kpozffl4qhbtjd4hikjbc-nyudfefenempckvwqblagyqmhskohsa', 5, 'Digər', '1', '0', 0, 14),
(36, '19ca14e7ea6328a42e0eb13d585e4c22', '2y-10-2x6lgdsnoor2zbqtccnyieo1azagslvohbvmxdhzg45duqd7wstkk', 6, 'Məişət Texnikası', '0', '0', 0, 0),
(37, 'a5bfc9e07964f8dddeb95fc584cd965d', '2y-10-vcvnfnywz5tmexv4w-s6ae-kjzjqrwsxjezn4fa6nevhepv-cyuyo', 6, 'Qab-qacaq Və Mətbəxt Ləvazimatları', '0', '0', 0, 0),
(38, 'a5771bce93e200c36f7cd9dfd0e5deaa', '2y-10-hlwt7dwngcwl9euahguuje6uxjbqlqcjsfvfnkxeusy6ciw9bxesq', 6, 'İtmiş əşyalar', '0', '0', 0, 0),
(39, 'd67d8ab4f4c10bf22aa353e27879133c', '2y-10-fjjh3fgpq-xcs9pl2sb1lo3opljnwq2pux85-ewaan06r32xg9-qk', 6, 'Mebel Və Interiyer', '0', '0', 0, 0),
(40, 'd645920e395fedad7bbbed0eca3fe2e0', '2y-10-ckgpgywvxtemu3aoxpjlmeyqluhcoq0oxl-wybtgcq-bkpdujvc5m', 6, 'Digər', '0', '0', 0, 0),
(41, '3416a75f4cea9109507cacd8e2f2aefc', '2y-10-r0in1isnrseim1kz4edeiojtddevrk-jqckdo0xbsfs04uwkjsyxk', 7, 'Ovculuq Və Balıqcılıq', '0', '0', 0, 0),
(42, 'a1d0c6e83f027327d8461063f4ac58a6', '2y-10-6ghdcessxrxe7cxezymhp-grmvvxfr9tss0-7uqr1b-2c06sdvz7', 7, 'Foto Texnika', '0', '0', 0, 0),
(43, '17e62166fc8586dfa4d1bc0e1742c08b', '2y-10-672xd2jzkewspgqjwwquduuppxynuaprx3vhqh4ke1vr7tsisx2ki', 7, 'Biletlər Və Səyahət', '0', '0', 0, 0),
(44, 'f7177163c833dff4b38fc8d2872f1ec6', '2y-10-gswhym476aydrwwfsfmx4uxhk0j7cdzvfnuxuu8qxywlu0g-a1mcm', 7, 'İdman Və Asudə', '0', '0', 0, 0),
(45, '6c8349cc7260ae62e3b1396831a8398f', '2y-10-d3-v-m2sq2tbwzdihebrxopcwowglckkb1b8yym4iax-dwg-t8y6y', 7, 'Musiqi Alətləri', '0', '0', 0, 0),
(46, 'd9d4f495e875a2e075a1a4a6e1b9770f', '2y-10-02vfgr44sww3kyp9h-bvwegonecefunll7q6-6loqau04mnlnloia', 7, 'Digər', '0', '0', 0, 0),
(47, '67c6a1e7ce56d3d6fa748ab6d9af3fd7', '2y-10-ewnxqptshjxc4eiknt5rwecrptbccwbe6kqujhjk0nhji5qnesaqy', 8, 'Pişiklər', '0', '0', 0, 0),
(48, '642e92efb79421734881b53e1e1b18b6', '2y-10-swiridpjdc-npucdkoquhun0xssezznqm6qypkfbjebdg9r5hyh-k', 8, 'Quşlar', '0', '0', 0, 0),
(49, 'f457c545a9ded88f18ecee47145a72c0', '2y-10-xnwhfjpxdzv2knejltaxiupucc0-gksvbphiqif0p49m8y-rnmzic', 8, 'Akvarium Və Balıqlar', '0', '0', 0, 0),
(50, 'c0c7c76d30bd3dcaefc96f40275bdc0a', '2y-10-4zd99zwvctsx5g728avgh-okn-fmuyu1hx1ydw-bpt8qty2v1vcl2', 8, 'İnəklər', '0', '0', 0, 0),
(51, '2838023a778dfaecdc212708f721b788', '2y-10-llueaeu9gi1nu1wjy013nouvxcnzwhljtype-dvadtoxhug5dya7', 8, 'Qoyun,Keçi', '0', '0', 0, 0),
(52, '9a1158154dfa42caddbd0694a4e9bdc8', '2y-10-xff3hxxswjjtyxet7piobeqelf1n3-hecfj0-0igk-o1zgudt6gp2', 8, 'Digər Heyvanlar', '0', '0', 0, 0),
(53, 'd82c8d1619ad8176d665453cfb2e55f0', '2y-10-m3tgofzfzidg91dj59gnrucoh5kpwa8-6s39p4qclifn7mpchzwec', 8, 'Bitgilər', '0', '0', 0, 0),
(54, 'a684eceee76fc522773286a895bc8436', '2y-10-swtx59srd1ag8v7ue8-cluqgk8mzr9b4bzhpvmki154w2meh1lwdy', 8, 'Digər', '0', '0', 0, 0),
(55, 'b53b3a3d6ab90ce0268229151c9bde11', '2y-10-y2abnwf8jqf6jugebwhjku-niwsxratgxxpjqgjgdv4p3bq1ttl6i', 9, 'İnternet, Telekom', '0', '0', 0, 0),
(56, '9f61408e3afb633e50cdf1b20de6f466', '2y-10-1j9czsiukqv6mrwhl62hnevoli7d3vpde2lj4wt1beavaofxtxtby', 9, 'Mebel Yığılması Və Təmiri', '0', '0', 0, 0),
(57, '72b32a1f754ba1c09b3695e0cb6cde7f', '2y-10-9wnc8safon0nwup4cg45cexwnjzbyzup4sm15t1-aqocilfi9a2s', 9, 'Musiqi, əyləncə Və Tədbirlər', '0', '0', 0, 0),
(58, '66f041e16a60928b05a7e228a89c3799', '2y-10-shhqu72wtew-dyxmjqyxao0oo7dnqworz0xchsa9ccpqtcapz-4bc', 9, 'Mühasibat Xidmətləri', '0', '0', 0, 0),
(59, '093f65e080a295f8076b1c5722a46aa2', '2y-10-ia4r-dtyukpdpvgfxwecxodxjm8rcnpl0ixze0zypqoesdjytmcxk', 9, 'Reklam, Dizayn Cə Poliqrafiya', '0', '0', 0, 0),
(60, '072b030ba126b2f4b2374f342be9ed44', '2y-10-syzk3iug3cktxcoos7e0sockrkmxxhqf4jqfeiudcxly1xkfpg-tw', 9, 'Sığorta Xidmətləri', '0', '0', 0, 0),
(61, '7f39f8317fbdb1988ef4c628eba02591', '2y-10-jnpiz5f76jcboy2pthkhguam-0zzdqcefazwve44hpx-si7c-wam2', 9, 'Təhlükəsiz Sistemlərinin Qurulması', '0', '0', 0, 0),
(62, '44f683a84163b3523afe57c2e008bc8c', '2y-10-o0uyn0jownr10iya-hovbo-pcuynoojavyf3zlptftp7pxsfxgkdi', 9, 'Təlim,hazırlıq Kursları', '0', '0', 0, 0),
(63, '03afdbd66e7929b125f8597834fa83a4', '2y-10-fosh9ca9efphqet66qn8yoh8iwux3jfl72jqcvsi39ngmihd6wmui', 9, 'Texnika Təmiri', '0', '0', 0, 0),
(64, 'ea5d2f1c4608232e07d3aa3d998e5135', '2y-10-daxak0wu04fgjncbsnrvrubasnk9y-l2jyqk48yhrful5ty0s1p3w', 9, 'Tibbi Xidmətlər', '0', '0', 0, 0),
(65, 'fc490ca45c00b1249bbe3554a4fdf6fb', '2y-10-wgq2p6itndruvd9r7h8yd-fdz5qf8d-uu0ctwdbdt-sgqirq26evu', 9, 'Avadnlığın Icarəsi', '0', '0', 0, 0),
(66, '3295c76acbf4caaed33c36b1b5fc2cb1', '2y-10-bt1hvqzdtwj0zz3sifzxhu7jkdpoghthqrl7oup16w1pbcu1q-hj2', 9, 'Avadanlıqların Quraşdırılması', '0', '0', 0, 0),
(67, '735b90b4568125ed6c3f678819b6e058', '2y-10-ueqhg-xg3tkf8axfskphlus-17spog2t65z6gxvuxxztcne73yg3', 9, 'Tərcumə', '0', '0', 0, 0),
(68, 'a3f390d88e4c41f2747bfa2f1b5f87db', '2y-10-1yvmskiq0c0sm-eyf0dugogxc-ox2ftcelmf8hh3oybcovavnhv1y', 9, 'İş Elanları', '0', '0', 0, 0),
(69, '14bfa6bb14875e45bba028a21ed38046', '2y-10-vuwvtixpeqmouepifeovoex7zx-q71w-i8uvrpemafyz7-sycuxx6', 9, 'Avtoservis Və Diaqnostika', '0', '0', 0, 0),
(70, '7cbbc409ec990f19c78c75bd1e06f215', '2y-10-pzn0qenba6vpopmw0a4lm-kv18oxshubchrw7omlfm-kvmkfypta6', 9, 'Nəqliyyat Və Logistika', '0', '0', 0, 0),
(71, 'e2c420d928d4bf8ce0ff2ec19b371514', '2y-10-jqxxyeiqdrbxzuwzn6q0ulaseozqsqllfa-dbisc10qboqp9tosq', 9, 'Dayələr Baxıcılar', '0', '0', 0, 0),
(72, '32bb90e8976aab5298d5da10fe66f21d', '2y-10-zjmtpwvd-mbqwc7ygxlfe-oujd-vjqnmq7bxp2hb8u-drkyhlrh7w', 9, 'Foto Və Video çəkiliş Xidmətləri', '0', '0', 0, 0),
(73, 'd2ddea18f00665ce8623e36bd4e3c7c5', '2y-10-pvqbguvwoi8otgw6gy0xauw1rmmqzlfeyoz-r8oslc8owkh7mweqw', 9, 'Hüquq Xidmətləri', '0', '0', 0, 0),
(74, 'ad61ab143223efbc24c7d2583be69251', '2y-10-kygzdhfo9oyetvd6-l2ix-dcv76bpri8ufdyubrtmhedjwxvpsche', 9, 'Digər', '0', '0', 0, 0),
(75, 'd09bf41544a3365a46c9077ebb5e35c3', '2y-10-hepcobhpzrdlgkm7isd9luolvitmewgy5roduft4djcfhr1rsdmmi', 10, 'Kitab Və Jurnallar', '0', '0', 0, 0),
(76, 'fbd7939d674997cdb4692d34de8633c4', '2y-10-vfa1wkvdy9oz-rf-yufeduofvddtqjw-46ah98jqrrr5z68iwdlxi', 10, 'Kolleksiya', '0', '0', 0, 0),
(77, '28dd2c7955ce926456240b2ff0100bde', '2y-10-wc-xo7znuqf5kyj971xuuohnkz5ik4ja8uiwijce5r1c4uxhpojrg', 10, 'Ofis Avadanlığı', '0', '0', 0, 0),
(78, '35f4a8d465e6e1edc05f3d8ab658c551', '2y-10-t2yg1mxflltvdh-ozlnpk-pkzwajyrnfcqari5vo1mkbazk5gunbi', 10, 'Digər', '0', '0', 0, 0),
(79, 'd1fe173d08e959397adf34b1d77e88d7', '2y-10-hhscsxmixozxpe3xgnkixudtyho0sz0w2m77jwda0kiu5ffrfrxdq', 11, 'Qidalanma, Keyterinq', '0', '0', 0, 0),
(80, 'f033ab37c30201f73f142449d037028d', '2y-10-qdy6lyxmqovktxkdzxgboegkyqsdise4pwkofpxcpvut6tycourfo', 11, 'Yuyucu Vasitələr Və Təmizlik', '0', '0', 0, 0),
(81, '43ec517d68b6edd3015b3edc9a11367b', '2y-10-uuu9r0hhy3o71ngl66ratugitwd9xukeqwje-48ce-b087q-ffcua', 11, 'Ərzaq', '0', '0', 0, 0),
(82, '9778d5d219c5080b9a6a17bef029331c', '2y-10-9kgza6gdh5fnd02a4imiedt0sxv5caeybmtq5tfhgzbeez8ixcyo', 11, 'Digər', '0', '0', 0, 0),
(83, 'fe9fc289c3ff0af142b6d3bead98a923', '2y-10-rc4bavvfikg7lw5rfoie8oam2ogndm-tdkazhxfusknbzerjlhxlo', 12, 'Digər', '0', '0', 0, 0),
(86, '93db85ed909c13838ff95ccfa94cebd9', '2y-10-fkknbcqbtsgqf0ctq1hf7eebln8g63oo5hop7gl9a1pyi9pbjoz-s', 1, 'Aksesuarlar', '1', '0', 0, 4),
(87, 'c7e1249ffc03eb9ded908c236bd1996d', '2y-10-qqpolcmlff1x5lvqhcnf8ojr55q1lzrnaiunuqdpnrweurwqn12m6', 2, 'Bağ Evləri', '1', '0', 0, 3),
(88, '2a38a4a9316c49e5a833517c45d31070', '2y-10-1s6dkeqxjtp7x0vwxbds-oivcc8gqb4he7px34jhr5gjqanovrz0k', 2, 'Həyət Evləri', '1', '0', 0, 4),
(89, '7647966b7343c29048673252e490f736', '2y-10-jebs-9ef-wyihl5ldlbmqofnvvwjsf4lh2gqxwnvwow-swkaenziw', 2, 'Ofislər', '1', '0', 0, 7),
(90, '8613985ec49eb8f757ae6439e879bb2a', '2y-10-34wfbi69yvnssjycni0opuahe8bxni4i4l9o-flqr0ztaknevfqge', 5, 'Elektron Kitablar', '1', '0', 0, 12),
(91, '54229abfcfa5649e7003b83dd4755294', '2y-10-7vewa4fdeocckn64mzhnroiobsnbqbn-mlsoxqv7oxaqke1z0rvi2', 5, 'NetBook', '1', '0', 0, 7),
(93, '98dce83da57b0395e163467c9dae521b', '2y-10-k5z1utkzvz4cf0emjq-k4euu9p3xxcibaeond64luph7pgeyk1vyq', 5, 'Proqramlar', '1', '0', 0, 10),
(94, 'f4b9ec30ad9f68f89b29639786cb62ef', '2y-10-ylghbwwd2nbscl7h7kjuqopw-1y-otscgwangnngk-jtsjxed-sy', 5, 'Oyun Pultları', '1', '0', 0, 11);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `karoqoriya`
--
ALTER TABLE `karoqoriya`
  ADD PRIMARY KEY (`karoqoriya_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `karoqoriya`
--
ALTER TABLE `karoqoriya`
  MODIFY `karoqoriya_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
