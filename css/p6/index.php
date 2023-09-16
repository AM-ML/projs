<?php
    $status = 0;
    
    $con = mysqli_connect("localhost", "root", "", "main");
    
    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Get JSON data from the request
    $data = json_decode(file_get_contents("php://input"));
    
    // Generate a random ID
    $id = rand(11111111, 99999999);
    $name = $data->name;
    $gender = $data->gender;
    $fees = $data->fees;
    
    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO stds
    					 (stdID, stdName, stdGender, stdFees)
    					 VALUES (?, ?, ?, ?)
    					 ");
    $stmt->bind_param("issi", $id, $name, $gender, $fees);
    
    date_default_timezone_set('Asia/Beirut');
    $time = date('Y-m-d');

    $sql = "INSERT INTO payment (studentID, payDate, payAmount) VALUES ($id, '$time', 0)";

    if ($stmt->execute()) {
        $status = 1;
    }

    $status = 0;

    if(mysqli_query($con, $sql))
        $status = 1;
    // Close the prepared statement and database connection
    $stmt->close();
    $con->close();
    


    echo json_encode($status);
    
    exit();
?>
