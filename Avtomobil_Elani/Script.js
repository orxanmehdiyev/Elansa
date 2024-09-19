function AvtomobilElanBirinciBolmeKontrol() {
	var EtrafliMelumatDivi		=	document.getElementById("elanetraflimelumat");
	var ElanDetayDivi		      =	document.getElementById("elandedeydivi");
	var SekilYukleDivi		    =	document.getElementById("sekilyukledivi");
	var UnavanDivi		        =	document.getElementById("unvandivi");
	var ElaqeMelumatlariDivi	=	document.getElementById("elaqemelumatlari");
	if(EtrafliMelumatDivi.style.display === "none"){
		EtrafliMelumatDivi.style.display		=	"block";
		ElanDetayDivi.style.display		=	"none";	
		SekilYukleDivi.style.display		=	"none";	
		UnavanDivi.style.display		=	"none";	
		ElaqeMelumatlariDivi.style.display		=	"none";	
	}else{
		EtrafliMelumatDivi.style.display		=	"none";		
	}
}


function AvtomobilBirinciBolmeDavam() {
	var EtrafliMelumatDivi		=	document.getElementById("elanetraflimelumat");
	var ElanDetayDivi		      =	document.getElementById("elandedeydivi");
	var SekilYukleDivi		    =	document.getElementById("sekilyukledivi");
	var UnavanDivi		        =	document.getElementById("unvandivi");
	var ElaqeMelumatlariDivi	=	document.getElementById("elaqemelumatlari");
	if (document.getElementById("avtomobil_markasi_id")) {
		var avtomobil_markasi_id = document.getElementById("avtomobil_markasi_id");
		if(avtomobil_markasi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_markasi_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_model_id")) {
		var avtomobil_model_id = document.getElementById("avtomobil_model_id");
		if(avtomobil_model_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_model_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_ban_novu_id")) {
		var avtomobil_ban_novu_id = document.getElementById("avtomobil_ban_novu_id");
		if(avtomobil_ban_novu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_ban_novu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_veziyyeti_id")) {
		var avtomobil_veziyyeti_id = document.getElementById("avtomobil_veziyyeti_id");
		if(avtomobil_veziyyeti_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_veziyyeti_id);
			return;
		}
	}


	if (document.getElementById("avtomobil_yurus_km_id")) {
		var avtomobil_yurus_km_id = document.getElementById("avtomobil_yurus_km_id");
		if(avtomobil_yurus_km_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yurus_km_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_buraxilis_ili_id")) {
		var avtomobil_buraxilis_ili_id = document.getElementById("avtomobil_buraxilis_ili_id");
		if(avtomobil_buraxilis_ili_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_buraxilis_ili_id);
			return;
		}
	}

	if (document.getElementById("avto_suret_qutusu_id")) {
		var avto_suret_qutusu_id = document.getElementById("avto_suret_qutusu_id");
		if(avto_suret_qutusu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_suret_qutusu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_yanacaq_id")) {
		var avtomobil_yanacaq_id = document.getElementById("avtomobil_yanacaq_id");
		if(avtomobil_yanacaq_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yanacaq_id);
			return;
		}
	}

	if (document.getElementById("avto_muherrikin_hecmi")) {
		var avto_muherrikin_hecmi = document.getElementById("avto_muherrikin_hecmi");
		if(avto_muherrikin_hecmi.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_muherrikin_hecmi);
			return;
		}
	}

	if (document.getElementById("muherrikin_at_gucu_id")) {
		var muherrikin_at_gucu_id = document.getElementById("muherrikin_at_gucu_id");
		if(muherrikin_at_gucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(muherrikin_at_gucu_id);
			return;
		}
	}

	if (document.getElementById("avto_otrucu_id")) {
		var avto_otrucu_id = document.getElementById("avto_otrucu_id");
		if(avto_otrucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_otrucu_id);
			return;
		}
	}


	if (document.getElementById("reng_ad")) {
		var reng_ad = document.getElementById("reng_ad");
		if(reng_ad.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(reng_ad);
			return;
		}
	}


	if (document.getElementById("qiymet_id")) {
		var qiymet_id = document.getElementById("qiymet_id");
		if(qiymet_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(qiymet_id);
			return;
		}
	}

	if (document.getElementById("pul_novu")) {
		var pul_novu = document.getElementById("pul_novu");
		if(pul_novu.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(pul_novu);
			return;
		}
	}

	if (document.getElementById("elan_muellifi_id")) {
		var elan_muellifi_id = document.getElementById("elan_muellifi_id");
		if(elan_muellifi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(elan_muellifi_id);
			return;
		}
	}
	
	var EtrafliMelumatDivi		=	document.getElementById("elanetraflimelumat");
	var ElanDetayDivi		      =	document.getElementById("elandedeydivi");
	var SekilYukleDivi		    =	document.getElementById("sekilyukledivi");
	var UnavanDivi		        =	document.getElementById("unvandivi");
	var ElaqeMelumatlariDivi	=	document.getElementById("elaqemelumatlari");
	EtrafliMelumatDivi.style.display		=	"none";	
	ElanDetayDivi.style.display		=	"block";
	SekilYukleDivi.style.display		=	"none";	
	UnavanDivi.style.display		=	"none";	
	ElaqeMelumatlariDivi.style.display		=	"none";
}


