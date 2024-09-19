<?php
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
	if(isset($_REQUEST["Dovlet_Id"])){
		$Dovlet_Id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["Dovlet_Id"]);

		$DovletSor=$db->prepare("SELECT * FROM dovlet  ");
		$DovletSor->execute();
		$DovletSay= $DovletSor->rowCount();
		if($DovletSay>0){
			while ($DovletCek=$DovletSor->fetch(PDO::FETCH_ASSOC)) {
				?>
				<option 
				<?php if($Dovlet_Id==$DovletCek['Dovlet_Id']){
					echo 'selected="selected"';
				}else{
					echo "";
				} ?>
				value="<?php echo $DovletCek['Dovlet_Id']; ?>"> <?php echo $DovletCek['Dovlet_Ad']; ?></option>	
				<?php
			}
		}else{
			?>
			<option value="" selected="selected"></option>	
			<?php
		}
	}
}
?>