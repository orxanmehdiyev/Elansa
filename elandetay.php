<?php 
require_once "_header.php";

$elandetaysor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and SEO_URL=:SEO_URL and elan_id=:elan_id");
$elandetaysor->execute(array(
	'yayim_durumu'=>1,
	'SEO_URL'=>$_GET['sef'],
	'elan_id'=>$_GET['elan_id']));
$elandetaysay = $elandetaysor->rowCount();

if ($elandetaysay==1) {
	$elandetaycek = $elandetaysor->fetch(PDO::FETCH_ASSOC);
	if ($elandetaycek['karoqoriya_id']==1) {
		require_once 'Avtomobil_Elani/Avtomobil_Elani_Detay.php';
	}elseif($elandetaycek['karoqoriya_id']==4){
		require_once 'elandetay/menzil.php';
	}elseif($elandetaycek['karoqoriya_id']==5){
		require_once 'elandetay/villa.php';
	}elseif($elandetaycek['karoqoriya_id']==6){
		require_once 'elandetay/qaraj.php';
	}elseif($elandetaycek['karoqoriya_id']==7){
		require_once 'elandetay/obyekt.php';
	}elseif($elandetaycek['karoqoriya_id']==8){
		require_once 'elandetay/torpaq.php';
	}


}else{
	header("Location:/");
}
?>

</div>





<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabels">Sil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="elanduzelis" method="POST">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label" id="elan_pin_kodes_metni">Pin Kod:</label>
						<input type="text" class="form-control" id="elan_pin_kodes" name="elan_pin_kodes">
						<input type="hidden" id="elan_ids" value="<?php echo $elandetaycek['elan_id'] ?>" name="elan_ids">

					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
				<button type="button" class="btn btn-primary" onclick="ElanSil()">Sil</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Düzəliş</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="elanduzelis" method="POST">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label" id="elan_pin_kode_metni">Pin Kod:</label>
						<input type="text" class="form-control" id="elan_pin_kode" name="elan_pin_kode">
						<input type="hidden" id="elan_id" value="<?php echo $elandetaycek['elan_id'] ?>" name="elan_id">
						<input type="hidden" id="SEO_URL" value="<?php echo $elandetaycek['SEO_URL'] ?>" name="SEO_URL">
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
				<button type="button" class="btn btn-primary" onclick="ElanDuzenle()">Göndər</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="sikayetid" tabindex="-1" role="dialog" aria-labelledby="sikayet" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="sikayet">Şikayət Et</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="elansikayet" method="POST" action="islem/elan_sikayet.php">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label" id="elansikayet_email_metni">E-Mail:</label>
						<input type="email" required="" class="form-control" id="elansikayet_email" name="elansikayet_email">


					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label" id="elan_sikayet_metni">Şikayət Səbəbi:</label>
						<input type="text" required="" class="form-control" id="elan_sikayet" name="elan_sikayet">
						<input type="hidden" id="elansikayetid" value="<?php echo $elandetaycek['elan_id'] ?>" name="elansikayetid">
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
				<button type="button" class="btn btn-primary" onclick="ElanSikayetGonder()">Göndər</button>
			</div>
		</div>
	</div>
</div>





<script type="text/javascript">

	function ElanSikayetGonder() {
		if (document.getElementById("elansikayet_email")) {
			if (document.getElementById("elansikayet_email").value == "") {
				var elansikayet_email = document.getElementById("elansikayet_email");
				document.getElementById("elansikayet_email_metni").style.color = "#ff0000";
				elansikayet_email.style.outline = "none";
				elansikayet_email.style.border = "2px solid #ff0000";
				elansikayet_email.style.color = "#ff0000";
				elansikayet_email.focus();
				return;
			}
		}
		if (document.getElementById("elan_sikayet")) {
			if (document.getElementById("elan_sikayet").value == "") {
				var elan_sikayet = document.getElementById("elan_sikayet");
				document.getElementById("elan_sikayet_metni").style.color = "#ff0000";
				elan_sikayet.style.outline = "none";
				elan_sikayet.style.border = "2px solid #ff0000";
				elan_sikayet.style.color = "#ff0000";
				elan_sikayet.focus();
				return;
			}
		}
		document.elansikayet.submit();
	}



	function ElanSil() {
		if (document.getElementById("elan_pin_kodes")) {
			if (document.getElementById("elan_pin_kodes").value == "") {
				var elan_pin_kodes = document.getElementById("elan_pin_kodes");
				document.getElementById("elan_pin_kodes_metni").style.color = "#ff0000";
				elan_pin_kodes.style.outline = "none";
				elan_pin_kodes.style.border = "2px solid #ff0000";
				elan_pin_kodes.style.color = "#ff0000";
				elan_pin_kodes.focus();
				return;
			}else{
				var elan_pin_kodes=document.getElementById("elan_pin_kodes").value;
				var elan_ids=document.getElementById("elan_ids").value;
				var xhttp = new XMLHttpRequest();
				console.log(xhttp);
				xhttp.open("POST", "islem/elan_duzelis_islem.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("elan_pin_kodes=" + elan_pin_kodes+"&elan_ids="+elan_ids);
				xhttp.onreadystatechange = function () {

					if (this.readyState == 4 && this.status == 200) {
						var Cavab=this.responseText;
						var Sonucu	=	Cavab.replace(/[^1]/g, "");
						if (Sonucu==1) {
							window.location = "index";
						}else{
							var elan_pin_kode = document.getElementById("elan_pin_kode");
							document.getElementById("elan_pin_kode_metni").style.color = "#ff0000";
							elan_pin_kode.style.outline = "none";
							elan_pin_kode.style.border = "2px solid #ff0000";
							elan_pin_kode.style.color = "#ff0000";
							elan_pin_kode.focus();
							return;
						}
						

						
					}
				}
			}
		}
	}

















	function ElanDuzenle() {
		if (document.getElementById("elan_pin_kode")) {
			if (document.getElementById("elan_pin_kode").value == "") {
				var elan_pin_kode = document.getElementById("elan_pin_kode");
				document.getElementById("elan_pin_kode_metni").style.color = "#ff0000";
				elan_pin_kode.style.outline = "none";
				elan_pin_kode.style.border = "2px solid #ff0000";
				elan_pin_kode.style.color = "#ff0000";
				elan_pin_kode.focus();
				return;
			}else{
				var elan_pin_kode=document.getElementById("elan_pin_kode").value;
				var elan_id=document.getElementById("elan_id").value;
				var SEO_URL=document.getElementById("SEO_URL").value;
				var xhttp = new XMLHttpRequest();
				console.log(xhttp);
				xhttp.open("POST", "islem/elan_duzelis_islem.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("elan_pin_kode=" + elan_pin_kode+"&elan_id="+elan_id);
				xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						var Cavab=this.responseText;
						var Sonucu	=	Cavab.replace(/[^1]/g, "");
						if (Sonucu==1) {
							window.location = "elanduzenle-"+SEO_URL+"-"+elan_id;
						}else{
							var elan_pin_kode = document.getElementById("elan_pin_kode");
							document.getElementById("elan_pin_kode_metni").style.color = "#ff0000";
							elan_pin_kode.style.outline = "none";
							elan_pin_kode.style.border = "2px solid #ff0000";
							elan_pin_kode.style.color = "#ff0000";
							elan_pin_kode.focus();
							return;
						}
						
					}
				}
			}
		}
	}



</script>






<?php require_once "_footer.php" ?>