<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lab10.css">
    <title>Edit Book</title>
</head>


<?php
include_once 'dbconnect.php';

$isbn = $_REQUEST['isbn'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publicationDate = $_POST["publicationDate"];
    $binding = $_POST["binding"];
    $availability = $_POST["availability"];
    $price = $_POST["price"];
    $discription = $_POST["discription"];

    $sqlAddHero = "UPDATE `books` SET `title` = '" . $title . "', `author` = '" . $author . "', `publicationDate` = '" . $publicationDate . "',
     `binding` = '" . $binding . "', `availability` = '" . $availability . "', `price` = '" . $price . "', `discription` = '" . $discription . "' 
     WHERE ISBN=" . $isbn;

    if (mysqli_query($connection, $sqlAddHero)) {
        echo "Book Edited!";
        // echo "<script>location.href='index.php';</script>";
        header("refresh:2; url=allbooks.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }
}

$query = "SELECT * FROM `books` WHERE ISBN=" . "$isbn";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-5">
            <h1>Edit Book</h1>
            <hr>
            <form action="editBook.php" method="POST">
                <input type="text" name="title" placeholder="Title" class="form-control" value="<?php echo $row['title']; ?>"><br>
                <input type="text" name="author" placeholder="Author" class="form-control" value="<?php echo $row['author']; ?>"><br>
                <input type="date" name="publicationDate" placeholder="Publication Date" class="form-control" value="<?php echo $row['publicationDate']; ?>"><br>
                <input type="text" name="binding" placeholder="Binding" class="form-control" value="<?php echo $row['binding']; ?>"><br>
                <input type="text" name="availability" placeholder="Availability" class="form-control" value="<?php echo $row['binding']; ?>"><br>
                <input type="text" name="price" placeholder="Price" class="form-control" value="<?php echo $row['price']; ?>"><br>
                <input type="text" name="discription" placeholder="Discription" class="form-control" value="<?php echo $row['discription']; ?>"><br>
                <input type="hidden" name="isbn" value="<?php echo $isbn; ?>">
                <input type="submit" name="submit" class="btn btn-info float-left">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>