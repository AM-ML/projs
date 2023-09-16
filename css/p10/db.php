<?php
	date_default_timezone_set('Asia/Beirut');
	$hr = date("H");
	$min = date('i');
	$sec = date('s');
	$a = date("A");

	$arr = [];
	$arr['hour'] = $hr;
	$arr['minute'] = $min;
	$arr['second'] = $sec;
	$arr['a'] = $a;
	echo json_encode($arr);
?>
