<?php include("conn.php");

    $a["msg"] = "";
    $a["stat"] = 0;

    $data = json_decode(file_get_contents("php://input"));
    $id = rand(11111111, 99999999);
    $name = $data -> name;
    $fees = $data -> fees;
    $gender = $data -> gender;

    $sql = "INSERT INTO stds (stdID, stdName, stdGender, stdFees, stdLeave) VALUES ($id, '$name', '$gender', $fees, 0)";

    date_default_timezone_set("Asia/Beirut");

    $time = date("Y-m-d");

    $sql2 = "INSERT INTO payment (studentID, payDate, payAmount) VALUES ($id, '$time', 0)";

    if(mysqli_query($con, $sql) && mysqli_query($con, $sql2)){
        $a["stat"] = 1;
    }

    else {
        $a["msg"] = "Could Not Insert Student";
    }

    echo json_encode($a)
?>