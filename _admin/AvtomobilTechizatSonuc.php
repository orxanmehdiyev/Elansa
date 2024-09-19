<?php 
require_once "_header.php";
require_once "_menu.php"; 
$avtomobil_techizat_id_kodla=$_GET['avtomobil_techizat_id_kodla'];
$AvtomobilTechizatSor=$db->prepare("SELECT * FROM avtomobil_techizat where avtomobil_techizat_id_kodla=:avtomobil_techizat_id_kodla");
$AvtomobilTechizatSor->execute(array(
  'avtomobil_techizat_id_kodla'=>$avtomobil_techizat_id_kodla));
$say=$AvtomobilTechizatSor->rowCount();
if ($say!=1) {
  header("Location:AvtomobilTechizati");
  exit;
}
$AvtomobilTechizatiCek= $AvtomobilTechizatSor->fetch(PDO::FETCH_ASSOC);
$avtomobil_techizat_bolmesi_id= $AvtomobilTechizatiCek['avtomobil_techizat_bolmesi_id'];
$avtomobil_techizat_ad= $AvtomobilTechizatiCek['avtomobil_techizat_ad'];
$avtomobil_techizat_id= $AvtomobilTechizatiCek['avtomobil_techizat_id'];
?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      <?php 
      if(isset($_GET['durum'])){
        if ($_GET['durum']=="ok") { ?>
         <span style="color: #00e600;"><i class="fas fa-check"></i> Avtomobil Təchizatı Əlavə Olundu  </span>
       <?php  }
       elseif ($_GET['durum']=="var") { ?>
        <span style="color: #ff0000;"><i class="fas fa-times"></i> Bu Təchizat Mövcutdur  </span>
      <?php  } 
      elseif ($_GET['durum']=="yok") { ?>
        <span style="color: #00e600;"><i class="fas fa-check"></i> Uğurla Yeniləndi  </span>
      <?php  } 
      else{
        header("Location:AvtomobilTechizati");
        exit;
        echo "Avtomobil Təchizat Tənzimlənmələri";
      }
    } else{
      header("Location:AvtomobilTechizati");
    }
    ?>
  </div>    
