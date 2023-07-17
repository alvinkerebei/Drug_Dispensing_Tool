<?php

require_once 'dbconnection.php';

$Patient_SSN="";
$Patient_Name="";
$Patient_Address="";
$DateofBirth="";
$Email="";
$username="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["id"])){
        header("location:/Drug_Dispensing_Tool/adminpatientpage.php");
        exit;
    }

    $Patient_SSN=$_GET["id"];

    $sql = "SELECT * FROM patients WHERE Patient_SSN = '$Patient_SSN'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: /Drug_Dispensing_Tool/adminpatientpage.php");
        exit;
    }

    $Patient_SSN=$row["Patient_SSN"];
    $Patient_Name = $row["Patient_Name"];
    $Patient_Address = $row["Patient_Address"];
    $DateofBirth = $row["DateofBirth"];
    $Email = $row["Email"];
    $username= $row["username"];

}else{
    
    $Patient_Name = $_POST["Patient_Name"];
    $Patient_Address = $_POST["Patient_Address"];
    $DateofBirth = $_POST["DateofBirth"];
    $Email = $_POST["Email"];
    $username= $_POST["username"];

    do{
        if(empty($Patient_Name)||empty($Patient_Address)||empty($DateofBirth)||empty($Email)||empty($username)){
            $errorMessage = "A Field is Empty!";
            break;
        }

       $sql=" UPDATE `patients` SET `Patient_Name`='$Patient_Name',`Patient_Address`='$Patient_Address',`DateofBirth`='$DateofBirth',`Email`='$Email',`username`='$username'
                WHERE `Patient_SSN`='$Patient_SSN'";

        $result = $conn->query($sql);

        if(!$result){
            $errorMessage="Invalid". $conn->$error;
            break;
        }

        $successMessage = "Record Updated Successfully";

        header("location: /Drug_Dispensing_Tool/adminpatientpage.php");
        exit;

    }while(false);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" contnt ="width=device-width, initial-scale=1.0">
    <title>Update Patient's Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h1>Create New User</h1>

        <?php
        if(!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?> 

        <form action="editpatients.php" method="POST">     
        <input type="hidden" name="Patient_SSN" value="<?php echo $Patient_SSN ?>">
        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Patient_Name" value="<?php echo $Patient_Name ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Patient_Address" value="<?php echo $Patient_Address ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Date of Birth</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="DateofBirth" value="<?php echo $DateofBirth ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="Email" value="<?php echo $Email ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
            </div>
        </div>

        <?php
        if(!empty($successMessage)){
            echo"
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>
            ";
        }
        ?>
        
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" >Edit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/Drug_Dispensing_Tool/adminpatientpage.php" role="button">Cancel</a>
            </div>
        </div>
        </form>
    </div>
</body>
</html>