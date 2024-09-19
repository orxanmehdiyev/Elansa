 <?php
 require_once "../_admin/Ayarlar/ayarlar.php";
 $Dovlet_Id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["dovlet_id"]);
 $seher=$db->prepare("SELECT * FROM seher WHERE seher_durum=:seher_durum and Dovlet_Id=:Dovlet_Id order by seher_ad ASC  ");
 $seher->execute(array(
 	'seher_durum'=>1,
 	'Dovlet_Id'=>$Dovlet_Id));
 $sehersay= $seher->rowCount();
 if($sehersay>0){?>
 	<div class="form-group">
 		<label for="seher_id" id="seher_id_label" ><span>*</span>seher </label>
 		<div class="form-group">
 			<select name="seher_id" tabindex="206"  required id="seher_id" class="form-control" onchange="AvtomobilSeherSecildi(this.id)" >
 				<option value="" disabled="" selected="selected">Secin...
 				</option>
 				<?php		while ($sehercek=$seher->fetch(PDO::FETCH_ASSOC)) {		?>
 					<option value="<?php echo $sehercek['seher_id']; ?>"> <?php echo $sehercek['seher_ad']; ?>
 				</option> 
 			<?php }?>
 		</select>
 	</div>
 </div>
 <?php }else{?> 
	<div class="form-group">
		<label for="seher_id" id="seher_id_label" ><span>*</span>seher </label>
		<div class="form-group">
			<input type="text" class="form-control" id="seher_id" name="seher_ad" tabindex="207" required="required" onfocusout="SeherYazildi()" oninput="SeherYazildi()">
   </div>
 </div>
 <?php } ?>