function AvtomobilIkinciBolmeDavam(){	
	var EtrafliMelumatDivi		=	document.getElementById("elanetraflimelumat");
	var ElanDetayDivi		      =	document.getElementById("elandedeydivi");
	var SekilYukleDivi		    =	document.getElementById("sekilyukledivi");
	var UnavanDivi		        =	document.getElementById("unvandivi");
	var ElaqeMelumatlariDivi	=	document.getElementById("elaqemelumatlari");
	if (document.getElementById("avtomobil_markasi_id")) {
		var avtomobil_markasi_id = document.getElementById("avtomobil_markasi_id");
		if(avtomobil_markasi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_markasi_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_model_id")) {
		var avtomobil_model_id = document.getElementById("avtomobil_model_id");
		if(avtomobil_model_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_model_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_ban_novu_id")) {
		var avtomobil_ban_novu_id = document.getElementById("avtomobil_ban_novu_id");
		if(avtomobil_ban_novu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_ban_novu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_veziyyeti_id")) {
		var avtomobil_veziyyeti_id = document.getElementById("avtomobil_veziyyeti_id");
		if(avtomobil_veziyyeti_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_veziyyeti_id);
			return;
		}
	}


	if (document.getElementById("avtomobil_yurus_km_id")) {
		var avtomobil_yurus_km_id = document.getElementById("avtomobil_yurus_km_id");
		if(avtomobil_yurus_km_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yurus_km_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_buraxilis_ili_id")) {
		var avtomobil_buraxilis_ili_id = document.getElementById("avtomobil_buraxilis_ili_id");
		if(avtomobil_buraxilis_ili_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_buraxilis_ili_id);
			return;
		}
	}

	if (document.getElementById("avto_suret_qutusu_id")) {
		var avto_suret_qutusu_id = document.getElementById("avto_suret_qutusu_id");
		if(avto_suret_qutusu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_suret_qutusu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_yanacaq_id")) {
		var avtomobil_yanacaq_id = document.getElementById("avtomobil_yanacaq_id");
		if(avtomobil_yanacaq_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yanacaq_id);
			return;
		}
	}

	if (document.getElementById("avto_muherrikin_hecmi")) {
		var avto_muherrikin_hecmi = document.getElementById("avto_muherrikin_hecmi");
		if(avto_muherrikin_hecmi.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_muherrikin_hecmi);
			return;
		}
	}

	if (document.getElementById("muherrikin_at_gucu_id")) {
		var muherrikin_at_gucu_id = document.getElementById("muherrikin_at_gucu_id");
		if(muherrikin_at_gucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(muherrikin_at_gucu_id);
			return;
		}
	}

	if (document.getElementById("avto_otrucu_id")) {
		var avto_otrucu_id = document.getElementById("avto_otrucu_id");
		if(avto_otrucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_otrucu_id);
			return;
		}
	}


	if (document.getElementById("reng_ad")) {
		var reng_ad = document.getElementById("reng_ad");
		if(reng_ad.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(reng_ad);
			return;
		}
	}


	if (document.getElementById("qiymet_id")) {
		var qiymet_id = document.getElementById("qiymet_id");
		if(qiymet_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(qiymet_id);
			return;
		}
	}

	if (document.getElementById("pul_novu")) {
		var pul_novu = document.getElementById("pul_novu");
		if(pul_novu.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(pul_novu);
			return;
		}
	}

	if (document.getElementById("elan_muellifi_id")) {
		var elan_muellifi_id = document.getElementById("elan_muellifi_id");
		if(elan_muellifi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(elan_muellifi_id);
			return;
		}
	}
	
	var EtrafliMelumatDivi		=	document.getElementById("elanetraflimelumat");
	var ElanDetayDivi		      =	document.getElementById("elandedeydivi");
	var SekilYukleDivi		    =	document.getElementById("sekilyukledivi");
	var UnavanDivi		        =	document.getElementById("unvandivi");
	var ElaqeMelumatlariDivi	=	document.getElementById("elaqemelumatlari");
	EtrafliMelumatDivi.style.display		=	"none";	
	ElanDetayDivi.style.display		=	"none";
	SekilYukleDivi.style.display		=	"block";	
	UnavanDivi.style.display		=	"none";	
	ElaqeMelumatlariDivi.style.display		=	"none";

}



