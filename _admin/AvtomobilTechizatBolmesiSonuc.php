<?php 
require_once "_header.php";
require_once "_menu.php"; 
$avtomobil_techizat_bolmesi_id_kodla=$_GET['avtomobil_techizat_bolmesi_id_kodla'];
$avtomobil_techizat_bolmesi_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_id_kodla=:avtomobil_techizat_bolmesi_id_kodla order by avtomobil_techizat_bolmesi_id DESC LIMIT 1");
$avtomobil_techizat_bolmesi_sor->execute(array(
  'avtomobil_techizat_bolmesi_id_kodla'=>$avtomobil_techizat_bolmesi_id_kodla));
$say=$avtomobil_techizat_bolmesi_sor->rowCount();
if ($say!=1) {
  header("Location:AvtomobilTechizatBolmesi");
  exit;
}
?>


<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">


      <?php 

      if(isset($_GET['durum'])){
        if ($_GET['durum']=="ok") { ?>
          <span style="color: #00e600;"><i class="fas fa-check"></i> Yeni Avtomobil Təchizatı Bölməsi Əlavə Olundu  </span>
        <?php  }
        elseif ($_GET['durum']=="yok") { ?>
          <span style="color: #00e600;"><i class="fas fa-check"></i> Yeni Avtomobil Təchizatı Bölməsi Yeniləndi  </span>
        <?php  } 
        elseif ($_GET['durum']=="var") { ?>
          <span style="color: #ff0000;"><i class="fas fa-times"></i> Avtomobil Təchizatı Bölməsi Mövcutdur</span>
        <?php  }
        else{
          header("Location:AvtomobilTechizatBolmesi");
          exit;
          echo "Avtomobil Təchizatı Bölməsi Tənzimlənmələri";
        }
      } else{
        header("Location:AvtomobilTechizatBolmesi");
      }
      ?>

    </div>    
  </div>





  <div id="ListelemeAlaniKapsayicisi">
    <div class="SayfaIciBaslikAlanlariKapsayicisi">
      <a href="AvtomobilTechizatBolmesi">Avtomobil Təchizatı Bölməsi</a>
      <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
        <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
          <a href="javascript:void(0)" onclick="YeniAvtomobilTəchizatBölməsi()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
        </div>
      </span>
    </div>

    <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
      <form id="AramaFormu" name="AramaFormu" action="dovletler" method="GET">
        <div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
        <div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
      </form>
    </div>


    <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
      <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
        <thead>
          <th class="ListelemeAlaniIciTablosuSiraNomiresi">№</th>
          <th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="">ID</a></th>
          <th><a href="">Adı</a></th>        
          <th class="KodSutunu">Durum</th>
          <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
        </thead>
        <tbody>
          <?php       
          while ($avtomobil_techizat_bolmesicek= $avtomobil_techizat_bolmesi_sor->fetch(PDO::FETCH_ASSOC)) {
           $avtomobil_techizat_bolmesi_id=$avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_id'];
           $avtomobil_techizat_bolmesi_ad=$avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_ad'];
           ;

           $say++;
           ?>
           <tr>

            <td class="SiraNomresiSutunu"> 
              <div class="SiraNomresi">
               <?php echo $say ?>
             </div>

           </td>
           <td class="SiraNomresiSutunu"> 
            <div class="SiraNomresi">
             <?php echo $avtomobil_techizat_bolmesi_id ?>
           </div>

         </td>
         <td id="avtomobil_techizat_bolmesi_ad-<?php echo $avtomobil_techizat_bolmesi_id ?>"><?php echo $avtomobil_techizat_bolmesi_ad ?></td>
         <td class="KodSutunu">

          <label class="checkbox">
            <input <?php if($avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_durum']==1){
              echo "checked";
            }else{
              echo "";
            } ?>  type="checkbox" id="<?php echo 'dovletdurum-'.$avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_id'] ?>" onchange="AvtomobilTechizatiBolmesiDurumKontrol(id)" > 
            <span class="checkbox"> 
              <span></span>
            </span>
          </label>

        </td>

        <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
          <a href="javascript:AvtomobilTechizatiBolmesiYenileAc(<?php echo $avtomobil_techizat_bolmesi_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
          <a href="javascript:AvtomobilTechizatBolmesiSil(<?php echo $avtomobil_techizat_bolmesi_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
        </td>

      </tr>
    <?php } ?>
  </tbody>

