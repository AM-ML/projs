<?php

	define("TITLE", "P15");

	function sqr($n){
		return $n * $n;
	}

	 sleep(0.1);

	 $arr = [3, 2, 1];

     foreach($arr as $n){
	 	echo $n;
	 };
	 
	 sort($arr);
	 echo "<br>";

	 foreach($arr as $n){
	 	echo $n;
	 };

	 rsort($arr);
	 echo "<br>";

	 foreach($arr as $n){
	 	echo $n;
	 };

	 $name = "STRING";
	 echo "<br>".$name;
	 $name = strtolower($name);
	 echo "<br>".$name;
	 $name = strtoupper($name);
	 echo "<br>".$name;

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
		<?php 
			$sqr5 = sqr(5);
			echo "<h1>sqr of 5 is: $sqr5</h1>";
		?>
	</body>
</html>