<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style1.css">
    <title>Register</title>
</head>
<body>

    <?php

    include 'connection.php';

     ?>



    <div class="center">
        <h2>REGISTRATION FORM</h2>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"> 
            <div class="text_box">
                <input type="text" name="" value="" required>
                <span></span>
                <label>Name</label>
            </div>


            <div class="text_box">
                <input type="text" name="" value="" required>
                <span></span>
                <label>Roll Number</label>
            </div>


            <div class="text_box">
                <input type="password" name="" value="" required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="text_box">
                <input type="password" name="" value="" required>
                <span></span>
                <label>Confirm Password</label>
            </div>

            <input type="register" name="submit" value="Register">
            <div class="login">Already Registered <a href="#">Login</a></div>

        </form>
    </div>
</body>
</html>