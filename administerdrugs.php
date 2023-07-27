<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" contnt ="width=device-width, initial-scale=1.0">
    <title>PRESCRIBE PATIENT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <h2>PRESCRIBE</h2>
        <form class="" action="" method="POST">

            

            <label for="drugname">Drug Name : </label>
            <input type = "text" name="drugname" id="drugname" required><br><br>

            <label for="dosage">Dosage : </label>
            <input type = "text" name="dosage" id="dosage" required><br><br>

            <label for="quantity">Quantity : </label>
            <input type = "number" name="quantity" id="quantity" required><br><br>


            <label for="price">Price : </label>
            <input type = "number" name="price" id="price" required><br><br>

            <label for="patient_name">Patient Name : </label>
            <input type = "text" name="patient_name" id="patient_name" required><br><br>

            <button type= "submit" name="submit">Submit</button><BR><BR>

            <a href="pharmasearch.php">BACK</a>
        </form><br>
    </body>
</html>

<?php

require "dbconnection.php";

if(isset($_POST["submit"])){
    $Drug_Name = $_POST["drugname"];
    $Dosage = $_POST["dosage"];
    $Quantity = $_POST["quantity"];
    $Price =$_POST["price"];
    $patient_name=$_POST["patient_name"];
   
 $query = "INSERT INTO `drugsadministered` (`Drug_Name`,`Dosage`,`Quantity`,`Price`,`patient_name`) 
            VALUES ('$Drug_Name','$Dosage','$Quantity','$Price','$patient_name')";
 
 mysqli_query($conn,$query);
 
 if(!mysqli_query($conn,$query)){
    echo"<script>alert('Failed')</script>";
 }else{
    echo"<script>alert('Drug is Administered')</script>";
 }
} 


?>