<?php
require_once "_header.php";
require_once "_menu.php";
$binatipi_id_kod = $_GET['binatipi_id_kod'];
$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$binatipi_listeleme_limiti)-$binatipi_listeleme_limiti;
$BulunanSayfaSayisi                 = ceil($binatipisayi/$binatipi_listeleme_limiti);
$binatipisor = $db->prepare("SELECT * FROM binatipi where binatipi_id_kod=:binatipi_id_kod order by binatipi_id DESC LIMIT 1");
$binatipisor->execute(array(
  'binatipi_id_kod' => $binatipi_id_kod
));
$say = $binatipisor->rowCount();
if ($say != 1) {
  header("Location:BinaTipi");
  exit;
}
?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      <?php
      if (isset($_GET['durum'])) {
        if ($_GET['durum'] == "ok") { ?>
          <span style="color: #00e600;">Bina Tipi Əlavə Olundu </span>
        <?php  } elseif ($_GET['durum'] == "yenileok") { ?>
          <span style="color: #00e600;"> Bina Tipi Yenilənməsi Uğurlu </span>
        <?php } else {
          header("Location:BinaTipi");
          exit;
          echo "Elan Müəllifi Tənzimlənmələri";
        }
      } else {
        header("Location:BinaTipi");
      }
      ?>
    </div>
  </div>
  <div id="ListelemeAlaniKapsayicisi">
    <div class="SayfaIciBaslikAlanlariKapsayicisi">
      <a href="BinaTipi">Bina Tipi</a>
      <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
        <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
          <a href="javascript:void(0)" onclick="YeniBinaTipi()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
        </div>
      </span>
    </div>
    <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
      <form id="AramaFormu" name="AramaFormu" action="binatipi" method="GET">
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
          while ($binatipicek = $binatipisor->fetch(PDO::FETCH_ASSOC)) {
            $binatipi_id = $binatipicek['binatipi_id'];
            $binatipi_adi = $binatipicek['binatipi_adi'];
            ?>
            <tr>
              <td class="SiraNomresiSutunu">
                <div class="SiraNomresi">
                  <?php echo $binatipi_id ?>
                </div>
              </td>
              <td id="binatipi_adi-<?php echo $binatipi_id ?>"><?php echo $binatipi_adi ?></td>

              <td class="KodSutunu">

                <label class="checkbox">
                  <input <?php if($binatipicek['binatipi_durum']==1){
                    echo "checked";
                  }else{
                    echo "";
                  } ?>  type="checkbox" id="<?php echo 'binatipidurum-'.$binatipicek['binatipi_id'] ?>" onchange="binatipiDurumKontrol(id)" > 
                  <span class="checkbox"> 
                    <span></span>
                  </span>
                </label>

              </td>
              <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
                <a href="javascript:binatipiYenileAc(<?php echo $binatipi_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
                <a href="javascript:binatipiSil(<?php echo $binatipi_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>



<?php require_once "_footer.php" ?>