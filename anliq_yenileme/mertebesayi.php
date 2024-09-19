<?php
 require_once "../_admin/Ayarlar/ayarlar.php";
$marka_id		=	ReqemlerXaricButunKarakterleriSil($_REQUEST["mertebe"]);
$mertebe=$marka_id+1;

?>


<option value="" disabled="" selected="selected"> Secin...</option>
<?php  
$i=1;
for($i;$i<$mertebe;$i++){?>
	<option value="<?php echo $i;?>"><?php echo $i;?>
</option>
<?php }


?>