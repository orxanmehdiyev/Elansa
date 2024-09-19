<?php
require_once "_header.php";
require_once "_menu.php";
$elanverennovu_id_kodla = $_GET['elanverennovu_id_kodla'];
$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$elanverennovuListelemeLimiti)-$elanverennovuListelemeLimiti;
$BulunanSayfaSayisiAxtar                 = ceil($elanverennovusayi/$elanverennovuListelemeLimiti);
$elanverennovusor = $db->prepare("SELECT * FROM elanverennovu where elanverennovu_id_kodla=:elanverennovu_id_kodla order by elanverennovu_id DESC LIMIT 1");
$elanverennovusor->execute(array(
  'elanverennovu_id_kodla' => $elanverennovu_id_kodla
));
$say = $elanverennovusor->rowCount();
if ($say != 1) {
  header("Location:elanverennovu");
  exit;
}
?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      <?php
      if (isset($_GET['durum'])) {
        if ($_GET['durum'] == "ok") { ?>
          <span style="color: #00e600;">Yeni Elan Müəllifi Əlavə Olundu </span>
        <?php  } elseif ($_GET['durum'] == "yenileok") { ?>
          <span style="color: #00e600;"> Elan Müəllifi Yenilənməsi Uğurlu </span>
        <?php } else {
          header("Location:elanverennovu");
          exit;
          echo "Elan Müəllifi Tənzimlənmələri";
        }
      } else {
        header("Location:elanverennovu");
      }
      ?>
    </div>
  </div>
  <div id="ListelemeAlaniKapsayicisi">
    <div class="SayfaIciBaslikAlanlariKapsayicisi">
      <a href="elanverennovu">Elan Müəllifi</a>
      <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
        <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
          <a href="javascript:void(0)" onclick="YeniElanMüəllifiNovu()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
        </div>
      </span>
    </div>
    <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
      <form id="AramaFormu" name="AramaFormu" action="elanverennovu" method="GET">
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
          <th class="KodSutunu">Avtomobil Elanlari Üçün</th>
          <th class="KodSutunu">Mənzil Elanlari Üçün</th>
          <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
        </thead>
        <tbody>
          <?php
          while ($elanverennovucek = $elanverennovusor->fetch(PDO::FETCH_ASSOC)) {
            $elanverennovu_id = $elanverennovucek['elanverennovu_id'];
            $elanverennovu_ad = $elanverennovucek['elanverennovu_ad'];
            ?>
            <tr>
              <td class="SiraNomresiSutunu">
                <div class="SiraNomresi">
                  <?php echo $elanverennovu_id ?>
                </div>
              </td>
              <td id="elanverennovu_ad-<?php echo $elanverennovu_id ?>"><?php echo $elanverennovu_ad ?></td>
              <td class="KodSutunu">  
                <label class="checkbox">
                  <input <?php if($elanverennovucek['avtmobil_elanlari_ucun_durum']==1){
                    echo "checked";
                  }else{
                    echo "";
                  } ?>  type="checkbox" id="<?php echo 'elanverennovudurumavto-'.$elanverennovucek['elanverennovu_id'] ?>" onchange="ElanverennovuDurumKontrolAvto(this.id)" > 
                  <span class="checkbox"> 
                    <span></span>
                  </span>
                </label>
              </td>

              <td class="KodSutunu">  
                <label class="checkbox">
                  <input <?php if($elanverennovucek['menzillerucun_elanverennovu_durum']==1){
                    echo "checked";
                  }else{
                    echo "";
                  } ?>  type="checkbox" id="<?php echo 'elanverennovudurummenzil-'.$elanverennovucek['elanverennovu_id'] ?>" onchange="ElanverennovuDurumKontrolMenzil(this.id)" > 
                  <span class="checkbox"> 
                    <span></span>
                  </span>
                </label>
              </td>
              <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
                <a href="javascript:ElanVerenNovuYenileAc(<?php echo $elanverennovu_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
                <a href="javascript:ElanMuellifiSil(<?php echo $elanverennovu_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>



<?php require_once "_footer.php" ?>