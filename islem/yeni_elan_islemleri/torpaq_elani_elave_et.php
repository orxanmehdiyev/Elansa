<?php 
$umumi_sahesi		=	ReqemlerXaricButunKarakterleriSil($_POST["umumi_sahesi"]);
$yasayis_sahesi		=	ReqemlerXaricButunKarakterleriSil($_POST["yasayis_sahesi"]);
$unvan=HerfVeReqemIcerikleriniFitrle($_POST["unvan"]);


$emlak_senedi_id		=	ReqemlerXaricButunKarakterleriSil($_POST["emlak_senedi_id"]);
$emlaksenedi=$db->prepare("SELECT * FROM emlak_senedi where menziller_ucun_emlak_senedi_durum=:menziller_ucun_emlak_senedi_durum and emlak_senedi_id=:emlak_senedi_id");
$emlaksenedi->execute(array(
	'menziller_ucun_emlak_senedi_durum'=>1,
	'emlak_senedi_id'=>$emlak_senedi_id));
$emlaksenedisay=$emlaksenedi->rowCount();
if ($emlaksenedisay==1) {
	$emlaksenedicek=$emlaksenedi->fetch(PDO::FETCH_ASSOC);
	$emlak_senedi_id=$emlaksenedicek["emlak_senedi_id"];
	$emlak_senedi_ad=$emlaksenedicek["emlak_senedi_ad"];
}else{
	header("Location:../yenielan.php?durum=emlaksenedixeta");
	exit;
}






 $elan_adi="Torpaq Sahəsi";


$yenile = $db->prepare("UPDATE elan SET     
	SEO_URL=:SEO_URL,  
	elan_adi=:elan_adi,
	yasayis_sahesi=:yasayis_sahesi,
	umumi_sahesi=:umumi_sahesi,
	unvan=:unvan,
	emlak_senedi_id=:emlak_senedi_id,
	emlak_senedi_ad=:emlak_senedi_ad
	WHERE elan_id=$elan_id");
$update = $yenile->execute(array(			
	'SEO_URL' => $SEO_URL,
	'elan_adi' => $elan_adi,
	'yasayis_sahesi' => $yasayis_sahesi,
	'umumi_sahesi' => $umumi_sahesi,
	'unvan' => $unvan,
	'emlak_senedi_id' => $emlak_senedi_id,
	'emlak_senedi_ad' => $emlak_senedi_ad
));


?>