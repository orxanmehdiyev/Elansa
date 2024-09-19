

<div class="col">
  <a href="elandetay-<?= $RentaCek["SEO_URL"] . '-' . $RentaCek["elan_id"] ?>" title="">
    <div class="card">
      <div class="vip-pre">
        <?php 
        echo $RentaCek['Premiyum']==1 ? '<i class="fas fa-crown"></i>':"";
        echo $RentaCek['VIP']==1 ? ' <i class="far fa-gem"></i>':""?>
      </div>
      <div class="bar-faiz">
       <?php 
       echo $RentaCek['barter_var']=="on" ? '<i class="fas fa-sync-alt"></i>':"";
       echo $RentaCek['kredit_var']=="on" ? '  <i class="fas fa-percentage"></i>':""?>
     </div>
     <?php 
     $sekil = json_decode($RentaCek['sekil']);
     ?>
     <div class="img-hid">
      <img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
      <span></span>
    </div>
    <div class="card-image-overlay  ">
       <?php echo $neqliyyatcek['salon_durm']=="1" ? '<div class="salon-ico"><p>Salon</p></div>':"";?>
      <span class="card-detail-badge"><?php echo $RentaCek['buraxilis_ili'] ?></span> /
      <span class="card-detail-badge"> <?php echo $RentaCek['avtomobilmuherrikhecmi_ad'] ?>sm<sup>3</sup></span> /
      <span class="card-detail-badge"><?php echo $RentaCek['avto_yurus_km'] ?>km</span>
    </div>
    <div class="card-footer text-center">
      <div class="ad-title  ">
        <h5> <?php echo $RentaCek['avtomobil_markasi_ad'] . " " . $RentaCek['avtomobil_model_ad'] ?> </h5>
        <ul>
          <li>
            <span><?php echo HerSozunIlkHerfiniBoyukEt($RentaCek['seher_ad']); ?></span>
          </li>
          <li>
            <span>/</span>
          </li>
          <li>
            <?php
            $elantarixi = $RentaCek['TarixSaat'];
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
      <a class="ad-btn" href=""><?php echo number_format($RentaCek['qiymet'], 0, ',', ' ') . " " . $RentaCek['pul_novu'] ?></a>
    </div>
  </div>
</a>
</div>






<!-- Artan qiymət basladi --> 