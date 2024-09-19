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
         <span style="color: #00e600;">Ümumi Tənzimlənmələr Yeniləndi  </span>
       <?php  }else{
         echo "Ümumi Tənzimlənmələr";
       }
     } else{
      echo "Ümumi Tənzimlənmələr";
    }
    ?>    
  </div>    
</div>
<div id="FormAlaniKapsayicisi">
  <form id="UmumiAyarlarFormu" name="UmumiAyarlarFormu" action="Islem/umumi_ayarlar_islem.php" method="POST" enctype="multipart/form-data">
    <div class="SeyfeIciSetirAlaniKapsayici">
      <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
        <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
         Tittle Mətni  <span class="KirmiziYazi">*</span>
       </div>
       <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" id="tittle_metni" name="tittle_metni" required="" value="<?php echo $tittle_metni ?>" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1">
      </div>
    </div>
  </div>
  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        Site Adı <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" id="site_adi" name="site_adi" value="<?php echo $site_adi ?>" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1">
      </div>
    </div>
  </div>
  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
        Səyfənin URL-si <span class="KirmiziYazi">*</span>
      </div>
      <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
        <input type="text" id="site_url" name="site_url" value="<?php echo $site_url ?>" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1">
      </div>
    </div>
  </div>
  <div class="SeyfeIciSetirAlaniKapsayici">
    <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
      <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
       Copyright Metni <span class="KirmiziYazi">*</span>
     </div>
     <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" id="footer_metni" name="footer_metni" value="<?php echo $footer_metni ?>" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1">
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     Faviconu [16px * 16px] <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani">
      <img src="img/IconDosyaYuklemeSiyah.png"><span id="SiteFaviconuDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span>
    </div>
    <label class="FormAlaniIciUploadAlanlari">
      <input type="file" id="fav_iconu" name="fav_iconu" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('fav_iconu', 'SiteFaviconuDosyaAdiAlani', 'SiteFaviconuSecimIptalAlani')">
      <span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="img/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Bax</span></span>
    </label>
    <div id="SiteFaviconuSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('fav_iconu', 'SiteFaviconuDosyaAdiAlani', 'SiteFaviconuSecimIptalAlani')" style="display: none;">İmtina</div>
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"> 
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      Ana Logo [196px * 54px] <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="img/IconDosyaYuklemeSiyah.png"><span id="SiteAnaLogosuDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
      <label class="FormAlaniIciUploadAlanlari">
        <input type="file" id="logo" name="logo" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('logo', 'SiteAnaLogosuDosyaAdiAlani', 'SiteAnaLogosuSecimIptalAlani')">
        <span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="img/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Bax</span></span>
      </label>
      <div id="SiteAnaLogosuSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('logo', 'SiteAnaLogosuDosyaAdiAlani', 'SiteAnaLogosuSecimIptalAlani')" style="display: none;">İmtina</div>
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     Description <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="text" id="description" required=""  name="description" value="<?php echo $description ?>" class="FormAlanlariUcunTextInputlari" maxlength="255" tabindex="1">
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     Keywords <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="text" id="keywords" required=""  name="keywords" value="<?php echo $keywords ?>" class="FormAlanlariUcunTextInputlari" maxlength="255" tabindex="1">
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     Author <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="text" id="author" required=""  name="author" value="<?php echo $author ?>" class="FormAlanlariUcunTextInputlari" maxlength="255" tabindex="1">
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     Telefon <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="number" id="ayar_tel" required=""  name="ayar_tel" value="<?php echo $ayar_tel ?>" class="FormAlanlariUcunTextInputlari" maxlength="10" min="99999999" max="9999999999" tabindex="1">
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     Telefon GSM <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="number" id="ayar_gsm" required=""  name="ayar_gsm" value="<?php echo $ayar_gsm ?>" class="FormAlanlariUcunTextInputlari" maxlength="10" min="99999999" max="9999999999" tabindex="1">
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     E-Mail <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="text" id="ana_mail" required=""  name="ana_mail" value="<?php echo $ana_mail ?>" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1">
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     E-Mail Şifrəsi <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <input type="text" id="ana_mail_sifresi" required=""  name="ana_mail_sifresi" value="<?php echo $ana_mail_sifresi ?>" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1">
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     POP3 Sunucu Bağlantı Türü <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
      <span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
        <label class="FormAlanlariIciRadioButonAlani">
          <input type="radio" id="POP3SunucuBaglantiTuruSecenekBir" name="POP3SunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari" <?php if($POP3SunucuBaglantiTuru=="SSL"){ ?>checked="checked"<?php } ?>>
          <span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
        </label>
      </span>
      <span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
        <label class="FormAlanlariIciRadioButonAlani">
          <input type="radio" id="POP3SunucuBaglantiTuruIki" name="POP3SunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari" <?php if($POP3SunucuBaglantiTuru=="TLS"){ ?>checked="checked"<?php } ?>>
          <span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">TLS</span>
        </label>
      </span>
    </div>
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      POP3 Sunucu Adresi <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" id="POP3SunucuAdresi" required=""  name="POP3SunucuAdresi" value="<?php echo $POP3SunucuAdresi ?>" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1">
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      POP3 Sunucu SSL Portu <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <div class="YuzPixselSinirliAlanKapsayicisi">
        <input type="number" id="POP3SunucusuSSLPortu" required=""  name="POP3SunucusuSSLPortu" value="<?php echo $POP3SunucusuSSLPortu ?>" class="FormAlanlariUcunTextInputlari" maxlength="3" min="0" max="999">
      </div>
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      POP3 Sunucu TLS Portu <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <div class="YuzPixselSinirliAlanKapsayicisi">
        <input type="number" id="POP3SunucusuTLSPortu" required=""  name="POP3SunucusuTLSPortu" value="<?php echo $POP3SunucusuTLSPortu ?>" class="FormAlanlariUcunTextInputlari" maxlength="3" min="0" max="999">
      </div>
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     SMTP Sunucu Bağlantı Türü <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
      <span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
        <label class="FormAlanlariIciRadioButonAlani">
          <input type="radio" id="SMTPSunucuBaglantiTuruBir" required=""  name="SMTPSunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari" <?php if($SMTPSunucuBaglantiTuru=="SSL"){ ?>checked="checked"<?php } ?>>
          <span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
        </label>
      </span>
      <span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
        <label class="FormAlanlariIciRadioButonAlani">
          <input type="radio" id="SMTPSunucuBaglantiTuruIki" required=""  name="SMTPSunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari" <?php if($SMTPSunucuBaglantiTuru=="TLS"){ ?>checked="checked"<?php } ?>>
          <span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">TLS</span>
        </label>
      </span>
    </div>
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      SMTP Sunucu Adresi <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" id="SMTPSunucuAdresi" name="SMTPSunucuAdresi" required=""  value="<?php echo $SMTPSunucuAdresi ?>" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1">
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      SMTP Sunucu SSL Portu <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <div class="YuzPixselSinirliAlanKapsayicisi">
        <input type="number" id="SMTPSunucusuSSLPortu" name="SMTPSunucusuSSLPortu" required=""  value="<?php echo $SMTPSunucusuSSLPortu ?>" class="FormAlanlariUcunTextInputlari" maxlength="3" min="0" max="999">
      </div>
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      SMTP Sunucu TLS Portu <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <div class="YuzPixselSinirliAlanKapsayicisi">
        <input type="number" id="SMTPSunucusuTLSPortu" required=""  name="SMTPSunucusuTLSPortu" value="<?php echo $SMTPSunucusuTLSPortu ?>" class="FormAlanlariUcunTextInputlari" maxlength="3" min="0" max="999">
      </div>
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      Maps <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" id="maps" name="maps" value="<?php echo $maps ?>" required=""  class="FormAlanlariUcunTextInputlari" maxlength="255" tabindex="1">
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      Analystic <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" id="analystic" name="analystic" required=""  value="<?php echo $analystic ?>" class="FormAlanlariUcunTextInputlari" maxlength="255" tabindex="1">
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      Zopim <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <input type="text" id="zopim" name="zopim" value="<?php echo $zopim ?>" required=""  class="FormAlanlariUcunTextInputlari" maxlength="255" tabindex="1">
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
      İşlem Başına Gönderilecek Mail Sayısı <span class="KirmiziYazi">*</span>
    </div>
    <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
      <div class="YuzPixselSinirliAlanKapsayicisi">
        <input type="number" id="IslemBasinaGonderilecekMailSayisi" required=""  name="IslemBasinaGonderilecekMailSayisi" value="<?php echo $IslemBasinaGonderilecekMailSayisi ?>" class="FormAlanlariUcunTextInputlari" maxlength="3" min="0" max="999">
      </div>
    </div>
  </div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     İnport Edilə Fayıl Məlumat Sayı <span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <div class="YuzPixselSinirliAlanKapsayicisi">
      <input type="number" id="InportEdilenFileMelumatSayi" required=""  name="InportEdilenFileMelumatSayi" value="<?php echo $InportEdilenFileMelumatSayi ?>" class="FormAlanlariUcunTextInputlari" maxlength="3" min="0" max="999">
    </div>
  </div>
</div>
</div>
<div class="SeyfeIciSetirAlaniKapsayici">
  <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
    <div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
     Export Edilən Fayl Məlumat Sayı<span class="KirmiziYazi">*</span>
   </div>
   <div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
    <div class="YuzPixselSinirliAlanKapsayicisi">
      <input type="number" id="ExportEdilenFileMelumatSayi" required=""  name="ExportEdilenFileMelumatSayi" value="<?php echo $ExportEdilenFileMelumatSayi ?>" class="FormAlanlariUcunTextInputlari" maxlength="3" min="0" max="999">
    </div>
  </div>
</div>
</div>
<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
  <button type="submit" class="YenileButonlari" name="UmumiAyarlarYenile" onClick="SistemAyarlariFormKontrol()">Yenilə</button>
</div>
</form>
</div>
</section>
<?php require_once "_footer.php" ?>