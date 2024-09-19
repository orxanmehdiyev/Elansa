<?php
session_start(); ob_start();
unset($_SESSION['istifadeci']);
session_destroy();
header("Location:../");
exit();
?>