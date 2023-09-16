<?php
	define("TITLE", "P8");
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
		

	<form method="get" action="<?php echo $_SERVER['PHP_SELF'] ;	?>">

		<input type="search" autocomplete="off" autofocus class="form-control mb-0" name="fname" placeholder="name">
		<input type="search" class="form-control mb-0" name="email" autocomplete="off" placeholder="email">
		<button type="submit" class="btn btn-sm btn-info">press</button>

	</form>


	<?php

		if($_SERVER['REQUEST_METHOD'] == "GET"){
			$name = $_GET['fname'];
			$email = $_REQUEST['email'];

			if(empty($name) || empty($email)){
				h1("empty.");
			} else {
				h1("hello, $name");
			
			$db = new SQLITE3('db.db');

			$query = "CREATE TABLE users (
			    id INTEGER PRIMARY KEY AUTOINCREMENT,
			    name TEXT NOT NULL,
			    email TEXT NOT NULL
			)";

			$db -> query($query);

			$query = $db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");


			$query->bindValue(':name', $name, SQLITE3_TEXT);
			$query->bindValue(':email', $email, SQLITE3_TEXT);


			$query->execute();

			$query->close();
			}
		}


















		










	?>
	</body>
</html>