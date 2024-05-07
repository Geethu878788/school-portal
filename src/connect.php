<?php
$parentname= $_POST['parentname'];
$studentname=  $_POST['studentname'];
$email=$_POST['email'];
$password= $_POST['password'];
$confirmpwd=$_POST['confirmpwd'];
$terms=$_POST['terms'];

//database connection
$conn = new mysqli('localhost','root','','school');
if ($conn->connect_error) {
    die('Connection Failed'. $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into signup (parentname, studentname, email, password, confirmpwd, terms) VALUES (?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sssssi", $parentname, $studentname, $email, $password, $confirmpwd,$terms);
    $stmt->execute();
    echo "Registration Successfully...";
   header("location:Index.html");
    $stmt->close();
    $conn->close();
}
