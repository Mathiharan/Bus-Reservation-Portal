<?php
require('config.php');
// If the values are posted, insert them into the database.
if (isset($_POST['uname']) && isset($_POST['psw'])){
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    $psw-repeat = $_POST['psw-repeat'];
    $slquery = "SELECT 1 FROM register WHERE email = '$email'";
    $selectresult = mysql_query($slquery);
    if(mysql_num_rows($selectresult)>0)
    {
         $msg = 'email already exists';
    }
    elseif($psw != $psw-repeat){
         $msg = "passwords doesn't match";
    }
    else{
          $query = "INSERT INTO `register` (username, password,confirmpassword, email) VALUES ('$uname', '$psw', '$psw', '$email')";
          $result = mysql_query($query);
          if($result){
             $msg = "User Created Successfully.";
          }
    }
   }
?>