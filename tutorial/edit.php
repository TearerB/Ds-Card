<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="profile.php"><img src="287.png" alt="logo" width="120px" height="120px"style="position:absolute;top:-20px;left:0px;"></p>
            <span>DC Card </span></a>
        </div>

        <div class="right-links">
        <a href="AboutUs/aboutUs.php">About Us</a> &emsp; <a href="ContactUs/contactUs.php">contact Us</a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $fullNames = $_POST['fullNames'];
                $email = $_POST['email'];
                $phoneNumber = $_POST['phoneNumber'];
                $certificate = $_POST['certificate'];
                $campus = $_POST['campus'];
                $course = $_POST['course'];
                $year = $_POST['year'];


                $file_name = $_FILES['image']['name'];
                $tempname = $_FILES['image']['tmp_name'];
                $folder = 'images/'.$file_name;

                $query = mysqli_query($con, "Insert into registration (file) values ('$file_name')");

                if(move_uploaded_file($tempname, $folder)){

                    echo "<h2>File uploaded successfully</h2>";

                }else{
                    echo "<h2>File NOT uploaded</h2>";
                }


                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE registration SET fullNames='$fullNames', email='$email', certificate='$certificate', campus='$campus', course='$course', file='$file_name', year='$year', phoneNumber='$phoneNumber' WHERE id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='profile.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM registration WHERE id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_fullNames = $result['fullNames'];
                    $res_email = $result['email'];
                    $res_phoneNumber = $result['phoneNumber'];
                    $res_certificate = $result['certificate'];
                    $res_campus = $result['campus'];
                    $res_course = $result['course'];
                    $res_year = $result['year'];
                    $file_name= $result['file'];
                }

            ?>
            <header>Change Profile</header>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="field input">
                    <label for="username">Full Names</label>
                    <input type="text" name="fullNames" id="fullNames" value="<?php echo $res_fullNames; ?>" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="email">Certificate</label>
                    <input type="text" name="certificate" id="certificate" value="<?php echo $res_certificate; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Campus</label>
                    <input type="text" name="campus" id="campus" value="<?php echo $res_campus; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Course</label>
                    <input type="text" name="course" id="course" value="<?php echo $res_course; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Year</label>
                    <input type="text" name="year" id="year" value="<?php echo $res_year; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Phone Number</label>
                    <input type="number" name="phoneNumber" id="phoneNumber" value="<?php echo $res_phoneNumber; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="username">Upload your picture</label>
                    <input type="file" name="image" id="fullNames" autocomplete="off" required>
                </div>
                
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>