function AvtomobilUcuncuBolmeDavam(){
	var EtrafliMelumatDivi		=	document.getElementById("elanetraflimelumat");
	var ElanDetayDivi		      =	document.getElementById("elandedeydivi");
	var SekilYukleDivi		    =	document.getElementById("sekilyukledivi");
	var UnavanDivi		        =	document.getElementById("unvandivi");
	var ElaqeMelumatlariDivi	=	document.getElementById("elaqemelumatlari");
	if (document.getElementById("avtomobil_markasi_id")) {
		var avtomobil_markasi_id = document.getElementById("avtomobil_markasi_id");
		if(avtomobil_markasi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_markasi_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_model_id")) {
		var avtomobil_model_id = document.getElementById("avtomobil_model_id");
		if(avtomobil_model_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_model_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_ban_novu_id")) {
		var avtomobil_ban_novu_id = document.getElementById("avtomobil_ban_novu_id");
		if(avtomobil_ban_novu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_ban_novu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_veziyyeti_id")) {
		var avtomobil_veziyyeti_id = document.getElementById("avtomobil_veziyyeti_id");
		if(avtomobil_veziyyeti_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_veziyyeti_id);
			return;
		}
	}


	if (document.getElementById("avtomobil_yurus_km_id")) {
		var avtomobil_yurus_km_id = document.getElementById("avtomobil_yurus_km_id");
		if(avtomobil_yurus_km_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yurus_km_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_buraxilis_ili_id")) {
		var avtomobil_buraxilis_ili_id = document.getElementById("avtomobil_buraxilis_ili_id");
		if(avtomobil_buraxilis_ili_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_buraxilis_ili_id);
			return;
		}
	}

	if (document.getElementById("avto_suret_qutusu_id")) {
		var avto_suret_qutusu_id = document.getElementById("avto_suret_qutusu_id");
		if(avto_suret_qutusu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_suret_qutusu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_yanacaq_id")) {
		var avtomobil_yanacaq_id = document.getElementById("avtomobil_yanacaq_id");
		if(avtomobil_yanacaq_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yanacaq_id);
			return;
		}
	}

	if (document.getElementById("avto_muherrikin_hecmi")) {
		var avto_muherrikin_hecmi = document.getElementById("avto_muherrikin_hecmi");
		if(avto_muherrikin_hecmi.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_muherrikin_hecmi);
			return;
		}
	}

	if (document.getElementById("muherrikin_at_gucu_id")) {
		var muherrikin_at_gucu_id = document.getElementById("muherrikin_at_gucu_id");
		if(muherrikin_at_gucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(muherrikin_at_gucu_id);
			return;
		}
	}

	if (document.getElementById("avto_otrucu_id")) {
		var avto_otrucu_id = document.getElementById("avto_otrucu_id");
		if(avto_otrucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_otrucu_id);
			return;
		}
	}


	if (document.getElementById("reng_ad")) {
		var reng_ad = document.getElementById("reng_ad");
		if(reng_ad.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(reng_ad);
			return;
		}
	}


	if (document.getElementById("qiymet_id")) {
		var qiymet_id = document.getElementById("qiymet_id");
		if(qiymet_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(qiymet_id);
			return;
		}
	}

	if (document.getElementById("pul_novu")) {
		var pul_novu = document.getElementById("pul_novu");
		if(pul_novu.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(pul_novu);
			return;
		}
	}

	if (document.getElementById("elan_muellifi_id")) {
		var elan_muellifi_id = document.getElementById("elan_muellifi_id");
		if(elan_muellifi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(elan_muellifi_id);
			return;
		}
	}

	if (document.getElementById("pro-image")) {
		if (document.getElementById("pro-image").files.length == 0) {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"block";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			document.getElementById("sekilalani").style.backgroundColor = "red";
			document.getElementById("sekilalani").style.borderColor = "#ff0000";
			document.getElementById("sekilalani").style.boxShadow = " 2px #ff0000";			
			return;
		}
	}

	EtrafliMelumatDivi.style.display		=	"none";	
	ElanDetayDivi.style.display		=	"none";
	SekilYukleDivi.style.display		=	"none";	
	UnavanDivi.style.display		=	"block";	
	ElaqeMelumatlariDivi.style.display		=	"none";
}


