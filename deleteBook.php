<?php
include_once('dbconnect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $isbn = $_GET['isbn'];
    $sqlDeleteHero = "DELETE FROM `books` WHERE `ISBN`=" . $isbn . ";";
    if (mysqli_query($connection, $sqlDeleteHero)) {
        echo "Boook deleted";
        echo "<script>location.href='dashboard.php';</script>";
        // header("refresh:2; url=allbooks.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }
}
