<?php
	define("TITLE", "P5");
	function h1($output){echo "<h1>$output</h1>";
		}; function br(){echo "<br>";};
		function p($output) {echo "<p style='margin-left:30px' >$output</p>";};
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
	<?php
		


	
		$a = ["c" => "d", "a" => "b", "d" => "a"];
		$b = ["c", "a", "b"];

		print_r($a);

		h1("ksort() | sort by key ");
		ksort($a);

		print_r($a);

		h1("asort() | sort by value");
		asort($a);

		print_r($a);

		p("krsort() | reverse sort by key");
		p("arsort() | reverse sort by value");


		h1("normal arrays.");

		print_r($b);


		h1("sort() | sort array normally");
		sort($b);

		print_r($b);

		h1("rsort() | reverse sort()");
		rsort($b);

		print_r($b);
















		










	?>
	</body>
</html>