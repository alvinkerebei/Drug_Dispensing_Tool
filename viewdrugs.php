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
        <a class = "btn btn-primary" href = "/Drug_Dispensing_Tool/adddrugs.php" role="button">Add Drugs</a> <br>
           <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Drug Name</th>
                    <th>Quantity</th>
                    <th>Form of Administration</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once "dbconnection.php";
            // Retrieve the data from the database
            $sql = "SELECT * FROM drugs";
            $result = $conn->query($sql);
    
            if(!$result){
                die("Error: ".$conn->error);
            }

            while($row = $result->fetch_assoc()){
                echo"
                <tr>
                <td>$row[id]</td>
                <td>$row[Drug_Name]</td>
                <td>$row[Quantity]</td>
                <td>$row[Form_of_Administration]</td>
                <td>$row[Price]</td>
                <td>
                <a class = 'btn btn-primary btn-sm' href = '/Drug_Dispensing_Tool/editdrugs.php?id=$row[id]'>Edit</a> 
                <a class = 'btn btn-primary btn-sm' href = ''>Delete</a> 
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

