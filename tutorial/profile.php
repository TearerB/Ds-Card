<?php 
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
}

// Initialize variables to avoid undefined variable warnings
$res_fullNames = '';
$res_email = '';
$res_lastName = '';
$res_certificate = '';
$res_campus = '';
$res_course = '';


$id = (int)$_SESSION['id']; // Ensure ID is treated as an integer
$query = mysqli_query($con, "SELECT * FROM registration WHERE id = $id");

if ($query) {
    $result = mysqli_fetch_assoc($query);
    if ($result) {
        $res_fullNames = htmlspecialchars($result['fullNames']);
        $res_lastName = htmlspecialchars($result['lastName']);
        $res_idNumber = (int)$result['idNumber'];
        $res_phoneNumber = htmlspecialchars($result['phoneNumber']);
        $res_email = htmlspecialchars($result['email']);
        $res_studentNumber = (int)$result['studentNumber'];
        $res_id = (int)$result['id']; // Cast to int for safety
        $res_certificate = htmlspecialchars($result['certificate']);
        $res_campus = htmlspecialchars($result['campus']);
        $res_course = htmlspecialchars($result['course']);
        $res_year = (int)$result['year'];
    
    } else {
        echo "No user found.";
    }
} else {
    // Handle the case where the query fails
    echo "Error fetching data from the database: " . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- ===== ===== Custom Css ===== ===== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">

    <!-- ===== ===== Remix Font Icons Cdn ===== ===== -->
    <link rel="stylesheet" href="fonts/remixicon.css">
</head>

<body style="background-color:rgb(119, 119, 240);">
    <!-- ===== ===== Body Main-Background ===== ===== -->
    <span class="main_bg"></span>


    <!-- ===== ===== Main-Container ===== ===== -->
    <div class="container">

        <!-- ===== ===== Header/Navbar ===== ===== -->
        <header>
            <div class="brandLogo">
                <figure><img src="287.png" alt="logo" width="160px" height="160px"style="position:absolute;top:-20px;left:0px;"></figure>
                <span>DC Card </span>
            </div>
        </header>


        <!-- ===== ===== User Main-Profile ===== ===== -->
        <section class="userProfile card">
            <div class="profile">
                <?php
                    $res = mysqli_query($con, "select * from registration WHERE id = $id");
                    while($row = mysqli_fetch_assoc($res)){
                        
                        ?>
                <figure><img src="images/<?php echo $row['file']?>" alt="profile" width="250px" height="250px"></figure>
                    <?php } ?>  
            </div>
        </section>

        <!-- ===== ===== Work & Skills Section ===== ===== -->
        <section class="work_skills card">

            <!-- ===== ===== Work Contaienr ===== ===== -->
            <div class="work">
                <h1 class="heading">Profile</h1>
				 <h1 class="name"><?php echo $res_fullNames; ?>  <?php echo $res_lastName; ?></h1><br>
				<div class="details">
					<a><?php echo $res_idNumber; ?> </a><br>
                    <a><?php echo $res_studentNumber; ?></a><br>
					<a><?php echo $res_email; ?></a><br>
					<a>0<?php echo $res_phoneNumber; ?> </a>
					
                </div> 
                <br><br>
                <div class="right-links">
            <?php 
            if (isset($res_id)) {
                echo "<a href='edit.php?id=$res_id'>EDIT Profile</a>";
            }
            ?>
            <br><br><a href="php/logout.php"><button class="btn">Log Out</button></a>
            <br><br></div>
                <a href="AboutUs/aboutUs.php">About Us</a> &emsp; <a href="ContactUs/contactUs.php">contact Us</a>
            </div> 
        </section>


        <!-- ===== ===== User Details Sections ===== ===== -->
        <section class="userDetails card">
            <div class="userName">
			
                <h1 class="name"><?php echo $res_certificate; ?></h1><br>
                
				<div class="details">
				<a><?php echo $res_campus; ?></a><br>
					<a><b>Faculty</b></a><br>
					<a><?php echo $res_course; ?></a><br>
					<a><?php echo $res_year; ?></a>
					
                </div>
            </div>

            <div class="rank">
              
                <span></span>
                <div class="rating">
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate underrate"></i>
                </div>
            </div>

            
        </section>


        <!-- ===== ===== Timeline & About Sections ===== ===== -->
        <section class="timeline_about card">
            <div class="tabs">
                <ul>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        <span>Digital Card</span>
                    </li>
                </ul>
            </div>

<div class="digital-card" style="position: relative; top:-90px;" >
    <form id="studentForm">
        <h1 id="studentName" style="display: none;"><?php echo htmlspecialchars($res_fullNames); ?> <?php echo htmlspecialchars($res_lastName); ?></h1><br>
        <a id="studentNumber" style="display: none;"><?php echo htmlspecialchars($res_studentNumber); ?></a><br>
        <a id="schoolName" style="display: none;"><?php echo htmlspecialchars($res_campus); ?></a><br>
        <a id="schoolcourse" style="display: none;"><?php echo htmlspecialchars($res_course); ?></a><br>
        <input type="file" id="studentImage" accept="image/*"><br>
        <a id="year" style="display: none;"><?php echo htmlspecialchars($res_year); ?></a>

        <button type="button" onclick="generateCard()">Generate Card</button>
    </form>

    <div id="studentCard" style="width: 4.3in; height: 2.5in; border: 2px solid #000; padding: 10px; box-sizing: border-box; position: relative; background: url('backg.png') no-repeat center center; background-size: cover; border-radius: 15px; display: none;">
        <img id="logo" style="position: absolute; top: -10px; left: 10px; max-width: 100px;" src="287.PNG" alt="School Logo">
        <h2 style="position: absolute; left: 50px; top: 53px;">DS-Card</h2>
        <div id="cardDetails" style="position: relative; right: 10px; text-align: right;">
            <p id="cardName"></p>
            <p id="cardNumber"></p>
            <p id="cardcourse"></p>
            <p id="cardSchool"></p>
            <p id="cardyear"></p>
            <img id="cardImage" style="position: absolute; right: 0px;  top: 105px; display: block; margin-left: auto;" alt="Student Image"><br>
        </div>
        <svg id="barcode" style="position: absolute; left: 10px;"></svg>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jspdf/dist/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

<script>
    function generateCard() {
        const studentName = document.getElementById('studentName').textContent.trim();
        const studentNumber = document.getElementById('studentNumber').textContent.trim();
        const schoolName = document.getElementById('schoolName').textContent.trim();
        const schoolcourse = document.getElementById('schoolcourse').textContent.trim();
        const year = document.getElementById('year').textContent.trim();
        const studentImage = document.getElementById('studentImage').files[0];

        if (studentName && studentNumber && schoolName && schoolcourse && year && studentImage) {
            // Generate barcode
            JsBarcode("#barcode", studentNumber, {
                format: "CODE39",
                displayValue: false,
                width: 1.3,
                height: 70
            });

            // Display details
            document.getElementById('cardName').innerHTML = "Name  :  <strong>" + studentName + "</strong>";
            document.getElementById('cardNumber').innerHTML = "Student Number  :  <strong>" + studentNumber + "</strong>";
            document.getElementById('cardcourse').innerHTML = "Course  :  <strong>" + schoolcourse + "</strong>";
            document.getElementById('cardSchool').innerHTML = "School: <strong>" + schoolName + "</strong>";
            document.getElementById('cardyear').innerHTML = "Year  :  <strong>" + year + "</strong>";

            // Display image
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('cardImage').src = e.target.result;
            };
            reader.readAsDataURL(studentImage);

            // Show the student card
            document.getElementById('studentCard').style.display = 'block';
        } else {
            alert('Please EDIT to complete you profile and upload your photo above.');
        }
    }
</script>



   
            </div>
        </section>
    </div>
   
</body>

</html>

