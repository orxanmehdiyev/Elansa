<?php 
session_start(); ob_start();
if(!isset($_SESSION["admistis_mail"])){
	header("Location:login");
	exit;
}else{
	header("Location:ana_seyfe");
}

?>
