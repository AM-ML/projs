<?php
    $data = json_decode(file_get_contents("php://input"));
    $email = $data->email;
    $pass = $data->password;

    // Generate a random encryption key
    $encryptionKey = openssl_random_pseudo_bytes(16); // 128 bits key

    // Encrypt the password
    $encryptedPassword = openssl_encrypt($pass, 'aes-128-cbc', $encryptionKey, 0, $encryptionKey);

    $con = mysqli_connect("localhost", "root", "", "main");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO users (email, encryptionKey, encryptedPassword) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $email, $encryptionKey, $encryptedPassword);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Insertion successful
        echo json_encode(true);
    } else {
        // Insertion failed
        echo json_encode(false);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
?>