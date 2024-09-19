<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $menziller_ucun_emlak_senedi_durum=0;
  $avtomobiller_ucun_emlak_senedi_durum=0;
  if(isset($_POST["Yeni"])){
   $emlak_senedi_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["emlak_senedi_ad"])); 
   $Emlak_Senedi_SEO_URL=SEO_URL(password_hash($emlak_senedi_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $Sor=$db->prepare("SELECT * FROM  emlak_senedi where  emlak_senedi_ad=:emlak_senedi_ad");
   $Sor->execute(array(
    'emlak_senedi_ad'=>$emlak_senedi_ad));
   $Say= $Sor->rowCount();
   if ($Say>0) {
    $Cek= $Sor->fetch(PDO::FETCH_ASSOC);
    $Emlak_Senedi_SEO_URL= $Cek['Emlak_Senedi_SEO_URL'];
    $emlak_senedi_id= $Cek['emlak_senedi_id'];
    header("Location:../EmlakSenediSonuc?durum=var&id=$emlak_senedi_id&Emlak_Senedi_SEO_URL=$Emlak_Senedi_SEO_URL");
    exit;
  }
  if($emlak_senedi_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  emlak_senedi SET
      emlak_senedi_ad          =   :emlak_senedi_ad,
      Emlak_Senedi_SEO_URL     =   :Emlak_Senedi_SEO_URL,
      menziller_ucun_emlak_senedi_durum       =   :menziller_ucun_emlak_senedi_durum,
      avtomobiller_ucun_emlak_senedi_durum       =   :avtomobiller_ucun_emlak_senedi_durum
      ");
    $insert=$ElaveET->execute(array(
      'emlak_senedi_ad'        => $emlak_senedi_ad,
      'Emlak_Senedi_SEO_URL'      => $Emlak_Senedi_SEO_URL,
      'menziller_ucun_emlak_senedi_durum'     => $menziller_ucun_emlak_senedi_durum,
      'avtomobiller_ucun_emlak_senedi_durum'     => $avtomobiller_ucun_emlak_senedi_durum
    ));

    if ($insert) {  
      $emlak_senedi_id = $db->lastInsertId();
      header("Location:../EmlakSenediSonuc?durum=ok&id=$emlak_senedi_id&Emlak_Senedi_SEO_URL=$Emlak_Senedi_SEO_URL");
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
  $emlak_senedi_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["emlak_senedi_ad"]));
  $emlak_senedi_id    =  ReqemlerXaricButunKarakterleriSil($_POST["emlak_senedi_id"]);
  $Sor=$db->prepare('SELECT * FROM emlak_senedi where emlak_senedi_ad=:emlak_senedi_ad and emlak_senedi_id<>:emlak_senedi_id');
  $Sor->execute(array(
    'emlak_senedi_ad'=>$emlak_senedi_ad,
    'emlak_senedi_id'=>$emlak_senedi_id));
  $Say=$Sor->rowCount();
  if ($Say>0) {
    $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
    $Emlak_Senedi_SEO_URL= $Cek['Emlak_Senedi_SEO_URL'];
    $emlak_senedi_id= $Cek['emlak_senedi_id'];
    header("Location:../EmlakSenediSonuc?durum=var&id=$emlak_senedi_id&Emlak_Senedi_SEO_URL=$Emlak_Senedi_SEO_URL");
    exit;
  }else{
    if (($emlak_senedi_ad!="")and ($emlak_senedi_id!="")) {
      $yenile = $db->prepare("UPDATE emlak_senedi SET 
        emlak_senedi_ad          =   :emlak_senedi_ad,
        menziller_ucun_emlak_senedi_durum       =   :menziller_ucun_emlak_senedi_durum,
        avtomobiller_ucun_emlak_senedi_durum       =   :avtomobiller_ucun_emlak_senedi_durum
        WHERE emlak_senedi_id=$emlak_senedi_id");
      $update = $yenile->execute(array(       
        'emlak_senedi_ad'        => $emlak_senedi_ad,    
        'menziller_ucun_emlak_senedi_durum'     => $menziller_ucun_emlak_senedi_durum,
        'avtomobiller_ucun_emlak_senedi_durum'     => $avtomobiller_ucun_emlak_senedi_durum
      ));   
      if ($update) {
        $Sor=$db->prepare("SELECT * FROM emlak_senedi WHERE emlak_senedi_id=:emlak_senedi_id");
        $Sor->execute(array(
          'emlak_senedi_id'=>$emlak_senedi_id));
        $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
        $Emlak_Senedi_SEO_URL= $Cek['Emlak_Senedi_SEO_URL'];
        $emlak_senedi_id= $Cek['emlak_senedi_id'];
        header("Location:../EmlakSenediSonuc?durum=yenile&id=$emlak_senedi_id&Emlak_Senedi_SEO_URL=$Emlak_Senedi_SEO_URL");
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
}elseif (isset($_POST["emlak_senedi_listeleme_limiti"])) {
  $emlak_senedi_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["emlak_senedi_listeleme_limiti"]); 
  if ($emlak_senedi_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      emlak_senedi_listeleme_limiti=:emlak_senedi_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'emlak_senedi_listeleme_limiti'=>$emlak_senedi_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $emlak_senedi_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $Sor=$db->prepare("SELECT * FROM emlak_senedi WHERE emlak_senedi_id=:emlak_senedi_id");
  $Sor->execute(array(
    'emlak_senedi_id'=>$emlak_senedi_id));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $menziller_ucun_emlak_senedi_durum=$Cek['menziller_ucun_emlak_senedi_durum'];
  if ($menziller_ucun_emlak_senedi_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE emlak_senedi SET
    menziller_ucun_emlak_senedi_durum=:menziller_ucun_emlak_senedi_durum
    where emlak_senedi_id=$emlak_senedi_id");
  $update=$yenile->execute(array(
    'menziller_ucun_emlak_senedi_durum'=> $status
  ));
}elseif(isset($_POST["AvtoDurumID"])){
  $emlak_senedi_id    =  ReqemlerXaricButunKarakterleriSil($_POST["AvtoDurumID"]);
  $Sor=$db->prepare("SELECT * FROM emlak_senedi WHERE emlak_senedi_id=:emlak_senedi_id");
  $Sor->execute(array(
    'emlak_senedi_id'=>$emlak_senedi_id));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $avtomobiller_ucun_emlak_senedi_durum=$Cek['avtomobiller_ucun_emlak_senedi_durum'];
  if ($avtomobiller_ucun_emlak_senedi_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE emlak_senedi SET
    avtomobiller_ucun_emlak_senedi_durum=:avtomobiller_ucun_emlak_senedi_durum
    where emlak_senedi_id=$emlak_senedi_id");
  $update=$yenile->execute(array(
    'avtomobiller_ucun_emlak_senedi_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $emlak_senedi_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($emlak_senedi_id!="") {
    $sil=$db->prepare("DELETE FROM emlak_senedi where emlak_senedi_id=:emlak_senedi_id");
    $kontrol=$sil->execute(array(
      'emlak_senedi_id'=>$emlak_senedi_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['emlaksenedisiralama']=$siralama;
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
 header("Location:../EmlakSenedi");
 exit;
}
}else{
  header("Location:../login");
  exit;
}
?>