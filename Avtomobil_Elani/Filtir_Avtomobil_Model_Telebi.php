<?php 
require_once "../_admin/Ayarlar/ayarlar.php";
if(isset($_GET["modelid"])){
	$deyer     =   $_GET["modelid"];



	$params = explode(",",$deyer );
	$place_holders = implode(',', array_fill(0, count($params), '?'));

	$sth = $db->prepare("SELECT * FROM avtomobil_modeli WHERE avtomobil_markasi_id IN ($place_holders)");
	$sth->execute($params);
	$say=$sth->rowCount();
	if ($say>0) {?>


		<label >Model</label>
		<input name="" type="hidden" value="" />
		<select multiple class="selectpicker form-control" name="avto_marka[]"  id="avto_marka"  data-live-search="true"  onchange="axtarmaqucun()">
			<?php 	while( $sthcek=$sth->fetch(PDO::FETCH_ASSOC)){?>
				<option value="<?php echo $sthcek['avtomobil_model_id'] ?>"><?php echo $sthcek['avtomobil_model_ad'] ?></option>  
			<?php	}?>


		</select>
		

		
	<?php }



}else{
	header("Location:../obyekt");
	exit;
}
?>