<?php 
require_once "../Ayarlar/ayarlar.php";
require_once("../Frameworkler/Verot/src/class.upload.php");
if(isset($_SESSION["admistis_mail"])){
 if(isset($_POST["UmumiAyarlarYenile"])){
  $tittle_metni                                     = HerfVeReqemIcerikleriniFitrle($_POST["tittle_metni"]);
  $site_adi                                         = HerfVeReqemIcerikleriniFitrle($_POST["site_adi"]);
  $site_url                                         = LikliIcerikleriFiltrle($_POST["site_url"]);
  $footer_metni                                     = HerfVeReqemIcerikleriniFitrle($_POST["footer_metni"]);
  $fav_iconu                                        = $_FILES["fav_iconu"];
  $logo                                             = $_FILES["logo"];
  $description                                      = HerfVeReqemIcerikleriniFitrle($_POST["description"]);
  $keywords                                         = HerfVeReqemIcerikleriniFitrle($_POST["keywords"]);
  $author                                           = HerfVeReqemIcerikleriniFitrle($_POST["author"]);
  $ayar_tel                                         = TelefonluIcerikleriFitrle($_POST["ayar_tel"]);
  $ayar_gsm                                         = TelefonluIcerikleriFitrle($_POST["ayar_gsm"]);
  $ana_mail                                         = EmailIcerikleriniFitrle($_POST["ana_mail"]);
  $ana_mail_sifresi                                 = IstifadeciAdiVeSifresiIcerikleriniFiltrle($_POST["ana_mail_sifresi"]);
  $POP3SunucuBaglantiTuru                           = HarflerXaricButunKarakterleriSil($_POST["POP3SunucuBaglantiTuru"]);
  $POP3SunucuAdresi                                 = HerfVeReqemIcerikleriniFitrle($_POST["POP3SunucuAdresi"]);
  $POP3SunucusuSSLPortu                             = ReqemlerXaricButunKarakterleriSil($_POST["POP3SunucusuSSLPortu"]);
  $POP3SunucusuTLSPortu                             = ReqemlerXaricButunKarakterleriSil($_POST["POP3SunucusuTLSPortu"]);
  $SMTPSunucuBaglantiTuru                           = HarflerXaricButunKarakterleriSil($_POST["SMTPSunucuBaglantiTuru"]);
  $SMTPSunucuAdresi                                 = HerfVeReqemIcerikleriniFitrle($_POST["SMTPSunucuAdresi"]);
  $SMTPSunucusuSSLPortu                             = ReqemlerXaricButunKarakterleriSil($_POST["SMTPSunucusuSSLPortu"]);
  $SMTPSunucusuTLSPortu                             = ReqemlerXaricButunKarakterleriSil($_POST["SMTPSunucusuTLSPortu"]);
  $maps                                             = HerfVeReqemIcerikleriniFitrle($_POST["maps"]);
  $analystic                                        = HerfVeReqemIcerikleriniFitrle($_POST["analystic"]);
  $zopim                                            = HerfVeReqemIcerikleriniFitrle($_POST["zopim"]);
  $IslemBasinaGonderilecekMailSayisi                = ReqemlerXaricButunKarakterleriSil($_POST["IslemBasinaGonderilecekMailSayisi"]);
  $InportEdilenFileMelumatSayi                      = ReqemlerXaricButunKarakterleriSil($_POST["InportEdilenFileMelumatSayi"]);
  $ExportEdilenFileMelumatSayi                      = ReqemlerXaricButunKarakterleriSil($_POST["ExportEdilenFileMelumatSayi"]);   
  if(($tittle_metni!="") and 
    ($site_adi!="") and 
    ($site_url!="") and 
    ($footer_metni!="") and 
    ($description!="") and 
    ($keywords!="") and 
    ($author!="") and 
    ($author!="") and  
    ($ayar_tel!="") and 
    ($ayar_gsm!="") and 
    ($ana_mail!="") and 
    ($ana_mail_sifresi!="") and 
    ($POP3SunucuBaglantiTuru!="") and 
    ($POP3SunucuAdresi!="") and 
    ($POP3SunucusuSSLPortu!="") and 
    ($POP3SunucusuTLSPortu!="") and 
    ($SMTPSunucuBaglantiTuru!="") and 
    ($SMTPSunucuAdresi!="") and 
    ($SMTPSunucusuSSLPortu!="") and 
    ($SMTPSunucusuTLSPortu!="") and 
    ($maps!="") and 
    ($analystic!="") and 
    ($zopim!="") and 
    ($IslemBasinaGonderilecekMailSayisi!="") and 
    ($InportEdilenFileMelumatSayi!="") and
    ($ExportEdilenFileMelumatSayi!="") ){
    $yenile = $db->prepare("UPDATE umumi_ayarlar SET     
      tittle_metni                        = :tittle_metni,
      site_adi                            = :site_adi,
      site_url                            = :site_url,
      footer_metni                        = :footer_metni,
      description                         = :description,
      keywords                            = :keywords,
      author                              = :author,
      ayar_tel                            = :ayar_tel,
      ayar_gsm                            = :ayar_gsm,
      ana_mail                            = :ana_mail,
      ana_mail_sifresi                    = :ana_mail_sifresi,
      POP3SunucuBaglantiTuru              = :POP3SunucuBaglantiTuru,
      POP3SunucuAdresi                    = :POP3SunucuAdresi,
      POP3SunucusuSSLPortu                = :POP3SunucusuSSLPortu,
      POP3SunucusuTLSPortu                = :POP3SunucusuTLSPortu,
      SMTPSunucuBaglantiTuru              = :SMTPSunucuBaglantiTuru,
      SMTPSunucuAdresi                    = :SMTPSunucuAdresi,
      SMTPSunucusuSSLPortu                = :SMTPSunucusuSSLPortu,
      SMTPSunucusuTLSPortu                = :SMTPSunucusuTLSPortu,
      maps                                = :maps,
      analystic                           = :analystic,
      zopim                               = :zopim,
      IslemBasinaGonderilecekMailSayisi   = :IslemBasinaGonderilecekMailSayisi,
      InportEdilenFileMelumatSayi         = :InportEdilenFileMelumatSayi,
      ExportEdilenFileMelumatSayi         = :ExportEdilenFileMelumatSayi
      WHERE umumi_ayar_id=1");
  $update = $yenile->execute(array(     
    'tittle_metni'                        => $tittle_metni,
    'site_adi'                            => $site_adi,
    'site_url'                            => $site_url,
    'footer_metni'                        => $footer_metni,
    'description'                         => $description,
    'keywords'                            => $keywords,
    'author'                              => $author,
    'ayar_tel'                            => $ayar_tel,
    'ayar_gsm'                            => $ayar_gsm,
    'ana_mail'                            => $ana_mail,
    'ana_mail_sifresi'                    => $ana_mail_sifresi,
    'POP3SunucuBaglantiTuru'              => $POP3SunucuBaglantiTuru,
    'POP3SunucuAdresi'                    => $POP3SunucuAdresi,
    'POP3SunucusuSSLPortu'                => $POP3SunucusuSSLPortu,
    'POP3SunucusuTLSPortu'                => $POP3SunucusuTLSPortu,
    'SMTPSunucuBaglantiTuru'              => $SMTPSunucuBaglantiTuru,
    'SMTPSunucuAdresi'                    => $SMTPSunucuAdresi,
    'SMTPSunucusuSSLPortu'                => $SMTPSunucusuSSLPortu,
    'SMTPSunucusuTLSPortu'                => $SMTPSunucusuTLSPortu,
    'maps'                                => $maps,
    'analystic'                           => $analystic,
    'zopim'                               => $zopim,
    'IslemBasinaGonderilecekMailSayisi'   => $IslemBasinaGonderilecekMailSayisi,
    'InportEdilenFileMelumatSayi'         => $InportEdilenFileMelumatSayi,
    'ExportEdilenFileMelumatSayi'         => $ExportEdilenFileMelumatSayi
  ));
  if ($update) {
    if(
      ($logo["name"]!="") and 
      ($logo["type"]!="") and 
      ($logo["tmp_name"]!="") and 
      ($logo["error"]==0) and 
      ($logo["size"]>0)){
      $SiteAnaLogoAdi                          = $logo["name"];
      $AnaLogosuDosyaUzantisiKontrolEt         = substr($SiteAnaLogoAdi, -4);
      $AnaLogosuDosyaUzantisiKontrolEtJPEG     = substr($SiteAnaLogoAdi, -5);
      if(($AnaLogosuDosyaUzantisiKontrolEt     ==".png") or 
        ($AnaLogosuDosyaUzantisiKontrolEt      ==".PNG") or 
        ($AnaLogosuDosyaUzantisiKontrolEt      ==".gif") or 
        ($AnaLogosuDosyaUzantisiKontrolEt      ==".GIF") or 
        ($AnaLogosuDosyaUzantisiKontrolEt      ==".bmp") or 
        ($AnaLogosuDosyaUzantisiKontrolEt      ==".BMP") or
        ($AnaLogosuDosyaUzantisiKontrolEt      ==".jpg") or 
        ($AnaLogosuDosyaUzantisiKontrolEt      ==".JPG") or 
        ($AnaLogosuDosyaUzantisiKontrolEtJPEG  ==".jpeg") or 
        ($AnaLogosuDosyaUzantisiKontrolEtJPEG  ==".JPEG") or 
        ($AnaLogosuDosyaUzantisiKontrolEtJPEG  ==".tiff") or 
        ($AnaLogosuDosyaUzantisiKontrolEtJPEG  ==".TIFF")){
        $uzantisay=strlen($AnaLogosuDosyaUzantisiKontrolEt);
      $SiteAnaLogosuYukle        = new upload($logo, 'tr-TR');
      if($SiteAnaLogosuYukle->uploaded){
        if($uzantisay==4){
          $SiteAnaLogosuDosyaUzantisi     = $AnaLogosuDosyaUzantisiKontrolEt;
          $SiteAnaLogosuYeniDosyaAdi      = "AnaLogo".$SiteAnaLogosuDosyaUzantisi;
        }else{
          $SiteAnaLogosuDosyaUzantisi     = $AnaLogosuDosyaUzantisiKontrolEtJPEG;
          $SiteAnaLogosuYeniDosyaAdi      = "AnaLogo".$SiteAnaLogosuDosyaUzantisi;
        }
        $SiteAnaLogosuYukle->mime_magic_check         = true;
        $SiteAnaLogosuYukle->allowed                  = array("image/*");
        $SiteAnaLogosuYukle->file_new_name_body       = "AnaLogo";
        $SiteAnaLogosuYukle->file_overwrite           = true;
        $SiteAnaLogosuYukle->image_background_color   = null;
        $SiteAnaLogosuYukle->image_resize             = true;
        $SiteAnaLogosuYukle->image_x                  = 123;
        $SiteAnaLogosuYukle->image_y                  = 29;
        $SiteAnaLogosuYukle->process("../img/");
        if($SiteAnaLogosuYukle->processed){
          $SiteAnaLogosuYukle->clean();
          $yenile = $db->prepare("UPDATE umumi_ayarlar SET     
            logo=:logo  
            WHERE  umumi_ayar_id=1");
          $update = $yenile->execute(array(     
            'logo' => $SiteAnaLogosuYeniDosyaAdi
          ));
          if($update){
            header("Location:../umumi_ayarlar?durum=ok");
            exit;
          }else{
            header("Location:../hatadsekilxetssa");
            exit;
          }
        }
        else{
          header("Location:../hatadsekilxeta");
          exit;
        }
      }
    }else{
      header("Location:../hatadosyauzanti");
      exit;
    }
  }else{
    header("Location:../umumi_ayarlar?durum=ok");
    exit;
  }

}else{
 header("Location:../hataupdate");
 exit;
}
}else{
 header("Location:../hatabos");
 exit;
}
}
else{
 header("Location:../hata");
 exit;
}
}
else{
	header("Location:../");
  exit;
}


?>