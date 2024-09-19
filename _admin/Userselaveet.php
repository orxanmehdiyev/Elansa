<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici"> 
      <?php 
      if ($_GET['bos']=="ad") {?>
       <span style="color: red;"> Ad Boş Ola Bilməz </span>
     <?php  } elseif($_GET['bos']=="soyad"){ ?>
      <span style="color: red;"> Soyad Boş Ola Bilməz </span>
    <?php } elseif($_GET['bos']=="ataad"){ ?>
      <span style="color: red;"> Ata Adı Boş Ola Bilməz </span>
    <?php } elseif($_GET['bos']=="kimliknomir"){ ?>
      <span style="color: red;"> Kimlik Nömrəsi Boş Ola Bilməz </span>
    <?php } elseif($_GET['bos']=="fin"){ ?>
      <span style="color: red;"> FİN Kodu Boş Ola Bilməz </span>
    <?php } elseif($_GET['bos']=="tel"){ ?>
     <span style="color: red;"> Telefon Boş Ola Bilməz </span>
   <?php } elseif($_GET['bos']=="mail"){ ?>
    <span style="color: red;"> E-Maili Boş Ola Bilməz </span>
  <?php } elseif($_GET['bos']=="sifre"){ ?>
    <span style="color: red;"> Şifrəsi Boş Ola Bilməz </span>
  <?php } elseif($_GET['bos']=="cinsiyyet"){ ?>
    <span style="color: red;"> Cinsiyyət Secmədiniz </span>
  <?php } elseif($_GET['bos']=="xeta"){ ?>
    <span style="color: red;"> Xəta Baş Verdi </span>
  <?php }else{
    echo "Yeni İstifadəçi ";
  } ?>
</div>    
</div>


<div id="FormAlaniKapsayicisi">
  <form id="YeniIstifadeciFormu" name="YeniIstifadeciFormu" action="Islem/users_islem.php" method="POST">
    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="admin_soyad_metni">
          Soya Adı  <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" id="admin_soyad" name="admin_soyad" onfocusout="AdminSoyadiYazildi(id)" oninput="AdminSoyadiYazildi(id)"  required="" placeholder="Soya Adı"  class="FormAlanlariUcunTextInputlari" maxlength="50" tabindex="1">
        </div>
      </div>
    </div>

    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="admin_ad_metni">
          Adı <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" id="admin_ad" name="admin_ad" required="" onfocusout="AdminAdiYazildi(id)" oninput="AdminAdiYazildi(id)"    placeholder="Adı" class="FormAlanlariUcunTextInputlari" maxlength="50" tabindex="2">
        </div>
      </div>
    </div>

    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="admin_ata_ad_metni">
          Atasının Adı <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" id="admin_ata_ad" name="admin_ata_ad" placeholder="Atasının Adı" onfocusout="AdminAtaAdiYazildi(id)" oninput="AdminAtaAdiYazildi(id)"   required=""  class="FormAlanlariUcunTextInputlari" maxlength="50" tabindex="3">
        </div>
      </div>
    </div>


    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="admin_kimlik_nomir_metni">
          Şəxsiyyət Vəsiqəsinin № <span class="KirmiziYazi">*</span>
        </div>
        <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
          <input type="text" id="admin_kimlik_nomir" name="admin_kimlik_nomir" onfocusout="AdminSexsiyyetVesiqeseYazildi(id)" oninput="AdminSexsiyyetVesiqeseYazildi(id)" placeholder="Şəxsiyytə Vəsiqəsinin Serya Və nömrəsi"  required=""  class="FormAlanlariUcunTextInputlari" maxlength="11" tabindex="4">
        </div>
      </div>
    </div>

    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="admin_fin_metni">
         FİN Kod <span class="KirmiziYazi">*</span>
       </div>
       <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" id="admin_fin" name="admin_fin" onfocusout="FİNKodeYazildi(id)" oninput="FİNKodeYazildi(id)" placeholder="Şəxsiyyət Vəsiqəsinin fərdi İdentifikasiya Nömrəsi"  required=""  class="FormAlanlariUcunTextInputlari" maxlength="50" tabindex="5">
      </div>
    </div>
  </div>

  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="admin_tel_bir_metni">
       Telefon <span class="KirmiziYazi">*</span>
     </div>
     <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="number" id="admin_tel_bir" required=""  name="admin_tel_bir" onfocusout="TelefonBirYazildi(id)" oninput="TelefonBirYazildi(id)" placeholder="000 000 00 00"  class="FormAlanlariUcunTextInputlari" maxlength="10" min="99999999" max="9999999999" tabindex="6">
    </div>
  </div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     Telefon  <span class="KirmiziYazi">  </span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="number" id="admin_tel_iki"   name="admin_tel_iki" placeholder="000 000 00 00" onfocusout="ReqemlerXaricButunKarakterleriSil(id)" oninput="ReqemlerXaricButunKarakterleriSil(id)" class="FormAlanlariUcunTextInputlari" maxlength="10" min="99999999" max="9999999999" tabindex="7">
  </div>
</div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="admin_mail_metni">
     E-Mail <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="email" id="admin_mail" required=""  name="admin_mail" onfocusout="AdminElaveEtEmailYazildi(id)" oninput="AdminElaveEtEmailYazildi(id)" placeholder="E-Mail" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="8">
  </div>
</div>
</div>



<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="cinsiyyetmetni">
     Cinsiyyəti <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
      <span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
        <label class="FormAlanlariIciRadioButonAlani" onclick="AdminCinsiyyetSecildi()">
          <input type="radio" id="kisi"  tabindex="10"   name="admin_cinsiyyet" value="1" class="FormAlanlariIciRadioInputlari" >
          <span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Kişi</span>
        </label>
      </span>
      <span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
        <label class="FormAlanlariIciRadioButonAlani" onclick="AdminCinsiyyetSecildi()">
          <input type="radio" id="qadin"  tabindex="11"   name="admin_cinsiyyet" value="2" class="FormAlanlariIciRadioInputlari"  >
          <span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Qadın</span>
        </label>
      </span>
    </div>
  </div>
</div>
</div>
<input type="hidden" name="Yeni">
<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
  <button type="button" class="YenileButonlari"    onClick="IstifadeciFormKontrol()">Əlavə Et</button>

</div>

</form>


















</div>


</section>



<?php require_once "_footer.php" ?>