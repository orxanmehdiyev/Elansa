<?php 
require_once "../Ayarlar/ayarlar.php";
if(empty($_SESSION["admistis_mail"])){
 header("Location:../../404.php");
 exit;
}

if(isset($_POST["ElanYayimla"])){
  $elan_id     =   ReqemlerXaricButunKarakterleriSil($_POST["ElanYayimla"]);  
  if($elan_id!=""){
    $elan=$db->prepare("SELECT * FROM elan where elan_id=:elan_id");
    $elan->execute(array(
      'elan_id'=>$elan_id));
    $elansayi=$elan->rowCount();
    $yenile = $db->prepare("UPDATE elan SET     
      yayim_durumu=:yayim_durumu   
      WHERE elan_id=$elan_id");
    $update = $yenile->execute(array(
      'yayim_durumu' => 1
    ));
  }
}


if(isset($_POST["ElanSil"])){
 $elan_id     =   ReqemlerXaricButunKarakterleriSil($_POST["ElanSil"]);  

  if($elan_id!=""){
    $elan=$db->prepare("SELECT * FROM elan where elan_id=:elan_id");
    $elan->execute(array(
      'elan_id'=>$elan_id));
    $elansayi=$elan->rowCount();
    if ($elansayi==1) {
      $elandetaycek= $elan->fetch(PDO::FETCH_ASSOC);
      if ($elandetaycek['karoqoriya_id']==1) {
       $klasor="avtomobil";
      }
      $sil = $db->prepare("DELETE from elan where elan_id=:elan_id");
      $kontrol = $sil->execute(array(
        'elan_id' => $elan_id
      ));
      if ($sil) {
       $sekil= json_decode($elandetaycek['sekil']);
       $sekilsayi=count($sekil);
       for ($i=0; $i<$sekilsayi; $i++) {      
        $sekilyol="../../images/".$klasor."/".$sekil[$i];  

         unlink("$sekilyol");     
       }
     }

   }
 }
}


if(isset($_POST["ElanYayimlasil"])){
  $elan_id     =   ReqemlerXaricButunKarakterleriSil($_POST["ElanYayimlasil"]);  
  if($elan_id!=""){
    $elan=$db->prepare("SELECT * FROM elan where elan_id=:elan_id");
    $elan->execute(array(
      'elan_id'=>$elan_id));
    $elansayi=$elan->rowCount();
    $yenile = $db->prepare("UPDATE elan SET     
      yayim_durumu=:yayim_durumu,
       VIP=:VIP   
      WHERE elan_id=$elan_id");
    $update = $yenile->execute(array(
      'yayim_durumu' => 2,
      'VIP' => 0
    ));
  }
}


if(isset($_POST["vipet"])){
  $elan_id     =   ReqemlerXaricButunKarakterleriSil($_POST["vipet"]);  
  if($elan_id!=""){
    $elan=$db->prepare("SELECT * FROM elan where elan_id=:elan_id");
    $elan->execute(array(
      'elan_id'=>$elan_id));
    $elansayi=$elan->rowCount();
    $yenile = $db->prepare("UPDATE elan SET     
      VIP=:VIP   
      WHERE elan_id=$elan_id");
    $update = $yenile->execute(array(
      'VIP' => 1
    ));
  }
}


if(isset($_POST["vipsil"])){
  $elan_id     =   ReqemlerXaricButunKarakterleriSil($_POST["vipsil"]);  
  if($elan_id!=""){
    $elan=$db->prepare("SELECT * FROM elan where elan_id=:elan_id");
    $elan->execute(array(
      'elan_id'=>$elan_id));
    $elansayi=$elan->rowCount();
    $yenile = $db->prepare("UPDATE elan SET     
      VIP=:VIP   
      WHERE elan_id=$elan_id");
    $update = $yenile->execute(array(
      'VIP' => 0
    ));
  }
}






if(isset($_POST["ElanBaxildiDurum"])){
  $elan_id     =   ReqemlerXaricButunKarakterleriSil($_POST["ElanBaxildiDurum"]);  
  if($elan_id!=""){
    $elan=$db->prepare("SELECT * FROM elan where elan_id=:elan_id");
    $elan->execute(array(
      'elan_id'=>$elan_id));
    $elansayi=$elan->rowCount();
    $yenile = $db->prepare("UPDATE elan SET     
      elan_baxildi_durum=:elan_baxildi_durum   
      WHERE elan_id=$elan_id");
    $update = $yenile->execute(array(
      'elan_baxildi_durum' => 1
    ));
  }
}











if(isset($_POST["BolmeSIlTesdiqId"])){
  $bolme_id     =   ReqemlerXaricButunKarakterleriSil($_POST["BolmeSIlTesdiqId"]);  
  if($bolme_id!=""){
    $sil = $db->prepare("DELETE from bolme where bolme_id=:bolme_id");
    $kontrol = $sil->execute(array(
      'bolme_id' => $bolme_id
    ));
  }
} 




if(isset($_POST["bolme_listeleme_limiti"])){
  $bolme_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["bolme_listeleme_limiti"]); 
  if($bolme_listeleme_limiti!=""){
    $adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])
    ));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];

    $yenile = $db->prepare("UPDATE admin SET     
      bolme_listeleme_limiti=:bolme_listeleme_limiti   
      WHERE admin_id=$admin_id");
    $update = $yenile->execute(array(
      'bolme_listeleme_limiti' => $bolme_listeleme_limiti
    ));
  }
} 





?>