<?php
require_once "../_admin/Ayarlar/ayarlar.php"; ?>
<div class="card all-content">
	<div class="card-header">
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left" type="button" onclick="AvtomobilElanBirinciBolmeKontrol()">
				<i class="fas fa-info-circle"></i>Elan haqqında məlumat <span>*</span>
			</button>
		</h2>
	</div>
	<div>
		<div id="elanetraflimelumat" class="card-body">
			<div class="row">

				<div class="form-group col-6">
					<label for="avtomobil_markasi_id"><span>*</span>Marka</label>								
					<select name="avtomobil_markasi_id" tabindex="2" required="required"  id="avtomobil_markasi_id" class="form-control" onchange="AvtoModelTelebEt(this.id)">
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
					<label for="avtomobil_model_id"><span>*</span>Model</label>
					<select name="avtomobil_model_id" tabindex="3" required="required"  id="avtomobil_model_id" class="form-control" onchange="SecimAlaniSecildi(this.id)">
						<option value="" selected="selected">Secin...</option>
					</select>
				</div>

				<div class="form-group col-6">
					<label for="avtomobil_ban_novu_id"><span>*</span>Ban növü</label>
					<select name="avtomobil_ban_novu_id" tabindex="4" required="required"  id="avtomobil_ban_novu_id" class="form-control" onchange="SecimAlaniSecildi(this.id)"> 				
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
					<label for="avtomobil_veziyyeti_id"><span>*</span>Vəziyyəti</label>
					<select class="form-control" tabindex="5" id="avtomobil_veziyyeti_id" name="emlakin_veziyyeti_id" required="required" onchange="SecimAlaniSecildi(this.id)">
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
					<label for="avtomobil_yurus_km_id"><span>*</span>Yürüş km</label>
					<input type="number" tabindex="216" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="avto_yurus_km" required tabindex="9" class="form-control" id="avtomobil_yurus_km_id" placeholder="00000" oninput="ReqemYazildi(this.id)" onfocusout="ReqemYazildi(this.id)" maxlength = "100">
				</div>

				<div class="form-group col-6">
					<label for="avtomobil_buraxilis_ili_id"><span>*</span>Buraxılış ili</label>
					<select name="buraxilis_ili" tabindex="7" required="required"   id="avtomobil_buraxilis_ili_id" class="form-control" onchange="SecimAlaniSecildi(this.id)">
						<option value="" disabled="" selected="selected"> Seçin...</option>
						<?php 
						for($masn_il = $Il_tap; $masn_il >= 1900 ; $masn_il--) { ?>
							<option value="<?php echo $masn_il ?>"><?php echo $masn_il ?></option>
						<?php }
						?>
					</select>
				</div>

				<div class="form-group col-6">
					<label for="avto_suret_qutusu_id"><span>*</span>Sürət qutusu</label>
					<select name="avto_suret_qutusu_id" tabindex="8" required="required"  id="avto_suret_qutusu_id" class="form-control" onchange="SecimAlaniSecildi(this.id)" >
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
					<label for="avtomobil_yanacaq_id"><span>*</span>Yanacaq növü</label>
					<select name="avtomobil_yanacaq_id" tabindex="9" required="required"  id="avtomobil_yanacaq_id" class="form-control" onchange="SecimAlaniSecildi(this.id)">
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
					<label for="avto_muherrikin_hecmi"><span>*</span>Mühərrikin həcmi, sm
					3</label>
					<select name="avto_muherrikin_hecmi" tabindex="10" required="required"  id="avto_muherrikin_hecmi" class="form-control" onchange="SecimAlaniSecildi(this.id)">
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
					<label for="muherrikin_at_gucu_id"><span>*</span>Mühərrikin at gücü</label>
					<input type="number" tabindex="216" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="muherrikin_at_gucu_id" required tabindex="9" class="form-control" id="muherrikin_at_gucu_id" placeholder="00000" oninput="ReqemYazildi(this.id)" onfocusout="ReqemYazildi(this.id)" maxlength = "100">
				</div>

				<div class="form-group col-6">
					<label for="avto_otrucu_id"><span>*</span>Ötürücü</label>
					<select name="avto_otrucu_id" tabindex="12" name="avto_otrucu" id="avto_otrucu_id" required="required" class="form-control" onchange="SecimAlaniSecildi(this.id)" >
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
					<label for="reng_ad"><span>*</span>Rəngi</label>
					<select name="reng" tabindex="13"   id="reng_ad" class="form-control"  required="required" onchange="SecimAlaniSecildi(this.id)" >
						<option value="" disabled="" selected="selected"> Seçin...</option>
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
					<label for="qiymet_id"><span>*</span>Qiymət</label>
					<input type="number" tabindex="216" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="qiymet" required tabindex="9" class="form-control" id="qiymet_id" placeholder="00000" oninput="ReqemYazildi(this.id)"  onfocusout="ReqemYazildi(this.id)" maxlength = "100">
				</div>

				<div class="form-group col-2">
					<label for="pul_novu">AZN</label>
					<select id="pul_novu" class="form-control" name="pul_novu" tabindex="15"  onchange="SecimAlaniSecildi(this.id)">
						<option selected>AZN</option>
						<option>EUR</option>
						<option>USD</option>
					</select>
				</div>

				<div class="form-group col-6">
					<label for="elan_muellifi_id"><span>*</span>Elan müəllifi</label>
					<select class="form-control" id="elan_muellifi_id" name="elan_veren" tabindex="16" required="required" onchange="SecimAlaniSecildi(this.id)">
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
				<div id="kirabolmesi">
					<?php 
					if ($_POST['Deyer']==0) {
						?>
						<div class="form-group col-6">
							<label for="avtomobil_markasi_id"><span>*</span>Kira</label>								
							<select name="avtomobil_markasi_id" tabindex="2" required="required"  id="avtomobil_markasi_id" class="form-control" onchange="">
								<option disabled="disabled" value=""  selected="selected"> Secin...</option>											
								<option value="gunluk">Günlük</option>
								<option value="ayliq">Aylıq</option>							
							</select>
						</div>
					<?php } ?>
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
				</div>
			</div>
			<button class="btn btn-primary" tabindex="19" type="button" onclick="AvtomobilBirinciBolmeDavam()">Davam et..</button>
		</div>
	</div>
