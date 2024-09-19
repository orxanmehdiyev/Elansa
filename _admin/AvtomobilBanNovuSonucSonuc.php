<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">

			<?php 
			$durum=$_GET['durum'];
			$kode=$_GET['avtomobil_ban_novu_SEO_URL'];
			$id=ReqemlerXaricButunKarakterleriSil($_GET['id']);
			if(isset($durum)){
				if ($durum=="ok") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Yeni Avtomobil Bann Növü Əlavə Olundu</span>
				<?php  }	
				elseif ($durum=="var") { ?>
					<span style="color: #ff0000;"><i class="fas fa-times"></i> Avtomobil Bann Növü Mövcutdur</span>
				<?php  }
				elseif ($durum=="yenile") { ?>
					<span style="color: #00e600;"><i class="fas fa-check"></i> Avtomobil Bann Növü Yeniləndi</span>
				<?php  }

				else{
					header("Location:BannNovu");
					exit;				
				}
			} else{
				header("Location:BannNovu");
			}
			$sor = $db->prepare("SELECT * FROM avtomobil_ban_novu WHERE avtomobil_ban_novu_SEO_URL=:avtomobil_ban_novu_SEO_URL and avtomobil_ban_novu_id=:avtomobil_ban_novu_id");
			$sor->execute(array(
				'avtomobil_ban_novu_SEO_URL'=>$kode,
				'avtomobil_ban_novu_id'=>$id));
			$Say= $sor->rowCount();
	
			if ($Say<=0) {		
				header("Location:BannNovu");
			}
		
			?>
		</div>    
	</div>
	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="BannNovu">Avtomobil Modeli</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="javascript:void(0)" onclick="Yeni()"><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="BannNovu" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>		
	</div>
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0"><table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<th class="ListelemeAlaniIciTablosuSiraNomiresi">
					<form action="Islem/avtomobil_ban_novu_islem.php" method="POST">
						<input type="hidden" name="siralama"
						<?php if ($_SESSION['avtobansiralama']=="avtomobil_ban_novu_id ASC") {
							echo 'value="avtomobil_ban_novu_id DESC"';
						}else{
							echo 'value="avtomobil_ban_novu_id ASC"';
						} ?>
						>
						<a href="javascript:void(0)" onclick="this.closest('form').submit();return false;">ID</a>
					</form>
				</th>		
				<th>
					<form action="Islem/avtomobil_ban_novu_islem.php" method="POST">
						<input type="hidden" name="siralama"
						<?php if ($_SESSION['avtobansiralama']=="avtomobil_ban_novu_ad ASC") {
							echo 'value="avtomobil_ban_novu_ad DESC"';
						}else{
							echo 'value="avtomobil_ban_novu_ad ASC"';
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
					$avtomobil_ban_novu_id=$cek['avtomobil_ban_novu_id'];					
					$avtomobil_ban_novu_ad=$cek['avtomobil_ban_novu_ad'];					
					?>
					<tr>    
						<td class="SiraNomresiSutunu"> 
							<div class="SiraNomresi">
								<?php echo sprintf("%06s", $avtomobil_ban_novu_id ); ?>
							</div>
						</td>						
						<td id="avtomobil_ban_novu_ad-<?php echo $avtomobil_ban_novu_id ?>"><?php echo $avtomobil_ban_novu_ad ?></td>	



						<td class="KodSutunu">	
							<label class="checkbox" title="<?php if($cek['avtomobil_ban_novu_durum']==1){echo 'Passif Et';}else{ echo 'Aktiv Et';}?>" >
								<input <?php if($cek['avtomobil_ban_novu_durum']==1){
									echo "checked";
								}else{
									echo "";
								} ?>  type="checkbox" id="<?php echo 'avtomobil_ban_novu_durum-'.$cek['avtomobil_ban_novu_id'] ?>" onchange="DurumKontrol(this.id)" > 
								<span class="checkbox"> 
									<span></span>
								</span>
							</label>
						</td>
						<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
							<a href="javascript:Yenile(<?php echo strval($avtomobil_ban_novu_id); ?>)" target="_top"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
							<a href="javascript:Sil(<?php echo $avtomobil_ban_novu_id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>

		</table></table>
</div>
























</div>
</section>

<script type="text/javascript">
	function Yeni() {
		var formbaslaxic = '<form action="Islem/avtomobil_ban_novu_islem.php" method="POST" name="IslemFormu">';		
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		    '<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		      '<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_ban_novu_ad_metni">'+
		         'Adıs<span class="KirmiziYazi">*</span>'+
		      '</div>'+
		      '<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		        '<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="avtomobil_ban_novu_ad" tabindex="1" required="" name="avtomobil_ban_novu_ad">'+
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
		var Avtomobil_Ban_Novu_Ad = "avtomobil_ban_novu_ad-" + id;
		var x = document.getElementById(Avtomobil_Ban_Novu_Ad).innerHTML;
		var formbaslaxic = '<form action="Islem/avtomobil_ban_novu_islem.php" method="POST" name="IslemFormu">';		
		var adi = 
		'<div class="SeyfeIciSetirAlaniKapsayici">'+
		    '<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">'+
		      '<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_ban_novu_ad_metni">'+
		         'Adıs<span class="KirmiziYazi">*</span>'+
		      '</div>'+
		      '<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">'+
		        '<input type = "text" class=" FormAlanlariUcunTextInputlari number" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100" id="avtomobil_ban_novu_ad" tabindex="1" required="" name="avtomobil_ban_novu_ad">'+
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
		var avtomobil_ban_novu_yenile_id = '<input type="hidden" id="avtomobil_ban_novu_yenile_id" name="avtomobil_ban_novu_id">';
		var formbitis = '</form>';
		document.getElementById("modalformalaniici").innerHTML = formbaslaxic + adi+meksed+ avtomobil_ban_novu_yenile_id + buttonalani + formbitis;
	  document.getElementById('avtomobil_ban_novu_yenile_id').setAttribute("value", id);
		document.getElementById('avtomobil_ban_novu_ad').setAttribute("value", x);
		document.getElementById("Modal").style.display = "block";
		document.getElementById("ModalAlani").style.display = "block";
	}



	function FormIslemleriKontrol() {
		if (document.getElementById("avtomobil_ban_novu_ad")) {
			if (document.getElementById("avtomobil_ban_novu_ad").value == "") {
				var avtomobil_ban_novu_ad = document.getElementById("avtomobil_ban_novu_ad");
				document.getElementById("avtomobil_ban_novu_ad_metni").style.color = "#ff0000";
				avtomobil_ban_novu_ad.style.outline = "none";
				avtomobil_ban_novu_ad.style.border = "2px solid #ff0000";
				avtomobil_ban_novu_ad.style.color = "#ff0000";
				avtomobil_ban_novu_ad.focus();
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
		var avtomobil_ban_novu_listeleme_limiti = Deyer
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/avtomobil_ban_novu_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("avtomobil_ban_novu_listeleme_limiti=" + avtomobil_ban_novu_listeleme_limiti);
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.reload()
			}
		}
	}

	function DurumKontrol(ID) {
		var DurumID = ID.split("-");
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "Islem/avtomobil_ban_novu_islem.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("DurumID=" + DurumID[1]);
	}


	function Sil(SilID) {
		document.getElementById("SilKaratmaAlani").style.display = "block";
		document.getElementById("SilModalAlani").style.display = "block";
		document.getElementById("SilModalMetinAlani").innerHTML = "Avtomobil Ban Növünü silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin <b>Avtomobil Ban Növü</b> silinəcək.";
		document.getElementById("SilIslemiOnayButonu").href = "javascript:SilTesdiq(" + SilID + ")";
		document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
		document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";
	}

	function SilTesdiq(SilID) {
		var Xhttp = new XMLHttpRequest();
		Xhttp.open("POST", "Islem/avtomobil_ban_novu_islem.php", true);
		Xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		Xhttp.send("SilID=" + SilID);
		Xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.assign("http://www.orayhus.com/_admin/BannNovu?durum=silok")
			}
		}
	}




</script>


<?php require_once "_footer.php" ?>