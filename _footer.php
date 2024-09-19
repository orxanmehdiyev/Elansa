
<div class="container d-none d-sm-none d-lg-block d-xl-block d-xxl-block">
  <!-- Tab links -->
  <div class="tab">
    <hr>
    <button class="tablinks active" onclick="openCity(event, 'Neqliyyat')" id="defaultOpen">Nəqliyyat
    vasitələr</button>
    <button class="tablinks" onclick="openCity(event, 'Emlak')">Daşınmaz əmlak</button>
    <button class="tablinks" onclick="openCity(event, 'Elektronika')">Elektronika</button>
    <hr>
  </div>

  <!-- Tab content -->
  <div id="Neqliyyat" class="tabcontent" style="display: block;">
    <div class="home-tabs">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" title="Tekli elan">ÜMUMİ ELAN
          SAYI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">SON 30 GÜN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">SON 7 GÜN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">SON 24 SAAT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">BÜGÜN</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-bir-tab" data-toggle="pill" href="#pills-bir" role="tab" aria-controls="pills-bir" aria-selected="true">SATIŞ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-iki-tab" data-toggle="pill" href="#pills-iki" role="tab" aria-controls="pills-iki" aria-selected="false"> KİRA
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-uc-tab" data-toggle="pill" href="#pills-uc" role="tab" aria-controls="pills-uc" aria-selected="false">GÜNLÜK KİRA
              </a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-bir" role="tabpanel" aria-labelledby="pills-bir-tab">
              <div class="row">
                <div class="col">
                  <ul>
                    <?php 
                    $avtomobil_markasisor=$db->prepare("SELECT * FROM avtomobil_markasi ");
                    $avtomobil_markasisor->execute();
                    while ($avtomobil_markasicek= $avtomobil_markasisor->fetch(PDO::FETCH_ASSOC)) {

                      $neqliyyatsor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and karoqoriya_id=:karoqoriya_id and avtomobil_markasi_id=:avtomobil_markasi_id ");
                      $neqliyyatsor->execute(array(
                        'yayim_durumu'=>1,
                        'karoqoriya_id'=>1,
                        'avtomobil_markasi_id'=>$avtomobil_markasicek['avtomobil_markasi_id']));
                      $neqliyyatsay = $neqliyyatsor->rowCount();
                      if ($neqliyyatsay>0) {
                        $neqliyyatsorcek= $neqliyyatsor->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <li>
                          <a href="<?php echo "neqliyyatdetay-".$neqliyyatsorcek['SEO_URL'] ?> " title="">
                            <span><img style="margin-right: 5px;" src="assets/css/img/png_24/acura-1-202937.png"> </span> <?php echo $avtomobil_markasicek['avtomobil_markasi_ad'] ?> <span style="margin-left: 10px;"><?php echo $neqliyyatsay  ?></span> </a>
                          </li>
                        <?php }
                      } ?>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                    </ul>
                  </div>
                  <div class="col">
                    <ul>
                      <li>
                        <a href="" title="">
                          <span></span> BMW
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Bentley
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Subaru
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Land Rover
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Mercedes Benz
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ferrari
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Hundai
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Kia
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ford
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Daihutsu
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Audi
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Lada
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Khazar
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ordubad
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Nusnus
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col">
                    <ul>
                      <li>
                        <a href="" title="">
                          <span></span> BMW
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Bentley
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Subaru
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Land Rover
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Mercedes Benz
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ferrari
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Hundai
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Kia
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ford
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Daihutsu
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Audi
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Lada
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Khazar
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ordubad
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Nusnus
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col">
                    <ul>
                      <li>
                        <a href="" title="">
                          <span></span> BMW
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Bentley
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Subaru
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Land Rover
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Mercedes Benz
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ferrari
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Hundai
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Kia
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ford
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Daihutsu
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Audi
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Lada
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Khazar
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ordubad
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Nusnus
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col">
                    <ul>
                      <li>
                        <a href="" title="">
                          <span></span> BMW
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Bentley
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Subaru
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Land Rover
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Mercedes Benz
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ferrari
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Hundai
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Kia
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ford
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Daihutsu
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Audi
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Lada
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Khazar
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Ordubad
                        </a>
                      </li>
                      <li>
                        <a href="" title="">
                          <span></span> Nusnus
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-iki" role="tabpanel" aria-labelledby="pills-iki-tab">
                a
              </div>
              <div class="tab-pane fade" id="pills-uc" role="tabpanel" aria-labelledby="pills-uc-tab">
              aaaaaaaaaaaaaa</div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-birs-tab" data-toggle="pill" href="#pills-birs" role="tab" aria-controls="pills-birs" aria-selected="true">SATIŞ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-ikis-tab" data-toggle="pill" href="#pills-ikis" role="tab" aria-controls="pills-ikis" aria-selected="false">KİRA
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-ucs-tab" data-toggle="pill" href="#pills-ucs" role="tab" aria-controls="pills-ucs" aria-selected="false">GÜNLÜK KİRA
                </a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-birs" role="tabpanel" aria-labelledby="pills-birs-tab">
              </div>
              <div class="tab-pane fade" id="pills-ikis" role="tabpanel" aria-labelledby="pills-ikis-tab">
              </div>
              <div class="tab-pane fade" id="pills-ucs" role="tabpanel" aria-labelledby="pills-ucs-tab">
              </div>
              <div class="tab-pane fade" id="pills-dords" role="tabpanel" aria-labelledby="pills-dords-tab">
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-bir1-tab" data-toggle="pill" href="#pills-bir1" role="tab" aria-controls="pills-bir1" aria-selected="true">SATIŞ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-iki2-tab" data-toggle="pill" href="#pills-iki2" role="tab" aria-controls="pills-iki2" aria-selected="false">KİRA
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-uc3-tab" data-toggle="pill" href="#pills-uc3" role="tab" aria-controls="pills-uc3" aria-selected="false">GÜNLÜK KİRA
                </a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-bir1" role="tabpanel" aria-labelledby="pills-bir1-tab">

              </div>
              <div class="tab-pane fade" id="pills-iki2" role="tabpanel" aria-labelledby="pills-iki2-tab">
              </div>
              <div class="tab-pane fade" id="pills-uc3" role="tabpanel" aria-labelledby="pills-uc3-tab">
              </div>
              <div class="tab-pane fade" id="pills-dord4" role="tabpanel" aria-labelledby="pills-dord4-tab">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="Emlak" class="tabcontent" style="display: none;">
      <div class="home-tabs">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" title="Tekli elan">ÜMUMİ ELAN
            SAYI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">SON 30 GÜN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">SON 7 GÜN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">SON 24 SAAT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">BÜGÜN</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-bir-tab" data-toggle="pill" href="#pills-bir" role="tab" aria-controls="pills-bir" aria-selected="true">SATIŞ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-iki-tab" data-toggle="pill" href="#pills-iki" role="tab" aria-controls="pills-iki" aria-selected="false"> KİRA
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-uc-tab" data-toggle="pill" href="#pills-uc" role="tab" aria-controls="pills-uc" aria-selected="false">GÜNLÜK KİRA
                </a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-bir" role="tabpanel" aria-labelledby="pills-bir-tab">
                <div class="row tab-kat">
                  <div class="col-3">
                    <h5>Yeni tikili:</h5>
                    <ul>
                      <li>
                        <a href="#" title="">1 - otaqli (123)</a>
                      </li>
                      <li>
                        <a href="#" title="">2 - otaqli (423)</a>
                      </li>
                      <li>
                        <a href="#" title="">3 - otaqli (485)</a>
                      </li>
                      <li>
                        <a href="#" title="">4 - otaqli (28)</a>
                      </li>
                      <li>
                        <a href="#" title="">5 otaq ve daha cox (962)</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-3">
                    <h5>Köhnə tikili:</h5>
                    <ul>
                      <li>
                        <a href="#" title="">1 - otaqli (123)</a>
                      </li>
                      <li>
                        <a href="#" title="">2 - otaqli (423)</a>
                      </li>
                      <li>
                        <a href="#" title="">3 - otaqli (485)</a>
                      </li>
                      <li>
                        <a href="#" title="">4 - otaqli (28)</a>
                      </li>
                      <li>
                        <a href="#" title="">5 otaq ve daha cox (962)</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6">
                    <h5>Digər:</h5>
                    <ul>
                      <li>
                        <a href="#" title="">1 - Həyət evi (123)</a>
                      </li>
                      <li>
                        <a href="#" title="">2 - Villa (423)</a>
                      </li>
                      <li>
                        <a href="#" title="">3 - Bağ evi (485)</a>
                      </li>
                      <li>
                        <a href="#" title="">4 - Otel / Hostel (28)</a>
                      </li>
                      <li>
                        <a href="#" title="">5 - İstirahət mərkəzləri (962)</a>
                      </li>
                      <li>
                        <a href="#" title="">6 - Xaricdə əmlak (962)</a>
                      </li>
                    </ul>
                    <ul>
                      <li>
                        <a href="#" title="">1 - Torpaq sahəsi (123)</a>
                      </li>
                      <li>
                        <a href="#" title="">2 - Obyekt (423)</a>
                      </li>
                      <li>
                        <a href="#" title="">3 - Ofis (485)</a>
                      </li>
                      <li>
                        <a href="#" title="">4 - Qaraj (28)</a>
                      </li>
                      <li>
                        <a href="#" title="">5 otaq ve daha cox (962)</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-iki" role="tabpanel" aria-labelledby="pills-iki-tab">
                a
              </div>
              <div class="tab-pane fade" id="pills-uc" role="tabpanel" aria-labelledby="pills-uc-tab">
              aaaaaaaaaaaaaa</div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-birs-tab" data-toggle="pill" href="#pills-birs" role="tab" aria-controls="pills-birs" aria-selected="true">SATIŞ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-ikis-tab" data-toggle="pill" href="#pills-ikis" role="tab" aria-controls="pills-ikis" aria-selected="false">KİRA
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-ucs-tab" data-toggle="pill" href="#pills-ucs" role="tab" aria-controls="pills-ucs" aria-selected="false">GÜNLÜK KİRA
                </a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-birs" role="tabpanel" aria-labelledby="pills-birs-tab">
              </div>
              <div class="tab-pane fade" id="pills-ikis" role="tabpanel" aria-labelledby="pills-ikis-tab">
              </div>
              <div class="tab-pane fade" id="pills-ucs" role="tabpanel" aria-labelledby="pills-ucs-tab">
              </div>
              <div class="tab-pane fade" id="pills-dords" role="tabpanel" aria-labelledby="pills-dords-tab">
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-bir1-tab" data-toggle="pill" href="#pills-bir1" role="tab" aria-controls="pills-bir1" aria-selected="true">SATIŞ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-iki2-tab" data-toggle="pill" href="#pills-iki2" role="tab" aria-controls="pills-iki2" aria-selected="false">KİRA
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-uc3-tab" data-toggle="pill" href="#pills-uc3" role="tab" aria-controls="pills-uc3" aria-selected="false">GÜNLÜK KİRA
                </a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-bir1" role="tabpanel" aria-labelledby="pills-bir1-tab">
              </div>
              <div class="tab-pane fade" id="pills-iki2" role="tabpanel" aria-labelledby="pills-iki2-tab">
              </div>
              <div class="tab-pane fade" id="pills-uc3" role="tabpanel" aria-labelledby="pills-uc3-tab">
              </div>
              <div class="tab-pane fade" id="pills-dord4" role="tabpanel" aria-labelledby="pills-dord4-tab">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="Elektronika" class="tabcontent">
      <div class="home-tabs">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" title="Tekli elan">ÜMUMİ ELAN
            SAYI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">SON 30 GÜN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">SON 7 GÜN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">SON 24 SAAT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">BÜGÜN</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-bir-tab" data-toggle="pill" href="#pills-bir" role="tab" aria-controls="pills-bir" aria-selected="true">SATIŞ</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-bir" role="tabpanel" aria-labelledby="pills-bir-tab">
                <div class="row tab-kat">
                  <div class="col-3">
                    <h5>Mobil telefon və aksesuarlar:</h5>
                    <ul>
                      <li>
                        <a href="#" title="">1 - otaqli (123)</a>
                      </li>
                      <li>
                        <a href="#" title="">2 - otaqli (423)</a>
                      </li>
                      <li>
                        <a href="#" title="">3 - otaqli (485)</a>
                      </li>
                      <li>
                        <a href="#" title="">4 - otaqli (28)</a>
                      </li>
                      <li>
                        <a href="#" title="">5 otaq ve daha cox (962)</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-3">
                    <h5>Kompüter, noutbuk və planşetlər:</h5>
                    <ul>
                      <li>
                        <a href="#" title="">Kompüter aksesuaqrları (123)</a>
                      </li>
                      <li>
                        <a href="#" title="">Kompüter (423)</a>
                      </li>
                      <li>
                        <a href="#" title="">Noutbuk (485)</a>
                      </li>
                      <li>
                        <a href="#" title="">Planşet (28)</a>
                      </li>
                      <li>
                        <a href="#" title="">Printer (962)</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6">
                    <h5>Digər:</h5>
                    <ul>
                      <li>
                        <a href="#" title="">1 - Həyət evi (123)</a>
                      </li>
                      <li>
                        <a href="#" title="">2 - Villa (423)</a>
                      </li>
                      <li>
                        <a href="#" title="">3 - Bağ evi (485)</a>
                      </li>
                      <li>
                        <a href="#" title="">4 - Otel / Hostel (28)</a>
                      </li>
                      <li>
                        <a href="#" title="">5 - İstirahət mərkəzləri (962)</a>
                      </li>
                      <li>
                        <a href="#" title="">6 - Xaricdə əmlak (962)</a>
                      </li>
                    </ul>
                    <ul>
                      <li>
                        <a href="#" title="">1 - Torpaq sahəsi (123)</a>
                      </li>
                      <li>
                        <a href="#" title="">2 - Obyekt (423)</a>
                      </li>
                      <li>
                        <a href="#" title="">3 - Ofis (485)</a>
                      </li>
                      <li>
                        <a href="#" title="">4 - Qaraj (28)</a>
                      </li>
                      <li>
                        <a href="#" title="">5 otaq ve daha cox (962)</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-iki" role="tabpanel" aria-labelledby="pills-iki-tab">
                a
              </div>
              <div class="tab-pane fade" id="pills-uc" role="tabpanel" aria-labelledby="pills-uc-tab">
              aaaaaaaaaaaaaa</div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-birs-tab" data-toggle="pill" href="#pills-birs" role="tab" aria-controls="pills-birs" aria-selected="true">SATIŞ</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-birs" role="tabpanel" aria-labelledby="pills-birs-tab">
              </div>
              <div class="tab-pane fade" id="pills-ikis" role="tabpanel" aria-labelledby="pills-ikis-tab">
              </div>
              <div class="tab-pane fade" id="pills-ucs" role="tabpanel" aria-labelledby="pills-ucs-tab">
              </div>
              <div class="tab-pane fade" id="pills-dords" role="tabpanel" aria-labelledby="pills-dords-tab">
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-bir1-tab" data-toggle="pill" href="#pills-bir1" role="tab" aria-controls="pills-bir1" aria-selected="true">SATIŞ</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-bir1" role="tabpanel" aria-labelledby="pills-bir1-tab">
              </div>
              <div class="tab-pane fade" id="pills-iki2" role="tabpanel" aria-labelledby="pills-iki2-tab">
              </div>
              <div class="tab-pane fade" id="pills-uc3" role="tabpanel" aria-labelledby="pills-uc3-tab">
              </div>
              <div class="tab-pane fade" id="pills-dord4" role="tabpanel" aria-labelledby="pills-dord4-tab">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- Footer-->
