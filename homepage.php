<?php
include_once('dbconnect.php');

if (isset($_POST['login'])) {
    $user = $_POST['username_login'];
    $pwd = $_POST['password_login'];
    $query = "SELECT * FROM users WHERE user_username='$user' && user_password='$pwd'";
    $data = mysqli_query($connection, $query);
    $total = mysqli_num_rows($data);
    if ($total == 1) {
            if(isset($_SESSION['user'])){
            echo $_SESSION['user'];
            }

        echo "<script>location.href='homepage.php';</script>";
        // header("refresh:2; url=homepage.php");

    } else {
        echo "Login Failed!";
        echo "<script>location.href='homepage.php';</script>";
        // header("refresh:1; url=homepage.php");
    }
}
?>

<?php

    session_start();
    if (isset($_SESSION["user"])) {
        $yourName = $_SESSION["user"];
    } else {
    $yourName = "null";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="main.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <title>Books Arena</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" style="background-color:rgb(35, 115, 168)">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="homepage.php">Books Arena</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="searchBooks.php"><b>Search Books</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><b>Dashboard</b></a>
                </li>
            </ul>

            <a class="nav-link margin-lr btn btn-danger fas fa-cart-plus" href="cart.php"></a>

            <!-- Button to Open the Modal -->
            <?php
                if ($yourName == 'null') :
            ?>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                Login
            </button>

            <?php
                endif;
            ?>

            <!-- The Modal -->
            <div class="modal text-center" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Member Login</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class=" form-horizontal" action="homepage.php" method="POST">

                                <input type="text" name="username_login" placeholder="Username" class="form-control loginmargin" autocomplete="off">
                                <input type="password" name="password_login" placeholder="Password" class="form-control loginmargin">
                                <br>
                                <Label class="grey"><input type="checkbox" name="rememberme" checked="checked"> Remember
                                    me</Label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <Label class="grey"><a href="lab6.html">Forgot Password?</a></Label>
                                <br><br>
                                <input type="submit" name="login" value="LOGIN" class="btn btn-info">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <hr>
                                <Label class="grey">You are not a member?</Label>
                                <br>
                                <a href="signup.html" class="btn btn-info">Create Account</a>
                            </form>
                            <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $_SESSION["user"] = $user;
                                }
                            ?>

                        </div>

                    </div>
                </div>
            </div>

            <?php
                if ($yourName != 'null') :
            ?>

            <a href="userprofile.php" class='fas fa-user' style="color:white; "><small><?php echo $yourName; ?></small></a>

            <?php
                endif;
            ?>

        </div>
    </nav>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div id="slider1" class="carousel slide" data-ride="carousel" data-interval="5000">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#slider1" data-slide-to="0" class="active"></li>
                            <li data-target="#slider1" data-slide-to="1"></li>
                            <li data-target="#slider1" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/book1.jpg" alt="book1" width="100%" height="100%">
                            </div>
                            <div class="carousel-item">
                                <img src="images/book2.jpg" alt="book2" width="100%" height="100%">
                            </div>
                            <div class="carousel-item">
                                <img src="images/book3.jpg" alt="book3" width="100%" height="100%">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#slider1" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#slider1" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 p-4">
                        <div class="card">
                            <div class="card-header">
                                Catagories
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="Biographyandmemoir.php">Biographies & Memoirs</a></li>
                                <li class="list-group-item"><a href="Fictionandliterature.php">Fiction & Literature</a></li>
                                <li class="list-group-item"><a href="ComicandGraphic.php">Comics & Graphic models</a></li>
                                <li class="list-group-item"><a href="History.php">History</a></li>
                                <li class="list-group-item"><a href="Classics.php">Classics & Literature</a></li>
                                <li class="list-group-item"><a href="SelfCare.php">Self Care</a></li>
                                <li class="list-group-item"><a href="healthandfitness.php">Health & Fitness</a></li>
                                <li class="list-group-item"><a href="religion.php">Religion & Spirituality</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 margin-tb padded">
                        <div class="row margin-tb">
                            <h5 class="border-bottom border-primary">Best Sellers</h5>
                        </div>
                        <div class="row margin-tb booksdisplay">

                            <?php
                            include_once('dbconnect.php');

                            $query = "SELECT * FROM `books`";
                            $result = mysqli_query($connection, $query);

                            if (!$result) {
                                echo mysqli_error($connection);
                            }
                            if (mysqli_num_rows($result) > 0) {
                                ?>
                                <div class="row wide">

                                    <?php
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <div class="col-md-4 margin-tb">
                                            <div class="row">
                                                <img src="<?php echo $row[8]; ?>" alt="1.jpg">
                                            </div>
                                            <div class="row">
                                                <a href="bookdetails.php?isbn=<?php echo $row[0];?>"><?php echo $row[1]; ?></a><br>
                                            </div>
                                            <div class="row">
                                                <small><i>by: <?php echo $row[2]; ?></i></small>
                                            </div>
                                            <div class="row">
                                                <a href="addToCart.php?title=<?php echo $row[1];?>&price=<?php echo $row[6];?>" class=" fas fa-cart-plus" style="color:red;"> Add to Cart</a>
                                            </div>
                                        </div>

                                        <?php
                                        $count++;
                                        if ($count == 6) {
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </div>

                            <hr>

                        </div>

                        <br>

                        <div class="row margin-tb">
                            <h5 class="border-bottom border-primary">Recent Arrivals</h5>
                        </div>
                        <div class="row margin-tb booksdisplay">

                            <?php
                            include_once('dbconnect.php');

                            $query = "SELECT * FROM `books` WHERE `publicationDate` >= '2019-04-01'";
                            $result = mysqli_query($connection, $query);

                            if (!$result) {
                                echo mysqli_error($connection);
                            }
                            if (mysqli_num_rows($result) > 0) {
                                ?>
                                <div class="row wide">

                                    <?php
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <div class="col-md-4 margin-tb">
                                            <div class="row">
                                                <img src="<?php echo $row[8]; ?>" alt="1.jpg">
                                            </div>
                                            <div class="row">
                                                <a href="bookdetails.php?isbn=<?php echo $row[0];?>"><?php echo $row[1]; ?></a><br>
                                            </div>
                                            <div class="row">
                                                <small><i>by: <?php echo $row[2]; ?></i></small>
                                            </div>
                                            <div class="row">
                                                <a href="addToCart.php?title=<?php echo $row[1];?>&price=<?php echo $row[6];?>" class=" fas fa-cart-plus" style="color:red;"> Add to Cart</a>
                                            </div>
                                        </div>

                                        <?php
                                        $count++;
                                        if ($count == 6) {
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </div>


                            <hr>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>