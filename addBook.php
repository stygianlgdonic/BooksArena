<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Add Book</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8 rounded padded">
                <h3 class="grey">Add Book</h3>
                <hr>
                <form action="addBook.php" method="POST" enctype="multipart/form-data">
                    <input type="number" name="isbn" placeholder="ISBN" class="form-control"><br>
                    <input type="text" name="title" placeholder="Book Title" class="form-control"><br>
                    <input type="text" name="author" placeholder="Author" class="form-control"><br>
                    <input type="date" name="publicationDate" class="form-control"><br>
                    <input type="text" name="binding" placeholder="Binding" class="form-control"><br>
                    <input type="text" name="availability" placeholder="Availability" class="form-control"><br>
                    <input type="text" name="price" placeholder="Price" class="form-control"><br>
                    <textarea type="text" name="discription" placeholder="Discription" class="form-control"></textarea><br>
                    <input type="file" name="titlePage" maxlength="100" size="100"><br>
                    <input type="submit" name="submit" class="btn btn-info float-right">
                </form>
            </div>
            <div class="col-md-2"></div>
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
    $discription = $_POST["discription"];

    $pic_name = $_FILES['titlePage']['name'];
    $pic_type = $_FILES['titlePage']['type'];
    $pic_size = $_FILES['titlePage']['size'];
    $pic_tmpname = $_FILES['titlePage']['tmp_name'];

    if ($pic_size < 10000000) {
        $destination = "imgignore/" . $isbn . "-" . $pic_name;
        move_uploaded_file($pic_tmpname, $destination);

        $sqlAddBook = "INSERT INTO `booksarena`.`books` (`ISBN`, `title`,`author`,
     `publicationDate`, `binding`, `availability`, `price`, `discription`, `titlePage`)
      VALUES ('$isbn', '$title', '$author', '$publicationDate', '$binding', '$availability', 
      '$price', '$discription', '$destination')";

        if (mysqli_query($connection, $sqlAddBook)) {
            echo "Book added!";
            // echo "<script>location.href='target-page.php';</script>";
            header("refresh:2; url=index.php");
        } else {
            echo "Error " . mysqli_error($connection);
        }
    }
}




mysqli_close($connection);

?>