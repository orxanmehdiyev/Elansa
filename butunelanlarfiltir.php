<div class="col-3 d-none d-sm-block">
  <div class="row">
    <div class="col-12">
      <div class="list-group in-bas" id="myList" role="tablist">
        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home" role="tab">Satiş</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">İcarə</a>             
      </div>
    </div>
    <div class="col-12">
      <div class="tab-content in-axtar">
        <div class="tab-pane active" id="home" role="tabpanel">
         <form role="form">
          <div class="form-group">
            <label for="validationServer1">Kateqoriya</label>
            <select class="form-control" id="validationServer1" onchange="location = this.value;">
             <option selected="selected" disabled="">Secin</option>
             <?php
             $bolmesor = $db->prepare("SELECT * FROM bolme where bolme_sil_durum=:bolme_sil_durum and bolme_durum=:bolme_durum order by bolme_id ASC ");
             $bolmesor->execute(array(
              'bolme_sil_durum' => 0,
              'bolme_durum' => 1,
            ));
            while ($bolmecek = $bolmesor->fetch(PDO::FETCH_ASSOC)) { ?>                 
              <optgroup label="<?php echo $bolmecek['bolme_ad'] ?>">
                <?php
                $kataqoriyasor = $db->prepare("SELECT * FROM karoqoriya where bolme_id=:bolme_id and karoqoriya_durum=:karoqoriya_durum and karoqoriya_sil_durum=:karoqoriya_sil_durum order by karoqoriya_sira ASC ");
                $kataqoriyasor->execute(array(
                  'bolme_id' => $bolmecek['bolme_id'],
                  'karoqoriya_durum' => 1,
                  'karoqoriya_sil_durum' => 0
                ));
                while ($kataqoriyacek = $kataqoriyasor->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option  value="<?php echo 'filtirlenmis?kategoriya='.$kataqoriyacek['karoqoriya_seo_url'] ?>"><?php echo $kataqoriyacek['karoqoriya_ad'] ?></option>
                <?php } ?>
              </optgroup>
            <?php } ?>
          </select>
        </div> 

        <div class="form-group row">
          <div class="col-lg-12">
            <label>Marka</label>
            <?php 
            $avtomobil_marfkasi_sor=$db->prepare("SELECT * FROM avtomobil_markasi where  avtomobil_markasi_durum=:avtomobil_markasi_durum");
            $avtomobil_marfkasi_sor->execute(array(
              'avtomobil_markasi_durum'=>1));
              ?>


              <select multiple class="selectpicker form-control"  id="number-multiple" data-container="body" data-live-search="true" title="Marka seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                <?php 

                while( $avtomobil_marfkasi_cek=$avtomobil_marfkasi_sor->fetch(PDO::FETCH_ASSOC)){
                 ?>
                 <option value="<?php  echo $avtomobil_marfkasi_cek['avtomobil_markasi_id'] ?>" ><?php echo $avtomobil_marfkasi_cek['avtomobil_markasi_ad'] ?></option>  
               <?php } ?>

             </select>
           </div>
         </div>


         <div class="form-group row">
          <div class="col-lg-12">
            <label>Model</label>
            <select multiple class="selectpicker form-control" disabled="disabled" id="number-multiple1" data-container="body" data-live-search="true" title="Model seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
              <option>Elantra</option>  
              <option>Accent</option>  
              <option>Matrix</option>  
              <option>Boylum</option>  
              <option>1</option>  
              <option>1</option>  
              <option>1</option>  
              <option>1</option>  
            </select>
          </div>
        </div>



        <div class="form-group row">
          <div class="col-lg-12">
            <?php 
            $Ban_Novu_Sor=$db->prepare("SELECT * FROM avtomobil_ban_novu where avtomobil_ban_novu_durum=:avtomobil_ban_novu_durum");
            $Ban_Novu_Sor->execute(array(
              'avtomobil_ban_novu_durum'=>1));
              ?>
              <label>Ban Növü</label>
              <select multiple class="selectpicker form-control" disabled="disabled" id="ban_movu" data-container="body" data-live-search="true" title="Ban Növü" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">

                <?php 
                while($Ban_Novu_Cek=$Ban_Novu_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
                  <option><?php echo $Ban_Novu_Cek['avtomobil_ban_novu_ad'] ?></option>  
                <?php } ?>
              </select>
            </div>
          </div>





          <div class="form-group row">
            <div class="col-lg-12">
              <label>Vəziyyəti</label>
              <?php 
              $Veziyyet_Sor=$db->prepare("SELECT * FROM emlakin_veziyyeti where avtomobil_elanlari_ucun_durum=:avtomobil_elanlari_ucun_durum");
              $Veziyyet_Sor->execute(array(
                'avtomobil_elanlari_ucun_durum'=>1));
                ?>
                <select multiple class="selectpicker form-control" disabled="disabled" id="veziyyeti" data-container="body" data-live-search="true" title="Secim Edin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                  <?php 
                  while($Veziyyet_Cek=$Veziyyet_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option><?php echo $Veziyyet_Cek['emlakin_veziyyeti_ad'] ?></option>  
                  <?php } ?>

                </select>
              </div>
            </div>


            <?php 
            $Suret_Qutusu_Sor=$db->prepare("SELECT * FROM avto_suret_qutusu where avto_suret_qutusu_durum=:avto_suret_qutusu_durum");
            $Suret_Qutusu_Sor->execute(array(
              'avto_suret_qutusu_durum'=>1));
              ?>

              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Surət Qutgusu</label>
                  <select multiple class="selectpicker form-control" disabled="disabled" id="filtir_suret_qutusu" data-container="body" data-live-search="true" title="Model seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                    <?php 
                    while($Suret_Qutusu_Cek=$Suret_Qutusu_Sor->fetch(PDO::FETCH_ASSOC)){
                     ?>
                     <option value="<?php echo $Suret_Qutusu_Cek['avto_suret_qutusu_id']  ?>"><?php echo $Suret_Qutusu_Cek['avto_suret_qutusu_ad'] ?></option>  
                   <?php } ?>
                 </select>
               </div>
             </div>
             <?php 
             $yanacaq_novu_sor=$db->prepare("SELECT* from yanacaq where yanacaq_durum=:yanacaq_durum");
             $yanacaq_novu_sor->execute(array(
              'yanacaq_durum'=>1));
              ?>
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Yanacaq Növü</label>
                  <select multiple class="selectpicker form-control" disabled="disabled" id="filtir_yanacaq_novu" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                    <?php 
                    while($yanacaq_novu_cek=$yanacaq_novu_sor->fetch(PDO::FETCH_ASSOC)){ ?>
                      <option value="<?php echo $yanacaq_novu_cek['yanacaq_id'] ?>"><?php echo $yanacaq_novu_cek['yanacaq_ad'] ?></option>  
                    <?php } ?>

                  </select>
                </div>
              </div>



              <?php 
              $otrucu_sor=$db->prepare("SELECT * FROM avto_otrucu where avto_otrucudurum=:avto_otrucudurum");
              $otrucu_sor->execute(array(
                'avto_otrucudurum'=>1));
                ?>

                <div class="form-group row">
                  <div class="col-lg-12">
                    <label>Ötrücü</label>
                    <select multiple class="selectpicker form-control" disabled="disabled" id="filtir_avto_otrucu" data-container="body" data-live-search="true" title="Seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                      <?php 
                      while($otrucu_cek=$otrucu_sor->fetch(PDO::FETCH_ASSOC)){
                       ?>
                       <option <?php echo $otrucu_cek['avto_otrucu_id'] ?>><?php echo $otrucu_cek['avto_otrucu_ad'] ?></option>  
                     <?php } ?>

                   </select>
                 </div>
               </div>


               <?php 
               $Reng_Sor=$db->prepare("SELECT * FROM  reng where reng_durum=:reng_durum");
               $Reng_Sor->execute(array(
                'reng_durum'=>1));
                ?>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <label>Rəngi</label>
                    <select multiple class="selectpicker form-control" disabled="disabled" id="Avto_Fİltir_Rengi" data-container="body" data-live-search="true" title="Seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                      <?php 
                      while($Reng_Cek=$Reng_Sor->fetch(PDO::FETCH_ASSOC)){
                       ?>
                       <option <?php echo $Reng_Cek['reng_id'] ?>><?php echo $Reng_Cek['reng_ad'] ?></option> 
                     <?php } ?> 

                   </select>
                 </div>
               </div>


               <?php 
               $Elan_Muellifi_Sor=$db->prepare("SELECT * FROM elanverennovu where avtmobil_elanlari_ucun_durum=:avtmobil_elanlari_ucun_durum");
               $Elan_Muellifi_Sor->execute(array(
                'avtmobil_elanlari_ucun_durum'=>1));
                ?>


                <div class="form-group row">
                  <div class="col-lg-12">
                    <label>Elanın Müəllifi</label>
                    <select multiple class="selectpicker form-control" disabled="disabled" id="Filtir_Elan_Muellifi" data-container="body" data-live-search="true" title="Model seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                      <?php 
                      while($Elan_Muellifi_Cek=$Elan_Muellifi_Sor->fetch(PDO::FETCH_ASSOC)){                       ?>
                        <option <?php echo $Elan_Muellifi_Cek['elanverennovu_id'] ?>> <?php echo $Elan_Muellifi_Cek['elanverennovu_ad'] ?></option>  
                      <?php } ?>
                      
                    </select>
                  </div>
                </div>




                <div class="form-group row">
                  <div class="col-lg-6">
                    <label>Min </label>
                    <select  class="selectpicker form-control" disabled="disabled" id="Filtir_Buraxilis_Ili_Min" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" >
                      <?php 
                      for ($i=$Il_tap; $i >1900 ; $i--) { 
                       ?>
                       <option value="<?php echo $i ?>"><?php echo $i ?></option>  
                     <?php } ?>
                   </select>
                 </div>


                 <div class="col-lg-6">
                  <label>Max</label>
                  <select  class="selectpicker form-control" disabled="disabled" id="Filtir_Buraxilis_Ili_Max" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                    <?php 
                    for ($i=$Il_tap; $i >1900 ; $i--) { 
                     ?>
                     <option value="<?php echo $i ?>"><?php echo $i ?></option>  
                   <?php } ?>
                 </select>
               </div>
             </div>

             <?php 
             $Muherrik_Hecmi_Sor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum");
             $Muherrik_Hecmi_Sor->execute(array(
              'avtomobilmuherrikhecmi_durum'=>1));
              ?>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Min </label>
                  <select  class="selectpicker form-control" disabled="disabled" id="Filtir_Muherrik_Hecmi_Min" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" >
                   <?php 
                   while($Muherrik_Hecmi_Cek=$Muherrik_Hecmi_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_id'] ?>"><?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_ad'] ?></option>  
                  <?php } ?>
                </select>
              </div>

              <?php 
              $Muherrik_Hecmi_Sor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum");
              $Muherrik_Hecmi_Sor->execute(array(
                'avtomobilmuherrikhecmi_durum'=>1));
                ?>

                <div class="col-lg-6">
                  <label>Max</label>
                  <select  class="selectpicker form-control" disabled="disabled" id="Filtir_Muherrik_Hecmi_Max" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                   <?php 
                   while($Muherrik_Hecmi_Cek=$Muherrik_Hecmi_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_id'] ?>"><?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_ad'] ?></option>  
                  <?php } ?>
                </select>
              </div>
            </div>




            <div class="form-group row">
              <div class="col-lg-6">
                <label>Yürüş km </label>
                <input type="text" id="Filtir_Avto_Yurus_Km_Min" disabled="disabled" class="form-control" placeholder="min">
              </div>
              <div class="col-lg-6">
                <label>Max</label>
                <input type="text" id="Filtir_Avto_Yurus_Km_Max" disabled="disabled" class="form-control" placeholder="max">
              </div>
            </div>




            <div class="form-group row">
              <div class="col-lg-6">
                <label>At Gücü </label>
                <input type="text" id="Filtir_At_Gucu_Min" disabled="disabled" class="form-control" placeholder="min">
              </div>
              <div class="col-lg-6">
                <label>Max</label>
                <input type="text" id="Filtir_At_Gucu_Max" disabled="disabled" class="form-control" placeholder="max">
              </div>
            </div>




            <div class="form-group row">
              <div class="col-lg-6">
                <label>Qiymət </label>
                <input type="text" id="Filtir_Avto_Qiymet_Min" disabled="disabled" class="form-control" placeholder="min">
              </div>
              <div class="col-lg-6">
                <label>Max</label>
                <input type="text" id="Filtir_Avto_Qiymet_Max" disabled="disabled" class="form-control" placeholder="max">
              </div>
            </div>
            <div class="form-row barterkredit">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" disabled="disabled" id="customCheck24">
                <label class="custom-control-label" for="customCheck24">Barter var</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" disabled="disabled" id="customCheck25">
                <label class="custom-control-label" for="customCheck25">Kredit var</label>
              </div>
            </div>




            <div class="form-group row">
              <div class="col-lg-12">
                <label>Dövlət</label>
                <?php 

                $Istesal_Olkesi_Sor=$db->prepare("SELECT * FROM dovlet where Durum=:Durum");
                $Istesal_Olkesi_Sor->execute(array(
                  'Durum'=>1));
                  ?>
                  <select multiple class="selectpicker form-control" disabled="disabled" id="number-multiple2" data-container="body" data-live-search="true" title="Seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                    <?php 
                    while($Istesal_Olkesi_Cek=$Istesal_Olkesi_Sor->fetch(PDO::FETCH_ASSOC)){
                     ?>
                     <option value="<?php echo $Istesal_Olkesi_Cek['Dovlet_Id'] ?>" ><?php echo $Istesal_Olkesi_Cek['Dovlet_Ad']  ?></option>  
                   <?php } ?>

                 </select>
               </div>
             </div>



             <div class="form-group row">
              <div class="col-lg-12">
                <label>Şəhər</label>
                <?php 

                $Istesal_Olkesi_Sor=$db->prepare("SELECT * FROM dovlet where Durum=:Durum");
                $Istesal_Olkesi_Sor->execute(array(
                  'Durum'=>1));
                  ?>
                  <select multiple class="selectpicker form-control" disabled="disabled" id="number-multiple2" data-container="body" data-live-search="true" title="Seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                    <?php 
                    while($Istesal_Olkesi_Cek=$Istesal_Olkesi_Sor->fetch(PDO::FETCH_ASSOC)){
                     ?>
                     <option value="<?php echo $Istesal_Olkesi_Cek['Dovlet_Id'] ?>" ><?php echo $Istesal_Olkesi_Cek['Dovlet_Ad']  ?></option>  
                   <?php } ?>

                 </select>
               </div>
             </div>
             <?php 
             $avtomobil_Techizati_Bolmesi_Sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_durum=:avtomobil_techizat_bolmesi_durum");
             $avtomobil_Techizati_Bolmesi_Sor->execute(array(
              'avtomobil_techizat_bolmesi_durum'=>1));
             while($avtomobil_Techizati_Bolmesi_Cek=$avtomobil_Techizati_Bolmesi_Sor->fetch(PDO::FETCH_ASSOC)){
              $avtomobil_techizat_bolmesi_id=$avtomobil_Techizati_Bolmesi_Cek['avtomobil_techizat_bolmesi_id'];
              ?>
              <div class="form-row check">

                <label for="exampleFormControlSelect1"><?php echo $avtomobil_Techizati_Bolmesi_Cek['avtomobil_techizat_bolmesi_ad'] ?></label>
                <hr>
                <?php 
                $avtomobil_Techizati_Sor=$db->prepare("SELECT * FROM avtomobil_techizat where avtomobil_techizat_durum=:avtomobil_techizat_durum and avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
                $avtomobil_Techizati_Sor->execute(array(
                  'avtomobil_techizat_durum'=>1,
                  'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
                while($avtomobil_Techizati_Cek=$avtomobil_Techizati_Sor->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" disabled="disabled" id="vtomobil_Techizati-<?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_id']  ?>">
                    <label class="custom-control-label" for="vtomobil_Techizati-<?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_id']  ?>"><?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_ad']  ?></label>
                  </div>
                <?php } ?>
              </div>
            <?php } ?> 
          </form> 
        </div> 
        <div class="button-wrapper d-flex justify-content-center">
          <div>   
            <button type="button" class="btn"><span>Axtarış nəticəsi</span></button>  
          </div>
          <h4>275</h4>   
        </div>

      </div>
    </div>
  </div> 
</div> 
<!-- Mobile Filtir -->
<div class="mobile-filtir d-block d-sm-none">
  <a class="btn btn-outline-success" data-bs-toggle="offcanvas" href="#mobilefiltir" role="button" aria-controls="offcanvasExample">
    <i class="bi bi-filter"></i>
  </a>  
  <div class="offcanvas offcanvas-start" tabindex="-1" id="mobilefiltir" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body"> 
     <div class="row">
      <div class="col-12">
        <div class="list-group in-bas" id="myList" role="tablist">
          <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home" role="tab">Satiş</a>
          <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">İcarə</a>             
        </div>
      </div>
      <div class="col-12">
        <div class="tab-content in-axtar">
          <div class="tab-pane active" id="home" role="tabpanel">
           <form role="form">
            <div class="form-group">
              <label for="validationServer1">Kateqoriya</label>
              <select class="form-control" id="validationServer1" onchange="location = this.value;">
               <option selected="selected" disabled="">Secin</option>
               <?php
               $bolmesor = $db->prepare("SELECT * FROM bolme where bolme_sil_durum=:bolme_sil_durum and bolme_durum=:bolme_durum order by bolme_id ASC ");
               $bolmesor->execute(array(
                'bolme_sil_durum' => 0,
                'bolme_durum' => 1,
              ));
              while ($bolmecek = $bolmesor->fetch(PDO::FETCH_ASSOC)) { ?>                 
                <optgroup label="<?php echo $bolmecek['bolme_ad'] ?>">
                  <?php
                  $kataqoriyasor = $db->prepare("SELECT * FROM karoqoriya where bolme_id=:bolme_id and karoqoriya_durum=:karoqoriya_durum and karoqoriya_sil_durum=:karoqoriya_sil_durum order by karoqoriya_sira ASC ");
                  $kataqoriyasor->execute(array(
                    'bolme_id' => $bolmecek['bolme_id'],
                    'karoqoriya_durum' => 1,
                    'karoqoriya_sil_durum' => 0
                  ));
                  while ($kataqoriyacek = $kataqoriyasor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option  value="<?php echo 'filtirlenmis?kategoriya='.$kataqoriyacek['karoqoriya_seo_url'] ?>"><?php echo $kataqoriyacek['karoqoriya_ad'] ?></option>
                  <?php } ?>
                </optgroup>
              <?php } ?>
            </select>
          </div> 

          <div class="form-group row">
            <div class="col-lg-12">
              <label>Marka</label>
              <?php 
              $avtomobil_marfkasi_sor=$db->prepare("SELECT * FROM avtomobil_markasi where  avtomobil_markasi_durum=:avtomobil_markasi_durum");
              $avtomobil_marfkasi_sor->execute(array(
                'avtomobil_markasi_durum'=>1));
                ?>


                <select multiple class="selectpicker form-control"  id="number-multiple" data-container="body" data-live-search="true" title="Marka seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                  <?php 

                  while( $avtomobil_marfkasi_cek=$avtomobil_marfkasi_sor->fetch(PDO::FETCH_ASSOC)){
                   ?>
                   <option value="<?php  echo $avtomobil_marfkasi_cek['avtomobil_markasi_id'] ?>" ><?php echo $avtomobil_marfkasi_cek['avtomobil_markasi_ad'] ?></option>  
                 <?php } ?>

               </select>
             </div>
           </div>


           <div class="form-group row">
            <div class="col-lg-12">
              <label>Model</label>
              <select multiple class="selectpicker form-control" disabled="disabled" id="number-multiple1" data-container="body" data-live-search="true" title="Model seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                <option>Elantra</option>  
                <option>Accent</option>  
                <option>Matrix</option>  
                <option>Boylum</option>  
                <option>1</option>  
                <option>1</option>  
                <option>1</option>  
                <option>1</option>  
              </select>
            </div>
          </div>



          <div class="form-group row">
            <div class="col-lg-12">
              <?php 
              $Ban_Novu_Sor=$db->prepare("SELECT * FROM avtomobil_ban_novu where avtomobil_ban_novu_durum=:avtomobil_ban_novu_durum");
              $Ban_Novu_Sor->execute(array(
                'avtomobil_ban_novu_durum'=>1));
                ?>
                <label>Ban Növü</label>
                <select multiple class="selectpicker form-control" disabled="disabled" id="ban_movu" data-container="body" data-live-search="true" title="Ban Növü" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">

                  <?php 
                  while($Ban_Novu_Cek=$Ban_Novu_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option><?php echo $Ban_Novu_Cek['avtomobil_ban_novu_ad'] ?></option>  
                  <?php } ?>
                </select>
              </div>
            </div>





            <div class="form-group row">
              <div class="col-lg-12">
                <label>Vəziyyəti</label>
                <?php 
                $Veziyyet_Sor=$db->prepare("SELECT * FROM emlakin_veziyyeti where avtomobil_elanlari_ucun_durum=:avtomobil_elanlari_ucun_durum");
                $Veziyyet_Sor->execute(array(
                  'avtomobil_elanlari_ucun_durum'=>1));
                  ?>
                  <select multiple class="selectpicker form-control" disabled="disabled" id="veziyyeti" data-container="body" data-live-search="true" title="Secim Edin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                    <?php 
                    while($Veziyyet_Cek=$Veziyyet_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
                      <option><?php echo $Veziyyet_Cek['emlakin_veziyyeti_ad'] ?></option>  
                    <?php } ?>

                  </select>
                </div>
              </div>


              <?php 
              $Suret_Qutusu_Sor=$db->prepare("SELECT * FROM avto_suret_qutusu where avto_suret_qutusu_durum=:avto_suret_qutusu_durum");
              $Suret_Qutusu_Sor->execute(array(
                'avto_suret_qutusu_durum'=>1));
                ?>

                <div class="form-group row">
                  <div class="col-lg-12">
                    <label>Surət Qutgusu</label>
                    <select multiple class="selectpicker form-control" disabled="disabled" id="filtir_suret_qutusu" data-container="body" data-live-search="true" title="Model seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                      <?php 
                      while($Suret_Qutusu_Cek=$Suret_Qutusu_Sor->fetch(PDO::FETCH_ASSOC)){
                       ?>
                       <option value="<?php echo $Suret_Qutusu_Cek['avto_suret_qutusu_id']  ?>"><?php echo $Suret_Qutusu_Cek['avto_suret_qutusu_ad'] ?></option>  
                     <?php } ?>
                   </select>
                 </div>
               </div>
               <?php 
               $yanacaq_novu_sor=$db->prepare("SELECT* from yanacaq where yanacaq_durum=:yanacaq_durum");
               $yanacaq_novu_sor->execute(array(
                'yanacaq_durum'=>1));
                ?>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <label>Yanacaq Növü</label>
                    <select multiple class="selectpicker form-control" disabled="disabled" id="filtir_yanacaq_novu" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                      <?php 
                      while($yanacaq_novu_cek=$yanacaq_novu_sor->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php echo $yanacaq_novu_cek['yanacaq_id'] ?>"><?php echo $yanacaq_novu_cek['yanacaq_ad'] ?></option>  
                      <?php } ?>

                    </select>
                  </div>
                </div>



                <?php 
                $otrucu_sor=$db->prepare("SELECT * FROM avto_otrucu where avto_otrucudurum=:avto_otrucudurum");
                $otrucu_sor->execute(array(
                  'avto_otrucudurum'=>1));
                  ?>

                  <div class="form-group row">
                    <div class="col-lg-12">
                      <label>Ötrücü</label>
                      <select multiple class="selectpicker form-control" disabled="disabled" id="filtir_avto_otrucu" data-container="body" data-live-search="true" title="Seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                        <?php 
                        while($otrucu_cek=$otrucu_sor->fetch(PDO::FETCH_ASSOC)){
                         ?>
                         <option <?php echo $otrucu_cek['avto_otrucu_id'] ?>><?php echo $otrucu_cek['avto_otrucu_ad'] ?></option>  
                       <?php } ?>

                     </select>
                   </div>
                 </div>


                 <?php 
                 $Reng_Sor=$db->prepare("SELECT * FROM  reng where reng_durum=:reng_durum");
                 $Reng_Sor->execute(array(
                  'reng_durum'=>1));
                  ?>
                  <div class="form-group row">
                    <div class="col-lg-12">
                      <label>Rəngi</label>
                      <select multiple class="selectpicker form-control" disabled="disabled" id="Avto_Fİltir_Rengi" data-container="body" data-live-search="true" title="Seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                        <?php 
                        while($Reng_Cek=$Reng_Sor->fetch(PDO::FETCH_ASSOC)){
                         ?>
                         <option <?php echo $Reng_Cek['reng_id'] ?>><?php echo $Reng_Cek['reng_ad'] ?></option> 
                       <?php } ?> 

                     </select>
                   </div>
                 </div>


                 <?php 
                 $Elan_Muellifi_Sor=$db->prepare("SELECT * FROM elanverennovu where avtmobil_elanlari_ucun_durum=:avtmobil_elanlari_ucun_durum");
                 $Elan_Muellifi_Sor->execute(array(
                  'avtmobil_elanlari_ucun_durum'=>1));
                  ?>


                  <div class="form-group row">
                    <div class="col-lg-12">
                      <label>Elanın Müəllifi</label>
                      <select multiple class="selectpicker form-control" disabled="disabled" id="Filtir_Elan_Muellifi" data-container="body" data-live-search="true" title="Model seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                        <?php 
                        while($Elan_Muellifi_Cek=$Elan_Muellifi_Sor->fetch(PDO::FETCH_ASSOC)){                       ?>
                          <option <?php echo $Elan_Muellifi_Cek['elanverennovu_id'] ?>> <?php echo $Elan_Muellifi_Cek['elanverennovu_ad'] ?></option>  
                        <?php } ?>
                        
                      </select>
                    </div>
                  </div>




                  <div class="form-group row">
                    <div class="col-lg-6">
                      <label>Min </label>
                      <select  class="selectpicker form-control" disabled="disabled" id="Filtir_Buraxilis_Ili_Min" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" >
                        <?php 
                        for ($i=$Il_tap; $i >1900 ; $i--) { 
                         ?>
                         <option value="<?php echo $i ?>"><?php echo $i ?></option>  
                       <?php } ?>
                     </select>
                   </div>


                   <div class="col-lg-6">
                    <label>Max</label>
                    <select  class="selectpicker form-control" disabled="disabled" id="Filtir_Buraxilis_Ili_Max" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                      <?php 
                      for ($i=$Il_tap; $i >1900 ; $i--) { 
                       ?>
                       <option value="<?php echo $i ?>"><?php echo $i ?></option>  
                     <?php } ?>
                   </select>
                 </div>
               </div>

               <?php 
               $Muherrik_Hecmi_Sor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum");
               $Muherrik_Hecmi_Sor->execute(array(
                'avtomobilmuherrikhecmi_durum'=>1));
                ?>
                <div class="form-group row">
                  <div class="col-lg-6">
                    <label>Min </label>
                    <select  class="selectpicker form-control" disabled="disabled" id="Filtir_Muherrik_Hecmi_Min" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" >
                     <?php 
                     while($Muherrik_Hecmi_Cek=$Muherrik_Hecmi_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
                      <option value="<?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_id'] ?>"><?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_ad'] ?></option>  
                    <?php } ?>
                  </select>
                </div>

                <?php 
                $Muherrik_Hecmi_Sor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum");
                $Muherrik_Hecmi_Sor->execute(array(
                  'avtomobilmuherrikhecmi_durum'=>1));
                  ?>

                  <div class="col-lg-6">
                    <label>Max</label>
                    <select  class="selectpicker form-control" disabled="disabled" id="Filtir_Muherrik_Hecmi_Max" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                     <?php 
                     while($Muherrik_Hecmi_Cek=$Muherrik_Hecmi_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
                      <option value="<?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_id'] ?>"><?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_ad'] ?></option>  
                    <?php } ?>
                  </select>
                </div>
              </div>




              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Yürüş km </label>
                  <input type="text" id="Filtir_Avto_Yurus_Km_Min" disabled="disabled" class="form-control" placeholder="min">
                </div>
                <div class="col-lg-6">
                  <label>Max</label>
                  <input type="text" id="Filtir_Avto_Yurus_Km_Max" disabled="disabled" class="form-control" placeholder="max">
                </div>
              </div>




              <div class="form-group row">
                <div class="col-lg-6">
                  <label>At Gücü </label>
                  <input type="text" id="Filtir_At_Gucu_Min" disabled="disabled" class="form-control" placeholder="min">
                </div>
                <div class="col-lg-6">
                  <label>Max</label>
                  <input type="text" id="Filtir_At_Gucu_Max" disabled="disabled" class="form-control" placeholder="max">
                </div>
              </div>




              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Qiymət </label>
                  <input type="text" id="Filtir_Avto_Qiymet_Min" disabled="disabled" class="form-control" placeholder="min">
                </div>
                <div class="col-lg-6">
                  <label>Max</label>
                  <input type="text" id="Filtir_Avto_Qiymet_Max" disabled="disabled" class="form-control" placeholder="max">
                </div>
              </div>
              <div class="form-row barterkredit">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" disabled="disabled" id="customCheck24">
                  <label class="custom-control-label" for="customCheck24">Barter var</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" disabled="disabled" id="customCheck25">
                  <label class="custom-control-label" for="customCheck25">Kredit var</label>
                </div>
              </div>




              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Dövlət</label>
                  <?php 

                  $Istesal_Olkesi_Sor=$db->prepare("SELECT * FROM dovlet where Durum=:Durum");
                  $Istesal_Olkesi_Sor->execute(array(
                    'Durum'=>1));
                    ?>
                    <select multiple class="selectpicker form-control" disabled="disabled" id="number-multiple2" data-container="body" data-live-search="true" title="Seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                      <?php 
                      while($Istesal_Olkesi_Cek=$Istesal_Olkesi_Sor->fetch(PDO::FETCH_ASSOC)){
                       ?>
                       <option value="<?php echo $Istesal_Olkesi_Cek['Dovlet_Id'] ?>" ><?php echo $Istesal_Olkesi_Cek['Dovlet_Ad']  ?></option>  
                     <?php } ?>

                   </select>
                 </div>
               </div>



               <div class="form-group row">
                <div class="col-lg-12">
                  <label>Şəhər</label>
                  <?php 

                  $Istesal_Olkesi_Sor=$db->prepare("SELECT * FROM dovlet where Durum=:Durum");
                  $Istesal_Olkesi_Sor->execute(array(
                    'Durum'=>1));
                    ?>
                    <select multiple class="selectpicker form-control" disabled="disabled" id="number-multiple2" data-container="body" data-live-search="true" title="Seçin" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                      <?php 
                      while($Istesal_Olkesi_Cek=$Istesal_Olkesi_Sor->fetch(PDO::FETCH_ASSOC)){
                       ?>
                       <option value="<?php echo $Istesal_Olkesi_Cek['Dovlet_Id'] ?>" ><?php echo $Istesal_Olkesi_Cek['Dovlet_Ad']  ?></option>  
                     <?php } ?>

                   </select>
                 </div>
               </div>
               <?php 
               $avtomobil_Techizati_Bolmesi_Sor=$db->prepare("SELECT * FROM avtomobil_techizat_bolmesi where avtomobil_techizat_bolmesi_durum=:avtomobil_techizat_bolmesi_durum");
               $avtomobil_Techizati_Bolmesi_Sor->execute(array(
                'avtomobil_techizat_bolmesi_durum'=>1));
               while($avtomobil_Techizati_Bolmesi_Cek=$avtomobil_Techizati_Bolmesi_Sor->fetch(PDO::FETCH_ASSOC)){
                $avtomobil_techizat_bolmesi_id=$avtomobil_Techizati_Bolmesi_Cek['avtomobil_techizat_bolmesi_id'];
                ?>
                <div class="form-row check">

                  <label for="exampleFormControlSelect1"><?php echo $avtomobil_Techizati_Bolmesi_Cek['avtomobil_techizat_bolmesi_ad'] ?></label>
                  <hr>
                  <?php 
                  $avtomobil_Techizati_Sor=$db->prepare("SELECT * FROM avtomobil_techizat where avtomobil_techizat_durum=:avtomobil_techizat_durum and avtomobil_techizat_bolmesi_id=:avtomobil_techizat_bolmesi_id");
                  $avtomobil_Techizati_Sor->execute(array(
                    'avtomobil_techizat_durum'=>1,
                    'avtomobil_techizat_bolmesi_id'=>$avtomobil_techizat_bolmesi_id));
                  while($avtomobil_Techizati_Cek=$avtomobil_Techizati_Sor->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" disabled="disabled" id="vtomobil_Techizati-<?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_id']  ?>">
                      <label class="custom-control-label" for="vtomobil_Techizati-<?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_id']  ?>"><?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_ad']  ?></label>
                    </div>
                  <?php } ?>
                </div>
              <?php } ?> 
            </form> 
          </div> 
          <div class="button-wrapper d-flex justify-content-center">
            <div>   
              <button type="button" class="btn"><span>Axtarış nəticəsi</span></button>  
            </div>
            <h4>275</h4>   
          </div>

        </div>
      </div>
    </div> 
  </div>
</div>
</div>
<!-- Mobile Filtir -->

