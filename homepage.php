<!DOCTYPE html>
<html>
<head>
    <title>Heisenberg Drug Dispensing Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Heisenberg Drug Dispensing Tool</h1>
        <h2>Choose your Purpose</h2>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="">Select Role</option>
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
        </select><br><br>

                <input type="submit" value="Select">
            </div>
        </form>
    </div>
</body>
</html>
