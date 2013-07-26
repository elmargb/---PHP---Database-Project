<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Insert a Course Record Result</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require 'inc/header.inc.htm';
//?>

<h2>Update/Delete rooms</h2>
<p>
<?php  

require_once 'inc/header.inc.htm';
require_once '../db3.inc.php';

$query='SELECT * FROM room,booking where room.room = booking.roomid';

$query='SELECT * FROM room order by room';
$result = @mysqli_query($link,$query);
if (!$result) {
  exit('Error performing query: ' . mysqli_error($link));
}
if (mysqli_num_rows($result)<1)
{exit ("No rooms at this time");}
echo '<table><tr>
<th>Room</th><th>Type</th><th>Size</th><th>Update</th><th>Delete</th></tr>';
 while ($row = mysqli_fetch_array($result)) {
  $code=$row['room'];
  echo '<tr><td>' . $row['room'] . '</td>';
  echo '<td>' . $row['type'] . '</td>';
  echo '<td>' . $row['size'] . '</td>';
  echo '<td>' . "<a href='editroom2.php?coursecode=$code'>Update</a>" . '</td>';
  echo '<td>' . "<a href='deleteroom2.php?coursecode=$code'>Delete</a>". '</td></tr>';
  
}

echo '</table>';
?>
</p>
</body>
</html>