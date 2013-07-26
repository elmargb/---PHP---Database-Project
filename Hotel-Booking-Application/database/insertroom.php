<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Insert a Course Record</title>
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script></head>
<body>
<?php 
require 'inc/header.inc.htm';
require_once '../db3.inc.php';
 ?>
    <form action="insertr.php" method="post" id = "customerentry" class="course">
    <fieldset>
    <legend>Please Complete the Details</legend>

        <div class ="fieldarea">
         <label for="room" class="fixedwidth">Room</label>
          <input type="text" name="room" id="ccode" size="9" maxlength="9" class = "numeric"/>
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

        
        </div>
</select>
	<div class="buttonarea">
    		<input type="submit" value="Insert Room Record" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body></html>