<?php
session_start(); // Start the session

require "dbconnection.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize and validate user input (to prevent SQL injection)
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
   

    $query = "SELECT * FROM `pharmacist` WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            header("Location: pharmacistpage.php");
            }
        } else {
          echo "Invalid username, email, or password";
        }
    } else {
        echo "Invalid username, email, or password";
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacist Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form {
            margin-bottom: 20px;
        }

        .login-form h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-option {
            text-align: center;
            margin-bottom: 10px;
        }

        .login-option a {
            margin: 0 5px;
        }

        label {
            display: block;
            margin-top: 10px;
            text-align: center;
        }

        label a {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHARMACIST</h1>

        <div class="login-form">
            <h2>Login</h2>
            <form class="" action="" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
    <label>
    <a href ="homepage.html">HOME</a><br><br>
        <p> No account?<a href="registerpharmacist.php">Signup</a></p>
    </label>
</body>
</html>