</div>
<div id="ListelemeAlaniKapsayicisi">
  <div class="SayfaIciBaslikAlanlariKapsayicisi">
    <a href="AvtomobilTechizati">Avtomobil Təchizat</a>
    <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
      <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
        <a href="javascript:void(0)" onclick="Yeni()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
      </div>
    </span>
  </div>
  <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
    <form id="AramaFormu" name="AramaFormu" action="AvtomobilTechizati" method="GET">
      <div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
      <div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
    </form>
  </div>
  <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
    <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
      <thead>
        <th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="">ID</a></th>
        <th><a href="">Bölmə</a></th>
        <th><a href="">Adı</a></th>
        <th class="KodSutunu">Durum</th>
        <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
      </thead>
      <tbody>
        <tr>    
          <td class="SiraNomresiSutunu"> 
            <div class="SiraNomresi">
              <?php echo sprintf("%06s", $avtomobil_techizat_id ); ?>
            </div>

          </td>

          <td> 
            <?php 
            $avtomobil_techizat_bolmesi_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id ");
            $avtomobil_techizat_bolmesi_sor->execute(array(
              'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
            $avtomobil_techizat_bolmesicek= $avtomobil_techizat_bolmesi_sor->fetch(PDO::FETCH_ASSOC);
            echo $avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_ad'];
            ?>
            <input type="hidden" name="avtomobil_techizat_bolmesi_id" id="avtomobiltechizatbolmesiad-<?php echo $avtomobil_techizat_id ?>" value=" <?php echo $avtomobil_techizat_bolmesi_id; ?> ">
          </td>
          <td id="avtomobil_techizat_ad-<?php echo $avtomobil_techizat_id ?>"><?php echo $avtomobil_techizat_ad ?></td>
          <td class="KodSutunu">
            <label class="checkbox">
              <input <?php if($AvtomobilTechizatiCek['avtomobil_techizat_durum']==1){
                echo "checked";
              }else{
                echo "";
              } ?>  type="checkbox" id="<?php echo 'dovletdurum-'.$AvtomobilTechizatiCek['avtomobil_techizat_id'] ?>" onchange="AvtomobilTechizatiDurumKontrol(id)" > 
              <span class="checkbox"> 
                <span></span>
              </span>
            </label>
          </td>
          <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
            <a href="javascript:AvtomobilTechizatiYenile(<?php echo strval($avtomobil_techizat_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
            <a href="javascript:AvtomobilTechizatiSil(<?php echo $avtomobil_techizat_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</section>
<div id="YeniAvtomobilTechizatiUcunBolme" style="display: none;">
  <?php
  $AvtomobilTecizatBolmesiSor = $db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_durum=:avtomobil_techizat_bolmesi_durum");
  $AvtomobilTecizatBolmesiSor->execute(array(
    'avtomobil_techizat_bolmesi_durum' => 1
  ));
  ?>
  <select name="avtomobil_techizat_bolmesi_id_sec" tabindex="2" required="required" id="avtomobil_techizat_bolmesi_id_sec" class="FormAlanlariUcunSelectInputlari" onchange="SelectInputAlaniSecildi(this.id)">
    <option disabled="disabled" value="" selected="selected"> Secin...</option>
    <?php
    while ($AvtomobilTecizatBolmesiCek = $AvtomobilTecizatBolmesiSor->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <option value="<?php echo $AvtomobilTecizatBolmesiCek['avtomobil_techizat_bolmesi_id'] ?>"><?php echo $AvtomobilTecizatBolmesiCek['avtomobil_techizat_bolmesi_ad'] ?></option>
    <?php } ?>
  </select>
</div>
<?php require_once "_footer.php" ?>
<script type="text/javascript">


  function Yeni() {
    var formbaslaxic = '<form action="Islem/avtomobil_techizati_islem.php" method="POST" name="IslemFormu" ';
    var x = document.getElementById("YeniAvtomobilTechizatiUcunBolme").innerHTML;
    var bolmeadi='<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_bolmesi_id_sec_metni">Təchizat Bölməsi <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+x+'</div></div></div>';
    var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"> <input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100"  id="avtomobil_techizat_ad"  tabindex="1" required="" name="avtomobil_techizat_ad"/></div></div></div>';
    var meksed = '<input type="hidden" id="YeniAvtomobilTechizati" name="YeniAvtomobilTechizati" ';
    var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Əlavə Et</button>' +
    '<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
    var formbitis = '</form>';
    document.getElementById("modalformalaniici").innerHTML = formbaslaxic +bolmeadi+ adi+meksed + buttonalani + formbitis;
    document.getElementById("Modal").style.display = "block";
    document.getElementById("ModalAlani").style.display = "block";
  }


  function AvtomobilTechizatiYenile(id) {
    var avtomobil_techizat_ad = "avtomobil_techizat_ad-" + id;
    var avtomobiltechizatbolmesiad = "avtomobiltechizatbolmesiad-" + id;
    var x = document.getElementById(avtomobil_techizat_ad).innerHTML;
    var formbaslaxic = '<form action="Islem/avtomobil_techizati_islem.php" method="POST" name="IslemFormu" ';
    var bolmeadi='<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_bolmesi_id_sec_metni">Təchizat Bölməsi <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi" id="Techizatbolmesisecimalani"></div></div></div>';
    var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"> <input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100"  id="avtomobil_techizat_ad"  tabindex="1" required="" name="avtomobil_techizat_ad"/></div></div></div>';
    var yenileid = '<input type="hidden" id="avtomobil_techizat_id" name="avtomobil_techizat_id"> ';    
    var meksed = '<input type="hidden" id="Yenile" name="Yenile">';
    var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Yenilə</button>' +
    '<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
    var formbitis = '</form>';
    document.getElementById("modalformalaniici").innerHTML = formbaslaxic +bolmeadi+ adi+meksed+yenileid + buttonalani + formbitis;
    document.getElementById('avtomobil_techizat_id').setAttribute("value", id);
    document.getElementById('avtomobil_techizat_ad').setAttribute("value", x);
    var e = document.getElementById(avtomobiltechizatbolmesiad).value;
    var AvtomobilTechizatiBolmesiTelebET = new XMLHttpRequest();
    AvtomobilTechizatiBolmesiTelebET.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Techizatbolmesisecimalani").innerHTML = " ";
        document.getElementById("Techizatbolmesisecimalani").innerHTML = this.responseText;
      }
    };
    AvtomobilTechizatiBolmesiTelebET.open("GET", "AnliqYenilenmeler/AvtomobilTechizatiBolmesiTelebET.php?AvtomobilTechizatiBolmesi=" + e, true);
    AvtomobilTechizatiBolmesiTelebET.send();
    document.getElementById("Modal").style.display = "block";
    document.getElementById("ModalAlani").style.display = "block";
  }






  function FormIslemleriKontrol() {
    if (document.getElementById("avtomobil_techizat_bolmesi_id_sec")) {
      if (document.getElementById("avtomobil_techizat_bolmesi_id_sec").value == "") {
        var avtomobil_techizat_bolmesi_id_sec = document.getElementById("avtomobil_techizat_bolmesi_id_sec");
        document.getElementById("avtomobil_techizat_bolmesi_id_sec_metni").style.color = "#ff0000";
        avtomobil_techizat_bolmesi_id_sec.style.outline = "none";
        avtomobil_techizat_bolmesi_id_sec.style.border = "2px solid #ff0000";
        avtomobil_techizat_bolmesi_id_sec.style.color = "#ff0000";
        return;
      }
    }
    if (document.getElementById("avtomobil_techizat_ad")) {
      if (document.getElementById("avtomobil_techizat_ad").value == "") {
        var avtomobil_techizat_ad = document.getElementById("avtomobil_techizat_ad");
        document.getElementById("avtomobil_techizat_ad_metni").style.color = "#ff0000";
        avtomobil_techizat_ad.style.outline = "none";
        avtomobil_techizat_ad.style.border = "2px solid #ff0000";
        avtomobil_techizat_ad.style.color = "#ff0000";
        avtomobil_techizat_ad.focus();
        return;
      }
    }
    document.IslemFormu.submit();
  }


  function MetinInputAlaniYazildi(deyer) {
    InputIcerikDeyeri=document.getElementById(deyer);
    if (InputIcerikDeyeri.value.length > InputIcerikDeyeri.maxLength) 
      InputIcerikDeyeri.value = InputIcerikDeyeri.value.slice(0, InputIcerikDeyeri.maxLength)
    var InputLabelMetni=deyer+"_metni";
    if (InputIcerikDeyeri.value == "") {      
      document.getElementById(InputLabelMetni).style.color = "#ff0000";
      InputIcerikDeyeri.style.color = "#ff0000";
      InputIcerikDeyeri.style.borderColor = "#ff0000";
      InputIcerikDeyeri.style.boxShadow = " 1px 0px 1px 0px #ff0000";
      InputIcerikDeyeri.classList.add("pleysoldercolorqirmizi");
      return;
    } else {
      document.getElementById(InputLabelMetni).style.color = "#2A3F54";
      InputIcerikDeyeri.style.color = "#2A3F54";
      InputIcerikDeyeri.style.borderColor = "#2A3F54";
      InputIcerikDeyeri.style.boxShadow = " 0px 0px 0px 0px #2A3F54";
      InputIcerikDeyeri.classList.remove("pleysoldercolorqirmizi");
      var Yoxla = InputIcerikDeyeri.value;      
      var YoxlanisNeticesi = Yoxla.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə\/\-()\s+]/g, "");
      InputIcerikDeyeri.value = YoxlanisNeticesi;
      return;
    }
  }

  function SagVeSolBosluklariSIl(deyer){
    InputIcerikDeyeri=document.getElementById(deyer);
    var Yoxlabir = InputIcerikDeyeri.value;   
    var Yoxla=Yoxlabir.trim();  
    InputIcerikDeyeri.value = Yoxla;
  }
  /*Avtomobil T'chizati Bomesi secildi*/
  function SelectInputAlaniSecildi(id) {
    var InputLabelMetni=id+"_metni";
    document.getElementById(InputLabelMetni).style.color = "#2A3F54";
    document.getElementById(id).style.color = "#2A3F54";
    document.getElementById(id).style.borderColor = "#2A3F54";
    document.getElementById(id).style.border = "1px solid #2A3F54";
  }
  /*Avtomobil T'chizati Bomesi secildi*/



  function AvtomobilTechizatiListelemeLimiti(Deyer) {
    var avtomobil_techizat_listeleme_limiti = Deyer
    var avtomobil_techizat_listeleme_siralam_xhttp = new XMLHttpRequest();
    avtomobil_techizat_listeleme_siralam_xhttp.open("POST", "Islem/avtomobil_techizati_islem.php", true);
    avtomobil_techizat_listeleme_siralam_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    avtomobil_techizat_listeleme_siralam_xhttp.send("avtomobil_techizat_listeleme_limiti=" + avtomobil_techizat_listeleme_limiti);
    avtomobil_techizat_listeleme_siralam_xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.reload()
      }
    }
  }
  /*Avtomobil Techizati Durum Kontrol*/
  function AvtomobilTechizatiDurumKontrol(ID) {
    var DurumID = ID.split("-");
    var AvtomobilTechizatiDurumId = DurumID;
    var AvtomobilTechizatiDurumId_xhttp = new XMLHttpRequest();
    AvtomobilTechizatiDurumId_xhttp.open("POST", "Islem/avtomobil_techizati_islem.php", true);
    AvtomobilTechizatiDurumId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    AvtomobilTechizatiDurumId_xhttp.send("AvtomobilTechizatiDurumId=" + AvtomobilTechizatiDurumId);
  }
  /*Avtomobil Techizati Durum Kontrol*/







  function AvtomobilTechizatiSil(IDDegeri) {
    document.getElementById("SilKaratmaAlani").style.display = "block";
    document.getElementById("SilModalAlani").style.display = "block";
    document.getElementById("SilModalMetinAlani").innerHTML = "Avtomobil təchizatı qeydiyatını silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin <b>Avtomobil təchizatı</b> silinəcək.";
    document.getElementById("SilIslemiOnayButonu").href = "javascript:AvtomobilTechizatiSilTesdiq(" + IDDegeri + ")";
    document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
    document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
  }

  function AvtomobilTechizatiSilImtina() {
    document.getElementById("SilKaratmaAlani").style.display = "none";
    document.getElementById("SilModalAlani").style.display = "none";
    document.getElementById("SilModalMetinAlani").innerHTML = "";
    document.getElementById("SilIslemiOnayButonu").href = "";
    document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "none";
    document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "none";
  }


  function AvtomobilTechizatiSilTesdiq(IDDegeri) {
    var AvtomobilTechizatiSilId = IDDegeri;
    var AvtomobilTechizatiSilId_xhttp = new XMLHttpRequest();
    AvtomobilTechizatiSilId_xhttp.open("POST", "Islem/avtomobil_techizati_islem.php", true);
    AvtomobilTechizatiSilId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    AvtomobilTechizatiSilId_xhttp.send("AvtomobilTechizatiSilId=" + AvtomobilTechizatiSilId);
    AvtomobilTechizatiSilId_xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
              window.location = "avtomobilatechizatsilindi?durum=ok"
      }
    }
  }








</script>