function AvtomobilDorduncuBolmeDavam(){
	var EtrafliMelumatDivi		=	document.getElementById("elanetraflimelumat");
	var ElanDetayDivi		      =	document.getElementById("elandedeydivi");
	var SekilYukleDivi		    =	document.getElementById("sekilyukledivi");
	var UnavanDivi		        =	document.getElementById("unvandivi");
	var ElaqeMelumatlariDivi	=	document.getElementById("elaqemelumatlari");
	if (document.getElementById("avtomobil_markasi_id")) {
		var avtomobil_markasi_id = document.getElementById("avtomobil_markasi_id");
		if(avtomobil_markasi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_markasi_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_model_id")) {
		var avtomobil_model_id = document.getElementById("avtomobil_model_id");
		if(avtomobil_model_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_model_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_ban_novu_id")) {
		var avtomobil_ban_novu_id = document.getElementById("avtomobil_ban_novu_id");
		if(avtomobil_ban_novu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_ban_novu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_veziyyeti_id")) {
		var avtomobil_veziyyeti_id = document.getElementById("avtomobil_veziyyeti_id");
		if(avtomobil_veziyyeti_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_veziyyeti_id);
			return;
		}
	}


	if (document.getElementById("avtomobil_yurus_km_id")) {
		var avtomobil_yurus_km_id = document.getElementById("avtomobil_yurus_km_id");
		if(avtomobil_yurus_km_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yurus_km_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_buraxilis_ili_id")) {
		var avtomobil_buraxilis_ili_id = document.getElementById("avtomobil_buraxilis_ili_id");
		if(avtomobil_buraxilis_ili_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_buraxilis_ili_id);
			return;
		}
	}

	if (document.getElementById("avto_suret_qutusu_id")) {
		var avto_suret_qutusu_id = document.getElementById("avto_suret_qutusu_id");
		if(avto_suret_qutusu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_suret_qutusu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_yanacaq_id")) {
		var avtomobil_yanacaq_id = document.getElementById("avtomobil_yanacaq_id");
		if(avtomobil_yanacaq_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yanacaq_id);
			return;
		}
	}

	if (document.getElementById("avto_muherrikin_hecmi")) {
		var avto_muherrikin_hecmi = document.getElementById("avto_muherrikin_hecmi");
		if(avto_muherrikin_hecmi.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_muherrikin_hecmi);
			return;
		}
	}

	if (document.getElementById("muherrikin_at_gucu_id")) {
		var muherrikin_at_gucu_id = document.getElementById("muherrikin_at_gucu_id");
		if(muherrikin_at_gucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(muherrikin_at_gucu_id);
			return;
		}
	}

	if (document.getElementById("avto_otrucu_id")) {
		var avto_otrucu_id = document.getElementById("avto_otrucu_id");
		if(avto_otrucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_otrucu_id);
			return;
		}
	}


	if (document.getElementById("reng_ad")) {
		var reng_ad = document.getElementById("reng_ad");
		if(reng_ad.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(reng_ad);
			return;
		}
	}


	if (document.getElementById("qiymet_id")) {
		var qiymet_id = document.getElementById("qiymet_id");
		if(qiymet_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(qiymet_id);
			return;
		}
	}

	if (document.getElementById("pul_novu")) {
		var pul_novu = document.getElementById("pul_novu");
		if(pul_novu.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(pul_novu);
			return;
		}
	}

	if (document.getElementById("elan_muellifi_id")) {
		var elan_muellifi_id = document.getElementById("elan_muellifi_id");
		if(elan_muellifi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(elan_muellifi_id);
			return;
		}
	}

	if (document.getElementById("pro-image")) {
		if (document.getElementById("pro-image").files.length == 0) {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"block";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			document.getElementById("sekilalani").style.backgroundColor = "red";
			document.getElementById("sekilalani").style.borderColor = "#ff0000";
			document.getElementById("sekilalani").style.boxShadow = " 2px #ff0000";			
			return;
		}
	}


	if (document.getElementById("dovlet_id")) {
		var dovlet_id = document.getElementById("dovlet_id");
		if(dovlet_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"block";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(dovlet_id);
			return;
		}
	}


	if (document.getElementById("seher_id")) {
		var seher_id = document.getElementById("seher_id");
		if(seher_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"block";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(seher_id);
			return;
		}
	}

	if (document.getElementById("rayon_id")) {
		var rayon_id = document.getElementById("rayon_id");
		if(rayon_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"block";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(rayon_id);
			return;
		}
	}


	if (document.getElementById("rayon_id")) {
		var rayon_id = document.getElementById("rayon_id");
		if(rayon_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"block";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(rayon_id);
			return;
		}
	}


	EtrafliMelumatDivi.style.display		=	"none";	
	ElanDetayDivi.style.display		=	"none";
	SekilYukleDivi.style.display		=	"none";	
	UnavanDivi.style.display		=	"none";	
	ElaqeMelumatlariDivi.style.display		=	"block";

}



