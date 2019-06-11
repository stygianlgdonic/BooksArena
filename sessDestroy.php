<?php
session_start();
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_unset(); 
session_destroy();
echo "<script>location.href='homepage.php';</script>";

$sqlDeleteCart = "DELETE FROM `cart`;";
if (mysqli_query($connection, $sqlDeleteCart)) {
    echo "Cart Deleted!";
    echo "<script>location.href='cart.php';</script>";
    // header("refresh:1; url=cart.php");
} else {
    echo "Error " . mysqli_error($connection);
}

?>

</body>
</html>