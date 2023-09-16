<?php
	include("conn.php");

	$con = mysqli_connect($server, $username, $pwd, $db);
	
	$sql = "SELECT stds.stdID, stdName, COUNT(absence.stdID) as stdAbs FROM stds JOIN absence ON stds.stdID = absence.stdID GROUP BY stds.stdID ORDER BY stdName";

	$result = mysqli_query($con, $sql);

	$A = [];

	while($row = mysqli_fetch_assoc($result)){
		array_push($A, $row);
	}

	echo json_encode($A);


?>
