<?php 
require_once "../Ayarlar/ayarlar.php";
if(empty($_SESSION["admistis_mail"])){
 header("Location:../../404.php");
 exit;
}
if(isset($_POST["avtomobil_markasi_ad"])){
  $avtomobil_markasi_ad              =  HerSozunIlkHerfiniBoyukEt(EditorluIcerikleriFiltrle($_POST["avtomobil_markasi_ad"]));  
  $avtomobil_markasi=$db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_ad=:avtomobil_markasi_ad");
  $avtomobil_markasi->execute(array(
    'avtomobil_markasi_ad'=>$avtomobil_markasi_ad));
  $say=$avtomobil_markasi->rowCount();
  if ($say>0) {
    echo "var";
  }else{
    echo "yox";
  }


}


























?>