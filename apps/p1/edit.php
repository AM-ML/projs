<?php include("conn.php");
    $data = json_decode(file_get_contents("php://input"));
    $id = $data -> id;


    $sql = "SELECT stdName, stdFees, stdGender
            FROM stds 
            WHERE stdID = $id
            ";


   $r = querySQL($con, $sql);

   $row = fetchSQL($r);

   echo json_encode($row);
?> 