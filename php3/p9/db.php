<?php
	include("conn.php");

	$con = mysqli_connect($server, $username, $pwd, $db);

	$sql = "SELECT * FROM blog ORDER BY blogID";

	$result = mysqli_query($con, $sql);

	$A = [];

	while($row = mysqli_fetch_assoc($result)){
		array_push($A, $row);
	}

	echo json_encode($A);


?>
