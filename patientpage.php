<?php
session_start();
require"dbconnection.php";
$sql="SELECT * FROM patients";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Page</title>
    <style>
        /* Styles for the navigation bar */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        .navbar a {
            margin-left: 1050px;
            text-align: right;
            color: #fff;
            margin-top: 10px;
        }

        /* Styles for the buttons */
        .button-container {
            margin: 50px;
            display: flex;
            justify-content: center;
            flex-direction: column; /* Align buttons vertically */
            align-items: center;
        }

        .button {
            padding: 10px 20px;
            background-color:#333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px;
        }

            .button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
<body>
    <!-- Navigation bar -->
    <div class="navbar">
        <h3></h3>
        <a href="patientlogin.php">LOGOUT</a>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    </div>
    <h1>Describe any symptoms</h1>
            <a href="addsymptoms.php" class="button">Add Symptoms</a>
        </div><br><br>
        <div class="prescription-txtbox">
            <p>Check prescription</p>
            <a href="checkprescription.php" class="button">View</a>
        </div><br><br>
        <div class="drug-admin">
            <p>View Administered Drugs</p>
            <a href="checkdrugs.php" class="button">Check Drugs</a>
        </div>
    </body>
</html>