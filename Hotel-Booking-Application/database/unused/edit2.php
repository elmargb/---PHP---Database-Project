<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update/Delete a Course Record</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require 'inc/header.inc.htm'; ?>

<h2>Update/Delete a Course Record</h2>
<p>
<?php
require '../db3.inc.php';


$query='SELECT * FROM book order by ISBN';
$result = @mysqli_query($link,$query);
if (!$result) {
  exit('Error performing query: ' . mysqli_error($link));
}
if (mysqli_num_rows($result)<1)
{exit ("No course records found at this time");}


echo '<table><tr>
<th>ISBN</th><th>Title</th><th>Author</th><th>Publisher</th><th>Price</th></tr>';
 while ($row = mysqli_fetch_array($result)) {
  $code=$row['ISBN'];
  echo '<tr><td>' . $code . '</td>';
  echo '<td>' . $row['Title'] . '</td>';
  echo '<td>' . $row['Author'] . '</td>';
  echo '<td>' . $row['Publisher'] . '</td>';
  echo '<td>' . $row['Price'] . '</td>';
  echo '<td>' . "<a href='editcourse2.php?coursecode=$code'>Update</a>" . '</td>';
  echo '<td>' . "<a href='deletecourse2.php?coursecode=$code'>Delete</a>". '</td></tr>';
}
echo '</table>';
?>
</p>
</div>
</div>
</body>
</html>