<div class="col-3">
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
          <?php   
          $karoqoriya_seo_url=$_GET['kategoriya'];
          $kataqoriyasor = $db->prepare("SELECT * FROM karoqoriya where karoqoriya_seo_url=:karoqoriya_seo_url and karoqoriya_durum=:karoqoriya_durum and karoqoriya_sil_durum=:karoqoriya_sil_durum order by karoqoriya_sira ASC ");
          $kataqoriyasor->execute(array(
            'karoqoriya_seo_url' => $karoqoriya_seo_url,
            'karoqoriya_durum' => 1,
            'karoqoriya_sil_durum' => 0
          ));
          $kataqoriyacekfiltirlenmi = $kataqoriyasor->fetch(PDO::FETCH_ASSOC);
          if ($kataqoriyacekfiltirlenmi['karoqoriya_id']==1) {
           require_once 'Avtomobil_Elani/Neqliyyat_Filtir.php'; 
         }
         ?>
       </div>
       <div class="tab-pane" id="profile" role="tabpanel">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Konum Sat</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kateqoriya</label>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline1">Villa</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">Obyekt</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline3">Erazi</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline4">Yeni
            tikili</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline5" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline5">Kohne
            tikili</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline6" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline6">Lerinqrad</label>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Tip</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <form class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Qiymet</label>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="En az">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="En cox">
            </div>
          </div>
        </form>
        <form class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sahe</label>
          <div class="row">
            <div class="col">
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option selected>En az m2</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col">
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref1">
                <option selected>En az m2</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
        </form>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Otaq sayi</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>Otaq sayini secin</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Bina yasi</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>Bina yasini secin</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Mertebe</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>Mertebe secin</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Elan tarixi</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>Hamisi</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
      </div>
      <div class="tab-pane" id="messages" role="tabpanel">...</div>
      <div class="tab-pane" id="settings" role="tabpanel">...</div>
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






