<?php
$connect = mysqli_connect("localhost", "root", "", "coursehive");

if (!$connect) {
   die('Could not connect to database: ' . mysqli_connect_error());
} else {
  //echo "Successfully connected to the database.<br>";
}


/*

$query = "SELECT * FROM trainingprovider";
$result = mysqli_query($connect, $query);

if ($result) {
  // Fetch and process each row of the query result
  for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    $row = mysqli_fetch_assoc($result);
    
    // Access individual column values using $row['column_name']
    $trainingProviderId = $row['training_provider_id'];
    $username = $row['training_provider_username'];
    $password = $row['training_provider_password'];
    
    // Perform further operations with the retrieved data
    echo "Training Provider ID: " . $trainingProviderId . "<br>";
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
    echo "<br>";
  }
} else {
  // Handle query error
  echo "Error executing the query: " . mysqli_error($connect);
}*/

?>
