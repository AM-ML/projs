<?php  
	
	$con = mysqli_connect("localhost", "root", "", "main");

	$sql = "SELECT stdID, stdName FROM stds ORDER BY stdName";

	$result = mysqli_query($con, $sql);

	$A = [];


	while($row = mysqli_fetch_assoc($result))
		array_push($A, $row);

	echo json_encode($A);

?>