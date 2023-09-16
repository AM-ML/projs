<?php

	$conn = mysqli_connect("localhost", "root", "", "main");

	$sql = "SELECT * FROM blog ORDER BY  blogID";

	$result = mysqli_query($conn, $sql);

	$A =[];

	while($row = mysqli_fetch_assoc($result)){
		array_push($A, $row);
	}

	echo json_encode($A);


?>
