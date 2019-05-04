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
            <h2 class="grey text-center">All Books</h2>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h3>Cover</h3>
                </div>
                <div class="col-md-3">
                    <h3>Author</h3>
                </div>
                <div class="col-md-3">
                    <h3>Description</h3>
                </div>
                <div class="col-md-3">
                    <h3>Actions</h3>
                </div>
            </div>
            <hr>
            <div class="row padded">

                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-md-3 margin-tb">
                        <div class="row">
                            <img src="<?php echo $row[8]; ?>" alt="1.jpg">
                        </div>
                    </div>
                    <div class="col-md-3 margin-tb">
                        <div class="row">
                            <a href="#"><?php echo $row[1]; ?></a><br>
                        </div>
                        <div class="row">
                            <small><i>by: <?php echo $row[2]; ?></i></small>
                        </div>
                    </div>
                    <div class="col-md-3 margin-tb">
                        <div class="row">
                            <p><?php echo $row[7]; ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 margin-tb">
                        <?php echo '<a class="btn btn-info" href="editBook.php?isbn=' . $row['ISBN'] . '">Edit</a>
                        <a class="btn btn-danger" href="deleteBook.php?isbn=' . $row['ISBN'] . '">Delete</a>'; ?>
                    </div>

                <?php
            }
        }
        ?>
        </div>


    </div>
</body>

</html>