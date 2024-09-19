<?php 
require_once "../_admin/Ayarlar/ayarlar.php";
if (isset($_POST['elansikayetid'])) {
	$elan_id=$_POST['elansikayetid'];
	$elansikayet_email=$_POST['elansikayet_email'];
	$elan_sikayet=$_POST['elan_sikayet'];

	$elenekle=$db->prepare("INSERT INTO  elansikayet SET
		elan_id		               =:elan_id,
		elansikayet_email		     =:elansikayet_email,
		elansikayet_sebebi		   =:elansikayet_sebebi,
		ZamanDamgasi		         =:ZamanDamgasi,
		TarixSaat		             =:TarixSaat,
		IP_adresi		             =:IP_adresi		
		");
	$insert=$elenekle->execute(array(
		'elan_id'					    		=> $elan_id,
		'elansikayet_email'				=> $elansikayet_email,
		'elansikayet_sebebi'			=> $elan_sikayet,
		'ZamanDamgasi'					  => $ZamanDamgasi,
		'TarixSaat'						    => $TarixSaat,
		'IP_adresi'					      => $IPAdresi

	));
	if ($insert) {?>
<script type="text/javascript">
window.history.go(-1);
</script>
<?php

	}


}


?>