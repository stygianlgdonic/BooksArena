<?php
include_once('dbconnect.php');
$q = isset($_GET["q"]) ? $_GET["q"] : "";
$query = "SELECT * FROM `books` WHERE `ISBN` like '%" . $q . "%' OR `title` like '%" . $q . "%' OR `author` like '%" . $q . "%' OR `catagory` like '%" . $q . "%'";
$result = mysqli_query($connection, $query);

if (!$result) {
    echo mysqli_error($connection);
}

if (mysqli_num_rows($result) > 0) :
    ?>
    <table class="table">
        <tr>
            <th>Title Page</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publication Date</th>
            <th>Catagory</th>
            <th>Discription</th>
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

<?php
endif;
?>