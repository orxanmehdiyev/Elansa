<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      <?php 
      if(isset($_GET['durum'])){
        if ($_GET['durum']=="ok") { ?>
          <span style="color: #00e600;">Dövlət Tənzimlənmələri Yenilənmə Uğurlu  </span>
        <?php  }else{
          echo "Yeni Elanlar";
        }
      } else{
       echo "Yeni Elanlar";
     }
     if(!isset($_GET['durum']) or !isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"]) ){

     }else{
      header("Location:YeniElanlar");
    }
    ?>
  </div>    
</div>

<div id="ListelemeAlaniKapsayicisi">   



  <?php 
  if(isset($_REQUEST['siralama'])){
    if($_REQUEST['siralama']=="elanadsiraasc"){
      $siralama="elan_adi ASC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiradesc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elanadsiraasc&';
    }
    elseif ($_REQUEST['siralama']=="elanadsiradesc") {
      $siralama="elan_adi DESC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elanadsiradesc&';
    }
    elseif ($_REQUEST['siralama']=="elanbeyadsiraasc") {
      $siralama="email ASC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiradesc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elanbeyadsiraasc&';
    }
    elseif ($_REQUEST['siralama']=="elanbeyadsiradesc") {
      $siralama="email DESC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elanbeyadsiradesc&';
    }

    elseif ($_REQUEST['siralama']=="elantelkodsiraasc") {
      $siralama="telefon_bir ASC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiradesc";
      $link='YeniElanlar?siralama=elantelkodsiraasc&';
    }
    elseif ($_REQUEST['siralama']=="elantelkodsiradesc") {
      $siralama="telefon_bir DESC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elantelkodsiradesc&';
    }
    elseif ($_REQUEST['siralama']=="elanidsiraasc") {
      $siralama="elan_id ASC";
      $elanidsira="elanidsiradesc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elanidsiraasc&';
    }
    elseif ($_REQUEST['siralama']=="elanidsiradesc") {
      $siralama="elan_id DESC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elanidsiradesc&';
    }
    elseif ($_REQUEST['siralama']=="elankodsiraasc") {
      $siralama="TarixSaat ASC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiradesc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elankodsiraasc&';
    }
    elseif ($_REQUEST['siralama']=="elankodsiradesc") {
      $siralama="TarixSaat DESC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?siralama=elankodsiradesc&';
    }
    else{
      $siralama="elan_id ASC";
      $elanidsira="elanidsiraasc";
      $elanadsira="elanadsiraasc";
      $elanbeyadsira="elanbeyadsiraasc";
      $elankodsira="elankodsiraasc";
      $elantelkodsira="elantelkodsiraasc";
      $link='YeniElanlar?';
    }

  }else{
    $siralama="elan_id ASC";
    $elanidsira="elanidsiraasc";
    $elanadsira="elanadsiraasc";
    $elanbeyadsira="elanbeyadsiraasc";
    $elankodsira="elankodsiraasc";
    $elantelkodsira="elantelkodsiraasc";
    $link='YeniElanlar?';
  }


  $elansaysor=$db->prepare("SELECT * FROM elan");
  $elansaysor->execute();
  $elansayi=$elansaysor->rowCount();
  if(isset($_GET['seyfe'])){
    $GelenSayfalama=$_GET['seyfe'];
    if($_GET['seyfe']<1){
      header("Location:YeniElanlar");
      exit;
    }
  }else{
    $GelenSayfalama=1;
  }


  $SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$YeniElanlarListelemeLimiti)-$YeniElanlarListelemeLimiti;
  $BulunanSayfaSayisi                 = ceil($elansayi/$YeniElanlarListelemeLimiti);
  $elansor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $YeniElanlarListelemeLimiti");
  $elansor->execute(array(
    'yayim_durumu'=>0));
  $sayi= $elansor->rowCount();
  if ($sayi>0) {?>
 <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
      <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
        <thead>
          <th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="YeniElanlar?siralama=<?php echo $elanidsira ?>">ID</a></th>
          <th><a href="YeniElanlar?siralama=<?php echo $elanadsira ?>">Adı</a></th>
          <th><a href="YeniElanlar?siralama=<?php echo $elanbeyadsira ?>">E-mail</a></th>
          <th><a href="YeniElanlar?siralama=<?php echo $elankodsira ?>">Tarix</a></th>        
          <th><a href="YeniElanlar?siralama=<?php echo $elantelkodsira ?>">Telefon</a></th>           
        </thead>
        <tbody>
          <?php 


          while ($elancek= $elansor->fetch(PDO::FETCH_ASSOC)) {
            $elan_id=$elancek['elan_id'];
            $elan_adi=$elancek['elan_adi'];
            $email=$elancek['email'];
            $TarixSaat=$elancek['TarixSaat'];
            $telefon_bir=$elancek['telefon_bir'].";".$elancek['telefon_iki'];
            ?>
            <tr class='clickable-row'  <?php
            if ($elancek['elan_baxildi_durum'] == 0) {
              echo 'onclick="ElanBaxildi(this.id)"';
            } else {
              echo "";
            }  ?> class='clickable-row' style="cursor: pointer;" id="<?php echo 'setir-'.$elancek['elan_id'] ?>" data-href="elandetay-<?=$elancek["SEO_URL"] . '-' . $elancek["elan_id"] ?>">
            <td class="SiraNomresiSutunu"> 
              <div class="SiraNomresi">
                <?php
                if ($elancek['elan_baxildi_durum'] == 0) {
                  echo "<b>";
                } else {
                  echo "";
                }
                echo sprintf("%06s", $elan_id );
                if ($elancek['elan_baxildi_durum'] == 0) {
                  echo "</b>";
                } else {
                  echo "";
                }
                ?>   
              </div>
            </td>
            <td id="elan_adi-<?php echo $elan_id ?>">
              <?php
              if ($elancek['elan_baxildi_durum'] == 0) {
                echo "<b>";
              } else {
                echo "";
              }
              echo $elan_adi ;
              if ($elancek['elan_baxildi_durum'] == 0) {
                echo "</b>";
              } else {
                echo "";
              }
              ?>
            </td>
            <td id="email-<?php echo $elan_id ?>">                
              <?php
              if ($elancek['elan_baxildi_durum'] == 0) {
                echo "<b>";
              } else {
                echo "";
              }
              echo $email ;
              if ($elancek['elan_baxildi_durum'] == 0) {
                echo "</b>";
              } else {
                echo "";
              }
              ?>
            </td>
            <td id="TarixSaat-<?php echo $elan_id ?>" class="KodSutunu">

              <?php
              if ($elancek['elan_baxildi_durum'] == 0) {
                echo "<b>";
              } else {
                echo "";
              }
              echo $TarixSaat ;
              if ($elancek['elan_baxildi_durum'] == 0) {
                echo "</b>";
              } else {
                echo "";
              }
              ?>              
            </td>
            <td id="telefon_bir-<?php echo $elan_id ?>" class="TelKodSutunu">


              <?php
              if ($elancek['elan_baxildi_durum'] == 0) {
                echo "<b>";
              } else {
                echo "";
              }
              echo $telefon_bir ;
              if ($elancek['elan_baxildi_durum'] == 0) {
                echo "</b>";
              } else {
                echo "";
              }
              ?>  
            </td> 
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <div id="SayfalamaAlaniKapsayicisi">
    <div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
      <?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $elansayi; ?> qeydiyatlı dövlət var. Göstərilən
      <select onchange="elanSiralamaLimiti(this.value)">
        <?php 
        if ($elansayi>100) {
          $Limitsayi=100;
        }else{
          $Limitsayi=$elansayi;
        }
        for ($i = 10; $i <= $Limitsayi; $i+=10 ) {  ?>
          <option <?php if($YeniElanlarListelemeLimiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

        <?php } 
        if (($elansayi%10)>0) { ?>
          <option <?php if($YeniElanlarListelemeLimiti==$elansayi){echo "selected";} ?> value="<?php echo $elansayi; ?>"><?php echo $elansayi; ?></option>
        <?php }
        ?>
      </select>
      <button>Print</button>
    </div>
    <?php 
    if ($BulunanSayfaSayisi>1) {?>
      <div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
        <?php
        if($GelenSayfalama<1){
          header("Location:YeniElanlar?seyfe=$BulunanSayfaSayisi");
        }
        if ($GelenSayfalama>1) {
          $SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama-1;
          echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=1\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
          echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
        }else{
          echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
          echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
        }
        for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-5; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+5; $SayfalamaIcinSayfaIndexDegeri++){
          if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
            if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
              echo  "<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
            }else{
              echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
            }
          }
        }
        if($GelenSayfalama>$BulunanSayfaSayisi){
          header("Location:".$link."seyfe=$BulunanSayfaSayisi");
        }

        if($GelenSayfalama!=$BulunanSayfaSayisi){
          $SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama+1;
          echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirIleriAl."\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
          echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$BulunanSayfaSayisi."\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
        }else{
          $SayfalamaIcinSayfaDegeriniBirIleriAl=$BulunanSayfaSayisi;
          echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
          echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
        }
        ?>
      </div>
    <?php } ?>
  </div>
<?php } else{
  echo "Yeni ELan Yoxdur";
}
?>

























</div>
</section>



<?php require_once "_footer.php" ?>