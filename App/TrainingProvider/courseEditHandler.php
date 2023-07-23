<?php
  include '../dataconnection.php';

  $courseid = $_POST['course_id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $start = $_POST['start-date'];
  $end = $_POST['end-date'];
  $instructor = $_POST['instructors'];

  // Update course information
  $query = "UPDATE course SET course_title = '$title', course_description = '$description', course_start_date = '$start', course_end_date = '$end' WHERE course_id = '$courseid'";
  echo $query;
  echo "<br>";
  $result = mysqli_query($connect, $query);

  // Update courseInstructor table
  // First, delete existing entries for the course
  $deleteQuery = "DELETE FROM course_instructor WHERE course_id = $courseid";
  $deleteResult = mysqli_query($connect, $deleteQuery);

  // Then, insert new instructor entries
  foreach ($instructor as $i) {
    $instructorIdQuery = "SELECT instructor_id FROM instructor WHERE instructor_username = '$i'";
    $instructorIdResult = mysqli_query($connect, $instructorIdQuery);
    $instructorIdRow = mysqli_fetch_assoc($instructorIdResult);
    $instructorId = $instructorIdRow['instructor_id'];

    $insertQuery = "INSERT INTO course_instructor (instructor_id, course_id) VALUES ($instructorId, $courseid)";
    $result = mysqli_query($connect, $insertQuery);
  }

  if ($result) {
    header("Location: index.php?update=true");
    exit;
  } else {
    echo "Failed to update the course.";
  }
?>

<?php echo json_encode($_POST); ?>
