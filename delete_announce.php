<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Announcement</title>
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
        <h1>Delete Announcement</h1>
        <p class="success-message">
            <?php
            // Include your database connection code (e.g., dbutil.php)
            include_once("dbutil.php");

            // Check if an announcement ID is provided in the URL
            if (isset($_GET['id'])) {
                // Get the announcement ID from the URL
                $announcementId = $_GET['id'];

                // Connect to the database
                $conn = getConnection();

                // Query to delete the announcement based on the provided ID
                $sql = "DELETE FROM announcement WHERE id = $announcementId";
                
                if ($conn->query($sql) === TRUE) {
                    echo "Announcement deleted successfully.";
                } else {
                    echo "Error deleting announcement: " . $conn->error;
                }

                // Close the database connection
                closeConnection($conn);
            } else {
                echo "Invalid announcement ID.";
            }
            ?>
        </p>
        
        <!-- Back button with class "back-button" -->
        <a class="back-button" href="announcement.php">Back</a>
    </div>
</body>
</html>
