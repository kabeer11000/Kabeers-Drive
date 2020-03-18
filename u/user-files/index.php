<?php
session_start();
$id = $_SESSION['id'];


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
else{
    
    header('location: files.php');
}
