<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Course by Code Query Records</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>

<?php

require_once 'inc/header.inc.htm';
require_once '../db3.inc.php';

$name = $_POST['name'];
$query = "select * from customer where name LIKE '%$name%'";
$result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query: ' . mysqli_error($link));
}
if (mysqli_num_rows($result)<1)
{exit ("No customer records found at this time");}



echo '<table><tr>
<th>ID</th><th>Name</th><th>Address</th><th>Telephone</th><th>Age</th></tr>';
 while ($row = mysqli_fetch_array($result)) {
  echo '<tr><td>' . $row['customerid'] . '</td>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['address'] . '</td>';
  echo '<td>' . $row['telephone'] . '</td>';
  echo '<td>' . $row['age'] . '</td></tr>';
}
echo '</table>';

?>
</div>
</div>
</body>
</html>