function ElaniTamala(){	
	var EtrafliMelumatDivi		=	document.getElementById("elanetraflimelumat");
	var ElanDetayDivi		      =	document.getElementById("elandedeydivi");
	var SekilYukleDivi		    =	document.getElementById("sekilyukledivi");
	var UnavanDivi		        =	document.getElementById("unvandivi");
	var ElaqeMelumatlariDivi	=	document.getElementById("elaqemelumatlari");
	if (document.getElementById("avtomobil_markasi_id")) {
		var avtomobil_markasi_id = document.getElementById("avtomobil_markasi_id");
		if(avtomobil_markasi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_markasi_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_model_id")) {
		var avtomobil_model_id = document.getElementById("avtomobil_model_id");
		if(avtomobil_model_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_model_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_ban_novu_id")) {
		var avtomobil_ban_novu_id = document.getElementById("avtomobil_ban_novu_id");
		if(avtomobil_ban_novu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_ban_novu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_veziyyeti_id")) {
		var avtomobil_veziyyeti_id = document.getElementById("avtomobil_veziyyeti_id");
		if(avtomobil_veziyyeti_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_veziyyeti_id);
			return;
		}
	}


	if (document.getElementById("avtomobil_yurus_km_id")) {
		var avtomobil_yurus_km_id = document.getElementById("avtomobil_yurus_km_id");
		if(avtomobil_yurus_km_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yurus_km_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_buraxilis_ili_id")) {
		var avtomobil_buraxilis_ili_id = document.getElementById("avtomobil_buraxilis_ili_id");
		if(avtomobil_buraxilis_ili_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_buraxilis_ili_id);
			return;
		}
	}

	if (document.getElementById("avto_suret_qutusu_id")) {
		var avto_suret_qutusu_id = document.getElementById("avto_suret_qutusu_id");
		if(avto_suret_qutusu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_suret_qutusu_id);
			return;
		}
	}

	if (document.getElementById("avtomobil_yanacaq_id")) {
		var avtomobil_yanacaq_id = document.getElementById("avtomobil_yanacaq_id");
		if(avtomobil_yanacaq_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avtomobil_yanacaq_id);
			return;
		}
	}

	if (document.getElementById("avto_muherrikin_hecmi")) {
		var avto_muherrikin_hecmi = document.getElementById("avto_muherrikin_hecmi");
		if(avto_muherrikin_hecmi.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_muherrikin_hecmi);
			return;
		}
	}

	if (document.getElementById("muherrikin_at_gucu_id")) {
		var muherrikin_at_gucu_id = document.getElementById("muherrikin_at_gucu_id");
		if(muherrikin_at_gucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(muherrikin_at_gucu_id);
			return;
		}
	}

	if (document.getElementById("avto_otrucu_id")) {
		var avto_otrucu_id = document.getElementById("avto_otrucu_id");
		if(avto_otrucu_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(avto_otrucu_id);
			return;
		}
	}


	if (document.getElementById("reng_ad")) {
		var reng_ad = document.getElementById("reng_ad");
		if(reng_ad.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(reng_ad);
			return;
		}
	}


	if (document.getElementById("qiymet_id")) {
		var qiymet_id = document.getElementById("qiymet_id");
		if(qiymet_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(qiymet_id);
			return;
		}
	}

	if (document.getElementById("pul_novu")) {
		var pul_novu = document.getElementById("pul_novu");
		if(pul_novu.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(pul_novu);
			return;
		}
	}

	if (document.getElementById("elan_muellifi_id")) {
		var elan_muellifi_id = document.getElementById("elan_muellifi_id");
		if(elan_muellifi_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"block";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(elan_muellifi_id);
			return;
		}
	}

	if (document.getElementById("pro-image")) {
		if (document.getElementById("pro-image").files.length == 0) {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"block";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			document.getElementById("sekilalani").style.backgroundColor = "red";
			document.getElementById("sekilalani").style.borderColor = "#ff0000";
			document.getElementById("sekilalani").style.boxShadow = " 2px #ff0000";			
			return;
		}
	}


	if (document.getElementById("dovlet_id")) {
		var dovlet_id = document.getElementById("dovlet_id");
		if(dovlet_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"block";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(dovlet_id);
			return;
		}
	}


	if (document.getElementById("seher_id")) {
		var seher_id = document.getElementById("seher_id");
		if(seher_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"block";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(seher_id);
			return;
		}
	}

	if (document.getElementById("rayon_id")) {
		var rayon_id = document.getElementById("rayon_id");
		if(rayon_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"block";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(rayon_id);
			return;
		}
	}


	if (document.getElementById("rayon_id")) {
		var rayon_id = document.getElementById("rayon_id");
		if(rayon_id.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"block";	
			ElaqeMelumatlariDivi.style.display		=	"none";	
			error(rayon_id);
			return;
		}
	}


	if (document.getElementById("Ad_Soyad")) {
		var Ad_Soyad = document.getElementById("Ad_Soyad");
		if(Ad_Soyad.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"block";	
			error(Ad_Soyad);
			return;
		}
	}


	if (document.getElementById("E_Mail")) {
		var E_Mail = document.getElementById("E_Mail");
		if(E_Mail.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"block";	
			error(E_Mail);
			return;
		}
	}


	if (document.getElementById("Telefon_Bir")) {
		var Telefon_Bir = document.getElementById("Telefon_Bir");
		if(Telefon_Bir.value === '') {
			EtrafliMelumatDivi.style.display		=	"none";
			ElanDetayDivi.style.display		=	"none";	
			SekilYukleDivi.style.display		=	"none";	
			UnavanDivi.style.display		=	"none";	
			ElaqeMelumatlariDivi.style.display		=	"block";	
			error(Telefon_Bir);
			return;
		}
	}	

	document.getElementById("yuklemealanikapsayici").style.display = "block";

	var formData = new FormData($("#Yeni_Elan_Formu")[0]); 
	
	$.ajax({ 
		url:"Avtomobil_Elani/Yeni_Elan_Islemleri.php",
		type: 'POST', 
		data: formData, 
		async: false, 
		cache: false, 
		contentType: false, 
		processData: false, 
		success: function(data) {
			$("#Yeni_Elan_Formu").html((data));
		}, 
		error: function(data) {   
		} 
	}); 
	document.getElementById("yuklemealanikapsayici").style.display = "none";
}



