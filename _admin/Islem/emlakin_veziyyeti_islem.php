<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
 $menzil_elanlari_ucun_durum=0;
 $qaraj_elanlari_ucun_durum=0;
 $avtomobil_elanlari_ucun_durum=0;
 if(isset($_POST["Yeni"])){
   $emlakin_veziyyeti_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["emlakin_veziyyeti_ad"])); 
   $emlakin_veziyyeti_SEO_URL=SEO_URL(password_hash($emlakin_veziyyeti_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));  
   $EmlakVeziyyetiSor=$db->prepare("SELECT * FROM  emlakin_veziyyeti where  emlakin_veziyyeti_ad=:emlakin_veziyyeti_ad");
   $EmlakVeziyyetiSor->execute(array(
    'emlakin_veziyyeti_ad'=>$emlakin_veziyyeti_ad));
   $emlakin_veziyyeti_Say= $EmlakVeziyyetiSor->rowCount();
   if ($emlakin_veziyyeti_Say>0) {
    $emlakin_veziyyeti_Cek= $EmlakVeziyyetiSor->fetch(PDO::FETCH_ASSOC);
    $emlakin_veziyyeti_SEO_URL= $emlakin_veziyyeti_Cek['emlakin_veziyyeti_SEO_URL'];
    $emlakin_veziyyeti_id= $emlakin_veziyyeti_Cek['emlakin_veziyyeti_id'];
    header("Location:../EmlakVeziyyetiSonucSonuc?durum=var&id=$emlakin_veziyyeti_id&emlakin_veziyyeti_SEO_URL=$emlakin_veziyyeti_SEO_URL");
    exit;
  }
  if($emlakin_veziyyeti_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  emlakin_veziyyeti SET
      emlakin_veziyyeti_ad             =   :emlakin_veziyyeti_ad,
      emlakin_veziyyeti_SEO_URL        =   :emlakin_veziyyeti_SEO_URL,
      menzil_elanlari_ucun_durum       =   :menzil_elanlari_ucun_durum,
      qaraj_elanlari_ucun_durum        =   :qaraj_elanlari_ucun_durum,
      avtomobil_elanlari_ucun_durum    =   :avtomobil_elanlari_ucun_durum
      ");
    $insert=$ElaveET->execute(array(
      'emlakin_veziyyeti_ad'           => $emlakin_veziyyeti_ad,
      'emlakin_veziyyeti_SEO_URL'      => $emlakin_veziyyeti_SEO_URL,
      'menzil_elanlari_ucun_durum'     => $menzil_elanlari_ucun_durum,
      'qaraj_elanlari_ucun_durum'      => $qaraj_elanlari_ucun_durum,
      'avtomobil_elanlari_ucun_durum'  => $avtomobil_elanlari_ucun_durum
    ));
    if ($insert) {  
      $emlakin_veziyyeti_id = $db->lastInsertId();
      header("Location:../EmlakVeziyyetiSonucSonuc?durum=ok&id=$emlakin_veziyyeti_id&emlakin_veziyyeti_SEO_URL=$emlakin_veziyyeti_SEO_URL");
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
  $emlakin_veziyyeti_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["emlakin_veziyyeti_ad"]));
  $emlakin_veziyyeti_id    =  ReqemlerXaricButunKarakterleriSil($_POST["emlakin_veziyyeti_id"]);
  $EmlakVeziyyetiSor=$db->prepare('SELECT * FROM emlakin_veziyyeti where emlakin_veziyyeti_ad=:emlakin_veziyyeti_ad and emlakin_veziyyeti_id<>:emlakin_veziyyeti_id');
  $EmlakVeziyyetiSor->execute(array(
    'emlakin_veziyyeti_ad'=>$emlakin_veziyyeti_ad,
    'emlakin_veziyyeti_id'=>$emlakin_veziyyeti_id));
  $EmlakVeziyyetiSay=$EmlakVeziyyetiSor->rowCount();
  if ($EmlakVeziyyetiSay>0) {
    $EmlakVeziyyetiCek=$EmlakVeziyyetiSor->fetch(PDO::FETCH_ASSOC);
    $emlakin_veziyyeti_SEO_URL= $EmlakVeziyyetiCek['emlakin_veziyyeti_SEO_URL'];
    $emlakin_veziyyeti_id= $EmlakVeziyyetiCek['emlakin_veziyyeti_id'];
    header("Location:../EmlakVeziyyetiSonucSonuc?durum=var&id=$emlakin_veziyyeti_id&emlakin_veziyyeti_SEO_URL=$emlakin_veziyyeti_SEO_URL");
    exit;
  }else{
    if (($emlakin_veziyyeti_ad!="")and ($emlakin_veziyyeti_id!="")) {
      $yenile = $db->prepare("UPDATE emlakin_veziyyeti SET 
       emlakin_veziyyeti_ad             =   :emlakin_veziyyeti_ad,
       emlakin_veziyyeti_SEO_URL        =   :emlakin_veziyyeti_SEO_URL,
       menzil_elanlari_ucun_durum       =   :menzil_elanlari_ucun_durum,
       qaraj_elanlari_ucun_durum        =   :qaraj_elanlari_ucun_durum,
       avtomobil_elanlari_ucun_durum    =   :avtomobil_elanlari_ucun_durum
       WHERE emlakin_veziyyeti_id=$emlakin_veziyyeti_id");
      $update = $yenile->execute(array(       
        'emlakin_veziyyeti_ad'           => $emlakin_veziyyeti_ad,
        'emlakin_veziyyeti_SEO_URL'      => $emlakin_veziyyeti_SEO_URL,
        'menzil_elanlari_ucun_durum'     => $menzil_elanlari_ucun_durum,
        'qaraj_elanlari_ucun_durum'      => $qaraj_elanlari_ucun_durum,
        'avtomobil_elanlari_ucun_durum'  => $avtomobil_elanlari_ucun_durum
      ));   
      if ($update) {
        $EmlakVeziyyetiSor=$db->prepare("SELECT * FROM emlakin_veziyyeti WHERE emlakin_veziyyeti_id=:emlakin_veziyyeti_id");
        $EmlakVeziyyetiSor->execute(array(
          'emlakin_veziyyeti_id'=>$emlakin_veziyyeti_id));
        $EmlakVeziyyetiCek=$EmlakVeziyyetiSor->fetch(PDO::FETCH_ASSOC);
        $emlakin_veziyyeti_SEO_URL= $EmlakVeziyyetiCek['emlakin_veziyyeti_SEO_URL'];
        $emlakin_veziyyeti_id= $EmlakVeziyyetiCek['emlakin_veziyyeti_id'];
        header("Location:../EmlakVeziyyetiSonucSonuc?durum=yenile&id=$emlakin_veziyyeti_id&emlakin_veziyyeti_SEO_URL=$emlakin_veziyyeti_SEO_URL");
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
}elseif (isset($_POST["emlakin_veziyyeti_listeleme_limiti"])) {
  $emlakin_veziyyeti_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["emlakin_veziyyeti_listeleme_limiti"]); 
  if ($emlakin_veziyyeti_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      emlakin_veziyyeti_listeleme_limiti=:emlakin_veziyyeti_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'emlakin_veziyyeti_listeleme_limiti'=>$emlakin_veziyyeti_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["MenzilElanlariUcunDurumID"])){
  $emlakin_veziyyeti_id    =  ReqemlerXaricButunKarakterleriSil($_POST["MenzilElanlariUcunDurumID"]);
  $EmlakVeziyyetiSor=$db->prepare("SELECT * FROM emlakin_veziyyeti WHERE emlakin_veziyyeti_id=:emlakin_veziyyeti_id");
  $EmlakVeziyyetiSor->execute(array(
    'emlakin_veziyyeti_id'=>$emlakin_veziyyeti_id));
  $EmlakVeziyyetiCek=$EmlakVeziyyetiSor->fetch(PDO::FETCH_ASSOC);
  $menzil_elanlari_ucun_durum=$EmlakVeziyyetiCek['menzil_elanlari_ucun_durum'];
  if ($menzil_elanlari_ucun_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE emlakin_veziyyeti SET
    menzil_elanlari_ucun_durum=:menzil_elanlari_ucun_durum
    where emlakin_veziyyeti_id=$emlakin_veziyyeti_id");
  $update=$yenile->execute(array(
    'menzil_elanlari_ucun_durum'=> $status
  ));
}elseif(isset($_POST["QarajElanlariUcunDurumID"])){
  $emlakin_veziyyeti_id    =  ReqemlerXaricButunKarakterleriSil($_POST["QarajElanlariUcunDurumID"]);
  $EmlakVeziyyetiSor=$db->prepare("SELECT * FROM emlakin_veziyyeti WHERE emlakin_veziyyeti_id=:emlakin_veziyyeti_id");
  $EmlakVeziyyetiSor->execute(array(
    'emlakin_veziyyeti_id'=>$emlakin_veziyyeti_id));
  $EmlakVeziyyetiCek=$EmlakVeziyyetiSor->fetch(PDO::FETCH_ASSOC);
  $qaraj_elanlari_ucun_durum=$EmlakVeziyyetiCek['qaraj_elanlari_ucun_durum'];
  if ($qaraj_elanlari_ucun_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE emlakin_veziyyeti SET
    qaraj_elanlari_ucun_durum=:qaraj_elanlari_ucun_durum
    where emlakin_veziyyeti_id=$emlakin_veziyyeti_id");
  $update=$yenile->execute(array(
    'qaraj_elanlari_ucun_durum'=> $status
  ));
}elseif(isset($_POST["AvtomobilElanlariUcunDurumID"])){
  $emlakin_veziyyeti_id    =  ReqemlerXaricButunKarakterleriSil($_POST["AvtomobilElanlariUcunDurumID"]);
  $EmlakVeziyyetiSor=$db->prepare("SELECT * FROM emlakin_veziyyeti WHERE emlakin_veziyyeti_id=:emlakin_veziyyeti_id");
  $EmlakVeziyyetiSor->execute(array(
    'emlakin_veziyyeti_id'=>$emlakin_veziyyeti_id));
  $EmlakVeziyyetiCek=$EmlakVeziyyetiSor->fetch(PDO::FETCH_ASSOC);
  $avtomobil_elanlari_ucun_durum=$EmlakVeziyyetiCek['avtomobil_elanlari_ucun_durum'];
  if ($avtomobil_elanlari_ucun_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE emlakin_veziyyeti SET
    avtomobil_elanlari_ucun_durum=:avtomobil_elanlari_ucun_durum
    where emlakin_veziyyeti_id=$emlakin_veziyyeti_id");
  $update=$yenile->execute(array(
    'avtomobil_elanlari_ucun_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $emlakin_veziyyeti_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($emlakin_veziyyeti_id!="") {
    $sil=$db->prepare("DELETE FROM emlakin_veziyyeti where emlakin_veziyyeti_id=:emlakin_veziyyeti_id");
    $kontrol=$sil->execute(array(
      'emlakin_veziyyeti_id'=>$emlakin_veziyyeti_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['emlakveziyyetissiralama']=$siralama;
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
 header("Location:../EmlakVeziyyeti");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>