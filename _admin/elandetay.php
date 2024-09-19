<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      Elan Detayları    
    </div>    
  </div>
  <div id="FormAlaniKapsayicisi">
    <form id="UmumiAyarlarFormu" name="UmumiAyarlarFormu" action="Islem/umumi_ayarlar_islem.php" method="POST" enctype="multipart/form-data">
      <?php 
      $SEO_URL=$_GET['sef'];
      
      $elan_id=$_GET['elan_id'];
      $elandetay=$db->prepare("SELECT * FROM elan where SEO_URL=:SEO_URL and elan_id=:elan_id");
      $elandetay->execute(array(
        'SEO_URL'=>$SEO_URL,
        'elan_id'=>$elan_id));
      $elandetaysay=$elandetay->rowCount();
      if ($elandetaysay!=1) {
       header("Location:YeniElanlar");
       exit();
     }else{
       $elandetaycek= $elandetay->fetch(PDO::FETCH_ASSOC);
     }
     ?>

     <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
          Elanın Nömrəsi  <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" disabled=""  value="<?php echo $elandetaycek ['elan_id']?>" class="FormAlanlariUcunTextInputlari">
        </div>
      </div>
    </div>

    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
          Elanın Adı  <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text"   value="<?php echo  $elandetaycek ['elan_adi'] ?>" class="FormAlanlariUcunTextInputlari">
        </div>
      </div>
    </div>

    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
          Elanın Pin Kodu <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" disabled=""  value="<?php echo $elandetaycek ['elan_pin_kode']?>" class="FormAlanlariUcunTextInputlari">
        </div>
      </div>
    </div>


    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
          Elanın Tarixi <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" disabled=""  value="<?php echo $elandetaycek ['TarixSaat']?>" class="FormAlanlariUcunTextInputlari">
        </div>
      </div>
    </div>


    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
          Elanın IP Adresi <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" disabled=""  value="<?php echo $elandetaycek ['IPAdresi']?>" class="FormAlanlariUcunTextInputlari">
        </div>
      </div>
    </div>

    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
          Elanın Meksedi <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" disabled=""  value="<?php echo $elandetaycek ['elanmeksedi']?>" class="FormAlanlariUcunTextInputlari">
        </div>
      </div>
    </div>


    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
         Telefon <span class="KirmiziYazi">*</span>
       </div>
       <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['telefon_bir']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>

  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
       Telefon <span class="KirmiziYazi">*</span>
     </div>
     <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" disabled=""  value="<?php echo $elandetaycek ['telefon_iki']?>" class="FormAlanlariUcunTextInputlari">
    </div>
  </div>
</div>


