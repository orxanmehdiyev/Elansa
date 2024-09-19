<div id="avtomobilelaniucun" style="display: none;">

	<script type="text/javascript">
		function AvtomobilAvtomobilElanHaqqindaKontrol() {
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



	/*==============================================================================================================================*/

	if (document.getElementById("avtomobil_markasi_id")) {
		var avtomobil_markasi_id = document.getElementById("avtomobil_markasi_id");
		if (avtomobil_markasi_id.value == "") {

			document.getElementById("avtomobil_markasi_id_label").style.color = "#ff0000";
			document.getElementById("avtomobil_markasi_id").style.color = "#ff0000";
			document.getElementById("avtomobil_markasi_id").style.borderColor = "#ff0000";
			document.getElementById("avtomobil_markasi_id").style.boxShadow = "1px 0px 1px 0px #ff0000";
			avtomobil_markasi_id.focus();
			return;
		} else {
			document.getElementById("avtoelanhaqqindamelumat").setAttribute("data-target", "#collapseTwo");
			document.getElementById("avtodetayozellikietrafli").setAttribute("data-target", "#collapseTwo");
			document.getElementById("avtomobil_markasi_id_label").style.color = "#495057";
			document.getElementById("avtomobil_markasi_id").style.color = "#495057";
			document.getElementById("avtomobil_markasi_id").style.borderColor = "#ced4da";
			document.getElementById("avtomobil_markasi_id").style.boxShadow = "1px 0px 1px 0px #ced4da";
		}
	}

	/*==============================================================================================================================*/




	if (document.getElementById('avtomobil_model_id')) {
		var AvtoModelSecimKontrol = document.getElementById('avtomobil_model_id');
		if (AvtoModelSecimKontrol.value == "") {
			document.getElementById('avtomobil_model_id_metni').style.color = '#ff0000';
			document.getElementById('avtomobil_model_id').style.color = '#ff0000';
			document.getElementById("avtomobil_model_id").style.borderColor = "#ff0000";
			document.getElementById("avtomobil_model_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoModelSecimKontrol.focus();
			return;
		}
	}

	/*==============================================================================================================================*/


	if (document.getElementById('avtomobil_ban_novu_id')) {
		var AvtoBanNovuSecimKontrol = document.getElementById('avtomobil_ban_novu_id');
		if (AvtoBanNovuSecimKontrol.value == "") {
			document.getElementById('avtomobil_ban_novu_id_metni').style.color = '#ff0000';
			document.getElementById('avtomobil_ban_novu_id').style.color = '#ff0000';
			document.getElementById("avtomobil_ban_novu_id").style.borderColor = "#ff0000";
			document.getElementById("avtomobil_ban_novu_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoBanNovuSecimKontrol.focus();
			return;
		} 
	}

	/*==============================================================================================================================*/




	if (document.getElementById('avtomobil_veziyyeti_id')) {
		var AvtomobilinVeziyyetiSecilmedi = document.getElementById('avtomobil_veziyyeti_id');
		if (AvtomobilinVeziyyetiSecilmedi.value == "") {
			document.getElementById('avtomobil_veziyyeti_id_metni').style.color = '#ff0000';
			document.getElementById('avtomobil_veziyyeti_id').style.color = '#ff0000';
			document.getElementById("avtomobil_veziyyeti_id").style.borderColor = "#ff0000";
			document.getElementById("avtomobil_veziyyeti_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtomobilinVeziyyetiSecilmedi.focus();
			return;
		} 
	}



	/*==============================================================================================================================*/


	if (document.getElementById('avtomobil_yurus_km_id')) {
		var AvtoYusrusKmKontrol = document.getElementById('avtomobil_yurus_km_id');
		if (AvtoYusrusKmKontrol.value == "") {
			document.getElementById('avtomobil_yurus_km_id_metni').style.color = '#ff0000';
			document.getElementById('avtomobil_yurus_km_id').style.color = '#ff0000';
			document.getElementById("avtomobil_yurus_km_id").style.borderColor = "#ff0000";
			document.getElementById("avtomobil_yurus_km_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYusrusKmKontrol.focus();
			return;
		} 
	}



	/*==============================================================================================================================*/


	if (document.getElementById('avtomobil_buraxilis_ili_id')) {
		var AvtoBuraxilisIliKontrol = document.getElementById('avtomobil_buraxilis_ili_id');
		if (AvtoBuraxilisIliKontrol.value == "") {
			document.getElementById('avtomobil_buraxilis_ili_id_metni').style.color = '#ff0000';
			document.getElementById('avtomobil_buraxilis_ili_id').style.color = '#ff0000';
			document.getElementById("avtomobil_buraxilis_ili_id").style.borderColor = "#ff0000";
			document.getElementById("avtomobil_buraxilis_ili_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoBuraxilisIliKontrol.focus();
			return;
		} 
	}



	/*==============================================================================================================================*/


	if (document.getElementById('avto_suret_qutusu_id')) {
		var AvtoSuretQutusuSecimKontrol = document.getElementById('avto_suret_qutusu_id');
		if (AvtoSuretQutusuSecimKontrol.value == "") {
			document.getElementById('avto_suret_qutusu_id_metni').style.color = '#ff0000';
			document.getElementById('avto_suret_qutusu_id').style.color = '#ff0000';
			document.getElementById("avto_suret_qutusu_id").style.borderColor = "#ff0000";
			document.getElementById("avto_suret_qutusu_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoSuretQutusuSecimKontrol.focus();
			return;
		} 
	}



	/*==============================================================================================================================*/


	if (document.getElementById('avtomobil_yanacaq_id')) {
		var AvtoYanacaqSecimKontrol = document.getElementById('avtomobil_yanacaq_id');
		if (AvtoYanacaqSecimKontrol.value == "") {
			document.getElementById('avtomobil_yanacaq_id_metni').style.color = 'red';
			document.getElementById('avtomobil_yanacaq_id').style.color = 'red';
			document.getElementById("avtomobil_yanacaq_id").style.borderColor = "red";
			document.getElementById("avtomobil_yanacaq_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYanacaqSecimKontrol.focus();
			return;
		} 
	}

	/*==============================================================================================================================*/

	if (document.getElementById('avto_muherrikin_hecmi')) {
		var AvtoYanacaqSecimKontrol = document.getElementById('avto_muherrikin_hecmi');
		if (AvtoYanacaqSecimKontrol.value == "") {
			document.getElementById('avto_muherrikin_hecmi_metni').style.color = 'red';
			document.getElementById('avto_muherrikin_hecmi').style.color = 'red';
			document.getElementById("avto_muherrikin_hecmi").style.borderColor = "red";
			document.getElementById("avto_muherrikin_hecmi").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYanacaqSecimKontrol.focus();
			return;
		} 
	}


	/*==============================================================================================================================*/



	if (document.getElementById('muherrikin_at_gucu_id')) {
		var AvtoYusrusKmKontrol = document.getElementById('muherrikin_at_gucu_id');
		if (AvtoYusrusKmKontrol.value == "") {
			document.getElementById('muherrikin_at_gucu_id_metni').style.color = '#ff0000';
			document.getElementById('muherrikin_at_gucu_id').style.color = '#ff0000';
			document.getElementById("muherrikin_at_gucu_id").style.borderColor = "#ff0000";
			document.getElementById("muherrikin_at_gucu_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYusrusKmKontrol.focus();
			return;
		} 
	}


	/*==============================================================================================================================*/


	if (document.getElementById('avto_otrucu_id')) {
		var AvtoYanacaqSecimKontrol = document.getElementById('avto_otrucu_id');
		if (AvtoYanacaqSecimKontrol.value == "") {
			document.getElementById('avto_otrucu_id_metni').style.color = 'red';
			document.getElementById('avto_otrucu_id').style.color = 'red';
			document.getElementById("avto_otrucu_id").style.borderColor = "red";
			document.getElementById("avto_otrucu_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYanacaqSecimKontrol.focus();
			return;
		} 
	}


	/*==============================================================================================================================*/

	if (document.getElementById('reng_ad')) {
		var AvtoYanacaqSecimKontrol = document.getElementById('reng_ad');
		if (AvtoYanacaqSecimKontrol.value == "") {
			document.getElementById('reng_ad_metni').style.color = 'red';
			document.getElementById('reng_ad').style.color = 'red';
			document.getElementById("reng_ad").style.borderColor = "red";
			document.getElementById("reng_ad").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYanacaqSecimKontrol.focus();
			return;
		} 
	}


	/*==============================================================================================================================*/
	if (document.getElementById('qiymet_id')) {
		var AvtoYusrusKmKontrol = document.getElementById('qiymet_id');
		if (AvtoYusrusKmKontrol.value == "") {
			document.getElementById('qiymet_id_metni').style.color = '#ff0000';
			document.getElementById('qiymet_id').style.color = '#ff0000';
			document.getElementById("qiymet_id").style.borderColor = "#ff0000";
			document.getElementById("qiymet_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYusrusKmKontrol.focus();
			return;
		} 
	}


	
	if (document.getElementById('valyuta')) {
		var AvtoYanacaqSecimKontrol = document.getElementById('valyuta');
		if (AvtoYanacaqSecimKontrol.value == "") {
			document.getElementById('valyuta_metni').style.color = 'red';
			document.getElementById('valyuta').style.color = 'red';
			document.getElementById("valyuta").style.borderColor = "red";
			document.getElementById("valyuta").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYanacaqSecimKontrol.focus();
			return;
		} 
	}


	/*==============================================================================================================================*/


	if (document.getElementById('elan_muellifi_id')) {
		var AvtoYanacaqSecimKontrol = document.getElementById('elan_muellifi_id');
		if (AvtoYanacaqSecimKontrol.value == "") {
			document.getElementById('elan_muellifi_id_metni').style.color = 'red';
			document.getElementById('elan_muellifi_id').style.color = 'red';
			document.getElementById("elan_muellifi_id").style.borderColor = "red";
			document.getElementById("elan_muellifi_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
			document.getElementById("avtoelanhaqqindamelumat").removeAttribute("data-target");
			document.getElementById("avtodetayozellikietrafli").removeAttribute("data-target");
			document.getElementById("yenielansekil").removeAttribute("data-target");
			document.getElementById("yenielanunvan").removeAttribute("data-target");
			document.getElementById("yenielanelaqe").removeAttribute("data-target");
			AvtoYanacaqSecimKontrol.focus();
			return;
		} 
	}


	/*==============================================================================================================================*/

	/*==============================================================================================================================*/
	document.getElementById("avtoelanhaqqindamelumat").setAttribute("data-target", "#collapseTwo");
	document.getElementById("avtodetayozellikietrafli").setAttribute("data-target", "#collapseTwo");

}

	</script>
<?php 
if(isset($_SESSION["istifadeci"])){
	$userelansor    = $db->prepare("SELECT * FROM user where user_email=:user_email");
	$userelansor->execute(array(
		'user_email'=>$_SESSION["istifadeci"]
	));
	$userelancek=$userelansor->fetch(PDO::FETCH_ASSOC);
}
?>
<input type="hidden" name="klasor" value="avtomobil">
<div class="card all-content">
	<div class="card-header" id="headingOne">
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left" type="button"
			data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
			aria-controls="collapseOne">
			<i class="fas fa-info-circle"></i>Elan haqqında məlumat <span>*</span>
		</button>
	</h2>
</div>
<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
data-parent="#accordionExample">
<div class="card-body">
	<div class="row">
		<div class="form-group col-6">
			<label for="avtomobil_markasi_id" id="avtomobil_markasi_id_label"><span>*</span>Marka</label>								
			<select name="avtomobil_markasi_id" tabindex="2" required="required"  id="avtomobil_markasi_id" class="form-control" onchange="ModelTelebEt(this.value)">
				<option disabled="disabled" value=""  selected="selected"> Secin...</option>
				<?php 
				$auto_marka_sor=$db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_durum=:avtomobil_markasi_durum order by avtomobil_markasi_ad ASC ");
				$auto_marka_sor->execute(array(
					'avtomobil_markasi_durum'=>1));
					while ($auto_marka_cek=$auto_marka_sor->fetch(PDO::FETCH_ASSOC)) { ?>						
						<option value="<?php echo $auto_marka_cek['avtomobil_markasi_id']  ?>"><?php echo $auto_marka_cek['avtomobil_markasi_ad']  ?>
					</option>
				<?php } ?>	
			</select>
		</div>

		<div class="form-group col-6">
			<label for="avtomobil_model_id" id="avtomobil_model_id_metni"><span>*</span>Model</label>
			<select name="avtomobil_model_id" tabindex="3" required="required"  id="avtomobil_model_id" class="form-control" onchange="SelectInputAlaniSecildi(this.id)">
				<option value="" selected="selected">Secin...</option>
			</select>
		</div>

		<div class="form-group col-6">
			<label for="avtomobil_ban_novu_id" id="avtomobil_ban_novu_id_metni"><span>*</span>Ban növü</label>
			<select name="avtomobil_ban_novu_id" tabindex="4" required="required"  id="avtomobil_ban_novu_id" class="form-control" onchange="SelectInputAlaniSecildi(this.id)"> 				
				<option value="" disabled="" selected="selected"> Secin...
				</option>
				<?php 
				$ban_sor=$db->prepare("SELECT * FROM avtomobil_ban_novu  where avtomobil_ban_novu_durum=:avtomobil_ban_novu_durum  order by avtomobil_ban_novu_id ASC ");
				$ban_sor->execute(array(
					'avtomobil_ban_novu_durum'=>1));
					while ($ban_cek=$ban_sor->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $ban_cek['avtomobil_ban_novu_id'] ?>"><?php echo $ban_cek['avtomobil_ban_novu_ad'] ?>
					</option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group col-6">
			<label for="validationServer5" id="avtomobil_veziyyeti_id_metni"><span>*</span>Vəziyyəti</label>
			<select class="form-control" tabindex="5" id="avtomobil_veziyyeti_id" name="emlakin_veziyyeti_id" required="required" onchange="SelectInputAlaniSecildi(this.id)">
				<option value="" disabled="" selected="selected"> Seçin...</option>
				<?php 
				$emlakin_veziyyeti=$db->prepare("SELECT * FROM emlakin_veziyyeti where avtomobil_elanlari_ucun_durum=:avtomobil_elanlari_ucun_durum");
				$emlakin_veziyyeti->execute(array(
					'avtomobil_elanlari_ucun_durum'=>1));
					while ($emlakin_veziyyeti_cek=$emlakin_veziyyeti->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $emlakin_veziyyeti_cek['emlakin_veziyyeti_id'] ?>"><?php echo $emlakin_veziyyeti_cek['emlakin_veziyyeti_ad'] ?>
					</option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group col-6">
			<label for="avtomobil_yurus_km_id" id="avtomobil_yurus_km_id_metni" ><span>*</span>Yürüş km</label>
			<input type="number" tabindex="216" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="avto_yurus_km" required tabindex="9" class="form-control" id="avtomobil_yurus_km_id" placeholder="00000" oninput="ReqemInputAlani(this.id)"  onfocusout="ReqemInputAlani(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100">
		</div>

		<div class="form-group col-6">
			<label for="avtomobil_buraxilis_ili_id" id="avtomobil_buraxilis_ili_id_metni"><span>*</span>Buraxılış ili</label>
			<select name="buraxilis_ili" tabindex="7" required="required"   id="avtomobil_buraxilis_ili_id" class="form-control" onchange="SelectInputAlaniSecildi(this.id)">
				<option value="" disabled="" selected="selected"> Seçin...</option>
				<?php 
				for($masn_il = $Il_tap; $masn_il >= 1900 ; $masn_il--) { ?>
					<option value="<?php echo $masn_il ?>"><?php echo $masn_il ?></option>
				<?php }
				?>
			</select>
		</div>

		<div class="form-group col-6">
			<label for="avto_suret_qutusu_id" id="avto_suret_qutusu_id_metni"><span>*</span>Sürət qutusu</label>
			<select name="avto_suret_qutusu_id" tabindex="8" required="required"  id="avto_suret_qutusu_id" class="form-control" onchange="SelectInputAlaniSecildi(this.id)" >
				<option value="" disabled="" selected="selected"> Secin...</option>		
				<?php 
				$suretqutusu_sor=$db->prepare("SELECT * FROM avto_suret_qutusu where avto_suret_qutusu_durum=:avto_suret_qutusu_durum order by avto_suret_qutusu_id ASC ");
				$suretqutusu_sor->execute(array(
					'avto_suret_qutusu_durum'=>1));
				while ($suretqutusu_cek=$suretqutusu_sor->fetch(PDO::FETCH_ASSOC)) {
					?>		
					<option value="<?php echo $suretqutusu_cek['avto_suret_qutusu_id'] ?>"><?php echo $suretqutusu_cek['avto_suret_qutusu_ad'] ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group col-6">
			<label for="avtomobil_yanacaq_id" id="avtomobil_yanacaq_id_metni"><span>*</span>Yanacaq növü</label>
			<select name="avtomobil_yanacaq_id" tabindex="9" required="required"  id="avtomobil_yanacaq_id" class="form-control" onchange="SelectInputAlaniSecildi(this.id)">
				<option value=""  disabled="" selected="selected"> Secin...</option>
				<?php 
				$yanacaq_sor=$db->prepare("SELECT * FROM yanacaq where yanacaq_durum=:yanacaq_durum order by yanacaq_id ASC ");
				$yanacaq_sor->execute(array(
					'yanacaq_durum'=>1));
					while ($yanacaq_cek=$yanacaq_sor->fetch(PDO::FETCH_ASSOC)) {?>
						<option value="<?php echo $yanacaq_cek['yanacaq_id'] ?>"><?php echo $yanacaq_cek['yanacaq_ad'] ?>
					</option>
				<?php } ?>	
			</select>
		</div>

		<div class="form-group col-6">
			<label for="avto_muherrikin_hecmi" id="avto_muherrikin_hecmi_metni"><span>*</span>Mühərrikin həcmi, sm
			3</label>
			<select name="avto_muherrikin_hecmi" tabindex="10" required="required"  id="avto_muherrikin_hecmi" class="form-control" onchange="SelectInputAlaniSecildi(this.id)">
				<option value="" disabled="" selected="selected"> Secin...
				</option>
				<?php 
				$avtomobilmuherrikhecmisor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum  order by avtomobilmuherrikhecmi_ad ASC ");
				$avtomobilmuherrikhecmisor->execute(array(
					'avtomobilmuherrikhecmi_durum'=>1));
					while ($avtomobilmuherrikhecmicek=$avtomobilmuherrikhecmisor->fetch(PDO::FETCH_ASSOC)) {?>			
						<option value="<?php echo $avtomobilmuherrikhecmicek['avtomobilmuherrikhecmi_id'] ?>"><?php echo $avtomobilmuherrikhecmicek['avtomobilmuherrikhecmi_ad'] ?>
					</option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group col-6">
			<label for="muherrikin_at_gucu_id" id="muherrikin_at_gucu_id_metni"><span>*</span>Mühərrikin at
			gücü</label>
			<input type="number" tabindex="216" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="muherrikin_at_gucu_id" required tabindex="9" class="form-control" id="muherrikin_at_gucu_id" placeholder="00000" oninput="ReqemInputAlani(this.id)"  onfocusout="ReqemInputAlani(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100">
		</div>

		<div class="form-group col-6">
			<label for="avto_otrucu_id" id="avto_otrucu_id_metni"><span>*</span>Ötürücü</label>
			<select name="avto_otrucu_id" tabindex="12" name="avto_otrucu"   id="avto_otrucu_id" required="required" class="form-control" onchange="SelectInputAlaniSecildi(this.id)" >
				<option value="" disabled="" selected="selected"> Secin...
				</option>
				<?php 
				$otrucu_sor=$db->prepare("SELECT * FROM avto_otrucu where avto_otrucudurum=:avto_otrucudurum  order by avto_otrucu_id ASC ");
				$otrucu_sor->execute(array(
					'avto_otrucudurum'=>1));
					while ($otrucu_cek=$otrucu_sor->fetch(PDO::FETCH_ASSOC)) {?>			
						<option value="<?php echo $otrucu_cek['avto_otrucu_id'] ?>"><?php echo $otrucu_cek['avto_otrucu_ad'] ?>
					</option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group col-6">
			<label for="reng_ad" id="reng_ad_metni"><span>*</span>Rəngi</label>
			<select name="reng" tabindex="13"   id="reng_ad" class="form-control"  required="required" onchange="SelectInputAlaniSecildi(this.id)" >
				<option value="" disabled="" selected="selected"> Seçin...
				</option>
				<?php 
				$rengsor=$db->prepare("SELECT * FROM reng where reng_durum=:reng_durum  ");
				$rengsor->execute(array(
					'reng_durum'=>1));
					while ($rengcek=$rengsor->fetch(PDO::FETCH_ASSOC)) {?>
						<option value="<?php echo $rengcek['reng_id'] ?>"><?php echo $rengcek['reng_ad'] ?>
					</option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group col-4">
			<label for="qiymet_id" id="qiymet_id_metni"><span>*</span>Qiymət</label>
			<input type="number" tabindex="216" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="qiymet" required tabindex="9" class="form-control" id="qiymet_id" placeholder="00000" oninput="ReqemInputAlani(this.id)"  onfocusout="ReqemInputAlani(this.id),SagVeSolBosluklariSIl(this.id)" maxlength = "100">
		</div>

		<div class="form-group col-2">
			<label id="valyuta_metni">AZN</label>
			<select id="valyuta" class="form-control" name="pul_novu" tabindex="15"  onchange="SelectInputAlaniSecildi(this.id)">
				<option selected>AZN</option>
				<option>EUR</option>
				<option>USD</option>
			</select>
		</div>

		<div class="form-group col-6">
			<label for="elan_muellifi_id" id="elan_muellifi_id_metni"><span>*</span>Elan müəllifi</label>
			<select class="form-control" id="elan_muellifi_id" name="elan_veren" tabindex="16" required="required" onchange="SelectInputAlaniSecildi(this.id)">
				<option value="" disabled="" selected="selected"> Seçin...</option>
				<?php $elanverensor=$db->prepare("SELECT * FROM   elanverennovu where  avtmobil_elanlari_ucun_durum=:avtmobil_elanlari_ucun_durum");
				$elanverensor->execute(array(
					'avtmobil_elanlari_ucun_durum'=>1));
				while ($elanverencek=$elanverensor->fetch(PDO::FETCH_ASSOC)) {
					?>
					<option value="<?php echo $elanverencek['elanverennovu_id'] ?>"><?php echo $elanverencek['elanverennovu_ad'] ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group col-12">
			<label for="exampleFormControlTextarea1"><span></span>Elan
			açıqlaması:</label>
			<textarea class="form-control" id="exampleFormControlTextarea1"	rows="4" name="aciqlama"></textarea>
		</div>

		<div class="row check col-12">
			<div class="custom-control custom-checkbox col-2">
				<input type="checkbox" tabindex="17" class="custom-control-input" name="barter_var" 	id="barter_var">
				<label class="custom-control-label" for="barter_var">Barter
				var</label>
			</div>
			<div class="custom-control custom-checkbox col-2">
				<input type="checkbox" tabindex="18" class="custom-control-input" name="kredit_var" id="kredit_var">
				<label class="custom-control-label" for="kredit_var">Kredit
				var</label>
			</div>
			<button class="btn btn-primary" tabindex="19" type="button" data-toggle="collapse" onclick="AvtomobilAvtomobilElanHaqqindaKontrol()" id="avtoelanhaqqindamelumat">Davam et..</button>
		</div>

	</div>
</div>
</div>
</div>









<div id="elandetayozellik">			
	<div class="card all-dord">
		<div class="card-header" id="headingTwo">
			<h2 class="mb-0">
				<button class="btn btn-link btn-block text-left collapsed"  type="button" data-toggle="collapse"  aria-expanded="false"  onclick="AvtomobilElanHaqqindaKontrol()" id="avtodetayozellikietrafli" aria-controls="collapseTwo" id="avtodetayozellikietrafli">
					<i class="fas fa-sitemap"></i>Detaylı özəlliklər
				</button>
			</h2>
		</div>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"	data-parent="#accordionExample">
			<div class="card-body">
				<?php 
				$AvtomobilTechizatBolmesiSor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_durum=:avtomobil_techizat_bolmesi_durum");
				$AvtomobilTechizatBolmesiSor->execute(array(
					'avtomobil_techizat_bolmesi_durum'=>1));
				while ($AvtomobilTechizatBolmesiCek= $AvtomobilTechizatBolmesiSor->fetch(PDO::FETCH_ASSOC)) {
					$avtomobil_techizat_bolmesi_id=$AvtomobilTechizatBolmesiCek['avtomobil_techizat_bolmesi_id'];
					?>
					<h4 style="font-weight: 500 !important "><?php echo $AvtomobilTechizatBolmesiCek['avtomobil_techizat_bolmesi_ad']; ?></h4>
					<div class="row">
						<?php 
						$AvtomobilTechizatSor=$db->prepare("SELECT * FROM avtomobil_techizat where avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id and avtomobil_techizat_durum=:avtomobil_techizat_durum");
						$AvtomobilTechizatSor->execute(array(
							'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id,
							'avtomobil_techizat_durum'=>1));
						while ($AvtomobilTechizatCek= $AvtomobilTechizatSor->fetch(PDO::FETCH_ASSOC)) {
							$avtomobil_techizat_id=$AvtomobilTechizatCek['avtomobil_techizat_id'];
							$avtomobil_techizat_ad=$AvtomobilTechizatCek['avtomobil_techizat_ad'];
							?>
							<div class="custom-control custom-checkbox col-3">
								<input type="checkbox" class="custom-control-input" tabindex="21" name="trchizat[<?php echo $avtomobil_techizat_id ?>]"	id="<?php echo $avtomobil_techizat_id ?>">
								<label class="custom-control-label" for="<?php echo $avtomobil_techizat_id ?>"><?php echo $avtomobil_techizat_ad ?></label>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
				<button class="btn btn-primary" tabindex="84" type="button" data-toggle="collapse"
				data-target="#collapseThree">Davam et..</button>
			</div>
		</div>
	</div>
</div>
</div>
