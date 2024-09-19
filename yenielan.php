<?php require_once "_header.php"; ?>



<div class="container">

	<div class="in-bread">

		<nav aria-label="breadcrumb">

			<ol class="breadcrumb">

				<li class="breadcrumb-item"><a href="#">Ana səhifə</a></li>

				<li class="breadcrumb-item active" aria-current="page">Elan yerlesdir</li>

			</ol>

		</nav>

	</div>

	<form   method="POST" action="islem/yeni_elan_islem.php" enctype="multipart/form-data" >

		<div class="row ">

			<div class="col-12 all-content">

				<div class="card-body">

					<div class="row">

						<div class="btn-group btn-group-toggle" data-toggle="buttons">

							<label class="btn btn-secondary active">

								<input type="radio" name="elanmeksedi" id="satis" value="SATIŞ" checked> SATIŞ

							</label>

							<label class="btn btn-secondary">

								<input type="radio" name="elanmeksedi"  value="KİRA"  id="kira"> KİRA/GÜNLÜK KİRA

							</label>



						</div>

						<div class="form-group col-6">

							<label for="karoqoriya_id" id="elan_katoqoriya_id_label"><span>*</span>Elan Kateqoriyası</label>

							<select name="karoqoriya_id" required tabindex="1" id="karoqoriya_id" class="form-control col-12" onchange="KataqoriyaTelebEt(this.value)">

								<option value="" disabled="disabled" selected="selected">Secin...</option>

								<?php

								$bolmesor = $db->prepare("SELECT * FROM bolme where bolme_sil_durum=:bolme_sil_durum and bolme_durum=:bolme_durum order by bolme_id ASC ");

								$bolmesor->execute(array(

									'bolme_sil_durum' => 0,

									'bolme_durum' => 1,

								));

								while ($bolmecek = $bolmesor->fetch(PDO::FETCH_ASSOC)) { ?>									

									<optgroup label="<?php echo $bolmecek['bolme_ad'] ?>">

										<?php

										$kataqoriyasor = $db->prepare("SELECT * FROM karoqoriya where bolme_id=:bolme_id and karoqoriya_durum=:karoqoriya_durum and karoqoriya_sil_durum=:karoqoriya_sil_durum order by karoqoriya_sira ASC ");

										$kataqoriyasor->execute(array(

											'bolme_id' => $bolmecek['bolme_id'],

											'karoqoriya_durum' => 1,

											'karoqoriya_sil_durum' => 0

										));

										while ($kataqoriyacek = $kataqoriyasor->fetch(PDO::FETCH_ASSOC)) { ?>

											<option value="<?php echo $kataqoriyacek['karoqoriya_id'] ?>"><?php echo $kataqoriyacek['karoqoriya_ad'] ?></option>

										<?php } ?>

									</optgroup>

								<?php } ?>

							</select>

						</div>

					</div>

				</div>

			</div>











			<div class="col-12">

				<div class="tab-content" id="nav-tabContent">

					<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

						<div class="accordion" id="accordionExample">

							<div id="icerik">

								<div class="card all-content">

									<div class="card-header" id="headingOne">

										<h2 class="mb-0">

											<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"  aria-expanded="true" aria-controls="collapseOne" onclick="ElanHaqqindaKontrol()" id="avtoelanhaqqindamelumat" >

												<i class="fas fa-info-circle"></i>Elan haqqında məlumat <span>*</span>

											</button>

										</h2>

									</div>				

								</div>

								<div class="card all-dord">

									<div class="card-header" id="headingTwo">

										<h2 class="mb-0">

											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"  onclick="ElanHaqqindaKontrol()" id="avtodetayozellikietrafli" aria-expanded="false" aria-controls="collapseTwo"><i class="fas fa-sitemap"></i>Detaylı özəlliklər

											</button>

										</h2>

									</div>

								</div>

							</div>











							<div class="card all-photo">

								<div class="card-header" id="headingThree">

									<h2 class="mb-0">

										<button class="btn btn-link btn-block text-left collapsed"  id="yenielansekil" type="button" data-toggle="collapse" onclick="ElanHaqqindaKontrol()" aria-expanded="false" aria-controls="collapseThree">

											<i class="fas fa-images"></i>Şəkil yüklə 

										</button>

									</h2>

								</div>

								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
										<div class="container">   
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
										<button class="btn btn-primary" type="button" data-toggle="collapse" id="elansekilkon" data-target="#collapseFour" onclick="ElanSekilKontrol()">Davam et..</button>
									</div> 
									<script src='assets/js/knockout-min.js'></script>
									<script src='assets/js/knockout-file-bindings.js'></script>
									<script type="text/javascript">
										let rotation = 0;
										function rotateImg(e) {
										      rotation += 90; 
										      if (rotation === 360) { 										  
										        rotation = 0;
										      }
										     e.previousElementSibling.style.transform = `rotate(${rotation}deg)`;
										    }
										  </script>
										  <script type="text/javascript">
										  	function remove_image(e){
										  		var rr=e.previousElementSibling;
										  		var	dd=rr.previousElementSibling;
										  		e.remove();
										  		dd.remove();
										  		rr.remove();
										  	} 							
										  </script>
										  <script>
										  	var viewModel = {};
										  	viewModel.fileData = ko.observable({
										  		dataURL: ko.observable(),
										        // can add "fileTypes" observable here, and it will override the "accept" attribute on the file input
										        // fileTypes: ko.observable('.xlsx,image/png,audio/*')
										      });
										  	viewModel.multiFileData = ko.observable({ dataURLArray: ko.observableArray() });
										  	viewModel.onClear = function (fileData) {
										  		if (confirm('Are you sure?')) {
										  			fileData.clear && fileData.clear();
										  		}
										  	};
										  	viewModel.debug = function () {
										  		window.viewModel = viewModel;
										  		console.log(ko.toJSON(viewModel));
										  		console.log(viewModel.multiFileData())
										  		console.log(viewModel.multiFileData().dataURLArray());
										  		console.log(viewModel.multiFileData().fileArray());
										  		debugger;
										  	};
										  	viewModel.onInvalidFileDrop = function(failedFiles) {
										  		var fileNames = [];
										  		for (var i = 0; i < failedFiles.length; i++) {
										  			fileNames.push(failedFiles[i].name);
										  		}
										  		var message = 'Invalid file type: ' + fileNames.join(', ');
										  		alert(message)
										  		console.error(message);
										  	};
										  	ko.applyBindings(viewModel);
										  </script>
							<!--div class="card-body">

								<div class="container">

									<fieldset class="form-group">

										<a href="javascript:void(0)" onclick="$('#pro-image').click();" onchange ="Elansekilsecildi()" id="sekilsecimiucun">Şəkil secin</a>

										<input type="file"  onchange ="Elansekilsecildi()" accept=".jpg, .jpeg, .png, .jfif, .JPG, .JPEG, .PNG, .JFIF" id="pro-image" required="" name="pro-image[]"  class="form-control" multiple>

									</fieldset>

									<div class="preview-images-zone" id="sekilsecimalani">



									</div>

								</div>

								<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

								<button class="btn btn-primary" type="button" data-toggle="collapse" id="elansekilkon" data-target="#collapseFour" onclick="ElanSekilKontrol()">Davam et..</button>

							</div-->

						</div>

					</div>





















					<div class="card all-dord">

						<div class="card-header" id="headingFour">

							<h2 class="mb-0">

								<button class="btn btn-link btn-block text-left collapsed" id="yenielanunvan" type="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour" onclick="ElanHaqqindaKontrol();ElanSekilKontrol()">

									<i class="fas fa-map-marker-alt"></i> Ünvan

								</button>

							</h2>

						</div>

						<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">

							<div class="card-body">

								<div class="row">

									<div class="col-md-4 mb-3">

										<label for="dovlet_id" id="dovlet_id_label"><span>*</span>Ölkə</label>

										<div class="form-group">

											<?php 

											$dovlet=$db->prepare("SELECT * FROM dovlet WHERE  Durum=:Durum order by Dovlet_Ad ASC  ");

											$dovlet->execute(array(

												'Durum'=>1));

												?>

												<select name="dovlet_id" tabindex="203"  required id="dovlet_id" class="custom-select" onchange="DovletSecildi(this.value); RayonYoxlanis(this.value);NisangahYoxlanis(this.value)" >

													<option value="" disabled="" selected="selected"> Seçin...</option>

													<?php

													while ($dovletcek=$dovlet->fetch(PDO::FETCH_ASSOC)) {

														?>

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

											<label   for="seher_id" id="seher_id_label"> <span>*</span>Şəhər</label>

											<div class="form-group">

												<select name="seher_id" tabindex="204" disabled="disabled"  required  class="custom-select" 

												onchange="SeherSecildi(this.value); MetroYoxlanis(this.value)">

												<option value="" disabled="" selected="selected">Secin...

												</option>

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

									<label for="rayon_id" id="rayon_id_label" ><span>*</span>Rayon</label>

									<div class="form-group">

										<?php 

										$rayon=$db->prepare("SELECT * FROM rayon WHERE rayon_durum=:rayon_durum order by rayon_ad ASC  ");

										$rayon->execute(array(

											'rayon_durum'=>1));

											?>

											<select name="rayon_id" tabindex="205" disabled="disabled"  required  class="form-control" onchange="RayonSecildi()" >

												<option value="" disabled="" selected="selected">Secin...

												</option>

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

						<button class="btn btn-primary" type="button" data-toggle="collapse" onclick="unvankontrol();ElanSekilKontrol()" id="UnvanYoxlanis"

						data-target="#collapseFive">Davam et..</button>

					</div>

				</div>

			</div>

			<div class="card all-bes">

				<div class="card-header" id="headingFive">

					<h2 class="mb-0">

						<button class="btn btn-link btn-block text-left collapsed" id="yenielanelaqe" type="button" data-toggle="collapse"  aria-expanded="false" aria-controls="bes" onclick="ElanHaqqindaKontrol();ElanSekilKontrol();unvankontrol()">

							<i class="fas fa-id-card"></i>Əlaqə məlumatları

						</button>

					</h2>

				</div>

				<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">

					<div class="card-body">

						<div class="row">

							<div class="col-md-6 mb-3">

								<label for="validationTooltip01"><span>*</span>Ad, Soyad</label>

								<input type="text" class="form-control" id="validationTooltip01" 

								<?php if(isset($_SESSION["istifadeci"])){ ?>

									value=" <?php echo $usercek['user_ad'].' '.$usercek['user_soyad'] ?> " disabled=""

								<?php }else{ ?>

									name="ad_soyad" required

								<?php } ?>

								>

							</div>

							<div class="col-md-6 mb-3">

								<label for="validationTooltip02"><span>*</span>E-mail</label>

								<input type="email" class="form-control" id="validationTooltip02"

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

								<label for="validationTooltip01"><span>*</span>Telefon</label>

								<input type="tel" id="telefon_bir"



								<?php if(isset($_SESSION["istifadeci"])){ ?>

									value=" <?php echo $usercek['user_tel'] ?> " disabled="" class="form-control"

								<?php }else{ ?>

									name="telefon_bir" placeholder="(000) 000-00-00" required="" maxlength="20" minlength="10" class="form-control"

								<?php } ?>

								>







							</div>

							<div class="col-md-6 mb-3">

								<label for="validationTooltip02">Telefon</label>

								<input type="tel" id="telefon_iki"



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





						<button class="btn btn-primary" name="yenielan" type="submit">Elanı Tamamla</button>

					</div>

				</div>

			</div>

		</div>

	</div>





</div>

</div>

</div>

</form>

</div>

</div>

<?php require_once "anliq_yenileme/avtomobilelani.php" ?>

<?php require_once "anliq_yenileme/menziller.php" ?>

<?php require_once "anliq_yenileme/qarajlar.php" ?>

<?php require_once "anliq_yenileme/obyektler.php" ?>

<?php require_once "anliq_yenileme/torpaklar.php" ?>

<?php require_once "anliq_yenileme/villalar.php" ?>

<?php require_once "anliq_yenileme/heyetevleri.php" ?>

<?php require_once "_footer.php" ?>

<!--script src="assets/js/upload-img.js"></script>

<script type="text/javascript">

	$(document).ready(function() {

		document.getElementById('pro-image').addEventListener('change', readImage, false);



		$( ".preview-images-zone" ).sortable();



		$(document).on('click', '.image-cancel', function() {

			let no = $(this).data('no');

			$(".preview-image.preview-show-"+no).remove();

		});



	});







	var num = 0;

	function readImage() {

		if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object

        var output = $(".preview-images-zone");



        for (let i = 0; i < 15; i++) {

        	var file = files[i];

        	if (!file.type.match('image')) continue;



        	var picReader = new FileReader();



        	picReader.addEventListener('load', function (event) {

        		var picFile = event.target;

        		var html =  '<div class="preview-image preview-show-' + num + '">' +

        		'<div class="image-cancel" data-no="' + num + '">x</div>' +

        		'<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +              

        		'</div>';



        		output.append(html);

        		num = num + 1;

        	});



        	picReader.readAsDataURL(file);

        }

        $("#pro-image").val('');

    } else {

    	console.log('Browser not support');

    }

}





</script-->

