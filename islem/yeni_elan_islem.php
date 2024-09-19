<?php 
require_once "../_admin/Ayarlar/ayarlar.php";
require_once("../_admin/Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");
if (isset($_POST['yenielan'])) {
	if (isset($_POST['karoqoriya_id'])) {
		$karoqoriya_id=ReqemlerXaricButunKarakterleriSil($_POST['karoqoriya_id']);
		$kataqoriyasor = $db->prepare("SELECT * FROM karoqoriya where karoqoriya_id=:karoqoriya_id");
		$kataqoriyasor->execute(array(
			'karoqoriya_id' => $karoqoriya_id
		));
		$karoqoriyasay = $kataqoriyasor->rowCount();
		if ($karoqoriyasay==1) {
			$kataqoriyacek=$kataqoriyasor->fetch(PDO::FETCH_ASSOC);
			$bolme_id=$kataqoriyacek['bolme_id'];

			if (isset($_POST['dovlet_id'])) {
				$Dovlet_Id=ReqemlerXaricButunKarakterleriSil($_POST['dovlet_id']);
				$dovletsor = $db->prepare("SELECT * FROM dovlet where Dovlet_Id=:Dovlet_Id");
				$dovletsor->execute(array(
					'Dovlet_Id' => $Dovlet_Id
				));
				$dovletsay = $dovletsor->rowCount();

				if ($dovletsay==1) {
					$dovletcek=$dovletsor->fetch(PDO::FETCH_ASSOC);
					$Dovlet_Id=$dovletcek['Dovlet_Id'];
					$Dovlet_Ad=$dovletcek['Dovlet_Ad'];
				}else{
					header("Location:../yenielan.php?durum=dovlet");
				}
			}else{
				header("Location:../yenielan.php?durum=dovlet");
			}


			if (isset($_POST['seher_id'])) {
				$seher_id=ReqemlerXaricButunKarakterleriSil($_POST['seher_id']);
				$seher=$db->prepare("SELECT * FROM seher WHERE seher_id=:seher_id");
				$seher->execute(array(
					'seher_id'=>$seher_id	));
				$sehersay= $seher->rowCount();
				if ($sehersay==1) {
					$sehercek=$seher->fetch(PDO::FETCH_ASSOC);
					$seher_id=$sehercek['seher_id'];
					$seher_ad=$sehercek['seher_ad'];
				}else{
					header("Location:../yenielan.php?durum=seher");
				}
			}elseif(isset($_POST['seher_ad'])){
				$seher_ad=HarflerXaricButunKarakterleriSil($_POST['seher_ad']);
				$seher_id="";
				$seher_ad_say=strlen($seher_ad);
				if ($seher_ad_say<=0) {
					header("Location:../yenielan.php?durum=seher");
				}
			}else{
				header("Location:../yenielan.php?durum=seher");
			}




			if (isset($_POST['rayon_id'])) {
				$rayon_id=ReqemlerXaricButunKarakterleriSil($_POST['rayon_id']);
				$rayon=$db->prepare("SELECT * FROM rayon WHERE rayon_id=:rayon_id");
				$rayon->execute(array(
					'rayon_id'=>$rayon_id));
				$rayonsay= $rayon->rowCount();
				if ($rayonsay==1) {
					$rayoncek=$rayon->fetch(PDO::FETCH_ASSOC);
					$rayon_id=$rayoncek['rayon_id'];
					$rayon_ad=$rayoncek['rayon_ad'];
				}else{
					header("Location:../yenielan.php?durum=rayon");
				}

			}else{
				$rayon_id="";
				$rayon_ad="";
			}




			if (isset($_POST['qesebe_id'])) {
				$qesebe_id=ReqemlerXaricButunKarakterleriSil($_POST['qesebe_id']);
				$qesebe=$db->prepare("SELECT * FROM qesebe WHERE qesebe_id=:qesebe_id");
				$qesebe->execute(array(
					'qesebe_id'=>$qesebe_id));
				$qesebesay= $qesebe->rowCount();
				if ($qesebesay==1) {
					$qesebecek=$qesebe->fetch(PDO::FETCH_ASSOC);
					$qesebe_id=$qesebecek['qesebe_id'];
					$qesebe_ad=$qesebecek['qesebe_ad'];
				}else{
					header("Location:../yenielan.php?durum=qesebe");
				}

			}else{
				$qesebe_id="";
				$qesebe_ad="";
			}





			if (isset($_POST['metro_id'])) {
				$metro_id=ReqemlerXaricButunKarakterleriSil($_POST['metro_id']);
				$metro=$db->prepare("SELECT * FROM metro WHERE metro_id=:metro_id");
				$metro->execute(array(
					'metro_id'=>$metro_id));
				$metrosay= $metro->rowCount();
				if ($metrosay==1) {
					$metrocek=$metro->fetch(PDO::FETCH_ASSOC);
					$metro_id=$metrocek['metro_id'];
					$metro_ad=$metrocek['metro_ad'];
				}else{
					header("Location:../yenielan.php?durum=metro");
				}

			}else{
				$metro_id="";
				$metro_ad="";
			}





			if (isset($_POST['nisangah_id'])) {
				$nisangah_id=ReqemlerXaricButunKarakterleriSil($_POST['nisangah_id']);
				$nisangah=$db->prepare("SELECT * FROM nisangah WHERE nisangah_id=:nisangah_id");
				$nisangah->execute(array(
					'nisangah_id'=>$nisangah_id));
				$nisangahsay= $nisangah->rowCount();
				if ($nisangahsay==1) {
					$nisangahcek=$nisangah->fetch(PDO::FETCH_ASSOC);
					$nisangah_id=$nisangahcek['nisangah_id'];
					$nisangah_ad=$nisangahcek['nisangah_ad'];
				}else{
					header("Location:../yenielan.php?durum=nisangah");
				}

			}else{
				$nisangah_id="";
				$nisangah_ad="";
			}




			if(isset($_SESSION["istifadeci"])){
				$usersor    = $db->prepare("SELECT * FROM user where user_email=:user_email");
				$usersor->execute(array(
					'user_email'=>$_SESSION["istifadeci"]
				));
				$usersay=$usersor->rowCount();
				if($usersay==1){
					$usercek=$usersor->fetch(PDO::FETCH_ASSOC);
					$user_id=$usercek['user_id'];
					$ad_soyad=$usercek['user_ad']." ".$usercek['user_soyad'];
					$email=$usercek['user_email'];
					$telefon_bir=$usercek['user_tel'];
					$telefon_iki=$usercek['user_tel_iki'];
				}
			}else{
				$user_id="";
				$telefon_iki="";
				$ad_soyad=HarflerXaricButunKarakterleriSil($_POST['ad_soyad']);
				$ad_soyad_say=strlen($ad_soyad);
				if ($ad_soyad_say<=0) {
					header("Location:../yenielan.php?durum=adxeta");
				}
				$email=EmailKarakerleriXaricButunKarakterleriSil($_POST['email']);
				$email_say=strlen($email);
				if ($email_say<=0) {
					header("Location:../yenielan.php?durum=emailxeta");
				}
				$telefon_bir=ReqemlerXaricButunKarakterleriSil($_POST['telefon_bir']);
				$telefon_bir_say=strlen($telefon_bir);
				if ($telefon_bir_say<=0) {
					header("Location:../yenielan.php?durum=telefon_birxeta");
				}
				$telefon_iki=ReqemlerXaricButunKarakterleriSil($_POST['telefon_iki']);
			}


			if(count($_FILES["pro-image"]["tmp_name"]) > 0){
				for($i = 0; $i < count($_FILES["pro-image"]["tmp_name"]); $i++) {
					$uzanti = substr($_FILES["pro-image"]["name"][$i],-4,4);
					$adi    = uniqid().$uzanti;
					$yol    = "../images/avtomobil/".$adi;
					move_uploaded_file($_FILES["pro-image"]["tmp_name"][$i],$yol);
					$foto[]=$adi;
				}
				$sekil=json_encode($foto);
			}	else{
				header("Lovation:../404.php?sekil=no");
			}



			if (isset($_POST["trchizat"])) {
				$techizat=json_encode($_POST["trchizat"]);
			}else{
				$techizat="";
			}

			if (isset($_POST["reng"])) {

				$reng_id		=	ReqemlerXaricButunKarakterleriSil($_POST["reng"]);
				$rengsor=$db->prepare("SELECT * FROM reng where reng_durum=:reng_durum and reng_id=:reng_id");
				$rengsor->execute(array(
					'reng_durum'=>1,
					'reng_id'=>$reng_id));
				$reng_say= $rengsor->rowCount();
				if ($reng_say==1) {
					$rengcek=$rengsor->fetch(PDO::FETCH_ASSOC);
					$reng_id=$rengcek["reng_id"];
					$reng_ad=$rengcek["reng_ad"];
				}else{
					header("Location:../yenielan.php?durum=reng_ad_xeta");
					exit;
				}
			}else{
				$reng_id="";
				$reng_ad="";
			}


			$qiymet		=	ReqemlerXaricButunKarakterleriSil($_POST["qiymet"]);
			if($qiymet<=0){
				header("Location:../yenielan.php?durum=quymetxeta");
				exit;
			}



			$pul_novu		=	HarflerXaricButunKarakterleriSil($_POST["pul_novu"]);
			if($pul_novu=="AZN" or $pul_novu=="EUR" or $pul_novu=="USD"){
				$pul_novu		=	HarflerXaricButunKarakterleriSil($_POST["pul_novu"]);
			}else{
				header("Location:../yenielan.php?durum=quymetxeta");
				exit;
			}



			$elanverennovu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["elan_veren"]);
			$elanverensor=$db->prepare("SELECT * FROM   elanverennovu where  avtmobil_elanlari_ucun_durum=:avtmobil_elanlari_ucun_durum and elanverennovu_id=:elanverennovu_id");
			$elanverensor->execute(array(
				'avtmobil_elanlari_ucun_durum'=>1,
				'elanverennovu_id'=>$elanverennovu_id));
			$elanveren_say= $elanverensor->rowCount();
			if ($elanveren_say==1) {
				$elanverencek=$elanverensor->fetch(PDO::FETCH_ASSOC);
				$elanverennovu_id=$elanverencek["elanverennovu_id"];
				$elanverennovu_ad=$elanverencek["elanverennovu_ad"];
			}else{
				header("Location:../yenielan.php?durum=reng_ad_xeta");
				exit;
			}


			if (isset($_POST["aciqlama"])) {
				$aciqlama=HerfVeReqemIcerikleriniFitrle($_POST["aciqlama"]);
			}else{
				$aciqlama	="";
			}

			


			if (isset($_POST["barter_var"])) {
				$barter_var		=	HarflerXaricButunKarakterleriSil($_POST["barter_var"]);
			}else{
				$barter_var	="";
			}

			if (isset($_POST["kredit_var"])) {
				$kredit_var		=	HarflerXaricButunKarakterleriSil($_POST["kredit_var"]);
			}else{
				$kredit_var	="";
			}

			$elanmeksedi=HerfVeReqemIcerikleriniFitrle($_POST["elanmeksedi"]);
			if (isset($_POST["emlakin_veziyyeti_id"])) {
				$emlakin_veziyyeti_id		=	ReqemlerXaricButunKarakterleriSil($_POST["emlakin_veziyyeti_id"]);
				$emlakin_veziyyeti=$db->prepare("SELECT * FROM emlakin_veziyyeti where  emlakin_veziyyeti_id=:emlakin_veziyyeti_id");
				$emlakin_veziyyeti->execute(array(
					'emlakin_veziyyeti_id'=>$emlakin_veziyyeti_id));
				$emlakin_veziyyeti_id_say= $emlakin_veziyyeti->rowCount();

				if ($emlakin_veziyyeti_id_say==1) {
					$emlakin_veziyyeti_cek=$emlakin_veziyyeti->fetch(PDO::FETCH_ASSOC);
					$emlakin_veziyyeti_id=$emlakin_veziyyeti_cek["emlakin_veziyyeti_id"];
					$emlakin_veziyyeti_ad=$emlakin_veziyyeti_cek["emlakin_veziyyeti_ad"];
				}else{

					header("Location:../yenielan.php?durum=avtoemlakveziyetixeta");
					exit;
				}
			}else{
				$emlakin_veziyyeti_id="";
				$emlakin_veziyyeti_ad="";
			}



			$elan_pin_kode=elan_pin_kode();

			if (isset($_POST["buraxilis_ili"])) {
				$buraxilis_ili		=	ReqemlerXaricButunKarakterleriSil($_POST["buraxilis_ili"]);

				if($buraxilis_ili<=0){
					header("Location:../yenielan.php?durum=buraxilis_ilixeta");
					exit;
				}
			}else{
				$buraxilis_ili="";
			}





			$elenekle=$db->prepare("INSERT INTO  elan SET
				ZamanDamgasi		               =:ZamanDamgasi,
				TarixSaat		                   =:TarixSaat,
				IPAdresi		                   =:IPAdresi,
				sekil		                       =:sekil,
				elanmeksedi		                 =:elanmeksedi,
				bolme_id		                   =:bolme_id,				
				karoqoriya_id		               =:karoqoriya_id,
				telefon_bir		                 =:telefon_bir,
				telefon_iki		                 =:telefon_iki,
				ad_soyad		                   =:ad_soyad,
				user_id		                     =:user_id,
				email		                       =:email,
				dovlet_id		                   =:dovlet_id,
				dovlet_ad		                   =:dovlet_ad,
				seher_id		                   =:seher_id,
				seher_ad		                   =:seher_ad,
				rayon_id		                   =:rayon_id,
				rayon_ad		                   =:rayon_ad,
				qesebe_id		                   =:qesebe_id,
				qesebe_ad		                   =:qesebe_ad,
				metro_id		                   =:metro_id,
				metro_ad		                   =:metro_ad,
				nisangah_id		                 =:nisangah_id,
				nisangah_ad		                 =:nisangah_ad,
				aciqlama		                   =:aciqlama,
				qiymet		                     =:qiymet,
				pul_novu		                   =:pul_novu,
				elanverennovu_id		           =:elanverennovu_id,
				elanverennovu_ad		           =:elanverennovu_ad,
				buraxilis_ili	                 =:buraxilis_ili,
				emlakin_veziyyeti_id	         =:emlakin_veziyyeti_id,
				emlakin_veziyyeti_ad	         =:emlakin_veziyyeti_ad,
				barter_var	                   =:barter_var,
				kredit_var	                   =:kredit_var,
				techizat		                   =:techizat,
				reng_id		                     =:reng_id,
				reng_ad		                     =:reng_ad,
				elan_pin_kode		               =:elan_pin_kode
				");
			$insert=$elenekle->execute(array(
				'ZamanDamgasi'					    		=> $ZamanDamgasi,
				'TarixSaat'						        	=> $TarixSaat,
				'IPAdresi'					        		=> $IPAdresi,
				'sekil'						            	=> $sekil,
				'elanmeksedi'					      		=> $elanmeksedi, 
				'bolme_id'				    			    => $bolme_id,
				'karoqoriya_id'				    			=> $karoqoriya_id,
				'telefon_bir'					      		=> $telefon_bir,
				'telefon_iki'				      			=> $telefon_iki,
				'ad_soyad'				        			=> $ad_soyad,
				'user_id'					          		=> $user_id,
				'email'						            	=> $email,
				'dovlet_id'						        	=> $Dovlet_Id,
				'dovlet_ad'						        	=> $Dovlet_Ad,
				'seher_id'						        	=> $seher_id,
				'seher_ad'						        	=> $seher_ad,
				'rayon_id'						        	=> $rayon_id,
				'rayon_ad'						        	=> $rayon_ad,
				'qesebe_id'						        	=> $qesebe_id,
				'qesebe_ad'						        	=> $qesebe_ad,
				'metro_id'						        	=> $metro_id,
				'metro_ad'						        	=> $metro_ad,
				'nisangah_id'					      		=> $nisangah_id,
				'nisangah_ad'				      			=> $nisangah_ad,
				'aciqlama'					        		=> $aciqlama,
				'qiymet'						          	=> $qiymet,
				'pul_novu'							        => $pul_novu,
				'elanverennovu_id'							=> $elanverennovu_id,
				'elanverennovu_ad'							=> $elanverennovu_ad,
				'buraxilis_ili'						     	=> $buraxilis_ili,
				'emlakin_veziyyeti_id'					=> $emlakin_veziyyeti_id,
				'emlakin_veziyyeti_ad'					=> $emlakin_veziyyeti_ad,
				'barter_var'							      => $barter_var,
				'kredit_var'							      => $kredit_var,
				'techizat'							        => $techizat,
				'reng_id'							          => $reng_id,
				'reng_ad'							          => $reng_ad,
				'elan_pin_kode'							    => $elan_pin_kode
			));

			if ($insert) {
				$elan_id = $db->lastInsertId();
				$SEO_URL=SEO_URL(password_hash($elan_id.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT)."-");

				if ($karoqoriya_id==1) {
					require_once "yeni_elan_islemleri/avtomobil_elani_elave_et.php";
				} elseif ($karoqoriya_id==4) {
					require_once "yeni_elan_islemleri/menzil_elani_elave_et.php";
				}elseif ($karoqoriya_id==5) {
					require_once "yeni_elan_islemleri/villa_elani_elave_et.php";
				}elseif ($karoqoriya_id==6) {
					require_once "yeni_elan_islemleri/qaraj_elani_elave_et.php";
				}elseif ($karoqoriya_id==7) {
					require_once "yeni_elan_islemleri/obyekt_elani_elave_et.php";
				}elseif ($karoqoriya_id==8) {
					require_once "yeni_elan_islemleri/torpaq_elani_elave_et.php";
				}elseif ($karoqoriya_id==88) {
					require_once "yeni_elan_islemleri/heyetevi_elani_elave_et.php";
				}
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
					$MailIcerikOlustur = " Elanınızın pin kodu aşağıdakıdır xahiş edirik kodu unutmayın; <br/><br/> ";
					$MailIcerikOlustur .= " Elanınızın Kodu: <b>" . $elan_id . "</b> <br/>";
					$MailIcerikOlustur .= " Elanınızın Pin Kodu: <b>" . $elan_pin_kode . "</b> <br/>";
					$MailIcerikOlustur .= " Elanınızın təsdiqləndikdən sonra sizi məlumat veriləcək:";
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
	  			$MailGonder->addAddress($Elan_Email, $useradsoyad);
	  			$MailGonder->addReplyTo($ana_mail, $site_adi);
	  			$MailGonder->isHTML(true);
	  			$MailGonder->Subject					=	DonusumleriGeriDondur($MailIcerikBaslik);
	  			$MailGonder->Body							=	DonusumleriGeriDondur($MailIcerikOlustur);
	  			if ($MailGonder->send()) {
	  				$link="../yenielan-".$SEO_URL;
	  				header("Location:".$link);
	  				exit; 

	  			} else {
	  				Header("Location:../elanyerlesdirsonuc.php?elancode=noz");
	  				exit();
	  			}
	  		}
	  	}	else{
	  		header("Lovation:../404.php");
	  	}
	  }else{
	  	header("Lovation:../404.php");
	  }
	}else{
		header("Lovation:../404.php");
	}
}else{
	header("Lovation:../404.php");
}



?>