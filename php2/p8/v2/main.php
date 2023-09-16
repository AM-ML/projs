<?php
	define("TITLE", "P8V2");
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
		<form method="get" action="<?php echo $_SERVER['PHP_SELF'] ;	?>">
			<input type="search" autocomplete="off" autofocus class="form-control mb-0" name="subject" placeholder="subject">
		<input type="search" class="form-control mb-0" name="website" autocomplete="off" placeholder="website" value="moumnehschool.com">
			<button type="submit" class="btn btn-sm btn-secondary">■</button>
		</form>
	<?php
	
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$subject = $_GET['subject'];
		$website = $_GET['website'];
	}		

	?>
	<a style="text-align:center;" href="test_get.php?subject=<?php echo $subject; ?>&web=<?php echo $website; ?>">Test $GET</a>
	</body>
</html>