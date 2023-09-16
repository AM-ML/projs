<?php

	define("TITLE", "P13");
	$ns = [1, 2, 3, 4, 5];
	foreach ($ns as $n) { // array as item ?? confusing i know
		echo "today it is $n degrees<br>";
	}

	$ppl = [
		["name" => "abdallah"],
		["name" => "mhammad"],
		["name" => "hamza"]
	];

	foreach($ppl as $person){
		echo $person["name"] . "<br>";
	};

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>

	</body>
</html>