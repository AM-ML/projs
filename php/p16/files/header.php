<?php

	define("TITLE", "P16 Final Project");
	$companyName = "Nooh's Fine Dining";
	include("files/arrays.php");	

?>
<!DOCTYPE HTML>

<html lang="en">
	<head>
		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body id="final-example">
		<div class="wrapper">
			<div id="banner">
				<a href="/" title="Return To Home">
					<img src="img/banner.png" alt="Nooh's Fine Dining">
				</a>
			</div> <!-- banner  -->
			<div id="nav">
				<?php include("files/nav.php"); ?>
			</div> <!-- nav -->
			<div class="content">