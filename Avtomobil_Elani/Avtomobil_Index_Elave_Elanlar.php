 
<?php
$neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and karoqoriya_id=:karoqoriya_id order by elan_id desc LIMIT 9");
$neqliyyatsor->execute(array(
  'yayim_durumu' => 1,
  'karoqoriya_id' => 1
));
while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {?>
  <div class="col"> 
      <div class="card">
        <div class="vip-pre">
          <?php 
          echo $neqliyyatcek['Premiyum']==1 ? '<i class="fas fa-crown"></i>':"";
          echo $neqliyyatcek['VIP']==1 ? ' <i class="far fa-gem"></i>':""?>
        </div>
        <div class="bar-faiz">
         <?php 
         echo $neqliyyatcek['barter_var']=="on" ? '<i class="fas fa-sync-alt"></i>':"";
         echo $neqliyyatcek['kredit_var']=="on" ? '  <i class="fas fa-percentage"></i>':""?>
       </div>
       <?php 
       $sekil = json_decode($neqliyyatcek['sekil']);
       ?>

        <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
       <div class="img-hid">
        <img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" /> 
        <span></span> 
      </div>
    </a>
      <div class="card-image-overlay  ">
       <?php echo $neqliyyatcek['salon_durm']=="1" ? '<div class="salon-ico"><p>Salon</p></div>':"";?>
       <div class="karsilastir-ico">
        <i class="fas fa-exchange-alt"></i>
      </div>
      <span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili'] ?></span> /
      <span class="card-detail-badge"> <?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad'] ?>sm<sup>3</sup></span> /
      <span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km'] ?>km</span>
    </div>
    <div class="card-footer text-center">
      <div class="ad-title  ">
        <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title=""><h5> <?php echo $neqliyyatcek['avtomobil_markasi_ad'] . " " . $neqliyyatcek['avtomobil_model_ad'] ?> </h5></a>
        <ul>
          <li>
            <span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']); ?></span>
          </li>
          <li>
            <span>/</span>
          </li>
          <li>
            <?php
            $elantarixi = $neqliyyatcek['TarixSaat'];
            $parcalanmistarix = explode(" ", $elantarixi);
            $saattam = explode(":", $parcalanmistarix[1])
            ?>
            <span>
              <?php echo $parcalanmistarix[0] ?> /
              <?php echo $saattam[0] . ":" . $saattam[1] ?>
            </span>
          </li>
        </ul>
      </div>
      <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" class="ad-btn" title=""><?php echo number_format($neqliyyatcek['qiymet'], 0, ',', ' ') . " " . $neqliyyatcek['pul_novu'] ?></a>
    </div>
  </div> 
</div>
<?php } ?>





<!-- Artan qiymət basladi --> 