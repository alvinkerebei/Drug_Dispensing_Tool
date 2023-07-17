<?php

require "dbconnection.php";

if(isset($_POST["submit"])){
    $Name = $_POST["name"];
    $Address = $_POST["address"];
    $DateofBirth = $_POST["dob"];
    $username = $_POST["username"];
    $Email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpass = $_POST["confirmpass"];
    $duplicate = mysqli_query($conn,"SELECT * FROM pharmacist WHERE username ='$username'|| email='$email'");

    if(mysqli_num_rows($duplicate)>0){
        echo "<script> alert ('Username or Email is already in use!');</script>";
    }else{
        if($password==$confirmpass){
            $query = "INSERT INTO `pharmacist` (`Name`,`Address`,`DateofBirth`,`Email`,`username`,`password`) 
                    VALUES ('$Name','$Address','$DateofBirth','$email','$username','$password')";
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
        <title>NEW PHARMACIST REGISTRATION</title>
    </head>
    <body>
        <h2>PHARMACIST REGISTRATION</h2>
        <form class="" action="" method="POST">

            <label for="username">Name : </label>
            <input type = "text" name="name" id="name" required><br><br>

            <label for="username">Address : </label>
            <input type = "text" name="address" id="address" required><br><br>

            <label for="username">Date of Birth : </label>
            <input type = "date" name="dob" id="dob" required><br><br>

            <label for="email">Email : </label>
            <input type = "email" name="email" id="email" required><br><br>

            <label for="username">Username : </label>
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