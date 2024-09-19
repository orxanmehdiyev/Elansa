<?php 
require_once "../Ayarlar/ayarlar.php";
require_once("../Frameworkler/Verot/src/class.upload.php");
if(empty($_SESSION["admistis_mail"])){
 header("Location:../../404.php");
 exit;
}
if(isset($_POST["Yeni"])){
  $avtomobil_markasi_ad              =  HerSozunIlkHerfiniBoyukEt(EditorluIcerikleriFiltrle($_POST["avtomobil_markasi_ad"]));  
  $avtomobil_markasi_seo_url=seo($avtomobil_markasi_ad.md5(password_hash(seo(md5($avtomobil_markasi_ad.uniqid(time()))), PASSWORD_DEFAULT)));



    $image = new Upload($_FILES['image']);
    if ($image->uploaded) {

        // upload klasörüne değişiklik yapmadan kayıt et
      $image->Process('../img/AvtoIcon');

      if ($image->Process){
        print 'resim yükleme işlemi başarılı!';
      } else {
        print 'Bir sorun oluştu: '.$image->error;
      }

    }


  exit;

  if(($avtomobil_markasi_ad!="")){
    $elaveet=$db->prepare("INSERT INTO avtomobil_markasi SET
      avtomobil_markasi_ad               =   :avtomobil_markasi_ad,
      avtomobil_markasi_seo_url          =   :avtomobil_markasi_seo_url
      ");
    $insert=$elaveet->execute(array(
      'avtomobil_markasi_ad'             => $avtomobil_markasi_ad,
      'avtomobil_markasi_seo_url'        => $avtomobil_markasi_seo_url
    ));
    if ($insert) {    
      $avtomobil_markasi_id = $db->lastInsertId();
      $avtomobil_markasi_id_kod=seo($avtomobil_markasi_ad.md5(password_hash(seo(md5($avtomobil_markasi_id.$avtomobil_markasi_ad.uniqid(time()))), PASSWORD_DEFAULT)));
      $yenile = $db->prepare("UPDATE avtomobil_markasi SET     
        avtomobil_markasi_id_kod=:avtomobil_markasi_id_kod  
        WHERE avtomobil_markasi_id=$avtomobil_markasi_id");
      $update = $yenile->execute(array(     
        'avtomobil_markasi_id_kod' => $avtomobil_markasi_id_kod
      ));
      if ($update) {
        header("Location:../AvtomobilMarkasiIslemleriSonuc?durum=ok&avtomobil_markasi_id_kod=$avtomobil_markasi_id_kod&avtomobil_markasi_seo_url=$avtomobil_markasi_seo_url");
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

if (isset($_POST["Yenile"])) {
  $avtomobil_markasi_ad              =   HerSozunIlkHerfiniBoyukEt($_POST["avtomobil_markasi_ad"]); 
  $avtomobil_markasi_id              =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_markasi_id"]);
  $avtomobil_markasi_id_kod=seo($avtomobil_markasi_ad.md5(password_hash(seo(md5($avtomobil_markasi_id.$avtomobil_markasi_ad.uniqid(time()))), PASSWORD_DEFAULT)));
  $avtomobil_markasi_seo_url=seo($avtomobil_markasi_ad.md5(password_hash(seo(md5($avtomobil_markasi_ad.uniqid(time()))), PASSWORD_DEFAULT)));


  if (($avtomobil_markasi_ad != "")and ($avtomobil_markasi_id != "")) {
    $yenile = $db->prepare("UPDATE avtomobil_markasi SET     
      avtomobil_markasi_ad=:avtomobil_markasi_ad,
      avtomobil_markasi_id_kod=:avtomobil_markasi_id_kod, 
      avtomobil_markasi_seo_url=:avtomobil_markasi_seo_url,
      avtomobil_markasi_durum=:avtomobil_markasi_durum   
      WHERE avtomobil_markasi_id=$avtomobil_markasi_id");
    $update = $yenile->execute(array(
      'avtomobil_markasi_ad' => $avtomobil_markasi_ad,
      'avtomobil_markasi_id_kod' => $avtomobil_markasi_id_kod,
      'avtomobil_markasi_seo_url' => $avtomobil_markasi_seo_url,
      'avtomobil_markasi_durum' => 0
    ));

    if ($update) {
      header("Location:../avtomobil_markasiIslemleriSonuc?durum=yenileok&avtomobil_markasi_id_kod=$avtomobil_markasi_id_kod");
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




if(isset($_POST["avtomobil_markasi_durum"])){
  $avtomobil_markasi_id     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_markasi_durum"]);  
  if($avtomobil_markasi_id!=""){

    $avtomobil_markasi=$db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_id=:avtomobil_markasi_id");
    $avtomobil_markasi->execute(array(
      'avtomobil_markasi_id'=>$avtomobil_markasi_id));
    $avtomobil_markasisayi=$avtomobil_markasi->rowCount();
    if ($avtomobil_markasisayi==1) {
      $avtomobil_markasicek = $avtomobil_markasi->fetch(PDO::FETCH_ASSOC);
      if ($avtomobil_markasicek['avtomobil_markasi_durum'] == 1) {
        $status = 0;
      } elseif ($avtomobil_markasicek['avtomobil_markasi_durum'] == 0) {
        $status = 1;
      }

      $yenile = $db->prepare("UPDATE avtomobil_markasi SET     
        avtomobil_markasi_durum=:avtomobil_markasi_durum   
        WHERE avtomobil_markasi_id=$avtomobil_markasi_id");
      $update = $yenile->execute(array(
        'avtomobil_markasi_durum' => $status
      ));

    }

  }
}










if(isset($_POST["avtomobil_markasiSIlTesdiqId"])){
  $avtomobil_markasi_id     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_markasiSIlTesdiqId"]);  
  if($avtomobil_markasi_id!=""){
    $sil = $db->prepare("DELETE from avtomobil_markasi where avtomobil_markasi_id=:avtomobil_markasi_id");
    $kontrol = $sil->execute(array(
      'avtomobil_markasi_id' => $avtomobil_markasi_id
    ));
  }
} 




if(isset($_POST["avtomobil_markasi_listeleme_limiti"])){
 $avtomobil_markasi_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_markasi_listeleme_limiti"]); 
 if($avtomobil_markasi_listeleme_limiti!=""){
  $adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
  $adminsor->execute(array(
    'admin_mail'=>($_SESSION["admistis_mail"])
  ));
  $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
  $admin_id= $admincek['admin_id'];

  $yenile = $db->prepare("UPDATE admin SET     
    avtomobil_markasi_listeleme_limiti=:avtomobil_markasi_listeleme_limiti   
    WHERE admin_id=$admin_id");
  $update = $yenile->execute(array(
    'avtomobil_markasi_listeleme_limiti' => $avtomobil_markasi_listeleme_limiti
  ));
}
} 





?>