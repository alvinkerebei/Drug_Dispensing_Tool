<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" contnt ="width=device-width, initial-scale=1.0">
    <title>Heisenberg Drug Dispensing Tool</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Heisenberg Drug Dispensing Tool</h1>
        <h2>Get well Soon :)</h2>
        <a class = "btn btn-primary" href = "/Drug_Dispensing_Tool/registerpatient.php" role="button">Add Patient</a> <br>
           <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once "dbconnection.php";
            // Retrieve the data from the database
            $sql = "SELECT * FROM patients";
            $result = $conn->query($sql);

            if(!$result){
                die("Error: ".$conn->error);
            }

            while($row = $result->fetch_assoc()){
                echo"
                <tr>
                <td>$row[Patient_SSN]</td>
                <td>$row[Patient_Name]</td>
                <td>$row[Patient_Address]</td>
                <td>$row[DateofBirth]</td>
                <td>$row[Email]</td>
                <td>$row[username]</td>
                <td>
                <a class = 'btn btn-primary btn-sm' href = '/Drug_Dispensing_Tool/editpatients.php?id=$row[Patient_SSN]'>Edit</a> 
                <a class = 'btn btn-primary btn-sm' href = '/Drug_Dispensing_Tool/deletepatients.php?id=$row[Patient_SSN]'>Delete</a> 
                </td>
            </tr>
                ";
            }
            ?>
               
            </tbody>
           </table>
    </div>
        </form>
    </div>
</body>
</html>

