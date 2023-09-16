<?php

	$stat = 0;


	$data = json_decode(file_get_contents("php://input"));

	$id = $data -> id;
	$pay = $data -> pay;
	
	include("conn.php");

	$con = mysqli_connect($server, $username, $pwd, $db);

	date_default_timezone_set('Asia/Beirut');
    $time = date("Y-m-d");

	$sql = "INSERT INTO payment 
		    (studentID, payDate, payAmount)
		    VALUES ($id,'$time' , $pay)";
	
	if(mysqli_query($con, $sql))
		$stat = 1;
	echo json_encode($stat);
?>