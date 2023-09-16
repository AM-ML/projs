<?php

	$gender = json_decode(file_get_contents("php://input"));

	$data = $gender -> gender == "M" ? "Male" : "Female";

	echo json_encode($data);

?>
