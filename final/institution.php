<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php

	include 'connection.php';


        if (isset($_POST['submit'])){

       $roll = mysqli_real_escape_string($con,$_POST['roll']);
       $UserId = mysqli_real_escape_string($con,$_POST['UserId']);
        $password =  mysqli_real_escape_string($con,$_POST['password']);


                $UserId_search = "SELECT * FROM  institute WHERE Admin = '$UserId'";

                   $query = mysqli_query($con,$UserId_search);

       				 $UserId_count =  mysqli_num_rows($query);

       				         if($UserId_count){

            $UserId_pass = mysqli_fetch_assoc($query);

            $dp_pass = $UserId_pass['Password'];

            $pass_decord = password_verify($password, $dp_pass);

            if($pass_decord){



                $_SESSION['roll'] = $roll;
            
                    
                    header('location:details.php');

            }

            else{
            
                ?>
                <script>
                    alert("incorrect password");
                </script><?php
            }

        }






    }

?>

		  <div class="center">
        <h1>Institute Login</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"> 

            <div class="text_box">
                <input type="text" name="roll"  required>
                <span></span>
                <label>Roll Number Of Applicant</label>
            </div>


            <div class="text_box">
                <input type="text" name="UserId"  required>
                <span></span>
                <label>Admin UserId</label>
            </div>


            <div class="text_box">
                <input type="password" name="password"  required>
                <span></span>
                <label>Admin Password</label>
            </div>

            
            <input type="submit" name="submit" value="Login">

           
        </form>

    </div>

</body>
</html>