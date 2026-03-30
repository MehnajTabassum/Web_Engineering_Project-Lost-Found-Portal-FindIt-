<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lost & Found Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- LOGIN FORM -->
<form id="form1" method="post" autocomplete="on" onsubmit="return validation()">
    <fieldset>
        <h2>Login</h2>

        <label for="uname">Username</label>
        <input type="text" name="uname" id="uname" required>
        <br><br>

        <label for="loginPass">Password</label>
        <input type="password" name="loginPass" id="loginPass" required>
        <br><br>

        <input type="submit" name="login" value="Log in">
    </fieldset>
</form>

<!-- REGISTRATION FORM -->
<form id="form2" method="post" onsubmit="return test()" style="display:none;">
    <fieldset>
        <h2>Register</h2>

        <label>First Name</label>
        <input type="text" name="fname" id="fname">
        <span id="efname"></span>
        <br><br>

        <label>Last Name</label>
        <input type="text" name="lname" id="lname">
        <span id="elname"></span>
        <br><br>

        <label>Date of Birth</label>
        <input type="date" name="dob" id="dob">
        <br><br>

        <label>Contact</label>
        <input type="text" name="con" id="con" maxlength="11">
        <span id="eCon"></span>
        <br><br>

        <label>Password</label>
        <input type="password" name="regPass" id="regPass">
        <span id="eCA"></span>
        <span id="eSA"></span>
        <span id="eD"></span>
        <span id="eSC"></span>
        <br><br>

        <input type="submit" name="register" value="Register" id="x">
    </fieldset>
</form>

<!-- TOGGLE LINK -->
<p id="convention">
    Don't have an account? <a href="#" onclick="registration()">Register</a>
</p>

<script src="script.js"></script>

</body>
</html>

<?php
// ================= LOGIN =================
if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pass = $_POST['loginPass'];

    $query = "SELECT * FROM users WHERE fname='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['user'] = $uname;
        echo "<script>alert('Login Successful'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}

// ================= REGISTER =================
if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['con'];
    $pass = $_POST['regPass'];

    mysqli_query($conn, "INSERT INTO users(fname,lname,contact,password)
    VALUES('$fname','$lname','$contact','$pass')");

    echo "<script>alert('Registration Successful');</script>";
}
?>