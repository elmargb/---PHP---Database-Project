<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update a Course Record Result</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require 'inc/header.inc.htm'; ?>
<h2>Update a book</h2>
<p>
<?php
require_once '../db3.inc.php';

$title=$_POST['room'];
$leader=$_POST['type'];
$years=$_POST['size'];


$sql ="update room set
      type = '$leader',
       size = '$years'
       where room='$title'";

    if (@mysqli_query($link, $sql)) {
      echo 'Your rooms have been updated.';
    } else {
      echo 'Error updating submitted room: ' .
          mysqli_error($link) ;
    }
?>
</p>
</div></div>
</body>
</html>