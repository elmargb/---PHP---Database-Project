<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Insert a Course Record Result</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require 'inc/header.inc.htm';
?>

<h2>Insert a Booking</h2>
<p>
<?php  
require_once '../db3.inc.php';
$bookingid = trim($_POST['bookingid']);
$date = trim($_POST['datetime']);
$occupants = trim($_POST['occupants']);
$len= $_POST['length'];
$customer = $_POST['customer'];
$room = $_POST['room'];
 $sql = "INSERT INTO booking values
		        ('$bookingid','$date',$occupants,$len,'$customer','$room')";
    if (@mysqli_query($link,$sql)) {
      echo 'Your booking record has been added.';
    } else {
      echo 'Error adding submitted booking record:' .mysqli_error($link);
    }
?>
</p>
</div>
</div>
</body>
</html>