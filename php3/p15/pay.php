<?php
	include("conn.php");
	$data = json_decode(file_get_contents("php://input"));
	$id = $data -> id;

	$conn = mysqli_connect($server, $username, $pwd, $db);


	$sql = "SELECT SUM(payAmount) AS pay 
			FROM payment 
			WHERE studentID = $id 
			GROUP BY studentID
			";

	$result = mysqli_query($conn, $sql);

	$A = [];

	while($row = mysqli_fetch_assoc($result)){
		array_push($A, $row);
	}

	echo json_encode($A[0]);
?>
