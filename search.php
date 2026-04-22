<?php
include("connection.php");
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Items</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: burlywood;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .search-section {
            text-align: center;
            margin: 20px 0;
        }
        .search-section form {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .search-section input {
            padding: 10px;
            width: 350px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-section button {
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }
        .search-section button:hover {
            background-color: #0066a1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th {
            background-color: #333;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        table tr:hover {
            background-color: #f9f9f9;
        }
        .empty-message {
            text-align: center;
            color: #999;
            padding: 40px;
            font-size: 16px;
        }
        .dashboard-link {
            text-align: center;
            margin-top: 20px;
        }
        .dashboard-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }
        .dashboard-link a:hover {
            background-color: #45a049;
        }
        .user-info {
            text-align: right;
            margin-bottom: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="user-info">
            Welcome, <strong><?php echo $_SESSION['user']; ?></strong>
        </div>
        
        <h1>Search Items</h1>

        <div class="search-section">
            <form method="get">
                <input type="text" name="search" placeholder="Search by title or description..." required>
                <button type="submit">Search</button>
            </form>
        </div>

        <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];

            $query = "SELECT * FROM items 
        WHERE title LIKE '%$search%' 
        OR description LIKE '%$search%'";

            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);

            if ($count > 0) {
        ?>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Contact</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $statusColor = ($row['status'] == 'Lost') ? '#ff9999' : '#99ff99';
                        ?>
                        <tr>
                            <td><strong><?php echo $row['title']; ?></strong></td>
                            <td><?php echo substr($row['description'], 0, 50) . '...'; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td style="background-color: <?php echo $statusColor; ?>; text-align: center;">
                                <strong><?php echo $row['status']; ?></strong>
                            </td>
                            <td><?php echo $row['contact']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            <?php
            } else {
            ?>
                <div class="empty-message">
                    <p>No items found matching your search. Try different keywords!</p>
                </div>
            <?php
            }
        } else {
        ?>
            <div class="empty-message">
                <p>Enter search terms to find items...</p>
            </div>
        <?php
        }
        ?>

        <div class="dashboard-link">
            <a href="dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>