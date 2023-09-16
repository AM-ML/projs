<?php

      $con = mysqli_connect('localhost', 'root', '', 'main');

      $sql = "SELECT empID, empName FROM emps ORDER BY empName";

      $a = [];

      $r = mysqli_query($con, $sql);

      while($row = mysqli_fetch_assoc($r))
            array_push($a, $row);

      echo json_encode($a);
?>