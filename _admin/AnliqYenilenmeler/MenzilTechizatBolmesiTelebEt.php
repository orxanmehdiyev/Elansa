<?php
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
	if(isset($_REQUEST["MenziTechizatBolmesiID"])){
		$MenziTechizatBolmesiID		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["MenziTechizatBolmesiID"]);
		$Sor=$db->prepare("SELECT * FROM menzil_techizat_bolmesi  where MenziTechizatBolmesiDurum=:MenziTechizatBolmesiDurum");
		$Sor->execute(array(
			'MenziTechizatBolmesiDurum'=>1));
		$menzil_techizat_bolmesi_Say= $Sor->rowCount();
		if($menzil_techizat_bolmesi_Say>0){?>
				<select name="MenziTechizatBolmesiAd_sec" tabindex="2" required="required" id="MenziTechizatBolmesiID_sec" class="FormAlanlariUcunSelectInputlari" onchange="SelectInputAlaniSecildi(this.id)">
		<?php	while ($Cek=$Sor->fetch(PDO::FETCH_ASSOC)) {
				?>
				<option 
				<?php if($MenziTechizatBolmesiID==$Cek['MenziTechizatBolmesiID']){
					echo 'selected="selected"';
				}else{
					echo "";
				} ?>
				value="<?php echo $Cek['MenziTechizatBolmesiID']; ?>"> <?php echo $Cek['MenziTechizatBolmesiAd']; ?></option>	
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