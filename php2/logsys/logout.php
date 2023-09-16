<?php include("head2.php") ?>

<?php  
	session_start();


	session_destroy();

	
	header("Location: page.php");

?>

<?php include("foot.php") ?>
