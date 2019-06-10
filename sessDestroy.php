<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_unset(); 
session_destroy();
echo "<script>location.href='homepage.php';</script>";
?>

</body>
</html>