function SeherFormIslemleriKontrol() {
	if (document.getElementById("dovlet_id_sec")) {
		if (document.getElementById("dovlet_id_sec").value == "") {
			var dovlet_id_sec = document.getElementById("dovlet_id_sec");
			document.getElementById("dovlet_id_sec_metni").style.color = "#ff0000";
			dovlet_id_sec.style.outline = "none";
			dovlet_id_sec.style.border = "2px solid #ff0000";
			dovlet_id_sec.style.color = "#ff0000";
			return;
		}
	}

	if (document.getElementById("seher_ad")) {
		if (document.getElementById("seher_ad").value == "") {
			var seher_ad = document.getElementById("seher_ad");
			document.getElementById("seher_ad_metin").style.color = "#ff0000";
			seher_ad.style.outline = "none";
			seher_ad.style.border = "2px solid #ff0000";
			seher_ad.classList.add("pleysoldercolorqirmizi");
			return;
		}
	}

	if (document.getElementById("seher_beynelxalq_adi")) {
		if (document.getElementById("seher_beynelxalq_adi").value == "") {
			var seher_beynelxalq_adi = document.getElementById("seher_beynelxalq_adi");
			document.getElementById("seher_beynelxalq_adi_metin").style.color = "#ff0000";
			seher_beynelxalq_adi.style.outline = "none";
			seher_beynelxalq_adi.style.border = "2px solid #ff0000";
			seher_beynelxalq_adi.classList.add("pleysoldercolorqirmizi");
			return;
		}
	}
	document.SeherIslemleriFormu.submit();
}



function SeherIslemleriUcunDOvletSecildi() {
	document.getElementById("dovlet_id_sec_metni").style.color = "#2A3F54";
	document.getElementById("dovlet_id_sec").style.color = "#2A3F54";
	document.getElementById("dovlet_id_sec").style.borderColor = "#2A3F54";
	document.getElementById("dovlet_id_sec").style.border = "1px solid #2A3F54";
}





function SeherIslemleriUcunSeherAdiYazildi() {
	if (document.getElementById("seher_ad")) {
		var seher_ad = document.getElementById("seher_ad");
		if (seher_ad.value == "") {
			document.getElementById("seher_ad_metin").style.color = "#ff0000";
			document.getElementById("seher_ad").style.color = "#ff0000";
			document.getElementById("seher_ad").style.borderColor = "#ff0000";
			document.getElementById("seher_ad").style.boxShadow = "1px 0px 1px 0px #ff0000";
			seher_ad.classList.add("pleysoldercolorqirmizi");
			return;
		} else {
			document.getElementById("seher_ad_metin").style.color = "#2A3F54";
			document.getElementById("seher_ad").style.color = "#2A3F54";
			document.getElementById("seher_ad").style.borderColor = "#2A3F54";
			document.getElementById("seher_ad").style.boxShadow = "0px 0px 0px 0px #2A3F54";
			seher_ad.classList.remove("pleysoldercolorqirmizi");
			var dovlet_telefon_kod_yoxla = seher_ad.value;
			var YoxlanisNeticesi = dovlet_telefon_kod_yoxla.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə]/g, "");
			seher_ad.value = YoxlanisNeticesi;
			return;
		}
	}
}






function SeherIslemleriUcunBeynelxalqAdiYazildi() {
	if (document.getElementById("seher_beynelxalq_adi")) {
		var seher_beynelxalq_adi = document.getElementById("seher_beynelxalq_adi");
		if (seher_beynelxalq_adi.value == "") {
			document.getElementById("seher_beynelxalq_adi_metin").style.color = "#ff0000";
			document.getElementById("seher_beynelxalq_adi").style.color = "#ff0000";
			document.getElementById("seher_beynelxalq_adi").style.borderColor = "#ff0000";
			document.getElementById("seher_beynelxalq_adi").style.boxShadow = "1px 0px 1px 0px #ff0000";
			seher_beynelxalq_adi.classList.add("pleysoldercolorqirmizi");
			return;
		} else {
			document.getElementById("seher_beynelxalq_adi_metin").style.color = "#2A3F54";
			document.getElementById("seher_beynelxalq_adi").style.color = "#2A3F54";
			document.getElementById("seher_beynelxalq_adi").style.borderColor = "#2A3F54";
			document.getElementById("seher_beynelxalq_adi").style.boxShadow = "0px 0px 0px 0px #2A3F54";
			seher_beynelxalq_adi.classList.remove("pleysoldercolorqirmizi");
			var dovlet_telefon_kod_yoxla = seher_beynelxalq_adi.value;
			var YoxlanisNeticesi = dovlet_telefon_kod_yoxla.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə]/g, "");
			seher_beynelxalq_adi.value = YoxlanisNeticesi;
			return;
		}
	}
}




function SeherDurumKontrol(ID) {
	var DurumID = ID.split("-");
	var seher_durum_id = DurumID;
	var seher_durum_id_xhttp = new XMLHttpRequest();
	seher_durum_id_xhttp.open("POST", "Islem/seher_islem.php", true);
	seher_durum_id_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	seher_durum_id_xhttp.send("seher_durum_id=" + seher_durum_id);
	seher_durum_id_xhttp.onreadystatechange = function () {
	}
}



