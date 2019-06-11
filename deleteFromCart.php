<?php
include_once('dbconnect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cartid = $_GET['cart_id'];
    $sqlDeleteItem = "DELETE FROM `cart` WHERE cart_id=" . $cartid . ";";
    if (mysqli_query($connection, $sqlDeleteItem)) {
        echo "Book deleted from cart !";
        echo "<script>location.href='cart.php';</script>";
        // header("refresh:1; url=cart.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }
}
