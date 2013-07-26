<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Course By Code Query</title>
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script>

</head>
<body>
<?php

require_once 'inc/header.inc.htm';
require_once '../db3.inc.php';
?>



<form action="select2.php" method="post" id = "bookingidquery" class="course">
    <fieldset>
    <legend>Bookings by ID</legend>
        <div class ="fieldarea">
          <label for="code" class="fixedwidth">Booking ID</label>
	<input type = "numeric" name = "bookingid" id ="code" size="5" maxlength="20" class = "required"/>
       
 </div>

	<div class="buttonarea">    
    		<input type="submit" value="Submit" /> 
    		<input type="reset" value="Clear" />
	</div>


    </fieldset>
    </form>

<?php

echo 'Enter your booking id to update/delete it.';

?>
</div>
</div>
</body></html>