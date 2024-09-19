
<form role="form" method="GET" name="Axtaris" id="Avto_Axtar_Form_ID"> 
  <div class="form-group">
    <label for="validationServer1">Kateqoriya</label>
    <select class="form-control"  id="validationServer1" onchange="location = this.value;">
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
          <option 
          <?php if ($kataqoriyacekfiltirlenmi['karoqoriya_id']==$kataqoriyacek['karoqoriya_id']): ?>
            selected="selected"
          <?php endif ?>

          value="<?php echo 'filtirlenmis?kategoriya='.$kataqoriyacek['karoqoriya_seo_url'] ?>"><?php echo $kataqoriyacek['karoqoriya_ad'] ?></option>
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

      <select  onchange="axtarmaqucun(),avtomodeltelebet()" multiple class="selectpicker form-control" name="avto_model[]"  id="avto_model"  data-live-search="true" title="Seçin" >

        <?php 

        while( $avtomobil_markasi_cek=$avtomobil_marfkasi_sor->fetch(PDO::FETCH_ASSOC)){
         ?>
         <option value="<?php  echo $avtomobil_markasi_cek['avtomobil_markasi_id'] ?>" ><?php echo $avtomobil_markasi_cek['avtomobil_markasi_ad'] ?></option>  
       <?php } ?>

     </select>
   </div>
 </div>
 <script type="text/javascript">
   function avtomodeltelebet() {
    var selected = [];
    for (var option of document.getElementById('avto_model').options)
    {
      if (option.selected) {
        selected.push(option.value);
      }
    }

    var Modeltelebet=new XMLHttpRequest();
    Modeltelebet.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("markaid").innerHTML = " ";
        document.getElementById("markaid").innerHTML = this.responseText;
        $(function () {
          $('.selectpicker').selectpicker();
        });
      }
    };
    Modeltelebet.open("GET", "Avtomobil_Elani/Filtir_Avtomobil_Model_Telebi.php?modelid=" + selected, true);
    Modeltelebet.send();

  }
</script>


<div class="form-group row" >
  <div class="col-lg-12" id="markaid" >
    <label >Model</label>
    <input name="" type="hidden" value="" />
    <select  disabled="" multiple class="selectpicker form-control"  data-placeholder="false" multiple="multiple" name="" >

    </select>
  </div>
</div>

<script type="text/javascript">
  function axtarmaqucun() {
   document.getElementById("formgonder").click();

 }
</script>



