
<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Avtomobilin MarkasI  <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['avtomobil_markasi_ad'] ?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Avtomobilin Modeli  <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['avtomobil_model_ad'] ?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Ban Növü  <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['avtomobil_ban_novu_ad'] ?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Yürük kilometri <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['avto_yurus_km'].' km' ?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Sürət Qutusu <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['avto_suret_qutusu_ad']?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>


<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Yanacaq Növü <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['yanacaq_ad']?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Mühərrik Həcmi <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['avtomobilmuherrikhecmi_ad'].' sm'?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>

<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Mühərrik At Gücü <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['muherrikin_at_gucu_id']?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>


<div class="SeyfeIciSetirAlaniKapsayici">
	<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
		<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
			Avto Ötrüçü <span class="KirmiziYazi">*</span>
		</div>
		<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
			<input type="text" disabled=""   value="<?php echo  $elandetaycek ['avto_otrucu_ad']?>" class="FormAlanlariUcunTextInputlari">
		</div>
	</div>
</div>
<?php    
$techizat= json_decode($elandetaycek['techizat']);
$total = count((array)$techizat);

$array = ((array) $techizat);
$yeni=array_keys($array);
$sayi = count($yeni);
for ($i=0; $i <$sayi ; $i++) { ?>

	<div class="SeyfeIciSetirAlaniKapsayici">
		<div class="SeyfeIciSetirAlaniKapsayiciYuzdeEllilikAlan">
			<div class="SeyfeIciSetirAlaniSolMetinAlaniKapsayici">
				<?php 
				$AvtomobilTechizatSor=$db->prepare("SELECT * FROM avtomobil_techizat where avtomobil_techizat_id=:avtomobil_techizat_id and avtomobil_techizat_durum=:avtomobil_techizat_durum");
				$AvtomobilTechizatSor->execute(array(
					'avtomobil_techizat_id'=>$yeni[$i],
					'avtomobil_techizat_durum'=>1));
				$AvtomobilTechizatCek= $AvtomobilTechizatSor->fetch(PDO::FETCH_ASSOC);
				echo $AvtomobilTechizatCek['avtomobil_techizat_ad'];
				?>

				<span class="KirmiziYazi">*</span>
			</div>
			<div class="SeyfeIciSetirAlanlariSagFormElementleriAlaniKapsayicisi">
				<input type="text" disabled=""   value="Var" class="FormAlanlariUcunTextInputlari">
			</div>
		</div>
	</div>
<?php  }
?>



