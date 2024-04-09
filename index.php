<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
  

<div class="form_container">

    <div class="form">
    <form method="POST" action="index.php">

        <h1>SIGN IN</h1>

        <i class='bx bxs-user-circle' ></i><label for="username"></label>
        <input placeholder="Enter your email" type="email" name="email" id="email"><br>

        <i class='bx bxs-lock-alt'></i><label for="password"></label>
        <input placeholder="Enter your password" type="password" name="password" id="password" required><br>

        <input  id="checkbox" type="checkbox" onclick="togglePasswordVisibility()"><label for="checkbox">Show Password  </label>
        

        <div class="btn"><button type="submit" name="submit" id="submit">SIGN IN</button>
        
        <div id="errorMessage" class="error-message"></div>

        </div>
        <p>Don't have an account? <a href="register.php">Register</a></p>

    </form>
    </div>

    
</body>
</html>

<script>
        // JavaScript function to toggle password visibility
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>


<?php
session_start();

include_once("connection.php");

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM account WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    
    if ($result->num_rows == 1) {
        
        $_SESSION['username'] = $username;
       
        header("Location: landingpage.php");
        exit();
    } else {
        
        echo '<script>
                document.getElementById("errorMessage").innerHTML = "Invalid email or password. Please try again.";
            </script>';
    }

    $con->close();
}
    
?>