<?php
session_start();
include "config.php";
if(isset($_POST['submit'])){
    extract($_POST);
    $sql="SELECT * from customers where username='$username' and password='$password'";
    $result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
       
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        if ($username === "admin") {
            header('Location: view.php');
        } else {
            header('Location: index.html');
        }

        
        exit;
    }else{
        echo'<script type ="text/javascript">';
        echo 'alert("Invalid Credentials");';
        echo 'window.location.href="login.php"';
        echo '</script>';
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="reg.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button type="submit" name="submit">Login</button>
                <h6>New user <a href="reg.php">Register HERE</a></h6>

            </form>
        </div>
    </div>
</body>
</html>
