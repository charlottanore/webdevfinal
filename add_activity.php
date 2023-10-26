<?php
session_start();

include_once("dbutil.php");

$conn = getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST['yourName'];
    $date = $_POST['dateofActivity'];
    $time = $_POST['timeofActivity'];
    $location = $_POST['location'];
    $ootd = $_POST['ootd'];

    // Insert new activity into the database
    $sql = "INSERT INTO user_activities (user_name, date, time, location, ootd) VALUES ('$name', '$date', '$time', '$location', '$ootd')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array());
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error adding activity: ' . $conn->error));
    }

    // Close the database connection
    closeConnection($conn);
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
}
?>

<br>
    <a href="user_home.php" class="menu-link">Back to Menu</a>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
  /* Define a CSS class for the link */
  .menu-link {
    text-decoration: none; /* Remove underlines from links */
    color: #000; /* Change the link color to black */
    font-weight: bold; /* Make the text bold */
    font-size: 24px; /* Set the font size to maximize the text */
  }

  /* Define a hover effect for the link */
  .menu-link:hover {
    color: #333; /* Change the link color on hover */
  }
</style>
</style>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat; ">
</body>
</html>