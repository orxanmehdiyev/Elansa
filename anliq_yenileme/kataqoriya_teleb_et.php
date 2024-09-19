 <?php
 require_once "../_admin/Ayarlar/ayarlar.php";

 if ($_GET['deyer'] == "1") {
 	require_once 'avtomobilelani.php';
 }


 elseif ($_GET['deyer'] == "4") {
 	require_once 'menziller.php';
 } elseif ($_GET['deyer'] == "5") {
  require_once 'villalar.php';
 }






















 ?>
