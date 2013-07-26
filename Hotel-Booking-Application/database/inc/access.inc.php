<?php
require '../db3.inc.php';
session_start();

// Process login attempt
if (isset($_POST['email'])) {
     $email = $_POST['email'];
     $password = SHA1($_POST['password']);
     $query = "select * from users where email = '$email' and pass ='$password' and privilege='admin'";
     $result = @mysqli_query($link,$query);
if (mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_array($result);
   	$_SESSION['authorized'] = TRUE;
  	$_SESSION['user']= $row['user_id'];
   	$_SESSION['name']= $row['first_name']." ".$row['last_name'];
  }
}


//Determines whether user is logged in
function loggedIn()
{
  return isset($_SESSION['authorized']);
}


// Process logout
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['authorized']);
  unset($_SESSION['user']);
  unset($_SESSION['name']);
}
?>
