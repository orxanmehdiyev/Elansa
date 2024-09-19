<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){

 if(isset($_POST["YeniAvtomobilTechizatiBolmesi"])){
  $avtomobil_techizat_bolmesi_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobil_techizat_bolmesi_ad"]));
  $avtomobil_techizat_bolmesi_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_ad=:avtomobil_techizat_bolmesi_ad ");
  $avtomobil_techizat_bolmesi_sor->execute(array(
    'avtomobil_techizat_bolmesi_ad'=>$avtomobil_techizat_bolmesi_ad));
  $say= $avtomobil_techizat_bolmesi_sor->rowCount();
  if ($say>0) {
    $avtomobil_techizat_bolmesicek= $avtomobil_techizat_bolmesi_sor->fetch(PDO::FETCH_ASSOC);
    $avtomobil_techizat_bolmesi_id_kodla= $avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_id_kodla'];
    header("Location:../AvtomobilTechizatBolmesiSonuc?durum=var&avtomobil_techizat_bolmesi_id_kodla=$avtomobil_techizat_bolmesi_id_kodla");
    exit;
  }
  if(($avtomobil_techizat_bolmesi_ad!="")){
    $ElaveET=$db->prepare("INSERT INTO avtomobil_techizat_bolmesi SET
      avtomobil_techizat_bolmesi_ad        =   :avtomobil_techizat_bolmesi_ad
      ");
    $insert=$ElaveET->execute(array(
      'avtomobil_techizat_bolmesi_ad'      => $avtomobil_techizat_bolmesi_ad
    ));
    if ($insert) {    
      $avtomobil_techizat_bolmesi_id = $db->lastInsertId();
      $avtomobil_techizat_bolmesi_id_kodla=seo($elan_adi.md5(password_hash(seo(md5($elan_id.$elan_adi.$elan_katoqoriya_id.uniqid(time()))), PASSWORD_DEFAULT)));
      $yenile = $db->prepare("UPDATE avtomobil_techizat_bolmesi SET     
        avtomobil_techizat_bolmesi_id_kodla=:avtomobil_techizat_bolmesi_id_kodla  
        WHERE avtomobil_techizat_bolmesi_id=$avtomobil_techizat_bolmesi_id");
      $update = $yenile->execute(array(     
        'avtomobil_techizat_bolmesi_id_kodla' => $avtomobil_techizat_bolmesi_id_kodla
      ));
      if ($update) {
        header("Location:../AvtomobilTechizatBolmesiSonuc?durum=ok&avtomobil_techizat_bolmesi_id_kodla=$avtomobil_techizat_bolmesi_id_kodla");
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
elseif(isset($_POST["AvtomobilTechizatiBolmesiYenile"])){
  $avtomobil_techizat_bolmesi_ad              =   HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobil_techizat_bolmesi_ad"]));
  $avtomobil_techizat_bolmesi_id              =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_techizat_bolmesi_id"]);

  $avtomobil_techizat_bolmesi_id_kodla        =   seo($avtomobil_techizat_bolmesi_ad.md5(password_hash(seo(md5($dovlet_id.$avtomobil_techizat_bolmesi_ad.$dovlet_telefon_kod.uniqid(time()))), PASSWORD_DEFAULT)));
  $avtomobil_techizat_bolmesi_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_ad=:avtomobil_techizat_bolmesi_ad and avtomobil_techizat_bolmesi_id<>:avtomobil_techizat_bolmesi_id");
  $avtomobil_techizat_bolmesi_sor->execute(array(
    'avtomobil_techizat_bolmesi_ad'=>$avtomobil_techizat_bolmesi_ad,
    'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
  $say= $avtomobil_techizat_bolmesi_sor->rowCount();
  if ($say>0) {
    $avtomobil_techizat_bolmesicek= $avtomobil_techizat_bolmesi_sor->fetch(PDO::FETCH_ASSOC);
    $avtomobil_techizat_bolmesi_id_kodla= $avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_id_kodla'];
    header("Location:../AvtomobilTechizatBolmesiSonuc?durum=var&avtomobil_techizat_bolmesi_id_kodla=$avtomobil_techizat_bolmesi_id_kodla");
    exit;
  }
  if(($avtomobil_techizat_bolmesi_ad!="") and ($avtomobil_techizat_bolmesi_id!="")){
   $yenile = $db->prepare("UPDATE avtomobil_techizat_bolmesi SET     
    avtomobil_techizat_bolmesi_ad=:avtomobil_techizat_bolmesi_ad,
    avtomobil_techizat_bolmesi_id_kodla=:avtomobil_techizat_bolmesi_id_kodla
    WHERE avtomobil_techizat_bolmesi_id=$avtomobil_techizat_bolmesi_id");
   $update = $yenile->execute(array(     
    'avtomobil_techizat_bolmesi_ad' => $avtomobil_techizat_bolmesi_ad,
    'avtomobil_techizat_bolmesi_id_kodla' => $avtomobil_techizat_bolmesi_id_kodla
  ));
   if ($update) {
    header("Location:../AvtomobilTechizatBolmesiSonuc?durum=yok&avtomobil_techizat_bolmesi_id_kodla=$avtomobil_techizat_bolmesi_id_kodla");
    exit;
  }else{
   header("Location:../../404.php");
   exit;
 }
}else{
  header("Location:../../404.php");
  exit;
}
} elseif(isset($_POST["avtomobil_techizati_bolme_siralam"])){
 $avtomobil_techizati_bolmesi_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_techizati_bolme_siralam"]); 
 if($avtomobil_techizati_bolmesi_listeleme_limiti!=""){
  $adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
  $adminsor->execute(array(
    'admin_mail'=>($_SESSION["admistis_mail"])
  ));
  $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
  $admin_id= $admincek['admin_id'];
  $yenile = $db->prepare("UPDATE admin SET     
    avtomobil_techizati_bolmesi_listeleme_limiti=:avtomobil_techizati_bolmesi_listeleme_limiti   
    WHERE admin_id=$admin_id");
  $update = $yenile->execute(array(
    'avtomobil_techizati_bolmesi_listeleme_limiti' => $avtomobil_techizati_bolmesi_listeleme_limiti
  ));
}
} elseif(isset($_POST["avtomobil_techizat_bolmesi_durum_id"])){
  $avtomobil_techizat_bolmesi_durum_id     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_techizat_bolmesi_durum_id"]);  
  if($avtomobil_techizat_bolmesi_durum_id!=""){
    $avtomobiltecizahbolmesisor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
    $avtomobiltecizahbolmesisor->execute(array(
      'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_durum_id));
    $avtomobiltecizahbolmesisorsay=$avtomobiltecizahbolmesisor->rowCount();
    if ($avtomobiltecizahbolmesisorsay==1) {
      $avtomobiltecizahbolmesicek = $avtomobiltecizahbolmesisor->fetch(PDO::FETCH_ASSOC);
      if ($avtomobiltecizahbolmesicek['avtomobil_techizat_bolmesi_durum'] == 1) {
        $status = 0;
      } elseif ($avtomobiltecizahbolmesicek['avtomobil_techizat_bolmesi_durum'] == 0) {
        $status = 1;
      }
      $yenile = $db->prepare("UPDATE avtomobil_techizat_bolmesi SET     
        avtomobil_techizat_bolmesi_durum=:avtomobil_techizat_bolmesi_durum   
        WHERE avtomobil_techizat_bolmesi_id=$avtomobil_techizat_bolmesi_durum_id");
      $update = $yenile->execute(array(
        'avtomobil_techizat_bolmesi_durum' => $status
      ));
    }
  }
}
elseif(isset($_POST["AvtomobilTechizatiBolmesiSilId"])){
  $avtomobil_techizat_bolmesi_id     =   ReqemlerXaricButunKarakterleriSil($_POST["AvtomobilTechizatiBolmesiSilId"]);  
  if($avtomobil_techizat_bolmesi_id!=""){
    $sil = $db->prepare("DELETE from avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
    $kontrol = $sil->execute(array(
      'avtomobil_techizat_bolmesi_id' => $avtomobil_techizat_bolmesi_id
    ));
    $AvtomobilTechizatiSor=$db->prepare("SELECT avtomobil_techizat where avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
    $AvtomobilTechizatiSor->execute(array(
      'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
    $AvtomobilTechizatiSay=$AvtomobilTechizatiSor->rowCount();
    if ($AvtomobilTechizatiSay>0) {
      for($i=0;$i= $AvtomobilTechizatiSay;$i++){
        $sil = $db->prepare("DELETE from avtomobil_techizat where avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
        $kontrol = $sil->avtomobil_techizat_bolmesi_id(array(
          'avtomobil_techizat_id' => $avtomobil_techizat_bolmesi_id
        ));
      }
    }
  }else{
    header("Location:../../404.php");
    exit;
  }
}else{
  header("Location:../AvtomobilTechizatBolmesi");
  exit;

}
}else{
  header("Location:../login");
  exit;

}
?>