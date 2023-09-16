<?php
	define("TITLE", "P9");
	function h1($output){echo "<h1>$output</h1>";
		}; function br(){echo "<br>";};
		function p($output) {echo "<p style='margin-left:30px' >$output</p>";};
?>
<!DOCTYPE HTML>
<html lang="en">
	<head> 


		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<title><?php echo TITLE; ?></title>
		<link rel="stylesheet" href="design.css">
	</head>
	<body>
	<?php
		

	h1("regex | regular expressions");

	$pattern = "/moumnehschool/i"; // /xxxx/i where xxxx is the pattern and i 
	// makes it case insensitive

	$string = "mOuMnehschooLMoumnehschool";

	p("string: $string");


	p("pattern: $pattern");


	// returns 1 if found returns 0 if not
	
	p("preg_match(pattern, string) --> " . preg_match($pattern, $string)); 


	// returns 1 and adds more if found more
	
	p("preg_match_all(pattern, string) --> " .preg_match_all($pattern, $string)); 


	// returns the new replaced string
	
	p("preg_replace(pattern, 'alischool', string) --> " .preg_replace($pattern, "alischool", $string)); 


	// unchanged
	
	p("string (unchanged): ". $string); 



	h1("example 2");

	$string = "Visit Microsoft";

	$pattern = "/microsoft/i";

	p("string: $string");

	p("pattern; $pattern");

	
	p("preg_replace(pattern, 'moumnehschool', string) --> " . preg_replace($pattern, 'moumnehschool', $string));

		


















		










	?>
	</body>
</html>