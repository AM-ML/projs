<?php include("head2.php") ?>
<?php include("conn.php") ?>
<?php include("check.php") ?>
<?php  
	if($_SESSION['username'] != "AdminStaff" || $_SESSION['password'] != "solarengine2009"){
		session_destroy();
		header("Location: page.php");
		exit();
	}

	$query = "SELECT * FROM log";
	$result = mysqli_query($conn, $query);

	echo '<table class="table rounded ctable table-bordered border-secondary table-striped " style="margin-top:15px;table-layout: fixed;">';
	echo '<thead><tr><th>ID</th><th>Username</th><th>Password</th></tr></thead>';
	echo '<tbody>';
	while ($row = mysqli_fetch_assoc($result)) {
		$password = $row['password'];
		$periods = str_repeat(".", strlen($password));
		echo '<tr><td>' . $row['id'] . '</td><td>' . $row['username'] . '</td><td>' . "<button onclick='showpass(this, \"" . htmlspecialchars($password) . "\", \"$periods\")' class='btn btn-unstyled pass'>$periods</button>" .  '</tr>';
	}
	echo '</tbody></table>';
	


?>
<script>
    function showpass(button, password, periods) {
    if (button.innerHTML === password) {
        button.innerHTML = periods;
    } else {
        button.innerHTML = password;
    }
}
</script>
<?php include("foot.php") ?>