<div class="form-group row">
  <div class="col-lg-12">
    <?php 
    $Ban_Novu_Sor=$db->prepare("SELECT * FROM avtomobil_ban_novu where avtomobil_ban_novu_durum=:avtomobil_ban_novu_durum");
    $Ban_Novu_Sor->execute(array(
      'avtomobil_ban_novu_durum'=>1));
      ?>
      <label>Ban Növü</label>
      <select  multiple class="selectpicker form-control" name="avtomobil_ban_novu_id[]" onchange="axtarmaqucun()" id="ban_movu" data-live-search="true">
        <?php 
        while($Ban_Novu_Cek=$Ban_Novu_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
          <option value="<?php echo $Ban_Novu_Cek['avtomobil_ban_novu_id'] ?>"><?php echo $Ban_Novu_Cek['avtomobil_ban_novu_ad'] ?></option>  
        <?php } ?>
      </select>
    </div>
  </div>



  <div class="form-group row">
    <div class="col-lg-12">
      <?php 
      $Veziyyet_Sor=$db->prepare("SELECT * FROM emlakin_veziyyeti where avtomobil_elanlari_ucun_durum=:avtomobil_elanlari_ucun_durum");
      $Veziyyet_Sor->execute(array(
        'avtomobil_elanlari_ucun_durum'=>1));
        ?>
        <label>Əmlak Vəziyyəti</label>
        <select  multiple class="selectpicker form-control" name="emlakin_veziyyeti_id[]" onchange="axtarmaqucun()"   id="veziyyeti" data-live-search="true">
          <?php 
          while($Veziyyet_Cek=$Veziyyet_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $Veziyyet_Cek['emlakin_veziyyeti_id'] ?>"><?php echo $Veziyyet_Cek['emlakin_veziyyeti_ad'] ?></option>  
          <?php } ?>
        </select>
      </div>
    </div>


    <div class="form-group row">
      <div class="col-lg-12">
       <?php 
       $Suret_Qutusu_Sor=$db->prepare("SELECT * FROM avto_suret_qutusu where avto_suret_qutusu_durum=:avto_suret_qutusu_durum");
       $Suret_Qutusu_Sor->execute(array(
        'avto_suret_qutusu_durum'=>1));
        ?>
        <label>Surət Qutgusu</label>
        <select  multiple class="selectpicker form-control" name="avto_suret_qutusu_id[]" onchange="axtarmaqucun()"   id="filtir_suret_qutusu" data-live-search="true">
         <?php 
         while($Suret_Qutusu_Cek=$Suret_Qutusu_Sor->fetch(PDO::FETCH_ASSOC)){
           ?>
           <option value="<?php echo $Suret_Qutusu_Cek['avto_suret_qutusu_id']  ?>"><?php echo $Suret_Qutusu_Cek['avto_suret_qutusu_ad'] ?></option>  
         <?php } ?>
       </select>
     </div>
   </div>

   <div class="form-group row">
    <div class="col-lg-12">
     <?php 
     $yanacaq_novu_sor=$db->prepare("SELECT* from yanacaq where yanacaq_durum=:yanacaq_durum");
     $yanacaq_novu_sor->execute(array(
      'yanacaq_durum'=>1));
      ?>
      <label>Yanacaq Növü</label>
      <select  multiple class="selectpicker form-control" name="yanacaq_id[]" onchange="axtarmaqucun()"   id="filtir_yanacaq_novu" data-live-search="true">
        <?php 
        while($yanacaq_novu_cek=$yanacaq_novu_sor->fetch(PDO::FETCH_ASSOC)){ ?>
          <option value="<?php echo $yanacaq_novu_cek['yanacaq_id'] ?>"><?php echo $yanacaq_novu_cek['yanacaq_ad'] ?></option>  
        <?php } ?>
      </select>
    </div>
  </div>


  <div class="form-group row">
    <div class="col-lg-12">
      <?php 
      $otrucu_sor=$db->prepare("SELECT * FROM avto_otrucu where avto_otrucudurum=:avto_otrucudurum");
      $otrucu_sor->execute(array(
        'avto_otrucudurum'=>1));
        ?>
        <label>Ötrücü</label>
        <select  multiple class="selectpicker form-control" name="avto_otrucu_id[]" onchange="axtarmaqucun()"   id="filtir_avto_otrucu"  data-live-search="true">
         <?php 
         while($otrucu_cek=$otrucu_sor->fetch(PDO::FETCH_ASSOC)){
           ?>
           <option value="<?php echo $otrucu_cek['avto_otrucu_id'] ?>"><?php echo $otrucu_cek['avto_otrucu_ad'] ?></option>  
         <?php } ?>
       </select>
     </div>
   </div>




   <div class="form-group row">
    <div class="col-lg-12">
     <?php 
     $Reng_Sor=$db->prepare("SELECT * FROM  reng where reng_durum=:reng_durum");
     $Reng_Sor->execute(array(
      'reng_durum'=>1));
      ?>
      <label>Rəng</label>
      <select  multiple class="selectpicker form-control" name="reng_id[]" onchange="axtarmaqucun()"   id="Avto_Fİltir_Rengi" data-live-search="true">
       <?php 
       while($Reng_Cek=$Reng_Sor->fetch(PDO::FETCH_ASSOC)){
         ?>
         <option value="<?php echo $Reng_Cek['reng_id'] ?>"><?php echo $Reng_Cek['reng_ad'] ?></option> 
       <?php } ?> 
     </select>
   </div>
 </div>



 <div class="form-group row">
  <div class="col-lg-12">
   <?php 
   $Elan_Muellifi_Sor=$db->prepare("SELECT * FROM elanverennovu where avtmobil_elanlari_ucun_durum=:avtmobil_elanlari_ucun_durum");
   $Elan_Muellifi_Sor->execute(array(
    'avtmobil_elanlari_ucun_durum'=>1));
    ?>
    <label>Elan Müəllifi</label>
    <select  multiple class="selectpicker form-control" name="elanverennovu_id[]" onchange="axtarmaqucun()"   id="Filtir_Elan_Muellifi"  data-live-search="true">
      <?php 
      while($Elan_Muellifi_Cek=$Elan_Muellifi_Sor->fetch(PDO::FETCH_ASSOC)){                       ?>
        <option value="<?php echo $Elan_Muellifi_Cek['elanverennovu_id'] ?>"> <?php echo $Elan_Muellifi_Cek['elanverennovu_ad'] ?></option>  
      <?php } ?>
    </select>
  </div>
</div>




