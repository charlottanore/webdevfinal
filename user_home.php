<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION['update_success']) && $_SESSION['update_success'] === true) {
    echo '<p style="color: green;">Activity updated successfully!</p>';
    // Reset the session variable
    unset($_SESSION['update_success']);
}

include_once("dbutil.php");

$conn = getConnection();

// Handle form submission for changing the order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changeOrder'])) {
    $orderOption = $_POST['orderOption'];
    $orderSql = ($orderOption === 'asc') ? 'ASC' : 'DESC';
    $sql = "SELECT * FROM user_activities ORDER BY date $orderSql";
} else {
    // Default query for ascending order
    $sql = "SELECT * FROM user_activities ORDER BY date ASC";
}

$result = $conn->query($sql);

// Handle form submission for activity actions
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['activityAction'])) {
    $activityId = $_POST['activityId'];
    $action = $_POST['set_activity'];

    switch ($action) {
        case 'cancel':
            // Handle 'Cancel' action
            // Your logic to update the database or perform other actions for canceling an activity
            // ...

            echo "<b style='font-size: 2rem;'>Activity canceled.</b>";
            break;

        case 'markDone':
            // Handle 'Mark Done' action
            // Your logic to update the database or perform other actions for marking an activity as done
            // ...

            echo '<span style="font-weight: bold; font-size: 30px;">Activity marked as done.</span>';
            break;
            
        case 'addRemarks':
            // Handle 'Add Remarks' action
            // Your logic to update the database or perform other actions for adding remarks to an activity
            // ...

            echo '<span style="font-weight: bold; font-size: 30px;">Remarks added to the activity.</span>';
            break;

        default:
            echo "Invalid action.";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'">
<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
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
            background-image: url('dirty.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Times New Roman';
            margin: 0;
            padding: 0;
            color: #333; /* Change the text color to a dark color */
        }

        h1 {
            font-size: 30px;
            text-align: center;
            padding: 20px;
        }

        form {
            width: 80%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 34%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
    }

        button[type="submit"],
        button[type="button"] {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #555;
        }

        h2 {
            font-size: 30px;
            margin: 20px 0;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #555;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Add more styles as needed */
        </style>
    </head>
    <body>
        </style>
    </head>
    <body>
    <div class="container">
        
        <h1>User Page</h1>
        
        <!-- Form to add a new activity -->
    <form id="addActivityForm" method='post' action='add_activity.php'>
            <label for="name">Your Name:</label> <!-- Updated column name -->
            <input type="text" id="userName" name='yourName' required><br>

            <label for="date">Date:</label>
            <input type="date" id="activityDate" name='dateofActivity' required><br>

            <label for="time">Time:</label>
        <input type="time" id="activityTime" name='timeofActivity' required><br>

        <label for="location">Location:</label>
        <input type="text" id="activityLocation" name='location' required><br>

        <label for="ootd">OOTD:</label>
        <input type="text" id="activityOOTD" name='ootd' required><br>

        <button type="submit" name='addActivity'>Add Activity</button>
    </form>

    <br>

    <!-- Dropdown for changing order -->
    <form method="post" action="">
        <label for="orderOption">Show All:</label>
        <select name="orderOption">
            <option value="asc">Ascending by Date</option>
            <option value="desc">Descending by Date</option>
        </select>
        <button type="submit" name="changeOrder">Change Order</button>
    </form>

    <!-- Display all activities based on selected order -->
<h2>All Activities</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>OOTD</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['user_name']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['time']?></td>
                <td><?php echo $row['location']?></td>
                <td><?php echo $row['ootd']?></td>
                <td>
                    <form method='post' action=''>
                        <input type='hidden' name='activityId' value='<?php echo $row['id']; ?>'>
                        <select name='set_activity' onchange="showRemarksField(this)">
                            <option value='cancel'>Cancel</option>
                            <option value='markDone'>Mark Done</option>
                            <option value='addRemarks'>Add Remarks</option>
                        </select>

                        <!-- Add the input field for remarks with an initial style of display:none -->
                        <input type='text' name='remarks' placeholder='Enter remarks' style='display:none;'>

                        <button type='submit' name='activityAction'>Submit</button>
                        <button type='button' onclick='editActivity(<?php echo $row['id']; ?>)'>Edit</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    function showRemarksField(selectElement) {
        var remarksField = selectElement.parentElement.querySelector('input[name="remarks"]');
        remarksField.style.display = (selectElement.value === 'addRemarks') ? 'block' : 'none';
    }
</script>



    <script>
        function editActivity(activityId) {
            // Redirect to the edit_activity.php page with the activity ID
            window.location.href = 'edit_act.php?id=' + activityId;
        }
    </script>
</body>
</html>