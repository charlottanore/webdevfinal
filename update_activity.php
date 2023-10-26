<?php
// Establish a database connection (modify these settings)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sd208anore";

$conn = new mysqli($servername, $username, $password, $dbname);

    // Include your database connection code (e.g., dbutil.php)
    include_once("dbutil.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Activity</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        p {
            font-size: 16px;
            text-align: center;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }

        /* Style for the "Back" button */
        .back-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Activity</h1>
        <p class="success-message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get data from the form
                $activity_id = $_POST['edit_id'];
                $edit_Name = $_POST['edit_Name'];
                $edit_dateofActivity = $_POST['edit_dateofActivity'];
                $edit_timeofActivity = $_POST['edit_timeofActivity'];
                $edit_location = $_POST['edit_location'];
                $edit_ootd = $_POST['edit_ootd'];

                // Update the activity in the database
                $sql = "UPDATE update_activity SET 
                        Name = '$edit_Name',
                        dateofActivity = '$edit_dateofActivity',
                        timeofActivity = '$edit_timeofActivity',
                        location = '$edit_location',
                        ootd = '$edit_ootd'
                        WHERE id = $activity_id";

                if ($conn->query($sql) === TRUE) {
                    echo "Activity updated successfully.";
                } else {
                    echo "Error updating activity: " . $conn->error;
                }
            }
            ?>
        </p>
        
        <!-- Back button with class "back-button" -->
        <a class="back-button" href="announcement.php">Back</a>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
