<?php 
require_once "_header.php";
require_once "_menu.php"; 
?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			<span>Yeni Dövlət</span>    
		</div>    
	</div>
	<div id="FormAlaniKapsayicisi">
		<form id="DovletIslemleriFormu" name="DovletIslemleriFormu" action="Islem/dovlet_islem.php" method="POST">

			<div class="SeyfeIciSetirAlaniKapsayici">
				<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
					<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="Dovlet_Ad_metni">
						Adı  <span class="KirmiziYazi">*</span>
					</div>
					<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
						<input type="text" id="Dovlet_Ad" name="Dovlet_Ad" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1" oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)">
					</div>
				</div>
			</div>

			<div class="SeyfeIciSetirAlaniKapsayici">
				<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
					<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="Dovlet_Beynelxalq_Adi_metni">
						Beynəlxalq Adı <span class="KirmiziYazi">*</span>
					</div>
					<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
						<input type="text" id="Dovlet_Beynelxalq_Adi" name="Dovlet_Beynelxalq_Adi" value=""  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" oninput="MetinInputAlaniYazildi(this.id)" required="" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="2" onKeyUp="AzerbaycanHerfleriniIngilisHerflereDeyisdir(this.id),IngilizceyeGoreKucukHarfBuyukHarfDegistir(this.id)">
					</div>
				</div>
			</div>

			<div class="SeyfeIciSetirAlaniKapsayici">
				<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
					<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici"id="ISO_KODU_ALFA_2_metni">
						İso Kodu ALFA 2<span class="KirmiziYazi">*</span>
					</div>
					<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
						<div class="YuzPixselSinirliAlanKapsayicisi">		
							<input type="text" id="ISO_KODU_ALFA_2" name="ISO_KODU_ALFA_2" value=""  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" oninput="MetinInputAlaniYazildi(this.id)" required="" class="FormAlanlariUcunTextInputlari" maxlength="2" tabindex="3" onKeyUp="AzerbaycanHerfleriniIngilisHerflereDeyisdir(this.id),IngilizceyeGoreKucukHarfBuyukHarfDegistir(this.id)">
						</div>
					</div>
				</div>
			</div>

			<div class="SeyfeIciSetirAlaniKapsayici">
				<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
					<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="ISO_KODU_ALFA_3_metni">
						İso Kodu ALFA 3<span class="KirmiziYazi">*</span>
					</div>
					<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
						<div class="YuzPixselSinirliAlanKapsayicisi">
							<input type="text" id="ISO_KODU_ALFA_3" name="ISO_KODU_ALFA_3" value=""  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" oninput="MetinInputAlaniYazildi(this.id)" required="" class="FormAlanlariUcunTextInputlari" maxlength="3" tabindex="4" onKeyUp="AzerbaycanHerfleriniIngilisHerflereDeyisdir(this.id),IngilizceyeGoreKucukHarfBuyukHarfDegistir(this.id)">

						</div>
					</div>
				</div>
			</div>

			


			<div class="SeyfeIciSetirAlaniKapsayici">
				<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
					<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="Dovlet_Reqem_Kodu_metni" >
						Rəqəm Kodu<span class="KirmiziYazi">*</span>
					</div>
					<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
						<div class="YuzPixselSinirliAlanKapsayicisi">						
							<input type = "number" tabindex="5"  class=" FormAlanlariUcunTextInputlari number" min="0"  max="999" 
							oninput="ReqemInputAlaniYazildi(this.id)" onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" onfocusout="ReqemInputAlaniYazildi(this.id)" maxlength="3"   id="Dovlet_Reqem_Kodu" required=""  name="Dovlet_Reqem_Kodu"/>
						</div>
					</div>
				</div>
			</div>




			<div class="SeyfeIciSetirAlaniKapsayici">
				<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
					<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="Dovlet_Musteqillik_Tarixi_metni">
						Müstəqllik Tarixi <span class="KirmiziYazi">*</span>
					</div>
					<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
						<div class="YuzPixselSinirliAlanKapsayicisi">	
							<input type = "number" class=" FormAlanlariUcunTextInputlari number" min="0"  max="9999" 
							oninput="ReqemInputAlaniYazildi(this.id)" onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" onfocusout="ReqemInputAlaniYazildi(this.id)" maxlength = "4" maxlength="6" id="Dovlet_Musteqillik_Tarixi" required="" tabindex="6" name="Dovlet_Musteqillik_Tarixi"/>
						</div>
					</div>
				</div>
			</div>


			<div class="SeyfeIciSetirAlaniKapsayici">
				<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
					<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="Dovlet_Telefon_Kodu_metni">
						Telefon Kodu <span class="KirmiziYazi">*</span>
					</div>
					<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
						<div class="YuzPixselSinirliAlanKapsayicisi">
							<input type = "number" class=" FormAlanlariUcunTextInputlari number" min="0"  max="9999" 
							oninput="ReqemInputAlaniYazildi(this.id)" onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" onfocusout="ReqemInputAlaniYazildi(this.id)" maxlength = "5"   id="Dovlet_Telefon_Kodu" required="" tabindex="7"  name="Dovlet_Telefon_Kodu"/>
						</div>
					</div>
				</div>
			</div>


			<div class="SeyfeIciSetirAlaniKapsayici">
				<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
					<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="Dovlet_Valyuta_Kodu_metni">
						Valyuta Kodu <span class="KirmiziYazi">*</span>
					</div>
					<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
						<div class="YuzPixselSinirliAlanKapsayicisi">
							<input type = "text" class=" FormAlanlariUcunTextInputlari number" 
							oninput="MetinInputAlaniYazildi(this.id)"  onfocusout="MetinInputAlaniYazildi(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "3"  id="Dovlet_Valyuta_Kodu" onKeyUp="AzerbaycanHerfleriniIngilisHerflereDeyisdir(this.id),IngilizceyeGoreKucukHarfBuyukHarfDegistir(this.id)" tabindex="8" required=""name="Dovlet_Valyuta_Kodu"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="Yeni" value="Yeni">

		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<button type="button" class="YenileButonlari"tabindex="9" name="UmumiAyarlarYenile" onClick="DovletIslemleriFormKontrol()">Əlavə ET</button>
			<button type="button" class="QirmiziButonlar" tabindex="10"  onclick="Geri()" >İmtina Et</button>
		</div>
	</form>
