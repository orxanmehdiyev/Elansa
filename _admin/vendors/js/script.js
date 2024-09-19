
function HeaderYoneticiAlaniMenuAcKapat() {
	var AcilirKapanirAlanDivi = document.getElementById("HeaderIstifadeciAcilirMenuAlaniKapsayicisi");
	var AcilirKapanirAlanIconu = document.getElementById("AcilirMenuOku");
	if (AcilirKapanirAlanDivi.style.display === "none") {
		AcilirKapanirAlanDivi.style.display = "block";
		AcilirKapanirAlanIconu.setAttribute("src", "img/OkYukari.png");
	} else {
		AcilirKapanirAlanDivi.style.display = "none";
		AcilirKapanirAlanIconu.setAttribute("src", "img/OkAsagi.png");
	}
}


function MobilMenuAlaniMenuAcKapat() {
	var MobilMenuAcilirKapanirAlanDivi = document.getElementById("mobmenu");
	if (MobilMenuAcilirKapanirAlanDivi.style.display === "none") {
		MobilMenuAcilirKapanirAlanDivi.style.display = "block";
	} else {
		MobilMenuAcilirKapanirAlanDivi.style.display = "none";
	}
}


/*  Şəhər yenile bagla modalini acir*/
function Bagla() {
	document.getElementById("Modal").style.display = "none";
	document.getElementById("ModalAlani").style.display = "none";
	document.getElementById("modalformalaniici").innerHTML = "";
}
/*  Şəhər yenile bagla modalini acir*/




























/*  Yeni Avtomobil techizati əlavə et modalini acir*/
function YeniAvtomobilTəchizat() {
	document.getElementById("YeniAvtomobilTechiztiElaveEtModali").style.display = "block";
	document.getElementById("YeniAvtomobilTechiztiElaveEtModalAlani").style.display = "block";
}









/*  Yeni Elan Müəllifi əlavə et modalini acir*/
function YeniElanMüəllifiNovu() {
	var formbaslaxic = '<form action="Islem/elan_muellifi_islem.php" method="POST" ';
	var elanmuellifiadi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="elanverennovu_ad_ad_metin">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="elanverennovu_ad" name="elanverennovu_ad" value="" required="" placeholder="Adı" onfocusout="ElanMuellifiIslemleriElanMuellifiAdiYazildi()" oninput="ElanMuellifiIslemleriElanMuellifiAdiYazildi()" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1"></div></div></div>';
	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"> <button type="submit" class="YenileButonlari" name="Yeni" onClick="ElanMuellifiIslemleriFormKontrol()" tabindex="5">Əlavə Et</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + elanmuellifiadi+ buttonalani + formbitis;
	document.getElementById("Modal").style.display = "block";
	document.getElementById("ModalAlani").style.display = "block";
}
/*  Yeni Elan Müəllifi əlavə et modalini acir*/

/*Elan Müəllifi İşləmləri form kontrol*/
function ElanMuellifiIslemleriFormKontrol() {
	if (document.getElementById("elanverennovu_ad")) {
		if (document.getElementById("elanverennovu_ad").value == "") {
			var elanverennovu_ad = document.getElementById("elanverennovu_ad");
			document.getElementById("elanverennovu_ad_ad_metin").style.color = "#ff0000";
			elanverennovu_ad.style.outline = "none";
			elanverennovu_ad.style.border = "2px solid #ff0000";
			elanverennovu_ad.classList.add("pleysoldercolorqirmizi");
			elanverennovu_ad.focus();
			return;
		}
	}
}
/*Elan Müəllifi İşləmləri form kontrol*/



/*Elan Müəllifi İşləmləri Adı Yazılıb yazılmadığını yoxlayir*/
function ElanMuellifiIslemleriElanMuellifiAdiYazildi() {
	var avtomobil_techizat_ad = document.getElementById("elanverennovu_ad");
	if (avtomobil_techizat_ad.value == "") {
		document.getElementById("elanverennovu_ad_ad_metin").style.color = "#ff0000";
		document.getElementById("elanverennovu_ad").style.color = "#ff0000";
		document.getElementById("elanverennovu_ad").style.borderColor = "#ff0000";
		document.getElementById("elanverennovu_ad").style.boxShadow = "1px 0px 1px 0px #ff0000";
		elanverennovu_ad.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById("elanverennovu_ad_ad_metin").style.color = "#2A3F54";
		document.getElementById("elanverennovu_ad").style.color = "#2A3F54";
		document.getElementById("elanverennovu_ad").style.borderColor = "#2A3F54";
		document.getElementById("elanverennovu_ad").style.boxShadow = "0px 0px 0px 0px #2A3F54";
		elanverennovu_ad.classList.remove("pleysoldercolorqirmizi");
		var dovlet_kisa_ad_yoxla = elanverennovu_ad.value;
		var YoxlanisNeticesi = dovlet_kisa_ad_yoxla.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə\|/-//]/g, "");
		elanverennovu_ad.value = YoxlanisNeticesi;
		elanverennovu_ad.focus();
		return;
	}
}
/*Elan Müəllifi İşləmləri Adı Yazılıb yazılmadığını yoxlayir*/