<div class="form-group row">
  <div class="col-lg-6">
    <label>Buraxılış İli </label>
    <select  class="selectpicker form-control" id="Filtir_Buraxilis_Ili_Min" onchange="axtarmaqucun()" name="baslagictarix" data-live-search="true">
       <option disabled="disabled" selected="selected">Secin</option>  
      <?php 
      for ($i=$Il_tap; $i >1900 ; $i--) { 
       ?>
       <option value="<?php echo $i ?>"><?php echo $i ?></option>  
     <?php } ?>
   </select>
 </div>




 <div class="col-lg-6">
  <label> </label>
  <select  class="selectpicker form-control"   id="Filtir_Buraxilis_Ili_Max" onchange="axtarmaqucun()" name="bitistarix" data-live-search="true">
    <option disabled="disabled" selected="selected">Secin</option>
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
      <label>Mühərrik Həcmi </label>
      <select  class="selectpicker form-control"   id="Filtir_Muherrik_Hecmi_Min" name="muherrikhecmimin" onchange="axtarmaqucun()" data-live-search="true">
        <option disabled="disabled" selected="selected">Secin</option>
       <?php 
       while($Muherrik_Hecmi_Cek=$Muherrik_Hecmi_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
        <option value="<?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_ad']?>"><?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_ad'] ?></option>  
      <?php } ?>
    </select>
  </div>

  <?php 
  $Muherrik_Hecmi_Sor=$db->prepare("SELECT * FROM avtomobilmuherrikhecmi where avtomobilmuherrikhecmi_durum=:avtomobilmuherrikhecmi_durum");
  $Muherrik_Hecmi_Sor->execute(array(
    'avtomobilmuherrikhecmi_durum'=>1));
    ?>

    <div class="col-lg-6">
      <label> </label>
      <select  class="selectpicker form-control"   id="Filtir_Muherrik_Hecmi_Max" name="muherrikhecmimax" onchange="axtarmaqucun()" data-live-search="true">
        <option disabled="disabled" selected="selected">Secin</option>
       <?php 
       while($Muherrik_Hecmi_Cek=$Muherrik_Hecmi_Sor->fetch(PDO::FETCH_ASSOC)){ ?>
        <option value="<?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_ad'] ?>"><?php echo $Muherrik_Hecmi_Cek['avtomobilmuherrikhecmi_ad'] ?></option>  
      <?php } ?>
    </select>
  </div>
</div>






<div class="form-group row">
  <div class="col-lg-6">
    <label>Yürüş km </label>
    <select  class="selectpicker form-control"   id="avto_yurus_km_min" name="avto_yurus_km_min" onchange="axtarmaqucun()" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" >
      <option disabled="disabled" selected="selected">Secin</option>
     <?php 
     for ($i=0; $i < 200000 ; $i+=1000) { 
       ?>
       <option value="<?php echo $i ?>"><?php echo $i ?></option>  
     <?php } ?>
   </select>
 </div>

 <div class="col-lg-6">
  <label></label>
  <select  class="selectpicker form-control"   id="avto_yurus_km_max" name="avto_yurus_km_max" onchange="axtarmaqucun()" data-container="body" data-live-search="true" title="Secin" data-hide-disabled="true" data-actions-box="true" >
    <option disabled="disabled" selected="selected">Secin</option>
   <?php 
   for ($i=0; $i < 200000 ; $i+=1000) { 
     ?>
     <option value="<?php echo $i ?>"><?php echo $i ?></option>  
   <?php } ?>
 </select>
</div>
</div>

<div class="form-group row">
  <div class="col-lg-6">
    <label>At gücü </label>
    <select  class="selectpicker form-control"   id="Filtir_At_Gucu_Min" name="Filtir_At_Gucu_Min" onchange="axtarmaqucun()"  data-live-search="true">
      <option disabled="disabled" selected="selected">Secin</option>
     <?php 
     for ($i=0; $i < 200000 ; $i+=1000) { 
       ?>
       <option value="<?php echo $i ?>"><?php echo $i ?></option>  
     <?php } ?>
   </select>
 </div>

 <div class="col-lg-6">
  <label></label>
  <select  class="selectpicker form-control"   id="Filtir_At_Gucu_Max" name="Filtir_At_Gucu_Max" onchange="axtarmaqucun()" data-live-search="true">
    <option disabled="disabled" selected="selected">Secin</option>
   <?php 
   for ($i=0; $i < 200000 ; $i+=1000) { 
     ?>
     <option value="<?php echo $i ?>"><?php echo $i ?></option>  
   <?php } ?>
 </select>
</div>
</div>








<div class="form-group row">
  <div class="col-lg-6">
    <label>Qiymət </label>
    <input type="text" id="Filtir_Avto_Qiymet_Min" onfocusout="axtarmaqucun()"  onkeyup="axtarmaqucun()" name="Filtir_Avto_Qiymet_Min"   class="form-control" placeholder="min">
  </div>
  <div class="col-lg-6">
    <label></label>
    <input type="text" id="Filtir_Avto_Qiymet_Max" onfocusout="axtarmaqucun()" onkeyup="axtarmaqucun()"   name="Filtir_Avto_Qiymet_Max" class="form-control" placeholder="max">
  </div>
</div>
<div class="form-row barterkredit">
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input"   id="customCheck24">
    <label class="custom-control-label" for="customCheck24">Barter var</label>
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input"   id="customCheck25">
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
      <select multiple class="selectpicker form-control"   id="avto_dovlet" data-live-search="true">
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
      <select multiple class="selectpicker form-control"   id="dovet_sec"  data-live-search="true">
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
        <input type="checkbox" class="custom-control-input"  oninput="axtarmaqucun()" name="elanverennovu_id[]" value="vtomobilTechizati-<?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_id']  ?>">
        <label class="custom-control-label" for="vtomobil_Techizati-<?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_id']  ?>"><?php echo $avtomobil_Techizati_Cek['avtomobil_techizat_ad']  ?></label>
      </div>
    <?php } ?>
  </div>
<?php } ?>
<button type="submit" id="formgonder" >Gonder</button>
</form>
<script type="text/javascript">

  function axtarmaqucun() {
    document.getElementById("formgonder").click();
  }
</script>

