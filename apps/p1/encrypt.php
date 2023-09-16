<?php include("conn.php");

    $a = [];
    $a["msg "] = "";
    $a["stat"] = 0;


    $data = json_decode(file_get_contents("php://input"));
    $username = $data -> username;
    $password = $data -> password;

    
    $sql = "SELECT * FROM tblUsers WHERE username = '$username'";
    $r = querySQL($con, $sql);
    if(mysqli_num_rows($r) > 0){
        $a["msg"] = "Username already taken";
    }else {
        $encryptionKey = openssl_random_pseudo_bytes(16);
        $encryptedPassword = openssl_encrypt($password, 'aes-128-cbc', $encryptionKey, 0, $encryptionKey);

        $sql = "INSERT INTO tblUsers (username, encryptionKey, encryptedPassword) VALUES ('$username', '$encryptionKey', '$encryptedPassword')";

        $r = querySQL($con, $sql);

        if($r){
            $a["stat"] = 1;
        }
    }



    echo json_encode($a)

?>