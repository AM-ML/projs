<?php 

	$data = json_decode(file_get_contents("php://input"));

	$rev = strrev($data -> txt);

	echo json_encode($rev);

?>