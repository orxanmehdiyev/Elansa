<?php 	
require_once "../_admin/Ayarlar/ayarlar.php";
require_once("../_admin/Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");
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
				$ad_soyad=$usercek['user_ad']."  ".$usercek['user_soyad'];
				$email=$usercek['user_email'];
				$telefon_bir=$usercek['user_tel'];
				$telefon_iki=$usercek['user_tel_iki'];
			}
		}else{
			$user_id="";
			$telefon_iki="";
			$ad_soyad=HerfVeReqemIcerikleriniFitrle($_POST['ad_soyad']);
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
		$avtomobil_markasi_id=ReqemlerXaricButunKarakterleriSil($_POST['avtomobil_markasi_id']);
		$auto_marka_sor=$db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_durum=:avtomobil_markasi_durum and avtomobil_markasi_id=:avtomobil_markasi_id");
		$auto_marka_sor->execute(array(
			'avtomobil_markasi_durum'=>1,
			'avtomobil_markasi_id'=>$avtomobil_markasi_id));
		$avtmarkasay=$auto_marka_sor->rowCount();
		if ($avtmarkasay==1) {
			$auto_marka_cek=$auto_marka_sor->fetch(PDO::FETCH_ASSOC);
			$avtomobil_markasi_id=$auto_marka_cek["avtomobil_markasi_id"];
			$avtomobil_markasi_ad=$auto_marka_cek["avtomobil_markasi_ad"];
		}else{
			header("Location:../yenielan.php?durum=avtomarkasef");
			exit;
		}
		$avtomobil_model_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_model_id"]);
		$auto_model_sor=$db->prepare("SELECT * FROM avtomobil_modeli WHERE avtomobil_model_id=:avtomobil_model_id and avtomobil_model_durum=:avtomobil_model_durum ");
		$auto_model_sor->execute(array(
			'avtomobil_model_id'=>$avtomobil_model_id,
			'avtomobil_model_durum'=>1));
		$modelsayi= $auto_model_sor->rowCount();
		if ($modelsayi==1) {
			$auto_model_cek=$auto_model_sor->fetch(PDO::FETCH_ASSOC);
			$avtomobil_model_id=$auto_model_cek["avtomobil_model_id"];
			$avtomobil_model_ad=$auto_model_cek["avtomobil_model_ad"];
		}else{
			header("Location:../yenielan.php?durum=avtomodelxeta");
			exit;
		}
		$avtomobil_ban_novu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_ban_novu_id"]);
		$ban_sor=$db->prepare("SELECT * FROM avtomobil_ban_novu  where avtomobil_ban_novu_durum=:avtomobil_ban_novu_durum and avtomobil_ban_novu_id=:avtomobil_ban_novu_id");
		$ban_sor->execute(array(
			'avtomobil_ban_novu_durum'=>1,
			'avtomobil_ban_novu_id'=>$avtomobil_ban_novu_id));
		$ban_say= $ban_sor->rowCount();
		if ($ban_say==1) {
			$ban_cek=$ban_sor->fetch(PDO::FETCH_ASSOC);
			$avtomobil_ban_novu_id=$ban_cek["avtomobil_ban_novu_id"];
			$avtomobil_ban_novu_ad=$ban_cek["avtomobil_ban_novu_ad"];
		}else{
			header("Location:../yenielan.php?durum=avtobanxeta");
			exit;
		}
		$avto_yurus_km		=	ReqemlerXaricButunKarakterleriSil($_POST["avto_yurus_km"]);
		if($avto_yurus_km<=0){
			header("Location:../yenielan.php?durum=avtoyuruskmxeta");
			exit;
		}
		$avto_suret_qutusu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avto_suret_qutusu_id"]);
		$suretqutusu_sor=$db->prepare("SELECT * FROM avto_suret_qutusu where avto_suret_qutusu_durum=:avto_suret_qutusu_durum and avto_suret_qutusu_id=:avto_suret_qutusu_id");
		$suretqutusu_sor->execute(array(
			'avto_suret_qutusu_durum'=>1,
			'avto_suret_qutusu_id'=>$avto_suret_qutusu_id));
		$suretqutusu_say= $suretqutusu_sor->rowCount();
		if ($suretqutusu_say==1) {
			$avto_suret_qutusu_cek=$suretqutusu_sor->fetch(PDO::FETCH_ASSOC);
			$avto_suret_qutusu_id=$avto_suret_qutusu_cek["avto_suret_qutusu_id"];
			$avto_suret_qutusu_ad=$avto_suret_qutusu_cek["avto_suret_qutusu_ad"];
		}else{
			header("Location:../yenielan.php?durum=avto_suret_qutusu_xeta");
			exit;
		}
		$yanacaq_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_yanacaq_id"]);
		$yanacaq_sor=$db->prepare("SELECT * FROM yanacaq where yanacaq_durum=:yanacaq_durum and yanacaq_id=:yanacaq_id");
		$yanacaq_sor->execute(array(
			'yanacaq_durum'=>1,
			'yanacaq_id'=>$yanacaq_id));
		$yanacaq_say= $yanacaq_sor->rowCount();
		if ($yanacaq_say==1) {
			$yanacaq_cek=$yanacaq_sor->fetch(PDO::FETCH_ASSOC);
			$yanacaq_id=$yanacaq_cek["yanacaq_id"];
			$yanacaq_ad=$yanacaq_cek["yanacaq_ad"];
		}else{
			header("Location:../yenielan.php?durum=yanacaq_xeta");
			exit;
		}
		$avtomobilmuherrikhecmi_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avto_muherrikin_hecmi"]);
		$avtomobilmuherrikhecmisor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum and avtomobilmuherrikhecmi_id=:avtomobilmuherrikhecmi_id ");
		$avtomobilmuherrikhecmisor->execute(array(
			'avtomobilmuherrikhecmi_durum'=>1,
			'avtomobilmuherrikhecmi_id'=>$avtomobilmuherrikhecmi_id));
		$avtomobilmuherrikhecmi_say= $avtomobilmuherrikhecmisor->rowCount();
		if ($yanacaq_say==1) {
			$avtomobilmuherrikhecmicek=$avtomobilmuherrikhecmisor->fetch(PDO::FETCH_ASSOC);
			$avtomobilmuherrikhecmi_id=$avtomobilmuherrikhecmicek["avtomobilmuherrikhecmi_id"];
			$avtomobilmuherrikhecmi_ad=$avtomobilmuherrikhecmicek["avtomobilmuherrikhecmi_ad"];
		}else{
			header("Location:../yenielan.php?durum=avtomobilmuherrikhecmi_xeta");
			exit;
		}
		$muherrikin_at_gucu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["muherrikin_at_gucu_id"]);
		if($muherrikin_at_gucu_id<=0){
			header("Location:../yenielan.php?durum=muherrikin_at_gucu_ilixeta");
			exit;
		}
		$avto_otrucu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avto_otrucu_id"]);
		$otrucu_sor=$db->prepare("SELECT * FROM avto_otrucu where avto_otrucudurum=:avto_otrucudurum and avto_otrucu_id=:avto_otrucu_id");
		$otrucu_sor->execute(array(
			'avto_otrucudurum'=>1,
			'avto_otrucu_id'=>$avto_otrucu_id));
		$otrucu_say= $otrucu_sor->rowCount();
		if ($otrucu_say==1) {
			$otrucu_cek=$otrucu_sor->fetch(PDO::FETCH_ASSOC);
			$avto_otrucu_id=$otrucu_cek["avto_otrucu_id"];
			$avto_otrucu_ad=$otrucu_cek["avto_otrucu_ad"];
		}else{
			header("Location:../yenielan.php?durum=avto_otrucu_xeta");
			exit;
		}
		$elan_adi=$avtomobil_markasi_ad.", ".$avtomobil_model_ad;
		$SEO_URL=SEO_URL(password_hash($elan_adi.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT)."-");

		if(count($_FILES["pro-image"]["tmp_name"]) > 0){
			$elenekle=$db->prepare("INSERT INTO  elan SET
				ZamanDamgasi		               =:ZamanDamgasi,
				TarixSaat		                   =:TarixSaat,
				IPAdresi		                   =:IPAdresi,
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
				elan_pin_kode		               =:elan_pin_kode,
				SEO_URL                        =:SEO_URL,  
				elan_adi                       =:elan_adi,
				avtomobil_markasi_id           =:avtomobil_markasi_id,
				avtomobil_markasi_ad           =:avtomobil_markasi_ad,
				avtomobil_model_id             =:avtomobil_model_id,
				avtomobil_model_ad             =:avtomobil_model_ad,
				avtomobil_ban_novu_id          =:avtomobil_ban_novu_id,
				avtomobil_ban_novu_ad          =:avtomobil_ban_novu_ad,
				avto_yurus_km                  =:avto_yurus_km,
				avto_suret_qutusu_id           =:avto_suret_qutusu_id,
				avto_suret_qutusu_ad           =:avto_suret_qutusu_ad,
				yanacaq_id                     =:yanacaq_id,
				yanacaq_ad                     =:yanacaq_ad,
				avtomobilmuherrikhecmi_id      =:avtomobilmuherrikhecmi_id,
				avtomobilmuherrikhecmi_ad      =:avtomobilmuherrikhecmi_ad,
				muherrikin_at_gucu_id          =:muherrikin_at_gucu_id,
				avto_otrucu_id                 =:avto_otrucu_id,
				avto_otrucu_ad                 =:avto_otrucu_ad
				");
			$insert=$elenekle->execute(array(
				'ZamanDamgasi'					    		=> $ZamanDamgasi,
				'TarixSaat'						        	=> $TarixSaat,
				'IPAdresi'					        		=> $IPAdresi,
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
				'elan_pin_kode'							    => $elan_pin_kode,
				'SEO_URL'                       => $SEO_URL,
				'elan_adi'                      => $elan_adi,
				'avtomobil_markasi_id'          => $avtomobil_markasi_id,
				'avtomobil_markasi_ad'          => $avtomobil_markasi_ad,
				'avtomobil_model_id'            => $avtomobil_model_id,
				'avtomobil_model_ad'            => $avtomobil_model_ad,
				'avtomobil_ban_novu_id'         => $avtomobil_ban_novu_id,
				'avtomobil_ban_novu_ad'         => $avtomobil_ban_novu_ad,
				'avto_yurus_km'                 => $avto_yurus_km,
				'avto_suret_qutusu_id'          => $avto_suret_qutusu_id,
				'avto_suret_qutusu_ad'          => $avto_suret_qutusu_ad,
				'yanacaq_id'                    => $yanacaq_id,
				'yanacaq_ad'                    => $yanacaq_ad,
				'avtomobilmuherrikhecmi_id'     => $avtomobilmuherrikhecmi_id,
				'avtomobilmuherrikhecmi_ad'     => $avtomobilmuherrikhecmi_ad,
				'muherrikin_at_gucu_id'         => $muherrikin_at_gucu_id,
				'avto_otrucu_id'                => $avto_otrucu_id,
				'avto_otrucu_ad'                => $avto_otrucu_ad
			));
			if ($insert) {	
				$elan_id = $db->lastInsertId();
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
	  			if ($MailGonder->send()) {?>

	  				<style type="text/css">
	  					.kapsamaalani{
	  						display: block;
	  						position: relative;
	  						margin: 0;
	  						padding: 0;
	  						border: none;
	  						outline: none;
	  						width: 100%;
	  						height: auto;
	  						text-align: center;
	  						text-decoration: none;


	  					}
	  					.elanyerlesdirsonuc{
	  						display: block;
	  						position: relative;
	  						margin: 12% auto;
	  						text-align: center;
	  						width: 500px;
	  						border: 2px solid #ff7f00;
	  						border-radius: 13px;
	  						padding: 10px;

	  						
	  					}
	  				</style>
	  				<div class="kapsamaalani">

	  					<div class="elanyerlesdirsonuc">
	  						<h2>Elanınız uğrla göndərildi</h2>
	  						<div>Elanınız haqqında məlumat <b><?php echo $Elan_Email ?></b> ünvanına göndərildi </div>
	  						<div>Elanınız PİN kodu <b><?php echo $elan_pin_kode ?></b>. Pin kodu unutmayın!</div>
	  					</div>
	  				</div>

	  				<?php for($i = 0; $i < count($_FILES["pro-image"]["tmp_name"]); $i++) {
	  					$uzanti = substr($_FILES["pro-image"]["name"][$i],-4,4);
	  					$adi    = uniqid().$uzanti;
	  					$yol    = "../images/avtomobil/".$adi;
	  					move_uploaded_file($_FILES["pro-image"]["tmp_name"][$i],$yol);
	  					$foto[]=$adi;	  				}
	  					$sekil=json_encode($foto);
	  					$yenile = $db->prepare("UPDATE elan SET     
	  						sekil	 =:sekil
	  						WHERE elan_id=$elan_id");
	  					$update = $yenile->execute(array(     
	  						'sekil'=>$sekil
	  					));
	  					
	  					exit; 

	  				} else {
	  					Header("Location:../elanyerlesdirsonuc.php?elancode=noz");
	  					exit();
	  				}

	  			}	else{
	  				header("Lovation:../404.php");
	  			}
	  		}	else{
	  			header("Lovation:../404.php?sekil=no");
	  		}
	  	}else{
	  		header("Lovation:../404.php");
	  	}
	  }else{
	  	header("Lovation:../404.php");
	  }

	?>