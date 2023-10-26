<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sd208anore";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * From users";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Show Users</title>
</head>

<body>
    <body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'">
<body>
    <div class="container">
        <h1>Show All Users</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Gender</th>
                    <!-- <th>Status</th> -->
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <td><?php echo $row['fullName']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['role']?></td>
                        <td><?php echo $row['gender']?></td>
                        <td><button>Activate</button> / <button>Deactivate</button></td>
                   
                    </tr>
                <?php } while ($row = mysqli_fetch_assoc($result)) ?>
            </tbody>
        </table>

        <br>
        <a href="all.html">Back to Menu</a>

    </div>
</body>

</html>

<?php
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #bfbfbf;
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
        text-align: center;
        color: #333;
        margin: 0 0 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #e6e6e6;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f0f0f0;
        font-weight: bold;
        color: #333;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    button.deactivate {
        background-color: #dc3545;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    a:hover {
        color: #0056b3;
    }
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>

</html>