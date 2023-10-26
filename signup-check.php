<?php
session_start();

include_once("dbutil.php"); // Add a semicolon here

$conn = getConnection();

$name = $_POST["name"];
$email = $_POST["email"]; // Add a semicolon here
$pass = $_POST["password"]; // Add a semicolon here
$role = $_POST["role"]; // Add a semicolon here
$gender = $_POST["gender"]; // Add a semicolon here

$sql = "INSERT INTO users (fullName, email, password, role, gender)
VALUES ('".$name."', '".$email."', '".$pass."', '".$role."', '".$gender."')"; // Add semicolons here

if ($conn->query($sql) === TRUE) {
    header("Location: index.html"); // Add a semicolon here and use a relative path
} else {
    header("Location: w3schools.com"); // Add a semicolon here and use a valid URL
}

closeConnection();
?>