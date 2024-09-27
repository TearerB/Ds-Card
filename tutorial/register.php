<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body style="background-image: url('card2.jpg'); background-repeat: no-repeat;background-size: cover;">
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $fullNames = $_POST['fullNames'];
            $lastName = $_POST['lastName'];
            $idNumber = $_POST['idNumber'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $studentNumber = $_POST['studentNumber'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT email FROM registration WHERE email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO registration (fullNames,lastName,idNumber,phoneNumber,email,studentNumber,Password) VALUES('$fullNames','$lastName','$idNumber','$phoneNumber','$email','$studentNumber','$password')") or die("Error Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>

            <header>Sign Up</header>
            
            <form action="" method="post">
            <div class="two-forms">
                <div class="field input">
                    <label for="fullNames">Full Names</label>
                    <input type="text" name="fullNames" id="fullNames" autocomplete="off" required>
                    
                </div>

                <div class="field input">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" autocomplete="off" required>
                </div>
         </div>
                <div class="field input">
                    <label for="IdNumber">ID Number</label>
                    <input type="number" name="idNumber" id="idNumber" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="studentNumber">Student Number</label>
                    <input type="number" name="studentNumber" id="studentNumber" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phoneNumber" id="phoneNumber" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
                <a href="AboutUs/aboutUs.php">About Us</a> &emsp; <a href="ContactUs/contactUs.php">contact Us</a>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>