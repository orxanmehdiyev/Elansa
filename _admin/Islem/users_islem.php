<?php
require_once "../Ayarlar/ayarlar.php";
require_once "../Frameworkler/PHPMailerMaster/PHPMailerAutoload.php";
if (empty($_SESSION["admistis_mail"])) {
  header("Location:../../404.php");
  exit;
}
if (isset($_POST["Yeni"])) {
  $admin_ad             =  HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["admin_ad"]));
  $admin_soyad          =  HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["admin_soyad"]));
  $admin_ata_ad         =  HerSozunIlkHerfiniBoyukEt(HarflerXaricButunKarakterleriSil($_POST["admin_ata_ad"]));
  $admin_kimlik_nomir   =  HerSozunIlkHerfiniBoyukEt(HerfVeReqemlerXaricButunKarakterleriSil($_POST["admin_kimlik_nomir"]));
  $admin_fin            =  KicikHerfleriBoyukHerflerleDeyisidir(AzerbaycancaHerfleriIngilisHerfleriIleDeyisdir($_POST["admin_fin"]));
  $admin_tel_bir        =  ReqemlerXaricButunKarakterleriSil($_POST["admin_tel_bir"]);
  $admin_tel_iki        =  ReqemlerXaricButunKarakterleriSil($_POST["admin_tel_iki"]);
  $admin_mail           =  EmailKarakerleriXaricButunKarakterleriSil($_POST["admin_mail"]);
  $admin_sifre          =  elan_pin_kode();
  $admin_cinsiyyet      =  ReqemlerXaricButunKarakterleriSil($_POST["admin_cinsiyyet"]);
  $admin_seo_url = seo($admin_ad . md5(password_hash(seo(md5($admin_ad . $admin_soyad . $admin_ata_ad . $admin_kimlik_nomir . $admin_fin . $admin_tel_bir . (time()))), PASSWORD_DEFAULT)));
  if ($admin_ad == "") {
    header("Location:../Userselaveet?bos=ad");
    exit;
  }
  if ($admin_soyad == "") {
    header("Location:../Userselaveet?bos=soyad");
    exit;
  }
  if ($admin_ata_ad == "") {
    header("Location:../Userselaveet?bos=ataad");
    exit;
  }
  if ($admin_kimlik_nomir == "") {
    header("Location:../Userselaveet?bos=kimliknomir");
    exit;
  }
  if ($admin_fin == "") {
    header("Location:../Userselaveet?bos=fin");
    exit;
  }
  if ($admin_tel_bir == "") {
    header("Location:../Userselaveet?bos=tel");
    exit;
  }
  if ($admin_mail == "") {
    header("Location:../Userselaveet?bos=mail");
    exit;
  }
  if ($admin_sifre == "") {
    header("Location:../Userselaveet?bos=sifre");
    exit;
  }
  if ($admin_cinsiyyet == "") {
    header("Location:../Userselaveet?bos=cinsiyyet");
    exit;
  }

  $adminfinsor = $db->prepare("SELECT * FROM admin where admin_fin=:admin_fin");
  $adminfinsor->execute(array(
    'admin_fin' => $admin_fin
  ));
  $say = $adminfinsor->rowCount();
  if ($say > 0) {
    header("Location:../Userselaveet?bos=finvar");
    exit;
  }

  $adminmailsor = $db->prepare("SELECT * FROM admin where admin_mail=:admin_mail");
  $adminmailsor->execute(array(
    'admin_mail' => $admin_mail
  ));
  $say = $adminmailsor->rowCount();
  if ($say > 0) {
    header("Location:../Userselaveet?bos=mailvar");
    exit;
  }

  $admintelbiror = $db->prepare("SELECT * FROM admin where admin_tel_bir=:admin_tel_bir ");
  $admintelbiror->execute(array(
    'admin_tel_bir' => $admin_tel_bir
  ));
  $say = $admintelbiror->rowCount();

  if ($say > 0) {
    header("Location:../Userselaveet?bos=telbirvar");
    exit;
  }

  $admintelbirikior = $db->prepare("SELECT * FROM admin where admin_tel_bir=:admin_tel_bir ");
  $admintelbirikior->execute(array(
    'admin_tel_bir' => $admin_tel_iki
  ));
  $say = $admintelbirikior->rowCount();

  if ($say > 0) {
    header("Location:../Userselaveet?bos=telbirTelikidevar");
    exit;
  }

  $admintelikiror = $db->prepare("SELECT * FROM admin where admin_tel_iki=:admin_tel_iki");
  $admintelikiror->execute(array(
    'admin_tel_iki' => $admin_tel_iki
  ));
  $say = $admintelikiror->rowCount();
  if ($say > 0) {
    header("Location:../Userselaveet?bos=telikivar");
    exit;
  }

  $admintelikiror = $db->prepare("SELECT * FROM admin where admin_tel_iki=:admin_tel_iki");
  $admintelikiror->execute(array(
    'admin_tel_iki' => $admin_tel_bir
  ));
  $say = $admintelikiror->rowCount();
  if ($say > 0) {
    header("Location:../Userselaveet?bos=telbirtelikidevar");
    exit;
  }

  $admin_sifre_ele = md5(IstifadeciAdiVeSifresiIcerikleriniFiltrle($admin_sifre));

  $elaveet = $db->prepare("INSERT INTO admin SET
  admin_ad               =   :admin_ad,
  admin_soyad            =   :admin_soyad,
  admin_ata_ad           =   :admin_ata_ad,
  admin_kimlik_nomir     =   :admin_kimlik_nomir,
  admin_fin              =   :admin_fin,
  admin_tel_bir          =   :admin_tel_bir,
  admin_tel_iki          =   :admin_tel_iki,
  admin_mail             =   :admin_mail,
  admin_sifre            =   :admin_sifre,
  admin_cinsiyyet        =   :admin_cinsiyyet,
  QeydiyyatTarixiZamanDamgasi        =   :QeydiyyatTarixiZamanDamgasi,
  QeydiyyatTarixi        =   :QeydiyyatTarixi,
  QeydiyyatIp        =   :QeydiyyatIp,
  admin_seo_url          =   :admin_seo_url
  ");
  $insert = $elaveet->execute(array(
    'admin_ad'             => $admin_ad,
    'admin_soyad'          => $admin_soyad,
    'admin_ata_ad'         => $admin_ata_ad,
    'admin_kimlik_nomir'   => $admin_kimlik_nomir,
    'admin_fin'            => $admin_fin,
    'admin_tel_bir'        => $admin_tel_bir,
    'admin_tel_iki'        => $admin_tel_iki,
    'admin_mail'           => $admin_mail,
    'admin_sifre'          => $admin_sifre_ele,
    'admin_cinsiyyet'      => $admin_cinsiyyet,
    'QeydiyyatTarixiZamanDamgasi'      => $ZamanDamgasi,
    'QeydiyyatTarixi'      => $TarixSaat,
    'QeydiyyatIp'      => $IPAdresi,
    'admin_seo_url'        => $admin_seo_url
  ));
  if ($insert) {
    $admin_id = $db->lastInsertId();
    $adminsor = $db->prepare("SELECT * FROM admin where admin_id=:admin_id");
    $adminsor->execute(array(
      'admin_id' => $admin_id
    ));
    $admincek = $adminsor->fetch(PDO::FETCH_ASSOC);
    $admin_soyad = $admincek['admin_soyad'];
    $admin_mail = $admincek['admin_mail'];
    $admin_ad = $admincek['admin_ad'];
    $useradsoyad = $admin_soyad . " " . $admin_ad;

    $MailIcerikBaslik =  $site_adi;
    $MailIcerikOlustur = "Bu email məlumat xarakterlidir; <br/><br/> ";
    $MailIcerikOlustur .= "İstifadəçi kimin əlavə edildiniz. Statusunuz aktifləşdikdə sizə bildiriləcək; <br/><br/> ";
    $MailIcerikOlustur .= "Sizin şifrəniz: <b>" . $admin_sifre . "</b>";
    $MailGonder                  =    new PHPMailer;
    $MailGonder->SMTPDebug        =    0; // SMTP xetalarini baglayiriq
    $MailGonder->isSMTP();              //SMTP maili gondereceyimi deyirem
    $MailGonder->Host              =    $SMTPSunucuAdresi;
    $MailGonder->SMTPAuth          =  true;
    $MailGonder->CharSet          =  "utf-8";
    $MailGonder->Encoding          =  "base64";
    $MailGonder->Username          =  $ana_mail;
    $MailGonder->Password          =  $ana_mail_sifresi;
    if ($POP3SunucuBaglantiTuru == "SSL") {
      $MailGonder->SMTPSecure      =  "ssl";
      $MailGonder->Port            =  $SMTPSunucusuSSLPortu;
    } else {
      $MailGonder->SMTPSecure      =  "tls";
      $MailGonder->Port            =  $SMTPSunucusuTLSPortu;
    }
    $MailGonder->setFrom($ana_mail, $site_adi);
    $MailGonder->addAddress($admin_mail, $useradsoyad);
    $MailGonder->addReplyTo($ana_mail, $site_adi);
    $MailGonder->isHTML(true);
    $MailGonder->Subject          =  DonusumleriGeriDondur($MailIcerikBaslik);
    $MailGonder->Body              =  DonusumleriGeriDondur($MailIcerikOlustur);

    if ($MailGonder->send()) {
      exit;
      header("Location:../");
      exit;
    } else {

      Header("Location:../404");
      exit;
    }
  } else {
    header("Location:../Userselaveet?bos=xeta");
    exit;;
    exit;
  }
} elseif (isset($_POST["AdminDurum"])) {
  $admin_id     =   ReqemlerXaricButunKarakterleriSil($_POST["AdminDurum"]);
  if ($admin_id != "") {
    $admin = $db->prepare("SELECT * FROM admin where admin_id=:admin_id");
    $admin->execute(array(
      'admin_id' => $admin_id
    ));
    $adminsayi = $admin->rowCount();
    if ($adminsayi == 1) {
      $admincek = $admin->fetch(PDO::FETCH_ASSOC);
      if ($admincek['admin_yetgi'] == 1) {
        $status = 0;
      } elseif ($admincek['admin_yetgi'] == 0) {
        $status = 1;
      }
      $yenile = $db->prepare("UPDATE admin SET     
          admin_yetgi=:admin_yetgi   
          WHERE admin_id=$admin_id");
      $update = $yenile->execute(array(
        'admin_yetgi' => $status
      ));
    }
  }
}
