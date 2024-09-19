 <?php 
 ini_set("max_execution_time", 86400);
 date_default_timezone_set("Europe/Istanbul");
 header("Content-Type:text/html; charset=UTF-8");
try {
		$db=new PDO("mysql:host=localhost;dbname=elansa;charset=utf8",'root','13041987');

}
catch (PDOExpception $e) {
	echo $e->getMessage();
}
 ?>