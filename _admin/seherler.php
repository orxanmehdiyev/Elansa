<?php
require_once "_header.php";
require_once "_menu.php";
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			<?php
			if (isset($_GET['durum'])) {
				if ($_GET['durum'] == "ok") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Şəhər Yenilənməsi Uğurlu </span>
			<?php  }elseif($_GET['durum'] == md5("dovletxeta")){?>
					<span style="color: #ff0000;"><i class="fas fa-times"></i> Secililən Dövlət Xəta</span>
			<?php } else {
					echo "ŞəhərTənzimlənmələri";
				}
			} else {
				echo "Şəhər Tənzimlənmələri";
			}
			if (!isset($_GET['durum']) or !isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"])) {
			} else {
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
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi">
					<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div>
				</div>
			</form>
		</div>
		<?php
		if (isset($_REQUEST['siralama'])) {
			if ($_REQUEST['siralama'] == "id_sira_asc") {
				$id_sira = "id_sira_desc";
				$ad_seher = "ad_seher_asc";
				$ad_dovlet = "ad_dovlet_asc";
				$siralama = "seher_id ASC";
				$ad_beynelxalq_seher = "ad_beynelxalq_seher_asc";
				$link = 'seherler?siralama=id_sira_asc&';
			} elseif ($_REQUEST['siralama'] == "id_sira_desc") {
				$id_sira = "id_sira_asc";
				$ad_seher = "ad_seher_asc";
				$ad_dovlet = "ad_dovlet_asc";
				$siralama = "seher_id DESC";
				$ad_beynelxalq_seher = "ad_beynelxalq_seher_asc";
				$link = 'seherler?siralama=id_sira_desc&';
			} elseif ($_REQUEST['siralama'] == "ad_seher_asc") {
				$id_sira = "id_sira_asc";
				$ad_seher = "ad_seher_desc";
				$ad_dovlet = "ad_dovlet_asc";
				$siralama = "seher_ad ASC";
				$ad_beynelxalq_seher = "ad_beynelxalq_seher_asc";
				$link = 'seherler?siralama=ad_seher_asc&';
			} elseif ($_REQUEST['siralama'] == "ad_seher_desc") {
				$id_sira = "id_sira_asc";
				$ad_seher = "ad_seher_asc";
				$ad_dovlet = "ad_dovlet_asc";
				$siralama = "seher_ad DESC";
				$ad_beynelxalq_seher = "ad_beynelxalq_seher_asc";
				$link = 'seherler?siralama=ad_seher_desc&';
			} elseif ($_REQUEST['siralama'] == "ad_dovlet_asc") {
				$id_sira = "id_sira_asc";
				$ad_seher = "ad_seher_asc";
				$ad_dovlet = "ad_dovlet_desc";
				$siralama = "dovlet_ad ASC";
				$ad_beynelxalq_seher = "ad_beynelxalq_seher_asc";
				$link = 'seherler?siralama=ad_dovlet_asc&';
			} elseif ($_REQUEST['siralama'] == "ad_dovlet_desc") {
				$id_sira = "id_sira_asc";
				$ad_seher = "ad_seher_asc";
				$ad_dovlet = "ad_dovlet_asc";
				$siralama = "dovlet_ad DESC";
				$ad_beynelxalq_seher = "ad_beynelxalq_seher_asc";
				$link = 'seherler?siralama=ad_dovlet_desc&';
			} elseif ($_REQUEST['siralama'] == "ad_beynelxalq_seher_asc") {
				$id_sira = "id_sira_asc";
				$ad_seher = "ad_seher_asc";
				$ad_dovlet = "ad_dovlet_desc";
				$siralama = "seher_beynelxalq_adi ASC";
				$ad_beynelxalq_seher = "ad_beynelxalq_seher_desc";
				$link = 'seherler?siralama=ad_dovlet_asc&';
			} elseif ($_REQUEST['siralama'] == "ad_beynelxalq_seher_desc") {
				$id_sira = "id_sira_asc";
				$ad_seher = "ad_seher_asc";
				$ad_dovlet = "ad_dovlet_asc";
				$siralama = "seher_beynelxalq_adi DESC";
				$ad_beynelxalq_seher = "ad_beynelxalq_seher_asc";
				$link = 'seherler?siralama=ad_dovlet_desc&';
			} else {
				$siralama = "seher_id ASC";
				$id_sira = "id_sira_asc";
				$ad_seher = "ad_seher_asc";
				$link = 'seherler?';
			}
		} else {
			$siralama = "seher_id ASC";
			$id_sira = "id_sira_asc";
			$ad_seher = "ad_seher_asc";
			$ad_dovlet = "ad_dovlet_asc";
			$ad_beynelxalq_seher = "ad_beynelxalq_seher_asc";
			$link = 'seherler?';
		}
		if (isset($_REQUEST['axtar'])) {
			$searchkeyword = HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));
			$axtarisuzunluq = strlen($searchkeyword);
			$Seher_Say_sor = $db->prepare("SELECT seher.*,dovlet.* FROM seher INNER JOIN dovlet ON seher.dovlet_id=dovlet.dovlet_id  where seher_ad LIKE ? or dovlet_ad LIKE ? or seher_beynelxalq_adi LIKE ?");
			$Seher_Say_sor->execute(array("%$searchkeyword%", "%$searchkeyword%", "%$searchkeyword%"));
			$seher_sayi = $Seher_Say_sor->rowCount();
			if (isset($_GET['seyfe'])) {
				$GelenSayfalama = $_GET['seyfe'];
				if ($_GET['seyfe'] < 1) {
					header("Location:" . $link);
					exit;
				}
			} else {
				$GelenSayfalama = 1;
			}
			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama * $seherlerListelemeLimiti) - $seherlerListelemeLimiti;
			$BulunanSayfaSayisiAxtar                 = ceil($seher_sayi / $seherlerListelemeLimiti);
			$Seher_Sor = $db->prepare("SELECT seher.*,dovlet.* FROM seher INNER JOIN dovlet ON seher.dovlet_id=dovlet.dovlet_id  where seher_ad LIKE ? or dovlet_ad LIKE ? or seher_beynelxalq_adi LIKE ? order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $seherlerListelemeLimiti");
			$Seher_Sor->execute(array("%$searchkeyword%", "%$searchkeyword%", "%$searchkeyword%"));
			$seher_say = $Seher_Sor->rowCount();
			if ($seher_say > 0) {
		?>
				<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
					<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="seherler?siralama=<?php echo $id_sira ?>&axtar=<?php echo $searchkeyword ?>">ID</a></th>
							<th><a href="seherler?siralama=<?php echo $ad_dovlet ?>&axtar=<?php echo $searchkeyword ?>">Dövlət Adı</a></th>
							<th><a href="seherler?siralama=<?php echo $ad_seher ?>&axtar=<?php echo $searchkeyword ?>">Şəhər Adı</a></th>
							<th><a href="seherler?siralama=<?php echo $ad_beynelxalq_seher ?>&axtar=<?php echo $searchkeyword ?>">Beynəlxalq Adı</a></th>
							<th class="KodSutunu">Durum</th>
							<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
						</thead>
						<tbody>
							<?php
							while ($Seher_cek = $Seher_Sor->fetch(PDO::FETCH_ASSOC)) {
								$seher_id = $Seher_cek['seher_id'];
								$seher_ad = $Seher_cek['seher_ad'];
								$dovlet_id = $Seher_cek['dovlet_id'];
								$seher_beynelxalq_adi = $Seher_cek['seher_beynelxalq_adi'];
							?>
								<tr>
									<td class="SiraNomresiSutunu">
										<div class="SiraNomresi">
											<?php echo sprintf("%06s", $seher_id); ?>
										</div>
									</td>
									<td>
										<?php
										$Dovlet_Sor = $db->prepare("SELECT * FROM dovlet where dovlet_id=:dovlet_id");
										$Dovlet_Sor->execute(array(
											'dovlet_id' => $dovlet_id
										));
										$Dovlet_Cek = $Dovlet_Sor->fetch(PDO::FETCH_ASSOC);
										echo $Dovlet_Cek['dovlet_ad'];
										?>
										<input type="hidden" name="dovlet_id" id="dovlet-<?php echo $seher_id ?>" value=" <?php echo $dovlet_id; ?> ">
									</td>
									<td id="seher_ad-<?php echo $seher_id ?>"><?php echo $seher_ad ?></td>
									<td id="seher_ad_beynelxalq-<?php echo $seher_id ?>"><?php echo $seher_beynelxalq_adi ?></td>
									<td class="KodSutunu">

										<label class="checkbox">
											<input <?php if ($Seher_cek['seher_durum'] == 1) {
																echo "checked";
															} else {
																echo "";
															} ?> type="checkbox" id="<?php echo 'seherdurum-' . $Seher_cek['seher_id'] ?>" onchange="SeherDurumKontrol(id)">
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
				<div id="SayfalamaAlaniKapsayicisi">
					<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
						<?php echo $BulunanSayfaSayisiAxtar; ?> səyfədə, <?php echo $seher_sayi; ?> qeydiyatlı dövlət var. <label for="cars">Choose a car:</label>
						<select onchange="SeherlerListelemeLimiti(this.value)">
							<?php
							if ($seher_sayi > 100) {
								$Limitsayi = 100;
							} else {
								$Limitsayi = $seher_sayi;
							}
							for ($i = 10; $i <= $Limitsayi; $i += 10) {	?>
								<option <?php if ($seherlerListelemeLimiti == $i) {
													echo "selected";
												} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php }
							if (($seher_sayi % 10) > 0) { ?>
								<option <?php if ($seherlerListelemeLimiti == $seher_sayi) {
													echo "selected";
												} ?> value="<?php echo $seher_sayi; ?>"><?php echo $seher_sayi; ?></option>
							<?php }
							?>
						</select>
					</div>
					<?php
					if ($BulunanSayfaSayisiAxtar > 1) { ?>
						<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
							<?php
							if ($GelenSayfalama < 1) {
								header("Location:seherler?seyfe=$BulunanSayfaSayisiAxtar");
							}
							if ($GelenSayfalama > 1) {
								$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama - 1;
								echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=1&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaDegeriniBirGeriAl . "&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							} else {
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							}
							for ($SayfalamaIcinSayfaIndexDegeri = $GelenSayfalama - 5; $SayfalamaIcinSayfaIndexDegeri <= $GelenSayfalama + 5; $SayfalamaIcinSayfaIndexDegeri++) {
								if (($SayfalamaIcinSayfaIndexDegeri > 0) and ($SayfalamaIcinSayfaIndexDegeri <= $BulunanSayfaSayisiAxtar)) {
									if ($SayfalamaIcinSayfaIndexDegeri == $GelenSayfalama) {
										echo  "<span class=\"Aktif\">" . $SayfalamaIcinSayfaIndexDegeri . "</span>";
									} else {
										echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaIndexDegeri . "&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\">" . $SayfalamaIcinSayfaIndexDegeri . "</a></span>";
									}
								}
							}
							if ($GelenSayfalama > $BulunanSayfaSayisiAxtar) {
								header("Location:seherler?seyfe=$BulunanSayfaSayisiAxtar");
							}
							if ($GelenSayfalama != $BulunanSayfaSayisiAxtar) {
								$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama + 1;
								echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaDegeriniBirIleriAl . "&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $BulunanSayfaSayisiAxtar . "&axtar=" . urlencode($searchkeyword) . "\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							} else {
								$SayfalamaIcinSayfaDegeriniBirIleriAl = $BulunanSayfaSayisiAxtar;
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
								echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							}
							?>
						</div>
					<?php } ?>
				</div>


























			<?php
			} else {  ?>
				<span>Axtarışınıza uyğun avtomobil təchizatı yoxdur yoxdur</span>
			<?php  }
		} else {
			$Seher_Say_sor = $db->prepare("SELECT * FROM seher");
			$Seher_Say_sor->execute();
			$seher_sayi = $Seher_Say_sor->rowCount();
			if (isset($_GET['seyfe'])) {
				$GelenSayfalama = $_GET['seyfe'];
				if ($_GET['seyfe'] < 1) {
					header("Location:seherler");
					exit;
				}
			} else {
				$GelenSayfalama = 1;
			}
			$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama * $seherlerListelemeLimiti) - $seherlerListelemeLimiti;
			$BulunanSayfaSayisi                 = ceil($seher_sayi / $seherlerListelemeLimiti);
			$seherlerSor = $db->prepare("SELECT seher.*,dovlet.* FROM seher INNER JOIN dovlet ON seher.dovlet_id=dovlet.dovlet_id   order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $seherlerListelemeLimiti");
			$seherlerSor->execute();
			?>
			<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
				<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>
						<th class="ListelemeAlaniIciTablosuSiraNomiresi"><a href="seherler?siralama=<?php echo $id_sira ?>">ID</a></th>
						<th><a href="seherler?siralama=<?php echo $ad_dovlet ?>">Dövlət</a></th>
						<th><a href="seherler?siralama=<?php echo $ad_seher ?>">Adı</a></th>
						<th><a href="seherler?siralama=<?php echo $ad_beynelxalq_seher ?>">Beynəlxalq Adı</a></th>
						<th class="KodSutunu">Durum</th>
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
					</thead>
					<tbody>
						<?php
						while ($seherlerCek = $seherlerSor->fetch(PDO::FETCH_ASSOC)) {
							$seher_id = $seherlerCek['seher_id'];
							$seher_ad = $seherlerCek['seher_ad'];
							$Dovlet_Id = $seherlerCek['Dovlet_Id'];
							$seher_beynelxalq_adi = $seherlerCek['seher_beynelxalq_adi'];
						?>
							<tr>
								<td class="SiraNomresiSutunu">
									<div class="SiraNomresi">
										<?php echo sprintf("%06s", $seher_id); ?>
									</div>
								</td>
								<td>
									<?php
									$Dovlet_Sor = $db->prepare("SELECT * FROM dovlet where Dovlet_Id=:Dovlet_Id");
									$Dovlet_Sor->execute(array(
										'Dovlet_Id' => $Dovlet_Id
									));
									$Dovlet_Cek = $Dovlet_Sor->fetch(PDO::FETCH_ASSOC);
									echo $Dovlet_Cek['Dovlet_Ad'];
									?>
									<input type="hidden" name="Dovlet_Id" id="dovlet-<?php echo $seher_id ?>" value=" <?php echo $Dovlet_Id; ?> ">
								</td>
								<td id="seher_ad-<?php echo $seher_id ?>"><?php echo $seher_ad ?></td>
								<td id="seher_ad_beynelxalq-<?php echo $seher_id ?>"><?php echo $seher_beynelxalq_adi ?></td>
								<td class="KodSutunu">
									<label class="checkbox">
										<input <?php if ($seherlerCek['seher_durum'] == 1) {
															echo "checked";
														} else {
															echo "";
														} ?> type="checkbox" id="<?php echo 'seherdurum-' . $seherlerCek['seher_id'] ?>" onchange="SeherDurumKontrol(id)">
										<span class="checkbox">
											<span></span>
										</span>
									</label>
								</td>
								<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
									<a href="javascript:SeherlerYenile(<?php echo strval($seher_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
									<a href="javascript:SeherlerSil(<?php echo $seher_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div id="SayfalamaAlaniKapsayicisi">
				<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
					<?php echo $BulunanSayfaSayisi; ?> səyfədə, <?php echo $seher_sayi; ?> qeydiyatlı şəhər var. Göstərilən
					<select onchange="SeherlerListelemeLimiti(this.value)">
						<?php
						if ($seher_sayi > 100) {
							$Limitsayi = 100;
						} else {
							$Limitsayi = $seher_sayi;
						}
						for ($i = 10; $i <= $Limitsayi; $i += 10) {	?>
							<option <?php if ($seherlerListelemeLimiti == $i) {
												echo "selected";
											} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php }
						if (($seher_sayi % 10) > 0) { ?>
							<option <?php if ($seherlerListelemeLimiti == $seher_sayi) {
												echo "selected";
											} ?> value="<?php echo $seher_sayi; ?>"><?php echo $seher_sayi; ?></option>
						<?php }
						?>
					</select>
					<button>Print</button>
				</div>
				<?php
				if ($BulunanSayfaSayisi > 1) { ?>
					<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
						<?php
						if ($GelenSayfalama < 1) {
							header("Location:seherler?seyfe=$BulunanSayfaSayisi");
						}
						if ($GelenSayfalama > 1) {
							$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama - 1;
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=1\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaDegeriniBirGeriAl . "\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						} else {
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}
						for ($SayfalamaIcinSayfaIndexDegeri = $GelenSayfalama - 5; $SayfalamaIcinSayfaIndexDegeri <= $GelenSayfalama + 5; $SayfalamaIcinSayfaIndexDegeri++) {
							if (($SayfalamaIcinSayfaIndexDegeri > 0) and ($SayfalamaIcinSayfaIndexDegeri <= $BulunanSayfaSayisi)) {
								if ($SayfalamaIcinSayfaIndexDegeri == $GelenSayfalama) {
									echo  "<span class=\"Aktif\">" . $SayfalamaIcinSayfaIndexDegeri . "</span>";
								} else {
									echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaIndexDegeri . "\" target=\"_top\">" . $SayfalamaIcinSayfaIndexDegeri . "</a></span>";
								}
							}
						}
						if ($GelenSayfalama > $BulunanSayfaSayisi) {
							header("Location:" . $link . "seyfe=$BulunanSayfaSayisi");
						}
						if ($GelenSayfalama != $BulunanSayfaSayisi) {
							$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama + 1;
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $SayfalamaIcinSayfaDegeriniBirIleriAl . "\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/" . $link . "seyfe=" . $BulunanSayfaSayisi . "\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						} else {
							$SayfalamaIcinSayfaDegeriniBirIleriAl = $BulunanSayfaSayisi;
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

<script src="vendors/js/seherler.js"></script>
<?php require_once "_footer.php" ?>