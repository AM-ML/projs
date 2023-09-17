<?php include("conn.php");
    $s = 0;

    $data = json_decode(file_get_contents("php://input"));
    $id = $data -> id;

    $sql = "DELETE FROM stds WHERE stdID = $id";


    if(querySQL($con, $sql))
        $s = 1;
    
    echo json_encode($s);
?>