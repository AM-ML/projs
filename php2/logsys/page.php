<?php include("head.php");
      include("conn.php");
	  session_start();
	  if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		header("Location: main.php");
	    exit(); 
	}
?>
<?php if(isset($_POST['submit'])) {
// login submit --> return 'username', 'password', 'submit'

	$username = $_POST['username'];
	$password = $_POST['password'];


	$sql = $conn -> prepare("SELECT * FROM log WHERE username = ? AND password = ?");
	$sql -> bind_param("ss", $username, $password);


	$sql->execute();
	$result = $sql->get_result();

	if ($result->num_rows == 1) {
	    echo '<script>document.getElementById("loginStatus").className = "login-status correct";</script>';
	    $_SESSION['username'] = $username;
	    $_SESSION['password'] = $password;

	    if($_SESSION['username'] == "AdminStaff" && $_SESSION['password'] == "solarengine2009"){
	    	header("Location: admin.php");
	    	exit();
	    }else {
		    header("Location: main.php");
		    exit();
	    } 

	    $err =  "Correct Credentials!";
	} else {
	    echo '<script>document.getElementById("loginStatus").className = "login-status incorrect";</script>';
	    $err =  "Incorrect credentials.";
	}



	$sql->close();
	$conn->close();
} else{ 
	$username = $password = $err = "";
}?>
<div class="login-container">
    <h2 style="color:white;">Login</h2>
    <form class="login-form" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
        <?php if(!empty($err)){echo "<span class='login-status' id='loginStatus'>$err</span>";} ?>
        <input class="login-input both" type="search" name="username" placeholder="Username" autocomplete="off" value='<?php 
                        echo $username; ?>'
         autofocus required>
        <input class="login-input both" type="password" name="password" placeholder="Password" required>
        <button class="login-button" type="submit" name="submit">Log In</button>
    </form>

    <div class="signup-link" style="display:inline; margin-bottom:20px;">
        <p style="color:white;">Don't have an account? <a href="register.php" class="signup-link">Sign Up</a></p>
    </div>
</div>


<?php include("foot.php") ?>
