<?php 
require_once "_header.php";
require_once "_menu.php"; 
$karoqoriya_id_kodla=$_REQUEST['karoqoriya_id_kodla'];
$karoqoriya_seo_url=$_REQUEST['karoqoriya_seo_url'];
$karoqoriyaSor=$db->prepare("SELECT * FROM karoqoriya where karoqoriya_id_kodla=:karoqoriya_id_kodla and karoqoriya_seo_url=:karoqoriya_seo_url order by karoqoriya_id DESC LIMIT 1");
$karoqoriyaSor->execute(array(
  'karoqoriya_id_kodla'=>$karoqoriya_id_kodla,
  'karoqoriya_seo_url'=>$karoqoriya_seo_url,));
$say=$karoqoriyaSor->rowCount();
if ($say!=1) {
  header("Location:kataqoriyalar");
  exit;
}?>
<section>
  <div id="seyfebaslikalani">
    <div id="seyfebaslikkapsayici">
      <?php 
      if(isset($_REQUEST['durum'])){
        if ($_REQUEST['durum']=="ok") { ?>
          <span style="color: #00e600;">Yeni Kataqoriya Əlavə Olundu  </span>
        <?php  }elseif($_REQUEST['durum']=="yenileok"){?>
          <span style="color: #00e600;">Yenilənmə Uğurlu</span>

        <?php } else{
          header("Location:kataqoriyalar");
          exit;
          echo "Kataqoriya Təchizatı Tənzimlənmələri";
        }
      } else{
        header("Location:kataqoriyalar");
      }
      ?>
    </div>    
  </div>
  <div id="ListelemeAlaniKapsayicisi">
    <div class="SayfaIciBaslikAlanlariKapsayicisi">
      <a href="kataqoriyalar">Kataqoriya</a>
      <span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
        <div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
          <a href="javascript:void(0)" onclick="YeniKatagorya()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
        </div>
      </span>
    </div>
    <div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
      <form id="AramaFormu" name="AramaFormu" action="kataqoriyalar" method="GET">
        <div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
        <div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
      </form>
    </div>
    <div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
      <table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
        <thead>
          <th class="ListelemeAlaniIciTablosuSiraNomiresi">№</th>
          <th>Bölmə </th>  
          <th>ŞAdı</th>   

          <th class="KodSutunu">Durum</th> 
          <th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
        </thead>
        <tbody>
          <?php       
          while ($karoqoriya_cek= $karoqoriyaSor->fetch(PDO::FETCH_ASSOC)) {
           $karoqoriya_id=$karoqoriya_cek['karoqoriya_id'];
           $bolme_id=$karoqoriya_cek['bolme_id'];
           $karoqoriya_ad=$karoqoriya_cek['karoqoriya_ad'];
           ?>
           <tr>
            <td class="SiraNomresiSutunu"> 
              <div class="SiraNomresi">
                <?php echo sprintf("%06s", $karoqoriya_id ); ?>
              </div>
            </td>
            <td> 
             <?php 
             $bolme_Sor=$db->prepare("SELECT * FROM bolme where bolme_id=:bolme_id");
             $bolme_Sor->execute(array(
              'bolme_id'=>$bolme_id));
             $bolme_Cek= $bolme_Sor->fetch(PDO::FETCH_ASSOC);
             echo $bolme_Cek['bolme_ad'];
             ?>
             <input type="hidden" name="bolme_id" id="bolme-<?php echo $karoqoriya_id ?>" value=" <?php echo $bolme_id; ?> ">
           </td>
           <td id="karoqoriya_ad-<?php echo $karoqoriya_id ?>"><?php echo $karoqoriya_ad ?></td>
           <td class="KodSutunu">
            <label class="checkbox">
              <input <?php if($karoqoriya_cek['karoqoriya_durum']==1){
                echo "checked";
              }else{
                echo "";
              } ?>  type="checkbox" id="<?php echo 'karoqoriya_durum-'.$karoqoriya_cek['karoqoriya_id'] ?>" onchange="KaroqoriyaDurumKontrol(id)" > 
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
</div>
</section>
<?php require_once "_footer.php" ?>