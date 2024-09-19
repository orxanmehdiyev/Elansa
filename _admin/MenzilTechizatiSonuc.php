<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">

			<?php 
			$durum=$_GET['durum'];
			$kode=$_GET['MenzilTechizatiSEOURL'];
			$id=ReqemlerXaricButunKarakterleriSil($_GET['id']);
			if(isset($durum)){
				if ($durum=="ok") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Yeni Mənzil Təchizatı Əlavə Olundu</span>
				<?php  }	
				elseif ($durum=="var") { ?>
					<span style="color: #ff0000;"><i class="fas fa-times"></i> Mənzil Təchizatı Növü Mövcutdur</span>
				<?php  }
				elseif ($durum=="yenile") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Mənzil Təchizatı Növü Yeniləndi</span>
				<?php  }

				else{
					header("Location:MenzilTechizati");
					exit;				
				}
			} else{
				header("Location:MenzilTechizati");
			}
			$sor = $db->prepare("SELECT menziltechizati.*,menzil_techizat_bolmesi.* FROM menziltechizati INNER JOIN menzil_techizat_bolmesi ON menziltechizati.MenziTechizatBolmesiID=menzil_techizat_bolmesi.MenziTechizatBolmesiID  WHERE MenzilTechizatiSEOURL=:MenzilTechizatiSEOURL and MenzilTechizatiID=:MenzilTechizatiID ");


			$sor->execute(array(
				'MenzilTechizatiSEOURL'=>$kode,
				'MenzilTechizatiID'=>$id));
			$Say= $sor->rowCount();

			if ($Say<=0) {		
				header("Location:MenzilTechizati");
			}

			?>
		</div>    
	</div>
	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="MenzilTechizati">Mənzil Təchizatı Növü</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="Yeni()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="MenzilTechizati" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>		
	</div>
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<th class="ListelemeAlaniIciTablosuSiraNomiresi">
					<form action="Islem/menziltechizati_islem.php" method="POST">
						<input type="hidden" name="siralama"
						<?php if ($_SESSION['menziltechizatisiralama']=="MenzilTechizatiID ASC") {
							echo 'value="MenzilTechizatiID DESC"';
						}else{
							echo 'value="MenzilTechizatiID ASC"';
						} ?>
						>
						<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">ID</a>
					</form>
				</th>

				<th class="ListelemeAlaniIciTablosuSiraNomiresi">
					<form action="Islem/menziltechizati_islem.php" method="POST">
						<input type="hidden" name="siralama"
						<?php if ($_SESSION['menziltechizatisiralama']=="MenziTechizatBolmesiAd ASC") {
							echo 'value="MenziTechizatBolmesiAd DESC"';
						}else{
							echo 'value="MenziTechizatBolmesiAd ASC"';
						} ?>
						>
						<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">Bölmə Adı</a>
					</form>
				</th>


				<th>
					<form action="Islem/menziltechizati_islem.php" method="POST">
						<input type="hidden" name="siralama"
						<?php if ($_SESSION['menziltechizatisiralama']=="MenzilTechizatiAd ASC") {
							echo 'value="MenzilTechizatiAd DESC"';
						}else{
							echo 'value="MenzilTechizatiAd ASC"';
						} ?>
						>
						<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">Adı</a>
					</form>
				</th>	
				<th class="KodSutunu">Durum</th>

				<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
			</thead>
			<tbody>
				<?php 
				while ($cek= $sor->fetch(PDO::FETCH_ASSOC)) {
					$MenzilTechizatiID=$cek['MenzilTechizatiID'];					
					$MenzilTechizatiAd=$cek['MenzilTechizatiAd'];	
					$MenziTechizatBolmesiAd=$cek['MenziTechizatBolmesiAd'];

					?>
					<tr>    
						<td class="SiraNomresiSutunu"> 
							<div class="SiraNomresi">
								<?php echo sprintf("%06s", $MenzilTechizatiID ); ?>
							</div>
						</td>	
						<td ><?php echo $MenziTechizatBolmesiAd ?>
						<input id="MenziTechizatBolmesiAd-<?php echo $MenzilTechizatiID ?>" type="hidden" value="<?php echo $MenziTechizatBolmesiID ?>" >
					</td>					
					<td id="MenzilTechizatiAd-<?php echo $MenzilTechizatiID ?>"><?php echo $MenzilTechizatiAd ?></td>	




					<td class="KodSutunu">	
						<label class="checkbox" title="<?php if($cek['MenzilTechizatiDurum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
							<input <?php if($cek['MenzilTechizatiDurum']==1){
								echo "checked";
							}else{
								echo "";
							} ?>  type="checkbox" id="<?php echo 'MenzilTechizatiDurum-'.$cek['MenzilTechizatiID'] ?>" onchange="Durum(this.id)" > 
							<span class="checkbox"> 
								<span></span>
							</span>
						</label>
					</td>

					<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
						<a href="javascript:Yenile(<?php echo strval($MenzilTechizatiID); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
						<a href="javascript:Sil(<?php echo $MenzilTechizatiID; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
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
		var formbaslaxic = '<form action="Islem/menziltechizati_islem.php" method="POST" name="IslemFormu">';	
		var x = document.getElementById("MenzilTechizatiBolmesi").innerHTML;
		var bolmeadi='<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="MenziTechizatBolmesiID_sec_metni">'+
		'Marka'+
		'<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+x+'</div>'+
		'</div>'+
		'</div>';	
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="MenzilTechizatiAd_metni">'+
		'Adı<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		'<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="MenzilTechizatiAd" tabindex="1" required="" name="MenzilTechizatiAd">'+
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
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic +bolmeadi+ adi+meksed + buttonalani + formbitis;
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}

	function Yenile(id) {
		var MenziTechizatBolmesiAd = "MenziTechizatBolmesiAd-" + id;
		var e = document.getElementById(MenziTechizatBolmesiAd).value;
		var MenzilTechizatiAd = "MenzilTechizatiAd-" + id;
		var x = document.getElementById(MenzilTechizatiAd).innerHTML;
		var formbaslaxic = '<form action="Islem/menziltechizati_islem.php" method="POST" name="IslemFormu">';	
		var bolmeadi='<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="MenziTechizatBolmesiID_sec_metni">'+
		'Marka'+
		'<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi" id="BolmeAlani"></div>'+
		'</div>'+
		'</div>';	
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		'<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="MenzilTechizatiAd_metni">'+
		'Adı<span class="KirmiziYazi">*</span>'+
		'</div>'+
		'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		'<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="MenzilTechizatiAd" tabindex="1" required="" name="MenzilTechizatiAd">'+
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
		var menziltechizati_yenile_id = '<input type="hidden" id="menziltechizati_yenile_id" name="MenzilTechizatiID">';
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic +bolmeadi+ adi+meksed+ menziltechizati_yenile_id + buttonalani + formbitis;
		document.getElementById('menziltechizati_yenile_id').setAttribute("value", id);
		document.getElementById('MenzilTechizatiAd').setAttribute("value", x);
		var MenzilTechizatBolmesiTelebEt = new XMLHttpRequest();
		MenzilTechizatBolmesiTelebEt.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("BolmeAlani").innerHTML = " ";
				document.getElementById("BolmeAlani").innerHTML = this.responseText;
			}
		};
		MenzilTechizatBolmesiTelebEt.open("GET", "AnliqYenilenmeler/MenzilTechizatBolmesiTelebEt.php?MenziTechizatBolmesiID=" + e, true);
		MenzilTechizatBolmesiTelebEt.send();
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}



	function FormIslemleriKontrol() {
		if (document.getElementById("MenziTechizatBolmesiID_sec")) {
			if (document.getElementById("MenziTechizatBolmesiID_sec").value == "") {
				var MenziTechizatBolmesiID_sec = document.getElementById("MenziTechizatBolmesiID_sec");
				document.getElementById("MenziTechizatBolmesiID_sec_metni").style.color = "#ff0000";
				MenziTechizatBolmesiID_sec.style.outline = "none";
				MenziTechizatBolmesiID_sec.style.border = "2px solid #ff0000";
				MenziTechizatBolmesiID_sec.style.color = "#ff0000";
				return;
			}
		}
		if (document.getElementById("MenzilTechizatiAd")) {
			if (document.getElementById("MenzilTechizatiAd").value == "") {
				var MenzilTechizatiAd = document.getElementById("MenzilTechizatiAd");
				document.getElementById("MenzilTechizatiAd_metni").style.color = "#ff0000";
				MenzilTechizatiAd.style.outline = "none";
				MenzilTechizatiAd.style.border = "2px solid #ff0000";
				MenzilTechizatiAd.style.color = "#ff0000";
				MenzilTechizatiAd.focus();
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
		var menzil_techizati_siralama_limiti = Deyer
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/menziltechizati_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("menzil_techizati_siralama_limiti=" + menzil_techizati_siralama_limiti);
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.reload()
			}
		}
	}
	function SelectInputAlaniSecildi(id) {
		var InputLabelMetni=id+"_metni";
		document.getElementById(InputLabelMetni).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.border = "1px solid #2A3F54";
	}

	function Durum(ID) {
		var DurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/menziltechizati_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("DurumID=" + DurumID[1]);
	}



	function Sil(SilID) {
		document.getElementById("SilKaratmaAlani").style.display = "block";
		document.getElementById("SilModalAlani").style.display = "block";
		document.getElementById("SilModalMetinAlani").innerHTML = "Mənzil Təchizatı Növünü silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin <b>Mənzil Təchizatı Növü</b> silinəcək.";
		document.getElementById("SilIslemiOnayButonu").href = "javascript:SilTesdiq(" + SilID + ")";
		document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
		document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
	}

	function SilTesdiq(SilID) {
		var Xhttp = new XMLHttpRequest();
		Xhttp.open("POST", "Islem/menziltechizati_islem.php", true);
		Xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		Xhttp.send("SilID=" + SilID);
		Xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.assign("http://www.orayhus.com/_admin/MenzilTechizati?durum=silok")
			}
		}
	}




</script>
<div id="MenzilTechizatiBolmesi" style="display: none;">
	<?php
	$Bolmesor = $db->prepare("SELECT * FROM menzil_techizat_bolmesi where MenziTechizatBolmesiDurum=:MenziTechizatBolmesiDurum");
	$Bolmesor->execute(array(
		'MenziTechizatBolmesiDurum' => 1
	));
	?>
	<select name="MenziTechizatBolmesiAd_sec" tabindex="2" required="required" id="MenziTechizatBolmesiID_sec" class="FormAlanlariUcunSelectInputlari" onchange="SelectInputAlaniSecildi(this.id)">
		<option disabled="disabled" value="" selected="selected"> Secin...</option>
		<?php
		while ($BolmeCek = $Bolmesor->fetch(PDO::FETCH_ASSOC)) {
			?>
			<option value="<?php echo $BolmeCek['MenziTechizatBolmesiID'] ?>"><?php echo $BolmeCek['MenziTechizatBolmesiAd'] ?></option>
		<?php } ?>
	</select>
</div>


<?php require_once "_footer.php" ?>