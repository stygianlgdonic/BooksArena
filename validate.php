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

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $_SESSION["user"] = $user;
            }
            echo "<br>";
            if(isset($_SESSION['user'])){
            echo $_SESSION['user'];
            }

            echo "<script>location.href='homepage.php';</script>";
            // header("refresh:2; url=homepage.php");

    } else {
        echo "Login Failed!";
        echo "<script>location.href='homepage.php';</script>";
        // header("refresh:2; url=homepage.php");
    }
}
?>