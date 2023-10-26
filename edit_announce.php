<!DOCTYPE html>
<html>
<head>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat;">
    <title>Edit Announcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
    </style>
</head>
<body>
    <h1>Edit Announcement</h1>

    <?php
    // Include your database connection code (e.g., dbutil.php)
    include_once("dbutil.php");

    // Check if an announcement ID is provided in the URL
    if (isset($_GET['id'])) {
        // Get the announcement ID from the URL
        $announcementId = $_GET['id'];

        // Connect to the database
        $conn = getConnection();

        // Query to fetch the announcement based on the provided ID
        $sql = "SELECT title, content FROM announcement WHERE id = $announcementId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the announcement data
            $row = $result->fetch_assoc();
            $title = $row["title"];
            $content = $row["content"];

            // Display the form to edit the announcement
            ?>
            <form action="update_announce.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $announcementId; ?>">
                <label for="title">Announcement Title:</label>
                <input type="text" name="title" value="<?php echo $title; ?>" required><br>
                <label for="content">Announcement Content:</label>
                <textarea name="content" required><?php echo $content; ?></textarea><br>
                <button type="submit">Update Announcement</button>
            </form>
            <?php
        } else {
            echo "Announcement not found.";
        }

        // Close the database connection
        closeConnection($conn);
    } else {
        echo "Invalid announcement ID.";
    }
    ?>
</body>
</html>
