<?php

require('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pattern = '1234567890';
    $length = strlen($pattern);
    $v_code = [];
    for($i = 0; $i < 6; $i++){
        $index = rand(0, $length - 1);
        $v_code[] = $pattern[$index];
    }

    $ver_code = implode($v_code);
    $full_name = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check = "SELECT email FROM users WHERE email = ?";
    $stmt = $db->prepare($check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $response = $stmt->get_result();

    if($response->num_rows != 0){
        echo "User Matched";
    } else {
        $store = "INSERT INTO users (full_name, email, password, activation_code) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($store);
        $stmt->bind_param("ssss", $full_name, $email, $password, $ver_code);
        if ($stmt->execute()) {
            echo "User Registered Successfully";
        } else {
            echo "Failed to Register User";
        }
    }
    $stmt->close();
} else {
    echo "No User Found";
}
?>