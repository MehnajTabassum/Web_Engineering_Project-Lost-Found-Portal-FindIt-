<?php include("connection.php"); ?>

<h2>Report Lost/Found Item</h2>

<form method="post">
    <input type="text" name="title" placeholder="Item Title"><br><br>

    <textarea name="description" placeholder="Description"></textarea><br><br>

    <select name="category">
        <option>Electronics</option>
        <option>Documents</option>
        <option>Others</option>
    </select><br><br>

    <select name="status">
        <option>Lost</option>
        <option>Found</option>
    </select><br><br>

    <input type="text" name="contact" placeholder="Contact"><br><br>

    <button name="submit">Submit</button>
</form>

<?php
if(isset($_POST['submit'])){
    mysqli_query($conn, "INSERT INTO items(title,description,category,status,contact)
    VALUES(
        '$_POST[title]',
        '$_POST[description]',
        '$_POST[category]',
        '$_POST[status]',
        '$_POST[contact]'
    )");

    echo "Item Submitted!";
}
?>