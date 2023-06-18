<?php

require_once 'dbconnection.php';

if(isset($_POST['submit'])){

$Patient_SSN= $_POST['id'];
$Patient_Name = $_POST['name'];
$Patient_Address = $_POST['address'];
$Patient_Age = $_POST['age'];
$Doctor_SSN = $_POST['doc_id'];

// Prepare the SQL statement
$query = "INSERT INTO `patients`(`Patient_SSN`, `Patient_Name`, `Patient_Address`, `Patient_Age`, `Doctor_SSN`) 
        VALUES ('$Patient_SSN','$Patient_Name','$Patient_Address','$Patient_Age','$Doctor_SSN')";


// Execute the query
$run = mysqli_query($conn,$query);

if($run){
    echo' Added';
}else{
    echo"Error" .$sql;
}
}
// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create New User</title>
</head>
<body>
    <h1>Create New User</h1>
    <form action="addpatients.php" method="POST">
        
        <input type="number" name="id" required placeholder="ID NO."><br><br>      
      
        <input type="text" name="name"  required placeholder="Name"><br><br>
      
        <input type="text" name="address" required placeholder="Address"><br><br>
       
        <input type="number" name="age"  required placeholder="Age:"><br><br>
       
        <input type="number" name="doc_id" required placeholder="Doctor ID"><br><br>
        
        <input type="submit" name='submit' value="Create">
    </form>
</body>
</html>
