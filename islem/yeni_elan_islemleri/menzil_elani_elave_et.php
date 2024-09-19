<?php 

$binatipi_id		=	ReqemlerXaricButunKarakterleriSil($_POST["binatipi_id"]);
$binatipisor=$db->prepare("SELECT * FROM binatipi where binatipi_durum=:binatipi_durum and binatipi_id=:binatipi_id");
$binatipisor->execute(array(
	'binatipi_durum'=>1,
	'binatipi_id'=>$binatipi_id));
$binatipisay=$binatipisor->rowCount();
if ($binatipisay==1) {
	$binatipi_cek=$binatipisor->fetch(PDO::FETCH_ASSOC);
	$binatipi_id=$binatipi_cek["binatipi_id"];
	$binatipi_adi=$binatipi_cek["binatipi_adi"];
}else{
	header("Location:../yenielan.php?durum=binatipisef");
	exit;
}


$binaninmertebesayi		=	ReqemlerXaricButunKarakterleriSil($_POST["binaninmertebesayi"]);
$yerlesdiyi_mertebe		=	ReqemlerXaricButunKarakterleriSil($_POST["yerlesdiyi_mertebe"]);
$otaq_sayi		=	ReqemlerXaricButunKarakterleriSil($_POST["otaq_sayi"]);
$umumi_sahesi		=	ReqemlerXaricButunKarakterleriSil($_POST["umumi_sahesi"]);
$unvan=HerfVeReqemIcerikleriniFitrle($_POST["unvan"]);

$yerlesdiyiblok		=	ReqemlerXaricButunKarakterleriSil($_POST["yerlesdiyiblok"]);
$yerlesdiyibloksor=$db->prepare("SELECT * FROM yerlesdiyiblok where yerlesdiyiblok_durum=:yerlesdiyiblok_durum and yerlesdiyiblok_id=:yerlesdiyiblok_id");
$yerlesdiyibloksor->execute(array(
	'yerlesdiyiblok_durum'=>1,
	'yerlesdiyiblok_id'=>$yerlesdiyiblok));
$yerlesdiyibloksay=$yerlesdiyibloksor->rowCount();
if ($yerlesdiyibloksay==1) {
	$yerlesdiyiblokcek=$yerlesdiyibloksor->fetch(PDO::FETCH_ASSOC);
	$yerlesdiyiblok_id=$yerlesdiyiblokcek["yerlesdiyiblok_id"];
	$yerlesdiyiblok_ad=$yerlesdiyiblokcek["yerlesdiyiblok_ad"];
}else{
	header("Location:../yenielan.php?durum=yerlesdiyiblokxeta");
	exit;
}


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

 $elan_adi="Mənzil";


$yenile = $db->prepare("UPDATE elan SET     
	SEO_URL=:SEO_URL,  
	elan_adi=:elan_adi,
	binatipi_id=:binatipi_id,
	binatipi_adi=:binatipi_adi,
	binaninmertebesayi=:binaninmertebesayi,  
	yerlesdiyi_mertebe=:yerlesdiyi_mertebe,
	otaq_sayi=:otaq_sayi,
	umumi_sahesi=:umumi_sahesi,
	unvan=:unvan,
	yerlesdiyiblok_id=:yerlesdiyiblok_id,
	yerlesdiyiblok_ad=:yerlesdiyiblok_ad,
	emlak_senedi_id=:emlak_senedi_id,
	emlak_senedi_ad=:emlak_senedi_ad,
	proyekt_id=:proyekt_id,
	proyekt_ad=:proyekt_ad
	WHERE elan_id=$elan_id");
$update = $yenile->execute(array(			
	'SEO_URL' => $SEO_URL,
	'elan_adi' => $elan_adi,
	'binatipi_id' => $binatipi_id,
	'binatipi_adi' => $binatipi_adi,
	'binaninmertebesayi' => $binaninmertebesayi,
	'yerlesdiyi_mertebe' => $yerlesdiyi_mertebe,
	'otaq_sayi' => $otaq_sayi,
	'umumi_sahesi' => $umumi_sahesi,
	'unvan' => $unvan,
	'yerlesdiyiblok_id' => $yerlesdiyiblok_id,
	'yerlesdiyiblok_ad' => $yerlesdiyiblok_ad,
	'emlak_senedi_id' => $emlak_senedi_id,
	'emlak_senedi_ad' => $emlak_senedi_ad,
	'proyekt_id' => $proyekt_id,
	'proyekt_ad' => $proyekt_ad
));


?>