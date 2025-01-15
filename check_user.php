<?php
require('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $check = "SELECT email FROM users WHERE email = ?";
    $stmt = $db->prepare($check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User Matched";
    } else {
        echo "No User Found";
    }

    $stmt->close();
}
?>