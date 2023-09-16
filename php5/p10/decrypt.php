<?php
$response = [];
$response["msg"] = "";
$response["email"] = "";
$con = mysqli_connect("localhost", "root", "", "main");
$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;

// Check if the email exists in the database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Email exists, fetch user data
    $row = mysqli_fetch_assoc($result);
    $decryptedPassword = openssl_decrypt($row["encryptedPassword"], 'aes-256-cbc', $row["encryptionKey"], 0, $row["encryptionKey"]);

    if ($decryptedPassword == $password) {
        // Passwords match
        $response["id"] = 1;
        $response["email"] = $row["email"];
    } else {
        // Passwords don't match
        $response["id"] = 0;
        $response["msg"] = "Password is incorrect";
    }
} else {
    // Email does not exist
    $response["id"] = 0;
    $response["msg"] = "Email not found";
}

echo json_encode($response);
?>
