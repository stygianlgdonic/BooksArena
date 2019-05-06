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
    <title>Books Arena | Healthcare & Fitness </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed" style="background-color:rgb(35, 115, 168)">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="homepage.html">Books Arena</a>

        <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.html">Home</a>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 margin-lr">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-info my-2 my-sm-0" type="submit">Go</button>
                    </form>
                </li>
            </ul>
            <a class="nav-link margin-lr btn btn-danger fas fa-cart-plus" href="cart.html"></a>
            <a href="userprofile.html" class='fas fa-user' style="color:white; "><small> Username</small></a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <img src="images/health.jpg" width="100%">
                <div class="centered" style="font-family: 'Dynalight';font-size: 80px; text-align: center; ">Healthcare
                    & Fitness</div>
            </div>
        </div>
        <div class="row booksdisplay">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row margin-tb">

                    <?php
                    include_once('dbconnect.php');

                    $query = "SELECT * FROM `books` WHERE `catagory` = 'health'";
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