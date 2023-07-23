<?php
  session_start(); // Start the session

  // Unset all session variables
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['role']);

  // Destroy the session
  session_destroy();

  // Redirect to the login page or any other desired page
  header("Location: ../");
  exit;
?>
