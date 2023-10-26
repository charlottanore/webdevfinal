<!DOCTYPE html>
<html>
<head>
    <h1>PieChart Of Activities</h1>
    <style>
        .h1{
            text-align: center;
        }
        body {
            background-image: url('dirty.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color: black; /* Set text color to black */
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
        }

        #genderPieChart {
            width: 400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.7); /* Add a semi-transparent white background */
            border: 1px solid #eee; /* Add a light gray border */
            border-radius: 10px; /* Round the corners */
            padding: 20px;
        }

        a {
            text-decoration: none;
            color: black; /* Set link text color to black */
            font-weight: bold;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        a:hover {
            color: #333; /* Darken the link text color on hover */
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
    <title>Pie Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 400px; margin: 0 auto;">
        <canvas id="genderPieChart"></canvas>
    </div>

    <script>
        // Sample data for gender distribution
        const genderData = {
            labels: ['Male', 'Female'], // Show only 'Male' and 'Female'
            datasets: [{
                data: [40, 35], // You can replace these values with your actual data
                backgroundColor: ['#FF5733', '#3498DB'], // Colors for 'Male' and 'Female' segments
            }],
        };

        const ctx = document.getElementById('genderPieChart').getContext('2d');
        const genderPieChart = new Chart(ctx, {
            type: 'pie',
            data: genderData,
        });
    </script>
    <a href="all.html" style="color: black; text-decoration: none; font-weight: bold; text-align: center; font-size: 25px;">Back to Menu</a>
</body>
</html>
