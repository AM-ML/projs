<?php
	define("TITLE", "P10");
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
		

	if($_SERVER["REQUEST_METHOD"] == "POST"){


	$name = $email = $gender = $comment = $website = "";
	$nameErr = $emailErr = $websiteErr = "";
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $name = test_input($_POST["name"]);
	  $email = test_input($_POST["email"]);
	  $website = test_input($_POST["website"]);
	  $comment = test_input($_POST["comment"]);
	  $gender = test_input($_POST["gender"]);
	}

		


	if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
	  $nameErr = "Only letters and white space allowed";
	} if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$emailErr = "Invalid email format";
	} if(!empty($website)){
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
		  $websiteErr = "Invalid URL";
		}
	}

}

















		










	?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?>">


		<span><?php echo $nameErr; ?></span>
		<input type="search" name="name" autofocus autocomplete="off" class="form-control" placeholder="name" required>
		<span><?php echo $emailErr; ?></span>
		<input type="search" name="email" autofocus autocomplete="off" class="form-control" placeholder="email" required >
		<span><?php echo $websiteErr; ?></span>
		<input type="search" name="website" autofocus autocomplete="off" class="form-control" placeholder="website[optional]" >
		<h4>  comment: </h4><br>
		<textarea name="comment" cols="40" rows="4"></textarea>
		<br><br>
		<input type="radio" name="gender" id="male" value="male" required>
		<label for="male">Male</label>
		<input type="radio" name="gender" id="female" value="female">
		<label for="female">Female</label>

		<br><br>
		<button  type="submit" class="btn btn-secondary btn-lg">submit</button>


	</form>
	<a href="view.php">view database</a>
		<?php 
			if (empty($nameErr) && empty($emailErr) && empty($websiteErr)){ 
		p("$name");
		p("$email");
	
		if(!empty($website)){
			p($website);
		} if(!empty($comment)){
			p($comment);
		}
		p($gender);
		$db = new SQLITE3('db.db');

			$query = "CREATE TABLE users (
			    id INTEGER PRIMARY KEY AUTOINCREMENT,
			    name TEXT NOT NULL,
			    email TEXT NOT NULL,
			    website TEXT,
			    comment TEXT,
			    gender TEXT NOT NULL
			)";

			$db -> query($query);

			$query = $db->prepare("INSERT INTO users (name, email, website, comment, gender) VALUES (:name, :email, :website, :comment, :gender)");


			$query->bindValue(':name', $name, SQLITE3_TEXT);
			$query->bindValue(':email', $email, SQLITE3_TEXT);
			$query->bindValue(':website', $website, SQLITE3_TEXT);
			$query->bindValue(':comment', $comment, SQLITE3_TEXT);
			$query->bindValue(':gender', $gender, SQLITE3_TEXT);


			$query->execute();

			$query->close();
	}
		 ?>
	</body>
</html>