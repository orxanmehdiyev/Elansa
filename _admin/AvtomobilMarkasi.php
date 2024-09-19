<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			Avtomobil Markası
			<?php 
			if(!isset($_GET['durum']) or !isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"]) ){
			}else{
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

		<?php 
		if(isset($_REQUEST['siralama'])){
			if($_REQUEST['siralama']=="avtomobil_markasiadsiraasc"){
				$siralama="avtomobil_markasi_ad ASC";
				$avtomobil_markasiidsira="avtomobil_markasiidsiraasc";
				$avtomobil_markasiadsira="avtomobil_markasiadsiradesc";			
				$link='AvtomobilMarkasi?siralama=avtomobil_markasiadsiraasc&';
			}
			elseif ($_REQUEST['siralama']=="avtomobil_markasiadsiradesc") {
				$siralama="avtomobil_markasi_ad DESC";
				$avtomobil_markasiidsira="avtomobil_markasiidsiraasc";
				$avtomobil_markasiadsira="avtomobil_markasiadsiraasc";	
				$link='AvtomobilMarkasi?siralama=avtomobil_markasiadsiradesc&';
			}



			elseif ($_REQUEST['siralama']=="avtomobil_markasiidsiraasc") {
				$siralama="avtomobil_markasi_id ASC";
				$avtomobil_markasiidsira="avtomobil_markasiidsiradesc";
				$avtomobil_markasiadsira="avtomobil_markasiadsiraasc";				
				$link='AvtomobilMarkasi?siralama=avtomobil_markasiidsiraasc&';
			}
			elseif ($_REQUEST['siralama']=="avtomobil_markasiidsiradesc") {
				$siralama="avtomobil_markasi_id DESC";
				$avtomobil_markasiidsira="avtomobil_markasiidsiraasc";
				$avtomobil_markasiadsira="avtomobil_markasiadsiraasc";
				$link='AvtomobilMarkasi?siralama=avtomobil_markasiidsiradesc&';
			}
			else{
				$siralama="avtomobil_markasi_id ASC";
				$avtomobil_markasiidsira="avtomobil_markasiidsiraasc";
				$avtomobil_markasiadsira="avtomobil_markasiadsiraasc";	
				$link='AvtomobilMarkasi?';
			}
		}else{
			$siralama="avtomobil_markasi_id ASC";
			$avtomobil_markasiidsira="avtomobil_markasiidsiraasc";
			$avtomobil_markasiadsira="avtomobil_markasiadsiraasc";
			$link='AvtomobilMarkasi?';
		}


		if(isset($_REQUEST['axtar'])){
			$searchkeyword=HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));    
			$axtarisuzunluq=strlen($searchkeyword);


			$avtomobil_markasisaysor=$db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_ad LIKE ? ");
			$avtomobil_markasisaysor->execute(array("%$searchkeyword%"));
			$avtomobil_markasisayi=$avtomobil_markasisaysor->rowCount();

			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:".$link);
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}
			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$avtomobil_markasi_listeleme_limiti)-$avtomobil_markasi_listeleme_limiti;
			$BulunanSayfaSayisiAxtar                 = ceil($avtomobil_markasisayi/$avtomobil_markasi_listeleme_limiti);
			$avtomobil_markasisor=$db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_ad LIKE ? order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $avtomobil_markasi_listeleme_limiti");
			$avtomobil_markasisor->execute(array( "%$searchkeyword%"));
			$avtomobil_markasiaxtarsayi=$avtomobil_markasisor->rowCount();
			if ($avtomobil_markasiaxtarsayi>0) {
				?>
				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="AvtomobilMarkasi?siralama=<?php echo $avtomobil_markasiidsira ?>&axtar=<?php echo $searchkeyword?>">ID</a></th>
							<th><a href="AvtomobilMarkasi?siralama=<?php echo $avtomobil_markasiadsira ?>&axtar=<?php echo $searchkeyword?>">Adı</a></th>
							<th class="KodSutunu">icon</th>
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
											<?php echo $avtomobil_markasi_id ?>
										</div>


									</td>
									<td id="avtomobil_markasi_ad-<?php echo $avtomobil_markasi_id ?>"><?php echo $avtomobil_markasi_ad ?></td>
									<td class="KodSutunu"></td>	
									<td class="KodSutunu">

										<label class="checkbox" title="<?php if($avtomobil_markasicek['avtomobil_markasi_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>">
											<input <?php if($avtomobil_markasicek['avtomobil_markasi_durum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'avtomobil_markasidurum-'.$avtomobil_markasicek['avtomobil_markasi_id'] ?>" onchange="Avtomobil_MarkasiDurumKontrol(id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>

									</td>
									<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
										<a href="javascript:AvtomobilMarkasiYenileAc(<?php echo $avtomobil_markasi_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
										<a href="javascript:AvtomobilMarkasiSil(<?php echo $avtomobil_markasi_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>

					</table>

				</div>

				<div id="SayfalamaAlaniKapsayicisi">
					<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
						<?php echo $BulunanSayfaSayisiAxtar; ?> səyfədə, <?php echo $avtomobil_markasisayi; ?> qeydiyatlı dövlət var.  <label for="cars">Choose a car:</label>
						<select onchange="Avtomobil_MarkasiSiralamaLimiti(this.value)">
							<?php 
							if ($avtomobil_markasisayi>100) {
								$Limitsayi=100;
							}else{
								$Limitsayi=$avtomobil_markasisayi;
							}
							for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
								<option <?php if($avtomobil_markasi_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

							<?php }	
							if (($avtomobil_markasisayi%10)>0) { ?>
								<option <?php if($avtomobil_markasi_listeleme_limiti==$avtomobil_markasisayi){echo "selected";} ?> value="<?php echo $avtomobil_markasisayi; ?>"><?php echo $avtomobil_markasisayi; ?></option>
							<?php }


							?>
						</select>
					</div>
					<?php 
					if ($BulunanSayfaSayisiAxtar>1) {?>
						<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
							<?php
							if($GelenSayfalama<1){
								header("Location:AvtomobilMarkasi?seyfe=$BulunanSayfaSayisiAxtar");
							}
							if ($GelenSayfalama>1) {
								$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama-1;
								echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=1&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							}else{
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							}
							for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-5; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+5; $SayfalamaIcinSayfaIndexDegeri++){
								if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisiAxtar)){
									if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
										echo  "<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
									}else{
										echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaIndexDegeri."&axtar=".urlencode($searchkeyword)."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
									}
								}
							}
							if($GelenSayfalama>$BulunanSayfaSayisiAxtar){
								header("Location:AvtomobilMarkasi?seyfe=$BulunanSayfaSayisiAxtar");
							}

							if($GelenSayfalama!=$BulunanSayfaSayisiAxtar){
								$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama+1;
								echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$BulunanSayfaSayisiAxtar."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
							}else{
								$SayfalamaIcinSayfaDegeriniBirIleriAl=$BulunanSayfaSayisiAxtar;
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
							}
							?>
						</div>
					<?php } ?>
				</div>


























				<?php 
			} else{  ?>
				<span>Axtarışınıza uyğun dövlət yoxdur</span>
			<?php  }
		}else{
			$avtomobil_markasisaysor=$db->prepare("SELECT * FROM avtomobil_markasi");
			$avtomobil_markasisaysor->execute();
			$avtomobil_markasisayi=$avtomobil_markasisaysor->rowCount();
			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:AvtomobilMarkasi");
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}


			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$avtomobil_markasi_listeleme_limiti)-$avtomobil_markasi_listeleme_limiti;
			$BulunanSayfaSayisi                 = ceil($avtomobil_markasisayi/$avtomobil_markasi_listeleme_limiti);
			$avtomobil_markasisor=$db->prepare("SELECT * FROM avtomobil_markasi order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $avtomobil_markasi_listeleme_limiti");
			$avtomobil_markasisor->execute();
			?>

			<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
				<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>
						<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="AvtomobilMarkasi?siralama=<?php echo $avtomobil_markasiidsira ?>">ID</a></th>
						<th><a href="AvtomobilMarkasi?siralama=<?php echo $avtomobil_markasiadsira ?>">Adı</a></th>		
						<th class="KodSutunu">Icon</th>			
						<th class="KodSutunu">Durum</th>
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
					</thead>
					<tbody>


						<?php 


						while ($avtomobil_markasicek= $avtomobil_markasisor->fetch(PDO::FETCH_ASSOC)) {
							$avtomobil_markasi_id=$avtomobil_markasicek['avtomobil_markasi_id'];
							$avtomobil_markasi_ad=$avtomobil_markasicek['avtomobil_markasi_ad'];
							$avtomobil_markasi_iconu=$avtomobil_markasicek['avtomobil_markasi_iconu'];	
							$uzunlu	=strlen( trim($avtomobil_markasi_iconu)	)	;			
							?>
							<tr>    
								<td class="SiraNomresiSutunu"> 
									<div class="SiraNomresi">
										<?php echo sprintf("%06s", $avtomobil_markasi_id ); ?>
									</div>

								</td>
								<td id="avtomobil_markasi_ad-<?php echo $avtomobil_markasi_id ?>"><?php echo $avtomobil_markasi_ad ?></td>						
								<td class="KodSutunu"><?php if ($uzunlu>0) {?>
									<img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə">
								<?php }else{?> 
									<img src="img/IconUploadSiyah.png" width="20" height="20" title="Yüklə" alt="Yüklə">
								<?php }
								?></td>			

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

			<div id="SayfalamaAlaniKapsayicisi">
				<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
					<?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $avtomobil_markasisayi; ?> qeydiyatlı dövlət var. Göstərilən
					<select onchange="Avtomobil_MarkasiSiralamaLimiti(this.value)">
						<?php 
						if ($avtomobil_markasisayi>100) {
							$Limitsayi=100;
						}else{
							$Limitsayi=$avtomobil_markasisayi;
						}
						for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
							<option <?php if($avtomobil_markasi_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

						<?php }	
						if (($avtomobil_markasisayi%10)>0) { ?>
							<option <?php if($avtomobil_markasi_listeleme_limiti==$avtomobil_markasisayi){echo "selected";} ?> value="<?php echo $avtomobil_markasisayi; ?>"><?php echo $avtomobil_markasisayi; ?></option>
						<?php }


						?>
					</select>
					<button>Print</button>
				</div>
				<?php 
				if ($BulunanSayfaSayisi>1) {?>
					<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
						<?php
						if($GelenSayfalama<1){
							header("Location:AvtomobilMarkasi?seyfe=$BulunanSayfaSayisi");
						}
						if ($GelenSayfalama>1) {
							$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama-1;
							echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=1\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}else{
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}
						for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-5; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+5; $SayfalamaIcinSayfaIndexDegeri++){
							if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
								if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
									echo  "<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
								}else{
									echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
								}
							}
						}
						if($GelenSayfalama>$BulunanSayfaSayisi){
							header("Location:".$link."seyfe=$BulunanSayfaSayisi");
						}

						if($GelenSayfalama!=$BulunanSayfaSayisi){
							$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama+1;
							echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirIleriAl."\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$BulunanSayfaSayisi."\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
						}else{
							$SayfalamaIcinSayfaDegeriniBirIleriAl=$BulunanSayfaSayisi;
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