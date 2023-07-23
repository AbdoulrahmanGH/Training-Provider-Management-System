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

$courseId = $_GET['courseId'];

// Insert into course_student table
$insertSql = "INSERT INTO course_student (course_id, student_id ) VALUES ($courseId, $_SESSION['id'])";
if (mysqli_query($connection, $insertSql)) {
    echo "Enrollment successful.";
} else {
    echo "Error occurred during enrollment.";
}

mysqli_close($connection);
?>
