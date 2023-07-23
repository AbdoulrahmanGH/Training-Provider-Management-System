<?php
  include '../dataconnection.php';

  $title = $_POST['title'];
  $description = $_POST['description'];
  $start = $_POST['start-date'];
  $end = $_POST['end-date'];
  $instructor = $_POST['instructors'];
  $img = $_POST['img_link'];
  
  // Insert into Course Table
  $query = "INSERT INTO course (course_title, course_description, course_start_date, course_end_date, course_img) VALUES ('$title', '$description', '$start', '$end', '$img');";
  $result = mysqli_query($connect, $query);
  
  $result2 = mysqli_query($connect, "SELECT LAST_INSERT_ID();");
  $row = mysqli_fetch_row($result2);
  $courseid = $row[0];

  // Insert into courseInstructor table
  foreach ($instructor as $i) {
    $result = mysqli_query($connect, "INSERT INTO course_instructor (instructor_id, course_id, availability) VALUES ((SELECT instructor_id FROM instructor WHERE instructor_username='".$i."'), ".$courseid.", 'Not Available')");
  }
  
  if ($result) {
    header("Location: index.php?create=true"); // Redirect back to the course creation page with a success parameter
    exit;
  } else {
      echo "Failed to add the course.";
  }
?>

<?php echo json_encode($_POST); ?>