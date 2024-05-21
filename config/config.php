<?php
// my_db là tên database của mày
$connect = new mysqli("localhost", "root", "", "mendover");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
