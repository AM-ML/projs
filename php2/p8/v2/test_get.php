<html>
<head>
	<title>P8V2</title>
	<style type="text/css">
		.font{
			zoom:2;
			font-family: "Jetbrains Mono";
		}
	</style>
</head>
<body>

<?php
$web = $_GET['web'];
$subject = $_GET['subject'];
$subject = strtoupper($subject);
echo "<p class='font'>Study <b>" . $subject . "</b> at <a href='https://$web'><b>" .  $_GET['web'] ."</b></a></p>";
?>
<a href="main.php">change subject</a>
</body>
</html>
