<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<a href="report.php">Report Item</a><br><br>
<a href="view.php">View Items</a><br><br>
<a href="logout.php">Logout</a>