<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
 if(isset($_POST["YeniAvtomobilTechizati"])){
   $avtomobil_techizat_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobil_techizat_ad"]));
   $avtomobil_techizat_bolmesi_id              =  ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_techizat_bolmesi_id_sec"]);
   $avtomobil_techizat_id_kodla=SEO_URL(password_hash($avtomobil_techizat_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   $AvtomobilTechizatiSor=$db->prepare("SELECT * FROM avtomobil_techizat where  avtomobil_techizat_ad=:avtomobil_techizat_ad and avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
   $AvtomobilTechizatiSor->execute(array(
    'avtomobil_techizat_ad'=>$avtomobil_techizat_ad,
    'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
   $say= $AvtomobilTechizatiSor->rowCount();
   if ($say>0) {
    $avtomobil_techizati_cek= $AvtomobilTechizatiSor->fetch(PDO::FETCH_ASSOC);
    $avtomobil_techizat_id_kodla= $avtomobil_techizati_cek['avtomobil_techizat_id_kodla'];
    header("Location:../AvtomobilTechizatSonuc?durum=var&avtomobil_techizat_id_kodla=$avtomobil_techizat_id_kodla");
    exit;
  }
  if(($avtomobil_techizat_ad!="") and ($avtomobil_techizat_bolmesi_id!="") ){
    $ElaveET=$db->prepare("INSERT INTO avtomobil_techizat SET
      avtomobil_techizat_ad                =   :avtomobil_techizat_ad,
      avtomobil_techizat_id_kodla          =   :avtomobil_techizat_id_kodla,
      avtomobil_techizat_bolmesi_id        =   :avtomobil_techizat_bolmesi_id
      ");
    $insert=$ElaveET->execute(array(
      'avtomobil_techizat_ad'              => $avtomobil_techizat_ad,
      'avtomobil_techizat_id_kodla'        => $avtomobil_techizat_id_kodla,
      'avtomobil_techizat_bolmesi_id'      => $avtomobil_techizat_bolmesi_id
    ));

    if ($insert) {  
      header("Location:../AvtomobilTechizatSonuc?durum=ok&avtomobil_techizat_id_kodla=$avtomobil_techizat_id_kodla");
      exit;
    }else{
      header("Location:../../404.php");
      exit;
    }
  }else{
    header("Location:../../404.php");
    exit;
  }
} elseif(isset($_POST["Yenile"])){
  $avtomobil_techizat_ad                   =   HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobil_techizat_ad"]));
  $avtomobil_techizat_id                   =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_techizat_id"]);
  $avtomobil_techizat_bolmesi_id       =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_techizat_bolmesi_id_sec"]);
  $avtomobil_techizat_id_kodla=SEO_URL(password_hash($avtomobil_techizat_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
  $avtomobil_techizat_sor=$db->prepare("SELECT * FROM avtomobil_techizat where avtomobil_techizat_ad=:avtomobil_techizat_ad and avtomobil_techizat_id<>:avtomobil_techizat_id and avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
  $avtomobil_techizat_sor->execute(array(
    'avtomobil_techizat_ad'=>$avtomobil_techizat_ad,
    'avtomobil_techizat_id'=>$avtomobil_techizat_id,
    'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
  $say= $avtomobil_techizat_sor->rowCount();
  if ($say>0) {
    $avtomobil_techizat_cek= $avtomobil_techizat_sor->fetch(PDO::FETCH_ASSOC);
    $avtomobil_techizat_id_kodla= $avtomobil_techizat_cek['avtomobil_techizat_id_kodla'];
    header("Location:../AvtomobilTechizatSonuc?durum=var&avtomobil_techizat_id_kodla=$avtomobil_techizat_id_kodla");
    exit;
  }
  if(($avtomobil_techizat_ad!="") and ($avtomobil_techizat_id!="") and ($avtomobil_techizat_bolmesi_id!="")){
   $yenile = $db->prepare("UPDATE avtomobil_techizat SET 
    avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id,    
    avtomobil_techizat_ad=:avtomobil_techizat_ad,
    avtomobil_techizat_id_kodla=:avtomobil_techizat_id_kodla
    WHERE avtomobil_techizat_id=$avtomobil_techizat_id");
   $update = $yenile->execute(array(    
    'avtomobil_techizat_bolmesi_id' => $avtomobil_techizat_bolmesi_id, 
    'avtomobil_techizat_ad' => $avtomobil_techizat_ad,
    'avtomobil_techizat_id_kodla' => $avtomobil_techizat_id_kodla
  ));
   if ($update) {
     header("Location:../AvtomobilTechizatSonuc?durum=yok&avtomobil_techizat_id_kodla=$avtomobil_techizat_id_kodla");
     exit;
   }else{
     header("Location:../../404d.php");
     exit;
   }
 }else{
  header("Location:../../404.php");
  exit;
}
} elseif(isset($_POST["avtomobil_techizat_listeleme_limiti"])){
 $avtomobil_techizat_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_techizat_listeleme_limiti"]); 
 if($avtomobil_techizat_listeleme_limiti!=""){
  $adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
  $adminsor->execute(array(
    'admin_mail'=>($_SESSION["admistis_mail"])
  ));
  $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
  $admin_id= $admincek['admin_id'];

  $yenile = $db->prepare("UPDATE admin SET     
    avtomobil_techizat_listeleme_limiti=:avtomobil_techizat_listeleme_limiti   
    WHERE admin_id=$admin_id");
  $update = $yenile->execute(array(
    'avtomobil_techizat_listeleme_limiti' => $avtomobil_techizat_listeleme_limiti
  ));
}
}
 elseif(isset($_POST["AvtomobilTechizatiDurumId"])){
  $avtomobil_techizat_id     =   ReqemlerXaricButunKarakterleriSil($_POST["AvtomobilTechizatiDurumId"]);  
  if($avtomobil_techizat_id!=""){
    $AvtomobilTechizatiSor=$db->prepare("SELECT * FROM avtomobil_techizat where avtomobil_techizat_id=:avtomobil_techizat_id");
    $AvtomobilTechizatiSor->execute(array(
      'avtomobil_techizat_id'=>$avtomobil_techizat_id));
    $AvtomobilTechizatiSay=$AvtomobilTechizatiSor->rowCount();
    if ($AvtomobilTechizatiSay==1) {
      $AvtomobilTechizatiCek = $AvtomobilTechizatiSor->fetch(PDO::FETCH_ASSOC);
      if ($AvtomobilTechizatiCek['avtomobil_techizat_durum'] == 1) {
        $status = 0;
      } elseif ($AvtomobilTechizatiCek['avtomobil_techizat_durum'] == 0) {
        $status = 1;
      }
      $yenile = $db->prepare("UPDATE avtomobil_techizat SET     
        avtomobil_techizat_durum=:avtomobil_techizat_durum   
        WHERE avtomobil_techizat_id=$avtomobil_techizat_id");
      $update = $yenile->execute(array(
        'avtomobil_techizat_durum' => $status
      ));
    }
  }
}
 elseif(isset($_POST["AvtomobilTechizatiSilId"])){
  $avtomobil_techizat_id     =   ReqemlerXaricButunKarakterleriSil($_POST["AvtomobilTechizatiSilId"]);  
  if($avtomobil_techizat_id!=""){
    $sil = $db->prepare("DELETE from avtomobil_techizat where avtomobil_techizat_id=:avtomobil_techizat_id");
    $kontrol = $sil->execute(array(
      'avtomobil_techizat_id' => $avtomobil_techizat_id
    ));
  }else{
    header("Location:../../404.php");
    exit;
  }
}else{
   header("Location:../AvtomobilTechizati");
  exit;
}

}else{
  header("Location:../login");
  exit;

}

?>