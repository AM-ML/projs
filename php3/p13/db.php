<?php
	include("conn.php");

	$con = mysqli_connect($server, $username, $pwd, $db);
	
	$sql = "SELECT stdID, stdName FROM stds ORDER BY stdName";

	$result = mysqli_query($con, $sql);

	$con -> close();
	
	$A = [];

	while($row = mysqli_fetch_assoc($result)){
		array_push($A, $row);
	}

	echo json_encode($A);


?>
