<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="style3.css">
 <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="stylesheet.css">



</head>
<body class="bg">

	<div class="con shadow">
		
		<h1>Bank Details of Student are:</h1>
	</div>

	<?php 



session_start();

include 'connection.php';

		$sql = "SELECT `firstName`, `lastName`, `birthDate`, `region`, `gender`, `religion`, `category`, `fatherName`, `motherName`, `income`, `institute`, `presentClass`, `presentCourse`, `classRoll`, `currentRoll`, `class12Pass`, `IFSC`, `ACnumber`, `Flag` FROM `details`  ";
			$retval = mysqli_query($con, $sql  );

				while($row = mysqli_fetch_assoc($retval))
				 {

				 	

				 	if($_SESSION['roll'] === $row["currentRoll"]){

				 		$_SESSION["name"] = $row["firstName"];


				 		$income= $row["income"];

				 		$class = $row["classRoll"];

				 		$IFSC = $row["IFSC"];

				 		$AC = $row["ACnumber"];



				 		// Store the cipher method 
$ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 

    // Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121';

// Store the decryption key 
$decryption_key = "Striker"; 




// Use openssl_decrypt() function to decrypt the data 
$decryption1=openssl_decrypt ($income, $ciphering,  
        $decryption_key, $options, $decryption_iv); 

// Use openssl_decrypt() function to decrypt the data 
$decryption2=openssl_decrypt ($class, $ciphering,  
        $decryption_key, $options, $decryption_iv);


// Use openssl_decrypt() function to decrypt the data 
$decryption3=openssl_decrypt ($IFSC, $ciphering,  
        $decryption_key, $options, $decryption_iv);


// Use openssl_decrypt() function to decrypt the data 
$decryption4=openssl_decrypt ($AC, $ciphering,  
        $decryption_key, $options, $decryption_iv);








				 		

				 		?>

				 			The Income is: 
				 		<?php

				 		echo $decryption1;

				 		?>

				 		<br>The ClassRoll is: 

				 		<?php 
				 		echo $decryption2;

				 		?>

				 		<br>The IFSC is:
				 		<?php


				 		echo $decryption3;

				 		?>

				 		<br> The account detail is :

				 		<?php

				 		echo $decryption4;








				 	}


				 }







	?>

	<div class="form-check bb">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="">Application Verified
  </label>
</div>
	<br><button class="btn btn-outline-primary">Submit</button>

</body>
</html>