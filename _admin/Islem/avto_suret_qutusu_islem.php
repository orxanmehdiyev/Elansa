<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $avto_suret_qutusu_durum=0;
 if(isset($_POST["Yeni"])){
   $avto_suret_qutusu_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avto_suret_qutusu_ad"])); 
   $avto_suret_qutusu_SEO_URL=SEO_URL(password_hash($avto_suret_qutusu_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $SuretQutusuSor=$db->prepare("SELECT * FROM  avto_suret_qutusu where  avto_suret_qutusu_ad=:avto_suret_qutusu_ad");
   $SuretQutusuSor->execute(array(
    'avto_suret_qutusu_ad'=>$avto_suret_qutusu_ad));
   $SuretQutusuSay= $SuretQutusuSor->rowCount();
   if ($SuretQutusuSay>0) {
    $SuretQutusuCek= $SuretQutusuSor->fetch(PDO::FETCH_ASSOC);
    $avto_suret_qutusu_SEO_URL= $SuretQutusuCek['avto_suret_qutusu_SEO_URL'];
    $avto_suret_qutusu_id= $SuretQutusuCek['avto_suret_qutusu_id'];
    header("Location:../SuretQutusuSonuc?durum=var&id=$avto_suret_qutusu_id&avto_suret_qutusu_SEO_URL=$avto_suret_qutusu_SEO_URL");
    exit;
  }
  if($avto_suret_qutusu_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  avto_suret_qutusu SET
      avto_suret_qutusu_ad          =   :avto_suret_qutusu_ad,
      avto_suret_qutusu_SEO_URL     =   :avto_suret_qutusu_SEO_URL,
      avto_suret_qutusu_durum       =   :avto_suret_qutusu_durum
      ");
    $insert=$ElaveET->execute(array(
      'avto_suret_qutusu_ad'        => $avto_suret_qutusu_ad,
      'avto_suret_qutusu_SEO_URL'      => $avto_suret_qutusu_SEO_URL,
      'avto_suret_qutusu_durum'     => $avto_suret_qutusu_durum
    ));
    if ($insert) {  
      $avto_suret_qutusu_id = $db->lastInsertId();
      header("Location:../SuretQutusuSonuc?durum=ok&id=$avto_suret_qutusu_id&avto_suret_qutusu_SEO_URL=$avto_suret_qutusu_SEO_URL");
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
  $avto_suret_qutusu_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avto_suret_qutusu_ad"]));
  $avto_suret_qutusu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["avto_suret_qutusu_id"]);
  $SuretQutusuSor=$db->prepare('SELECT * FROM avto_suret_qutusu where avto_suret_qutusu_ad=:avto_suret_qutusu_ad and avto_suret_qutusu_id<>:avto_suret_qutusu_id');
  $SuretQutusuSor->execute(array(
    'avto_suret_qutusu_ad'=>$avto_suret_qutusu_ad,
    'avto_suret_qutusu_id'=>$avto_suret_qutusu_id));
  $SuretQutusuSay=$SuretQutusuSor->rowCount();
  if ($SuretQutusuSay>0) {
    $SuretQutusuCek=$SuretQutusuSor->fetch(PDO::FETCH_ASSOC);
    $avto_suret_qutusu_SEO_URL= $SuretQutusuCek['avto_suret_qutusu_SEO_URL'];
    $avto_suret_qutusu_id= $SuretQutusuCek['avto_suret_qutusu_id'];
    header("Location:../SuretQutusuSonuc?durum=var&id=$avto_suret_qutusu_id&avto_suret_qutusu_SEO_URL=$avto_suret_qutusu_SEO_URL");
    exit;
  }else{
    if (($avto_suret_qutusu_ad!="")and ($avto_suret_qutusu_id!="")) {
      $yenile = $db->prepare("UPDATE avto_suret_qutusu SET 
        avto_suret_qutusu_ad          =   :avto_suret_qutusu_ad,
      avto_suret_qutusu_durum       =   :avto_suret_qutusu_durum
        WHERE avto_suret_qutusu_id=$avto_suret_qutusu_id");
      $update = $yenile->execute(array(       
        'avto_suret_qutusu_ad'        => $avto_suret_qutusu_ad,    
      'avto_suret_qutusu_durum'     => $avto_suret_qutusu_durum
      ));   
      if ($update) {
        $SuretQutusuSor=$db->prepare("SELECT * FROM avto_suret_qutusu WHERE avto_suret_qutusu_id=:avto_suret_qutusu_id");
        $SuretQutusuSor->execute(array(
          'avto_suret_qutusu_id'=>$avto_suret_qutusu_id));
        $SuretQutusuCek=$SuretQutusuSor->fetch(PDO::FETCH_ASSOC);
        $avto_suret_qutusu_SEO_URL= $SuretQutusuCek['avto_suret_qutusu_SEO_URL'];
        $avto_suret_qutusu_id= $SuretQutusuCek['avto_suret_qutusu_id'];
        header("Location:../SuretQutusuSonuc?durum=yenile&id=$avto_suret_qutusu_id&avto_suret_qutusu_SEO_URL=$avto_suret_qutusu_SEO_URL");
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
}elseif (isset($_POST["avto_suret_qutusu_listeleme_limiti"])) {
  $avto_suret_qutusu_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["avto_suret_qutusu_listeleme_limiti"]); 
  if ($avto_suret_qutusu_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      avto_suret_qutusu_listeleme_limiti=:avto_suret_qutusu_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'avto_suret_qutusu_listeleme_limiti'=>$avto_suret_qutusu_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $avto_suret_qutusu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $SuretQutusuSor=$db->prepare("SELECT * FROM avto_suret_qutusu WHERE avto_suret_qutusu_id=:avto_suret_qutusu_id");
  $SuretQutusuSor->execute(array(
    'avto_suret_qutusu_id'=>$avto_suret_qutusu_id));
  $SuretQutusuCek=$SuretQutusuSor->fetch(PDO::FETCH_ASSOC);
  $avto_suret_qutusu_durum=$SuretQutusuCek['avto_suret_qutusu_durum'];
  if ($avto_suret_qutusu_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE avto_suret_qutusu SET
    avto_suret_qutusu_durum=:avto_suret_qutusu_durum
    where avto_suret_qutusu_id=$avto_suret_qutusu_id");
  $update=$yenile->execute(array(
    'avto_suret_qutusu_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $avto_suret_qutusu_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($avto_suret_qutusu_id!="") {
    $sil=$db->prepare("DELETE FROM avto_suret_qutusu where avto_suret_qutusu_id=:avto_suret_qutusu_id");
    $kontrol=$sil->execute(array(
      'avto_suret_qutusu_id'=>$avto_suret_qutusu_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['suretqutususiralama']=$siralama;
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