<?php
include("connection.php");
session_start();

// protect page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

// get id from URL
$id = $_GET['id'];

// fetch existing data
$result = mysqli_query($conn, "SELECT * FROM items WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #008CBA;
            box-shadow: 0 0 5px rgba(0, 140, 186, 0.3);
        }
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
        button[type="submit"],
        .btn-back {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .btn-back {
            background-color: #008CBA;
            color: white;
        }
        .btn-back:hover {
            background-color: #0066a1;
        }
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .back-dashboard {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Check if form was just updated
        if (isset($_POST['update'])) {
            $title = $_POST['title'];
            $desc = $_POST['description'];
            $cat = $_POST['category'];
            $status = $_POST['status'];
            $contact = $_POST['contact'];

            mysqli_query($conn, "UPDATE items SET 
                title='$title',
                description='$desc',
                category='$cat',
                status='$status',
                contact='$contact'
                WHERE id='$id'
            ");
        ?>
            <div class="success-message">
                ✓ Item Updated Successfully!
            </div>
            <div class="back-dashboard">
                <a href="view.php" class="btn-back" style="width: 100%; padding: 12px;">Back to Items List</a>
            </div>
        <?php
        } else {
        ?>
            <h1>Edit Item</h1>

            <form method="post">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required><?php echo $row['description']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="<?php echo $row['category']; ?>" selected><?php echo $row['category']; ?></option>
                        <option>Electronics</option>
                        <option>Documents</option>
                        <option>Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="<?php echo $row['status']; ?>" selected><?php echo $row['status']; ?></option>
                        <option>Lost</option>
                        <option>Found</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="contact" value="<?php echo $row['contact']; ?>" required>
                </div>

                <div class="button-group">
                    <button type="submit" name="update">Update Item</button>
                    <a href="view.php" class="btn-back">Cancel</a>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</body>
</html>