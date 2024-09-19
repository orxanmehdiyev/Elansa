<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">

			<?php 
			$durum=$_GET['durum'];
			$kode=$_GET['MenziTechizatBolmesiSEOURL'];
			$id=ReqemlerXaricButunKarakterleriSil($_GET['id']);
			if(isset($durum)){
				if ($durum=="ok") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Yeni Təchizat Bölməsi Əlavə Olundu</span>
				<?php  }	
				elseif ($durum=="var") { ?>
					<span style="color: #ff0000;"><i class="fas fa-times"></i> Təchizat Bölməsi Mövcutdur</span>
				<?php  }
				elseif ($durum=="yenile") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Təchizat Bölməsi Yeniləndi</span>
				<?php  }

				else{
					header("Location:MenzilTechizatBolmesi");
					exit;				
				}
			} else{
				header("Location:MenzilTechizatBolmesi");
			}
			$sor = $db->prepare("SELECT * FROM menzil_techizat_bolmesi WHERE MenziTechizatBolmesiSEOURL=:MenziTechizatBolmesiSEOURL and MenziTechizatBolmesiID=:MenziTechizatBolmesiID");
			$sor->execute(array(
				'MenziTechizatBolmesiSEOURL'=>$kode,
				'MenziTechizatBolmesiID'=>$id));
			$Say= $sor->rowCount();
	
			if ($Say<=0) {		
				header("Location:MenzilTechizatBolmesi");
			}
		
			?>
		</div>    
	</div>
	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="MenzilTechizatBolmesi">Mənzil Təchizat Bölməsi</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="Yeni()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="MenzilTechizatBolmesi" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>		
	</div>
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
						<thead>
							<th class="ListelemeAlaniIciTablosuSiraNomiresi">
								<form action="Islem/menzil_techizat_bolmesi_islem.php" method="POST">
									<input type="hidden" name="siralama"
									<?php if ($_SESSION['menziltechizatbolmesisiralama']=="MenziTechizatBolmesiID ASC") {
										echo 'value="MenziTechizatBolmesiID DESC"';
									}else{
										echo 'value="MenziTechizatBolmesiID ASC"';
									} ?>
									>
									<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">ID</a>
								</form>
							</th>		
							<th>
								<form action="Islem/menzil_techizat_bolmesi_islem.php" method="POST">
									<input type="hidden" name="siralama"
									<?php if ($_SESSION['menziltechizatbolmesisiralama']=="MenziTechizatBolmesiAd ASC") {
										echo 'value="MenziTechizatBolmesiAd DESC"';
									}else{
										echo 'value="MenziTechizatBolmesiAd ASC"';
									} ?>
									>
									<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">Adı</a>
								</form>
							</th>	
							<th class="KodSutunu">Mənzil<br>Elanları Üçün</th>
							<th class="KodSutunu">Villa<br>Elanları Üçün</th>
							<th class="KodSutunu">Qaraj<br>Elanları Üçün</th>
							<th class="KodSutunu">Obyekt<br>Elanları Üçün</th>
							<th class="KodSutunu">Torpaq<br>Elanları Üçün</th>
							<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
						</thead>
						<tbody>
							<?php 
							while ($cek= $sor->fetch(PDO::FETCH_ASSOC)) {
								$MenziTechizatBolmesiID=$cek['MenziTechizatBolmesiID'];					
								$MenziTechizatBolmesiAd=$cek['MenziTechizatBolmesiAd'];					   				
								?>
								<tr>    
									<td class="SiraNomresiSutunu"> 
										<div class="SiraNomresi">
											<?php echo sprintf("%06s", $MenziTechizatBolmesiID ); ?>
										</div>
									</td>						
									<td id="MenziTechizatBolmesiAd-<?php echo $MenziTechizatBolmesiID ?>"><?php echo $MenziTechizatBolmesiAd ?></td>
									<td class="KodSutunu">	
										<label class="checkbox" title="<?php if($cek['MenziTechizatBolmesiDurum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
											<input <?php if($cek['MenziTechizatBolmesiDurum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'MenziTechizatBolmesiDurum-'.$cek['MenziTechizatBolmesiID'] ?>" onchange="MenziDurumKontrol(this.id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>
									</td>




									<td class="KodSutunu">	
										<label class="checkbox" title="<?php if($cek['VillaTechizatBolmesiDurum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
											<input <?php if($cek['VillaTechizatBolmesiDurum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'VillaTechizatBolmesiDurum-'.$cek['MenziTechizatBolmesiID'] ?>" onchange="VillaDurumKontrol(this.id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>
									</td>


									<td class="KodSutunu">	
										<label class="checkbox" title="<?php if($cek['QarajTechizatBolmesiDurum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
											<input <?php if($cek['QarajTechizatBolmesiDurum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'QarajTechizatBolmesiDurum-'.$cek['MenziTechizatBolmesiID'] ?>" onchange="QarajDurumKontrol(this.id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>
									</td>

									<td class="KodSutunu">	
										<label class="checkbox" title="<?php if($cek['ObyektTechizatBolmesiDurum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
											<input <?php if($cek['ObyektTechizatBolmesiDurum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'ObyektTechizatBolmesiDurum-'.$cek['MenziTechizatBolmesiID'] ?>" onchange="ObyektDurumKontrol(this.id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>
									</td>

									<td class="KodSutunu">	
										<label class="checkbox" title="<?php if($cek['TorpaqTechizatBolmesiDurum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
											<input <?php if($cek['TorpaqTechizatBolmesiDurum']==1){
												echo "checked";
											}else{
												echo "";
											} ?>  type="checkbox" id="<?php echo 'TorpaqTechizatBolmesiDurum-'.$cek['MenziTechizatBolmesiID'] ?>" onchange="TorpaqDurumKontrol(this.id)" > 
											<span class="checkbox"> 
												<span></span>
											</span>
										</label>
									</td>
									<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
										<a href="javascript:Yenile(<?php echo strval($MenziTechizatBolmesiID); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
										<a href="javascript:Sil(<?php echo $MenziTechizatBolmesiID; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>

					</table>
</div>
























</div>
</section>

<script type="text/javascript">
	function Yeni() {
		var formbaslaxic = '<form action="Islem/menzil_techizat_bolmesi_islem.php" method="POST" name="IslemFormu">';		
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="MenziTechizatBolmesiAd_metni">'+
		'Adı<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		'<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="MenziTechizatBolmesiAd" tabindex="1" required="" name="MenziTechizatBolmesiAd">'+
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
		var MenziTechizatBolmesiAd = "MenziTechizatBolmesiAd-" + id;
		var x = document.getElementById(MenziTechizatBolmesiAd).innerHTML;
		var formbaslaxic = '<form action="Islem/menzil_techizat_bolmesi_islem.php" method="POST" name="IslemFormu">';		
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="MenziTechizatBolmesiAd_metni">'+
		'Adı<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		'<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="MenziTechizatBolmesiAd" tabindex="1" required="" name="MenziTechizatBolmesiAd">'+
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
		var menzil_techizat_bolmesi_yenile_id = '<input type="hidden" id="menzil_techizat_bolmesi_yenile_id" name="MenziTechizatBolmesiID">';
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic + adi+meksed+ menzil_techizat_bolmesi_yenile_id + buttonalani + formbitis;
		document.getElementById('menzil_techizat_bolmesi_yenile_id').setAttribute("value", id);
		document.getElementById('MenziTechizatBolmesiAd').setAttribute("value", x);
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}



	function FormIslemleriKontrol() {
		if (document.getElementById("MenziTechizatBolmesiAd")) {
			if (document.getElementById("MenziTechizatBolmesiAd").value == "") {
				var MenziTechizatBolmesiAd = document.getElementById("MenziTechizatBolmesiAd");
				document.getElementById("MenziTechizatBolmesiAd_metni").style.color = "#ff0000";
				MenziTechizatBolmesiAd.style.outline = "none";
				MenziTechizatBolmesiAd.style.border = "2px solid #ff0000";
				MenziTechizatBolmesiAd.style.color = "#ff0000";
				MenziTechizatBolmesiAd.focus();
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
		var menzil_techizat_bolmesi_listeleme_limiti = Deyer
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/menzil_techizat_bolmesi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("menzil_techizat_bolmesi_listeleme_limiti=" + menzil_techizat_bolmesi_listeleme_limiti);
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.reload()
			}
		}
	}

	function MenziDurumKontrol(ID) {
		var DurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/menzil_techizat_bolmesi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("DurumID=" + DurumID[1]);
	}

		function VillaDurumKontrol(ID) {
		var DurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/menzil_techizat_bolmesi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("VillaDurumID=" + DurumID[1]);
	}
	function QarajDurumKontrol(ID) {
		var DurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/menzil_techizat_bolmesi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("QarajDurumID=" + DurumID[1]);
	}
		function ObyektDurumKontrol(ID) {
		var DurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/menzil_techizat_bolmesi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("ObyektDurumID=" + DurumID[1]);
	}
		function TorpaqDurumKontrol(ID) {
		var DurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/menzil_techizat_bolmesi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("TorpaqDurumID=" + DurumID[1]);
	}



	function Sil(SilID) {
		document.getElementById("SilKaratmaAlani").style.display = "block";
		document.getElementById("SilModalAlani").style.display = "block";
		document.getElementById("SilModalMetinAlani").innerHTML = "Mənzil Təhcizat Bölməsinü silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin <b>Mənzil Təhcizat Bölməsi</b> və həmin bölməyə bağlı <b>Mənzil Təhcizatı </b> silinəcək.";
		document.getElementById("SilIslemiOnayButonu").href = "javascript:SilTesdiq(" + SilID + ")";
		document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
		document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
	}

	function SilTesdiq(SilID) {
		var Xhttp = new XMLHttpRequest();
		Xhttp.open("POST", "Islem/menzil_techizat_bolmesi_islem.php", true);
		Xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		Xhttp.send("SilID=" + SilID);
		Xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.assign("http://www.orayhus.com/_admin/MenzilTechizatBolmesi?durum=silok")
			}
		}
	}




</script>


<?php require_once "_footer.php" ?>