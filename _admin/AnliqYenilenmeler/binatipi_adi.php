<?php 
require_once "../Ayarlar/ayarlar.php";
if(empty($_SESSION["admistis_mail"])){
 header("Location:../../404.php");
 exit;
}
if(isset($_POST["binatipi_adi"])){
  $binatipi_adi              =  HerSozunIlkHerfiniBoyukEt(EditorluIcerikleriFiltrle($_POST["binatipi_adi"]));  
  $binatipisor=$db->prepare("SELECT * FROM binatipi where binatipi_adi=:binatipi_adi");
  $binatipisor->execute(array(
    'binatipi_adi'=>$binatipi_adi));
  $say=$binatipisor->rowCount();
  if ($say>0) {
    echo "var";
  }else{
    echo "yox";
  }


}


























?>