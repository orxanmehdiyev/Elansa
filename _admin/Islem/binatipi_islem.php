<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $binatipi_durum=0;
 if(isset($_POST["Yeni"])){
   $binatipi_adi              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["binatipi_adi"])); 
   $binatipi_id_kod=SEO_URL(password_hash($binatipi_adi.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $BinaTipiSor=$db->prepare("SELECT * FROM  binatipi where  binatipi_adi=:binatipi_adi");
   $BinaTipiSor->execute(array(
    'binatipi_adi'=>$binatipi_adi));
   $BinaTipiSay= $BinaTipiSor->rowCount();
   if ($BinaTipiSay>0) {
    $BinaTipiCek= $BinaTipiSor->fetch(PDO::FETCH_ASSOC);
    $binatipi_id_kod= $BinaTipiCek['binatipi_id_kod'];
    $binatipi_id= $BinaTipiCek['binatipi_id'];
    header("Location:../BinaTipiSonuc?durum=var&id=$binatipi_id&binatipi_id_kod=$binatipi_id_kod");
    exit;
  }
  if($binatipi_adi!="" ){
    $ElaveET=$db->prepare("INSERT INTO  binatipi SET
      binatipi_adi          =   :binatipi_adi,
      binatipi_id_kod     =   :binatipi_id_kod,
      binatipi_durum       =   :binatipi_durum
      ");
    $insert=$ElaveET->execute(array(
      'binatipi_adi'        => $binatipi_adi,
      'binatipi_id_kod'      => $binatipi_id_kod,
      'binatipi_durum'     => $binatipi_durum
    ));

    if ($insert) {  
      $binatipi_id = $db->lastInsertId();
      header("Location:../BinaTipiSonuc?durum=ok&id=$binatipi_id&binatipi_id_kod=$binatipi_id_kod");
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
  $binatipi_adi    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["binatipi_adi"]));
  $binatipi_id    =  ReqemlerXaricButunKarakterleriSil($_POST["binatipi_id"]);
  $BinaTipiSor=$db->prepare('SELECT * FROM binatipi where binatipi_adi=:binatipi_adi and binatipi_id<>:binatipi_id');
  $BinaTipiSor->execute(array(
    'binatipi_adi'=>$binatipi_adi,
    'binatipi_id'=>$binatipi_id));
  $BinaTipiSay=$BinaTipiSor->rowCount();
  if ($BinaTipiSay>0) {
    $BinaTipiCek=$BinaTipiSor->fetch(PDO::FETCH_ASSOC);
    $binatipi_id_kod= $BinaTipiCek['binatipi_id_kod'];
    $binatipi_id= $BinaTipiCek['binatipi_id'];
    header("Location:../BinaTipiSonuc?durum=var&id=$binatipi_id&binatipi_id_kod=$binatipi_id_kod");
    exit;
  }else{
    if (($binatipi_adi!="")and ($binatipi_id!="")) {
      $yenile = $db->prepare("UPDATE binatipi SET 
        binatipi_adi          =   :binatipi_adi,
      binatipi_durum       =   :binatipi_durum
        WHERE binatipi_id=$binatipi_id");
      $update = $yenile->execute(array(       
        'binatipi_adi'        => $binatipi_adi,    
      'binatipi_durum'     => $binatipi_durum
      ));   
      if ($update) {
        $BinaTipiSor=$db->prepare("SELECT * FROM binatipi WHERE binatipi_id=:binatipi_id");
        $BinaTipiSor->execute(array(
          'binatipi_id'=>$binatipi_id));
        $BinaTipiCek=$BinaTipiSor->fetch(PDO::FETCH_ASSOC);
        $binatipi_id_kod= $BinaTipiCek['binatipi_id_kod'];
        $binatipi_id= $BinaTipiCek['binatipi_id'];
        header("Location:../BinaTipiSonuc?durum=yenile&id=$binatipi_id&binatipi_id_kod=$binatipi_id_kod");
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
}elseif (isset($_POST["binatipi_listeleme_limiti"])) {
  $binatipi_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["binatipi_listeleme_limiti"]); 
  if ($binatipi_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      binatipi_listeleme_limiti=:binatipi_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'binatipi_listeleme_limiti'=>$binatipi_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $binatipi_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $BinaTipiSor=$db->prepare("SELECT * FROM binatipi WHERE binatipi_id=:binatipi_id");
  $BinaTipiSor->execute(array(
    'binatipi_id'=>$binatipi_id));
  $BinaTipiCek=$BinaTipiSor->fetch(PDO::FETCH_ASSOC);
  $binatipi_durum=$BinaTipiCek['binatipi_durum'];
  if ($binatipi_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE binatipi SET
    binatipi_durum=:binatipi_durum
    where binatipi_id=$binatipi_id");
  $update=$yenile->execute(array(
    'binatipi_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $binatipi_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($binatipi_id!="") {
    $sil=$db->prepare("DELETE FROM binatipi where binatipi_id=:binatipi_id");
    $kontrol=$sil->execute(array(
      'binatipi_id'=>$binatipi_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['binatipisiralama']=$siralama;
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
 header("Location:../BinaTipi");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>