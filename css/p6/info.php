<?php  

	$con = mysqli_connect("localhost", "root", "", "main");

	$data = json_decode(file_get_contents("php://input"));
	$id = $data -> id;

	$sql = "SELECT stdID, stdName, stdGender, stdFees
			FROM stds WHERE stdID = $id";

	echo json_encode(mysqli_fetch_assoc(mysqli_query($con, $sql)));

?>
