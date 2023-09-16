<?php
      include("conn.php");

      $sql = "SELECT * FROM blog
              ORDER BY blogID";

      $result = mysqli_query($con, $sql);

      while($row = mysqli_fetch_assoc($result))
            array_push($A, $row);

      echo json_encode($A);
?>