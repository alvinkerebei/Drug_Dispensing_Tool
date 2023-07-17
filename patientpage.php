<!DOCTYPE html>
<html>
<head>
<meta http-equiv="" content = "">
    <meta name = "viewport" content ="width=device-width, initial-scale=1.0">
    <title>Describe Symptoms</title>
<//link rel="stylesheet" href="ppstyle.css">
</head>
<body>
    <div class="navbar">
        <img src="" class="logo">
        <ul>
            <li><a href="">HOME</a></li>
            <li><a href="">ABOUT US</a></li>
            <li><a href="">CONTACT</a></li>
            <li><a href="">VIEW PROFILE</a></li>
            <li><a href="patientlogin.php">LOGOUT</a></li>
        </ul>
        </nav>
    </div>
    
        <form class="container" method="POST"> 
        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Symptom 1</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="symp1" value="<?php echo $symptom1 ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Symptom 2</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="symp2" value="<?php echo $symptom2 ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Symptom 3</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="symp3" value="<?php echo $symptom3 ?>">
            </div>
        </div>    
        
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </div>
        </form>
    
    </body>
    <div class="username"><?php echo $username; ?></div>
</html>

<?php

require "dbconnection.php";

$username="";
$trial="SELECT 'username' FROM 'patientuser' WHERE 'id'='$id'";

if(isset($_POST["submit"])){
$symptom1=$_POST["symp1"];
$symptom2=$_POST["symp2"];
$symptom3=$_POST["symp3"];


$sql="INSERT INTO 'syptoms'WHERE('symp1','symp2','symp3') VALUES('$symptom1','$symptom2','$symptom3')";
$result=$conn->$query($sql);

if(!$result){
    echo"<script>alert('ERROR!!')</script>";
}else{
    echo"<script>alert('You Will Receive diagnosis in a short while')</script>";
}
}
?>

