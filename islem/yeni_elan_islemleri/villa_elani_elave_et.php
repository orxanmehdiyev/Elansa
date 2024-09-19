<?php 




$binaninmertebesayi		=	ReqemlerXaricButunKarakterleriSil($_POST["binaninmertebesayi"]);
$otaq_sayi		=	ReqemlerXaricButunKarakterleriSil($_POST["otaq_sayi"]);
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



$proyekt_id		=	ReqemlerXaricButunKarakterleriSil($_POST["proyekt_id"]);
$proyekt=$db->prepare("SELECT * FROM proyekt where menziller_ucun_proyekt_durum=:menziller_ucun_proyekt_durum and proyekt_id=:proyekt_id");
$proyekt->execute(array(
	'menziller_ucun_proyekt_durum'=>1,
	'proyekt_id'=>$proyekt_id));
$proyektsay=$proyekt->rowCount();
if ($proyektsay==1) {
	$proyektcek=$proyekt->fetch(PDO::FETCH_ASSOC);
	$proyekt_id=$proyektcek["proyekt_id"];
	$proyekt_ad=$proyektcek["proyekt_ad"];
}else{
	header("Location:../yenielan.php?durum=proyektxet");
	exit;
}



 $elan_adi="Villa";


$yenile = $db->prepare("UPDATE elan SET     
	SEO_URL=:SEO_URL,  
	elan_adi=:elan_adi,
	binaninmertebesayi=:binaninmertebesayi,  
	yasayis_sahesi=:yasayis_sahesi,
	otaq_sayi=:otaq_sayi,
	umumi_sahesi=:umumi_sahesi,
	unvan=:unvan,
	emlak_senedi_id=:emlak_senedi_id,
	emlak_senedi_ad=:emlak_senedi_ad,
	proyekt_id=:proyekt_id,
	proyekt_ad=:proyekt_ad
	WHERE elan_id=$elan_id");
$update = $yenile->execute(array(			
	'SEO_URL' => $SEO_URL,
	'elan_adi' => $elan_adi,
	'binaninmertebesayi' => $binaninmertebesayi,
	'yasayis_sahesi' => $yasayis_sahesi,
	'otaq_sayi' => $otaq_sayi,
	'umumi_sahesi' => $umumi_sahesi,
	'unvan' => $unvan,
	'emlak_senedi_id' => $emlak_senedi_id,
	'emlak_senedi_ad' => $emlak_senedi_ad,
	'proyekt_id' => $proyekt_id,
	'proyekt_ad' => $proyekt_ad
));


?>