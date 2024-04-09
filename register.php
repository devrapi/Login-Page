<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="form_container">
    <form method="POST" class="form" action="register.php">

        <h1>Register</h1>
        <label for="FullName"></label>
        <input placeholder="Enter your Full Name" type="text" name="FullName" id="FullName" required><br>

        <label for="username"></label>
        <input placeholder="Enter your username" type="text" name="username" id="username" required><br>

        <label for="email"></label>
        <input placeholder="Enter your email" type="email" name="email" id="email" required><br>

        <label for="password"></label>
        <input placeholder="Enter your password" type="password" name="password" id="password" required><br>

        <label for="cpassowrd"> </label>
        <input placeholder="Confirm your password" type="password" name="cpassowrd" id="cpassowrd" required><br>

        <div id="errorMessage" class="error-message"></div>


        <button type="submit" name="register" id="register">SIGN UP</button>

        <p>Already have an account? <a href="index.php">Login</a></p>
    </form>
</div>
 
</body>
</html>

<?php
    include_once("connection.php");

    if (isset($_POST['register'])) {

        $FullName = $_POST['FullName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassowrd = $_POST['cpassowrd'];

        $sql = "INSERT INTO account (Full_Name, Username, Email, Password) VALUES ('$FullName', '$username', '$email', '$password')";

        if ($con->query($sql) === TRUE) {
            if ($password == $cpassowrd) {
                header("Location: index.php");
                echo "Registered successfully";
            }else{
                echo  '<script>
                document.getElementById("errorMessage").innerHTML = "Passwords do not match. Please try again.";
            </script>';
            }
           
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

    }


?>