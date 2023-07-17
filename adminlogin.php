<?php

require "dbconnection.php";

$name = $_POST['name'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM `sysuser`WHERE username ='$name' = email='$name'");
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result)>0){
    if($password == $row["password"]){
        $_SESSION["login"]=true;
        $_SESSION["id"] = $row["id"];
        header("Location: homepage.php");
    }else{
        echo "<script> alert('Incorrect Password');</script>";
    }
}else{
    echo "<script> alert ('User Not Registered!');</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN PAGE</title>
    </head>
    <body>
        <h2>LOGIN</h2>
        <form class="" action="" method="POST">
            <label for="name">UserName or Email : </label>
            <input type = "text" name="name" id="name" required><br><br>

            <label for="password">Password : </label>
            <input type = "password" name="password" id="password" required><br><br>

            <button type= "submit" name="submit">Login</button><br><br>

            <a href = "createacc.php"> REGISTER NEW USER </a>
    </body>
</html>
