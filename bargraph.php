<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sd208anore"; // Replace with your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count activities for each month
$sql = "SELECT MONTH(date) AS month, COUNT(id) AS activity_count FROM user_activities GROUP BY MONTH(date)";

// Execute the query
$result = $conn->query($sql);

// Create arrays to store the months and activity counts
$months = array();
$activityCounts = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $months[] = date("F", mktime(0, 0, 0, $row["month"], 1));
        $activityCounts[] = $row["activity_count"];
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    
    <body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'">
    <title>Activity Bar Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container">
    <style>
                body {
            background-image: url('dirty.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Times New Roman';
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: rgba(0, 0, 0, 0.8); /* Change the background color to black with some transparency */
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        canvas {
            display: block;
            max-width: 100%;
            height: auto;
        }

    </style>
    <canvas id="activityChart" width="400" height="200"></canvas>
    <script>
        
        var ctx = document.getElementById('activityChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($months); ?>,
                datasets: [{
                    label: 'Activities',
                    data: <?php echo json_encode($activityCounts); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
</body>
</html>

