<?php
include_once('dbconnect.php');

if (isset($_POST['login'])) {
    $user = $_POST['username_login'];
    $pwd = $_POST['password_login'];
    $query = "SELECT * FROM users WHERE user_username='$user' && user_password='$pwd'";
    $data = mysqli_query($connection, $query);
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        echo "Login Successful";
    } else {
        echo "Login Failed!";
    }
}
