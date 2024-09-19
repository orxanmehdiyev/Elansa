<?php require_once "_header.php";?>
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
                <?php include "Avtomobil_Elani/Avtomobil_Butun_Elanlar.php"; ?>
             </div>
           </div>
         </div>
       </div>
     </div>
     <?php require_once "_footer.php" ?>