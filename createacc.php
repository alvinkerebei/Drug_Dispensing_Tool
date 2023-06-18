<?php

require "dbconnection.php";

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpass = $_POST["confirmpass"];
    $duplicate = mysqli_query($conn,"SELECT * FROM `sysuser`WHERE username ='$username'|| email='$email'");

    if(mysqli_num_rows($duplicate)>0){
        echo "<script> alert ('Username or Email is already in use!');</script>";
    }else{
        if($password==$confirmpass){
            $query = "INSERT INTO `sysuser` (`name`, `username`, `email`, `password`) 
                    VALUES ('$name','$username','$email','$password')";
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
        <title>NEW USER REGISTRATION</title>
    </head>
    <body>
        <h2>REGISTRATION</h2>
        <form class="" action="" method="POST">
    
            <label for="name">Name : </label>
            <input type = "text" name="name" id="name" required><br><br>

            <label for="username">Username : </label>
            <input type = "text" name="username" id="username" required><br><br>

            <label for="email">Email : </label>
            <input type = "email" name="email" id="email" required><br><br>


            <label for="password">Password : </label>
            <input type = "password" name="password" id="password" required><br><br>

            <label for="confirmpass">Confirm Password : </label>
            <input type = "password" name="confirmpass" id="confirmpass" required><br><br>

            <button type= "submit" name="submit">Register</button>
        </form><br>
        <a href="login.php">LOGIN</a>
    </body>
</html>