<?php
include("head2.php");
include("check.php");
include("conn.php");


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = $conn->prepare("SELECT * FROM log WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $username = $row['username'];
        $password = $row['password'];
        $periods = str_repeat(".", strlen($password));

        echo "<table class='table  table-striped text-center' style='margin-top:15px;table-layout: fixed;'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$id</td>
                        <td>$username</td>
                        <td><button onclick='showpass(this)' class='btn btn-unstyled pass'>$periods</button></td>
                    </tr>
                </tbody>
            </table>";
    }
} else {
    echo "You are not logged in.";
}

$conn->close();
ahref("index.php", "Tic Tac Toe");
ahref("logout.php", "Logout");
ahref("delete.php", "Delete Account");
include("foot.php");
?>

<script>
    function showpass(button) {
        var password = "<?php echo htmlspecialchars($password); ?>";
        var periods = "<?php echo htmlspecialchars($periods); ?>";

        if (button.innerHTML === password) {
            button.innerHTML = periods;
        } else {
            button.innerHTML = password;
        }
    }
</script>
