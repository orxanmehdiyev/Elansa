<?php 
$ZamanDamgasi                    =   time();
$TarixSaat                       =   date("d.m.Y H:i:s", $ZamanDamgasi);
$Il_tap                          =   date("Y");
$hefdeningunu                    =   date('w');
if ($hefdeningunu     ==0) {
	$hefedgun="Bazar";
}elseif($hefdeningunu ==1){
	$hefedgun="Bazar ertəsi";
}elseif($hefdeningunu ==2){
	$hefedgun="Çərşənbə axşamı";
}elseif($hefdeningunu ==3){
	$hefedgun="Çərşənbə";
}elseif($hefdeningunu ==4){
	$hefedgun="Cümə axşamı ";
}elseif($hefdeningunu ==5){
	$hefedgun="Cümə ";
}else{
	$hefedgun="Şənbə ";
}


$SaniyeHesaplamaBirSaniye       =   1;
$SaniyeHesaplamaBirDakika       =   60;
$SaniyeHesaplamaBirSaat         =   3600;
$SaniyeHesaplamaBirGun          =   86400;
$SaniyeHesaplamaBirAy           =   2592000;
$SaniyeHesaplamaBirYil          =   31536000;



if(isset($_SERVER["REMOTE_ADDR"])){
	$IPAdresi					=	$_SERVER["REMOTE_ADDR"];
}else{
	$IPAdresi					=	"";
}


/*Bütün boşluqları silirəm*/
function ButunBosluklariSil($Deyer){
	$Filtrele       =   preg_replace("/\s/", "", $Deyer);
	$Sonuc          =   $Filtrele;
	return $Sonuc;
}


/*Birdən Artıq olan bütün boşluqları silirəm*/
function BirdenArtiqButunBosluqlariSil($Deyer){
	$Filtrele		=	preg_replace("/\s+/", " ", $Deyer);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
} 

/*Hərf və rəqəmlər xaric bütün karakterləri silirəm*/
function HerfVeReqemlerXaricButunKarakterleriSil($Deyer){
	$Filtrele		=	preg_replace("/[^a-zA-Z0-9çÇğĞıİöÖşŞüÜƏə]/", "", $Deyer);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}

