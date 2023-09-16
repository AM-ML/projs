<?php 
      $stat = 0;

      include("conn.php");

      $data = json_decode(file_get_contents('php://input'));
      $id = $data -> id;
      $title = $data -> title;

      $sql = "UPDATE blog 
              SET blogTitle = '$title'
              WHERE blogID = $id";

      if(mysqli_query($con, $sql))
            $stat = 1;

      echo json_encode($stat);
?>