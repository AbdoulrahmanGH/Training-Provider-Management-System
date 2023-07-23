<?php
session_start();
include("navbar.html")
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="css/studentStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "coursehive";

$connection = new mysqli($servername, $username, $password, $database);
    $sql = "Select * from student";
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
       echo "
       
    <div class='welcome-section'>
    <div class='welcome-text'>
        <h2 class='welcome-heading'>Welcome Back, ".$_SESSION['username']."!</h2>
        <p class='welcome-message'>Achieve your goals and get back on track!</p>
        <a href='register-courses.php' class='my-courses-button'>Register Courses</a>
        &nbsp;&nbsp;&nbsp;
        <a href='mycourses.php' class='my-courses-button'>View My Courses</a>
    </div>
</div>
       ";
    }

?>





</body>
</html>