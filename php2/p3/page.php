<?php
	define("TITLE", "P3");
	function h1($output){echo "<h1>$output</h1>";
		}; function br(){echo "<br>";};
		function p($output) {echo "<p>$output</p>";};
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
	<?php
		

		

		h1("PI");
		$pi = pi();

		p($pi);

		$arr = [1, 2, 3, 4, 5, 6, -1];
		$min = min($arr);
		$max = max($arr);

		h1("Min - Max");

		foreach($arr as $n){
			echo "$n, ";
		};

		p("min(arr) = $min");
		p("max(arr) = $max");

		$n = -6.75;
		$nabs = abs($n);

		h1("Abs()");

		p("abs($n) --> $nabs");

		h1("sqrt()");

		$n = 64;
		$nsqrt = sqrt($n);

		p("sqrt($n) --> $nsqrt");

		h1("round");

		$n = 0.6;
		$nround = round($n);

		p("round($n) --> $nround");

		$n = 0.4;
		$nround = round($n);

		p("round($n) --> $nround");

		h1("rand()");

		$n1 = 1;
		$n2 = 10;
		$nrand = rand($n1, $n2);

		p("rand($n1, $n2) ==> $nrand (random)");



















	?>
	</body>
</html>