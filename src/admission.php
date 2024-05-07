
<?php

// session_start();
// if(!isset($_SESSION['username']))
// {
//     header("location:home.php");
// }
// elseif($_SESSION['usertype']=='student')
// {
//     header("location:admission.php");
// }


$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT *from admission";
$result=mysqli_query($data,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <titile>Admin Dashboard</titile>

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
        <center>
        <h1>Applied for Admission</h1>
        <br>
        <br>
        <table border="1px">
            <tr>
                <th style="padding: 20px; font-size: 15px;">Name</th>
                <th style="padding: 20px; font-size: 15px;">Email</th>
                <th style="padding: 20px; font-size: 15px;">Phone</th>
                <th style="padding: 20px; font-size: 15px;">Message</th>

        </tr>
        <?php
        while($info=$result->fetch_assoc())
        {

        ?>
        <tr>
            <td style=" padding: 20px;">
        <?php
            echo "{$info['name']}"
        ?>
        </td>
            <td style=" padding: 20px;">
            <?php
            echo "{$info['email']}"
        ?>
            </td>
            <td style=" padding: 20px;">
            <?php
            echo "{$info['phone']}"
        ?></td>
            <td style=" padding: 20px;">
            <?php
            echo "{$info['message']}"
        ?></td>
        </tr>

        <?php
        }
        ?>
    </table>
        </center>
    </div>
</body>
</html>