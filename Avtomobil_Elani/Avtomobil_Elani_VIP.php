        


<div class="col">
  <a href="elandetay-<?= $vipelancek["SEO_URL"] . '-' . $vipelancek["elan_id"] ?>" title="">
    <div class="card">
      <div class="vip-pre">
        <?php 
        echo $vipelancek['Premiyum']==1 ? '<i class="fas fa-crown"></i>':"";
        echo $vipelancek['VIP']==1 ? ' <i class="far fa-gem"></i>':""?>
      </div>
      <div class="bar-faiz">
       <?php 
       echo $vipelancek['barter_var']=="on" ? '<i class="fas fa-sync-alt"></i>':"";
       echo $vipelancek['kredit_var']=="on" ? '  <i class="fas fa-percentage"></i>':""?>
     </div>
     <?php 
     $sekil = json_decode($vipelancek['sekil']);
     ?>
     <div class="img-hid">
      <img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
      <span></span> 
    </div>
    <div class="card-image-overlay  ">
       <?php echo $vipelancek['salon_durm']=="1" ? '<div class="salon-ico"><p>Salon</p></div>':"";?>
      <span class="card-detail-badge"><?php echo $vipelancek['buraxilis_ili'] ?></span> /
      <span class="card-detail-badge"> <?php echo $vipelancek['avtomobilmuherrikhecmi_ad'] ?>sm<sup>3</sup></span> /
      <span class="card-detail-badge"><?php echo $vipelancek['avto_yurus_km'] ?>km</span>
    </div>
    <div class="card-footer text-center">
      <div class="ad-title  ">
        <h5> <?php echo $vipelancek['avtomobil_markasi_ad'] . " " . $vipelancek['avtomobil_model_ad'] ?> </h5>
        <ul>
          <li>
            <span><?php echo HerSozunIlkHerfiniBoyukEt($vipelancek['seher_ad']); ?></span>
          </li>
          <li>
            <span>/</span>
          </li>
          <li>
            <?php
            $elantarixi = $vipelancek['TarixSaat'];
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
      <a class="ad-btn" href=""><?php echo number_format($vipelancek['qiymet'], 0, ',', ' ') . " " . $vipelancek['pul_novu'] ?></a>
    </div>
  </div>
</a>
</div>






<!-- Artan qiymət basladi --> 