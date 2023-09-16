<?php 
      $msg = "Insertion was Unsuccessful";

      $con = mysqli_connect("localhost", "root", "", "main");

      $data = json_decode(file_get_contents('php://input'));

      $id = rand(11111111, 99999999);
      $name = $data -> name;
      $fees = $data -> fees;
      $gender = $data -> gender;

      $sql = "INSERT INTO stds
              (stdID, stdName, stdGender, stdFees)
              VALUES ($id, '$name', '$gender', $fees)
             ";

      date_default_timezone_set('Asia/Beirut');

      $date = date('Y-m-d');

      $mysql = "INSERT INTO payment (studentID, payDate, payAmount) VALUES ($id, '$date', 0)";

      if(mysqli_query($con, $sql) && mysqli_query($con, $mysql))
            $msg = "Insertion Successful";

      echo json_encode($msg);
?>