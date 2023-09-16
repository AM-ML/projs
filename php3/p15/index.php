<?php
	include("conn.php");

	$con = mysqli_connect($server, $username, $pwd, $db);
	
	$data = json_decode(file_get_contents("php://input"));
	$id = $data -> id;

	$sql = "SELECT stdFees 
			FROM stds
			WHERE stdID = $id";

	$result = mysqli_query($con, $sql);

	echo json_encode(mysqli_fetch_assoc($result));

?>
