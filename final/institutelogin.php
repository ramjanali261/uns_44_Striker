<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

	<?php

	include 'connection.php';

        if(isset($_POST['submit'])){


        				$admin = mysqli_real_escape_string($con , $_POST['admin']);
			          $Password = mysqli_real_escape_string($con , $_POST['password']);

			          $pass = password_hash($Password, PASSWORD_BCRYPT);

			           $insertquery ="INSERT INTO `institute`(Admin, Password) VALUES ('$admin','$pass')";
			              $iquery = mysqli_query($con,$insertquery);



			              if ($iquery) {
                                

                                
                                ?>
                                <script >
                                    alert("registration succesful! ");
                                </script>
                                <?php
                            }

			      }

	?>



    <div class="center">
        <h2>REGISTRATION FORM</h2>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"> 
            <div class="text_box">



            	<div class="text_box">
                <input type="text" name="admin" value="" required>
                <span></span>
                <label>AdminId</label>
            </div>
            


            <div class="text_box">
                <input type="password" name="password" value="" required>
                <span></span>
                <label>Password</label>
            </div>

            
            <input type="submit" name="submit" value="Register">


        </form>
    </div>




</body>
</html>