<?php 
require_once "_header.php";
require_once "_menu.php"; 
$SEO_URL=$_REQUEST['SEO_URL'];
$dovlet_SEO_URL=$_REQUEST['dovlet_SEO_URL'];
$SeherSor=$db->prepare("SELECT * FROM seher where SEO_URL=:SEO_URL and dovlet_SEO_URL=:dovlet_SEO_URL order by seher_id DESC LIMIT 1");
$SeherSor->execute(array(
  'SEO_URL'=>$SEO_URL,
  'dovlet_SEO_URL'=>$dovlet_SEO_URL,));
$say=$SeherSor->rowCount();


if ($say!=1) {
  header("Location:seherler");
  exit;
}?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      <?php  
      if(isset($_REQUEST['durum'])){
        if ($_REQUEST['durum']==md5("ok")) { ?>
          <span style="color: #00e600;"><i class="fas fa-check"></i> Yeni Şəhər Əlavə Olundu  </span>
        <?php  }elseif($_REQUEST['durum']==md5("yenileok")){?>
          <span style="color: #00e600;"><i class="fas fa-check"></i> Yenilənmə Uğurlu</span>

        <?php }elseif(($_REQUEST['durum']===md5("var"))){?>
          <span style="color: #ff0000;"><i class="fas fa-times"></i> Bazada Bu Şəhər Var</span>
        <?php  } else{
          header("Location:seherler");
          exit;
          echo "Avtomobil Təchizatı Tənzimlənmələri";
        }
      } else{
        header("Location:seherler");
      }
      ?>
    </div>    
  </div>
  <div id="ListelemeAlaniKapsayicisi">
    <div class="SayfaIciBaslikAlanlariKapsayicisi">
      <a href="seherler">Şəhərlər</a>
      <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
        <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
          <a href="javascript:void(0)" onclick="YeniSeher()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
        </div>
      </span>
    </div>
    <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
      <form id="AramaFormu" name="AramaFormu" action="seherler" method="GET">
        <div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
        <div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
      </form>
    </div>
    <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
      <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
        <thead>
          <th class="ListelemeAlaniIciTablosuSiraNomiresi">№</th>
          <th>Dövlət Adı</th>  
          <th>Şəhər Adı</th>   
          <th>Şəhər Beynəlxalq Adı</th>       
          <th class="KodSutunu">Durum</th> 
          <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
        </thead>
        <tbody>
          <?php       
          while ($seher_cek= $SeherSor->fetch(PDO::FETCH_ASSOC)) {
           $seher_id=$seher_cek['seher_id'];
           $Dovlet_Id=$seher_cek['Dovlet_Id'];
           $seher_ad=$seher_cek['seher_ad'];
           $seher_beynelxalq_adi=$seher_cek['seher_beynelxalq_adi'];
           ?>
           <tr>
            <td class="SiraNomresiSutunu"> 
              <div class="SiraNomresi">
                <?php echo sprintf("%06s", $seher_id ); ?>
              </div>
            </td>
            <td> 
             <?php 
             $Dovlet_Sor=$db->prepare("SELECT * FROM dovlet where Dovlet_Id=:Dovlet_Id");
             $Dovlet_Sor->execute(array(
              'Dovlet_Id'=>$Dovlet_Id));
             $Dovlet_Cek= $Dovlet_Sor->fetch(PDO::FETCH_ASSOC);
             echo $Dovlet_Cek['Dovlet_Ad'];
             ?>
             <input type="hidden" name="dovlet_id" id="dovlet-<?php echo $seher_id ?>" value=" <?php echo $Dovlet_Id; ?> ">
           </td>
           <td id="seher_ad-<?php echo $seher_id ?>"><?php echo $seher_ad ?></td>
           <td id="seher_ad_beynelxalq-<?php echo $seher_id ?>"><?php echo $seher_beynelxalq_adi ?></td>
           <td class="KodSutunu">
            <label class="checkbox">
              <input <?php if($seher_cek['seher_durum']==1){
                echo "checked";
              }else{
                echo "";
              } ?>  type="checkbox" id="<?php echo 'seher_durum-'.$seher_cek['seher_id'] ?>" onchange="SeherDurumKontrol(id)" > 
              <span class="checkbox"> 
                <span></span>
              </span>
            </label>
          </td>
          <td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
            <a href="javascript:SeherlerYenile(<?php echo $seher_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
            <a href="javascript:SeherlerSil(<?php echo $seher_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</section>
<script src="vendors/js/seherler.js"></script>
<?php require_once "_footer.php" ?>