<?php
function getCourses() {
   include '../dataconnection.php';

   $query = 'SELECT * FROM course';
   $result = mysqli_query($connect, $query);

   return $result;
}

function getCourse($id) {
   include '../dataconnection.php';

   $query = 'SELECT * FROM course WHERE course_id='.$id;
   $result = mysqli_query($connect, $query);

   return $result;
}

?>