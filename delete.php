<?php
include("connection.php");
session_start();

// protect page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

// delete query
mysqli_query($conn, "DELETE FROM items WHERE id='$id'");

// redirect
header("Location: view.php");
?>