<?php 
require_once "_header.php";
$bolmesor = $db->prepare("SELECT * FROM bolme where  bolme_seo_url=:bolme_seo_url");
$bolmesor->execute(array(
  'bolme_seo_url' => $_GET['sef'],
));
$bolmecek = $bolmesor->fetch(PDO::FETCH_ASSOC);
$bolme_id=$bolmecek['bolme_id'];
$elansor=$db->prepare("SELECT * FROM elan where yayim_durumu=:yayim_durumu and bolme_id=:bolme_id");
$elansor->execute(array(
  'yayim_durumu'=>1,
  'bolme_id'=>$bolme_id
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
      <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 xol-xxl-9">
        <div class="inpage-tabs">
          <ul class="nav nav-pills mb-3  d-none d-sm-block" id="pills-tab" role="tablist">
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
                <?php 

                if ($katagoriyasecimicek['karoqoriya_id']==1) { 
                 include "Avtomobil_Elani/Avtomobil_Butun_Elanlar.php";
               }




               ?>
             </div>
           </div>
         </div>
       </div>
     </div>



     <!-- /.wrapper -->
     <?php require_once "_footer.php" ?>