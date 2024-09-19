<?php
$Sor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and bolme_id=:bolme_id order by elan_id desc LIMIT 9");
$Sor->execute(array(
  'yayim_durumu' => 1,
  'bolme_id' => $bolme_id
));
while ($Cek = $Sor->fetch(PDO::FETCH_ASSOC)) {?>
  <div class="col">
    <a href="elandetay-<?= $Cek["SEO_URL"] . '-' . $Cek["elan_id"] ?>" title="">
      <div class="card">
             <div class="vip-pre">
          <?php 
          echo $Cek['Premiyum']==1 ? '<i class="fas fa-crown"></i>':"";
          echo $Cek['VIP']==1 ? ' <i class="far fa-gem"></i>':""?>
        </div>
        <div class="bar-faiz">
         <?php 
         echo $Cek['barter_var']=="on" ? '<i class="fas fa-sync-alt"></i>':"";
         echo $Cek['kredit_var']=="on" ? '  <i class="fas fa-percentage"></i>':""?>
       </div>

        <?php 
        $sekil = json_decode($Cek['sekil']);
        ?>
        <div class="img-hid">
          <img class="img-fluid" src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="Alternate Text" />
          <span></span>
        </div>
        <div class="card-image-overlay  ">
           <?php echo $neqliyyatcek['salon_durm']=="1" ? '<div class="salon-ico"><p>Salon</p></div>':"";?>
          <span class="card-detail-badge"><i class="fas fa-couch"></i><?php echo $Cek['otaq_sayi']?> otaqlı</span> /
          <span class="card-detail-badge"><i class="texture"></i><?php echo $Cek['umumi_sahesi']?> m<sup>3</sup></span> /
          <span class="card-detail-badge"><i class="fas fa-layer-group"></i><?php echo $Cek['binaninmertebesayi']?>/<?php echo $Cek['yerlesdiyi_mertebe']?> mərtəbə</span>
        </div>
        <div class="card-footer text-center">
          <div class="ad-title  ">
            <h5> <?php echo $Cek['elan_adi']  ?> </h5>
            <ul>
              <li>
                <span><?php echo HerSozunIlkHerfiniBoyukEt($Cek['seher_ad']); ?></span>
              </li>
              <li>
                <span>/</span>
              </li>
              <li>
                <?php
                $elantarixi = $Cek['TarixSaat'];
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
          <a class="ad-btn" href=""><?php echo number_format($Cek['qiymet'], 0, ',', ' ') . " " . $Cek['pul_novu'] ?></a>
        </div>
      </div>
    </a>
  </div>
  <?php } ?>