<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
 if(isset($_POST["YeniSeher"])){
  $seher_ad                 =  HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["seher_ad"]));
  $seher_beynelxalq_adi     =  HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["seher_beynelxalq_adi"]));
  $Dovlet_Id                =  ReqemlerXaricButunKarakterleriSil($_POST["dovlet_id_sec"]);
  $DovletSor=$db->prepare("SELECT * FROM dovlet where Durum=:Durum and Dovlet_Id=:Dovlet_Id ");
  $DovletSor->execute(array(
    'Durum'=>1,
    'Dovlet_Id'=>$Dovlet_Id));
  $DovletSay=$DovletSor->rowCount();

  if($DovletSay==1){
    $Dovletcek = $DovletSor->fetch(PDO::FETCH_ASSOC);
  }else{
    $dovletxeta=md5("dovletxeta");
    $link="../".seo("dovletxeta-".$dovletxeta);
    header("Location:".$link);
    exit;     
  }
  $SehervarSor=$db->prepare("SELECT * FROM seher where Dovlet_Id=:Dovlet_Id and seher_ad=:seher_ad ");
  $SehervarSor->execute(array(
    'Dovlet_Id'=>$Dovlet_Id,
    'seher_ad'=>$seher_ad));
  $SeherSay=$SehervarSor->rowCount();

  if($SeherSay>0){
   $Seher_var_cek = $SehervarSor->fetch(PDO::FETCH_ASSOC);
   $seher_id_kodla=$Seher_var_cek["seher_id_kodla"];
   $var=md5("var");
   $link="../".seo("sehervar-".$var."-".$seher_id_kodla."-".$Seher_var_cek["SEO_URL"]);
   header("Location:".$link);
   exit;  
 }
 $dovlet_SEO_URL=$Dovletcek['SEO_URL'];
 $SEO_URL=SEO_URL(md5(password_hash(seo(md5($dovlet_SEO_URL.$seher_ad.uniqid(time()))), PASSWORD_DEFAULT)));  
 if(($seher_ad!="") and ($seher_beynelxalq_adi!="") and ($Dovlet_Id!="") ){
  $ElaveET=$db->prepare("INSERT INTO seher SET
    Dovlet_Id                =   :Dovlet_Id,
    dovlet_SEO_URL                  =   :dovlet_SEO_URL,
    seher_ad                 =   :seher_ad,
    SEO_URL                 =   :SEO_URL,
    seher_beynelxalq_adi     =   :seher_beynelxalq_adi
    ");
  $insert=$ElaveET->execute(array(
    'Dovlet_Id'              => $Dovlet_Id,
    'dovlet_SEO_URL'        => $dovlet_SEO_URL,
    'seher_ad'               => $seher_ad,
    'SEO_URL'               => $SEO_URL,
    'seher_beynelxalq_adi'   => $seher_beynelxalq_adi
  ));
    if ($insert) {
     $durum=md5("ok");
     $link="../yeniseher-".$durum."-".$SEO_URL."-".$dovlet_SEO_URL;
     header("Location:".$link);
     exit; 
   }else{
     header("Location:../../404.php");
     exit;
   }
}else{
  header("Location:../../404?bos=bos");
  exit;
}
}  elseif (isset($_POST["yenile"])) {
  $seher_id                          =   ReqemlerXaricButunKarakterleriSil($_POST["seher_id"]);
  $Dovlet_Id                         =   ReqemlerXaricButunKarakterleriSil($_POST["dovlet_id_sec"]);
  $seher_ad                          =   HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["seher_ad"]));
  $seher_beynelxalq_adi              =   HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["seher_beynelxalq_adi"])); 
  $DovletSor=$db->prepare("SELECT * FROM dovlet where Durum=:Durum and Dovlet_Id=:Dovlet_Id ");
  $DovletSor->execute(array(
    'Durum'=>1,
    'Dovlet_Id'=>$Dovlet_Id));
  $DovletSay=$DovletSor->rowCount();
  if($DovletSay==1){
    $Dovletcek = $DovletSor->fetch(PDO::FETCH_ASSOC);
    $SEO_URL=$Dovletcek['SEO_URL'];
  }else{
    $dovletxeta=md5("dovletxeta");
    $link="../".seo("dovletxeta-".$dovletxeta);
    header("Location:".$link);
    exit;     
  }
  if (($seher_id != "") and ($dovlet_id != "") and ($seher_ad != "") and ($seher_beynelxalq_adi != "")) {
    $yenile = $db->prepare("UPDATE seher SET     
      Dovlet_Id                =:Dovlet_Id,
      seher_durum              =:seher_durum,
      seher_ad                 =:seher_ad, 
      seher_beynelxalq_adi     =:seher_beynelxalq_adi
      WHERE seher_id=$seher_id");
    $update = $yenile->execute(array(
      'Dovlet_Id'            => $Dovlet_Id,
      'seher_durum'          => 0,
      'seher_ad'             => $seher_ad,
      'seher_beynelxalq_adi' => $seher_beynelxalq_adi
    ));
    if ($update) {
      $durum=md5("yenileok");
      $link="../".seo("seheryenilendi-".$durum."-".$seher_id_kodla."-".$SEO_URL);
      header("Location:".$link);
      exit;      
    } else {
      header("Location:../../404.php");
      exit;
    }
  } else {
    header("Location:../../404.php?durum=seherbosalan");
    exit;
  }
}
elseif(isset($_POST["seher_durum_id"])){
  $seher_durum_id     =   ReqemlerXaricButunKarakterleriSil($_POST["seher_durum_id"]);  
  if($seher_durum_id!=""){
    $seher=$db->prepare("SELECT * FROM seher where seher_id=:seher_id");
    $seher->execute(array(
      'seher_id'=>$seher_durum_id));
    $sehersayi=$seher->rowCount();
    if ($sehersayi==1) {
      $sehercek = $seher->fetch(PDO::FETCH_ASSOC);
      if ($sehercek['seher_durum'] == 1) {
        $status = 0;
      } elseif ($sehercek['seher_durum'] == 0) {
        $status = 1;
      }
      $yenile = $db->prepare("UPDATE seher SET     
        seher_durum=:seher_durum   
        WHERE seher_id=$seher_durum_id");
      $update = $yenile->execute(array(
        'seher_durum' => $status
      ));
    }
  }
} elseif(isset($_POST["seher_siralama"])){
 $seher_siralama     =   ReqemlerXaricButunKarakterleriSil($_POST["seher_siralama"]); 
 if($seher_siralama!=""){
  $adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
  $adminsor->execute(array(
    'admin_mail'=>($_SESSION["admistis_mail"])
  ));
  $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
  $admin_id= $admincek['admin_id'];

  $yenile = $db->prepare("UPDATE admin SET     
    seher_listeleme_limiti=:seher_listeleme_limiti   
    WHERE admin_id=$admin_id");
  $update = $yenile->execute(array(
    'seher_listeleme_limiti' => $seher_siralama
  ));
}
}else{
  header("Location:../../404.php");
  exit;
}

}else{
  header("Location:../login");
  exit;
}

?>