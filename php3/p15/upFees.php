<?php
	include("conn.php");
	
	$stat = 0;

	$con = mysqli_connect($server, $username, $pwd, $db);
	
	$data = json_decode(file_get_contents("php://input"));
	$id = $data -> id;
	$fees = $data -> fees;


	$sql = "
		UPDATE stds
		SET stdFees = $fees
		WHERE stdID = $id
	";

	if(mysqli_query($con, $sql)){
		$stat = 1;
	} 

	echo json_encode($stat);
?>
