<?php
session_start();

if (isset($_POST['confirm_logout']) && $_POST['confirm_logout'] === 'yes') {
    // User confirmed the logout, so proceed with logging out
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log Out</title>
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

        /* Center the buttons within the form */
        form {
            text-align: center;
        }
    </style>
</head>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat;">
<body>
    <div class="container">
        <p>Are you sure you want to log out?</p>
        <form method="post" action="">
            <input type="hidden" name="confirm_logout" value="yes">
            <!-- Center the buttons within the form -->
            <button class="back-button" type="submit">Yes</button>
            <a class="back-button" href="index.php">No</a>
        </form>
    </div>
</body>
</html>

