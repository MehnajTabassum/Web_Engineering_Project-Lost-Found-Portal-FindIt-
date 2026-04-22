<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Lost/Found Item</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: burlywood;
            padding: 20px;
        }
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin: 20px auto;
            width: 80%;
            max-width: 500px;
            font-size: 18px;
            font-weight: bold;
        }
        .back-button {
            display: block;
            background-color: #008CBA;
            color: white;
            padding: 12px 30px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px auto;
            width: fit-content;
            font-size: 16px;
            cursor: pointer;
            border: none;
        }
        .back-button:hover {
            background-color: #0066a1;
        }
        .report-form {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .report-form h2 {
            text-align: center;
            color: #333;
        }
        .report-form input,
        .report-form textarea,
        .report-form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        .report-form button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        .report-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
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
    ?>
        <div class="success-message">
            ✓ Item Submitted Successfully!
        </div>
        <a href="dashboard.php" class="back-button">Back to Dashboard</a>
    <?php
    } else {
    ?>
        <div class="report-form">
            <h2>Report Lost/Found Item</h2>
            <form method="post">
                <input type="text" name="title" placeholder="Item Title" required><br>

                <textarea name="description" placeholder="Description" required></textarea><br>

                <select name="category" required>
                    <option value="">Select Category</option>
                    <option>Electronics</option>
                    <option>Documents</option>
                    <option>Others</option>
                </select><br>

                <select name="status" required>
                    <option value="">Select Status</option>
                    <option>Lost</option>
                    <option>Found</option>
                </select><br>

                <input type="text" name="contact" placeholder="Contact" required><br>

                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    <?php
    }
    ?>
</body>
</html>