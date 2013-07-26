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
	
$errors = array(); // Initialize an error array.	
	
if (empty($_POST['customerid'])) {
		$errors[] = 'You forgot to enter the ID.';
	} else {
     $firstpart=substr($_POST['customerid'],0,2);
     $fpart = strtolower($firstpart); 
     $secpart=substr($_POST['customerid'],2,3);

if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter the Name.';
	} else {
		$Title = trim($_POST['name']);
	}

if (empty($_POST['age'])) {
		$errors[] = 'You forgot to enter the Age.';
	} else {
		$leader = trim($_POST['age']);
     }

if (!is_numeric($_POST['telephone'])) {
			$errors[] = 'The Telephone value must be numeric.';
		} else 
	         if ((($_POST['telephone'])<0)){
			$errors[] = 'The Telephone value must be valid.';
		} else {
			$points = $_POST['telephone'];
		}

if (empty($errors)) { 
?>
<h2>Insert a customer</h2>
<p>
<?php  
require_once '../db3.inc.php';
$Publisher = $_POST['address'];
$sql = "INSERT INTO course values
('$ISBN','$Title','$lAuthor',$Publisher,$Price)";
  if (@mysqli_query($link,$sql)) {
      echo 'Your book has been added.';
    } else {
      echo 'Error adding submitted book:' .mysqli_error($link);
   }
} 
else { 
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) {
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
} 
?>
