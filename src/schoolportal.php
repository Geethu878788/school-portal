<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
// elseif($_SESSION['usertype']=='student')
// {
//     header("location:login.php");
// }


$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM user WHERE usertype='student'";
$result=mysqli_query($data,$sql);





?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php
    include 'admin_css.php';
    ?>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <header class="header">
        <a href="">Admin Dashboard</a>
        <div class="logout">
            <a href="home.php" class="btn btn-primary">Log out</a>
        </div>

    </header>

    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <h1>Admin Dashboard</h1>
        
    </div>
</body>
</html>