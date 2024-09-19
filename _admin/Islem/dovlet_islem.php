<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
	if(isset($_POST["Yeni"])){
		$Dovlet_Ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["Dovlet_Ad"]));
		$Dovlet_Beynelxalq_Adi  =   IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir(HerfVeReqemIcerikleriniFitrle($_POST["Dovlet_Beynelxalq_Adi"])));
		$ISO_KODU_ALFA_2         =   IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir(HarflerXaricButunKarakterleriSil($_POST["ISO_KODU_ALFA_2"])));
		$ISO_KODU_ALFA_3         =   IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir(HarflerXaricButunKarakterleriSil($_POST["ISO_KODU_ALFA_3"])));
		$Dovlet_Reqem_Kodu     =   ReqemlerXaricButunKarakterleriSil($_POST["Dovlet_Reqem_Kodu"]);
		$Dovlet_Musteqillik_Tarixi     =   ReqemlerXaricButunKarakterleriSil($_POST["Dovlet_Musteqillik_Tarixi"]);
		$Dovlet_Telefon_Kodu     =   ReqemlerXaricButunKarakterleriSil($_POST["Dovlet_Telefon_Kodu"]);
		$Dovlet_Valyuta_Kodu         =   IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir(HarflerXaricButunKarakterleriSil($_POST["Dovlet_Valyuta_Kodu"])));
		$SEO_URL=SEO_URL(password_hash($Dovlet_Ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT)."-");

		$dovletsor=$db->prepare("SELECT * FROM dovlet where Dovlet_Ad=:Dovlet_Ad or Dovlet_Beynelxalq_Adi=:Dovlet_Beynelxalq_Adi or ISO_KODU_ALFA_3=:ISO_KODU_ALFA_3 or Dovlet_Reqem_Kodu=:Dovlet_Reqem_Kodu  ");
		$dovletsor->execute(array(
			'Dovlet_Ad'=>$Dovlet_Ad,
			'Dovlet_Beynelxalq_Adi'=>$Dovlet_Beynelxalq_Adi,
			'ISO_KODU_ALFA_3'=>$ISO_KODU_ALFA_3,
			'Dovlet_Reqem_Kodu'=>$Dovlet_Reqem_Kodu));
		$dovletsay=$dovletsor->rowCount();
		if ($dovletsay>0) {
			$dovletcek=$dovletsor->fetch(PDO::FETCH_ASSOC);			
			$var=md5("var");
			$link="../"."dovlet-".$var."-". $dovletcek["SEO_URL"];
			header("Location:".$link);
			exit;
		}
		if(($Dovlet_Ad!="") and ($Dovlet_Beynelxalq_Adi!="")  and ($ISO_KODU_ALFA_3!="") and ($Dovlet_Reqem_Kodu!="") and ($Dovlet_Musteqillik_Tarixi!="")  and ($Dovlet_Telefon_Kodu!="") and ($Dovlet_Valyuta_Kodu!="")){
			$admingirisElaveET=$db->prepare("INSERT INTO dovlet SET
				Dovlet_Ad               =   :Dovlet_Ad,
				Dovlet_Beynelxalq_Adi   =   :Dovlet_Beynelxalq_Adi,
				ISO_KODU_ALFA_2          =   :ISO_KODU_ALFA_2,
				ISO_KODU_ALFA_3          =   :ISO_KODU_ALFA_3,
				Dovlet_Reqem_Kodu      =   :Dovlet_Reqem_Kodu,
				Dovlet_Musteqillik_Tarixi      =   :Dovlet_Musteqillik_Tarixi,
				Dovlet_Telefon_Kodu      =   :Dovlet_Telefon_Kodu,
				SEO_URL      =   :SEO_URL,
				Dovlet_Valyuta_Kodu      =   :Dovlet_Valyuta_Kodu
				");
			$insert=$admingirisElaveET->execute(array(
				'Dovlet_Ad'             => $Dovlet_Ad,
				'Dovlet_Beynelxalq_Adi' => $Dovlet_Beynelxalq_Adi,
				'ISO_KODU_ALFA_2'        => $ISO_KODU_ALFA_2,
				'ISO_KODU_ALFA_3'        => $ISO_KODU_ALFA_3,
				'Dovlet_Reqem_Kodu'    => $Dovlet_Reqem_Kodu,
				'Dovlet_Musteqillik_Tarixi'    => $Dovlet_Musteqillik_Tarixi,
				'Dovlet_Telefon_Kodu'    => $Dovlet_Telefon_Kodu,
				'SEO_URL'    => $SEO_URL,
				'Dovlet_Valyuta_Kodu'    => $Dovlet_Valyuta_Kodu
			));	
			if ($insert) {
				$ok=md5("ok");
				$link="../dovlet-".$ok."-". $SEO_URL;
				header("Location:".$link);
				exit;				
			}else{
				header("Location:../../404.php");
				exit;
			}
		}else{
			header("Location:../dovletler?durum=bos");
			exit;
		}
	}
	elseif (isset($_POST["Dovletyenile"])) {
		$Dovlet_Ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["Dovlet_Ad"]));
		$Dovlet_Beynelxalq_Adi  =   IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir(HerfVeReqemIcerikleriniFitrle($_POST["Dovlet_Beynelxalq_Adi"])));
		$ISO_KODU_ALFA_2         =   IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir(HarflerXaricButunKarakterleriSil($_POST["ISO_KODU_ALFA_2"])));
		$ISO_KODU_ALFA_3         =   IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir(HarflerXaricButunKarakterleriSil($_POST["ISO_KODU_ALFA_3"])));
		$Dovlet_Reqem_Kodu     =   ReqemlerXaricButunKarakterleriSil($_POST["Dovlet_Reqem_Kodu"]);
		$Dovlet_Musteqillik_Tarixi     =   ReqemlerXaricButunKarakterleriSil($_POST["Dovlet_Musteqillik_Tarixi"]);
		$Dovlet_Telefon_Kodu     =   ReqemlerXaricButunKarakterleriSil($_POST["Dovlet_Telefon_Kodu"]);
		$Dovlet_Valyuta_Kodu         =   IngilisDilineGoreKicikHerfleriBoyukHerflerleDeyisdir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir(HarflerXaricButunKarakterleriSil($_POST["Dovlet_Valyuta_Kodu"])));
		$Dovlet_Id     =   ReqemlerXaricButunKarakterleriSil($_POST["Dovlet_Id"]);

		$dovletsor=$db->prepare("SELECT * FROM dovlet where (Dovlet_Id<>:Dovlet_Id) and (Dovlet_Ad=:Dovlet_Ad or Dovlet_Beynelxalq_Adi=:Dovlet_Beynelxalq_Adi  or ISO_KODU_ALFA_3=:ISO_KODU_ALFA_3 or Dovlet_Reqem_Kodu=:Dovlet_Reqem_Kodu ) ");
		$dovletsor->execute(array(
			'Dovlet_Id'=>$Dovlet_Id,
			'Dovlet_Ad'=>$Dovlet_Ad,
			'Dovlet_Beynelxalq_Adi'=>$Dovlet_Beynelxalq_Adi,
			'ISO_KODU_ALFA_3'=>$ISO_KODU_ALFA_3,
			'Dovlet_Reqem_Kodu'=>$Dovlet_Reqem_Kodu));
		$dovletsay=$dovletsor->rowCount();	
		if ($dovletsay>0) {
			$dovletcek=$dovletsor->fetch(PDO::FETCH_ASSOC);	

			$var=md5("dovletvar");
			$link="../"."dovlet-".$var."-". $dovletcek["SEO_URL"];
			header("Location:".$link);
			exit;
		}


		if(($Dovlet_Ad!="") and ($Dovlet_Beynelxalq_Adi!="") and ($ISO_KODU_ALFA_2!="") and ($ISO_KODU_ALFA_3!="") and ($Dovlet_Reqem_Kodu!="") and ($Dovlet_Musteqillik_Tarixi!="")  and ($Dovlet_Telefon_Kodu!="") and ($Dovlet_Valyuta_Kodu!="")){
			$yenile = $db->prepare("UPDATE dovlet SET     
				Dovlet_Ad               =   :Dovlet_Ad,
				Dovlet_Beynelxalq_Adi   =   :Dovlet_Beynelxalq_Adi,
				ISO_KODU_ALFA_2          =   :ISO_KODU_ALFA_2,
				ISO_KODU_ALFA_3          =   :ISO_KODU_ALFA_3,
				Dovlet_Reqem_Kodu      =   :Dovlet_Reqem_Kodu,
				Dovlet_Musteqillik_Tarixi      =   :Dovlet_Musteqillik_Tarixi,
				Dovlet_Telefon_Kodu      =   :Dovlet_Telefon_Kodu,
				Dovlet_Valyuta_Kodu      =   :Dovlet_Valyuta_Kodu,
				Durum=:Durum 
				WHERE Dovlet_Id=$Dovlet_Id");
			$update = $yenile->execute(array(
				'Dovlet_Ad'             => $Dovlet_Ad,
				'Dovlet_Beynelxalq_Adi' => $Dovlet_Beynelxalq_Adi,
				'ISO_KODU_ALFA_2'        => $ISO_KODU_ALFA_2,
				'ISO_KODU_ALFA_3'        => $ISO_KODU_ALFA_3,
				'Dovlet_Reqem_Kodu'    => $Dovlet_Reqem_Kodu,
				'Dovlet_Musteqillik_Tarixi'    => $Dovlet_Musteqillik_Tarixi,
				'Dovlet_Telefon_Kodu'    => $Dovlet_Telefon_Kodu,
				'Dovlet_Valyuta_Kodu'    => $Dovlet_Valyuta_Kodu,
				'Durum'    => 0
			));
			if ($update) {
				$dovletsor=$db->prepare("SELECT * FROM dovlet where Dovlet_Id=:Dovlet_Id ");
				$dovletsor->execute(array(
					'Dovlet_Id'=>$Dovlet_Id));
				$dovletcek= $dovletsor->fetch(PDO::FETCH_ASSOC);

				$yenileok=md5("yenileok");
				$link="../"."dovlet-".$yenileok."-". $dovletcek["SEO_URL"];
				header("Location:".$link);
				exit;				
			} else {
				header("Location:../../404.php");
				exit;
			}
		} else {
			header("Location:../../404.php");
			exit;
		}
	} 
	elseif(isset($_POST["Durum_id"])){
		$Dovlet_Id     =   ReqemlerXaricButunKarakterleriSil($_POST["Durum_id"]);  
		if($Dovlet_Id!=""){

			$dovlet=$db->prepare("SELECT * FROM dovlet where Dovlet_Id=:Dovlet_Id");
			$dovlet->execute(array(
				'Dovlet_Id'=>$Dovlet_Id));
			$dovletsayi=$dovlet->rowCount();
			if ($dovletsayi==1) {
				$dovletcek = $dovlet->fetch(PDO::FETCH_ASSOC);
				if ($dovletcek['Durum'] == 1) {
					$status = 0;
				} elseif ($dovletcek['Durum'] == 0) {
					$status = 1;
				}
				$yenile = $db->prepare("UPDATE dovlet SET     
					Durum=:Durum   
					WHERE Dovlet_Id=$Dovlet_Id");
				$update = $yenile->execute(array(
					'Durum' => $status
				));
			}
		}
	}

	elseif(isset($_POST["dovlet_sil_id"])){
		$Dovlet_Id     =   ReqemlerXaricButunKarakterleriSil($_POST["dovlet_sil_id"]);  
		if($Dovlet_Id!=""){
			$sil = $db->prepare("DELETE from dovlet where Dovlet_Id=:Dovlet_Id");
			$kontrol = $sil->execute(array(
				'Dovlet_Id' => $Dovlet_Id
			));

		}else{
			header("Location:../../Dovlet_Idyox.php");
			exit;
		}
	}
	elseif(isset($_POST["dovlet_siralama"])){
		$dovlet_siralama     =   ReqemlerXaricButunKarakterleriSil($_POST["dovlet_siralama"]); 
		if($dovlet_siralama!=""){
			$adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
			$adminsor->execute(array(
				'admin_mail'=>($_SESSION["admistis_mail"])
			));
			$admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
			$admin_id= $admincek['admin_id'];

			$yenile = $db->prepare("UPDATE admin SET     
				dovlet_listeleme_limiti=:dovlet_listeleme_limiti   
				WHERE admin_id=$admin_id");
			$update = $yenile->execute(array(
				'dovlet_listeleme_limiti' => $dovlet_siralama
			));
		}
	}else{
		header("Location:../../404.php");
		exit;
	}
}else{
	header("Location:../login");
	exit;
}
?>