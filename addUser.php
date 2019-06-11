<?php
include_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password1 = $_POST["password_1"];
    $password2 = $_POST["password_2"];

    if($password1 != $password2) {
        echo "Passwords do not match!";
        echo "<script>location.href='signup.html';</script>";
    } else {

        $sqlAddHero = "INSERT INTO `users` (`user_username`, `user_password`) VALUES ('$username', '$password1')";

        if (mysqli_query($connection, $sqlAddHero)) {
            echo "user added!";
            echo "<script>location.href='homepage.php';</script>";
            // header("refresh:2; url=homepage.php");
        } else {
            echo "Error " . mysqli_error($connection);
        }
    
    }
}

mysqli_close($connection);

?>