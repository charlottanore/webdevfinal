<!DOCTYPE html>
<html lang="en">
<head>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat; ">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activity</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #bfbfbf;
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
        text-align: center;
        margin: 20px 0;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #bfbfbf;
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    label {
        display: block;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        box-sizing: border-box;
    }

    input[type="submit"] {
        display: block;
        margin: 10px auto;
        padding: 10px 20px;
        background-color: #0074D9;
        color: white;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
<body>
    <div class="container">
        <h2>Edit Activity</h2>
        <!-- Form for editing activities -->
        <form method="post" action="update_activity.php">
            <!-- Include the activity ID -->
            <input type="hidden" name="edit_id" value="1"> <!-- Assuming '1' is the ID you want to edit -->
            <label for="edit_Name">Your Name:</label>
            <input type="text" id="edit_Name" name='edit_Name' required><br>

            <label for="edit_dateofActivity">Date:</label>
            <input type="date" id="edit_dateofActivity" name='edit_dateofActivity' required><br>

            <label for="edit_timeofActivity">Time:</label>
            <input type="time" id="edit_timeofActivity" name='edit_timeofActivity' required><br>

            <label for="edit_location">Location:</label>
            <input type="text" id="edit_location" name='edit_location' required><br>

            <label for="edit_ootd">OOTD:</label>
            <input type="text" id="edit_ootd" name='edit_ootd' required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
