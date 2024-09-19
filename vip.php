<?php 
require_once "_header.php";
$elansor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu  and VIP=:VIP");
$elansor->execute(array(
  'yayim_durumu'=>1,
  'VIP'=>1
));
$elansay = $elansor->rowCount();
$katagoriyasecimicek = $elansor->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
  <!-- in-page-nav -->
  <div class="in-bread">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Ana səhifə</a></li>
        <li class="breadcrumb-item"><a href="#">Satılık</a></li>
        <li class="breadcrumb-item active" aria-current="page">Baku Satılık</li>
      </ol>
    </nav>
  </div>
  <div class="in-input">
    <div class="row">
      <?php require_once "butunelanlarfiltir.php" ?>
      <div class="col-9">
        <div class="inpage-tabs">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" title="Tekli elan"><i
                class="fa fa-align-justify" aria-hidden="true"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i
                  class="fa fa-th" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i
                    class="fa  fa-window-minimize " aria-hidden="true"></i></a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="pills-bir-tab" data-toggle="pill" href="#pills-bir" role="tab" aria-controls="pills-bir" aria-selected="true">Bugün</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-iki-tab" data-toggle="pill" href="#pills-iki" role="tab" aria-controls="pills-iki" aria-selected="false">Çox
                        baxılan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-uc-tab" data-toggle="pill" href="#pills-uc" role="tab" aria-controls="pills-uc" aria-selected="false">Azalan
                        qiymət</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-dord-tab" data-toggle="pill" href="#pills-dord" role="tab" aria-controls="pills-dord" aria-selected="false">Artan
                        qiymət</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-bir" role="tabpanel" aria-labelledby="pills-bir-tab">
                        <div class="reds four">
                          <div class="elan-kart elan-kart-filtir row">
                            <?php
                            $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and VIP=:VIP  order by elan_id desc");
                            $neqliyyatsor->execute(array(
                              'yayim_durumu' => 1,                             
                              'VIP' => 1
                            ));
                            while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {?>
                              <div class="col col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"> 
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
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-iki" role="tabpanel" aria-labelledby="pills-iki-tab">
                    <div class="reds four">
                      <div class="elan-kart elan-kart-filtir row">
                        <?php
                        $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu  and VIP=:VIP order by ebaxis_sayi DESC");
                        $neqliyyatsor->execute(array(
                          'yayim_durumu' => 1,                       
                          'VIP' => 1
                        ));
                        while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {?>
                          <div class="col col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"> 
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
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-uc" role="tabpanel" aria-labelledby="pills-uc-tab"><div class="reds four">
                <div class="elan-kart elan-kart-filtir row">
                  <?php
                  $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and VIP=:VIP order by qiymet DESC");
                  $neqliyyatsor->execute(array(
                    'yayim_durumu' => 1,                   
                    'VIP' => 1
                  ));
                  while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {?>
                    <div class="col col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"> 
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
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-dord" role="tabpanel" aria-labelledby="pills-dord-tab"><div class="reds four">
          <div class="elan-kart elan-kart-filtir row">
            <?php
            $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and VIP=:VIP order by qiymet ASC");
            $neqliyyatsor->execute(array(
              'yayim_durumu' => 1,            
              'VIP' => 1
            ));
            while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {?>
              <div class="col col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"> 
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
      </div>
    </div>
  </div>
</div>
</div>

<!-- Artan qiymet bittdi -->
<!-- Birinci bolme bittdi -->
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-birs-tab" data-toggle="pill" href="#pills-birs" role="tab" aria-controls="pills-birs" aria-selected="true">Bugün</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-ikis-tab" data-toggle="pill" href="#pills-ikis" role="tab" aria-controls="pills-ikis" aria-selected="false">Çox
      baxılan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-ucs-tab" data-toggle="pill" href="#pills-ucs" role="tab" aria-controls="pills-ucs" aria-selected="false">Azalan
      qiymət</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-dords-tab" data-toggle="pill" href="#pills-dords" role="tab" aria-controls="pills-dords" aria-selected="false">Artan
      qiymət</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-birs" role="tabpanel" aria-labelledby="pills-birs-tab">
      <div class="row">

        <?php
        $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and VIP=:VIP order by elan_id desc");
        $neqliyyatsor->execute(array(
          'yayim_durumu' => 1,         
          'VIP' => 1
        ));
        while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <div class="col-6">                           
            <div class="elan-product">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-5">
                    <img src="../images/avtomobil/<?php echo $sekil[0] ?>" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <div class="item-info">
                        <div class="item-title">
                          <h6><a href='elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>'>TOYOTA / LAND-CRUISER</a></h6>
                        </div> 
                      </div>
                      <div class=" product-info">
                        <ul>
                          <li><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?> / <?php
                          $elantarixi = $neqliyyatcek['TarixSaat'];
                          $parcalanmistarix = explode(" ", $elantarixi);
                          $saattam = explode(":", $parcalanmistarix[1])
                        ?><?php echo $parcalanmistarix[0] ?> /
                        <?php echo $saattam[0] . ":" . $saattam[1] ?></li>
                        <li></li>
                        <li></li>
                      </ul>
                    </div>
                    <hr />
                    <div class="mesafe">
                      <div class="mesafe-km">
                        <ul>
                          <li><?php echo $neqliyyatcek['buraxilis_ili'] ?> / </li>
                          <li><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad'] ?>sm<sup>3</sup> / </li>
                          <li><?php echo $neqliyyatcek['avto_yurus_km'] ?>km</li>
                          <li><a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>"" title="">
                            <?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.') . " " . $neqliyyatcek['pul_novu'] ?></a></li>
                          </ul>
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class=" tab-pane fade" id="pills-ikis" role="tabpanel" aria-labelledby="pills-ikis-tab">
      <div class="row">
        <?php
        $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and karoqoriya_id=:karoqoriya_id and VIP=:VIP order by ebaxis_sayi DESC");
        $neqliyyatsor->execute(array(
          'yayim_durumu' => 1,
          'karoqoriya_id' => 1,
          'VIP' => 1
        ));
        while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <div class="col-6">
            <a class="iki-tab" href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
              <div class=" iki-tabphoto">
                <?php  $sekil = json_decode($neqliyyatcek['sekil']); ?>
                <img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
              </div>
              <div class="iki-tabcon">
                <ul>
                  <li>
                    <h5><?php echo $neqliyyatcek['avtomobil_markasi_ad'] . " " . $neqliyyatcek['avtomobil_model_ad'] ?>
                  </h5>
                </li>
                <li>
                  <div class="card-image-overlay">
                    <span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili'] ?></span>
                    /
                    <span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad'] ?>
                    sm<sup>3</sup></span> /
                    <span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km'] ?>
                  km</span>
                </div>
              </li>
              <li>
                <div class="ad-title  ">
                  <ul>
                    <li>
                      <span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
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
                      <span><?php echo $parcalanmistarix[0] ?> /
                       <?php echo $saattam[0] . ":" . $saattam[1] ?></span>
                     </li>
                   </ul>
                 </div>
               </li>
               <li>
                <div class="card-body text-center">
                  <button class="btn"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.') . " " . $neqliyyatcek['pul_novu'] ?></button>
                </div>
              </li>
            </ul>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</div>
<div class="tab-pane fade" id="pills-ucs" role="tabpanel" aria-labelledby="pills-ucs-tab">
  <div class="row">
    <?php
    $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and VIP=:VIP order by qiymet DESC");
    $neqliyyatsor->execute(array(
      'yayim_durumu' => 1,     
      'VIP' => 1,
    ));
    while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="col-6">
        <a class="iki-tab" href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
          <div class=" iki-tabphoto">
            <?php
            $sekil = json_decode($neqliyyatcek['sekil']);
            ?>
            <img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
          </div>
          <div class="iki-tabcon">
            <ul>
              <li>
                <h5><?php echo $neqliyyatcek['avtomobil_markasi_ad'] . " " . $neqliyyatcek['avtomobil_model_ad'] ?>
              </h5>
            </li>
            <li>
              <div class="card-image-overlay">
                <span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili'] ?></span> /
                <span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad'] ?>
                sm<sup>3</sup></span> /
                <span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km'] ?> km</span>
              </div>
            </li>
            <li>
              <div class="ad-title  ">
                <ul>
                  <li>
                    <span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
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
                    <span><?php echo $parcalanmistarix[0] ?> /
                      <?php echo $saattam[0] . ":" . $saattam[1] ?></span>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <div class="card-body text-center">
                  <button class="btn"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.') . " " . $neqliyyatcek['pul_novu'] ?></button>
                </div>
              </li>
            </ul>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</div>
<div class="tab-pane fade" id="pills-dords" role="tabpanel" aria-labelledby="pills-dords-tab">
  <div class="row">
    <?php
    $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu  order by qiymet ASC");
    $neqliyyatsor->execute(array(
      'yayim_durumu' => 1,      
    ));
    while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="col-6">
        <a class="iki-tab" href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
          <div class="iki-tabphoto">
            <?php
            $sekil = json_decode($neqliyyatcek['sekil']);
            ?>
            <img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
          </div>
          <div class="iki-tabcon">
            <ul>
              <li>
                <h5><?php echo $neqliyyatcek['avtomobil_markasi_ad'] . " " . $neqliyyatcek['avtomobil_model_ad'] ?>
              </h5>
            </li>
            <li>
              <div class="card-image-overlay">
                <span class="card-detail-badge"><?php echo $neqliyyatcek['buraxilis_ili'] ?></span>
                /
                <span class="card-detail-badge"><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad'] ?>
                sm<sup>3</sup></span> /
                <span class="card-detail-badge"><?php echo $neqliyyatcek['avto_yurus_km'] ?>
              km</span>
            </div>
          </li>
          <li>
            <div class="ad-title  ">
              <ul>
                <li>
                  <span><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></span>
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
                  <span><?php echo $parcalanmistarix[0] ?> /
                    <?php echo $saattam[0] . ":" . $saattam[1] ?></span>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="card-body text-center">
                <button class="btn"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.') . " " . $neqliyyatcek['pul_novu'] ?></button>
              </div>
            </li>
          </ul>
        </div>
      </a>
    </div>
  <?php } ?>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-bir1-tab" data-toggle="pill" href="#pills-bir1" role="tab" aria-controls="pills-bir1" aria-selected="true">Bugün</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-iki2-tab" data-toggle="pill" href="#pills-iki2" role="tab" aria-controls="pills-iki2" aria-selected="false">Çox
      baxılan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-uc3-tab" data-toggle="pill" href="#pills-uc3" role="tab" aria-controls="pills-uc3" aria-selected="false">Azalan
      qiymət</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-dord4-tab" data-toggle="pill" href="#pills-dord4" role="tab" aria-controls="pills-dord4" aria-selected="false">Artan
      qiymət</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-bir1" role="tabpanel" aria-labelledby="pills-bir1-tab">
      <?php
      $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu  and VIP=:VIP order by elan_id DESC");
      $neqliyyatsor->execute(array(
        'yayim_durumu' => 1,       
        'VIP' => 1
      ));
      while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
        ?> 
        <div class="tab-pil-bir">  
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-4">
                <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
                  <div class="pil-img">
                    <?php
                    $sekil = json_decode($neqliyyatcek['sekil']);
                    ?>
                    <img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
                  </div>
                </a>
              </div>
              <div class="col-5">
                <div class="card-body">
                  <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title=""><h4 class="card-title"><?php echo $neqliyyatcek['avtomobil_markasi_ad'] . " " . $neqliyyatcek['avtomobil_model_ad'] ?></h4></a>
                  <ul class="pil-img-yer">
                    <li><?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?></li>
                    <li><?php
                    $elantarixi = $neqliyyatcek['TarixSaat'];
                    $parcalanmistarix = explode(" ", $elantarixi);
                    $saattam = explode(":", $parcalanmistarix[1]);

                    echo $parcalanmistarix[0] ?> / <?php echo $saattam[0] . ":" . $saattam[1] ?></li> 
                  </ul>
                  <ul class="pil-gosterici">
                    <li><span class="card-detail-badge"><i class="far fa-calendar-alt"></i><?php echo $neqliyyatcek['buraxilis_ili']?></span> </li>
                    <li><span class="card-detail-badge"><i class="fas fa-gas-pump"></i><?php echo $neqliyyatcek['avtomobilmuherrikhecmi_ad']?> sm<sup>3</sup></span> </li>
                    <li><span class="card-detail-badge"><i class="fas fa-tachometer-alt"></i><?php echo $neqliyyatcek['avto_yurus_km']?> km</span></li> 
                  </ul>
                  <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>"><?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.') . " " . $neqliyyatcek['pul_novu'] ?></a>
                </div>
              </div>
              <div class="col-3">
                <div class="pil-hover">
                  <button class="btn btn-secondary">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> 
                    <label> Karsilastir </label>
                  </button>
                  <button class="btn btn-secondary">
                    <i class="far fa-heart"></i> 
                    <label>Secilmeslere elave et </label>
                  </button> 
                  <button onclick=""  class="btn btn-info">
                    <i class="fas fa-phone"></i> 
                    <label id="tel1">Telefonu goster </label>
                    <label class="tel2" >+<?php echo $neqliyyatcek['telefon_bir'] ?></label>
                  </button> 
                  <script type="text/javascript"> 
                   document.getElementById("tel1").addEventListener("click",function(){
                    document.getElementById("tel1").style.display = "none";
                    var tel2 = document.getElementsByClassName("tel2");
                    for(i =0;i < tel2.length ; i++){
                      tel2[i].style.display = "inline-block";
                    }
                  })          
                </script>
              </div>
            </div>
          </div>
        </div>  
      </div>
    <?php } ?>
  </div>
  <div class="tab-pane fade" id="pills-iki2" role="tabpanel" aria-labelledby="pills-iki2-tab">
    <div class="table-bas">
      <ul>
        <li>
          Elan başlığı
        </li>
        <li>
          Model
        </li>
        <li>
          İl
        </li>
        <li>
          K/m
        </li>
        <li>
          Tarix<i class="fa fa-chevron-down" aria-hidden="true"></i>
        </li>
        <li>
          Region
        </li>
        <li>
          Qiymət
        </li>
      </ul>
    </div>
    <?php
    $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu  and VIP=:VIP order by ebaxis_sayi DESC");
    $neqliyyatsor->execute(array(
      'yayim_durumu' => 1,     
      'VIP' => 1
    ));
    while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
      ?>

      <div class="table-one">
        <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
          <ul>
            <li>
              <div class="row">
                <div class="col-4">
                  <?php
                  $sekil = json_decode($neqliyyatcek['sekil']);
                  ?>
                  <img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
                </div>
                <div class="col-8">
                  <h5><?php echo $neqliyyatcek['avtomobil_markasi_ad'] . " " . $neqliyyatcek['avtomobil_model_ad'] ?>
                </h5>
              </div>
            </div>
          </li>
          <li>
            <?php echo $neqliyyatcek['avtomobil_model_ad'] ?>
          </li>
          <li>
            <?php echo $neqliyyatcek['buraxilis_ili'] ?>
          </li>
          <li>
            <?php echo $neqliyyatcek['avto_yurus_km'] ?>
          </li>
          <li>
            <?php
            $elantarixi = $neqliyyatcek['TarixSaat'];
            $parcalanmistarix = explode(" ", $elantarixi);
            $saattam = explode(":", $parcalanmistarix[1]);
            echo $parcalanmistarix[0] ?> / <?php echo $saattam[0] . ":" . $saattam[1] ?>
          </li>
          <li>
            <?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?>
          </li>
          <li>
            <?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.') . " " . $neqliyyatcek['pul_novu'] ?>
          </li>
        </ul>
      </a>
    </div>
  <?php } ?>
</div>
<div class="tab-pane fade" id="pills-uc3" role="tabpanel" aria-labelledby="pills-uc3-tab">
  <div class="table-bas">
    <ul>
      <li>
        Elan başlığı
      </li>
      <li>
        Model
      </li>
      <li>
        İl
      </li>
      <li>
        K/m
      </li>
      <li>
        Tarix<i class="fa fa-chevron-down" aria-hidden="true"></i>
      </li>
      <li>
        Region
      </li>
      <li>
        Qiymət
      </li>
    </ul>
  </div>
  <?php
  $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and VIP=:VIP order by qiymet DESC");
  $neqliyyatsor->execute(array(
    'yayim_durumu' => 1,  
    'VIP' => 1
  ));
  while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="table-one">
      <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
        <ul>
          <li>
            <div class="row">
              <div class="col-4">
                <?php
                $sekil = json_decode($neqliyyatcek['sekil']);
                ?>
                <img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
              </div>
              <div class="col-8">
                <h5><?php echo $neqliyyatcek['avtomobil_markasi_ad'] . " " . $neqliyyatcek['avtomobil_model_ad'] ?>
              </h5>
            </div>
          </div>
        </li>
        <li>
          <?php echo $neqliyyatcek['avtomobil_model_ad'] ?>
        </li>
        <li>
          <?php echo $neqliyyatcek['buraxilis_ili'] ?>
        </li>
        <li>
          <?php echo $neqliyyatcek['avto_yurus_km'] ?>
        </li>
        <li>
          <?php
          $elantarixi = $neqliyyatcek['TarixSaat'];
          $parcalanmistarix = explode(" ", $elantarixi);
          $saattam = explode(":", $parcalanmistarix[1]);
          echo $parcalanmistarix[0] ?> / <?php echo $saattam[0] . ":" . $saattam[1] ?>
        </li>
        <li>
          <?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?>
        </li>
        <li>
          <?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.') . " " . $neqliyyatcek['pul_novu'] ?>
        </li>
      </ul>
    </a>
  </div>
<?php } ?>
</div>
<div class="tab-pane fade" id="pills-dord4" role="tabpanel" aria-labelledby="pills-dord4-tab">
  <div class="table-bas">
    <ul>
      <li>
        Elan başlığı
      </li>
      <li>
        Model
      </li>
      <li>
        İl
      </li>
      <li>
        K/m
      </li>
      <li>
        Tarix<i class="fa fa-chevron-down" aria-hidden="true"></i>
      </li>
      <li>
        Region
      </li>
      <li>
        Qiymət
      </li>
    </ul>
  </div>
  <?php
  $neqliyyatsor = $db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and VIP=:VIP order by qiymet ASC");
  $neqliyyatsor->execute(array(
    'yayim_durumu' => 1,    
    'VIP' => 1
  ));
  while ($neqliyyatcek = $neqliyyatsor->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="table-one">
      <a href="elandetay-<?= $neqliyyatcek["SEO_URL"] . '-' . $neqliyyatcek["elan_id"] ?>" title="">
        <ul>
          <li>
            <div class="row">
              <div class="col-4">
                <?php
                $sekil = json_decode($neqliyyatcek['sekil']);
                ?>
                <img src="../images/avtomobil/<?php echo $sekil[0] ?>" title="" alt="">
              </div>
              <div class="col-8">
                <h5><?php echo $neqliyyatcek['avtomobil_markasi_ad'] . " " . $neqliyyatcek['avtomobil_model_ad'] ?>
              </h5>
            </div>
          </div>
        </li>
        <li>
          <?php echo $neqliyyatcek['avtomobil_model_ad'] ?>
        </li>
        <li>
          <?php echo $neqliyyatcek['buraxilis_ili'] ?>
        </li>
        <li>
          <?php echo $neqliyyatcek['avto_yurus_km'] ?>
        </li>
        <li>
          <?php
          $elantarixi = $neqliyyatcek['TarixSaat'];
          $parcalanmistarix = explode(" ", $elantarixi);
          $saattam = explode(":", $parcalanmistarix[1]);

          echo $parcalanmistarix[0] ?> / <?php echo $saattam[0] . ":" . $saattam[1] ?>
        </li>
        <li>
          <?php echo HerSozunIlkHerfiniBoyukEt($neqliyyatcek['seher_ad']) ?>
        </li>
        <li>
          <?php echo number_format($neqliyyatcek['qiymet'], 2, ',', '.') . " " . $neqliyyatcek['pul_novu'] ?>
        </li>
      </ul>
    </a>
  </div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php require_once "_footer.php" ?>