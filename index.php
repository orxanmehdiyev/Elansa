<?php 
require_once "_header.php";
require_once "_slider.php";
?>
<div class="city-large container">
	<?php 
	$vipelansor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and VIP=:VIP LIMIT 15");
	$vipelansor->execute(array(
		'yayim_durumu'=>1,
		'VIP'=>1));
	$vipelansay = $vipelansor->rowCount();
	if ($vipelansay>0) {
		?>
		<div class="reds">
			<div class="ribup d-flex align-items-center">
				<strong>
					<h3>VİP</h3>
				</strong>
				<div class="ml-auto"><a href="vip" title="">Hamısına bax</a></div>
			</div>
			<div class="four">
				<div class="elan-kart elan-kart-filtir row">

					<?php 
					while ($vipelancek = $vipelansor->fetch(PDO::FETCH_ASSOC)) {
						if ($vipelancek['karoqoriya_id']==1) {
							include "Avtomobil_Elani/Avtomobil_Elani_VIP.php";
						}
					} ?>	
					<div class=" col item-al "> 
						<a href="vip" title=""><!-- bu linke deyme -->
							<i class="bi bi-reply-all"></i>
							<i class="bi bi-reply-all item-vis"></i> 
							<button type="button" class="btn btn-outline-info">Hamısına basx</button>
						</a>
					</div>		
				</div>
			</div> 
			
		</div>

	<?php } ?>



	<?php $bolme=$db->prepare("SELECT * FROM bolme where bolme_durum=:bolme_durum ");
	$bolme->execute(array(
		'bolme_durum'=>1
	));
	while ($bolmecek = $bolme->fetch(PDO::FETCH_ASSOC)) { 
		$bolme_id=$bolmecek['bolme_id'];
		$elansor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and bolme_id=:bolme_id order by elan_id DESC LIMIT 10");
		$elansor->execute(array(
			'yayim_durumu'=>1,
			'bolme_id'=>$bolme_id
		));
		$elansay = $elansor->rowCount();
		if ($elansay>0) {
			?>
			<div class="reds">
				<div class="ribup d-flex align-items-center">
					<strong>
						<h3><?php echo $bolmecek['bolme_ad'] ?></h3>
					</strong>
					<div class="ml-auto"><a href="<?php echo "elanlar-".$bolmecek['bolme_seo_url']  ?>" title="">Hamısına bax</a></div>
				</div>
				<div class="elan-kart">
					<div class="row">
						<div class="large-12 columns">
							<div class="owl-carousel owl-theme">
								<?php 
								while ($elancek = $elansor->fetch(PDO::FETCH_ASSOC)) { 
									if ($elancek['karoqoriya_id']==1) {
										include "Avtomobil_Elani/Avtomobil_Elani_Index.php";
									}
									elseif($elancek['karoqoriya_id']==4){
										include "elanlar/menzil.php";
									}elseif($elancek['karoqoriya_id']==5){
										include "elanlar/villa.php";
									}elseif($elancek['karoqoriya_id']==88){
										include "elanlar/heyetevi.php";
									}elseif($elancek['karoqoriya_id']==6){
										include "elanlar/qaraj.php";
									}elseif($elancek['karoqoriya_id']==7){
										include "elanlar/obyekt.php";
									}elseif($elancek['karoqoriya_id']==8){
										include "elanlar/torpaqsahesi.php";
									}
								} ?>


								<!-- slider sonu ucun butun elanlara gedis linki --> 
								<div class="col item-al"> 
									<a href="<?php echo "elanlar-".$bolmecek['bolme_seo_url']  ?>" title=""><!-- bu linke deyme -->
										<i class="bi bi-reply-all"></i>
										<i class="bi bi-reply-all item-vis"></i> 
										<button type="button" class="btn btn-outline-info">Hamısına bax</button>
									</a>
								</div>  
								<!-- slider sonu ucun butun elanlara gedis linki -->

								
							</div>
						</div>
					</div>
				</div> 
				<div class="four">
					<div class="elan-kart elan-kart-filtir row">
						<?php 
						$elansorelave=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and bolme_id=:bolme_id order by elan_id DESC LIMIT 1");
						$elansorelave->execute(array(
							'yayim_durumu'=>1,
							'bolme_id'=>$bolme_id
						));
						while ($elavelancek = $elansorelave->fetch(PDO::FETCH_ASSOC)) { 
							if ($elavelancek['bolme_id']==1) {
								include "Avtomobil_Elani/Avtomobil_Index_Elave_Elanlar.php";					
							}
							elseif ($elavelancek['bolme_id']==2) {					
								include "Emlak_Elani/Menzil_Elanlari_Elave.php";
							}
						}
						?> 	

						<div class=" col item-al "> 
							<a href="<?php echo "elanlar-".$bolmecek['bolme_seo_url']  ?>" title=""><!-- bu linke deyme -->
								<i class="bi bi-reply-all"></i>
								<i class="bi bi-reply-all item-vis"></i> 
								<button type="button" class="btn btn-outline-info">Hamısına basx</button>
							</a>
						</div> 		

					</div> 
				</div> 



				<?php 
				if ($bolme_id==1) {				
					
					$Rentasor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and elanmeksedi<>:elanmeksedi and karoqoriya_id=:karoqoriya_id LIMIT 15");
					$Rentasor->execute(array(
						'yayim_durumu'=>1,
						'elanmeksedi'=>'SATIŞ',
						'karoqoriya_id'=>1));
					$Rentasay = $Rentasor->rowCount();
					if ($Rentasay>0) {
						?>
						<div class="reds redsrent">
							<div class="ribup d-flex align-items-center">
								<strong>
									<h3>Rentakar</h3>
								</strong>
								<div class="ml-auto"><a href="viphamisi" title="">Hamısına bax</a></div>
							</div>
							<div class="four">
								<div class="elan-kart elan-kart-filtir row">
									<?php 
									while ($RentaCek = $Rentasor->fetch(PDO::FETCH_ASSOC)) {
										if ($RentaCek['karoqoriya_id']==1) {
											include "Avtomobil_Elani/Avtomobil_Elani_Renta.php";
										}
									} ?>
									<div class=" col item-al "> 
										<a href="<?php echo "elanlar-".$bolmecek['bolme_seo_url']  ?>" title=""><!-- bu linke deyme -->
											<i class="bi bi-reply-all"></i>
											<i class="bi bi-reply-all item-vis"></i> 
											<button type="button" class="btn btn-outline-info">Hamısına basx</button>
										</a>
									</div> 		 
								</div>
							</div>  
						</div> 
					<?php } ?>
				<?php } ?> 
			</div>
		<?php } 
	}
	?>
</div>
<script>
	$(document).ready(function() {
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 10,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 5,
					nav: true,
					loop: false,
					margin: 20
				}
			}
		})
	})
</script>
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