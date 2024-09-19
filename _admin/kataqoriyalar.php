<?php
require_once "_header.php";
require_once "_menu.php";
?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      Katagorya Tənzimlənmələri
      <?php
      if (!isset($_GET['durum']) or !isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"])) {
      } else {
        header("Location:kataqoriyalar");
      }
      ?>
    </div>
  </div>
  <div id="ListelemeAlaniKapsayicisi">
    <div class="SayfaIciBaslikAlanlariKapsayicisi">
      <a href="kataqoriyalar">Kataqoriyalar</a>
      <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
        <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
          <a href="javascript:void(0)" onclick="YeniKatagorya()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
        </div>
      </span>
    </div>
    <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
      <form id="AramaFormu" name="AramaFormu" action="kataqoriyalar" method="GET">
        <div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
        <div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi">
          <div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div>
        </div>
      </form>
    </div>
    <?php
    if (isset($_REQUEST['siralama'])) {
      if ($_REQUEST['siralama'] == "id_sira_asc") {
        $id_sira = "id_sira_desc";
        $ad_karoqoriya = "ad_karoqoriya_asc";
        $ad_bolme = "ad_bolme_asc";
        $siralama = "karoqoriya_id ASC";      
        $link = 'kataqoriyalar?siralama=id_sira_asc&';
      } elseif ($_REQUEST['siralama'] == "id_sira_desc") {
        $id_sira = "id_sira_asc";
        $ad_karoqoriya = "ad_karoqoriya_asc";
        $ad_bolme = "ad_bolme_asc";
        $siralama = "karoqoriya_id DESC";
        $link = 'kataqoriyalar?siralama=id_sira_desc&';
      } elseif ($_REQUEST['siralama'] == "ad_karoqoriya_asc") {
        $id_sira = "id_sira_asc";
        $ad_karoqoriya = "ad_karoqoriya_desc";
        $ad_bolme = "ad_bolme_asc";
        $siralama = "karoqoriya_ad ASC";
        $link = 'kataqoriyalar?siralama=ad_karoqoriya_asc&';
      } elseif ($_REQUEST['siralama'] == "ad_karoqoriya_desc") {
        $id_sira = "id_sira_asc";
        $ad_karoqoriya = "ad_karoqoriya_asc";
        $ad_bolme = "ad_bolme_asc";
        $siralama = "karoqoriya_ad DESC";
        $link = 'kataqoriyalar?siralama=ad_karoqoriya_desc&';
      } elseif ($_REQUEST['siralama'] == "ad_bolme_asc") {
        $id_sira = "id_sira_asc";
        $ad_karoqoriya = "ad_karoqoriya_asc";
        $ad_bolme = "ad_bolme_desc";
        $siralama = "bolme_ad ASC";
        $link = 'kataqoriyalar?siralama=ad_bolme_asc&';
      } elseif ($_REQUEST['siralama'] == "ad_bolme_desc") {
        $id_sira = "id_sira_asc";
        $ad_karoqoriya = "ad_karoqoriya_asc";
        $ad_bolme = "ad_bolme_asc";
        $siralama = "bolme_ad DESC";
        $link = 'kataqoriyalar?siralama=ad_bolme_desc&';
      } else {
        $siralama = "karoqoriya_id ASC";
        $id_sira = "id_sira_asc";
        $ad_karoqoriya = "ad_karoqoriya_asc";
        $ad_bolme = "ad_bolme_asc";
        $link = 'kataqoriyalar?';
      }
    } else {
      $siralama = "karoqoriya_id ASC";
      $id_sira = "id_sira_asc";
      $ad_karoqoriya = "ad_karoqoriya_asc";
      $ad_bolme = "ad_bolme_asc";
      $link = 'kataqoriyalar?';
    }
    if (isset($_REQUEST['axtar'])) {
      $searchkeyword = HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));
      $axtarisuzunluq = strlen($searchkeyword);
      $karoqoriya_Say_sor = $db->prepare("SELECT karoqoriya.*,bolme.* FROM karoqoriya INNER JOIN bolme ON karoqoriya.bolme_id=bolme.bolme_id  where karoqoriya_ad LIKE ? or bolme_ad LIKE ? ");
      $karoqoriya_Say_sor->execute(array("%$searchkeyword%", "%$searchkeyword%"));
      $karoqoriya_sayi = $karoqoriya_Say_sor->rowCount();
      if (isset($_GET['seyfe'])) {
        $GelenSayfalama = $_GET['seyfe'];
        if ($_GET['seyfe'] < 1) {
          header("Location:" . $link);
          exit;
        }
      } else {
        $GelenSayfalama = 1;
      }
      $SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama * $katagorya_listeleme_limiti) - $katagorya_listeleme_limiti;
      $BulunanSayfaSayisiAxtar                 = ceil($karoqoriya_sayi / $katagorya_listeleme_limiti);
      $karoqoriya_Sor = $db->prepare("SELECT karoqoriya.*,bolme.* FROM karoqoriya INNER JOIN bolme ON karoqoriya.bolme_id=bolme.bolme_id  where karoqoriya_ad LIKE ? or bolme_ad LIKE ? order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $katagorya_listeleme_limiti");
      $karoqoriya_Sor->execute(array("%$searchkeyword%", "%$searchkeyword%"));
      $karoqoriya_say = $karoqoriya_Sor->rowCount();
      if ($karoqoriya_say > 0) {
        ?>
        <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
          <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
            <thead>
              <th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="kataqoriyalar?siralama=<?php echo $id_sira ?>&axtar=<?php echo $searchkeyword ?>">ID</a></th>
              <th><a href="kataqoriyalar?siralama=<?php echo $ad_bolme ?>&axtar=<?php echo $searchkeyword ?>">Bölmə Adı</a></th>
              <th><a href="kataqoriyalar?siralama=<?php echo $ad_karoqoriya ?>&axtar=<?php echo $searchkeyword ?>">Şəhər Adı</a></th>
              <th class="KodSutunu">Durum</th>
              <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
            </thead>
            <tbody>
              <?php
              while ($karoqoriya_cek = $karoqoriya_Sor->fetch(PDO::FETCH_ASSOC)) {
                $karoqoriya_id = $karoqoriya_cek['karoqoriya_id'];
                $karoqoriya_ad = $karoqoriya_cek['karoqoriya_ad'];
                $bolme_id = $karoqoriya_cek['bolme_id'];
                
                ?>
                <tr>
                  <td class="SiraNomresiSutunu">
                    <div class="SiraNomresi">
                      <?php echo sprintf("%06s", $karoqoriya_id); ?>
                    </div>
                  </td>
                  <td>
                    <?php
                    $bolme_Sor = $db->prepare("SELECT * FROM bolme where bolme_id=:bolme_id");
                    $bolme_Sor->execute(array(
                      'bolme_id' => $bolme_id
                    ));
                    $bolme_Cek = $bolme_Sor->fetch(PDO::FETCH_ASSOC);
                    echo $bolme_Cek['bolme_ad'];
                    ?>
                    <input type="hidden" name="bolme_id" id="bolme-<?php echo $karoqoriya_id ?>" value=" <?php echo $bolme_id; ?> ">
                  </td>
                  <td id="karoqoriya_ad-<?php echo $karoqoriya_id ?>"><?php echo $karoqoriya_ad ?></td>
                  <td class="KodSutunu">

                    <label class="checkbox">
                      <input <?php if ($karoqoriya_cek['karoqoriya_durum'] == 1) {
                        echo "checked";
                      } else {
                        echo "";
                      } ?> type="checkbox" id="<?php echo 'karoqoriyadurum-' . $karoqoriya_cek['karoqoriya_id'] ?>" onchange="KaroqoriyaDurumKontrol(id)">
                      <span class="checkbox">
                        <span></span>
                      </span>
                    </label>
                  </td>
                  <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
                    <a href="javascript:KataqoriyalarYenile(<?php echo $karoqoriya_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
                    <a href="javascript:KataqoriyalarSil(<?php echo $karoqoriya_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div id="SayfalamaAlaniKapsayicisi">
          <div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
            <?php echo $BulunanSayfaSayisiAxtar; ?> səyfədə, <?php echo $karoqoriya_sayi; ?> qeydiyatlı kataqoriya var. <label for="cars">Choose a car:</label>
            <select onchange="katagorya_listeleme_limiti(this.value)">
              <?php
              if ($karoqoriya_sayi > 100) {
                $Limitsayi = 100;
              } else {
                $Limitsayi = $karoqoriya_sayi;
              }
              for ($i = 10; $i <= $Limitsayi; $i += 10) { ?>
                <option <?php if ($katagorya_listeleme_limiti == $i) {
                  echo "selected";
                } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php }
              if (($karoqoriya_sayi % 10) > 0) { ?>
                <option <?php if ($katagorya_listeleme_limiti == $karoqoriya_sayi) {
                  echo "selected";
                } ?> value="<?php echo $karoqoriya_sayi; ?>"><?php echo $karoqoriya_sayi; ?></option>
              <?php }
              ?>
            </select>
          </div>
          <?php
          if ($BulunanSayfaSayisiAxtar > 1) { ?>
            <div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
              <?php
              if ($GelenSayfalama < 1) {
                header("Location:kataqoriyalar?seyfe=$BulunanSayfaSayisiAxtar");
              }
              if ($GelenSayfalama > 1) {
                $SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama - 1;
                echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=1&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
                echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaDegeriniBirGeriAl . "&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
              } else {
                echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
                echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
              }
              for ($SayfalamaIcinSayfaIndexDegeri = $GelenSayfalama - 5; $SayfalamaIcinSayfaIndexDegeri <= $GelenSayfalama + 5; $SayfalamaIcinSayfaIndexDegeri++) {
                if (($SayfalamaIcinSayfaIndexDegeri > 0) and ($SayfalamaIcinSayfaIndexDegeri <= $BulunanSayfaSayisiAxtar)) {
                  if ($SayfalamaIcinSayfaIndexDegeri == $GelenSayfalama) {
                    echo  "<span class=\"Aktif\">" . $SayfalamaIcinSayfaIndexDegeri . "</span>";
                  } else {
                    echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaIndexDegeri . "&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\">" . $SayfalamaIcinSayfaIndexDegeri . "</a></span>";
                  }
                }
              }
              if ($GelenSayfalama > $BulunanSayfaSayisiAxtar) {
                header("Location:kataqoriyalar?seyfe=$BulunanSayfaSayisiAxtar");
              }
              if ($GelenSayfalama != $BulunanSayfaSayisiAxtar) {
                $SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama + 1;
                echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaDegeriniBirIleriAl . "&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
                echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $BulunanSayfaSayisiAxtar . "&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
              } else {
                $SayfalamaIcinSayfaDegeriniBirIleriAl = $BulunanSayfaSayisiAxtar;
                echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
                echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
              }
              ?>
            </div>
          <?php } ?>
        </div>


























        <?php
      } else {  ?>
        <span>Axtarışınıza uyğun avtomobil təchizatı yoxdur yoxdur</span>
      <?php  }
    } else {
      $karoqoriya_Say_sor = $db->prepare("SELECT * FROM karoqoriya");
      $karoqoriya_Say_sor->execute();
      $karoqoriya_sayi = $karoqoriya_Say_sor->rowCount();
      if (isset($_GET['seyfe'])) {
        $GelenSayfalama = $_GET['seyfe'];
        if ($_GET['seyfe'] < 1) {
          header("Location:kataqoriyalar");
          exit;
        }
      } else {
        $GelenSayfalama = 1;
      }
      $SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama * $katagorya_listeleme_limiti) - $katagorya_listeleme_limiti;
      $BulunanSayfaSayisi                 = ceil($karoqoriya_sayi / $katagorya_listeleme_limiti);
      $kataqoriyalarSor = $db->prepare("SELECT karoqoriya.*,bolme.* FROM karoqoriya INNER JOIN bolme ON karoqoriya.bolme_id=bolme.bolme_id   order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $katagorya_listeleme_limiti");
      $kataqoriyalarSor->execute();
      ?>
      <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
        <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
          <thead>
            <th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="kataqoriyalar?siralama=<?php echo $id_sira ?>">ID</a></th>
            <th><a href="kataqoriyalar?siralama=<?php echo $ad_bolme ?>">Bölmə</a></th>
            <th><a href="kataqoriyalar?siralama=<?php echo $ad_karoqoriya ?>">Adı</a></th>
            <th class="KodSutunu">Durum</th>
            <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
          </thead>
          <tbody>
            <?php
            while ($kataqoriyalarCek = $kataqoriyalarSor->fetch(PDO::FETCH_ASSOC)) {
              $karoqoriya_id = $kataqoriyalarCek['karoqoriya_id'];
              $karoqoriya_ad = $kataqoriyalarCek['karoqoriya_ad'];
              $bolme_id = $kataqoriyalarCek['bolme_id'];
              ?>
              <tr>
                <td class="SiraNomresiSutunu">
                  <div class="SiraNomresi">
                    <?php echo sprintf("%06s", $karoqoriya_id); ?>
                  </div>
                </td>
                <td>
                  <?php
                  $bolme_Sor = $db->prepare("SELECT * FROM bolme where bolme_id=:bolme_id");
                  $bolme_Sor->execute(array(
                    'bolme_id' => $bolme_id
                  ));
                  $bolme_Cek = $bolme_Sor->fetch(PDO::FETCH_ASSOC);
                  echo $bolme_Cek['bolme_ad'];
                  ?>
                  <input type="hidden" name="bolme_id" id="bolme-<?php echo $karoqoriya_id ?>" value=" <?php echo $bolme_id; ?> ">
                </td>
                <td id="karoqoriya_ad-<?php echo $karoqoriya_id ?>"><?php echo $karoqoriya_ad ?></td>
                <td class="KodSutunu">
                  <label class="checkbox">
                    <input <?php if ($kataqoriyalarCek['karoqoriya_durum'] == 1) {
                      echo "checked";
                    } else {
                      echo "";
                    } ?> type="checkbox" id="<?php echo 'karoqoriyadurum-' . $kataqoriyalarCek['karoqoriya_id'] ?>" onchange="KaroqoriyaDurumKontrol(id)">
                    <span class="checkbox">
                      <span></span>
                    </span>
                  </label>
                </td>
                <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
                  <a href="javascript:KataqoriyalarYenile(<?php echo strval($karoqoriya_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
                  <a href="javascript:KataqoriyalarSil(<?php echo $karoqoriya_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div id="SayfalamaAlaniKapsayicisi">
        <div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
          <?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $karoqoriya_sayi; ?> qeydiyatlı kataqoriya var. Göstərilən
          <select onchange="katagorya_listeleme_limiti(this.value)">
            <?php
            if ($karoqoriya_sayi > 100) {
              $Limitsayi = 100;
            } else {
              $Limitsayi = $karoqoriya_sayi;
            }
            for ($i = 10; $i <= $Limitsayi; $i += 10) { ?>
              <option <?php if ($katagorya_listeleme_limiti == $i) {
                echo "selected";
              } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php }
            if (($karoqoriya_sayi % 10) > 0) { ?>
              <option <?php if ($katagorya_listeleme_limiti == $karoqoriya_sayi) {
                echo "selected";
              } ?> value="<?php echo $karoqoriya_sayi; ?>"><?php echo $karoqoriya_sayi; ?></option>
            <?php }
            ?>
          </select>
          <button>Print</button>
        </div>
        <?php
        if ($BulunanSayfaSayisi > 1) { ?>
          <div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
            <?php
            if ($GelenSayfalama < 1) {
              header("Location:kataqoriyalar?seyfe=$BulunanSayfaSayisi");
            }
            if ($GelenSayfalama > 1) {
              $SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama - 1;
              echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=1\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
              echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaDegeriniBirGeriAl . "\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
            } else {
              echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
              echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
            }
            for ($SayfalamaIcinSayfaIndexDegeri = $GelenSayfalama - 5; $SayfalamaIcinSayfaIndexDegeri <= $GelenSayfalama + 5; $SayfalamaIcinSayfaIndexDegeri++) {
              if (($SayfalamaIcinSayfaIndexDegeri > 0) and ($SayfalamaIcinSayfaIndexDegeri <= $BulunanSayfaSayisi)) {
                if ($SayfalamaIcinSayfaIndexDegeri == $GelenSayfalama) {
                  echo  "<span class=\"Aktif\">" . $SayfalamaIcinSayfaIndexDegeri . "</span>";
                } else {
                  echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaIndexDegeri . "\" target=\"_top\">" . $SayfalamaIcinSayfaIndexDegeri . "</a></span>";
                }
              }
            }
            if ($GelenSayfalama > $BulunanSayfaSayisi) {
              header("Location:" . $link . "seyfe=$BulunanSayfaSayisi");
            }
            if ($GelenSayfalama != $BulunanSayfaSayisi) {
              $SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama + 1;
              echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaDegeriniBirIleriAl . "\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
              echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $BulunanSayfaSayisi . "\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
            } else {
              $SayfalamaIcinSayfaDegeriniBirIleriAl = $BulunanSayfaSayisi;
              echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
              echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
            }
            ?>
          </div>
        <?php } ?>
      </div>
    <?php  } ?>
  </div>
</section>


<?php require_once "_footer.php" ?>