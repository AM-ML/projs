<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="design.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>p2</title>
</head>
<body>









<?php 
	function br(){
		echo "<br>";
	}; function h1($output){
		echo "<h1>$output</h1>";
	}; function p($output){
		echo "<p>$output</p>";
	};

	$i = 24;

	h1("Integers");
	echo "int: " . PHP_INT_SIZE . " bytes<br>";
	echo "max int number: ". PHP_INT_MAX. "<br>";
	echo "min int number: ". PHP_INT_MIN. "<br>";

	// is_int() func returns 1 = True / 0 = False
	var_dump(is_int($i));
	br();
	// both are aliases of is_int() func
	var_dump(is_integer($i));
	br();
	var_dump(is_long($i));
	br();
	
	h1("Floats");
	$f = 46.93;
	p("smallest registered positive number: ".PHP_FLOAT_EPSILON);
	p("max: ". PHP_FLOAT_MAX);
	p("min". PHP_FLOAT_MIN);
	p("percision: ". PHP_FLOAT_DIG . " digits");

	var_dump(is_float($f));
	br();
	var_dump(is_double($f));

	h1("Infinity");

	p("anything greater than the PHP_FLOAT_MAX number is considered infinite and anything less is considered finite");

	p("but if the number reaches impossible mathmatical ranges like int = 'string' will become NaN (not a number)");

	$inf = 1.7976931348623E+309;
	$fin = 1.7976931348623E+307;
	var_dump(is_infinite($inf)); br();
	var_dump(is_finite($fin));

	$x = acos(8); br();

	var_dump(is_nan($x)); br();
	var_dump("acos(8) --> ". $x); 


	h1("casting");
	p("convert '2.542' --> 2.542");

	$s = "2.542";

	$f = (float)$s;
	p("string = (float)string;");
	p(var_dump($s).var_dump(number_format((float)$f, 3)));

?>








</body>
</html>