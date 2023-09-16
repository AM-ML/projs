<?php
	define("TITLE", "P11");
	function h1($output){echo "<h1>$output</h1>";
		}; function br(){echo "<br>";};
		function p($output) {echo "<p style='margin-left:30px' >$output</p>";};
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
	<?php
		date_default_timezone_set('Asia/Beirut');	
		h1("today is: " . date("M jS - Y"));
		h1("today is: " . date("l"));
		h1("The time is " . date("h:i:sa"));
		$d=strtotime("10:30pm April 15 2014");
		h1("10:30pm April 15 2014 --> strtotime() ↓");
		h1("Created date is " . date("Y-m-d h:i:sa", $d));


		
















		










	?>

	<footer>
	<span>AM&copy; 2020 - <?php echo date('Y'); ?></span>
	</footer>

	</body>
</html>