<?php
$lifetime = 86400; // Set lifetime to 1 day (86400 seconds)
session_set_cookie_params($lifetime);
session_start();

include "config.php";
require "navBar.php";
include "css.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = mysqli_prepare($conn, "SELECT * FROM registration_table WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($_POST['password'], $row['password'])) {

            $_SESSION['logins'] = $row['id'];
            $_SESSION['logins_name'] = $row['name'];

            echo "<script>alert('" . ucfirst($_SESSION['logins_name']) . " : You are logged in successfully ')</script>";
            echo "<script> window.location.href='index.php'; </script>";
        } else {
            echo "<script>alert('Password incorrect')</script>";
            exit;
        }
    } else {
        echo "<script>alert('Email incorrect')</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background: #34495e;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: white;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #ecf0f1;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        form a {
            background: black;
            color: white;
            text-decoration: none;
            padding: 10px 30px 10px 30px;
            border-radius: 3px;
            position: relative;
            top: -20px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email">
        </div>

        <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <input type="submit" value="Login">
        </div>
    </form>
</body>

</html>