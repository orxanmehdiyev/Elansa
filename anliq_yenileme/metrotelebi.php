 <?php
 require_once "../admins/netting/ayarlar.php";
 $seher_id		=	Reqemleri_Filtrle($_REQUEST["seher_id"]);

 $metro=$db->prepare("SELECT * FROM metro WHERE metro_durum=:metro_durum and seher_id=:seher_id order by metro_ad ASC");
 $metro->execute(array(
 	'metro_durum'=>1,
 	'seher_id'=>$seher_id));
 $metrosay= $metro->rowCount();



 if($metrosay>0){?>
 	<div class="form-group">
 		<label for="metro_id" id="metro_id_label" ><span>*</span>Metros </label>
 		<div class="form-group">

 			<select name="metro_id" tabindex="206"  required id="metro_id" class="form-control" onchange="MetroSecildi(this.value)" >
 				<option value="" disabled="" selected="selected">Secin...
 				</option>
 				<?php
 				while ($metrocek=$metro->fetch(PDO::FETCH_ASSOC)) {
 					?>
 					<option value="<?php echo $metrocek['metro_id']; ?>"> <?php echo $metrocek['metro_ad']; ?>
 				</option> 
 			<?php }?>
 		</select>

 	</div>
 </div>
 <?php





}else{?> 

	<div class="form-group">
		<label for="metro_id" id="metro_id_label" ><span>*</span>Metro </label>
		<div class="form-group">

			<select  tabindex="206" disabled="disabled"  class="form-control">
				<option value="" disabled="" selected="selected">Secdiyiniz şəhərdə metro yoxdur
 				</option>
			</select>

	</div>
</div>

<?php } ?>