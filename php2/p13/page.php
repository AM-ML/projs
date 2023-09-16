<?php include("head.php") ?>

<?php 

	$f = fopen("f.txt", "w") or die("no file");

	fwrite($f, "AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language
	");

	fclose($f);

	$f = fopen("f.txt", "a") or die("no file");

	fwrite($f, "WSL = Windows Subsystem for Linux
		");

	fclose($f);

	$f = fopen("f.txt", "r") or die("no file");

	while (!feof($f)) {
		echo (fgets($f));
		br();
	}
	
	fclose($f);
?>

<?php include("foot.php") ?>
