<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" contnt ="width=device-width, initial-scale=1.0">
    <title>ADD DRUGS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <h2>ADD NEW DRUG</h2>
        <form class="" action="" method="POST">

            <label for="name">Drug Name : </label>
            <input type = "text" name="name" id="name" required><br><br>

            <label for="quantity">Quantity(in mg) : </label>
            <input type = "number" name="quantity" id="quantity" required><br><br>


            <label for="foa">Form of Administration : </label>
            <input type = "text" name="foa" id="foa" required><br><br>

            <label for="price">Price : </label>
            <input type = "number" name="price" id="price" required><br><br>

            <button type= "submit" name="submit">Register</button>
        </form><br>
    </body>
</html>

<?php

require "dbconnection.php";

if(isset($_POST["submit"])){
    $Drug_Name = $_POST["name"];
    $Quantity = $_POST["quantity"];
    $Form_of_Administration = $_POST["foa"];
    $Price = $_POST["price"];

    $Drug_Name=mysqli_real_escape_string($conn,$Drug_Name);

   
 $query = "INSERT INTO `drugs` (Drug_Name,`Quantity`,`Form_of_Administration`,`Price`) 
            VALUES ('$Drug_Name','$Quantity','$Form_of_Administration','$Price')";
 
 mysqli_query($conn,$query);

 if(mysqli_query($conn,$query)){
    echo"<script>alert('Drug is Added')</script>";
    header("Location: viewdrugs.php");
 }else{
    echo"<script>alert('Failed')</script>";
 }
}  


?>