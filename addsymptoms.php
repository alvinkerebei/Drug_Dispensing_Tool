<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" contnt ="width=device-width, initial-scale=1.0">
    <title>ADD SYMPTOMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <h2>DESCRIBE HOW YOU'RE FEELING</h2>
        <form class="" action="" method="POST">

            <label for="name">Name : </label>
            <input type = "text" name="name" id="name" required><br><br>

            <label for="symp1">Symptom 1 : </label>
            <input type = "text" name="symp1" id="symp1" required><br><br>

            <label for="symp2">Stmptom 2 : </label>
            <input type = "text" name="symp2" id="symp2" required><br><br>


            <label for="symp3">Symptom 3 : </label>
            <input type = "text" name="symp3" id="symp3" required><br><br>

            <button type= "submit" name="submit">Submit</button>
        </form><br>
    </body>
</html>

<?php
session_start();
require "dbconnection.php";

if(isset($_POST["submit"])){
    $symptom1 = $_POST["symp1"];
    $symptom2 = $_POST["symp2"];
    $symptom3 = $_POST["symp3"];
    $patient_name =$_POST["name"];

   
 $query = "INSERT INTO `symptoms` (`symptom1`,`symptom2`,`symptom3`,`patient_name`) 
            VALUES ('$symptom1','$symptom2','$symptom3','$patient_name')";
 
 mysqli_query($conn,$query);
 
 if(!mysqli_query($conn,$query)){
    echo"<script>alert('Failed')</script>";
 }else{
    echo"<script>alert('Symptom is Added<br>Await for diagnosis')</script>";
 }
} 


?>