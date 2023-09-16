<?php

	define("TITLE", "P7");

	$arr = array("HandleBar", "Salvador Dali", "Fu Manchu", "Dormevo", "Endomall", "Furmus");

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link href="design.css" rel="stylesheet">
	</head>
	<body style="text-align:center;">
	<?php

		for ($i=0; $i < count($arr); $i++) { 
			echo "<p class='list'>$arr[$i]</p>";
			if (($i+1) % 3 == 0) {
				echo '<br>';
			}
		}
	?>
	</body>
</html>