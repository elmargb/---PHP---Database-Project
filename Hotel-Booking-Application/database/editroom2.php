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
<h2>Update your Room</h2>
<p>
<?php  
require_once '../db3.inc.php';

$query2='SELECT room, type FROM room order by room';
$result3 = @mysqli_query($link, $query2);
if (!$result3) {
  exit('Error performing query on the room table: ' . mysqli_error($link));
}


$code = $_GET['coursecode'];
$query="select * from room where room = '$code'";
$course = @mysqli_query($link, $query);
if (!$course) {
     exit('Error fetching Room details: '. mysqli_error($link));
}
$row = mysqli_fetch_array($course);
$title = $row['room'];
$leader= $row['type'];
$years = $row['size'];

$name = $row['type'];
$room = $row['roomid'];


$query2="SELECT distinct type FROM room";
$course2 = @mysqli_query($link, $query2);
if (!$course) {
     exit('Error fetching booking details: '. mysqli_error($link));
}
if (mysqli_num_rows($course)<1)
{exit ("No booking records found at this time");}
  
       
?>
</p>

<form action = "editroom3.php" method = "post" id = "bookingupdate" class="course">
    <fieldset>
        <div class ="fieldarea">
         <label for="title" class="fixedwidth">Room ID</label>
         <input type="numeric" name="room" id="title" size="5" maxlength="5" disabled = "disabled" value = "<?php echo $title; ?>" />
        </div>
        
        
<div class ="fieldarea">
        <label for="size" class="fixedwidth">Size</label>
       <select name = "size" id = "size" class = "required">
        
<option value="small" >small</option>
<option value="medium" >medium</option>
<option value="large" >large</option>
</select>
</div>
<div class ="fieldarea">
        <label for="type" class="fixedwidth">Type</label>
       <select name = "type" id = "type" class = "required">
        
<option value="economy" >economy</option>
<option value="deluxe" >deluxe</option>
<option value="luxurious" >luxurious</option>
</select>
</div>
       
       
         <div class ="fieldarea">
         <input type="hidden" name="room" id="code" size="5" maxlength="5" value = "<?php echo $title; ?>" />
        </div>
	<div class="buttonarea">
    		<input type="submit" value="Update customer Record" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body>
</html>