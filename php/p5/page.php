<?php

	define("TITLE", "Dynamic");

	$name = "Ali Moumneh";
	$hobby = "praying";
	$birth = 2009;

	date_default_timezone_set('Asia/Beirut'); //can use UTC for default

	$year = date('Y');
	$month = date('F');
	$day = date('jS');
	$age = $year - $birth;

	$fulldate = date('l jS \of F Y h:i:s A')

   /* d: day (23) 				 *
	* l: week day(monday)        *
	* jS: day+end(23rd) 		 *
	* F: full month name(August) *
	* Y: year(2023) 			 *
	* h: 12-hr format(01)		 *
	* i: minute (55) 			 *
	* s: second(31) 			 *
	* A: day/night(PM/AM)		 */


?>

<!DOCTYPE html>
<html>
<head>
	<link href='design.css' rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo TITLE; ?></title>
</head>
<body>

	<div class="container">
		<h1 class="header" id="name">Name: <?php echo $name; ?></h1>
		<p class="info" id="age">Reached the Age of: <b class='b'><?php echo $age; ?></b></p>
		<p class="info" id="job">Has a job which is: <b class='b'><?php echo $hobby; ?></b></p>
		<p class="info" id="date"><b class='b'><?php echo $fulldate; ?></b></p>
	</div>
</body>
</html>