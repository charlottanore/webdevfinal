<!DOCTYPE html>
<html>
<head>
    <title>Admin Announcements</title>
</head>
<body>
<div class="container">
    <style>
        .container {
        max-width: 1200px; /* Change the maximum width as needed */
        margin: 20px auto;
        padding: 20px;
        background-color: #bfbfbf;
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
        body {
            font-family: Arial, sans-serif;
            background-image: url('dirty.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        a.back-link {
            color: black;
            font-weight: bold;
            text-align: center;
            display: block;
            padding: 10px;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
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

        h2 {
            text-align: center;
            margin: 20px 0;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        div {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            margin: 10px 0;
            padding: 10px;
        }

        h3 {
            font-size: 18px;
        }

        p {
            font-size: 16px;
        }

        a.edit-link,
        a.delete-link {
            text-decoration: none;
            color: #0074D9;
            margin: 0 10px;
            font-weight: bold;
        }

        a.edit-link:hover,
        a.delete-link:hover {
            color: #0056b3;
        }

        /* Style for Edit and Delete links */
        .edit-link, .delete-link {
            text-decoration: none;
            color: #0074D9;
            margin: 0 10px;
            font-weight: bold;
        }

        .edit-link:hover, .delete-link:hover {
            color: #0056b3;
        }

        /* Style for the container div of Edit and Delete links */
        .edit-delete-links {
            text-align: center; /* Center the links within the div */
            margin-top: 10px; /* Add spacing between the content and the links */
        }
    </style>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat;">
    <h1>Manage Announcements</h1>

    <div class="container" style="position: relative;">

    <a href="logout.php" style="color: black; text-decoration: none; font-weight: bold; position: absolute; top: 10px; right: 10px;">Log Out</a>
    
    <!-- Form to create a new announcement -->
    <form action="create_announce.php" method="POST">
        <label for="title">Announcement Title:</label>
        <input type="text" name="title" required><br>
        <label for="content">Announcement Content:</label>
        <textarea name="content" required></textarea><br>
        <button type="submit">Create Announcement</button>
    </form>

    <!-- List of existing announcements with edit and delete options -->
    <h2>Existing Announcements</h2>
    <ul>
        <!-- PHP code to fetch and display announcements -->
        <?php
            // Include your database connection code (e.g., dbutil.php)
            include_once("dbutil.php");

            // Connect to the database
            $conn = getConnection();

            // Query to fetch announcements (adjust table and column names as needed)
            $sql = "SELECT id, title, content, created_at FROM announcement ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $announcementId = $row["id"];
                    $title = htmlspecialchars($row["title"]);
                    $content = htmlspecialchars($row["content"]);
                    $created_at = $row["created_at"];

                    // Display each announcement with edit and delete links
                    echo "<div>";
                    echo "<h3>$title</h3>";
                    echo "<p>$content</p>";
                    echo "<p>Created at: $created_at</p>";

                    // Wrap the Edit and Delete links in a div with a common class
                    echo "<div class='edit-delete-links'>";
                    echo "<a class='edit-link' href='edit_announce.php?id=$announcementId'>Edit</a>";
                    echo "<a class='delete-link' href='delete_announce.php?id=$announcementId'>Delete</a>";
                    echo "</div>";

                    echo "</div>";
                }
            } else {
                echo "No announcements found.";
            }

            // Close the database connection
            closeConnection($conn);
        ?>
    </ul>

    <br>
    <a href="all.html" style="color: black; text-decoration: none; font-weight: bold; text-align: center; font-size: 25px;">Back to Menu</a>
</body>
</html>
