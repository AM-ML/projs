<?php  

	$con = mysqli_connect("localhost", "root", "", "main");

	$data = json_decode(file_get_contents("php://input"));

	$id = $data -> id;

	$sql = "SELECT SUM(payAmount) as pay FROM payment
			WHERE studentID = $id
			GROUP BY studentID
			";

	$result = mysqli_query($con, $sql);

	echo json_encode(mysqli_fetch_assoc($result));
?>