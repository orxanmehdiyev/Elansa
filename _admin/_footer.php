<footer></footer>
<!-- sidebar menu -->
<script src="vendors/js/jquery.js"></script>
<script src="vendors/js/menu_script.js"></script>
<script src="vendors/js/script.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".clickable-row").click(function() {
			window.location = $(this).data("href");
		});
	});
</script>
</body>
</html>
<?php 
ob_end_flush();
$db=null;
?>
