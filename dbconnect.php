<?php
$connection = mysqli_connect("localhost", "root", "usbw", "booksarena");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
