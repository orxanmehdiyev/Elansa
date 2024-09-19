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
	<form method="POST" id="Yeni_Elan_Formu" enctype="multipart/form-data" >
		<div class="row ">
			<div class="col-12 all-content">
				<div class="card-body">
					<div class="row">
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-secondary active" onclick="KiraTemizle()">
								<input type="radio" name="elanmeksedi" id="satis" value="SATIŞ" checked> SATIŞ
							</label>
							<label class="btn btn-secondary"  onclick="KiraYaz()">
								<input type="radio" name="elanmeksedi"  value="KİRA"  id="kira"> KİRA/GÜNLÜK KİRA
							</label>
						</div>
						<div class="form-group col-6">
							<label for="karoqoriya_id" id="elan_katoqoriya_id_label"><span>*</span>Elan Kateqoriyası</label>
							<select name="karoqoriya_id" required tabindex="1" id="karoqoriya_id" class="form-control col-12" onchange="KataqoriyaSec(this.value)" >
								<option value="" disabled="disabled" selected="selected">Secin...</option>
								<?php
								$bolmesor = $db->prepare("SELECT * FROM bolme where bolme_sil_durum=:bolme_sil_durum and bolme_durum=:bolme_durum order by bolme_id ASC ");
								$bolmesor->execute(array(
									'bolme_sil_durum' => 0,
									'bolme_durum' => 1
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
				<div class="tab-content">
					<div class="tab-pane fade show active" >
						<div class="accordion" >
							<div id="icerik">

								<div class="card all-content">
									<div class="card-header">
										<h2 class="mb-0">
											<button class="btn btn-link btn-block text-left" >
												<i class="fas fa-info-circle"></i>Elan haqqında məlumat <span>*</span>
											</button>
										</h2>
									</div>
								</div>

								<div class="card all-dord">
									<div class="card-header">
										<h2 class="mb-0">
											<button class="btn btn-link btn-block text-left">
												<i class="fas fa-sitemap"></i>Detaylı özəlliklər
											</button>
										</h2>
									</div>
								</div>

								<div class="card all-photo">
									<div class="card-header">
										<h2 class="mb-0">
											<button class="btn btn-link btn-block text-left">
												<i class="fas fa-images"></i>Şəkil yüklə 
											</button>
										</h2>
									</div>
								</div>

								<div class="card all-dord">
									<div class="card-header">
										<h2 class="mb-0">
											<button class="btn btn-link btn-block text-left" >
												<i class="fas fa-map-marker-alt"></i> Ünvan
											</button>
										</h2>
									</div>
								</div>

								<div class="card all-bes">
									<div class="card-header">
										<h2 class="mb-0">
											<button class="btn btn-link btn-block text-left">
												<i class="fas fa-id-card"></i>Əlaqə məlumatları
											</button>
										</h2>
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
<?php require_once "_footer.php" ?>
