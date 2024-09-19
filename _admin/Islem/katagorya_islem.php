<?php 
require_once "../Ayarlar/ayarlar.php";
if(empty($_SESSION["admistis_mail"])){
 header("Location:../../404.php");
 exit;
}
if(isset($_POST["Yeni"])){
  $karoqoriya_ad       =  HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["karoqoriya_ad"]));
  $bolme_id            =  ReqemlerXaricButunKarakterleriSil($_POST["bolme_id"]);
  $karoqoriya_seo_url  =  SEO_URL($karoqoriya_ad);
  $karoqoriya_id_kodla =  seo($karoqoriya_ad.md5(password_hash(seo(md5($bolme_id.$karoqoriya_ad.uniqid(time()))), PASSWORD_DEFAULT)));
  $karoqoriyaSor=$db->prepare("SELECT * FROM karoqoriya where karoqoriya_ad=:karoqoriya_ad and bolme_id=:bolme_id");
  $karoqoriyaSor->execute(array(
    'karoqoriya_ad'=>$karoqoriya_ad,
    'bolme_id'=>$bolme_id));
  $karoqoriyaSay=$karoqoriyaSor->rowCount();
  if($karoqoriyaSay!=0){
   header("Location:../../404?karoqoriya=karoqoriyavar");
   exit;
 }
 if(($karoqoriya_ad!="") and ($bolme_id!="") ){
  $ElaveET=$db->prepare("INSERT INTO karoqoriya SET
    bolme_id           =   :bolme_id,
    karoqoriya_ad      =   :karoqoriya_ad,
    karoqoriya_id_kodla=:karoqoriya_id_kodla,
    karoqoriya_seo_url=:karoqoriya_seo_url
    ");
  $insert=$ElaveET->execute(array(
    'bolme_id'          => $bolme_id,
    'karoqoriya_ad'     => $karoqoriya_ad,
    'karoqoriya_id_kodla' => $karoqoriya_id_kodla,
    'karoqoriya_seo_url' => $karoqoriya_seo_url
  ));
  if ($insert) {
    header("Location:../KatagoriyaIslemSonuc?durum=ok&karoqoriya_id_kodla=$karoqoriya_id_kodla&karoqoriya_seo_url=$karoqoriya_seo_url");
    exit;
  }else{
   header("Location:../../404.php");
   exit;
 }

}else{
  header("Location:../../404?bos=bos");
  exit;
}
}










if (isset($_POST["Yenile"])) {
  $karoqoriya_ad              =  HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["karoqoriya_ad"]));
  $karoqoriya_id              =  ReqemlerXaricButunKarakterleriSil($_POST["karoqoriya_id"]);
  $karoqoriya_id              =  ReqemlerXaricButunKarakterleriSil($_POST["karoqoriya_id"]);
  $karoqoriya_id_kodla=seo($karoqoriya_ad.md5(password_hash(seo(md5($karoqoriya_id.$karoqoriya_ad.uniqid(time()))), PASSWORD_DEFAULT)));
    $karoqoriya_seo_url  =  SEO_URL($karoqoriya_ad);
  if (($karoqoriya_ad != "")and ($karoqoriya_id != "")) {
    $yenile = $db->prepare("UPDATE karoqoriya SET     
      karoqoriya_id=:karoqoriya_id,
      karoqoriya_ad=:karoqoriya_ad, 
      karoqoriya_id_kodla=:karoqoriya_id_kodla,
      karoqoriya_seo_url=:karoqoriya_seo_url,
      karoqoriya_durum=:karoqoriya_durum   
      WHERE karoqoriya_id=$karoqoriya_id");
    $update = $yenile->execute(array(
      'karoqoriya_id' => $karoqoriya_id,
      'karoqoriya_ad' => $karoqoriya_ad,
      'karoqoriya_id_kodla' => $karoqoriya_id_kodla,
      'karoqoriya_seo_url' => $karoqoriya_seo_url,
      'karoqoriya_durum' => 0
    ));
    if ($update) {
      header("Location:../KatagoriyaIslemSonuc?durum=yenileok&karoqoriya_id_kodla=$karoqoriya_id_kodla&karoqoriya_seo_url=$karoqoriya_seo_url");
      exit;
    } else {
      header("Location:../../404.php");
      exit;
    }
  } else {
    header("Location:../../404.php");
    exit;
  }
}




if(isset($_POST["KatagoryaDurumId"])){
  $karoqoriya_id     =   ReqemlerXaricButunKarakterleriSil($_POST["KatagoryaDurumId"]);  
  if($karoqoriya_id!=""){

    $karoqoriya=$db->prepare("SELECT * FROM karoqoriya where karoqoriya_id=:karoqoriya_id");
    $karoqoriya->execute(array(
      'karoqoriya_id'=>$karoqoriya_id));
    $karoqoriyasayi=$karoqoriya->rowCount();
    if ($karoqoriyasayi==1) {
      $karoqoriyacek = $karoqoriya->fetch(PDO::FETCH_ASSOC);
      if ($karoqoriyacek['karoqoriya_durum'] == 1) {
        $status = 0;
      } elseif ($karoqoriyacek['karoqoriya_durum'] == 0) {
        $status = 1;
      }

      $yenile = $db->prepare("UPDATE karoqoriya SET     
        karoqoriya_durum=:karoqoriya_durum   
        WHERE karoqoriya_id=$karoqoriya_id");
      $update = $yenile->execute(array(
        'karoqoriya_durum' => $status
      ));

    }

  }
}










if(isset($_POST["karoqoriyaSIlTesdiqId"])){
  $karoqoriya_id     =   ReqemlerXaricButunKarakterleriSil($_POST["karoqoriyaSIlTesdiqId"]);  
  if($karoqoriya_id!=""){
    $sil = $db->prepare("DELETE from karoqoriya where karoqoriya_id=:karoqoriya_id");
    $kontrol = $sil->execute(array(
      'karoqoriya_id' => $karoqoriya_id
    ));
  }
} 




if(isset($_POST["katagorya_listeleme_limiti"])){
 $katagorya_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["katagorya_listeleme_limiti"]); 
 if($katagorya_listeleme_limiti!=""){
  $adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
  $adminsor->execute(array(
    'admin_mail'=>($_SESSION["admistis_mail"])
  ));
  $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
  $admin_id= $admincek['admin_id'];

  $yenile = $db->prepare("UPDATE admin SET     
    katagorya_listeleme_limiti=:katagorya_listeleme_limiti   
    WHERE admin_id=$admin_id");
  $update = $yenile->execute(array(
    'katagorya_listeleme_limiti' => $katagorya_listeleme_limiti
  ));
}
} 





?>