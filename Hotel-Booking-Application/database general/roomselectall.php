<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View all Course Records</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>

<?php 

require_once 'inc/header.inc.htm';
require_once '../db3.inc.php';

?>

<h2>View all rooms</h2>
<p>
<?php

$query='SELECT * FROM room order by room';
$result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query: ' . mysqli_error($link));
}
if (mysqli_num_rows($result)<1)
{exit ("No rooms found at this time");}



echo '<table><tr>
<th>Room</th><th>Type</th><th>Size</th></tr>';
 while ($row = mysqli_fetch_array($result)) {
  echo '<tr><td>' . $row['room'] . '</td>';
  echo '<td>' . $row['type'] . '</td>';
  echo '<td>' . $row['size'] . '</td>';
}
echo '</table>';

?>

</body>
</html>