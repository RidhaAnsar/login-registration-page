<?php
 session_start();
 if(!isset($_SESSION['username'])){
  header('location: index.php');
 }
 $uname = $_SESSION['username'];
 include ('db_connection.php');
 $qry = $conn->query("select * from tb_profile where username = '$uname'");
 $row = $qry->fetch_assoc();
 $id= $row['ID'];

 $qry2 = $conn->query("select * from tb_mark where id = $id");

 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
         h1{
            color:  rgb(223, 167, 167);
            text-align:center;
        }
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
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        </style>
</head>
<body>
<nav>
    <ul>
       
        <li><a href="edit.php">Edit profile</a></li>
        <li><a href="logout.php">Logout</a></li>
       
    </ul>
</nav>

    <h1>Hello <?php echo $row['name']; ?> </h1>

    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>JAVA</th>
            <th>PYTHON</th>
  
    
        
    </tr>
    <?php
        while($row2=$qry2->fetch_assoc()) {
        echo '<tr>
        <td>';echo $row2['markid'];echo'</th>
        <td>';echo $row2['java'];echo'</th>
        <td>';echo $row2['python'];echo'</th>
        </tr>';
     }
     ?>
</body>
</html>