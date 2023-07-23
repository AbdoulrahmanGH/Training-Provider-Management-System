<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Training Provider - Course Management</title>
  <link rel="stylesheet" href="css/tpstyles.css" />
  <script>
  function confirmDelete(cid) {
    if (confirm("Are you sure you want to delete?")) {
      window.location.href = "deleteCourse.php?course_id=" + cid;
    }
  }
</script>

</head>

<body>
  
<body>
<?php
if(isset($_GET['success'])){
  echo '<script>alert("Course deleted!");</script>';
}

if(isset($_GET['create'])){
  echo '<script>alert("Course Added!");</script>';
}

if(isset($_GET['update'])){
  echo '<script>alert("Course Updated!");</script>';
}

  session_start();
  // Access session variables
  $id = $_SESSION['id'];
  $username = $_SESSION['username'];
  $role = $_SESSION['role'];
?>
  <div class="navbar-container">
    <?php include 'navbar.html';?>
  </div>
  <div class="content-container">
    <h1 style="text-transform: none;">Hi <?php echo $username;?>!</h1>
    <div class="course-list">
      <?php
        include '../dataconnection.php';

        $query = 'SELECT * FROM course';
        $result = mysqli_query($connect, $query);
    
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
      <div class="course-item">

        <div class="course-image">
          <?php
          if ($row["course_img"] != ""): 
            echo "<img src=".$row['course_img']." alt='Classes Image' class='course-pic' />";
          else: 
            echo "<img src='img/classes.svg' alt='Classes Image' class='course-pic' />";
          endif; 
          ?>
        </div>

        
        <div class="course-description">
          <h2><?php echo $row["course_title"];?></h2>
          <p>
              <?php echo $row["course_description"];?>
          </p>
          <strong>Date</strong> : <?php echo $row["course_start_date"];?> - <?php echo $row["course_end_date"];?>
        </div>
        <div class="course-action">
          <p class="instructors">
            <strong>Instructors:</strong><br />
            <?php
              include '../dataconnection.php';

              $result2 = mysqli_query($connect,"SELECT instructor_username FROM instructor WHERE instructor_id IN (SELECT instructor_id FROM course_instructor WHERE course_id=".$row["course_id"].")");

              while ($row2 = mysqli_fetch_assoc($result2)) {
                echo $row2["instructor_username"]."<br>";
              }
            ?>
          </p>
          <a href="courseEdit.php?id=<?php echo $row["course_id"] ?>" class="edit-btn">Edit</a>
          <button onclick="confirmDelete(<?php echo $row['course_id'] ?>)" class="delete-btn">Delete</button>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</body>

</html>