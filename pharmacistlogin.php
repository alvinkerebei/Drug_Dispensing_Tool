<?php

require "dbconnection.php";

$username = $_POST['username'];
$Email = $_POST['Email'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM `pharmacist` WHERE username ='$username' || email='$Email'");
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result)>0){ 
    if($password == $row["password"]){
        $_SESSION["login"]=true;
        $_SESSION["id"] = $row["id"];
        header("Location: patientpage.php");//change after page is created
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
            <label for="name">UserName : </label>
            <input type = "text" name="username" id="username" required><br><br>

            <label for="password">Password : </label>
            <input type = "password" name="password" id="password" required><br><br>

            <button type= "submit" name="submit">Login</button><br><br>

            <a href = "registerpharmacist.php"> REGISTER NEW PHARMACIST </a>
    </body>
</html>