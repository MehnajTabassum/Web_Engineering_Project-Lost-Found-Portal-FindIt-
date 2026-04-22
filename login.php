<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lost & Found Portal - Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
         body {
           font-family: Arial, sans-serif;
           background: burlywood;
           padding: 40px;              /* increase padding instead of full height */
           display: flex;
           justify-content: center;
           align-items: flex-start;    /* align at top instead of center */
           min-height: auto;           /* remove full screen height */
     }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2)          /* limit max width */
        }



        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header h1 {
            font-size: 36px;
            margin-bottom: 10px;
            color: #4CAF50;
            font-weight: bold;
        }
        .header p {
            font-size: 16px;
            color: #777;
        }
        form {
            background-color: transparent;
            padding: 0;
            border-radius: 0;
        }
        fieldset {
            border: none;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
            display: none;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #888;
            font-weight: 500;
            font-size: 15px;
        }
        input[type="text"],
        input[type="password"],
        input[type="date"] {
            width: 350%;              /* medium width instead of full */
            max-width: 350px;        /* prevents them from being too wide */
            padding: 12px 14px;
            margin: 0 auto 25px;     /* centers the box horizontally */
            display: block;          /* ensures centering works */
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            transition: 0.3s;
        }
        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #ccc;
        }
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="date"]:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 4px rgba(76,175,80,0.1);
        }
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
            transform: translateY(-3px);


        }
        span {
            color: #ff6b6b;
            font-size: 12px;
            display: block;
            margin-bottom: 10px;
        }
        #convention {
            text-align: center;
            margin-top: 30px;
            color: #777;
            font-size: 15px;
        }
        #convention a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        #convention a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Lost & Found Portal</h1>
            <p>Enter your login credentials</p>
        </div>

        <!-- LOGIN FORM -->
        <form id="form1" method="post" autocomplete="on" onsubmit="return validation()">
            <fieldset>
                <h2>Login</h2>

                <label for="uname">Username</label>
                <input type="text" name="uname" id="uname" placeholder="Enter your username" required>

                <label for="loginPass">Password</label>
                <input type="password" name="loginPass" id="loginPass" placeholder="Enter your password" required>

                <input type="submit" name="login" value="Log in">
            </fieldset>
        </form>

        <!-- REGISTRATION FORM -->
        <form id="form2" method="post" onsubmit="return test()" style="display:none;">
            <fieldset>
                <h2>Register</h2>

                <label>First Name</label>
                <input type="text" name="fname" id="fname" placeholder="Enter your first name">
                <span id="efname"></span>

                <label>Last Name</label>
                <input type="text" name="lname" id="lname" placeholder="Enter your last name">
                <span id="elname"></span>

                <label>Date of Birth</label>
                <input type="date" name="dob" id="dob">

                <label>Contact</label>
                <input type="text" name="con" id="con" maxlength="11" placeholder="Enter your phone number">
                <span id="eCon"></span>

                <label>Password</label>
                <input type="password" name="regPass" id="regPass" placeholder="Create a strong password">
                <span id="eCA"></span>
                <span id="eSA"></span>
                <span id="eD"></span>
                <span id="eSC"></span>

                <input type="submit" name="register" value="Register" id="x">
            </fieldset>
        </form>

        <!-- TOGGLE LINK -->
        <p id="convention">
            Don't have an account? <a href="#" onclick="registration()">Register here</a>
        </p>
    </div>

    <script src="script.js"></script>

</body>

</html>

<?php
// ================= LOGIN =================
if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['loginPass'];

    // get user by name
    $query = "SELECT * FROM users WHERE fname='$uname'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // check password
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user'] = $row['fname'];
            echo "<script>alert('Login Successful'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        echo "<script>alert('User Not Found');</script>";
    }
}

// ================= REGISTER =================
if (isset($_POST['register'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['con'];
    $pass = $_POST['regPass'];

    // simple validation
    if ($fname == "" || $lname == "" || $contact == "" || $pass == "") {
        echo "<script>alert('All fields are required');</script>";
    } else {

        // hash password
        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        // insert into database
        $query = "INSERT INTO users(fname,lname,contact,password)
        VALUES('$fname','$lname','$contact','$hashed')";

        mysqli_query($conn, $query);

        echo "<script>alert('Registration Successful');</script>";
    }
}