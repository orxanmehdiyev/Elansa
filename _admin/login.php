<?php session_start(); ob_start();
if(isset($_SESSION["admistis_mail"])){
	header("Location:index");
	exit;
};
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gentelella Alela! | </title>
	<link href="vendors/font-awesome/css/all.css" rel="stylesheet">
	<link href="vendors/css/giris.css" rel="stylesheet">
	<script src="Ayarlar/Fonksiyonlar.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript">
		function SistemAyarlariFormKontrol(){
			if(document.getElementById("KullaniciAdi").value==""){
				document.getElementById("KullaniciAdi").style.backgroundColor = "#ffb3b3";
				document.getElementById("KullaniciAdi").focus();
				document.getElementById('captcha').src="";
				document.getElementById('capkayenile').click();
				event.preventDefault();
				return;
			}
			else if (document.getElementById("KullaniciSifresi").value==""){
				document.getElementById("KullaniciSifresi").style.backgroundColor = "#ffb3b3";
				document.getElementById("KullaniciSifresi").focus();
				document.getElementById('captcha').src="";
				document.getElementById('capkayenile').click();
				event.preventDefault();
				return;				
			}

			document.girisformu.submit();
		}

		function KullaniciAdiYazildi(){
			document.getElementById("KullaniciAdi").style.backgroundColor = "#FFFFFF";
			return;
		}

		function KullaniciSifresiYazildi(){
			document.getElementById("KullaniciSifresi").style.backgroundColor = "#FFFFFF";
			return;
		}




	</script>
</head>
<body>
	<div id="TumSayfaKapsayiciAlani">
		<div id="TamSayfaArkaPlanResimAlani"></div>
		<div id="TamSayfaArkaPlanKarartmaAlani"></div>		
		<div id="YoneticiGirisFormuKapsayiciAlani">
			<form action="Islem/login_islem.php" method="POST" id="girisformu" name="girisformu">
				<div id="YoneticiGirisFormuLogosuKapsayiciAlani">
					<span>elansa.az</span>
				</div>
				<input type="text" id="KullaniciAdi" name="KullaniciAdi" oninput="KullaniciAdiAlanlariIciniFiltrle('KullaniciAdi'); KullaniciAdiYazildi()" onKeyUp="KullaniciAdiAlanlariIciniFiltrle('KullaniciAdi'); KullaniciAdiYazildi()" placeholder="E-Mail" tabindex="1" required>
				<div id="YoneticiGirisFormuCizgisi">
					<i></i>
				</div>
				<input type="password" id="KullaniciSifresi" name="KullaniciSifresi" oninput="KullaniciSifresiAlanlariIcinFiltrle('KullaniciSifresi'); KullaniciSifresiYazildi()" onKeyUp="KullaniciSifresiAlanlariIcinFiltrle('KullaniciSifresi'); KullaniciSifresiYazildi()" placeholder="Şifrə" tabindex="2" required>
				<span id="YoneticiGirisFormuSifremiUnuttum">
					<a href="sifreunutdum" target="_top" tabindex="3">Unuttum?</a>
				</span>
				<button id="GirisButonu" name="GirisButonu" tabindex="6" onClick="SistemAyarlariFormKontrol()" type="button">Giriş</button>
			</form>
		</div>
	</div>
</body>
</html>