<?php


require('db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check = "SELECT email FROM users WHERE email = '$email'";
    $response = $db->query($check);

    if($response->num_rows != 0)
    {
        $user_check = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $res = $db->query($user_check);
        if($res->num_rows != 0)
        {
           echo "Login Successfully";
           $_SESSION['user'] = $email;
        }
        else
        {
            echo "Invalid Password";
        }
    }
    else
    {
        echo "No User Found";
    }
}
else
{
    echo "Invalid Request";
}

?>