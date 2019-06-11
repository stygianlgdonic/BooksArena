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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="userprofile.css">
    <title>User Profile</title>
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

            <a class="nav-link margin-lr btn btn-danger fas fa-cart-plus" href="cart.html"></a>

            <a href="userprofile.php" class='fas fa-user' style="color:white; "><small><?php echo $yourName ?></small></a>

        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-2 col-md-2"></div>
            <div class="col-sm-8 col-md-8 padded rounded">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h3 class="grey">Personal Info</h3>

                        <div class="row">
                            <div class="col-sm-3 col-md-3 padded grey">
                                <div class="row margin-tb">
                                    <label for="email">Name</label>
                                </div>
                                <div class="row margin-tb">
                                    <label for="gender">Password</label>
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-9 padded grey">
                                <div class="row margin-tb">
                                    <label for="namevalue"><?php echo $yourName; ?></label>
                                </div>
                                <div class="row margin-tb">
                                    <label for="gendervalue">••••••••</label>
                                </div>
                            </div>
                        </div>

                        <a href="sessDestroy.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
    </div>
</body>

</html>