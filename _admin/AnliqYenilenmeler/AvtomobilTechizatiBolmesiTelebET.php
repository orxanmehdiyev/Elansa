<?php
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
	if(isset($_REQUEST["AvtomobilTechizatiBolmesi"])){
		$avtomobil_techizat_bolmesi_id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["AvtomobilTechizatiBolmesi"]);
		$AvtomobilTechizatiBolmesiSor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi  where avtomobil_techizat_bolmesi_durum=:avtomobil_techizat_bolmesi_durum");
		$AvtomobilTechizatiBolmesiSor->execute(array(
			'avtomobil_techizat_bolmesi_durum'=>1));
		$AvtomobilTechizatiBolmesiSay= $AvtomobilTechizatiBolmesiSor->rowCount();
		if($AvtomobilTechizatiBolmesiSay>0){?>
				<select name="avtomobil_techizat_bolmesi_id_sec" tabindex="2" required="required" id="avtomobil_techizat_bolmesi_id_sec" class="FormAlanlariUcunSelectInputlari" onchange="SelectInputAlaniSecildi(this.id)">
		<?php	while ($AvtomobilTechizatiBolmesiCek=$AvtomobilTechizatiBolmesiSor->fetch(PDO::FETCH_ASSOC)) {
				?>
				<option 
				<?php if($avtomobil_techizat_bolmesi_id==$AvtomobilTechizatiBolmesiCek['avtomobil_techizat_bolmesi_id']){
					echo 'selected="selected"';
				}else{
					echo "";
				} ?>
				value="<?php echo $AvtomobilTechizatiBolmesiCek['avtomobil_techizat_bolmesi_id']; ?>"> <?php echo $AvtomobilTechizatiBolmesiCek['avtomobil_techizat_bolmesi_ad']; ?></option>	
				<?php
			}
		}else{
			?>
			<option value="" selected="selected"></option>	
			<?php
		} ?>
			</select>
	<?php	}
}
?>