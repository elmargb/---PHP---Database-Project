<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Delete a Course Record</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require 'inc/header.inc.htm'; ?>
<h2>Delete a Book</h2>
<p>
<?php  
require_once '../db3.inc.php';
$customer = $_GET['coursecode'];
$query="SELECT * FROM booking where customerid = '$customer'";
$result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query on the Booking table: ' . mysqli_error($link));
}

if (mysqli_num_rows($result)>=1) {
    exit('You cannot delete this booking as there are customers pending');
}

$query2 = "select * from booking where customerid ='$code'";
$student = @mysqli_query($link,$query2); 
if (mysqli_num_rows($student)>=1)
{
exit("You cannot delete this booking at the moment because there are rooms pending");
}
$query="select * from booking where bookingid = '$code'";

$course = @mysqli_query($link,$query);
if (!$course) {
     exit('Error fetching course details: '. mysqli_error($link));
}
$row = mysqli_fetch_array($course);
$title = $row['datetime'];
$leader= $row['occupants'];
$years = $row['length'];

?>
</p>
<form action = "deletecourse3.php" method = "post" id = "bookingdelete" class="course">
    <fieldset>
    <legend>Please Complete the Details</legend>
        <div class ="fieldarea">
         <label for="bookingid" class="fixedwidth">Booking ID</label>
         <input type="text" name="bookingid" id="bookingid" size="5" maxlength="5" disabled = "disabled" value = "<?php echo $code; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="datetime" class="fixedwidth">Date</label>
         <input type="text" name="datetime" id="datetime" size="35" disabled = "disabled" value = "<?php echo $title; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="occupants" class="fixedwidth">Occupants</label>
         <input type="text" name="occupants" id="occupants" size="20" class = "required" disabled = "disabled" value = "<?php echo $leader; ?>" />
          </div>
        <div class ="fieldarea">
          <label for="length" class="fixedwidth">Length</label>
	<input type="text" name="length" id="length" size="20" class = "required" disabled = "disabled" value = "<?php echo $years; ?>" />
        
        </select>
        </div>
        <div class ="fieldarea">
         <input type="hidden" name="code" id="code" size="5" maxlength="5" value = "<?php echo $code; ?>" />
        </div>

	<div class="buttonarea">
    		<input type="submit" value="Delete the Course Record" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body>
</html>