<?php
	function querySQL($con, $sql){
		return mysqli_query($con, $sql);
	}; function fetchSQL($r){
		$a = [];
		while($row = mysqli_fetch_assoc($r)){
			array_push($a, $row);
		};

		return $a;
	};


	$con = mysqli_connect("localhost", "root", "", "main");

?>
