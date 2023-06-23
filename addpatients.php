<?php

require_once 'dbconnection.php';

$Patient_Name="";
$Patient_Address="";
$Patient_Age="";
$Doctor_SSN="";

$errorMessage="";
$successMessage="";



if($_SERVER['REQUEST_METHOD']=='POST'){

    $Patient_Name = $_POST["name"];
    $Patient_Address = $_POST["address"];
    $Patient_Age = $_POST["age"];
    $Doctor_SSN = $_POST["doc_id"];

    do{
        if(empty($Patient_Name)||empty($Patient_Address)||empty($Patient_Age)||empty($Doctor_SSN)){
            $errorMessage = "A Field is Empty!";
            break;
        }
        //add patient to db
        $sql ="INSERT INTO `patients`(`Patient_Name`, `Patient_Address`, `Patient_Age`, `Doctor_SSN`) 
        VALUES ('$Patient_Name','$Patient_Address','$Patient_Age','$Doctor_SSN')";
        $result= $conn->query($sql);

        if (!$result){
            $errorMessage = "Invalid". $conn->error;
            break;
        }
        $Patient_Name="";
        $Patient_Address="";
        $Patient_Age="";
        $Doctor_SSN="";

        $successMessage ="Patient is Successfully Added";

        header("location:/Drug_Dispensing_Tool/patientpage.php");
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
    <title>Add New Patient</title>
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
        <form action="addpatients.php" method="POST">     

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $Patient_Name ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $Patient_Address ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Age</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="age" value="<?php echo $Patient_Age ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class ="col-sm-3 col-form-label">Doctor ID</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="doc_id" value="<?php echo $Doctor_SSN ?>">
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
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/Drud_Dispensing_Tool/patientpage.php" role="button">Cancel</a>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