/*  Elan Müəllifi Yenilə modalini acir*/
function ElanVerenNovuYenileAc(id) {
	var formbaslaxic = '<form action="Islem/elan_muellifi_islem.php" method="POST" ';
	var elanmuellifiadi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="elanverennovu_ad_ad_metin">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="elanverennovu_ad" name="elanverennovu_ad" value="" required="" placeholder="Adı" onfocusout="ElanMuellifiIslemleriElanMuellifiAdiYazildi()" oninput="ElanMuellifiIslemleriElanMuellifiAdiYazildi()" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1"></div></div></div>';
	var modalicerikgizliinput = '<input type="hidden" id="elanverennovu_id" name="elanverennovu_id"';
	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"> <button type="submit" class="YenileButonlari" name="Yenile" onClick="ElanMuellifiIslemleriFormKontrol()" tabindex="5">Yenilə</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + elanmuellifiadi+modalicerikgizliinput+ buttonalani + formbitis;
	document.getElementById('elanverennovu_id').setAttribute("value", id);
	var elanverennovu_ad = "elanverennovu_ad-" + id;
	var x = document.getElementById(elanverennovu_ad).innerHTML;
	document.getElementById('elanverennovu_ad').setAttribute("value", x);
	document.getElementById("Modal").style.display = "block";
	document.getElementById("ModalAlani").style.display = "block";
}
/*  Elan Müəllifi Yenilə modalini acir*/

/*Elan Müəllifi Avtomobillər ücün durum kontrol*/
function ElanverennovuDurumKontrolAvto(ID) {
	var DurumID = ID.split("-");
	var ElanVerenNovudurumAvtoDurumId = DurumID;
	var ElanVerenNovudurumAvtoDurumId_xhttp = new XMLHttpRequest();
	ElanVerenNovudurumAvtoDurumId_xhttp.open("POST", "Islem/elan_muellifi_islem.php", true);
	ElanVerenNovudurumAvtoDurumId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ElanVerenNovudurumAvtoDurumId_xhttp.send("ElanVerenNovudurumAvtoDurumId=" + ElanVerenNovudurumAvtoDurumId);
}
/*Elan Müəllifi Avtomobillər ücün durum kontrol*/



/*Elan Müəllifi Avtomobillər ücün durum kontrol*/
function ElanverennovuDurumKontrolMenzil(ID) {
	var DurumID = ID.split("-");
	var ElanVerenNovudurumMenzilDurumId = DurumID;
	var ElanVerenNovudurumMenzilDurumId_xhttp = new XMLHttpRequest();
	ElanVerenNovudurumMenzilDurumId_xhttp.open("POST", "Islem/elan_muellifi_islem.php", true);
	ElanVerenNovudurumMenzilDurumId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ElanVerenNovudurumMenzilDurumId_xhttp.send("ElanVerenNovudurumMenzilDurumId=" + ElanVerenNovudurumMenzilDurumId);
}
/*Elan Müəllifi Avtomobillər ücün durum kontrol*/


function SilImtina() {
	document.getElementById("SilKaratmaAlani").style.display = "none";
	document.getElementById("SilModalAlani").style.display = "none";
	document.getElementById("SilModalMetinAlani").innerHTML = "";
	document.getElementById("SilIslemiOnaylaButonu").href = "";
	document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "none";
	document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "none";
}




function ElanMuellifiSil(IDDegeri) {
	document.getElementById("SilKaratmaAlani").style.display = "block";
	document.getElementById("SilModalAlani").style.display = "block";

	document.getElementById("SilModalMetinAlani").innerHTML = "Secdiyiniz Elan Müəllifini Silmək İstəyirsiniz?";
	document.getElementById("SilIslemiOnayButonu").href = "javascript:ElanMuellifiSIlTesdiq(" + IDDegeri + ")";
	document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
	document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";

}

function ElanMuellifiSIlTesdiq(IDDegeri) {
	var ElanMuellifiSIlTesdiqId = IDDegeri;
	var ElanMuellifiSIlTesdiqId_xhttp = new XMLHttpRequest();
	ElanMuellifiSIlTesdiqId_xhttp.open("POST", "Islem/elan_muellifi_islem.php", true);
	ElanMuellifiSIlTesdiqId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ElanMuellifiSIlTesdiqId_xhttp.send("ElanMuellifiSIlTesdiqId=" + ElanMuellifiSIlTesdiqId);
	ElanMuellifiSIlTesdiqId_xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			window.location.reload()
		}
	}
}


function ElanverennovuSiralamaLimiti(Deyer) {
	var elan_veren_novu_listeleme_limiti = Deyer
	var elan_veren_novu_listeleme_limiti_xhttp = new XMLHttpRequest();
	elan_veren_novu_listeleme_limiti_xhttp.open("POST", "Islem/elan_muellifi_islem.php", true);
	elan_veren_novu_listeleme_limiti_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	elan_veren_novu_listeleme_limiti_xhttp.send("elan_veren_novu_listeleme_limiti=" + elan_veren_novu_listeleme_limiti);
	elan_veren_novu_listeleme_limiti_xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			window.location.reload()
		}
	}
}

