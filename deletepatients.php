<?php

require "dbconnection.php";

if(isset($_GET["id"])){
    $Patient_SSN = $_GET["id"];

    $sql = "DELETE FROM patients WHERE Patient_SSN='$Patient_SSN'";
    $conn->query($sql);

}

header("location: /Drug_Dispensing_Tool/patientpage.php");
exit;
?>
