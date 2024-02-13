<?php
include('db_connection.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
   }
   $uname = $_SESSION['username'];
   $qry = $conn->query("select * from tb_profile where username = '$uname'");
   $row = $qry->fetch_assoc();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>

<style> 
nav {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        nav ul li a:hover {
            color: rgb(223, 167, 167); /* Change color on hover */
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
<body>
<nav>
    <ul>
        <li><a href="profile.php">Home</a></li>
        <li><a href="edit.php">Edit profile</a></li>
        <li><a href="logout.php">Logout</a></li>
       
    </ul>
</nav>
<div class="login-container">
    <form action="" method="post">
    <input type="text" name="name" placeholder="enter your name" value="<?php echo $row['name'];?>">
        <input type="text" name="username" placeholder="enter your username" value="<?php echo $row['username'];?>">
        <input type="password" name="password" placeholder="enter password" value="">
        <input type="submit" class="login-button" name="update">
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $uname= $_POST['username'];
    $password=$_POST['password'];
    
    $upd = $conn->query("update tb_profile set name='$name',username='$uname',password='$password' where username='$uname'");
    echo '<script>alert("Updated");</script>';
}
?>

</body>
</html>