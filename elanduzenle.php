<?php require_once "_header.php"; ?>

<div class="container">
	<div class="in-bread">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Ana səhifə</a></li>
				<li class="breadcrumb-item active" aria-current="page">Elan yerlesdir</li>
			</ol>
		</nav>
	</div>
	<?php 
	$SEO_URL=$_GET['sef'];
	$SEO_URL=$_GET['elan_id'];
	$elansor=$db->prepare("SELECT * FROM elan where SEO_URL=:SEO_URL and elan_id=:elan_id");
	$elansor->execute(array(
		'SEO_URL'=>$_GET['sef'],
		'elan_id'=>$_GET['elan_id']));
	$elansay = $elansor->rowCount();
	if ($elansay==1) {
		$elancek = $elansor->fetch(PDO::FETCH_ASSOC);
		if ($elancek['karoqoriya_id']==1) {
			require_once 'elanduzenle/avtomobil.php';
		}elseif($elancek['karoqoriya_id']==1){
			require_once 'elanduzenle/menzil.php';
		}


	}else{
		Header("Location:index");
	}
	?>


	
</div>
</div>
<?php require_once "_footer.php" ?>
