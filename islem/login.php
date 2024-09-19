<?php 
session_start(); ob_start();
require_once "../_admin/Ayarlar/ayarlar.php";
require_once("../_admin/Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");
if(empty($_SESSION["istifadeci"])){
	if ($_POST['user_email']!=="" and $_POST['user_sifre']!==""){
		$user_email = EmailIcerikleriniFitrle($_POST['user_email']);
		$user_sifre = md5(IstifadeciAdiVeSifresiIcerikleriniFiltrle($_POST['user_sifre']));
		$usersor    = $db->prepare("SELECT * FROM user where user_email=:user_email and user_sifre=:user_sifre and EmailTesdiqKodu=:EmailTesdiqKodu");
		$usersor->execute(array(
			'user_email'=>$user_email,
			'user_sifre'=>$user_sifre,
			'EmailTesdiqKodu'=>0
		));
		$usersay=$usersor->rowCount();
		if($usersay==1){
			$usercek=$usersor->fetch(PDO::FETCH_ASSOC);
			$user_id                           = $usercek['user_id'];
			$BirOncekiGirisTarixiZamanDamgasi  = $usercek['SonGirisTarixiZamanDamgasi'];
			$BirOncekiGirisTarixi              = $usercek['SonGirisTarixi'];
			$SonGirisIp                        = $usercek['SonGirisIp'];
			$user_email=$usercek['user_email'];
			$useradsoyad=$usercek['user_ad']." ".$usercek['user_soyad'];
			$usergiriselaveet=$db->prepare("INSERT INTO user_giris_sayi SET
				user_id					=:user_id,
				ZamanDamgasi		=:ZamanDamgasi,
				TarixSaat				=:TarixSaat,
				GirisIp					=:GirisIp
				");
			$insert=$usergiriselaveet->execute(array(
				'user_id' 			=> $user_id,
				'ZamanDamgasi'  => $ZamanDamgasi,
				'TarixSaat' 		=> $TarixSaat,
				'GirisIp' 			=> $IPAdresi
			));
			if ($insert) {
				$yenile = $db->prepare("UPDATE user SET    
					SonGirisTarixiZamanDamgasi    = :SonGirisTarixiZamanDamgasi, 
					SonGirisTarixi                = :SonGirisTarixi,
					SonGirisIp                    = :SonGirisIp
					WHERE user_id=$user_id");
				$update = $yenile->execute(array(
					'SonGirisTarixiZamanDamgasi'  => $ZamanDamgasi,
					'SonGirisTarixi'              => $TarixSaat,
					'SonGirisIp'                  => $IPAdresi
				));
				if ($update) {
					if ($IPAdresi==$SonGirisIp) {
						$_SESSION['user_sonzaman']=strtotime(date("Y-m-d H:i:s"));
						$_SESSION['istifadeci']=$user_email;
						?>
						<script>						
							window.history.back();							
						</script>
					<?php 	}else{
						$MailIcerikBaslik = $useradsoyad." ".$site_adi ." səyfəsi üzərindən hesabınıza giriş edildi";
						$MailIcerikOlustur = "Bu email məlumat xarakterlidir; <br/><br/> ";
						$MailIcerikOlustur .= "Əgər giriş siz deyilsəniz hesab məlumatlarınızı yeniləyin: <b></b>";
						$MailGonder									=		new PHPMailer;
						$MailGonder->SMTPDebug				=		0; // SMTP xetalarini baglayiriq
						$MailGonder->isSMTP();              //SMTP maili gondereceyimi deyirem
						$MailGonder->Host							=		$SMTPSunucuAdresi;
						$MailGonder->SMTPAuth					=	true;
						$MailGonder->CharSet					=	"utf-8";
						$MailGonder->Encoding					=	"base64";
						$MailGonder->Username					=	$ana_mail;
						$MailGonder->Password					=	$ana_mail_sifresi;
						if ($POP3SunucuBaglantiTuru == "SSL") {
							$MailGonder->SMTPSecure			=	"ssl";
							$MailGonder->Port						=	$SMTPSunucusuSSLPortu;
						} else {
							$MailGonder->SMTPSecure			=	"tls";
							$MailGonder->Port						=	$SMTPSunucusuTLSPortu;
						}
						$MailGonder->setFrom($ana_mail, $site_adi);
						$MailGonder->addAddress($user_email, $useradsoyad);
						$MailGonder->addReplyTo($ana_mail, $site_adi);
						$MailGonder->isHTML(true);
						$MailGonder->Subject					=	DonusumleriGeriDondur($MailIcerikBaslik);
						$MailGonder->Body							=	DonusumleriGeriDondur($MailIcerikOlustur);
						if ($MailGonder->send()) {
							$_SESSION['user_sonzaman']=strtotime(date("Y-m-d H:i:s"));
							$_SESSION['istifadeci']=$user_email;
							?>
						<script>						
							window.history.back();							
						</script>
							<?php 
						} else {			
							
							Header("Location:../404");
							exit;
						}
					}
				}else{
					header("Location:../girisyenilendi");
					exit;
				}
			}else{
				header("Location:../songirisyenilendi");
				exit;
			}
		}else{
			header("Location:../istifadecisaysef");
			exit;
		}		
	}else{
		header("Location:../bosmelumat");
		exit;
	}
}else{
	header("Location:../girisedilib");
	exit;
}



?>
