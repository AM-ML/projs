<?php

      $msg = 'Operation Unsuccessful';

      $data = json_decode(file_get_contents('php://input'));
      $id = rand(11111111, 99999999);
      $name = $data -> stdName;
      $fees = $data -> stdFees;
      $gender = $data -> stdGender ;

      $con = mysqli_connect('localhost', 'root', '', 'main');
      $sql = "INSERT INTO stds (stdID, stdName, stdGender, stdFees)
              VALUES ($id, '$name', '$gender', $fees)";

      date_default_timezone_set('Asia/Beirut');
      $time = date('Y-m-d');

      $sql2 = "INSERT INTO payment (studentID, payDate, payAmount)
               VALUES ($id, '$time', 0)";

      if(mysqli_query($con, $sql) && mysqli_query($con, $sql2)){
            $msg = "Operation Successful, inserted $id, $name, $fees, $gender ";
      }
      $arr = [];
      $arr['msg'] = $msg;
      $arr['id'] = $id;

      echo json_encode($arr);

?>