/*Təhlükəsizlik üçün istifadəçi adı və şifrəsini təmizləyib filtirdən keçirirəm*/
function IstifadeciAdiVeSifresiIcerikleriniFiltrle($Deyer){
	$Bir        =   preg_replace("/\s/", "", $Deyer);
	$Iki        =   preg_replace("/[^a-zA-Z0-9çÇğĞIıİiöÖşŞüÜƏə\-\@\.]/", "", $Bir);;
	$Uc         =   strip_tags($Iki);
	$Dort       =   htmlspecialchars($Uc, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc      =   $Dort;
	return $Sonuc;
}


function SEO_URL($Deyer){
	$Filtrele           =   preg_replace("/[^0-9a-zA-Z$.]/", "", $Deyer);
	$Sonuc              =   $Filtrele;
	return $Sonuc;
}


/*Həriflər xaric bütün karakterləri silirəm*/
function HarflerXaricButunKarakterleriSil($Deyer){
	$Filtrele           =   preg_replace("/[^a-zA-ZçÇğĞıİöÖşŞüÜƏə]/", "", $Deyer);
	$Sonuc              =   $Filtrele;
	return $Sonuc;
}

/*Təhlükəsizlik üçün hərfləri fitrden keçirirəm*/
function HerfliIcerikleriFitrle($Deyer){
	$Bir		  =	trim($Deyer);
	$Iki		  =	strip_tags($Bir);
	$Uc       = preg_replace("/[^a-zA-ZçÇğĞıİöÖşŞüÜƏə]/", "", $Iki);
	$Dort		  =	htmlspecialchars($Uc, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Dort;
	return $Sonuc;
}




/*Rəqəmlər xaric bütün karakterləri silirəm*/
function ReqemlerXaricButunKarakterleriSil($Deyer){
	$Filtrele   =   preg_replace("/[^0-9]/", "", $Deyer);
	$Sonuc      =   $Filtrele;
	return $Sonuc;
}

/*Təhlükəsizlik üçün rəqəmli icerikleri fitrden keçirirəm*/
function ReqemliIcerikleriFitrle ($Deyer){
	$Bir    =   preg_replace("/\s/", "", $Deyer);
	$Iki		=	  strip_tags($Bir);
	$Uc     =   preg_replace("/[^0-9]/", "", $Iki);
	$Dort		=	  htmlspecialchars($Uc, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc	=	$Dort;
	return $Sonuc;
}



/*Email karakterləri xaric bütün karakterləri silirəm*/
function EmailKarakerleriXaricButunKarakterleriSil($Deyer){
	$Filtrele		=	preg_replace("/[^a-zA-Z0-9_\-\.@]/", "", $Deyer);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}


/*Təhlükəsizlik üçün email alanlarını fitrləyirəm*/
function EmailIcerikleriniFitrle($Deyer){
	$Bir                      =   preg_replace("/\s/", "", $Deyer);
	$DeyiseceklerAzdan	      =	array("Ç", "ç", "Ğ", "ğ", "İ", "ı", "Ö", "ö", "Ş", "ş", "Ü", "ü", "Ə", "ə");
	$DeyisdirilenlerIngilise	=	array("C", "c", "G", "g", "I", "i", "O", "o", "S", "s", "U", "u", "E", "e");
	$Iki			                =	str_replace($DeyiseceklerAzdan, $DeyisdirilenlerIngilise, $Bir);
	$Uc		                    =	strip_tags($Iki);
	$Dort			                =	preg_replace("/[^a-z0-9_\-\.@]/", "", $Uc);
	$Bes		                  =	htmlspecialchars($Dort, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		                =	$Bes;
	return $Sonuc;
}

/*Təhlükəsizlik üçün hərf ve reqem icriklerini fitrden kecirirem*/
function HerfVeReqemIcerikleriniFitrle($Deyer){
	$Bir		=	trim($Deyer);
	$Iki		=	strip_tags($Bir);
	$Uc		=	htmlspecialchars($Iki, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc	=	$Uc;
	return $Sonuc;
}


/*Link karakterləri xaric bütün karakterləri silirəm*/
function LinkKarakterleriXaricButunKarakterleriSil($Deyer){
	$Filtrele		=	preg_replace("/[^a-z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]/", "", $Deyer);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}



/*Təhlükəsizlik likleri fitrden kecirirem*/
function LikliIcerikleriFiltrle($Deyer){
	$Bir                      =   preg_replace("/\s/", "", $Deyer);
	$DeyiseceklerAzdan	      =	array("Ç", "ç", "Ğ", "ğ", "İ", "ı", "Ö", "ö", "Ş", "ş", "Ü", "ü", "Ə", "ə");
	$DeyisdirilenlerIngilise	=	array("C", "c", "G", "g", "I", "i", "O", "o", "S", "s", "U", "u", "E", "e");
	$Iki			                =	str_replace($DeyiseceklerAzdan, $DeyisdirilenlerIngilise, $Bir);
	$Deyisecekler	            =	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X", "Ə");
	$Deyisdirilenler		      =	array("a", "b", "c", "c", "d", "e", "f", "g", "g", "h", "i", "i", "j", "k", "l", "m", "n", "o", "o", "p", "r", "s", "s", "t", "u", "u", "v", "y", "z", "q", "w", "x", "e");
	$Uc			                  =	str_replace($Deyisecekler, $Deyisdirilenler, $Iki);
	$Dort		                  =	strip_tags($Uc);
	$Bes			                =	preg_replace("/[^a-z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]/", "", $Dort);
	$Alti		                  =	htmlspecialchars($Bes, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Alti;
	return $Sonuc;
}



/*Bütün boşluqları tire ilə dəyişdirirəm*/
function ButunBosluqlariTireIleDeyisdir($Deyer){
	$Filtrele		=	preg_replace("/\s/", "-", $Deyer);
	$Sonuc			=	$Filtrele;
	return $Sonuc;
}







/*Böyük hərfləri kiçik hərflə dəyişdirirəm*/
function BoyukHerfleriKicikHerfleDeyisdir($Deyer){
	$Deyisecekler      	=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X", "Ə");
	$Deyisdirilenler		=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x" , "ə");
	$Sonuc			        =	str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}



/*Kiçik hərfləri böyük hərflə dəyişdirirəm*/
function KicikHerfleriBoyukHerflerleDeyisidir($Deyer){
	$Deyisecekler     	=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x", "ə");
	$Deyisdirilenler		=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X", "Ə");
	$Sonuc		        	=	str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}


/*İngilis dilinə görə böyük hərfləri kiçik hərflərlə dəyişdirirəm*/
function IngilisDilineGoreBoyukHerfleriKicikHerflerleDeyisdir($Deyer){
	$Deyisecekler     	=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X", "Ə");
	$Deyisdirilenler		=	array("a", "b", "c", "c", "d", "e", "f", "g", "g", "h", "i", "i", "j", "k", "l", "m", "n", "o", "o", "p", "r", "s", "s", "t", "u", "u", "v", "y", "z", "q", "w", "x", "e");
	$Sonuc		        	=	str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}




/*İngilis dilinə görə kiçik hərfləri böyük hərflərlədəyişdirirəm*/
function IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir($Deyer){
	$Deyisecekler     	=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x", "ə");
	$Deyisdirilenler		=	array("A", "B", "C", "C", "D", "E", "F", "G", "G", "H", "I", "I", "J", "K", "L", "M", "N", "O", "O", "P", "R", "S", "S", "T", "U", "U", "V", "Y", "Z", "Q", "W", "X", "E");
	$Sonuc		        	=	str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}



/*Azərbaycan hərflərini ingilis hərfləri ilə dəyişdirirəm*/
function AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir($Deyer){
	$Deyisecekler	    =	array("Ç", "ç", "Ğ", "ğ", "İ", "ı", "Ö", "ö", "Ş", "ş", "Ü", "ü", "Ə", "ə");
	$Deyisdirilenler	=	array("C", "c", "G", "g", "I", "i", "O", "o", "S", "s", "U", "u", "E", "e");
	$Sonuc		      	=	str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}



/*Ampersatları aktiv edirəm ampersat ingilis dilindeki və işarəsidir yəni bu işarə &*/
function AmpersatlariAktivEt($Deyer){
	$Deyisecekler     =   array("&amp;");
	$Deyisdirilenler  =   array("&");
	$Sonuc            =   str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}


/*Cüt dırnaq işarələrini aktiv edirəm*/
function CutDirnaqlariAktivEt($Deyer){
	$Deyisecekler       =   array("&quot;");
	$Deyisdirilenler    =   array("\"");
	$Sonuc              =   str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}



/*Tək dırnak işarələrini aktiv edirem*/
function TekDirnaklariAktivEt($Deyer){
	$Deyisecekler       =   array("&#039;", "&#39;");
	$Deyisdirilenler    =   array("'", "'");
	$Sonuc              =   str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}



/*Kicikdir işarələrini aktiv edirem*/
function KicikdirIsareleriniAktivEt($Deyer){
	$Deyisecekler     =   array("&lt;");
	$Deyisdirilenler  =   array("<");
	$Sonuc            =   str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}



/*Böyükdür işarələrini aktiv edirem*/
function BoyukdurIsareleriniKativEt($Deyer){
	$Deyisecekler    =   array("&gt;");
	$Deyisdirilenler =   array(">");
	$Sonuc           =   str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}



/*R-ləri və N-ləri bö.luqlarla dəyişirəm*/
function RleriVeNleriBosluqEt($Deyer){
	$Deyisecekler	   =	array("\r", "\n");
	$Deyisdirilenler =	array(" ", " ");
	$Sonuc		       =	str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}


/*R-ləri və N-ləri silirəm*/
function RleriVeNleriSil($Deyer){
	$Deyisecekler	    =	array("\r", "\n");
	$Deyisdirilenler	=	array("", "");
	$Sonuc			      =	str_replace($Deyisecekler, $Deyisdirilenler, $Deyer);
	return $Sonuc;
}



/*Telefonlu nömrələrini filtirləyirəm*/
function TelefonluIcerikleriFitrle($Deyer){
	$Bir    =   preg_replace("/\s/", "", $Deyer);
	$Iki		=	  strip_tags($Bir);
	$Uc			=	  htmlspecialchars($Iki, ENT_QUOTES, "ISO-8859-1", true);
	$Dort   =   preg_replace("/[^0-9]/", "", $Uc);
	$Bes		=	  substr($Dort, -10);
	$Sonuc	=	  $Bes;
	return $Sonuc;
}


/*Təhlükəsizlik üçün beynəlxalq kod icerikləri fitrlənir və standart formaya salınır*/
function BeynelxaalqKodIcerikleriniFiltrle($Deyer){
	$Bir                      = preg_replace("/\s/", "", $Deyer);
	$DeyiseceklerAzdan	      =	array("Ç", "ç", "Ğ", "ğ", "İ", "ı", "Ö", "ö", "Ş", "ş", "Ü", "ü", "Ə", "ə");
	$DeyisdirilenlerIngilise	=	array("C", "c", "G", "g", "I", "i", "O", "o", "S", "s", "U", "u", "E", "e");
	$Iki			                =	str_replace($DeyiseceklerAzdan, $DeyisdirilenlerIngilise, $Bir);
	$Deyisecekler	            =	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x", "ə");
	$Deyisdirilenler	      	=	array("A", "B", "C", "C", "D", "E", "F", "G", "G", "H", "I", "I", "J", "K", "L", "M", "N", "O", "O", "P", "R", "S", "S", "T", "U", "U", "V", "Y", "Z", "Q", "W", "X", "E");
	$Uc		                  	=	str_replace($Deyisecekler, $Deyisdirilenler, $Iki);
	$Dort	                  	=	strip_tags($Uc);
	$Bes                      = preg_replace("/[^a-zA-ZçÇğĞıİöÖşŞüÜƏə]/", "", $Dort);
	$Alti	                  	=	htmlspecialchars($Bes, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc		=	$Alti;
	return $Sonuc;
}



/*Editorlu icəriklər filtirdən keçrilir*/
function EditorluIcerikleriFiltrle($Deyer){
	$Bir        =   trim($Deyer);
	$Iki        =   htmlspecialchars($Bir, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc      =   $Iki;
	return $Sonuc;
}


/*Fayılı icəriklərni filtirdən keçrilir*/
function FayilIcerikleriniFiltrele($Deyer){
	$Bir		=	trim($Deyer);
	$Iki		=	htmlspecialchars($Bir, ENT_QUOTES, "ISO-8859-1", true);
	$Sonuc	=	$Iki;
	return $Sonuc;
}


/*Link doğrluluğunu yoxlayır*/
function LinkDogrulugunuYoxla($Deyer){
	$AlanAdiKontrolYapisi		=	"/^(http(s)?:\/\/.)?(www\.)?[a-zA-Z0-9\.\:\+\-\_\#\=\%\~\@]{2,256}\.[a-z]{2,6}\b([a-zA-Z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]*)+$/";
	if(preg_match($AlanAdiKontrolYapisi, $Deyer)){
		$Sonuc	=	1;
	}else{
		$Sonuc	=	0;
	}
	return $Sonuc;
}


/*Link ön ek məcburi yoxlayır*/
function LinkDogrulugunuOnEkMecburiYoxla($Deyer){
	$AlanAdiKontrolYapisi		=	"/^(http(s)?:\/\/.)+(www\.)?[a-zA-Z0-9\.\:\+\-\_\#\=\%\~\@]{2,256}\.[a-z]{2,6}\b([a-zA-Z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]*)+$/";
	if(preg_match($AlanAdiKontrolYapisi, $Deyer)){
		$Sonuc	=	1;
	}else{
		$Sonuc	=	0;
	}
	return $Sonuc;
}




/*Mətin icəriklərindəki Email adreslərini yoxlayır*/
function MetinIceiklerindekiEmailAdresleriniYoxla($Deyer){
	$EMailAdresiKontrolYapisi		=	"/\s+(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))\s+/";
	preg_match_all($EMailAdresiKontrolYapisi, $Deyer, $BulununanDeger);
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



/*Bənzərsiz şəkil adı yaradır*/
function BenzersizSekilAdiYarad(){
	$Sonuc      =   md5(uniqid(time()));
	return $Sonuc;
}


/*Haş kodu yaradır*/
function HashKoduYarad(){
	$Bir		=	rand(10000, 99999);
	$Iki		=	rand(10000, 99999);
	$Uc			=	rand(10000, 99999);
	$Dort		=	rand(10000, 99999);
	$Sonuc	=	$Bir."-".$Iki."-".$Uc."-".$Dort;
	return $Sonuc;
}





function uzantiBul($isim) { 
	$dizi   = explode('.',$isim); 
	$eleman = count($dizi) -1; 
	$uzanti = $dizi["$eleman"]; 
	return $uzanti; 
    // return $uzanti; 
} 


function islemkontrol () {
	if (empty($_SESSION['userkullanici_mail'])) {        
		Header("Location:404.php");
		exit;
	}
}


function email_tesdik_kodu(){
	$benzersizsayi1 = rand(20000,32000);
	$benzersizsayi2 = rand(20000,32000);
	$benzersizsayi3 = rand(20000,32000);
	$benzersizsayi4 = rand(20000,32000);  
	$benzersizad    = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$user_sifreyenilekod=substr($benzersizad, 14);
	return $user_sifreyenilekod;
}


function Telefon_Tesdiq_Kodu(){
	$benzersizsayi1 = rand(20000,32000);
	$benzersizsayi2 = rand(20000,32000);
	$benzersizsayi3 = rand(20000,32000);
	$benzersizsayi4 = rand(20000,32000);  
	$benzersizad    = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$user_sifreyenilekod=substr($benzersizad, 14);
	return $user_sifreyenilekod;
}

function elan_pin_kode(){
	$benzersizsayi1 = rand(20000,32000);
	$benzersizsayi2 = rand(20000,32000);
	$benzersizsayi3 = rand(20000,32000);
	$benzersizsayi4 = rand(20000,32000);  
	$benzersizad    = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$user_sifreyenilekod=substr($benzersizad, 14);
	return $user_sifreyenilekod;
}




function benzersiz_seo_link(){
	$Sonuc      =  md5(uniqid(time()));
	return $Sonuc;
}

function Id_Kodla($deyer){
	$md5_sifrele   = md5($deyer);
	$has_sifrele   = password_hash($md5_sifrele, PASSWORD_DEFAULT);
	$id_kodlanmisi = $has_sifrele;
	return $id_kodlanmisi;
}



function HerSozunIlkHerfiniBoyukEt($Deyer){
	$Parcala		  =	explode(" ", $Deyer);
	$KelimeSayisi	=	count($Parcala);
	$Sayi		    	=	1;
	$Duzenle	  	=	"";
	$Sonuc			  =	"";
	foreach($Parcala as $Kelime){
		$BoslukSil								              =	trim($Kelime);
		$IlkHarfiAl								              =	substr($BoslukSil, 0, 1);
		$DeyiseceklerKicikleri     	=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x", "ə");
		$DeyisdirilenlerBoyuklere		=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X", "Ə");
		$IlkHarfiBuyukHarfeCevir		        	=	str_replace($DeyiseceklerKicikleri, $DeyisdirilenlerBoyuklere, $IlkHarfiAl);
		$IlkHarfHaricDigerleriniBul				      =	substr($BoslukSil, 1);
		$Deyisecekler      	=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X", "Ə");
		$Deyisdirilenler		=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x" , "ə");
		$IlkHarfHaricDigerleriniKucukHarfeCevir			        =	str_replace($Deyisecekler, $Deyisdirilenler, $IlkHarfHaricDigerleriniBul);
		$Duzenle		.=	$IlkHarfiBuyukHarfeCevir.$IlkHarfHaricDigerleriniKucukHarfeCevir." ";
		if($Sayi==$KelimeSayisi){
			$Deyiseceklers     =   array("&amp;");
			$Deyisdirilenlers  =   array("&");
			$Sonuc            =   str_replace($Deyisecekler, $Deyisdirilenler, $Duzenle);
			return  mb_convert_case(trim($Sonuc), MB_CASE_TITLE, "UTF-8");
		}
		$Sayi++;
	}
}


function DonusumleriGeriDondur($Deyer){
	$Deyisecekbir     =   array("&amp;");
	$Deyisdirilenbir  =   array("&");
	$Bir              =   str_replace($Deyisecekbir, $Deyisdirilenbir, $Deyer);

	$Deyisecekiki     =   array("&lt;");
	$Deyisdirileniki  =   array("<");
	$Iki              =   str_replace($Deyisecekiki, $Deyisdirileniki, $Bir);

	$Deyisecekuc      =   array("&gt;");
	$Deyisdirilenuc   =   array(">");
	$Uc               =   str_replace($Deyisecekuc, $Deyisdirilenuc, $Iki);

	$Deyisecekdord    =   array("&#039;", "&#39;");
	$Deyisdirilendord =   array("'", "'");
	$Dort             =   str_replace($Deyisecekdord, $Deyisdirilendord, $Uc);

	$DeyisecekBes     =   array("&quot;");
	$DeyisdirilenBes  =   array("\"");
	$Bes              =   str_replace($DeyisecekBes, $DeyisdirilenBes, $Dort);

	$Sonuc		        =	$Bes;
	return $Sonuc;
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
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G','Ə' => 'e',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g','ə' => 'e',
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













?>