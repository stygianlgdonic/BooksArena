<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <link rel="stylesheet" href="main.css">

    <title>Add Book</title>
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
            <div class="col-md-3"></div>
            <div class="col-md-6 p-4">
                <h3 class="grey">Add Book</h3>
                <hr>
                <form class="form-horizontal" action="addBook.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="ISBN">ISBN</label>
                        <input type="number" name="isbn" placeholder="Enter ISBN" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="Title">Title</label>
                        <input type="text" name="title" placeholder="Book Title" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" name="author" placeholder="Author" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="publicationDate">Publication Date</label>
                        <input type="date" name="publicationDate" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="binding">Binding</label>
                        <input type="text" name="binding" placeholder="Binding" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <input type="text" name="availability" placeholder="Availability" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" placeholder="Price" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="discription">Description</label>
                        <textarea type="text" name="discription" placeholder="Description" class="form-control"></textarea><br>
                    </div>
                    <div class="form-group">
                        <label for="catagory">Catagory</label>
                        <select name="catagory" class="form-control" style="margin-bottom: 2%;">
                            <option value="history">History</option>
                            <option value="classic">Classic & Literature</option>
                            <option value="comics">Comics & Graphic models</option>
                            <option value="fiction">Fiction &Literature</option>
                            <option value="biographies">Biographies & Memoirs</option>
                            <option value="selfcare">Self Care</option>
                            <option value="health">Health & Fitness</option>
                            <option value="religion">Religion & Spirituality</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="titlePage">Title Page</label>
                        <input type="file" name="titlePage" maxlength="100" size="100"><br>
                    </div>

                    <input type="submit" name="submit" class="btn btn-info float-right">

                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>
<?php
include_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publicationDate = $_POST["publicationDate"];
    $binding = $_POST["binding"];
    $availability = $_POST["availability"];
    $price = $_POST["price"];
    $catagory = $_POST["catagory"];
    $discription = $_POST["discription"];

    $pic_name = $_FILES['titlePage']['name'];
    $pic_type = $_FILES['titlePage']['type'];
    $pic_size = $_FILES['titlePage']['size'];
    $pic_tmpname = $_FILES['titlePage']['tmp_name'];

    if ($pic_size < 10000000) {
        $destination = "imgignore/" . $isbn . "-" . $pic_name;
        move_uploaded_file($pic_tmpname, $destination);

        $sqlAddBook = "INSERT INTO `booksarena`.`books` (`ISBN`, `title`,`author`,
     `publicationDate`, `binding`, `availability`, `price`, `discription`, `titlePage`, `catagory`)
      VALUES ('$isbn', '$title', '$author', '$publicationDate', '$binding', '$availability', 
      '$price', '$discription', '$destination', '$catagory')";

        if (mysqli_query($connection, $sqlAddBook)) {
            echo "Book added!";
            // echo "<script>location.href='target-page.php';</script>";
            header("refresh:2; url=homepage.php");
        } else {
            echo "Error " . mysqli_error($connection);
        }
    }
}




mysqli_close($connection);

?>