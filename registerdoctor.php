<?php

require "dbconnection.php";

if(isset($_POST["submit"])){
    $Doctor_Name = $_POST["name"];
    $Doctor_Address = $_POST["address"];
    $Email = $_POST["email"];
    $DateofBirth = $_POST["dob"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpass = $_POST["confirmpass"];
    $duplicate = mysqli_query($conn,"SELECT * FROM doctor WHERE username ='$username'|| email='$Email'");

    if(mysqli_num_rows($duplicate)>0){
        echo "<script> alert ('Username or Email is already in use!');</script>";
    }else{
        if($password==$confirmpass){
            $query = "INSERT INTO `doctor` (`Doctor_Name`, `Doctor_Address`, `Email`,`DateofBirth`,`username`,`password`) 
                    VALUES ('$Doctor_Name','$Doctor_Address','$Email','$DateofBirth','$username','$password')";
            mysqli_query($conn,$query); 
            echo "<script> alert('Registration Successful');</script>";
        }else
        echo "<script> alert ('Password Doesn\'t Match!');</script>";
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" contnt ="width=device-width, initial-scale=1.0">
    <title>NEW DOCTOR REGISTRATION</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
    </head>
    <body>
        <h2>DOCTOR REGISTRATION</h2>
        <form class="" action="" method="POST">

            <label for="username">Name : </label>
            <input type = "text" name="name" id="name" required><br><br>

            <label for="email">Address : </label>
            <input type = "text" name="address" id="address" required><br><br>


            <label for="password">Email : </label>
            <input type = "email" name="email" id="email" required><br><br>

            <label for="confirmpass">Date of Birth : </label>
            <input type = "date" name="dob" id="dob" required><br><br>

            <label for="confirmpass">Username : </label>
            <input type = "text" name="username" id="username" required><br><br>

            <label for="password">Password : </label>
            <input type = "password" name="password" id="password" required><br><br>

            <label for="confirmpass">Confirm Password : </label>
            <input type = "password" name="confirmpass" id="confirmpass" required><br><br>

            <button type= "submit" name="submit">Register</button>
        </form><br>
        <a href="patientlogin.php">LOGIN</a>
    </body>
</html>