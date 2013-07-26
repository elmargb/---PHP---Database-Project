<?php require 'inc/access.inc.php';
if(isset($_SESSION['count'])) {
  $_SESSION['count']++;
}
else $_SESSION['count']=0;
if ($_SESSION['count']==3)
{header('Location:../index.php');}

if (loggedIn())
{header('Location:bookselectall.php');}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Site Administration Area</title>
<meta http-equiv="Content-Type"
  content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script>
</head>
<body>
<div id = "header">
<h1>Online College Database Access</h1>
</div>
<div id = "main">
<div id = "content">
<h1>Please log in for access</h1>

  <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post" class="course">
    <fieldset>
      <div class ="fieldarea">
      <label for="email" class="fixedwidth">Email Address</label>
      <input type="text" name="email" id = "email"  class = "required email"/>
      </div>
      <div class ="fieldarea">
      <label for="password" class="fixedwidth">Password</label>
      <input type="password" name="password" id = "password" class = "required"/>
      </div>
      <div class="buttonarea">
      <input type="submit" value="Log In" />
      </div>
    </fieldset>
  </form>
</div>
</div>
</body>
</html>