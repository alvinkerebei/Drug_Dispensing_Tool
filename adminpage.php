<?php
session_start();
require"dbconnection.php";
$sql="SELECT * FROM sysuser";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <style>
        /* Styles for the navigation bar */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url(background4.jpg);
            background-position: center;
            background-size: cover;
        }

        .navbar {
            background-color:darkgreen;
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
            background-color:black;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px;
        }

        .button:hover {
            background-color: #45a049;
        }
        .logo{
            position: absolute;
            top: 70px;
            left: 20px;
            width: 100px;
            height:auto;
        }
    </style>
</head>
<body>
    <img src="heisenberglogo.png" class="logo">
    <!-- Navigation bar -->
    <div class="navbar">
        <h3></h3>
        <a href="adminlogin.php">LOGOUT</a>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    </div>
        <div class="button-container">
            <h1>View Patients</h1>
            <a href="viewpatients.php" class="button">View</a>
        </div>
        <div class="button-container">
            <h1>View Doctors</h1>
            <a href="viewdoctors.php" class="button">View</a>
        </div>
        <div class="button-container">
            <h1>View Pharmacists</h1>
            <a href="viewpharmacists.php" class="button">View</a>
        </div>
        <div class="button-container">
            <h1>View Drugs</h1>
            <a href="viewdrugs.php" class="button">View</a>
        </div>
    </body>
</html>



