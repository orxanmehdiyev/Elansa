<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $MenzilTechizatiDurum=0;
  if(isset($_POST["Yeni"])){
   $MenzilTechizatiAd              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["MenzilTechizatiAd"])); 
   $MenzilTechizatiSEOURL=SEO_URL(password_hash($MenzilTechizatiAd.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   $MenziTechizatBolmesiID        =  ReqemlerXaricButunKarakterleriSil($_POST["MenziTechizatBolmesiAd_sec"]);
   $Sor=$db->prepare("SELECT * FROM  menziltechizati where  MenzilTechizatiAd=:MenzilTechizatiAd and MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
   $Sor->execute(array(
    'MenzilTechizatiAd'=>$MenzilTechizatiAd,
    'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID));
   $Say= $Sor->rowCount();
   if ($Say>0) {
    $Cek= $Sor->fetch(PDO::FETCH_ASSOC);
    $MenzilTechizatiSEOURL= $Cek['MenzilTechizatiSEOURL'];
    $MenzilTechizatiID= $Cek['MenzilTechizatiID'];
    header("Location:../MenzilTechizatiSonuc?durum=var&id=$MenzilTechizatiID&MenzilTechizatiSEOURL=$MenzilTechizatiSEOURL");
    exit;
  }
  if($MenzilTechizatiAd!="" ){
    $ElaveET=$db->prepare("INSERT INTO  menziltechizati SET
      MenzilTechizatiAd          =   :MenzilTechizatiAd,
      MenzilTechizatiSEOURL     =   :MenzilTechizatiSEOURL,
      MenziTechizatBolmesiID     =   :MenziTechizatBolmesiID,
      MenzilTechizatiDurum       =   :MenzilTechizatiDurum
      ");
    $insert=$ElaveET->execute(array(
      'MenzilTechizatiAd'        => $MenzilTechizatiAd,
      'MenzilTechizatiSEOURL'      => $MenzilTechizatiSEOURL,
      'MenziTechizatBolmesiID'      => $MenziTechizatBolmesiID,
      'MenzilTechizatiDurum'     => $MenzilTechizatiDurum
    ));

    if ($insert) {  
      $MenzilTechizatiID = $db->lastInsertId();
      header("Location:../MenzilTechizatiSonuc?durum=ok&id=$MenzilTechizatiID&MenzilTechizatiSEOURL=$MenzilTechizatiSEOURL");
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
  $MenzilTechizatiAd    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["MenzilTechizatiAd"]));
  $MenzilTechizatiID    =  ReqemlerXaricButunKarakterleriSil($_POST["MenzilTechizatiID"]);
  $MenziTechizatBolmesiID        =  ReqemlerXaricButunKarakterleriSil($_POST["MenziTechizatBolmesiAd_sec"]);
  $Sor=$db->prepare('SELECT * FROM menziltechizati where MenzilTechizatiAd=:MenzilTechizatiAd and MenziTechizatBolmesiID=:MenziTechizatBolmesiID and MenzilTechizatiID<>:MenzilTechizatiID');
  $Sor->execute(array(
    'MenzilTechizatiAd'=>$MenzilTechizatiAd,
    'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID,
    'MenzilTechizatiID'=>$MenzilTechizatiID));
  $Say=$Sor->rowCount();
  if ($Say>0) {
    $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
    $MenzilTechizatiSEOURL= $Cek['MenzilTechizatiSEOURL'];
    $MenzilTechizatiID= $Cek['MenzilTechizatiID'];
    header("Location:../MenzilTechizatiSonuc?durum=var&id=$MenzilTechizatiID&MenzilTechizatiSEOURL=$MenzilTechizatiSEOURL");
    exit;
  }else{
    if (($MenzilTechizatiAd!="")and ($MenzilTechizatiID!="")) {
      $yenile = $db->prepare("UPDATE menziltechizati SET 
        MenzilTechizatiAd          =   :MenzilTechizatiAd,
        MenziTechizatBolmesiID          =   :MenziTechizatBolmesiID,
        MenzilTechizatiDurum       =   :MenzilTechizatiDurum
        WHERE MenzilTechizatiID=$MenzilTechizatiID");
      $update = $yenile->execute(array(       
        'MenzilTechizatiAd'        => $MenzilTechizatiAd, 
        'MenziTechizatBolmesiID'        => $MenziTechizatBolmesiID,     
        'MenzilTechizatiDurum'     => $MenzilTechizatiDurum
      ));   
      if ($update) {
        $Sor=$db->prepare("SELECT * FROM menziltechizati WHERE MenzilTechizatiID=:MenzilTechizatiID");
        $Sor->execute(array(
          'MenzilTechizatiID'=>$MenzilTechizatiID));
        $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
        $MenzilTechizatiSEOURL= $Cek['MenzilTechizatiSEOURL'];
        $MenzilTechizatiID= $Cek['MenzilTechizatiID'];
        header("Location:../MenzilTechizatiSonuc?durum=yenile&id=$MenzilTechizatiID&MenzilTechizatiSEOURL=$MenzilTechizatiSEOURL");
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
}elseif (isset($_POST["menzil_techizati_siralama_limiti"])) {
  $menzil_techizati_siralama_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["menzil_techizati_siralama_limiti"]); 
  if ($menzil_techizati_siralama_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      menzil_techizati_siralama_limiti=:menzil_techizati_siralama_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'menzil_techizati_siralama_limiti'=>$menzil_techizati_siralama_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $MenzilTechizatiID    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $Sor=$db->prepare("SELECT * FROM menziltechizati WHERE MenzilTechizatiID=:MenzilTechizatiID");
  $Sor->execute(array(
    'MenzilTechizatiID'=>$MenzilTechizatiID));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $MenzilTechizatiDurum=$Cek['MenzilTechizatiDurum'];
  if ($MenzilTechizatiDurum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE menziltechizati SET
    MenzilTechizatiDurum=:MenzilTechizatiDurum
    where MenzilTechizatiID=$MenzilTechizatiID");
  $update=$yenile->execute(array(
    'MenzilTechizatiDurum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $MenzilTechizatiID     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($MenzilTechizatiID!="") {
    $sil=$db->prepare("DELETE FROM menziltechizati where MenzilTechizatiID=:MenzilTechizatiID");
    $kontrol=$sil->execute(array(
      'MenzilTechizatiID'=>$MenzilTechizatiID));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['menziltechizatisiralama']=$siralama;
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