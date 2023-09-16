<?php  


	$con = mysqli_connect("localhost", "root", "", "main");

	$sql = "SELECT stdID, stdName, stdGender, 
			stdFees, SUM(payAmount) AS stdPay
			FROM stds 
			JOIN payment ON
			stds.stdID = payment.studentID
			GROUP BY stdID 
			ORDER BY stdName";

	$result = mysqli_query($con, $sql);

	$A = [];

	while($row = mysqli_fetch_assoc($result))
		array_push($A, $row);

	echo json_encode($A);
?>