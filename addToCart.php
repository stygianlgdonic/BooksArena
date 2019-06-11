<?php
    include 'dbconnect.php';

    $title = $_REQUEST['title'];
    $price = $_REQUEST['price'];

    $sqlAddItem = "INSERT INTO `cart` (`title`, `price`) VALUES ('$title', '$price')";

    if (mysqli_query($connection, $sqlAddItem)) {
        echo "Book added to cart!";
        echo "<script>location.href='homepage.php';</script>";
        // header("refresh:1; url=homepage.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }

?>