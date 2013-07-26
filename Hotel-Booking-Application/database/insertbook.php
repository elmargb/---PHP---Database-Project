<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Insert a booking</title>
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script></head>
<body>
<?php require 'inc/header.inc.htm'; 
require_once '../db3.inc.php';

$query='SELECT customerid, name FROM customer order by customerid';
$result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query on the Customer table: ' . mysqli_error($link));
}

if (mysqli_num_rows($result)<1) {
    exit('no customers exist');
}

$query='SELECT room, type FROM room order by room';
$result2 = @mysqli_query($link, $query);
if (!$result2) {
  exit('Error performing query on the room table: ' . mysqli_error($link));
}

if (mysqli_num_rows($result2)<1) {
    exit('no rooms exist');
}
?>

    <form action="insert.php" method="post" id = "courseentry" class="course">
    <fieldset>
    <legend>Please Complete the Details</legend>
        <div class ="fieldarea">
         <label for="bookingid" class="fixedwidth">Booking ID</label>
          <input type="text" name="bookingid" id="ccode" size="9" maxlength="9" class = "numeric"/>
        </div>
        <div class ="fieldarea">
          <label for="datetime" class="fixedwidth">Date</label>
         <input type="text" name="datetime" id="title" size="35" class = "cdate"/>
        </div>
        <div class ="fieldarea">
          <label for="occupants" class="fixedwidth">Occupants</label>
         <input type="text" name="occupants" id="leader" size="20" class = "numeric"/>
          </div>
        <div class ="fieldarea">
          <label for="length" class="fixedwidth">Length of stay</label>
         <input type="text" name="length" id="years" size="4" maxlength ="3" class = "numeric"/>
        </div>
        <div class ="fieldarea">
        <label for="customer" class="fixedwidth">Customer</label>
       <select name = "customer" id = "customer" class = "required">
        <option selected value = "">Select One</option>
        <?php
        while($row = mysqli_fetch_array($result))
         {
         $id=$row['customerid'];
         $name=$row['name'];
         echo "<option value='$id'>$name</option>\n";
        }
        ?>
        </select>
        </div>
        <label for="room" class="fixedwidth">Room</label>
       <select name = "room" id = "room" class = "required">
        <option selected value = "">Select One</option>
        <?php
        while($row = mysqli_fetch_array($result2))
         {
         $id=$row['room'];
         $type=$row['type'];
         echo "<option value='$id'>$type</option>\n";
        }
        ?>
       </div>
        </select>
 
<div class="buttonarea">
    		<input type="submit" value="Insert Booking Record" />
    		<input type="reset" value="Clear the Info" />
	</div>
</fieldset>
    </form>
</div>
</div>
</body></html>