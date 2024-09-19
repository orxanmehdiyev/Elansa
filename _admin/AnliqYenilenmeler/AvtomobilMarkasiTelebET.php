<?php
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
	if(isset($_REQUEST["avtomobil_markasi_id"])){
		$avtomobil_markasi_id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["avtomobil_markasi_id"]);
		$Avtomobil_Markasi_Sor=$db->prepare("SELECT * FROM avtomobil_markasi  where avtomobil_markasi_durum=:avtomobil_markasi_durum");
		$Avtomobil_Markasi_Sor->execute(array(
			'avtomobil_markasi_durum'=>1));
		$Avtomobil_Markasi_Say= $Avtomobil_Markasi_Sor->rowCount();
		if($Avtomobil_Markasi_Say>0){?>
				<select name="avtomobil_markasi_id_sec" tabindex="2" required="required" id="avtomobil_markasi_id_sec" class="FormAlanlariUcunSelectInputlari" onchange="SelectInputAlaniSecildi(this.id)">
		<?php	while ($Avtomobil_Markasi_Cek=$Avtomobil_Markasi_Sor->fetch(PDO::FETCH_ASSOC)) {
				?>
				<option 
				<?php if($avtomobil_markasi_id==$Avtomobil_Markasi_Cek['avtomobil_markasi_id']){
					echo 'selected="selected"';
				}else{
					echo "";
				} ?>
				value="<?php echo $Avtomobil_Markasi_Cek['avtomobil_markasi_id']; ?>"> <?php echo $Avtomobil_Markasi_Cek['avtomobil_markasi_ad']; ?></option>	
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