<?php

    /* {
            "name":     "Ali Abdallah",
            "payment":            "11",
            "fees":                "1",
            "egender":             "M",
            "originalFees":     "90000",
            "originalID":            12,
        } */

        include("conn.php");


        $data = json_decode(file_get_contents("php://input"));
        $id = $data -> originalID;
        $fees = (((int) $data -> originalFees) + ((int) $data -> fees));
        $payment = (int) $data -> payment;
        $name = $data -> name;
        $gender = $data -> egender;


        date_default_timezone_set("Asia/Beirut");
        $time = date("Y-m-d");

        $sql = "UPDATE stds
                SET stdName = '$name',
                stdFees = $fees,
                stdGender = '$gender'
                WHERE stdID = $id";

        $sql2 = "INSERT INTO payment
                 (studentID, payDate, payAmount)
                 VALUES ($id, '$time', '$payment')
                ";

        querySQL($con, $sql);
        querySQL($con, $sql2);

        echo json_encode(true);
?>