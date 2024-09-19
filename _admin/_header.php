<?php 

require_once("Ayarlar/ayarlar.php");
require_once("Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");
require_once("Frameworkler/Verot/src/class.upload.php");
$adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
$adminsor->execute(array(
  'admin_mail'=>($_SESSION["admistis_mail"])
));
$adminsay=$adminsor->rowCount();
if($adminsay==1){
  $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
  $DovletlerListelemeLimiti=$admincek['dovlet_listeleme_limiti'];
  $seherlerListelemeLimiti=$admincek['seher_listeleme_limiti'];
  $avtomobil_techizati_bolmesi_listeleme_limiti=$admincek['avtomobil_techizati_bolmesi_listeleme_limiti'];
  $avtomobil_techizat_listeleme_limiti=$admincek['avtomobil_techizat_listeleme_limiti'];
  $elan_veren_novu_listeleme_limiti=$admincek['elan_veren_novu_listeleme_limiti'];
  $bolme_listeleme_limiti=$admincek['bolme_listeleme_limiti'];
  $katagorya_listeleme_limiti=$admincek['katagorya_listeleme_limiti'];
  $avtomobil_markasi_listeleme_limiti=$admincek['avtomobil_markasi_listeleme_limiti'];
  $avtomobil_modeli_listeleme_limiti=$admincek['avtomobil_modeli_listeleme_limiti'];
  $avtomobil_ban_novu_listeleme_limiti=$admincek['avtomobil_ban_novu_listeleme_limiti'];
  $admin_listeleme_limiti=$admincek['admin_listeleme_limiti'];
  $avto_suret_qutusu_listeleme_limiti=$admincek['avto_suret_qutusu_listeleme_limiti'];
  $binatipi_listeleme_limiti=$admincek['binatipi_listeleme_limiti'];
  $YeniElanlarListelemeLimiti=$admincek['elan_listeleme_limiti'];
  $emlakin_veziyyeti_listeleme_limiti=$admincek['emlakin_veziyyeti_listeleme_limiti'];
  $yanacaq_listeleme_limiti=$admincek['yanacaq_listeleme_limiti'];
  $avtomobilmuherrikhecmi_listeleme_limiti=$admincek['avtomobilmuherrikhecmi_listeleme_limiti'];
  $avto_otrucu_listeleme_limiti=$admincek['avto_otrucu_listeleme_limiti'];
  $reng_listeleme_limiti=$admincek['reng_listeleme_limiti'];
  $yerlesdiyiblok_listeleme_limiti=$admincek['yerlesdiyiblok_listeleme_limiti'];
  $emlak_senedi_listeleme_limiti=$admincek['emlak_senedi_listeleme_limiti'];
  $proyekt_listeleme_limiti=$admincek['proyekt_listeleme_limiti'];
  $menzil_techizat_bolmesi_listeleme_limiti=$admincek['menzil_techizat_bolmesi_listeleme_limiti'];
   $menzil_techizati_siralama_limiti=$admincek['menzil_techizati_siralama_limiti'];
  $obyekt_listeleme_limiti=$admincek['obyekt_listeleme_limiti'];
   $reklam_listeleme_limiti=$admincek['reklam_listeleme_limiti'];
}else{
 header("Location:login");
 exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $tittle_metni; ?> </title>
  <link href="vendors/font-awesome/css/all.css" rel="stylesheet">
  <link href="vendors/css/style.css" rel="stylesheet">
  <script src="Ayarlar/Fonksiyonlar.js" type="text/javascript" language="javascript"></script>
  
</head>
<body >
  <header>
    <div id="seyfe-logo-alani">
      <a href="index"><img src="img/<?php echo $logo ?>"></a>
    </div>
    <div id="mobilmenuac" onClick="MobilMenuAlaniMenuAcKapat()">
     <i class="fas fa-bars"></i>
   </div>
   <div id="hedare-istifadeci-alani">
    <div class="header_bildirim_icon_alani_kapsayici">
      <i class="fa fa-bell"></i>
      <span><span>9999</span></span>
    </div>
    <div class="header_bildirim_icon_alani_kapsayici">
      <i class="fa fa-envelope"></i>
      <span><span>9999</span></span>
    </div>
    <div class="header_bildirim_icon_alani_kapsayici">
      <i class="fa fa-globe"></i>
      <span><span>9999</span></span>
    </div>
    <div class="header_istifadeci_icon_alani_kapsayici">
      <img src="img/istifedeci.jpg">
    </div>
    <div id="HeaderİstifadeciAdSoyadVeAcilirAlanKapsayicisi" onClick="HeaderYoneticiAlaniMenuAcKapat()">         
      <div id="HeaderİstifadeciAdSoya">
        <span id="HeaderİstifadeciAdSoyaalani"><?php echo  HerSozunIlkHerfiniBoyukEt($admincek['admin_ad'])." ".HerSozunIlkHerfiniBoyukEt($admincek['admin_soyad']) ?></span>
        <img id="AcilirMenuOku" src="img/OkAsagi.png">
        <span id="istifadecistatusmetni"><i>Yönetici</i></span>
      </div>
    </div>
    <div id="HeaderIstifadeciAcilirMenuAlaniKapsayicisi" style="display: none;" >
      <ul>
        <li><a href="../aydan/" target="_top"> <i class="fa fa-home"></i>Ana Sayfa</a></li>
        <li><a href="" target="_top"> <i class="fas fa-users-cog"></i>Yönetici Ayarları</a></li>
        <li><a href="Islem/cixis"> <i class="fas fa-sign-out-alt"></i>Çıkış</a></li>
      </ul>
    </div>
  </div>
</header>
<?php 
require_once("_modal.php");
?>