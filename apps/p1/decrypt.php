<?php include("conn.php");
    $a = [];
    $a["msg"] = "";
    $a["stat"] = 0;

    $data = json_decode(file_get_contents("php://input"));
    $username = $data->username;
    $password = $data->password;

    // Check if the username exists in the database
    $sql = "SELECT * FROM tblUsers WHERE username = '$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) { 
        // Email exists, fetch user data
        $row = mysqli_fetch_assoc($result);
        $decryptedPassword = openssl_decrypt($row["encryptedPassword"], 'aes-128-cbc', $row["encryptionKey"], 0, $row["encryptionKey"]);

        if ($decryptedPassword == $password) {
            // Passwords match
            $a["stat"] = 1;
        } else {
            // Passwords don't match
            $a["stat"] = 0;
            $a["msg"] = "Password is incorrect";
        }
    } else {
        // Email does not exist
        $a["stat"] = 0;
        $a["msg"] = "Email not found";
    }

    echo json_encode($a);
?>