/*  Yeni Bolmə əlavə et modalini acir*/
function Yenibolme() {
	var formbaslaxic = '<form action="Islem/bolme_islem.php" method="POST" ';
	var elanmuellifiadi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="bolme_ad_metin">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="bolme_ad" name="bolme_ad" value="" required="" placeholder="Adı" onfocusout="BolmeAdiYazildi()" oninput="BolmeAdiYazildi()" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1"></div></div></div>';
	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"> <button type="submit" class="YenileButonlari" name="Yeni" onClick="BolmeIslemleriFormKontrol()" tabindex="5">Əlavə Et</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + elanmuellifiadi+ buttonalani + formbitis;
	document.getElementById("Modal").style.display = "block";
	document.getElementById("ModalAlani").style.display = "block";
}
/*  Yeni Bolmə əlavə et modalini acir*/


/*Bolmə İşləmləri form kontrol*/
function BolmeIslemleriFormKontrol() {
	if (document.getElementById("bolme_ad")) {
		if (document.getElementById("bolme_ad").value == "") {
			var bolme_ad = document.getElementById("bolme_ad");
			document.getElementById("bolme_ad_metin").style.color = "#ff0000";
			bolme_ad.style.outline = "none";
			bolme_ad.style.border = "2px solid #ff0000";
			bolme_ad.classList.add("pleysoldercolorqirmizi");
			bolme_ad.focus();
			return;
		}
	}
}
/*Bolmə İşləmləri form kontrol*/



/*Bolmə İşləmləri Adı Yazılıb yazılmadığını yoxlayir*/
function BolmeAdiYazildi() {
	var avtomobil_techizat_ad = document.getElementById("bolme_ad");
	if (avtomobil_techizat_ad.value == "") {
		document.getElementById("bolme_ad_metin").style.color = "#ff0000";
		document.getElementById("bolme_ad").style.color = "#ff0000";
		document.getElementById("bolme_ad").style.borderColor = "#ff0000";
		document.getElementById("bolme_ad").style.boxShadow = "1px 0px 1px 0px #ff0000";
		bolme_ad.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById("bolme_ad_metin").style.color = "#2A3F54";
		document.getElementById("bolme_ad").style.color = "#2A3F54";
		document.getElementById("bolme_ad").style.borderColor = "#2A3F54";
		document.getElementById("bolme_ad").style.boxShadow = "0px 0px 0px 0px #2A3F54";
		bolme_ad.classList.remove("pleysoldercolorqirmizi");
		var dovlet_kisa_ad_yoxla = bolme_ad.value;
		var YoxlanisNeticesi = dovlet_kisa_ad_yoxla.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə\|/-//]/g, "");
		bolme_ad.value = YoxlanisNeticesi;
		bolme_ad.focus();
		return;
	}
}
/*Bolmə İşləmləri Adı Yazılıb yazılmadığını yoxlayir*/


/* Bolmə Yenilə modalini acir*/
function BolmeYenileAc(id) {
	var formbaslaxic = '<form action="Islem/bolme_islem.php" method="POST" ';
	var elanmuellifiadi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="bolme_ad_metin">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="bolme_ad" name="bolme_ad" value="" required="" placeholder="Adı" onfocusout="BolmeAdiYazildi()" oninput="BolmeAdiYazildi()" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1"></div></div></div>';
	var modalicerikgizliinput = '<input type="hidden" id="bolme_id" name="bolme_id"';
	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"> <button type="submit" class="YenileButonlari" name="Yenile" onClick="ElanMuellifiIslemleriFormKontrol()" tabindex="5">Yenilə</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + elanmuellifiadi+modalicerikgizliinput+ buttonalani + formbitis;
	document.getElementById('bolme_id').setAttribute("value", id);
	var bolme_ad = "bolme_ad-" + id;
	var x = document.getElementById(bolme_ad).innerHTML;
	document.getElementById('bolme_ad').setAttribute("value", x);
	document.getElementById("Modal").style.display = "block";
	document.getElementById("ModalAlani").style.display = "block";
}
/* Bolmə Yenilə modalini acir*/

/* Bolmə Ydurum kontrol*/
function BolmeDurumKontrol(ID) {
	var DurumID = ID.split("-");
	var BolmeDurumId = DurumID;
	var BolmeDurumId_xhttp = new XMLHttpRequest();
	BolmeDurumId_xhttp.open("POST", "Islem/bolme_islem.php", true);
	BolmeDurumId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	BolmeDurumId_xhttp.send("BolmeDurumId=" + BolmeDurumId);
}
/* Bolmə Ydurum kontrol*/


