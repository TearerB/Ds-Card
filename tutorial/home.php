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
$res_studentNumber = '';

$id = (int)$_SESSION['id']; // Ensure ID is treated as an integer
$query = mysqli_query($con, "SELECT * FROM registration WHERE id = $id");

if ($query) {
    $result = mysqli_fetch_assoc($query);
    if ($result) {
        $res_fullNames = htmlspecialchars($result['fullNames']);
        $res_email = htmlspecialchars($result['email']);
        $res_studentNumber = htmlspecialchars($result['studentNumber']);
        $res_id = (int)$result['id']; // Cast to int for safety
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
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            <?php 
            if (isset($res_id)) {
                echo "<a href='edit.php?id=$res_id'>Change Profile</a>";
            }
            ?>
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_fullNames; ?></b>, Welcome</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_email; ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And you are <b><?php echo $res_studentNumber; ?> years old</b>.</p> 
                </div>
            </div>
        </div>
    </main>
</body>
</html>
