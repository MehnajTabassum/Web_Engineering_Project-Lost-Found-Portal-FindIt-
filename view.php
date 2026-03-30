<?php include("connection.php"); ?>

<form method="get">
    <input type="text" name="search" placeholder="Search item">
    <button>Search</button>
</form>

<table border="1">
<tr>
    <th>Title</th>
    <th>Description</th>
    <th>Category</th>
    <th>Status</th>
    <th>Contact</th>
</tr>

<?php
$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query = "SELECT * FROM items WHERE title LIKE '%$search%'";
} else {
    $query = "SELECT * FROM items";
}

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['contact']; ?></td>
</tr>
<?php } ?>
</table>