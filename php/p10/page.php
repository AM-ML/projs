<?php

	define("TITLE", "P10");

	

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
		<h1>
		<?php 
			$a = 1;
			$b = 1.0;

			if ($a < $b) {
				echo "$b is greater than $a";
			} else if ($a != $b){
				echo "$a is greater than $b";
			} else if ($a === $b){
				echo "$a is equivalent to $b & with the same data type";
			} else {
				echo "$a is equivalent to $b";
			}
		?>
		</h1>
	</body>
</html>