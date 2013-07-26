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
<h2>Delete a Book</h2>
<p>
<?php  
require_once '../db3.inc.php';
$code = $_GET['coursecode'];
$query="SELECT * FROM customer where customerid = '$customer'";
$result = @mysqli_query($link, $query);
if (!$result) {
  exit('Error performing query on the Customer table: ' . mysqli_error($link));
}

if (mysqli_num_rows($result)>=1) {
    exit('You cannot delete this customer as there are bookings pending');
}

$query2 = "select * from booking where customerid ='$code'";
$student = @mysqli_query($link,$query2); 
if (mysqli_num_rows($student)>=1)
{
exit("You cannot delete this booking at the moment because there are rooms pending");
}
$query="select * from customer where customerid = '$code'";

$course = @mysqli_query($link,$query);
if (!$course) {
     exit('Error fetching course details: '. mysqli_error($link));
}
$row = mysqli_fetch_array($course);
$title = $row['name'];
$leader= $row['address'];
$years = $row['telephone'];
$points = $row['age'];

?>
</p>
<form action = "deletecourse3.php" method = "post" id = "customerdelete" class="course">
    <fieldset>
    <legend>Please Complete the Details</legend>
        <div class ="fieldarea">
         <label for="ccode" class="fixedwidth">Customer ID</label>
         <input type="text" name="customerid" id="ccode" size="5" maxlength="5" disabled = "disabled" value = "<?php echo $code; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="title" class="fixedwidth">Name</label>
         <input type="text" name="name" id="title" size="35" disabled = "disabled" value = "<?php echo $title; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="leader" class="fixedwidth">Address</label>
         <input type="text" name="address" id="leader" size="20" class = "required" disabled = "disabled" value = "<?php echo $leader; ?>" />
          </div>
        <div class ="fieldarea">
          <label for="years" class="fixedwidth">Telephone</label>
	<input type="text" name="telephone" id="years" size="20" class = "required" disabled = "disabled" value = "<?php echo $years; ?>" />
        
        </select>
        </div>
        <div class ="fieldarea">
          <label for="points" class="fixedwidth">Age</label></td>
          <td><input type="text" name="age" id="age" size="4" maxlength ="3" disabled = "disabled" class = "numeric inrange" value = "<?php echo $points; ?>" />
                </td></tr>
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