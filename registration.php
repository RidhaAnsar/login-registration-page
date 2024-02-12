<?php
include ('db_connection.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <style>
        h1{
            color: rgb(223, 167, 167);
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container button {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .login-container button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .login-button {
    background-color: lightblue;
    color:white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-button:hover {
    background-color: rgb(223, 167, 167); /* Change color on hover if desired */
}
    </style>
</head>
<body background=bg.png>
    <div class="login-container">
    <h1>Register</h1>
<form method="POST" action="">
        <input type="text" name="name" placeholder="enter your name">
        <input type="text" name="username" placeholder="enter your username">
        <input type="password" name="password" placeholder="enter password">
        <input type="submit" class="login-button" name="Register">
</form>
<a href="index.php">Login</a>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $username= $_POST['username'];
    $password=$_POST['password'];
    
    $ins = $conn->query("insert into tb_profile(name, username, password) values('$name','$username','$password')");
}
?>
</body>
</html>