<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("dbconnection.php");


if (isset($_GET['Trade_Name'])) {
    $_SESSION['Trade_Name'] = $_GET['Trade_Name'];
    $sql = "SELECT * FROM drugs WHERE Trade_Name = '".$_SESSION['Trade_Name']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $Trade_Name = $row['Trade_Name'];
    if ($row) {      
        $Drug_Name = $row['Drug_Name'];
        $Quantity = $row['Quantity'];  
        $Form_of_Administration = $row['Form_of_Administration'];
        $Price = $row['Price'];
    }
    else{
        echo "Error fetching assoc array";
    }

}
else{
    echo "Error fetching Drug ID";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Drugs</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add your custom styles here */
        /* The styles from your previous CSS file can be included here */
        h2 {
            text-align: center;
            margin-top: 70px;
            color: #162938;
        }

        form {
            width: 400px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgb(255, 253, 253, 0.2);
            border: 2px solid rgba(255,255,255,.5);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 30px rgba(0,0,0,0.7);
            padding: 30px;
        }

        label {
            font-size: 1em;
            color: #162938;
            font-weight: 500;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            height: 35px;
            border: 2px solid #162938;
            border-radius: 6px;
            outline: none;
            font-size: 1em;
            color: #162938;
            font-weight: 600;
            padding: 0 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #162938;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #131a21;
        }

        h2 {
            text-align: center;
            margin-top: 70px;
            color: #162938;
        }

        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin: 15px 0;
        }

    </style>
</head>
<body>
    <h2>Edit Drugs</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="Trade_Name" >
        <label for="Drug_Name">Drug Name:</label>
        <input type="text" name="Drug_Name" value="<?php echo $Drug_Name?>">
        <br><br>

        <label for="Quantity">Quantity(in mg):</label>
        <input type="text" name="Quantity" value="<?php echo $Quantity?>">
        <br><br>

        <label for="Form_of_Administration">Form of Administration:</label>
        <input type="text" name="Form_of_Administration" value="<?php echo $Form_of_Administration?>">
        <br><br>

        <label for="Price">Price:</label>
        <input type="number" name="Price" value="<?php echo $Price?>">
        <br><br>

        <input type="submit" name="submit" value="Update Details">
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $newDrug_Name = $_POST['Drug_Name'];
    $newQuantity = $_POST['Quantity'];
    $newForm_of_Administration = $_POST['Form_of_Administration'];
    $newPrice = $_POST['Price'];
    $updateQuery = "UPDATE drugs SET Drug_Name = '".$newDrug_Name."', Quantity = '".$newQuantity."',Form_of_Administration = '".$newForm_of_Administration."',Price = '".$newPrice."' WHERE Trade_Name = '".$_SESSION['Trade_Name']."'";
    try {
        mysqli_query($conn, $updateQuery);
        $_SESSION['update_success_message'] = "Drug ".$_SESSION['Drug_Name']."'s details have been updated successfully!";
        unset($_SESSION['Trade_Name']);
        header("Location: viewdrugs.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['update_error_message'] = "Failed to update drug: " . $e->getMessage();
        unset($_SESSION['Trade_Name']);
        header("Location: viewdrugs.php");
        exit();
    }
}
?>