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

$code = $_GET['coursecode'];
$query="select * from customer where customerid = '$code'";
$course = @mysqli_query($link, $query);
if (!$course) {
     exit('Error fetching customer details: '. mysqli_error($link));
}
$row = mysqli_fetch_array($course);
$title = $row['name'];
$leader= $row['address'];
$years = $row['telephone'];
$points = $row['age'];

$query2="SELECT distinct address FROM customer";
$course2 = @mysqli_query($link, $query2);
if (!$course) {
     exit('Error fetching booking details: '. mysqli_error($link));
}
if (mysqli_num_rows($course)<1)
{exit ("No booking records found at this time");}
  
       
?>
</p>

<form action = "editcourse3.php" method = "post" id = "bookingupdate" class="course">
    <fieldset>
        <div class ="fieldarea">
         <label for="ccode" class="fixedwidth">ID</label>
         <input type="text" name="customerid" id="ccode" size="5" maxlength="5" disabled = "disabled" value = "<?php echo $code; ?>" />
        </div>        <div class ="fieldarea">
          <label for="title" class="fixedwidth">Name</label>
         <input type="text" name="name" id="title" size="35" disabled = "disabled" value = "<?php echo $title; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="leader" class="fixedwidth">Address</label>
         <input type="text" name="address" id="leader" size="20"  class = "required" value = "<?php echo $leader; ?>" />
          </div>
        <div class ="fieldarea">
          <label for="years" class="fixedwidth">Telephone</label>
	 <input type="text" name="telephone" id="years" size="11" maxlength ="11" class = "required" value = "<?php echo $years; ?>" />
	</select>
        </div>
        <div class ="fieldarea">
          <label for="points" class="fixedwidth">Age</label></td>
          <td><input type="text" name="age" id="points" size="4" maxlength ="3" class = "numeric inrange" value = "<?php echo $points; ?>" />
                </td></tr>
        </div>
         <div class ="fieldarea">
         <input type="hidden" name="customerid" id="code" size="5" maxlength="5" value = "<?php echo $code; ?>" />
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