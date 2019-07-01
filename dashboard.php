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
    <title>All Books</title>
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

    <?php
      if($yourName != 'admin') :
    ?>
      <div class="container-fluid">
        <div class="row text-center">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            Please Log In as 'admin' to access Dashboard!
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    <?php
      endif;
    ?>
    <?php
      if($yourName == 'admin') :
    ?>


    <div class="container-fluid padded">
        <?php
        include_once('dbconnect.php');

        $query = "SELECT * FROM `books`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            echo mysqli_error($connection);
        }
        if (mysqli_num_rows($result) > 0) {
            ?>
            <div class="row text-center">
                <div class="col-md-4">
                    <h2 class="grey text-center">All Books</h2>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="addBook.php" class="btn btn-primary">Add new Book</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 search-box">
                    <input type="text" class="form-control" onkeyup="ajaxFunction()" id="query" placeholder="Search for any Book by ISBN, Book Tiltle, Author or Catagory" autocomplete="off">
                    <div class="result"></div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" id="books">
                    <table class="table">
                        <tr>
                            <th>Title Page</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publication Date</th>
                            <th>Catagory</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $row[8]; ?>" alt="1.jpg">
                                </td>
                                <td>
                                    <?php echo $row[1]; ?>
                                </td>
                                <td>
                                    <?php echo $row[2]; ?>
                                </td>
                                <td>
                                    <?php echo $row[3]; ?>
                                </td>
                                <td>
                                    <?php echo $row[9]; ?>
                                </td>
                                <td>
                                    <?php echo $row[7]; ?>
                                </td>
                                <td>
                                    <?php echo '<a class="btn btn-info" href="editBook.php?isbn=' . $row['ISBN'] . '">Edit</a>
                                    <a class="btn btn-danger" href="deleteBook.php?isbn=' . $row['ISBN'] . '">Delete</a>'; ?>
                                </td>
                            </tr>
                        <?php
                    }
                    ?>
                    </table>
                </div>
                <div class="col-md-1"></div>

            <?php
        }
        ?>
        </div>
        <?php
            endif;
        ?>
        <script>
            function ajaxFunction() {
                var ajaxRequest; // The variable that makes Ajax possible!

                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }
                ajaxRequest.onreadystatechange = function() {
                    if (ajaxRequest.readyState == 4) {
                        var ajaxDisplay = document.getElementById('books');
                        ajaxDisplay.innerHTML = ajaxRequest.responseText;
                    }
                }
                // Now get the value from user and pass it to
                // server script.
                var q = document.getElementById('query').value;
                var queryString = "?q=" + q;
                ajaxRequest.open("GET", "ajaxAdmin.php" + queryString, true);
                ajaxRequest.send(null);
            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>