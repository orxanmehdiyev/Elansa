<?php 
require_once "../Ayarlar/ayarlar.php";
if(empty($_SESSION["admistis_mail"])){
	if ($_POST['KullaniciAdi']!=="" and $_POST['KullaniciSifresi']!==""){
		$admin_mail=EmailKarakerleriXaricButunKarakterleriSil($_POST['KullaniciAdi']);
		$admin_sifre=md5(IstifadeciAdiVeSifresiIcerikleriniFiltrle($_POST['KullaniciSifresi']));
		$adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail and admin_sifre=:admin_sifre ");
		$adminsor->execute(array(
			'admin_mail'=>$admin_mail,
			'admin_sifre'=>$admin_sifre
		));
		$adminsay=$adminsor->rowCount();

		if($adminsay==1){
			$admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
			$admin_id=$admincek['admin_id'];
			$admin_giris_sayi=$admincek['admin_giris_sayi']+1;
			$BirOncekiGirisIp=$admincek['SonGirisIp'];
			$BirOncekiGirisTarixiZamanDamgasi=$admincek['SonGirisTarixiZamanDamgasi'];
			$BirOncekiGirisTarixi=$admincek['SonGirisTarixi'];
			$admingirisElaveET=$db->prepare("INSERT INTO admingiris SET
				admin_id									=:admin_id,
				GirisTarixiZamanDamgasi		=:GirisTarixiZamanDamgasi,
				GirisTarixi								=:GirisTarixi,
				GirisIp										=:GirisIp
				");
			$insert=$admingirisElaveET->execute(array(
				'admin_id' 								=> $admin_id,
				'GirisTarixiZamanDamgasi' => $ZamanDamgasi,
				'GirisTarixi' 						=> $TarixSaat,
				'GirisIp' 								=> $IPAdresi
			));
			
			if ($insert) {
				$yenile = $db->prepare("UPDATE admin SET     
					admin_giris_sayi=:admin_giris_sayi,
					BirOncekiGirisIp=:BirOncekiGirisIp,
					BirOncekiGirisTarixiZamanDamgasi=:BirOncekiGirisTarixiZamanDamgasi,
					BirOncekiGirisTarixi=:BirOncekiGirisTarixi,
					SonGirisTarixiZamanDamgasi=:SonGirisTarixiZamanDamgasi,
					SonGirisTarixi=:SonGirisTarixi,
					SonGirisTarixi=:SonGirisTarixi
					WHERE admin_id=$admin_id");
				$update = $yenile->execute(array(
					'admin_giris_sayi' => $admin_giris_sayi,
					'BirOncekiGirisIp' => $BirOncekiGirisIp,
					'BirOncekiGirisTarixiZamanDamgasi' => $BirOncekiGirisTarixiZamanDamgasi,
					'BirOncekiGirisTarixi' => $BirOncekiGirisTarixi,
					'SonGirisTarixiZamanDamgasi' => $ZamanDamgasi,
					'SonGirisTarixi' => $TarixSaat,
					'SonGirisTarixi' => $IPAdresi
				));
				if ($update) {
					$_SESSION['admistis_mail']=$admin_mail;
					header("Location:../index.php");
					exit;
				}else{
					header("Location:../../404.php");
					exit;
				}
			}else{
				header("Location:../../404.php");
				exit;
			}
		}else{
			header("Location:../../404.php");
			exit;
		}
	}
	else{
		header("Location:../");
		exit;
	}
}

	?>