</div>





<div class="card all-dord">
	<div class="card-header" >
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left collapsed"  type="button" onclick="AvtomobilBirinciBolmeDavam()">
				<i class="fas fa-sitemap"></i>Detaylı özəlliklər
			</button>
		</h2>
	</div>
	<div id="elandedeydivi" style="display: none;" >
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
			<button class="btn btn-primary" tabindex="84" type="button" onclick="AvtomobilIkinciBolmeDavam()">Davam et..</button>
		</div>
	</div>
</div>
<div class="card all-photo">
	<div class="card-header">
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left collapsed"  type="button" onclick="AvtomobilIkinciBolmeDavam()">
				<i class="fas fa-images"></i>Şəkil yüklə 
			</button>
		</h2>
	</div>

	<div id="sekilyukledivi" style="display: none;" >
		<div class="card-body">
			<div class="container" id="sekilalani">   
				<div class="well" data-bind="fileDrag: multiFileData">
					<div class="form-group row">
						<div class="col-md-12">
							<input type="file"  onchange ="Elansekilsecildi()" accept=".jpg, .jpeg, .png, .jfif, .JPG, .JPEG, .PNG, .JFIF" id="pro-image" required="" name="pro-image[]"  class="form-control" multiple data-bind="fileInput: multiFileData, customFileInput: {
								buttonClass: 'btn btn-success',
								fileNameClass: 'disabled form-control',
								onClear: onClear,
								onInvalidFileDrop: onInvalidFileDrop
							}">


						</div>
						<div class="col-md-12 text-center">
							<!-- ko foreach: {data: multiFileData().dataURLArray, as: 'dataURL'} -->
							<img href="javascript:void(0)" onclick="$('#pro-image').click();" onchange ="Elansekilsecildi()" style="height: 100px; margin: 5px 15px;" class="img-rounded  thumb" data-bind="attr: { src: dataURL }, visible: dataURL" id="img">

							<button onClick="rotateImg(this)"  ><i class="fas fa-sync-alt"></i></button>
							<button  onclick="remove_image(this)" class="sil"><i class="fas fa-trash-alt"></i></button>
							<!-- /ko --> 
						</div> 
					</div> 
				</div>
			</div> 
			<button class="btn btn-primary" type="button" data-toggle="collapse" id="elansekilkon" data-target="#collapseFour" onclick="AvtomobilUcuncuBolmeDavam()">Davam et..</button>
		</div> 
		


	</div>

