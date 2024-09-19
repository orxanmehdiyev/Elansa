<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			Super Users
			<?php 
			if(!isset($_GET['durum']) or !isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"]) ){
			}else{
				header("Location:Users");
			}
			?>
		</div>    
	</div>
	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="Users">Super Users</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="Userselaveet" ><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="Users" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>

		<?php 
		if(isset($_REQUEST['siralama'])){
			if($_REQUEST['siralama']=="adminadsiraasc"){
				$siralama="admin_ad ASC";
				$adminidsira="adminidsiraasc";
				$adminadsira="adminadsiradesc";			
				$link='Users?siralama=adminadsiraasc&';
			}
			elseif ($_REQUEST['siralama']=="adminadsiradesc") {
				$siralama="admin_ad DESC";
				$adminidsira="adminidsiraasc";
				$adminadsira="adminadsiraasc";	
				$link='Users?siralama=adminadsiradesc&';
			}



			elseif ($_REQUEST['siralama']=="adminidsiraasc") {
				$siralama="admin_id ASC";
				$adminidsira="adminidsiradesc";
				$adminadsira="adminadsiraasc";				
				$link='Users?siralama=adminidsiraasc&';
			}
			elseif ($_REQUEST['siralama']=="adminidsiradesc") {
				$siralama="admin_id DESC";
				$adminidsira="adminidsiraasc";
				$adminadsira="adminadsiraasc";
				$link='Users?siralama=adminidsiradesc&';
			}
			else{
				$siralama="admin_id ASC";
				$adminidsira="adminidsiraasc";
				$adminadsira="adminadsiraasc";	
				$link='Users?';
			}
		}else{
			$siralama="admin_id ASC";
			$adminidsira="adminidsiraasc";
			$adminadsira="adminadsiraasc";
			$link='Users?';
		}


		if(isset($_REQUEST['axtar'])){
			$searchkeyword=HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));    
			$axtarisuzunluq=strlen($searchkeyword);


			$adminsaysor=$db->prepare("SELECT * FROM admin where admin_ad LIKE ? or admin_soyad LIKE ? or admin_ata_ad LIKE ?");
			$adminsaysor->execute(array("%$searchkeyword%","%$searchkeyword%","%$searchkeyword%"));
			$adminsayi=$adminsaysor->rowCount();

			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:".$link);
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}
			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$admin_listeleme_limiti)-$admin_listeleme_limiti;
			$BulunanSayfaSayisiAxtar                 = ceil($adminsayi/$admin_listeleme_limiti);
			$adminsor=$db->prepare("SELECT * FROM admin where admin_ad LIKE ? order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $admin_listeleme_limiti");
			$adminsor->execute(array( "%$searchkeyword%"));
			$adminaxtarsayi=$adminsor->rowCount();
			if ($adminaxtarsayi>0) {
				?>
				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="Users?siralama=<?php echo $adminidsira ?>&axtar=<?php echo $searchkeyword?>">ID</a></th>
							<th><a href="Users?siralama=<?php echo $adminadsira ?>&axtar=<?php echo $searchkeyword?>">Adı</a></th>
							<th class="KodSutunu">Durum</th>
							<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
						</thead>
						<tbody>
							<?php 
							while ($admincek= $adminsor->fetch(PDO::FETCH_ASSOC)) {
								$admin_id=$admincek['admin_id'];
							$admin_soyad=$admincek['admin_soyad'];	
							$admin_ad=$admincek['admin_ad'];	
							$admin_ata_ad=$admincek['admin_ata_ad'];	
							$admin_cinsiyyet=$admincek['admin_cinsiyyet'];	
							if ($admin_cinsiyyet==1) {
								$cinsiyyet="oğlu";
							}elseif ($admin_cinsiyyet==2) {
								$cinsiyyet="qızı";
							}else{
								$cinsiyyet="";
							}							

								?>
								<tr>
									<td class="SiraNomresiSutunu"> 
										<div class="SiraNomresi">
											<?php echo $admin_id ?>
										</div>


									</td>
									<td id="admin_ad-<?php echo $admin_id ?>"><?php echo ucwords($admin_soyad." ".$admin_ad." ".$admin_ata_ad)." ".$cinsiyyet ?></td>

									<td class="KodSutunu">

										<label class="checkbox" title="<?php if($admincek['admin_yetgi']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>">
											<input <?php if($admincek['admin_yetgi']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'admindurum-'.$admincek['admin_id'] ?>" onchange="AdminDurumKontrol(id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>

									</td>
									<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
										<a href="javascript:adminYenileAc(<?php echo $admin_id; ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
										<a href="javascript:adminSil(<?php echo $admin_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>

					</table>

				</div>

				<div id="SayfalamaAlaniKapsayicisi">
					<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
						<?php echo $BulunanSayfaSayisiAxtar; ?> səyfədə, <?php echo $adminsayi; ?> qeydiyatlı dövlət var.  <label for="cars">Choose a car:</label>
						<select onchange="adminSiralamaLimiti(this.value)">
							<?php 
							if ($adminsayi>100) {
								$Limitsayi=100;
							}else{
								$Limitsayi=$adminsayi;
							}
							for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
								<option <?php if($admin_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

							<?php }	
							if (($adminsayi%10)>0) { ?>
								<option <?php if($admin_listeleme_limiti==$adminsayi){echo "selected";} ?> value="<?php echo $adminsayi; ?>"><?php echo $adminsayi; ?></option>
							<?php }


							?>
						</select>
					</div>
					<?php 
					if ($BulunanSayfaSayisiAxtar>1) {?>
						<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
							<?php
							if($GelenSayfalama<1){
								header("Location:Users?seyfe=$BulunanSayfaSayisiAxtar");
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
								header("Location:Users?seyfe=$BulunanSayfaSayisiAxtar");
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
			$adminsaysor=$db->prepare("SELECT * FROM admin");
			$adminsaysor->execute();
			$adminsayi=$adminsaysor->rowCount();
			if(isset($_GET['seyfe'])){
				$GelenSayfalama=$_GET['seyfe'];
				if($_GET['seyfe']<1){
					header("Location:Users");
					exit;
				}
			}else{
				$GelenSayfalama=1;
			}


			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$admin_listeleme_limiti)-$admin_listeleme_limiti;
			$BulunanSayfaSayisi                 = ceil($adminsayi/$admin_listeleme_limiti);
			$adminsor=$db->prepare("SELECT * FROM admin order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $admin_listeleme_limiti");
			$adminsor->execute();
			?>

			<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
				<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>
						<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="Users?siralama=<?php echo $adminidsira ?>">ID</a></th>
						<th><a href="Users?siralama=<?php echo $adminadsira ?>">Adı</a></th>					
						<th class="KodSutunu">Durum</th>
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
					</thead>
					<tbody>


						<?php 


						while ($admincek= $adminsor->fetch(PDO::FETCH_ASSOC)) {
							$admin_id=$admincek['admin_id'];
							$admin_soyad=$admincek['admin_soyad'];	
							$admin_ad=$admincek['admin_ad'];	
							$admin_ata_ad=$admincek['admin_ata_ad'];	
							$admin_cinsiyyet=$admincek['admin_cinsiyyet'];	
							if ($admin_cinsiyyet==1) {
								$cinsiyyet="oğlu";
							}elseif ($admin_cinsiyyet==2) {
								$cinsiyyet="qızı";
							}else{
								$cinsiyyet="";
							}

							?>
							<tr>    
								<td class="SiraNomresiSutunu"> 
									<div class="SiraNomresi">
										<?php echo sprintf("%06s", $admin_id ); ?>
									</div>

								</td>
								<td id="admin_ad-<?php echo $admin_id ?>"><?php echo ucwords($admin_soyad." ".$admin_ad." ".$admin_ata_ad)." ".$cinsiyyet ?></td>								
								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($admincek['admin_yetgi']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($admincek['admin_yetgi']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'admindurum-'.$admincek['admin_id'] ?>" onchange="AdminDurumKontrol(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>
								<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
									<a href="javascript:adminYenileAc(<?php echo strval($admin_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
									<a href="javascript:adminSil(<?php echo $admin_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>

				</table>

			</div>

			<div id="SayfalamaAlaniKapsayicisi">
				<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
					<?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $adminsayi; ?> qeydiyatlı dövlət var. Göstərilən
					<select onchange="adminSiralamaLimiti(this.value)">
						<?php 
						if ($adminsayi>100) {
							$Limitsayi=100;
						}else{
							$Limitsayi=$adminsayi;
						}
						for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
							<option <?php if($admin_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

						<?php }	
						if (($adminsayi%10)>0) { ?>
							<option <?php if($admin_listeleme_limiti==$adminsayi){echo "selected";} ?> value="<?php echo $adminsayi; ?>"><?php echo $adminsayi; ?></option>
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
							header("Location:Users?seyfe=$BulunanSayfaSayisi");
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