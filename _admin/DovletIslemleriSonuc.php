<?php
require_once "_header.php";
require_once "_menu.php";
$SEO_URL = $_GET['SEO_URL'];
$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama * $DovletlerListelemeLimiti) - $DovletlerListelemeLimiti;
$BulunanSayfaSayisi                 = ceil($dovletsayi / $DovletlerListelemeLimiti);
$dovletsor = $db->prepare("SELECT * FROM dovlet where SEO_URL=:SEO_URL order by Dovlet_Id DESC LIMIT 1");
$dovletsor->execute(array(
  'SEO_URL' => $SEO_URL
));

$say = $dovletsor->rowCount();
if ($say != 1) {
  header("Location:dovletler");
  exit;
}

?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      <?php

      if (isset($_GET['durum'])) {     
        if ($_GET['durum'] == md5("ok")) { ?>
          <span style="color: #00e600;"><i class="fas fa-check"></i> Yeni Dövlət Əlavə Olundu </span>
        <?php  } elseif ($_GET['durum'] ==  md5("yenileok")) { ?>
          <span style="color: #00e600;"><i class="fas fa-check"></i> Dövlət Yenilənməsi Uğurlu </span>
        <?php }elseif($_GET['durum'] == md5("var")){?>
          <span style="color: #ff0000;"><i class="fas fa-times"></i> Əlavə Etmək İstədiyiniz Dövlət Bazada Var </span>
        <?php } elseif($_GET['durum'] == md5("dovletvar")){?> 
          <span style="color: #ff0000;"><i class="fas fa-times"></i> Məlumatlar Bazada Var!  </span>
         <?php } else {

          header("Location:dovletler");
          exit;
          echo "Dövlət Tənzimlənmələri";
        }
      } else {
        header("Location:dovletler");
      }
      ?>
    </div>
  </div>
  <div id="ListelemeAlaniKapsayicisi">
    <div class="SayfaIciBaslikAlanlariKapsayicisi">
      <a href="dovletler">Dövlətlər</a>
      <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
        <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
         <a href="dovletyeni" ><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
       </div>
     </span>
   </div>
   <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
    <form id="AramaFormu" name="AramaFormu" action="dovletler" method="GET">
      <div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
      <div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi">
        <div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div>
      </div>
    </form>
  </div>
  <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
    <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
      <thead>
        <th class="KodSutunu">ID</th>
        <th class="KodSutunu">Rəqəm<br>Kodu </th> 
        <th>Adı</th>
        <th>Beynelxalq Adı</th>
        <th class="KodSutunu">ISO KODU <br> ALFA 2</th>        
        <th class="KodSutunu">ISO KODU <br> ALFA 3</th> 
        <th class="KodSutunu">Telefon <br> Kodu</th> 
        <th class="KodSutunu">Valyuta <br> Kodu</th>
        <th class="KodSutunu">Müstəqillik <br> Tarixi</th>
        <th class="KodSutunu">Durum</th>
        <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
      </thead>
      <tbody>


        <?php 


        while ($dovletcek= $dovletsor->fetch(PDO::FETCH_ASSOC)) {
          $Dovlet_Id=$dovletcek['Dovlet_Id'];
          $Dovlet_Reqem_Kodu=$dovletcek['Dovlet_Reqem_Kodu'];
          $Dovlet_bayraq=$dovletcek['Dovlet_bayraq'];
          $Dovlet_Ad=$dovletcek['Dovlet_Ad'];
          $Dovlet_Beynelxalq_Adi=$dovletcek['Dovlet_Beynelxalq_Adi'];
          $ISO_KODU_ALFA_2=$dovletcek['ISO_KODU_ALFA_2'];
          $ISO_KODU_ALFA_3=$dovletcek['ISO_KODU_ALFA_3'];
          $Dovlet_Telefon_Kodu=$dovletcek['Dovlet_Telefon_Kodu'];
          $Dovlet_Valyuta_Kodu=$dovletcek['Dovlet_Valyuta_Kodu'];
          $Dovlet_Musteqillik_Tarixi=$dovletcek['Dovlet_Musteqillik_Tarixi'];
          ?>
          <tr>    
            <td class="KodSutunu"> 

              <?php echo sprintf("%06s", $Dovlet_Id ); ?>


            </td>
            <td id="Dovlet_Reqem_Kodu-<?php echo $Dovlet_Id ?>" class="KodSutunu"><?php echo sprintf("%03s", $Dovlet_Reqem_Kodu ) ?></td>
            <td id="Dovlet_Ad-<?php echo $Dovlet_Id ?>"><?php echo $Dovlet_Ad ?></td>
            <td id="Dovlet_Beynelxalq_Adi-<?php echo $Dovlet_Id ?>"><?php echo $Dovlet_Beynelxalq_Adi ?></td>
            <td id="ISO_KODU_ALFA_2-<?php echo $Dovlet_Id ?>" class="KodSutunu"><?php echo $ISO_KODU_ALFA_2 ?></td>
            <td id="ISO_KODU_ALFA_2-<?php echo $Dovlet_Id ?>" class="KodSutunu"><?php echo $ISO_KODU_ALFA_3 ?></td>
            <td id="Dovlet_Telefon_Kodu-<?php echo $Dovlet_Id ?>" class="TelKodSutunu"><?php echo $Dovlet_Telefon_Kodu ?></td>
            <td id="Dovlet_Valyuta_Kodu-<?php echo $Dovlet_Id ?>" class="TelKodSutunu"><?php echo $Dovlet_Valyuta_Kodu ?></td>
            <td id="Dovlet_Musteqillik_Tarixi-<?php echo $Dovlet_Id ?>" class="TelKodSutunu"><?php echo $Dovlet_Musteqillik_Tarixi ?></td>
            <td class="KodSutunu">  
              <label class="checkbox">
                <input <?php if($dovletcek['Durum']==1){
                  echo "checked";
                }else{
                  echo "";
                } ?>  type="checkbox" id="<?php echo 'dovletdurum-'.$dovletcek['Dovlet_Id'] ?>" onchange="DovletDurumKontrol(this.id)" > 
                <span class="checkbox"> 
                  <span></span>
                </span>
              </label>
            </td>
            <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
              <a href="<?php echo 'dovletyenile-'.$dovletcek['Dovlet_Id']."-".$dovletcek['SEO_URL'] ?>"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
              <a href="javascript:DovletSil(<?php echo $Dovlet_Id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>

  </div>



















</div>
</section>


<script type="text/javascript">

function DovletDurumKontrol(ID) {
  var DurumID = ID.split("-");
  var Durum_id = DurumID[1];
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "Islem/dovlet_islem.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("Durum_id=" + Durum_id);
  xhttp.onreadystatechange = function () {
  }
}


function DovletSil(IDDegeri) {
  document.getElementById("DovletSilKaratmaAlani").style.display = "block";
  document.getElementById("DovletSilModalAlani").style.display = "block";
  document.getElementById("ModalMetinAlani").innerHTML = "Dövlət qeydiyatını silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin dövlətə bağlı bağlı bütün qeydiyatlar silinəcək.";
  document.getElementById("SilIslemiOnaylaButonu").href = "javascript:DovletSilTesdiq(" + IDDegeri + ")";
  document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display = "block";
  document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display = "block";
}

function DovletSilImtina() {
  document.getElementById("DovletSilKaratmaAlani").style.display = "none";
  document.getElementById("DovletSilModalAlani").style.display = "none";
  document.getElementById("ModalMetinAlani").innerHTML = "";
  document.getElementById("SilIslemiOnaylaButonu").href = "";
  document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display = "none";
  document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display = "none";
}


function DovletSilTesdiq(IDDegeri) {
  var dovlet_sil_id = IDDegeri;
  var dovlet_sil_id_xhttp = new XMLHttpRequest();
  dovlet_sil_id_xhttp.open("POST", "Islem/dovlet_islem.php", true);
  dovlet_sil_id_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  dovlet_sil_id_xhttp.send("dovlet_sil_id=" + dovlet_sil_id);
  dovlet_sil_id_xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.location.reload()
    }
  }
}
</script>
<?php require_once "_footer.php" ?>