<?php
require_once "../Ayarlar/ayarlar.php";
if(isset($_SESSION["admistis_mail"])){
	if(isset($_REQUEST["bolme_id"])){
		$bolme_id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["bolme_id"]);
		$bolmeSor=$db->prepare("SELECT * FROM bolme  ");
		$bolmeSor->execute();
		$bolmeSay= $bolmeSor->rowCount();
		if($bolmeSay>0){
			while ($bolmeCek=$bolmeSor->fetch(PDO::FETCH_ASSOC)) {
				?>
				<option 
				<?php if($bolme_id==$bolmeCek['bolme_id']){
					echo 'selected="selected"';
				}else{
					echo "";
				} ?>
				value="<?php echo $bolmeCek['bolme_id']; ?>"> <?php echo $bolmeCek['bolme_ad']; ?></option>	
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