<footer class="d-none d-sm-none d-lg-block d-xl-block d-xxl-block">
  <div class="container">
    <div class="foot-ela">
      <div class="row">
        <div class="col-6">
          <ul class="foot-kat">
            <li>
              <a href="" title="">Avtomobil</a>
            </li>
            <li>
              <a href="" title="">Daşınmaz Əmlak</a>
            </li>
            <li>
              <a href="" title="">Elektronika</a>
            </li>
            <li>
              <a href="" title="">Xidmətlər</a>
            </li>
          </ul>
          <ul class="foot-copy">
            <li>
              <span>
                2020 <?php echo $site_adi ?>
              </span>
            </li>
            <li>
              <span>
                <?php echo $ayar_tel ?>
              </span>
            </li>
            <li>
              <a href="#" title=""><?php echo $ana_mail ?></a>
            </li>
          </ul>
        </div>
        <div class="col-6">
          <p>Hər hansı bir məlumatı, materialı və fotoşəkili administrasiyanın yazılı icazəsi olmadan istifadə etmək qeyri-qanuni hesab ediləcək və Azərbaycan Respublikasının Qanunlarına əsasən cəzalandırılacaqdır.
          </p>
        </div>
      </div>
    </div>
  </div> 
</footer>


<!-- /.Footer -->

    <!-- Le javascript
      ================================================== -->

      <!-- Placed at the end of the document so the pages load faster -->
      <script src="assets/js/jquery/jquery-3.3.1.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script> 
      <!-- Selct checkbox  --> 
 
      <!-- Latest compiled and minified JavaScript -->
      <script src="assets/js/knockout-min.js"></script>
      <script src="assets/js/knockout-file-bindings.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/bootstrap-select.js"></script> 
      <script src="assets/js/jquery-ui.js"></script>
      <script src="assets/js/owl.carousel.js"></script> 
      <script src="assets/js/fancybox.umd.js"></script> 

      <script>
        $(document).ready(function() {
          var owl = $('.owl-carousel');
          owl.owlCarousel({
            margin: 10,
            nav: true,
            loop: true,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 3
              },
              1000: {
                items: 5
              }
            }
          })
        });
      </script>

      <script>
  /*
function createOptions(number) {
  var options = [], _options;

  for (var i = 0; i < number; i++) {
    var option = '<option value="' + i + '">Option ' + i + '</option>';
    options.push(option);
  }

  _options = options.join('');
  
  $('#number')[0].innerHTML = _options;
  $('#number-multiple')[0].innerHTML = _options;

  $('#number2')[0].innerHTML = _options;
  $('#number2-multiple')[0].innerHTML = _options;
}

var mySelect = $('#first-disabled2');

createOptions(4000);
*/
</script>
<script>


        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
        })();
      </script>
      <script>
        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
          }
        </script>


        <script type="text/javascript">
          function phoneMask() { 
            var num = $(this).val().replace(/\D/g,''); 
            $(this).val('(' +num.substring(0,1) +  num.substring(1,3) + ') ' + num.substring(3,6) + '-'+ num.substring(6,8) + '-' + num.substring(8,10)); 
          }
          $('[type="tel"]').keyup(phoneMask);
        </script>

        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $(".detaylinki").click(function() {
              window.location = $(this).data("href");
            });
          });
        </script>
        <script type="text/javascript">

          $(".dropDown dt a").on('click', function() {
            $(".dropDown dd ul").slideToggle('fast');
          });

          $(".dropDown dd ul li a").on('click', function() {
            $(".dropDown dd ul").hide();
          });

          function getSelectedValue(id) {
            return $("#" + id).find("dt a span.value").html();
          }


          $(document).bind('click', function(e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropDown")) $(".dropDown dd ul").hide();
          });


          $('.mutliSelect input[type="checkbox"]').on('click', function() {

            var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
            title = $(this).val() + ",";

            if ($(this).is(':checked')) {
              var html = '<span title="' + title + '">' + title + '</span>';
              $('.multiSel').append(html);
              $(".hida").hide();
            } else {
              $('span[title="' + title + '"]').remove();
              var ret = $(".hida");
              $('.dropDown dt a').append(ret);

            }
          });

        </script>
        <script type="text/javascript">
          $(function(){
            $("#formgonder").click(function(e){
              e.preventDefault();
              var veri= $("#Avto_Axtar_Form_ID").serialize();

              $.ajax({
                type:"get",
                url:"anliq_yenileme/axtaris.php",
                data:veri,
                success:function(sonuc){
                  $("#neqliyyat_axtaris_ici").html((sonuc));
                }
              });
            });


          });

        </script>
        
        <script src="Avtomobil_Elani/Script.js" ></script>
      </body>

      </html>



