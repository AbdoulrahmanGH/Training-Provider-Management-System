<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Training Provider</title>
    <link rel="stylesheet" href="css/courseCreate.css" />
  </head>

  <body>
    <?php
      // check if id is set
      include 'courses.php';
      if(isset($_GET["id"])){
        $result = getCourse($_GET["id"]);
        $row = mysqli_fetch_assoc($result);
      } else{
        return header('Location: index.php');
      }
    ?>
    <div class="navbar-container" >
      <?php include 'navbar.html';?>
    </div>

    <div class="content-container" >
      <h1>Edit Course </h1>

      <div class="create-course">
        <form class="create-course-form" action="courseEditHandler.php" method="POST">
          <input type="hidden" name="course_id" value="<?php echo $row["course_id"]?>" />
          <label for="title">Title:</label><br />
          <input type="text" id="title" name="title" required value="<?php echo $row["course_title"]?>"/><br />

          <label for="description">Description:</label><br />
          <textarea
            id="description"
            name="description"
            rows="5"
            required
          ><?php echo $row["course_description"]?></textarea><br />
          <div class="dates">
            <div>
              <label for="start-date">Start Date:</label><br />
              <input
                type="date"
                id="start-date"
                name="start-date"
                value=<?php echo $row["course_start_date"]?>
                required
              /><br />
            </div>
            <div>
              <label for="end-date">End Date:</label><br />
              <input type="date" id="end-date" name="end-date" value=<?php echo $row["course_start_date"]?> required />
              <br />
            </div>
          </div>
          <label for="instructors">Instructors:</label>
          <select id="instructors" name="instructors[]" multiple required>
          <?php
              include '../dataconnection.php';

              $query = "SELECT instructor_username FROM instructor";
              $result = mysqli_query($connect, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=".$row["instructor_username"].">".$row["instructor_username"]."</option>";
              }
            ?>
          </select>
          <input type="submit" value="Edit" />
        </form>
        <img src="img/book.svg" alt="Book Image" class="book-image" />
      </div>
    </div>

  </body>
</html>