/*===============================Avtomobilin markasına görə mödelini gətirmə başlayır=============*/
function AvtoModelTelebEt(deyer) {
	document.getElementById("yuklemealanikapsayici").style.display = "block";
	marka_id=document.getElementById(deyer).value;
	var ModeliniTalepEt = new XMLHttpRequest();
	ModeliniTalepEt.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("yuklemealanikapsayici").style.display = "none";
			document.getElementById("avtomobil_model_id").innerHTML = " ";
			document.getElementById("avtomobil_model_id").innerHTML = this.responseText;
			if (document.querySelector('[for='+deyer+']')) {
				document.querySelector('[for='+deyer+']').style.color  = "#495057";
			}
			document.getElementById(deyer).style.color = "#495057";
			document.getElementById(deyer).style.borderColor = "#ced4da";			
			document.getElementById(deyer).style.boxShadow = "1px 0px 1px 0px #ced4da";
		}
	};
	ModeliniTalepEt.open("GET", "Avtomobil_Elani/Avtomobil_Modeli_Teleb_Et?avotomarka=" + marka_id, true);
	ModeliniTalepEt.send();
}
/*===============================Avtomobilin markasına görə mödelini gətirmə bitir====================*/



function AvtomobilDovletSecildi(id) {	
	document.getElementById("yuklemealanikapsayici").style.display = "block";
	dovlet_id=document.getElementById(id).value;
	var SeherTelebEt = new XMLHttpRequest();
	SeherTelebEt.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("yuklemealanikapsayici").style.display = "none";
			document.getElementById("menzilseher").innerHTML = " ";
			document.getElementById("menzilseher").innerHTML = this.responseText;
		}
		SecimAlaniSecildi(id)
	};
	SeherTelebEt.open("GET", "Avtomobil_Elani/Seher_Telebi.php?dovlet_id=" + dovlet_id, true);
	SeherTelebEt.send();

	var RayonTelebEt = new XMLHttpRequest();
	RayonTelebEt.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("ryontelebi").innerHTML = " ";
			document.getElementById("ryontelebi").innerHTML = this.responseText;
		}	
	};
	RayonTelebEt.open("GET", "Avtomobil_Elani/Rayon_Telebi.php?dovlet_id=" + dovlet_id, true);
	RayonTelebEt.send();	
}
function AvtomobilSeherSecildi(id) {	
	document.getElementById("yuklemealanikapsayici").style.display = "block";
	seher_id=document.getElementById(id).value;
	var MetroTelebEt = new XMLHttpRequest();
	MetroTelebEt.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("yuklemealanikapsayici").style.display = "none";
			document.getElementById("metrotelebi").innerHTML = " ";
			document.getElementById("metrotelebi").innerHTML = this.responseText;
		}
		SecimAlaniSecildi(id)
	};
	MetroTelebEt.open("GET", "Avtomobil_Elani/Metro_Telebi.php?seher_id=" + seher_id, true);
	MetroTelebEt.send();
}