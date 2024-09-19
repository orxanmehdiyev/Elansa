<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $avto_otrucudurum=0;
 if(isset($_POST["Yeni"])){
   $avto_otrucu_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avto_otrucu_ad"])); 
   $avto_otrucu_SEO_URL=SEO_URL(password_hash($avto_otrucu_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $OtrucuSor=$db->prepare("SELECT * FROM  avto_otrucu where  avto_otrucu_ad=:avto_otrucu_ad");
   $OtrucuSor->execute(array(
    'avto_otrucu_ad'=>$avto_otrucu_ad));
   $OtrucuSay= $OtrucuSor->rowCount();
   if ($OtrucuSay>0) {
    $OtrucuCek= $OtrucuSor->fetch(PDO::FETCH_ASSOC);
    $avto_otrucu_SEO_URL= $OtrucuCek['avto_otrucu_SEO_URL'];
    $avto_otrucu_id= $OtrucuCek['avto_otrucu_id'];
    header("Location:../OtrucuSonuc?durum=var&id=$avto_otrucu_id&avto_otrucu_SEO_URL=$avto_otrucu_SEO_URL");
    exit;
  }
  if($avto_otrucu_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  avto_otrucu SET
      avto_otrucu_ad          =   :avto_otrucu_ad,
      avto_otrucu_SEO_URL     =   :avto_otrucu_SEO_URL,
      avto_otrucudurum       =   :avto_otrucudurum
      ");
    $insert=$ElaveET->execute(array(
      'avto_otrucu_ad'        => $avto_otrucu_ad,
      'avto_otrucu_SEO_URL'      => $avto_otrucu_SEO_URL,
      'avto_otrucudurum'     => $avto_otrucudurum
    ));

    if ($insert) {  
      $avto_otrucu_id = $db->lastInsertId();
      header("Location:../OtrucuSonuc?durum=ok&id=$avto_otrucu_id&avto_otrucu_SEO_URL=$avto_otrucu_SEO_URL");
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
  $avto_otrucu_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avto_otrucu_ad"]));
  $avto_otrucu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["avto_otrucu_id"]);
  $OtrucuSor=$db->prepare('SELECT * FROM avto_otrucu where avto_otrucu_ad=:avto_otrucu_ad and avto_otrucu_id<>:avto_otrucu_id');
  $OtrucuSor->execute(array(
    'avto_otrucu_ad'=>$avto_otrucu_ad,
    'avto_otrucu_id'=>$avto_otrucu_id));
  $OtrucuSay=$OtrucuSor->rowCount();
  if ($OtrucuSay>0) {
    $OtrucuCek=$OtrucuSor->fetch(PDO::FETCH_ASSOC);
    $avto_otrucu_SEO_URL= $OtrucuCek['avto_otrucu_SEO_URL'];
    $avto_otrucu_id= $OtrucuCek['avto_otrucu_id'];
    header("Location:../OtrucuSonuc?durum=var&id=$avto_otrucu_id&avto_otrucu_SEO_URL=$avto_otrucu_SEO_URL");
    exit;
  }else{
    if (($avto_otrucu_ad!="")and ($avto_otrucu_id!="")) {
      $yenile = $db->prepare("UPDATE avto_otrucu SET 
        avto_otrucu_ad          =   :avto_otrucu_ad,
      avto_otrucudurum       =   :avto_otrucudurum
        WHERE avto_otrucu_id=$avto_otrucu_id");
      $update = $yenile->execute(array(       
        'avto_otrucu_ad'        => $avto_otrucu_ad,    
      'avto_otrucudurum'     => $avto_otrucudurum
      ));   
      if ($update) {
        $OtrucuSor=$db->prepare("SELECT * FROM avto_otrucu WHERE avto_otrucu_id=:avto_otrucu_id");
        $OtrucuSor->execute(array(
          'avto_otrucu_id'=>$avto_otrucu_id));
        $OtrucuCek=$OtrucuSor->fetch(PDO::FETCH_ASSOC);
        $avto_otrucu_SEO_URL= $OtrucuCek['avto_otrucu_SEO_URL'];
        $avto_otrucu_id= $OtrucuCek['avto_otrucu_id'];
        header("Location:../OtrucuSonuc?durum=yenile&id=$avto_otrucu_id&avto_otrucu_SEO_URL=$avto_otrucu_SEO_URL");
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
}elseif (isset($_POST["avto_otrucu_listeleme_limiti"])) {
  $avto_otrucu_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["avto_otrucu_listeleme_limiti"]); 
  if ($avto_otrucu_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      avto_otrucu_listeleme_limiti=:avto_otrucu_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'avto_otrucu_listeleme_limiti'=>$avto_otrucu_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
 $avto_otrucu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);

  $OtrucuSor=$db->prepare("SELECT * FROM avto_otrucu WHERE avto_otrucu_id=:avto_otrucu_id");
  $OtrucuSor->execute(array(
    'avto_otrucu_id'=>$avto_otrucu_id));
  $OtrucuCek=$OtrucuSor->fetch(PDO::FETCH_ASSOC);
  $avto_otrucudurum=$OtrucuCek['avto_otrucudurum'];
  if ($avto_otrucudurum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE avto_otrucu SET
    avto_otrucudurum=:avto_otrucudurum
    where avto_otrucu_id=$avto_otrucu_id");
  $update=$yenile->execute(array(
    'avto_otrucudurum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $avto_otrucu_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($avto_otrucu_id!="") {
    $sil=$db->prepare("DELETE FROM avto_otrucu where avto_otrucu_id=:avto_otrucu_id");
    $kontrol=$sil->execute(array(
      'avto_otrucu_id'=>$avto_otrucu_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['otrucusiralama']=$siralama;
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
 header("Location:../Otrucu");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>