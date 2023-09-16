<?php

	define("TITLE", "P9");

	$multi = array(
		array("name" => "Ali", "job" => "Hit"),
		array("name" => "Mohammed", "job" => "Save"),
		array("name" => "Hamza", "job" => "Smesh")
	);

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
		<?php 
			for ($i = 0; $i < count($multi); $i++) {
			echo "<div class='person'>";
				echo "<small>Name: " . $multi[$i]['name'] . "</small><br>";
				echo "<small>Job: " . $multi[$i]['job'] . ": </small><br><br>";
			echo "</div>";
			};
		?>
	</body>
</html>