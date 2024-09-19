<?php 
require_once "_header.php";
require_once "_menu.php"; 
$avtomobil_markasisor=$db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_id_kod=:avtomobil_markasi_id_kod and avtomobil_markasi_seo_url=:avtomobil_markasi_seo_url");
$avtomobil_markasisor->execute(array(
	'avtomobil_markasi_id_kod'=>$_GET['avtomobil_markasi_id_kod'],
	'avtomobil_markasi_seo_url'=>$_GET['avtomobil_markasi_seo_url']));
$say = $avtomobil_markasisor->rowCount();
if ($say != 1) {
	header("Location:AvtomobilMarkasi");
	exit;
}
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			<?php
			if (isset($_GET['durum'])) {
				if ($_GET['durum'] == "ok") { ?>
					<span style="color: #00e600;">Avtomobil Markası Əlavə Olundu </span>
				<?php  } elseif ($_GET['durum'] == "yenileok") { ?>
					<span style="color: #00e600;"> Avtomobil Markası Yenilənməsi Uğurlu </span>
				<?php } else {
					header("Location:AvtomobilMarkasi");
					exit;
					echo "Elan Müəllifi Tənzimlənmələri";
				}
			} else {
				header("Location:AvtomobilMarkasi");
			}
			?>
		</div>    
	</div>

	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="AvtomobilMarkasi">Avtomobil Markası</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="YeniAvtomobilMarkasi()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="AvtomobilMarkasi" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>

		<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
			<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
				<thead>
					<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="AvtomobilMarkasi?siralama=<?php echo $avtomobil_markasiidsira ?>">ID</a></th>
					<th>Adı</th>					
					<th class="KodSutunu">Durum</th>
					<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
				</thead>
				<tbody>
					<?php 
					while ($avtomobil_markasicek= $avtomobil_markasisor->fetch(PDO::FETCH_ASSOC)) {
						$avtomobil_markasi_id=$avtomobil_markasicek['avtomobil_markasi_id'];
						$avtomobil_markasi_ad=$avtomobil_markasicek['avtomobil_markasi_ad'];						
						?>
						<tr>    
							<td class="SiraNomresiSutunu"> 
								<div class="SiraNomresi">
									<?php echo sprintf("%06s", $avtomobil_markasi_id ); ?>
								</div>
							</td>
							<td id="avtomobil_markasi_ad-<?php echo $avtomobil_markasi_id ?>"><?php echo $avtomobil_markasi_ad ?></td>								
							<td class="KodSutunu">	
								<label class="checkbox" title="<?php if($avtomobil_markasicek['avtomobil_markasi_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
									<input <?php if($avtomobil_markasicek['avtomobil_markasi_durum']==1){
										echo "checked";
									}else{
										echo "";
									} ?>  type="checkbox" id="<?php echo 'avtomobil_markasidurum-'.$avtomobil_markasicek['avtomobil_markasi_id'] ?>" onchange="Avtomobil_MarkasiDurumKontrol(this.id)" > 
									<span class="checkbox"> 
										<span></span>
									</span>
								</label>
							</td>
							<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
								<a href="javascript:AvtomobilMarkasiYenileAc(<?php echo strval($avtomobil_markasi_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
								<a href="javascript:AvtomobilMarkasiSil(<?php echo $avtomobil_markasi_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php require_once "_footer.php" ?>