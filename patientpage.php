<!DOCTYPE html>
<html>
<head>
    <title>Heisenberg Drug Dispensing Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Heisenberg Drug Dispensing Tool</h1>
        <h2>Get well Soon :)</h2>
        


                
            </div>
        </form>
    </div>
</body>
</html>

<?php
require_once "dbconnection.php";

// Retrieve the data from the database
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Generate the HTML table headers
    echo "<table>";
    echo "<tr>";
    echo "<th>Patient_SSN</th>";
    echo "<th>Patient_Name</th>";
    echo "<th>Patient_Address</th>";
    echo "<th>Patient_Age</th>";
    echo "<th>Doctor_SSN</th>";
    echo "</tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Patient_SSN"] . "</td>";
        echo "<td>" . $row["Patient_Name"] . "</td>";
        echo "<td>" . $row["Patient_Address"] . "</td>";
        echo "<td>" . $row["Patient_Age"] . "</td>";
        echo "<td>" . $row["Doctor_SSN"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>