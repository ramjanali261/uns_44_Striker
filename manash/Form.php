<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship_Student_Reg_Portal</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
            <?php

                include 'connection.php';

                if(isset($_POST['submit'])){

                    $First_Name = mysqli_real_escape_string($con , $_POST['First_Name']);
                    $Last_Name = mysqli_real_escape_string($con , $_POST['Last_Name']);
                    $DOB = mysqli_real_escape_string($con , $_POST['DOB']);
                    $gender = mysqli_real_escape_string($con , $_POST['gender']);
                    $relegion = mysqli_real_escape_string($con , $_POST['relegion']);
                    $category = mysqli_real_escape_string($con , $_POST['category']);
                    $Father_Name = mysqli_real_escape_string($con , $_POST['Father_Name']);
                    $Mother_Name = mysqli_real_escape_string($con , $_POST['Mother_Name']);
                    $Income = mysqli_real_escape_string($con , $_POST['Income']);
                    $Institute_Name = mysqli_real_escape_string($con , $_POST['Institute_Name']);
                    $course = mysqli_real_escape_string($con , $_POST['course']);
                    $course_year = mysqli_real_escape_string($con , $_POST['course_year']);
                    $Roll_No = mysqli_real_escape_string($con , $_POST['Roll_No']);
                    $Board_Name = mysqli_real_escape_string($con , $_POST['Board_Name']);
                    $Year_Of_Passing = mysqli_real_escape_string($con , $_POST['Year_Of_Passing']);
                    $IFSC_Code = mysqli_real_escape_string($con , $_POST['IFSC_Code']);
                    $Bank_Account_Number = mysqli_real_escape_string($con , $_POST['Bank_Account_Number']);



                                // Store the cipher method 
$ciphering = "AES-128-CTR";

                        // Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0;


$encryption_iv = '1234567891011121';

// Store the encryption key 
$encryption_key = "GeeksforGeeks";

    
    // Store a string into the variable which 
    // need to be Encrypted
$simple_string1 = $Roll_No;

$simple_string2 = $Income;

$simple_string3 = $IFSC_Code;

$simple_string4 = $Bank_Account_Number;

// Use openssl_encrypt() function to encrypt the data 
$encryption1 = openssl_encrypt($simple_string1, $ciphering, $encryption_key, $options, $encryption_iv);

$encryption2 = openssl_encrypt($simple_string2, $ciphering, $encryption_key, $options, $encryption_iv);

$encryption3 = openssl_encrypt($simple_string3, $ciphering, $encryption_key, $options, $encryption_iv);

$encryption4 = openssl_encrypt($simple_string4, $ciphering, $encryption_key, $options, $encryption_iv);



          $insertquery =  "INSERT INTO details(firstName, lastName, birthDate,  gender, religion, category, fatherName, motherName, income, institute, presentClass, presentCourse, classRoll, bordsRoll, class12Pass, IFSC, ACnumber) VALUES ('$First_Name','$Last_Name','$DOB','$gender','$relegion','$category','$Father_Name','$Mother_Name','$encryption2','$Institute_Name','$course','$course_year','$encryption1','$Board_Name','$Year_Of_Passing','$encryption3','$encryption4')";
                    
          $iquery = mysqli_query($con,$insertquery);

                            if ($iquery) {

                                    
                                    

                                    
                                ?>
                                <script >
                                    alert("Sign up succesful");

                                </script>
                                <?php
                            }
                            else {
                                ?>
                                <script >
                                    alert("Sign up notsuccesful");
                                </script>
                                <?php
                            }








                }
            ?>






    <!-- #################  OUTER BOX  ################  -->
    <div class="outer_box">
        <h1 id="application" style="color: black;">Application Form</h1>


        <!-- ###################### GENERAL INFORMATION ##############  -->
        


            <!-- ************** PHOTO ************  -->
            <div class="icon">
                <input type="image" src="images/icon.png" alt="Submit"><br>
                <!-- <label for="First_Name">Upload photo:</label> -->
            </div>


            <h2 style="color: black;"><u>General Information</u></h2>


            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

                <!-- **************FIRST NAME************  -->
                <div class="form-group">
                    <label for="First_Name">First Name:</label>
                    <input type="text" id="First_Name" name="First_Name" required>
                </div>

                <!-- ******************LAST NAME************  -->
                <div class="form-group">
                    <label for="Last_Name">Last Name:</label>
                    <input type="text" id="Last_Name" name="Last_Name" required>
                </div>

                <!-- *************** DATE OF BIRTH ************ -->
                <div class="form-group">
                    <label for="DOB">Birthday:</label>
                    <input type="date" id="DOB" name="DOB" placeholder="10/11/2000" required>
                </div>

                <!-- ********************* GENDER*************************  -->
                <div>
                    <label for="Gender">Gender:</label><br>
                    <class class="radio-container">

                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label><br>

                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label><br>

                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                    </class>
                </div>

                <!-- ******************** RELIGION ************************** -->
                <div class="form-group">
                    <label for="Religion">Religion:</label>
                    <input list="Religion" placeholder="Choose your option" name="relegion">
                    <datalist id="Religion">
                        <option name="relegion" value="Hindu"></option>
                        <option name="relegion" value="Muslim"></option>
                        <option name="relegion" value="Christian"></option>
                        <option name="relegion" value="Sikh"></option>
                        <option name="relegion" value="Parsi"></option>
                        <option name="relegion" value="Jain"></option>
                        <option name="relegion" value="Buddhist"></option>
                        <option name="relegion" value="Others"></option>
                    </datalist>
                </div>

                <!-- ******************* CATEGORY **************  -->
                <div class="form-group">
                    <label for="Category">Community/Category:</label>
                    <input list="Category" required name="category">
                    <datalist id="Category">
                        <option name="category" value="SC"></option>
                        <option name="category" value="ST"></option>
                        <option name="category" value="OBC"></option>
                        <option name="category" value="GENERAL"></option>
                        <option name="category" value="ST-PVGT"></option>
                        <option name="category" value="APST"></option>
                    </datalist>
                </div>

                <!-- **************FATHER NAME************  -->
                <div class="form-group">
                    <label for="Father_Name">Father Name:</label>
                    <input type="text" id="Father_Name" name="Father_Name">
                </div>

                <!-- **************MOTHER NAME************  -->
                <div class="form-group">
                    <label for="Mother_Name">Mother Name:</label>
                    <input type="text" id="Mother_Name" name="Mother_Name">
                </div>

                <!-- **************INCOME************  -->
                <div class="form-group">
                    <label for="Income">Annual Family Income:</label>
                    <input type="number" id="Income" name="Income" required>
                </div>
            
        


        <!-- ########################### ACADEMIC DETAILS ################ -->
        
            <h2 style="color: black;"><u>Academic Details</u></h2>
        
                <!-- **************INSTITUTE NAME************  -->
                <div class="form-group">
                    <label for="Institute_Name">Institute Name:</label>
                    <input type="text" id="Institute_Name" name="Institute_Name" required>
                </div>

                <!-- **************PRESENT CLASS/COURSE************  -->
                <div class="form-group">
                    <label for="course">Present Class/Course:</label>
                    <input type="text" id="course" name="course" required>
                </div>

                <!-- **************PRESENT CLASS/COURSE YEAR************  -->
                <div class="form-group">
                    <label for="course_year">Present Class/Course Year:</label>
                    <input type="number" id="course_year" name="course_year" required>
                </div>


                <!-- **************12th CLASS ROLL NO. ************  -->
                <div class="form-group">
                    <label for="Roll_No">12th Class Roll_No:</label>
                    <input type="number" id="Roll_No" name="Roll_No" required>
                </div>

                <!-- **************12th BOARD NAME ************  -->
                <div class="form-group">
                    <label for="Board_Name">12th Board_Name:</label>
                    <input type="text" id="Board_Name" name="Board_Name" required>
                </div>

                <!-- ************** YEAR OF PASSING ************  -->
                <div class="form-group">
                    <label for="Year_Of_Passing">12th Class Year Of Passing:</label>
                    <input type="number" id="Year_Of_Passing" name="Year_Of_Passing" required>
                </div>
            
        


        <!-- ########################### BANK DETAILS ################ -->
        
            <h2 style="color: black;"><u>Bank Details</u></h2>
            

                <!-- **************IFSC CODE************  -->
                <div class="form-group">
                    <label for="IFSC_Code">IFSC Code:</label>
                    <input type="text" id="IFSC_Code" name="IFSC_Code" required>
                </div>


                <!-- **************BANK ACCOUNT NUMBER************  -->
                <div class="form-group">
                    <label for="Bank_Account_Number">Bank Account Number:</label>
                    <input type="text" id="Bank_Account_Number" name="Bank_Account_Number" required>
                </div>

                <input type="submit" name="submit" value="Login">

            </form>
        </div>


        <!-- ########################### BUTTON ################ -->
        
</body>

</html>