<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      Ad Soyad <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" disabled=""  value="<?php echo $elandetaycek ['ad_soyad']?>" class="FormAlanlariUcunTextInputlari">
    </div>
  </div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      user_id <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" disabled=""  value="<?php 
      if ($elandetaycek ['user_id']==0){
        echo "Qeydiyatsız";
        }else{
          echo "Qeydiyatdan Keçmiş İstifadəçi";

        }
        ?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>



  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        email <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['email']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>



  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        dovlet_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['dovlet_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>


  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        seher_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['seher_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>




  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        rayon_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['rayon_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>



  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        qesebe_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['qesebe_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>


  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        metro_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['metro_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>




  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        nisangah_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['nisangah_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>


  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        aciqlama <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['aciqlama']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>



  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        qiymet <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['qiymet'] .' '.$elandetaycek ['pul_novu']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>




  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        elanverennovu_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['elanverennovu_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>


  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        buraxilis_ili <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['buraxilis_ili']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>

  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        emlakin_veziyyeti_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['emlakin_veziyyeti_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>


  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        Barteri Var <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php  if($elandetaycek ['barter_var']=='on'){
          echo 'var';
        }else{echo 'Yoxdur';}?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>


  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        Krediti Var <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php  if($elandetaycek ['kredit_var']=='on'){
          echo 'var';
        }else{echo 'Yoxdur';}?>" class="FormAlanlariUcunTextInputlari">    
      </div>
    </div>
  </div>

  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        reng_ad <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" disabled=""  value="<?php echo $elandetaycek ['reng_ad']?>" class="FormAlanlariUcunTextInputlari">
      </div>
    </div>
  </div>

  <?php 

  if ($elandetaycek['karoqoriya_id']==1) {
   require_once("ElanDetaylari/Avtomobil_Elani_Detay.php");
 }elseif($elandetaycek['karoqoriya_id']==4){
  require_once("ElanDetaylari/Menzil_Elani_Detay.php");
}

?>



<div class="SeyfeIciSetirAlaniKapsayicisekil">


  <ul class="SeyfeIciSetirAlaniKapsayiciUl">
    <?php    
    $sekil= json_decode($elandetaycek['sekil']);
    $sekilsayi=count($sekil);
    for ($i=0; $i<$sekilsayi; $i++) {  ?>
      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>" class="SeyfeIciSetirAlaniKapsayiciUlli">
        <img src="../images/avtomobil/<?php echo $sekil[$i] ?>" title="">
      </li>
    <?php   }    ?>
  </ul>
  
</div>




































<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
  <?php if ($elandetaycek['yayim_durumu']==0) {
    ?>
    <button type="button" class="YenileButonlari" onclick="ElanYayimalas(this.id)" id="<?php echo 'yayimla-'. $elandetaycek['elan_id']?>" >Yayımla</button>
  <?php } ?>
  <?php if (($elandetaycek['yayim_durumu'])==0 or ($elandetaycek['yayim_durumu']==1)) {
    ?>
    <button type="button" class="QirmiziButonlar" onclick="ElanYayimsil(this.id)" id="<?php echo 'yayimlasil-'. $elandetaycek['elan_id']?>"  name="UmumiAyarlarYenile" onClick="SistemAyarlariFormKontrol()">Yayımını Sil</button>
  <?php } ?>

  <?php if (($elandetaycek['yayim_durumu']==2)  or ($elandetaycek['yayim_durumu']==3 )) {
    ?>
    <button type="button" class="QirmiziButonlar" onclick="ElanSil(this.id)" id="<?php echo 'yayimlasil-'. $elandetaycek['elan_id']?>"  name="UmumiAyarlarYenile" onClick="SistemAyarlariFormKontrol()">Sil</button>
  <?php } ?>



  <?php if (($elandetaycek['yayim_durumu'])==1 and ($elandetaycek['VIP']==0)) {
    ?>
    <button type="button" class="YenileButonlari" onclick="elanvipet(this.id)" id="<?php echo 'vipet-'. $elandetaycek['elan_id']?>"  name="UmumiAyarlarYenile" onClick="SistemAyarlariFormKontrol()">VIP Et</button>
  <?php } ?>



  <?php if (($elandetaycek['yayim_durumu'])==1 and ($elandetaycek['VIP']==1)) {
    ?>
    <button type="button" class="QirmiziButonlar" onclick="Vipsil(this.id)" id="<?php echo 'vipsil-'. $elandetaycek['elan_id']?>"  name="UmumiAyarlarYenile" onClick="SistemAyarlariFormKontrol()">VIP SIL</button>
  <?php } ?>

</div>

</form>


















</div>


</section>

<script type="text/javascript">
  /* Katagorya durum kontrol*/
  function ElanBaxildi(ID) {
    var DurumID = ID.split("-");  
    var ElanBaxildiDurum = DurumID[1];
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "Islem/elan_islem.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("ElanBaxildiDurum=" + ElanBaxildiDurum);
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.reload()
      }
    }
  }
  /* Katagorya durum kontrol*/


  /* Katagorya durum kontrol*/
  function ElanYayimalas(ID) {
    var DurumID = ID.split("-");  
    var ElanYayimla = DurumID[1];
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "Islem/elan_islem.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("ElanYayimla=" + ElanYayimla);
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
       window.history.back();
     }
   }
 }
 /* Katagorya durum kontrol*/



 /* Katagorya durum kontrol*/
 function ElanYayimsil(ID) {
  var DurumID = ID.split("-");  
  var ElanYayimlasil = DurumID[1];
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "Islem/elan_islem.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("ElanYayimlasil=" + ElanYayimlasil);
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.history.back();
    }
  }
}
/* Katagorya durum kontrol*/

/* Katagorya durum kontrol*/
function ElanSil(ID) {
  var DurumID = ID.split("-");  
  var ElanSil = DurumID[1];
  var xhttp = new XMLHttpRequest();
  console.log(xhttp);
  xhttp.open("POST", "Islem/elan_islem.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("ElanSil=" + ElanSil);
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.history.back();
    }
  }
}
/* Katagorya durum kontrol*/


/* Katagorya durum kontrol*/
function elanvipet(ID) {
  var DurumID = ID.split("-");  
  var vipet = DurumID[1];
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "Islem/elan_islem.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("vipet=" + vipet);
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.history.back();
    }
  }
}
/* Katagorya durum kontrol*/


/* Katagorya durum kontrol*/
function Vipsil(ID) {
  var DurumID = ID.split("-");  
  var vipsil = DurumID[1];
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "Islem/elan_islem.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("vipsil=" + vipsil);
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
     window.history.back();
   }
 }
}
/* Katagorya durum kontrol*/










</script>

<?php require_once "_footer.php" ?>