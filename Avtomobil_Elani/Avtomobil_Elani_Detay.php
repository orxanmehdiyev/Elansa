<?php 
$yeniebaxis_sayi=$elandetaycek['ebaxis_sayi']+1; 
$elan_id=$elandetaycek['elan_id'];  
$yenile = $db->prepare("UPDATE elan SET  
	ebaxis_sayi=:ebaxis_sayi  
	WHERE elan_id=$elan_id");
$update = $yenile->execute(array(
	'ebaxis_sayi' => $yeniebaxis_sayi
));?>
<div class="container">
	<div class="in-bread">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../">Ana səhifə</a></li>
				<li class="breadcrumb-item"><a href="#">Nəqliyyat vasitəsi</a></li>
				<li class="breadcrumb-item"><a href="#"><?php echo $elandetaycek['avtomobil_markasi_ad']?></a></li>
				<li class="breadcrumb-item"><a href="#"><?php echo $elandetaycek['avtomobil_model_ad']?></a></li>			
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9">
			<div class="inner-code">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
						<h3><?php echo $elandetaycek['avtomobil_markasi_ad']." ".$elandetaycek['avtomobil_model_ad'] ?> </h3>
						<div class="grid imglist"> 
							<div class="row">
								<?php 
								$sekil= json_decode($elandetaycek['sekil'],true);
								$sekilsayi=count($sekil);
								?>
								<a class="col-12" data-fancybox="demo" data-src="images/avtomobil/<?php echo $sekil[0] ?>"><img src="images/avtomobil/<?php echo $sekil[0] ?>"></a>
								<div class="col-12">
									<div class="row">
										<?php 
										for ($i=0; $i<$sekilsayi; $i++) {  ?>
											<a class="col-2" data-fancybox="demo" data-src="images/avtomobil/<?php echo $sekil[$i] ?>"><img src="images/avtomobil/<?php echo $sekil[$i] ?>">
											</a>
										<?php } ?>	
									</div>
								</div>
							</div>
						</div>
						<!-- Modal image  --> 
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content"> 
									<div class="modal-body">
										<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">

											<div class="carousel-inner">
												<?php  
												for ($i=0; $i<$sekilsayi; $i++) { ?>
													<div class="carousel-item <?php if($i==0){
														echo "active";
													} ?>">
													<img class="d-block w-100" data-bs-toggle="modal" data-toggle="modal" data-target="#exampleModal" data-bs-target="#exampleModal" src="images/avtomobil/<?php echo $sekil[$i] ?>" alt="First slide" onclick="currentSlide(<?php echo $i?>)">
												</div>
											<?php } ?>  
										</div> 
										<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" ></span>
											<span class="sr-only">Geri</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
											<span class="carousel-control-next-icon" ></span>
											<span class="sr-only">İrəli</span>
										</a>
									</div> 
								</div> 
							</div>
						</div>
					</div> 
					<div class="elan-sahibi-button align-items-center">
						<button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i>Elani sil</button>
						<button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i>Duzelis et</button>
						<?php 
						$elansikayet=$db->prepare("SELECT * FROM elansikayet where elan_id=:elan_id and IP_adresi=:IP_adresi");
						$elansikayet->execute(array(
							'elan_id'=>$_GET['elan_id'],
							'IP_adresi'=>$IPAdresi));  
						$elansikayetsay = $elansikayet->rowCount();
						if ($elansikayetsay>0) {		?>
							<button type="button" class="btn btn-outline-warning btn-sm"><i class="far fa-flag"></i>Şikayetiniz Qeyde alindi</button>
						<?php 	} else{	?>
							<button type="button" class="btn btn-outline-warning btn-sm"><i class="far fa-flag"></i>Sikayet et</button>
						<?php }
						?>

						<button type="button" class="btn btn-outline-info btn-sm"><i class="fab fa-gratipay"></i>Secilmisler</button>
						<a href="https://api.whatsapp.com//send?phone=<?php echo '+994'.$elandetaycek['telefon_bir'] ?>"><button type="button" class="btn btn-outline-success btn-sm"><i class="fab fa-whatsapp"></i>Whatsapp</button></a>

						<button type="button" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook-square"></i>Facebook</button>
					</div>
					<!-- Modal image  --> 
					<div class="row vip-slide">
						<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
							<a href="" title="">
								Vip
								<span>10 AZN</span>
							</a>
						</div>
						<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
							<a href="" title="">
								Premium
								<span>5 AZN</span>
							</a>
						</div>
						<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
							<a href="" title="">
								Elani irəli çək 
								<span>3 AZN</span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
					<ul class="car-info d-none d-sm-none">
						<li>
							<?php echo $elandetaycek['qiymet']." ".$elandetaycek['pul_novu'] ?>
						</li>
						<li>
							<span>İli (Modeli)</span> <?php echo $elandetaycek['buraxilis_ili'] ?>
						</li>
						<li>
							<span>Yürüş</span> <?php echo $elandetaycek['avto_yurus_km'] ?> km
						</li>
						<li>
							<span>Yanacaq növü</span> <?php echo $elandetaycek['yanacaq_ad'] ?>
						</li>
						<li>
							<span>Mühərrik həcmi</span> <?php echo $elandetaycek['avtomobilmuherrikhecmi_ad'] ?>
						</li>
						<li>
							<span>Sürətlər qutusu</span> <?php echo $elandetaycek['avto_suret_qutusu_ad'] ?>
						</li>
						<li>
							<table class="table table-striped">
								<tbody>
									<tr>
										<th>Baxış sayı:</th>
										<td><?php echo $elandetaycek['ebaxis_sayi'] ?></td>
									</tr>
									<tr>
										<th>Yükləndi:</th>
										<td><?php $tarix=explode(" ", $elandetaycek['TarixSaat']);
										echo  $tarix[0] ?></td>
									</tr>
									<tr>
										<th>Elanın nömrəsi:</th>
										<td><?php echo $elandetaycek['elan_id'] ?></td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>
					<ul class="car-info d-block d-sm-block d-md-none d-lg-none d-xl-none d-xxl-none"> 
						<li>
							<table class="table table-striped">
								<tbody>
									<tr>
										<th>Baxış sayı:</th>
										<td><?php echo $elandetaycek['ebaxis_sayi'] ?></td>
									</tr>
									<tr>
										<th>Yükləndi:</th>
										<td><?php $tarix=explode(" ", $elandetaycek['TarixSaat']);
										echo  $tarix[0] ?></td>
									</tr>
									<tr>
										<th>Elanın nömrəsi:</th>
										<td><?php echo $elandetaycek['elan_id'] ?></td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>
				</div>
			</div>
			<hr>
			<div class="car-det">
				<h4>Ümumi Məlumatlar</h4>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
						<table class="table table-striped">
							<tbody>
								<tr>
									<td>Marka</td>
									<td><a href="#" title=""><?php echo $elandetaycek['avtomobil_markasi_ad'] ?></a></td>
								</tr>
								<tr>
									<td>Model</td>
									<td><a href="#" title=""><?php echo $elandetaycek['avtomobil_model_ad'] ?></a></td>
								</tr>
								<tr>
									<td>Buraxılış ili</td>
									<td><?php echo $elandetaycek['buraxilis_ili'] ?></td>
								</tr>
								<tr>
									<td> Ban növü </td>
									<td><?php echo $elandetaycek['avtomobil_ban_novu_ad'] ?> </td>
								</tr>
								<tr>
									<td>Rəng</td>
									<td><?php echo $elandetaycek['reng_ad'] ?> </td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
						<table class="table table-striped">
							<tbody>
								<tr>
									<td>Mühərrik</td>
									<td><?php echo $elandetaycek['avtomobilmuherrikhecmi_ad'] ?></td>
								</tr>
								<tr>
									<td>Mühərrikin gücü</td>
									<td><?php echo $elandetaycek['muherrikin_at_gucu_id'] ?></td>
								</tr>
								<tr>
									<td>Yanacaq növü</td>
									<td><?php echo $elandetaycek['yanacaq_ad'] ?></td>
								</tr>
								<tr>
									<td>Yürüş</td>
									<td><?php echo $elandetaycek['avto_yurus_km'] ?></td>
								</tr>
								<tr> 
									<td>Sürətlər qutusu</td>
									<td><?php echo $elandetaycek['avto_suret_qutusu_ad'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
						<table class="table table-striped">
							<tbody>
								<tr>
									<td>Body</td>
									<td><?php echo $elandetaycek['elanmeksedi'] ?></td>
								</tr>
								<tr>
									<td>Ötürücü</td>
									<td><?php echo $elandetaycek['avto_otrucu_ad'] ?></td>
								</tr>
								<tr>
									<td>Yeni</td>
									<td><?php echo $elandetaycek['emlakin_veziyyeti_ad'] ?></td>
								</tr>
								<tr>
									<td>Elan Sahibi </td>
									<td><?php echo $elandetaycek['elanverennovu_ad'] ?> </td>
								</tr>
								<tr>
									<td>History</td>
									<td><?php echo $elandetaycek['reng_ad'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
				<h4>Göstəricilər</h4>
				<div class="row">
					<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
						<table class="table">
							<tbody>
								<tr class="aktiv">
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>A/C:Yüngül lehimli disklər</td>
								</tr>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>Mərkəzi qapanma</td>
								</tr>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>Lyuk</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
						<table class="table">
							<tbody>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>A/C:Yağış sensoru</td>
								</tr>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>ABS</td>
								</tr>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>Park radarı</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
						<table class="table">
							<tbody>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>A/C:Kondisioner</td>
								</tr>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>Oturacaqların isidilməsi</td>
								</tr>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>Dəri salon</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
						<table class="table">
							<tbody>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>A/C:Ksenon lampalar</td>
								</tr>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>Arxa görüntü kamerası</td>
								</tr>
								<tr>
									<th><i class="fas fa-check" aria-hidden="true"></i></th>
									<td>Yan pərdələr</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
				<h4>Haqqında</h4>
				<p>
					<?php echo $elandetaycek['aciqlama'] ?>
				</p>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
		<div class="right-col d-none d-sm-block">
			<div class="card elan-sahibi">
				<h3><?php echo $elandetaycek['ad_soyad'] ?></h3>
				<img src="../images/sahib.png" />
				<span><?php echo $elandetaycek['elanverennovu_ad'] ?></span>
				<span>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
				</span>
				<div class="elan-sahibi-button align-items-center">
					<button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i>Elani sil</button>
					<button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i>Duzelis et</button>
					<?php 
					$elansikayet=$db->prepare("SELECT * FROM elansikayet where elan_id=:elan_id and IP_adresi=:IP_adresi");
					$elansikayet->execute(array(
						'elan_id'=>$_GET['elan_id'],
						'IP_adresi'=>$IPAdresi));
					$elansikayetsay = $elansikayet->rowCount();
					if ($elansikayetsay>0) {		?>
						<button type="button" class="btn btn-outline-warning btn-sm"><i class="far fa-flag"></i>Şikayetiniz Qeyde alindi</button>
					<?php 	} else{	?>
						<button type="button" class="btn btn-outline-warning btn-sm"><i class="far fa-flag"></i>Sikayet et</button>
					<?php }
					?>

					<button type="button" class="btn btn-outline-info btn-sm"><i class="fab fa-gratipay"></i>Secilmisler</button>
					<a href="https://api.whatsapp.com//send?phone=<?php echo '+994'.$elandetaycek['telefon_bir'] ?>"><button type="button" class="btn btn-outline-success btn-sm"><i class="fab fa-whatsapp"></i>Whatsapp</button></a>

					<button type="button" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook-square"></i>Facebook</button>
				</div>
				<hr/>
				<a href="<?php echo '+'.$elandetaycek['telefon_bir'] ?>" title="" class="elan-button-a"><i class="fas fa-phone-alt"></i><?php echo '0'.$elandetaycek['telefon_bir'] ?></a>
				<a href="tel:(+994)77-666-55-44" title="" class="elan-button-a elan-gr"><i class="fab fa-whatsapp"></i>(+994)77 666-55-44</a>
				<span><i class="fas fa-map-marked-alt"></i><?php echo $elandetaycek['dovlet_ad']." ".$elandetaycek['seher_ad'] ?></span> 
			</div> 
		</div>
		<!-- Mobile version-->
		<div class="right-col d-block d-sm-none">
			<div class="card elan-sahibi">
				<div class="mobile-elan-sahibi">
					<h3><?php echo $elandetaycek['ad_soyad'] ?></h3>  
					<span>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="far fa-star"></i>
						<i class="far fa-star"></i>
					</span>
				</div>
				<span><?php echo $elandetaycek['elanverennovu_ad'] ?></span>   
				<hr/>
				<a href="<?php echo '+'.$elandetaycek['telefon_bir'] ?>" title="" class="elan-button-a"><i class="fas fa-phone-alt"></i><?php echo '0'.$elandetaycek['telefon_bir'] ?></a>
				<a href="tel:(+994)77-666-55-44" title="" class="elan-button-a elan-gr"><i class="fab fa-whatsapp"></i>(+994)77 666-55-44</a>
				<span><i class="fas fa-map-marked-alt"></i><?php echo $elandetaycek['dovlet_ad']." ".$elandetaycek['seher_ad'] ?></span> 

				
			</div> 
		</div>
		<!-- Mobile version-->
	</div>
</div>
<?php 
$benzerelansor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and avtomobil_model_id=:avtomobil_model_id limit 12");
$benzerelansor->execute(array(
	'yayim_durumu'=>1,
	'avtomobil_model_id'=>$elandetaycek['avtomobil_model_id']
));
$benzerelansay = $benzerelansor->rowCount();
if ($benzerelansay>0) {
	?>
	<div class="reds four">
		<div class="ribup d-flex align-items-center">
			<strong>
				<h3>BƏNZƏR ELANLAR</h3>
			</strong>
			<div class="ml-auto"><a href="neqliyyathamisi" title="">Hamısına bax</a></div>
		</div>
		<div class="elan-kart elan-kart-filtir row">
			<?php 
			while ( $benzerelancek = $benzerelansor->fetch(PDO::FETCH_ASSOC)) {
				?>

				<div class="col"> 
					<div class="card">
						<div class="vip-pre">
							<?php 
							echo $benzerelancek['Premiyum']==1 ? '<i class="fas fa-crown"></i>':"";
							echo $benzerelancek['VIP']==1 ? ' <i class="far fa-gem"></i>':""?>
						</div>
						<div class="bar-faiz">
							<?php 
							echo $benzerelancek['barter_var']=="on" ? '<i class="fas fa-sync-alt"></i>':"";
							echo $benzerelancek['kredit_var']=="on" ? '  <i class="fas fa-percentage"></i>':""?>
						</div>
						<?php 
						$sekil = json_decode($benzerelancek['sekil']);
						?>

						<a href="elandetay-<?= $benzerelancek["SEO_URL"] . '-' . $benzerelancek["elan_id"] ?>" title="">
							<div class="img-hid">
								<img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" /> 
								<span></span> 
							</div>
						</a>
						<div class="card-image-overlay  ">
							<?php echo $benzerelancek['salon_durm']=="1" ? '<div class="salon-ico"><p>Salon</p></div>':"";?>
							<div class="karsilastir-ico">
								<i class="fas fa-exchange-alt"></i>
							</div>
							<span class="card-detail-badge"><?php echo $benzerelancek['buraxilis_ili'] ?></span> /
							<span class="card-detail-badge"> <?php echo $benzerelancek['avtomobilmuherrikhecmi_ad'] ?>sm<sup>3</sup></span> /
							<span class="card-detail-badge"><?php echo $benzerelancek['avto_yurus_km'] ?>km</span>
						</div>
						<div class="card-footer text-center">
							<div class="ad-title  ">
								<a href="elandetay-<?= $benzerelancek["SEO_URL"] . '-' . $benzerelancek["elan_id"] ?>" title=""><h5> <?php echo $benzerelancek['avtomobil_markasi_ad'] . " " . $benzerelancek['avtomobil_model_ad'] ?> </h5></a>
								<ul>
									<li>
										<span><?php echo HerSozunIlkHerfiniBoyukEt($benzerelancek['seher_ad']); ?></span>
									</li>
									<li>
										<span>/</span>
									</li>
									<li> 
										<?php
										$elantarixi = $benzerelancek['TarixSaat'];
										$parcalanmistarix = explode(" ", $elantarixi);
										$saattam = explode(":", $parcalanmistarix[1])
										?>
										<span>
											<?php echo $parcalanmistarix[0] ?> /
											<?php echo $saattam[0] . ":" . $saattam[1] ?>
										</span>
									</li>
								</ul>
							</div>
							<a href="elandetay-<?= $benzerelancek["SEO_URL"] . '-' . $benzerelancek["elan_id"] ?>" class="ad-btn" title=""><?php echo number_format($benzerelancek['qiymet'], 0, ',', ' ') . " " . $benzerelancek['pul_novu'] ?></a>
						</div>
					</div> 
				</div> 
			<?php } ?>
		</div>
	</div> 
<?php } ?>   
</div>
<div class="mobile_menu d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
	<ul class="d-flex">
		<li>
			<a href="" title=""><i class="bi bi-search"></i>Axtarış</a>
		</li>
		<li>
			<a href="" title=""><i class="bi bi-star"></i>Seçilmişlər</a>
		</li>
		<li class="mobile_yeni">
			<a href="" title=""><i class="bi bi-plus-lg"></i>Yeni elan</a>
		</li>
		<li>
			<a href="" title=""><i class="bi bi-chat-left-text"></i>Mesajlar</a>
		</li>
		<li>
			<a href="" title=""><i class="bi bi-person"></i>Daxil ol</a>
		</li>
	</ul>
</div>
<?php require_once "_footer.php" ?>









<!-- 

<div class="klon detaylinki ads" style="cursor: pointer;" data-href="elandetay-<?= $benzerelancek["SEO_URL"] . '-' . $benzerelancek["elan_id"] ?>" >
				<div class="card rounded">
					<div class="card-image">
						<?php  
						$sekil= json_decode($benzerelancek['sekil']);
						?>
						<div class="img-kart"><img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
						</div>
					</div>
					<div class="card-image-overlay">
						<span class="card-detail-badge"><?php echo $benzerelancek['buraxilis_ili']?></span> /
						<span class="card-detail-badge"><?php echo $benzerelancek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
						<span class="card-detail-badge"><?php echo $benzerelancek['avto_yurus_km']?>km</span>
					</div>
					<div class="card-body text-center">
						<div class="ad-title">
							<h5><?php echo $benzerelancek['avtomobil_markasi_ad']." ".$benzerelancek['avtomobil_model_ad'] ?></h5>
							<ul>
								<li>
									<span><?php echo HerSozunIlkHerfiniBoyukEt($benzerelancek['seher_ad']) ?></span>
								</li>
								<li>
									<span>/</span>
								</li>
								<li>
									<?php 
									$elantarixi= $benzerelancek['TarixSaat'];
									$parcalanmistarix = explode (" ",$elantarixi);
									$saattam=explode (":",$parcalanmistarix[1]);
									?>
									<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
								</li>
							</ul>
						</div>
						<a class="ad-btn" href="elan-in-page-hur.html"><?php echo number_format($benzerelancek['qiymet'], 0, ',', ' ')." ".$benzerelancek['pul_novu']?></a>
					</div>
				</div>
			</div>

		-->







































