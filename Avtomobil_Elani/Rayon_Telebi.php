 <?php
 require_once "../_admin/Ayarlar/ayarlar.php";
 $dovlet_id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["dovlet_id"]);
 $rayon=$db->prepare("SELECT * FROM rayon WHERE rayon_durum=:rayon_durum and dovlet_id=:dovlet_id order by rayon_ad ASC  ");
 $rayon->execute(array(
 	'rayon_durum'=>1,
 	'dovlet_id'=>$dovlet_id));
 $rayonsay= $rayon->rowCount();



 if($rayonsay>0){?>
 	<div class="form-group">
 		<label for="menzil_elanlari_ucun_rayon_id" id="menzil_elanlari_ucun_rayon_id_label" ><span>*</span>Rayon </label>
 		<div class="form-group">

 			<select name="menzil_elanlari_ucun_rayon_id" tabindex="206"  required id="menzil_elanlari_ucun_rayon_id" class="form-control" onchange="MenzilElanlarıUcunRayonSecildi(this.value)" >
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
 <?php





}else{?> 

	<div class="form-group">
		<label for="menzil_elanlari_ucun_rayon_id" id="menzil_elanlari_ucun_rayon_id_label" ><span>*</span>Rayon </label>
		<div class="form-group">

			<select  tabindex="206" disabled="disabled" pl id="menzil_elanlari_ucun_rayon_id" class="form-control">
				<option value="" disabled="" selected="selected">Secdiyiniz dövlət üçün rayonu yoxdur
 				</option>
			</select>

	</div>
</div>

<?php } ?>