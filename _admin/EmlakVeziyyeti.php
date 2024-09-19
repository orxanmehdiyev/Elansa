<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			<?php 
			setcookie("Siralama", "");
			$durum=$_GET['durum'];
			if(isset($durum)){
				if ($durum=="silok") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Uğurla Silindi</span>
				<?php  }
				else{ ?>
					<span >Əmlak Vəziyyəti</span>
				<?php }
			} else{ ?>
				<span >Əmlak Vəziyyəti</span>
			<?php  }




			if(isset($_SESSION['emlakveziyyetissiralama'])){
				$Siralama=$_SESSION['emlakveziyyetissiralama'];			
				$link='EmlakVeziyyeti?';
			}else{
				
				$Siralama="emlakin_veziyyeti_id ASC";
				$link='EmlakVeziyyeti?';
			}
			if(!isset($_GET['durum']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"]) ){
			}else{
				header("Location:".$link);
				exit;
			}
			?>
		</div>    
	</div>
	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="EmlakVeziyyeti">Əmlak Vəziyyəti</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="Yeni()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="EmlakVeziyyeti" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>
		<?php 
		if(isset($_REQUEST['axtar'])){
			$searchkeyword=HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));    
			$axtarisuzunluq=strlen($searchkeyword);

			$sorsay = $db->prepare("SELECT * FROM emlakin_veziyyeti WHERE emlakin_veziyyeti_ad LIKE ?");
			$sorsay->execute(array("%$searchkeyword%"));
			$say=$sorsay->rowCount();

			if(isset($_GET['seyfe'])){
				$GelenSeyfeleme=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:".$link);
					exit;
				}
			}else{
				$GelenSeyfeleme=1;
			}
			$SeyfeBaslangicKayitSayi    = ($GelenSeyfeleme*$emlakin_veziyyeti_listeleme_limiti)-$emlakin_veziyyeti_listeleme_limiti;
			$BulunanSeyfeAxtarisSayisi  = ceil($say/$emlakin_veziyyeti_listeleme_limiti);
			$sor = $db->prepare("SELECT* FROM emlakin_veziyyeti  WHERE emlakin_veziyyeti_ad LIKE ? order by $Siralama LIMIT $SeyfeBaslangicKayitSayi, $emlakin_veziyyeti_listeleme_limiti");
			$sor->execute(array("%$searchkeyword%"));
			if ($say>0) {
				?>
				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>
						<th class="ListelemeAlaniIciTablosuSiraNomiresi">
							<form action="Islem/emlakin_veziyyeti_islem.php" method="POST">
								<input type="hidden" name="siralama"
								<?php if ($_SESSION['emlakveziyyetissiralama']=="emlakin_veziyyeti_id ASC") {
									echo 'value="emlakin_veziyyeti_id DESC"';
								}else{
									echo 'value="emlakin_veziyyeti_id ASC"';
								} ?>
								>
								<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">ID</a>
							</form>
						</th>		
						<th>
							<form action="Islem/emlakin_veziyyeti_islem.php" method="POST">
								<input type="hidden" name="siralama"
								<?php if ($_SESSION['emlakveziyyetissiralama']=="emlakin_veziyyeti_ad ASC") {
									echo 'value="emlakin_veziyyeti_ad DESC"';
								}else{
									echo 'value="emlakin_veziyyeti_ad ASC"';
								} ?>
								>
								<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">Adı</a>
							</form>
						</th>	
						<th class="KodSutunu">Menzi<br>Elanları Üçün</th>
						<th class="KodSutunu">Qaraj<br>Elanları Üçün</th>
						<th class="KodSutunu">Avtomobil<br>Elanları Üçün</th>
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
					</thead>
					<tbody>
						<?php 
						while ($cek= $sor->fetch(PDO::FETCH_ASSOC)) {
							$emlakin_veziyyeti_id=$cek['emlakin_veziyyeti_id'];					
							$emlakin_veziyyeti_ad=$cek['emlakin_veziyyeti_ad'];	
											
							?>
							<tr>    
								<td class="SiraNomresiSutunu"> 
									<div class="SiraNomresi">
										<?php echo sprintf("%06s", $emlakin_veziyyeti_id ); ?>
									</div>
								</td>						
								<td id="emlakin_veziyyeti_ad-<?php echo $emlakin_veziyyeti_id ?>"><?php echo $emlakin_veziyyeti_ad ?></td>	



								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($cek['menzil_elanlari_ucun_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($cek['menzil_elanlari_ucun_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'menzil_elanlari_ucun_durum-'.$cek['emlakin_veziyyeti_id'] ?>" onchange="MenzilElanlariUcunDurum(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>

								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($cek['qaraj_elanlari_ucun_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($cek['qaraj_elanlari_ucun_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'qaraj_elanlari_ucun_durum-'.$cek['emlakin_veziyyeti_id'] ?>" onchange="QarajElanlariUcunDurum(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>

								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($cek['avtomobil_elanlari_ucun_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($cek['avtomobil_elanlari_ucun_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'avtomobil_elanlari_ucun_durum-'.$cek['emlakin_veziyyeti_id'] ?>" onchange="AvtomobilElanlariUcunDurum(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>



								<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
									<a href="javascript:Yenile(<?php echo strval($emlakin_veziyyeti_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
									<a href="javascript:Sil(<?php echo $emlakin_veziyyeti_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>

				</table>
				</div>
				<div id="SayfalamaAlaniKapsayicisi">
					<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
						<?php echo $BulunanSeyfeAxtarisSayisi; ?> səyfədə, <?php echo $say; ?> Qeydiyatlı Əmlak Vəziyyəti Var.   <label for="cars">Göstərilən:</label>
						<select onchange="ListelemeLimiti(this.value)">
							<?php 
							if ($say>100) {
								$Limitsayi=100;
							}else{
								$Limitsayi=$say;
							}
							for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
								<option <?php if($emlakin_veziyyeti_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

							<?php }	
							if (($say%10)>0) { ?>
								<option <?php if($emlakin_veziyyeti_listeleme_limiti==$say){echo "selected";} ?> value="<?php echo $say; ?>"><?php echo $say; ?></option>
							<?php }


							?>
						</select>
					</div>
					<?php 
					if ($BulunanSeyfeAxtarisSayisi>1) {?>
						<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
							<?php
							if($GelenSeyfeleme<1){
								header("Location:EmlakVeziyyeti?seyfe=$BulunanSeyfeAxtarisSayisi");
							}
							if ($GelenSeyfeleme>1) {
								$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSeyfeleme-1;
								echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=1&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							}else{
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							}
							for($SayfalamaIcinSayfaIndexDegeri=$GelenSeyfeleme-5; $SayfalamaIcinSayfaIndexDegeri<=$GelenSeyfeleme+5; $SayfalamaIcinSayfaIndexDegeri++){
								if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSeyfeAxtarisSayisi)){
									if($SayfalamaIcinSayfaIndexDegeri==$GelenSeyfeleme){
										echo  "<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
									}else{
										echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaIndexDegeri."&axtar=".urlencode($searchkeyword)."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
									}
								}
							}
							if($GelenSeyfeleme>$BulunanSeyfeAxtarisSayisi){
								header("Location:EmlakVeziyyeti?seyfe=$BulunanSeyfeAxtarisSayisi");
							}

							if($GelenSeyfeleme!=$BulunanSeyfeAxtarisSayisi){
								$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSeyfeleme+1;
								echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$BulunanSeyfeAxtarisSayisi."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
							}else{
								$SayfalamaIcinSayfaDegeriniBirIleriAl=$BulunanSeyfeAxtarisSayisi;
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
							}
							?>
						</div>
					<?php } ?>
				</div>


























				<?php 
			} else{  ?>
				<span>Axtarışınıza Uyğun Nəticə Yoxdur</span>
			<?php  }
		}else{
			$Say_sor = $db->prepare("SELECT * FROM emlakin_veziyyeti");
			$Say_sor->execute();
			$say=$Say_sor->rowCount();
			if(isset($_GET['seyfe'])){
				$GelenSeyfeleme=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:".$link);
					exit;
				}
			}else{
				$GelenSeyfeleme=1;
			}


			$SeyfeBaslangicKayitSayi   = ($GelenSeyfeleme*$emlakin_veziyyeti_listeleme_limiti)-$emlakin_veziyyeti_listeleme_limiti;
			$BulunanSayfaSayisi                 = ceil($say/$emlakin_veziyyeti_listeleme_limiti);
			$sor = $db->prepare("SELECT * FROM emlakin_veziyyeti order by $Siralama LIMIT $SeyfeBaslangicKayitSayi, $emlakin_veziyyeti_listeleme_limiti");
			$sor->execute();

			?>

			<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
				<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>
						<th class="ListelemeAlaniIciTablosuSiraNomiresi">
							<form action="Islem/emlakin_veziyyeti_islem.php" method="POST">
								<input type="hidden" name="siralama"
								<?php if ($_SESSION['emlakveziyyetissiralama']=="emlakin_veziyyeti_id ASC") {
									echo 'value="emlakin_veziyyeti_id DESC"';
								}else{
									echo 'value="emlakin_veziyyeti_id ASC"';
								} ?>
								>
								<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">ID</a>
							</form>
						</th>		
						<th>
							<form action="Islem/emlakin_veziyyeti_islem.php" method="POST">
								<input type="hidden" name="siralama"
								<?php if ($_SESSION['emlakveziyyetissiralama']=="emlakin_veziyyeti_ad ASC") {
									echo 'value="emlakin_veziyyeti_ad DESC"';
								}else{
									echo 'value="emlakin_veziyyeti_ad ASC"';
								} ?>
								>
								<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">Adı</a>
							</form>
						</th>	
						<th class="KodSutunu">Menzi<br>Elanları Üçün</th>
						<th class="KodSutunu">Qaraj<br>Elanları Üçün</th>
						<th class="KodSutunu">Avtomobil<br>Elanları Üçün</th>
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
					</thead>
					<tbody>
						<?php 
						while ($cek= $sor->fetch(PDO::FETCH_ASSOC)) {
							$emlakin_veziyyeti_id=$cek['emlakin_veziyyeti_id'];					
							$emlakin_veziyyeti_ad=$cek['emlakin_veziyyeti_ad'];	
											
							?>
							<tr>    
								<td class="SiraNomresiSutunu"> 
									<div class="SiraNomresi">
										<?php echo sprintf("%06s", $emlakin_veziyyeti_id ); ?>
									</div>
								</td>						
								<td id="emlakin_veziyyeti_ad-<?php echo $emlakin_veziyyeti_id ?>"><?php echo $emlakin_veziyyeti_ad ?></td>	



								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($cek['menzil_elanlari_ucun_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($cek['menzil_elanlari_ucun_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'menzil_elanlari_ucun_durum-'.$cek['emlakin_veziyyeti_id'] ?>" onchange="MenzilElanlariUcunDurum(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>

								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($cek['qaraj_elanlari_ucun_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($cek['qaraj_elanlari_ucun_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'qaraj_elanlari_ucun_durum-'.$cek['emlakin_veziyyeti_id'] ?>" onchange="QarajElanlariUcunDurum(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>

								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($cek['avtomobil_elanlari_ucun_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($cek['avtomobil_elanlari_ucun_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'avtomobil_elanlari_ucun_durum-'.$cek['emlakin_veziyyeti_id'] ?>" onchange="AvtomobilElanlariUcunDurum(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>



								<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
									<a href="javascript:Yenile(<?php echo strval($emlakin_veziyyeti_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
									<a href="javascript:Sil(<?php echo $emlakin_veziyyeti_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>

				</table>

			</div>

			<div id="SayfalamaAlaniKapsayicisi">
				<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
					<?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $say; ?> Qeydiyatlı Əmlak Vəziyyəti Var. Göstərilən
					<select onchange="ListelemeLimiti(this.value)">
						<?php 
						if ($say>100) {
							$Limitsayi=100;
						}else{
							$Limitsayi=$say;
						}
						for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
							<option <?php if($emlakin_veziyyeti_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

						<?php }	
						if (($say%10)>0) { ?>
							<option <?php if($emlakin_veziyyeti_listeleme_limiti==$say){echo "selected";} ?> value="<?php echo $say; ?>"><?php echo $say; ?></option>
						<?php }


						?>
					</select>
					<button>Print</button>
				</div>
				<?php 
				if ($BulunanSayfaSayisi>1) {?>
					<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
						<?php
						if($GelenSeyfeleme<1){
							header("Location:EmlakVeziyyeti?seyfe=$BulunanSayfaSayisi");
						}
						if ($GelenSeyfeleme>1) {
							$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSeyfeleme-1;
							echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=1\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}else{
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}
						for($SayfalamaIcinSayfaIndexDegeri=$GelenSeyfeleme-5; $SayfalamaIcinSayfaIndexDegeri<=$GelenSeyfeleme+5; $SayfalamaIcinSayfaIndexDegeri++){
							if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
								if($SayfalamaIcinSayfaIndexDegeri==$GelenSeyfeleme){
									echo  "<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
								}else{
									echo  "<span class=\"Pasif\"><a href=\"$site_url/_admin/".$link."seyfe=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
								}
							}
						}
						if($GelenSeyfeleme>$BulunanSayfaSayisi){
							header("Location:".$link."seyfe=$BulunanSayfaSayisi");
						}
						if($GelenSeyfeleme!=$BulunanSayfaSayisi){
							$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSeyfeleme+1;
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

<script type="text/javascript">
	function Yeni() {
		var formbaslaxic = '<form action="Islem/emlakin_veziyyeti_islem.php" method="POST" name="IslemFormu">';		
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="emlakin_veziyyeti_ad_metni">'+
		'Adıs<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		'<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="emlakin_veziyyeti_ad" tabindex="1" required="" name="emlakin_veziyyeti_ad">'+
		'</div>'+
		'</div>'+
		'</div>';	
		var buttonalani = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">'+
		'<button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Əlavə Et</button>'+
		'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'+
		'</div>'+
		'</div>';
		var meksed = '<input type="hidden" id="Yeni" name="Yeni"> ';
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic + adi+meksed + buttonalani + formbitis;
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}

	function Yenile(id) {
		var emlakin_veziyyeti_Ad = "emlakin_veziyyeti_ad-" + id;
		var x = document.getElementById(emlakin_veziyyeti_Ad).innerHTML;
		var formbaslaxic = '<form action="Islem/emlakin_veziyyeti_islem.php" method="POST" name="IslemFormu">';		
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="emlakin_veziyyeti_ad_metni">'+
		'Adıs<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		'<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="emlakin_veziyyeti_ad" tabindex="1" required="" name="emlakin_veziyyeti_ad">'+
		'</div>'+
		'</div>'+
		'</div>';	
		var buttonalani = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">'+
		'<button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Yenilə</button>'+
		'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'+
		'</div>'+
		'</div>';
		var meksed = '<input type="hidden" id="Yenile" name="Yenile">';
		var emlakin_veziyyeti_yenile_id = '<input type="hidden" id="emlakin_veziyyeti_yenile_id" name="emlakin_veziyyeti_id">';
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic + adi+meksed+ emlakin_veziyyeti_yenile_id + buttonalani + formbitis;
		document.getElementById('emlakin_veziyyeti_yenile_id').setAttribute("value", id);
		document.getElementById('emlakin_veziyyeti_ad').setAttribute("value", x);
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}



	function FormIslemleriKontrol() {
		if (document.getElementById("emlakin_veziyyeti_ad")) {
			if (document.getElementById("emlakin_veziyyeti_ad").value == "") {
				var emlakin_veziyyeti_ad = document.getElementById("emlakin_veziyyeti_ad");
				document.getElementById("emlakin_veziyyeti_ad_metni").style.color = "#ff0000";
				emlakin_veziyyeti_ad.style.outline = "none";
				emlakin_veziyyeti_ad.style.border = "2px solid #ff0000";
				emlakin_veziyyeti_ad.style.color = "#ff0000";
				emlakin_veziyyeti_ad.focus();
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
			var YoxlanisNeticesi = Yoxla.replace(/[^a-zA-Z0-9ÇçĞğİıÖöŞşÜüƏə\/\-()\s+]/g, "");
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


	function ListelemeLimiti(Deyer) {
		var emlakin_veziyyeti_listeleme_limiti = Deyer
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/emlakin_veziyyeti_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("emlakin_veziyyeti_listeleme_limiti=" + emlakin_veziyyeti_listeleme_limiti);
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.reload()
			}
		}
	}

	function MenzilElanlariUcunDurum(ID) {
		var MenzilElanlariUcunDurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/emlakin_veziyyeti_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("MenzilElanlariUcunDurumID=" + MenzilElanlariUcunDurumID[1]);
	}

	function QarajElanlariUcunDurum(ID) {
		var QarajElanlariUcunDurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/emlakin_veziyyeti_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("QarajElanlariUcunDurumID=" + QarajElanlariUcunDurumID[1]);
	}

	function AvtomobilElanlariUcunDurum(ID) {
		var AvtomobilElanlariUcunDurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/emlakin_veziyyeti_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("AvtomobilElanlariUcunDurumID=" + AvtomobilElanlariUcunDurumID[1]);
	}

	function Sil(SilID) {
		document.getElementById("SilKaratmaAlani").style.display = "block";
		document.getElementById("SilModalAlani").style.display = "block";
		document.getElementById("SilModalMetinAlani").innerHTML = "Əmlak Vəziyyətinü silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin <b>Əmlak Vəziyyəti</b> silinəcək.";
		document.getElementById("SilIslemiOnayButonu").href = "javascript:SilTesdiq(" + SilID + ")";
		document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
		document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
	}

	function SilTesdiq(SilID) {
		var Xhttp = new XMLHttpRequest();
		Xhttp.open("POST", "Islem/emlakin_veziyyeti_islem.php", true);
		Xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		Xhttp.send("SilID=" + SilID);
		Xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.assign("http://www.orayhus.com/_admin/EmlakVeziyyeti?durum=silok")
			}
		}
	}

</script>
<?php require_once "_footer.php" ?>