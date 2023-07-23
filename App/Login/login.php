<?php
session_start();
include '../dataconnection.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve entered username, password, and role from the form
  $enteredUsername = $_POST['username'];
  $enteredPassword = $_POST['password'];
  $role = $_POST['login-type'];

  // Search the database based on the entered role
  $result = mysqli_query($connect, "SELECT * FROM ".$role);
  $found = 0;

  for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    $row = mysqli_fetch_assoc($result);
    
    // Access individual column values using $row['column_name']
    $id = $row[$role.'_id'];
    $username = $row[$role.'_username'];
    $password = $row[$role.'_password'];

    // Check if value matches
    if ($username == $enteredUsername && $password == $enteredPassword) {
      $found = 1;

      // Assign session variables
      $_SESSION['id'] = $id;
      $_SESSION['username'] = $enteredUsername;
      $_SESSION['role'] = $role;

      // Redirect to appropriate page based on the role
      if ($role == 'trainingprovider') {
        header("Location: ../trainingprovider");
      } elseif ($role == 'student') {
        header("Location: ../student");
      } else {
        header("Location: ../instructor/allcourse.php");
      }
      exit(); // Terminate script after redirection
    }
  }

  // If no matching username and password found, redirect with error flag
  if ($found == 0) {
    header("Location: login.html?error=1");
    exit(); // Terminate script after redirection
  }
}
?>
