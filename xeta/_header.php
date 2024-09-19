<?php 
session_start(); ob_start();
require_once "../_admin/Ayarlar/ayarlar.php";

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="../assets/ico/fav.png">
  <link rel="apple-touch-icon" sizes="57x57" href="../assets/ico/fav">
  <link rel="apple-touch-icon" sizes="60x60" href="../assets/ico/fav">
  <link rel="apple-touch-icon" sizes="72x72" href="../assets/ico/fav">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/ico/fav">
  <link rel="apple-touch-icon" sizes="114x114" href="../assets/ico/fav">
  <link rel="apple-touch-icon" sizes="120x120" href="../assets/ico/fav">
  <link rel="apple-touch-icon" sizes="144x144" href="../assets/ico/fav">
  <link rel="apple-touch-icon" sizes="152x152" href="../assets/ico/fav">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/ico/fav">
  <link rel="icon" type="image/png" href="../assets/ico/fav" sizes="32x32">
  <link rel="icon" type="image/png" href="../assets/ico/fav" sizes="194x194">
  <link rel="icon" type="image/png" href="../assets/ico/fav" sizes="96x96">
  <link rel="icon" type="image/png" href="../assets/ico/fav" sizes="192x192">
  <link rel="icon" type="image/png" href="../assets/ico/fav" sizes="16x16">
  <link rel="manifest" href="../assets/ico/fav">
  <link rel="shortcut icon" href="../assets/ico/fav">
  <title>Elansa</title>
  <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/fontawesome 5.15.1/css/all.css" rel="stylesheet" />
  <link href="../assets/fontawesome 5.15.1/css/fontawesome.min.css" rel="stylesheet" />
  <link href="../assets/css/elan-hurriyet.css" rel="stylesheet">
  <link href="../assets/css/ribbon.css" rel="stylesheet">
  <link href="../assets/css/login-register.css" rel="stylesheet" />
  <script src="../assets/fontawesome 5.15.1/js/fontawesome.min.js" type="text/javascript"></script>
  <script src="../assets/js/login-register.js" type="text/javascript"></script>
</head>

<body>
  <div id="wrapper" class="head-hur">
    <div class="header">
      <div class="in-page-nav">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="../"><img src="../images/logo.png" title="Elansa"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="float-right">
                <ul>
                  <li>
                    <a class="btn btn-default big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Hesabim</a>
                  </li>
                  <li>
                    <a class="btn btn-default" href="#" title="">Pulsuz elan ver</a>
                  </li>
                  <div class="modal fade login" id="loginModal">
                    <div class="modal-dialog login animated">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="">İSTİFADƏÇİ GİRİŞİ</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="box">
                            <div class="form loginBox">
                              <form method="" action="" accept-charset="UTF-8">
                                <label>Login</label>
                                <input id="email" class="form-control" type="text" name="email">
                                <label>Parol</label>
                                <input id="password" class="form-control" type="password" name="password">
                                <input class="btn btn-default btn-login" type="button" value="Daxil ol" onclick="loginAjax()">
                              </form>
                            </div>
                            <div class="division">
                              <div class="line l"></div>
                              <span>or</span>
                              <div class="line r"></div>
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
                              <div class="error"></div>
                            </div>
                          </div>
                          <div class="box">
                            <div class="content registerBox" style="display:none;">
                              <div class="form">
                                <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                  <label>Ad</label>
                                  <input id="ad" class="form-control" type="text" name="ad">
                                  <label>Soyad</label>
                                  <input id="soyad" class="form-control" type="text" name="soyad">
                                  <label>E-mail</label>
                                  <input id="email" class="form-control" type="text" name="email">
                                  <label>Parol</label>
                                  <input id="password" class="form-control" type="password" name="password">
                                  <label>Təkrar parol</label>
                                  <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
                                  <input class="btn btn-default btn-register" type="button" value="Hesab yarat" name="commit">
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
            </div>
          </nav>
        </div>
      </div>

    </div>