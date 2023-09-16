<?php 
	
	$logged_in = false;
	$integ = 240;
	$str = "wael";
	$float = 240.50;
	$nothing = NULL;
	$arr = [1, 2, 3];
	print_r($arr);
	echo '<br>';
	print_r($arr[0]);
	echo '<br>';

	$file = fopen("t.txt", "r");

	if ($file) {

		$content = fread($file, filesize("t.txt"));
		fclose($file);
		echo $content;
	}
?>