<?php
 require_once "../_admin/Ayarlar/ayarlar.php";

 $marka_id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["avotomarka"]);





$auto_model_sor=$db->prepare("SELECT * FROM avtomobil_modeli WHERE avtomobil_markasi_id=:avtomobil_markasi_id and avtomobil_model_durum=:avtomobil_model_durum ");

$auto_model_sor->execute(array(

'avtomobil_markasi_id'=>$marka_id,
'avtomobil_model_durum'=>1));

$modelsayi= $auto_model_sor->rowCount();







	if($modelsayi>0){

?>

		<option disabled="disabled" value="" selected="selected"> Secin...</option>

<?php

		while ($auto_model_cek=$auto_model_sor->fetch(PDO::FETCH_ASSOC)) {

?>

			<option value="<?php echo $auto_model_cek['avtomobil_model_id']; ?>"> <?php echo $auto_model_cek['avtomobil_model_ad']; ?></option>	

<?php

		}

	}else{

?>

	<option value="" selected="selected"></option>	

<?php

	}



?>