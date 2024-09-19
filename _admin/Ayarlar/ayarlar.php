<?php 
session_start(); ob_start();
require_once "baglan.php";
require_once "function.php";
$ayarsor=$db->prepare("SELECT * FROM umumi_ayarlar where umumi_ayar_id=:umumi_ayar_id");
$ayarsor->execute(array(
	'umumi_ayar_id'=>1));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
$umumi_ayar_id=$ayarcek['umumi_ayar_id'];
 $tittle_metni=$ayarcek['tittle_metni'];
$logo=$ayarcek['logo'];
$site_adi=$ayarcek['site_adi'];
$site_url=$ayarcek['site_url'];
$description=$ayarcek['description'];
$keywords=$ayarcek['keywords'];
$author=$ayarcek['author'];
$ayar_tel=$ayarcek['ayar_tel'];
$ayar_gsm=$ayarcek['ayar_gsm'];
$ana_mail=$ayarcek['ana_mail'];
$ana_mail_sifresi=$ayarcek['ana_mail_sifresi'];
$POP3SunucuBaglantiTuru=$ayarcek['POP3SunucuBaglantiTuru'];
$POP3SunucuAdresi=$ayarcek['POP3SunucuAdresi'];
$POP3SunucusuSSLPortu=$ayarcek['POP3SunucusuSSLPortu'];
$POP3SunucusuTLSPortu=$ayarcek['POP3SunucusuTLSPortu'];
$SMTPSunucuBaglantiTuru=$ayarcek['SMTPSunucuBaglantiTuru'];
$SMTPSunucuAdresi=$ayarcek['SMTPSunucuAdresi'];
$SMTPSunucusuSSLPortu=$ayarcek['SMTPSunucusuSSLPortu'];
$SMTPSunucusuTLSPortu=$ayarcek['SMTPSunucusuTLSPortu'];
$IslemBasinaGonderilecekMailSayisi=$ayarcek['IslemBasinaGonderilecekMailSayisi'];
$maps=$ayarcek['maps'];
$analystic=$ayarcek['analystic'];
$zopim=$ayarcek['zopim'];
$footer_metni=$ayarcek['footer_metni'];
$InportEdilenFileMelumatSayi=$ayarcek['InportEdilenFileMelumatSayi'];
$ExportEdilenFileMelumatSayi=$ayarcek['ExportEdilenFileMelumatSayi'];

?>