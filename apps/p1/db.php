<?php
    include("conn.php");

    $sql = "";
    $r = querySQL($con, $sql);
    $arr = fetchSQL($r);

    echo json_encode($arr);
?>