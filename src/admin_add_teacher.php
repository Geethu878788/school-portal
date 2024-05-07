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
if(isset($_POST['add_teacher'])){
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $file=$_FILES['image']['name'];
    $t_name=$_POST['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
   
   $sql="INSERT INTO teacher(name,description,image) 
    VALUES('$t_name', '$t_description','$dst_db')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        header('location:admin_add_teacher.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style type="text/css">
        .div_deg
        {
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
            width: 500px;

        }

    </style>





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
        <h1>Add Teacher</h1><br><br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Teacher Name:</label>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <label>Description:</label>
                    <textarea name="description"></textarea>
                </div>
                <br>
                <div>
                    <label>Image:</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    
                    <input type="submit" name="add_teacher" value="Add Teacher"
                    class="btn btn-primary">
                </div>


            </form>

        </div>
        </center>
        
    </div>
</body>
</html>