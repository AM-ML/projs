<?php

      $con = mysqli_connect('localhost', 'root', '', 'main');

      $sql = "SELECT stdID, stdName, stdFees FROM stds ORDER BY stdName";

      $a = [];
      

      $r = mysqli_query($con, $sql);

      while($row = mysqli_fetch_assoc($r)){
            $row['stdName'] = ucwords($row['stdName']);
            array_push($a, $row);
      }

      echo json_encode($a);
?>