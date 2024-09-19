<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">

			<?php 
			$durum=$_GET['durum'];
			$kode=$_GET['elanverennovu_id_kodla'];
			$id=ReqemlerXaricButunKarakterleriSil($_GET['id']);
			if(isset($durum)){
				if ($durum=="ok") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Yeni Elan Müəllifi Əlavə Olundu</span>
				<?php  }	
				elseif ($durum=="var") { ?>
					<span style="color: #ff0000;"><i class="fas fa-times"></i> YElan Müəllifi Mövcutdur</span>
				<?php  }
				elseif ($durum=="yenile") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Elan Müəllifi Yeniləndi</span>
				<?php  }

				else{
					header("Location:ElanMuellifi");
					exit;				
				}
			} else{
				header("Location:ElanMuellifi");
			}
			$sor = $db->prepare("SELECT * FROM  elanverennovu WHERE elanverennovu_id_kodla=:elanverennovu_id_kodla and elanverennovu_id=:elanverennovu_id");
			$sor->execute(array(
				'elanverennovu_id_kodla'=>$kode,
				'elanverennovu_id'=>$id));
			$Say= $sor->rowCount();
	
			if ($Say<=0) {		
				header("Location:ElanMuellifi");
			}
		
			?>
		</div>    
	</div>
	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="ElanMuellifi">  Elan Müəllifi</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="Yeni()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="ElanMuellifi" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>		
	</div>
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>
						<th class="ListelemeAlaniIciTablosuSiraNomiresi">
							<form action="Islem/elan_muellifi_islem.php" method="POST">
								<input type="hidden" name="siralama"
								<?php if ($_SESSION['elanmuellifisiralam']=="elanverennovu_id ASC") {
									echo 'value="elanverennovu_id DESC"';
								}else{
									echo 'value="elanverennovu_id ASC"';
								} ?>
								>
								<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">ID</a>
							</form>
						</th>		
						<th>
							<form action="Islem/elan_muellifi_islem.php" method="POST">
								<input type="hidden" name="siralama"
								<?php if ($_SESSION['elanmuellifisiralam']=="elanverennovu_ad ASC") {
									echo 'value="elanverennovu_ad DESC"';
								}else{
									echo 'value="elanverennovu_ad ASC"';
								} ?>
								>
								<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">Adı</a>
							</form>
						</th>	
						<th class="KodSutunu">Mənzil<br>Elanları Üçün</th>
							<th class="KodSutunu">Avtomobil<br>Elanları Üçün</th>
						
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
					</thead>
					<tbody>
						<?php 
						while ($cek= $sor->fetch(PDO::FETCH_ASSOC)) {
							$elanverennovu_id=$cek['elanverennovu_id'];					
							$elanverennovu_ad=$cek['elanverennovu_ad'];	
											
							?>
							<tr>    
								<td class="SiraNomresiSutunu"> 
									<div class="SiraNomresi">
										<?php echo sprintf("%06s", $elanverennovu_id ); ?>
									</div>
								</td>						
								<td id="elanverennovu_ad-<?php echo $elanverennovu_id ?>"><?php echo $elanverennovu_ad ?></td>	



								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($cek['menzillerucun_elanverennovu_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($cek['menzillerucun_elanverennovu_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'menzillerucun_elanverennovu_durum-'.$cek['elanverennovu_id'] ?>" onchange="Durum(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>

								<td class="KodSutunu">	
									<label class="checkbox" title="<?php if($cek['avtmobil_elanlari_ucun_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
										<input <?php if($cek['avtmobil_elanlari_ucun_durum']==1){
											echo "checked";
										}else{
											echo "";
										} ?>  type="checkbox" id="<?php echo 'avtmobil_elanlari_ucun_durum-'.$cek['elanverennovu_id'] ?>" onchange="AvtoDurum(this.id)" > 
										<span class="checkbox"> 
											<span></span>
										</span>
									</label>
								</td>

								<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
									<a href="javascript:Yenile(<?php echo strval($elanverennovu_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
									<a href="javascript:Sil(<?php echo $elanverennovu_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
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
		var formbaslaxic = '<form action="Islem/elan_muellifi_islem.php" method="POST" name="IslemFormu">';		
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="elanverennovu_ad_metni">'+
		'Adı<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		'<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="elanverennovu_ad" tabindex="1" required="" name="elanverennovu_ad">'+
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
		var elanverennovu_ad = "elanverennovu_ad-" + id;
		var x = document.getElementById(elanverennovu_ad).innerHTML;
		var formbaslaxic = '<form action="Islem/elan_muellifi_islem.php" method="POST" name="IslemFormu">';		
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="elanverennovu_ad_metni">'+
		'Adı<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		'<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="elanverennovu_ad" tabindex="1" required="" name="elanverennovu_ad">'+
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
		var elanverennovu_yenile_id = '<input type="hidden" id="elanverennovu_yenile_id" name="elanverennovu_id">';
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic + adi+meksed+ elanverennovu_yenile_id + buttonalani + formbitis;
		document.getElementById('elanverennovu_yenile_id').setAttribute("value", id);
		document.getElementById('elanverennovu_ad').setAttribute("value", x);
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}



	function FormIslemleriKontrol() {
		if (document.getElementById("elanverennovu_ad")) {
			if (document.getElementById("elanverennovu_ad").value == "") {
				var elanverennovu_ad = document.getElementById("elanverennovu_ad");
				document.getElementById("elanverennovu_ad_metni").style.color = "#ff0000";
				elanverennovu_ad.style.outline = "none";
				elanverennovu_ad.style.border = "2px solid #ff0000";
				elanverennovu_ad.style.color = "#ff0000";
				elanverennovu_ad.focus();
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
		var elan_veren_novu_listeleme_limiti = Deyer
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/elan_muellifi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("elan_veren_novu_listeleme_limiti=" + elan_veren_novu_listeleme_limiti);
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.reload()
			}
		}
	}

	function Durum(ID) {
		var DurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/elan_muellifi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("DurumID=" + DurumID[1]);
	}

		function AvtoDurum(ID) {
		var AvtoDurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/elan_muellifi_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("AvtoDurumID=" + AvtoDurumID[1]);
	}



	function Sil(SilID) {
		document.getElementById("SilKaratmaAlani").style.display = "block";
		document.getElementById("SilModalAlani").style.display = "block";
		document.getElementById("SilModalMetinAlani").innerHTML = "Elan Müəllifinü silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin <b>Elan Müəllifi</b> silinəcək.";
		document.getElementById("SilIslemiOnayButonu").href = "javascript:SilTesdiq(" + SilID + ")";
		document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
		document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
	}

	function SilTesdiq(SilID) {
		var Xhttp = new XMLHttpRequest();
		Xhttp.open("POST", "Islem/elan_muellifi_islem.php", true);
		Xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		Xhttp.send("SilID=" + SilID);
		Xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.assign("http://www.orayhus.com/_admin/ElanMuellifi?durum=silok")
			}
		}
	}




</script>


<?php require_once "_footer.php" ?>