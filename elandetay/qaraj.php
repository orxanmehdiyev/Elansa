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
				<li class="breadcrumb-item"><a href="villahamisi">Qaraj</a></li>
				<li class="breadcrumb-item active" aria-current="page"><span>Elan № : <?php echo $elandetaycek['elan_id']?></span></li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-9">
			<div class="inner-code">
				<div class="row">
					<div class="col-9">
						<h3><?php echo $elandetaycek['elan_adi']?></h3>
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
					<div class="row vip-slide">
						<div class="col-4">
							<a href="" title="">Vip</a>
						</div>
						<div class="col-4">
							<a href="" title="">Premium</a>
						</div>
						<div class="col-4">
							<a href="" title="">Elani irəli çək </a>
						</div>
					</div>
				</div>
				<div class="col-3">
					<ul class="car-info">
						<li><?php echo $elandetaycek['qiymet']." ".$elandetaycek['pul_novu']?></li>
						<li><span>Təmir Tipi</span> <?php echo $elandetaycek['emlakin_veziyyeti_ad'] ?></li>
						
						<li><span>Kredit</span> <?php if($elandetaycek['kredit_var']){echo "Var";}else{echo "Yoxdur";} ?></li>
						<li><span>Barter</span><?php if($elandetaycek['barter_var']){echo "Var";}else{echo "Yoxdur";} ?></li>
						<li><span>Ümumi Sahəsi</span><?php echo $elandetaycek['umumi_sahesi']?> m<sup>2</sup></li>
						
						<li><span>Əmlakın Sənədi</span> <?php echo $elandetaycek['emlak_senedi_ad'] ?></li>
						<li>
							<table class="table">
								<tbody>
									<tr>
										<th>Baxış sayı:</th>
										<td><?php echo $elandetaycek['ebaxis_sayi'] ?></td>
									</tr>
									<tr>
										<th>Yükləndi:</th>
										<td><?php $tarix=explode(" ", $elandetaycek['TarixSaat']);echo  $tarix[0] ?></td>
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
					<div class="col-6"> 
						<table class="table table-striped">
							<tbody>
							<tr> 
									<td> Ümumi Sahəsi </td>
									<td><?php echo $elandetaycek['umumi_sahesi'] ?> m<sup>2</sup></td>
								</tr>
								<tr> 
									<td>Təmir Tipi</td>
									<td><?php echo $elandetaycek['emlakin_veziyyeti_ad'] ?></td>
								</tr>	
								<tr> 
									<td>Krediti</td>
									<td><?php if($elandetaycek['kredit_var']){echo "Var";}else{echo "Yoxdur";} ?> </td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-6">
						<table class="table table-striped">
							<tbody>
							
								<tr> 
									<td>Əmlakın Sənədi</td>
									<td><?php echo $elandetaycek['emlak_senedi_ad'] ?> </td>
								</tr>
								<tr> 
									<td>Elanın Müəllifi</td>
									<td><?php echo $elandetaycek['elanverennovu_ad'] ?> </td>
								</tr>
								<tr> 
									<td>Barteri</td>
									<td><?php if($elandetaycek['barter_var']){echo "Var";}else{echo "Yoxdur";} ?> </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
				<h4>Ünvan</h4>
				<span><b><?php echo $elandetaycek['dovlet_ad']." / ".$elandetaycek['seher_ad']." / ".$elandetaycek['unvan'] ?></b></span>
				<?php 
				$MenzilTechizatBolmesiSor=$db->prepare("SELECT * FROM menzil_techizat_bolmesi where MenziTechizatBolmesiDurum=:MenziTechizatBolmesiDurum");
				$MenzilTechizatBolmesiSor->execute(array(
					'MenziTechizatBolmesiDurum'=>1));
				$MenzilTechizatBolmesiSay=$MenzilTechizatBolmesiSor->rowCount();
				if ($MenzilTechizatBolmesiSay) {
					while ($MenzilTechizatBolmesiCek=$MenzilTechizatBolmesiSor->fetch(PDO::FETCH_ASSOC)) {	
						$MenziTechizatBolmesiID=$MenzilTechizatBolmesiCek['MenziTechizatBolmesiID'];
						?>
						<hr>
						<h4><?php echo $MenzilTechizatBolmesiCek['MenziTechizatBolmesiAd'] ?></h4>
						<?php 
						$TechizatSaySor = $db->prepare("SELECT * FROM menziltechizati where MenziTechizatBolmesiID=:MenziTechizatBolmesiID and MenzilTechizatiDurum=:MenzilTechizatiDurum");
						$TechizatSaySor->execute(array(
							'MenziTechizatBolmesiID'=>$MenziTechizatBolmesiID,
							'MenzilTechizatiDurum'=>1));
						$techizat= $elandetaycek['techizat'];
						$yourObject = json_decode($techizat);
						$data = (array) $yourObject;
						?>
						<div class="row">							
							<?php 	while ($TechizatSayCek=$TechizatSaySor->fetch(PDO::FETCH_ASSOC)) {
								$var=array_key_exists($TechizatSayCek['MenzilTechizatiID'],$data); 
								if($var){  ?>
									<div class="col-3">										
										<i class="fa fa-check-circle"></i><?php echo $TechizatSayCek['MenzilTechizatiAd'] ?>
									</div>

								<?php } 
							} ?>
						</div>
					<?php  }
				} ?>
				<hr>
				<h4>Haqqında</h4>
				<p>
					<?php echo $elandetaycek['aciqlama'] ?>
				</p>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="right-col">
			<h4><?php echo $elandetaycek['ad_soyad'] ?></h4>
			<table class="table">
				<tbody>
					<tr>
						<th><i class="fa fa-mobile"></i></th>
						<td><a href="<?php echo '0'.$elandetaycek['telefon_bir'] ?>"><?php echo '0'.$elandetaycek['telefon_bir'] ?></a></td>
					</tr>
					<tr>
						<th><i class="fa fa-map-marker"></i></th>
						<td><?php echo $elandetaycek['dovlet_ad']." ".$elandetaycek['seher_ad'] ?></td>
					</tr>
				</tbody>
			</table>
			<div class="right-but">
				<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-pencil"></i>Düzəliş et</button>
				<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModals" data-whatever="@mdos"><i class="fa fa-times" ></i>Elanı sil</button>
				<?php 
				$elansikayet=$db->prepare("SELECT * FROM elansikayet where elan_id=:elan_id and IP_adresi=:IP_adresi");
				$elansikayet->execute(array(
					'elan_id'=>$_GET['elan_id'],
					'IP_adresi'=>$IPAdresi));
				$elansikayetsay = $elansikayet->rowCount();
				if ($elansikayetsay>0) {		?>
					<button type="button" disabled="" class="btn btn-link"><i class="fa fa-flag" ></i>Şikayetiniz Qeyde alindi</button>
				<?php 	} else{	?>
					<button type="button" class="btn btn-link" data-toggle="modal"  data-target="#sikayetid" data-whatever="@mdos"><i class="fa fa-flag" ></i>Şikayət et</button>
				<?php }	?>
				<button type="button" class="btn btn-link"><i class="fa fa-heart" ></i>Seçilmişlərə əlavə et</button>
				<a href="https://api.whatsapp.com//send?phone=<?php echo '+994'.$elandetaycek['telefon_bir'] ?>"><button type="button" class="btn btn-link"><i class="fa fa-whatsapp" aria-hidden="true"></i>Whatsapp</button></a>
				<button type="button" class="btn btn-link"><i class="fa fa-facebook-square" ></i>Facebook</button>
			</div>
		</div>
	</div>