</div>

<div class="card all-dord">
	<div class="card-header">
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left collapsed" type="button" onclick="AvtomobilUcuncuBolmeDavam()">
				<i class="fas fa-map-marker-alt"></i> Ünvan
			</button>
		</h2>
	</div>
	<div id="unvandivi" style="display: none;" >
		<div class="card-body">
			<div class="row">
				<div class="col-md-4 mb-3">
					<label for="dovlet_id"><span>*</span>Ölkə</label>
					<div class="form-group">
						<?php
						$dovlet=$db->prepare("SELECT * FROM dovlet WHERE  Durum=:Durum order by Dovlet_Ad ASC");
						$dovlet->execute(array(
							'Durum'=>1));
							?>
							<select name="dovlet_id" tabindex="203"  required id="dovlet_id" class="custom-select" onchange="AvtomobilDovletSecildi(this.id)" >
								<option value="" disabled="" selected="selected"> Seçin...</option>
								<?php	while ($dovletcek=$dovlet->fetch(PDO::FETCH_ASSOC)) {?>
									<option	value="<?php echo $dovletcek['Dovlet_Id']; ?>"> <?php echo $dovletcek['Dovlet_Ad']; ?>
								</option> 
							<?php }?>
						</select>
					</div>
				</div>
				<style type="text/css">
					select{
						z-index: 0;
					}
					label{
						z-index: 1;
					}
				</style>
				<div id="menzilseher" class="col-md-4 mb-3" >
					<?php 
					$seher=$db->prepare("SELECT * FROM seher WHERE dovlet_id=:dovlet_id order by seher_ad ASC");
					$seher->execute(array(
						'dovlet_id'=>12	));
						?>
						<div class="form-group">
							<label   for="seher_id"><span>*</span>Şəhər</label>
							<div class="form-group">
								<select name="seher_id" tabindex="204" disabled="disabled"  required  class="custom-select" 
								onchange="AvtomobilSeherSecildi(this.id)">
								<option value="" disabled="" selected="selected">Secin...</option>
								<?php
								while ($sehercek=$seher->fetch(PDO::FETCH_ASSOC)) {
									?>
									<option value="<?php echo $sehercek['seher_id']; ?>"> <?php echo $sehercek['seher_ad']; ?>
								</option> 
							<?php }?>
						</select>
					</div>
				</div>
			</div>
			<div id="ryontelebi" class="col-md-4 mb-3">
				<div class="form-group">
					<label for="rayon_id"><span>*</span>Rayon</label>
					<div class="form-group">
						<?php 
						$rayon=$db->prepare("SELECT * FROM rayon WHERE rayon_durum=:rayon_durum order by rayon_ad ASC  ");
						$rayon->execute(array(
							'rayon_durum'=>1));
							?>
							<select name="rayon_id" tabindex="205" disabled="disabled"  required  class="form-control" onchange="RayonSecildi()" >
								<option value="" disabled="" selected="selected">Secin...</option>
								<?php
								while ($rayoncek=$rayon->fetch(PDO::FETCH_ASSOC)) {
									?>
									<option value="<?php echo $rayoncek['rayon_id']; ?>"> <?php echo $rayoncek['rayon_ad']; ?>
								</option> 
							<?php }?>
						</select>
					</div>
				</div> 	
			</div>
			<div class="col-md-4 mb-3">
				<label for="validationServer01"><span>*</span>Qəsəbə</label>
				<div class="form-group">
					<select class="custom-select" disabled="disabled" >
						<option value="">Siyahıdan seç...</option>
					</select>
				</div>
			</div>
			<div id="metrotelebi" class="col-md-4 mb-3">
				<label for="metro_id" id="metro_id_label"><span>*</span>Metro</label>
				<div class="form-group">
					<select class="custom-select" disabled="disabled"  onchange="MetroSecildi(this.value)" >
						<option value="">Siyahıdan seç...</option>	
					</select>
				</div>
			</div>
			<div id="nisangahtelebi" class="col-md-4 mb-3">
				<label for="nisangah_id" id="nisangah_id_label"><span>*</span>Nişangah</label>
				<div class="form-group">
					<select class="custom-select"  disabled="disabled" onchange="NisangahSecildi(this.value)" >
						<option value="">Siyahıdan seç...</option>
					</select>
				</div>
			</div>
		</div>
		<button class="btn btn-primary" type="button" onclick="AvtomobilDorduncuBolmeDavam()">Davam et..</button>
	</div>