</table>

</div>



















</div>
</section>



<?php require_once "_footer.php" ?>

<script type="text/javascript">


  function YeniAvtomobilTəchizatBölməsi() {
    var formbaslaxic = '<form action="Islem/avtomobil_techizati_bolmesi_islem.php" method="POST" name="IslemFormu" ';
    var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_bolmesi_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"> <input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100"  id="avtomobil_techizat_bolmesi_ad"  tabindex="1" required="" name="avtomobil_techizat_bolmesi_ad"/></div></div></div>';
    var meksed = '<input type="hidden" id="YeniAvtomobilTechizatiBolmesi" name="YeniAvtomobilTechizatiBolmesi" ';
    var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari" name="YeniAvtomobilTechizatiBolmesi" onClick="FormIslemleriKontrol()" tabindex="5">Əlavə Et</button>' +
    '<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
    var formbitis = '</form>';
    document.getElementById("modalformalaniici").innerHTML = formbaslaxic + adi+meksed + buttonalani + formbitis;
    document.getElementById("Modal").style.display = "block";
    document.getElementById("ModalAlani").style.display = "block";
  }


  function AvtomobilTechizatiBolmesiYenileAc(id) {
    var avtomobil_techizat_bolmesi_ad = "avtomobil_techizat_bolmesi_ad-" + id;
    var x = document.getElementById(avtomobil_techizat_bolmesi_ad).innerHTML;
    var formbaslaxic = '<form action="Islem/avtomobil_techizati_bolmesi_islem.php" method="POST" name="IslemFormu" ';
    var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_bolmesi_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"> <input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100"  id="avtomobil_techizat_bolmesi_ad"  tabindex="1" required="" name="avtomobil_techizat_bolmesi_ad"/></div></div></div>';
    var yenileid = '<input type="hidden" id="yenileid" name="avtomobil_techizat_bolmesi_id"> ';   
    var meksed = '<input type="hidden" id="AvtomobilTechizatiBolmesiYenile" name="AvtomobilTechizatiBolmesiYenile">';
    var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Yenilə</button>' +
    '<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
    var formbitis = '</form>';
    document.getElementById("modalformalaniici").innerHTML = formbaslaxic   + adi  + yenileid + meksed  + buttonalani + formbitis;
    document.getElementById('yenileid').setAttribute("value", id);
    document.getElementById('avtomobil_techizat_bolmesi_ad').setAttribute("value", x);
    document.getElementById("Modal").style.display = "block";
    document.getElementById("ModalAlani").style.display = "block";
  }



  function FormIslemleriKontrol() {
    if (document.getElementById("avtomobil_techizat_bolmesi_ad")) {
      if (document.getElementById("avtomobil_techizat_bolmesi_ad").value == "") {
        var avtomobil_techizat_bolmesi_ad = document.getElementById("avtomobil_techizat_bolmesi_ad");
        document.getElementById("avtomobil_techizat_bolmesi_ad_metni").style.color = "#ff0000";
        avtomobil_techizat_bolmesi_ad.style.outline = "none";
        avtomobil_techizat_bolmesi_ad.style.border = "2px solid #ff0000";
        avtomobil_techizat_bolmesi_ad.style.color = "#ff0000";
        avtomobil_techizat_bolmesi_ad.focus();
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


  /*AVtomobil Techizati Bolmesi Listeleme Limiti*/
  function AvtomobilTechizatBolmesiListelemeLimiti(Deyer) {
    var avtomobil_techizati_bolme_siralam = Deyer
    var avtomobil_techizati_bolme_siralam_xhttp = new XMLHttpRequest();
    avtomobil_techizati_bolme_siralam_xhttp.open("POST", "Islem/avtomobil_techizati_bolmesi_islem.php", true);
    avtomobil_techizati_bolme_siralam_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    avtomobil_techizati_bolme_siralam_xhttp.send("avtomobil_techizati_bolme_siralam=" + avtomobil_techizati_bolme_siralam);
    avtomobil_techizati_bolme_siralam_xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.reload()
      }
    }
  }
  /*AVtomobil Techizati Bolmesi Listeleme Limiti*/

  /*Avtomobil Techizati Bolmesi Durum Kontrol*/
  function AvtomobilTechizatiBolmesiDurumKontrol(ID) {
    var DurumID = ID.split("-");
    var avtomobil_techizat_bolmesi_durum_id = DurumID;
    avtomobil_techizat_bolmesi_id_xhttp = new XMLHttpRequest();
    avtomobil_techizat_bolmesi_id_xhttp.open("POST", "Islem/avtomobil_techizati_bolmesi_islem.php", true);
    avtomobil_techizat_bolmesi_id_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    avtomobil_techizat_bolmesi_id_xhttp.send("avtomobil_techizat_bolmesi_durum_id=" + avtomobil_techizat_bolmesi_durum_id);
    avtomobil_techizat_bolmesi_id_xhttp.onreadystatechange = function () {
    }
  }
  /*Avtomobil Techizati Bolmesi Durum Kontrol*/





  function AvtomobilTechizatBolmesiSil(IDDegeri) {
    document.getElementById("AvtomobilTechizatiBolmesiSilKaratmaAlani").style.display = "block";
    document.getElementById("AvtomobilTechizatiBolmesiSilModalAlani").style.display = "block";
    document.getElementById("AvtomobilTechizatiBolmesiSilModalMetinAlani").innerHTML = "Avtomobil təchizatı bölməsi qeydiyatını silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin Avtomobil təchizatına bağlı bütün <b>Təchizatlar</b>  silinəcək.";
    document.getElementById("AvtomobilTechizatiBolmesiSilIslemiOnaylaButonu").href = "javascript:AvtomobilTechizatiBolmesiSilTesdiq(" + IDDegeri + ")";
    document.getElementById("AvtomobilTechizatiBolmesiSilIslemiOnaylaButonuKapsayicisi").style.display = "block";
    document.getElementById("AvtomobilTechizatiBolmesiSilIslemiIptalButonuKapsayicisi").style.display = "block";
  }

  function AvtomobilTechizatiBolmesiSilImtina() {
    document.getElementById("AvtomobilTechizatiBolmesiSilKaratmaAlani").style.display = "none";
    document.getElementById("AvtomobilTechizatiBolmesiSilModalAlani").style.display = "none";
    document.getElementById("AvtomobilTechizatiBolmesiSilModalMetinAlani").innerHTML = "";
    document.getElementById("AvtomobilTechizatiBolmesiSilIslemiOnaylaButonu").href = "";
    document.getElementById("AvtomobilTechizatiBolmesiSilIslemiOnaylaButonuKapsayicisi").style.display = "none";
    document.getElementById("AvtomobilTechizatiBolmesiSilIslemiIptalButonuKapsayicisi").style.display = "none";
  }


  function AvtomobilTechizatiBolmesiSilTesdiq(IDDegeri) {
    var AvtomobilTechizatiBolmesiSilId = IDDegeri;
    var AvtomobilTechizatiBolmesiSilId_xhttp = new XMLHttpRequest();
    AvtomobilTechizatiBolmesiSilId_xhttp.open("POST", "Islem/avtomobil_techizati_bolmesi_islem.php", true);
    AvtomobilTechizatiBolmesiSilId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    AvtomobilTechizatiBolmesiSilId_xhttp.send("AvtomobilTechizatiBolmesiSilId=" + AvtomobilTechizatiBolmesiSilId);
    AvtomobilTechizatiBolmesiSilId_xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location = "avtomobilaechizatbolmesisilindi?durum=ok"
      }
    }
  }






</script>