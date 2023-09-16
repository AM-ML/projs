<?php session_start(); ?>
<?php include("head.php") ?>



<?php  


	print_r($_SESSION);

	session_destroy();
?>



<?php include("foot.php") ?>
