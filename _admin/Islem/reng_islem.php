<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $reng_durum=0;
 if(isset($_POST["Yeni"])){
   $reng_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["reng_ad"])); 
   $reng_id_kod=SEO_URL(password_hash($reng_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $RengSor=$db->prepare("SELECT * FROM  reng where  reng_ad=:reng_ad");
   $RengSor->execute(array(
    'reng_ad'=>$reng_ad));
   $RengSay= $RengSor->rowCount();
   if ($RengSay>0) {
    $RengCek= $RengSor->fetch(PDO::FETCH_ASSOC);
    $reng_id_kod= $RengCek['reng_id_kod'];
    $reng_id= $RengCek['reng_id'];
    header("Location:../RengSonuc?durum=var&id=$reng_id&reng_id_kod=$reng_id_kod");
    exit;
  }
  if($reng_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  reng SET
      reng_ad          =   :reng_ad,
      reng_id_kod     =   :reng_id_kod,
      reng_durum       =   :reng_durum
      ");
    $insert=$ElaveET->execute(array(
      'reng_ad'        => $reng_ad,
      'reng_id_kod'      => $reng_id_kod,
      'reng_durum'     => $reng_durum
    ));

    if ($insert) {  
      $reng_id = $db->lastInsertId();
      header("Location:../RengSonuc?durum=ok&id=$reng_id&reng_id_kod=$reng_id_kod");
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
  $reng_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["reng_ad"]));
  $reng_id    =  ReqemlerXaricButunKarakterleriSil($_POST["reng_id"]);
  $RengSor=$db->prepare('SELECT * FROM reng where reng_ad=:reng_ad and reng_id<>:reng_id');
  $RengSor->execute(array(
    'reng_ad'=>$reng_ad,
    'reng_id'=>$reng_id));
  $RengSay=$RengSor->rowCount();
  if ($RengSay>0) {
    $RengCek=$RengSor->fetch(PDO::FETCH_ASSOC);
    $reng_id_kod= $RengCek['reng_id_kod'];
    $reng_id= $RengCek['reng_id'];
    header("Location:../RengSonuc?durum=var&id=$reng_id&reng_id_kod=$reng_id_kod");
    exit;
  }else{
    if (($reng_ad!="")and ($reng_id!="")) {
      $yenile = $db->prepare("UPDATE reng SET 
        reng_ad          =   :reng_ad,
      reng_durum       =   :reng_durum
        WHERE reng_id=$reng_id");
      $update = $yenile->execute(array(       
        'reng_ad'        => $reng_ad,    
      'reng_durum'     => $reng_durum
      ));   
      if ($update) {
        $RengSor=$db->prepare("SELECT * FROM reng WHERE reng_id=:reng_id");
        $RengSor->execute(array(
          'reng_id'=>$reng_id));
        $RengCek=$RengSor->fetch(PDO::FETCH_ASSOC);
        $reng_id_kod= $RengCek['reng_id_kod'];
        $reng_id= $RengCek['reng_id'];
        header("Location:../RengSonuc?durum=yenile&id=$reng_id&reng_id_kod=$reng_id_kod");
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
}elseif (isset($_POST["reng_listeleme_limiti"])) {
  $reng_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["reng_listeleme_limiti"]); 
  if ($reng_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      reng_listeleme_limiti=:reng_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'reng_listeleme_limiti'=>$reng_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $reng_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $RengSor=$db->prepare("SELECT * FROM reng WHERE reng_id=:reng_id");
  $RengSor->execute(array(
    'reng_id'=>$reng_id));
  $RengCek=$RengSor->fetch(PDO::FETCH_ASSOC);
  $reng_durum=$RengCek['reng_durum'];
  if ($reng_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE reng SET
    reng_durum=:reng_durum
    where reng_id=$reng_id");
  $update=$yenile->execute(array(
    'reng_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $reng_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($reng_id!="") {
    $sil=$db->prepare("DELETE FROM reng where reng_id=:reng_id");
    $kontrol=$sil->execute(array(
      'reng_id'=>$reng_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['rengsiralama']=$siralama;
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