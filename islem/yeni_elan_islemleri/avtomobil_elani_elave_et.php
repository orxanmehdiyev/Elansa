<?php 

$avtomobil_markasi_id=ReqemlerXaricButunKarakterleriSil($_POST['avtomobil_markasi_id']);
$auto_marka_sor=$db->prepare("SELECT * FROM avtomobil_markasi where avtomobil_markasi_durum=:avtomobil_markasi_durum and avtomobil_markasi_id=:avtomobil_markasi_id");
$auto_marka_sor->execute(array(
	'avtomobil_markasi_durum'=>1,
	'avtomobil_markasi_id'=>$avtomobil_markasi_id));
$avtmarkasay=$auto_marka_sor->rowCount();
if ($avtmarkasay==1) {
	$auto_marka_cek=$auto_marka_sor->fetch(PDO::FETCH_ASSOC);
	$avtomobil_markasi_id=$auto_marka_cek["avtomobil_markasi_id"];
	$avtomobil_markasi_ad=$auto_marka_cek["avtomobil_markasi_ad"];
}else{
	header("Location:../yenielan.php?durum=avtomarkasef");
	exit;
}




$avtomobil_model_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_model_id"]);
$auto_model_sor=$db->prepare("SELECT * FROM avtomobil_modeli WHERE avtomobil_model_id=:avtomobil_model_id and avtomobil_model_durum=:avtomobil_model_durum ");
$auto_model_sor->execute(array(
	'avtomobil_model_id'=>$avtomobil_model_id,
	'avtomobil_model_durum'=>1));
$modelsayi= $auto_model_sor->rowCount();
if ($modelsayi==1) {
	$auto_model_cek=$auto_model_sor->fetch(PDO::FETCH_ASSOC);
	$avtomobil_model_id=$auto_model_cek["avtomobil_model_id"];
	$avtomobil_model_ad=$auto_model_cek["avtomobil_model_ad"];
}else{
	header("Location:../yenielan.php?durum=avtomodelxeta");
	exit;
}


$avtomobil_ban_novu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_ban_novu_id"]);
$ban_sor=$db->prepare("SELECT * FROM avtomobil_ban_novu  where avtomobil_ban_novu_durum=:avtomobil_ban_novu_durum and avtomobil_ban_novu_id=:avtomobil_ban_novu_id");
$ban_sor->execute(array(
	'avtomobil_ban_novu_durum'=>1,
	'avtomobil_ban_novu_id'=>$avtomobil_ban_novu_id));
$ban_say= $ban_sor->rowCount();
if ($ban_say==1) {
	$ban_cek=$ban_sor->fetch(PDO::FETCH_ASSOC);
	$avtomobil_ban_novu_id=$ban_cek["avtomobil_ban_novu_id"];
	$avtomobil_ban_novu_ad=$ban_cek["avtomobil_ban_novu_ad"];
}else{
	header("Location:../yenielan.php?durum=avtobanxeta");
	exit;
}




$avto_yurus_km		=	ReqemlerXaricButunKarakterleriSil($_POST["avto_yurus_km"]);
if($avto_yurus_km<=0){
	header("Location:../yenielan.php?durum=avtoyuruskmxeta");
	exit;
}






$avto_suret_qutusu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avto_suret_qutusu_id"]);
$suretqutusu_sor=$db->prepare("SELECT * FROM avto_suret_qutusu where avto_suret_qutusu_durum=:avto_suret_qutusu_durum and avto_suret_qutusu_id=:avto_suret_qutusu_id");
$suretqutusu_sor->execute(array(
	'avto_suret_qutusu_durum'=>1,
	'avto_suret_qutusu_id'=>$avto_suret_qutusu_id));
$suretqutusu_say= $suretqutusu_sor->rowCount();
if ($suretqutusu_say==1) {
	$avto_suret_qutusu_cek=$suretqutusu_sor->fetch(PDO::FETCH_ASSOC);
	$avto_suret_qutusu_id=$avto_suret_qutusu_cek["avto_suret_qutusu_id"];
	$avto_suret_qutusu_ad=$avto_suret_qutusu_cek["avto_suret_qutusu_ad"];
}else{
	header("Location:../yenielan.php?durum=avto_suret_qutusu_xeta");
	exit;
}



$yanacaq_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avtomobil_yanacaq_id"]);
$yanacaq_sor=$db->prepare("SELECT * FROM yanacaq where yanacaq_durum=:yanacaq_durum and yanacaq_id=:yanacaq_id");
$yanacaq_sor->execute(array(
	'yanacaq_durum'=>1,
	'yanacaq_id'=>$yanacaq_id));
$yanacaq_say= $yanacaq_sor->rowCount();
if ($yanacaq_say==1) {
	$yanacaq_cek=$yanacaq_sor->fetch(PDO::FETCH_ASSOC);
	$yanacaq_id=$yanacaq_cek["yanacaq_id"];
	$yanacaq_ad=$yanacaq_cek["yanacaq_ad"];
}else{
	header("Location:../yenielan.php?durum=yanacaq_xeta");
	exit;
}



