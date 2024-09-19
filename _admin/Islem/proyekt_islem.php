<?php 
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
  $menziller_ucun_proyekt_durum=0;
 if(isset($_POST["Yeni"])){
   $proyekt_ad              =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["proyekt_ad"])); 
   $proyekt_SEO_URL=SEO_URL(password_hash($proyekt_ad.password_hash(uniqid(time()), PASSWORD_DEFAULT), PASSWORD_DEFAULT));
   
   $Sor=$db->prepare("SELECT * FROM  proyekt where  proyekt_ad=:proyekt_ad");
   $Sor->execute(array(
    'proyekt_ad'=>$proyekt_ad));
   $Say= $Sor->rowCount();
   if ($Say>0) {
    $Cek= $Sor->fetch(PDO::FETCH_ASSOC);
    $proyekt_SEO_URL= $Cek['proyekt_SEO_URL'];
    $proyekt_id= $Cek['proyekt_id'];
    header("Location:../ProyektSonuc?durum=var&id=$proyekt_id&proyekt_SEO_URL=$proyekt_SEO_URL");
    exit;
  }
  if($proyekt_ad!="" ){
    $ElaveET=$db->prepare("INSERT INTO  proyekt SET
      proyekt_ad          =   :proyekt_ad,
      proyekt_SEO_URL     =   :proyekt_SEO_URL,
      menziller_ucun_proyekt_durum       =   :menziller_ucun_proyekt_durum
      ");
    $insert=$ElaveET->execute(array(
      'proyekt_ad'        => $proyekt_ad,
      'proyekt_SEO_URL'      => $proyekt_SEO_URL,
      'menziller_ucun_proyekt_durum'     => $menziller_ucun_proyekt_durum
    ));

    if ($insert) {  
      $proyekt_id = $db->lastInsertId();
      header("Location:../ProyektSonuc?durum=ok&id=$proyekt_id&proyekt_SEO_URL=$proyekt_SEO_URL");
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
  $proyekt_ad    =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemIcerikleriniFitrle($_POST["proyekt_ad"]));
  $proyekt_id    =  ReqemlerXaricButunKarakterleriSil($_POST["proyekt_id"]);
  $Sor=$db->prepare('SELECT * FROM proyekt where proyekt_ad=:proyekt_ad and proyekt_id<>:proyekt_id');
  $Sor->execute(array(
    'proyekt_ad'=>$proyekt_ad,
    'proyekt_id'=>$proyekt_id));
  $Say=$Sor->rowCount();
  if ($Say>0) {
    $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
    $proyekt_SEO_URL= $Cek['proyekt_SEO_URL'];
    $proyekt_id= $Cek['proyekt_id'];
    header("Location:../ProyektSonuc?durum=var&id=$proyekt_id&proyekt_SEO_URL=$proyekt_SEO_URL");
    exit;
  }else{
    if (($proyekt_ad!="")and ($proyekt_id!="")) {
      $yenile = $db->prepare("UPDATE proyekt SET 
        proyekt_ad          =   :proyekt_ad,
      menziller_ucun_proyekt_durum       =   :menziller_ucun_proyekt_durum
        WHERE proyekt_id=$proyekt_id");
      $update = $yenile->execute(array(       
        'proyekt_ad'        => $proyekt_ad,    
      'menziller_ucun_proyekt_durum'     => $menziller_ucun_proyekt_durum
      ));   
      if ($update) {
        $Sor=$db->prepare("SELECT * FROM proyekt WHERE proyekt_id=:proyekt_id");
        $Sor->execute(array(
          'proyekt_id'=>$proyekt_id));
        $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
        $proyekt_SEO_URL= $Cek['proyekt_SEO_URL'];
        $proyekt_id= $Cek['proyekt_id'];
        header("Location:../ProyektSonuc?durum=yenile&id=$proyekt_id&proyekt_SEO_URL=$proyekt_SEO_URL");
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
}elseif (isset($_POST["proyekt_listeleme_limiti"])) {
  $proyekt_listeleme_limiti     =   ReqemlerXaricButunKarakterleriSil($_POST["proyekt_listeleme_limiti"]); 
  if ($proyekt_listeleme_limiti !="") {
    $adminsor=$db->prepare("SELECT * FROM admin WHERE admin_mail=:admin_mail");
    $adminsor->execute(array(
      'admin_mail'=>($_SESSION["admistis_mail"])));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_id= $admincek['admin_id'];
    $yenile = $db->prepare("UPDATE admin SET    
      proyekt_listeleme_limiti=:proyekt_listeleme_limiti 
      WHERE admin_id=$admin_id ");
    $update=$yenile->execute(array(
      'proyekt_listeleme_limiti'=>$proyekt_listeleme_limiti));
  }else{
    header("Location:../../404.php");
    exit;
  }
}elseif(isset($_POST["DurumID"])){
  $proyekt_id    =  ReqemlerXaricButunKarakterleriSil($_POST["DurumID"]);
  $Sor=$db->prepare("SELECT * FROM proyekt WHERE proyekt_id=:proyekt_id");
  $Sor->execute(array(
    'proyekt_id'=>$proyekt_id));
  $Cek=$Sor->fetch(PDO::FETCH_ASSOC);
  $menziller_ucun_proyekt_durum=$Cek['menziller_ucun_proyekt_durum'];
  if ($menziller_ucun_proyekt_durum==1) {
    $status = 0;
  }else{
    $status = 1;
  }
  $yenile=$db->prepare("UPDATE proyekt SET
    menziller_ucun_proyekt_durum=:menziller_ucun_proyekt_durum
    where proyekt_id=$proyekt_id");
  $update=$yenile->execute(array(
    'menziller_ucun_proyekt_durum'=> $status
  ));
}elseif(isset($_POST['SilID'])){
  $proyekt_id     =   ReqemlerXaricButunKarakterleriSil($_POST["SilID"]);  
  if ($proyekt_id!="") {
    $sil=$db->prepare("DELETE FROM proyekt where proyekt_id=:proyekt_id");
    $kontrol=$sil->execute(array(
      'proyekt_id'=>$proyekt_id));
  }else{
   header("Location:../../404.php");
   exit;
 }
}
elseif(isset($_POST["siralama"])){
  $siralama     =   HerfVeReqemIcerikleriniFitrle($_POST["siralama"]); 
  if($siralama!=""){
    $_SESSION['proyektnovusiralama']=$siralama;
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