function BolmeSil(IDDegeri) {
	document.getElementById("SilKaratmaAlani").style.display = "block";
	document.getElementById("SilModalAlani").style.display = "block";

	document.getElementById("SilModalMetinAlani").innerHTML = "Secdiyiniz Bölməni silərsəniz həmin bölməyə bağlı sistemdəki elanlar və kataqoriyalar silinəcək?";
	document.getElementById("SilIslemiOnayButonu").href = "javascript:BolmeSIlTesdiq(" + IDDegeri + ")";
	document.getElementById("SilIslemiOnayButonuKapsayicisi").style.display = "block";
	document.getElementById("SilIslemiImtinaButonuKapsayicisi").style.display = "block";

}

function BolmeSIlTesdiq(IDDegeri) {
	var BolmeSIlTesdiqId = IDDegeri;
	var BolmeSIlTesdiqId_xhttp = new XMLHttpRequest();
	BolmeSIlTesdiqId_xhttp.open("POST", "Islem/bolme_islem.php", true);
	BolmeSIlTesdiqId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	BolmeSIlTesdiqId_xhttp.send("BolmeSIlTesdiqId=" + BolmeSIlTesdiqId);
	BolmeSIlTesdiqId_xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			window.location.reload()
		}
	}
}


function BolmeSiralamaLimiti(Deyer) {
	var bolme_listeleme_limiti = Deyer
	var bolme_listeleme_limiti_xhttp = new XMLHttpRequest();
	bolme_listeleme_limiti_xhttp.open("POST", "Islem/bolme_islem.php", true);
	bolme_listeleme_limiti_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	bolme_listeleme_limiti_xhttp.send("bolme_listeleme_limiti=" + bolme_listeleme_limiti);
	bolme_listeleme_limiti_xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			window.location.reload()
		}
	}
}


/*  Yeni Katagorya əlavə et modalini acir*/
function YeniKatagorya() {
	var formbaslaxic = '<form action="Islem/katagorya_islem.php" method="POST" ';
	var x = document.getElementById("YeniKatagoriyaElaveEtUcunBolme").innerHTML;
	var Bolmeinputalani = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="bolme_id_sec_metni">Dövlət <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi" id="SeherElaniUcunDovlet"><select name="bolme_id" tabindex="2" required="required"  id="bolme_id" class="FormAlanlariUcunSelectInputlari" onchange="KatagoriyaIslemleriUcunBolmeSecildi(this.value)">' +
	x + '</select></div></div></div>';
	var katagoriyaadinputalani = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="karoqoriya_ad_metin">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="karoqoriya_ad" name="karoqoriya_ad" value="" placeholder="Adı" onfocusout="KatagoryaIslemleriUcunKatagoryaAdiYazildi()" oninput="KatagoryaIslemleriUcunKatagoryaAdiYazildi()" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="2" ></div></div></div>';

	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="submit" class="YenileButonlari" name="Yeni" onClick="KatagoryaFormIslemleriKontrol()" tabindex="5">Əlavə Et</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + Bolmeinputalani + katagoriyaadinputalani  + buttonalani + formbitis;
	document.getElementById("Modal").style.display = "block";
	document.getElementById("ModalAlani").style.display = "block";
}
/*  Yeni Katagorya əlavə et modalini acir*/




/*Katagorya formunu yoxlayir*/
function KatagoryaFormIslemleriKontrol() {
	if (document.getElementById("bolme_id")) {
		if (document.getElementById("bolme_id").value == "") {
			var bolme_id = document.getElementById("bolme_id");
			document.getElementById("bolme_id_sec_metni").style.color = "#ff0000";
			bolme_id.style.outline = "none";
			bolme_id.style.border = "2px solid #ff0000";
			bolme_id.style.color = "#ff0000";
			bolme_id.focus();
			return;
		}
	}

	if (document.getElementById("karoqoriya_ad")) {
		if (document.getElementById("karoqoriya_ad").value == "") {
			var karoqoriya_ad = document.getElementById("karoqoriya_ad");
			document.getElementById("karoqoriya_ad_metin").style.color = "#ff0000";
			karoqoriya_ad.style.outline = "none";
			karoqoriya_ad.style.border = "2px solid #ff0000";
			karoqoriya_ad.classList.add("pleysoldercolorqirmizi");
			return;
		}
	}

}
/*Katagorya formunu yoxlayir*/

/*Katagorya işləmləri üçün dövlət secildi*/
function KatagoriyaIslemleriUcunBolmeSecildi() {
	document.getElementById("bolme_id_sec_metni").style.color = "#2A3F54";
	document.getElementById("bolme_id").style.color = "#2A3F54";
	document.getElementById("bolme_id").style.borderColor = "#2A3F54";
	document.getElementById("bolme_id").style.border = "1px solid #2A3F54";
}
/*Katagorya işləmləri üçün dövlət secildi*/



