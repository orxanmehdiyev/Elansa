<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $yanacaq_durum=0;
 if(isset($_POST["Yeni"])){
   $yanacaq_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["yanacaq_ad"])); 
   $yanacaq_SEO_URL=SEO_URL(password_hash($yanacaq_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $YanacaqSor=$db->prepare("SELECT * FROM  yanacaq where  yanacaq_ad=:yanacaq_ad");
   $YanacaqSor->execute(array(
    'yanacaq_ad'=>$yanacaq_ad));
   $YanacaqSay= $YanacaqSor->rowCount();
   if ($YanacaqSay>0) {
    $YanacaqCek= $YanacaqSor->fetch(PDO::FETCH_ASSOC);
    $yanacaq_SEO_URL= $YanacaqCek['yanacaq_SEO_URL'];
    $yanacaq_id= $YanacaqCek['yanacaq_id'];
    header("Location:../YanacaqSonuc?durum=var&id=$yanacaq_id&yanacaq_SEO_URL=$yanacaq_SEO_URL");
    exit;
  }
  if($yanacaq_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  yanacaq SET
      yanacaq_ad          =   :yanacaq_ad,
      yanacaq_SEO_URL     =   :yanacaq_SEO_URL,
      yanacaq_durum       =   :yanacaq_durum
      ");
    $insert=$ElaveET->execute(array(
      'yanacaq_ad'        => $yanacaq_ad,
      'yanacaq_SEO_URL'      => $yanacaq_SEO_URL,
      'yanacaq_durum'     => $yanacaq_durum
    ));

    if ($insert) {  
      $yanacaq_id = $db->lastInsertId();
      header("Location:../YanacaqSonuc?durum=ok&id=$yanacaq_id&yanacaq_SEO_URL=$yanacaq_SEO_URL");
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
  $yanacaq_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["yanacaq_ad"]));
  $yanacaq_id    =  ReqemlerXaricButunKarakterleriSil($_POST["yanacaq_id"]);
  $YanacaqSor=$db->prepare('SELECT * FROM yanacaq where yanacaq_ad=:yanacaq_ad and yanacaq_id<>:yanacaq_id');
  $YanacaqSor->execute(array(
    'yanacaq_ad'=>$yanacaq_ad,
    'yanacaq_id'=>$yanacaq_id));
  $YanacaqSay=$YanacaqSor->rowCount();
  if ($YanacaqSay>0) {
    $YanacaqCek=$YanacaqSor->fetch(PDO::FETCH_ASSOC);
    $yanacaq_SEO_URL= $YanacaqCek['yanacaq_SEO_URL'];
    $yanacaq_id= $YanacaqCek['yanacaq_id'];
    header("Location:../YanacaqSonuc?durum=var&id=$yanacaq_id&yanacaq_SEO_URL=$yanacaq_SEO_URL");
    exit;
  }else{
    if (($yanacaq_ad!="")and ($yanacaq_id!="")) {
      $yenile = $db->prepare("UPDATE yanacaq SET 
        yanacaq_ad          =   :yanacaq_ad,
      yanacaq_durum       =   :yanacaq_durum
        WHERE yanacaq_id=$yanacaq_id");
      $update = $yenile->execute(array(       
        'yanacaq_ad'        => $yanacaq_ad,    
      'yanacaq_durum'     => $yanacaq_durum
      ));   
      if ($update) {
        $YanacaqSor=$db->prepare("SELECT * FROM yanacaq WHERE yanacaq_id=:yanacaq_id");
        $YanacaqSor->execute(array(
          'yanacaq_id'=>$yanacaq_id));
        $YanacaqCek=$YanacaqSor->fetch(PDO::FETCH_ASSOC);
        $yanacaq_SEO_URL= $YanacaqCek['yanacaq_SEO_URL'];
        $yanacaq_id= $YanacaqCek['yanacaq_id'];
        header("Location:../YanacaqSonuc?durum=yenile&id=$yanacaq_id&yanacaq_SEO_URL=$yanacaq_SEO_URL");
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
}elseif (isset($_POST["yanacaq_listeleme_limiti"])) {
  $yanacaq_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["yanacaq_listeleme_limiti"]); 
  if ($yanacaq_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      yanacaq_listeleme_limiti=:yanacaq_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'yanacaq_listeleme_limiti'=>$yanacaq_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $yanacaq_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $YanacaqSor=$db->prepare("SELECT * FROM yanacaq WHERE yanacaq_id=:yanacaq_id");
  $YanacaqSor->execute(array(
    'yanacaq_id'=>$yanacaq_id));
  $YanacaqCek=$YanacaqSor->fetch(PDO::FETCH_ASSOC);
  $yanacaq_durum=$YanacaqCek['yanacaq_durum'];
  if ($yanacaq_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE yanacaq SET
    yanacaq_durum=:yanacaq_durum
    where yanacaq_id=$yanacaq_id");
  $update=$yenile->execute(array(
    'yanacaq_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $yanacaq_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($yanacaq_id!="") {
    $sil=$db->prepare("DELETE FROM yanacaq where yanacaq_id=:yanacaq_id");
    $kontrol=$sil->execute(array(
      'yanacaq_id'=>$yanacaq_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['yanacaqnovusiralama']=$siralama;
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
 header("Location:../AvtomobilModeli");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>