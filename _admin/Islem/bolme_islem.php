<?php 
require_once "../Ayarlar/ayarlar.php";
if(empty($_SESSION["admistis_mail"])){
 header("Location:../../404.php");
 exit;
}
if(isset($_POST["Yeni"])){
  $bolme_ad              =  HerSozunIlkHerfiniBoyukEt(EditorluIcerikleriFiltrle($_POST["bolme_ad"]));  
  $bolme_seo_url=seo(md5($bolme_ad.md5(password_hash(seo(md5($bolme_ad.uniqid(time()))), PASSWORD_DEFAULT))));

  if(($bolme_ad!="")){
    $elaveet=$db->prepare("INSERT INTO bolme SET
      bolme_ad               =   :bolme_ad,
      bolme_seo_url          =   :bolme_seo_url
      ");
    $insert=$elaveet->execute(array(
      'bolme_ad'             => $bolme_ad,
      'bolme_seo_url'        => $bolme_seo_url
    ));
    if ($insert) {    
      $bolme_id = $db->lastInsertId();
      $bolme_id_kod=seo($bolme_ad.md5(password_hash(seo(md5($bolme_id.$bolme_ad.uniqid(time()))), PASSWORD_DEFAULT)));
      $yenile = $db->prepare("UPDATE bolme SET     
        bolme_id_kod=:bolme_id_kod  
        WHERE bolme_id=$bolme_id");
      $update = $yenile->execute(array(     
        'bolme_id_kod' => $bolme_id_kod
      ));
      if ($update) {
        header("Location:../BolmeIslemleriSonuc?durum=ok&bolme_id_kod=$bolme_id_kod");
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
  $bolme_ad              =   HerSozunIlkHerfiniBoyukEt($_POST["bolme_ad"]); 
  $bolme_id              =   ReqemlerXaricButunKarakterleriSil($_POST["bolme_id"]);
  $bolme_id_kod=seo($bolme_ad.md5(password_hash(seo(md5($bolme_id.$bolme_ad.uniqid(time()))), PASSWORD_DEFAULT)));
  $bolme_seo_url=seo(md5($bolme_ad.md5(password_hash(seo(md5($bolme_ad.uniqid(time()))), PASSWORD_DEFAULT))));


  if (($bolme_ad != "")and ($bolme_id != "")) {
    $yenile = $db->prepare("UPDATE bolme SET     
      bolme_ad=:bolme_ad,
      bolme_id_kod=:bolme_id_kod, 
      bolme_seo_url=:bolme_seo_url,
      bolme_durum=:bolme_durum   
      WHERE bolme_id=$bolme_id");
    $update = $yenile->execute(array(
      'bolme_ad' => $bolme_ad,
      'bolme_id_kod' => $bolme_id_kod,
      'bolme_seo_url' => $bolme_seo_url,
      'bolme_durum' => 0
    ));

    if ($update) {
      header("Location:../BolmeIslemleriSonuc?durum=yenileok&bolme_id_kod=$bolme_id_kod");
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




if(isset($_POST["BolmeDurumId"])){
  $bolme_id     =   ReqemlerXaricButunKarakterleriSil($_POST["BolmeDurumId"]);  
  if($bolme_id!=""){

    $bolme=$db->prepare("SELECT * FROM bolme where bolme_id=:bolme_id");
    $bolme->execute(array(
      'bolme_id'=>$bolme_id));
    $bolmesayi=$bolme->rowCount();
    if ($bolmesayi==1) {
      $bolmecek = $bolme->fetch(PDO::FETCH_ASSOC);
      if ($bolmecek['bolme_durum'] == 1) {
        $status = 0;
      } elseif ($bolmecek['bolme_durum'] == 0) {
        $status = 1;
      }

      $yenile = $db->prepare("UPDATE bolme SET     
        bolme_durum=:bolme_durum   
        WHERE bolme_id=$bolme_id");
      $update = $yenile->execute(array(
        'bolme_durum' => $status
      ));

    }

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