</div>
</section>

<script type="text/javascript">
	function Geri() {
		window.history.back();
	}


	function DovletIslemleriFormKontrol() {
		if (document.getElementById("Dovlet_Ad").value == "") {
			var Dovlet_Ad = document.getElementById("Dovlet_Ad");
			document.getElementById("Dovlet_Ad_metni").style.color = "#ff0000";
			Dovlet_Ad.style.outline = "none";
			Dovlet_Ad.style.border = "2px solid #ff0000";
			Dovlet_Ad.classList.add("pleysoldercolorqirmizi");
			Dovlet_Ad.focus();
			return;
		}
		if (document.getElementById("Dovlet_Beynelxalq_Adi").value == "") {
			var Dovlet_Beynelxalq_Adi = document.getElementById("Dovlet_Beynelxalq_Adi");
			document.getElementById("Dovlet_Beynelxalq_Adi_metni").style.color = "#ff0000";
			Dovlet_Beynelxalq_Adi.style.outline = "none";
			Dovlet_Beynelxalq_Adi.style.border = "2px solid #ff0000";
			Dovlet_Beynelxalq_Adi.classList.add("pleysoldercolorqirmizi");
			Dovlet_Beynelxalq_Adi.focus();
			return;
		}



		if (document.getElementById("ISO_KODU_ALFA_3").value == "") {
			var ISO_KODU_ALFA_3 = document.getElementById("ISO_KODU_ALFA_3");
			document.getElementById("ISO_KODU_ALFA_3_metni").style.color = "#ff0000";
			ISO_KODU_ALFA_3.style.outline = "none";
			ISO_KODU_ALFA_3.style.border = "2px solid #ff0000";
			ISO_KODU_ALFA_3.classList.add("pleysoldercolorqirmizi");
			ISO_KODU_ALFA_3.focus();
			return;
		}

		if (document.getElementById("Dovlet_Reqem_Kodu").value == "") {
			var Dovlet_Reqem_Kodu = document.getElementById("Dovlet_Reqem_Kodu");
			document.getElementById("Dovlet_Reqem_Kodu_metni").style.color = "#ff0000";
			Dovlet_Reqem_Kodu.style.outline = "none";
			Dovlet_Reqem_Kodu.style.border = "2px solid #ff0000";
			Dovlet_Reqem_Kodu.classList.add("pleysoldercolorqirmizi");
			Dovlet_Reqem_Kodu.focus();
			return;
		}


		if (document.getElementById("Dovlet_Musteqillik_Tarixi").value == "") {
			var Dovlet_Musteqillik_Tarixi = document.getElementById("Dovlet_Musteqillik_Tarixi");
			document.getElementById("Dovlet_Musteqillik_Tarixi_metni").style.color = "#ff0000";
			Dovlet_Musteqillik_Tarixi.style.outline = "none";
			Dovlet_Musteqillik_Tarixi.style.border = "2px solid #ff0000";
			Dovlet_Musteqillik_Tarixi.classList.add("pleysoldercolorqirmizi");
			Dovlet_Musteqillik_Tarixi.focus();
			return;
		}

		if (document.getElementById("Dovlet_Telefon_Kodu").value == "") {
			var Dovlet_Telefon_Kodu = document.getElementById("Dovlet_Telefon_Kodu");
			document.getElementById("Dovlet_Telefon_Kodu_metni").style.color = "#ff0000";
			Dovlet_Telefon_Kodu.style.outline = "none";
			Dovlet_Telefon_Kodu.style.border = "2px solid #ff0000";
			Dovlet_Telefon_Kodu.classList.add("pleysoldercolorqirmizi");
			Dovlet_Telefon_Kodu.focus();
			return;
		}

		if (document.getElementById("Dovlet_Valyuta_Kodu").value == "") {
			var Dovlet_Valyuta_Kodu = document.getElementById("Dovlet_Valyuta_Kodu");
			document.getElementById("Dovlet_Valyuta_Kodu_metni").style.color = "#ff0000";
			Dovlet_Valyuta_Kodu.style.outline = "none";
			Dovlet_Valyuta_Kodu.style.border = "2px solid #ff0000";
			Dovlet_Valyuta_Kodu.classList.add("pleysoldercolorqirmizi");
			Dovlet_Valyuta_Kodu.focus();
			return;
		}
		document.DovletIslemleriFormu.submit();
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
			var YoxlanisNeticesi = Yoxla.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə()\s+]/g, "");
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



	function ReqemInputAlaniYazildi(deyer) {
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
			var YoxlanisNeticesi = Yoxla.replace(/[^0-9]/g, "");
			InputIcerikDeyeri.value = YoxlanisNeticesi;
			return;
		}
	}


</script>
<?php require_once "_footer.php" ?>


