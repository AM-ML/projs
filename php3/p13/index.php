<?php
	include("conn.php");


	$status = 0;


	$con = mysqli_connect($server, $username, $pwd, $db);

	$data = json_decode(file_get_contents("php://input"));
	$id = $data -> id;



	$sql = "DELETE FROM stds WHERE stdID = $id";


	if(mysqli_query($con, $sql)){
		$status = 1;
	}

	$con -> close();


	echo json_encode($status);
	
	exit();
?>
