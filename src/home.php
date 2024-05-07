<?php
   error_reporting(0);
   session_start();
   session_destroy();

   if($_SESSION['message'])
   {
    $message=$_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
   }

   $host="localhost";
   $user="root";
   $password="";
   $db="school";

   $data=mysqli_connect($host,$user,$password,$db);

   $sql="SELECT *FROM teacher";
   $result=mysqli_query($data,$sql);




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
   
    <link rel="stylesheet" type=text/css href="style2.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav>
        <label class="logo">PS-160</label>
        <label class="img_text">We Teach Students With Care</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="index.html" class="btn btn-success">Login</a></li>

        </ul>
    </nav>
    <div class="section1">
       
        <img class="main_img" src="school2.jpg">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="school1.jpeg">
            </div>
                <div class="col-md-8">

                    <h1>Welcome to PS160 school</h1>
                 <p>Your website is an important gateway to your school, and often it is the first place where potential students find information about your institution. But what would happen if your website could not easily be found? It would certainly amount to a mass of missed opportunities to let the world know about you and most likely a drop in enrollment.

A healthy website presence that includes quality design, good user experience, clear information, and page optimization certainly assists in ensuring your site can be found. Many schools are also seeing measurable results when utilizing content marketing.

This is a form of promotion that emphasizes quality content – articles, blog posts, videos, how-tos and other resources – as a way to increase awareness about your school and engage those who may attend it. Content marketing also has the potential to boost your search rankings for better discovery and can position you as an educational thought leader. </p>
                </div>

            </div>

        </div>

    </div>
    <center><h1>Our Teachers</h1> </center>
    <div class="container">
        <div class="row">

            <?php
            while($info=$result->fetch_assoc())
            {

            ?>

         <div class="col-md-4">
            <img class="teacher" src="<?php echo"{$info['image']}"?>">
            <h3><?php echo"{$info['name']}"?></h3>
            <h3><?php echo"{$info['description']}"?></h3>
         </div>
         
         <?php
            }
            ?>
        </div>

    </div>



    <center><h1>Our Courses</h1> </center>
    <div class="container">
        <div class="row">
         <div class="col-md-4">
            <img class="teacher" src="study.jpg">
            <h3>KG to Grade 6 </h3>
         </div>
         <div class="col-md-4">
            <img class="teacher" src="sports.jpg">
            <h3>Sports and Games</h3>
         </div>
         <div class="col-md-4">
            <img class="teacher" src="arts.jpg">
            <h3>Arts and Music</h3>
         </div>
        </div>

    </div>
    <center>
        <h1 class="adm">Admission Form</h1>
    
    </center>
    <div align="center" class="admission_form">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>
            <div>
                <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
            </div>
        </form>
    </div>
<footer>
    <h4 class="footer_text">All @copyright reserved by ManagedOrg</h4>
</footer>
</body>
</html>