<?php

if(isset($_SERVER["REMOTE_ADDR"])){
	$IPAdresi				   	=	$_SERVER["REMOTE_ADDR"];
}else{
	$IPAdresi				   	=	"";
}
$ZamanDamgasi					=	time();
$TarihSaat						=	date("d.m.Y H:i:s", $ZamanDamgasi);
$YiliBul						  =	date("Y");


$SaniyeHesaplamaBirSaniye		=	1;
$SaniyeHesaplamaBirDakika		=	60;
$SaniyeHesaplamaBirSaat			=	3600;
$SaniyeHesaplamaBirGun			=	86400;
$SaniyeHesaplamaBirAy			=	2592000;
$SaniyeHesaplamaBirYil			=	31536000;


function TumBosluklariSil($Deger){
	$Filtrele		=	preg_replace("/\s/", "", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
} 


function BirdenFazlaTumBosluklariSil($Deger){
	$Filtrele			=	preg_replace("/\s+/", " ", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
} 

function HarfVeRakamHaricTumKarakterleriSil($Deger){
	$Filtrele			=	preg_replace("/[^a-zA-Z0-9çÇğĞıİöÖşŞüÜ]/", "", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}

function HarflerHaricTumKarakterleriSil($Deger){
	$Filtrele			=	preg_replace("/[^a-zA-ZçÇğĞıİöÖşŞüÜ]/", "", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}

function RakamlarHaricTumKarakterleriSil($Deger){
	$Filtrele			=	preg_replace("/[^0-9]/", "", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}


function EMailKarakterleriHaricTumKarakterleriSil($Deger){
	$Filtrele			=	preg_replace("/[^a-z0-9_\-\.@]/", "", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}

function LinkKarakterleriHaricTumKarakterleriSil($Deger){
	$Filtrele			=	preg_replace("/[^a-z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]/", "", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}

function GirisKarakterleriHaricTumKarakterleriSil($Deger){
	$Filtrele			=	preg_replace("/[^a-zA-Z0-9çÇğĞıİöÖşŞüÜ]/", "", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}

function DosyaKarakterleriHaricTumKarakterleriSil($Deger){
	$Filtrele			=	preg_replace("/[^a-zA-Z0-9çÇğĞıİöÖşŞüÜ ]/", "", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}


function TumBosluklariTireIleDegistir($Deger){
	$Filtrele			=	preg_replace("/\s/", "-", $Deger);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}


function BuyukHarfKucukHarfDegistir($Deger){
	$Degisecekler	=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X");
	$Degisenler		=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function KucukHarfBuyukHarfDegistir($Deger){
	$Degisecekler	=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x");
	$Degisenler		=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function IngilizceyeGoreBuyukHarfKucukHarfDegistir($Deger){
	$Degisecekler	=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X");
	$Degisenler		=	array("a", "b", "c", "c", "d", "e", "f", "g", "g", "h", "i", "i", "j", "k", "l", "m", "n", "o", "o", "p", "r", "s", "s", "t", "u", "u", "v", "y", "z", "q", "w", "x");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function IngilizceyeGoreKucukHarfBuyukHarfDegistir($Deger){
	$Degisecekler	=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x");
	$Degisenler		=	array("A", "B", "C", "C", "D", "E", "F", "G", "G", "H", "I", "I", "J", "K", "L", "M", "N", "O", "O", "P", "R", "S", "S", "T", "U", "U", "V", "Y", "Z", "Q", "W", "X");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}

function TurkceHarfleriIngilizceHarflereDegistir($Deger){
	$Degisecekler	=	array("Ç", "ç", "Ğ", "ğ", "İ", "ı", "Ö", "ö", "Ş", "ş", "Ü", "ü");
	$Degisenler		=	array("C", "c", "G", "g", "I", "i", "O", "o", "S", "s", "U", "u");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function AmpersantlariEtkili($Deger){
	$Degisecekler	=	array("&amp;");
	$Degisenler		=	array("&");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function CiftTirnaklariEtkili($Deger){
	$Degisecekler	=	array("&quot;");
	$Degisenler		=	array("\"");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}

function TekTirnaklariEtkili($Deger){
	$Degisecekler	=	array("&#039;", "&#39;");
	$Degisenler		=	array("'", "'");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function KucukIsaretleriniEtkili($Deger){
	$Degisecekler	=	array("&lt;");
	$Degisenler		=	array("<");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}

function BuyukIsaretleriniEtkili($Deger){
	$Degisecekler	=	array("&gt;");
	$Degisenler		=	array(">");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function RleriVeNleriBoslukYap($Deger){
	$Degisecekler	=	array("\r", "\n");
	$Degisenler		=	array(" ", " ");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function RleriVeNleriSil($Deger){
	$Degisecekler	=	array("\r", "\n");
	$Degisenler		=	array("", "");
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}


function KullaniciAdiVeSifresiIcerikleriniFiltrele($Deger){
	$Bir		=	TumBosluklariSil($Deger);
	$Iki		=	GirisKarakterleriHaricTumKarakterleriSil($Bir);
	$Uc			=	strip_tags($Iki);
	$Dort		=	htmlspecialchars($Uc, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Dort;
	return $Sonuc;
}


function HarfliVeSayiliIcerikleriFiltrele($Deger){
	$Bir		=	trim($Deger);
	$Iki		=	strip_tags($Bir);
	$Uc			=	htmlspecialchars($Iki, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Uc;
	return $Sonuc;
}



function HarfliIcerikleriFiltrele($Deger){
	$Bir		=	trim($Deger);
	$Iki		=	strip_tags($Bir);
	$Uc			=	HarflerHaricTumKarakterleriSil($Iki);
	$Dort		=	htmlspecialchars($Uc, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Dort;
	return $Sonuc;
}


function SayiliIcerikleriFiltrele($Deger){
	$Bir		=	TumBosluklariSil($Deger);
	$Iki		=	strip_tags($Bir);
	$Uc			=	RakamlarHaricTumKarakterleriSil($Iki);
	$Dort		=	htmlspecialchars($Uc, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Dort;
	return $Sonuc;
}


function EMailliIcerikleriFiltrele($Deger){
	$Bir		=	TumBosluklariSil($Deger);
	$Iki		=	TurkceHarfleriIngilizceHarflereDegistir($Bir);
	$Uc			=	IngilizceyeGoreBuyukHarfKucukHarfDegistir($Iki);
	$Dort		=	strip_tags($Uc);
	$Bes		=	EMailKarakterleriHaricTumKarakterleriSil($Dort);
	$Alti		=	htmlspecialchars($Bes, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Alti;
	return $Sonuc;
}


function LinkliIcerikleriFiltrele($Deger){
	$Bir		=	TumBosluklariSil($Deger);
	$Iki		=	TurkceHarfleriIngilizceHarflereDegistir($Bir);
	$Uc			=	IngilizceyeGoreBuyukHarfKucukHarfDegistir($Iki);
	$Dort		=	strip_tags($Uc);
	$Bes		=	LinkKarakterleriHaricTumKarakterleriSil($Dort);
	$Alti		=	htmlspecialchars($Bes, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Alti;
	return $Sonuc;
}


function TelefonluIcerikleriFiltrele($Deger){
	$Bir		=	TumBosluklariSil($Deger);
	$Iki		=	strip_tags($Bir);
	$Uc			=	htmlspecialchars($Iki, ENT_QUOTES, "ISO-8859-1", true);
	$Dort		=	RakamlarHaricTumKarakterleriSil($Uc);
	$Bes		=	substr($Dort, -10);
	$Sonuc		=	$Bes;
	return $Sonuc;
}


function UluslararasiKodIcerikleriniFiltrele($Deger){
	$Bir		=	TumBosluklariSil($Deger);
	$Iki		=	TurkceHarfleriIngilizceHarflereDegistir($Bir);
	$Uc			=	IngilizceyeGoreKucukHarfBuyukHarfDegistir($Iki);
	$Dort		=	strip_tags($Uc);
	$Bes		=	HarflerHaricTumKarakterleriSil($Dort);
	$Alti		=	htmlspecialchars($Bes, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Alti;
	return $Sonuc;
}


function EditorluIcerikleriFiltrele($Deger){
	$Bir		=	trim($Deger);
	$Iki		=	htmlspecialchars($Bir, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Iki;
	return $Sonuc;
}


function DosyaliIcerikleriniFiltrele($Deger){
	$Bir		=	trim($Deger);
	$Iki		=	htmlspecialchars($Bir, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Iki;
	return $Sonuc;
}



function LinkDogrulugunuKontrolEt($Deger){
	$AlanAdiKontrolYapisi		=	"/^(http(s)?:\/\/.)?(www\.)?[a-zA-Z0-9\.\:\+\-\_\#\=\%\~\@]{2,256}\.[a-z]{2,6}\b([a-zA-Z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]*)+$/";
		if(preg_match($AlanAdiKontrolYapisi, $Deger)){
			$Sonuc	=	1;
		}else{
			$Sonuc	=	0;
		}
	return $Sonuc;
}


function LinkDogrulugunuOnEkZorunluKontrolEt($Deger){
	$AlanAdiKontrolYapisi		=	"/^(http(s)?:\/\/.)+(www\.)?[a-zA-Z0-9\.\:\+\-\_\#\=\%\~\@]{2,256}\.[a-z]{2,6}\b([a-zA-Z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]*)+$/";
		if(preg_match($AlanAdiKontrolYapisi, $Deger)){
			$Sonuc	=	1;
		}else{
			$Sonuc	=	0;
		}
	return $Sonuc;
}


function MetinIcerisindekiEMailAdresiniKontrolEtVeBul($Deger){
	$EMailAdresiKontrolYapisi		=	"/\s+(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))\s+/";
	preg_match_all($EMailAdresiKontrolYapisi, $Deger, $BulununanDeger);
	$TamEslesmeDizisi		=	$BulununanDeger[0];
	$YeniDiziOlustur		=	array();
	foreach($TamEslesmeDizisi as $Icerik){
		$IcerikBicimlendir		=	trim($Icerik);
			if(filter_var($IcerikBicimlendir, FILTER_VALIDATE_EMAIL)){
				$YeniDiziOlustur[] 	=	$IcerikBicimlendir;
			}
	}
	$Sonuc		=	array_unique($YeniDiziOlustur);
	return $Sonuc;
}


function RastgeleResimAdiUret(){
	$Sonuc		=	substr(md5(uniqid(time())), 0, 20);
	return $Sonuc;
}


function HashKoduUret(){
	$Bir		=	rand(10000, 99999);
	$Iki		=	rand(10000, 99999);
	$Uc			=	rand(10000, 99999);
	$Dort		=	rand(10000, 99999);
	$Sonuc		=	$Bir."-".$Iki."-".$Uc."-".$Dort;
	return $Sonuc;
}


function DosyaAdiOlustur($Deger){
	$Bir		=	trim($Deger);
	$Iki		=	BirdenFazlaTumBosluklariSil($Bir);
	$Uc			=	DosyaKarakterleriHaricTumKarakterleriSil($Iki);
	$Dort		=	TumBosluklariTireIleDegistir($Uc);
	$Bes		=	TurkceHarfleriIngilizceHarflereDegistir($Dort);
	$Alti		=	IngilizceyeGoreBuyukHarfKucukHarfDegistir($Bes);
	$Yedi		=	strip_tags($Alti);
	$Sekiz		=	htmlspecialchars($Yedi, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Sekiz;
	return $Sonuc;
}




































function SayiliIcerikleriOndalikHanesizNoktaliYaz($Deger){
	$Sonuc		=	number_format($Deger, 0, "", ".");
	return $Sonuc;
}

function TelefonYaz($Deger){
	$Bir		=	substr($Deger, 0, 3); 
	$Iki		=	substr($Deger, 3, 3);
	$Uc			=	substr($Deger, 6, 2);
	$Dort		=	substr($Deger, 8, 2);
	$Sonuc		=	"0".$Bir." ".$Iki." ".$Uc." ".$Dort;
	return $Sonuc;
}

function YilEtiketiDegeriniYaz($Deger){
	global $YiliBul;
	$Degisecekler	=	array("*|YIL|*");
	$Degisenler		=	array($YiliBul);
	$Sonuc			=	str_replace($Degisecekler, $Degisenler, $Deger);
	return $Sonuc;
}

function DonusumleriGeriDondur($Deger){
	$Bir		=	AmpersantlariEtkili($Deger);
	$Iki		=	KucukIsaretleriniEtkili($Bir);
	$Uc			=	BuyukIsaretleriniEtkili($Iki);
	$Dort		=	TekTirnaklariEtkili($Uc);
	$Bes		=	CiftTirnaklariEtkili($Dort);
	$Sonuc		=	$Bes;
	return $Sonuc;
}

function IceriginIlkHarfiniBuyukYap($Deger){
	$Uzunluk	=	strlen($Deger);
	$Bir		=	trim($Deger);
	$Iki		=	BuyukHarfKucukHarfDegistir($Bir);
	$Uc			=	mb_substr($Iki, 1, $Uzunluk, "UTF-8");
	$Dort		=	mb_substr($Iki, 0, 1, "UTF-8");
	$Bes		=	KucukHarfBuyukHarfDegistir($Dort);
	$Alti		=	$Bes.$Uc;
	$Sonuc		=	$Alti;
	return $Sonuc;
}

function HerKelimeninIlkHarfiniBuyukYap($Deger){
	$Parcala		=	explode(" ", $Deger);
	$KelimeSayisi	=	count($Parcala);
	$Sayi			=	1;
	$Duzenle		=	"";
	$Sonuc			=	"";
	foreach($Parcala as $Kelime){
		$BoslukSil								=	trim($Kelime);
		$IlkHarfiAl								=	substr($BoslukSil, 0, 1);
		$IlkHarfiBuyukHarfeCevir				=	KucukHarfBuyukHarfDegistir($IlkHarfiAl);
		$IlkHarfHaricDigerleriniBul				=	substr($BoslukSil, 1);
		$IlkHarfHaricDigerleriniKucukHarfeCevir	=	BuyukHarfKucukHarfDegistir($IlkHarfHaricDigerleriniBul);
		$Duzenle		.=	$IlkHarfiBuyukHarfeCevir.$IlkHarfHaricDigerleriniKucukHarfeCevir." ";
		if($Sayi==$KelimeSayisi){
			$Sonuc	.=	AmpersantlariEtkili($Duzenle);
			return  mb_convert_case(trim($Sonuc), MB_CASE_TITLE, "UTF-8");
		}
		$Sayi++;
	}
}

function DosyaBoyutuYaz($Deger){
	$GelenDeger			=	floatval($Deger);
	$BoyutDegerleri		=	array(
								0 => array("Boyut" => "TB", "Hesaplama" => pow(1024, 4)),
								1 => array("Boyut" => "GB", "Hesaplama" => pow(1024, 3)),
								2 => array("Boyut" => "MB", "Hesaplama" => pow(1024, 2)),
								3 => array("Boyut" => "KB", "Hesaplama" => 1024),
								4 => array("Boyut" => "B", "Hesaplama" => 1)
							);
	foreach($BoyutDegerleri as $IslemBilgisi){
		if($GelenDeger>=$IslemBilgisi["Hesaplama"]){
			$Sonuc		=	$GelenDeger / $IslemBilgisi["Hesaplama"];
			$Sonuc		=	str_replace(".", ",", strval(round($Sonuc, 2)))." ".$IslemBilgisi["Boyut"];
		}
	}
	return $Sonuc;
}

function DinlendirilmelerIcinBaslangicVeBitisHesapla($Deger){
	global	$ZamanDamgasi;
	global	$SaniyeHesaplamaBirSaat;
	global	$SaniyeHesaplamaBirGun;
	global	$SaniyeHesaplamaBirAy;
	
	if($Deger=="1 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + $SaniyeHesaplamaBirSaat;
	}elseif($Deger=="2 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 2);
	}elseif($Deger=="3 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 3);
	}elseif($Deger=="4 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 4);
	}elseif($Deger=="5 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 5);
	}elseif($Deger=="6 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 6);
	}elseif($Deger=="7 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 7);
	}elseif($Deger=="8 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 8);
	}elseif($Deger=="9 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 9);
	}elseif($Deger=="10 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 10);
	}elseif($Deger=="11 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 11);
	}elseif($Deger=="12 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 12);
	}elseif($Deger=="13 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 13);
	}elseif($Deger=="14 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 14);
	}elseif($Deger=="15 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 15);
	}elseif($Deger=="16 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 16);
	}elseif($Deger=="17 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 17);
	}elseif($Deger=="18 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 18);
	}elseif($Deger=="19 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 19);
	}elseif($Deger=="20 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 20);
	}elseif($Deger=="21 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 21);
	}elseif($Deger=="22 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 22);
	}elseif($Deger=="23 Saat"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 23);
	}elseif($Deger=="1 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + $SaniyeHesaplamaBirGun;
	}elseif($Deger=="2 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 2);
	}elseif($Deger=="3 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 3);
	}elseif($Deger=="4 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 4);
	}elseif($Deger=="5 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 5);
	}elseif($Deger=="6 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 6);
	}elseif($Deger=="7 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 7);
	}elseif($Deger=="8 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 8);
	}elseif($Deger=="9 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 9);
	}elseif($Deger=="10 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 10);
	}elseif($Deger=="11 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 11);
	}elseif($Deger=="12 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 12);
	}elseif($Deger=="13 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 13);
	}elseif($Deger=="14 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 14);
	}elseif($Deger=="15 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 15);
	}elseif($Deger=="16 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 16);
	}elseif($Deger=="17 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 17);
	}elseif($Deger=="18 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 18);
	}elseif($Deger=="19 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 19);
	}elseif($Deger=="20 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 20);
	}elseif($Deger=="21 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 21);
	}elseif($Deger=="22 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 22);
	}elseif($Deger=="23 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 23);
	}elseif($Deger=="24 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 24);
	}elseif($Deger=="25 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 25);
	}elseif($Deger=="26 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 26);
	}elseif($Deger=="27 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 27);
	}elseif($Deger=="28 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 28);
	}elseif($Deger=="29 Gün"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirGun * 29);
	}elseif($Deger=="1 Ay"){
		$BitisTarihiZamanDamgasi	=	$ZamanDamgasi + $SaniyeHesaplamaBirAy;
	}
	
	$BaslangicTarihiZamanDamgasi	=	$ZamanDamgasi;
	$BaslangicTarihi				=	date("d.m.Y H:i:s", $BaslangicTarihiZamanDamgasi);
	$BitisTarihiZamanDamgasi		=	$BitisTarihiZamanDamgasi;
	$BitisTarihi					=	date("d.m.Y H:i:s", $BitisTarihiZamanDamgasi);
	$ZamanDegerleri					=	array($BaslangicTarihiZamanDamgasi, $BaslangicTarihi, $BitisTarihiZamanDamgasi, $BitisTarihi);
	return $ZamanDegerleri;
}

function YeniGonderimlerIcinSureHesapla($Deger){
	global	$ZamanDamgasi;
	global	$SaniyeHesaplamaBirDakika;
	global	$SaniyeHesaplamaBirSaat;
	global	$SaniyeHesaplamaBirGun;
	
	if($Deger=="1 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + $SaniyeHesaplamaBirDakika;
	}elseif($Deger=="2 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirDakika * 2);
	}elseif($Deger=="3 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirDakika * 3);
	}elseif($Deger=="4 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirDakika * 4);
	}elseif($Deger=="5 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirDakika * 5);
	}elseif($Deger=="10 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirDakika * 10);
	}elseif($Deger=="15 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirDakika * 15);
	}elseif($Deger=="30 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirDakika * 30);
	}elseif($Deger=="45 Dakika"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirDakika * 45);
	}elseif($Deger=="1 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + $SaniyeHesaplamaBirSaat;
	}elseif($Deger=="2 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 2);
	}elseif($Deger=="3 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 3);
	}elseif($Deger=="4 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 4);
	}elseif($Deger=="5 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 5);
	}elseif($Deger=="6 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 6);
	}elseif($Deger=="7 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 7);
	}elseif($Deger=="8 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 8);
	}elseif($Deger=="9 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 9);
	}elseif($Deger=="10 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 10);
	}elseif($Deger=="11 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 11);
	}elseif($Deger=="12 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 12);
	}elseif($Deger=="13 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 13);
	}elseif($Deger=="14 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 14);
	}elseif($Deger=="15 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 15);
	}elseif($Deger=="16 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 16);
	}elseif($Deger=="17 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 17);
	}elseif($Deger=="18 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 18);
	}elseif($Deger=="19 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 19);
	}elseif($Deger=="20 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 20);
	}elseif($Deger=="21 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 21);
	}elseif($Deger=="22 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 22);
	}elseif($Deger=="23 Saat"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + ($SaniyeHesaplamaBirSaat * 23);
	}elseif($Deger=="1 Gün"){
		$TarihIcinZamanDamgasi	=	$ZamanDamgasi + $SaniyeHesaplamaBirGun;
	}
	
	$YeniGonderimTarihiZamanDamgasi		=	$TarihIcinZamanDamgasi;
	$YeniGonderimTarihi					=	date("d.m.Y H:i:s", $YeniGonderimTarihiZamanDamgasi);
	$ZamanDegerleri						=	array($YeniGonderimTarihiZamanDamgasi, $YeniGonderimTarihi);
	return $ZamanDegerleri;
}

function TemaOnIzlemeIcinDuzenle($TemaIDsiDegeri, $DosyaIcerigiDegeri){
	global $VeritabaniBaglantisi;
	global $SiteAyarlariKaydiSiteCopyrightMetni;
	global $SiteAyarlariKaydiSiteAnaEMailAdresi;
	global $FirmaAyarlariKaydiFirmaUnvani;
	global $FirmaAyarlariKaydiFirmaAdresi;
	global $FirmaAyarlariKaydiFirmaPostaKodu;
	global $FirmaAyarlariKaydiFirmaIlcesi;
	global $FirmaAyarlariKaydiFirmaSehri;
	global $FirmaAyarlariKaydiFirmaUlkesi;
	global $FirmaAyarlariKaydiFirmaTelefonu;
	global $YiliBul;
	
	$Ulkeler				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$FirmaAyarlariKaydiFirmaUlkesi' ORDER BY ID ASC LIMIT 1");
	$UlkelerKayitSayisi		=	$Ulkeler->num_rows;
		if($UlkelerKayitSayisi>0){
			$UlkeKaydi		=	$Ulkeler->fetch_assoc();
				$UlkeKaydiUlkeAdi	=	$UlkeKaydi["UlkeAdi"];
		}else{
			$UlkeKaydiUlkeAdi		=	"";
		}
	
	$Sehirler				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$FirmaAyarlariKaydiFirmaSehri' ORDER BY ID ASC LIMIT 1");
	$SehirlerKayitSayisi	=	$Sehirler->num_rows;
		if($SehirlerKayitSayisi>0){
			$SehirlerKaydi	=	$Sehirler->fetch_assoc();
				$SehirlerKaydiSehirAdi		=	$SehirlerKaydi["SehirAdi"];
		}else{
			$SehirlerKaydiSehirAdi			=	"";
		}
	
	$SosyalAglar		=	"";
	$SosyalAglarSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari ORDER BY SiraNumarasi ASC");
	$SosyalAglarSorgusuKayitSayisi		=	$SosyalAglarSorgusu->num_rows;
		if($SosyalAglarSorgusuKayitSayisi>0){
			while($SosyalAglarSorgusuKayitlari=$SosyalAglarSorgusu->fetch_assoc()){
				$SosyalAglarSorgusuKayitlariSosyalAgLogosu			=	$SosyalAglarSorgusuKayitlari["SosyalAgLogosu"];
				$SosyalAglarSorgusuKayitlariSosyalAgAdi				=	$SosyalAglarSorgusuKayitlari["SosyalAgAdi"];
				$SosyalAglarSorgusuKayitlariSosyalAgSayfasiLinki	=	$SosyalAglarSorgusuKayitlari["SosyalAgSayfasiLinki"];
				
				$SosyalAglar	.=	"<a href='".$SosyalAglarSorgusuKayitlariSosyalAgSayfasiLinki."' target='_blank' style='width: 24px; min-width: 24px; max-width: 24px; height: 24px; min-height: 24px; max-height: 24px; border: none; outline: none; cursor: pointer; text-decoration: none;'><img src='http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/".$SosyalAglarSorgusuKayitlariSosyalAgLogosu."' width='24' height='24' alt='".$SosyalAglarSorgusuKayitlariSosyalAgAdi."' title='".$SosyalAglarSorgusuKayitlariSosyalAgAdi."'></a> ";
			}
		}
			
	$YapayWebSitesiLinki				=	"http://www.".SITEDOMAINI.SITEDIZINI."/index.php";
	$YapayEMailAdresi					=	$SiteAyarlariKaydiSiteAnaEMailAdresi;
	$IzinsizGonderimBildirimLinki		=	"http://www.".SITEDOMAINI.SITEDIZINI."/IzinsizGonderimBildirimi.php";
	$FirmaTelefonuYaz					=	TelefonYaz($FirmaAyarlariKaydiFirmaTelefonu);
	$FirmaAdresiYaz						=	$FirmaAyarlariKaydiFirmaAdresi." ".$FirmaAyarlariKaydiFirmaPostaKodu." ".$FirmaAyarlariKaydiFirmaIlcesi." ".$SehirlerKaydiSehirAdi." ".$UlkeKaydiUlkeAdi;
	$SosyalAglarYaz						=	DosyaliIcerikleriniFiltrele($SosyalAglar);
	$TakipLinkiYaz						=	"http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/Takip.gif";
	
	$TemaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID='$TemaIDsiDegeri' ORDER BY ID ASC LIMIT 1");
	$TemaSorgusuKayitSayisi		=	$TemaSorgusu->num_rows;
		if($TemaSorgusuKayitSayisi>0){
			$TemaSorgusuKaydi	=	$TemaSorgusu->fetch_assoc();
				$TemaSorgusuKaydiLogosu									=	$TemaSorgusuKaydi["Logosu"];
					$TemaSorgusuKaydiLogosuYaz						=	"http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/".$TemaSorgusuKaydiLogosu;
				$TemaSorgusuKaydiLogoLinki								=	$TemaSorgusuKaydi["LogoLinki"];
				$TemaSorgusuKaydiBaslikMetniBir							=	$TemaSorgusuKaydi["BaslikMetniBir"];
				$TemaSorgusuKaydiIcerikMetniBir							=	$TemaSorgusuKaydi["IcerikMetniBir"];
				$TemaSorgusuKaydiIcerikMetniBirinciButonMetni			=	$TemaSorgusuKaydi["IcerikMetniBirinciButonMetni"];
				$TemaSorgusuKaydiIcerikMetniBirinciButonLinki			=	$TemaSorgusuKaydi["IcerikMetniBirinciButonLinki"];
				$TemaSorgusuKaydiIcerikMetniIkinciButonMetni			=	$TemaSorgusuKaydi["IcerikMetniIkinciButonMetni"];
				$TemaSorgusuKaydiIcerikMetniIkinciButonLinki			=	$TemaSorgusuKaydi["IcerikMetniIkinciButonLinki"];
				$TemaSorgusuKaydiBirinciResimDosyasiAdi					=	$TemaSorgusuKaydi["BirinciResimDosyasiAdi"];
					$TemaSorgusuKaydiBirinciResimDosyasiAdiYaz		=	"http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/".$TemaSorgusuKaydiBirinciResimDosyasiAdi;
				$TemaSorgusuKaydiBirinciResimLinki						=	$TemaSorgusuKaydi["BirinciResimLinki"];
				$TemaSorgusuKaydiBirinciResimAltMetni					=	$TemaSorgusuKaydi["BirinciResimAltMetni"];
				$TemaSorgusuKaydiBirinciResimBirinciButonMetni			=	$TemaSorgusuKaydi["BirinciResimBirinciButonMetni"];
				$TemaSorgusuKaydiBirinciResimBirinciButonLinki			=	$TemaSorgusuKaydi["BirinciResimBirinciButonLinki"];
				$TemaSorgusuKaydiBirinciResimIkinciButonMetni			=	$TemaSorgusuKaydi["BirinciResimIkinciButonMetni"];
				$TemaSorgusuKaydiBirinciResimIkinciButonLinki			=	$TemaSorgusuKaydi["BirinciResimIkinciButonLinki"];
				$TemaSorgusuKaydiIkinciResimDosyasiAdi					=	$TemaSorgusuKaydi["IkinciResimDosyasiAdi"];
					$TemaSorgusuKaydiIkinciResimDosyasiAdiYaz		=	"http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/".$TemaSorgusuKaydiIkinciResimDosyasiAdi;
				$TemaSorgusuKaydiIkinciResimLinki						=	$TemaSorgusuKaydi["IkinciResimLinki"];
				$TemaSorgusuKaydiIkinciResimAltMetni					=	$TemaSorgusuKaydi["IkinciResimAltMetni"];
				$TemaSorgusuKaydiIkinciResimBirinciButonMetni			=	$TemaSorgusuKaydi["IkinciResimBirinciButonMetni"];
				$TemaSorgusuKaydiIkinciResimBirinciButonLinki			=	$TemaSorgusuKaydi["IkinciResimBirinciButonLinki"];
				$TemaSorgusuKaydiIkinciResimIkinciButonMetni			=	$TemaSorgusuKaydi["IkinciResimIkinciButonMetni"];
				$TemaSorgusuKaydiIkinciResimIkinciButonLinki			=	$TemaSorgusuKaydi["IkinciResimIkinciButonLinki"];

			$Degisecekler		=	array("*|BASLIKMETNI|*", "*|LOGODOSYASI|*", "*|LOGOLINKI|*", "*|ICERIKMETNI|*", "*|ICERIKALANIBIRINCIBUTONMETNI|*", "*|ICERIKALANIBIRINCIBUTONLINKI|*", "*|ICERIKALANIIKINCIBUTONMETNI|*", "*|ICERIKALANIIKINCIBUTONLINKI|*", "*|BIRINCIRESIMDOSYASI|*", "*|BIRINCIRESIMLINKI|*", "*|BIRINCIRESIMALTMETNI|*", "*|BIRINCIRESIMALANIBIRINCIBUTONMETNI|*", "*|BIRINCIRESIMALANIBIRINCIBUTONLINKI|*", "*|BIRINCIRESIMALANIIKINCIBUTONMETNI|*", "*|BIRINCIRESIMALANIIKINCIBUTONLINKI|*", "*|IKINCIRESIMDOSYASI|*", "*|IKINCIRESIMLINKI|*", "*|IKINCIRESIMALTMETNI|*", "*|IKINCIRESIMALANIBIRINCIBUTONMETNI|*", "*|IKINCIRESIMALANIBIRINCIBUTONLINKI|*", "*|IKINCIRESIMALANIIKINCIBUTONMETNI|*", "*|IKINCIRESIMALANIIKINCIBUTONLINKI|*", "*|SOSYALAGLARALANI|*", "*|COPYRIGHTMETNI|*", "*|WEBSITESILINKI|*", "*|EMAILADRESI|*", "*|IZINSIZGONDERIMBILDIRLINKI|*", "*|FIRMAUNVANI|*", "*|FIRMAADRESI|*", "*|FIRMATELEFONU|*", "*|FIRMAEMAILADRESI|*", "*|TAKIP|*", "*|YIL|*");
			$Degisenler			=	array($TemaSorgusuKaydiBaslikMetniBir, $TemaSorgusuKaydiLogosuYaz, $TemaSorgusuKaydiLogoLinki, $TemaSorgusuKaydiIcerikMetniBir, $TemaSorgusuKaydiIcerikMetniBirinciButonMetni, $TemaSorgusuKaydiIcerikMetniBirinciButonLinki, $TemaSorgusuKaydiIcerikMetniIkinciButonMetni, $TemaSorgusuKaydiIcerikMetniIkinciButonLinki, $TemaSorgusuKaydiBirinciResimDosyasiAdiYaz, $TemaSorgusuKaydiBirinciResimLinki, $TemaSorgusuKaydiBirinciResimAltMetni, $TemaSorgusuKaydiBirinciResimBirinciButonMetni, $TemaSorgusuKaydiBirinciResimBirinciButonLinki, $TemaSorgusuKaydiBirinciResimIkinciButonMetni, $TemaSorgusuKaydiBirinciResimIkinciButonLinki, $TemaSorgusuKaydiIkinciResimDosyasiAdiYaz, $TemaSorgusuKaydiIkinciResimLinki, $TemaSorgusuKaydiIkinciResimAltMetni, $TemaSorgusuKaydiIkinciResimBirinciButonMetni, $TemaSorgusuKaydiIkinciResimBirinciButonLinki, $TemaSorgusuKaydiIkinciResimIkinciButonMetni, $TemaSorgusuKaydiIkinciResimIkinciButonLinki, $SosyalAglarYaz, $SiteAyarlariKaydiSiteCopyrightMetni, $YapayWebSitesiLinki, $YapayEMailAdresi, $IzinsizGonderimBildirimLinki, $FirmaAyarlariKaydiFirmaUnvani, $FirmaAdresiYaz, $FirmaTelefonuYaz, $YapayEMailAdresi, $TakipLinkiYaz, $YiliBul);
			$Sonuc				=	str_replace($Degisecekler, $Degisenler, $DosyaIcerigiDegeri);
			return $Sonuc;
		}else{
			return;
		}
}

function MailGonderimiIcinDuzenle($TemaIDsiDegeri, $TemaDosyasiIcerigiDegeri, $WebSitesiLinkiDegeri, $EMailAdresiDegeri, $KampanyaIDsiDegeri, $KisiIDsiDegeri, $HashKoduDegeri, $AdiDegeri="", $SoyadiDegeri=""){
	global $VeritabaniBaglantisi;
	global $SiteAyarlariKaydiSiteCopyrightMetni;
	global $SiteAyarlariKaydiSiteAnaEMailAdresi;
	global $FirmaAyarlariKaydiFirmaUnvani;
	global $FirmaAyarlariKaydiFirmaAdresi;
	global $FirmaAyarlariKaydiFirmaPostaKodu;
	global $FirmaAyarlariKaydiFirmaIlcesi;
	global $FirmaAyarlariKaydiFirmaSehri;
	global $FirmaAyarlariKaydiFirmaUlkesi;
	global $FirmaAyarlariKaydiFirmaTelefonu;
	global $YiliBul;
	
	$WebSitesiLinkiDegeriDuzenle				=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$WebSitesiLinkiDegeri;
	$WebSitesiLinkiDegeriYaz					=	DonusumleriGeriDondur($WebSitesiLinkiDegeriDuzenle);
	
	$IzinsizGonderimBildirLinkiDegeriDuzenle	=	"http://www.".SITEDOMAINI.SITEDIZINI."/IzinsizGonderimBildirimi.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri;
	$IzinsizGonderimBildirLinkiDegeriYaz		=	DonusumleriGeriDondur($IzinsizGonderimBildirLinkiDegeriDuzenle);	
	
	$TakipResmiDegeriDuzenle					=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailAcildiResmi.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri;
	$TakipResmiDegeriYaz						=	DonusumleriGeriDondur($TakipResmiDegeriDuzenle);	
	
	$Ulkeler				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$FirmaAyarlariKaydiFirmaUlkesi' ORDER BY ID ASC LIMIT 1");
	$UlkelerKayitSayisi		=	$Ulkeler->num_rows;
		if($UlkelerKayitSayisi>0){
			$UlkeKaydi		=	$Ulkeler->fetch_assoc();
				$UlkeKaydiUlkeAdi	=	$UlkeKaydi["UlkeAdi"];
		}else{
			$UlkeKaydiUlkeAdi		=	"";
		}
	
	$Sehirler				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$FirmaAyarlariKaydiFirmaSehri' ORDER BY ID ASC LIMIT 1");
	$SehirlerKayitSayisi	=	$Sehirler->num_rows;
		if($SehirlerKayitSayisi>0){
			$SehirlerKaydi	=	$Sehirler->fetch_assoc();
				$SehirlerKaydiSehirAdi		=	$SehirlerKaydi["SehirAdi"];
		}else{
			$SehirlerKaydiSehirAdi			=	"";
		}
	
	if($FirmaAyarlariKaydiFirmaPostaKodu==0){
		$FirmaAyarlariKaydiFirmaPostaKodu		=	"";
	}
	
	$FirmaTelefonuYaz					=	TelefonYaz($FirmaAyarlariKaydiFirmaTelefonu);
	$FirmaAdresiYaz						=	$FirmaAyarlariKaydiFirmaAdresi." ".$FirmaAyarlariKaydiFirmaPostaKodu." ".$FirmaAyarlariKaydiFirmaIlcesi." ".$SehirlerKaydiSehirAdi." ".$UlkeKaydiUlkeAdi;
	
	$SosyalAglar		=	"";
	$SosyalAglarSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari ORDER BY SiraNumarasi ASC");
	$SosyalAglarSorgusuKayitSayisi		=	$SosyalAglarSorgusu->num_rows;
		if($SosyalAglarSorgusuKayitSayisi>0){
			while($SosyalAglarSorgusuKayitlari=$SosyalAglarSorgusu->fetch_assoc()){
				$SosyalAglarSorgusuKayitlariSosyalAgLogosu			=	$SosyalAglarSorgusuKayitlari["SosyalAgLogosu"];
				$SosyalAglarSorgusuKayitlariSosyalAgAdi				=	$SosyalAglarSorgusuKayitlari["SosyalAgAdi"];
				$SosyalAglarSorgusuKayitlariSosyalAgSayfasiLinki	=	$SosyalAglarSorgusuKayitlari["SosyalAgSayfasiLinki"];
					$SosyalAgSayfasiLinkiDuzenle		=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$SosyalAglarSorgusuKayitlariSosyalAgSayfasiLinki;
					
				$SosyalAglar	.=	"<a href='".$SosyalAgSayfasiLinkiDuzenle."' target='_blank' style='width: 24px; min-width: 24px; max-width: 24px; height: 24px; min-height: 24px; max-height: 24px; border: none; outline: none; cursor: pointer; text-decoration: none;'><img src='http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/".$SosyalAglarSorgusuKayitlariSosyalAgLogosu."' width='24' height='24' alt='".$SosyalAglarSorgusuKayitlariSosyalAgAdi."' title='".$SosyalAglarSorgusuKayitlariSosyalAgAdi."'></a> ";
			}
		}
		$SosyalAglarYaz						=	DosyaliIcerikleriniFiltrele($SosyalAglar);	
	
	$TemaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID='$TemaIDsiDegeri' ORDER BY ID ASC LIMIT 1");
	$TemaSorgusuKayitSayisi		=	$TemaSorgusu->num_rows;
		if($TemaSorgusuKayitSayisi>0){
			$TemaSorgusuKaydi	=	$TemaSorgusu->fetch_assoc();
				$TemaSorgusuKaydiLogosu									=	$TemaSorgusuKaydi["Logosu"];
					$TemaSorgusuKaydiLogosuDegeriDuzenle					=	"http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/".$TemaSorgusuKaydiLogosu;
				$TemaSorgusuKaydiLogoLinki								=	$TemaSorgusuKaydi["LogoLinki"];
					$TemaSorgusuKaydiLogoLinkiDegeriDuzenle					=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiLogoLinki;
					$TemaSorgusuKaydiLogoLinkiDegeriYaz						=	DonusumleriGeriDondur($TemaSorgusuKaydiLogoLinkiDegeriDuzenle);
				$TemaSorgusuKaydiBaslikMetniBir							=	$TemaSorgusuKaydi["BaslikMetniBir"];
				$TemaSorgusuKaydiBaslikMetniBirGonderimSayisi			=	$TemaSorgusuKaydi["BaslikMetniBirGonderimSayisi"];
				$TemaSorgusuKaydiBaslikMetniIki							=	$TemaSorgusuKaydi["BaslikMetniIki"];
				$TemaSorgusuKaydiBaslikMetniIkiGonderimSayisi			=	$TemaSorgusuKaydi["BaslikMetniIkiGonderimSayisi"];
				$TemaSorgusuKaydiBaslikMetniUc							=	$TemaSorgusuKaydi["BaslikMetniUc"];
				$TemaSorgusuKaydiBaslikMetniUcGonderimSayisi			=	$TemaSorgusuKaydi["BaslikMetniUcGonderimSayisi"];
				$TemaSorgusuKaydiBaslikMetniDort						=	$TemaSorgusuKaydi["BaslikMetniDort"];
				$TemaSorgusuKaydiBaslikMetniDortGonderimSayisi			=	$TemaSorgusuKaydi["BaslikMetniDortGonderimSayisi"];
				$TemaSorgusuKaydiBaslikMetniBes							=	$TemaSorgusuKaydi["BaslikMetniBes"];
				$TemaSorgusuKaydiBaslikMetniBesGonderimSayisi			=	$TemaSorgusuKaydi["BaslikMetniBesGonderimSayisi"];
					$BaslikMetniGonderimSayisiDizisi		=	array();
						if($TemaSorgusuKaydiBaslikMetniBir!=""){
							$BaslikMetniGonderimSayisiDizisi["Bir"]			=	$TemaSorgusuKaydiBaslikMetniBirGonderimSayisi;
						}
						if($TemaSorgusuKaydiBaslikMetniIki!=""){
							$BaslikMetniGonderimSayisiDizisi["Iki"]			=	$TemaSorgusuKaydiBaslikMetniIkiGonderimSayisi;
						}
						if($TemaSorgusuKaydiBaslikMetniUc!=""){
							$BaslikMetniGonderimSayisiDizisi["Uc"]			=	$TemaSorgusuKaydiBaslikMetniUcGonderimSayisi;
						}
						if($TemaSorgusuKaydiBaslikMetniDort!=""){
							$BaslikMetniGonderimSayisiDizisi["Dort"]		=	$TemaSorgusuKaydiBaslikMetniDortGonderimSayisi;
						}
						if($TemaSorgusuKaydiBaslikMetniBes!=""){
							$BaslikMetniGonderimSayisiDizisi["Bes"]			=	$TemaSorgusuKaydiBaslikMetniBesGonderimSayisi;
						}
					asort($BaslikMetniGonderimSayisiDizisi);
					$BaslikMetniIcinAlinacakDegerinAnahtariniBul	=	array_keys($BaslikMetniGonderimSayisiDizisi);
					$BaslikMetniIcinAlinacakDegeriBul				=	$BaslikMetniIcinAlinacakDegerinAnahtariniBul[0];
						if($BaslikMetniIcinAlinacakDegeriBul=="Bir"){
							$TemaSorgusuKaydiBaslikMetniYaz		=	$TemaSorgusuKaydiBaslikMetniBir;
							$GonderilenBaslik					=	1;
						}elseif($BaslikMetniIcinAlinacakDegeriBul=="Iki"){
							$TemaSorgusuKaydiBaslikMetniYaz		=	$TemaSorgusuKaydiBaslikMetniIki;
							$GonderilenBaslik					=	2;
						}elseif($BaslikMetniIcinAlinacakDegeriBul=="Uc"){
							$TemaSorgusuKaydiBaslikMetniYaz		=	$TemaSorgusuKaydiBaslikMetniUc;
							$GonderilenBaslik					=	3;
						}elseif($BaslikMetniIcinAlinacakDegeriBul=="Dort"){
							$TemaSorgusuKaydiBaslikMetniYaz		=	$TemaSorgusuKaydiBaslikMetniDort;
							$GonderilenBaslik					=	4;
						}elseif($BaslikMetniIcinAlinacakDegeriBul=="Bes"){
							$TemaSorgusuKaydiBaslikMetniYaz		=	$TemaSorgusuKaydiBaslikMetniBes;
							$GonderilenBaslik					=	5;
						}else{
							$TemaSorgusuKaydiBaslikMetniYaz		=	$TemaSorgusuKaydiBaslikMetniBir;
							$GonderilenBaslik					=	1;
						}
				$TemaSorgusuKaydiIcerikMetniBir							=	$TemaSorgusuKaydi["IcerikMetniBir"];
				$TemaSorgusuKaydiIcerikMetniBirGonderimSayisi			=	$TemaSorgusuKaydi["IcerikMetniBirGonderimSayisi"];
				$TemaSorgusuKaydiIcerikMetniIki							=	$TemaSorgusuKaydi["IcerikMetniIki"];
				$TemaSorgusuKaydiIcerikMetniIkiGonderimSayisi			=	$TemaSorgusuKaydi["IcerikMetniIkiGonderimSayisi"];
				$TemaSorgusuKaydiIcerikMetniUc							=	$TemaSorgusuKaydi["IcerikMetniUc"];
				$TemaSorgusuKaydiIcerikMetniUcGonderimSayisi			=	$TemaSorgusuKaydi["IcerikMetniUcGonderimSayisi"];
				$TemaSorgusuKaydiIcerikMetniDort						=	$TemaSorgusuKaydi["IcerikMetniDort"];
				$TemaSorgusuKaydiIcerikMetniDortGonderimSayisi			=	$TemaSorgusuKaydi["IcerikMetniDortGonderimSayisi"];
				$TemaSorgusuKaydiIcerikMetniBes							=	$TemaSorgusuKaydi["IcerikMetniBes"];
				$TemaSorgusuKaydiIcerikMetniBesGonderimSayisi			=	$TemaSorgusuKaydi["IcerikMetniBesGonderimSayisi"];
					$IcerikMetniGonderimSayisiDizisi		=	array();
						if($TemaSorgusuKaydiIcerikMetniBir!=""){
							$IcerikMetniGonderimSayisiDizisi["Bir"]			=	$TemaSorgusuKaydiIcerikMetniBirGonderimSayisi;
						}
						if($TemaSorgusuKaydiIcerikMetniIki!=""){
							$IcerikMetniGonderimSayisiDizisi["Iki"]			=	$TemaSorgusuKaydiIcerikMetniIkiGonderimSayisi;
						}
						if($TemaSorgusuKaydiIcerikMetniUc!=""){
							$IcerikMetniGonderimSayisiDizisi["Uc"]			=	$TemaSorgusuKaydiIcerikMetniUcGonderimSayisi;
						}
						if($TemaSorgusuKaydiIcerikMetniDort!=""){
							$IcerikMetniGonderimSayisiDizisi["Dort"]		=	$TemaSorgusuKaydiIcerikMetniDortGonderimSayisi;
						}
						if($TemaSorgusuKaydiIcerikMetniBes!=""){
							$IcerikMetniGonderimSayisiDizisi["Bes"]			=	$TemaSorgusuKaydiIcerikMetniBesGonderimSayisi;
						}
					asort($IcerikMetniGonderimSayisiDizisi);
					$IcerikMetniIcinAlinacakDegerinAnahtariniBul	=	array_keys($IcerikMetniGonderimSayisiDizisi);
					$IcerikMetniIcinAlinacakDegeriBul				=	$IcerikMetniIcinAlinacakDegerinAnahtariniBul[0];
						if($IcerikMetniIcinAlinacakDegeriBul=="Bir"){
							$TemaSorgusuKaydiIcerikMetniYaz		=	$TemaSorgusuKaydiIcerikMetniBir;
							$GonderilenIcerik					=	1;
						}elseif($IcerikMetniIcinAlinacakDegeriBul=="Iki"){
							$TemaSorgusuKaydiIcerikMetniYaz		=	$TemaSorgusuKaydiIcerikMetniIki;
							$GonderilenIcerik					=	2;
						}elseif($IcerikMetniIcinAlinacakDegeriBul=="Uc"){
							$TemaSorgusuKaydiIcerikMetniYaz		=	$TemaSorgusuKaydiIcerikMetniUc;
							$GonderilenIcerik					=	3;
						}elseif($IcerikMetniIcinAlinacakDegeriBul=="Dort"){
							$TemaSorgusuKaydiIcerikMetniYaz		=	$TemaSorgusuKaydiIcerikMetniDort;
							$GonderilenIcerik					=	4;
						}elseif($IcerikMetniIcinAlinacakDegeriBul=="Bes"){
							$TemaSorgusuKaydiIcerikMetniYaz		=	$TemaSorgusuKaydiIcerikMetniBes;
							$GonderilenIcerik					=	5;
						}else{
							$TemaSorgusuKaydiIcerikMetniYaz		=	$TemaSorgusuKaydiIcerikMetniBir;
							$GonderilenIcerik					=	1;
						}
				$TemaSorgusuKaydiIcerikMetniBirinciButonMetni			=	$TemaSorgusuKaydi["IcerikMetniBirinciButonMetni"];
				$TemaSorgusuKaydiIcerikMetniBirinciButonLinki			=	$TemaSorgusuKaydi["IcerikMetniBirinciButonLinki"];
					$TemaSorgusuKaydiIcerikMetniBirinciButonLinkiDegeriDuzenle			=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiIcerikMetniBirinciButonLinki;
					$TemaSorgusuKaydiIcerikMetniBirinciButonLinkiDegeriYaz				=	DonusumleriGeriDondur($TemaSorgusuKaydiIcerikMetniBirinciButonLinkiDegeriDuzenle);
				$TemaSorgusuKaydiIcerikMetniIkinciButonMetni			=	$TemaSorgusuKaydi["IcerikMetniIkinciButonMetni"];
				$TemaSorgusuKaydiIcerikMetniIkinciButonLinki			=	$TemaSorgusuKaydi["IcerikMetniIkinciButonLinki"];
					$TemaSorgusuKaydiIcerikMetniIkinciButonLinkiDegeriDuzenle			=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiIcerikMetniIkinciButonLinki;
					$TemaSorgusuKaydiIcerikMetniIkinciButonLinkiDegeriYaz				=	DonusumleriGeriDondur($TemaSorgusuKaydiIcerikMetniIkinciButonLinkiDegeriDuzenle);
				$TemaSorgusuKaydiBirinciResimDosyasiAdi					=	$TemaSorgusuKaydi["BirinciResimDosyasiAdi"];
					$TemaSorgusuKaydiBirinciResimDosyasiAdiYaz							=	"http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/".$TemaSorgusuKaydiBirinciResimDosyasiAdi;
				$TemaSorgusuKaydiBirinciResimLinki						=	$TemaSorgusuKaydi["BirinciResimLinki"];
					$TemaSorgusuKaydiBirinciResimLinkiDegeriDuzenle						=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiBirinciResimLinki;
					$TemaSorgusuKaydiBirinciResimLinkiDegeriYaz							=	DonusumleriGeriDondur($TemaSorgusuKaydiBirinciResimLinkiDegeriDuzenle);
				$TemaSorgusuKaydiBirinciResimAltMetni					=	$TemaSorgusuKaydi["BirinciResimAltMetni"];
				$TemaSorgusuKaydiBirinciResimBirinciButonMetni			=	$TemaSorgusuKaydi["BirinciResimBirinciButonMetni"];
				$TemaSorgusuKaydiBirinciResimBirinciButonLinki			=	$TemaSorgusuKaydi["BirinciResimBirinciButonLinki"];
					$TemaSorgusuKaydiBirinciResimBirinciButonLinkiDegeriDuzenle			=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiBirinciResimBirinciButonLinki;
					$TemaSorgusuKaydiBirinciResimBirinciButonLinkiDegeriYaz				=	DonusumleriGeriDondur($TemaSorgusuKaydiBirinciResimBirinciButonLinkiDegeriDuzenle);
				$TemaSorgusuKaydiBirinciResimIkinciButonMetni			=	$TemaSorgusuKaydi["BirinciResimIkinciButonMetni"];
				$TemaSorgusuKaydiBirinciResimIkinciButonLinki			=	$TemaSorgusuKaydi["BirinciResimIkinciButonLinki"];
					$TemaSorgusuKaydiBirinciResimIkinciButonLinkiDegeriDuzenle			=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiBirinciResimIkinciButonLinki;
					$TemaSorgusuKaydiBirinciResimIkinciButonLinkiDegeriYaz				=	DonusumleriGeriDondur($TemaSorgusuKaydiBirinciResimIkinciButonLinkiDegeriDuzenle);
				$TemaSorgusuKaydiIkinciResimDosyasiAdi					=	$TemaSorgusuKaydi["IkinciResimDosyasiAdi"];
					$TemaSorgusuKaydiIkinciResimDosyasiAdiYaz							=	"http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/".$TemaSorgusuKaydiIkinciResimDosyasiAdi;
				$TemaSorgusuKaydiIkinciResimLinki						=	$TemaSorgusuKaydi["IkinciResimLinki"];
					$TemaSorgusuKaydiIkinciResimLinkiDegeriDuzenle						=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiIkinciResimLinki;
					$TemaSorgusuKaydiIkinciResimLinkiDegeriYaz							=	DonusumleriGeriDondur($TemaSorgusuKaydiIkinciResimLinkiDegeriDuzenle);
				$TemaSorgusuKaydiIkinciResimAltMetni					=	$TemaSorgusuKaydi["IkinciResimAltMetni"];
				$TemaSorgusuKaydiIkinciResimBirinciButonMetni			=	$TemaSorgusuKaydi["IkinciResimBirinciButonMetni"];
				$TemaSorgusuKaydiIkinciResimBirinciButonLinki			=	$TemaSorgusuKaydi["IkinciResimBirinciButonLinki"];
					$TemaSorgusuKaydiIkinciResimBirinciButonLinkiDegeriDuzenle			=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiIkinciResimBirinciButonLinki;
					$TemaSorgusuKaydiIkinciResimBirinciButonLinkiDegeriYaz				=	DonusumleriGeriDondur($TemaSorgusuKaydiIkinciResimBirinciButonLinkiDegeriDuzenle);
				$TemaSorgusuKaydiIkinciResimIkinciButonMetni			=	$TemaSorgusuKaydi["IkinciResimIkinciButonMetni"];
				$TemaSorgusuKaydiIkinciResimIkinciButonLinki			=	$TemaSorgusuKaydi["IkinciResimIkinciButonLinki"];
					$TemaSorgusuKaydiIkinciResimIkinciButonLinkiDegeriDuzenle			=	"http://www.".SITEDOMAINI.SITEDIZINI."/MailDonus.php?KampanyaIDsi=".$KampanyaIDsiDegeri."&KisiIDsi=".$KisiIDsiDegeri."&HashKodu=".$HashKoduDegeri."&Link=".$TemaSorgusuKaydiIkinciResimIkinciButonLinki;
					$TemaSorgusuKaydiIkinciResimIkinciButonLinkiDegeriYaz				=	DonusumleriGeriDondur($TemaSorgusuKaydiIkinciResimIkinciButonLinkiDegeriDuzenle);
			
			$Degisecekler		=	array("*|BASLIKMETNI|*", "*|LOGODOSYASI|*", "*|LOGOLINKI|*", "*|ICERIKMETNI|*", "*|ICERIKALANIBIRINCIBUTONMETNI|*", "*|ICERIKALANIBIRINCIBUTONLINKI|*", "*|ICERIKALANIIKINCIBUTONMETNI|*", "*|ICERIKALANIIKINCIBUTONLINKI|*", "*|BIRINCIRESIMDOSYASI|*", "*|BIRINCIRESIMLINKI|*", "*|BIRINCIRESIMALTMETNI|*", "*|BIRINCIRESIMALANIBIRINCIBUTONMETNI|*", "*|BIRINCIRESIMALANIBIRINCIBUTONLINKI|*", "*|BIRINCIRESIMALANIIKINCIBUTONMETNI|*", "*|BIRINCIRESIMALANIIKINCIBUTONLINKI|*", "*|IKINCIRESIMDOSYASI|*", "*|IKINCIRESIMLINKI|*", "*|IKINCIRESIMALTMETNI|*", "*|IKINCIRESIMALANIBIRINCIBUTONMETNI|*", "*|IKINCIRESIMALANIBIRINCIBUTONLINKI|*", "*|IKINCIRESIMALANIIKINCIBUTONMETNI|*", "*|IKINCIRESIMALANIIKINCIBUTONLINKI|*", "*|SOSYALAGLARALANI|*", "*|COPYRIGHTMETNI|*", "*|WEBSITESILINKI|*", "*|EMAILADRESI|*", "*|IZINSIZGONDERIMBILDIRLINKI|*", "*|FIRMAUNVANI|*", "*|FIRMAADRESI|*", "*|FIRMATELEFONU|*", "*|FIRMAEMAILADRESI|*", "*|TAKIP|*", "*|YIL|*", "*|ADI|*", "*|SOYADI|*");
			$Degisenler			=	array($TemaSorgusuKaydiBaslikMetniYaz, $TemaSorgusuKaydiLogosuDegeriDuzenle, $TemaSorgusuKaydiLogoLinkiDegeriYaz, $TemaSorgusuKaydiIcerikMetniYaz, $TemaSorgusuKaydiIcerikMetniBirinciButonMetni, $TemaSorgusuKaydiIcerikMetniBirinciButonLinkiDegeriYaz, $TemaSorgusuKaydiIcerikMetniIkinciButonMetni, $TemaSorgusuKaydiIcerikMetniIkinciButonLinkiDegeriYaz, $TemaSorgusuKaydiBirinciResimDosyasiAdiYaz, $TemaSorgusuKaydiBirinciResimLinkiDegeriYaz, $TemaSorgusuKaydiBirinciResimAltMetni, $TemaSorgusuKaydiBirinciResimBirinciButonMetni, $TemaSorgusuKaydiBirinciResimBirinciButonLinkiDegeriYaz, $TemaSorgusuKaydiBirinciResimIkinciButonMetni, $TemaSorgusuKaydiBirinciResimIkinciButonLinkiDegeriYaz, $TemaSorgusuKaydiIkinciResimDosyasiAdiYaz, $TemaSorgusuKaydiIkinciResimLinkiDegeriYaz, $TemaSorgusuKaydiIkinciResimAltMetni, $TemaSorgusuKaydiIkinciResimBirinciButonMetni, $TemaSorgusuKaydiIkinciResimBirinciButonLinkiDegeriYaz, $TemaSorgusuKaydiIkinciResimIkinciButonMetni, $TemaSorgusuKaydiIkinciResimIkinciButonLinkiDegeriYaz, $SosyalAglarYaz, $SiteAyarlariKaydiSiteCopyrightMetni, $WebSitesiLinkiDegeriYaz, $EMailAdresiDegeri, $IzinsizGonderimBildirLinkiDegeriYaz, $FirmaAyarlariKaydiFirmaUnvani, $FirmaAdresiYaz, $FirmaTelefonuYaz, $SiteAyarlariKaydiSiteAnaEMailAdresi, $TakipResmiDegeriYaz, $YiliBul, $AdiDegeri, $SoyadiDegeri);
			$Sonuc			=	str_replace($Degisecekler, $Degisenler, $TemaDosyasiIcerigiDegeri);
	
			$SonucDizisi	=	array($Sonuc, $GonderilenBaslik, $GonderilenIcerik);
			return $SonucDizisi;
		}else{
			$SonucDizisi	=	array("HATA", "HATA", "HATA");
			return $SonucDizisi;
		}
}

function seo($str, $options = array())
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true
    );
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}


function Id_Kodla($deyer){
    $md5_sifrele      =  md5($deyer);
    $has_sifrele      =  password_hash($md5_sifrele, PASSWORD_DEFAULT);
    $id_kodlanmisi    =  $has_sifrele;
    return $id_kodlanmisi;
}

function Email_Tesdik_Kodu(){
  $benzersizsayi1      = rand(20000,32000);
  $benzersizsayi2      = rand(20000,32000);
  $benzersizsayi3      = rand(20000,32000);
  $benzersizsayi4      = rand(20000,32000);  
  $benzersizad         = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
  $user_sifreyenilekod = substr($benzersizad, 14);
  return $user_sifreyenilekod;
}

function Telefon_Tesdiq_Kodu(){
  $benzersizsayi1       = rand(20000,32000);
  $benzersizsayi2       = rand(20000,32000);
  $benzersizsayi3       = rand(20000,32000);
  $benzersizsayi4       = rand(20000,32000);  
  $benzersizad          = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
  $user_sifreyenilekod  = substr($benzersizad, 14);
  return $user_sifreyenilekod;
}
?>