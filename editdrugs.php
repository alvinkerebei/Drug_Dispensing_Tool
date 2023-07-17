<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" contnt ="width=device-width, initial-scale=1.0">
    <title>UPDATE DRUGS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
    </head>
    <body>
        <h2>UPDATE DRUG</h2>
        <form class="" action="" method="POST">
            <input type="hidden" name="id" id="id">

            <label for="newname">Drug Name : </label>
            <input type = "text" name="newname" id="newname" required><br><br>

            <label for="newquantity">Quantity(in mg) : </label>
            <input type = "number" name="newquantity" id="newquantity" required><br><br>


            <label for="newfoa">Form of Administration : </label>
            <input type = "text" name="newfoa" id="newfoa" required><br><br>

            <label for="newprice">Price : </label>
            <input type = "number" name="newprice" id="newprice" required><br><br>

            <button type= "submit" name="submit">Register</button>
        </form><br>
    </body>
</html>

<?php

require "dbconnection.php";

if(isset($_POST["submit"])){
    $Trade_Name = $_POST["id"];
    $newDrug_Name = $_POST["newname"];
    $newQuantity = $_POST["newquantity"];
    $newForm_of_Administration = $_POST["newfoa"];
    $newPrice = $_POST["newprice"];
}
   
 $query = "UPDATE `drugs` SET `Drug_Name`='$newDrug_Name',`Quantity`='$newQuantity',`Form_of_Administration`='$newForm_of_Administration',`Price`='$newPrice'
            WHERE `Trade_Name`='$Trade_Name'";
 
 mysqli_query($conn,$query);
 
 if(!mysqli_query($conn,$query)){
    echo"<script>alert('Failed')</script>";
 }else{
    echo"<script>alert('Drug is Updated')</script>";
 }
    


?>