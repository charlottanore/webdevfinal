<!DOCTYPE html>
<html lang="en">
<head>
    <h1>
        Login
    </h1>
</head>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat;">
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #555;
}

.error {
    color: #f00;
    margin-top: 10px;
}

.success {
    color: #0a0;
    margin-top: 10px;
}

/* Center the form vertically and horizontally */
.center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
</style>


<?php
session_start();
include_once("dbutil.php");

$username = $_POST["email"];
$password = $_POST["password"];

$conn = getConnection();
$sql = "SELECT * FROM users WHERE email = '".$username."' AND password = '".$password."'";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();

    if ($row["email"] == $username && $row["password"] == $password) {
        if ($row["role"] == "admin") {
            header("Location: all.html");
        } else {
            header("Location: user_home.php");
        }
        $_SESSION["Role"] = $row["user"];
    } else {
        header("Location: user_home.php");
    }
} else {
    echo "Error executing SQL query: " . $conn->error;
}

closeConnection($conn);

?>