$avtomobilmuherrikhecmi_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avto_muherrikin_hecmi"]);
$avtomobilmuherrikhecmisor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum and avtomobilmuherrikhecmi_id=:avtomobilmuherrikhecmi_id ");
$avtomobilmuherrikhecmisor->execute(array(
	'avtomobilmuherrikhecmi_durum'=>1,
	'avtomobilmuherrikhecmi_id'=>$avtomobilmuherrikhecmi_id));
$avtomobilmuherrikhecmi_say= $avtomobilmuherrikhecmisor->rowCount();
if ($yanacaq_say==1) {
	$avtomobilmuherrikhecmicek=$avtomobilmuherrikhecmisor->fetch(PDO::FETCH_ASSOC);
	$avtomobilmuherrikhecmi_id=$avtomobilmuherrikhecmicek["avtomobilmuherrikhecmi_id"];
	$avtomobilmuherrikhecmi_ad=$avtomobilmuherrikhecmicek["avtomobilmuherrikhecmi_ad"];
}else{
	header("Location:../yenielan.php?durum=avtomobilmuherrikhecmi_xeta");
	exit;
}


$muherrikin_at_gucu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["muherrikin_at_gucu_id"]);
if($muherrikin_at_gucu_id<=0){
	header("Location:../yenielan.php?durum=muherrikin_at_gucu_ilixeta");
	exit;
}



$avto_otrucu_id		=	ReqemlerXaricButunKarakterleriSil($_POST["avto_otrucu_id"]);
$otrucu_sor=$db->prepare("SELECT * FROM avto_otrucu where avto_otrucudurum=:avto_otrucudurum and avto_otrucu_id=:avto_otrucu_id");
$otrucu_sor->execute(array(
	'avto_otrucudurum'=>1,
	'avto_otrucu_id'=>$avto_otrucu_id));
$otrucu_say= $otrucu_sor->rowCount();
if ($otrucu_say==1) {
	$otrucu_cek=$otrucu_sor->fetch(PDO::FETCH_ASSOC);
	$avto_otrucu_id=$otrucu_cek["avto_otrucu_id"];
	$avto_otrucu_ad=$otrucu_cek["avto_otrucu_ad"];
}else{
	header("Location:../yenielan.php?durum=avto_otrucu_xeta");
	exit;
}


$elan_adi=$avtomobil_markasi_ad.", ".$avtomobil_model_ad;

$yenile = $db->prepare("UPDATE elan SET     
	SEO_URL=:SEO_URL,  
	elan_adi=:elan_adi,
	avtomobil_markasi_id=:avtomobil_markasi_id,
	avtomobil_markasi_ad=:avtomobil_markasi_ad,
	avtomobil_model_id=:avtomobil_model_id,
	avtomobil_model_ad=:avtomobil_model_ad,
	avtomobil_ban_novu_id=:avtomobil_ban_novu_id,
	avtomobil_ban_novu_ad=:avtomobil_ban_novu_ad,
	avto_yurus_km=:avto_yurus_km,
	avto_suret_qutusu_id=:avto_suret_qutusu_id,
	avto_suret_qutusu_ad=:avto_suret_qutusu_ad,
	yanacaq_id=:yanacaq_id,
	yanacaq_ad=:yanacaq_ad,
	avtomobilmuherrikhecmi_id=:avtomobilmuherrikhecmi_id,
		avtomobilmuherrikhecmi_ad=:avtomobilmuherrikhecmi_ad,
			muherrikin_at_gucu_id=:muherrikin_at_gucu_id,
		avto_otrucu_id=:avto_otrucu_id,
		avto_otrucu_ad=:avto_otrucu_ad


	WHERE elan_id=$elan_id");
$update = $yenile->execute(array(			
	'SEO_URL' => $SEO_URL,
	'elan_adi' => $elan_adi,
	'avtomobil_markasi_id' => $avtomobil_markasi_id,
	'avtomobil_markasi_ad' => $avtomobil_markasi_ad,
	'avtomobil_model_id' => $avtomobil_model_id,
	'avtomobil_model_ad' => $avtomobil_model_ad,
	'avtomobil_ban_novu_id' => $avtomobil_ban_novu_id,
	'avtomobil_ban_novu_ad' => $avtomobil_ban_novu_ad,
	'avto_yurus_km' => $avto_yurus_km,
	'avto_suret_qutusu_id' => $avto_suret_qutusu_id,
	'avto_suret_qutusu_ad' => $avto_suret_qutusu_ad,
	'yanacaq_id' => $yanacaq_id,
	'yanacaq_ad' => $yanacaq_ad,
	'avtomobilmuherrikhecmi_id' => $avtomobilmuherrikhecmi_id,
	'avtomobilmuherrikhecmi_ad' => $avtomobilmuherrikhecmi_ad,
	'muherrikin_at_gucu_id' => $muherrikin_at_gucu_id,
	'avto_otrucu_id' => $avto_otrucu_id,
	'avto_otrucu_ad' => $avto_otrucu_ad
));





























?>