<div class="item">
	<div class="col"> 
		<a href="elandetay-<?= $elancek["SEO_URL"] . '-' . $elancek["elan_id"] ?>" title="">
			<div class="card" >
				<div class="vip-pre">
          <?php 
          echo $elancek['Premiyum']==1 ? '<i class="fas fa-crown"></i>':"";
          echo $elancek['VIP']==1 ? ' <i class="far fa-gem"></i>':""?>
        </div>
        <div class="bar-faiz">
         <?php 
         echo $elancek['barter_var']=="on" ? '<i class="fas fa-sync-alt"></i>':"";
         echo $elancek['kredit_var']=="on" ? '  <i class="fas fa-percentage"></i>':""?>
       </div>
				<?php			    
				$sekil= json_decode($elancek['sekil']);

$filename = "../images/avtomobil/".$sekil[0];


				?>
				<div class="img-hid">
					<img class="img-fluid" src="<?php echo $filename ?>" title="" alt="Alternate Text" />
					<span></span>
				</div>
				<div class="card-image-overlay  ">
					 <?php echo $elancek['salon_durm']=="1" ? '<div class="salon-ico"><p>Salon</p></div>':"";?>
					<span class="card-detail-badge"><?php echo $elancek['buraxilis_ili']?></span> /
					<span class="card-detail-badge"><?php echo $elancek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> /
					<span class="card-detail-badge"><?php echo $elancek['avto_yurus_km']?> km</span>
				</div> 
				<div class="card-footer text-center">
					<div class="ad-title  ">
						<h5> <?php  echo $elancek['avtomobil_markasi_ad']."/".$elancek['avtomobil_model_ad']  ?> </h5>
						<ul>
							<li>
								<span><?php echo HerSozunIlkHerfiniBoyukEt($elancek['seher_ad']) ?></span>
							</li>
							<li>
								<span>/</span>
							</li>
										<?php 
								$elantarixi= $elancek['TarixSaat'];
								$parcalanmistarix = explode (" ",$elantarixi);
								$saattam=explode (":",$parcalanmistarix[1])

								?>
							<li>
								<span><?php echo $parcalanmistarix[0]?> / <?php echo $saattam[0].":".$saattam[1]?></span>
							</li>
						</ul>
					</div>
					<a class="ad-btn" href=""><?php echo $elancek['qiymet']." ".$elancek['pul_novu']?></a>
				</div> 
			</div>
		</a>
	</div> 
</div>
