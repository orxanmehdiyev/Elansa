<?php 
require_once "_header.php";

?>

<div class="container">
	<div class="in-bread">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../">Ana səhifə</a></li>
				<li class="breadcrumb-item active" aria-current="page">Elan yerlesdir</li>
			</ol>
		</nav>
	</div>

	<div class="row ">
		<div class="col-12 e-profile">
			<div class="list-group" id="list-tab" role="tablist">
				<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
				href="#list-home" role="tab" aria-controls="home"><i class="fas fa-edit"></i><span>Elan
				ver</span></a>
				<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
				href="#list-profile" role="tab" aria-controls="profile"><i
				class="fas fa-list"></i><span>Elanlarim</span></a>
				<a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
				href="#list-messages" role="tab" aria-controls="messages"><i
				class="fas fa-users"></i><span>Profil</span></a>
			</div>
		</div>
		<div class="col-12">
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="list-home" role="tabpanel"
				aria-labelledby="list-home-list">
				<div class="accordion" id="accordionExample">
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
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-secondary active">
									<input type="radio" name="options" id="option1"
									autocomplete="off" checked> SATIŞ
								</label>
								<label class="btn btn-secondary">
									<input type="radio" name="options" id="option2"
									autocomplete="off"> KİRA
								</label>
								<label class="btn btn-secondary">
									<input type="radio" name="options" id="option3"
									autocomplete="off"> GÜNLÜK KİRA
								</label>
							</div>
							<div class="form-group col-12">
								<label for="validationServer1"><span>*</span>Elan
								Kateqoriyası</label>


								<select name="elan_katoqoriya_id" required tabindex="1" id="elan_katoqoriya_id" class="form-control" onchange="KataqoriyaTelebEt(this.value)">
									<option value="" disabled="disabled" selected="selected">Secin...</option>
									<?php
									$bolmesor = $db->prepare("SELECT * FROM bolme where bolme_sil_durum=:bolme_sil_durum and bolme_durum=:bolme_durum order by bolme_id ASC ");
									$bolmesor->execute(array(
										'bolme_sil_durum' => 0,
										'bolme_durum' => 1,
									));
									while ($bolmecek = $bolmesor->fetch(PDO::FETCH_ASSOC)) { ?>
										?>
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

							<div id="icerik" class="form-row" style="width: 110%; margin: 0; padding: 0; border: none;outline: none;"></div>

							


							
							
							
							
							
							
							
							
							
							
							
							
							
							
						</div>
						


					</div>
				</div>
			</div>


			
			<div class="card all-dord">
				<div class="card-header" id="headingTwo">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left collapsed" type="button"
						data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
						aria-controls="collapseTwo">
						<i class="fas fa-sitemap"></i>Detaylı özəlliklər
					</button>
				</h2>
			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
			data-parent="#accordionExample">
			<div class="card-body">
				<h3></h3>
				<h4>Texniki avadanlıq / təhlükəsizlik</h4>
				<div class="form-row">
					<div class="custom-control custom-checkbox col">
						<input type="checkbox" class="custom-control-input"
						id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Yüngül
						lehimli disklər</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck2">
						<label class="custom-control-label" for="customCheck2">ABS</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck3">
						<label class="custom-control-label" for="customCheck3">Lyuk</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck4">
						<label class="custom-control-label" for="customCheck4">Yağış
						sensoru</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck5">
						<label class="custom-control-label" for="customCheck5">Mərkəzi
						qapanma</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck6">
						<label class="custom-control-label" for="customCheck6">Park
						radarı</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck7">
						<label class="custom-control-label"
						for="customCheck7">Kondisioner</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck8">
						<label class="custom-control-label" for="customCheck8">Oturacaqların
						isidilməsi</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck9">
						<label class="custom-control-label" for="customCheck9">Dəri
						salon</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck10">
						<label class="custom-control-label" for="customCheck10">Ksenon
						lampalar</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck11">
						<label class="custom-control-label" for="customCheck11">Arxa görüntü
						kamerası</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck12">
						<label class="custom-control-label" for="customCheck12">Yan
						pərdələr</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck13">
						<label class="custom-control-label" for="customCheck13">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck14">
						<label class="custom-control-label" for="customCheck14">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck15">
						<label class="custom-control-label" for="customCheck15">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck16">
						<label class="custom-control-label" for="customCheck16">Check
						this</label>
					</div>
				</div>
				<h4>Daxili Təchizat</h4>
				<div class="form-row">
					<div class="custom-control custom-checkbox col">
						<input type="checkbox" class="custom-control-input"
						id="customCheck17">
						<label class="custom-control-label" for="customCheck17">Yüngül
						lehimli disklər</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck18">
						<label class="custom-control-label" for="customCheck18">ABS</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck3">
						<label class="custom-control-label" for="customCheck3">Lyuk</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck4">
						<label class="custom-control-label" for="customCheck4">Yağış
						sensoru</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck5">
						<label class="custom-control-label" for="customCheck5">Mərkəzi
						qapanma</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck6">
						<label class="custom-control-label" for="customCheck6">Park
						radarı</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck7">
						<label class="custom-control-label"
						for="customCheck7">Kondisioner</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck8">
						<label class="custom-control-label" for="customCheck8">Oturacaqların
						isidilməsi</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck9">
						<label class="custom-control-label" for="customCheck9">Dəri
						salon</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck10">
						<label class="custom-control-label" for="customCheck10">Ksenon
						lampalar</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck11">
						<label class="custom-control-label" for="customCheck11">Arxa görüntü
						kamerası</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck12">
						<label class="custom-control-label" for="customCheck12">Yan
						pərdələr</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck13">
						<label class="custom-control-label" for="customCheck13">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck14">
						<label class="custom-control-label" for="customCheck14">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck15">
						<label class="custom-control-label" for="customCheck15">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck16">
						<label class="custom-control-label" for="customCheck16">Check
						this</label>
					</div>
				</div>
				<h4>Xarici Təchizat</h4>
				<div class="form-row">
					<div class="custom-control custom-checkbox col">
						<input type="checkbox" class="custom-control-input"
						id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Yüngül
						lehimli disklər</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck2">
						<label class="custom-control-label" for="customCheck2">ABS</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck3">
						<label class="custom-control-label" for="customCheck3">Lyuk</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck4">
						<label class="custom-control-label" for="customCheck4">Yağış
						sensoru</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck5">
						<label class="custom-control-label" for="customCheck5">Mərkəzi
						qapanma</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck6">
						<label class="custom-control-label" for="customCheck6">Park
						radarı</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck7">
						<label class="custom-control-label"
						for="customCheck7">Kondisioner</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck8">
						<label class="custom-control-label" for="customCheck8">Oturacaqların
						isidilməsi</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck9">
						<label class="custom-control-label" for="customCheck9">Dəri
						salon</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck10">
						<label class="custom-control-label" for="customCheck10">Ksenon
						lampalar</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck11">
						<label class="custom-control-label" for="customCheck11">Arxa görüntü
						kamerası</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck12">
						<label class="custom-control-label" for="customCheck12">Yan
						pərdələr</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck13">
						<label class="custom-control-label" for="customCheck13">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck14">
						<label class="custom-control-label" for="customCheck14">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck15">
						<label class="custom-control-label" for="customCheck15">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck16">
						<label class="custom-control-label" for="customCheck16">Check
						this</label>
					</div>
				</div>
				<h4>Multimedia</h4>
				<div class="form-row">
					<div class="custom-control custom-checkbox col">
						<input type="checkbox" class="custom-control-input"
						id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Yüngül
						lehimli disklər</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck2">
						<label class="custom-control-label" for="customCheck2">ABS</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck3">
						<label class="custom-control-label" for="customCheck3">Lyuk</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck4">
						<label class="custom-control-label" for="customCheck4">Yağış
						sensoru</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck5">
						<label class="custom-control-label" for="customCheck5">Mərkəzi
						qapanma</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck6">
						<label class="custom-control-label" for="customCheck6">Park
						radarı</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck7">
						<label class="custom-control-label"
						for="customCheck7">Kondisioner</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck8">
						<label class="custom-control-label" for="customCheck8">Oturacaqların
						isidilməsi</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck9">
						<label class="custom-control-label" for="customCheck9">Dəri
						salon</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck10">
						<label class="custom-control-label" for="customCheck10">Ksenon
						lampalar</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck11">
						<label class="custom-control-label" for="customCheck11">Arxa görüntü
						kamerası</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck12">
						<label class="custom-control-label" for="customCheck12">Yan
						pərdələr</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck13">
						<label class="custom-control-label" for="customCheck13">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck14">
						<label class="custom-control-label" for="customCheck14">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck15">
						<label class="custom-control-label" for="customCheck15">Check
						this</label>
					</div>
					<div class="custom-control custom-checkbox col-3">
						<input type="checkbox" class="custom-control-input"
						id="customCheck16">
						<label class="custom-control-label" for="customCheck16">Check
						this</label>
					</div>
				</div>
				<button class="btn btn-primary" type="submit" data-toggle="collapse"
				data-target="#collapseThree">Davam et..</button>
			</div>
		</div>
	</div>






	<div class="card all-photo">
		<div class="card-header" id="headingThree">
			<h2 class="mb-0">
				<button class="btn btn-link btn-block text-left collapsed" type="button"
				data-toggle="collapse" data-target="#collapseThree"
				aria-expanded="false" aria-controls="collapseThree">
				<i class="fas fa-images"></i>Şəkil yüklə
			</button>
		</h2>
	</div>


	<div id="collapseThree" class="collapse" aria-labelledby="headingFour"
	data-parent="#accordionExample">
	<div class="card-body">
		<fieldset class="form-group">
			<a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload
			Image</a>
			<input type="file" id="pro-image" name="pro-image"
			style="display: none;" class="form-control" multiple>
		</fieldset>
		<div class="preview-images-zone">
			<div class="preview-image preview-show-1">
				<div class="image-cancel" data-no="1">x</div>
				<div class="image-zone"><img id="pro-img-1"
					src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw==">
				</div>
				<div class="tools-edit-image"><a href="javascript:void(0)"
					data-no="1" class="btn btn-light btn-edit-image">edit</a>
				</div>
			</div>
			<div class="preview-image preview-show-2">
				<div class="image-cancel" data-no="2">x</div>
				<div class="image-zone"><img id="pro-img-2"
					src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg">
				</div>
				<div class="tools-edit-image"><a href="javascript:void(0)"
					data-no="2" class="btn btn-light btn-edit-image">edit</a>
				</div>
			</div>
		</div>
		<button class="btn btn-primary" type="submit" data-toggle="collapse"
		data-target="#collapseFour">Davam et..</button>
	</div>
</div>
</div>

<div class="card all-addres">

	<div class="card-header" id="headingFour">
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left collapsed" type="button"
			data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
			aria-controls="collapseFour">
			<i class="fas fa-map-marker-alt"></i>Ünvan
		</button>
	</h2>
</div>





<div id="collapseFour" class="collapse" aria-labelledby="headingTwo"
data-parent="#accordionExample">
<div class="card-body">
	<form>
		<div class="form-row">
			<div class="col-md-4 mb-3">
				<label for="validationServer01"><span>*</span>Ölkə</label>
				<div class="form-group">
					<select class="custom-select" required>
						<option value="">Siyahıdan seç...</option>
						<option value="1">Azərbaycan</option>
						<option value="2">Türkiyə</option>
						<option value="3">Rusiya</option>
					</select>
					<div class="invalid-feedback">Example invalid custom select
						feedback
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<label for="validationServer01"><span>*</span>Şəhər</label>
				<div class="form-group">
					<select class="custom-select" required>
						<option value="">Siyahıdan seç...</option>
						<option value="1">Bakı</option>
						<option value="1">Naxçıvan</option>
						<option value="2">İstanbul</option>
						<option value="2">İzmir</option>
						<option value="3">Moskva</option>
					</select>
					<div class="invalid-feedback">Example invalid custom select
						feedback
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<label for="validationServer01"><span>*</span>Rayon</label>
				<div class="form-group">
					<select class="custom-select" required>
						<option value="">Siyahıdan seç...</option>
						<option value="1">Babək</option>
						<option value="2">Mersin</option>
						<option value="3">İvantevka</option>
					</select>
					<div class="invalid-feedback">Example invalid custom select
						feedback
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<label for="validationServer01"><span>*</span>Qəsəbə</label>
				<div class="form-group">
					<select class="custom-select" required>
						<option value="">Siyahıdan seç...</option>
						<option value="1">Babək</option>
						<option value="2">Mersin</option>
						<option value="3">İvantevka</option>
					</select>
					<div class="invalid-feedback">Example invalid custom select
						feedback
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<label for="validationServer01"><span>*</span>Metro</label>
				<div class="form-group">
					<select class="custom-select" required>
						<option value="">Siyahıdan seç...</option>
						<option value="1">Nərimanov</option>
						<option value="2">Xətai</option>
						<option value="3">Gənclik</option>
					</select>
					<div class="invalid-feedback">Example invalid custom select
						feedback
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<label for="validationServer01"><span>*</span>Nişangah</label>
				<div class="form-group">
					<select class="custom-select" required>
						<option value="">Siyahıdan seç...</option>
						<option value="1">28 Mall</option>
						<option value="2">Nəsimi bazarı</option>
						<option value="3">Neftçilər xəstəxanası</option>
					</select>
					<div class="invalid-feedback">Example invalid custom select
						feedback
					</div>
				</div>
			</div>
		</div>
		<button class="btn btn-primary" type="submit" data-toggle="collapse"
		data-target="#collapseFive">Davam et..</button>
	</form>
</div>
</div>
</div>








<div class="card all-bes">
	<div class="card-header" id="headingFive">
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left collapsed" type="button"
			data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
			aria-controls="bes">
			<i class="fas fa-id-card"></i>Əlaqə məlumatları
		</button>
	</h2>
</div>
<div id="collapseFive" class="collapse" aria-labelledby="headingFive"
data-parent="#accordionExample">
<div class="card-body">
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="validationTooltip01"><span>*</span>Ad, Soyad</label>
			<input type="text" class="form-control" id="validationTooltip01"
			placeholder="" value="" required>
		</div>
	</div>
	<div class="form-row">
		<div class="col-1">
			<label for="validationTooltip01"><span>*</span>Telefon</label>
			<input type="text" class="form-control" id="validationTooltip01"
			placeholder="+994" value="" required>
		</div>
		<div class="col-3">
			<input type="text" class="form-control" id="validationTooltip02"
			placeholder="77-777-77-77" value="" required>
		</div>
	</div>
	<button class="btn btn-primary" type="submit">Elanı Tamamla</button>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="list-profile" role="tabpanel"
aria-labelledby="list-profile-list">
</div>
<div class="tab-pane fade" id="list-messages" role="tabpanel"
aria-labelledby="list-messages-list">
<div class="accordion e-user" id="accordionExample1">
	<div class="card">
		<div class="card-header">
			<h2 class="mb-0">
				<button class="btn btn-link btn-block text-left">
					Profil melumatlari
				</button>
			</h2>
		</div>

		<div id="collapseOne1" class="collapse show">
			<div class="card-body">
				<form class="needs-validation" novalidate>
					<div class="form-row">
						<div class="col-md-6 ">
							<label for="validationCustom01"><span>*</span>Ad</label>
							<input type="text" class="form-control" id="validationCustom01"
							required>
						</div>
						<div class="col-md-6">
							<label for="validationCustom02"><span>*</span>Soyad</label>
							<input type="text" class="form-control" id="validationCustom02"
							required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<label for="validationCustom03"><span>*</span>E-mail </label>
							<input type="email" class="form-control" id="validationCustom03"
							required>
						</div>
						<div class="col-md-6">
							<label for="validationCustom04"><span>*</span>Şifrə</label>
							<input type="password" class="form-control"
							id="validationCustom04" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<label for="validationCustom05"><span>*</span>Region</label>
							<input type="text" class="form-control" id="validationCustom05"
							required>
						</div>
						<div class="col-md-6">
							<label for="validationCustom06"><span>*</span>Seher</label>
							<select class="custom-select" id="validationCustom06" required>
								<option selected disabled value=""><span>*</span>Secin...
								</option>
								<option>...</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<label for="validationCustom07"><span>*</span>Telefon</label>
							<input type="text" class="form-control bfh-phone"
							placeholder="+994776665544" id="validationCustom07"
							required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value=""
							id="invalidCheck" required>
							<label class="form-check-label" for="invalidCheck">
								Qayda və şərtlərlə razıyam.
							</label>
							<div class="invalid-feedback">
								Təsdiq edin
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Düzəliş et</button>
				</form>
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
<?php 
require_once "_footer.php";

?>
