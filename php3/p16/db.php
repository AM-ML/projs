<?php
    $stat = 0;

    $data = json_decode(file_get_contents("php://input"));
    $id = rand(111111, 999999);
    $name = $data->name;
    $gender = $data->gender;
    $fees = $data->fees;

    include("conn.php");

    $con = mysqli_connect($server, $username, $pwd, $db);

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO stds (stdID, stdName, stdGender, stdFees) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dssd", $id, $name, $gender, $fees); // Assuming stdID and stdFees are numeric, and others are strings

    date_default_timezone_set('Asia/Beirut');
    $time = date("Y-m-d");
    $sql = "INSERT INTO payment (studentID, payDate, payAmount) VALUES ($id, '$time', 0)";

    if ($stmt->execute() && mysqli_query($con, $sql)) {
        $stat = 1;
    }

    echo json_encode($stat);

    $stmt->close();
    $con->close();
?>