/*Katagorya Adı Yazıldı*/
function KatagoryaIslemleriUcunKatagoryaAdiYazildi() {
	if (document.getElementById("karoqoriya_ad")) {
		var karoqoriya_ad = document.getElementById("karoqoriya_ad");
		if (karoqoriya_ad.value == "") {
			document.getElementById("karoqoriya_ad_metin").style.color = "#ff0000";
			document.getElementById("karoqoriya_ad").style.color = "#ff0000";
			document.getElementById("karoqoriya_ad").style.borderColor = "#ff0000";
			document.getElementById("karoqoriya_ad").style.boxShadow = "1px 0px 1px 0px #ff0000";
			karoqoriya_ad.classList.add("pleysoldercolorqirmizi");
			return;
		} else {
			document.getElementById("karoqoriya_ad_metin").style.color = "#2A3F54";
			document.getElementById("karoqoriya_ad").style.color = "#2A3F54";
			document.getElementById("karoqoriya_ad").style.borderColor = "#2A3F54";
			document.getElementById("karoqoriya_ad").style.boxShadow = "0px 0px 0px 0px #2A3F54";
			karoqoriya_ad.classList.remove("pleysoldercolorqirmizi");
			var dovlet_telefon_kod_yoxla = karoqoriya_ad.value;
			var YoxlanisNeticesi = dovlet_telefon_kod_yoxla.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə\|///-]/g, "");
			karoqoriya_ad.value = YoxlanisNeticesi;
			return;
		}
	}
}
/*Katagorya Adı Yazıldı*/




/*  Katagorya yenile işləmləri üçün katagoriya modali acir*/
function KataqoriyalarYenile(id) {
	var formbaslaxic = '<form action="Islem/katagorya_islem.php" method="POST" ';
	var x = document.getElementById("YeniKatagoriyaElaveEtUcunBolme").innerHTML;
	var Bolmeinputalani = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="bolme_id_sec_metni">Dövlət <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi" id="SeherElaniUcunDovlet"><select name="bolme_id" tabindex="2" required="required"  id="bolme_id" class="FormAlanlariUcunSelectInputlari" onchange="KatagoriyaIslemleriUcunBolmeSecildi(this.value)">' +
	x + '</select></div></div></div>';
	var katagoriyaadinputalani = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="karoqoriya_ad_metin">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="karoqoriya_ad" name="karoqoriya_ad"  onfocusout="KatagoryaIslemleriUcunKatagoryaAdiYazildi()" oninput="KatagoryaIslemleriUcunKatagoryaAdiYazildi()" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="2" ></div></div></div>';
	var modalicerikgizliinput = '<input type="hidden" id="karoqoriya_id" name="karoqoriya_id"';
	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="submit" class="YenileButonlari" name="Yenile" onClick="KatagoryaFormIslemleriKontrol()" tabindex="5">Yenilə</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + Bolmeinputalani + katagoriyaadinputalani +modalicerikgizliinput + buttonalani + formbitis;
	document.getElementById('karoqoriya_id').setAttribute("value", id);
	var karoqoriya_ad = "karoqoriya_ad-" + id;
	var x = document.getElementById(karoqoriya_ad).innerHTML;
	document.getElementById('karoqoriya_ad').setAttribute("value", x);
	var bolme_id = "bolme-" + id;
	var e = document.getElementById(bolme_id).value;
	var BolmeTelebEt = new XMLHttpRequest();
	BolmeTelebEt.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("bolme_id").innerHTML = " ";
			document.getElementById("bolme_id").innerHTML = this.responseText;
			document.getElementById("Modal").style.display = "block";
			document.getElementById("ModalAlani").style.display = "block";
		}
	};
	BolmeTelebEt.open("GET", "AnliqYenilenmeler/KatagoriyaYenilenmesiBolmeTelebEt.php?bolme_id=" + e, true);
	BolmeTelebEt.send();
}
/*  Katagorya yenile işləmləri üçün katagoriya modali acir*/


/*Katagorya Siralama Limiti*/
function katagorya_listeleme_limiti(Deyer) {
	var katagorya_siralama = Deyer
	var katagorya_siralama_xhttp = new XMLHttpRequest();
	katagorya_siralama_xhttp.open("POST", "Islem/katagorya_islem.php", true);
	katagorya_siralama_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	katagorya_siralama_xhttp.send("katagorya_listeleme_limiti=" + katagorya_siralama);
	katagorya_siralama_xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			window.location.reload()
		}
	}
}
/*Katagorya Siralama Limiti*/

/* Katagorya durum kontrol*/
function KaroqoriyaDurumKontrol(ID) {
	var DurumID = ID.split("-");
	var KatagoryaDurumId = DurumID;
	var KatagoryaDurumId_xhttp = new XMLHttpRequest();
	KatagoryaDurumId_xhttp.open("POST", "Islem/katagorya_islem.php", true);
	KatagoryaDurumId_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	KatagoryaDurumId_xhttp.send("KatagoryaDurumId=" + KatagoryaDurumId);
}
/* Katagorya durum kontrol*/


