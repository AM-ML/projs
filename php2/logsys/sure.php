<?php include("head.php") ?>
<?php include("conn.php") ?>
<?php include("check.php") ?>
<meta http-equiv="refresh" content="4;url=main.php">
<?php  
	$sql = $conn -> prepare("DELETE FROM log WHERE username = ?");
	$sql -> bind_param("s", $_SESSION['username']);

	$sql -> execute();

	$sql = $conn -> prepare("SELECT * FROM log where username = ?");
	$sql -> bind_param("s", $_SESSION['username']);

	$sql -> execute();

	$result = $sql -> get_result();

	if ($result->num_rows == 0) {
		echo "<h1 style='color:#fff;'>Account deleted successfully!</h1>";
	} else{
		h1("Account was not deleted due to an unkown error.");
	}
	session_destroy();

	exit();

?>

<?php include("foot.php") ?>
