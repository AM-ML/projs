<?php
    include("conn.php");

    $sql = "SELECT stdID, stdName, stdGender, SUM(payAmount) AS stdPay, stdFees FROM stds JOIN payment ON stds.stdID = payment.studentID GROUP BY stdID ORDER BY stdName";
    $r = querySQL($con, $sql);
    $arr = fetchSQL($r);

    echo json_encode($arr);
?>