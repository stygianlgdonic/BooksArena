<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>result</title>
</head>

<body>
    <?php
    include_once('dbconnect.php');

    $query = "SELECT * FROM `books`";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo mysqli_error($connection);
    }

    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Books Table</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>ISBN</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Binding</th>
                            <th>Availability</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Title Page</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row[0]; ?>
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
                                    <?php echo $row[4]; ?>
                                </td>
                                <td>
                                    <?php echo $row[5]; ?>
                                </td>
                                <td>
                                    <?php echo $row[6]; ?>
                                </td>
                                <td>
                                    <?php echo $row[7]; ?>
                                </td>
                                <td>
                                    <img src="<?php echo $row[8]; ?>" />
                                </td>
                            </tr>
                        <?php
                    }
                }
                ?>

                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


</body>

</html>