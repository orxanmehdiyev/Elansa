function ElanHaqqindaKontrol() {
	if (document.getElementById("karoqoriya_id")) {
		var karoqoriya_id = document.getElementById("karoqoriya_id");
		if (karoqoriya_id.value == "") {
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			document.getElementById("elan_katoqoriya_id_label").style.color = "#ff0000";
			document.getElementById("karoqoriya_id").style.color = "#ff0000";
			document.getElementById("karoqoriya_id").style.borderColor = "#ff0000";
			document.getElementById("karoqoriya_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			karoqoriya_id.focus();
			return;
		} else {

			document.getElementById("elan_katoqoriya_id_label").style.color = "#495057";
			document.getElementById("karoqoriya_id").style.color = "#495057";
			document.getElementById("karoqoriya_id").style.borderColor = "#ced4da";
			document.getElementById("karoqoriya_id").style.boxShadow = "1px 0px 1px 0px #ced4da";
		}
	}
	document.getElementById("avtoelanhaqqindamelumat").setAttribute("data-target", "#collapseTwo");
	document.getElementById("avtodetayozellikietrafli").setAttribute("data-target", "#collapseTwo");

}

function error(input) {
	if (input.value == "") {
		var deyer=input.id;
		if (document.querySelector('[for='+deyer+']')) {
			document.querySelector('[for='+deyer+']').style.color = "#ff0000";
		}
		input.style.outline = "none";
		input.style.border = "1px solid #ff0000";
		input.style.color = "#ff0000";
		input.focus();
		return;
	}
}













function ElanSekilKontrol() {
	if (document.getElementById("pro-image")) {
		if (document.getElementById("pro-image").files.length == 0) {
			document.getElementById("sekilsecimalani").style.backgroundColor = "red";
			document.getElementById("sekilsecimalani").style.borderColor = "#ff0000";
			document.getElementById("sekilsecimalani").style.boxShadow = " 2px #ff0000";
			document.getElementById("sekilsecimiucun").style.color = "#ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			document.getElementById("elansekilkon").removeAttribute("data-target");
			return;
		}
	}

}






function unvankontrol() {
	if (document.getElementById("dovlet_id")) {
		var dovlet_id = document.getElementById("dovlet_id");
		if (dovlet_id.value == "") {
			document.getElementById("UnvanYoxlanis").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			document.getElementById("dovlet_id_label").style.color = "#ff0000";
			document.getElementById("dovlet_id").style.color = "#ff0000";
			document.getElementById("dovlet_id").style.borderColor = "#ff0000";
			document.getElementById("dovlet_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			dovlet_id.focus();
			return;
		}
	}


	if (document.getElementById("seher_id")) {
		var seher_id = document.getElementById("seher_id");
		if (seher_id.value == "") {
			document.getElementById("UnvanYoxlanis").removeAttribute("data-target");
			document.getElementById("seher_id_label").style.color = "#ff0000";
			document.getElementById("seher_id").style.color = "#ff0000";
			document.getElementById("seher_id").style.borderColor = "#ff0000";
			document.getElementById("seher_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			seher_id.focus();
			return;
		}
	}

	if (document.getElementById("rayon_id")) {
		var rayon_id = document.getElementById("rayon_id");
		if (rayon_id.value == "") {
			document.getElementById("UnvanYoxlanis").removeAttribute("data-target");
			document.getElementById("rayon_id_label").style.color = "#ff0000";
			document.getElementById("rayon_id").style.color = "#ff0000";
			document.getElementById("rayon_id").style.borderColor = "#ff0000";
			document.getElementById("rayon_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			rayon_id.focus();
			return;
		}
	}


	if (document.getElementById("metro_id")) {
		var metro_id = document.getElementById("metro_id");
		if (metro_id.value == "") {
			document.getElementById("UnvanYoxlanis").removeAttribute("data-target");
			document.getElementById("metro_id_label").style.color = "#ff0000";
			document.getElementById("metro_id").style.color = "#ff0000";
			document.getElementById("metro_id").style.borderColor = "#ff0000";
			document.getElementById("metro_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			metro_id.focus();
			return;
		}
	}

	if (document.getElementById("nisangah_id")) {
		var nisangah_id = document.getElementById("nisangah_id");
		if (nisangah_id.value == "") {
			document.getElementById("UnvanYoxlanis").removeAttribute("data-target");
			document.getElementById("nisangah_id_label").style.color = "#ff0000";
			document.getElementById("nisangah_id").style.color = "#ff0000";
			document.getElementById("nisangah_id").style.borderColor = "#ff0000";
			document.getElementById("nisangah_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			nisangah_id.focus();
			return;
		}
	}
}



















function elanyerlesdirkontrol() {

	var KataqoriyaSecimKontrol = document.getElementById('elan_katoqoriya_id');
	if (KataqoriyaSecimKontrol.value == "") {
		document.getElementById('kataqoriyasecilmediid').style.display = 'block';
		document.getElementById('elan_katoqoriya_id_id').style.color = 'red';
		document.getElementById('elan_katoqoriya_id').style.color = 'red';
		document.getElementById("elan_katoqoriya_id").style.borderColor = "red";
		document.getElementById("elan_katoqoriya_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
		KataqoriyaSecimKontrol.focus();

		return;
	};



	/*Elan növü seçilmədi*/
	if (document.getElementById('yenisec')) {
		var yenihe = document.getElementById("yenihe").checked;
		var yeniyox = document.getElementById("yeniyox").checked;
		if ((yenihe == true) || (yeniyox == true)) {

		} else {
			document.getElementById('YeniVeYaKohnelikSecilmedi').style.display = 'block';
			document.getElementById('Yeni_label').style.color = '#ff0000';
			document.getElementById('yeniyox_label').style.color = '#ff0000';
			document.getElementById('yenihe_label').style.color = '#ff0000';


			document.getElementById('yenisec').focus();
			return;
		}
	}
	/*Elan növü seçilmədi*/




	/*Elan növü seçilmədi*/
	if (document.getElementById('elan_novu')) {
		var MenzilElanNovuSecimKontrol = document.getElementById('elan_novu');
		if (MenzilElanNovuSecimKontrol.value == "") {
			document.getElementById('elan_novu_secilmedi').style.display = 'block';
			document.getElementById('elan_novu_label').style.color = '#ff0000';
			document.getElementById('elan_novu').style.color = '#ff0000';
			document.getElementById("elan_novu").style.borderColor = "#ff0000";
			document.getElementById("elan_novu").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			MenzilElanNovuSecimKontrol.focus();
			return;
		}
	}
	/*Elan növü seçilmədi*/


	/*Mənzil Elanları üçün dövlət seçimi seçilmədi*/
	if (document.getElementById('menzil_dovlet_id')) {
		var MenzilVeziyyetiSecimKontrol = document.getElementById('menzil_dovlet_id');
		if (MenzilVeziyyetiSecimKontrol.value == "") {
			document.getElementById('DovletSecilmedi').style.display = 'block';
			document.getElementById('dovlet_id_label').style.color = '#ff0000';
			document.getElementById('menzil_dovlet_id').style.color = '#ff0000';
			document.getElementById("menzil_dovlet_id").style.borderColor = "#ff0000";
			document.getElementById("menzil_dovlet_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			MenzilVeziyyetiSecimKontrol.focus();
			return;
		}
	}
	/*Mənzil Elanları üçün dövlət seçimi seçilmədi*/


	/*Mənzil Elanları üçün şəhər seçilmədi*/
	if (document.getElementById('menzil_elan_seher_id')) {
		var SeherSecimKontrol = document.getElementById('menzil_elan_seher_id');
		if (SeherSecimKontrol.value == "") {
			document.getElementById('MenzilElanSeherSecilmedi').style.display = 'block';
			document.getElementById('Menizl_elan_SeherLabel').style.color = '#ff0000';
			document.getElementById('menzil_elan_seher_id').style.color = '#ff0000';
			document.getElementById("menzil_elan_seher_id").style.borderColor = "#ff0000";
			document.getElementById("menzil_elan_seher_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			SeherSecimKontrol.focus();
			return;
		}
	}
	/*Mənzil Elanları üçün şəhər seçilmədi*/


	/*Mənzil elanları üçün şəhər yazilmadi*/
	if (document.getElementById('MenzilElanlariUcunSeherYazilmadi')) {
		var AvtoYusrusKmKontrol = document.getElementById('MenzilElanlariUcunSeherYazilmadi');
		if (AvtoYusrusKmKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunSeherYazilmadiSecim').style.display = 'block';
			document.getElementById('MenzilElanlariUcunSeherYazilmadiLabel').style.color = '#ff0000';
			document.getElementById('MenzilElanlariUcunSeherYazilmadi').style.color = '#ff0000';
			var element = document.getElementById("MenzilElanlariUcunSeherYazilmadi");
			element.classList.add("pleysoldercolor");
			document.getElementById("MenzilElanlariUcunSeherYazilmadi").style.borderColor = "#ff0000";
			document.getElementById("MenzilElanlariUcunSeherYazilmadi").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			AvtoYusrusKmKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün şəhər yazilmadi*/





	/*Mənzil Elanları üçün rayon yazılmadı*/
	if (document.getElementById('menzil_elanlari_ucun_rayon_id')) {
		var AdYazildiKontrol = document.getElementById('menzil_elanlari_ucun_rayon_id');
		if (AdYazildiKontrol.value == "") {
			document.getElementById('MenzillerUcunRayonYazilmadiSecim').style.display = 'block';
			document.getElementById('menzil_elanlari_ucun_rayon_id_label').style.color = '#ff0000';
			document.getElementById('menzil_elanlari_ucun_rayon_id').style.color = '#ff0000';
			var element = document.getElementById("menzil_elanlari_ucun_rayon_id");
			element.classList.add("pleysoldercolor");
			document.getElementById("menzil_elanlari_ucun_rayon_id").style.borderColor = "#ff0000";
			document.getElementById("menzil_elanlari_ucun_rayon_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			AdYazildiKontrol.focus();
			return;
		}
	}
	/*Mənzil Elanları üçün rayon yazılmadı*/



	/*Mənzil Elanları üçün nisangah yazılmadı*/
	if (document.getElementById('menzil_elanlari_ucun_nisangah')) {
		var AdYazildiKontrol = document.getElementById('menzil_elanlari_ucun_nisangah');
		if (AdYazildiKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunNisangahSecilmedi').style.display = 'block';
			document.getElementById('menzil_elanlari_ucun_nisangah_label').style.color = '#ff0000';
			document.getElementById('menzil_elanlari_ucun_nisangah').style.color = '#ff0000';
			var element = document.getElementById("menzil_elanlari_ucun_nisangah");
			element.classList.add("pleysoldercolor");
			document.getElementById("menzil_elanlari_ucun_nisangah").style.borderColor = "#ff0000";
			document.getElementById("menzil_elanlari_ucun_nisangah").style.boxShadow = "1px 0px 1px 0px #ff0000";
			AdYazildiKontrol.focus();
			return;
		}
	}
	/*Mənzil Elanları üçün nisangah yazılmadı*/

	if (document.getElementById('elan_adi')) {
		var ElanAdiYazilmadiKontrol = document.getElementById('elan_adi');
		if (ElanAdiYazilmadiKontrol.value == "") {
			document.getElementById('ElanAdiYazilmadi').style.display = 'block';
			document.getElementById('elan_adilabel').style.color = '#ff0000';
			var element = document.getElementById("elan_adi");
			element.classList.add("pleysoldercolor");
			document.getElementById('elan_adi').style.color = '#ff0000';
			document.getElementById("elan_adi").style.borderColor = "#ff0000";
			document.getElementById("elan_adi").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			ElanAdiYazilmadiKontrol.focus();
			return;
		}
	}

	if (document.getElementById('elan_adiTelefon')) {
		var TelefonKontrol = document.getElementById('elan_adiTelefon');
		if (TelefonKontrol.value == "") {
			document.getElementById('ElanAdTelefonYazilmadi').style.display = 'block';
			document.getElementById('elan_adiTelefon_label').style.color = '#ff0000';
			document.getElementById('elan_adiTelefon').style.color = '#ff0000';
			var element = document.getElementById("elan_adiTelefon");
			element.classList.add("pleysoldercolor");
			document.getElementById("elan_adiTelefon").style.borderColor = "#ff0000";
			document.getElementById("elan_adiTelefon").style.boxShadow = "1px 0px 1px 0px #ff0000";
			TelefonKontrol.focus();
			return;
		}
	}

	/*Mənzil Elanları üçün metro yazılmadı*/
	if (document.getElementById('menzil_elanlari_ucun_metro_id')) {
		var AdYazildiKontrol = document.getElementById('menzil_elanlari_ucun_metro_id');
		if (AdYazildiKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunMetroSecim').style.display = 'block';
			document.getElementById('menzil_elanlari_ucun_metro_id_label').style.color = '#ff0000';
			document.getElementById('menzil_elanlari_ucun_metro_id').style.color = '#ff0000';
			var element = document.getElementById("menzil_elanlari_ucun_metro_id");
			element.classList.add("pleysoldercolor");
			document.getElementById("menzil_elanlari_ucun_metro_id").style.borderColor = "#ff0000";
			document.getElementById("menzil_elanlari_ucun_metro_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			AdYazildiKontrol.focus();
			return;
		}
	}
	/*Mənzil Elanları üçün metro yazılmadı*/






	if (document.getElementById('avto_marka')) {
		var AvtoMarkaSecimKontrol = document.getElementById('avto_marka');
		if (AvtoMarkaSecimKontrol.value == "") {
			document.getElementById('avtomarkasecilmediid').style.display = 'block';
			document.getElementById('avtomarkalabel').style.color = 'red';
			document.getElementById('avto_marka').style.color = 'red';
			document.getElementById("avto_marka").style.borderColor = "red";
			document.getElementById("avto_marka").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avto_marka").onmouseover = function () {
				this.style.borderColor = "red";
			}
			AvtoMarkaSecimKontrol.focus();
			return;
		}
	}





	if (document.getElementById('marka')) {
		var MarkaSecimKontrol = document.getElementById('marka');
		if (MarkaSecimKontrol.value == "") {
			document.getElementById('marka_secilmedi_id').style.display = 'block';
			document.getElementById('marka_label').style.color = 'red';
			document.getElementById('marka').style.color = 'red';
			document.getElementById("marka").style.borderColor = "red";
			document.getElementById("marka").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			MarkaSecimKontrol.focus();
			return;
		}
	}


	if (document.getElementById('prosessor')) {
		var ProsessorSecimKontrol = document.getElementById('prosessor');
		if (ProsessorSecimKontrol.value == "") {
			document.getElementById('prosessor_secilmedi_id').style.display = 'block';
			document.getElementById('prosessor_label').style.color = 'red';
			document.getElementById('prosessor').style.color = 'red';
			document.getElementById("prosessor").style.borderColor = "red";
			document.getElementById("prosessor").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			ProsessorSecimKontrol.focus();
			return;
		}
	}


	/*Elan növü seçilmədi*/
	if (document.getElementById('yenisec')) {
		var disk_ssd = document.getElementById("disk_ssd").checked;
		var disk_hdd = document.getElementById("disk_hdd").checked;
		if ((disk_ssd == true) || (disk_hdd == true)) {
		} else {
			document.getElementById('DiskSecilmedi').style.display = 'block';
			document.getElementById('disk_ssd_label').style.color = '#ff0000';
			document.getElementById('disk_hdd_label').style.color = '#ff0000';
			document.getElementById('disk_label').style.color = '#ff0000';
			document.getElementById('disk_label').focus();
			return;
		}
	}
	/*Elan növü seçilmədi*/


	if (document.getElementById('yaddas')) {
		var YaddasKontrol = document.getElementById('yaddas');
		if (YaddasKontrol.value == "") {
			document.getElementById('YaddasYazilmadi').style.display = 'block';
			document.getElementById('yaddas_label').style.color = '#ff0000';
			document.getElementById('yaddas').style.color = '#ff0000';
			document.getElementById("yaddas").style.borderColor = "#ff0000";
			document.getElementById("yaddas").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			var element = document.getElementById("yaddas");
			element.classList.add("pleysoldercolor");
			YaddasKontrol.focus();
			return;
		}
	}

	if (document.getElementById('operativyaddas_id')) {
		var OperativyaddasSecimKontrol = document.getElementById('operativyaddas_id');
		if (OperativyaddasSecimKontrol.value == "") {
			document.getElementById('OperativyaddasSecilmedi').style.display = 'block';
			document.getElementById('operativyaddas_id_label').style.color = 'red';
			document.getElementById('operativyaddas_id').style.color = 'red';
			document.getElementById("operativyaddas_id").style.borderColor = "red";
			document.getElementById("operativyaddas_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("operativyaddas_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			OperativyaddasSecimKontrol.focus();
			return;
		}
	}




	if (document.getElementById('display_duyum_id')) {
		var OperativyaddasSecimKontrol = document.getElementById('display_duyum_id');
		if (OperativyaddasSecimKontrol.value == "") {
			document.getElementById('DisplayDuyumSecilmedi').style.display = 'block';
			document.getElementById('display_duyum_id_label').style.color = 'red';
			document.getElementById('display_duyum_id').style.color = 'red';
			document.getElementById("display_duyum_id").style.borderColor = "red";
			document.getElementById("display_duyum_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("display_duyum_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			OperativyaddasSecimKontrol.focus();
			return;
		}
	}





	if (document.getElementById('malin_novu')) {
		var AvtoModelSecimKontrol = document.getElementById('malin_novu');
		if (AvtoModelSecimKontrol.value == "") {
			document.getElementById('malin_novusecilmedi').style.display = 'block';
			document.getElementById('malin_novulabel').style.color = 'red';
			document.getElementById('malin_novu').style.color = 'red';
			document.getElementById("malin_novu").style.borderColor = "red";
			document.getElementById("malin_novu").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			AvtoModelSecimKontrol.focus();
			return;
		}
	}






	if (document.getElementById('avto_otrucu_id')) {
		var AvtoOtrucuSecimkontrol = document.getElementById('avto_otrucu_id');
		if (AvtoOtrucuSecimkontrol.value == "") {
			document.getElementById('AvtoOtrucuSecilmedi').style.display = 'block';
			document.getElementById('avtootruculabel').style.color = '#ff0000';
			document.getElementById('avto_otrucu_id').style.color = '#ff0000';
			document.getElementById("avto_otrucu_id").style.borderColor = "#ff0000";
			document.getElementById("avto_otrucu_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			AvtoOtrucuSecimkontrol.focus();
			return;
		}
	}













	if (document.getElementById('reng_ad')) {
		var AutoRengKontrol = document.getElementById('reng_ad');
		if (AutoRengKontrol.value == "") {
			document.getElementById('AvtoRəngSecilmedi').style.display = 'block';
			document.getElementById('AutoRengLabel').style.color = '#ff0000';
			document.getElementById('reng_ad').style.color = '#ff0000';
			document.getElementById("reng_ad").style.borderColor = "#ff0000";
			document.getElementById("reng_ad").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			AutoRengKontrol.focus();
			return;
		}
	}

	if (document.getElementById('video_kart_id')) {
		var Kontrol = document.getElementById('video_kart_id');
		if (Kontrol.value == "") {
			document.getElementById('video_kart_Secilmedi').style.display = 'block';
			document.getElementById('video_kart_id_label').style.color = '#ff0000';
			document.getElementById('video_kart_id').style.color = '#ff0000';
			document.getElementById("video_kart_id").style.borderColor = "#ff0000";
			document.getElementById("video_kart_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			Kontrol.focus();
			return;
		}
	}



	if (document.getElementById('avto_muherrikin_hecmi')) {
		var Avtomuherrikhecmisecilmedikontrol = document.getElementById('avto_muherrikin_hecmi');
		if (Avtomuherrikhecmisecilmedikontrol.value == "") {
			document.getElementById('MuherrikHecmiYazilmadi').style.display = 'block';
			document.getElementById('AutouherrikHecmiLabel').style.color = '#ff0000';
			document.getElementById('avto_muherrikin_hecmi').style.color = '#ff0000';
			document.getElementById("avto_muherrikin_hecmi").style.borderColor = "#ff0000";
			document.getElementById("avto_muherrikin_hecmi").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			Avtomuherrikhecmisecilmedikontrol.focus();
			return;
		}
	}






	if (document.getElementById('muherrikin_at_gucu')) {
		var AvtMuherrikinGucuKontrol = document.getElementById('muherrikin_at_gucu');
		if (AvtMuherrikinGucuKontrol.value == "") {
			document.getElementById('MuherrikinAtGucuYazilmadi').style.display = 'block';
			document.getElementById('AutoMuherrikGucuLabel').style.color = '#ff0000';
			document.getElementById('muherrikin_at_gucu').style.color = '#ff0000';
			document.getElementById("muherrikin_at_gucu").style.borderColor = "#ff0000";
			document.getElementById("muherrikin_at_gucu").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			AvtMuherrikinGucuKontrol.focus();
			return;
		}
	}





	if (document.getElementById('emlakin_novu')) {
		var MenzilEmlakNovuSecimKontrol = document.getElementById('emlakin_novu');
		if (MenzilEmlakNovuSecimKontrol.value == "") {
			document.getElementById('Emlaknovusecilmedi').style.display = 'block';
			document.getElementById('emlakin_novulabel').style.color = '#ff0000';
			document.getElementById('emlakin_novu').style.color = '#ff0000';
			document.getElementById("emlakin_novu").style.borderColor = "#ff0000";
			document.getElementById("emlakin_novu").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			MenzilEmlakNovuSecimKontrol.focus();
			return;
		}
	}


	/*Mənzil elanları üçün ünvan yazilmadi*/
	if (document.getElementById('mənzil_elanları_ucun_unvan_id')) {
		var AvtoYusrusKmKontrol = document.getElementById('mənzil_elanları_ucun_unvan_id');
		if (AvtoYusrusKmKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunUnvanYazilmadi').style.display = 'block';
			document.getElementById('mənzil_elanları_ucun_unvan_id_label').style.color = '#ff0000';
			document.getElementById('mənzil_elanları_ucun_unvan_id').style.color = '#ff0000';
			var element = document.getElementById("mənzil_elanları_ucun_unvan_id");
			element.classList.add("pleysoldercolor");
			document.getElementById("mənzil_elanları_ucun_unvan_id").style.borderColor = "#ff0000";
			document.getElementById("mənzil_elanları_ucun_unvan_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			AvtoYusrusKmKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün ünvan yazilmadi*/




	/*Mənzil elanları üçün binanin tipi yazilmadi*/
	if (document.getElementById('menzil_binanin_tipi')) {
		var MenzilBinaTipiSecimKontrol = document.getElementById('menzil_binanin_tipi');
		if (MenzilBinaTipiSecimKontrol.value == "") {
			document.getElementById('MenzilBinaTipiSecilmedi').style.display = 'block';
			document.getElementById('MenzilBinaTipiLabel').style.color = '#ff0000';
			document.getElementById('menzil_binanin_tipi').style.color = '#ff0000';
			document.getElementById("menzil_binanin_tipi").style.borderColor = "#ff0000";
			document.getElementById("menzil_binanin_tipi").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			MenzilBinaTipiSecimKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün binanin tipi yazilmadi*/



	/*Mənzil elanları üçün əmlakın vəziyyəti secilmedi*/
	if (document.getElementById('menzil_elanlari_ucun_emlak_veziyyeti_id')) {
		var MenzilBinaTipiSecimKontrol = document.getElementById('menzil_elanlari_ucun_emlak_veziyyeti_id');
		if (MenzilBinaTipiSecimKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunEmlakVeziyyetiSecilmedi').style.display = 'block';
			document.getElementById('menzil_elanlari_ucun_emlak_veziyyeti_id_label').style.color = '#ff0000';
			document.getElementById('menzil_elanlari_ucun_emlak_veziyyeti_id').style.color = '#ff0000';
			document.getElementById("menzil_elanlari_ucun_emlak_veziyyeti_id").style.borderColor = "#ff0000";
			document.getElementById("menzil_elanlari_ucun_emlak_veziyyeti_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			MenzilBinaTipiSecimKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün əmlakın vəziyyəti secilmedi*/

	/*Mənzil elanları üçün bina mərtəbəsi sayı secilmədi*/
	if (document.getElementById('Menzil_elanlari_ucun_Bina_metrebe_id')) {
		var BinaMertebeSayiKontrol = document.getElementById('Menzil_elanlari_ucun_Bina_metrebe_id');
		if (BinaMertebeSayiKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunBinaMertebesiSecilmedi').style.display = 'block';
			document.getElementById('Menzil_elanlari_ucun_Bina_metrebe_Label').style.color = '#ff0000';
			document.getElementById('Menzil_elanlari_ucun_Bina_metrebe_id').style.color = '#ff0000';
			document.getElementById("Menzil_elanlari_ucun_Bina_metrebe_id").style.borderColor = "#ff0000";
			document.getElementById("Menzil_elanlari_ucun_Bina_metrebe_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			BinaMertebeSayiKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün bina mərtəbəsi sayı secilmədi*/


	/*Villa Elanlari ucun villanin mertebe sayi secilmedi*/
	if (document.getElementById('villa_elanlari_ucun_mertebe_sayi')) {
		var ElanVerenSecimKontrol = document.getElementById('villa_elanlari_ucun_mertebe_sayi');
		if (ElanVerenSecimKontrol.value == "") {
			document.getElementById('VillaElanlariUcunMetrtebeSayiSecilmedi').style.display = 'block';
			document.getElementById('villa_elanlari_ucun_mertebe_sayi_label').style.color = '#ff0000';
			document.getElementById('villa_elanlari_ucun_mertebe_sayi').style.color = '#ff0000';
			document.getElementById("villa_elanlari_ucun_mertebe_sayi").style.borderColor = "#ff0000";
			document.getElementById("villa_elanlari_ucun_mertebe_sayi").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			ElanVerenSecimKontrol.focus();
			return;
		}
	}
	/*Villa Elanlari ucun villanin mertebe sayi secilmedi*/




	/*Mənzil elanları üçün mənzilin yerləşdiyi mərtəbə secilmədi*/
	if (document.getElementById('Menzil_Elanlari_Ucun_Yerlesdiyi_Mertebe_id')) {
		var YerlesdiyiMertebeKontrol = document.getElementById('Menzil_Elanlari_Ucun_Yerlesdiyi_Mertebe_id');
		if (YerlesdiyiMertebeKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunYerlesdiyiMertebeSecilmedi').style.display = 'block';
			document.getElementById('Menzil_Elanlari_Ucun_Yerlesdiyi_Mertebe_Label').style.color = '#ff0000';
			document.getElementById('Menzil_Elanlari_Ucun_Yerlesdiyi_Mertebe_id').style.color = '#ff0000';
			document.getElementById("Menzil_Elanlari_Ucun_Yerlesdiyi_Mertebe_id").style.borderColor = "#ff0000";
			document.getElementById("Menzil_Elanlari_Ucun_Yerlesdiyi_Mertebe_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			YerlesdiyiMertebeKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün mənzilin yerləşdiyi mərtəbə secilmədi*/



	/*Mənzil elanları üçün mənzilin yerləşdiyi blok secilmedi*/
	if (document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Yerlesdiyi_Blok_İd')) {
		var YerlesdiyiBlokKontrol = document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Yerlesdiyi_Blok_İd');
		if (YerlesdiyiBlokKontrol.value == "") {
			document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Yerlesdiyi_Blok_Secilmedi').style.display = 'block';
			document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Yerlesdiyi_Blok_Label').style.color = '#ff0000';
			document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Yerlesdiyi_Blok_İd').style.color = '#ff0000';
			document.getElementById("Menzil_Elanlari_Ucun_Menzilin_Yerlesdiyi_Blok_İd").style.borderColor = "#ff0000";
			document.getElementById("Menzil_Elanlari_Ucun_Menzilin_Yerlesdiyi_Blok_İd").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			YerlesdiyiBlokKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün mənzilin yerləşdiyi blok secilmedi*/


	/*Mənzil elanları üçün mənzilin otaq sayı secilmedi*/
	if (document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Otaq_Sayi_İd')) {
		var OtaqSayiniSecimKontrol = document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Otaq_Sayi_İd');
		if (OtaqSayiniSecimKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunMenzilinOtaqSayiSecilmedi').style.display = 'block';
			document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Otaq_Sayi_Label').style.color = '#ff0000';
			document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Otaq_Sayi_İd').style.color = '#ff0000';
			document.getElementById("Menzil_Elanlari_Ucun_Menzilin_Otaq_Sayi_İd").style.borderColor = "#ff0000";
			document.getElementById("Menzil_Elanlari_Ucun_Menzilin_Otaq_Sayi_İd").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			OtaqSayiniSecimKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün mənzilin otaq sayı secilmedi*/



	/*Mənzil elanları üçün mənzilin ümumi sahəsi*/
	if (document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Umumi_Sahesi_Id')) {
		var UmumiSahesiKonturol = document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Umumi_Sahesi_Id');
		if (UmumiSahesiKonturol.value == "") {
			document.getElementById('MenzilElanlariUcunMenzilinUmumiSahesiYazilmadi').style.display = 'block';
			document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Umumi_Sahesi_Label').style.color = '#ff0000';
			var element = document.getElementById("Menzil_Elanlari_Ucun_Menzilin_Umumi_Sahesi_Id");
			element.classList.add("pleysoldercolor");
			document.getElementById('Menzil_Elanlari_Ucun_Menzilin_Umumi_Sahesi_Id').style.color = '#ff0000';
			document.getElementById("Menzil_Elanlari_Ucun_Menzilin_Umumi_Sahesi_Id").style.borderColor = "#ff0000";
			document.getElementById("Menzil_Elanlari_Ucun_Menzilin_Umumi_Sahesi_Id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			UmumiSahesiKonturol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün mənzilin ümumi sahəsi*/



	/*Mənzil elanları üçün mənzilin ümumi sahəsi*/
	if (document.getElementById('Villa_Elanlari_Ucun_Torbaq_Sahesi_id')) {
		var UmumiSahesiKonturol = document.getElementById('Villa_Elanlari_Ucun_Torbaq_Sahesi_id');
		if (UmumiSahesiKonturol.value == "") {
			document.getElementById('VillaElanlariUcunTorpaqSahesiYazilmadi').style.display = 'block';
			document.getElementById('Villa_Elanlari_Ucun_Torbaq_Sahesi_Label').style.color = '#ff0000';
			var element = document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id");
			element.classList.add("pleysoldercolor");
			document.getElementById('Villa_Elanlari_Ucun_Torbaq_Sahesi_id').style.color = '#ff0000';
			document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id").style.borderColor = "#ff0000";
			document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			UmumiSahesiKonturol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün mənzilin ümumi sahəsi*/






	/*Mənzil elanları üçün əmlak sənədi secilmedi*/
	if (document.getElementById('Menzil_Elanlari_Ucun_Emlak_Senedi_id')) {
		var OtaqSayiniSecimKontrol = document.getElementById('Menzil_Elanlari_Ucun_Emlak_Senedi_id');
		if (OtaqSayiniSecimKontrol.value == "") {
			document.getElementById('MenzilEmlakSenediSecilmedi').style.display = 'block';
			document.getElementById('Menzil_Elanlari_Ucun_Emlak_Senedi_Label').style.color = '#ff0000';
			document.getElementById('Menzil_Elanlari_Ucun_Emlak_Senedi_id').style.color = '#ff0000';
			document.getElementById("Menzil_Elanlari_Ucun_Emlak_Senedi_id").style.borderColor = "#ff0000";
			document.getElementById("Menzil_Elanlari_Ucun_Emlak_Senedi_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			OtaqSayiniSecimKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün əmlak sənədi secilmedi*/




	/*Mənzil elanları üçün Proyekt secilmedi*/
	if (document.getElementById('Menzil_Elanlari_Ucun_Proyekt_Id')) {
		var MenzilElanlariUcunProyektSecilmedi = document.getElementById('Menzil_Elanlari_Ucun_Proyekt_Id');
		if (MenzilElanlariUcunProyektSecilmedi.value == "") {
			document.getElementById('MenzilElanlariUcunProyektSecilmedi').style.display = 'block';
			document.getElementById('Menzil_Elanlari_Ucun_Proyekt_Label').style.color = '#ff0000';
			document.getElementById('Menzil_Elanlari_Ucun_Proyekt_Id').style.color = '#ff0000';
			document.getElementById("Menzil_Elanlari_Ucun_Proyekt_Id").style.borderColor = "#ff0000";
			document.getElementById("Menzil_Elanlari_Ucun_Proyekt_Id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			MenzilElanlariUcunProyektSecilmedi.focus();
			return;
		}
	}
	/*Mənzil elanları üçün Proyekt secilmedi*/

	/*Mənzil elanları üçün qiymet yazilmadi*/
	if (document.getElementById('MenzilElanlariUcunQiymetId')) {
		var QiymetKontrol = document.getElementById('MenzilElanlariUcunQiymetId');
		if (QiymetKontrol.value == "") {
			document.getElementById('MenzilElanlariUcunQiymetYazilmadi').style.display = 'block';
			document.getElementById('MenzilElanlariUcunQiymetLabel').style.color = '#ff0000';
			document.getElementById('MenzilElanlariUcunQiymetId').style.color = '#ff0000';
			var element = document.getElementById("MenzilElanlariUcunQiymetId");
			element.classList.add("pleysoldercolor");
			document.getElementById("MenzilElanlariUcunQiymetId").style.borderColor = "#ff0000";
			document.getElementById("MenzilElanlariUcunQiymetId").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			QiymetKontrol.focus();
			return;
		}
	}
	/*Mənzil elanları üçün qiymet yazilmadi*/















	if (document.getElementById('avtooniconinput')) {
		var SekilSecKontrol = document.getElementById('avtooniconinput');
		if (SekilSecKontrol.value == "") {
			document.getElementById("avtoonicon").style.borderColor = "#ff0000";
			var output = document.getElementById('avtoonicon');
			output.src = "admins/baza/img/sekilsecilmedi.png";
			SekilSecKontrol.focus();
			return;
		}
	}



	/*Əlaqədar şəxs secilmedi*/
	if (document.getElementById('elan_veren')) {
		var YerlesdiyiBlokKontrol = document.getElementById('elan_veren');
		if (YerlesdiyiBlokKontrol.value == "") {
			document.getElementById('elanverensecilmedi').style.display = 'block';
			document.getElementById('elan_verenlabel').style.color = '#ff0000';
			document.getElementById('elan_veren').style.color = '#ff0000';
			document.getElementById("elan_veren").style.borderColor = "#ff0000";
			document.getElementById("elan_veren").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			YerlesdiyiBlokKontrol.focus();
			return;
		}
	}
	/*Əlaqədar şəxs secilmedi*/


































































	if (document.getElementById('ad')) {
		var AdYazildiKontrol = document.getElementById('ad');
		if (AdYazildiKontrol.value == "") {
			document.getElementById('AdYazilmadi').style.display = 'block';
			document.getElementById('AdIdLabel').style.color = '#ff0000';
			document.getElementById('ad').style.color = '#ff0000';
			var element = document.getElementById("ad");
			element.classList.add("pleysoldercolor");
			document.getElementById("ad").style.borderColor = "#ff0000";
			document.getElementById("ad").style.boxShadow = "1px 0px 1px 0px #ff0000";
			AdYazildiKontrol.focus();
			return;
		}
	}

	if (document.getElementById('soyad')) {
		var SoyadKontrol = document.getElementById('soyad');
		if (SoyadKontrol.value == "") {
			document.getElementById('SoyAdYazilmadi').style.display = 'block';
			document.getElementById('SoyadIdLabel').style.color = '#ff0000';
			document.getElementById('soyad').style.color = '#ff0000';
			var element = document.getElementById("soyad");
			element.classList.add("pleysoldercolor");
			document.getElementById("soyad").style.borderColor = "#ff0000";
			document.getElementById("soyad").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SoyadKontrol.focus();
			return;
		}
	}

	if (document.getElementById('telefon_bir')) {
		var TelefonKontrol = document.getElementById('telefon_bir');
		if (TelefonKontrol.value == "") {
			document.getElementById('TelefonYazilmadi').style.display = 'block';
			document.getElementById('TelefonBirId').style.color = '#ff0000';
			document.getElementById('telefon_bir').style.color = '#ff0000';
			var element = document.getElementById("telefon_bir");
			element.classList.add("pleysoldercolor");
			document.getElementById("telefon_bir").style.borderColor = "#ff0000";
			document.getElementById("telefon_bir").style.boxShadow = "1px 0px 1px 0px #ff0000";
			TelefonKontrol.focus();
			return;
		}
	}


	if (document.getElementById('email')) {
		var EmailKontrol = document.getElementById('email');
		if (EmailKontrol.value == "") {
			document.getElementById('EmailYazilmadi').style.display = 'block';
			document.getElementById('EmailIdLabel').style.color = '#ff0000';
			document.getElementById('email').style.color = '#ff0000';
			var element = document.getElementById("email");
			element.classList.add("pleysoldercolor");
			document.getElementById("email").style.borderColor = "#ff0000";
			document.getElementById("email").style.boxShadow = "1px 0px 1px 0px #ff0000";
			EmailKontrol.focus();
			return;
		}
	}

	if (document.getElementById('email')) {
		var EmailFormatKontrol = document.getElementById('email');
		if (EmailFormatKontrol.value !== "") {
			var EmailFormati = document.getElementById("email").value;
			var EmailFormatiKontrol = EMailKontrolEt(EmailFormati);
			if (EmailFormatiKontrol == false) {
				document.getElementById('EmailDuzgunYazilmadi').style.display = 'block';
				document.getElementById('EmailIdLabel').style.color = '#ff0000';
				document.getElementById('email').style.color = '#ff0000';
				var element = document.getElementById("email");
				element.classList.add("pleysoldercolor");
				document.getElementById("email").style.borderColor = "#ff0000";
				document.getElementById("email").style.boxShadow = "1px 0px 1px 0px #ff0000";
				EmailFormatKontrol.focus();
				return;
			}
		}
	}


	if (document.getElementById('qaydalarioxudum')) {
		var QaydalariOxudumKontrol = document.getElementById('qaydalarioxudum');
		if (QaydalariOxudumKontrol.checked == true) {
			document.getElementById('elenayuklenirmodali').style.display = 'block';
		} else {
			console.log(QaydalariOxudumKontrol.value);
			document.getElementById('qaydalarioxudum_label').style.color = '#ff0000';
			document.getElementById('qaydalarioxudum').style.color = '#ff0000';
			document.getElementById("qaydalarioxudum").style.borderColor = "#ff0000";
			document.getElementById("qaydalarioxudum").style.boxShadow = "1px 0px 1px 0px #ff0000";
			QaydalariOxudumKontrol.focus();
			return;
		}


	}





}



function sifreunutdumkontrol() {
	if (document.getElementById('email')) {
		var EmailKontrol = document.getElementById('email');
		if (EmailKontrol.value == "") {
			document.getElementById('EmailYazilmadi').style.display = 'block';
			document.getElementById('EmailIdLabel').style.color = '#ff0000';
			document.getElementById('email').style.color = '#ff0000';
			var element = document.getElementById("email");
			element.classList.add("pleysoldercolor");
			document.getElementById("email").style.borderColor = "#ff0000";
			document.getElementById("email").style.boxShadow = "1px 0px 1px 0px #ff0000";
			EmailKontrol.focus();
			return;
		}
	}

	if (document.getElementById('email')) {
		var EmailFormatKontrol = document.getElementById('email');
		if (EmailFormatKontrol.value !== "") {
			var EmailFormati = document.getElementById("email").value;
			var EmailFormatiKontrol = EMailKontrolEt(EmailFormati);
			if (EmailFormatiKontrol == false) {
				document.getElementById('EmailDuzgunYazilmadi').style.display = 'block';
				document.getElementById('EmailIdLabel').style.color = '#ff0000';
				document.getElementById('email').style.color = '#ff0000';
				var element = document.getElementById("email");
				element.classList.add("pleysoldercolor");
				document.getElementById("email").style.borderColor = "#ff0000";
				document.getElementById("email").style.boxShadow = "1px 0px 1px 0px #ff0000";
				EmailFormatKontrol.focus();
				return;
			}
		}
	}
}


function QeydiyyatFormGonderKontrol() {
	if (document.getElementById('User_Ad')) {
		var SoyadKontrol = document.getElementById('User_Ad');
		if (SoyadKontrol.value == "") {
			document.getElementById('UserAdYazilmadi').style.display = 'block';
			document.getElementById('User_AdLabel').style.color = '#ff0000';
			document.getElementById('User_Ad').style.color = '#ff0000';
			var element = document.getElementById("User_Ad");
			element.classList.add("pleysoldercolor");
			document.getElementById("User_Ad").style.borderColor = "#ff0000";
			document.getElementById("User_Ad").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SoyadKontrol.focus();
			return;
		}
	}


	if (document.getElementById('User_Soyad')) {
		var SoyadKontrol = document.getElementById('User_Soyad');
		if (SoyadKontrol.value == "") {
			document.getElementById('UserSoyAdYazilmadi').style.display = 'block';
			document.getElementById('User_SoyadLabel').style.color = '#ff0000';
			document.getElementById('User_Soyad').style.color = '#ff0000';
			var element = document.getElementById("User_Soyad");
			element.classList.add("pleysoldercolor");
			document.getElementById("User_Soyad").style.borderColor = "#ff0000";
			document.getElementById("User_Soyad").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SoyadKontrol.focus();
			return;
		}
	}



	if (document.getElementById('User_TelefonBir')) {
		var TelefonKontrol = document.getElementById('User_TelefonBir');
		if (TelefonKontrol.value == "") {
			document.getElementById('TelefonYazilmadi').style.display = 'block';
			document.getElementById('User_TelefonBirLabel').style.color = '#ff0000';
			document.getElementById('User_TelefonBir').style.color = '#ff0000';
			var element = document.getElementById("User_TelefonBir");
			element.classList.add("pleysoldercolor");
			document.getElementById("User_TelefonBir").style.borderColor = "#ff0000";
			document.getElementById("User_TelefonBir").style.boxShadow = "1px 0px 1px 0px #ff0000";
			TelefonKontrol.focus();
			return;
		}
	}



	if (document.getElementById("qeydiyyatcins")) {
		var YeniKohneKontrol = document.getElementsByName("user_cinsiyyet");
		if ((YeniKohneKontrol[0].checked == false) && (YeniKohneKontrol[1].checked == false)) {
			x = document.getElementsByClassName("kisiqadinklass");
			x[0].style.color = '#ff0000';
			x[1].style.color = '#ff0000';
			document.getElementById('kisiqadinsecilmedi').style.display = 'block';
			document.getElementById('kisiqadinlabelid').style.color = '#ff0000';
			x[0].focus();
			return;
		}
	};



	if (document.getElementById('User_Email')) {
		var EmailKontrol = document.getElementById('User_Email');
		if (EmailKontrol.value == "") {
			document.getElementById('User_EmailYazilmadi').style.display = 'block';
			document.getElementById('User_EmailLabel').style.color = '#ff0000';
			document.getElementById('User_Email').style.color = '#ff0000';
			var element = document.getElementById("User_Email");
			element.classList.add("pleysoldercolor");
			document.getElementById("User_Email").style.borderColor = "#ff0000";
			document.getElementById("User_Email").style.boxShadow = "1px 0px 1px 0px #ff0000";
			EmailKontrol.focus();
			return;
		}
	}


	if (document.getElementById('sifre_bir')) {
		var SifreBirKontrol = document.getElementById('sifre_bir');
		var SifreBirKontrols = SifreAlanlariniFiltirle(SifreBirKontrol);

		if (SifreBirKontrol.value == "") {
			document.getElementById('sifre_biryazilmadi').style.display = 'block';
			document.getElementById('sifre_birlabel').style.color = '#ff0000';
			document.getElementById('sifre_bir').style.color = '#ff0000';
			var element = document.getElementById("sifre_bir");
			element.classList.add("pleysoldercolor");
			document.getElementById("sifre_bir").style.borderColor = "#ff0000";
			document.getElementById("sifre_bir").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SifreBirKontrol.focus();
			return;
		}
	}

	if (document.getElementById('sifre_iki')) {
		var SifreIkiKontrol = document.getElementById('sifre_iki');
		var SifreIkiKontrols = SifreAlanlariniFiltirle(SifreIkiKontrol);
		if (SifreIkiKontrol.value == "") {
			document.getElementById('sifreikiyazilmadi').style.display = 'block';
			document.getElementById('sifre_ikilabel').style.color = '#ff0000';
			document.getElementById('sifre_iki').style.color = '#ff0000';
			var element = document.getElementById("sifre_iki");
			element.classList.add("pleysoldercolor");
			document.getElementById("sifre_iki").style.borderColor = "#ff0000";
			document.getElementById("sifre_iki").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SifreIkiKontrol.focus();
			return;
		}
	}
	var SifreIkiKontrols = document.getElementById('sifre_iki').value;
	var SifreBirKontrols = document.getElementById('sifre_bir').value;

	if (SifreIkiKontrols !== SifreBirKontrols) {
		document.getElementById('sifre_ikieynideyil').style.display = 'block';
		document.getElementById('sifre_bireynideyil').style.display = 'block';
		document.getElementById('sifre_ikilabel').style.color = '#ff0000';
		document.getElementById('sifre_iki').style.color = '#ff0000';
		var element = document.getElementById("sifre_iki");
		element.classList.add("pleysoldercolor");
		document.getElementById("sifre_iki").style.borderColor = "#ff0000";
		document.getElementById("sifre_iki").style.boxShadow = "1px 0px 1px 0px #ff0000";
		document.getElementById('sifre_birlabel').style.color = '#ff0000';
		document.getElementById('sifre_bir').style.color = '#ff0000';
		var element = document.getElementById("sifre_bir");
		element.classList.add("pleysoldercolor");
		document.getElementById("sifre_bir").style.borderColor = "#ff0000";
		document.getElementById("sifre_bir").style.boxShadow = "1px 0px 1px 0px #ff0000";
		document.getElementById("Qeydiyyatbutton").setAttribute("disabled", "disabled");
		return;
	}
}





function emailtesdiqkodyoxla() {
	if (document.getElementById('User_Email_Tesdiq_Kod')) {
		var EmailTesdiqKod = document.getElementById('User_Email_Tesdiq_Kod');
		if (EmailTesdiqKod.value == "") {
			document.getElementById('koduyaz').style.display = 'block';
			document.getElementById("emailtesdiklebutton").setAttribute("disabled", "disabled");
			EmailTesdiqKod.focus();
			return;
		}
	}
}



function elansikayetkontrol() {
	if (document.getElementById('elansikayet_email')) {
		var EmailKontrol = document.getElementById('elansikayet_email');
		if (EmailKontrol.value == "") {
			document.getElementById('elansikayet_emaillabel').style.color = '#ff0000';
			document.getElementById('elansikayet_email').style.color = '#ff0000';
			var element = document.getElementById("elansikayet_email");
			element.classList.add("pleysoldercolor");
			document.getElementById("elansikayet_email").style.borderColor = "#ff0000";
			document.getElementById("elansikayet_email").style.boxShadow = "1px 0px 1px 0px #ff0000";
			EmailKontrol.focus();
			return;
		}
	}
	if (document.getElementById('sikayettextareyaid')) {
		var MezmunKontrol = document.getElementById('sikayettextareyaid');
		if (MezmunKontrol.value == "") {
			document.getElementById('sikayettextareyaidlabel').style.color = '#ff0000';
			document.getElementById('sikayettextareyaid').style.color = '#ff0000';
			document.getElementById("sikayettextareyaid").style.borderColor = "#ff0000";
			document.getElementById("sikayettextareyaid").style.boxShadow = "1px 0px 1px 0px #ff0000";
			MezmunKontrol.focus();
			return;
		}
	}
}





function PinUnutdumModalKontrol() {
	if (document.getElementById('pin_unutdum_email')) {
		var EmailKontrol = document.getElementById('pin_unutdum_email');
		if (EmailKontrol.value == "") {
			document.getElementById('pin_unutdum_email_label').style.color = '#ff0000';
			document.getElementById('pin_unutdum_email').style.color = '#ff0000';
			var element = document.getElementById("pin_unutdum_email");
			element.classList.add("pleysoldercolor");
			document.getElementById("pin_unutdum_email").style.borderColor = "#ff0000";
			document.getElementById("pin_unutdum_email").style.boxShadow = "1px 0px 1px 0px #ff0000";
			EmailKontrol.focus();
			return;
		}
	}

}















function UserMelumatYenile() {
	if (document.getElementById('User_Ad')) {
		var SoyadKontrol = document.getElementById('User_Ad');
		if (SoyadKontrol.value == "") {
			document.getElementById('UserAdYazilmadi').style.display = 'block';
			document.getElementById('User_AdLabel').style.color = '#ff0000';
			document.getElementById('User_Ad').style.color = '#ff0000';
			var element = document.getElementById("User_Ad");
			element.classList.add("pleysoldercolor");
			document.getElementById("User_Ad").style.borderColor = "#ff0000";
			document.getElementById("User_Ad").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SoyadKontrol.focus();
			return;
		}
	}


	if (document.getElementById('User_Soyad')) {
		var SoyadKontrol = document.getElementById('User_Soyad');
		if (SoyadKontrol.value == "") {
			document.getElementById('UserSoyAdYazilmadi').style.display = 'block';
			document.getElementById('User_SoyadLabel').style.color = '#ff0000';
			document.getElementById('User_Soyad').style.color = '#ff0000';
			var element = document.getElementById("User_Soyad");
			element.classList.add("pleysoldercolor");
			document.getElementById("User_Soyad").style.borderColor = "#ff0000";
			document.getElementById("User_Soyad").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SoyadKontrol.focus();
			return;
		}
	}



	if (document.getElementById('User_TelefonBir')) {
		var TelefonKontrol = document.getElementById('User_TelefonBir');
		if (TelefonKontrol.value == "") {
			document.getElementById('TelefonYazilmadi').style.display = 'block';
			document.getElementById('User_TelefonBirLabel').style.color = '#ff0000';
			document.getElementById('User_TelefonBir').style.color = '#ff0000';
			var element = document.getElementById("User_TelefonBir");
			element.classList.add("pleysoldercolor");
			document.getElementById("User_TelefonBir").style.borderColor = "#ff0000";
			document.getElementById("User_TelefonBir").style.boxShadow = "1px 0px 1px 0px #ff0000";
			TelefonKontrol.focus();
			return;
		}
	}



	if (document.getElementById("qeydiyyatcins")) {
		var YeniKohneKontrol = document.getElementsByName("user_cinsiyyet");
		if ((YeniKohneKontrol[0].checked == false) && (YeniKohneKontrol[1].checked == false)) {
			x = document.getElementsByClassName("kisiqadinklass");
			x[0].style.color = '#ff0000';
			x[1].style.color = '#ff0000';
			document.getElementById('kisiqadinsecilmedi').style.display = 'block';
			document.getElementById('kisiqadinlabelid').style.color = '#ff0000';
			x[0].focus();
			return;
		}
	};



	if (document.getElementById('User_Email')) {
		var EmailKontrol = document.getElementById('User_Email');
		if (EmailKontrol.value == "") {
			document.getElementById('User_EmailYazilmadi').style.display = 'block';
			document.getElementById('User_EmailLabel').style.color = '#ff0000';
			document.getElementById('User_Email').style.color = '#ff0000';
			var element = document.getElementById("User_Email");
			element.classList.add("pleysoldercolor");
			document.getElementById("User_Email").style.borderColor = "#ff0000";
			document.getElementById("User_Email").style.boxShadow = "1px 0px 1px 0px #ff0000";
			EmailKontrol.focus();
			return;
		}
	}


	if (document.getElementById('sifre_bir')) {
		var SifreBirKontrol = document.getElementById('sifre_bir');
		var SifreBirKontrols = SifreAlanlariniFiltirle(SifreBirKontrol);

		if (SifreBirKontrol.value == "") {
			document.getElementById('sifre_biryazilmadi').style.display = 'block';
			document.getElementById('sifre_birlabel').style.color = '#ff0000';
			document.getElementById('sifre_bir').style.color = '#ff0000';
			var element = document.getElementById("sifre_bir");
			element.classList.add("pleysoldercolor");
			document.getElementById("sifre_bir").style.borderColor = "#ff0000";
			document.getElementById("sifre_bir").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SifreBirKontrol.focus();
			return;
		}
	}

	if (document.getElementById('sifre_iki')) {
		var SifreIkiKontrol = document.getElementById('sifre_iki');
		var SifreIkiKontrols = SifreAlanlariniFiltirle(SifreIkiKontrol);
		if (SifreIkiKontrol.value == "") {
			document.getElementById('sifreikiyazilmadi').style.display = 'block';
			document.getElementById('sifre_ikilabel').style.color = '#ff0000';
			document.getElementById('sifre_iki').style.color = '#ff0000';
			var element = document.getElementById("sifre_iki");
			element.classList.add("pleysoldercolor");
			document.getElementById("sifre_iki").style.borderColor = "#ff0000";
			document.getElementById("sifre_iki").style.boxShadow = "1px 0px 1px 0px #ff0000";
			SifreIkiKontrol.focus();
			return;
		}
	}
	var SifreIkiKontrols = document.getElementById('sifre_iki').value;
	var SifreBirKontrols = document.getElementById('sifre_bir').value;

	if (SifreIkiKontrols !== SifreBirKontrols) {
		document.getElementById('sifre_ikieynideyil').style.display = 'block';
		document.getElementById('sifre_bireynideyil').style.display = 'block';
		document.getElementById('sifre_ikilabel').style.color = '#ff0000';
		document.getElementById('sifre_iki').style.color = '#ff0000';
		var element = document.getElementById("sifre_iki");
		element.classList.add("pleysoldercolor");
		document.getElementById("sifre_iki").style.borderColor = "#ff0000";
		document.getElementById("sifre_iki").style.boxShadow = "1px 0px 1px 0px #ff0000";
		document.getElementById('sifre_birlabel').style.color = '#ff0000';
		document.getElementById('sifre_bir').style.color = '#ff0000';
		var element = document.getElementById("sifre_bir");
		element.classList.add("pleysoldercolor");
		document.getElementById("sifre_bir").style.borderColor = "#ff0000";
		document.getElementById("sifre_bir").style.boxShadow = "1px 0px 1px 0px #ff0000";
		document.getElementById("Qeydiyyatbutton").setAttribute("disabled", "disabled");
		return;
	}
}




