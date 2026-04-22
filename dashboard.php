<?php

include("connection.php");
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: burlywood;
            min-height: 100vh;
        }

        .navbar {
            background: white;
            color: black;
            padding: 25px 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
            text-align: center;
        }

        .container h1 {
            color: black;
            margin-bottom: 40px;
            font-size: 36px;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 0 20px;
        }

        .card {
            display: inline-block;
            width: 100%;
            padding: 30px 25px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 22px;
            color: #333;
        }

        .card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn {
            text-decoration: none;
            color: white;
            display: inline-block;
            padding: 12px 30px;
            border-radius: 8px;
            margin-top: 15px;
            font-weight: bold;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .report {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        }

        .report:hover {
            background: linear-gradient(135deg, #2980b9 0%, #1f618d 100%);
        }

        .view {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        }

        .view:hover {
            background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%);
        }

        .search {
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
        }

        .search:hover {
            background: linear-gradient(135deg, #8e44ad 0%, #7d3c98 100%);
        }

        .logout {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        }

        .logout:hover {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
        }

        @media (max-width: 768px) {
            .cards-grid {
                grid-template-columns: 1fr;
            }
            .container {
                width: 95%;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        Welcome, <strong><?php echo $_SESSION['user']; ?></strong>!
    </div>

    <div class="container">
        <h1>Dashboard</h1>

        <div class="cards-grid">
            <div class="card">
                <div class="card-icon"></div>
                <h3>Report Item</h3>
                <p>Add a lost or found item to the portal</p>
                <a href="report.php" class="btn report">Go</a>
            </div>

            <div class="card">
                <div class="card-icon"></div>
                <h3>View Items</h3>
                <p>Browse all reported items</p>
                <a href="view.php" class="btn view">Go</a>
            </div>

            <div class="card">
                <div class="card-icon"></div>
                <h3>Search Items</h3>
                <p>Find specific lost items</p>
                <a href="search.php" class="btn search">Search</a>
            </div>

            <div class="card">
                <div class="card-icon"></div>
                <h3>Logout</h3>
                <p>Exit from your account</p>
                <a href="logout.php" class="btn logout">Logout</a>
            </div>
        </div>
    </div>

</body>

</html>