<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $yerlesdiyiblok_durum=0;
 if(isset($_POST["Yeni"])){
   $yerlesdiyiblok_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["yerlesdiyiblok_ad"])); 
   $blok_SEO_URL=SEO_URL(password_hash($yerlesdiyiblok_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $BlokSor=$db->prepare("SELECT * FROM  yerlesdiyiblok where  yerlesdiyiblok_ad=:yerlesdiyiblok_ad");
   $BlokSor->execute(array(
    'yerlesdiyiblok_ad'=>$yerlesdiyiblok_ad));
   $BlokSay= $BlokSor->rowCount();
   if ($BlokSay>0) {
    $BlokCek= $BlokSor->fetch(PDO::FETCH_ASSOC);
    $blok_SEO_URL= $BlokCek['blok_SEO_URL'];
    $yerlesdiyiblok_id= $BlokCek['yerlesdiyiblok_id'];
    header("Location:../BlokSonuc?durum=var&id=$yerlesdiyiblok_id&blok_SEO_URL=$blok_SEO_URL");
    exit;
  }
  if($yerlesdiyiblok_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  yerlesdiyiblok SET
      yerlesdiyiblok_ad          =   :yerlesdiyiblok_ad,
      blok_SEO_URL     =   :blok_SEO_URL,
      yerlesdiyiblok_durum       =   :yerlesdiyiblok_durum
      ");
    $insert=$ElaveET->execute(array(
      'yerlesdiyiblok_ad'        => $yerlesdiyiblok_ad,
      'blok_SEO_URL'      => $blok_SEO_URL,
      'yerlesdiyiblok_durum'     => $yerlesdiyiblok_durum
    ));

    if ($insert) {  
      $yerlesdiyiblok_id = $db->lastInsertId();
      header("Location:../BlokSonuc?durum=ok&id=$yerlesdiyiblok_id&blok_SEO_URL=$blok_SEO_URL");
      exit;
    }else{
      header("Location:../../404.php");
      exit;
    }
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["Yenile"])){
  $yerlesdiyiblok_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["yerlesdiyiblok_ad"]));
  $yerlesdiyiblok_id    =  ReqemlerXaricButunKarakterleriSil($_POST["yerlesdiyiblok_id"]);
  $BlokSor=$db->prepare('SELECT * FROM yerlesdiyiblok where yerlesdiyiblok_ad=:yerlesdiyiblok_ad and yerlesdiyiblok_id<>:yerlesdiyiblok_id');
  $BlokSor->execute(array(
    'yerlesdiyiblok_ad'=>$yerlesdiyiblok_ad,
    'yerlesdiyiblok_id'=>$yerlesdiyiblok_id));
  $BlokSay=$BlokSor->rowCount();
  if ($BlokSay>0) {
    $BlokCek=$BlokSor->fetch(PDO::FETCH_ASSOC);
    $blok_SEO_URL= $BlokCek['blok_SEO_URL'];
    $yerlesdiyiblok_id= $BlokCek['yerlesdiyiblok_id'];
    header("Location:../BlokSonuc?durum=var&id=$yerlesdiyiblok_id&blok_SEO_URL=$blok_SEO_URL");
    exit;
  }else{
    if (($yerlesdiyiblok_ad!="")and ($yerlesdiyiblok_id!="")) {
      $yenile = $db->prepare("UPDATE yerlesdiyiblok SET 
        yerlesdiyiblok_ad          =   :yerlesdiyiblok_ad,
      yerlesdiyiblok_durum       =   :yerlesdiyiblok_durum
        WHERE yerlesdiyiblok_id=$yerlesdiyiblok_id");
      $update = $yenile->execute(array(       
        'yerlesdiyiblok_ad'        => $yerlesdiyiblok_ad,    
      'yerlesdiyiblok_durum'     => $yerlesdiyiblok_durum
      ));   
      if ($update) {
        $BlokSor=$db->prepare("SELECT * FROM yerlesdiyiblok WHERE yerlesdiyiblok_id=:yerlesdiyiblok_id");
        $BlokSor->execute(array(
          'yerlesdiyiblok_id'=>$yerlesdiyiblok_id));
        $BlokCek=$BlokSor->fetch(PDO::FETCH_ASSOC);
        $blok_SEO_URL= $BlokCek['blok_SEO_URL'];
        $yerlesdiyiblok_id= $BlokCek['yerlesdiyiblok_id'];
        header("Location:../BlokSonuc?durum=yenile&id=$yerlesdiyiblok_id&blok_SEO_URL=$blok_SEO_URL");
        exit;
      }else{
        header("Location:../../404d.php");
        exit;
      }
    }else{
      header("Location:../../404.php");
      exit;
    }
  }
}elseif (isset($_POST["yerlesdiyiblok_listeleme_limiti"])) {
  $yerlesdiyiblok_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["yerlesdiyiblok_listeleme_limiti"]); 
  if ($yerlesdiyiblok_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      yerlesdiyiblok_listeleme_limiti=:yerlesdiyiblok_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'yerlesdiyiblok_listeleme_limiti'=>$yerlesdiyiblok_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $yerlesdiyiblok_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $BlokSor=$db->prepare("SELECT * FROM yerlesdiyiblok WHERE yerlesdiyiblok_id=:yerlesdiyiblok_id");
  $BlokSor->execute(array(
    'yerlesdiyiblok_id'=>$yerlesdiyiblok_id));
  $BlokCek=$BlokSor->fetch(PDO::FETCH_ASSOC);
  $yerlesdiyiblok_durum=$BlokCek['yerlesdiyiblok_durum'];
  if ($yerlesdiyiblok_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE yerlesdiyiblok SET
    yerlesdiyiblok_durum=:yerlesdiyiblok_durum
    where yerlesdiyiblok_id=$yerlesdiyiblok_id");
  $update=$yenile->execute(array(
    'yerlesdiyiblok_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $yerlesdiyiblok_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($yerlesdiyiblok_id!="") {
    $sil=$db->prepare("DELETE FROM yerlesdiyiblok where yerlesdiyiblok_id=:yerlesdiyiblok_id");
    $kontrol=$sil->execute(array(
      'yerlesdiyiblok_id'=>$yerlesdiyiblok_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['bloknovusiralama']=$siralama;
    ?>
    <script>            
      window.history.back();              
    </script>
    <?php 
  }else{
    header("Location:../../404.php");
    exit;
  }
}else{
 header("Location:../BlokNovu");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>