<!DOCTYPE html>
<html>
<head>
	<title></title>
				<!-- Latest compiled and minified CSS -->
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
</head>
<body>

	<div class="container text-center mt-4">
		<h1>Deshbord</h1>
	</div>

	<?php 

session_start();

include 'connection.php';

		$sql = "SELECT `firstName`, `lastName`, `birthDate`, `region`, `gender`, `religion`, `category`, `fatherName`, `motherName`, `income`, `institute`, `presentClass`, `presentCourse`, `classRoll`, `currentRoll`, `class12Pass`, `IFSC`, `ACnumber`, `Flag` FROM `details`  ";
			$retval = mysqli_query($con, $sql  );

				while($row = mysqli_fetch_assoc($retval))
				 {

					

					
					if($_SESSION['roll'] === $row["currentRoll"])
					{

				
						$a= $row["Flag"];
						if($a=== "zero")
						{
							
							?>
								<h2 class="second">Application under-process</h2>
							<?php
						}

						if($a ==="one")
						{
							?>
								<h2 class="third">Application verified</h2>
							<?php	
						}

						

					}
					


				}


	 ?>


	 <div class="container text-center mt-4">
	 	<h1><a href="Form.php">Application Form</a></h1>
	 </div>



	 




	 



</body>
</html>