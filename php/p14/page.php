<?php

	define("TITLE", "P14");

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
		<?php 
			$n = 0;
			do{
				echo "did this ".($n+1)." times.<br>";
				$n++;
			} while($n < 10);
		?>
	</body>
</html>