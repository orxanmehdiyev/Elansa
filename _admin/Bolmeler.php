<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			Bölmə Tənzimlənmələri
			<?php 
			if(!isset($_GET['durum']) or !isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"]) ){
			}else{
				header("Location:Bolmeler");
			}
			?>
		</div>    
	</div>

	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="Bolmeler">Bölmələr</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="Yenibolme()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="Bolmeler" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>

		<?php 
		if(isset($_REQUEST['siralama'])){
			if($_REQUEST['siralama']=="bolmeadsiraasc"){
				$siralama="bolme_ad ASC";
				$bolmeidsira="bolmeidsiraasc";
				$bolmeadsira="bolmeadsiradesc";			
				$link='Bolmeler?siralama=bolmeadsiraasc&';
			}
			elseif ($_REQUEST['siralama']=="bolmeadsiradesc") {
				$siralama="bolme_ad DESC";
				$bolmeidsira="bolmeidsiraasc";
				$bolmeadsira="bolmeadsiraasc";	
				$link='Bolmeler?siralama=bolmeadsiradesc&';
			}



			elseif ($_REQUEST['siralama']=="bolmeidsiraasc") {
				$siralama="bolme_id ASC";
				$bolmeidsira="bolmeidsiradesc";
				$bolmeadsira="bolmeadsiraasc";				
				$link='Bolmeler?siralama=bolmeidsiraasc&';
			}
			elseif ($_REQUEST['siralama']=="bolmeidsiradesc") {
				$siralama="bolme_id DESC";
				$bolmeidsira="bolmeidsiraasc";
				$bolmeadsira="bolmeadsiraasc";
				$link='Bolmeler?siralama=bolmeidsiradesc&';
			}
			else{
				$siralama="bolme_id ASC";
				$bolmeidsira="bolmeidsiraasc";
				$bolmeadsira="bolmeadsiraasc";	
				$link='Bolmeler?';
			}
		}else{
			$siralama="bolme_id ASC";
			$bolmeidsira="bolmeidsiraasc";
			$bolmeadsira="bolmeadsiraasc";
			$link='Bolmeler?';
		}


		if(isset($_REQUEST['axtar'])){
			$searchkeyword=HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));    
			$axtarisuzunluq=strlen($searchkeyword);


			$bolmesaysor=$db->prepare("SELECT * FROM bolme where bolme_ad LIKE ? ");
			$bolmesaysor->execute(array("%$searchkeyword%"));
			$bolmesayi=$bolmesaysor->rowCount();

			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:".$link);
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}
			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$bolme_listeleme_limiti)-$bolme_listeleme_limiti;
			$BulunanSayfaSayisiAxtar                 = ceil($bolmesayi/$bolme_listeleme_limiti);
			$bolmesor=$db->prepare("SELECT * FROM bolme where bolme_ad LIKE ? order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $bolme_listeleme_limiti");
			$bolmesor->execute(array( "%$searchkeyword%"));
			$bolmeaxtarsayi=$bolmesor->rowCount();
			if ($bolmeaxtarsayi>0) {
				?>
				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="Bolmeler?siralama=<?php echo $bolmeidsira ?>&axtar=<?php echo $searchkeyword?>">ID</a></th>
							<th><a href="Bolmeler?siralama=<?php echo $bolmeadsira ?>&axtar=<?php echo $searchkeyword?>">Adı</a></th>
							<th class="KodSutunu">Durum</th>
							<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
						</thead>
						<tbody>
							<?php 
							while ($bolmecek= $bolmesor->fetch(PDO::FETCH_ASSOC)) {
								$bolme_id=$bolmecek['bolme_id'];
								$bolme_ad=$bolmecek['bolme_ad'];								

								?>
								<tr>
									<td class="SiraNomresiSutunu"> 
										<div class="SiraNomresi">
											<?php echo $bolme_id ?>
										</div>


									</td>
									<td id="bolme_ad-<?php echo $bolme_id ?>"><?php echo $bolme_ad ?></td>

									<td class="KodSutunu">

										<label class="checkbox" title="<?php if($bolmecek['bolme_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>">
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

				<div id="SayfalamaAlaniKapsayicisi">
					<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
						<?php echo $BulunanSayfaSayisiAxtar; ?> səyfədə, <?php echo $bolmesayi; ?> qeydiyatlı dövlət var.  <label for="cars">Choose a car:</label>
						<select onchange="BolmeSiralamaLimiti(this.value)">
							<?php 
							if ($bolmesayi>100) {
								$Limitsayi=100;
							}else{
								$Limitsayi=$bolmesayi;
							}
							for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
								<option <?php if($bolme_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

							<?php }	
							if (($bolmesayi%10)>0) { ?>
								<option <?php if($bolme_listeleme_limiti==$bolmesayi){echo "selected";} ?> value="<?php echo $bolmesayi; ?>"><?php echo $bolmesayi; ?></option>
							<?php }


							?>
						</select>
					</div>
					<?php 
					if ($BulunanSayfaSayisiAxtar>1) {?>
						<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
							<?php
							if($GelenSayfalama<1){
								header("Location:Bolmeler?seyfe=$BulunanSayfaSayisiAxtar");
							}
							if ($GelenSayfalama>1) {
								$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama-1;
								echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=1&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							}else{
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							}
							for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-5; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+5; $SayfalamaIcinSayfaIndexDegeri++){
								if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisiAxtar)){
									if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
										echo  "<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
									}else{
										echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaIndexDegeri."&axtar=".urlencode($searchkeyword)."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
									}
								}
							}
							if($GelenSayfalama>$BulunanSayfaSayisiAxtar){
								header("Location:Bolmeler?seyfe=$BulunanSayfaSayisiAxtar");
							}

							if($GelenSayfalama!=$BulunanSayfaSayisiAxtar){
								$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama+1;
								echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$BulunanSayfaSayisiAxtar."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
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
			$bolmesaysor=$db->prepare("SELECT * FROM bolme");
			$bolmesaysor->execute();
			$bolmesayi=$bolmesaysor->rowCount();
			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:Bolmeler");
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}


			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$bolme_listeleme_limiti)-$bolme_listeleme_limiti;
			$BulunanSayfaSayisi                 = ceil($bolmesayi/$bolme_listeleme_limiti);
			$bolmesor=$db->prepare("SELECT * FROM bolme order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $bolme_listeleme_limiti");
			$bolmesor->execute();
			?>

			<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
				<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>
						<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="Bolmeler?siralama=<?php echo $bolmeidsira ?>">ID</a></th>
						<th><a href="Bolmeler?siralama=<?php echo $bolmeadsira ?>">Adı</a></th>					
						<th class="KodSutunu">Durum</th>
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
					</thead>
					<tbody>


						<?php 


						while ($bolmecek= $bolmesor->fetch(PDO::FETCH_ASSOC)) {
							$bolme_id=$bolmecek['bolme_id'];
							$bolme_ad=$bolmecek['bolme_ad'];						
							?>
							<tr>    
								<td class="SiraNomresiSutunu"> 
									<div class="SiraNomresi">
										<?php echo sprintf("%06s", $bolme_id ); ?>
									</div>

								</td>
								<td id="bolme_ad-<?php echo $bolme_id ?>"><?php echo $bolme_ad ?></td>								
								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($bolmecek['bolme_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($bolmecek['bolme_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'bolmedurum-'.$bolmecek['bolme_id'] ?>" onchange="BolmeDurumKontrol(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>
								<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
									<a href="javascript:BolmeYenileAc(<?php echo strval($bolme_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
									<a href="javascript:BolmeSil(<?php echo $bolme_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>

				</table>

			</div>

			<div id="SayfalamaAlaniKapsayicisi">
				<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
					<?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $bolmesayi; ?> qeydiyatlı dövlət var. Göstərilən
					<select onchange="BolmeSiralamaLimiti(this.value)">
						<?php 
						if ($bolmesayi>100) {
							$Limitsayi=100;
						}else{
							$Limitsayi=$bolmesayi;
						}
						for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
							<option <?php if($bolme_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

						<?php }	
						if (($bolmesayi%10)>0) { ?>
							<option <?php if($bolme_listeleme_limiti==$bolmesayi){echo "selected";} ?> value="<?php echo $bolmesayi; ?>"><?php echo $bolmesayi; ?></option>
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
							header("Location:Bolmeler?seyfe=$BulunanSayfaSayisi");
						}
						if ($GelenSayfalama>1) {
							$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama-1;
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=1\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}else{
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}
						for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-5; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+5; $SayfalamaIcinSayfaIndexDegeri++){
							if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
								if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
									echo  "<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
								}else{
									echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
								}
							}
						}
						if($GelenSayfalama>$BulunanSayfaSayisi){
							header("Location:".$link."seyfe=$BulunanSayfaSayisi");
						}

						if($GelenSayfalama!=$BulunanSayfaSayisi){
							$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama+1;
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirIleriAl."\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$BulunanSayfaSayisi."\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
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