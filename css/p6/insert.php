<?php  

	$status = 0;

	$con = mysqli_connect("localhost", "root", "", "main");

	$data = json_decode(file_get_contents("php://input"));

	$id = $data -> id;
	$payment = $data -> payment;


	date_default_timezone_set('Asia/Beirut');
    $time = date("Y-m-d");

	$sql = "INSERT INTO payment 
			(studentID, payDate, payAmount)
			VALUES ($id, '$time', $payment)
			";


	if(mysqli_query($con, $sql))
		$status = 1;

	echo json_encode($status);
?>