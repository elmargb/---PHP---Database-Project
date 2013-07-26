<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Delete a Course Record</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require 'inc/header.inc.htm'; ?>
<h2>Delete a Room</h2>
<p>
<?php  
require_once '../db3.inc.php';
$customer = $_GET['coursecode'];
$query="SELECT * FROM booking where roomid = '$customer'";
$result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query on the Booking table: ' . mysqli_error($link));
}

if (mysqli_num_rows($result)>=1) {
    exit('You cannot delete this room as there are bookings pending');
}

$query2 = "select * from room where room ='$customer'";
$student = @mysqli_query($link,$query2); 
if (!$student)
{
  exit('Error performing query on the room table: ' . mysqli_error($link));
}

$row = mysqli_fetch_array($student);
$leader= $row['type'];
$years = $row['size'];



?>
</p>
<form action = "deleteroom3.php" method = "post" id = "bookingdelete" class="course">
    <fieldset>
    <legend>Please Complete the Details</legend>
        <div class ="fieldarea">
         <label for="title" class="fixedwidth">Room ID</label>
         <input type="text" name="room" id="title" size="5" maxlength="5" disabled = "disabled" value = "<?php echo $customer; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="leader" class="fixedwidth">Type</label>
         <input type="text" name="type" id="leader" size="35" disabled = "disabled" value = "<?php echo $leader; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="years" class="fixedwidth">Size</label>
         <input type="text" name="size" id="years" size="20" class = "required" disabled = "disabled" value = "<?php echo $years; ?>" />
          </div>
        <div class ="fieldarea">
         <input type="hidden" name="title1" id="title1" size="5" maxlength="5" value = "<?php echo $customer; ?>" />
        </div>

	<div class="buttonarea">
    		<input type="submit" value="Delete the Room Record" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body>
</html>