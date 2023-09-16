<?php include("head.php");

	$arr = ['a', 'b', 'c', 'd'];
	print_r($arr);
		br();
	echo json_encode($arr);

		br();
	$asc = ['a' => 'b', 'c' => 5, 'e' => 50];
	print_r($asc);

		br();
	echo json_encode($asc);

/**/ include("foot.php"); ?>