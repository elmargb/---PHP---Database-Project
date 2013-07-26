<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Count the Course Records</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<div id = "header">
<h1>Online College Database Access</h1>
</div>
<div id = "main">
<div id = "content">

<?php  $link = @mysqli_connect('localhost', 'root', 'root');
  if (!$link) {
    exit('<p>Unable to connect to the ' .
        'database server at this time.</p>');
  }

  // Select the jokes database
  if (!@mysqli_select_db($link,'hotel')) {
    exit('<p>Unable to locate the hotel ' .
        'database at this time.</p>');
  }
?>
<h2>Count the Course Records</h2>
<p>
<?php

$query = 'SELECT count(*) FROM course';
$result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query: ' . mysqli_error($link));
}
$row = mysqli_fetch_array($result);
if (!$row)
{exit("No records for this course code");}

echo 'There are <b>' . $row['count(*)'] . '</b> records in the course table.';

?>
</p>
</div>
</div>
</body>
</html>