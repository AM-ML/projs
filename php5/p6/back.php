<?php

      $con = mysqli_connect('localhost', 'root', '', 'main');

      $sql = "SELECT * FROM emps ORDER BY empName";

      $result = mysqli_query($con, $sql);

      $a = [];

      while($row = mysqli_fetch_assoc($result))
            array_push($a, $row);


      echo json_encode($a);
?>