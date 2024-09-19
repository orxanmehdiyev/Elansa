<?php 
require_once "_header.php";
require_once "_menu.php"; 

?>
<section>
	<div id="seyfebaslikalani">
		<div id="seyfebaslikkapsayici">
			Dövlət Tənzimlənmələri
			<?php 
			if(!isset($_REQUEST['siralama']) or !isset($_REQUEST["axtar"]) or !isset($_REQUEST["seyfe"]) ){

			}else{
				header("Location:dovletler");
			}
			?>
		</div>    
	</div>

	<div id="ListelemeAlaniKapsayicisi">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="dovletler">Dövlətlər</a>
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="dovletyeni" ><img src="img/IconIslemlerEkle.png" title="Yeni" alt="Yeni"></a>
				</div>
			</span>
		</div>

		<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
			<form id="AramaFormu" name="AramaFormu" action="dovletaxtar" method="GET">
				<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
				<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="axtar" name="axtar" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
			</form>
		</div>

		<?php 
		if(isset($_REQUEST['siralama'])){
			if ($_REQUEST['siralama']=="id_sira_asc") {
				$siralama="Dovlet_Id ASC";
				$id_sira="id_sira_desc";
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=id_sira_asc&';			
			}
			elseif ($_REQUEST['siralama']=="id_sira_desc") {
				$siralama="Dovlet_Id DESC";
				$id_sira="id_sira_asc";						
				$reqem_kodu="reqem_kodu_asc";			
				$adi="ad_asc";
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?siralama=id_sira_desc&';	
			}		
			elseif ($_REQUEST['siralama']=="reqem_kodu_asc") {
				$siralama="Dovlet_Reqem_Kodu ASC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_dsc";
				$adi="ad_asc";
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";	
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=reqem_kodu_asc&';	
			}	
			elseif ($_REQUEST['siralama']=="reqem_kodu_dsc") {
				$siralama="Dovlet_Reqem_Kodu DESC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?siralama=reqem_kodu_dsc&';	
			}	
			elseif ($_REQUEST['siralama']=="ad_asc") {
				$siralama="Dovlet_Ad ASC ";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_desc";
				$beynelxalq_adi="beynelxalq_adi_asc";	
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?siralama=ad_asc&';		
			}			
			elseif ($_REQUEST['siralama']=="ad_desc") {
				$siralama="Dovlet_Ad DESC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=ad_desc&';
			}	

			elseif ($_REQUEST['siralama']=="beynelxalq_adi_asc") {
				$siralama="Dovlet_Beynelxalq_Adi ASC ";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_desc";	
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=beynelxalq_adi_asc&';	
			}			
			elseif ($_REQUEST['siralama']=="beynelxalq_adi_desc") {
				$siralama="Dovlet_Beynelxalq_Adi DESC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?siralama=beynelxalq_adi_desc&';	
			}	

			elseif ($_REQUEST['siralama']=="iso_kod_alfa_iki_asc") {
				$siralama="ISO_KODU_ALFA_2 ASC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_desc";	
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";
				$valyuta_kodu="valyuta_kodu_asc";	
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?siralama=iso_kod_alfa_iki_asc&';
			}			
			elseif ($_REQUEST['siralama']=="iso_kod_alfa_iki_desc") {
				$siralama="ISO_KODU_ALFA_2 DESC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=iso_kod_alfa_iki_desc&';
			}

			elseif ($_REQUEST['siralama']=="iso_kod_alfa_uc_asc") {
				$siralama="ISO_KODU_ALFA_3 ASC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";	
				$iso_kod_alfa_uc="iso_kod_alfa_uc_desc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=iso_kod_alfa_uc_asc&';
			}			
			elseif ($_REQUEST['siralama']=="iso_kod_alfa_uc_desc") {
				$siralama="ISO_KODU_ALFA_3 DESC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";	
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?siralama=iso_kod_alfa_uc_desc&';	
			}

			elseif ($_REQUEST['siralama']=="telefon_kodu_asc") {
				$siralama="Dovlet_Telefon_Kodu ASC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";	
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_desc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=telefon_kodu_asc&';
			}			
			elseif ($_REQUEST['siralama']=="telefon_kodu_desc") {
				$siralama="Dovlet_Telefon_Kodu DESC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=telefon_kodu_desc&';
			}

			elseif ($_REQUEST['siralama']=="valyuta_kodu_asc") {
				$siralama="Dovlet_Valyuta_Kodu ASC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";	
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_desc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";
				$link='dovletler?siralama=valyuta_kodu_asc&';
			}			
			elseif ($_REQUEST['siralama']=="valyuta_kodu_desc") {
				$siralama="Dovlet_Valyuta_Kodu DESC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?siralama=valyuta_kodu_desc&';
			}
			elseif ($_REQUEST['siralama']=="musteqillik_tarixi_asc") {
				$siralama="Dovlet_Musteqillik_Tarixi ASC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";	
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_desc";	
				$link='dovletler?siralama=musteqillik_tarixi_asc&';
			}			
			elseif ($_REQUEST['siralama']=="musteqillik_tarixi_desc") {
				$siralama="Dovlet_Musteqillik_Tarixi DESC";
				$id_sira="id_sira_asc";	
				$reqem_kodu="reqem_kodu_asc";
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";	
				$telefon_kodu="telefon_kodu_asc";	
				$valyuta_kodu="valyuta_kodu_asc";
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?siralama=musteqillik_tarixi_desc&';
			}


			else{
				$siralama="Dovlet_Id ASC";
				$id_sira="id_sira_asc";
				$reqem_kodu="reqem_kodu_asc";	
				$adi="ad_asc";	
				$beynelxalq_adi="beynelxalq_adi_asc";
				$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
				$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";
				$telefon_kodu="telefon_kodu_asc";
				$valyuta_kodu="valyuta_kodu_asc";	
				$musteqillik_tarixi="musteqillik_tarixi_asc";	
				$link='dovletler?';					

			}

		}else{
			$siralama="Dovlet_Id ASC";
			$id_sira="id_sira_asc";
			$reqem_kodu="reqem_kodu_asc";	
			$adi="ad_asc";	
			$beynelxalq_adi="beynelxalq_adi_asc";
			$iso_kod_alfa_iki="iso_kod_alfa_iki_asc";
			$iso_kod_alfa_uc="iso_kod_alfa_uc_asc";
			$telefon_kodu="telefon_kodu_asc";
			$valyuta_kodu="valyuta_kodu_asc";	
			$musteqillik_tarixi="musteqillik_tarixi_asc";	
			$link='dovletler?';	
		}



		$searchkeyword=HerfVeReqemIcerikleriniFitrle(html_entity_decode(urldecode($_REQUEST["axtar"]), ENT_QUOTES, "UTF-8"));    
		$axtarisuzunluq=strlen($searchkeyword);


		$dovletsaysor=$db->prepare("SELECT * FROM dovlet where Dovlet_Ad LIKE ? or Dovlet_Beynelxalq_Adi LIKE ? or ISO_KODU_ALFA_2 LIKE ? or Dovlet_Id LIKE ? or Dovlet_Telefon_Kodu LIKE ?");
		$dovletsaysor->execute(array("%$searchkeyword%", "%$searchkeyword%","%$searchkeyword%","%$searchkeyword%","%$searchkeyword%"));
		$dovletsayi=$dovletsaysor->rowCount();

		if(isset($_GET['seyfe'])){
			$GelenSayfalama=$_GET['seyfe'];
			if($_GET['seyfe']<1){
				header("Location:".$link);
				exit;
			}
		}else{
			$GelenSayfalama=1;
		}
		$SayfalamayaBaslanacakKayitSayisi   = ($GelenSayfalama*$DovletlerListelemeLimiti)-$DovletlerListelemeLimiti;
		$BulunanSayfaSayisiAxtar                 = ceil($dovletsayi/$DovletlerListelemeLimiti);
		$dovletsor=$db->prepare("SELECT * FROM dovlet where Dovlet_Ad LIKE ? or Dovlet_Beynelxalq_Adi LIKE ? or ISO_KODU_ALFA_2 LIKE ? or Dovlet_Id LIKE ? or Dovlet_Telefon_Kodu LIKE ? order by $siralama LIMIT $SayfalamayaBaslanacakKayitSayisi, $DovletlerListelemeLimiti");
		$dovletsor->execute(array( "%$searchkeyword%", "%$searchkeyword%","%$searchkeyword%","%$searchkeyword%","%$searchkeyword%"));
		$dovletaxtarsayi=$dovletsor->rowCount();
		if ($dovletaxtarsayi>0) {
			?>
			<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
				<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
					<thead>



						<th class="KodSutunu"><a href="dovletler?siralama=<?php echo $id_sira ?>&axtar=<?php echo $searchkeyword?>">Id</a></th>
						<th class="KodSutunu"><a href="dovletler?siralama=<?php echo $reqem_kodu ?>&axtar=<?php echo $searchkeyword?>">Rəqəm <br> Kodu</a></th> 
						<th><a href="dovletler?siralama=<?php echo $adi ?>&axtar=<?php echo $searchkeyword?>">Adı</a></th>
						<th><a href="dovletler?siralama=<?php echo $beynelxalq_adi ?>&axtar=<?php echo $searchkeyword?>">Beynelxalq Adı</a></th>
						<th class="KodSutunu"><a href="dovletler?siralama=<?php echo $iso_kod_alfa_iki ?>&axtar=<?php echo $searchkeyword?>">ISO KODU <br> ALFA 2</a></th>        
						<th class="KodSutunu"><a href="dovletler?siralama=<?php echo $iso_kod_alfa_uc ?>&axtar=<?php echo $searchkeyword?>">ISO KODU <br> ALFA 3</a></th> 
						<th class="KodSutunu"><a href="dovletler?siralama=<?php echo $telefon_kodu ?>&axtar=<?php echo $searchkeyword?>">Telefon <br> Kodu</a></th> 
						<th class="KodSutunu"><a href="dovletler?siralama=<?php echo $valyuta_kodu ?>&axtar=<?php echo $searchkeyword?>">Valyuta <br> Kodu</a></th>
						<th class="KodSutunu"><a href="dovletler?siralama=<?php echo $musteqillik_tarixi ?>&axtar=<?php echo $searchkeyword?>">Müstəqillik <br> Tarixi</a></th>
						<th class="KodSutunu">Durum</th>
						<th class="EmeliyatlarBaslikSutunu">Əməliyatlar</th>
		
					</thead>
					<tbody>
			<?php 
			while ($dovletcek= $dovletsor->fetch(PDO::FETCH_ASSOC)) {
				$Dovlet_Id=$dovletcek['Dovlet_Id'];
				$Dovlet_Reqem_Kodu=$dovletcek['Dovlet_Reqem_Kodu'];
				$Dovlet_Ad=$dovletcek['Dovlet_Ad'];
				$Dovlet_Beynelxalq_Adi=$dovletcek['Dovlet_Beynelxalq_Adi'];
				$ISO_KODU_ALFA_2=$dovletcek['ISO_KODU_ALFA_2'];
				$ISO_KODU_ALFA_3=$dovletcek['ISO_KODU_ALFA_3'];
				$Dovlet_Telefon_Kodu=$dovletcek['Dovlet_Telefon_Kodu'];
				$Dovlet_Valyuta_Kodu=$dovletcek['Dovlet_Valyuta_Kodu'];
				$Dovlet_Musteqillik_Tarixi=$dovletcek['Dovlet_Musteqillik_Tarixi'];
				?>
				<tr>    
				<td class="KodSutunu"> 
				<?php echo sprintf("%06s", $Dovlet_Id ); ?>
				</td>
				<td id="Dovlet_Reqem_Kodu-<?php echo $Dovlet_Id ?>" class="KodSutunu"><?php echo sprintf("%03s", $Dovlet_Reqem_Kodu ) ?></td>
				<td id="Dovlet_Ad-<?php echo $Dovlet_Id ?>"><?php echo $Dovlet_Ad ?></td>
				<td id="Dovlet_Beynelxalq_Adi-<?php echo $Dovlet_Id ?>"><?php echo $Dovlet_Beynelxalq_Adi ?></td>
				<td id="ISO_KODU_ALFA_2-<?php echo $Dovlet_Id ?>" class="KodSutunu"><?php echo $ISO_KODU_ALFA_2 ?></td>
				<td id="ISO_KODU_ALFA_2-<?php echo $Dovlet_Id ?>" class="KodSutunu"><?php echo $ISO_KODU_ALFA_3 ?></td>
				<td id="Dovlet_Telefon_Kodu-<?php echo $Dovlet_Id ?>" class="TelKodSutunu"><?php echo $Dovlet_Telefon_Kodu ?></td>
				<td id="Dovlet_Valyuta_Kodu-<?php echo $Dovlet_Id ?>" class="TelKodSutunu"><?php echo $Dovlet_Valyuta_Kodu ?></td>
				<td id="Dovlet_Musteqillik_Tarixi-<?php echo $Dovlet_Id ?>" class="TelKodSutunu"><?php echo $Dovlet_Musteqillik_Tarixi ?></td>
				<td class="KodSutunu">	
				<label class="checkbox">
				<input <?php if($dovletcek['Durum']==1){
					echo "checked";
				}else{
					echo "";
				} ?>  type="checkbox" id="<?php echo 'dovletdurum-'.$dovletcek['Dovlet_Id'] ?>" onchange="DovletDurumKontrol(this.id)" > 
				<span class="checkbox"> 
				<span></span>
				</span>
				</label>
				</td>
				<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
				<a href="<?php echo 'dovletyenile-'.$dovletcek['Dovlet_Id']."-".$dovletcek['SEO_URL'] ?>"><img src="img/IconIslemlerGuncelle.png" width="20" height="20" title="Yenilə" alt="Yenilə"></a>
				<a href="javascript:DovletSil(<?php echo $Dovlet_Id; ?>)"><img src="img/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
				</td>
				</tr>
			<?php } ?>
			</tbody>

				</table>

			</div>

			<div id="SayfalamaAlaniKapsayicisi">
				<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
					<?php echo $BulunanSayfaSayisiAxtar; ?> səyfədə, <?php echo $dovletsayi; ?> qeydiyatlı dövlət var.  <label for="cars">Choose a car:</label>
					<select onchange="DovletSiralamaLimiti(this.value)">
						<?php 
						if ($dovletsayi>100) {
							$Limitsayi=100;
						}else{
							$Limitsayi=$dovletsayi;
						}
						for ($i = 10; $i <= $Limitsayi; $i+=10 ) {	?>
							<option <?php if($DovletlerListelemeLimiti==$i){echo "selected";} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>

						<?php }	
						if (($dovletsayi%10)>0) { ?>
							<option <?php if($DovletlerListelemeLimiti==$dovletsayi){echo "selected";} ?> value="<?php echo $dovletsayi; ?>"><?php echo $dovletsayi; ?></option>
						<?php }


						?>
					</select>
				</div>
				<?php 
				if ($BulunanSayfaSayisiAxtar>1) {?>
					<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
						<?php
						if($GelenSayfalama<1){
							header("Location:dovletler?seyfe=$BulunanSayfaSayisiAxtar");
						}
						if ($GelenSayfalama>1) {
							$SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama-1;
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=1&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}else{
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
						}
						for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-5; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+5; $SayfalamaIcinSayfaIndexDegeri++){
							if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisiAxtar)){
								if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
									echo  "<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
								}else{
									echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaIndexDegeri."&axtar=".urlencode($searchkeyword)."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
								}
							}
						}
						if($GelenSayfalama>$BulunanSayfaSayisiAxtar){
							header("Location:dovletler?seyfe=$BulunanSayfaSayisiAxtar");
						}

						if($GelenSayfalama!=$BulunanSayfaSayisiAxtar){
							$SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama+1;
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"http://www.orayhus.com/aydan/".$link."seyfe=".$BulunanSayfaSayisiAxtar."&axtar=".urlencode($searchkeyword)."\" target=\"_top\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
						}else{
							$SayfalamaIcinSayfaDegeriniBirIleriAl=$BulunanSayfaSayisiAxtar;
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
							echo  "<span class=\"Pasif\"><a href=\"javascript:void(0)\"><img src=\"img/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";  
						}
						?>
					</div>
				<?php } ?>
			</div>
			<?php 
		} else{  ?>
			<span>Axtarışınıza uyğun dövlət yoxdur</span>
		<?php  }?>

		<script type="text/javascript">
			function DovletDurumKontrol(ID) {
				var DurumID = ID.split("-");
				var Durum_id = DurumID[1];
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "Islem/dovlet_islem.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("Durum_id=" + Durum_id);
				xhttp.onreadystatechange = function () {
				}
			}

			function DovletSiralamaLimiti(Deyer) {
				var dovlet_siralama = Deyer
				var dovlet_siralama_xhttp = new XMLHttpRequest();
				dovlet_siralama_xhttp.open("POST", "Islem/dovlet_islem.php", true);
				dovlet_siralama_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				dovlet_siralama_xhttp.send("dovlet_siralama=" + dovlet_siralama);
				dovlet_siralama_xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						window.location.reload()
					}
				}
			}


			function DovletSil(IDDegeri) {
				document.getElementById("DovletSilKaratmaAlani").style.display = "block";
				document.getElementById("DovletSilModalAlani").style.display = "block";
				document.getElementById("ModalMetinAlani").innerHTML = "Dövlət qeydiyatını silmək üzrəsiniz! Əgər silməni təsdiq etsəniz sistemdə həmin dövlətə bağlı bağlı bütün qeydiyatlar silinəcək.";
				document.getElementById("SilIslemiOnaylaButonu").href = "javascript:DovletSilTesdiq(" + IDDegeri + ")";
				document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display = "block";
				document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display = "block";
			}

			function DovletSilImtina() {
				document.getElementById("DovletSilKaratmaAlani").style.display = "none";
				document.getElementById("DovletSilModalAlani").style.display = "none";
				document.getElementById("ModalMetinAlani").innerHTML = "";
				document.getElementById("SilIslemiOnaylaButonu").href = "";
				document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display = "none";
				document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display = "none";
			}


			function DovletSilTesdiq(IDDegeri) {
				var dovlet_sil_id = IDDegeri;
				var dovlet_sil_id_xhttp = new XMLHttpRequest();
				dovlet_sil_id_xhttp.open("POST", "Islem/dovlet_islem.php", true);
				dovlet_sil_id_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				dovlet_sil_id_xhttp.send("dovlet_sil_id=" + dovlet_sil_id);
				dovlet_sil_id_xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						window.location.reload()
					}
				}
			}

		</script>





	</div>
</section>



<?php require_once "_footer.php" ?>
