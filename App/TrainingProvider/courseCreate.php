<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Training Provider - Course Management</title>
    <link rel="stylesheet" href="css/courseCreate.css" />

    <script>
      function success() {
        alert("Course has been added");
      }
    </script>
  </head>
  
  <body>
    <div class="navbar-container" >
      <?php include 'navbar.html';?>
    </div>

    <div class="content-container" >
      <h1>Create Course</h1>

        <div class="create-course">
          <form class="create-course-form" action="courseCreateHandler.php" method="POST">
            <label for="title">Title:</label><br />
            <input type="text" id="title" name="title" required /><br />

            <label for="description">Description:</label><br />
            <textarea
              id="description"
              name="description"
              rows="5"
              required
            ></textarea
            ><br />
            <div class="dates">
              <div>
                <label for="start-date">Start Date:</label><br />
                <input
                  type="date"
                  id="start-date"
                  name="start-date"
                  required
                /><br />
              </div>
              <div>
                <label for="end-date">End Date:</label><br/>
                <input type="date" id="end-date" name="end-date" required />
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
            <label for="img_link">Image Link:</label><br />
            <input type="text" id="img_link" name="img_link" required/><br/>

            <input type="submit" value="Create" />
          </form>
          <img id="bookImg" src="img/book.svg" alt="Book Image" class="book-image" />
        </div>
      </div>
    </div>

    <?php 
    if (isset($_GET['success']) && $_GET['success'] === 'true'): 
    ?>
      <script>
        success();
      </script>
    <?php
    endif;
  ?>
  </body>
</html>