</div>
<?php 
$benzerelansor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and karoqoriya_id=:karoqoriya_id and elan_id<>:elan_id limit 12");
$benzerelansor->execute(array(
	'yayim_durumu'=>1,
	'karoqoriya_id'=>$elandetaycek['karoqoriya_id'],
	'elan_id'=>$elandetaycek['elan_id']
));
$benzerelansay = $benzerelansor->rowCount();
if ($benzerelansay>0) {
	?>
	<div class="reds">
		<div class="ribup d-flex align-items-center">
			<strong>
				<h3>BƏNZƏR ELANLAR</h3>
			</strong>
			<div class="ml-auto"><a href="neqliyyathamisi" title="">Hamısına bax</a></div>
		</div>
		<?php 
		while ( $benzerelancek = $benzerelansor->fetch(PDO::FETCH_ASSOC)) {
			?>
			<div class="klon detaylinki ads" style="cursor: pointer;" data-href="elandetay-<?= $benzerelancek["SEO_URL"] . '-' . $benzerelancek["elan_id"] ?>" >
				<div class="card rounded">
					<div class="card-image">
						<?php 	if ($benzerelancek['VIP']==1) { ?>
							<span class="ribbon1"><span>VIP</span></span>
						<?php } 
						if ($benzerelancek['salon_durm']==1) {
							?>
							<div class="wrap"> <span class="ribbon6">SALON</span></div>
						<?php }    
						$sekil= json_decode($benzerelancek['sekil']);
						?>

						<div class="img-kart"><img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
						</div>
					</div>
					<div class="card-image-overlay  ">
						<span class="card-detail-badge"><?php echo $benzerelancek['otaq_sayi']?> otaqlı</span>/
						<span class="card-detail-badge"><?php echo $benzerelancek['umumi_sahesi']?> m<sup>3</sup></span>/
						<span class="card-detail-badge"><?php echo $benzerelancek['binaninmertebesayi']?>/<?php echo $benzerelancek['yerlesdiyi_mertebe']?> mərtəbə</span>

					</div>
					<div class="card-body text-center">
						<div class="ad-title  ">
							<h5><?php echo $benzerelancek['elan_adi'] ?></h5>
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
									$saattam=explode (":",$parcalanmistarix[1])

									?>
									<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
								</li>
							</ul>
						</div>
						<a class="ad-btn" href="elan-in-page-hur.html"><?php echo number_format($benzerelancek['qiymet'],0, ',', '.')." ".$benzerelancek['pul_novu']?></a>
					</div>
				</div>
			</div>





		<?php } ?>









	</div>

<?php } ?>

<!-- Tab links -->





<!-- Tab content -->



</div>

