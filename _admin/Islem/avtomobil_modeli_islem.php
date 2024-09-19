<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
 if(isset($_POST["Yeni"])){
   $avtomobil_model_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobil_model_ad"]));
   $avtomobil_markasi_id_sec        =  ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_markasi_id_sec"]);
   $avtomobil_model_code=SEO_URL(password_hash($avtomobil_model_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   $avtomobil_model_durum=0;
   $Model_Sor=$db->prepare("SELECT * FROM avtomobil_modeli where  avtomobil_model_ad=:avtomobil_model_ad and avtomobil_markasi_id=:avtomobil_markasi_id");
   $Model_Sor->execute(array(
    'avtomobil_model_ad'=>$avtomobil_model_ad,
    'avtomobil_markasi_id'=>$avtomobil_markasi_id_sec));
   $Model_Say= $Model_Sor->rowCount();
   if ($Model_Say>0) {
    $Model_Cek= $Model_Sor->fetch(PDO::FETCH_ASSOC);
    $avtomobil_model_code= $Model_Cek['avtomobil_model_code'];
    $avtomobil_model_id= $Model_Cek['avtomobil_model_id'];
    header("Location:../AvtomobilModeliSonuc?durum=var&id=$avtomobil_model_id&avtomobil_model_code=$avtomobil_model_code");
    exit;
  }
  if(($avtomobil_model_ad!="") and ($avtomobil_markasi_id_sec!="") ){
    $ElaveET=$db->prepare("INSERT INTO avtomobil_modeli SET
      avtomobil_model_ad          =   :avtomobil_model_ad,
      avtomobil_markasi_id        =   :avtomobil_markasi_id,
      avtomobil_model_code        =   :avtomobil_model_code,
      avtomobil_model_durum       =   :avtomobil_model_durum
      ");
    $insert=$ElaveET->execute(array(
      'avtomobil_model_ad'        => $avtomobil_model_ad,
      'avtomobil_markasi_id'      => $avtomobil_markasi_id_sec,
      'avtomobil_model_code'      => $avtomobil_model_code,
      'avtomobil_model_durum'     => $avtomobil_model_durum
    ));
    if ($insert) {  
      $avtomobil_model_id = $db->lastInsertId();
      header("Location:../AvtomobilModeliSonuc?durum=ok&id=$avtomobil_model_id&avtomobil_model_code=$avtomobil_model_code");
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
  $avtomobil_model_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobil_model_ad"]));
  $avtomobil_markasi_id_sec        =  ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_markasi_id_sec"]);
  $avtomobil_model_id              =  ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_model_id"]);
  $avtomobil_model_durum=0;
  $Model_Sor=$db->prepare("SELECT * FROM avtomobil_modeli where  avtomobil_model_ad=:avtomobil_model_ad and avtomobil_markasi_id=:avtomobil_markasi_id and avtomobil_model_id<>:avtomobil_model_id");
  $Model_Sor->execute(array(
    'avtomobil_model_ad'=>$avtomobil_model_ad,
    'avtomobil_markasi_id'=>$avtomobil_markasi_id_sec,
    'avtomobil_model_id'=>$avtomobil_model_id));
  $Model_Say= $Model_Sor->rowCount();
  if ($Model_Say>0) {
   $Model_Cek= $Model_Sor->fetch(PDO::FETCH_ASSOC);
   $avtomobil_model_code= $Model_Cek['avtomobil_model_code'];
   $avtomobil_model_id= $Model_Cek['avtomobil_model_id'];
   header("Location:../AvtomobilModeliSonuc?durum=var&id=$avtomobil_model_id&avtomobil_model_code=$avtomobil_model_code");
   exit;
 }
 if(($avtomobil_model_ad!="") and ($avtomobil_model_id!="") and ($avtomobil_markasi_id_sec!="")){
   $yenile = $db->prepare("UPDATE avtomobil_modeli SET 
    avtomobil_markasi_id=:avtomobil_markasi_id,    
    avtomobil_model_ad=:avtomobil_model_ad,
    avtomobil_model_durum=:avtomobil_model_durum
    WHERE avtomobil_model_id=$avtomobil_model_id");
   $update = $yenile->execute(array(    
    'avtomobil_markasi_id' => $avtomobil_markasi_id_sec, 
    'avtomobil_model_ad' => $avtomobil_model_ad,
    'avtomobil_model_durum' => $avtomobil_model_durum
  ));   
   if ($update) {
    $Model_Sor=$db->prepare("SELECT * FROM avtomobil_modeli where  avtomobil_model_id=:avtomobil_model_id ");
    $Model_Sor->execute(array(  
      'avtomobil_model_id'=>$avtomobil_model_id));  
    $Model_Cek= $Model_Sor->fetch(PDO::FETCH_ASSOC);
    $avtomobil_model_code= $Model_Cek['avtomobil_model_code'];

    header("Location:../AvtomobilModeliSonuc?durum=yenile&id=$avtomobil_model_id&avtomobil_model_code=$avtomobil_model_code");
    exit;
  }else{
   header("Location:../../404d.php");
   exit;
 }
}else{
  header("Location:../../404.php");
  exit;
}
} elseif(isset($_POST["avtomobil_modeli_listeleme_limiti"])){
 $avtomobil_modeli_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_modeli_listeleme_limiti"]); 
 if($avtomobil_modeli_listeleme_limiti!=""){
  $adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
  $adminsor->execute(array(
    'admin_mail'=>($_SESSION["admistis_mail"])
  ));
  $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
  $admin_id= $admincek['admin_id'];
  $yenile = $db->prepare("UPDATE admin SET     
    avtomobil_modeli_listeleme_limiti=:avtomobil_modeli_listeleme_limiti   
    WHERE admin_id=$admin_id");
  $update = $yenile->execute(array(
    'avtomobil_modeli_listeleme_limiti' => $avtomobil_modeli_listeleme_limiti
  ));
}
}
elseif(isset($_POST["DurumID"])){
  $avtomobil_model_id     =   ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);  
  if($avtomobil_model_id!=""){
    $Sor=$db->prepare("SELECT * FROM avtomobil_modeli where avtomobil_model_id=:avtomobil_model_id");
    $Sor->execute(array(
      'avtomobil_model_id'=>$avtomobil_model_id));
    $AvtomobilTechizatiSay=$Sor->rowCount();
    if ($AvtomobilTechizatiSay==1) {
      $Cek = $Sor->fetch(PDO::FETCH_ASSOC);
      if ($Cek['avtomobil_model_durum'] == 1) {
        $status = 0;
      } elseif ($Cek['avtomobil_model_durum'] == 0) {
        $status = 1;
      }
      $yenile = $db->prepare("UPDATE avtomobil_modeli SET     
        avtomobil_model_durum=:avtomobil_model_durum   
        WHERE avtomobil_model_id=$avtomobil_model_id");
      $update = $yenile->execute(array(
        'avtomobil_model_durum' => $status
      ));
    }
  }
}
elseif(isset($_POST["SilID"])){
  $avtomobil_model_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if($avtomobil_model_id!=""){
    $sil = $db->prepare("DELETE from avtomobil_modeli where avtomobil_model_id=:avtomobil_model_id");
    $kontrol = $sil->execute(array(
      'avtomobil_model_id' => $avtomobil_model_id
    ));
  }else{
    header("Location:../../404.php");
    exit;
  }
}else{
 header("Location:../AvtomobilModeli");
 exit;
}
}else{
  header("Location:../login");
  exit;
}

?>