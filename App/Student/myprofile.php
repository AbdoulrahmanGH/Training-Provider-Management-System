<?php include("navbar.html") ?>

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
    <style>
        .profile-card {
    max-width: 600px; 
    position: relative;
    bottom: 150px;
    background: linear-gradient(#1c5054, #1c5c5c); 
    border-radius: 10px;
    padding: 40px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
    margin: 0 auto;
    font-family: 'Poppins', sans-serif;
  }
  
  .profile-pic {
    width: 200px; 
    height: 200px; 
    border-radius: 50%;
    margin: 0 auto;
    background-color: #ddd;
    background-image: url('img/profile-icon.png'); /* Replace with your own image */
    background-size: cover;
    background-position: center;
  }
  
  .profile-info {
    text-align: center;
    margin-top: 40px; /* Increased margin */
  }
  
  .profile-info h2 {
    color: #000;
    margin-bottom: 10px; /* Increased margin */
    font-weight: bold;
    font-size: 44px; /* Increased font size */
  }
  
  .profile-info p {
    color: #000;
    font-size: 24px; /* Increased font size */
    margin-bottom: 24px; /* Increased margin */
  }
  
  .profile-info p span {
    font-weight: bold;
  }
  
  .profile-info p i {
    margin-right: 10px; /* Increased margin */
  }
  
  @media (max-width: 768px) {
    .profile-card {
      max-width: 80%; /* Adjust width for smaller screens */
    }
  }
  
    </style>
</head>
<body>
    <div class="welcome-section">
        <div class="welcome-text">
            <h2 class="welcome-heading"> My Profile</h2><br><br>
            <p class='welcome-message'></p>
        </div>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "coursehive";

    $connection = new mysqli($servername, $username, $password, $database);
    $sql = "SELECT * FROM student";
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "
        <div class='profile-card'>
          <div class='profile-pic'></div>
          <div class='profile-info'>
            <h2>$row[student_username]</h2>
            <p><i class='fa fa-envelope'></i><span>Email:</span> $row[student_email]</p>
            <p><i class='fa fa-phone'></i><span>Phone:</span> $row[student_phone]</p>
            <p><i class='fa fa-calendar'></i><span>Date Of Birth:</span> $row[student_dob]</p>
          </div>
        </div>
        ";
    }
    ?>



</body>
</html>