/*  Yeni Bolmə əlavə et modalini acir*/
function YeniAvtomobilMarkasi() {
	var formbaslaxic = '<form action="Islem/avtomobil_markasi_islem.php" method="POST" name="AvtomobilMarkasiForm" enctype="multipart/form-data"';
	var markaadi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_markasi_ad_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="avtomobil_markasi_ad" name="avtomobil_markasi_ad" value="" required="" placeholder="Adı" oninput="AvtomobilMarkasiAdiYazildi(id)" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1"></div></div></div>';
	var markasekli = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="avtomobil_markasi_iconu_metni">Iconu <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="file" id="avtomobil_markasi_iconu" name="image"    class=""  tabindex="1"></div></div></div>';
	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"> <button type="button" class="YenileButonlari"  onClick="AvtomobilMarkasiFrmKontrol()" tabindex="5">Əlavə Et</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var meksed='<input type="hidden" name="Yeni">';
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + markaadi+markasekli+meksed+buttonalani + formbitis;
	document.getElementById("Modal").style.display = "block";
	document.getElementById("ModalAlani").style.display = "block";
}
/*  Yeni Bolmə əlavə et modalini acir*/

function AvtomobilMarkasiFrmKontrol(){
	if (document.getElementById("avtomobil_markasi_ad")) {
		if (document.getElementById("avtomobil_markasi_ad").value == "") {
			var avtomobil_markasi_ad = document.getElementById("avtomobil_markasi_ad");
			document.getElementById("avtomobil_markasi_ad_metni").style.color = "#ff0000";
			avtomobil_markasi_ad.style.outline = "none";
			avtomobil_markasi_ad.style.border = "2px solid #ff0000";
			avtomobil_markasi_ad.classList.add("pleysoldercolorqirmizi");
			avtomobil_markasi_ad.focus();
			return;
		}
		var avtomobil_markasi_ad = document.getElementById("avtomobil_markasi_ad").value
		var xhttp = new XMLHttpRequest();		
		xhttp.open("POST", "AnliqYenilenmeler/avtomobil_markasi_ad.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("avtomobil_markasi_ad=" + avtomobil_markasi_ad);
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var cavab=this.responseText.trim();
				if (cavab=="var") {
					var avtomobil_markasi_ad = document.getElementById("avtomobil_markasi_ad");
					document.getElementById("avtomobil_markasi_ad_metni").style.color = "#ff0000";
					avtomobil_markasi_ad.style.outline = "none";
					avtomobil_markasi_ad.style.border = "2px solid #ff0000";
					avtomobil_markasi_ad.classList.add("pleysoldercolorqirmizi");
					avtomobil_markasi_ad.focus();								
					return ;
				}else{
					document.AvtomobilMarkasiForm.submit();
				}
			}
		}		
	}

}




function AvtomobilMarkasiAdiYazildi(id){
	var element = document.getElementById(id);
	var icerikiiki=EMailKontrolEt(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		var avtomobil_markasi_ad = document.getElementById("avtomobil_markasi_ad").value
		var xhttp = new XMLHttpRequest();		
		xhttp.open("POST", "AnliqYenilenmeler/avtomobil_markasi_ad.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("avtomobil_markasi_ad=" + avtomobil_markasi_ad);
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var cavab=this.responseText.trim();
				if (cavab=="var") {
					var avtomobil_markasi_ad = document.getElementById("avtomobil_markasi_ad");
					document.getElementById(metinid).style.color = "#ff0000";
					avtomobil_markasi_ad.style.outline = "none";
					avtomobil_markasi_ad.style.border = "2px solid #ff0000";
					avtomobil_markasi_ad.classList.add("pleysoldercolorqirmizi");
					avtomobil_markasi_ad.focus();
					return;
				}else{
					document.getElementById(metinid).style.color = "#2A3F54";
					document.getElementById(id).style.color = "#2A3F54";
					document.getElementById(id).style.borderColor = "#2A3F54";
					document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
					element.classList.remove("pleysoldercolorqirmizi");
					return;
				}
			}
		}
	}
}


