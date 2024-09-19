<?php 
if(empty($_SESSION["istifadeci"])){
	require_once "_header.php";
	if(isset($_GET['user_seo_url'])){
		$usertesdiqsor    = $db->prepare("SELECT * FROM user where user_seo_url=:user_seo_url");
		$usertesdiqsor->execute(array(
			'user_seo_url' 				=>  $_GET['user_seo_url']));
		$usertesdiqcek=$usertesdiqsor->fetch(PDO::FETCH_ASSOC);
	}else{
		Header("Location:../404");
		exit();
	}

	?>

	<!---------->


	<div class="error-page">
		<img alt="" title="">
		<h2>Qeydiyatınız uğurlu</h2>
		<h3>Uğurla qeydiyatdan kecdiniz email unvanınızı təsdikləyin </h3>
		<form method="POST" action="../islem/emailtesdiq.php">
			<input type="hidden" name="user_id" value="<?php echo	$usertesdiqcek['user_id'] ?>" >
			<input type="number" name="EmailTesdiqKodu" max="999999" maxlength="6">
			<button type="submit" >Göndər</button>
		</form>

	</div>







	<?php require_once "_footer.php";
}else{
	Header("Location:../404");
	exit();
}
?>}
