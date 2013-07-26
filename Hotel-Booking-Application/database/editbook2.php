<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update a Course Record</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script>

</head>
<body>
<?php require 'inc/header.inc.htm'; ?>
<h2>Update your customer</h2>
<p>
<?php  
require_once '../db3.inc.php';



$query='SELECT customerid, name FROM customer order by customerid';
$result2 = @mysqli_query($link, $query);
if (!$result2) {
  exit('Error performing query on the room table: ' . mysqli_error($link));
}
$query='SELECT room, type FROM room order by room';
$result3 = @mysqli_query($link, $query);
if (!$result3) {
  exit('Error performing query on the room table: ' . mysqli_error($link));
}


$code = $_GET['coursecode'];
$query="select * from booking where bookingid = '$code'";
$course = @mysqli_query($link, $query);
if (!$course) {
     exit('Error fetching details: '. mysqli_error($link));
}
$row = mysqli_fetch_array($course);
$title = $row['datetime'];
$leader= $row['occupants'];
$years = $row['length'];
$customer = $row['customerid'];
$room = $row['roomid'];

$query2="SELECT distinct address FROM customer";
$course2 = @mysqli_query($link, $query2);
if (!$course) {
     exit('Error fetching booking details: '. mysqli_error($link));
}
if (mysqli_num_rows($course)<1)
{exit ("No bookings found at this time");}
  
       
?>
</p>

<form action = "editbook3.php" method = "post" id = "bookingupdate" class="course">
    <fieldset>
        <div class ="fieldarea">
         <label for="ccode" class="fixedwidth">Booking ID</label>
         <input type="text" name="bookingid" id="ccode" size="5" maxlength="5" disabled = "disabled" value = "<?php echo $code; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="title" class="fixedwidth">Date</label>
         <input type="text" name="datetime" id="title" size="35"  value = "<?php echo $title; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="leader" class="fixedwidth">Occupants</label>
         <input type="text" name="occupants" id="leader" size="20" class = "required" value = "<?php echo $leader; ?>" />
          </div>
        <div class ="fieldarea">
          <label for="years" class="fixedwidth">Length of stay</label>
	 <input type="text" name="length" id="years" size="20" class = "required" value = "<?php echo $years; ?>" />
	</select>
        </div>
         <div class ="fieldarea">
         <input type="hidden" name="booking" id="code" size="5" maxlength="5" value = "<?php echo $code; ?>" />
        </div>
      <div class ="fieldarea">
        <label for="name" class="fixedwidth">Name</label>
       <select name = "name" id = "name" disabled = "disabled">
        <option selected value = "">Select One</option>
        <?php
        while($row = mysqli_fetch_array($result2))
         {
         $id=$row['customerid'];
         $name=$row['name'];
        
                  if ($customer==$id)
        {
          echo"<option selected = 'selected' value ='$customer'>" . "$name</option>\n";
         }
         else {
          echo"<option value = '$id'>$name</option>\n";
         }
        }
        ?>
        </select>
        </div>
       <div class ="fieldarea">
        <label for="type" class="fixedwidth">Type</label>
       <select name = "type" id = "type" class = "required">
        <option selected value = "">Select One</option>
        <?php
        while($row = mysqli_fetch_array($result3))
         {
         $id=$row['room'];
         $name=$row['type'];
         $display = $id . "-" . $name;
        
                  if ($room==$id)
        {
          echo"<option selected = 'selected' value ='$room'>" . "$display</option>\n";
         }
         else {
          echo"<option value = '$id'>$display</option>\n";
         }
       }
        ?>
        </select>
        </div>


	<div class="buttonarea">
    		<input type="submit" value="Update Course Record" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body>
</html>