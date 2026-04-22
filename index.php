<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Portal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="nav">
        <div class="logo">
            <h1>Lost & Found Portal</h1>
        </div>
        <div class="search-area">
            <form action="search.php" method="GET">
                <input type="text" name="search" placeholder="Search items..." required>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
    
    <div class="hero">
        <h2>Find Your Lost Items or Report Found Ones</h2>
        <div class="button">
            <a href="login.php">
                <button>Join Us</button>
            </a>
        </div>
    </div>

    <div class="head">
        <h1> What People Say About Lost & Found Portal!</h1>
    </div>
    
    <div class="cards">
        <div class="card">
            <img src="mehnaj.jpg" alt="Mehnaj Tabassum">
            <h3>Mehnaj Tabassum</h3>
            <p>"Great tool for our campus/community."</p>
        </div>
        <div class="card">
            <img src="becitra.jpg" alt="Becitra Rani">
            <h3>Becitra Rani</h3>
            <p>"This portal made reuniting lost items with owners simple."</p>
        </div>
        <div class="card">
            <img src="tanima.jpg" alt="Tanima Tunzin">
            <h3>Tanima Tunzin</h3>
            <p>"Helpful and organized — no more flyers on walls!"</p>
        </div>
    </div>

    <div class="footer">
        © 2026 Lost & Found Portal | All rights reserved.
    </div>
</body>

</html>