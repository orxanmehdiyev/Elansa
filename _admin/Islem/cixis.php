<?php
session_start(); ob_start();
unset($_SESSION['admistis_mail']);
session_destroy();
header("Location:../login");
exit();
?>