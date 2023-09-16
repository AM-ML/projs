<?php
	define("TITLE", "P4");
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
		



		
		$n1 = 10;
		$n2 = 5;

		h1("operators");

		p("addition: <br>   $n1 + $n2 = ".($n1 + $n2)
		." |subtraction: <br>                     $n1 - $n2 = ". ($n1 - $n2)
		."  |multiplication: <br>                                             $n1 * $n2 = ". ($n1 * $n2)
		."  |division: <br>                                                              $n1 / $n2 = ". ($n1 / $n2)
		."  |exponentiation: <br>                                                                              $n1 ** $n2 = ". ($n1 ** $n2)
		."  |modulus: <br>                                                                                                      $n1 % $n2 = ". ($n1 % $n2));



		h1("Assignment Operators");

		$x = 10;
		$y = 5;

		p("$x &nbsp;= $y ==> x = $x = $y <br>	
		   $x += $y	==> x = $x + $y	<br>	
		   $x -= $y	==> x = $x - $y	<br>	
		   $x *= $y	==> x = $x * $y	<br>	
		   $x /= $y	==> x = $x / $y	<br>	
		   $x %= $y	==> x = $x % $y	<br>");






		











		










	?>
	</body>
</html>