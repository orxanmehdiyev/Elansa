<?php 
require_once "_admin/Ayarlar/ayarlar.php";
if(isset($_SESSION["istifadeci"])){
  $usersor    = $db->prepare("SELECT * FROM user where user_email=:user_email");
  $usersor->execute(array(
   'user_email'=>$_SESSION["istifadeci"]
 ));
  $usersay=$usersor->rowCount();
  if($usersay==1){
   $usercek=$usersor->fetch(PDO::FETCH_ASSOC);
 }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="<?php echo $description ?>" content="Free Web tutorials">
  <meta name="<?php echo $keywords ?>" content="HTML, CSS, JavaScript">
  <meta name="<?php echo $author ?>" content="John Doe">
  <!--meta name="viewport " content="width=device-width, initial-scale=1.0"> 
  <meta name="viewport" content="width=1170"-->
  <meta name="theme-color" content="#4285f4">
  <!-- Fav and touch icons --> 
  <title><?php echo $tittle_metni; ?></title>
  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/knockout-file-bindings.css" rel="stylesheet">
  <link href="assets/fontawesome 5.15.1/css/all.css" rel="stylesheet" />
  <link href="assets/fontawesome 5.15.1/css/fontawesome.min.css" rel="stylesheet" />
  <link href="assets/css/elan-hurriyet.css" rel="stylesheet">
  <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/css/elan-hurriyet.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">
  <link href="assets/css/bootstrap-select.css" rel="stylesheet">  
  <link rel="stylesheet" href="assets/css/fancybox.css" /> 
  <link href="assets/css/ribbon.css" rel="stylesheet">
  <link href="assets/css/login-register.css" rel="stylesheet" />
  <link href="assets/css/modal.css" rel="stylesheet">
  
  <script src="assets/js/jquery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="_admin/Ayarlar/Fonksiyonlar.js"></script>
  <script type="text/javascript" src="ajax/secild.js"></script>
  <script type="text/javascript" src="ajax/secilmedi.js"></script><!-- Silinecek -->
  <script src="assets/fontawesome 5.15.1/js/fontawesome.min.js" type="text/javascript"></script>
  <script src="assets/js/login-register.js" type="text/javascript"></script>  
  <script src='assets/js/knockout-min.js'></script>
  <script src='assets/js/knockout-file-bindings.js'></script>
</head>
<body>
  <div id="yuklemealanikapsayici" class="yuklemealanikapsayici" style="display: none;">
   <div class="yuklemekapsayici">
    <div class="YuklenmemetniKapsayicisi">
     <div class="sk-chase">
       <div class="sk-chase-dot"></div>
       <div class="sk-chase-dot"></div>
       <div class="sk-chase-dot"></div>
       <div class="sk-chase-dot"></div>
       <div class="sk-chase-dot"></div>
       <div class="sk-chase-dot"></div>
     </div>
   </div>
 </div>
</div>
<div id="wrapper" class="head-hur">
  <!-- Mobile version start --> 
  <div class="xs-nav">
    <nav class="navbar navbar-light d-block d-sm-block d-md-block d-lg-none">
      <div class="container-fluid">
        <div class="xs-width"><a class="navbar-brand" href="../"><img src="_admin/img/<?php echo $logo ?>" title="Elansa"></a></div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul>
              <li>
                <a data-toggle="modal" data-target="#loginModalmobile" onclick="openLoginModal();" href="javascript: showLoginForm();">Giriş</a> 
              </li>
              <li>
               <a data-toggle="modal" data-target="#loginModalmobile" onclick="openRegisterModal();" href="javascript: showRegisterForm();"> Qeydiyyat</a>
             </li>
             <div class="float-right">
              <ul> 
                <?php if(isset($_SESSION["istifadeci"])){?>
                  <li>
                    <div class="dropdown show sexs">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                       Şəxsi Kabinet
                     </a>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="profil">Profil</a>
                      <a class="dropdown-item" href="elanlarim">Elanlarım</a>
                      <a class="dropdown-item" href="islem/cixis.php">Çıxış</a>
                      <?php if($usercek['_admin']==1){?>
                        <a class="dropdown-item" target="_blank" href="_admin/login">_admin</a>
                      <?php }else{} ?>
                    </div>
                  </div>
                </li>
                <?php
              }else{ ?>

              <?php    } ?> 
              <div class="modal fade login" id="loginModalmobile">
                <div class="modal-dialog login animated">
                  <div class="modal-content"> 
                    <div class="modal-body">
                      <div class="box">
                       <div class="modal-header">
                        <h4 class="">GİRİŞ</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div> 
                      <div class="content">
                        <div class="social">
                          <a id="google_login" class="btn btn-default  circle google" href="#">
                            <i class="fab fa-google"></i> Google ile daxil ol
                          </a>
                          <a id="facebook_login" class="btn btn-default circle facebook" href="#">
                            <i class="fab fa-facebook-square"></i>Facebook ile daxil ol
                          </a>
                        </div> 
                      </div> 
                      <div class="division">
                        <div class="line l"></div>
                        <span>və ya</span>
                        <div class="line r"></div>
                      </div>  
                      <div class="form loginBox"> 
                        <form action="islem/login.php" accept-charset="UTF-8" method="POST">
                          <input placeholder="E-mail" id="email" class="form-control" type="text" name="user_email">
                          <input placeholder="Şifrə" id="password" class="form-control" type="password" name="user_sifre">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Yadda saxla
                            </label>
                            <a href="#" title="">Şifrəmi unutdum</a>
                          </div>
                          <button class="btn btn-default btn-login" name="login">Daxil ol</button>
                        </form>
                      </div> 
                    </div>
                    <div class="box">
                      <div class="content registerBox" style="display:none;">
                        <div class="form">
                          <form method="POST" html="{:multipart=>true}" data-remote="true" action="islem/qeydiyyat.php" accept-charset="UTF-8">
                            <input placeholder="Ad" id="user_ad" required="" class="form-control" type="text" name="user_ad">
                            <input placeholder="Soyad" id="user_soyad" required="" class="form-control" type="text" name="user_soyad">
                            <input placeholder="E-mail" id="user_email" required="" class="form-control" type="text" name="user_email">
                            <input placeholder="Telfon" id="user_tel" required="" class="form-control" type="text" name="user_tel">
                            <input placeholder="Şifrə" id="sifre_bir" required="" class="form-control" type="password" name="sifre_bir">
                            <input placeholder="Təkrar şıfrə" id="sifre_iki" required="" class="form-control" type="password" name="sifre_iki">
                            <button type="submit" class="btn btn-default btn-register" name="qeydiyyat">Hesab yarat</button>                                                             
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <div class="forgot login-footer">
                      <span>Hesabiniz yoxdursa
                        <a href="javascript: showRegisterForm();">Qeydiyyatdan
                        kecin</a>
                      </span>
                    </div>
                    <div class="forgot register-footer" style="display:none">
                      <span>Hesabiniz varsa</span>
                      <a href="javascript: showLoginForm();">Giris edin</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </ul>
        </div>
      </ul>
      <hr/>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Ana səhifə</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Yaşayış kompleksləri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Agentliklər</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Avtosalonlar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mağazalar və şirkətlər</a>
        </li> 
      </ul>
          <!--form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form-->
        </div>
      </div>
    </div> 
  </nav> 
  <!-- Mobile version end -->
  <div class="header d-none d-lg-block d-xl-block d-xxl-block">
    <div class="in-page-nav">  
      <div class="full-nav">
        <div class="d-flex">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="_admin/img/<?php echo $logo ?>" title="" alt="">
          </a> 
          <div class="col-4 col-lg-6 elan-drop">
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid"> 
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav"> 
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="neqliyyatsuretlikataqoriya." id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Nəqliyyat
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/sedan.png"></span>Sedan</a></li>
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/jeep.png"></span>Suv/Picup</a></li> 
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/ford.png"></span>Vito</a></li>
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/tir.ico"></span>Yük avtomobili</a></li> 

                    </ul>
                  </li> 
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Daşınmaz əmlak
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/build.png"></span>Bina</a></li>
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/villa.png"></span>Villa</a></li> 
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/home.png"></span>Həyət evi</a></li>
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/villa.png"></span>Obyekt</a></li> 

                    </ul>
                  </li> 
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Elektronika
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/mobile.png"></span>Telefon</a></li>
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/note.png"></span>Kompyuter</a></li> 
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/tablet.png"></span>Tablet</a></li>
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/esya.png"></span>Məişət cihazları</a></li> 
                      <li><a class="dropdown-item" href="#"><span><img src="images/png_icon/esya.png"></span>Inşaat texnikası</a></li> 

                    </ul>
                  </li> 
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Layihələr
                    </a> 
                  </li> 
                </ul> 
              </div>
            </div>
          </nav>
        </div> 
        <div class="text-end col-3 col-lg-4">
          <a type="button" class="btn btn-success" href="yenielan"><i class="fas fa-exchange-alt"></i>Qarsilasdir(<span>0</span>)</a>
          <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModaldekstop" onclick="openLoginModal();" href="javascript: showLoginForm();"><i class="fa fa-user" aria-hidden="true"></i>Giriş</a>

          <a type="button" class="btn btn-warning" href="yenielan"><i class="fa fa-plus" aria-hidden="true"></i>Pulsun Elan ver</a>
        </div>

        <div class="modal fade login" id="loginModaldekstop">
          <div class="modal-dialog login animated">
            <div class="modal-content">

              <div class="modal-body">
                <div class="box">
                 <div class="modal-header">
                  <h4 class="">GİRİŞ</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="content">
                  <div class="social">
                    <a id="google_login" class="btn btn-default  circle google" href="#">
                      <i class="fab fa-google"></i> Google ile daxil ol
                    </a>
                    <a id="facebook_login" class="btn btn-default circle facebook" href="#">
                      <i class="fab fa-facebook-square"></i>Facebook ile daxil ol
                    </a>
                  </div> 
                </div>

                <div class="division">
                  <div class="line l"></div>
                  <span>və ya</span>
                  <div class="line r"></div>
                </div> 

                <div class="form loginBox"> 
                  <form action="islem/login.php" accept-charset="UTF-8" method="POST">
                    <input placeholder="E-mail" id="mob_email" class="form-control" type="text" name="user_email">
                    <input placeholder="Şifrə" id="mob_password" class="form-control" type="password" name="user_sifre">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="mob_flexCheckDefault">
                      <label class="form-check-label" for="mob_flexCheckDefault">
                        Yadda saxla
                      </label>
                      <a href="#" title="">Şifrəmi unutdum</a>
                    </div>
                    <button class="btn btn-default btn-login" name="login">Daxil ol</button>
                  </form>
                </div> 
              </div>
              <div class="box">
                <div class="content registerBox" style="display:none;">
                  <div class="form">
                    <form method="POST" html="{:multipart=>true}" data-remote="true" action="islem/qeydiyyat.php" accept-charset="UTF-8">
                      <input placeholder="Ad" id="mob_user_ad" required="" class="form-control" type="text" name="user_ad">
                      <input placeholder="Soyad" id="mob_user_soyad" required="" class="form-control" type="text" name="user_soyad">
                      <input placeholder="E-mail" id="mob_user_email" required="" class="form-control" type="text" name="user_email">
                      <input placeholder="Telfon" id="mob_user_tel" required="" class="form-control" type="text" name="user_tel">
                      <input placeholder="Şifrə" id="mob_sifre_bir" required="" class="form-control" type="password" name="sifre_bir">
                      <input placeholder="Təkrar şıfrə" id="mob_sifre_iki" required="" class="form-control" type="password" name="sifre_iki">
                      <button type="submit" class="btn btn-default btn-register" name="qeydiyyat">Hesab yarat</button>                                                             
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="forgot login-footer">
                <span>Hesabiniz yoxdursa
                  <a href="javascript: showRegisterForm();">Qeydiyyatdan
                  kecin</a>
                </span>
              </div>
              <div class="forgot register-footer" style="display:none">
                <span>Hesabiniz varsa</span>
                <a href="javascript: showLoginForm();" onclick="openLoginModal();">Giris edin</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>      
  </div>  
</div>
</div>
</div>

