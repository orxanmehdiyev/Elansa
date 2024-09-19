<?php 
require_once "../_admin/Ayarlar/ayarlar.php";
require_once("../_admin/Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");
if (isset($_POST['elan_pin_kode'])){
	$elan_id=$_POST['elan_id'];
	$elan_pin_kode=$_POST['elan_pin_kode'];
	if($elan_id!=""){
		$elan=$db->prepare("SELECT * FROM elan where elan_id=:elan_id and elan_pin_kode=:elan_pin_kode");
		$elan->execute(array(
			'elan_id'=>$elan_id,
			'elan_pin_kode'=>$elan_pin_kode));
		echo		$elansayi=$elan->rowCount();
		

	}
}elseif(isset($_POST['elan_pin_kodes'])){
	$elan_id=$_POST['elan_ids'];
	$elan_pin_kode=$_POST['elan_pin_kodes'];
	if($elan_id!=""){		
		$elan=$db->prepare("SELECT * FROM elan where elan_id=:elan_id and elan_pin_kode=:elan_pin_kode");
		$elan->execute(array(
			'elan_id'=>$elan_id,
			'elan_pin_kode'=>$elan_pin_kode));
		$elansayi=$elan->rowCount();
		if ($elansayi==1) {
			$yenile = $db->prepare("UPDATE elan SET     
				yayim_durumu=:yayim_durumu   
				WHERE elan_id=$elan_id");
			$update = $yenile->execute(array(
				'yayim_durumu' => 3
			));
			if ($update) {

				$elansor=$db->prepare("SELECT * FROM elan where elan_id=:elan_id");
				$elansor->execute(array(
					'elan_id' => $elan_id
				));
				$elancek=$elansor->fetch(PDO::FETCH_ASSOC);
				$elan_id=$elancek['elan_id'];
				$elan_pin_kode=$elancek['elan_pin_kode'];
				$Elan_Email=$elancek['email'];
				$useradsoyad=$elancek['ad_soyad'];
				$MailIcerikBaslik =" Elanınız haqqında məlumatlar";
				$MailIcerikOlustur = $elan_id . " nömrəli elanınızın ".$site_adi. " səyfəsindən silindi; <br/> ";

				$MailGonder									=		new PHPMailer;
          $MailGonder->SMTPDebug				=		0; // SMTP xetalarini baglayiriq
	  			$MailGonder->isSMTP();              //SMTP maili gondereceyimi deyirem
	  			$MailGonder->Host							=		$SMTPSunucuAdresi;
	  			$MailGonder->SMTPAuth					=	true;
	  			$MailGonder->CharSet					=	"utf-8";
	  			$MailGonder->Encoding					=	"base64";
	  			$MailGonder->Username					=	$ana_mail;
	  			$MailGonder->Password					=	$ana_mail_sifresi;
	  			if ($ayar_POP3SunucuBaglantiTuru == "SSL") {
	  				$MailGonder->SMTPSecure			=	"ssl";
	  				$MailGonder->Port						=	$SMTPSunucusuSSLPortu;
	  			} else {
	  				$MailGonder->SMTPSecure			=	"tls";
	  				$MailGonder->Port						=	$SMTPSunucusuTLSPortu;
	  			}
	  			$MailGonder->setFrom($ana_mail, $site_adi);
	  			$MailGonder->addAddress($Elan_Email, $useradsoyad);
	  			$MailGonder->addReplyTo($ana_mail, $site_adi);
	  			$MailGonder->isHTML(true);
	  			$MailGonder->Subject					=	DonusumleriGeriDondur($MailIcerikBaslik);
	  			$MailGonder->Body							=	DonusumleriGeriDondur($MailIcerikOlustur);
	  			if ($MailGonder->send()) {
	  				$link="../yenielan-".$SEO_URL;
	  				echo "1";
	  				exit;



	  			} else {
	  				Header("Location:../elanyerlesdirsonuc.php?elancode=noz");
	  				exit();
	  			}


	  		}
	  	}


	  }
	}



	else{
		Header("Location:../index");
	}


	?>