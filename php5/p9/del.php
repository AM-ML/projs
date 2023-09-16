<?php
      $a = "Couldn't Delete Employee";

      $con = mysqli_connect('localhost', 'root', '', 'main');

      $data = json_decode(file_get_contents('php://input'));

      $id = $data -> id;

      $sql = "DELETE FROM emps WHERE empID = $id";

      if(mysqli_query($con, $sql))
            $a = "Deleted Employee";

      echo json_encode($a);
?>