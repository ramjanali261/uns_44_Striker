<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

    <?php 

    include 'connection.php';


        if (isset($_POST['submit'])){

        $roll = mysqli_real_escape_string($con,$_POST['roll']);
        $password =  mysqli_real_escape_string($con,$_POST['password']);

        $roll_search = "SELECT * FROM  login WHERE Roll = '$roll'";

        $query = mysqli_query($con,$roll_search);

        $roll_count =  mysqli_num_rows($query);

        if($roll_count){

            $roll_pass = mysqli_fetch_assoc($query);

            $dp_pass = $roll_pass['Password'];

            $pass_decord = password_verify($password, $dp_pass);

            if($pass_decord){



                $_SESSION['roll'] = $roll;
                $_SESSION['password'] = $dp_pass;

                ?>
                <script >
                    
                    alert("connection");
                </script><?php

                

            }

            else{
                echo "wrong credentials";
                ?>
                <script>
                    alert("credentials doesnot match");
                </script><?php
            }

        }

    }



    ?>






    <div class="center">
        <h1>Student Login</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"> 

            <div class="text_box">
                <input type="text" name="roll"  required>
                <span></span>
                <label>Roll Number</label>
            </div>


            <div class="text_box">
                <input type="password" name="password"  required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="pass">Forgot Password?</div>
            <input type="submit" name="submit" value="Login">

            <div class="signup">Fresh Applicant  <a href="register.php">Register</a></div>
        </form>

    </div>
</body>
</html>