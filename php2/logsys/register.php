<?php
include("head.php");
include("conn.php");
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header("Location: main.php");
    exit(); 
}

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Regular expressions
    $username_regex = '/^[A-Za-z0-9_]{5,18}$/';
    $password_regex = '/^[^\s.]{8,18}$/';

    // Validate username and password
    if (preg_match($username_regex, $username) && preg_match($password_regex, $password)) {
        $sql_check_username = $conn->prepare("SELECT * FROM log WHERE username = ?");
        $sql_check_username->bind_param("s", $username);
        $sql_check_username->execute();
        $result_check_username = $sql_check_username->get_result();

        if ($result_check_username->num_rows === 0) {
            $sql_insert = $conn->prepare("INSERT INTO log (username, password) VALUES (?, ?)");
            $sql_insert->bind_param("ss", $username, $password);
            $sql_insert->execute();

            if ($sql_insert->affected_rows > 0) {
                echo '<script>document.getElementById("loginStatus").className = "login-status correct";</script>';
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                header("Location: main.php");
                exit(); 
            } else {
                $err =  "Registration Failed.";
            }

            $sql_insert->close();
        } else {
            $err = "Username Already Exists!";
        }

        $sql_check_username->close();
    } else {
        $err = "Invalid username or password format.";
    }

    $conn->close();
} else { 
    $username = $password = $err = "";
}
?>
<div class="login-container">
    <h2 style="color:white">Register</h2>
    <form class="login-form" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
        <?php if(!empty($err)){echo "<span class='login-status' id='loginStatus'>$err</span>";} ?>
        <input class="login-input both" type="search" name="username" placeholder="Username" autocomplete="off" value='<?php 
                        echo $username; ?>' autofocus required>
        <input class="login-input both" type="password" name="password" placeholder="Password" required>
        <button class="login-button" type="submit" name="submit">Register</button>
    </form>

    <div class="signup-link" style="display:inline; margin-bottom:20px;">
        <p style="color:white;">Have an account? <a href="page.php" class="signup-link">Sign In</a></p>
    </div>
</div>

<?php include("foot.php"); ?>
