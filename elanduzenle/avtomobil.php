<form   method="POST" action="islem/yeni_elan_islem.php" enctype="multipart/form-data" >
	<div class="row ">
		<div class="col-12 all-content">
			<div class="card-body">
				<div class="form-row">
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary <?php 
						if ($elancek['elanmeksedi']=="SATIŞ") {
							echo " active";
						}?> ">
						<input type="radio" name="elanmeksedi" id="satis" value="SATIŞ" <?php 
						if ($elancek['elanmeksedi']=="SATIŞ") {
							echo "checked";
						}?> > SATIŞ
					</label>
					<label class="btn btn-secondary <?php 
					if ($elancek['elanmeksedi']=="KİRA") {
						echo " active";
					}?>">
					<input type="radio" name="elanmeksedi"  value="KİRA"  id="kira" > KİRA
				</label>
				<label class="btn btn-secondary <?php 
				if ($elancek['elanmeksedi']=="GÜNLÜK KİRA") {
					echo " active";
				}?> ">
				<input type="radio" name="elanmeksedi"  value="GÜNLÜK KİRA"  id="GunlukKira" <?php 
				if ($elancek['elanmeksedi']=="GÜNLÜK KİRA") {
					echo "checked";
				}?>> GÜNLÜK KİRA
			</label>
		</div>						
	</div>
</div>
</div>





