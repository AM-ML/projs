<?php require("head.php") ?>

<?php 
	$contents = file("file.txt");
	foreach($contents as $row){
		p($row. "<br>");
	};

	br();

	$file = fopen("file.txt", "r");

	while(!feof($file)){ // checks if eof [end of file] reached, true / false
		p(fgets($file)); // reads one line 
		br();
	}
	fclose($file);
?>

<?php require("foot.php") ?>