<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "coursehive";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// Check if the course is already enrolled
if ($_GET['a'] == "Not"){
    $query = "UPDATE course_instructor SET availability = 'Available' WHERE course_id=".$_GET['id']." AND instructor_id=".$_SESSION['id'];
} else{
    $query = "UPDATE course_instructor SET availability = 'Not Available' WHERE course_id=".$_GET['id']." AND instructor_id=".$_SESSION['id'];
}

echo $query;
$enrolledResult = mysqli_query($connection, $query);

mysqli_close($connection);

header("Location: ../instructor/mycourse.php");

?>