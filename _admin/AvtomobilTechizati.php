<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			<?php 
			if(isset($_GET['durum'])){
				if ($_GET['durum']=="ok") { ?>
				  <span style="color: #ff0000;"><i class="fas fa-times"></i> Uğurla Silindi  </span>
				<?php  }else{
					echo "Avtomobil Təchizat Tənzimlənmələri";
				}
			} else{
				echo "Avtomobil Təchizat Tənzimlənmələri";
			}
			if(!isset($_GET['durum']) or !isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"]) ){

			}else{
				header("Location:AvtomobilTechizati");
			}
			?>
		</div>    
	</div>
	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="AvtomobilTechizati">Avtomobil Təchizat</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="Yeni()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>
		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="AvtomobilTechizati" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>
		<?php 
		if(isset($_REQUEST['siralama'])){
			if($_REQUEST['siralama']=="id_sira_asc"){
				$id_sira="id_sira_desc";
				$ad_sira="ad_sira_asc";
				$ad_sira_bolme="ad_sira_bolme_asc";
				$siralama="avtomobil_techizat_id ASC";
				$link='AvtomobilTechizati?siralama=id_sira_asc&';
			}
			elseif ($_REQUEST['siralama']=="id_sira_desc") {
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_asc";
				$ad_sira_bolme="ad_sira_bolme_asc";
				$siralama="avtomobil_techizat_id DESC";
				$link='AvtomobilTechizati?siralama=id_sira_desc&';
			}
			elseif ($_REQUEST['siralama']=="ad_sira_asc") {
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_desc";
				$ad_sira_bolme="ad_sira_bolme_asc";
				$siralama="avtomobil_techizat_ad ASC";
				$link='AvtomobilTechizati?siralama=ad_sira_asc&';
			}
			elseif ($_REQUEST['siralama']=="ad_sira_desc") {
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_asc";
				$ad_sira_bolme="ad_sira_bolme_asc";
				$siralama="avtomobil_techizat_ad DESC";
				$link='AvtomobilTechizati?siralama=ad_sira_desc&';
			}
			elseif ($_REQUEST['siralama']=="ad_sira_bolme_asc") {
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_asc";
				$ad_sira_bolme="ad_sira_bolme_desc";
				$siralama="avtomobil_techizat_bolmesi_ad ASC";
				$link='AvtomobilTechizati?siralama=ad_sira_bolme_asc&';
			}
			elseif ($_REQUEST['siralama']=="ad_sira_bolme_desc") {
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_asc";
				$ad_sira_bolme="ad_sira_bolme_asc";
				$siralama="avtomobil_techizat_bolmesi_ad DESC";
				$link='AvtomobilTechizati?siralama=ad_sira_bolme_desc&';
			}
			else{
				$siralama="avtomobil_techizat_id ASC";
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_asc";
				$link='AvtomobilTechizati?';
			}

		}else{
			$siralama="avtomobil_techizat_id ASC";
			$id_sira="id_sira_asc";
			$ad_sira="ad_sira_asc";
			$ad_sira_bolme="ad_sira_bolme_asc";
			$link='AvtomobilTechizati?';
		}


		if(isset($_REQUEST['axtar'])){
			$searchkeyword=HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));    
			$axtarisuzunluq=strlen($searchkeyword);
			$avtomobil_techizat_Say_sor=$db->prepare("SELECT avtomobil_techizat.*,avtomobil_techizat_bolmesi.* FROM avtomobil_techizat INNER JOIN avtomobil_techizat_bolmesi ON avtomobil_techizat.avtomobil_techizat_bolmesi_id=avtomobil_techizat_bolmesi.avtomobil_techizat_bolmesi_id  where avtomobil_techizat_ad LIKE ? or avtomobil_techizat_bolmesi_ad LIKE ?");
			$avtomobil_techizat_Say_sor->execute(array("%$searchkeyword%", "%$searchkeyword%"));
			$avtomobil_techizat_sayi=$avtomobil_techizat_Say_sor->rowCount();

			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:".$link);
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}
			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$avtomobil_techizat_listeleme_limiti)-$avtomobil_techizat_listeleme_limiti;
			$BulunanSayfaSayisiAxtar                 = ceil($avtomobil_techizat_sayi/$avtomobil_techizat_listeleme_limiti);
			$avtomobil_techizat_sor=$db->prepare("SELECT avtomobil_techizat.*,avtomobil_techizat_bolmesi.* FROM avtomobil_techizat INNER JOIN avtomobil_techizat_bolmesi ON avtomobil_techizat.avtomobil_techizat_bolmesi_id=avtomobil_techizat_bolmesi.avtomobil_techizat_bolmesi_id  where avtomobil_techizat_ad LIKE ? or avtomobil_techizat_bolmesi_ad LIKE ? order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $avtomobil_techizat_listeleme_limiti");

			$avtomobil_techizat_sor->execute(array( "%$searchkeyword%", "%$searchkeyword%"));
			$avtomobil_techizatsayi=$avtomobil_techizat_sor->rowCount();
			if ($avtomobil_techizatsayi>0) {
				?>
				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="AvtomobilTechizati?siralama=<?php echo $id_sira ?>&axtar=<?php echo $searchkeyword?>">ID</a></th>
							<th><a href="AvtomobilTechizati?siralama=<?php echo $ad_sira_bolme ?>&axtar=<?php echo $searchkeyword?>">Bölmə</a></th>
							<th><a href="AvtomobilTechizati?siralama=<?php echo $ad_sira ?>&axtar=<?php echo $searchkeyword?>">Adı</a></th>
							<th class="KodSutunu">Durum</th>
							<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
						</thead>
						<tbody>
							<?php 
							while ($avtomobil_techizatcek= $avtomobil_techizat_sor->fetch(PDO::FETCH_ASSOC)) {
								$avtomobil_techizat_id=$avtomobil_techizatcek['avtomobil_techizat_id'];
								$avtomobil_techizat_ad=$avtomobil_techizatcek['avtomobil_techizat_ad'];	
								$avtomobil_techizat_bolmesi_id=$avtomobil_techizatcek['avtomobil_techizat_bolmesi_id'];	
								?>
								<tr id="satirid-<?php echo $avtomobil_techizat_id ?>">    
									<td class="SiraNomresiSutunu"> 
										<div class="SiraNomresi">
											<?php echo sprintf("%06s", $avtomobil_techizat_id ); ?>
										</div>
									</td>
									<td> 
										<?php 
										$avtomobil_techizat_bolmesi_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
										$avtomobil_techizat_bolmesi_sor->execute(array(
											'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
										$AvtomobilTechizatiCek= $avtomobil_techizat_bolmesi_sor->fetch(PDO::FETCH_ASSOC);
										echo $AvtomobilTechizatiCek['avtomobil_techizat_bolmesi_ad'];
										?>
										<input type="hidden" name="avtomobil_techizat_bolmesi_id" id="avtomobiltechizatbolmesiad-<?php echo $avtomobil_techizat_id ?>" value=" <?php echo $avtomobil_techizat_bolmesi_id; ?> ">
									</td>
									<td id="avtomobil_techizat_ad-<?php echo $avtomobil_techizat_id ?>"><?php echo $avtomobil_techizat_ad ?></td>
									<td class="KodSutunu">

										<label class="checkbox">
											<input <?php if($avtomobil_techizatcek['avtomobil_techizat_durum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'dovletdurum-'.$avtomobil_techizatcek['avtomobil_techizat_id'] ?>" onchange="AvtomobilTechizatiDurumKontrol(id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>

									</td>
									<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
										<a href="javascript:AvtomobilTechizatiYenile(<?php echo $avtomobil_techizat_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
										<a href="javascript:AvtomobilTechizatiSil(<?php echo $avtomobil_techizat_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>

					</table>

				</div>

				<div id="SayfalamaAlaniKapsayicisi">
					<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
						<?php echo $BulunanSayfaSayisiAxtar; ?> səyfədə, <?php echo $avtomobil_techizat_sayi; ?> qeydiyatlı dövlət var.  <label for="cars">Choose a car:</label>
						<select onchange="AvtomobilTechizatiListelemeLimiti(this.value)">
							<?php 
							if ($avtomobil_techizat_sayi>100) {
								$Limitsayi=100;
							}else{
								$Limitsayi=$avtomobil_techizat_sayi;
							}
							for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
								<option <?php if($avtomobil_techizat_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

							<?php }	
							if (($avtomobil_techizat_sayi%10)>0) { ?>
								<option <?php if($avtomobil_techizat_listeleme_limiti==$avtomobil_techizat_sayi){echo "selected";} ?> value="<?php echo $avtomobil_techizat_sayi; ?>"><?php echo $avtomobil_techizat_sayi; ?></option>
							<?php }
							?>
						</select>
					</div>
					<?php 
					if ($BulunanSayfaSayisiAxtar>1) {?>
						<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
							<?php
							if($GelenSayfalama<1){
								header("Location:AvtomobilTechizati?seyfe=$BulunanSayfaSayisiAxtar");
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
								header("Location:AvtomobilTechizati?seyfe=$BulunanSayfaSayisiAxtar");
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
				<span>Axtarışınıza uyğun avtomobil təchizatı yoxdur yoxdur</span>
			<?php  }
		}else{
			$avtomobil_techizat_Say_sor=$db->prepare("SELECT * FROM avtomobil_techizat");
			$avtomobil_techizat_Say_sor->execute();
			$avtomobil_techizat_sayi=$avtomobil_techizat_Say_sor->rowCount();
			if (	$avtomobil_techizat_sayi>0) {

			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:AvtomobilTechizati");
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}


			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$avtomobil_techizat_listeleme_limiti)-$avtomobil_techizat_listeleme_limiti;
			$BulunanSayfaSayisi                 = ceil($avtomobil_techizat_sayi/$avtomobil_techizat_listeleme_limiti);
			$AvtomobilTechizatiSor=$db->prepare("SELECT avtomobil_techizat.*,avtomobil_techizat_bolmesi.* FROM avtomobil_techizat INNER JOIN avtomobil_techizat_bolmesi ON avtomobil_techizat.avtomobil_techizat_bolmesi_id=avtomobil_techizat_bolmesi.avtomobil_techizat_bolmesi_id   order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $avtomobil_techizat_listeleme_limiti");
			$AvtomobilTechizatiSor->execute();
			?>

			<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
				<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>
						<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="AvtomobilTechizati?siralama=<?php echo $id_sira ?>">ID</a></th>
						<th><a href="AvtomobilTechizati?siralama=<?php echo $ad_sira_bolme ?>">Bolmə</a></th> 
						<th><a href="AvtomobilTechizati?siralama=<?php echo $ad_sira ?>">Adı</a></th>    

						<th class="KodSutunu">Durum</th>
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
					</thead>
					<tbody>


						<?php 


						while ($AvtomobilTechizatiCek= $AvtomobilTechizatiSor->fetch(PDO::FETCH_ASSOC)) {
							$avtomobil_techizat_id=$AvtomobilTechizatiCek['avtomobil_techizat_id'];
							$avtomobil_techizat_ad=$AvtomobilTechizatiCek['avtomobil_techizat_ad'];
							$avtomobil_techizat_bolmesi_id=$AvtomobilTechizatiCek['avtomobil_techizat_bolmesi_id'];	

							?>
							<tr id="satirid-<?php echo $avtomobil_techizat_id ?>">    
								<td class="SiraNomresiSutunu"> 
									<div class="SiraNomresi">
										<?php echo sprintf("%06s", $avtomobil_techizat_id ); ?>
									</div>

								</td>

								<td> 
									<?php 
									$avtomobil_techizat_bolmesi_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
									$avtomobil_techizat_bolmesi_sor->execute(array(
										'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
									$AvtomobilTechizatiBolmesiCek= $avtomobil_techizat_bolmesi_sor->fetch(PDO::FETCH_ASSOC);
									echo $AvtomobilTechizatiBolmesiCek['avtomobil_techizat_bolmesi_ad'];
									?>
									<input type="hidden" name="avtomobil_techizat_bolmesi_id" id="avtomobiltechizatbolmesiad-<?php echo $avtomobil_techizat_id ?>" value=" <?php echo $avtomobil_techizat_bolmesi_id; ?> ">
								</td>


								<td id="avtomobil_techizat_ad-<?php echo $avtomobil_techizat_id ?>"><?php echo $avtomobil_techizat_ad ?></td>

								<td class="KodSutunu">

									<label class="checkbox">
										<input <?php if($AvtomobilTechizatiCek['avtomobil_techizat_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'dovletdurum-'.$AvtomobilTechizatiCek['avtomobil_techizat_id'] ?>" onchange="AvtomobilTechizatiDurumKontrol(id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>

								</td>
								<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
									<a href="javascript:AvtomobilTechizatiYenile(<?php echo strval($avtomobil_techizat_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
									<a href="javascript:AvtomobilTechizatiSil(<?php echo $avtomobil_techizat_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>

				</table>

			</div>

			<div id="SayfalamaAlaniKapsayicisi">
				<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
					<?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $avtomobil_techizat_sayi; ?> qeydiyatlı avtomobil techizat bolmesi var. Göstərilən
					<select onchange="AvtomobilTechizatiListelemeLimiti(this.value)">
						<?php 
						if ($avtomobil_techizat_sayi>100) {
							$Limitsayi=100;
						}else{
							$Limitsayi=$avtomobil_techizat_sayi;
						}
						for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
							<option <?php if($avtomobil_techizat_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

						<?php }	
						if (($avtomobil_techizat_sayi%10)>0) { ?>
							<option <?php if($avtomobil_techizat_listeleme_limiti==$avtomobil_techizat_sayi){echo "selected";} ?> value="<?php echo $avtomobil_techizat_sayi; ?>"><?php echo $avtomobil_techizat_sayi; ?></option>
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
							header("Location:AvtomobilTechizati?seyfe=$BulunanSayfaSayisi");
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










		<?php  } } ?>











	</div>
</section>

<div id="YeniAvtomobilTechizatiUcunBolme" style="display: none;">
	<?php
	$AvtomobilTecizatBolmesiSor = $db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_durum=:avtomobil_techizat_bolmesi_durum");
	$AvtomobilTecizatBolmesiSor->execute(array(
		'avtomobil_techizat_bolmesi_durum' => 1
	));
	?>
	<select name="avtomobil_techizat_bolmesi_id_sec" tabindex="2" required="required" id="avtomobil_techizat_bolmesi_id_sec" class="FormAlanlariUcunSelectInputlari" onchange="SelectInputAlaniSecildi(this.id)">
		<option disabled="disabled" value="" selected="selected"> Secin...</option>
		<?php
		while ($AvtomobilTecizatBolmesiCek = $AvtomobilTecizatBolmesiSor->fetch(PDO::FETCH_ASSOC)) {
			?>
			<option value="<?php echo $AvtomobilTecizatBolmesiCek['avtomobil_techizat_bolmesi_id'] ?>"><?php echo $AvtomobilTecizatBolmesiCek['avtomobil_techizat_bolmesi_ad'] ?></option>
		<?php } ?>
	</select>
</div>

<?php require_once "_footer.php" ?>

<script type="text/javascript">


	function Yeni() {
		var formbaslaxic = '<form action="Islem/avtomobil_techizati_islem.php" method="POST" name="IslemFormu" ';
		var x = document.getElementById("YeniAvtomobilTechizatiUcunBolme").innerHTML;
		var bolmeadi='<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_bolmesi_id_sec_metni">Təchizat Bölməsi <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+x+'</div></div></div>';
		var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">	<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100"  id="avtomobil_techizat_ad"  tabindex="1" required="" name="avtomobil_techizat_ad"/></div></div></div>';
		var meksed = '<input type="hidden" id="YeniAvtomobilTechizati" name="YeniAvtomobilTechizati" ';
		var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Əlavə Et</button>' +
		'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic +bolmeadi+ adi+meksed + buttonalani + formbitis;
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}


	function AvtomobilTechizatiYenile(id) {
		var avtomobil_techizat_ad = "avtomobil_techizat_ad-" + id;
		var avtomobiltechizatbolmesiad = "avtomobiltechizatbolmesiad-" + id;
		var x = document.getElementById(avtomobil_techizat_ad).innerHTML;
		var formbaslaxic = '<form action="Islem/avtomobil_techizati_islem.php" method="POST" name="IslemFormu" ';
		var bolmeadi='<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_bolmesi_id_sec_metni">Təchizat Bölməsi <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi" id="Techizatbolmesisecimalani"></div></div></div>';
		var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">	<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100"  id="avtomobil_techizat_ad"  tabindex="1" required="" name="avtomobil_techizat_ad"/></div></div></div>';
		var yenileid = '<input type="hidden" id="avtomobil_techizat_id" name="avtomobil_techizat_id"> ';		
		var meksed = '<input type="hidden" id="Yenile" name="Yenile">';
		var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Yenilə</button>' +
		'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic +bolmeadi+ adi+meksed+yenileid + buttonalani + formbitis;
		document.getElementById('avtomobil_techizat_id').setAttribute("value", id);
		document.getElementById('avtomobil_techizat_ad').setAttribute("value", x);
		var e = document.getElementById(avtomobiltechizatbolmesiad).value;
		var AvtomobilTechizatiBolmesiTelebET = new XMLHttpRequest();
		AvtomobilTechizatiBolmesiTelebET.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("Techizatbolmesisecimalani").innerHTML = " ";
				document.getElementById("Techizatbolmesisecimalani").innerHTML = this.responseText;
			}
		};
		AvtomobilTechizatiBolmesiTelebET.open("GET", "AnliqYenilenmeler/AvtomobilTechizatiBolmesiTelebET.php?AvtomobilTechizatiBolmesi=" + e, true);
		AvtomobilTechizatiBolmesiTelebET.send();
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}






	function FormIslemleriKontrol() {
		if (document.getElementById("avtomobil_techizat_bolmesi_id_sec")) {
			if (document.getElementById("avtomobil_techizat_bolmesi_id_sec").value == "") {
				var avtomobil_techizat_bolmesi_id_sec = document.getElementById("avtomobil_techizat_bolmesi_id_sec");
				document.getElementById("avtomobil_techizat_bolmesi_id_sec_metni").style.color = "#ff0000";
				avtomobil_techizat_bolmesi_id_sec.style.outline = "none";
				avtomobil_techizat_bolmesi_id_sec.style.border = "2px solid #ff0000";
				avtomobil_techizat_bolmesi_id_sec.style.color = "#ff0000";
				return;
			}
		}
		if (document.getElementById("avtomobil_techizat_ad")) {
			if (document.getElementById("avtomobil_techizat_ad").value == "") {
				var avtomobil_techizat_ad = document.getElementById("avtomobil_techizat_ad");
				document.getElementById("avtomobil_techizat_ad_metni").style.color = "#ff0000";
				avtomobil_techizat_ad.style.outline = "none";
				avtomobil_techizat_ad.style.border = "2px solid #ff0000";
				avtomobil_techizat_ad.style.color = "#ff0000";
				avtomobil_techizat_ad.focus();
				return;
			}
		}
		document.IslemFormu.submit();
	}


	function MetinInputAlaniYazildi(deyer) {
		InputIcerikDeyeri=document.getElementById(deyer);
		if (InputIcerikDeyeri.value.length > InputIcerikDeyeri.maxLength) 
			InputIcerikDeyeri.value = InputIcerikDeyeri.value.slice(0, InputIcerikDeyeri.maxLength)
		var InputLabelMetni=deyer+"_metni";
		if (InputIcerikDeyeri.value == "") {			
			document.getElementById(InputLabelMetni).style.color = "#ff0000";
			InputIcerikDeyeri.style.color = "#ff0000";
			InputIcerikDeyeri.style.borderColor = "#ff0000";
			InputIcerikDeyeri.style.boxShadow = " 1px 0px 1px 0px #ff0000";
			InputIcerikDeyeri.classList.add("pleysoldercolorqirmizi");
			return;
		} else {
			document.getElementById(InputLabelMetni).style.color = "#2A3F54";
			InputIcerikDeyeri.style.color = "#2A3F54";
			InputIcerikDeyeri.style.borderColor = "#2A3F54";
			InputIcerikDeyeri.style.boxShadow = " 0px 0px 0px 0px #2A3F54";
			InputIcerikDeyeri.classList.remove("pleysoldercolorqirmizi");
			var Yoxla = InputIcerikDeyeri.value;			
			var YoxlanisNeticesi = Yoxla.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə\/\-()\s+]/g, "");
			InputIcerikDeyeri.value = YoxlanisNeticesi;
			return;
		}
	}

	function SagVeSolBosluklariSIl(deyer){
		InputIcerikDeyeri=document.getElementById(deyer);
		var Yoxlabir = InputIcerikDeyeri.value;		
		var Yoxla=Yoxlabir.trim();	
		InputIcerikDeyeri.value = Yoxla;
	}
	/*Avtomobil T'chizati Bomesi secildi*/
	function SelectInputAlaniSecildi(id) {
		var InputLabelMetni=id+"_metni";
		document.getElementById(InputLabelMetni).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.border = "1px solid #2A3F54";
	}
	/*Avtomobil T'chizati Bomesi secildi*/



	function AvtomobilTechizatiListelemeLimiti(Deyer) {
		var avtomobil_techizat_listeleme_limiti = Deyer
		var avtomobil_techizat_listeleme_siralam_xhttp = new XMLHttpRequest();
		avtomobil_techizat_listeleme_siralam_xhttp.open("POST", "Islem/avtomobil_techizati_islem.php", true);
		avtomobil_techizat_listeleme_siralam_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		avtomobil_techizat_listeleme_siralam_xhttp.send("avtomobil_techizat_listeleme_limiti=" + avtomobil_techizat_listeleme_limiti);
		avtomobil_techizat_listeleme_siralam_xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.reload()
			}
		}
	}
	/*Avtomobil Techizati Durum Kontrol*/
	function AvtomobilTechizatiDurumKontrol(ID) {
		var DurumID = ID.split("-");
		var AvtomobilTechizatiDurumId = DurumID;
		var AvtomobilTechizatiDurumId_xhttp = new XMLHttpRequest();
		AvtomobilTechizatiDurumId_xhttp.open("POST", "Islem/avtomobil_techizati_islem.php", true);
		AvtomobilTechizatiDurumId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		AvtomobilTechizatiDurumId_xhttp.send("AvtomobilTechizatiDurumId=" + AvtomobilTechizatiDurumId);
	}
	/*Avtomobil Techizati Durum Kontrol*/







	function AvtomobilTechizatiSil(IDDegeri) {
		document.getElementById("SilKaratmaAlani").style.display = "block";
		document.getElementById("SilModalAlani").style.display = "block";
		document.getElementById("SilModalMetinAlani").innerHTML = "Avtomobil təchizatı qeydiyatını silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin <b>Avtomobil təchizatı</b> silinəcək.";
		document.getElementById("SilIslemiOnayButonu").href = "javascript:AvtomobilTechizatiSilTesdiq(" + IDDegeri + ")";
		document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
		document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
	}

	function AvtomobilTechizatiSilImtina() {
		document.getElementById("SilKaratmaAlani").style.display = "none";
		document.getElementById("SilModalAlani").style.display = "none";
		document.getElementById("SilModalMetinAlani").innerHTML = "";
		document.getElementById("SilIslemiOnayButonu").href = "";
		document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "none";
		document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "none";
	}


	function AvtomobilTechizatiSilTesdiq(IDDegeri) {
		var AvtomobilTechizatiSilId = IDDegeri;
		var AvtomobilTechizatiSilId_xhttp = new XMLHttpRequest();
		AvtomobilTechizatiSilId_xhttp.open("POST", "Islem/avtomobil_techizati_islem.php", true);
		AvtomobilTechizatiSilId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		AvtomobilTechizatiSilId_xhttp.send("AvtomobilTechizatiSilId=" + AvtomobilTechizatiSilId);
		AvtomobilTechizatiSilId_xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
		window.location.reload()
			}
		}
	}








</script>