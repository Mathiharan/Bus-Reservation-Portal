<?php
    $email = $_POST['email']}
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    $cpsw = $_POST['psw-repeat'];

//database connection 
$conn= new mysqli('localhost','root','','users');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into users(email,uname,psw,psw-repeat) values(?,?,?,?)");
    $stmt->bind_param("ssss",$email,$uname,$psw,$cpsw);
    $stmt->execute();
    echo "Registered Successfully!!";
    $stmt->close();
    $conn->close();
}
?> 