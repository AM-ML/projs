<?php
	include("conn.php");

	$data = json_decode(file_get_contents("php://input"));

	$is_checked = $data -> is_checked;

	$con = mysqli_connect($server, $username, $pwd, $db);
	
	if ($is_checked == true){
		$sql = "
			SELECT stdName FROM stds
			WHERE stdLeave = 1
			ORDER BY stdName
		";
	} else {
		$sql = "
			SELECT stdName FROM stds
			WHERE stdLeave = 0
			ORDER BY stdName
		";
	}

	$result = mysqli_query($con, $sql);

	$A = [];

	while($row = mysqli_fetch_assoc($result)){
		array_push($A, $row);
	}

	echo json_encode($A);


?>
