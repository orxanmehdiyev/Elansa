<?php 
if(empty($_SESSION["istifadeci"])){
	require_once "../_admin/Ayarlar/ayarlar.php";
	require_once("../_admin/Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");
	$user_id		  =	 ReqemliIcerikleriFitrle($_POST['user_id']);
	$EmailTesdiqKodu		  =	 ReqemliIcerikleriFitrle($_POST['EmailTesdiqKodu']);
	$usersor = $db->prepare("SELECT * FROM user where user_id=:user_id and EmailTesdiqKodu=:EmailTesdiqKodu");
	$usersor->execute(array(
		'user_id' 				=>  $user_id,
		'EmailTesdiqKodu' =>  $EmailTesdiqKodu));
	$usersay=$usersor->rowCount();

	if($usersay==1){
		$usercek=$usersor->fetch(PDO::FETCH_ASSOC);
		$user_seo_url=$usercek['user_seo_url'];
		$useradsoyad=$usercek['user_ad']." ".$usercek['user_ad'];
		$user_email=$usercek['user_email'];
		if ($user_id != "" and $EmailTesdiqKodu != "") {
			$yenile = $db->prepare("UPDATE user SET
				EmailTesdiqKodu	=:EmailTesdiqKodu
				WHERE user_id=$user_id");
			$update = $yenile->execute(array(
				'EmailTesdiqKodu' => 0));
			if ($update) {
				
				$MailIcerikBaslik = $useradsoyad."səyfəmizdən uğurla qeydiyatdan keçdiniz </br>" .$site_adi . " email təsdiq kodu ";
				$MailIcerikOlustur = " Emalinizi aşağıdakı kodla təsdiqlədi; <br/><br/> ";
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
					Header("Location:../xeta/emailtesdiq");
					exit();
				} else {
						echo  $MailGonder->ErrorInfo;
								exit;
					Header("Location:../404");
					exit;
				}
			} else {
				Header("Location:../xeta/yenilenme");
				exit;
			}	

		}else{
			Header("Location:../xeta/yenilenme");
			exit;
		}

	}else{
		Header("Location:../404wrwer");
		exit;
	}
}else{
	Header("Location:../404");
	exit;
}



?>
