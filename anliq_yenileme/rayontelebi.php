 <?php
 require_once "../_admin/Ayarlar/ayarlar.php";
 $seher_id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["seher_id"]);
 $rayon=$db->prepare("SELECT * FROM rayon WHERE rayon_durum=:rayon_durum and seher_id=:seher_id order by rayon_ad ASC  ");
 $rayon->execute(array(
 	'rayon_durum'=>1,
 	'seher_id'=>$seher_id));
 $rayonsay= $rayon->rowCount();



 if($rayonsay>0){?>
 	<div class="form-group">
 		<label for="rayon_id" id="rayon_id_label" ><span>*</span>Rayon </label>
 		<div class="form-group">

 			<select name="rayon_id" tabindex="206"  required id="rayon_id" class="form-control" onchange="RayonSecildi(this.value)" >
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
		<label for="rayon_id" id="rayon_id_label" ><span>*</span>Rayon </label>
		<div class="form-group">

			<select  tabindex="206" disabled="disabled"  class="form-control">
				<option value="" disabled="" selected="selected">Secdiyiniz şəhərin rayonu yoxdur
 				</option>
			</select>

	</div>
</div>

<?php } ?>