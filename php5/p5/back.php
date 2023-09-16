<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'main';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_GET['stdID'])) {
    $stdID = mysqli_real_escape_string($connection, $_GET['stdID']);

    // Fetch student information from the database
    $query = "SELECT * FROM stds WHERE stdID = '$stdID'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentData = [
            'stdID' => $row['stdID'],
            'stdName' => $row['stdName'],
            'stdGender' => $row['stdGender'],
            'stdFees' => $row['stdFees'],
            'stdLeave' => $row['stdLeave']
        ];

        // Send student data as JSON response
        header('Content-Type: application/json');
        echo json_encode($studentData);
    } else {
        echo 'Student not found';
    }
} else {
    echo 'Invalid request';
}

// Close the database connection
mysqli_close($connection);
?>
