<?php
$connection = mysqli_connect("localhost", "root", "", "booksarena");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