</div>
</div>

<div class="card all-bes">
	<div class="card-header">
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left collapsed" id="yenielanelaqe" type="button" onclick="AvtomobilDorduncuBolmeDavam()">
				<i class="fas fa-id-card"></i>Əlaqə məlumatları
			</button>
		</h2>
	</div>

	<div id="elaqemelumatlari" style="display: none;" >
		<div class="card-body">
			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="Ad_Soyad"><span>*</span>Ad, Soyad</label>
					<input type="text" class="form-control" id="Ad_Soyad" 
					<?php if(isset($_SESSION["istifadeci"])){ ?>
						value=" <?php echo $usercek['user_ad'].' '.$usercek['user_soyad'] ?> " disabled=""
					<?php }else{ ?>
						name="ad_soyad" required
						<?php } ?>>
					</div>
					<div class="col-md-6 mb-3">
						<label for="E_Mail"><span>*</span>E-mail</label>
						<input type="email" class="form-control" id="E_Mail"
						<?php if(isset($_SESSION["istifadeci"])){ ?>
							value=" <?php echo $usercek['user_email'] ?> " disabled=""
						<?php }else{ ?>
							name="email"  required
						<?php } ?>
						>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="Telefon_Bir"><span>*</span>Telefon</label>
						<input type="tel" id="Telefon_Bir"
						<?php if(isset($_SESSION["istifadeci"])){ ?>
							value=" <?php echo $usercek['user_tel'] ?> " disabled="" class="form-control"
						<?php }else{ ?>
							name="telefon_bir" placeholder="(000) 000-00-00" required="" maxlength="20" minlength="10" class="form-control"
						<?php } ?>
						>
					</div>
					<div class="col-md-6 mb-3">
						<label for="Telefon_Iki">Telefon</label>
						<input type="tel" id="Telefon_Iki"
						<?php if(isset($_SESSION["istifadeci"])){ ?>
							value=" 
							<?php 
							$user_tel_iki=$usercek['user_tel_iki'];	
							if($user_tel_iki>0){
								echo  $usercek['user_tel_iki'];
							}else{}	 ?>
							" disabled="" class="form-control"
						<?php }else{ ?>
							name="telefon_iki" placeholder="(000) 000-00-00" maxlength="20" minlength="10" class="form-control"
						<?php } ?>
						>
					</div>
				</div>
				<button class="btn btn-primary" name="yenielan" id="elangonder" onclick="ElaniTamala()" type="button">Elanı Tamamla</button>
			</div>
		</div>

	</div>
