<!DOCTYPE html>
<html>
<head>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat;">
    <title>Update Announcement</title>
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

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #0074D9;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

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
        <h1>Update Announcement</h1>

        <?php
        // Include your database connection code (e.g., dbutil.php)
        include_once("dbutil.php");

        // Check if form data is submitted using POST method
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the announcement ID and updated data from the form
            $announcementId = $_POST['id'];
            $updatedTitle = $_POST['title'];
            $updatedContent = $_POST['content'];

            // Connect to the database
            $conn = getConnection();

            // Update the announcement in the database
            $sql = "UPDATE announcement SET title = '$updatedTitle', content = '$updatedContent' WHERE id = $announcementId";
            
            if ($conn->query($sql) === TRUE) {
                echo "Announcement updated successfully.";
            } else {
                echo "Error updating announcement: " . $conn->error;
            }

            // Close the database connection
            closeConnection($conn);
        } else {
            echo "Invalid request method.";
        }
        ?>
        <button class="back-button" onclick="window.location.href='announcement.php'">Back</button>
    </div>
</body>
</html>
