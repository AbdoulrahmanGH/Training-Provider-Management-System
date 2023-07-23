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
$query = "INSERT INTO course_instructor VALUES (".$_GET['id'].",".$_SESSION['id'].",'Not Available')";
$enrolledResult = mysqli_query($connection, $query);



mysqli_close($connection);

header("Location: ../instructor/mycourse.php");
?>