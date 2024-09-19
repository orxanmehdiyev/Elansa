<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">


			<?php 
			$durum=$_GET['durum'];
			if(isset($durum)){
				if ($durum=="silok") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Uğurla Silindi</span>
				<?php  }
				else{ ?>
					<span >Avtomobil Markası</span>
				<?php }
			} else{ ?>
				<span>Avtomobil Markası</span>
			<?php  }




			if(isset($_COOKIE["Siralama"])){
				$siralama=$_COOKIE["Siralama"];			
				$link='AvtomobilModeli?';
			}else{
				setcookie("Siralama", "");
				$siralama="avtomobil_model_id ASC";
				$link='AvtomobilModeli?';
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
			<a href="AvtomobilModeli">Avtomobil Modeli</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="Yeni()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="AvtomobilModeli" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>
		<?php 
		if(isset($_REQUEST['axtar'])){
			$searchkeyword=HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));    
			$axtarisuzunluq=strlen($searchkeyword);

			$sorsay = $db->prepare("SELECT avtomobil_modeli.*,avtomobil_markasi.* FROM avtomobil_modeli INNER JOIN avtomobil_markasi ON avtomobil_modeli.avtomobil_markasi_id=avtomobil_markasi.avtomobil_markasi_id  WHERE avtomobil_model_ad LIKE ? or avtomobil_markasi_ad LIKE ?");
			$sorsay->execute(array("%$searchkeyword%", "%$searchkeyword%"));
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
			$SeyfeBaslangicKayitSayi    = ($GelenSeyfeleme*$avtomobil_modeli_listeleme_limiti)-$avtomobil_modeli_listeleme_limiti;
			$BulunanSeyfeAxtarisSayisi  = ceil($say/$avtomobil_modeli_listeleme_limiti);
			$sor = $db->prepare("SELECT avtomobil_modeli.*,avtomobil_markasi.* FROM avtomobil_modeli INNER JOIN avtomobil_markasi ON avtomobil_modeli.avtomobil_markasi_id=avtomobil_markasi.avtomobil_markasi_id  WHERE avtomobil_model_ad LIKE ? or avtomobil_markasi_ad LIKE ? order by $siralama LIMIT $SeyfeBaslangicKayitSayi, $avtomobil_modeli_listeleme_limiti");
			$sor->execute(array("%$searchkeyword%", "%$searchkeyword%"));
			if ($say>0) {
				?>
				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="javascript:void(0)" 
								<?php if ($_COOKIE["Siralama"]=="avtomobil_model_id ASC") { ?>
									onclick="Siralama('avtomobil_model_id DESC')"
								<?php }	else{?>
									onclick="Siralama('avtomobil_model_id ASC')"
								<?php } ?>
								>Id</a>
							</th>


							<th><a href="javascript:void(0)" 
								<?php if ($_COOKIE["Siralama"]=="avtomobil_markasi_ad ASC") { ?>
									onclick="Siralama('avtomobil_markasi_ad DESC')"
								<?php }	else{?>
									onclick="Siralama('avtomobil_markasi_ad ASC')"
								<?php } ?>
								>Marka</a>
							</th>		

							<th><a href="javascript:void(0)"
								<?php if ($_COOKIE["Siralama"]=="avtomobil_model_ad ASC") { ?>
									onclick="Siralama('avtomobil_model_ad DESC')"
								<?php }	else{?>
									onclick="Siralama('avtomobil_model_ad ASC')"
								<?php } ?>
								>Model</a>
							</th>	

							<th class="KodSutunu">Icon</th>			
							<th class="KodSutunu">Durum</th>
							<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
						</thead>
						<tbody>


							<?php 
							while ($cek= $sor->fetch(PDO::FETCH_ASSOC)) {
								$avtomobil_model_id=$cek['avtomobil_model_id'];
								$avtomobil_markasi_id=$cek['avtomobil_markasi_id'];
								$avtomobil_markasi_ad=$cek['avtomobil_markasi_ad'];
								$avtomobil_model_ad=$cek['avtomobil_model_ad'];
								$avtomobil_markasi_iconu=$cek['avtomobil_markasi_iconu'];	
								$uzunlu	=strlen( trim($avtomobil_markasi_iconu)	)	;			
								?>
								<tr>    
									<td class="SiraNomresiSutunu"> 
										<div class="SiraNomresi">
											<?php echo sprintf("%06s", $avtomobil_model_id ); ?>
										</div>
									</td>
									<td ><?php echo $avtomobil_markasi_ad ?>
									<input id="avtomobil_markasi_id-<?php echo $avtomobil_model_id ?>" type="hidden" value="<?php echo $avtomobil_markasi_id ?>" >
								</td>
								<td id="avtomobil_model_ad-<?php echo $avtomobil_model_id ?>"><?php echo $avtomobil_model_ad ?></td>	

								<td class="KodSutunu"><?php if ($uzunlu>0) {?>
									<img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə">
								<?php }else{?> 
									<img src="img/IconUploadSiyah.png" width="20" height="20" title="Yüklə" alt="Yüklə">
								<?php }	?>
							</td>			

							<td class="KodSutunu">	
								<label class="checkbox" title="<?php if($cek['avtomobil_model_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
									<input <?php if($cek['avtomobil_model_durum']==1){
										echo "checked";
									}else{
										echo "";
									} ?>  type="checkbox" id="<?php echo 'avtomobil_model_durum-'.$cek['avtomobil_model_id'] ?>" onchange="DurumKontrol(this.id)" > 
									<span class="checkbox"> 
										<span></span>
									</span>
								</label>
							</td>
							<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
								<a href="javascript:Yenile(<?php echo strval($avtomobil_model_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
								<a href="javascript:Sil(<?php echo $avtomobil_model_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div id="SayfalamaAlaniKapsayicisi">
			<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
				<?php echo $BulunanSeyfeAxtarisSayisi; ?> səyfədə, <?php echo $say; ?> Qeydiyatlı Avtomobil Modeli Var.   <label for="cars">Göstərilən:</label>
				<select onchange="ListelemeLimiti(this.value)">
					<?php 
					if ($say>100) {
						$Limitsayi=100;
					}else{
						$Limitsayi=$say;
					}
					for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
						<option <?php if($avtomobil_modeli_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

					<?php }	
					if (($say%10)>0) { ?>
						<option <?php if($avtomobil_modeli_listeleme_limiti==$say){echo "selected";} ?> value="<?php echo $say; ?>"><?php echo $say; ?></option>
					<?php }


					?>
				</select>
			</div>
			<?php 
			if ($BulunanSeyfeAxtarisSayisi>1) {?>
				<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
					<?php
					if($GelenSeyfeleme<1){
						header("Location:AvtomobilModeli?seyfe=$BulunanSeyfeAxtarisSayisi");
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
						header("Location:AvtomobilModeli?seyfe=$BulunanSeyfeAxtarisSayisi");
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
	$Say_sor = $db->prepare("SELECT * FROM avtomobil_modeli");
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


	$SeyfeBaslangicKayitSayi   = ($GelenSeyfeleme*$avtomobil_modeli_listeleme_limiti)-$avtomobil_modeli_listeleme_limiti;
	$BulunanSayfaSayisi                 = ceil($say/$avtomobil_modeli_listeleme_limiti);
	$sor = $db->prepare("SELECT avtomobil_modeli.*,avtomobil_markasi.* FROM avtomobil_modeli INNER JOIN avtomobil_markasi ON avtomobil_modeli.avtomobil_markasi_id=avtomobil_markasi.avtomobil_markasi_id   order by $siralama LIMIT $SeyfeBaslangicKayitSayi, $avtomobil_modeli_listeleme_limiti");
	$sor->execute();

	?>

	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="javascript:void(0)" 
					<?php if ($_COOKIE["Siralama"]=="avtomobil_model_id ASC") { ?>
						onclick="Siralama('avtomobil_model_id DESC')"
					<?php }	else{?>
						onclick="Siralama('avtomobil_model_id ASC')"
					<?php } ?>
					>Id</a>
				</th>


				<th><a href="javascript:void(0)" 
					<?php if ($_COOKIE["Siralama"]=="avtomobil_markasi_ad ASC") { ?>
						onclick="Siralama('avtomobil_markasi_ad DESC')"
					<?php }	else{?>
						onclick="Siralama('avtomobil_markasi_ad ASC')"
					<?php } ?>
					>Marka</a>
				</th>		

				<th><a href="javascript:void(0)"
					<?php if ($_COOKIE["Siralama"]=="avtomobil_model_ad ASC") { ?>
						onclick="Siralama('avtomobil_model_ad DESC')"
					<?php }	else{?>
						onclick="Siralama('avtomobil_model_ad ASC')"
					<?php } ?>
					>Model</a>
				</th>	

				<th class="KodSutunu">Icon</th>			
				<th class="KodSutunu">Durum</th>
				<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
			</thead>
			<tbody>


				<?php 
				while ($cek= $sor->fetch(PDO::FETCH_ASSOC)) {
					$avtomobil_model_id=$cek['avtomobil_model_id'];
					$avtomobil_markasi_id=$cek['avtomobil_markasi_id'];
					$avtomobil_markasi_ad=$cek['avtomobil_markasi_ad'];
					$avtomobil_model_ad=$cek['avtomobil_model_ad'];
					$avtomobil_markasi_iconu=$cek['avtomobil_markasi_iconu'];	
					$uzunlu	=strlen( trim($avtomobil_markasi_iconu)	)	;		
					?>
					<tr>    
						<td class="SiraNomresiSutunu"> 
							<div class="SiraNomresi">
								<?php echo sprintf("%06s", $avtomobil_model_id ); ?>
							</div>
						</td>
						<td ><?php echo $avtomobil_markasi_ad ?>
						<input id="avtomobil_markasi_id-<?php echo $avtomobil_model_id ?>" type="hidden" value="<?php echo $avtomobil_markasi_id ?>" >
					</td>
					<td id="avtomobil_model_ad-<?php echo $avtomobil_model_id ?>"><?php echo $avtomobil_model_ad ?></td>	

					<td class="KodSutunu"><?php if ($uzunlu>0) {?>
						<img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə">
					<?php }else{?> 
						<img src="img/IconUploadSiyah.png" width="20" height="20" title="Yüklə" alt="Yüklə">
					<?php }	?>
				</td>			

				<td class="KodSutunu">	
					<label class="checkbox" title="<?php if($cek['avtomobil_model_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
						<input <?php if($cek['avtomobil_model_durum']==1){
							echo "checked";
						}else{
							echo "";
						} ?>  type="checkbox" id="<?php echo 'avtomobil_model_durum-'.$cek['avtomobil_model_id'] ?>" onchange="DurumKontrol(this.id)" > 
						<span class="checkbox"> 
							<span></span>
						</span>
					</label>
				</td>
				<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
					<a href="javascript:Yenile(<?php echo strval($avtomobil_model_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
					<a href="javascript:Sil(<?php echo $avtomobil_model_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>

</table>

</div>

<div id="SayfalamaAlaniKapsayicisi">
	<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
		<?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $say; ?> Qeydiyatlı Avtomobil Modeli Var. Göstərilən
		<select onchange="ListelemeLimiti(this.value)">
			<?php 
			if ($say>100) {
				$Limitsayi=100;
			}else{
				$Limitsayi=$say;
			}
			for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
				<option <?php if($avtomobil_modeli_listeleme_limiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

			<?php }	
			if (($say%10)>0) { ?>
				<option <?php if($avtomobil_modeli_listeleme_limiti==$say){echo "selected";} ?> value="<?php echo $say; ?>"><?php echo $say; ?></option>
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
				header("Location:AvtomobilModeli?seyfe=$BulunanSayfaSayisi");
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
	function Siralama(Siralamassc) {	
		document.cookie = "Siralama="+Siralamassc;
		window.location.reload()
	}

	function Yeni() {
		var formbaslaxic = '<form action="Islem/avtomobil_modeli_islem.php" method="POST" name="IslemFormu" ';
		var x = document.getElementById("YeniAvtomobilModeliUcunMarkaTelebi").innerHTML;
		var bolmeadi='<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_markasi_id_sec_metni">Marka<span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+x+'</div></div></div>';
		var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_model_ad_metni">Model<span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">	<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="avtomobil_model_ad" tabindex="1" required="" name="avtomobil_model_ad"/></div></div></div>';
		var meksed = '<input type="hidden" id="Yeni" name="Yeni" ';
		var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Əlavə Et</button>' +
		'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic +bolmeadi+ adi+meksed + buttonalani + formbitis;
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}

	function Yenile(id) {
		var Avtomobil_Markasi_Ad = "avtomobil_markasi_id-" + id;
		var e = document.getElementById(Avtomobil_Markasi_Ad).value;
		var Avtomobil_Modeli_Ad = "avtomobil_model_ad-" + id;
		var x = document.getElementById(Avtomobil_Modeli_Ad).innerHTML;
		var formbaslaxic = '<form action="Islem/avtomobil_modeli_islem.php" method="POST" name="IslemFormu" ';		
		var bolmeadi='<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_markasi_id_sec_metni">Marka<span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi" id="markaalani"></div></div></div>';
		var adi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_model_ad_metni">Model<span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">	<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="avtomobil_model_ad" tabindex="1" required="" name="avtomobil_model_ad"/></div></div></div>';
		var yenileid = '<input type="hidden" id="avtomobil_model_id" name="avtomobil_model_id"> ';
		var meksed = '<input type="hidden" id="Yenile" name="Yenile" ';
		var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari"  onClick="FormIslemleriKontrol()" tabindex="5">Yenilə</button>' +
		'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic +bolmeadi+ adi+yenileid+meksed + buttonalani + formbitis;
		document.getElementById('avtomobil_model_id').setAttribute("value", id);
		document.getElementById('avtomobil_model_ad').setAttribute("value", x);
		var AvtomobilMarkasiTelebET = new XMLHttpRequest();
		AvtomobilMarkasiTelebET.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("markaalani").innerHTML = " ";
				document.getElementById("markaalani").innerHTML = this.responseText;
			}
		};
		AvtomobilMarkasiTelebET.open("GET", "AnliqYenilenmeler/AvtomobilMarkasiTelebET.php?avtomobil_markasi_id=" + e, true);
		AvtomobilMarkasiTelebET.send();
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}



	function FormIslemleriKontrol() {
		if (document.getElementById("avtomobil_markasi_id_sec")) {
			if (document.getElementById("avtomobil_markasi_id_sec").value == "") {
				var avtomobil_markasi_id_sec = document.getElementById("avtomobil_markasi_id_sec");
				document.getElementById("avtomobil_markasi_id_sec_metni").style.color = "#ff0000";
				avtomobil_markasi_id_sec.style.outline = "none";
				avtomobil_markasi_id_sec.style.border = "2px solid #ff0000";
				avtomobil_markasi_id_sec.style.color = "#ff0000";
				return;
			}
		}
		if (document.getElementById("avtomobil_model_ad")) {
			if (document.getElementById("avtomobil_model_ad").value == "") {
				var avtomobil_model_ad = document.getElementById("avtomobil_model_ad");
				document.getElementById("avtomobil_model_ad_metni").style.color = "#ff0000";
				avtomobil_model_ad.style.outline = "none";
				avtomobil_model_ad.style.border = "2px solid #ff0000";
				avtomobil_model_ad.style.color = "#ff0000";
				avtomobil_model_ad.focus();
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



	function SelectInputAlaniSecildi(id) {
		var InputLabelMetni=id+"_metni";
		document.getElementById(InputLabelMetni).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.border = "1px solid #2A3F54";
	}

	function ListelemeLimiti(Deyer) {
		var avtomobil_modeli_listeleme_limiti = Deyer
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/avtomobil_modeli_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("avtomobil_modeli_listeleme_limiti=" + avtomobil_modeli_listeleme_limiti);
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.reload()
			}
		}
	}

	function DurumKontrol(ID) {
		var DurumID = ID.split("-");
		var AvtomobilTechizatiDurumId_xhttp = new XMLHttpRequest();
		AvtomobilTechizatiDurumId_xhttp.open("POST", "Islem/avtomobil_modeli_islem.php", true);
		AvtomobilTechizatiDurumId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		AvtomobilTechizatiDurumId_xhttp.send("DurumID=" + DurumID);
	}


	function Sil(SilID) {
		document.getElementById("SilKaratmaAlani").style.display = "block";
		document.getElementById("SilModalAlani").style.display = "block";
		document.getElementById("SilModalMetinAlani").innerHTML = "Avtomobil Modelini silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin <b>Avtomobil Modeli</b> silinəcək.";
		document.getElementById("SilIslemiOnayButonu").href = "javascript:SilTesdiq(" + SilID + ")";
		document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
		document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
	}

	function SilTesdiq(SilID) {
		var Xhttp = new XMLHttpRequest();
		Xhttp.open("POST", "Islem/avtomobil_modeli_islem.php", true);
		Xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		Xhttp.send("SilID=" + SilID);
		Xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.assign("http://www.orayhus.com/_admin/AvtomobilModeli?durum=silok")
			}
		}
	}




</script>

<div id="YeniAvtomobilModeliUcunMarkaTelebi" style="display: none;">
	<?php
	$Avtomobil_Markasi_Sor = $db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_durum=:avtomobil_markasi_durum");
	$Avtomobil_Markasi_Sor->execute(array(
		'avtomobil_markasi_durum' => 1
	));
	?>
	<select name="avtomobil_markasi_id_sec" tabindex="2" required="required" id="avtomobil_markasi_id_sec" class="FormAlanlariUcunSelectInputlari" onchange="SelectInputAlaniSecildi(this.id)">
		<option disabled="disabled" value="" selected="selected"> Secin...</option>
		<?php
		while ($Avtomobil_Markasi_Cek = $Avtomobil_Markasi_Sor->fetch(PDO::FETCH_ASSOC)) {
			?>
			<option value="<?php echo $Avtomobil_Markasi_Cek['avtomobil_markasi_id'] ?>"><?php echo $Avtomobil_Markasi_Cek['avtomobil_markasi_ad'] ?></option>
		<?php } ?>
	</select>
</div>
<?php require_once "_footer.php" ?>