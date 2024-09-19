<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $obyekt_durum=0;
 if(isset($_POST["Yeni"])){
   $obyekt_adi              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["obyekt_adi"])); 
   $obyekt_id_kod=SEO_URL(password_hash($obyekt_adi.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $obyektSor=$db->prepare("SELECT * FROM  obyekt where  obyekt_adi=:obyekt_adi");
   $obyektSor->execute(array(
    'obyekt_adi'=>$obyekt_adi));
   $obyektSay= $obyektSor->rowCount();
   if ($obyektSay>0) {
    $obyektCek= $obyektSor->fetch(PDO::FETCH_ASSOC);
    $obyekt_id_kod= $obyektCek['obyekt_id_kod'];
    $obyekt_id= $obyektCek['obyekt_id'];
    header("Location:../ObyektSonuc?durum=var&id=$obyekt_id&obyekt_id_kod=$obyekt_id_kod");
    exit;
  }
  if($obyekt_adi!="" ){
    $ElaveET=$db->prepare("INSERT INTO  obyekt SET
      obyekt_adi          =   :obyekt_adi,
      obyekt_id_kod     =   :obyekt_id_kod,
      obyekt_durum       =   :obyekt_durum
      ");
    $insert=$ElaveET->execute(array(
      'obyekt_adi'        => $obyekt_adi,
      'obyekt_id_kod'      => $obyekt_id_kod,
      'obyekt_durum'     => $obyekt_durum
    ));

    if ($insert) {  
      $obyekt_id = $db->lastInsertId();
      header("Location:../ObyektSonuc?durum=ok&id=$obyekt_id&obyekt_id_kod=$obyekt_id_kod");
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
  $obyekt_adi    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["obyekt_adi"]));
  $obyekt_id    =  ReqemlerXaricButunKarakterleriSil($_POST["obyekt_id"]);
  $obyektSor=$db->prepare('SELECT * FROM obyekt where obyekt_adi=:obyekt_adi and obyekt_id<>:obyekt_id');
  $obyektSor->execute(array(
    'obyekt_adi'=>$obyekt_adi,
    'obyekt_id'=>$obyekt_id));
  $obyektSay=$obyektSor->rowCount();
  if ($obyektSay>0) {
    $obyektCek=$obyektSor->fetch(PDO::FETCH_ASSOC);
    $obyekt_id_kod= $obyektCek['obyekt_id_kod'];
    $obyekt_id= $obyektCek['obyekt_id'];
    header("Location:../ObyektSonuc?durum=var&id=$obyekt_id&obyekt_id_kod=$obyekt_id_kod");
    exit;
  }else{
    if (($obyekt_adi!="")and ($obyekt_id!="")) {
      $yenile = $db->prepare("UPDATE obyekt SET 
        obyekt_adi          =   :obyekt_adi,
      obyekt_durum       =   :obyekt_durum
        WHERE obyekt_id=$obyekt_id");
      $update = $yenile->execute(array(       
        'obyekt_adi'        => $obyekt_adi,    
      'obyekt_durum'     => $obyekt_durum
      ));   
      if ($update) {
        $obyektSor=$db->prepare("SELECT * FROM obyekt WHERE obyekt_id=:obyekt_id");
        $obyektSor->execute(array(
          'obyekt_id'=>$obyekt_id));
        $obyektCek=$obyektSor->fetch(PDO::FETCH_ASSOC);
        $obyekt_id_kod= $obyektCek['obyekt_id_kod'];
        $obyekt_id= $obyektCek['obyekt_id'];
        header("Location:../ObyektSonuc?durum=yenile&id=$obyekt_id&obyekt_id_kod=$obyekt_id_kod");
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
}elseif (isset($_POST["obyekt_listeleme_limiti"])) {
  $obyekt_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["obyekt_listeleme_limiti"]); 
  if ($obyekt_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      obyekt_listeleme_limiti=:obyekt_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'obyekt_listeleme_limiti'=>$obyekt_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $obyekt_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $obyektSor=$db->prepare("SELECT * FROM obyekt WHERE obyekt_id=:obyekt_id");
  $obyektSor->execute(array(
    'obyekt_id'=>$obyekt_id));
  $obyektCek=$obyektSor->fetch(PDO::FETCH_ASSOC);
  $obyekt_durum=$obyektCek['obyekt_durum'];
  if ($obyekt_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE obyekt SET
    obyekt_durum=:obyekt_durum
    where obyekt_id=$obyekt_id");
  $update=$yenile->execute(array(
    'obyekt_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $obyekt_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($obyekt_id!="") {
    $sil=$db->prepare("DELETE FROM obyekt where obyekt_id=:obyekt_id");
    $kontrol=$sil->execute(array(
      'obyekt_id'=>$obyekt_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['obyektsiralama']=$siralama;
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
 header("Location:../obyekt");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>