function YeniSeher() {
	var formbaslaxic = '<form action="Islem/seher_islem.php" method="POST" name="SeherIslemleriFormu" ';
	var x = document.getElementById("YeniSeherElaveEtUcunDovlet").innerHTML;
	var dovletinputalani = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="dovlet_id_sec_metni">Dövlət <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi" id="SeherElaniUcunDovlet"><select name="dovlet_id_sec" tabindex="2" required="required"  id="dovlet_id_sec" class="FormAlanlariUcunSelectInputlari" onchange="SeherIslemleriUcunDOvletSecildi(this.value)">' +
	x + '</select></div></div></div>';
	var seheradinputualani = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="seher_ad_metin">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="seher_ad" name="seher_ad" value="" placeholder="Adı" onfocusout="SeherIslemleriUcunSeherAdiYazildi()" oninput="SeherIslemleriUcunSeherAdiYazildi()" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="2" ></div></div></div>';
	var seherbeynelxalqadinmutalani = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="seher_beynelxalq_adi_metin">Beynəlxalq Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="seher_beynelxalq_adi" name="seher_beynelxalq_adi" value="" placeholder="Adı" onfocusout="SeherIslemleriUcunBeynelxalqAdiYazildi()" oninput="SeherIslemleriUcunBeynelxalqAdiYazildi()" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="2" ></div></div></div>'
var meksed = '<input type="hidden" id="YeniSeher" name="YeniSeher" ';
	var buttonalani = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi"><button type="button" class="YenileButonlari" name="YeniSeher" onClick="SeherFormIslemleriKontrol()" tabindex="5">Əlavə Et</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>'
	var formbitis = '</form>';
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + dovletinputalani + seheradinputualani+meksed + seherbeynelxalqadinmutalani + buttonalani + formbitis;
	document.getElementById("Modal").style.display = "block";
	document.getElementById("ModalAlani").style.display = "block";
}



function SeherlerYenile(id) {
	var formbaslaxic = '<form action="Islem/seher_islem.php" method="POST"  name="SeherIslemleriFormu" ';
	var modalicerik = '<div class="SeyfeIciSetirAlaniKapsayici">' +
	' <div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">' +
	'<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="dovlet_id_sec_metni">Dövlət <span class="KirmiziYazi">*</span></div>' +
	'<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">' +
	'<select name="dovlet_id_sec" tabindex="2" required="required"  id="dovlet_id_sec" class="FormAlanlariUcunSelectInputlari" onchange="SeherIslemleriUcunDOvletSecildi(this.value)">' +
	' <option disabled="disabled" value=""  selected="selected"> Secin...</option>' +
	'</select>' +
	'</div>' +
	'</div>' +
	'</div>';
	var modalicerikiki = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="seher_ad_metin">Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="seher_ad" name="seher_ad" placeholder="Adı" onfocusout="SeherIslemleriUcunSeherAdiYazildi()" oninput="SeherIslemleriUcunSeherAdiYazildi()" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="2" ></div></div></div>';
	var seherbeynelxalqadinmutalani = '<div class="SeyfeIciSetirAlaniKapsayici"><div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan"><div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici" id="seher_beynelxalq_adi_metin">Beynəlxalq Adı <span class="KirmiziYazi">*</span></div><div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi"><input type="text" id="seher_beynelxalq_adi" name="seher_beynelxalq_adi" value="" placeholder="Adı" onfocusout="SeherIslemleriUcunBeynelxalqAdiYazildi()" oninput="SeherIslemleriUcunBeynelxalqAdiYazildi()" required=""  class="FormAlanlariUcunTextInputlari" maxlength="100" tabindex="2" ></div></div></div>'
	var meksed = '<input type="hidden" id="yenile" name="yenile" ';
	var modalicerikgizliinput = '<input type="hidden" id="seher_id" name="seher_id"';
	var butonlar = '<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">' +
	'<button type="button" class="YenileButonlari"  name="yenile" onClick="SeherFormIslemleriKontrol()" tabindex="5">Yenilə</button>' +
	'<button type="button" class="QirmiziButonlar"  onClick="Bagla();" tabindex="6" >İmtina Et</button>' +
	'</div>';
	var formbitis = '</form>'
	document.getElementById("modalformalaniici").innerHTML = formbaslaxic + modalicerik + meksed+modalicerikiki + seherbeynelxalqadinmutalani + modalicerikgizliinput + butonlar + formbitis;
	document.getElementById('seher_id').setAttribute("value", id);
	var seher_ad = "seher_ad-" + id;
	var x = document.getElementById(seher_ad).innerHTML;
	document.getElementById('seher_ad').setAttribute("value", x);
	var seher_beynelxalq_adi = "seher_ad_beynelxalq-" + id;
	var y = document.getElementById(seher_beynelxalq_adi).innerHTML;
	document.getElementById('seher_beynelxalq_adi').setAttribute("value", y);
	var dovlet_id = "dovlet-" + id;
	var e = document.getElementById(dovlet_id).value;
	var DovletTelebEt = new XMLHttpRequest();
	DovletTelebEt.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("dovlet_id_sec").innerHTML = " ";
			document.getElementById("dovlet_id_sec").innerHTML = this.responseText;
			document.getElementById("Modal").style.display = "block";
			document.getElementById("ModalAlani").style.display = "block";
		}
	};
	DovletTelebEt.open("GET", "AnliqYenilenmeler/SeherYenilenmesiDovletTelebEt.php?Dovlet_Id=" + e, true);
	DovletTelebEt.send();
}



function SeherlerListelemeLimiti(Deyer) {
	var seher_siralama = Deyer
	var seher_siralama_xhttp = new XMLHttpRequest();
	seher_siralama_xhttp.open("POST", "Islem/seher_islem.php", true);
	seher_siralama_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	seher_siralama_xhttp.send("seher_siralama=" + seher_siralama);
	seher_siralama_xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			window.location.reload()
		}
	}
}