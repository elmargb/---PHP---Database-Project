<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Delete a Course Record Result</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require 'inc/header.inc.htm'; ?>
<h2>Delete a Course Record Result</h2>
<p>

<?php  
require_once '../db3.inc.php';

$code = $_POST['code'];

$sql ="delete from customer
       where customerid ='$code'";

    if (@mysqli_query($link, $sql)) {
      echo '<p>Your customer has been deleted.</p>';
    } else {
      echo '<p>Error deleting submitted customer: ' .
          mysqli_error($link) . '</p>';
    }
?>
</p>
</div></div>
</body>
</html>