<div class="col-12">
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
			<div class="accordion" id="accordionExample">
				<div id="icerik">
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
						<div class="form-row">
							<div class="form-group col-6">
								<label for="avtomobil_yurus_km_id"><span>*</span>Marka</label>
								<input type="text" class="form-control" value="<?php echo $elancek['avtomobil_markasi_ad'] ?>" disabled="" >
							</div>

							<div class="form-group col-6">
								<label for="avtomobil_yurus_km_id"><span>*</span>Model</label>
								<input type="text" class="form-control" value="<?php echo $elancek['avtomobil_model_ad'] ?>" disabled="" >
							</div>

							<div class="form-group col-6">
								<label for="avtomobil_yurus_km_id"><span>*</span>Bann Növü</label>
								<input type="text" class="form-control" value="<?php echo $elancek['avtomobil_ban_novu_ad'] ?>" disabled="" >
							</div>

							<div class="form-group col-6">
								<label for="validationServer5" id="avtomobil_veziyyeti_id_label"><span>*</span>Vəziyyəti</label>
								<select class="form-control" tabindex="5" id="avtomobil_veziyyeti_id" name="emlakin_veziyyeti_id" required="required" onchange="AvtomobilinVeziyyetiSecildi()">
																	<?php 
									$emlakin_veziyyeti=$db->prepare("SELECT * FROM emlakin_veziyyeti where avtomobil_elanlari_ucun_durum=:avtomobil_elanlari_ucun_durum");
									$emlakin_veziyyeti->execute(array(
										'avtomobil_elanlari_ucun_durum'=>1));
										while ($emlakin_veziyyeti_cek=$emlakin_veziyyeti->fetch(PDO::FETCH_ASSOC)) { ?>
											<option <?php if ($emlakin_veziyyeti_cek['emlakin_veziyyeti_id']== $elancek['emlakin_veziyyeti_id']){
												echo 'selected="selected"';
											} ?>
												
											 value="<?php echo $emlakin_veziyyeti_cek['emlakin_veziyyeti_id'] ?>"><?php echo $emlakin_veziyyeti_cek['emlakin_veziyyeti_ad'] ?>
										</option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group col-6">
								<label for="avtomobil_yurus_km_id" id="avtomobil_yurus_km_Label_id" ><span>*</span>Yürüş km</label>
								<input type="number" class="form-control" tabindex="6" id="avtomobil_yurus_km_id" required="required" name="avto_yurus_km" placeholder="Misal: 130000" onkeydown="javascript: return event.keyCode == 69 ? false : true" onfocusout="AvtomobilYurusKmYazildi()" oninput="AvtomobilYurusKmYazildi()">
							</div>

							<div class="form-group col-6">
								<label for="avtomobil_buraxilis_ili_id" id="avtomobil_buraxilis_ili_label_id"><span>*</span>Buraxılış ili</label>
								<select name="buraxilis_ili" tabindex="7" required="required"   id="avtomobil_buraxilis_ili_id" class="form-control" onchange="AvtomobilBuraxilisİliSecildi()" >
									<option value="" disabled="" selected="selected"> Seçin...</option>
									<?php 
									for($masn_il = $Il_tap; $masn_il >= 1900 ; $masn_il--) { ?>
										<option value="<?php echo $masn_il ?>"><?php echo $masn_il ?></option>
									<?php }
									?>
								</select>
							</div>

							<div class="form-group col-6">
								<label for="avto_suret_qutusu_id" id="AutoSuretQutusuLabel"><span>*</span>Sürət qutusu</label>
								<select name="avto_suret_qutusu_id" tabindex="8" required="required"  id="avto_suret_qutusu_id" class="form-control" onchange="AvtoSuretQutusuSecildi()" >
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
								<label for="avtomobil_yanacaq_id" id="avtoyanacaqlabel"><span>*</span>Yanacaq növü</label>
								<select name="avtomobil_yanacaq_id" tabindex="9" required="required"  id="avtomobil_yanacaq_id" class="form-control" onchange="YanacaqNovSecildi()" >
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
								<label for="avto_muherrikin_hecmi" id="avto_muherrikin_hecmi_label"><span>*</span>Mühərrikin həcmi, sm
								3</label>
								<select name="avto_muherrikin_hecmi" tabindex="10" required="required"  id="avto_muherrikin_hecmi" class="form-control" onchange="AvtoMuherrikHecmiSecildi()" >
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
								<label for="muherrikin_at_gucu_id" id="muherrikin_at_gucu_id_label"><span>*</span>Mühərrikin at
								gücü</label>
								<input type="number" class="form-control" tabindex="11" id="muherrikin_at_gucu_id" name="muherrikin_at_gucu_id" required="required" placeholder="Misal: 130"  onkeydown="javascript: return event.keyCode == 69 ? false : true" onfocusout="MuherrikinAtGucuYazildi()" oninput="MuherrikinAtGucuYazildi()">
							</div>

							<div class="form-group col-6">
								<label for="avto_otrucu_id" id="avto_otrucu_id_label"><span>*</span>Ötürücü</label>
								<select name="avto_otrucu_id" tabindex="12" name="avto_otrucu"   id="avto_otrucu_id" required="required" class="form-control" onchange="OtrucuNovuSecildi()" >
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
								<label for="reng_ad" id="reng_ad_label"><span>*</span>Rəngi</label>
								<select name="reng" tabindex="13"   id="reng_ad" class="form-control"  required="required" onchange="AvtoRengSecildi()" >
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
								<label for="qiymet_id" id="qiymet_id_label"><span>*</span>Qiymət</label>
								<input type="number" class="form-control" id="qiymet_id" name="qiymet" tabindex="14" required="required" onkeydown="javascript: return event.keyCode == 69 ? false : true" onfocusout="QiymetYazildi()" oninput="QiymetYazildi()">
							</div>

							<div class="form-group col-2">
								<label id="valyuta_label">AZN</label>
								<select id="valyuta" class="form-control" name="pul_novu" tabindex="15" onchange="ValyutaNovuSecildi()">
									<option selected>AZN</option>
									<option>EUR</option>
									<option>USD</option>
								</select>
							</div>

							<div class="form-group col-6">
								<label for="elan_muellifi_id" id="elan_muellifi_id_label"><span>*</span>Elan müəllifi</label>
								<select class="form-control" id="elan_muellifi_id" name="elan_veren" tabindex="16" required="required" onchange="ElanMuellifiSecildi()">
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

							<div class="form-row check col-12">
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
								<button class="btn btn-primary" tabindex="19" type="button" data-toggle="collapse" onclick="ElanHaqqindaKontrol()" id="avtoelanhaqqindamelumat"
								data-target="#collapseTwo">Davam et..</button>
							</div>

						</div>
					</div>
				</div>
			</div>









			<div id="elandetayozellik">			
				<div class="card all-dord">
					<div class="card-header" id="headingTwo">
						<h2 class="mb-0">
							<button class="btn btn-link btn-block text-left collapsed"  type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"  onclick="ElanHaqqindaKontrol()" id="avtodetayozellikietrafli" aria-controls="collapseTwo" id="avtodetayozellikietrafli">
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
								<div class="form-row">
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


















	</div>
</div>


</div>
</div>
</div>
</form>