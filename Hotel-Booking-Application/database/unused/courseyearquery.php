<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Course By Year Query Results</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<div id = "header">
<h1>Online College Database Access</h1>
</div>
<div id = "main">
<div id = "content">
<h2>Course By Year Query Results</h2>
<p>
<?php
  $link = @mysqli_connect('localhost', 'root', 'root');
  if (!$link) {
    exit('Unable to connect to the ' .
        'database server at this time.');
  }

  if (!@mysqli_select_db($link,'hotel')) {
    exit('Unable to locate the hotel ' .
        'database at this time.');
  }

    $years = $_POST['years'];
    $query="select * from Course where years = $years order by coursecode";
    $result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query: ' . mysqli_error($link));
}
$row = mysqli_fetch_array($result);
if (!$row) {
   exit('<p>No matching records found</p>');
}

echo '<table><tr>
<th>Course Code</th><th>Course Title</th><th>Course Leader</th><th>Years</th><th>Points</th></tr>';
while ($row) {
  echo '<tr><td>' . $row['coursecode'] . '</td>';
  echo '<td>' . $row['coursetitle'] . '</td>';
  echo '<td>' . $row['courseleader'] . '</td>';
  echo '<td>' . $row['years'] . '</td>';
  echo '<td>' . $row['points'] . '</td></tr>';
$row = mysqli_fetch_array($result);
}
echo '</table>';
?></p>
</div>
</div>
</body>
</html>