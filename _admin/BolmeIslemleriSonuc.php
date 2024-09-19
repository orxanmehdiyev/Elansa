<?php
require_once "_header.php";
require_once "_menu.php";
$bolme_id_kod = $_GET['bolme_id_kod'];
$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$bolme_listeleme_limiti)-$bolme_listeleme_limiti;
$BulunanSayfaSayisi                 = ceil($bolmesayi/$bolme_listeleme_limiti);
$bolmesor = $db->prepare("SELECT * FROM bolme where bolme_id_kod=:bolme_id_kod order by bolme_id DESC LIMIT 1");
$bolmesor->execute(array(
  'bolme_id_kod' => $bolme_id_kod
));
$say = $bolmesor->rowCount();
if ($say != 1) {
  header("Location:Bolmeler");
  exit;
}
?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      <?php
      if (isset($_GET['durum'])) {
        if ($_GET['durum'] == "ok") { ?>
          <span style="color: #00e600;">Bölmə Əlavə Olundu </span>
        <?php  } elseif ($_GET['durum'] == "yenileok") { ?>
          <span style="color: #00e600;"> Bölmə Yenilənməsi Uğurlu </span>
        <?php } else {
          header("Location:Bolmeler");
          exit;
          echo "Elan Müəllifi Tənzimlənmələri";
        }
      } else {
        header("Location:Bolmeler");
      }
      ?>
    </div>
  </div>
  <div id="ListelemeAlaniKapsayicisi">
    <div class="SayfaIciBaslikAlanlariKapsayicisi">
      <a href="bolme">Bölmə</a>
      <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
        <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
          <a href="javascript:void(0)" onclick="Yenibolme()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
        </div>
      </span>
    </div>
    <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
      <form id="AramaFormu" name="AramaFormu" action="bolme" method="GET">
        <div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
        <div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi">
          <div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div>
        </div>
      </form>
    </div>
    <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
      <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
        <thead>        
          <th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="">ID</a></th>
          <th><a href="">Adı</a></th>          
          <th class="KodSutunu">Durum</th>
          
          <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
        </thead>
        <tbody>
          <?php
          while ($bolmecek = $bolmesor->fetch(PDO::FETCH_ASSOC)) {
            $bolme_id = $bolmecek['bolme_id'];
            $bolme_ad = $bolmecek['bolme_ad'];
            ?>
            <tr>
              <td class="SiraNomresiSutunu">
                <div class="SiraNomresi">
                  <?php echo $bolme_id ?>
                </div>
              </td>
              <td id="bolme_ad-<?php echo $bolme_id ?>"><?php echo $bolme_ad ?></td>

              <td class="KodSutunu">

                <label class="checkbox">
                  <input <?php if($bolmecek['bolme_durum']==1){
                    echo "checked";
                  }else{
                    echo "";
                  } ?>  type="checkbox" id="<?php echo 'bolmedurum-'.$bolmecek['bolme_id'] ?>" onchange="BolmeDurumKontrol(id)" > 
                  <span class="checkbox"> 
                    <span></span>
                  </span>
                </label>

              </td>
              <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
                <a href="javascript:BolmeYenileAc(<?php echo $bolme_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
                <a href="javascript:BolmeSil(<?php echo $bolme_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>



<?php require_once "_footer.php" ?>