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

            <a class="nav-link margin-lr btn btn-danger fas fa-cart-plus" href="cart.php"></a>
            <a href="userprofile.html" class='fas fa-user' style="color:white; "><small> Username</small></a>
        </div>
    </nav>
    <div class="container-fluid ">
        <div class="row" >
             <div class="col-md-1"></div>
             <div class="col-md-10" >
                 <?php
                 $isbn = $_REQUEST['isbn'];
                 include 'dbconnect.php';

                 $query = "SELECT * FROM `books` WHERE ISBN=" . "$isbn";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                
                    <div class="col-md-5">
                        <img src="<?php echo $row['titlePage'];?>">
                        
                    </div>
                    <div class="col-md-7 float-right">
                        <h3><b> <?php echo $row['title'];?></b> </h3> <hr>
                            <h5> <b> Author: </b>
                                <?php echo $row['author']; ?>   </h5></b> <br>
                               <p>Publication Date: <span class="float-right"><?php echo $row['publicationDate']; ?></span> <br>
                               Binding: <span class="float-right"><?php echo $row['binding']; ?> </span> <br>
                               In Stock:<span class="float-right"> <?php echo $row['binding']; ?></span> <br>
                               Categotry: <span class="float-right"><?php echo $row['catagory']; ?> </span> <br>
                                Price: <span class="float-right"><?php echo $row['price']; ?> </span> <br>
                                Description: <span class="float-right"><?php echo $row['discription']; ?> </span> <br> Add To Cart:<br>
                                <a class="nav-link margin-lr btn btn-danger fas fa-cart-plus float-right" href="#"></a>
                        
                    </div>
                 
             </div>
             <div class="col-md-1"></div>

             
        </div>
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>