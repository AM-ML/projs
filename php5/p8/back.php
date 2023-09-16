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

if (isset($_GET['empID'])) {
    $empID = mysqli_real_escape_string($connection, $_GET['empID']);

    // Fetch student information from the database
    $query = "SELECT * FROM emps WHERE empID = '$empID'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $empData = [
            'empID' => $row['empID'],
            'empName' => $row['empName'],
            'empGender' => $row['empGender'],
            'empSal' => $row['empSal']
        ];

        // Send student data as JSON response
        header('Content-Type: application/json');
        echo json_encode($empData);
    } else {
        echo 'Student not found';
    }
} else {
    echo 'Invalid request';
}

// Close the database connection
mysqli_close($connection);
?>
