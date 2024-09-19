<?php 
require_once "../_admin/Ayarlar/ayarlar.php";
require_once("../_admin/Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");

$user_ad 			=	 HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST['user_ad']));
$user_soyad 	=	 HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST['user_soyad']));
$user_email	  =	 EmailIcerikleriniFitrle($_POST['user_email']);
$user_tel		  =	 ReqemliIcerikleriFitrle($_POST['user_tel']);
$sifre_bir 	  =	 IstifadeciAdiVeSifresiIcerikleriniFiltrle($_POST['sifre_bir']);
$sifre_iki 	  =	 IstifadeciAdiVeSifresiIcerikleriniFiltrle($_POST['sifre_iki']);
if ($user_ad != "" and $user_soyad != "" and $user_tel != "" and $user_email != "" and $sifre_bir != "" and $sifre_iki != "") {

	$usermailsor = $db->prepare("SELECT * FROM user where user_email=:user_email");
	$usermailsor->execute(array(
		'user_email' 		=>  $user_email));
	$usermailsay 			=   $usermailsor->rowCount();
	if ($usermailsay 			== 0) {	

		$usertelsor = $db->prepare("SELECT * FROM user where user_tel=:user_tel or user_tel_iki=:user_tel_iki or user_tel_uc=:user_tel_uc ");
		$usertelsor->execute(array(
			'user_tel' 				=>  $user_tel,
			'user_tel_iki' 		=>  $user_tel,
			'user_tel_uc' 		=>  $user_tel));
		$usertelsay 				=   $usertelsor->rowCount();
		if ($usertelsay 			== 0) {	

			if ($sifre_bir  == $sifre_iki) {
				$user_sifre 	= md5($sifre_bir);
				$TelefonBirTesdiqKodu = Telefon_Tesdiq_Kodu();
				$TelefonIkiTesdiqKodu = Telefon_Tesdiq_Kodu();
				$EmailTesdiqKodu      = Email_Tesdik_Kodu();
				$qeydiyyat 		= $db->prepare(
					"INSERT INTO user SET
					user_sifre											=	:user_sifre,
					user_ad													=	:user_ad,
					user_soyad											=	:user_soyad,
					user_tel												=	:user_tel,
					user_email											=	:user_email,
					TelefonBirTesdiqKodu						=	:TelefonBirTesdiqKodu,
					TelefonIkiTesdiqKodu						=	:TelefonIkiTesdiqKodu,
					EmailTesdiqKodu						      =	:EmailTesdiqKodu,
					QeydiyyatIP						          =	:QeydiyyatIP,
					QeydiyyatTarixiZamanDamgasi			=	:QeydiyyatTarixiZamanDamgasi,
					QeydiyyatTarixi									=	:QeydiyyatTarixi");
				$insert = $qeydiyyat->execute(array(
					'user_sifre' 										=> $user_sifre,
					'user_ad' 											=> $user_ad,
					'user_soyad' 										=> $user_soyad,
					'user_tel' 											=> $user_tel,
					'user_email' 										=> $user_email,
					'TelefonBirTesdiqKodu' 					=> $TelefonBirTesdiqKodu,
					'TelefonIkiTesdiqKodu' 					=> $TelefonIkiTesdiqKodu,
					'EmailTesdiqKodu' 					    => $EmailTesdiqKodu,
					'QeydiyyatIP' 					        => $IPAdresi,
					'QeydiyyatTarixiZamanDamgasi' 	=> $ZamanDamgasi,
					'QeydiyyatTarixi' 							=> $TarixSaat));
				if ($insert) {
					$son_id 							= $db->lastInsertId();
					$User_Istifadeci_Seo 	= Id_Kodla($db->lastInsertId());
					$user_seo_url 				= seo($user_ad . $user_soyad.$User_Istifadeci_Seo);
					$yenile = $db->prepare("UPDATE user SET
						user_seo_url	=:user_seo_url
						WHERE user_id=$son_id");
					$update = $yenile->execute(array(
						'user_seo_url' => $user_seo_url));
					if ($update) {

						$usersor = $db->prepare("SELECT * FROM user where user_id=:user_id");
						$usersor->execute(array(
							'user_id' 				=>  $son_id));
						$usercek=$usersor->fetch(PDO::FETCH_ASSOC);
						$User_Email_Tesdiq_Kod=$usercek['EmailTesdiqKodu'];
						$user_email=$usercek['user_email'];
						$useradsoyad=$usercek['user_ad']." ".$usercek['user_ad'];

						$MailIcerikBaslik = $useradsoyad."səyfəmizdən uğurla qeydiyatdan keçdiniz </br>" .$site_adi . " email təsdiq kodu ";
						$MailIcerikOlustur = " Emalinizi aşağıdakı kodla təsdiqləyin; <br/><br/> ";
						$MailIcerikOlustur .= " Sizin Təsdiq Kodunuz: <b>" . $User_Email_Tesdiq_Kod . "</b>";
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

								Header("Location:../xeta/ugurlu?user_seo_url=$user_seo_url");
								exit();
							} else {
								$sil = $db->prepare("DELETE from user where user_id=:user_id");
								$kontrol = $sil->execute(array(
									'user_id' => $son_id
								));
								Header("Location:../404");
								exit();
							}
						} else {
							Header("Location:../xeta/seoxeta");
						}				
					} else {
						Header("Location:../xeta/insertxeta");
					}
				} else {
					Header("Location:../xeta/sifrelerinizferqlidir");
				}

			} else {
				Header("Location:../xeta/telefonvar");
			}


		} else {
			Header("Location:../xeta/emailvar");
		}





	} else {
		Header("Location:../xeta/tamdoldurun");
	}
	?>