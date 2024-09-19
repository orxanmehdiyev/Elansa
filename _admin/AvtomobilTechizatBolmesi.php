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
					<span style="color: #00e600;">Avtomobil Təchizat Bölməsinin Silindi</span>
				<?php  }else{
					echo "Avtomobil Təchizat Bölməsinin Tənzimlənmələri";
				}
			} else{
				echo "Avtomobil Təchizat Bölməsinin Tənzimlənmələri";
			}
			if(!isset($_GET['durum']) or !isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"]) ){

			}else{
				header("Location:AvtomobilTechizatBolmesi");
			}
			?>
		</div>    
	</div>

	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="AvtomobilTechizatBolmesi">Avtomobil Təchizat Bölməsi</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="YeniAvtomobilTəchizatBölməsi()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="AvtomobilTechizatBolmesi" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>

		<?php 
		if(isset($_REQUEST['siralama'])){
			if($_REQUEST['siralama']=="id_sira_asc"){
				$id_sira="id_sira_desc";
				$ad_sira="ad_sira_asc";
				$siralama="avtomobil_techizat_bolmesi_id ASC";
				$link='AvtomobilTechizatBolmesi?siralama=id_sira_asc&';
			}
			elseif ($_REQUEST['siralama']=="id_sira_desc") {
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_asc";
				$siralama="avtomobil_techizat_bolmesi_id DESC";
				$link='AvtomobilTechizatBolmesi?siralama=id_sira_desc&';
			}
			elseif ($_REQUEST['siralama']=="ad_sira_asc") {
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_desc";
				$siralama="avtomobil_techizat_bolmesi_ad ASC";
				$link='AvtomobilTechizatBolmesi?siralama=ad_sira_asc&';
			}
			elseif ($_REQUEST['siralama']=="ad_sira_desc") {
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_asc";
				$siralama="avtomobil_techizat_bolmesi_ad DESC";
				$link='AvtomobilTechizatBolmesi?siralama=ad_sira_desc&';
			}
			else{
				$siralama="avtomobil_techizat_bolmesi_id ASC";
				$id_sira="id_sira_asc";
				$ad_sira="ad_sira_asc";
				$link='AvtomobilTechizatBolmesi?';
			}

		}else{
			$siralama="avtomobil_techizat_bolmesi_id ASC";
			$id_sira="id_sira_asc";
			$ad_sira="ad_sira_asc";
			$link='AvtomobilTechizatBolmesi.php?';
		}


		if(isset($_REQUEST['axtar'])){
			$searchkeyword=HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));    
			$axtarisuzunluq=strlen($searchkeyword);


			$avtomobil_techizat_bolmesi_say_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_ad LIKE ?");
			$avtomobil_techizat_bolmesi_say_sor->execute(array("%$searchkeyword%"));
			$avtomobil_techizat_bolmesi_sayi=$avtomobil_techizat_bolmesi_say_sor->rowCount();

			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:".$link);
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}
			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$avtomobil_techizati_bolmesi_listeleme_limiti)-$avtomobil_techizati_bolmesi_listeleme_limiti;
			$BulunanSayfaSayisiAxtar                 = ceil($avtomobil_techizat_bolmesi_sayi/$avtomobil_techizati_bolmesi_listeleme_limiti);
			$avtomobil_techizat_bolmesi_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_ad LIKE ? order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $avtomobil_techizati_bolmesi_listeleme_limiti");
			$avtomobil_techizat_bolmesi_sor->execute(array( "%$searchkeyword%"));
			$avtomobil_techizat_bolmesisayi=$avtomobil_techizat_bolmesi_sor->rowCount();
			if ($avtomobil_techizat_bolmesisayi>0) {
				?>
				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="AvtomobilTechizatBolmesi?siralama=<?php echo $id_sira ?>&axtar=<?php echo $searchkeyword?>">ID</a></th>
							<th><a href="AvtomobilTechizatBolmesi?siralama=<?php echo $ad_sira ?>&axtar=<?php echo $searchkeyword?>">Adı</a></th>
							<th class="KodSutunu">Durum</th>
							<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
						</thead>
						<tbody>
							<?php 
							while ($avtomobil_techizat_bolmesicek= $avtomobil_techizat_bolmesi_sor->fetch(PDO::FETCH_ASSOC)) {
								$avtomobil_techizat_bolmesi_id=$avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_id'];
								$avtomobil_techizat_bolmesi_ad=$avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_ad'];		
								?>
								<tr id="satirid-<?php echo $avtomobil_techizat_bolmesi_id ?>">    
									<td class="SiraNomresiSutunu"> 
										<div class="SiraNomresi">
											<?php echo $avtomobil_techizat_bolmesi_id ?>
										</div>
									</td>
									<td id="avtomobil_techizat_bolmesi_ad-<?php echo $avtomobil_techizat_bolmesi_id ?>"><?php echo $avtomobil_techizat_bolmesi_ad ?></td>
									<td class="KodSutunu">

										<label class="checkbox">
											<input <?php if($avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_durum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'dovletdurum-'.$avtomobil_techizat_bolmesicek['avtomobil_techizat_bolmesi_id'] ?>" onchange="AvtomobilTechizatiBolmesiDurumKontrol(id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>

									</td>
									<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
										<a href="javascript:AvtomobilTechizatiBolmesiYenileAc(<?php echo $avtomobil_techizat_bolmesi_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
										<a href="javascript:AvtomobilTechizatBolmesiSil(<?php echo $avtomobil_techizat_bolmesi_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>

					</table>

				</div>

				<div id="SayfalamaAlaniKapsayicisi">
					<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
						<?php echo $BulunanSayfaSayisiAxtar; ?> səyfədə, <?php echo $avtomobil_techizat_bolmesi_sayi; ?> qeydiyatlı dövlət var.  <label for="cars">Choose a car:</label>
						<select onchange="AvtomobilTechizatBolmesiListelemeLimiti(this.value)">
							<?php 
							if ($avtomobil_techizat_bolmesi_sayi>100) {
								$Limitsayi=100;
							}else{
								$Limitsayi=$avtomobil_techizat_bolmesi_sayi;
							}
							for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
								<option <?php if($avtomobil_techizati_bolmesi_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

							<?php }	
							if (($avtomobil_techizat_bolmesi_sayi%10)>0) { ?>
								<option <?php if($avtomobil_techizati_bolmesi_listeleme_limiti==$avtomobil_techizat_bolmesi_sayi){echo "selected";} ?> value="<?php echo $avtomobil_techizat_bolmesi_sayi; ?>"><?php echo $avtomobil_techizat_bolmesi_sayi; ?></option>
							<?php }


							?>
						</select>
					</div>
					<?php 
					if ($BulunanSayfaSayisiAxtar>1) {?>
						<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
							<?php
							if($GelenSayfalama<1){
								header("Location:AvtomobilTechizatBolmesi?seyfe=$BulunanSayfaSayisiAxtar");
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
								header("Location:AvtomobilTechizatBolmesi?seyfe=$BulunanSayfaSayisiAxtar");
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
			$avtomobil_techizat_bolmesi_say_sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi");
			$avtomobil_techizat_bolmesi_say_sor->execute();
			$avtomobil_techizat_bolmesi_sayi=$avtomobil_techizat_bolmesi_say_sor->rowCount();
			if ($avtomobil_techizat_bolmesi_sayi>0) {
				
				if(isset($_GET['seyfe'])){
					$GelenSayfalama=$_GET['seyfe'];
					if($_GET['seyfe']<1){
						header("Location:AvtomobilTechizatBolmesi");
						exit;
					}
				}else{
					$GelenSayfalama=1;
				}


				$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$avtomobil_techizati_bolmesi_listeleme_limiti)-$avtomobil_techizati_bolmesi_listeleme_limiti;
				$BulunanSayfaSayisi                 = ceil($avtomobil_techizat_bolmesi_sayi/$avtomobil_techizati_bolmesi_listeleme_limiti);
				$AvtomobilTechizatBolmesiSor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $avtomobil_techizati_bolmesi_listeleme_limiti");
				$AvtomobilTechizatBolmesiSor->execute();
				?>

				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="AvtomobilTechizatBolmesi?siralama=<?php echo $id_sira ?>">ID</a></th>
							<th><a href="AvtomobilTechizatBolmesi?siralama=<?php echo $ad_sira ?>">Adı</a></th>    

							<th class="KodSutunu">Durum</th>
							<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
						</thead>
						<tbody>


							<?php 


							while ($AvtomobilTechizatBolmesiCek= $AvtomobilTechizatBolmesiSor->fetch(PDO::FETCH_ASSOC)) {
								$avtomobil_techizat_bolmesi_id=$AvtomobilTechizatBolmesiCek['avtomobil_techizat_bolmesi_id'];
								$avtomobil_techizat_bolmesi_ad=$AvtomobilTechizatBolmesiCek['avtomobil_techizat_bolmesi_ad'];

								?>
								<tr id="satirid-<?php echo $avtomobil_techizat_bolmesi_id ?>">    
									<td class="SiraNomresiSutunu"> 
										<div class="SiraNomresi">
											<?php echo sprintf("%06s", $avtomobil_techizat_bolmesi_id ); ?>
										</div>

									</td>
									<td id="avtomobil_techizat_bolmesi_ad-<?php echo $avtomobil_techizat_bolmesi_id ?>"><?php echo $avtomobil_techizat_bolmesi_ad ?></td>

									<td class="KodSutunu">	
										<label class="checkbox">
											<input <?php if($AvtomobilTechizatBolmesiCek['avtomobil_techizat_bolmesi_durum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'avtomobil_techizat_bolmesi_durum-'.$AvtomobilTechizatBolmesiCek['avtomobil_techizat_bolmesi_id'] ?>" onchange="AvtomobilTechizatiBolmesiDurumKontrol(this.id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>
									</td>
									<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
										<a href="javascript:AvtomobilTechizatiBolmesiYenileAc(<?php echo strval($avtomobil_techizat_bolmesi_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
										<a href="javascript:AvtomobilTechizatBolmesiSil(<?php echo $avtomobil_techizat_bolmesi_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>

					</table>

				</div>

				<div id="SayfalamaAlaniKapsayicisi">
					<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
						<?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $avtomobil_techizat_bolmesi_sayi; ?> qeydiyatlı avtomobil techizat bolmesi var. Göstərilən
						<select onchange="AvtomobilTechizatBolmesiListelemeLimiti(this.value)">
							<?php 
							if ($avtomobil_techizat_bolmesi_sayi>100) {
								$Limitsayi=100;
							}else{
								$Limitsayi=$avtomobil_techizat_bolmesi_sayi;
							}
							for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
								<option <?php if($avtomobil_techizati_bolmesi_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

							<?php }	
							if (($avtomobil_techizat_bolmesi_sayi%10)>0) { ?>
								<option <?php if($avtomobil_techizati_bolmesi_listeleme_limiti==$avtomobil_techizat_bolmesi_sayi){echo "selected";} ?> value="<?php echo $avtomobil_techizat_bolmesi_sayi; ?>"><?php echo $avtomobil_techizat_bolmesi_sayi; ?></option>
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
								header("Location:AvtomobilTechizatBolmesi?seyfe=$BulunanSayfaSayisi");
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










			<?php  } }?>











		</div>
	</section>



	<?php require_once "_footer.php" ?>
	<script type="text/javascript">


		function YeniAvtomobilTəchizatBölməsi() {
			var formbaslaxic = '<form action="Islem/avtomobil_techizati_bolmesi_islem.php" method="POST" name="IslemFormu" ';
			var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_bolmesi_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">	<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100"  id="avtomobil_techizat_bolmesi_ad"  tabindex="1" required="" name="avtomobil_techizat_bolmesi_ad"/></div></div></div>';
			var meksed = '<input type="hidden" id="YeniAvtomobilTechizatiBolmesi" name="YeniAvtomobilTechizatiBolmesi" ';
			var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Əlavə Et</button>' +
			'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
			var formbitis = '</form>';
			document.getElementById("modalformalaniici").innerHTML = formbaslaxic + adi+meksed + buttonalani + formbitis;
			document.getElementById("Modal").style.display = "block";
			document.getElementById("ModalAlani").style.display = "block";
		}


		function AvtomobilTechizatiBolmesiYenileAc(id) {
			var avtomobil_techizat_bolmesi_ad = "avtomobil_techizat_bolmesi_ad-" + id;
			var x = document.getElementById(avtomobil_techizat_bolmesi_ad).innerHTML;
			var formbaslaxic = '<form action="Islem/avtomobil_techizati_bolmesi_islem.php" method="POST" name="IslemFormu" ';
			var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_techizat_bolmesi_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">	<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100"  id="avtomobil_techizat_bolmesi_ad"  tabindex="1" required="" name="avtomobil_techizat_bolmesi_ad"/></div></div></div>';
			var yenileid = '<input type="hidden" id="yenileid" name="avtomobil_techizat_bolmesi_id"> ';		
			var meksed = '<input type="hidden" id="AvtomobilTechizatiBolmesiYenile" name="AvtomobilTechizatiBolmesiYenile">';
			var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Yenilə</button>' +
			'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
			var formbitis = '</form>';
			document.getElementById("modalformalaniici").innerHTML = formbaslaxic   + adi  + yenileid + meksed  + buttonalani + formbitis;
			document.getElementById('yenileid').setAttribute("value", id);
			document.getElementById('avtomobil_techizat_bolmesi_ad').setAttribute("value", x);
			document.getElementById("Modal").style.display = "block";
			document.getElementById("ModalAlani").style.display = "block";
		}



		function FormIslemleriKontrol() {
			if (document.getElementById("avtomobil_techizat_bolmesi_ad")) {
				if (document.getElementById("avtomobil_techizat_bolmesi_ad").value == "") {
					var avtomobil_techizat_bolmesi_ad = document.getElementById("avtomobil_techizat_bolmesi_ad");
					document.getElementById("avtomobil_techizat_bolmesi_ad_metni").style.color = "#ff0000";
					avtomobil_techizat_bolmesi_ad.style.outline = "none";
					avtomobil_techizat_bolmesi_ad.style.border = "2px solid #ff0000";
					avtomobil_techizat_bolmesi_ad.style.color = "#ff0000";
					avtomobil_techizat_bolmesi_ad.focus();
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


		/*AVtomobil Techizati Bolmesi Listeleme Limiti*/
		function AvtomobilTechizatBolmesiListelemeLimiti(Deyer) {
			var avtomobil_techizati_bolme_siralam = Deyer
			var avtomobil_techizati_bolme_siralam_xhttp = new XMLHttpRequest();
			avtomobil_techizati_bolme_siralam_xhttp.open("POST", "Islem/avtomobil_techizati_bolmesi_islem.php", true);
			avtomobil_techizati_bolme_siralam_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			avtomobil_techizati_bolme_siralam_xhttp.send("avtomobil_techizati_bolme_siralam=" + avtomobil_techizati_bolme_siralam);
			avtomobil_techizati_bolme_siralam_xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					window.location.reload()
				}
			}
		}
		/*AVtomobil Techizati Bolmesi Listeleme Limiti*/

		/*Avtomobil Techizati Bolmesi Durum Kontrol*/
		function AvtomobilTechizatiBolmesiDurumKontrol(ID) {
			var DurumID = ID.split("-");
			var avtomobil_techizat_bolmesi_durum_id = DurumID;
			avtomobil_techizat_bolmesi_id_xhttp = new XMLHttpRequest();
			avtomobil_techizat_bolmesi_id_xhttp.open("POST", "Islem/avtomobil_techizati_bolmesi_islem.php", true);
			avtomobil_techizat_bolmesi_id_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			avtomobil_techizat_bolmesi_id_xhttp.send("avtomobil_techizat_bolmesi_durum_id=" + avtomobil_techizat_bolmesi_durum_id);
			avtomobil_techizat_bolmesi_id_xhttp.onreadystatechange = function () {
			}
		}
		/*Avtomobil Techizati Bolmesi Durum Kontrol*/





		function AvtomobilTechizatBolmesiSil(IDDegeri) {
			document.getElementById("SilKaratmaAlani").style.display = "block";
			document.getElementById("SilModalAlani").style.display = "block";
			document.getElementById("SilModalMetinAlani").innerHTML = "Avtomobil təchizatı bölməsi qeydiyatını silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin Avtomobil təchizatına bağlı bütün <b>Təchizatlar</b>  silinəcək.";
			document.getElementById("SilIslemiOnayButonu").href = "javascript:AvtomobilTechizatiBolmesiSilTesdiq(" + IDDegeri + ")";
			document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
			document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
		}

		function AvtomobilTechizatiBolmesiSilImtina() {
			document.getElementById("SilKaratmaAlani").style.display = "none";
			document.getElementById("SilModalAlani").style.display = "none";
			document.getElementById("SilModalMetinAlani").innerHTML = "";
			document.getElementById("SilIslemiOnayButonu").href = "";
			document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "none";
			document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "none";
		}


		function AvtomobilTechizatiBolmesiSilTesdiq(IDDegeri) {
			var AvtomobilTechizatiBolmesiSilId = IDDegeri;
			var AvtomobilTechizatiBolmesiSilId_xhttp = new XMLHttpRequest();
			AvtomobilTechizatiBolmesiSilId_xhttp.open("POST", "Islem/avtomobil_techizati_bolmesi_islem.php", true);
			AvtomobilTechizatiBolmesiSilId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			AvtomobilTechizatiBolmesiSilId_xhttp.send("AvtomobilTechizatiBolmesiSilId=" + AvtomobilTechizatiBolmesiSilId);
			AvtomobilTechizatiBolmesiSilId_xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					window.location.reload()
				}
			}
		}






	</script>