<?php

      $data = json_decode(file_get_contents('php://input'));
      $name = $data -> name;
      $sal = $data -> sal;    
      $gender = $data -> gender;
      $id = rand(1111111, 99999999);

      $msg = 'Insertion unsuccessful';

      $a = [];

      $con = mysqli_connect('localhost', 'root', '', 'main');

      $sql = "INSERT INTO emps (empID, empName, empGender, empSal)
              VALUES ($id, '$name', '$gender', $sal)";

      if(mysqli_query($con, $sql))
            $msg = "Insertion Successfull: $id, $name, $gender, $sal";


      $a['msg'] = $msg;
      $a['id'] = $id;

      echo json_encode($a);
?>