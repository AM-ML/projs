<?php

	define("TITLE", "P1");

	$string = "Hello, world";
	$length = strlen($string);
	$words = str_word_count($string);
	$reverse = strrev($string);
	$found = strpos($string, "w");
	$replacement = str_replace("world", " murd", $string);
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
		<h1><?php
				echo "$string: $length<br>$string: $words words<br>"; 
				echo "$string: $reverse<br>"; 
				echo "$string: W[$found]<br>";
				echo "$string: $replacement";
			?>
		<h1>
	</body>
</html>