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


        if(isset($_POST['submit'])){

          $username = mysqli_real_escape_string($con , $_POST['name']); 
          $roll = mysqli_real_escape_string($con , $_POST['roll']); 
          $Password = mysqli_real_escape_string($con , $_POST['password']);
          $repassword = mysqli_real_escape_string($con , $_POST['repassword']);

            $pass = password_hash($Password, PASSWORD_BCRYPT);
            $repass = password_hash($repassword, PASSWORD_BCRYPT);


            $rollquery = "SELECT * FROM login WHERE Roll = '$roll' ";

            $query = mysqli_query($con,$rollquery);

            $rollcount = mysqli_num_rows($query);


            if ($rollcount>0) {
                
                                ?>
                                <script >
                                    alert("Roll.no already exist");
                                </script>
                                <?php
            }


            else {
                
                if ($Password === $repassword) {
                    
                    $insertquery = "INSERT INTO login (Name,Roll,Password,repassword) VALUES('$username','$roll', '$pass','$repass')" ;   
                    $iquery = mysqli_query($con,$insertquery);

                    if ($iquery) {
                                

                                
                                ?>
                                <script >
                                    alert("registration succesful! ");
                                </script>
                                <?php
                            }
                            else {
                                ?>
                                <script >
                                    alert("Registration Notsuccesful");
                                </script>
                                <?php
                            }
                }
                
                else{
                                ?>
                                <script >
                                    alert("Password are not matching");
                                </script>
                                <?php
                }
            }

        }

     ?>



    <div class="center">
        <h2>REGISTRATION FORM</h2>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"> 
            <div class="text_box">
                <input type="text" name="name" value="" required>
                <span></span>
                <label>Name</label>
            </div>


            <div class="text_box">
                <input type="text" name="roll" value="" required>
                <span></span>
                <label>Roll Number</label>
            </div>


            <div class="text_box">
                <input type="password" name="password" value="" required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="text_box">
                <input type="password" name="repassword" value="" required>
                <span></span>
                <label>Confirm Password</label>
            </div>

            <input type="submit" name="submit" value="Register">
            <div class="login">Already Registered <a href="login.php">Login</a></div>

        </form>
    </div>
</body>
</html>