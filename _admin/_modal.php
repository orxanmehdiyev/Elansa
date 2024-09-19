<div id="Modal" class="Yeni" style="display: none;">
	<div id="ModalAlani" class="YeniModalAlaniKapsayicisi" style="display: none;">
		<div class="YeniModalBaslikAlaniKapsayicisi">
			<span class="baxla" onClick="Bagla()">Baxla</span>
		</div>
		<div class="YeniModalIcerik" id="modalformalaniici">
		</div>
	</div>
</div>


<div id="YeniSeherElaveEtUcunDovlet" style="display: none;">
	<?php
	$Dovletmodal_Sor = $db->prepare("SELECT * FROM dovlet where Durum=:Durum");
	$Dovletmodal_Sor->execute(array(
		'Durum' => 1
	));
	?>
	<option disabled="disabled" value="" selected="selected"> Secin...</option>
	<?php
	while ($dovletcek = $Dovletmodal_Sor->fetch(PDO::FETCH_ASSOC)) {
		?>
		<option value="<?php echo $dovletcek['Dovlet_Id'] ?>"><?php echo $dovletcek['Dovlet_Ad'] ?></option>
	<?php } ?>  
</div>

<div id="YeniKatagoriyaElaveEtUcunBolme" style="display: none;">
	<?php
	$bolmemodal_Sor = $db->prepare("SELECT * FROM bolme where bolme_durum=:bolme_durum");
	$bolmemodal_Sor->execute(array(
		'bolme_durum' => 1
	));
	?>
	<option disabled="disabled" value="" selected="selected"> Secin...</option>
	<?php
	while ($bolmecek = $bolmemodal_Sor->fetch(PDO::FETCH_ASSOC)) {
		?>
		<option value="<?php echo $bolmecek['bolme_id'] ?>"><?php echo $bolmecek['bolme_ad'] ?></option>
	<?php } ?>  
</div>


<!-- Sil  modali başlayır--->
<div id="SilKaratmaAlani" class="ModalKarartmaAlaniKapsayicisi" style="display: none;">
	<div id="SilModalAlani" class="ModalAlaniKapsayicisi" style="display: none;">
		<div class="ModalBaslikAlaniKapsayicisi">Diqqət ! Vacib Xəbərdarlıq !</div>
		<div id="SilModalMetinAlani" class="ModalMetinAlaniKapsayicisi"></div>
		<div id="" class="ModalButonAlaniKapsayicisi">
			<div id="SilIslemiOnayButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="SilIslemiOnayButonu" href="" target="_top">Sil</a></div>
			<span id="SilIslemiImtinaButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="SilImtina()" style="display: none;">İmtina</span>
		</div>
	</div>
</div>
<!-- Sil  modali başlayır--->




<!-- Dövlət sil  modali başlayır--->
<div id="DovletSilKaratmaAlani" class="ModalKarartmaAlaniKapsayicisi" style="display: none;">
	<div id="DovletSilModalAlani" class="ModalAlaniKapsayicisi" style="display: none;">
		<div class="ModalBaslikAlaniKapsayicisi">Diqqət ! Vacib Xəbərdarlıq !</div>
		<div id="ModalMetinAlani" class="ModalMetinAlaniKapsayicisi"></div>
		<div id="" class="ModalButonAlaniKapsayicisi">
			<div id="SilIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="SilIslemiOnaylaButonu" href="" target="_top">Sil</a></div>
			<span id="SilIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="DovletSilImtina()" style="display: none;">İmtina</span>
		</div>
	</div>
</div>