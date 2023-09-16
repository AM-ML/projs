<?php
	define("TITLE", "P10");
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

		<form method="post" action="welc.php">


			<input type="search" name="name" autofocus autocomplete="off" class="form-control" placeholder="name">
			<input type="search" name="email" autofocus autocomplete="off" class="form-control" placeholder="email">
			<button type="submit" class="btn btn-secondary btn-sm">submit</button>


		</form>

	<?php
		



		


















		










	?>
	</body>
</html>