<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $MenziTechizatBolmesiDurum=0;
  $VillaTechizatBolmesiDurum=0;
  $QarajTechizatBolmesiDurum=0;
  $ObyektTechizatBolmesiDurum=0;
  $TorpaqTechizatBolmesiDurum=0;
  if(isset($_POST["Yeni"])){
   $MenziTechizatBolmesiAd              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["MenziTechizatBolmesiAd"])); 
   $MenziTechizatBolmesiSEOURL=SEO_URL(password_hash($MenziTechizatBolmesiAd.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $Sor=$db->prepare("SELECT * FROM  menzil_techizat_bolmesi where  MenziTechizatBolmesiAd=:MenziTechizatBolmesiAd");
   $Sor->execute(array(
    'MenziTechizatBolmesiAd'=>$MenziTechizatBolmesiAd));
   $Say= $Sor->rowCount();
   if ($Say>0) {
    $Cek= $Sor->fetch(PDO::FETCH_ASSOC);
    $MenziTechizatBolmesiSEOURL= $Cek['MenziTechizatBolmesiSEOURL'];
    $MenziTechizatBolmesiID= $Cek['MenziTechizatBolmesiID'];
    header("Location:../MenziTechizatBolmesiSonuc?durum=var&id=$MenziTechizatBolmesiID&MenziTechizatBolmesiSEOURL=$MenziTechizatBolmesiSEOURL");
    exit;
  }
  if($MenziTechizatBolmesiAd!="" ){
    $ElaveET=$db->prepare("INSERT INTO  menzil_techizat_bolmesi SET
      MenziTechizatBolmesiAd          =   :MenziTechizatBolmesiAd,
      MenziTechizatBolmesiSEOURL     =   :MenziTechizatBolmesiSEOURL,
      MenziTechizatBolmesiDurum       =   :MenziTechizatBolmesiDurum,
      VillaTechizatBolmesiDurum       =   :VillaTechizatBolmesiDurum,
      QarajTechizatBolmesiDurum       =   :QarajTechizatBolmesiDurum,
      ObyektTechizatBolmesiDurum       =   :ObyektTechizatBolmesiDurum,
      TorpaqTechizatBolmesiDurum       =   :TorpaqTechizatBolmesiDurum
      ");
    $insert=$ElaveET->execute(array(
      'MenziTechizatBolmesiAd'        => $MenziTechizatBolmesiAd,
      'MenziTechizatBolmesiSEOURL'      => $MenziTechizatBolmesiSEOURL,
      'MenziTechizatBolmesiDurum'     => $MenziTechizatBolmesiDurum,
      'VillaTechizatBolmesiDurum'     => $VillaTechizatBolmesiDurum,
      'QarajTechizatBolmesiDurum'     => $QarajTechizatBolmesiDurum,
      'ObyektTechizatBolmesiDurum'     => $ObyektTechizatBolmesiDurum,
      'TorpaqTechizatBolmesiDurum'     => $TorpaqTechizatBolmesiDurum
    ));

    if ($insert) {  
      $MenziTechizatBolmesiID = $db->lastInsertId();
      header("Location:../MenziTechizatBolmesiSonuc?durum=ok&id=$MenziTechizatBolmesiID&MenziTechizatBolmesiSEOURL=$MenziTechizatBolmesiSEOURL");
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
  $MenziTechizatBolmesiAd    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["MenziTechizatBolmesiAd"]));
  $MenziTechizatBolmesiID    =  ReqemlerXaricButunKarakterleriSil($_POST["MenziTechizatBolmesiID"]);
  $Sor=$db->prepare('SELECT * FROM menzil_techizat_bolmesi where MenziTechizatBolmesiAd=:MenziTechizatBolmesiAd and MenziTechizatBolmesiID<>:MenziTechizatBolmesiID');
  $Sor->execute(array(
    'MenziTechizatBolmesiAd'=>$MenziTechizatBolmesiAd,
    'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
  $Say=$Sor->rowCount();
  if ($Say>0) {
    $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
    $MenziTechizatBolmesiSEOURL= $Cek['MenziTechizatBolmesiSEOURL'];
    $MenziTechizatBolmesiID= $Cek['MenziTechizatBolmesiID'];
    header("Location:../MenziTechizatBolmesiSonuc?durum=var&id=$MenziTechizatBolmesiID&MenziTechizatBolmesiSEOURL=$MenziTechizatBolmesiSEOURL");
    exit;
  }else{
    if (($MenziTechizatBolmesiAd!="")and ($MenziTechizatBolmesiID!="")) {
      $yenile = $db->prepare("UPDATE menzil_techizat_bolmesi SET 
       MenziTechizatBolmesiAd          =   :MenziTechizatBolmesiAd,
      MenziTechizatBolmesiSEOURL     =   :MenziTechizatBolmesiSEOURL,
      MenziTechizatBolmesiDurum       =   :MenziTechizatBolmesiDurum,
      VillaTechizatBolmesiDurum       =   :VillaTechizatBolmesiDurum,
      QarajTechizatBolmesiDurum       =   :QarajTechizatBolmesiDurum,
      ObyektTechizatBolmesiDurum       =   :ObyektTechizatBolmesiDurum,
      TorpaqTechizatBolmesiDurum       =   :TorpaqTechizatBolmesiDurum
        WHERE MenziTechizatBolmesiID=$MenziTechizatBolmesiID");
      $update = $yenile->execute(array(       
         'MenziTechizatBolmesiAd'        => $MenziTechizatBolmesiAd,
      'MenziTechizatBolmesiSEOURL'      => $MenziTechizatBolmesiSEOURL,
      'MenziTechizatBolmesiDurum'     => $MenziTechizatBolmesiDurum,
      'VillaTechizatBolmesiDurum'     => $VillaTechizatBolmesiDurum,
      'QarajTechizatBolmesiDurum'     => $QarajTechizatBolmesiDurum,
      'ObyektTechizatBolmesiDurum'     => $ObyektTechizatBolmesiDurum,
      'TorpaqTechizatBolmesiDurum'     => $TorpaqTechizatBolmesiDurum
      ));   
      if ($update) {
        $Sor=$db->prepare("SELECT * FROM menzil_techizat_bolmesi WHERE MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
        $Sor->execute(array(
          'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
        $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
        $MenziTechizatBolmesiSEOURL= $Cek['MenziTechizatBolmesiSEOURL'];
        $MenziTechizatBolmesiID= $Cek['MenziTechizatBolmesiID'];
        header("Location:../MenziTechizatBolmesiSonuc?durum=yenile&id=$MenziTechizatBolmesiID&MenziTechizatBolmesiSEOURL=$MenziTechizatBolmesiSEOURL");
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
}elseif (isset($_POST["menzil_techizat_bolmesi_listeleme_limiti"])) {
  $menzil_techizat_bolmesi_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["menzil_techizat_bolmesi_listeleme_limiti"]); 
  if ($menzil_techizat_bolmesi_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      menzil_techizat_bolmesi_listeleme_limiti=:menzil_techizat_bolmesi_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'menzil_techizat_bolmesi_listeleme_limiti'=>$menzil_techizat_bolmesi_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $MenziTechizatBolmesiID    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $Sor=$db->prepare("SELECT * FROM menzil_techizat_bolmesi WHERE MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
  $Sor->execute(array(
    'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $MenziTechizatBolmesiDurum=$Cek['MenziTechizatBolmesiDurum'];
  if ($MenziTechizatBolmesiDurum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE menzil_techizat_bolmesi SET
    MenziTechizatBolmesiDurum=:MenziTechizatBolmesiDurum
    where MenziTechizatBolmesiID=$MenziTechizatBolmesiID");
  $update=$yenile->execute(array(
    'MenziTechizatBolmesiDurum'=> $status
  ));
}elseif(isset($_POST["VillaDurumID"])){
  $MenziTechizatBolmesiID    =  ReqemlerXaricButunKarakterleriSil($_POST["VillaDurumID"]);
  $Sor=$db->prepare("SELECT * FROM menzil_techizat_bolmesi WHERE MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
  $Sor->execute(array(
    'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $VillaTechizatBolmesiDurum=$Cek['VillaTechizatBolmesiDurum'];
  if ($VillaTechizatBolmesiDurum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE menzil_techizat_bolmesi SET
    VillaTechizatBolmesiDurum=:VillaTechizatBolmesiDurum
    where MenziTechizatBolmesiID=$MenziTechizatBolmesiID");
  $update=$yenile->execute(array(
    'VillaTechizatBolmesiDurum'=> $status
  ));
}
elseif(isset($_POST["QarajDurumID"])){
  $MenziTechizatBolmesiID    =  ReqemlerXaricButunKarakterleriSil($_POST["QarajDurumID"]);
  $Sor=$db->prepare("SELECT * FROM menzil_techizat_bolmesi WHERE MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
  $Sor->execute(array(
    'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $QarajTechizatBolmesiDurum=$Cek['QarajTechizatBolmesiDurum'];
  if ($QarajTechizatBolmesiDurum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE menzil_techizat_bolmesi SET
    QarajTechizatBolmesiDurum=:QarajTechizatBolmesiDurum
    where MenziTechizatBolmesiID=$MenziTechizatBolmesiID");
  $update=$yenile->execute(array(
    'QarajTechizatBolmesiDurum'=> $status
  ));
}
elseif(isset($_POST["ObyektDurumID"])){
  $MenziTechizatBolmesiID    =  ReqemlerXaricButunKarakterleriSil($_POST["ObyektDurumID"]);
  $Sor=$db->prepare("SELECT * FROM menzil_techizat_bolmesi WHERE MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
  $Sor->execute(array(
    'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $ObyektTechizatBolmesiDurum=$Cek['ObyektTechizatBolmesiDurum'];
  if ($ObyektTechizatBolmesiDurum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE menzil_techizat_bolmesi SET
    ObyektTechizatBolmesiDurum=:ObyektTechizatBolmesiDurum
    where MenziTechizatBolmesiID=$MenziTechizatBolmesiID");
  $update=$yenile->execute(array(
    'ObyektTechizatBolmesiDurum'=> $status
  ));
}
elseif(isset($_POST["TorpaqDurumID"])){
  $MenziTechizatBolmesiID    =  ReqemlerXaricButunKarakterleriSil($_POST["TorpaqDurumID"]);
  $Sor=$db->prepare("SELECT * FROM menzil_techizat_bolmesi WHERE MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
  $Sor->execute(array(
    'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $TorpaqTechizatBolmesiDurum=$Cek['TorpaqTechizatBolmesiDurum'];
  if ($TorpaqTechizatBolmesiDurum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE menzil_techizat_bolmesi SET
    TorpaqTechizatBolmesiDurum=:TorpaqTechizatBolmesiDurum
    where MenziTechizatBolmesiID=$MenziTechizatBolmesiID");
  $update=$yenile->execute(array(
    'TorpaqTechizatBolmesiDurum'=> $status
  ));
}
elseif(isset($_POST['SilID'])){
  $MenziTechizatBolmesiID     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($MenziTechizatBolmesiID!="") {
    $sil=$db->prepare("DELETE FROM menzil_techizat_bolmesi where MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
    $kontrol=$sil->execute(array(
      'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
    if ($kontrol) {
      $Sor=$db->prepare("SELECT * FROM  menziltechizati where MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
      $Sor->execute(array(
        'MenzilTechizatiAd'=>$MenzilTechizatiAd,
        'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
      $Say= $Sor->rowCount(); 
      for ($i=0; $i <=$Say ; $i++) { 
        $sil=$db->prepare("DELETE FROM menziltechizati where MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
        $kontrol=$sil->execute(array(
          'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
      }
    }

  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['menziltechizatbolmesisiralama']=$siralama;
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
 header("Location:../EmlakPryekti");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>