<?php
session_start();
include("../config/config.php");
include("../config/header.php");
// if (isset($_POST['payment'])) {
if (!isset($_SESSION['username'])) {
    include('user_login.php');
} else {
    include('payment.php');
}
// }