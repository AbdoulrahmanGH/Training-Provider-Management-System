<?php
  include '../dataconnection.php';

  // Check if the course_id parameter is provided
  if (isset($_GET['course_id'])) {
    $courseId = $_GET['course_id'];

    // Delete records from courseinstructor table
    $deleteQuery = "DELETE FROM course_instructor WHERE course_id = $courseId";
    $deleteResult = mysqli_query($connect, $deleteQuery);

    if ($deleteResult) {
      // Deletion successful, proceed to delete the course
      $query = "DELETE FROM course WHERE course_id = $courseId";
      $result = mysqli_query($connect, $query);

      if ($result) {
        // Deletion successful
        header("Location: index.php?success=true");
        exit;
      } else {
        // Deletion failed
        header("Location: index.php?error=true");
        exit;
      }
    } else {
      // Deletion failed
      header("Location: index.php?error=true");
      exit;
    }
  } else {
    // Redirect if course_id parameter is not provided
    header("Location: index.php");
    exit;
  }
?>
