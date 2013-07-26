<?php
session_start();
if (isset($_SESSION['authorized'])) {
    unset($_SESSION['authorized']);
}
if (isset($_SESSION['count'])) {
    unset($_SESSION['count']);
}
if (isset($_POST['usertype'])) {
$user=$_POST['usertype'];
if ($user=="admin") {
header('Location:database/index.php');
}
else {
header('Location:database general/index.php');
}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Site Administration Area</title>
<meta http-equiv="Content-Type"
  content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require_once 'inc/header.inc.htm';?>
<h1>Please select which type of User you are</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="course">
<fieldset>
<div class ="fieldarea">
<label for="usertype" class="fixedwidth">User Type</label>
<select name="usertype" id = "usertype">
<option id ="genuser" value ="genuser">General User</option>
<option id ="admin" value = "admin">Administrator</option>
</select>
</div>
<div class="buttonarea">
<input type="submit" value="Proceed to Course Records" />
</div>
</fieldset>
</form>
<p>Not registered yet? <a href = "register.php">Register Now</a></p>
<?php
mysqli_connect('localhost', 'root', 'root');
?>
</div>
</div>

</body>


</html>