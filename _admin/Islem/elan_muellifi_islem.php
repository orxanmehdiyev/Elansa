<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $menzillerucun_elanverennovu_durum=0;
   $avtmobil_elanlari_ucun_durum=0;
 if(isset($_POST["Yeni"])){
   $elanverennovu_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["elanverennovu_ad"])); 
   $elanverennovu_id_kodla=SEO_URL(password_hash($elanverennovu_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $elanverennovuSor=$db->prepare("SELECT * FROM  elanverennovu where  elanverennovu_ad=:elanverennovu_ad");
   $elanverennovuSor->execute(array(
    'elanverennovu_ad'=>$elanverennovu_ad));
   $elanverennovuSay= $elanverennovuSor->rowCount();
   if ($elanverennovuSay>0) {
    $elanverennovuCek= $elanverennovuSor->fetch(PDO::FETCH_ASSOC);
    $elanverennovu_id_kodla= $elanverennovuCek['elanverennovu_id_kodla'];
    $elanverennovu_id= $elanverennovuCek['elanverennovu_id'];
    header("Location:../ElanMuellifiSonuc?durum=var&id=$elanverennovu_id&elanverennovu_id_kodla=$elanverennovu_id_kodla");
    exit;
  }
  if($elanverennovu_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  elanverennovu SET
      elanverennovu_ad          =   :elanverennovu_ad,
      elanverennovu_id_kodla     =   :elanverennovu_id_kodla,
      menzillerucun_elanverennovu_durum       =   :menzillerucun_elanverennovu_durum,
       avtmobil_elanlari_ucun_durum       =   :avtmobil_elanlari_ucun_durum
      ");
    $insert=$ElaveET->execute(array(
      'elanverennovu_ad'        => $elanverennovu_ad,
      'elanverennovu_id_kodla'      => $elanverennovu_id_kodla,
      'menzillerucun_elanverennovu_durum'     => $menzillerucun_elanverennovu_durum,
      'avtmobil_elanlari_ucun_durum'     => $avtmobil_elanlari_ucun_durum
    ));

    if ($insert) {  
      $elanverennovu_id = $db->lastInsertId();
      header("Location:../ElanMuellifiSonuc?durum=ok&id=$elanverennovu_id&elanverennovu_id_kodla=$elanverennovu_id_kodla");
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
  $elanverennovu_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["elanverennovu_ad"]));
  $elanverennovu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["elanverennovu_id"]);
  $elanverennovuSor=$db->prepare('SELECT * FROM elanverennovu where elanverennovu_ad=:elanverennovu_ad and elanverennovu_id<>:elanverennovu_id');
  $elanverennovuSor->execute(array(
    'elanverennovu_ad'=>$elanverennovu_ad,
    'elanverennovu_id'=>$elanverennovu_id));
  $elanverennovuSay=$elanverennovuSor->rowCount();
  if ($elanverennovuSay>0) {
    $elanverennovuCek=$elanverennovuSor->fetch(PDO::FETCH_ASSOC);
    $elanverennovu_id_kodla= $elanverennovuCek['elanverennovu_id_kodla'];
    $elanverennovu_id= $elanverennovuCek['elanverennovu_id'];
    header("Location:../ElanMuellifiSonuc?durum=var&id=$elanverennovu_id&elanverennovu_id_kodla=$elanverennovu_id_kodla");
    exit;
  }else{
    if (($elanverennovu_ad!="")and ($elanverennovu_id!="")) {
      $yenile = $db->prepare("UPDATE elanverennovu SET 
        elanverennovu_ad          =   :elanverennovu_ad,
      menzillerucun_elanverennovu_durum       =   :menzillerucun_elanverennovu_durum,
       avtmobil_elanlari_ucun_durum       =   :avtmobil_elanlari_ucun_durum
        WHERE elanverennovu_id=$elanverennovu_id");
      $update = $yenile->execute(array(       
        'elanverennovu_ad'        => $elanverennovu_ad,    
      'menzillerucun_elanverennovu_durum'     => $menzillerucun_elanverennovu_durum,
       'avtmobil_elanlari_ucun_durum'     => $avtmobil_elanlari_ucun_durum
      ));   
      if ($update) {
        $elanverennovuSor=$db->prepare("SELECT * FROM elanverennovu WHERE elanverennovu_id=:elanverennovu_id");
        $elanverennovuSor->execute(array(
          'elanverennovu_id'=>$elanverennovu_id));
        $elanverennovuCek=$elanverennovuSor->fetch(PDO::FETCH_ASSOC);
        $elanverennovu_id_kodla= $elanverennovuCek['elanverennovu_id_kodla'];
        $elanverennovu_id= $elanverennovuCek['elanverennovu_id'];
        header("Location:../ElanMuellifiSonuc?durum=yenile&id=$elanverennovu_id&elanverennovu_id_kodla=$elanverennovu_id_kodla");
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
}elseif (isset($_POST["elan_veren_novu_listeleme_limiti"])) {
  $elan_veren_novu_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["elan_veren_novu_listeleme_limiti"]); 
  if ($elan_veren_novu_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      elan_veren_novu_listeleme_limiti=:elan_veren_novu_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'elan_veren_novu_listeleme_limiti'=>$elan_veren_novu_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $elanverennovu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $elanverennovuSor=$db->prepare("SELECT * FROM elanverennovu WHERE elanverennovu_id=:elanverennovu_id");
  $elanverennovuSor->execute(array(
    'elanverennovu_id'=>$elanverennovu_id));
  $elanverennovuCek=$elanverennovuSor->fetch(PDO::FETCH_ASSOC);
  $menzillerucun_elanverennovu_durum=$elanverennovuCek['menzillerucun_elanverennovu_durum'];
  if ($menzillerucun_elanverennovu_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE elanverennovu SET
    menzillerucun_elanverennovu_durum=:menzillerucun_elanverennovu_durum
    where elanverennovu_id=$elanverennovu_id");
  $update=$yenile->execute(array(
    'menzillerucun_elanverennovu_durum'=> $status
  ));
}elseif(isset($_POST["AvtoDurumID"])){
  $elanverennovu_id    =  ReqemlerXaricButunKarakterleriSil($_POST["AvtoDurumID"]);
  $elanverennovuSor=$db->prepare("SELECT * FROM elanverennovu WHERE elanverennovu_id=:elanverennovu_id");
  $elanverennovuSor->execute(array(
    'elanverennovu_id'=>$elanverennovu_id));
  $elanverennovuCek=$elanverennovuSor->fetch(PDO::FETCH_ASSOC);
  $avtmobil_elanlari_ucun_durum=$elanverennovuCek['avtmobil_elanlari_ucun_durum'];
  if ($avtmobil_elanlari_ucun_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE elanverennovu SET
    avtmobil_elanlari_ucun_durum=:avtmobil_elanlari_ucun_durum
    where elanverennovu_id=$elanverennovu_id");
  $update=$yenile->execute(array(
    'avtmobil_elanlari_ucun_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $elanverennovu_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($elanverennovu_id!="") {
    $sil=$db->prepare("DELETE FROM elanverennovu where elanverennovu_id=:elanverennovu_id");
    $kontrol=$sil->execute(array(
      'elanverennovu_id'=>$elanverennovu_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['elanmuellifisiralam']=$siralama;
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
 header("Location:../ElanMuellifi");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>