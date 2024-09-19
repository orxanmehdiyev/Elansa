<?php 
require_once "_header.php";
?>

<div class="container">


  <div class="row mt-5">

    <div class="col-12">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        </div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        </div>
        <div class="tab-pane fade show active" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
          <div class="accordion e-user" id="accordionExample1">
            <div class="card">
              <div class="card-header">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left " type="button">
                    Profil melumatlari
                  </button>
                </h2>
              </div>
              <div id="collapseOne1" class="collapse show">
                <div class="card-body">
                  <form class="needs-validation" novalidate>
                    <div class="form-row">
                      <div class="col-md-6 ">
                        <label for="validationCustom01"><span>*</span>Ad</label>
                        <input type="text" class="form-control" id="validationCustom01" required value="<?php echo $usercek['user_ad'] ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom02"><span>*</span>Soyad</label>
                        <input type="text" class="form-control" id="validationCustom02" required value="<?php echo $usercek['user_soyad'] ?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6">
                        <label for="validationCustom03"><span>*</span>E-mail </label>
                        <input type="email" class="form-control" id="validationCustom03" required value="<?php echo $usercek['user_email'] ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom04"><span>*</span>Şifrə</label>
                        <input type="password" class="form-control" id="validationCustom04" required >
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6">
                        <label for="validationCustom05"><span>*</span>Region</label>
                        <input type="text" class="form-control" id="validationCustom05" required>
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom06"><span>*</span>Seher</label>
                        <select class="custom-select" id="validationCustom06" required>
                          <option selected disabled value=""><span>*</span>Secin...
                          </option>
                          <option>...</option>
                        </select>
                      </div>
                    </div>

                                    <div class="form-row">
                      <div class="col-md-6 ">
                        <label for="validationCustom01"><span>*</span>Telefon</label>
                        <input type="text" class="form-control" id="validationCustom01" required value="<?php echo $usercek['user_tel'] ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom02">Telefon</label>
                        <input type="text" class="form-control" id="validationCustom02" required value="<?php echo $usercek['user_tel_iki'] ?>">
                      </div>
                    </div>
                    

                    <button class="btn btn-primary" type="submit">Düzəliş et</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
require_once "_footer.php";

?>
