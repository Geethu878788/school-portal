<?php

$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);


if($_GET['student_id'])
{
    $user_id=$_GET['student_id'];
    $sql="DELETE FROM user WHERE Id='$user_id'";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        header("location:view_student.php");
    }
}
