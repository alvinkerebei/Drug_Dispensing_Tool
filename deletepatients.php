<?php

require "dbconnection.php";

if(isset($_GET["id"])){
    $Patient_SSN = $_GET["id"];

    $sql = "DELETE FROM patients WHERE Patient_SSN='$Patient_SSN'";
    $conn->query($sql);

}
//make the files have a recycle bin
//show user at top right and logout button
//
header("location: /Drug_Dispensing_Tool/patientpage.php");
exit;
?>
