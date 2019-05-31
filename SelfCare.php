<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link href='https://fonts.googleapis.com/css?family=Dynalight' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <title>Books Arena | Self Care</title>
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

            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                Login
            </button>

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
                            <form class=" form-horizontal" action="validate.php" method="POST">

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
                        </div>

                    </div>
                </div>
            </div>

            <a class="nav-link margin-lr btn btn-danger fas fa-cart-plus" href="cart.html"></a>
            <a href="userprofile.html" class='fas fa-user' style="color:white; "><small> Username</small></a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <img src="images/self.jpg" width="100%">
                <div class="centered" style="font-family: 'Dynalight';font-size: 80px; text-align: center; ">Self Care
                </div>
            </div>
        </div>
        <div class="row booksdisplay">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row margin-tb">

                    <?php
                    include_once('dbconnect.php');

                    $query = "SELECT * FROM `books` WHERE `catagory` = 'selfcare'";
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        echo mysqli_error($connection);
                    }
                    if (mysqli_num_rows($result) > 0) {
                        ?>
                        <div class="row wide">

                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <div class="col-md-4 margin-tb">
                                    <div class="row">
                                        <img src="<?php echo $row[8]; ?>" alt="1.jpg">
                                    </div>
                                    <div class="row">
                                        <a href="#"><?php echo $row[1]; ?></a><br>
                                    </div>
                                    <div class="row">
                                        <small><i>by: <?php echo $row[2]; ?></i></small>
                                    </div>
                                    <div class="row">
                                        <a href="#" class=" fas fa-cart-plus" style="color:red;"></a>
                                    </div>
                                </div>

                            <?php
                        }
                    }
                    ?>
                    </div>


                    <hr>

                </div>

            </div>
            <div class="col-md-1"></div>

        </div>
    </div>

</body>

</html>