function Avtomobil_MarkasiDurumKontrol(ID) {
	var DurumID = ID.split("-");
	var avtomobil_markasi_durum = DurumID;
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "Islem/avtomobil_markasi_islem.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("avtomobil_markasi_durum=" + avtomobil_markasi_durum);
}
/*Admin İstifadəci əlavə et formunu yoxlayir*/
function IstifadeciFormKontrol() {
	if (document.getElementById("admin_soyad").value == "") {
		var admin_soyad = document.getElementById("admin_soyad");
		document.getElementById("admin_soyad_metni").style.color = "#ff0000";
		admin_soyad.style.outline = "none";
		admin_soyad.style.border = "2px solid #ff0000";
		admin_soyad.classList.add("pleysoldercolorqirmizi");
		admin_soyad.focus();
		return;
	}


	if (document.getElementById("admin_ad").value == "") {
		var admin_ad = document.getElementById("admin_ad");
		document.getElementById("admin_ad_metni").style.color = "#ff0000";
		admin_ad.style.outline = "none";
		admin_ad.style.border = "2px solid #ff0000";
		admin_ad.classList.add("pleysoldercolorqirmizi");
		admin_ad.focus();
		return;
	}

	if (document.getElementById("admin_ata_ad").value == "") {
		var admin_ata_ad = document.getElementById("admin_ata_ad");
		document.getElementById("admin_ata_ad_metni").style.color = "#ff0000";
		admin_ata_ad.style.outline = "none";
		admin_ata_ad.style.border = "2px solid #ff0000";
		admin_ata_ad.classList.add("pleysoldercolorqirmizi");
		admin_ata_ad.focus();
		return;
	}

	if (document.getElementById("admin_kimlik_nomir").value == "") {
		var admin_kimlik_nomir = document.getElementById("admin_kimlik_nomir");
		document.getElementById("admin_kimlik_nomir_metni").style.color = "#ff0000";
		admin_kimlik_nomir.style.outline = "none";
		admin_kimlik_nomir.style.border = "2px solid #ff0000";
		admin_kimlik_nomir.classList.add("pleysoldercolorqirmizi");
		admin_kimlik_nomir.focus();
		return;
	}

	if (document.getElementById("admin_fin").value == "") {
		var admin_fin = document.getElementById("admin_fin");
		document.getElementById("admin_fin_metni").style.color = "#ff0000";
		admin_fin.style.outline = "none";
		admin_fin.style.border = "2px solid #ff0000";
		admin_fin.classList.add("pleysoldercolorqirmizi");
		admin_fin.focus();
		return;
	}


	if (document.getElementById("admin_tel_bir").value == "") {
		var admin_tel_bir = document.getElementById("admin_tel_bir");
		document.getElementById("admin_tel_bir_metni").style.color = "#ff0000";
		admin_tel_bir.style.outline = "none";
		admin_tel_bir.style.border = "2px solid #ff0000";
		admin_tel_bir.classList.add("pleysoldercolorqirmizi");
		admin_tel_bir.focus();
		return;
	}

	if (document.getElementById("admin_mail").value == "") {
		var admin_mail = document.getElementById("admin_mail");
		document.getElementById("admin_mail_metni").style.color = "#ff0000";
		admin_mail.style.outline = "none";
		admin_mail.style.border = "2px solid #ff0000";
		admin_mail.classList.add("pleysoldercolorqirmizi");
		admin_mail.focus();
		return;
	}

	if(document.getElementById('kisi').checked || document.getElementById('qadin').checked) {		
	}else{		
		document.getElementById("cinsiyyetmetni").style.color = "#ff0000";
		return;
	}

	document.YeniIstifadeciFormu.submit();
}
/*Admin İstifadəci əlavə et formunu yoxlayir*/

/*Admin İstifadəci soyadı yazıldı*/
function AdminSoyadiYazildi(id) {	
	var element = document.getElementById(id);
	var icerik=HeriflerXarixButunKarakterleriSil(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById(metinid).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
		element.classList.remove("pleysoldercolorqirmizi");
		return;
	}
}
/*Admin İstifadəci soyadı yazıldı*/


/*Admin İstifadəci adı yazıldı*/
function AdminAdiYazildi(id) {
	var element = document.getElementById(id);
	var icerik=HeriflerXarixButunKarakterleriSil(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById(metinid).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
		element.classList.remove("pleysoldercolorqirmizi");
		return;
	}
}
/*Admin İstifadəci adı yazıldı*/


/*Admin İstifadəci ata adı yazıldı*/
function AdminAtaAdiYazildi(id) {
	var element = document.getElementById(id);
	var icerik=HeriflerXarixButunKarakterleriSil(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById(metinid).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
		element.classList.remove("pleysoldercolorqirmizi");
		return;
	}
}
/*Admin İstifadəci ata adı yazıldı*/



/*Admin İstifadəci ata adı yazıldı*/
function AdminSexsiyyetVesiqeseYazildi(id) {
	var element = document.getElementById(id);
	var icerikiiki=UluslararasiKodAlanlariIcinFiltrele(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById(metinid).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
		element.classList.remove("pleysoldercolorqirmizi");
		return;
	}
}
/*Admin İstifadəci ata adı yazıldı*/


/*Admin İstifadəci FİN kodu yazıldı*/
function FİNKodeYazildi(id) {
	var element = document.getElementById(id);
	var icerikiiki=UluslararasiKodAlanlariIcinFiltrele(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById(metinid).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
		element.classList.remove("pleysoldercolorqirmizi");
		return;
	}
}
/*Admin İstifadəci FİN kodu yazıldı*/

/*Admin İstifadəci Telefon Bir yazildi*/
function TelefonBirYazildi(id) {
	var element = document.getElementById(id);
	var icerikiiki=ReqemlerXaricButunKarakterleriSil(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById(metinid).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
		element.classList.remove("pleysoldercolorqirmizi");
		return;
	}
}
/*Admin İstifadəci Telefon Bir yazildi*/

/*Admin İstifadəci Telefon Bir yazildi*/
function AdminElaveEtEmailYazildi(id) {
	var element = document.getElementById(id);
	var icerikiiki=EMailKontrolEt(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		document.getElementById(metinid).style.color = "#2A3F54";
		document.getElementById(id).style.color = "#2A3F54";
		document.getElementById(id).style.borderColor = "#2A3F54";
		document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
		element.classList.remove("pleysoldercolorqirmizi");
		return;
	}
}
/*Admin İstifadəci Telefon Bir yazildi*/


