
<?php
$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("Connection error");
}

if($_SERVER["REQUEST_METHOD"]== "POST")
{
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql="SELECT *FROM user WHERE username='".$name."' AND
    password='".$pass."' ";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row['usertype']=="student")
    {
        header("location:studentportal.html");
    }
    elseif($row['usertype']=="admin")
    {
        header("location:schoolportal.php");
    }
    else
    {
        echo "username or password do not match";
    }
}
?>

// $email = $_POST['email'];
// $password = $_POST['password'];
// $con = new mysqli("localhost", "root", "", "school");
// if($con->connect_error){
//     die("Failed to connect : ".$con->connect_error);
// } else {
//     $stmt = $con->prepare("select *from signup where email = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt_result = $stmt->get_result();
//     if($stmt_result->num_rows > 0) {
//         $data = $stmt_result->fetch_assoc();
//         if($data['confirmpwd'] === $password)
//         {
//            // echo "<h2> Login Succesfully, Welcome to our school portal</h2>";
//            // include('src/schoolportal.html');
//             echo "<script> location.href='schoolportal.php';</script>";
        
//     }else{
//         echo '<script>alert("Invalid Email or password")</script>';
//     }
// }

// }
