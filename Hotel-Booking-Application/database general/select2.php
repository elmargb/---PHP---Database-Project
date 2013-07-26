<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Course by Code Query Records</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>

<?php
//10
require_once 'inc/header.inc.htm';
require_once '../db3.inc.php';

$query='SELECT * FROM room,booking,customer where room.room = booking.roomid and customer.customerid = booking.customerid';
$result = @mysqli_query($link,$query);
if (!$result) {
  exit('Error performing query: ' . mysqli_error($link));
}
if (mysqli_num_rows($result)<1)
{exit ("No bookings available at this time");}

$bookingid = $_POST['bookingid'];
$query = "select * from booking where bookingid = '$bookingid'";
$result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query: ' . mysqli_error($link));
}
if (mysqli_num_rows($result)<1)
{exit ("No booking records found at this time");}//////30

echo '<table><tr>
<th>ID</th><th>Date</th><th>Occupants</th><th>Length of stay(Days)</th><th>Room</th><th>Customer ID</th><th>Update</th><th>Delete</th></tr>';
 while ($row = mysqli_fetch_array($result)) {
$code=$row['bookingid'];
  echo '<tr><td>' . $row['bookingid'] . '</td>';
  echo '<td>' . $row['datetime'] . '</td>';
  echo '<td>' . $row['occupants'] . '</td>';
  echo '<td>' . $row['length'] . '</td>';
  echo '<td>' . $row['roomid'] . '</td>';
  echo '<td>' . $row['customerid'] . '</td>';
  echo '<td>' . "<a href='editbook2.php?coursecode=$code'>Update</a>" . '</td>';
  echo '<td>' . "<a href='deletebook2.php?coursecode=$code'>Delete</a>". '</td></tr>';
}
echo '</table>';

?>
</div>
</div>
</body>
</html>