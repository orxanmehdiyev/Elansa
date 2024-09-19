<?php 
require_once "../_admin/Ayarlar/ayarlar.php";
if($_GET){
	print_r($_REQUEST["elanverennovu_id"]);
exit;
	$sql="SELECT * FROM elan WHERE karoqoriya_id=1 and yayim_durumu=2";

	if (isset($_REQUEST["avto_model"])) {	
			$avtomobil_markasi_id= implode(",",$_REQUEST["avto_model"]);
			$sql.=" and  avtomobil_markasi_id IN ($avtomobil_markasi_id)";
	}

	if (isset($_REQUEST["avtomobil_ban_novu_id"])) {
		$avtomobil_ban_novu_id= implode(",",$_REQUEST["avtomobil_ban_novu_id"]);
		$sql.=" and  avtomobil_ban_novu_id IN ($avtomobil_ban_novu_id)";
	}

	if (isset($_REQUEST["avto_marka"])) {
		$avtomobil_model_id= implode(",",$_REQUEST["avto_marka"]);
		$sql.=" and  avtomobil_model_id IN ($avtomobil_model_id)";
	}

	if (isset($_REQUEST["emlakin_veziyyeti_id"])) {
		$emlakin_veziyyeti_id= implode(",",$_REQUEST["emlakin_veziyyeti_id"]);
		$sql.=" and  emlakin_veziyyeti_id IN ($emlakin_veziyyeti_id)";
	}

	if (isset($_REQUEST["avto_suret_qutusu_id"])) {
		$avto_suret_qutusu_id= implode(",",$_REQUEST["avto_suret_qutusu_id"]);
		$sql.=" and  avto_suret_qutusu_id IN ($avto_suret_qutusu_id)";
	}

	if (isset($_REQUEST["yanacaq_id"])) {
		$yanacaq_id= implode(",",$_REQUEST["yanacaq_id"]);
		$sql.=" and  yanacaq_id IN ($yanacaq_id)";
	}

	if (isset($_REQUEST["avto_otrucu_id"])) {
		$avto_otrucu_id= implode(",",$_REQUEST["avto_otrucu_id"]);
		$sql.=" and  avto_otrucu_id IN ($avto_otrucu_id)";
	}

	if (isset($_REQUEST["reng_id"])) {
		$reng_id= implode(",",$_REQUEST["reng_id"]);
		$sql.=" and  reng_id IN ($reng_id)";
	}

	if (isset($_REQUEST["elanverennovu_id"])) {
		$elanverennovu_id= implode(",",$_REQUEST["elanverennovu_id"]);
		$sql.=" and  elanverennovu_id IN ($elanverennovu_id)";
	}

	if (isset($_REQUEST["baslagictarix"])) {
		if ($_REQUEST["baslagictarix"]>0) {
			$baslagictarix= $_REQUEST["baslagictarix"];
			$sql.=" and  buraxilis_ili>=$baslagictarix";
		}
	}

	if (isset($_REQUEST["bitistarix"])) {
		if ($_REQUEST["bitistarix"]>0) {
			$bitistarix= $_REQUEST["bitistarix"];
			$sql.=" and  buraxilis_ili<=$bitistarix";
		}		
	}

	if (isset($_REQUEST["muherrikhecmimin"])) {
		if ($_REQUEST["muherrikhecmimin"]>0) {
			$muherrikhecmimin= $_REQUEST["muherrikhecmimin"];
			$sql.=" and  avtomobilmuherrikhecmi_ad>=$muherrikhecmimin";
		}		
	}

	if (isset($_REQUEST["muherrikhecmimax"])) {
		if ($_REQUEST["muherrikhecmimax"]>0) {
			$muherrikhecmimax= $_REQUEST["muherrikhecmimax"];
			$sql.=" and  avtomobilmuherrikhecmi_ad<=$muherrikhecmimax";
		}		
	}

	if (isset($_REQUEST["avto_yurus_km_min"])) {
		if ($_REQUEST["avto_yurus_km_min"]>0) {
			$avto_yurus_km_min= $_REQUEST["avto_yurus_km_min"];
			$sql.=" and  avto_yurus_km>=$avto_yurus_km_min";
		}		
	}

	if (isset($_REQUEST["avto_yurus_km_max"])) {
		if ($_REQUEST["avto_yurus_km_max"]>0) {
			$avto_yurus_km_max= $_REQUEST["avto_yurus_km_max"];
			$sql.=" and  avto_yurus_km<=$avto_yurus_km_max";
		}		
	}



	if (isset($_REQUEST["Filtir_At_Gucu_Min"])) {
		if ($_REQUEST["Filtir_At_Gucu_Min"]>0) {
			$Filtir_At_Gucu_Min= $_REQUEST["Filtir_At_Gucu_Min"];
			$sql.=" and  avtomobilmuherrikhecmi_ad>=$Filtir_At_Gucu_Min";
		}		
	}

	if (isset($_REQUEST["Filtir_At_Gucu_Max"])) {
		if ($_REQUEST["Filtir_At_Gucu_Max"]>0) {
			$Filtir_At_Gucu_Max= $_REQUEST["Filtir_At_Gucu_Max"];
			$sql.=" and  avtomobilmuherrikhecmi_ad>=$Filtir_At_Gucu_Max";
		}		
	}

	if (isset($_REQUEST["Filtir_Avto_Qiymet_Min"])) {
		if ($_REQUEST["Filtir_Avto_Qiymet_Min"]>0) {
			$Filtir_Avto_Qiymet_Min= $_REQUEST["Filtir_Avto_Qiymet_Min"];
			$sql.=" and  qiymet>=$Filtir_Avto_Qiymet_Min";
		}		
	}

	if (isset($_REQUEST["Filtir_Avto_Qiymet_Max"])) {
		if ($_REQUEST["Filtir_Avto_Qiymet_Max"]>0) {
			$Filtir_Avto_Qiymet_Max= $_REQUEST["Filtir_Avto_Qiymet_Max"];
			$sql.=" and  qiymet<=$Filtir_Avto_Qiymet_Max";
		}		
	}





	$neqliyyatsor = $db->prepare($sql." order by elan_id DESC");	
	$neqliyyatsor->execute();

	?>



	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-bir-tab" data-toggle="pill" href="#pills-bir" role="tab" aria-controls="pills-bir" aria-selected="true">Bugün</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-iki-tab" data-toggle="pill" href="#pills-iki" role="tab" aria-controls="pills-iki" aria-selected="false">Çox
					baxılan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-uc-tab" data-toggle="pill" href="#pills-uc" role="tab" aria-controls="pills-uc" aria-selected="false">Azalan
					qiymət</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-dord-tab" data-toggle="pill" href="#pills-dord" role="tab" aria-controls="pills-dord" aria-selected="false">Artan
					qiymət</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-bir" role="tabpanel" aria-labelledby="pills-bir-tab">
				<div class="reds four">
					<?php 
					$neqliyyatsor = $db->prepare($sql." order by elan_id DESC");	
					$neqliyyatsor->execute();								
					while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="klon detaylinki ads" style="cursor: pointer;" data-href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" >
							<div class="card rounded">
								<div class="card-image">
									<?php   if ($neqliyyatcek['VIP']==1) { ?>
										<span class="ribbon1"><span>VIP</span></span>
									<?php } 
									if ($neqliyyatcek['salon_durm']==1) {
										?>
										<div class="wrap"> <span class="ribbon6">SALON</span></div>
									<?php }    
									$sekil= json_decode($neqliyyatcek['sekil']);
									?>

									<div class="img-kart"><img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
									</div>
								</div>
								<div class="card-image-overlay  ">
									<span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili']?></span> /
									<span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
									<span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km']?>km</span>
								</div>
								<div class="card-body text-center">
									<div class="ad-title  ">
										<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										<ul>
											<li>
												<span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
											</li>
											<li>
												<span>/</span>
											</li>
											<li>
												<?php 
												$elantarixi= $neqliyyatcek['TarixSaat'];
												$parcalanmistarix = explode (" ",$elantarixi);
												$saattam=explode (":",$parcalanmistarix[1])

												?>
												<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
											</li>
										</ul>
									</div>
									<a class="ad-btn" href="elan-in-page-hur.html"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?></a>
								</div>
							</div>
						</div>

					<?php } ?>
				</div>
			</div>



















			<div class="tab-pane fade" id="pills-iki" role="tabpanel" aria-labelledby="pills-iki-tab">
				<div class="reds four">
					<?php 
					$neqliyyatsor = $db->prepare($sql." order by ebaxis_sayi DESC");	
					$neqliyyatsor->execute();								
					while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="klon detaylinki ads" style="cursor: pointer;" data-href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" >
							<div class="card rounded">
								<div class="card-image">
									<?php   if ($neqliyyatcek['VIP']==1) { ?>
										<span class="ribbon1"><span>VIP</span></span>
									<?php } 
									if ($neqliyyatcek['salon_durm']==1) {
										?>
										<div class="wrap"> <span class="ribbon6">SALON</span></div>
									<?php }    
									$sekil= json_decode($neqliyyatcek['sekil']);
									?>

									<div class="img-kart"><img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
									</div>
								</div>
								<div class="card-image-overlay  ">
									<span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili']?></span> /
									<span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
									<span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km']?>km</span>
								</div>
								<div class="card-body text-center">
									<div class="ad-title  ">
										<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										<ul>
											<li>
												<span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
											</li>
											<li>
												<span>/</span>
											</li>
											<li>
												<?php 
												$elantarixi= $neqliyyatcek['TarixSaat'];
												$parcalanmistarix = explode (" ",$elantarixi);
												$saattam=explode (":",$parcalanmistarix[1])

												?>
												<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
											</li>
										</ul>
									</div>
									<a class="ad-btn" href="elan-in-page-hur.html"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?></a>
								</div>
							</div>
						</div>

					<?php } ?>
				</div>
			</div>



			<div class="tab-pane fade" id="pills-uc" role="tabpanel" aria-labelledby="pills-uc-tab">
				<div class="reds four">
					<?php 
					$neqliyyatsor = $db->prepare($sql."order by qiymet DESC");	
					$neqliyyatsor->execute();	

					while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="klon detaylinki ads" style="cursor: pointer;" data-href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" >
							<div class="card rounded">
								<div class="card-image">
									<?php   if ($neqliyyatcek['VIP']==1) { ?>
										<span class="ribbon1"><span>VIP</span></span>
									<?php } 
									if ($neqliyyatcek['salon_durm']==1) {
										?>
										<div class="wrap"> <span class="ribbon6">SALON</span></div>
									<?php }    
									$sekil= json_decode($neqliyyatcek['sekil']);
									?>

									<div class="img-kart"><img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
									</div>
								</div>
								<div class="card-image-overlay  ">
									<span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili']?></span> /
									<span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
									<span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km']?>km</span>
								</div>
								<div class="card-body text-center">
									<div class="ad-title  ">
										<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										<ul>
											<li>
												<span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
											</li>
											<li>
												<span>/</span>
											</li>
											<li>
												<?php 
												$elantarixi= $neqliyyatcek['TarixSaat'];
												$parcalanmistarix = explode (" ",$elantarixi);
												$saattam=explode (":",$parcalanmistarix[1])

												?>
												<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
											</li>
										</ul>
									</div>
									<a class="ad-btn" href="elan-in-page-hur.html"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?></a>
								</div>
							</div>
						</div>

					<?php } ?>
				</div>
			</div>





			<div class="tab-pane fade" id="pills-dord" role="tabpanel" aria-labelledby="pills-dord-tab">

				<div class="reds four">
					<?php 
					$neqliyyatsor = $db->prepare($sql." order by qiymet ASC");	
					$neqliyyatsor->execute();	


					while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="klon detaylinki ads" style="cursor: pointer;" data-href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" >
							<div class="card rounded">
								<div class="card-image">
									<?php   if ($neqliyyatcek['VIP']==1) { ?>
										<span class="ribbon1"><span>VIP</span></span>
									<?php } 
									if ($neqliyyatcek['salon_durm']==1) {
										?>
										<div class="wrap"> <span class="ribbon6">SALON</span></div>
									<?php }    
									$sekil= json_decode($neqliyyatcek['sekil']);
									?>

									<div class="img-kart"><img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
									</div>
								</div>
								<div class="card-image-overlay  ">
									<span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili']?></span> /
									<span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
									<span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km']?>km</span>
								</div>
								<div class="card-body text-center">
									<div class="ad-title  ">
										<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										<ul>
											<li>
												<span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
											</li>
											<li>
												<span>/</span>
											</li>
											<li>
												<?php 
												$elantarixi= $neqliyyatcek['TarixSaat'];
												$parcalanmistarix = explode (" ",$elantarixi);
												$saattam=explode (":",$parcalanmistarix[1])

												?>
												<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
											</li>
										</ul>
									</div>
									<a class="ad-btn" href="elan-in-page-hur.html"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?></a>
								</div>
							</div>
						</div>

					<?php } ?>
				</div>

			</div>
		</div>
	</div>





	<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-birs-tab" data-toggle="pill" href="#pills-birs" role="tab" aria-controls="pills-birs" aria-selected="true">Bugün</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-ikis-tab" data-toggle="pill" href="#pills-ikis" role="tab" aria-controls="pills-ikis" aria-selected="false">Çox
				baxılan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-ucs-tab" data-toggle="pill" href="#pills-ucs" role="tab" aria-controls="pills-ucs" aria-selected="false">Azalan
				qiymət</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-dords-tab" data-toggle="pill" href="#pills-dords" role="tab" aria-controls="pills-dords" aria-selected="false">Artan
				qiymət</a>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-birs" role="tabpanel" aria-labelledby="pills-birs-tab">
				<div class="row">

					<?php 
					$neqliyyatsor = $db->prepare($sql." order by elan_id desc");	
					$neqliyyatsor->execute();	

					while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col-6" >
							<a class="iki-tab" href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>"" title="">
								<div class="iki-tabphoto">
									<?php     
									$sekil= json_decode($neqliyyatcek['sekil']);
									?>
									<img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
								</div>
								<div class="iki-tabcon">
									<ul>
										<li>
											<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										</li>
										<li>
											<div class="card-image-overlay">
												<span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili']?></span> /
												<span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
												<span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km']?> km</span>
											</div>
										</li>
										<li>
											<div class="ad-title  ">
												<ul>
													<li>
														<span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
													</li>
													<li>
														<span>/</span>
													</li>
													<li>
														<?php 
														$elantarixi= $neqliyyatcek['TarixSaat'];
														$parcalanmistarix = explode (" ",$elantarixi);
														$saattam=explode (":",$parcalanmistarix[1])

														?>
														<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
													</li>
												</ul>
											</div>
										</li>
										<li>
											<div class="card-body text-center">

												<button class="btn"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?></button>
											</div>
										</li>
									</ul>
								</div>
							</a>
						</div>

					<?php } ?>









				</div>
			</div>
			<div class="tab-pane fade" id="pills-ikis" role="tabpanel" aria-labelledby="pills-ikis-tab">
				<div class="row">

					<?php 
					$neqliyyatsor = $db->prepare($sql." order by ebaxis_sayi desc");	
					$neqliyyatsor->execute();	

					while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col-6" >
							<a class="iki-tab" href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
								<div class="iki-tabphoto">
									<?php     
									$sekil= json_decode($neqliyyatcek['sekil']);
									?>
									<img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
								</div>
								<div class="iki-tabcon">
									<ul>
										<li>
											<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										</li>
										<li>
											<div class="card-image-overlay">
												<span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili']?></span> /
												<span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
												<span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km']?> km</span>
											</div>
										</li>
										<li>
											<div class="ad-title  ">
												<ul>
													<li>
														<span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
													</li>
													<li>
														<span>/</span>
													</li>
													<li>
														<?php 
														$elantarixi= $neqliyyatcek['TarixSaat'];
														$parcalanmistarix = explode (" ",$elantarixi);
														$saattam=explode (":",$parcalanmistarix[1])

														?>
														<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
													</li>
												</ul>
											</div>
										</li>
										<li>
											<div class="card-body text-center">

												<button class="btn"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?></button>
											</div>
										</li>
									</ul>
								</div>
							</a>
						</div>

					<?php } ?>









				</div>
			</div>
			<div class="tab-pane fade" id="pills-ucs" role="tabpanel" aria-labelledby="pills-ucs-tab">
				<div class="row">

					<?php 
					$neqliyyatsor = $db->prepare($sql." order by qiymet DESC");	
					$neqliyyatsor->execute();	


					while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col-6" >
							<a class="iki-tab" href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>"" title="">
								<div class="iki-tabphoto">
									<?php     
									$sekil= json_decode($neqliyyatcek['sekil']);
									?>
									<img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
								</div>
								<div class="iki-tabcon">
									<ul>
										<li>
											<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										</li>
										<li>
											<div class="card-image-overlay">
												<span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili']?></span> /
												<span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
												<span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km']?> km</span>
											</div>
										</li>
										<li>
											<div class="ad-title  ">
												<ul>
													<li>
														<span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
													</li>
													<li>
														<span>/</span>
													</li>
													<li>
														<?php 
														$elantarixi= $neqliyyatcek['TarixSaat'];
														$parcalanmistarix = explode (" ",$elantarixi);
														$saattam=explode (":",$parcalanmistarix[1])

														?>
														<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
													</li>
												</ul>
											</div>
										</li>
										<li>
											<div class="card-body text-center">

												<button class="btn"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?></button>
											</div>
										</li>
									</ul>
								</div>
							</a>
						</div>

					<?php } ?>









				</div>
			</div>
			<div class="tab-pane fade" id="pills-dords" role="tabpanel" aria-labelledby="pills-dords-tab">
				<div class="row">

					<?php 
					$neqliyyatsor = $db->prepare($sql." order by qiymet ASC");	
					$neqliyyatsor->execute();						
					while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col-6" >
							<a class="iki-tab" href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
								<div class="iki-tabphoto">
									<?php     
									$sekil= json_decode($neqliyyatcek['sekil']);
									?>
									<img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
								</div>
								<div class="iki-tabcon">
									<ul>
										<li>
											<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										</li>
										<li>
											<div class="card-image-overlay">
												<span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili']?></span> /
												<span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
												<span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km']?> km</span>
											</div>
										</li>
										<li>
											<div class="ad-title  ">
												<ul>
													<li>
														<span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
													</li>
													<li>
														<span>/</span>
													</li>
													<li>
														<?php 
														$elantarixi= $neqliyyatcek['TarixSaat'];
														$parcalanmistarix = explode (" ",$elantarixi);
														$saattam=explode (":",$parcalanmistarix[1])

														?>
														<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
													</li>
												</ul>
											</div>
										</li>
										<li>
											<div class="card-body text-center">

												<button class="btn"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?></button>
											</div>
										</li>
									</ul>
								</div>
							</a>
						</div>

					<?php } ?>









				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-bir1-tab" data-toggle="pill" href="#pills-bir1" role="tab" aria-controls="pills-bir1" aria-selected="true">Bugün</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-iki2-tab" data-toggle="pill" href="#pills-iki2" role="tab" aria-controls="pills-iki2" aria-selected="false">Çox
				baxılan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-uc3-tab" data-toggle="pill" href="#pills-uc3" role="tab" aria-controls="pills-uc3" aria-selected="false">Azalan
				qiymət</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-dord4-tab" data-toggle="pill" href="#pills-dord4" role="tab" aria-controls="pills-dord4" aria-selected="false">Artan
				qiymət</a>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-bir1" role="tabpanel" aria-labelledby="pills-bir1-tab">
				<div class="table-bas">
					<ul>
						<li>
							Elan başlığı
						</li>
						<li>
							Model
						</li>
						<li>
							İl
						</li>
						<li>
							K/m
						</li>
						<li>
							Tarix<i class="fa fa-chevron-down" aria-hidden="true"></i>
						</li>
						<li>
							Region
						</li>
						<li>
							Qiymət
						</li>
					</ul>
				</div>
				<?php 
				$neqliyyatsor = $db->prepare($sql." order by elan_id DESC");	
				$neqliyyatsor->execute();		


				while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
					?>

					<div class="table-one">
						<a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
							<ul>
								<li>
									<div class="row">
										<div class="col-4">
											<?php     
											$sekil= json_decode($neqliyyatcek['sekil']);
											?>
											<img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
										</div>
										<div class="col-8">
											<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										</div>
									</div>
								</li>
								<li>
									<?php echo $neqliyyatcek['avtomobil_model_ad'] ?>
								</li>
								<li>
									<?php echo $neqliyyatcek['buraxilis_ili']?>
								</li>
								<li>
									<?php echo $neqliyyatcek['avto_yurus_km']?>
								</li>
								<li>
									<?php 
									$elantarixi= $neqliyyatcek['TarixSaat'];
									$parcalanmistarix = explode (" ",$elantarixi);
									$saattam=explode (":",$parcalanmistarix[1]);

									echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?>
								</li>
								<li>
									<?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?>
								</li>
								<li>
									<?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?>
								</li>
							</ul>
						</a>
					</div>
				<?php } ?>

			</div>
			<div class="tab-pane fade" id="pills-iki2" role="tabpanel" aria-labelledby="pills-iki2-tab">

				<div class="table-bas">
					<ul>
						<li>
							Elan başlığı
						</li>
						<li>
							Model
						</li>
						<li>
							İl
						</li>
						<li>
							K/m
						</li>
						<li>
							Tarix<i class="fa fa-chevron-down" aria-hidden="true"></i>
						</li>
						<li>
							Region
						</li>
						<li>
							Qiymət
						</li>
					</ul>
				</div>
				<?php 
				$neqliyyatsor = $db->prepare($sql." order by ebaxis_sayi DESC");	
				$neqliyyatsor->execute();		


				while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
					?>

					<div class="table-one">
						<a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
							<ul>
								<li>
									<div class="row">
										<div class="col-4">
											<?php     
											$sekil= json_decode($neqliyyatcek['sekil']);
											?>
											<img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
										</div>
										<div class="col-8">
											<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										</div>
									</div>
								</li>
								<li>
									<?php echo $neqliyyatcek['avtomobil_model_ad'] ?>
								</li>
								<li>
									<?php echo $neqliyyatcek['buraxilis_ili']?>
								</li>
								<li>
									<?php echo $neqliyyatcek['avto_yurus_km']?>
								</li>
								<li>
									<?php 
									$elantarixi= $neqliyyatcek['TarixSaat'];
									$parcalanmistarix = explode (" ",$elantarixi);
									$saattam=explode (":",$parcalanmistarix[1]);

									echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?>
								</li>
								<li>
									<?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?>
								</li>
								<li>
									<?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?>
								</li>
							</ul>
						</a>
					</div>
				<?php } ?>


			</div>
			<div class="tab-pane fade" id="pills-uc3" role="tabpanel" aria-labelledby="pills-uc3-tab">


				<div class="table-bas">
					<ul>
						<li>
							Elan başlığı
						</li>
						<li>
							Model
						</li>
						<li>
							İl
						</li>
						<li>
							K/m
						</li>
						<li>
							Tarix<i class="fa fa-chevron-down" aria-hidden="true"></i>
						</li>
						<li>
							Region
						</li>
						<li>
							Qiymət
						</li>
					</ul>
				</div>
				<?php 
				$neqliyyatsor = $db->prepare($sql." order by qiymet DESC");	
				$neqliyyatsor->execute();	


				while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
					?>

					<div class="table-one">
						<a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
							<ul>
								<li>
									<div class="row">
										<div class="col-4">
											<?php     
											$sekil= json_decode($neqliyyatcek['sekil']);
											?>
											<img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
										</div>
										<div class="col-8">
											<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										</div>
									</div>
								</li>
								<li>
									<?php echo $neqliyyatcek['avtomobil_model_ad'] ?>
								</li>
								<li>
									<?php echo $neqliyyatcek['buraxilis_ili']?>
								</li>
								<li>
									<?php echo $neqliyyatcek['avto_yurus_km']?>
								</li>
								<li>
									<?php 
									$elantarixi= $neqliyyatcek['TarixSaat'];
									$parcalanmistarix = explode (" ",$elantarixi);
									$saattam=explode (":",$parcalanmistarix[1]);

									echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?>
								</li>
								<li>
									<?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?>
								</li>
								<li>
									<?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?>
								</li>
							</ul>
						</a>
					</div>
				<?php } ?>



			</div>
			<div class="tab-pane fade" id="pills-dord4" role="tabpanel" aria-labelledby="pills-dord4-tab">



				<div class="table-bas">
					<ul>
						<li>
							Elan başlığı
						</li>
						<li>
							Model
						</li>
						<li>
							İl
						</li>
						<li>
							K/m
						</li>
						<li>
							Tarix<i class="fa fa-chevron-down" aria-hidden="true"></i>
						</li>
						<li>
							Region
						</li>
						<li>
							Qiymət
						</li>
					</ul>
				</div>
				<?php 
				$neqliyyatsor = $db->prepare($sql." order by qiymet ASC");	
				$neqliyyatsor->execute();	


				while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
					?>

					<div class="table-one">
						<a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
							<ul>
								<li>
									<div class="row">
										<div class="col-4">
											<?php     
											$sekil= json_decode($neqliyyatcek['sekil']);
											?>
											<img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
										</div>
										<div class="col-8">
											<h5><?php echo $neqliyyatcek['avtomobil_markasi_ad']." ".$neqliyyatcek['avtomobil_model_ad'] ?></h5>
										</div>
									</div>
								</li>
								<li>
									<?php echo $neqliyyatcek['avtomobil_model_ad'] ?>
								</li>
								<li>
									<?php echo $neqliyyatcek['buraxilis_ili']?>
								</li>
								<li>
									<?php echo $neqliyyatcek['avto_yurus_km']?>
								</li>
								<li>
									<?php 
									$elantarixi= $neqliyyatcek['TarixSaat'];
									$parcalanmistarix = explode (" ",$elantarixi);
									$saattam=explode (":",$parcalanmistarix[1]);

									echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?>
								</li>
								<li>
									<?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?>
								</li>
								<li>
									<?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.')." ".$neqliyyatcek['pul_novu']?>
								</li>
							</ul>
						</a>
					</div>
				<?php } ?>




			</div>
		</div>
	</div>
</div>
<?php } ?>