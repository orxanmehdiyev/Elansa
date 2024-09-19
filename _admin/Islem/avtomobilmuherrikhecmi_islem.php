<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $avtomobilmuherrikhecmi_durum=0;
 if(isset($_POST["Yeni"])){
   $avtomobilmuherrikhecmi_ad  =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobilmuherrikhecmi_ad"])); 
   $Avtomobil_Muherrik_hecmi_SEO_URL=SEO_URL(password_hash($avtomobilmuherrikhecmi_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $MuherrikHecmiSor=$db->prepare("SELECT * FROM  avtomobilmuherrikhecmi where  avtomobilmuherrikhecmi_ad=:avtomobilmuherrikhecmi_ad");
   $MuherrikHecmiSor->execute(array(
    'avtomobilmuherrikhecmi_ad'=>$avtomobilmuherrikhecmi_ad));
   $MuherrikHecmiSay= $MuherrikHecmiSor->rowCount();
   if ($MuherrikHecmiSay>0) {
    $MuherrikHecmiCek= $MuherrikHecmiSor->fetch(PDO::FETCH_ASSOC);
    $Avtomobil_Muherrik_hecmi_SEO_URL= $MuherrikHecmiCek['Avtomobil_Muherrik_hecmi_SEO_URL'];
    $avtomobilmuherrikhecmi_id= $MuherrikHecmiCek['avtomobilmuherrikhecmi_id'];
    header("Location:../MuherrikHecmiSonuc?durum=var&id=$avtomobilmuherrikhecmi_id&Avtomobil_Muherrik_hecmi_SEO_URL=$Avtomobil_Muherrik_hecmi_SEO_URL");
    exit;
  }
  if($avtomobilmuherrikhecmi_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  avtomobilmuherrikhecmi SET
      avtomobilmuherrikhecmi_ad         =   :avtomobilmuherrikhecmi_ad,
      Avtomobil_Muherrik_hecmi_SEO_URL  =   :Avtomobil_Muherrik_hecmi_SEO_URL,
      avtomobilmuherrikhecmi_durum      =   :avtomobilmuherrikhecmi_durum
      ");
    $insert=$ElaveET->execute(array(
      'avtomobilmuherrikhecmi_ad'        => $avtomobilmuherrikhecmi_ad,
      'Avtomobil_Muherrik_hecmi_SEO_URL'      => $Avtomobil_Muherrik_hecmi_SEO_URL,
      'avtomobilmuherrikhecmi_durum'     => $avtomobilmuherrikhecmi_durum
    ));

    if ($insert) {  
      $avtomobilmuherrikhecmi_id = $db->lastInsertId();
      header("Location:../MuherrikHecmiSonuc?durum=ok&id=$avtomobilmuherrikhecmi_id&Avtomobil_Muherrik_hecmi_SEO_URL=$Avtomobil_Muherrik_hecmi_SEO_URL");
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
  $avtomobilmuherrikhecmi_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobilmuherrikhecmi_ad"]));
  $avtomobilmuherrikhecmi_id    =  ReqemlerXaricButunKarakterleriSil($_POST["avtomobilmuherrikhecmi_id"]);
  $MuherrikHecmiSor=$db->prepare('SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_ad=:avtomobilmuherrikhecmi_ad and avtomobilmuherrikhecmi_id<>:avtomobilmuherrikhecmi_id');
  $MuherrikHecmiSor->execute(array(
    'avtomobilmuherrikhecmi_ad'=>$avtomobilmuherrikhecmi_ad,
    'avtomobilmuherrikhecmi_id'=>$avtomobilmuherrikhecmi_id));
  $MuherrikHecmiSay=$MuherrikHecmiSor->rowCount();
  if ($MuherrikHecmiSay>0) {
    $MuherrikHecmiCek=$MuherrikHecmiSor->fetch(PDO::FETCH_ASSOC);
    $Avtomobil_Muherrik_hecmi_SEO_URL= $MuherrikHecmiCek['Avtomobil_Muherrik_hecmi_SEO_URL'];
    $avtomobilmuherrikhecmi_id= $MuherrikHecmiCek['avtomobilmuherrikhecmi_id'];
    header("Location:../MuherrikHecmiSonuc?durum=var&id=$avtomobilmuherrikhecmi_id&Avtomobil_Muherrik_hecmi_SEO_URL=$Avtomobil_Muherrik_hecmi_SEO_URL");
    exit;
  }else{
    if (($avtomobilmuherrikhecmi_ad!="")and ($avtomobilmuherrikhecmi_id!="")) {
      $yenile = $db->prepare("UPDATE avtomobilmuherrikhecmi SET 
        avtomobilmuherrikhecmi_ad          =   :avtomobilmuherrikhecmi_ad,
      avtomobilmuherrikhecmi_durum       =   :avtomobilmuherrikhecmi_durum
        WHERE avtomobilmuherrikhecmi_id=$avtomobilmuherrikhecmi_id");
      $update = $yenile->execute(array(       
        'avtomobilmuherrikhecmi_ad'        => $avtomobilmuherrikhecmi_ad,    
      'avtomobilmuherrikhecmi_durum'     => $avtomobilmuherrikhecmi_durum
      ));   
      if ($update) {
        $MuherrikHecmiSor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi WHERE avtomobilmuherrikhecmi_id=:avtomobilmuherrikhecmi_id");
        $MuherrikHecmiSor->execute(array(
          'avtomobilmuherrikhecmi_id'=>$avtomobilmuherrikhecmi_id));
        $MuherrikHecmiCek=$MuherrikHecmiSor->fetch(PDO::FETCH_ASSOC);
        $Avtomobil_Muherrik_hecmi_SEO_URL= $MuherrikHecmiCek['Avtomobil_Muherrik_hecmi_SEO_URL'];
        $avtomobilmuherrikhecmi_id= $MuherrikHecmiCek['avtomobilmuherrikhecmi_id'];
        header("Location:../MuherrikHecmiSonuc?durum=yenile&id=$avtomobilmuherrikhecmi_id&Avtomobil_Muherrik_hecmi_SEO_URL=$Avtomobil_Muherrik_hecmi_SEO_URL");
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
}elseif (isset($_POST["avtomobilmuherrikhecmi_listeleme_limiti"])) {
  $avtomobilmuherrikhecmi_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobilmuherrikhecmi_listeleme_limiti"]); 
  if ($avtomobilmuherrikhecmi_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      avtomobilmuherrikhecmi_listeleme_limiti=:avtomobilmuherrikhecmi_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'avtomobilmuherrikhecmi_listeleme_limiti'=>$avtomobilmuherrikhecmi_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $avtomobilmuherrikhecmi_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $MuherrikHecmiSor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi WHERE avtomobilmuherrikhecmi_id=:avtomobilmuherrikhecmi_id");
  $MuherrikHecmiSor->execute(array(
    'avtomobilmuherrikhecmi_id'=>$avtomobilmuherrikhecmi_id));
  $MuherrikHecmiCek=$MuherrikHecmiSor->fetch(PDO::FETCH_ASSOC);
  $avtomobilmuherrikhecmi_durum=$MuherrikHecmiCek['avtomobilmuherrikhecmi_durum'];
  if ($avtomobilmuherrikhecmi_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE avtomobilmuherrikhecmi SET
    avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum
    where avtomobilmuherrikhecmi_id=$avtomobilmuherrikhecmi_id");
  $update=$yenile->execute(array(
    'avtomobilmuherrikhecmi_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $avtomobilmuherrikhecmi_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($avtomobilmuherrikhecmi_id!="") {
    $sil=$db->prepare("DELETE FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_id=:avtomobilmuherrikhecmi_id");
    $kontrol=$sil->execute(array(
      'avtomobilmuherrikhecmi_id'=>$avtomobilmuherrikhecmi_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['MuherrikHecmisiralama']=$siralama;
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