<?php  


	$server = "localhost";
	$user = "root";
	$pwd = "";
	$db = "main";

	$con = mysqli_connect($server, $user, $pwd, $db);


	$sql = "SELECT * FROM stds ORDER BY stdName";

	$result = mysqli_query($con, $sql);

	$A = [];

	while($row = mysqli_fetch_assoc($result)){
		array_push($A, $row);
	}

	echo json_encode($A);

?>