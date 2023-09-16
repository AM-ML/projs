<?php

	define("TITLE", "P8");

	$person = [ "name" => "Mario",
    		 	"age" => 30,
    			"job" => "Developer" ];


?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylsheet" href="design.css">
	</head>
	<body>
		<h1>name: <?php echo $person["name"] ?></h1>
		<h1>age: <?php echo $person["age"] ?></h1>
		<h1>job: <?php echo $person["job"] ?></h1>
	</body>
</html>