/*Admin İstifadəci Cinsiyyeti Secildi*/
function AdminCinsiyyetSecildi() {
	if(document.getElementById('kisi').checked || document.getElementById('qadin').checked) {
		document.getElementById("cinsiyyetmetni").style.color = "#2A3F54";
		return;
	}else{		
		document.getElementById("cinsiyyetmetni").style.color = "#ff0000";
		return;
	}
}
/*Admin İstifadəci Cinsiyyeti Secildi*/




/* Katagorya durum kontrol*/
function AdminDurumKontrol(ID) {
	var DurumID = ID.split("-");
	var AdminDurum = DurumID;
	var AdminDurum_xhttp = new XMLHttpRequest();
	AdminDurum_xhttp.open("POST", "Islem/users_islem.php", true);
	AdminDurum_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	AdminDurum_xhttp.send("AdminDurum=" + AdminDurum);
}
/* Katagorya durum kontrol*/




/*  Yeni Bina Tipi əlavə et modalini acir*/
function YeniBinaTipi() {
	var formbaslaxic = '<form action="Islem/bina_tipi_islem.php" method="POST" name="BinaTipiIslemleriForm"  ';
	var elanmuellifiadi = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="binatipi_adi_metni">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="binatipi_adi" name="binatipi_adi" required="" placeholder="Adı"  oninput="BinaTipiAdiYazildi(id)" class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="1"></div></div></div>';
	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"> <button type="button" class="YenileButonlari" onClick="BinaTipiIslemleriFormKontrol()" tabindex="5">Əlavə Et</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var meksed='<input type="hidden" name="Yeni" value="Yeni">';
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + elanmuellifiadi+meksed+ buttonalani + formbitis;
	document.getElementById("Modal").style.display = "block";
	document.getElementById("ModalAlani").style.display = "block";
}
/*  Yeni Bina Tipi əlavə et modalini acir*/


function BinaTipiIslemleriFormKontrol(){
	if (document.getElementById("binatipi_adi")) {
		if (document.getElementById("binatipi_adi").value == "") {
			var binatipi_adi = document.getElementById("binatipi_adi");
			document.getElementById("binatipi_adi_metni").style.color = "#ff0000";
			binatipi_adi.style.outline = "none";
			binatipi_adi.style.border = "2px solid #ff0000";
			binatipi_adi.classList.add("pleysoldercolorqirmizi");
			binatipi_adi.focus();
			return;
		}
		var binatipi_adi = document.getElementById("binatipi_adi").value
		var binatipi_adi_xhttp = new XMLHttpRequest();		
		binatipi_adi_xhttp.open("POST", "AnliqYenilenmeler/binatipi_adi.php", true);
		binatipi_adi_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		binatipi_adi_xhttp.send("binatipi_adi=" + binatipi_adi);
		binatipi_adi_xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var cavab=this.responseText.trim();
				if (cavab=="var") {
					var binatipi_adi = document.getElementById("binatipi_adi");
					document.getElementById("binatipi_adi_metni").style.color = "#ff0000";
					binatipi_adi.style.outline = "none";
					binatipi_adi.style.border = "2px solid #ff0000";
					binatipi_adi.classList.add("pleysoldercolorqirmizi");
					binatipi_adi.focus();								
					return ;
				}else{
					document.BinaTipiIslemleriForm.submit();
				}
			}
		}		
	}

}




function BinaTipiAdiYazildi(id){
	var element = document.getElementById(id);
	var icerikiiki=EMailKontrolEt(id);
	var metinid=id+"_metni";
	if (element.value == "") {
		document.getElementById(metinid).style.color = "#ff0000";
		document.getElementById(id).style.color = "#ff0000";
		document.getElementById(id).style.borderColor = "#ff0000";
		document.getElementById(id).style.boxShadow = " 1px 0px 1px 0px #ff0000";
		element.classList.add("pleysoldercolorqirmizi");
		return;
	} else {
		var binatipi_adi = document.getElementById("binatipi_adi").value
		var binatipi_adi_xhttp = new XMLHttpRequest();		
		binatipi_adi_xhttp.open("POST", "AnliqYenilenmeler/binatipi_adi.php", true);
		binatipi_adi_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		binatipi_adi_xhttp.send("binatipi_adi=" + binatipi_adi);
		binatipi_adi_xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var cavab=this.responseText.trim();
				if (cavab=="var") {
					var binatipi_adi = document.getElementById("binatipi_adi");
					document.getElementById("binatipi_adi_metni").style.color = "#ff0000";
					binatipi_adi.style.outline = "none";
					binatipi_adi.style.border = "2px solid #ff0000";
					binatipi_adi.classList.add("pleysoldercolorqirmizi");
					binatipi_adi.focus();
					return;
				}else{
					document.getElementById(metinid).style.color = "#2A3F54";
					document.getElementById(id).style.color = "#2A3F54";
					document.getElementById(id).style.borderColor = "#2A3F54";
					document.getElementById(id).style.boxShadow = " 0px 0px 0px 0px #2A3F54";
					element.classList.remove("pleysoldercolorqirmizi");
					return;
				}
			}
		}
	}
}





