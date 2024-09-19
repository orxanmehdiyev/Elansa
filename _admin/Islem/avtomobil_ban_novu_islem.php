<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $avtomobil_ban_novu_durum=0;
 if(isset($_POST["Yeni"])){
   $avtomobil_ban_novu_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobil_ban_novu_ad"])); 
   $avtomobil_ban_novu_SEO_URL=SEO_URL(password_hash($avtomobil_ban_novu_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $Ban_Novu_Sor=$db->prepare("SELECT * FROM  avtomobil_ban_novu where  avtomobil_ban_novu_ad=:avtomobil_ban_novu_ad");
   $Ban_Novu_Sor->execute(array(
    'avtomobil_ban_novu_ad'=>$avtomobil_ban_novu_ad));
   $Avtomobil_Ban_Novu_Say= $Ban_Novu_Sor->rowCount();
   if ($Avtomobil_Ban_Novu_Say>0) {
    $Avtomobil_Ban_Novu_Cek= $Ban_Novu_Sor->fetch(PDO::FETCH_ASSOC);
    $avtomobil_ban_novu_SEO_URL= $Avtomobil_Ban_Novu_Cek['avtomobil_ban_novu_SEO_URL'];
    $avtomobil_ban_novu_id= $Avtomobil_Ban_Novu_Cek['avtomobil_ban_novu_id'];
    header("Location:../AvtomobilBanNovuSonucSonuc?durum=var&id=$avtomobil_ban_novu_id&avtomobil_ban_novu_SEO_URL=$avtomobil_ban_novu_SEO_URL");
    exit;
  }
  if($avtomobil_ban_novu_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  avtomobil_ban_novu SET
      avtomobil_ban_novu_ad          =   :avtomobil_ban_novu_ad,
      avtomobil_ban_novu_SEO_URL        =   :avtomobil_ban_novu_SEO_URL,
      avtomobil_ban_novu_durum       =   :avtomobil_ban_novu_durum
      ");
    $insert=$ElaveET->execute(array(
      'avtomobil_ban_novu_ad'        => $avtomobil_ban_novu_ad,
      'avtomobil_ban_novu_SEO_URL'      => $avtomobil_ban_novu_SEO_URL,
      'avtomobil_ban_novu_durum'     => $avtomobil_ban_novu_durum
    ));
    if ($insert) {  
      $avtomobil_ban_novu_id = $db->lastInsertId();
      header("Location:../AvtomobilBanNovuSonucSonuc?durum=ok&id=$avtomobil_ban_novu_id&avtomobil_ban_novu_SEO_URL=$avtomobil_ban_novu_SEO_URL");
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
  $avtomobil_ban_novu_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["avtomobil_ban_novu_ad"]));
  $avtomobil_ban_novu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_ban_novu_id"]);
  $AvtomobilBanNovuSor=$db->prepare('SELECT * FROM avtomobil_ban_novu where avtomobil_ban_novu_ad=:avtomobil_ban_novu_ad and avtomobil_ban_novu_id<>:avtomobil_ban_novu_id');
  $AvtomobilBanNovuSor->execute(array(
    'avtomobil_ban_novu_ad'=>$avtomobil_ban_novu_ad,
    'avtomobil_ban_novu_id'=>$avtomobil_ban_novu_id));
  $AvtomobilBanNovuSay=$AvtomobilBanNovuSor->rowCount();
  if ($AvtomobilBanNovuSay>0) {
    $AvtomobilBanNovuCek=$AvtomobilBanNovuSor->fetch(PDO::FETCH_ASSOC);
    $avtomobil_ban_novu_SEO_URL= $AvtomobilBanNovuCek['avtomobil_ban_novu_SEO_URL'];
    $avtomobil_ban_novu_id= $AvtomobilBanNovuCek['avtomobil_ban_novu_id'];
    header("Location:../AvtomobilBanNovuSonucSonuc?durum=var&id=$avtomobil_ban_novu_id&avtomobil_ban_novu_SEO_URL=$avtomobil_ban_novu_SEO_URL");
    exit;
  }else{
    if (($avtomobil_ban_novu_ad!="")and ($avtomobil_ban_novu_id!="")) {
      $yenile = $db->prepare("UPDATE avtomobil_ban_novu SET 
        avtomobil_ban_novu_ad          =   :avtomobil_ban_novu_ad,
      avtomobil_ban_novu_durum       =   :avtomobil_ban_novu_durum
        WHERE avtomobil_ban_novu_id=$avtomobil_ban_novu_id");
      $update = $yenile->execute(array(       
        'avtomobil_ban_novu_ad'        => $avtomobil_ban_novu_ad,    
      'avtomobil_ban_novu_durum'     => $avtomobil_ban_novu_durum
      ));   
      if ($update) {
        $AvtomobilBanNovuSor=$db->prepare("SELECT * FROM avtomobil_ban_novu WHERE avtomobil_ban_novu_id=:avtomobil_ban_novu_id");
        $AvtomobilBanNovuSor->execute(array(
          'avtomobil_ban_novu_id'=>$avtomobil_ban_novu_id));
        $AvtomobilBanNovuCek=$AvtomobilBanNovuSor->fetch(PDO::FETCH_ASSOC);
        $avtomobil_ban_novu_SEO_URL= $AvtomobilBanNovuCek['avtomobil_ban_novu_SEO_URL'];
        $avtomobil_ban_novu_id= $AvtomobilBanNovuCek['avtomobil_ban_novu_id'];
        header("Location:../AvtomobilBanNovuSonucSonuc?durum=yenile&id=$avtomobil_ban_novu_id&avtomobil_ban_novu_SEO_URL=$avtomobil_ban_novu_SEO_URL");
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
}elseif (isset($_POST["avtomobil_ban_novu_listeleme_limiti"])) {
  $avtomobil_ban_novu_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_ban_novu_listeleme_limiti"]); 
  if ($avtomobil_ban_novu_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      avtomobil_ban_novu_listeleme_limiti=:avtomobil_ban_novu_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'avtomobil_ban_novu_listeleme_limiti'=>$avtomobil_ban_novu_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $avtomobil_ban_novu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $AvtomobilBanNovuSor=$db->prepare("SELECT * FROM avtomobil_ban_novu WHERE avtomobil_ban_novu_id=:avtomobil_ban_novu_id");
  $AvtomobilBanNovuSor->execute(array(
    'avtomobil_ban_novu_id'=>$avtomobil_ban_novu_id));
  $AvtomobilBanNovuCek=$AvtomobilBanNovuSor->fetch(PDO::FETCH_ASSOC);
  $avtomobil_ban_novu_durum=$AvtomobilBanNovuCek['avtomobil_ban_novu_durum'];
  if ($avtomobil_ban_novu_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE avtomobil_ban_novu SET
    avtomobil_ban_novu_durum=:avtomobil_ban_novu_durum
    where avtomobil_ban_novu_id=$avtomobil_ban_novu_id");
  $update=$yenile->execute(array(
    'avtomobil_ban_novu_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $avtomobil_ban_novu_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($avtomobil_ban_novu_id!="") {
    $sil=$db->prepare("DELETE FROM avtomobil_ban_novu where avtomobil_ban_novu_id=:avtomobil_ban_novu_id");
    $kontrol=$sil->execute(array(
      'avtomobil_ban_novu_id'=>$avtomobil_ban_novu_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['avtobansiralama']=$siralama;
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